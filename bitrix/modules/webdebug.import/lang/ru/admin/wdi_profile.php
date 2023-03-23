<?
$MESS['WDI_PAGE_TITLE_ADD'] = 'Создание нового профиля импорта';
$MESS['WDI_PAGE_TITLE_EDIT'] = 'Редактирование профиля импорта ##ID#';

// Toolbar
$MESS['WDI_TOOLBAR_RETURN'] = 'Вернуться к списку профилей';
$MESS['WDI_TOOLBAR_ACTIONS'] = 'Другие действия';
	$MESS['WDI_TOOLBAR_ACTION_NEW'] = 'Создать новый профиль';
	$MESS['WDI_TOOLBAR_ACTION_COPY'] = 'Копировать текущий профиль';
	$MESS['WDI_TOOLBAR_ACTION_DELETE'] = 'Удалить текущий профиль';
		$MESS['WDI_TOOLBAR_ACTION_DELETE_CONFIRM'] = 'Вы уверены, что хотите удалить профиль \"%s\"?\nВсе его настройки будут удалены.';

// Tabs
$MESS['WDI_TAB_GENERAL_NAME'] = 'Редактирование профиля';
$MESS['WDI_TAB_GENERAL_DESC'] = 'Страница редактирования настроек профиля импорта';

// Default data
$MESS['WDI_DEFAULT_NAME'] = 'Новый профиль импорта';

// General parameters
$MESS['WDI_PARAM_ACTIVE'] = 'Активность:';
$MESS['WDI_PARAM_NAME'] = 'Название:';
$MESS['WDI_PARAM_SORT'] = 'Сортировка:';
$MESS['WDI_PARAM_DESCRIPTION'] = 'Описание:';
$MESS['WDI_PARAM_IGNORE_ERRORS'] = 'Игнорировать ошибки при загрузке';

// Subtabs
$MESS['WDI_PARAM_MAIN_PARAMS'] = 'Общие настройки импорта';
	$MESS['WDI_PARAM_SUBTAB_GENERAL_NAME'] = 'Общие параметры';
	$MESS['WDI_PARAM_SUBTAB_GENERAL_DESC'] = 'Настройка параметров создания и обновления разделов и элементов';
	$MESS['WDI_PARAM_SUBTAB_ACTIVE_NAME'] = 'Активация и деактивация';
	$MESS['WDI_PARAM_SUBTAB_ACTIVE_DESC'] = 'Настройка параметров активации и деактивации разделов и товаров';
	$MESS['WDI_PARAM_SUBTAB_CATALOG_NAME'] = 'Торговый каталог';
	$MESS['WDI_PARAM_SUBTAB_CATALOG_DESC'] = 'Настройка параметров торгового каталога';
	$MESS['WDI_PARAM_SUBTAB_OFFERS_NAME'] = 'Торговые предложения';
	$MESS['WDI_PARAM_SUBTAB_OFFERS_DESC'] = 'Настройка параметров торговых предложений (ТП)';
	$MESS['WDI_PARAM_SUBTAB_STORES_NAME'] = 'Складской учет';
	$MESS['WDI_PARAM_SUBTAB_STORES_DESC'] = 'Настройка параметров складского учета';

$MESS['WDI_PARAM_SCHEDULE'] = 'Расписание выполнения импорта';
	$MESS['WDI_PARAM_SCHEDULE_MODE'] = 'Режим запуска:';
		$MESS['WDI_PARAM_SCHEDULE_MODE_CRON'] = 'Использовать расписание планировщика Cron';
		$MESS['WDI_PARAM_SCHEDULE_MODE_INTERVAL_START'] = 'Интервал между запусками';
		$MESS['WDI_PARAM_SCHEDULE_MODE_INTERVAL_END'] = 'Интервал с момента последнего завершения';
			$MESS['WDI_PARAM_SCHEDULE_MODE_INTERVAL_MINUTE'] = 'минут';
			$MESS['WDI_PARAM_SCHEDULE_MODE_INTERVAL_HOUR'] = 'часов';
			$MESS['WDI_PARAM_SCHEDULE_MODE_INTERVAL_DAY'] = 'суток';
	$MESS['WDI_PARAM_SCHEDULE_INDIVIDUAL_RUN_ONLY'] = 'Только индивидуальный запуск:';
	$MESS['WDI_PARAM_SCHEDULE_PHP_PATH'] = 'Путь к PHP на сервере:';
		$MESS['WDI_PARAM_SCHEDULE_PHP_PATH_NOT_REQUIRED'] = '<span style="color:gray;font-style:italic;font-size:12px;">(необязательно)</span>';
	$MESS['WDI_PARAM_MANUAL_CRONTAB'] = 'Команда для запуска:';
	$MESS['WDI_PARAM_MANUAL_CRONTAB_BUTTON_SHOW'] = 'показать';
	$MESS['WDI_PARAM_AUTOCONFIG_CRONTAB'] = 'Автонастройка планировщика:';
	$MESS['WDI_PARAM_EXECUTE'] = 'Ручной запуск:';
	$MESS['WDI_PARAM_EXECUTE_NOTICE'] = '<i>не запускайте процесс, если профиль не настроен в полной мере.</i>';
	$MESS['WDI_PARAM_EXECUTE_HINT'] = 'Кнопка позволяет запустить выполнение процесса на сервере.';
	$MESS['WDI_PARAM_EXECUTE_BUTTON'] = 'Запустить импорт сейчас!';
	$MESS['WDI_PARAM_EXECUTE_NOT_AVAILABLE'] = 'На Вашем сервере запуск команды вручную невозможен. Для запуска импорта используйте планировщик Cron или командную строку SSH.';
	$MESS['WDI_PARAM_EXECUTE_SUCCESS'] = 'Процесс успешно запущен!';
	$MESS['WDI_PARAM_EXECUTE_ERROR'] = 'Ошибка запуска. Отладочная информация доступна в логе модуля.';

$MESS['WDI_PARAM_HANDLER_PARAMS'] = 'Настройки загрузчика';
	$MESS['WDI_PARAM_HANDLER_PARAMS_HANDLER'] = 'Загрузчик:';
		$MESS['WDI_PARAM_HANDLER_PARAMS_HANDLER_EMPTY'] = '--- выберите загрузчик ---';

$MESS['WDI_PARAM_MATCHES'] = 'Соответствия полей';
$MESS['WDI_PARAM_MATCHES_HINT'] = 'Соответствия устанавливают, какие поля и свойства элементов/разделов из каких полей исходных данных загружаются';

// Hints
$MESS['WDI_PARAM_IGNORE_ERRORS_HINT'] = 'Игнорирование ошибок рекомендуется только в случае, если в процессе импорта возникают какие-либо малозначительные ошибки.<br/><br/>При серьезных ошибках процесс останавливаетя принудительно, т.к. иначе загрузка может пройти некорректно.';
$MESS['WDI_PARAM_SCHEDULE_MODE_HINT'] = 'Выберите режим запуска импорта. Импорт во всех случаях выполняется планировщиком, поэтому необходима правильная его настройка.';
$MESS['WDI_PARAM_SCHEDULE_INDIVIDUAL_RUN_ONLY_HINT'] = 'Опция подразумевает, что данный профиль будет загружаться исключительно, если в параметре задачи планировщику будет указан ID данного профиля, это необходимо, чтобы данный профиль не загружался в общем потоке с другими профилями.';
$MESS['WDI_PARAM_SCHEDULE_PHP_PATH_HINT'] = 'На сервере может использоваться одновременно несколько версий PHP. Поэтому, в случае необходимости вы можете указать путь к нужной версии PHP.<br/><br/>Если значение не указано, выполняется попытка поиска php с помощью команды «which php».';
$MESS['WDI_PARAM_MANUAL_CRONTAB_HINT'] = 'Здесь указана команда для ручной настройки планировщика.<br/><br/>Также учитывайте, что если вы настраиваете простой вызов PHP-скрипта из планировщика (такая возможность часто доступна в числе прочих способов настройки планировщика в панели управления хостингом), то в этом случае обычно нет возможности указать индивидуальные параметры загрузки, а также загрузку конкретного профиля, поэтому будут загружаться все профили, кроме тех, у которых отмечена галочка "Только индивидуальный запуск".<br/><br/>Для того, чтобы иметь возможность указывать загрузку конкретного профиля (или конкретных профилей, если они указаны через запятую), необходимо настраивать планировщик через полное указание команды (напр., на рекомендуемом нами хостинге <a href="http://www.timeweb.ru/services/bitrix/?i=12483" target="_blank">Timeweb</a> это «Исполняемый бинарный файл»).<br/><br/>Если в папке модуля имеется файл php.ini, он автоматически включается в данную команду.<br/><br/><b>Имейте ввиду, что это лишь пример команды, и в случае самостоятельной настройки планировщика вы имеете возможность ее отредактировать, добавляя или удаляя собственные параметры конфигурации.<br/>';
$MESS['WDI_PARAM_AUTOCONFIG_CRONTAB_HINT'] = 'Модуль позволяет автоматически настраивать задания Cron на сервере. Делайте это только когда профиль полностью настроен.<br/><br/>Имейте ввиду, для этого необходимо чтобы был правильно указан путь к PHP, а также чтобы пользователю, от имени которого работает веб-сервер, не было запрета на работу с командной <code>crontab</code>.<br/><br/>Также необходимо понимать, что автонастройка работает только если на сервере используется ОС Linux, на ОС Windows настроить автоматически нет возможности.<br/><br/>Проверка наличия задания в крон выполняется без привязки к пути PHP и только по ID профиля.<br/><br/>Автоматическая настройка подразумевает настройку загрузки только текущего профиля.<br/><br/><b>Внимание! Учтите, что данная автонастройка может не работать на Вашем хостинге, поэтому в большинстве случаев рекомендуем настраивать планировщик вручную.</b></a>';
$MESS['WDI_PARAM_HANDLER_PARAMS_HANDLER_HINT'] = 'Выберите нужный тип загрузчика.';
$MESS['WDI_HANDLER_CHECK_CONFIG_HINT'] = 'Это результаты проверки конфигурации сайта. При наличии хотя бы одного несоответствия процесс не может быть начат. Имейте ввиду, что для сайта и для планировщика могут действовать разные настройки PHP, и иногда если проверка конфигурации на сайте проходит, то в планировщике что-то может не пройти.';
$MESS['WDI_PARAM_LINK_FUNCTION'] = '<pre>function CustomSearchObject($obHandler, $arObject, $strObjectType, $arParams, $intIBlockID, $intOffersIBlockID) {\n	$arResult = array();\n	switch($strObjectType){\n		case "S":\n			// ищем раздел\n			$arResult = array("NAME"=>$arObject["NAME"],"UF_MY_ID"=>$arObject["UF_MY_ID"]);\n			end;\n		case "E":\n			// ищем элемент\n			$arResult = array("NAME"=>$arObject["NAME"],"PROPERTY_CUSTOM_ID"=>$arObject["PROPERTY_91"]);\n			end;\n		case "O":\n			// ищем торговое предложение\n			$arResult = array("NAME"=>$arObject["NAME"],"PROPERTY_CUSTOM_ID"=>$arObject["PROPERTY_92"]);\n			end;\n	}\n	return $arResult;\n}</pre>';





?>