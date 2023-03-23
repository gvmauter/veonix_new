<?php

use \Bitrix\Main\EventManager;

$event_manager = EventManager::getInstance();
$event_manager->addEventHandler('main', 'OnEndBufferContent',  'deleteKernelScripts');

function deleteKernelScripts(&$content)
{
    global $USER;

    if (defined("ADMIN_SECTION")) {
        return;
    }

    if (is_object($USER) && $USER->IsAuthorized()) {
        $ar_patterns_to_remove = [
            '/<script[^>]+?>var _ba = _ba[^<]+<\/script>/',
        ];
    } else {
        $ar_patterns_to_remove = [
            '/<script.+?src=".+?js\/main\/core\/.+?(\.min|)\.js\?\d+"><\/script\>/',
            '/<script.+?src="\/bitrix\/js\/.+?(\.min|)\.js\?\d+"><\/script\>/',
            '/<link.+?href="\/bitrix\/js\/.+?(\.min|)\.css\?\d+".+?>/',
            '/<link.+?href="\/bitrix\/components\/.+?(\.min|)\.css\?\d+".+?>/',
            '/<script.+?src="\/bitrix\/.+?kernel_main.+?(\.min|)\.js\?\d+"><\/script\>/',
            '/<link.+?href=".+?kernel_main\/kernel_main(\.min|)\.css\?\d+"[^>]+>/',
            '/<link.+?href=".+?main\/popup(\.min|)\.css\?\d+"[^>]+>/',
            '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
            '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
            '/<script[^>]+?>var _ba = _ba[^<]+<\/script>/',
            '/<script[^>]+?>.+?bx-core.*?<\/script>/',
            '/<script[^>]*?>[\s]*BX\.(setCSSList|setJSList)[^<]+<\/script>/',
            '#<script[^>]*?>[^<]+BX\.ready[^<]+<\/script>#',
        ];
    }

    $content = preg_replace($ar_patterns_to_remove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n", $content);
}

EventManager::getInstance()->addEventHandler("main", "OnEndBufferContent", "inlineCssJs");

function inlineCssJs (&$content) {
	global $USER;
	if (!$USER->IsAdmin()) {
        $content = str_replace( "/bitrix/templates/veonix/", "https://cdnv2.weonix.ru/bitrix/templates/veonix/", $content);
        $content = str_replace( '"/upload/', '"https://cdnv2.weonix.ru/upload/', $content);
		//  preg_match_all("/\<link.*href=\"(.*\.css).*\>/i", $content, $matches);
		//  foreach ($matches[1] as $i => $cssPath) {
   
		//  	$cssInline = file_get_contents($_SERVER["DOCUMENT_ROOT"] . $cssPath);
		//  	$content = str_replace($matches[0][$i], '<style>' . $cssInline . "</style>", $content);
		//  }
		
		// preg_match_all("/\<script.*src=\"(.*\.js).*\>/i", $content, $matches);
		// foreach ($matches[1] as $i => $jsPath) {
		// 	$jsInline = file_get_contents($_SERVER["DOCUMENT_ROOT"] . $jsPath);
		// 	$content = str_replace($matches[0][$i], '<script>' . $jsInline . "</script>", $content);
		// }
	}
}



AddEventHandler('main', 'OnEpilog', array('CMainHandlers', 'OnEpilogHandler'));  
class CMainHandlers { 
   public static function OnEpilogHandler() {
      if (isset($_GET['PAGEN_1']) && intval($_GET['PAGEN_1'])>0) {
         $title = $GLOBALS['APPLICATION']->GetTitle();
         $GLOBALS['APPLICATION']->SetPageProperty('title', 'Страница: '.intval($_GET['PAGEN_1']).' | '.$title. ' — veonix.ru');
      }
   }
}
 
 