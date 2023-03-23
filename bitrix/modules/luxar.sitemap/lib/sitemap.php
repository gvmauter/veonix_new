<?
namespace Luxar\Sitemap;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Entity;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;

class SitemapTable extends Entity\DataManager {

	private static $indexes = [
		//'STATUS_FROM_TO' => 'CREATE INDEX STATUS_FROM_TO ON luxar_balance_move(STATUS, FOND_FROM, FOND_TO, DATE)',
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
		return 'luxar_indexcontrol_sitemap';
	}

	public static function getUfId()
	{
		return 'LUXAR_INDEXCONTROL_SITEMAP';
	}

	public static function getMap()
	{
		return [
			new Entity\IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true
			]),
			new Entity\StringField('NAME', [
				'required' => true,
			]),
			new Entity\TextField('DESCRIPTION'),
			new Entity\StringField('XML_ID'),
			new Entity\BooleanField('ACTIVE',
				[
					'values' => ['Y', 'N'],
					'default_value' => 'Y'
				]
			),
			new Entity\DatetimeField('DATE_CREATE', [
				'required' => true,
				'default_value' => new \Bitrix\Main\Type\Datetime,
			]),
			new Entity\DatetimeField('TIMESTAMP_X', [
				'required' => true,
				'default_value' => new \Bitrix\Main\Type\Datetime,
			]),
			new Entity\DatetimeField('LAST_RUN'),
			new Entity\StringField('SITE_ID'),

			new Entity\TextField('SETTINGS'),

			new Entity\IntegerField('CREATED'),
			new Entity\StringField('CREATED_NAME'),

			new Entity\IntegerField('MODIFY'),
			new Entity\StringField('MODIFY_NAME'),
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

    public static function delete($ID): \Bitrix\Main\ORM\Data\DeleteResult
    {

        $res = SitemapIblockTable::getList([
            'filter' => [
                'SITEMAP_ID' => $ID
            ],
            'select' => ['ID'],
        ]);
        while($row = $res->fetch()) {
            SitemapIblockTable::delete($row['ID']);
        }

        return parent::delete($ID);
    }
}

class Sitemap {

	const MODULE_ID = 'luxar.sitemap';
	const SETTINGS_DEFAULT_FILE_MASK = '*.php, *.html';

	const FILE_START = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
	const FILE_END = "</urlset>\n";

	private static $errors = [];
	public static $DEBUG = false;
	public static $MAX_FILE_SIZE = 50000000;
	public static $MAX_URL_COUNT = 50000;

	public static $generateSteps = [
		'files', 'iblock', 'sotbit.seometa', 'other', 'generate_index_files'
	];

	public static function getSettings($ID) {

		$arSitemap = SitemapTable::getById($ID)->fetch();

		if (!$arSitemap) {
			self::$errors[] = 'sitemap.xml '.GetMessage("LUXAR_INDEXCONTROL_NE_NAYDEN");
			return false;
		}

		$arSettings = unserialize($arSitemap['SETTINGS']);

		$arSettings = array_merge($arSettings, [
			'IBLOCK' => [],
			'FILES' => [],
		]);

		$res = SitemapIblockTable::getList([
			'order' => ['ID' => 'ASC'],
			'filter' => [
				'=SITEMAP_ID' => $ID,
			]
		]);
		while($row = $res->fetch()) {
			$row['~SETTINGS'] = $row['SETTINGS'];
			$row['SETTINGS'] = unserialize($row['SETTINGS']);
			$arSettings['IBLOCK'][$row['IBLOCK_ID']] = $row;
		}

		$arSitemap['SETTINGS'] = $arSettings;

		return $arSitemap;
	}

	public static function prepareSettings($arFields) {

		$newArFields = [
			'IBLOCK' => [],
		];

		$codes = [
			'PROTO', 'DOMAIN', 'FILE_MASK', 'logical',
			'DIR', 'FILE', 'FILE_SETTINGS', 'FILENAME_INDEX', 'FILENAME_FILES',
			'FILENAME_IBLOCK', 'FILENAME_SEOMETA', 'SEOMETA_GENERATE',
			'SEOMETA_MIN_COUNT_ELEMENT',
			'FILE_ADD_DIR_SLASH', 'FILE_DELETE_INDEX_PHP',
            'DOCUMENT_ROOT', 'OTHER', 'FILENAME_OTHER',
            'MAX_COUNT_URL', 'MAX_FILE_SIZE'
		];

		foreach ($codes as $code) {
			$newArFields[$code] = $arFields[$code];
		}

		if (!empty($arFields['IBLOCK_ACTIVE'])) {
			foreach ($arFields['IBLOCK_ACTIVE'] as $IBLOCK_ID => $active) {

				if ($active != 'Y') {
					continue;
				}

				$newArFields['IBLOCK'][] = $IBLOCK_ID;
			}
		}

		return $newArFields;
	}

	public static function getErrors() {
		return self::$errors;
	}

	public static function generate($ID, $NS = false) {

		$stepByStep = false;
		if ($NS !== false) {
			$stepByStep = true;

			if (!isset($NS['done'])) $NS['done'] = 'N';
			if (!isset($NS['step'])) $NS['step'] = self::$generateSteps[0];
			if (!isset($NS['percent'])) $NS['percent'] = 0;
		}

		$arSitemap = self::getSettings($ID);

		if (!$arSitemap) {
			self::$errors[] = GetMessage("LUXAR_INDEXCONTROL_NASTROYKI_KARTY_SAYT");
			return false;
		}

		if ($stepByStep && !empty($NS['indexSitemapFiles'])) {
			$indexSitemapFiles = $NS['indexSitemapFiles'];
		}
		else {
			$indexSitemapFiles = [];
		}

		if (!$stepByStep || $NS['step'] == self::$generateSteps[0]) {
			if (self::$DEBUG) {
				echo "Start generate files\n";
			}
			$filesFiles = SitemapFiles::generate($arSitemap);

			if (is_array($filesFiles))
				$indexSitemapFiles = array_merge($indexSitemapFiles, $filesFiles);

			if ($stepByStep) {
				$NS['step'] = self::$generateSteps[1];
				$NS['indexSitemapFiles'] = $indexSitemapFiles;
				$NS['percent'] = ceil(1 / count(self::$generateSteps) * 100);

				return $NS;
			}
		}

		if (!$stepByStep || $NS['step'] == self::$generateSteps[1]) {
			if (self::$DEBUG) {
				echo "Start generate infoblocks\n";
			}
			$iblockFiles = SitemapIblock::generate($arSitemap);

			if (is_array($iblockFiles))
				$indexSitemapFiles = array_merge($indexSitemapFiles, $iblockFiles);

			if ($stepByStep) {
				$NS['step'] = self::$generateSteps[2];
				$NS['indexSitemapFiles'] = $indexSitemapFiles;
				$NS['percent'] = ceil(2 / count(self::$generateSteps) * 100);

				return $NS;
			}
		}

		if (!$stepByStep || $NS['step'] == self::$generateSteps[2]) {
			if (Loader::includeModule('sotbit.seometa')) {
				if (self::$DEBUG) {
					echo "Start generate SeoMeta\n";
				}
				$seometaFiles = SitemapSeometa::generate($arSitemap);
				if (is_array($seometaFiles))
					$indexSitemapFiles = array_merge($indexSitemapFiles, $seometaFiles);
			}

			if ($stepByStep) {
				$NS['step'] = self::$generateSteps[3];
				$NS['indexSitemapFiles'] = $indexSitemapFiles;
				$NS['percent'] = ceil(3 / count(self::$generateSteps) * 100);

				return $NS;
			}
		}

        if (!$stepByStep || $NS['step'] == self::$generateSteps[3]) {

            if (self::$DEBUG) {
                echo "Start generate Other strings\n";
            }

            $otherFiles = SitemapOther::generate($arSitemap);
            if (is_array($otherFiles))
                $indexSitemapFiles = array_merge($indexSitemapFiles, $otherFiles);

            if ($stepByStep) {
                $NS['step'] = self::$generateSteps[4];
                $NS['indexSitemapFiles'] = $indexSitemapFiles;
                $NS['percent'] = ceil(4 / count(self::$generateSteps) * 100);

                return $NS;
            }
        }

		if (!$stepByStep || $NS['step'] == self::$generateSteps[4]) {
			$event = new \Bitrix\Main\Event('luxar.sitemap', "OnBeforeSitemapIndexFileGeneration", array($indexSitemapFiles));
			$event->send();
			if ($event->getResults()) {
				foreach ($event->getResults() as $evenResult) {
					if ($evenResult->getType() == \Bitrix\Main\EventResult::SUCCESS) {
						$indexSitemapFiles = $evenResult->getParameters();
					}
				}
			}

			if (self::$DEBUG) {
				echo "Make index sitemap files\n";
			}
			$domain = self::getDomain($arSitemap);
			$fileName = $arSitemap['SETTINGS']['FILENAME_INDEX'];

			$tmpFileName = $fileName . '.tmp';
			$docRoot = Sitemap::getDocumentRoot($arSitemap);

			$fp = fopen($docRoot . '/' . $tmpFileName, 'a');

			$line = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
			fputs($fp, $line);

			$date = date('c');
			foreach ($indexSitemapFiles as $file) {
				$line = '<sitemap><loc>' . $domain . '/' . $file . '</loc><lastmod>' . $date . "</lastmod></sitemap>\n";
				fputs($fp, $line);
			}

			$line = "</sitemapindex>\n";
			fputs($fp, $line);
			fclose($fp);

			if (is_file($docRoot . '/' . $fileName)) {
				unlink($docRoot . '/' . $fileName);
			}

			rename($docRoot . '/' . $tmpFileName, $docRoot . '/' . $fileName);


			if (self::$DEBUG) {
				echo "Make sitemap multiregion\n";
			}
			if (
                Loader::includeModule('luxar.multiregion')
                && Option::get('luxar.multiregion', 'on_'.$arSitemap['SITE_ID']) == 'Y'
            ) {
				\Luxar\Multiregion\Sitemap::generate(
					$arSitemap['SITE_ID'],
					$arSitemap['SETTINGS']['PROTO'] == 1 ? 'https' : 'http',
					$arSitemap['SETTINGS']['DOMAIN'],
					false
				);
			}

			$event = new \Bitrix\Main\Event('luxar.sitemap', "OnAfterSitemapGeneration", array($indexSitemapFiles));
			$event->send();

			SitemapTable::update($ID, ['LAST_RUN' => new DateTime()]);

			if ($stepByStep) {
				$NS['done'] = 'Y';

				$NS['step'] = self::$generateSteps[4];
				$NS['rootSitemap'] = $fileName;
				$NS['indexSitemapFiles'] = $indexSitemapFiles;
				$NS['percent'] = ceil(5 / count(self::$generateSteps) * 100);

				return $NS;
			}
		}
		return true;
	}

    public static function getDocumentRoot($arSitemap) {

        if(!empty($arSitemap['SETTINGS']['DOCUMENT_ROOT'])) {
            $docRoot = $arSitemap['SETTINGS']['DOCUMENT_ROOT'];
        }
        else {
            $docRoot = \Bitrix\Main\Application::getDocumentRoot();
        }

        if (!is_dir($docRoot)) {
            $permission = 0755;
            if (defined('BX_DIR_PERMISSIONS')) {
                $permission = BX_DIR_PERMISSIONS;
            }
            mkdir($docRoot, $permission, true);
        }

        return $docRoot;
    }

	public static function getDomain($arSitemap) {
		$domain = 'http';
		if ($arSitemap['SETTINGS']['PROTO'] == 1) {
			$domain.= 's';
		}

		$domain.= '://'.\CBXPunycode::toASCII($arSitemap['SETTINGS']['DOMAIN'], $e = null);

		return $domain;
	}

	public static function arrayToXML($array) {

		$event = new \Bitrix\Main\Event('luxar.sitemap', "OnBeforeUrlGeneration", array($array));
		$event->send();
		if ($event->getResults()){
			foreach($event->getResults() as $evenResult){
				if($evenResult->getType() == \Bitrix\Main\EventResult::SUCCESS){
					$array = $evenResult->getParameters();
				}
				else if ($evenResult->getType() == \Bitrix\Main\EventResult::ERROR) {
					return false;
				}
			}
		}

		if(empty($array['date'])) {
			$date = time();
		}
		else {
			$date = strtotime($array['date']);
		}

		$string = '<url>'.(self::$DEBUG?"\n":'');
		$string.= (self::$DEBUG?"\t":'').'<loc>'.$array['url'].'</loc>'.(self::$DEBUG?"\n":'');
		$string.= (self::$DEBUG?"\t":'').'<lastmod>'.(date('c', $date)).'</lastmod>'.(self::$DEBUG?"\n":'');

		if (!empty($array['changefreq'])) {
			$string.= (self::$DEBUG?"\t":'').'<changefreq>'.$array['changefreq'].'</changefreq>'.(self::$DEBUG?"\n":'');
		}
		if (!empty($array['priority'])) {
			$string.= (self::$DEBUG?"\t":'').'<priority>'.$array['priority'].'</priority>'.(self::$DEBUG?"\n":'');
		}
		$string.= '</url>'.(self::$DEBUG?"\n":'');

		return $string;
	}
}