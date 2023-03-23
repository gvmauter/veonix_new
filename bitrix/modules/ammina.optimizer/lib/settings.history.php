<?

namespace Ammina\Optimizer;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\ORM\EventResult;


class SettingsHistoryTable extends DataManager
{
	public static function getTableName()
	{
		return 'am_optimizer_settings_history';
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
				'serialized' => true
			),
			'DATE_CHANGE' => array(
				'data_type' => 'datetime',
			),
			'DESCRIPTION' => array(
				'data_type' => 'string',
			),
		);

		return $fieldsMap;
	}

}
