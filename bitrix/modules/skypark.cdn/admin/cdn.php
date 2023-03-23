<?php
define("ADMIN_MODULE_NAME", "skypark.cdn");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");

/** @global CMain $APPLICATION */
/** @global CUser $USER */
if (!$USER->IsAdmin())
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));



    
        
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.ADMIN_MODULE_NAME.'/options.php');