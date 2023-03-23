<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

IncludeModuleLangFile(__FILE__);

$arClasses = [
    'cCDNvideo' => 'classes/general/cCDNvideo.php',
    'CDNVideoLoader' => 'lib/autoloader.php',
    'CDNVideo\\CDNChain' => 'lib/CDNVideo/CDNChain.php',
    'CDNVideo\\CDNVideo' => 'lib/CDNVideo/CDNVideo.php',
    'CDNVideo\\Tools\\Settings' => 'lib/CDNVideo/Tools/Settings.php',
    'CDNVideo\\Tools\\Utils' => 'lib/CDNVideo/Tools/Utils.php',
    'CDNVideo\\Tools\\Parser' => 'lib/CDNVideo/Tools/Parser.php',
    'CDNVideo\\Tools\\Client' => 'lib/CDNVideo/Tools/Client.php',
    'CDNVideo\\Tools\\Api' => 'lib/CDNVideo/Tools/Api.php',
];
CModule::AddAutoloadClasses("cdnvideo.ru", $arClasses);
