<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
"GROUPS" => array(),
"PARAMETERS" => array(
"TITLE_1" => array(
    "PARENT" => "BASE",
    "NAME" => "Начало заголовка",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "",
),
"TITLE_2" => array(
    "PARENT" => "BASE",
    "NAME" => "Слово [Градиент и звезды]",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "",
),
"TITLE_3" => array(
    "PARENT" => "BASE",
    "NAME" => "Конец заголовка",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => "",
),
"TYPE" => array(
    "PARENT" => "BASE",
    "NAME" => "Список услуг",
    "TYPE" => "LIST",
    "VALUES" => array(
        "all" => "Все услуги",
        "website" => "Сайты",
        "prezent" => "Презентации",
        "branding" => "Брендинг",
        "text" => "Свое",
     ),
     "DEFAULT" => "all",
),
"TYPE_TEXT" => array(
    "PARENT" => "BASE",
    "NAME" => "Свой список",
    "TYPE" => "STRING",
    "MULTIPLE" => "N",
    "DEFAULT" => " ",
),
 

),
);
?>