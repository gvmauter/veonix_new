<?php
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

class DelightResourcePreloader{
	const MODULE_ID = "delight.resourcepreloader";
	
	// Функция проверяет, соблюдены ли все условия для работы модуля
	static function CanProcess(){
		if (isset($_GET["noresourcepreloader"]))
			return false;
		if(strpos($_SERVER["REQUEST_URI"], '/bitrix/admin/') === 0){
			return false;
		}
		if(\Bitrix\Main\Config\Option::get(static::MODULE_ID, "enabled") != "Y"){
			return false;
		}
		return true;
	}
	
	public static function DelightResourcePreloaderOnEndBufferContentHandler(&$content){
		if (DelightResourcePreloader::CanProcess()){
			$result_links = array();
			if(\Bitrix\Main\Config\Option::get(static::MODULE_ID, "only_head") == "Y"){
				// Обработка только раздела head
				preg_match("#<head(\s+[^>]*)?>(?<inner_head>.+?)</head>#is", $content, $match_head);
				$proccess_content = $match_head["inner_head"];
			} else {
				$proccess_content = $content;
			}
			// Обрабатываем существующие preload (для совместимости с Safari)
			$exception_links = array();
			preg_match_all("/<link[^>]*\s*?rel\s*?=\s*?[\"']preload[\"'][^>]*?>/i", $proccess_content, $match_links);
			foreach ($match_links[0] as $link) {
				preg_match_all("#\s*?(?<key>[^\s]+?)\s*?=\s*?[\"'](?<val>.+?)[\"']#", $link, $match_attrs, PREG_SET_ORDER);
				foreach ($match_attrs as $attr){
					if(strcasecmp($attr['key'], "href") == 0){
						$exception_links[] = $attr["val"];
					}
				}
			}
			// Обрабатываем CSS
			preg_match_all("/<link[^>]*\s*?rel\s*?=\s*?[\"']stylesheet[\"'][^>]*?>/i", $proccess_content, $match_links);
			foreach ($match_links[0] as $link) {
				preg_match_all("#\s*?(?<key>[^\s]+?)\s*?=\s*?[\"'](?<val>.+?)[\"']#", $link, $match_attrs, PREG_SET_ORDER);
				foreach ($match_attrs as $attr){
					if((strcasecmp($attr['key'], "href") == 0) AND (!in_array($attr["val"], $exception_links))){
						$result_links[] = '<link href="'.$attr["val"].'" rel="preload" as="style">';
					}
				}
			}
			// Обрабатываем JS
			preg_match_all("/<script[^>]*src\s*?=\s*?[\"'](?<link>.+?)[\"']/i", $proccess_content, $match_links);
			foreach ($match_links["link"] as $link) {
				if(!in_array($link, $exception_links)){
					$result_links[] = '<link href="'.$link.'" rel="preload" as="script">';
				}
			}
			
			if(!empty($result_links)){
				$result_links_str = implode("", $result_links);
				$content = preg_replace('/(<head.*?>)/i', '$0'.$result_links_str, $content, 1);
			}
		}
	}
}