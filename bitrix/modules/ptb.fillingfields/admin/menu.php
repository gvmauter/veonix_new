<?
#################################################
#   Company: NicLab                  	 	    #
#   Site: http://www.psdtobitrix.ru             #
#   Copyright (c) 2013-2014 NicLab              #
#################################################
?>
<?
IncludeModuleLangFile(__FILE__);

$aMenu = array(
	"parent_menu" => "global_menu_services",
	"text" => GetMessage("PTB_FIELDS_MODULE_MENU_NAME"),
	"icon" => "",
	"title" => GetMessage("PTB_FIELDS_MODULE_MENU_NAME"),
	"url" => "ptb_filling_fields.php?lang=".LANGUAGE_ID,
	"sort" => 9900,
);

return $aMenu;
?>