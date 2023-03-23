<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru" style="background: #000;">
<head itemscope itemtype="http://schema.org/WPHeader" >
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title itemprop="headline"><?$APPLICATION->ShowTitle()?></title>
  <meta name="description" content="<?$APPLICATION->ShowProperty('description');?>">
  <meta name="format-detection" content="telephone=no">

  <? if (empty($og_image)) { $og_image = "/bitrix/templates/veonix/assets/img/og_image.png";} ?>
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta property="og:locale" content="ru_RU" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?$APPLICATION->ShowProperty('title');?>" />
  <meta property="og:description" content="<?$APPLICATION->ShowProperty('description');?>" />
  <meta property="og:url" content="https://veonix.ru<?echo $APPLICATION->GetCurPage();?>" />
  <meta property="og:site_name" content="Veonix — студия графического дизайна в Москве" />
  <meta property="og:image" content="<?$APPLICATION->ShowProperty('og_image');?>" />
  <meta property="og:image:width" content="1920" />
  <meta property="og:image:height" content="1280" />
  <meta name="twitter:card" content="summary_large_image" />

  <link rel="icon" href="<?=SITE_TEMPLATE_PATH?>/assets/img/favicon.svg" type=" image/svg+xml">
  
  <?
   $APPLICATION->ShowCSS(true, $bXhtmlStyle);
 
   
    $page = $APPLICATION->GetCurPage();
    $bXhtmlStyle = true;
    $asset = \Bitrix\Main\Page\Asset::getInstance();
    
   
 //   $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/CRITICAL.css");   

        // $css_critic = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/veonix/assets/css/CRITICAL.css");
			  // echo '<style>' . $css_critic  . '</style>';
     



    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/main.css?1");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/fonts.css?2"); 

    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/home.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/webs.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/portfolio.css");   

    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/main.css");   



    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/services.css?5");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/portfolio_website.css?5");   

    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/svg-animate.min.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/jquery.fancybox.min.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/animate.css");   
   // $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/swiper-bundle.min.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/splide.min.css");   
    $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/intlTelInput.css?2");   
  ?>

  <?
    $breadcrumb_status = true;
    echo '<meta http-equiv="Content-Type" content="text/html; charset='.LANG_CHARSET.'"'.($bXhtmlStyle? ' /':'').'>'."\n";
    $APPLICATION->ShowMeta("robots", false, $bXhtmlStyle);
    $APPLICATION->ShowMeta("keywords", false, $bXhtmlStyle);
    $APPLICATION->ShowMeta("description", false, $bXhtmlStyle);
    $APPLICATION->ShowLink("canonical", null, $bXhtmlStyle);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
  ?>

</head>






<body class="<?echo $body; if ($USER->IsAdmin()) echo " admin_true ";?> <?$APPLICATION->ShowProperty('header_color');?> <?$APPLICATION->ShowProperty('class_page');?>"  >
<div id="panel"><?$APPLICATION->ShowPanel();?></div>


<header class="header">
  <div class="main">
    <div class="logo"><a href="/" aria-label="Главная страница"><svg width="44" height="28" viewBox="0 0 44 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M0 0V0.514872C1.78986 0.514872 3.97751 1.11312 7.51598 9.38522L7.68095 9.79543C7.73816 9.93601 7.9018 9.99943 8.03884 9.93291C8.16212 9.87304 8.21844 9.72758 8.16744 9.6003L8.03307 9.26681C7.43704 7.79537 6.00462 0.514872 11.654 0.514872V0H0Z" fill="white"/> <path d="M43.2215 19.7673C42.386 27.7224 31.4083 27.4842 31.4083 27.4842H30.367C30.2247 27.4842 30.1094 27.6004 30.1094 27.7419C30.1094 27.8847 30.2247 28 30.367 28H43.7386V19.7673H43.2215Z" fill="white"/> <path d="M30.1112 0H17.144V0.514872C20.1649 0.514872 18.297 5.13054 18.297 5.13054L17.3147 7.44636L17.1994 7.7182L12.1705 19.5682L12.1687 19.5625L11.8906 20.2153L15.0344 28H15.9511C26.1332 4.57309 26.6485 3.73715 26.6485 3.73715C28.0011 0.555228 29.0357 0.555228 30.1107 0.514872H31.4096C31.4096 0.514872 42.2282 0.555228 42.7049 7.87342H43.2229V0H30.1112Z" fill="white"/> <path d="M37.8921 9.18829C37.4549 13.6798 32.3226 13.6 32.3226 13.6H31.7203C31.5212 13.6057 31.4077 13.6 31.4077 13.6H30.3686C30.2267 13.6 30.1074 13.7197 30.1074 13.8612C30.1074 14.0031 30.2267 14.1175 30.3686 14.1175H31.7203H32.3226C32.3226 14.1175 37.4549 14.0767 37.8921 18.534H38.4088V9.18829H37.8921Z" fill="white"/> </svg></a></div>
    <button class="open_mob_menu" style="display: none;"><span>Menu</span></button>
   
    <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "top_menu",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>

  </div>
</header>

<main class="web" >