<?
$MESS['WDI_SETTINGS_GROUP_CATALOG_DEFAULTS'] = 'Параметры товаров по умолчанию';
	$MESS['WDI_SETTINGS_ELEMENTS_QUANTITY_TRACE'] = 'Количественный учет';
	$MESS['WDI_SETTINGS_ELEMENTS_CAN_BUY_ZERO'] = 'Разрешить покупку при отсутствии товара';
	$MESS['WDI_SETTINGS_ELEMENTS_SUBSCRIBE'] = 'Разрешить подписку при отсутствии товара';
	$MESS['WDI_SETTINGS_DEFAULT_VAT_INCLUDED'] = 'НДС включен в стоимость';
	$MESS['WDI_SETTINGS_DEFAULT_VAT'] = 'Ставка НДС';
		$MESS['WDI_SETTINGS_CATALOG_VAT_EMPTY'] = '--- выберите ставку ---';
$MESS['WDI_SETTINGS_GROUP_CATALOG_CURRENCY'] = 'Настройки валют';
	$MESS['WDI_SETTINGS_DEFAULT_CURRENCY'] = 'Валюта по умолчанию';
		$MESS['WDI_SETTINGS_CURRENCY_BASE'] = ' (базовая валюта)';
	$MESS['WDI_SETTINGS_CURRENCY_DESIGNATIONS'] = 'Обозначения валют';
$MESS['WDI_SETTINGS_GROUP_CATALOG_UNITS'] = 'Единицы измерения';
	$MESS['WDI_SETTINGS_DEFAULT_UNIT'] = 'Единица измерения товара по умолчанию';
	$MESS['WDI_SETTINGS_UNITS_DESIGNATIONS'] = 'Обозначения единиц измерения';
$MESS['WDI_SETTINGS_GROUP_ACTIVATE_CATALOG'] = 'Автоматическая активация и деактивация товаров';
	$MESS['WDI_SETTINGS_ACTIVATE_BY_QUANTITY_GENERAL'] = 'По общему остатку';
	$MESS['WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE'] = 'По остатку на определенном складе';
		$MESS['WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE_SELECT'] = 'Выберите склад';
	$MESS['WDI_SETTINGS_ACTIVATE_BY_PRICE'] = 'По цене';
		$MESS['WDI_SETTINGS_ACTIVATE_BY_PRICE_SELECT'] = 'Выберите тип цен';
		$MESS['WDI_SETTINGS_ACTIVATE_BY_PRICE_LIST'] = 'Выберите цены, на основе которых необходимо<br/>активировать/деактивировать товары';
$MESS['WDI_SETTINGS_GROUP_CATALOG_OTHER'] = 'Другие параметры торгового каталога';
	$MESS['WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS'] = 'Обнулять остаток у «старых» товаров';
		$MESS['WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_PROFILE'] = 'Только у «старых» элементов, загруженных данным профилем';
		$MESS['WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_MODULE'] = 'У всех «старых» элементов, загруженных модулем';
		$MESS['WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_ALL'] = 'У всех «старых» элементов';

/* Hints */

$MESS['WDI_SETTINGS_ELEMENTS_QUANTITY_TRACE_HINT'] = 'Опция позволяет задать общее значение флага «Количественный учет» для всех создаваемых и обновляемых товаров. Не учитывается, если для товара указано собственное значение.';
$MESS['WDI_SETTINGS_ELEMENTS_CAN_BUY_ZERO_HINT'] = 'Опция позволяет задать общее значение флага «Разрешить покупку при отсутствии товара» для всех создаваемых и обновляемых товаров. Не учитывается, если для товара указано собственное значение.';
$MESS['WDI_SETTINGS_ELEMENTS_SUBSCRIBE_HINT'] = 'Опция позволяет задать общее значение флага «Разрешить подписку при отсутствии товара» для всех создаваемых и обновляемых товаров. Не учитывается, если для товара указано собственное значение.';
$MESS['WDI_SETTINGS_DEFAULT_VAT_INCLUDED_HINT'] = 'Опция позволяет задать общее значение флага «НДС включен в стоимость» для всех создаваемых и обновляемых товаров. Не учитывается, если для товара указано собственное значение.';
$MESS['WDI_SETTINGS_DEFAULT_VAT_HINT'] = 'Опция позволяет указать общее значение НДС для всех создаваемых и обновляемых товаров. Не учитывается, если для товара указано собственное значение.';
$MESS['WDI_SETTINGS_DEFAULT_CURRENCY_HINT'] = 'Валюта, указываемая каждому товару по умолчанию, если для него не указано иное.';
$MESS['WDI_SETTINGS_CURRENCY_DESIGNATIONS_HINT'] = 'Обозначения валют, которые указаны в загружаемых данных. Например, если у Вас в файле указаны цены в виде "$1000", то укажите в поле USD знак доллара - это подскажет модулю, в какой валюте указана цена товара.';
$MESS['WDI_SETTINGS_DEFAULT_UNIT_HINT'] = 'Единица измерения товара, которая автоматически указывается к каждому товару, если для не указано иное.';
$MESS['WDI_SETTINGS_UNITS_DESIGNATIONS_HINT'] = 'Обозначения единиц измерения, которые указаны в загружаемых данных.';
$MESS['WDI_SETTINGS_ACTIVATE_BY_QUANTITY_GENERAL_HINT'] = 'Активация и деактивация товара по его общему остатку: если общий остаток больше нуля, то товар становится активным, иначе - неактивным.';
$MESS['WDI_SETTINGS_ACTIVATE_BY_QUANTITY_STORE_HINT'] = 'Активация и деактивация товара по его остатку на определенном складе: если остаток на определенном складе больше нуля, то товар становится активным, иначе - неактивным. Если выбрано несколько складов, то для деактивации необходимы нулевые остатки на всех выбранных складах.';
$MESS['WDI_SETTINGS_ACTIVATE_BY_PRICE_HINT'] = 'Активация и деактивация товара по цене: если выбранная цена больше нуля, товар активируется, иначе деактивируется. При выборе нескольких типов цен, индикатором нулевой цены считается нулевая цена для всех выбранных типов цен.';
$MESS['WDI_SETTINGS_CLEAR_QUANTITY_MISSING_ELEMENTS_HINT'] = 'Данная опция позволяет задавать остаток равный нулю у всех товаров, которых нет в последней загрузке.'
	
	
	
	
	
	
	
	
	
	
?>