<?
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\ProfileTable;
/* @var $obMcartXls McartXls */

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/mcart.xls/prolog.php");
Loc::loadMessages(__FILE__);
$APPLICATION->SetTitle(Loc::getMessage("MCART_XLS_TITLE"));

if(!($RIGHT = McartXls::checkAccess('R'))){
    return;
}
$obMcartXls = McartXls::getInstance();
if(!$obMcartXls->checkRequirements()){
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
    $obMcartXls->showErrors();
    return;
}

$sTableID = ProfileTable::getTableName();
$oSort = new CAdminSorting($sTableID, 'NAME', 'asc');
$lAdmin = new CAdminUiList($sTableID, $oSort);

if ($RIGHT >= 'W'){
    $lAdmin->AddAdminContextMenu([
        [
          "TEXT"=>Loc::getMessage("MCART_XLS_PROFILE_ADD"),
          "LINK"=>"mcart_xls_profile_edit.php?lang=".LANGUAGE_ID,
          "TITLE"=>Loc::getMessage("MCART_XLS_PROFILE_ADD"),
          "ICON"=>"btn_new",
        ],
    ]);
    $obRequest = Application::getInstance()->getContext()->getRequest();
    if (check_bitrix_sessid() && $obRequest->getQuery('action') === 'delete'){
        $profileId = (int)$obRequest->getQuery('ID');
        if($profileId > 0){
            $result = ProfileTable::delete($profileId);
            if (!$result->isSuccess()) {
                require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
                \CAdminMessage::ShowMessage(implode('<br />', $result->getErrorMessages()));
                echo '<br /><a class="adm-btn" href="mcart_xls_index.php?lang='.LANGUAGE_ID.'">'.Loc::getMessage("MCART_XLS_BACK").'</a>';
                return;
            }
        }
        LocalRedirect('mcart_xls_index.php?lang='.LANGUAGE_ID);
    }
}

$lAdmin->AddHeaders([
    [
        "id" => "ID",
        "content" => "ID",
        "sort" => "id",
        "align" => "right",
        "default" => true,
    ],
    [
        "id" => "NAME",
        "content" => Loc::getMessage("MCART_XLS_COL_NAME"),
        "sort" => "name",
        "default" => true,
    ],
    [
        "id" => "COLUMNS",
        "content" => Loc::getMessage("MCART_XLS_PROFILE_COLUMNS"),
        "sort" => "",
        "default" => true,
    ],
    [
        "id" => "IBLOCK",
        "content" => Loc::getMessage("MCART_XLS_COL_IBLOCK"),
        "sort" => "iblock.name",
        "default" => true,
    ],
    [
        "id" => "IMPORT",
        "content" => Loc::getMessage("MCART_XLS_TO_IMPORT"),
        "sort" => "",
        "default" => true,
    ],
]);

$rsData = ProfileTable::getList([
	'order'  => [strtoupper(strip_tags($by)) => strip_tags($order)],
	'select' => ['ID', 'NAME', 'IBLOCK_ID', 'IBLOCK.NAME', 'IBLOCK.IBLOCK_TYPE_ID']
]);
$rsData = new CAdminUiResult($rsData, $sTableID);
$rsData->NavStart();
$lAdmin->SetNavigationParams($rsData);
while ($arRes = $rsData->fetch()){

	$urlEdit = 'mcart_xls_profile_edit.php?ID='.$arRes['ID'].'&lang='.LANGUAGE_ID;

    // создаем строку. результат - экземпляр класса CAdminListRow
    $row =& $lAdmin->AddRow($arRes['ID'], $arRes, $urlEdit);

    $row->AddViewField("COLUMNS", '<a href="mcart_xls_profile_columns.php?PROFILE_ID='.$arRes['ID'].'&lang='.LANGUAGE_ID.'">'
        .Loc::getMessage("MCART_XLS_PROFILE_COLUMNS").'</a>');

    $row->AddViewField(
        "IBLOCK",
        '<a href="iblock_edit.php?type='.$arRes['MCART_XLS_ORM_PROFILE_IBLOCK_IBLOCK_TYPE_ID'].'&ID='.$arRes['IBLOCK_ID'].'&lang='.LANGUAGE_ID.'">'.
            $arRes['MCART_XLS_ORM_PROFILE_IBLOCK_NAME'].
        '</a>'
    );

    if ($RIGHT < 'W'){
        $row->AddViewField("ID", $arRes['ID']);
        $row->AddViewField("NAME", $arRes['NAME']);
        continue;
    }
    $row->AddViewField("ID", '<a href="'.$urlEdit.'">'.$arRes['ID'].'</a>');
    $row->AddViewField("NAME", '<a href="'.$urlEdit.'">'.htmlspecialcharsex($arRes['NAME']).'</a>');

    $row->AddViewField("IMPORT", '<a href="mcart_xls_profile_import.php?PROFILE_ID='.$arRes['ID'].'&lang='.LANGUAGE_ID.'">'
        .'<img src="/bitrix/images/mcart.xls/mcartexcel_m.png" /></a>');

	$arActions = [];
    $arActions[] = [
        "ICON" => "edit",
        "TEXT" => Loc::getMessage('MCART_XLS_EDIT'),
        "ACTION" => $lAdmin->ActionRedirect($urlEdit),
    ];
    $arActions[] = [
        "ICON" => "list",
        "TEXT" => Loc::getMessage("MCART_XLS_PROFILE_COLUMNS"),
        "ACTION" => $lAdmin->ActionRedirect("mcart_xls_profile_columns.php?PROFILE_ID=".$arRes['ID']."&lang=".LANGUAGE_ID),
    ];
    $arActions[] = [
        "ICON" => "add",
        "TEXT" => Loc::getMessage("MCART_XLS_TO_IMPORT"),
        "ACTION" => $lAdmin->ActionRedirect("mcart_xls_profile_import.php?PROFILE_ID=".$arRes['ID']."&lang=".LANGUAGE_ID),
    ];
    $arActions[] = [
        'ICON'=>'delete',
        'TEXT' => Loc::getMessage('MCART_XLS_DELETE'),
        'ACTION' => 'if(confirm("'.GetMessageJS('MCART_XLS_DELETE').'?")) '.
            $lAdmin->ActionRedirect('mcart_xls_index.php?action=delete&ID='.$arRes['ID'].'&lang='.LANGUAGE_ID.'&'.bitrix_sessid_get())
    ];
	$row->AddActions($arActions);
}

$lAdmin->CheckListMode();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
//--------------------------//
?>
<style type="text/css">
    .popup-window.popup-window-no-paddings .popup-window-content[id$="_grid_page_size_menu"]{
        overflow-x: hidden;
        padding-right: 5px;
    }
</style><?
// выведем таблицу списка элементов
$lAdmin->DisplayList();

echo BeginNote();
    echo '<h3>'.Loc::getMessage("MCART_XLS_REQUIREMENT_CHECK").'</h3>';
    echo '<ul>';
    foreach ($obMcartXls->getRequirementsList() as $ar) {
        echo '<li>'.$ar['NAME'];
        if(!$ar['isRequired']){
            echo ' (optional)';
        }
        echo ' ... '.($ar['VALUE']? Loc::getMessage("MCART_XLS_REQUIREMENT_CHECK_PASSED") : Loc::getMessage("MCART_XLS_REQUIREMENT_CHECK_FAILED")).'</li>';
    }
    echo '</ul>';
echo EndNote();

//--------------------------//
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");