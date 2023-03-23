<?php

namespace Acrit\Import;

use Bitrix\Main;

class Agents
{
    const MODULE_ID = "acrit.import";

    public static function getList($profile_id) {
        $list = array();
        $db = \CAgent::GetList(Array("NAME" => "ASC"), array('MODULE_ID' => self::MODULE_ID));
        while ($arItem = $db->Fetch()) {
            if (strpos($arItem['NAME'], 'runImport(' . $profile_id)) {
                preg_match('/runImport\([0-9]+, ([0-9]+)\)/', $arItem['NAME'], $matches);
                if (!empty($matches)) {
                    $arItem['params']['num'] = $matches[1];
                }
                else {
                    $arItem['params']['num'] = 1;
                }
	            $arItem['INTERVAL_MIN_SUFFIX'] = GetMessage('ACRIT_IMPORT_AGENTS_INTERVAL_MIN');
                $list[] = $arItem;
            }
        }
        return $list;
    }

    public static function add($profile_id, $interval=86400, $next_ts=false) {
        $res = false;
        if ($profile_id && $interval) {
            $list = self::getList($profile_id);
            if (!empty($list)) {
                $num = $list[count($list)-1]['params']['num'];
            }
            $num++;
            //\CAgent::RemoveAgent("\\Acrit\\Import\\Agents::runImport(" . $profile_id . ");", self::MODULE_ID);
            $next_date = '';
            if ($next_ts) {
                $next_date = ConvertTimeStamp($next_ts, 'FULL');
            }
            $res = \CAgent::AddAgent(
            	"\\Acrit\\Import\\Agents::runImport(" . $profile_id . ", " . $num . ");",
	            self::MODULE_ID,
	            "Y",    // start time is floating when no-periodic agents
	            $interval, "", "Y", $next_date);
        }
        return $res;
    }

    public static function remove($agent_id) {
        \CAgent::Delete($agent_id);
    }

	/**
	 * @param     $profile_id
	 * @param int $num
	 *
	 * @return string|void
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 * @use in /bitrix/modules/acrit.import/scripts/start_import_cron.php
	 */
    public static function runImport($profile_id, $num=0) {
        if ($profile_id) {
            // If agents set on cron
//            if (BX_CRONTAB_SUPPORT == 'Y') {
//                $next_date = ConvertTimeStamp(time(), 'FULL');
//                \CAgent::AddAgent("\\Acrit\\Import\\Agents::runImportByCron(" . $profile_id . ");", self::MODULE_ID, "N", 0, "", "Y", $next_date);
//            }
//            // If agents set on hits
//            else {
                // Check other import runs
                if (self::isLocked($profile_id)) {
                    return;
                }
                // Run import
                $obImport = AcritImportGetImportObj($profile_id);
                if ($obImport) {
                    self::delRunPos($profile_id);
                    $obImport->prepareSource();
                    $count = $obImport->count($profile_id);
	                \CAcritImport::runBgrRequest('/bitrix/acrit.import_run_bgrnd.php', [
	                	'profile' => $profile_id,
	                	'count' => $count,
	                	'next_item' => 0,
	                ]);
                }
//            }
        }
        return "\\Acrit\\Import\\Agents::runImport(" . $profile_id . ", " . $num . ");";
    }

    /**
     * Locking import
     */

    public static function addLock($profile_id) {
        $arList = self::getLock();
        if (!$arList) {
            $arList = array();
        }
        $arList[$profile_id] = time();
        $sList = serialize($arList);
        $res = \Bitrix\Main\Config\Option::set(self::MODULE_ID, "profiles_run_lock", $sList);
        return $res;
    }

    public static function delLock($profile_id) {
        $res = false;
        $arList = self::getLock();
        if ($arList[$profile_id]) {
            unset($arList[$profile_id]);
            $sList = serialize($arList);
            $res = \Bitrix\Main\Config\Option::set(self::MODULE_ID, "profiles_run_lock", $sList);
        }
        return $res;
    }

    public static function getLock() {
        $sList = \Bitrix\Main\Config\Option::get(self::MODULE_ID, "profiles_run_lock");
        $arList = unserialize($sList);
        return $arList;
    }

    public static function isLocked($profile_id) {
        $res = false;
//        // Check by time of last run
//        $arList = self::getLock();
//        if ($arList[$profile_id]) {
//            $last_start_ts = $arList[$profile_id];
//            if ((time() - $last_start_ts) < (3600 * 24)) {
//                $res = true;
//            }
//        }
        return $res;
    }

    /**
     * Check a duplicate runs of profile
     */

    // Check
    public static function isDoubleRun($profile_id, $pos) {
        $res = false;
        // Check by position of last run
        $arList = self::getLockPos();
        //AddMessage2Log('$arList: '.print_r($arList, true));
        if (isset($arList[$profile_id])) {
            $last_pos = $arList[$profile_id];
            if ($pos <= $last_pos) {
                $res = true;
            }
        }
        return $res;
    }

    // Get list
    public static function getLockPos() {
        $sList = \Bitrix\Main\Config\Option::get(self::MODULE_ID, "profiles_run_lock_pos");
        $arList = unserialize($sList);
        return $arList;
    }

    // Add
    public static function addRunPos($profile_id, $pos) {
        $arList = self::getLockPos();
        if (!$arList) {
            $arList = array();
        }
        $arList[$profile_id] = $pos;
        $sList = serialize($arList);
        $res = \Bitrix\Main\Config\Option::set(self::MODULE_ID, "profiles_run_lock_pos", $sList);
        return $res;
    }

    // Reset
    public static function delRunPos($profile_id) {
        $res = false;
        $arList = self::getLockPos();
        if (isset($arList[$profile_id])) {
            unset($arList[$profile_id]);
            $sList = serialize($arList);
            $res = \Bitrix\Main\Config\Option::set(self::MODULE_ID, "profiles_run_lock_pos", $sList);
        }
        return $res;
    }


    /**
     * Run full import
     */

    public static function runImportByCron($profile_id) {
        if (BX_CRONTAB_SUPPORT == 'Y') {
            AddMessage2Log('run');
            sleep(1200);
        }
        /*if ($profile_id) {
            $obImport = AcritImportGetImportObj($profile_id);
            if ($obImport) {
                $server = SITE_SERVER_NAME;
                $query = "GET /bitrix/acrit.import_run_full_bgrnd.php?profile=".$profile_id." HTTP/1.0\r\n";
                echo $query;
                if (!$fsock = fsockopen($server, 80)) {
                    throw new \Exception('Cant open socket connection');
                }
                fputs($fsock, $query);
                fputs($fsock, "Host: $server\r\n");
                fputs($fsock, "\r\n");
                fgets($fsock);
                stream_set_blocking($fsock, false);
                stream_set_timeout($fsock, 3600);
            }
        }*/
    }
}
