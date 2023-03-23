<?
namespace Luxar\Sitemap;

use Bitrix\Main\Loader;

class SitemapSeometa {

	public static function prepareSettings($arFields) {

		$newArFields = $arFields;

		return $newArFields;
	}

	public static function generate($arSitemap) {

		if (
			!Loader::includeModule('sotbit.seometa')
			|| $arSitemap['SETTINGS']['SEOMETA_GENERATE'] != 'Y'
		) {
			return false;
		}

		$fileNameArray = [];
		$domain = Sitemap::getDomain($arSitemap);

		$arConditions = [];

		$connection = \Bitrix\Main\Application::getConnection();

		$sql = "SELECT `ID`, `SITES`, `CHANGEFREQ`, `PRIORITY` FROM `b_sotbit_seometa`";
		$sql.= " WHERE `ACTIVE` = 'Y'";
		$sql.= " AND `NO_INDEX` = 'N'";

		$resCondition = $connection->query($sql);
		while($arCondition = $resCondition->fetch()) {
			$sites = unserialize($arCondition['SITES']);

			if (!in_array($arSitemap['SITE_ID'], $sites)) {
				continue;
			}

			$arConditions[$arCondition['ID']] = $arCondition;
		}

		if (count($arConditions) < 1) {
			return false;
		}

		// TODO бработка, если выбраны не все условия
		// TODO Обработка фильтра событиями битрикса

		$sql = "SELECT `ID`, `NEW_URL`, `CONDITION_ID`, `DATE_CHANGE` FROM `b_sotbit_seometa_chpu`";
		$sql.= " WHERE `ACTIVE` = 'Y'";
		if ((int)$arSitemap['SETTINGS']['SEOMETA_MIN_COUNT_ELEMENT'] > 0) {
			$sql.= " AND `PRODUCT_COUNT` >= ".(int)$arSitemap['SETTINGS']['SEOMETA_MIN_COUNT_ELEMENT'];
		}
		$sql.= " AND `CONDITION_ID` IN (".implode(',', array_keys($arConditions)).")";

		$fileName = $arSitemap['SETTINGS']['FILENAME_SEOMETA'];
		$fileNameWithOutXML = substr($fileName, 0, -4);

		$tmpFileName = $fileName.'.tmp';
		$docRoot = Sitemap::getDocumentRoot($arSitemap);

        $MAX_FILE_SIZE = Sitemap::$MAX_FILE_SIZE;
        if (!empty($arSitemap['SETTINGS']['MAX_FILE_SIZE']) && $arSitemap['SETTINGS']['MAX_FILE_SIZE'] > 1) {
            $MAX_FILE_SIZE = $arSitemap['SETTINGS']['MAX_FILE_SIZE'];
        }

		$MAX_URL_COUNT = Sitemap::$MAX_URL_COUNT;
		if (!empty($arSitemap['SETTINGS']['MAX_COUNT_URL']) && $arSitemap['SETTINGS']['MAX_COUNT_URL'] > 1) {
			$MAX_URL_COUNT = $arSitemap['SETTINGS']['MAX_COUNT_URL'];
		}

		$arrTmpFiles = [];
		$arrTmpFiles[] = $tmpFileName;

		$countUrl = 0;

		if (Sitemap::$DEBUG) {
			echo "\tFile name {$fileName}\n";
			echo "\tTemp file name {$tmpFileName}\n";
			echo "\tDocument root {$docRoot}\n";
		}

		$fp = fopen($docRoot.'/'.$tmpFileName, 'a');

		$line = Sitemap::FILE_START;
		fputs($fp, $line);

		$resUrl = $connection->query($sql);
		while($arUrl = $resUrl->fetch()) {

			$line = Sitemap::arrayToXML([
				'url' => $domain.$arUrl['NEW_URL'],
				'changefreq' => $arConditions[$arUrl['CONDITION_ID']]['CHANGEFREQ'],
				'priority' => $arConditions[$arUrl['CONDITION_ID']]['PRIORITY'],
				'date' => $arUrl['DATE_CHANGE'],
			]);
			if (!$line) {
				continue;
			}

			fputs($fp, $line);
			$countUrl++;

			// Может в функцию завернуть?
			$newFile = false;

			if ($countUrl % 50 == 0) {
				if (filesize($docRoot.'/'.$tmpFileName) >= $MAX_FILE_SIZE) {
					$newFile = true;
				}
			}

			if ($countUrl == $MAX_URL_COUNT) {
				$newFile = true;
			}

			if ($newFile) {

				$line = Sitemap::FILE_END;
				fputs($fp, $line);
				fclose($fp);

				$tmpFileName = $fileNameWithOutXML.'.part'.(count($arrTmpFiles)).'.xml.tmp';
				$arrTmpFiles[] = $tmpFileName;
				$countUrl = 0;

				$fp = fopen($docRoot.'/'.$tmpFileName, 'a');

				$line = Sitemap::FILE_START;
				fputs($fp, $line);
			}
		}

		$line = Sitemap::FILE_END;
		fputs($fp, $line);

		fclose($fp);

		foreach ($arrTmpFiles as $file) {
			$fileName = substr($file, 0, -4);

			if (is_file($docRoot.'/'.$fileName)) {
				unlink($docRoot.'/'.$fileName);
			}

			rename($docRoot.'/'.$file, $docRoot.'/'.$fileName);
			$fileNameArray[] = $fileName;
		}

		return $fileNameArray;
	}

}