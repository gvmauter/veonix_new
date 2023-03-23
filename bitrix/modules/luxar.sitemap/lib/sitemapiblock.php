<?
namespace Luxar\Sitemap;

use Bitrix\Main\Context\Site;
use Bitrix\Main\Entity;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;

class SitemapIblockTable extends Entity\DataManager {

	private static $indexes = [
		'SITEMAP_ID' => 'CREATE INDEX SITEMAPID ON luxar_indexcontrol_sitemap_iblock (SITEMAP_ID)',
	];

	public static function dropIndexes() {
		$connection = \Bitrix\Main\Application::getConnection();

		foreach (self::$indexes as $k => $query) {
			$connection->queryExecute("DROP INDEX ".$k." ON ".self::getTableName());
		}
	}
	public static function addIndexes() {
		$connection = \Bitrix\Main\Application::getConnection();

		foreach (self::$indexes as $k => $query) {
			$connection->queryExecute($query);
		}
	}

	public static function getTableName()
	{
		return 'luxar_indexcontrol_sitemap_iblock';
	}

	public static function getUfId()
	{
		return 'LUXAR_INDEXCONTROL_SITEMAP_IBLOCK';
	}

	public static function getMap()
	{
		return [
			new Entity\IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true
			]),
			new Entity\IntegerField('SITEMAP_ID'),
			new Entity\IntegerField('IBLOCK_ID'),

			new Entity\DatetimeField('DATE_CREATE', [
				'required' => true,
				'default_value' => new \Bitrix\Main\Type\Datetime,
			]),
			new Entity\DatetimeField('TIMESTAMP_X', [
				'required' => true,
				'default_value' => new \Bitrix\Main\Type\Datetime,
			]),

			new Entity\TextField('SETTINGS'),

			new Entity\IntegerField('CREATED'),
			new Entity\IntegerField('MODIFY'),
		];
	}

	public static function createTable()
	{
		$connection = \Bitrix\Main\Application::getInstance()->getConnection();

		if (!$connection->isTableExists(static::getTableName())) {
			static::getEntity()->createDbTable();
			return true;
		} else {
			return false;
		}
	}

	public static function dropTable()
	{
		$connection = \Bitrix\Main\Application::getInstance()->getConnection();

		$connection->dropTable(static::getTableName());
		return true;
	}

	public static function add($arFields) {

		global $USER;

		$arFields['CREATED'] = $USER->GetID();
		$arFields['MODIFY'] = $USER->GetID();

		return parent::add($arFields);
	}

	public static function update($ID, $arFields) {

		global $USER;

		$arFields['MODIFY'] = $USER->GetID();
		$arFields['TIMESTAMP_X'] = new DateTime();

		return parent::update($ID, $arFields);
	}

	public static function clearBySitemap($SITEMAP_ID) {

		$SITEMAP_ID = (int)$SITEMAP_ID;

		if ($SITEMAP_ID > 0) {
			$connection = \Bitrix\Main\Application::getInstance()->getConnection();
			$connection->query("DELETE FROM `".self::getTableName()."` WHERE `SITEMAP_ID` = ".$SITEMAP_ID);
		}
	}

}

class SitemapIblock {

	public static function prepareSettings($arFields) {

		$newArFields = $arFields;

		return $newArFields;
	}

	public static function generate($arSitemap) {

		Loader::includeModule('iblock');

		$fileNameArray = [];

		$domain = Sitemap::getDomain($arSitemap);

		foreach ($arSitemap['SETTINGS']['IBLOCK'] as $IBLOCK_ID => $arSettings) {
			if (Sitemap::$DEBUG) {
				echo "IBLOCK = ".$IBLOCK_ID."\n";
			}

			$iblockSettings = $arSettings['SETTINGS'];

			$fileName = str_replace('#IBLOCK_ID#', $IBLOCK_ID, $arSitemap['SETTINGS']['FILENAME_IBLOCK']);
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

			if ($iblockSettings['LIST'] == 'Y') {

				if (Sitemap::$DEBUG) {
					echo "\tGenerate list\n";
				}

				$arIblock = \CIBlock::GetByID($IBLOCK_ID)->GetNext();

				$arIblock['IBLOCK_ID'] = $arIblock['ID'];
				$arIblock['IBLOCK_CODE'] = $arIblock['CODE'];
				$arIblock['LANG_DIR'] = $arSitemap['SITE']['DIR'];

				$url = SitemapIblock::prepareUrlToReplace($arIblock['LIST_PAGE_URL'], $arSitemap['SITE_ID']);
				$url = \CIBlock::ReplaceDetailUrl($url, $arIblock, false, "");

				$line = Sitemap::arrayToXML([
					'url' => $domain.$url,
					'date' => $arIblock['TIMESTAMP_X'],
					'changefreq' => $iblockSettings['DETAIL']['iblock']['changefreq'],
					'priority' => $iblockSettings['DETAIL']['iblock']['priority'],
				]);
				if (!$line) {
					continue;
				}

				fputs($fp, $line);
				$countUrl++;
			}

			if ($iblockSettings['SECTION'] == 'Y') {

				if (Sitemap::$DEBUG) {
					echo "\tGenerate sections\n";
				}

				// TODO Добавить фильтр по ценам элементов
				// TODO обработка, если выбраны не все разделы

				$arSectionFilter = [
					'IBLOCK_ID' => $IBLOCK_ID,
					'ACTIVE' => 'Y',
					'GLOBAL_ACTIVE' => 'Y',
					'CNT_ACTIVE' => 'Y',
				];

				$event = new \Bitrix\Main\Event('luxar.sitemap', "OnSitemapGenerationFilterIblockSection", array($arSectionFilter));
				$event->send();
				if ($event->getResults()){
					foreach($event->getResults() as $evenResult){
						if($evenResult->getType() == \Bitrix\Main\EventResult::SUCCESS){
							$arSectionFilter = $evenResult->getParameters();
						}
						else if ($evenResult->getType() == \Bitrix\Main\EventResult::ERROR) {
							return false;
						}
					}
				}

				$MIN_COUNT_ELEMENT = (int)$iblockSettings['MIN_COUNT_ELEMENT'];

				$resSections = \CIBlockSection::GetList(
					['ID' => 'ASC'],
					$arSectionFilter,
					$MIN_COUNT_ELEMENT > 0?true:false,
					['ID', 'CODE', 'TIMESTAMP_X', 'SECTION_PAGE_URL'],
                    \CLuxarSitemap::IsDemo() == Loader::MODULE_DEMO?['nTopCount' => 10]:false
				);
				while($arSection = $resSections->GetNext()) {

					if (
						$MIN_COUNT_ELEMENT > 0
						&& $arSection['ELEMENT_CNT'] < $MIN_COUNT_ELEMENT
					) {
						continue;
					}

					$line = Sitemap::arrayToXML([
						'url' => $domain.$arSection['SECTION_PAGE_URL'],
						'date' => $arSection['TIMESTAMP_X'],
						'changefreq' => $iblockSettings['DETAIL']['sections']['changefreq'],
						'priority' => $iblockSettings['DETAIL']['sections']['priority'],
					]);

					if (!$line) {
						continue;
					}

					fputs($fp, $line);
					/*if (Sitemap::$DEBUG) {
						echo $line."\n";
					}*/

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
			}

			if ($iblockSettings['ELEMENT'] == 'Y') {

				// TODO бработка, если выбраны не все разделы
				// TODO маска исключения

				if (Sitemap::$DEBUG) {
					echo "\tGenerate elements\n";
				}

				$arElementFilter = [
					'IBLOCK_ID' => $IBLOCK_ID,
					'ACTIVE' => 'Y',
					'ACTIVE_DATE' => 'Y',
				];

				if (
					$iblockSettings['SECTION'] != 'Y'
					&& !empty($iblockSettings['SECTION_ELEMENT'])
				) {
					$arElementFilter['SECTION_ID'] = $iblockSettings['SECTION_ELEMENT'];
					$arElementFilter['INCLUDE_SUBSECTIONS'] = 'Y';
				}

				if ($iblockSettings['EXCLUDE']) {

					if (
						$iblockSettings['EXCLUDE']['PRICE']['ON'] == 'Y'
						&& !empty($iblockSettings['EXCLUDE']['PRICE']['TYPE'])
						&& !empty($iblockSettings['EXCLUDE']['PRICE']['MIN'])
					) {
						$arElementFilter['>=PRICE_'.$iblockSettings['EXCLUDE']['PRICE']['TYPE']] = (float)$iblockSettings['EXCLUDE']['PRICE']['MIN'];
					}

				}

				$event = new \Bitrix\Main\Event('luxar.sitemap', "OnSitemapGenerationFilterIblockElement", array($arElementFilter));
				$event->send();
				if ($event->getResults()){
					foreach($event->getResults() as $evenResult){
						if($evenResult->getType() == \Bitrix\Main\EventResult::SUCCESS){
							$arElementFilter = $evenResult->getParameters();
						}
						else if ($evenResult->getType() == \Bitrix\Main\EventResult::ERROR) {
							return false;
						}
					}
				}

				/*if (Sitemap::$DEBUG) {
					echo "\tElements filter\n";
					var_dump($arElementFilter);
				}*/

				$resElements = \CIBlockElement::GetList(
					['ID' => 'ASC'],
					$arElementFilter,
					false, \CLuxarSitemap::IsDemo() == Loader::MODULE_DEMO?['nTopCount' => 10]:false,
                    ['ID', 'NAME', 'CODE', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'TIMESTAMP_X', 'DETAIL_PAGE_URL']
				);
				while($arElement = $resElements->GetNext()) {

                    $event = new \Bitrix\Main\Event('luxar.sitemap', "OnSitemapGenerationBeforeIblockElement", array($arElement));
                    $event->send();
                    if ($event->getResults()){
                        foreach($event->getResults() as $evenResult){
                            if($evenResult->getType() == \Bitrix\Main\EventResult::SUCCESS){
                                $arElement = $evenResult->getParameters();
                            }
                            else if ($evenResult->getType() == \Bitrix\Main\EventResult::ERROR) {
                                continue 2;
                            }
                        }
                    }

					$line = Sitemap::arrayToXML([
						'url' => $domain.$arElement['DETAIL_PAGE_URL'],
						'date' => $arElement['TIMESTAMP_X'],
						'changefreq' => $iblockSettings['DETAIL']['elements']['changefreq'],
						'priority' => $iblockSettings['DETAIL']['elements']['priority'],
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

		}

		return $fileNameArray;
	}

	/**
	 * Replace some parts of URL-template, then not correct processing in replaceDetailUrl.
	 *
	 * @param string $url - String of URL-template.
	 * @param null $siteId - In NULL - #SERVER_NAME# will not replaced.
	 * @return mixed|string
	 */
	public static function prepareUrlToReplace($url, $siteId = NULL)
	{
//		REMOVE PROTOCOL - we put them later, based on user settings
		$url = str_replace('http://', '', $url);
		$url = str_replace('https://', '', $url);

//		REMOVE SERVER_NAME from start position, because we put server_url later
		if (substr($url, 0, strlen('#SERVER_NAME#')) == '#SERVER_NAME#')
			$url = substr($url, strlen('#SERVER_NAME#'));

//		get correct SERVER_URL
		if ($siteId)
		{
			$filter = array('=LID' => $siteId);
			$dbSite = \Bitrix\Main\SiteTable::getList(array(
				'filter' => $filter,
				'select' => array('LID', 'DIR', 'SERVER_NAME'),
			));
			$currentSite = $dbSite->fetch();
			$serverName = $currentSite['SERVER_NAME'];
			$url = str_replace(['#SERVER_NAME#', '#SITE_DIR#'], [$serverName, $currentSite['DIR']], $url);
		}

		return $url;
	}
}