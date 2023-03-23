<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
"GROUPS" => array(),
"PARAMETERS" => array(
"TEMPLATE_FOR_TITLE1" => array(
    "PARENT" => "BASE",
    "NAME" => "Начало заголовка",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "",
),
"TEMPLATE_FOR_TITLE2" => array(
    "PARENT" => "BASE",
    "NAME" => "Слово [Градиент и звезды]",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "",
),
"TEMPLATE_FOR_TITLE3" => array(
    "PARENT" => "BASE",
    "NAME" => "Конец заголовка",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
"TEXT_1" => array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => "Текст №1",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
"TEXT_1_GR" => array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => "Текст №1 [слово градиент]",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
"TEXT_2" => array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => "Текст №2",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
"TEXT_2_GR" => array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => "Текст №2 [слово градиент]",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
"BT_TEXT" => array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => "Текст кнопки",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "Обсудить задачу",
),
 

),
);
?>