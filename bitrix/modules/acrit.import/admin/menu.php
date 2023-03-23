<?php

IncludeModuleLangFile( __FILE__ );

if( $APPLICATION->GetGroupRight( "acrit.import" ) != "D" ){
	$aMenu = array(
		"parent_menu" => "global_menu_acrit",
		"section" => GetMessage( "ACRIT_IMPORT_MENU_SECTION" ),
		"sort" => 100,
		"text" => GetMessage( "ACRIT_IMPORT_MENU_SECTION" ),
		"title" => GetMessage( "ACRIT_IMPORT_MENU_TEXT" ),
		"url" => "",
		"icon" => "acrit_import_menu_icon",
		"page_icon" => "",
		"items_id" => "menu_acrit.import",
		"items" => array(
			array(
				"text" => GetMessage( "ACRIT_IMPORT_MENU_TITLE" ),
				"url" => "acrit.import_list.php?lang=".LANGUAGE_ID,
				"more_url" => array(
                    "acrit_import_list.php",
                    "acrit_import_edit.php"
                ),
				"title" => GetMessage( "ACRIT_IMPORT_MENU_TITLE" ),
			),
			array(
				"text" => GetMessage( "ACRIT_IMPORT_MENU_SETTINGS" ),
				"url" => "settings.php?lang=ru&mid=acrit.import&mid_menu=1",
				"more_url" => array( "settings.php?lang=ru&mid=acrit.import&mid_menu=1" ),
				"title" => GetMessage( "ACRIT_IMPORT_MENU_SETTINGS" )
			),
            array(
                "text" => GetMessage( "ACRIT_IMPORT_MENU_SUPPORT" ),
                "url" => "acrit.import_support.php",
                "more_url" => array( "acrit_import_support.php" ),
                "title" => GetMessage( "ACRIT_IMPORT_MENU_SUPPORT" )
            ),
		)
	);
	return $aMenu;
}
return false;