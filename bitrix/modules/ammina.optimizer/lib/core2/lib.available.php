<?

namespace Ammina\Optimizer\Core2;

use Bitrix\Main\Composite\Helper;

class LibAvailable
{
	static public function doCheckLibrary()
	{
		$arResult = array(
			"bxoptions" => array(
				"composite" => false,
			),
			"packages" => array(
				"dom" => false,
				"curl" => false,
			),
			"other" => array(
				"googleapi" => false,
				"amminabxapi" => false,
			),
		);
		$arResult['bxoptions']['composite'] = self::doCheckBxOptionsComposite();

		$arResult['packages']['dom'] = self::doCheckDom();
		$arResult['packages']['curl'] = self::doCheckCurl();

		$arResult['other']['googleapi'] = self::doCheckGoogleAPI();
		$arResult['other']['amminabxapi'] = self::doCheckAmminaAPI();

		\COption::SetOptionString("ammina.optimizer", "libs_checked", "Y");
		\COption::SetOptionString("ammina.optimizer", "libs_checked_data", serialize($arResult));

		return $arResult;
	}

	static public function doCheckDom()
	{
		return class_exists("DOMDocument");
	}

	static public function doCheckCurl()
	{
		return function_exists("curl_init");
	}

	static public function doCheckGoogleAPI()
	{
		return amopt_strlen(\COption::GetOptionString("ammina.optimizer", "google_pagespeed_apikey", "")) > 0;
	}

	static public function doCheckAmminaAPI()
	{
		$str = \COption::GetOptionString("ammina.optimizer", "amminabx_apikey", "");
		if (amopt_strlen($str) > 0) {
			return true;
		}
		return false;
	}

	static public function getCurrentCheckData()
	{
		$arResult = \unserialize(\COption::GetOptionString("ammina.optimizer", "libs_checked_data", serialize(array())));
		if (empty($arResult)) {
			return self::doCheckLibrary();
		}
		return $arResult;
	}

	static public function doCheckBxOptionsComposite()
	{
		if (class_exists('\\Bitrix\\Main\\Composite\\Helper')) {
			if (Helper::isOn()) {
				return false;
			}
		}
		return true;
	}

}