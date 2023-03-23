<?
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_admin_before.php");

$MODULE_ID = $module_id = 'luxar.sitemap';

define('ADMIN_MODULE_NAME', $module_id);

$modulePermissions = $APPLICATION->GetGroupRight($module_id);
if ($modulePermissions < 'W')
    $APPLICATION->AuthForm('');

use Bitrix\Main,
    Bitrix\Main\Loader,
    Bitrix\Main\Text\Converter,
    Bitrix\Main\Localization\Loc,
    Luxar\Sitemap\SitemapTable,
    Luxar\Sitemap\SitemapIblockTable,
    Luxar\Sitemap\SitemapIblock,
    Luxar\Sitemap\Sitemap,
    Bitrix\Main\Text\HtmlFilter;

Loc::loadMessages(dirname(__FILE__).'/../../main/tools.php');
Loc::loadMessages(dirname(__FILE__).'/sitemap.php');

$includeResult = Loader::includeSharewareModule($MODULE_ID);
if ($includeResult == MODULE_DEMO_EXPIRED) {
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    echo CLuxarSitemap::GetDemoMessage();
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
    die();
}

if(!$includeResult)
{
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    ShowError(Loc::getMessage("SEO_ERROR_NO_MODULE"));
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
}

$bIBlock = Main\Loader::includeModule('iblock');
$bSeoMeta = Main\Loader::includeModule('sotbit.seometa');
$bLuxarMultiRegion = Main\Loader::includeModule('luxar.multiregion');


$ID = intval($_REQUEST['ID']);
$SITE_ID = trim($_REQUEST['site_id']);

$bDefaultHttps = true;

$APPLICATION->AddHeadScript("https://code.jquery.com/jquery-3.6.0.min.js");
$APPLICATION->SetAdditionalCSS("/bitrix/panel/seo/sitemap.css");

if($ID > 0)
{
    $arSitemap = Sitemap::getSettings($ID);

    if(!is_array($arSitemap))
    {
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
        ShowError(Loc::getMessage("SEO_ERROR_SITEMAP_NOT_FOUND"));
        require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
    }
    else
    {
        if($_REQUEST['action'] == 'delete' && check_bitrix_sessid())
        {
            SitemapTable::delete($ID);
            LocalRedirect(BX_ROOT."/admin/".$module_id."_sitemap.php?lang=".LANGUAGE_ID);
        }

        $SITE_ID = $arSitemap['SITE_ID'];
    }
}

if(strlen($SITE_ID) > 0)
{
    $dbSite = Main\SiteTable::getByPrimary($SITE_ID);
    $arSite = $dbSite->fetch();
    if(!is_array($arSite))
    {
        $SITE_ID = '';
    }
    else
    {
        $SITE_ID = $arSite['LID'];
        $arSite['DOMAINS'] = array();

        if($arSite['SERVER_NAME'] != '')
            $arSite['DOMAINS'][] = $arSite['SERVER_NAME'];

        $dbDomains = Bitrix\Main\SiteDomainTable::getList(
            array(
                'filter' => array('LID' => $SITE_ID),
                'select'=>array('DOMAIN')
            )
        );
        while($arDomain = $dbDomains->fetch())
        {
            $arSite['DOMAINS'][] = $arDomain['DOMAIN'];
        }
        $arSite['DOMAINS'][] = \Bitrix\Main\Config\Option::get('main', 'server_name', '');
        $arSite['DOMAINS'] = array_unique($arSite['DOMAINS']);
    }
}

if(strlen($SITE_ID) <= 0)
{
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    ShowError(Loc::getMessage("SEO_ERROR_SITEMAP_NO_SITE"));
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
}

$aTabs = array(
    array("DIV" => "seo_sitemap_common", "TAB" => Loc::getMessage('SEO_SITEMAP_COMMON'), "ICON" => "main_settings", "TITLE" => Loc::getMessage('SEO_SITEMAP_COMMON_TITLE')),
    array("DIV" => "seo_sitemap_files", "TAB" => Loc::getMessage('SEO_SITEMAP_FILES'), "ICON" => "main_settings", "TITLE" => Loc::getMessage('SEO_SITEMAP_FILES_TITLE')),
);
if($bIBlock)
{
    $aTabs[] = array("DIV" => "seo_sitemap_iblock", "TAB" => Loc::getMessage('SEO_SITEMAP_IBLOCK'), "ICON" => "main_settings", "TITLE" => Loc::getMessage('SEO_SITEMAP_IBLOCK_TITLE'));
}
if ($bSeoMeta) {
    $aTabs[] = array("DIV" => "seo_sitemap_seometa", "TAB" => Loc::getMessage('SEO_SITEMAP_SEOMETA'), "ICON" => "main_settings", "TITLE" => Loc::getMessage('SEO_SITEMAP_SEOMETA_TITLE'));
}
$aTabs[] = array("DIV" => "seo_sitemap_other", "TAB" => Loc::getMessage('SEO_SITEMAP_OTHER'), "ICON" => "main_settings", "TITLE" => Loc::getMessage('SEO_SITEMAP_OTHER_TITLE'));


$tabControl = new \CAdminTabControl("seoSitemapTabControl", $aTabs, true, true);

$errors = array();

if(
    $_SERVER['REQUEST_METHOD'] == 'POST'
    && check_bitrix_sessid()
    && (strlen($_POST["save"]) > 0
        || strlen($_POST['apply']) > 0
        || strlen($_POST['save_and_add']) > 0
    )
)
{
    $fileNameIndex = trim($_REQUEST['FILENAME_INDEX']);
    $fileNameFiles = trim($_REQUEST['FILENAME_FILES']);
    $fileNameIblock = trim($_REQUEST['FILENAME_IBLOCK']);
    $fileNameSeometa = trim($_REQUEST['FILENAME_SEOMETA']);
    $fileNameOther = trim($_REQUEST['FILENAME_OTHER']);

    if(empty($fileNameIndex)) {
        $errors[] = Loc::getMessage('SEO_ERROR_SITEMAP_NO_VALUE', array('#FIELD#' => Loc::getMessage('SITEMAP_FILENAME_ADDRESS')));
    }
    if(empty($fileNameFiles)) {
        $errors[] = Loc::getMessage('SEO_ERROR_SITEMAP_NO_VALUE', array('#FIELD#' => Loc::getMessage('SITEMAP_FILENAME_FILE')));
    }

    if($bIBlock && empty($fileNameIblock)) {
        $errors[] = Loc::getMessage('SEO_ERROR_SITEMAP_NO_VALUE', array('#FIELD#' => Loc::getMessage('SITEMAP_FILENAME_IBLOCK')));
    }
    if($bSeoMeta && empty($fileNameSeometa)) {
        $fileNameSeometa = 'sitemap_seometa.xml';
        //$errors[] = Loc::getMessage('SEO_ERROR_SITEMAP_NO_VALUE', array('#FIELD#' => Loc::getMessage('SITEMAP_FILENAME_SEOMETA')));
    }
    if(empty($fileNameOther)) {
        $fileNameSeometa = 'sitemap_other.xml';
        //$errors[] = Loc::getMessage('SEO_ERROR_SITEMAP_NO_VALUE', array('#FIELD#' => Loc::getMessage('SITEMAP_FILENAME_OTHER')));
    }

    if(empty($errors))
    {
        $arSitemapSettings = Sitemap::prepareSettings(array(

            'PROTO' => $_REQUEST['PROTO'],
            'DOMAIN' => $_REQUEST['DOMAIN'],
            'DOCUMENT_ROOT' => $_REQUEST['DOCUMENT_ROOT'],

            'FILE_MASK' => trim($_REQUEST['FILE_MASK']),
            'logical' => $_REQUEST['log'] == 'N' ? 'N' : 'Y',
            'DIR' => $_REQUEST['DIR'],
            'FILE' => $_REQUEST['FILE'],
            'FILE_SETTINGS' => $_REQUEST['FILE_SETTINGS'],

            'FILENAME_INDEX' => $fileNameIndex,
            'FILENAME_FILES' => $fileNameFiles,
            'FILENAME_IBLOCK' => $fileNameIblock,
            'FILENAME_SEOMETA' => $fileNameSeometa,
            'FILENAME_OTHER' => $fileNameOther,

            'IBLOCK_ACTIVE' => $_REQUEST['IBLOCK_ACTIVE'],
            'SEOMETA_GENERATE' => $_REQUEST['SEOMETA_GENERATE'],
            'SEOMETA_MIN_COUNT_ELEMENT' => $_REQUEST['SEOMETA_MIN_COUNT_ELEMENT'],

            'FILE_ADD_DIR_SLASH' => $_REQUEST['FILE_ADD_DIR_SLASH'],
            'FILE_DELETE_INDEX_PHP' => $_REQUEST['FILE_DELETE_INDEX_PHP'],

            'OTHER' => $_REQUEST['OTHER'],

            'MAX_COUNT_URL' => !empty($_REQUEST['MAX_COUNT_URL'])?(int)$_REQUEST['MAX_COUNT_URL']:'',
            'MAX_FILE_SIZE' => !empty($_REQUEST['MAX_FILE_SIZE'])?(int)$_REQUEST['MAX_FILE_SIZE']:'',

            /*'IBLOCK_LIST' => $_REQUEST['IBLOCK_LIST'],
            'IBLOCK_SECTION' => $_REQUEST['IBLOCK_SECTION'],
            'IBLOCK_ELEMENT' => $_REQUEST['IBLOCK_ELEMENT'],
            'IBLOCK_SECTION_SECTION' => $_REQUEST['IBLOCK_SECTION_SECTION'],
            'IBLOCK_SECTION_ELEMENT' => $_REQUEST['IBLOCK_SECTION_ELEMENT'],*/
        ));

        $arSiteMapFields = array(
            'NAME' => trim($_REQUEST['NAME']),
            'DESCRIPTION' => trim($_REQUEST['DESCRIPTION']),
            'ACTIVE' => $_REQUEST['ACTIVE'] == 'N' ? 'N' : 'Y',
            'SITE_ID' => $SITE_ID,
            'SETTINGS' => serialize($arSitemapSettings),
        );

        if($ID > 0)
        {
            $result = SitemapTable::update($ID, $arSiteMapFields);
        }
        else
        {
            $result = SitemapTable::add($arSiteMapFields);
            $ID = $result->getId();
        }

        if($result->isSuccess())
        {
            $arSitemapIblock = array();

            SitemapIblockTable::clearBySitemap($ID);

            if(is_array($_REQUEST['IBLOCK_ACTIVE']))
            {
                foreach($_REQUEST['IBLOCK_ACTIVE'] as $iblockId => $active)
                {
                    if($active === 'Y')
                    {
                        $iblockSettings = [
                            'LIST' => $_REQUEST['IBLOCK_LIST'][$iblockId]=='Y'?'Y':'N',
                            'SECTION' => $_REQUEST['IBLOCK_SECTION'][$iblockId]=='Y'?'Y':'N',
                            'ELEMENT' => $_REQUEST['IBLOCK_ELEMENT'][$iblockId]=='Y'?'Y':'N',
                            'SECTION_SECTION' => $_REQUEST['IBLOCK_SECTION_SECTION'][$iblockId],
                            'SECTION_ELEMENT' => $_REQUEST['IBLOCK_SECTION_ELEMENT'][$iblockId],
                            /*'changefreq' => $_REQUEST['IBLOCK_ADDITIONAL'][$iblockId]['changefreq'],
                            'priority' => $_REQUEST['IBLOCK_ADDITIONAL'][$iblockId]['priority'],*/
                            'MIN_COUNT_ELEMENT' => $_REQUEST['IBLOCK_ADDITIONAL'][$iblockId]['MIN_COUNT_ELEMENT'],
                            'DETAIL' => unserialize($_REQUEST['IBLOCK_ADDITIONAL'][$iblockId]['DETAIL']),
                            'EXCLUDE' => unserialize($_REQUEST['IBLOCK_ADDITIONAL'][$iblockId]['EXCLUDE']),
                        ];

                        $result = SitemapIblockTable::add(array(
                            'SITEMAP_ID' => $ID,
                            'IBLOCK_ID' => intval($iblockId),
                            'SETTINGS' => serialize(SitemapIblock::prepareSettings($iblockSettings)),
                        ));
                    }
                }
            }

            $isAgent = \Luxar\Sitemap\SitemapAgent::checkExist($ID)?'Y':'N';
            $needAgent = isset($_REQUEST['IS_AGENT'])?'Y':'N';

            if ($isAgent != $needAgent) {
                if ($isAgent == 'Y') {
                    \Luxar\Sitemap\SitemapAgent::remove($ID);
                }
                else {
                    \Luxar\Sitemap\SitemapAgent::add($ID);
                }
            }

            if($_REQUEST["save"] <> '')
            {
                LocalRedirect(BX_ROOT."/admin/".$module_id."_sitemap.php?lang=".LANGUAGE_ID);
            }
            elseif($_REQUEST["save_and_add"] <> '')
            {
                LocalRedirect(BX_ROOT."/admin/".$module_id."_sitemap.php?lang=".LANGUAGE_ID."&run=".$ID."&".bitrix_sessid_get());
            }
            else
            {
                LocalRedirect(BX_ROOT."/admin/".$module_id."_sitemap_edit.php?lang=".LANGUAGE_ID."&ID=".$ID."&".$tabControl->ActiveTabParam());
            }
        }
        else
        {
            $errors = $result->getErrorMessages();
        }
    }
}

function seo_getDir($bLogical, $site_id, $dir, $depth, $checked, $arChecked = array())
{
    if(!is_array($arChecked))
        $arChecked = array();

    $arDirs = \Luxar\Sitemap\SitemapFiles::getDirStructure($bLogical, $site_id, $dir);
    if(count($arDirs) > 0)
    {
        foreach ($arDirs as $arDir)
        {
            $d = Main\IO\Path::combine($dir,$arDir['FILE']);

            $bChecked = $arChecked[$d] === 'Y' || $checked && $arChecked[$d] !== 'N';

            $d = Converter::getHtmlConverter()->encode($d);
            $r = RandString(8);

            $varName = $arDir['TYPE'] == 'D' ? 'DIR' : 'FILE';
            ?>
            <div class="sitemap-dir-item">
                <?
                if($arDir['TYPE']=='D'):
                    ?>
                <span onclick="loadDir(<?=$bLogical?'true':'false'?>, this, '<?=CUtil::JSEscape($d)?>', '<?=$r?>', '<?=$depth+1?>', BX('DIR_<?=$d?>').checked)" class="sitemap-tree-icon"></span><?
                endif;
                ?><span class="sitemap-dir-item-text">
                    <input type="hidden" name="<?=$varName?>[<?=$d?>]" value="N" />
                    <input type="checkbox" name="<?=$varName?>[<?=$d?>]" id="DIR_<?=$d?>"<?=$bChecked ? ' checked="checked"' : ''?> value="Y" onclick="checkAll('<?=$r?>', this.checked);" />
                    <label for="DIR_<?=$d?>"><?=Converter::getHtmlConverter()->encode($arDir['NAME'].($bLogical ? (' ('.$arDir['FILE'].')') : ''))?></label>
                </span>
                <div id="subdirs_<?=$r?>" class="sitemap-dir-item-children"></div>
            </div>
            <?
        }
    }
    else
    {
        echo Loc::getMessage('SEO_SITEMAP_NO_DIRS_FOUND');
    }
}

function seo_getIblock($iblockId, $sectionId, $sectionChecked, $elementChecked, $arSectionChecked = array(), $arElementChecked = array())
{
    $dbIblock = \CIBlock::GetByID($iblockId);
    $arIBlock = $dbIblock->Fetch();
    if(is_array($arIBlock))
    {
        $bSection = strlen($arIBlock['SECTION_PAGE_URL']) > 0;
        $bElement = strlen($arIBlock['DETAIL_PAGE_URL']) > 0;

        $dbRes = \CIBlockSection::GetList(
            array('SORT' => 'ASC', 'NAME' => 'ASC'),
            array(
                'IBLOCK_ID' => $iblockId,
                'SECTION_ID' => $sectionId,
                'ACTIVE' => 'Y',
                'CHECK_PERMISSIONS' => 'Y'
            )
        );
        $bFound = false;
        while ($arRes = $dbRes->Fetch())
        {
            $r = RandString(8);
            $d = $arRes['ID'];

            $bSectionChecked = $bSection && ($arSectionChecked[$d] === 'Y' || $sectionChecked && $arSectionChecked[$d] !== 'N');
            $bElementChecked = $bElement && ($arElementChecked[$d] === 'Y' || $elementChecked && $arElementChecked[$d] !== 'N');


            if(!$bFound)
            {
                $bFound = true;
                ?>
                <table class="internal" style="width: 100%;">
                <tr class="heading">
                    <td colspan="2"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_SECTION_NAME')?></td>
                    <td width="100"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_SECTION_SECTION')?></td>
                    <td width="100"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_SECTION_ELEMENTS')?></td>
                </tr>
                <?
            }
            ?>
            <tr>
                <td width="20"><span onclick="loadIblock(this, '<?=$arRes['IBLOCK_ID']?>', '<?=$d?>', '<?=$r?>', BX('IBLOCK_SECTION_SECTION_<?=$d?>').checked, BX('IBLOCK_SECTION_ELEMENT_<?=$d?>').checked);" class="sitemap-tree-icon-iblock"></span></td>
                <td><a href="iblock_list_admin.php?lang=<?=LANGUAGE_ID?>&amp;IBLOCK_ID=<?=$arRes['IBLOCK_ID']?>&amp;find_section_section=<?=$d?>"><?=Converter::getHtmlConverter()->encode($arRes['NAME'])?></a></td>
                <td align="center">
                    <input type="hidden" name="IBLOCK_SECTION_SECTION[<?=$iblockId?>][<?=$d?>]" value="N" />
                    <input type="checkbox" name="IBLOCK_SECTION_SECTION[<?=$iblockId?>][<?=$d?>]" id="IBLOCK_SECTION_SECTION_<?=$d?>" value="Y"<?=$bSection?'':' disabled="disabled"'?><?=$bSectionChecked?' checked="checked"':''?> data-type="section" onclick="checkAllSection('<?=$r?>', this.checked);" />
                    <label for="IBLOCK_SECTION_SECTION_<?=$d?>"><?=Loc::getMessage('MAIN_YES')?></label>
                </td>
                <td align="center"><input type="hidden" name="IBLOCK_SECTION_ELEMENT[<?=$iblockId?>][<?=$d?>]" value="N" /><input type="checkbox" name="IBLOCK_SECTION_ELEMENT[<?=$iblockId?>][<?=$d?>]" id="IBLOCK_SECTION_ELEMENT_<?=$d?>" value="Y"<?=$bElement?'':' disabled="disabled"'?><?=$bElementChecked?' checked="checked"':''?> data-type="element" onclick="checkAllElement('<?=$r?>', this.checked);" />&nbsp;<label for="IBLOCK_SECTION_ELEMENT_<?=$d?>"><?=Loc::getMessage('MAIN_YES')?></label></td>
            </tr>
            <tr style="display: none" id="subdirs_row_<?=$r?>">
                <td colspan="4" id="subdirs_<?=$r?>" align="center"></td>
            </tr>
            <?
        }

        if(!$bFound)
        {
            echo Loc::getMessage('SEO_SITEMAP_NO_DIRS_FOUND');
        }
    }
}

function getSitemapItemSettings($name, $values = [], $type = 'iblock') {

    ?>
    <?if($type == 'iblock'):?>
        <div class="additional__settings">
        <table>
        <tr>
            <td><label><?=GetMessage("LUXAR_INDEXCONTROL_MINIMALQNOE_KOLICEST")?></label></td>
            <td><input type="text" name="<?=$name?>[MIN_COUNT_ELEMENT]" value="<?=(int)$values['MIN_COUNT_ELEMENT']?>"></td>
        </tr>
    <?endif?>
    <?
    $changefreq  = [
        'always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'
    ];
    ?>
    <tr>
        <td><label><?=GetMessage("LUXAR_INDEXCONTROL_VYBERITE")?></label></td>
        <td>
            <select name="<?=$name?>[changefreq]">
                <?foreach ($changefreq as $value):?>
                    <option value="<?=$value?>"<?if($value == $values['changefreq']):?> selected<?endif?>><?=$value?></option>
                <?endforeach;?>
            </select>
        </td>
    </tr>
    <?
    $priority  = [
        '1', '0.9', '0.8', '0.7', '0.6', '0.5', '0.4', '0.3', '0.2', '0.1'
    ];
    ?>
    <tr>
        <td><label><?=GetMessage("LUXAR_INDEXCONTROL_VYBERITE1")?></label></td>
        <td>
            <select name="<?=$name?>[priority]">
                <?foreach($priority as $value):?>
                    <option value="<?=$value?>"<?if($value == $values['priority']):?> selected<?endif?>><?=$value?></option>
                <?endforeach;?>
            </select>
        </td>
    </tr>
    <?if($type == 'iblock'):?>
        </table>
        </div>
    <?endif?>
    <?
}

// load directory structure
if(isset($_REQUEST['dir']) && check_bitrix_sessid())
{
    $bLogical = $_REQUEST['log'] == 'Y';
    $dir = $_REQUEST['dir'];
    $depth = intval($_REQUEST['depth']);
    $checked = $_REQUEST['checked'] == 'Y';

    $APPLICATION->RestartBuffer();

    if(!is_array($arSitemap['SETTINGS']['DIR']))
        $arSitemap['SETTINGS']['DIR'] = array();
    if(!is_array($arSitemap['SETTINGS']['FILE']))
        $arSitemap['SETTINGS']['FILE'] = array();

    $arChecked = array_merge($arSitemap['SETTINGS']['DIR'], $arSitemap['SETTINGS']['FILE']);

    seo_getDir($bLogical, $SITE_ID, $dir, $depth, $checked, $arChecked);
    die();
}

// load iblock structure
if($bIBlock && isset($_REQUEST['iblock']) && check_bitrix_sessid())
{
    $iblock = intval($_REQUEST['iblock']);
    $section = intval($_REQUEST['section']);
    $sectionChecked = $_REQUEST['section_checked'] == 'Y';
    $elementChecked = $_REQUEST['element_checked'] == 'Y';

    $APPLICATION->RestartBuffer();

    if(is_array($arSitemap['SETTINGS']['IBLOCK_SECTION_SECTION'][$iblock]) || is_array($arSitemap['SETTINGS']['IBLOCK_SECTION_ELEMENT'][$iblock]))
    {
        echo seo_getIblock($iblock, $section, $sectionChecked, $elementChecked, $arSitemap['SETTINGS']['IBLOCK_SECTION_SECTION'][$iblock], $arSitemap['SETTINGS']['IBLOCK_SECTION_ELEMENT'][$iblock]);
    }
    else
    {
        echo seo_getIblock($iblock, $section, $sectionChecked, $elementChecked);
    }
    die();
}

if($ID <= 0)
{
    $arSitemap = array(
        "NAME" => Loc::getMessage('SITEMAP_NAME_DEFAULT', array('#SITE#' => '['.$arSite['LID'].'] '.$arSite['NAME'], "#DATE#" => ConvertTimeStamp())),
        "DESCRIPTION" => '',

        "ACTIVE" => "Y",
        "DATE_RUN" => "",
        "SETTINGS" => array(
            "PROTO" => 1,
            'IBLOCK' => [],
            'FILE' => [],
            'FILE_SETTINGS' => [],
            "FILE_MASK" => Sitemap::SETTINGS_DEFAULT_FILE_MASK,
            "logical" => 'Y',
            "FILENAME_INDEX" => "sitemap.xml",
            "FILENAME_FILES" => "sitemap_files.xml",
            "FILENAME_IBLOCK" => "sitemap_iblock_#IBLOCK_ID#.xml",
            "FILENAME_SEOMETA" => "sitemap_seometa.xml",
            "FILENAME_OTHER" => "sitemap_other.xml",
            "SEOMETA_GENERATE" => 'Y',
            "SEOMETA_MIN_COUNT_ELEMENT" => '0',

            'FILE_ADD_DIR_SLASH' => 'Y',
            'FILE_DELETE_INDEX_PHP' => 'Y',

            'MAX_COUNT_URL' => 50000,
            'MAX_FILE_SIZE' => 50000000,

            'OTHER' => '',
        )
    );
}

if(!empty($errors))
{
    $arSitemap["NAME"] = $_REQUEST['NAME'];
    $arSitemap["DESCRIPTION"] = $_REQUEST['DESCRIPTION'];
    $arSitemap["SETTINGS"]["PROTO"] = $_REQUEST['PROTO'];
    $arSitemap["SETTINGS"]["DOMAIN"] = $_REQUEST['DOMAIN'];
    $arSitemap["SETTINGS"]["DOCUMENT_ROOT"] = $_REQUEST['DOCUMENT_ROOT'];

    $arSitemap["SETTINGS"]["MAX_COUNT_URL"] = !empty($_REQUEST['MAX_COUNT_URL'])?(int)$_REQUEST['MAX_COUNT_URL']:'';
    $arSitemap["SETTINGS"]["MAX_FILE_SIZE"] = !empty($_REQUEST['MAX_FILE_SIZE'])?(int)$_REQUEST['MAX_FILE_SIZE']:'';

    $arSitemap["SETTINGS"]["FILENAME_INDEX"] = trim($_REQUEST['FILENAME_INDEX']);
    $arSitemap["SETTINGS"]["FILENAME_FILES"] = trim($_REQUEST['FILENAME_FILES']);
    $arSitemap["SETTINGS"]["FILENAME_IBLOCK"] = trim($_REQUEST['FILENAME_IBLOCK']);

    $arSitemap["SETTINGS"]["FILE_MASK"] = trim($_REQUEST['FILE_MASK']);
    $arSitemap["SETTINGS"]["logical"] = $_REQUEST['log'] == 'N' ? 'N' : 'Y';
    $arSitemap["SETTINGS"]["DIR"] = $_REQUEST['DIR'];
    $arSitemap["SETTINGS"]["FILE"] = $_REQUEST['FILE'];
    $arSitemap["SETTINGS"]["FILE_SETTINGS"] = $_REQUEST['FILE_SETTINGS'];

    $arSitemap["SETTINGS"]["IBLOCK_ACTIVE"] = $_REQUEST['IBLOCK_ACTIVE'];
    $arSitemap["SETTINGS"]["IBLOCK_LIST"] = $_REQUEST['IBLOCK_LIST'];
    $arSitemap["SETTINGS"]["IBLOCK_SECTION"] = $_REQUEST['IBLOCK_SECTION'];
    $arSitemap["SETTINGS"]["IBLOCK_ELEMENT"] = $_REQUEST['IBLOCK_ELEMENT'];
    $arSitemap["SETTINGS"]["IBLOCK_SECTION_SECTION"] = $_REQUEST['IBLOCK_SECTION_SECTION'];
    $arSitemap["SETTINGS"]["IBLOCK_SECTION_ELEMENT"] = $_REQUEST['IBLOCK_SECTION_ELEMENT'];
    $arSitemap["SETTINGS"]["SEOMETA_GENERATE"] = $_REQUEST['SEOMETA_GENERATE'];
    $arSitemap["SETTINGS"]["SEOMETA_MIN_COUNT_ELEMENT"] = $_REQUEST['SEOMETA_MIN_COUNT_ELEMENT'];

    $arSitemap["SETTINGS"]["OTHER"] = $_REQUEST['OTHER'];
}

$bLogical = $arSitemap['SETTINGS']['logical'] != 'N';

$APPLICATION->SetAdditionalCSS("/bitrix/panel/seo/sitemap.css");

$APPLICATION->SetTitle($ID > 0 ? Loc::getMessage("SEO_SITEMAP_EDIT_TITLE") : Loc::getMessage("SEO_SITEMAP_ADD_TITLE"));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

$aMenu = array();

$aMenu[] = array(
    "TEXT"	=> Loc::getMessage("SITEMAP_LIST"),
    "LINK"	=> "/bitrix/admin/".$module_id."_sitemap.php?lang=".LANGUAGE_ID,
    "ICON"	=> "btn_list",
    "TITLE"	=> Loc::getMessage("SITEMAP_LIST_TITLE"),
);
if ($ID > 0)
{
    $aMenu[] = array(
        "TEXT"	=> Loc::getMessage("SITEMAP_DELETE"),
        "LINK"	=> "javascript:if(confirm('".Loc::getMessage("SITEMAP_DELETE_CONFIRM")."')) window.location='/bitrix/admin/".$module_id."_sitemap_edit.php?action=delete&ID=".$ID."&lang=".LANGUAGE_ID."&".bitrix_sessid_get()."';",
        "ICON"	=> "btn_delete",
        "TITLE"	=> Loc::getMessage("SITEMAP_DELETE_TITLE"),
    );
}

$context = new CAdminContextMenu($aMenu);
$context->Show();

if(!empty($errors))
{
    CAdminMessage::ShowMessage(join("\n", $errors));
}

echo CLuxarSitemap::GetDemoMessage();
?>
<form method="POST" action="<?=POST_FORM_ACTION_URI?>" name="sitemap_form">
    <input type="hidden" name="ID" value="<?=$ID?>">
    <input type="hidden" name="site_id" value="<?=$SITE_ID?>">
<?
$tabControl->Begin();
$tabControl->BeginNextTab();
?>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_NAME")?>:</td>
        <td width="60%"><input type="text" name="NAME" value="<?=Converter::getHtmlConverter()->encode($arSitemap["NAME"])?>" style="width:70%"></td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage("SITEMAP_DESCRIPTION")?>:</td>
        <td width="60%"><textarea name="DESCRIPTION" style="width:70%"><?=Converter::getHtmlConverter()->encode($arSitemap["DESCRIPTION"])?></textarea></td>
    </tr>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_FILENAME_ADDRESS")?>:</td>
        <td width="60%">
            <select name="PROTO">
                <option value="0"<?=$arSitemap['SETTINGS']['PROTO'] == 0 ? ' selected="selected"' : ''?>>http</option>
                <option value="1"<?=$arSitemap['SETTINGS']['PROTO'] == 1 ? ' selected="selected"' : ''?>>https</option>
            </select> <b>://</b> <select name="DOMAIN">
                <?
                foreach($arSite['DOMAINS'] as $domain):
                    $hd = Converter::getHtmlConverter()->encode($domain);
                    $hdc = Converter::getHtmlConverter()->encode(CBXPunycode::ToUnicode($domain, $e = null));
                    ?>
                    <option value="<?=$hd?>"<?=$domain == $arSitemap['SETTINGS']['DOMAIN'] ? ' selected="selected"' : ''?>><?=$hdc?></option>
                <?
                endforeach;
                ?>
            </select> <b><?=Converter::getHtmlConverter()->encode($arSite['DIR']);?></b> <input type="text" name="FILENAME_INDEX" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["FILENAME_INDEX"])?>" /></td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage("LUXAR_INDEXCONTROL_DOCUMENT_ROOT")?>:</td>
        <td width="60%">
            <input type="text" id="DOCUMENT_ROOT" name="DOCUMENT_ROOT" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["DOCUMENT_ROOT"])?>" style="width:50%">
            <a href="#" onclick="document.getElementById('DOCUMENT_ROOT').value = '<?=$_SERVER['DOCUMENT_ROOT']?>'; return false;"><?=Loc::getMessage("LUXAR_INDEXCONTROL_INSERT_CURRENT")?></a>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <style>
            .adm-info-message{margin-top:0 !important;}
        </style>
        <td><?echo BeginNote(),Loc::getMessage("SITEMAP_FILENAME_ADDRESS_ATTENTION"),EndNote();?></td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage("SITEMAP_MAX_COUNT_URL")?>:</td>
        <td width="60%"><input type="text" name="MAX_COUNT_URL" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["MAX_COUNT_URL"])?>" style="width:70%" placeholder="50000"></td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage("SITEMAP_MAX_FILE_SIZE")?>:</td>
        <td width="60%"><input type="text" name="MAX_FILE_SIZE" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["MAX_FILE_SIZE"])?>" style="width:70%" placeholder="50000000"></td>
    </tr>
    <tr>
        <td width="40%">&nbsp;</td>
        <td width="60%">
            <label><input type="checkbox" name="IS_AGENT" value="Y"<?if(\Luxar\Sitemap\SitemapAgent::checkExist($ID)):?> checked<?endif?>> <?=GetMessage("LUXAR_INDEXCONTROL_AVTOMATICESKAA_GENER")?></label>
        </td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage('SITEMAP_LAST_RUN')?>:</td>
        <td width="60%"><?=$arSitemap['LAST_RUN'] ? $arSitemap['LAST_RUN'] : Loc::getMessage('SITEMAP_DATE_RUN_NEVER')?></td>
    </tr>
<?
$tabControl->BeginNextTab();

$startDir = HtmlFilter::encode($arSite['DIR']);
$bChecked = isset($arSitemap['SETTINGS']['DIR'])
    ? $arSitemap['SETTINGS']['DIR'][$startDir] == 'Y'
    : false;
?>
    <script>
        var loadedDirs = {};
        function loadDir(bLogical, sw, dir, div, depth, checked)
        {
            div = 'subdirs_' + div;
            if(!!sw && BX.hasClass(sw, 'sitemap-opened'))
            {
                BX(div).style.display = 'none';
                BX.removeClass(sw, 'sitemap-opened')
            }
            else if (div != 'subdirs_<?=$startDir?>' && !!loadedDirs[div])
            {
                if(sw)
                {
                    BX.addClass(sw, 'sitemap-opened');
                }
                BX(div).style.display = 'block';
            }
            else
            {
                BX.ajax.get('<?=$APPLICATION->GetCurPageParam('', array('dir', 'depth'))?>', {dir:dir,depth:depth,checked:checked?'Y':'N',log:bLogical?'Y':'N',sessid:BX.bitrix_sessid()}, function(res)
                {
                    BX(div).innerHTML = res;
                    BX(div).style.display = 'block';
                    if(sw)
                    {
                        BX.addClass(sw, 'sitemap-opened');
                    }
                    loadedDirs[div] = true;
                    BX.adminFormTools.modifyFormElements(BX(div));
                });
            }

            BX.onCustomEvent('onAdminTabsChange');
        }

        var bChanged = false;
        function switchLogic(l)
        {
            if(!bChanged || confirm('<?=CUtil::JSEscape(Loc::getMessage('SEO_SITEMAP_LOGIC_WARNING'))?>'))
            {
                loadDir(l, null, '<?=$startDir?>', '<?=$startDir?>', 0, BX('DIR_<?=$startDir?>').checked);
                bChanged = false;
            }
            else
            {
                BX('log_' +(l ? 'N' : 'Y')).checked = true;
            }
        }

        function checkAll(div, v)
        {
            bChanged = true;
            _check_all(div, {tagName:'INPUT',property:{type:'checkbox'}}, v);
        }

        function _check_all(div, isElement, v)
        {
            var c = BX.findChildren(BX('subdirs_' + div), isElement, true);
            for(var i = 0; i < c.length; i++)
            {
                c[i].checked = v;
            }
        }
    </script>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_FILENAME_FILE")?>:</td>
        <td width="60%"><input type="text" name="FILENAME_FILES" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["FILENAME_FILES"])?>" style="width:70%"></td>
    </tr>
    <tr>
        <td width="40%"><?= Loc::getMessage("SITE_MAP_ADD_SLASH_IN_DIR") ?></td>
        <td width="60%">
            <input type="hidden" name="FILE_ADD_DIR_SLASH" value="N">
            <input type="checkbox" name="FILE_ADD_DIR_SLASH" value="Y"<?=$arSitemap['SETTINGS']["FILE_ADD_DIR_SLASH"]=='Y'?' checked':''?>>
        </td>
    </tr>
    <tr>
        <td width="40%"><?=GetMessage("LUXAR_INDEXCONTROL_UBIRATQ")?></td>
        <td width="60%">
            <input type="hidden" name="FILE_DELETE_INDEX_PHP" value="N">
            <input type="checkbox" name="FILE_DELETE_INDEX_PHP" value="Y"<?=$arSitemap['SETTINGS']["FILE_DELETE_INDEX_PHP"]=='Y'?' checked':''?>>
        </td>
    </tr>
<?getSitemapItemSettings('FILE_SETTINGS', $arSitemap['SETTINGS']['FILE_SETTINGS'], 'files')?>
    <tr>
        <td width="40%" valign="top"><?=Loc::getMessage('SEO_SITEMAP_STRUCTURE_FILE_MASK')?>: </td>
        <td width="60%"><input type="text" name="FILE_MASK" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']['FILE_MASK'])?>" />
            <?
            echo BeginNote();
            echo Loc::getMessage('SEO_FILE_MASK_HELP');
            echo EndNote();
            ?>
            <br>
        </td>
    </tr>
    <tr>
        <td width="40%" valign="top"><?=Loc::getMessage('SEO_SITEMAP_STRUCTURE_TYPE')?>:</td>
        <td width="60%">
            <input type="radio" name="log" id="log_Y" value="Y"<?=$bLogical ? ' checked="checked"' : ''?> onclick="switchLogic(true)" /><label for="log_Y"><?=Loc::getMessage('SEO_SITEMAP_STRUCTURE_TYPE_Y')?></label><br />
            <input type="radio" name="log" id="log_N" value="N"<?=$bLogical ? '' : ' checked="checked"'?> onclick="switchLogic(false)" /><label for="log_N"><?=Loc::getMessage('SEO_SITEMAP_STRUCTURE_TYPE_N')?></label>
        </td>
    </tr>

    <tr>
        <td width="40%" valign="top"><?=Loc::getMessage('SEO_SITEMAP_STRUCTURE')?>: </td>
        <td width="60%">
            <input type="hidden" name="DIR[<?=$startDir?>]" value="N" /><input type="checkbox" name="DIR[<?=$startDir?>]" id="DIR_<?=$startDir?>"<?=$bChecked ? ' checked="checked"' : ''?> value="Y" onclick="checkAll('<?=$startDir?>', this.checked);" />&nbsp;<label for="DIR_<?=$startDir?>"><?=$startDir?></label></div>
            <div id="subdirs_<?=$startDir?>">
                <?
                if(is_array($arSitemap['SETTINGS']['FILE']))
                {
                    foreach($arSitemap['SETTINGS']['FILE'] as $dir => $value)
                    {
                        ?>
                        <input type="hidden" name="FILE[<?=Converter::getHtmlConverter()->encode($dir);?>]" value="<?=$value=='N'?'N':'Y'?>" />
                        <?
                    }
                }
                else
                {
                    $arSitemap['SETTINGS']['FILE'] = array();
                }

                if(is_array($arSitemap['SETTINGS']['DIR']))
                {
                    foreach($arSitemap['SETTINGS']['DIR'] as $dir => $value)
                    {
                        if($dir != $startDir)
                        {
                            ?>
                            <input type="hidden" name="DIR[<?=Converter::getHtmlConverter()->encode($dir);?>]" value="<?=$value=='N'?'N':'Y'?>" />
                            <?
                        }
                    }

                }
                else
                {
                    $arSitemap['SETTINGS']['DIR'] = array();
                }

                $arChecked = array_merge($arSitemap['SETTINGS']['DIR'], $arSitemap['SETTINGS']['FILE']);

                seo_getDir($bLogical, $SITE_ID, $startDir, 1, $bChecked, $arChecked);
                ?>
        </td>
    </tr>

<?
if($bIBlock)
{
    $tabControl->BeginNextTab();
    ?>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_FILENAME_IBLOCK")?>:</td>
        <td width="60%"><input type="text" name="FILENAME_IBLOCK" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["FILENAME_IBLOCK"])?>" style="width:70%"></td>
    </tr>

    <tr>
        <td colspan="2" align="center">
            <?
            $resTypes = CIBlockType::GetList(
                ['SORT' => 'ASC', 'ID' => 'ASC'],
                [
                    'LANGUAGE_ID' => LANGUAGE_ID,
                ]
            );
            while ($arType = $resTypes->Fetch()):
                $arIBType = CIBlockType::GetByIDLang($arType["ID"], LANGUAGE_ID);

                $dbRes = CIBlock::GetList(array('SORT' => 'ASC', "ID" => "ASC"), array(
                    'TYPE' => $arType['ID'],
                    'SITE_ID' => $SITE_ID,
                ));
                if ($dbRes->result->num_rows < 1) {
                    continue;
                }

                $selected = false;
                $arIBLOCKs = [];
                while ($arRes = $dbRes->Fetch()) {
                    if (isset($arSitemap['SETTINGS']['IBLOCK'][$arRes['ID']])) {
                        $selected = true;
                        $arRes['SELECTED'] = 'Y';
                    }
                    else {
                        $arRes['SELECTED'] = 'N';
                    }
                    $arIBLOCKs[] = $arRes;
                }
                ?>
                <div class="type_list__container">
                    <div class="type_list__title">
                        <label>
                            <input type="checkbox" name="iblock_type[]" value="<?=$arType['ID']?>"<?if($selected):?> checked<?endif?>>
                            <?=$arIBType['NAME']?> [<?=$arType['ID']?>]
                        </label>
                    </div>

                    <div class="type_list__iblock" id="type_<?=$arType['ID']?>"<?if(!$selected):?> style="display: none;"<?endif?>>

                        <table class="internal" style="width: 100%;">
                            <tr class="heading">
                                <td colspan="3"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_NAME')?></td>
                                <td width="100"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_LIST')?></td>
                                <td width="100"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_SECTIONS')?></td>
                                <td width="120"><?=Loc::getMessage('SEO_SITEMAP_IBLOCK_ELEMENTS')?></td>
                            </tr>
                            <?
                            foreach ($arIBLOCKs as $arRes):

                                $r = RandString(8);
                                $d = $arRes['ID'];

                                $iblockSettings = $arSitemap['SETTINGS']['IBLOCK'][$d]['SETTINGS'];

                                $bList = strlen($arRes['LIST_PAGE_URL']) > 0;
                                $bListChecked = $bList && $iblockSettings['LIST'] != 'N';

                                $bSection = strlen($arRes['SECTION_PAGE_URL']) > 0;
                                $bSectionChecked = $bSection && $iblockSettings['SECTION'] != 'N';

                                $bElement = strlen($arRes['DETAIL_PAGE_URL']) > 0;
                                $bElementChecked = $bElement && $iblockSettings['ELEMENT'] != 'N';

                                $bAuto = ($bElementChecked || $bSectionChecked) && $arSitemap['SETTINGS']['IBLOCK_AUTO'][$d] == 'Y';

                                //$bActive = !isset($arSitemap['SETTINGS']['IBLOCK_ACTIVE']) || $arSitemap['SETTINGS']['IBLOCK_ACTIVE'][$d] == 'Y';
                                $bActive = $arRes['SELECTED'] == 'Y';
                                ?>
                                <tr>
                                    <td width="20"><span onclick="loadIblock(this, '<?=$d?>', '0', '<?=$r?>', BX('IBLOCK_SECTION_<?=$d?>').checked, BX('IBLOCK_ELEMENT_<?=$d?>').checked);" class="sitemap-tree-icon-iblock"></span></td>
                                    <td<?=$bActive ? ' class="active"' : ' style="text-decoration:line-through"'?>>
                                        <input type="hidden" name="IBLOCK_ACTIVE[<?=$d?>]" value="N" />
                                        <input type="checkbox" name="IBLOCK_ACTIVE[<?=$d?>]" id="IBLOCK_ACTIVE_<?=$r?>" onclick="setIblockActive(this, '<?=$r?>')"<?=$bActive ? ' checked="checked"' : ''?> value="Y" />
                                        <input type="hidden" name="IBLOCK_ADDITIONAL[<?=$d?>][MIN_COUNT_ELEMENT]" value="<?=htmlspecialchars($iblockSettings['MIN_COUNT_ELEMENT'])?>" id="MIN_COUNT_ELEMENT_<?=$d?>">
                                        <input type="hidden" name="IBLOCK_ADDITIONAL[<?=$d?>][DETAIL]" value="<?=!empty($iblockSettings['DETAIL'])?htmlspecialchars(serialize($iblockSettings['DETAIL'])):''?>" id="DETAIL_<?=$d?>">
                                        <input type="hidden" name="IBLOCK_ADDITIONAL[<?=$d?>][EXCLUDE]" value="<?=!empty($iblockSettings['EXCLUDE'])?htmlspecialchars(serialize($iblockSettings['EXCLUDE'])):''?>" id="EXCLUDE_<?=$d?>">
                                        <a href="/bitrix/admin/iblock_edit.php?lang=<?=LANGUAGE_ID?>&amp;ID=<?=$d?>&amp;type=<?=$arRes['IBLOCK_TYPE_ID']?>&amp;admin=Y" target="_blank">[<?=$arRes['ID']?>] <?=Converter::getHtmlConverter()->encode($arRes['NAME'].' ('.$arRes['CODE'].')')?></a>
                                    </td>
                                    <td width="50">
                                        <input type="button" onclick="showDetailIblockSettings(<?=$arRes['ID']?>);" class="" value="<?=GetMessage("LUXAR_INDEXCONTROL_NASTROYKI")?>"></td>
                                    <td align="center">
                                        <input type="hidden" name="IBLOCK_LIST[<?=$d?>]" value="N" />
                                        <input type="checkbox" name="IBLOCK_LIST[<?=$d?>]" id="IBLOCK_LIST_<?=$d?>" value="Y"<?=$bList?'':' disabled="disabled"'?><?=$bListChecked?' checked="checked"':''?> />&nbsp;<label for="IBLOCK_LIST_<?=$d?>"><?=Loc::getMessage('MAIN_YES')?></label></td>
                                    <td align="center">

                                        <input type="hidden" name="IBLOCK_SECTION[<?=$d?>]" value="N" /><input type="checkbox" name="IBLOCK_SECTION[<?=$d?>]" id="IBLOCK_SECTION_<?=$d?>" value="Y"<?=$bSection?'':' disabled="disabled"'?><?=$bSectionChecked?' checked="checked"':''?> onclick="checkAllSection('<?=$r?>', this.checked);" />&nbsp;<label for="IBLOCK_SECTION_<?=$d?>"><?=Loc::getMessage('MAIN_YES')?></label></td>
                                    <td align="center"><input type="hidden" name="IBLOCK_ELEMENT[<?=$d?>]" value="N" /><input type="checkbox" name="IBLOCK_ELEMENT[<?=$d?>]" id="IBLOCK_ELEMENT_<?=$d?>" value="Y"<?=$bElement?'':' disabled="disabled"'?><?=$bElementChecked?' checked="checked"':''?> onclick="checkAllElement('<?=$r?>', this.checked);" />&nbsp;<label for="IBLOCK_ELEMENT_<?=$d?>"><?=Loc::getMessage('MAIN_YES')?></label></td>
                                </tr>
                                <tr style="display: none" id="subdirs_row_<?=$r?>">
                                    <?

                                    if(is_array($arSitemap['SETTINGS']['IBLOCK_SECTION_SECTION'][$arRes['ID']]))
                                    {
                                        foreach($arSitemap['SETTINGS']['IBLOCK_SECTION_SECTION'][$arRes['ID']] as $dir => $value)
                                        {
                                            ?>
                                            <input type="hidden" name="IBLOCK_SECTION_SECTION[<?=$arRes['ID']?>][<?=Converter::getHtmlConverter()->encode($dir);?>]" value="<?=$value=='N'?'N':'Y'?>" />
                                            <?
                                        }
                                    }

                                    if(is_array($arSitemap['SETTINGS']['IBLOCK_SECTION_ELEMENT'][$arRes['ID']]))
                                    {
                                        foreach($arSitemap['SETTINGS']['IBLOCK_SECTION_ELEMENT'][$arRes['ID']] as $dir => $value)
                                        {
                                            ?>
                                            <input type="hidden" name="IBLOCK_SECTION_ELEMENT[<?=$arRes['ID']?>][<?=Converter::getHtmlConverter()->encode($dir);?>]" value="<?=$value=='N'?'N':'Y'?>" />
                                            <?
                                        }
                                    }
                                    ?>
                                    <td colspan="6" align="center" id="subdirs_<?=$r?>"></td>
                                </tr>
                            <?endforeach;?>
                        </table>
                    </div>
                </div>
            <?endwhile;?>
            <script>
                var loadedDirs = {};
                function loadDir(bLogical, sw, dir, div, depth, checked)
                {
                    div = 'subdirs_' + div;
                    if(!!sw && BX.hasClass(sw, 'sitemap-opened'))
                    {
                        BX(div).style.display = 'none';
                        BX.removeClass(sw, 'sitemap-opened')
                    }
                    else if (div != 'subdirs_<?=$startDir?>' && !!loadedDirs[div])
                    {
                        if(sw)
                        {
                            BX.addClass(sw, 'sitemap-opened');
                        }
                        BX(div).style.display = 'block';
                    }
                    else
                    {
                        BX.ajax.get('<?=$APPLICATION->GetCurPageParam('', array('dir', 'depth'))?>', {dir:dir,depth:depth,checked:checked?'Y':'N',log:bLogical?'Y':'N',sessid:BX.bitrix_sessid()}, function(res)
                        {
                            BX(div).innerHTML = res;
                            BX(div).style.display = 'block';
                            if(sw)
                            {
                                BX.addClass(sw, 'sitemap-opened');
                            }
                            loadedDirs[div] = true;
                            BX.adminFormTools.modifyFormElements(BX(div));
                        });
                    }

                    BX.onCustomEvent('onAdminTabsChange');
                }

                var bChanged = false;
                function switchLogic(l)
                {
                    if(!bChanged || confirm('<?=CUtil::JSEscape(Loc::getMessage('SEO_SITEMAP_LOGIC_WARNING'))?>'))
                    {
                        loadDir(l, null, '<?=$startDir?>', '<?=$startDir?>', 0, BX('DIR_<?=$startDir?>').checked);
                        bChanged = false;
                    }
                    else
                    {
                        BX('log_' +(l ? 'N' : 'Y')).checked = true;
                    }
                }

                function checkAll(div, v)
                {
                    bChanged = true;
                    _check_all(div, {tagName:'INPUT',property:{type:'checkbox'}}, v);
                }

                function _check_all(div, isElement, v)
                {
                    var c = BX.findChildren(BX('subdirs_' + div), isElement, true);
                    for(var i = 0; i < c.length; i++)
                    {
                        c[i].checked = v;
                    }
                }
            </script>
            <script>
                var loadedIblocks = {};
                function loadIblock(sw, iblock, section, div, section_checked, element_checked)
                {
                    if(!!BX('IBLOCK_ACTIVE_' + div) && !BX('IBLOCK_ACTIVE_' + div).checked)
                        return;

                    var row = 'subdirs_row_' + div,
                        div = 'subdirs_' + div;

                    if(!!sw && BX.hasClass(sw, 'sitemap-opened'))
                    {
                        BX(row).style.display = 'none';
                        BX.removeClass(sw, 'sitemap-opened');
                    }
                    else if (!!loadedIblocks[div])
                    {
                        if(sw)
                        {
                            BX.addClass(sw, 'sitemap-opened');
                        }

                        BX(row).style.display = '';
                    }
                    else
                    {
                        BX(div).innerHTML = BX.message('JS_CORE_LOADING');
                        BX.ajax.get('<?=$APPLICATION->GetCurPageParam('', array('dir', 'iblock', 'section', 'depth'))?>', {iblock:iblock,section:section,section_checked:section_checked?'Y':'N',element_checked:element_checked?'Y':'N',sessid:BX.bitrix_sessid()}, function(res)
                        {
                            BX(div).innerHTML = res;
                            BX(row).style.display = '';
                            if(sw)
                            {
                                BX.addClass(sw, 'sitemap-opened');
                            }
                            loadedIblocks[div] = true;
                            BX.adminFormTools.modifyFormElements(BX(div));
                        });
                    }

                    BX.onCustomEvent('onAdminTabsChange');
                }

                function checkAllSection(div, v)
                {
                    _check_all(div, {tagName:'INPUT',property:{type:'checkbox'}, attribute:{'data-type':'section'}}, v);
                }

                function checkAllElement(div, v)
                {
                    _check_all(div, {tagName:'INPUT',property:{type:'checkbox'}, attribute:{'data-type':'element'}}, v);
                }

                function setIblockActive(check, cont)
                {
                    var row = check.parentNode.parentNode;

                    if(!check.checked)
                    {
                        row.cells[1].style.textDecoration = 'line-through';
                        BX('subdirs_row_' + cont).style.display = 'none';
                        $(row.cells[1]).removeClass('active');
                    }
                    else
                    {
                        row.cells[1].style.textDecoration = 'none';
                        $(row.cells[1]).addClass('active');
                    }

                }

                $(document).ready(function () {
                    $('input[type="checkbox"][name="iblock_type[]"]').on('change', function () {
                        var iblock_type_id = $(this).attr('value');

                        if ($(this).is(':checked')) {
                            $('#type_'+ iblock_type_id).slideDown('fast');
                        }
                        else {
                            $('#type_'+ iblock_type_id).slideUp('fast');
                        }

                        return false;
                    });
                });
            </script>
            <script>
                function showDetailIblockSettings(id)
                {
                    if (!obDetailWindow)
                    {
                        var url = '/bitrix/admin/<?=$module_id?>_sitemap_iblock_detail_settings.php?lang=ru&bxpublic=Y&SITEMAP_ID=<?=$ID?>';
                        url+= '&IBLOCK_ID='+ id;
                        <?
                        if ($ID == 0) {
                        ?>
                        url+= '&DETAIL='+ $('#DETAIL_'+ id).val();
                        url+= '&MIN_COUNT_ELEMENT='+ $('#MIN_COUNT_ELEMENT_'+ id).val();
                        url+= '&EXCLUDE='+ $('#EXCLUDE_'+ id).val();
                        <?
                        }
                        ?>
                        console.log(url);
                        var obDetailWindow = new BX.CAdminDialog({
                            'content_url': url,
                            'content_post': '<?=bitrix_sessid_get()?>',
                            'width': 900, 'height': 550,
                            'resizable': true
                        });
                        obDetailWindow.Show();
                    }
                }
                function setDetailData(data)
                {
                    var json = JSON.parse(data);
                    $('#MIN_COUNT_ELEMENT_'+ json.IBLOCK_ID).val(json.MIN_COUNT_ELEMENT);
                    $('#DETAIL_'+ json.IBLOCK_ID).val(json.DETAIL);
                    $('#EXCLUDE_'+ json.IBLOCK_ID).val(json.EXCLUDE);
                }
            </script>
        </td>
    </tr>
    <?
}
if($bSeoMeta)
{
    $tabControl->BeginNextTab();
    ?>
    <tr>
        <td width="40%"><?=Loc::getMessage("SITEMAP_SEOMETA_GENERATE")?>:</td>
        <td width="60%">
            <input type="hidden" name="SEOMETA_GENERATE" value="N">
            <input type="checkbox" name="SEOMETA_GENERATE" value="Y"<?if($arSitemap['SETTINGS']['SEOMETA_GENERATE'] == 'Y'):?> checked<?endif;?>>
        </td>
    </tr>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_FILENAME_SEOMETA")?>:</td>
        <td width="60%"><input type="text" name="FILENAME_SEOMETA" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["FILENAME_SEOMETA"])?>" style="width:70%"></td>
    </tr>
    <tr>
        <td><label><?=GetMessage("LUXAR_INDEXCONTROL_MINIMALQNOE_KOLICEST1")?></label></td>
        <td><input type="text" name="SEOMETA_MIN_COUNT_ELEMENT" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']['SEOMETA_MIN_COUNT_ELEMENT'])?>"></td>
    </tr>
    <?
}

$tabControl->BeginNextTab();
?>
    <tr class="adm-detail-required-field">
        <td width="40%"><?=Loc::getMessage("SITEMAP_FILENAME_OTHER")?>:</td>
        <td width="60%"><input type="text" name="FILENAME_OTHER" value="<?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']["FILENAME_OTHER"])?>" style="width:70%"></td>
    </tr>
    <tr>
        <td width="40%"><?=Loc::getMessage("SITEMAP_OTHER_TEXT")?>:</td>
        <td width="60%">
            <textarea name="OTHER[strings]" id="OTHER_STRINGS" style="width: 70%; height: 200px;"><?=Converter::getHtmlConverter()->encode($arSitemap['SETTINGS']['OTHER']['strings'])?></textarea>
        </td>
    </tr>
<?getSitemapItemSettings('OTHER', $arSitemap['SETTINGS']['OTHER'], 'other')?>
<?
$tabControl->Buttons(array());
?>
    <input type="submit" name="save_and_add" value="<?=Converter::getHtmlConverter()->encode(Loc::getMessage('SEO_SITEMAP_SAVEANDRUN'))?>" />
<?=bitrix_sessid_post();?>
<?
$tabControl->End();

require_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>