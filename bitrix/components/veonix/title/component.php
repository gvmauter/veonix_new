<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult['TITLE_1'] = $arParams["TEMPLATE_FOR_TITLE1"];
$arResult['TITLE_2'] = $arParams["TEMPLATE_FOR_TITLE2"];
$arResult['TITLE_3'] = $arParams["TEMPLATE_FOR_TITLE3"];
$arResult['TITLE_4'] = $arParams["TEMPLATE_FOR_TITLE4"];
$arResult['BT_TEXT'] = $arParams["TEMPLATE_FORBT_TEXT_TITLE4"];
$arResult['TEXT_1'] = $arParams["TEXT_1"];
$arResult['TEXT_1_GR'] = $arParams["TEXT_1_GR"];
$arResult['TEXT_2'] = $arParams["TEXT_2"];
$arResult['TEXT_2_GR'] = $arParams["TEXT_2_GR"];

$this->IncludeComponentTemplate();
?>