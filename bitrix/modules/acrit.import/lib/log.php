<?php

namespace Acrit\Import;

use Bitrix\Main\Config\Option;

class Log
{
    const TYPE_MESSAGE = 0;
    const TYPE_ERROR = 1;
    const TYPE_SKIP = 2;
    const TYPE_SUCCESS = 3;
    const MODULE_ID = 'acrit.import';

    protected $arLog;
    protected $profile_id;
    protected $arImportStat;

    public function add($value, $type=self::TYPE_MESSAGE)
    {
        $this->arLog[] = array(
            'text' => $value,
            'type' => $type,
        );
    }

    public function setProfileId($profile_id)
    {
        $this->profile_id = $profile_id;
    }

    public function save()
    {
        $arErrors = $this->getList(array(self::TYPE_ERROR, self::TYPE_SKIP, self::TYPE_MESSAGE), true); // all save
        if (!empty($arErrors)) {
            // To file
            $logs_file = Option::get(self::MODULE_ID, "logs_path");
            if ($logs_file) {
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $logs_file, implode("\n", $arErrors), FILE_APPEND);
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . $logs_file, "\n---\n" . date('d.m.Y H:i:s') . "\n\n", FILE_APPEND);
            }
            // To email
            $logs_email = Option::get(self::MODULE_ID, "logs_email");
            if ($logs_email) {
                $email_from = Option::get('main', 'email_from');
                $to      = $logs_email;
                $subject = 'Acrit Import Errors';
                $message = implode("\n", $arErrors);
                if ($email_from) {
                    $headers = 'From: ' . $email_from . "\r\n" .
                        'Reply-To: ' . $email_from . "\r\n";
                }
                $headers .= 'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
            }
            // To Event log
            if (Option::get(self::MODULE_ID, "logs_events") == 'Y') {
                \CEventLog::Add(array(
                    "SEVERITY" => "SECURITY",
                    "AUDIT_TYPE_ID" => "IMPORT_ERRORS",
                    "MODULE_ID" => self::MODULE_ID,
                    "ITEM_ID" => $this->profile_id,
                    "DESCRIPTION" => implode("\n", $arErrors),
                ));
            }
        }
    }

    public function getList($arTypes = array(), $strip_tags=false) {
        $arList = array();
        if (!empty($this->arLog)) {
            foreach ($this->arLog as $arItem) {
                if (in_array($arItem['type'], $arTypes)) {
                    $arList[] = $strip_tags ? strip_tags($arItem['text']) : $arItem['text'];
                }
            }
        }
        return $arList;
    }

    public function getStat() {
        $arRep = array(
            self::TYPE_MESSAGE => 0,
            self::TYPE_ERROR => 0,
            self::TYPE_SKIP => 0,
            self::TYPE_SUCCESS => 0,
        );
        if (!empty($this->arLog)) {
            foreach ($this->arLog as $arItem) {
                $arRep[$arItem['type']]++;
            }
        }
        return $arRep;
    }

    public function getCount() {
        $count = count($this->arLog);
        return $count;
    }

    public function setImportStatParam($param, $value) {
        $this->arImportStat[$param] = $value;
    }

    public function incImportStatParam($param, $inc_value=1) {
        if ($param) {
            if (!isset($this->arImportStat[$param])) {
                $this->arImportStat[$param] = 0;
            }
            $this->arImportStat[$param] += $inc_value;
        }
    }

    public function getImportStat() {
        return $this->arImportStat;
    }
}
