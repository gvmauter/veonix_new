

<?
echo $og_image;
if (empty($og_image)) { $og_image = "/bitrix/templates/veonix/assets/img/og_image.png";}
?>

<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

<meta property="og:locale" content="ru_RU" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?$APPLICATION->ShowProperty('title');?>" />
<meta property="og:description" content="<?$APPLICATION->ShowProperty('description');?>" />
<meta property="og:url" content="https://veonix.ru<?echo $APPLICATION->GetCurPage();?>" />
<meta property="og:site_name" content="Veonix — студия графического дизайна в Москве" />
<meta property="og:image" content="<?echo $og_image;?>" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />