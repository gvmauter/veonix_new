<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;
use CDNVideo\Tools\Settings;

$sModuleId = "cdnvideo.ru";
CModule::IncludeModule($sModuleId);

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$ownerSite = 'https://cdnvideo.ru/';

$aTabs = [
    [
        'DIV' => 'main',
        'TAB' => Loc::getMessage('cdnvideo.ru_MAIN_TAB_SET'),
        'ICON' => 'cdnfiles_settings',
        'TITLE' => Loc::getMessage('cdnvideo.ru_MAIN_TAB_TITLE_SET'),
    ],
];

CJSCore::Init(["jquery"]);

function is_valid_domain_name($domain_name)
{
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) && preg_match("/^.{1,253}$/", $domain_name) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name));
}

$result_messages = [];
$domain_errors = [];
$currentMode = COption::GetOptionInt($sModuleId, "MODE", 0);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_REQUEST["change_mode"])) {
    $currentMode = [Settings::MODE_EXTENDED, Settings::MODE_DEFAULT][$currentMode] ?: 0;
    COption::SetOptionInt($sModuleId, "MODE", $currentMode);
}

$siteLids = [];
if ($currentMode === Settings::MODE_EXTENDED) {
    $by = $order = [];
    $sites = CSite::GetList($by, $order);
    $domains = [];
    while ($site = $sites->Fetch()) {
        $aTabs[] = [
            'DIV' => 'files' . $site['LID'],
            'TAB' => Loc::getMessage('cdnvideo.ru_ALL_CONFIGS') . Loc::getMessage('cdnvideo.ru_SITE', ['#LID#' => $site['LID']]),
            'ICON' => 'cdnvideo_settings' . $site['LID'],
            'TITLE' => Loc::getMessage('cdnvideo.ru_ALL_CONFIGS') . Loc::getMessage('cdnvideo.ru_SITE', ['#LID#' => $site['LID']]),
            'LID' => $site['LID']
        ];
        $siteLids[] = $site['LID'];

        $domains['domain_name_' . $site['LID']] = $_REQUEST['domain_name_'. $site['LID']];
        $domains['domain_name_av_' . $site['LID']] = $_REQUEST['domain_name_av_'. $site['LID']];
    }

} else {
    $aTabs[] = [
        'DIV' => 'files',
        'TAB' => Loc::getMessage('cdnvideo.ru_ALL_CONFIGS'),
        'ICON' => 'cdnvideo_settings',
        'TITLE' => Loc::getMessage('cdnvideo.ru_ALL_CONFIGS'),
    ];
    $siteLids[] = 'default';
    $domains = [
        'domain_name' => $_REQUEST["domain_name"],
        'domain_name_av' => $_REQUEST["domain_name_av"],
    ];
}

if (
    $_SERVER["REQUEST_METHOD"] === "POST"
    && (
        isset($_REQUEST["save"])
        || isset($_REQUEST["RestoreDefaults"])
        || isset($_REQUEST["clear_all_cache"])
        || isset($_REQUEST["clear_file_cache"])
        || isset($_REQUEST["clear_av_cache"])
    )
) {
    if (isset($_REQUEST["RestoreDefaults"])) {
        COption::RemoveOption($sModuleId);
    } else {

        foreach (array_keys($domains) as $paramName) {
            $tempArr = explode(',', $domains[$paramName]);
            foreach ($tempArr as $key => &$item) {
                $item = str_ireplace('http://', '', trim($item));
                if (empty($item)) {
                    unset($tempArr[$key]);
                    continue;
                }
                if (!is_valid_domain_name($item)) {
                    $domain_errors[] = $item;
                    unset($tempArr[$key]);
                }
            }
            $domains[$paramName] = implode(',', $tempArr);
        }

        if ($_REQUEST["enable_plg"] == "Y") {
            cCDNvideo::SetActive();
            $result_messages[] = "cdnvideo.ru_SAVE";
        } else {
            cCDNvideo::stop();
            $result_messages[] = "cdnvideo.ru_SAVE";
        }

        foreach ($siteLids as $lid) {
            $postfix = $lid === 'default' ? '' : '_'.$lid;

            COption::SetOptionInt($sModuleId, "TTL" . $postfix, intval($_REQUEST["TTL" . $postfix]));
            COption::SetOptionInt($sModuleId, "TTL_AV . $postfix", intval($_REQUEST["TTL_AV" . $postfix]));

            if ($_REQUEST["enable_files" . $postfix] == "Y" && !empty($domains["domain_name" . $postfix])) {
                COption::SetOptionString($sModuleId, "DOMAIN_FILES_ENABLE" . $postfix, $_REQUEST["enable_files" . $postfix]);
            } else {
                COption::RemoveOption($sModuleId, "DOMAIN_FILES_ENABLE" . $postfix);
            }
            if ($_REQUEST["enable_av" . $postfix] == "Y" && !empty($domains["domain_name_av" . $postfix])) {
                COption::SetOptionString($sModuleId, "DOMAIN_AV_ENABLE" . $postfix, $_REQUEST["enable_av" . $postfix]);
            } else {
                COption::RemoveOption($sModuleId, "DOMAIN_AV_ENABLE" . $postfix);
            }

            COption::SetOptionString($sModuleId, "DOMAIN_NAME_FILES" . $postfix, $domains["domain_name" . $postfix]);
            COption::SetOptionString($sModuleId, "DOMAIN_NAME_AV" . $postfix, $domains["domain_name_av" . $postfix]);

            if ($_REQUEST["clear_file_cache" . $postfix]) {
                COption::SetOptionInt($sModuleId, "CACHE_TIME" . $postfix, time());
                $result_messages[] = "cdnvideo.ru_CLEAR_ALL_CACHE_DONE";
            }

            if ($_REQUEST["clear_av_cache" . $postfix]) {
                COption::SetOptionInt($sModuleId, "CACHE_TIME_AV" . $postfix, time());
                $result_messages[] = "cdnvideo.ru_CLEAR_ALL_CACHE_DONE";
            }
        }

        if ($_REQUEST["clear_all_cache"]) {
            COption::SetOptionInt($sModuleId, "CACHE_TIME" . $postfix, time());
            COption::SetOptionInt($sModuleId, "CACHE_TIME_AV" . $postfix, time());
            $result_messages[] = "cdnvideo.ru_CLEAR_ALL_CACHE_DONE";
        }
    }
}

$oTabControl = new CAdminTabControl("tabControl", $aTabs);
$oTabControl->Begin();
?>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&amp;lang=<?= LANGUAGE_ID ?>">
    <? $oTabControl->BeginNextTab(); ?>
    <? echo BeginNote($sParams = 'name="welcome" style="display:none"'), Loc::getMessage("cdnvideo.ru_WELCOME"), EndNote(); ?>
    <tr class="heading">
        <td><a href="<?=$ownerSite; ?>" target="_blank"><img src="/bitrix/images/<?= $sModuleId ?>/CDNvideo.png" alt=""/></a></td>
        <td><b><?= Loc::getMessage("cdnvideo.ru_MAIN_TAB_TITLE_SET") ?></b></td>
        <td></td>
    </tr>
    <tr>
        <td style="width: 40%">
            <label for="enable_plg"><?= Loc::getMessage("cdnvideo.ru_MAIN_TAB_ENABLE") ?>:</label>
        </td>
        <td style="width: 60%">
            <input type="checkbox"
                   id="enable_plg"
                   name="enable_plg"
                   value="Y"
                <? if (cCDNvideo::IsActive()) echo "checked"; ?>
            >
        </td>
    </tr>
    <tr>
        <td style="width: 40%">
            <input type="submit"
                   name="clear_all_cache"
                   value="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
                   title="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
            >
        </td>
        <td style="width: 60%">
            <input type="submit"
                   name="change_mode"
                   value="<?= Loc::getMessage("cdnvideo.ru_CHANGE_MODE_" . $currentMode) ?>"
                   title="<?= Loc::getMessage("cdnvideo.ru_CHANGE_MODE_" . $currentMode) ?>"
                   class="adm-btn-save"
            >
        </td>
    </tr>

    <? foreach ($siteLids as $lid) : ?>
        <?
        $oTabControl->BeginNextTab();
        $tab = $oTabControl->tabs[$oTabControl->tabIndex-1];
        $postfix = (isset($tab['LID']) ? '_'.$tab['LID'] : '');
        ?>
        <? echo BeginNote($sParams = 'name="welcome_av'.$postfix.'" style="display:none"'), Loc::getMessage("cdnvideo.ru_WELCOME_AV"), EndNote(); ?>
        <script>
            $('body')
                .on('change', 'input[name="enable_av<?=$postfix;?>"]', function () {
                    if ($('input[name="enable_av<?=$postfix;?>"]').prop("checked")) {
                        $('div[name="welcome_av<?=$postfix;?>"]').fadeToggle();
                    } else {
                        $('div[name="welcome_av<?=$postfix;?>"]').fadeOut();
                    }

                    return false;
                });

        </script>
        <? if ($currentMode === Settings::MODE_EXTENDED) : ?>
            <tr>
                <td style="width: 40%">
                    <label for="enable_files<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_ENABLE") ?>:</label>
                </td>
                <td style="width: 60%">
                    <input type="checkbox"
                           name="enable_files<?=$postfix; ?>"
                           id="enable_files<?=$postfix; ?>"
                           value="Y"
                        <? if (COption::GetOptionString($sModuleId, "DOMAIN_FILES_ENABLE" . $postfix)) echo "checked"; ?>
                    >
                </td>
            </tr>
        <? endif; ?>

        <tr class="heading">
            <td><a href="<?=$ownerSite; ?>" target="_blank"><img src="/bitrix/images/<?= $sModuleId ?>/CDNvideo.png" alt=""/></a></td>
            <td><b><?= Loc::getMessage("cdnvideo.ru_FILES") ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <label for="domain_name<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_DOMAIN_NAME_FILES") ?>:</label>
            </td>
            <td>
                <input type="text"
                       size="50"
                       id="domain_name<?=$postfix; ?>"
                       name="domain_name<?=$postfix; ?>"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString($sModuleId, "DOMAIN_NAME_FILES" . $postfix)) ?>"
                >
                <br><?= Loc::getMessage("cdnvideo.ru_REQUIRED") ?>
                <br><label for="add_cname_desc"><?= Loc::getMessage("cdnvideo.ru_ADD_CNAME_DESCRIPTION") ?></label>
            </td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 40%">
                <label for="TTL<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_TIME_CACHING") ?>:</label>
            </td>
            <td style="width: 60%">
                <input type="text"
                       id="TTL<?=$postfix; ?>"
                       size="50"
                       maxlength="8"
                       name="TTL<?=$postfix; ?>"
                       value="<?= htmlspecialcharsbx(COption::GetOptionInt($sModuleId, "TTL" . $postfix)) ?>"
                >
                <input type="hidden" name="CACHE_TIME" value="<?= COption::GetOptionInt($sModuleId, "CACHE_TIME" . $postfix) ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 40%">
                <input type="submit"
                       name="clear_file_cache"
                       value="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
                       title="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
                >
            </td>
            <td style="width: 60%"></td>
        </tr>
        <tr class="heading">
            <td><a href="<?=$ownerSite; ?>" target="_blank"><img src="/bitrix/images/<?= $sModuleId ?>/CDNvideo.png" alt=""/></a></td>
            <td><b><?= Loc::getMessage("cdnvideo.ru_MULTIMEDIA") ?></b></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 40%">
                <label for="enable_av<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_ENABLE") ?>:</label>
            </td>
            <td style="width: 60%">
                <input type="checkbox"
                       name="enable_av<?=$postfix; ?>"
                       id="enable_av<?=$postfix; ?>"
                       value="Y"
                    <? if (COption::GetOptionString($sModuleId, "DOMAIN_AV_ENABLE" . $postfix)) echo "checked"; ?>
                >
            </td>
        </tr>
        <tr>
            <td style="width: 40%">
                <label for="domain_name<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_DOMAIN_NAME_FILES") ?>:</label>
            <td style="width: 60%">
                <input type="text"
                       size="50"
                       id="domain_name_av<?=$postfix; ?>"
                       name="domain_name_av<?=$postfix; ?>"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString($sModuleId, "DOMAIN_NAME_AV" . $postfix)) ?>"
                >
            </td>
        </tr>
        <tr>
            <td style="width: 40%">
                <label for="TTL_AV<?=$postfix; ?>"><?= Loc::getMessage("cdnvideo.ru_TIME_CACHING") ?>:</label>
            <td style="width: 60%">
                <input type="text"
                       size="50"
                       maxlength="8"
                       id="TTL_AV<?=$postfix; ?>"
                       name="TTL_AV<?=$postfix; ?>"
                       value="<?= htmlspecialcharsbx(COption::GetOptionInt($sModuleId, "TTL_AV" . $postfix)) ?>"
                >
                <input type="hidden" name="CACHE_TIME<?=$postfix; ?>" value="<?= COption::GetOptionInt($sModuleId, "CACHE_TIME" . $postfix) ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 40%">
                <input type="submit"
                       name="clear_av_cache"
                       value="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
                       title="<?= Loc::getMessage("cdnvideo.ru_CLEAR_ALL_CACHE") ?>"
                >
            <td style="width: 60%"></td>
        </tr>
    <? endforeach; ?>
    <? $oTabControl->Buttons(); ?>
    <input type="submit"
           name="save"
           value="<?= Loc::getMessage("MAIN_SAVE") ?>"
           title="<?= Loc::getMessage("MAIN_OPT_SAVE_TITLE") ?>"
           class="adm-btn-save"
    >
    <input type="submit"
           name="RestoreDefaults"
           title="<?= Loc::getMessage("MAIN_HINT_RESTORE_DEFAULTS") ?>"
           OnClick="return confirm('<?= AddSlashes(Loc::getMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING")) ?>')"
           value="<?= Loc::getMessage("MAIN_RESTORE_DEFAULTS") ?>"
    >
    <?= bitrix_sessid_post(); ?>
    <? $oTabControl->End(); ?>
</form>
<?
foreach ($result_messages as $value) {
    echo BeginNote($sParams = "name=\"inf0message\""), Loc::getMessage($value), EndNote();
}
foreach ($domain_errors as $error) {
    echo BeginNote($sParams = "name=\"inf0message\""), ShowError(Loc::getMessage("cdnvideo.ru_DOMAIN_NAME_ERROR", ["#DOMAIN#" => $error])), EndNote();
}
?>

<script>
    $(document).ready(function () {
        $('div[name="inf0message"]').hide(20000);
    });

    $('body')
        .on('change', 'input[name="enable_plg"]', function () {
            if ($('input[name="enable_plg"]').prop("checked")) {
                $('div[name="welcome"]').fadeToggle();
            } else {
                $('div[name="welcome"]').fadeOut();
            }

            return false;
        });

</script>