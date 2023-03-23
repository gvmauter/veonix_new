<?
define("MODULE_ID", "acrit.import");
$module_id = MODULE_ID;

$incl_res = CModule::IncludeModuleEx(MODULE_ID);
switch ($incl_res) {
    case MODULE_NOT_FOUND:
        echo BeginNote();
        echo '<span class="required">'.GetMessage('ACRIT_IMPORT_WARN_MODULE_NOT_FOUND').'</span>';
        echo EndNote();
        break;
    case MODULE_DEMO:
        echo BeginNote();
        echo '<span class="required">'.GetMessage('ACRIT_IMPORT_WARN_MODULE_DEMO').'</span>';
        echo EndNote();
        break;
    case MODULE_DEMO_EXPIRED:
        echo BeginNote();
        echo '<span class="required">'.GetMessage('ACRIT_IMPORT_WARN_MODULE_DEMO_EXPIRED').'</span>';
        echo EndNote();
        break;
    default: // MODULE_INSTALLED
}

\Bitrix\Main\Loader::includeModule('catalog');
\Bitrix\Main\Loader::includeModule('currency');

use Bitrix\Main,
    Acrit\Import,
    Bitrix\Main\Localization\Loc;

$RIGHT = $APPLICATION->GetGroupRight(MODULE_ID);
if ($RIGHT < "R")
    return false;


/**
 * Options list
 */

$arCurrencies = array();
$cur_def = '';
$res = \Bitrix\Currency\CurrencyTable::getList(array());
while ($arItem = $res->fetch()) {
    $arCurrencies[$arItem['CURRENCY']] = $arItem['CURRENCY'];
    if ($arItem['BASE'] == 'Y') {
        $cur_def = $arItem['CURRENCY'];
    }
}

$arStores = array();
$res = \Bitrix\Catalog\StoreTable::getList(array(
    'order' => array('ID' => 'asc'),
    'filter' => array('ACTIVE'=>'Y'),
));
while ($arItem = $res->fetch()) {
    $arStores[$arItem['ID']] = $arItem['TITLE'].' ('.$arItem['ID'].')';
}

$aTabs = array(
    'main' => array(
        'TAB' => GetMessage("ACRIT_IMPORT_NASTROYKI_MODULA"),//Loc::getMessage('ACRIT_IMPORT_SECTION_TAB'),
        'OPTIONS' => array(
            GetMessage("ACRIT_IMPORT_SETTINGS_MAIN"),
	        array('https',
		        GetMessage("ACRIT_IMPORT_SETTINGS_HTTPS"),
		        CMain::IsHTTPS() ? "Y" : "N",
		        array(
			        "checkbox",
			        "",
			        ""
		        )
	        ),
	        array('php_path',
		        GetMessage("ACRIT_IMPORT_SETTINGS_PHP_PATH"),
		        null,
		        array('text', 52),
	        ),
	        array('indexing',
		        GetMessage("ACRIT_IMPORT_SETTINGS_INDEXING"),
		        "N",
		        array(
			        "checkbox",
			        "",
			        ""
		        )
	        ),
	        array('search_indexing',
		        GetMessage("ACRIT_IMPORT_SETTINGS_SEARCH_INDEXING"),
		        "Y",
		        array(
			        "checkbox",
			        "",
			        ""
		        )
	        ),
            GetMessage("ACRIT_IMPORT_PARAMETRY_LOGIROVANI"),
            array('logs_path',
                GetMessage("ACRIT_IMPORT_PUTQ_K_FAYLU_LOGOV_N"),
                null,
                array('text', 52),
            ),
            array('logs_email',
                'E-mail '.GetMessage("ACRIT_IMPORT_DLA_OTPRAVKI_LOGOV"),
                null,
                array('text', 25),
            ),
            array('logs_events',
                GetMessage("ACRIT_IMPORT_SOHRANATQ_OTCET_V_RA"),
                "N",
                array(
                    "checkbox",
                    "",
                    ""
                )
            ),
        )
    )
);

$arTabs = array(
    array("DIV" => "setting1", "TAB" => GetMessage("ACRIT_IMPORT_NASTROYKI_MODULA"), "ICON" => "main_user_edit", "TITLE" => GetMessage("ACRIT_IMPORT_NASTROYKI_MODULA")),
    array("DIV" => "setting2", "TAB" => GetMessage("ACRIT_IMPORT_TAB1_DESCR"), "ICON" => "main_user_edit", "TITLE" => GetMessage("ACRIT_IMPORT_TAB1_DESCR")),
);

// Check extensions
$ext_not_found = CAcritImport::checkExtensions();
if (!empty($ext_not_found)) {
    $aTabs['main']['OPTIONS'][] = array(
        "note" => GetMessage("ACRIT_IMPORT_SERVER_EXT_NOT_FOUND", array('#MODULE_NAME#' => implode(', ', $ext_not_found))),
    );
}


/**
 * Save data
 */
$tabControl = new CAdminTabControl('tabControl', $arTabs);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($_REQUEST['save']) > 0 && check_bitrix_sessid())
{
    $Update = $_REQUEST['save'];
    foreach ($aTabs as $aTab) {
        __AdmSettingsSaveOptions(MODULE_ID, $aTab['OPTIONS']);
    }
    if( isset( $_REQUEST["ACRITMENU_GROUPNAME"] ) && ( strlen( trim( $_REQUEST["ACRITMENU_GROUPNAME"] ) ) > 0 ) ) {
        COption::SetOptionString( "acrit.import", "acritmenu_groupname", trim( $_REQUEST["ACRITMENU_GROUPNAME"] ) );
    }
    ob_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
    ob_end_clean();

    LocalRedirect($APPLICATION->GetCurPage() . '?lang=' . LANGUAGE_ID . '&mid_menu=1&mid=' . urlencode(MODULE_ID) .
        '&tabControl_active_tab=' . urlencode($_REQUEST['tabControl_active_tab']) . '&sid=' . urlencode($siteId));
}


/**
 * Show form
 */

?>
    <form method='post' action='' name='bootstrap'>
        <? $tabControl->Begin(); 

        //        foreach ($arTabs as $aTab) {
        $tabControl->BeginNextTab();
        __AdmSettingsDrawList(MODULE_ID, $aTabs['main']['OPTIONS']);
		?>

        <tr>
            <td class="heading" colspan="2"><?=GetMessage( "ACRITMENU_GROUPNAME_LABEL" );?></td>
        </tr>
        <tr>
            <td colspan="2" class="adm-detail-content-cell" align="center">
                <input type="text" name="ACRITMENU_GROUPNAME" value="<?=COption::GetOptionString( "acrit.import", "acritmenu_groupname" );?>"/>
            </td>
        </tr>
		<?
        $tabControl->BeginNextTab();
        require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php" ); 

        $tabControl->Buttons(array('btnApply' => false, 'btnCancel' => false, 'btnSaveAndAdd' => false)); ?>

        <?= bitrix_sessid_post(); ?>
        <? $tabControl->End(); ?>
    </form>

    <div class="adm-info-message">
        <a href="https://www.acrit-studio.ru/technical-support/nastroyka-modulya-universalnyy-import/razdel-nastroyki-modulya/" target="_blank"><?=GetMessage("ACRIT_IMPORT_OPTIONS_HELP");?></a>
    </div>
<?