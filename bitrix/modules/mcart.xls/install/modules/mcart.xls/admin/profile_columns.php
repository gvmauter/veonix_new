<?php

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Admin\ProfileColumns;
use Mcart\Xls\McartXls;
/* @var $obMcartXls McartXls */

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/mcart.xls/prolog.php');
Loc::loadMessages(__FILE__);

$obProfileColumns = new ProfileColumns();
if(!$obProfileColumns->getRight()){
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    return;
}
$obMcartXls = McartXls::getInstance();
if(!$obMcartXls->checkRequirements()){
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    $obMcartXls->showErrors();
    return;
}
try{
    $obProfileColumns->prolog();
} catch (Exception $e) {
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    CAdminMessage::ShowMessage($e->getMessage());
    $obProfileColumns->showBackButton();
    return;
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
//--------------------------//

// выведем таблицу списка элементов
$obProfileColumns->getAdminUiList()->DisplayList();

//--------------------------//
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php');