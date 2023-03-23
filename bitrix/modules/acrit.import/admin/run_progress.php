<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/interface/admin_lib.php");

$count = $_REQUEST['count']?$_REQUEST['count']:0;
$current = $_REQUEST['current']?$_REQUEST['current']:0;

if ($count) {
    if ($current > $count) {
        $current = $count;
    }
    $percent = $current / $count * 100;

    CAdminMessage::ShowMessage(array(
        "MESSAGE" => "",
        "DETAILS" => "#PROGRESS_BAR#",
        "HTML" => true,
        "TYPE" => "PROGRESS",
        "PROGRESS_TOTAL" => 100,
        "PROGRESS_VALUE" => $percent,
    ));
}