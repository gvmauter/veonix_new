<?

namespace Ammina\Optimizer;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\ORM\EventResult;
use Bitrix\Main\Type\DateTime;


class SettingsTable extends DataManager
{
	public static function getTableName()
	{
		return 'am_optimizer_settings';
	}

	public static function getMap()
	{
		$fieldsMap = array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
			),
			'SITE_ID' => array(
				'data_type' => 'string',
			),
			'SETTINGS' => array(
				'data_type' => 'string',
			),
		);

		return $fieldsMap;
	}

	public static function onBeforeUpdate(Event $event)
	{
		$result = new EventResult();
		$data = $event->getParameter("fields");
		$arUpdateFields = false;
		if (isset($data['SETTINGS'])) {
			$arUpdateFields['SETTINGS'] = serialize(self::doNormailizeSettings($data['SETTINGS']));
		}
		if (is_array($arUpdateFields)) {
			$result->modifyFields($arUpdateFields);
		}
		return $result;
	}

	public static function onBeforeAdd(Event $event)
	{
		$result = new EventResult();
		$data = $event->getParameter("fields");
		$arUpdateFields = false;
		if (isset($data['SETTINGS'])) {
			$arUpdateFields['SETTINGS'] = serialize(self::doNormailizeSettings($data['SETTINGS']));
		}
		if (is_array($arUpdateFields)) {
			$result->modifyFields($arUpdateFields);
		}
		return $result;
	}

	public static function getList(array $parameters = array())
	{
		$result = parent::getList($parameters);
		$result->setSerializedFields(array("SETTINGS"));
		return $result;
	}

	public static function getSettingsForEdit($strSite = 'all')
	{
		$arAllSites = array();
		$b = "LID";
		$o = "ASC";
		$rSites = \CSite::GetList($b, $o);
		while ($arSite = $rSites->Fetch()) {
			$arAllSites[$arSite['LID']] = $arSite['NAME'];
		}
		if (!isset($arAllSites[$strSite])) {
			$strSite = "all";
		}
		$arFilterList = array();
		$arFilterList[] = array(
			"SITE_ID" => "all"
		);
		if ($strSite !== "all") {
			$arFilterList[] = array(
				"SITE_ID" => $strSite
			);
		}
		$arDefaultSettings = self::getDefaultSettings();
		$arResultSetting['MAIN'] = $arDefaultSettings;
		$arOldSettings = false;
		foreach ($arFilterList as $arFilter) {
			$arSettings = SettingsTable::getList(array(
				"filter" => $arFilter,
			))->Fetch();
			if ($arSettings) {
				$arOldSettings = $arSettings;
				$arResultSetting = self::mixedSettings($arResultSetting, $arSettings['SETTINGS']);
			} else {
				$arResultSetting = self::mixedSettings($arResultSetting, array("MAIN" => $arDefaultSettings));
			}
		}
		if ($arOldSettings) {
			unset($arOldSettings['SETTINGS']);
			$arResultSetting['DB_INFO'] = $arOldSettings;
		}
		return $arResultSetting;
	}

	public static function getSettings($strSite = SITE_ID)
	{
		global $USER;
		$bPreventClearCache = false;
		if (is_object($USER) && $USER->CanDoOperation('cache_control')) {
			if (isset($_GET['clear_cache']) && $_GET['clear_cache'] === "Y") {
				$bPreventClearCache = true;
			}
		}
		$strCacheFileName = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/cache/ammina.optimizer/settings/sites/" . md5($strSite) . ".txt";
		$arCacheData = false;
		if (file_exists($strCacheFileName)) {
			$arCacheData = @unserialize(file_get_contents($strCacheFileName));
			if (time() > $arCacheData['TTL'] || $bPreventClearCache) {
				@unlink($strCacheFileName);
				$arCacheData = false;
			}
		}
		if (is_array($arCacheData) && !empty($arCacheData)) {
			$arResultSetting = $arCacheData['DATA'];
		} else {
			$b = "LID";
			$o = "ASC";
			$arSite = \CSite::GetList($b, $o, array("LID" => $strSite))->Fetch();
			if (!$arSite) {
				$strSite = "all";
			}
			$arFilterList = array();
			$arFilterList[] = array(
				"SITE_ID" => "all"
			);
			$arSettingsCheck = SettingsTable::getList(array(
				"filter" => array("SITE_ID" => $strSite),
			))->Fetch();
			if ($arSettingsCheck) {
				if ($strSite !== "all") {
					$arFilterList[] = array(
						"SITE_ID" => $strSite,
					);
				}
			}
			$bFindedSetting = false;
			$iSettingsId = false;
			$arDefaultSettings = self::getDefaultSettings();
			$arResultSetting['MAIN'] = $arDefaultSettings;
			foreach ($arFilterList as $arFilter) {
				$arSettings = SettingsTable::getList(array(
					"filter" => $arFilter,
				))->Fetch();
				if ($arSettings) {
					$bFindedSetting = true;
					$iSettingsId = $arSettings['ID'];
					$arResultSetting = self::mixedSettings($arResultSetting, $arSettings['SETTINGS']);
				}
			}
			if ($bFindedSetting) {
				$arResultSetting['SETTING_ID'] = $iSettingsId;
			} else {
				$arResultSetting = array();
			}
			CheckDirPath(dirname($strCacheFileName) . "/");
			$arCacheData = array(
				"TTL" => time() + 3600,
				"DATA" => $arResultSetting
			);
			file_put_contents($strCacheFileName, serialize($arCacheData));
		}
		return $arResultSetting;
	}

	public static function getDefaultSettings()
	{
		$arAllOptionsDescription = include($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/ammina.optimizer/option.descriptions.php");
		$arResult = array();
		foreach ($arAllOptionsDescription['category'] as $strCategory => &$arCategory) {
			$arResult['category'][$strCategory]['options']['ACTIVE'] = $arCategory['options']['ACTIVE']['DEFAULT'];
			foreach ($arCategory['groups'] as $strGroup => &$arGroup) {
				$arResult['category'][$strCategory]['groups'][$strGroup]['DEFAULT'] = "Y";
				foreach ($arGroup['options'] as $strOption => &$arOption) {
					$arResult['category'][$strCategory]['groups'][$strGroup]['options'][$strOption] = $arOption['DEFAULT'];
					if ($arOption['TYPE'] === "select.options") {
						foreach ($arOption['VARIANTS'] as $kVariant => $arVariant) {
							$arResult['category'][$strCategory]['groups'][$strGroup]['options_variant'][$strOption][$kVariant] = $arVariant['DEFAULT'];
						}
					}
				}
			}
		}
		return $arResult;
	}

	public static function mixedSettings($arParentSettings, $arSettings)
	{
		$arResult = array();
		$arResult['MAIN'] = self::mixedCategoriesSettings($arParentSettings['MAIN'], $arSettings['MAIN']);
		foreach ($arSettings['PAGES'] as $iPage => $arPage) {
			$arResult['PAGES'][$iPage] = self::mixedCategoriesSettings($arResult['MAIN'], $arPage);
			$arResult['PAGES'][$iPage]['page'] = $arPage['page'];
		}
		return $arResult;
	}

	public static function mixedCategoriesSettings($arParentSettings, $arSettings)
	{
		$arResult = array();
		foreach ($arParentSettings['category'] as $strCategory => $arCategory) {
			$arResult['category'][$strCategory]['options']['ACTIVE'] = $arSettings['category'][$strCategory]['options']['ACTIVE'];
			if ($arResult['category'][$strCategory]['options']['ACTIVE'] !== "Y") {
				$arResult['category'][$strCategory]['options']['ACTIVE'] = "N";
			}
			foreach ($arCategory['groups'] as $strGroup => $arGroup) {
				if ($arSettings['category'][$strCategory]['groups'][$strGroup]['DEFAULT'] === "Y") {
					$arResult['category'][$strCategory]['groups'][$strGroup]['DEFAULT'] = "Y";
					$arResult['category'][$strCategory]['groups'][$strGroup]['options'] = $arGroup['options'];
					if (isset($arGroup['options_variant'])) {
						$arResult['category'][$strCategory]['groups'][$strGroup]['options_variant'] = $arGroup['options_variant'];
					}
				} else {
					$arResult['category'][$strCategory]['groups'][$strGroup]['DEFAULT'] = "N";
					if (is_array($arSettings['category'][$strCategory]['groups'][$strGroup]['options'])) {
						$arResult['category'][$strCategory]['groups'][$strGroup]['options'] = array_replace_recursive($arGroup['options'], $arSettings['category'][$strCategory]['groups'][$strGroup]['options']);
					} else {
						$arResult['category'][$strCategory]['groups'][$strGroup]['options'] = $arGroup['options'];
					}
					if (isset($arGroup['options_variant'])) {
						if (isset($arSettings['category'][$strCategory]['groups'][$strGroup]['options_variant']) && is_array($arSettings['category'][$strCategory]['groups'][$strGroup]['options_variant'])) {
							$arResult['category'][$strCategory]['groups'][$strGroup]['options_variant'] = array_replace_recursive($arGroup['options_variant'], $arSettings['category'][$strCategory]['groups'][$strGroup]['options_variant']);
						}
					}
				}
			}
		}
		return $arResult;
	}

	public static function doNormailizeSettings($arSettings)
	{
		foreach ($arSettings['MAIN']['category'] as $strCategory => $arCategory) {
			foreach ($arCategory['groups'] as $strGroup => $arGroup) {
				if ($arGroup['DEFAULT'] === "Y") {
					unset($arSettings['MAIN']['category'][$strCategory]['groups'][$strGroup]['options']);
				}
			}
		}
		$arNewPages = array();
		$iPageIndex = 1;
		foreach ($arSettings['PAGES'] as $iPage => $arPage) {
			if ($arPage['page']['DELETE'] !== "Y" && !empty(trim($arPage['page']['PAGES']))) {
				foreach ($arPage['category'] as $strCategory => $arCategory) {
					foreach ($arCategory['groups'] as $strGroup => $arGroup) {
						if ($arGroup['DEFAULT'] === "Y") {
							unset($arPage['category'][$strCategory]['groups'][$strGroup]['options']);
						}
					}
				}
				$arNewPages[$iPageIndex] = $arPage;
				$iPageIndex++;
			}
		}
		$arSettings['PAGES'] = $arNewPages;
		return $arSettings;
	}

	public static function onAfterAdd(Event $event)
	{
		$result = new EventResult();
		self::cleanCacheTable();

		global $AMMINA_OPTIMIZER_NO_SET_HISTORY;
		if ($AMMINA_OPTIMIZER_NO_SET_HISTORY !== true) {
			$id = $event->getParameter('id');
			if ($id > 0) {
				$item = self::getList([
					'filter' => [
						'ID' => $id
					]
				])->fetch();

				$arFields = [
					'SITE_ID' => $item['SITE_ID'],
					'SETTINGS' => $item['SETTINGS'],
					'DATE_CHANGE' => new DateTime()
				];
				SettingsHistoryTable::add($arFields);
			}
		}

		return $result;
	}

	public static function onAfterUpdate(Event $event)
	{
		$result = new EventResult();
		self::cleanCacheTable();

		global $AMMINA_OPTIMIZER_NO_SET_HISTORY;
		if ($AMMINA_OPTIMIZER_NO_SET_HISTORY !== true) {
			$id = $event->getParameter('id');
			if ($id['ID'] > 0) {
				$item = self::getList([
					'filter' => [
						'ID' => $id['ID']
					]
				])->fetch();

				$arFields = [
					'SITE_ID' => $item['SITE_ID'],
					'SETTINGS' => $item['SETTINGS'],
					'DATE_CHANGE' => new DateTime()
				];
				SettingsHistoryTable::add($arFields);
			}
		}
		return $result;
	}

	public static function onAfterDelete(Event $event)
	{
		$result = new EventResult();
		self::cleanCacheTable();
		return $result;
	}

	public static function cleanCacheTable()
	{
		$strCacheDir = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/cache/ammina.optimizer/settings/sites/";
		$arFiles = scandir($strCacheDir);
		foreach ($arFiles as $strFile) {
			if (in_array($strFile, array(".", ".."))) {
				continue;
			}
			if (is_file($strCacheDir . $strFile)) {
				unlink($strCacheDir . $strFile);
			}
		}
	}

	public static function checkSettingsVersion()
	{
		$version = \COption::GetOptionString("ammina.optimizer", "settings_version", "");
		if (strlen($version) <= 0) {
			$rSettings = self::getList();
			while ($arSettings = $rSettings->fetch()) {
				$settings = self::convertSettingsTo5_1_0($arSettings['SETTINGS']);
				self::update($arSettings['ID'], [
					'SETTINGS' => $settings
				]);
			}
			\COption::SetOptionString("ammina.optimizer", "settings_version", "5.1.0");
		}
	}

	protected static function convertSettingsTo5_1_0($settings)
	{
		$settings['MAIN'] = self::convertSettingOneTo5_1_0($settings['MAIN']);
		foreach ($settings['PAGES'] as $k => $v) {
			$settings['PAGES'][$k] = self::convertSettingOneTo5_1_0($v);
		}
		return $settings;
	}

	protected static function convertSettingOneTo5_1_0($settings)
	{
		if (!isset($settings['category']['lazy']['groups']['js'])) {
			if (isset($settings['category']['main']['groups']['delay'])) {
				$settings['category']['lazy']['groups']['js'] = $settings['category']['main']['groups']['delay'];
				unset($settings['category']['main']['groups']['delay']);
			}
		}
		if (!isset($settings['category']['lazy']['groups']['js_main'])) {
			if (isset($settings['category']['main']['groups']['delay_main'])) {
				$settings['category']['lazy']['groups']['js_main'] = $settings['category']['main']['groups']['delay_main'];
				unset($settings['category']['main']['groups']['delay_main']);
			}
		}
		if (!isset($settings['category']['lazy']['groups']['images'])) {
			if (isset($settings['category']['images']['groups']['lazy'])) {
				$settings['category']['lazy']['groups']['images'] = $settings['category']['images']['groups']['lazy'];
				unset($settings['category']['images']['groups']['lazy']);
			}
		}
		return $settings;
	}
}
