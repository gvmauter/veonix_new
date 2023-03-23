<?if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die(); ?>
<?php

$BANNER = CFile::ResizeImageGet(
    $arResult["PROPERTIES"]["BANNER"]["VALUE"],
    Array("width" => 1920, "height" => 100000),
    BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
  );

  $APPLICATION->SetPageProperty('og_image',$BANNER["src"] );
  $APPLICATION->SetPageProperty("class_page", "portfilio_pages");
  if ($arResult["PROPERTIES"]["HEADER"]["VALUE_XML_ID"]) {
    $header_color = "headers_".$arResult["PROPERTIES"]["HEADER"]["VALUE_XML_ID"];
  } else {
    $header_color = "headers_BLACK";
  };
  $APPLICATION->SetPageProperty('header_color',$header_color );
  $APPLICATION->SetPageProperty('breadcrumb_status',"no" );



?>
