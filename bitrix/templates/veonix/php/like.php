<?
$ID_POST = $_POST["id"];

setcookie("post_".$ID_POST, "true", time()+3600000, "/");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
$el = new CIBlockElement;

$resElement = \CIBlockElement::GetList(
    [],
    [
        'IBLOCK_ID' => 22,
        'ID' => $ID_POST,
    ],
    false,
    false,
    [
        'ID',
        'IBLOCK_ID',
        'PROPERTY_LIKE',
    ]
);

if ( !($element = $resElement->getNext() ) )
{
    echo "Элемент не найден";
    return;
}



$PROP = array();
$PROP[66] = (int)$element["PROPERTY_LIKE_VALUE"]+1;  

$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
 
  "PROPERTY_VALUES"=> $PROP,

  );


$res = $el->Update($ID_POST, $arLoadProductArray);


?>