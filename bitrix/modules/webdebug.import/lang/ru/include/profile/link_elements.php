<?
$MESS['WDI_PARAM_ELEMENTS_LINK'] = 'Привязка элементов:';
	$MESS['WDI_PARAM_ELEMENTS_LINK_NAME'] = 'по названию';
	$MESS['WDI_PARAM_ELEMENTS_LINK_CODE'] = 'по символьному коду';
	$MESS['WDI_PARAM_ELEMENTS_LINK_EXTERNAL_ID'] = 'по внешнему коду';
	$MESS['WDI_PARAM_ELEMENTS_LINK_OTHER'] = '--- другое (укажите ниже) ---';
		$MESS['WDI_PARAM_ELEMENTS_LINK_OTHER_2'] = 'Поле или свойство: ';
	$MESS['WDI_PARAM_ELEMENTS_LINK_HANDLER'] = 'с помощью обработчика события';
		$MESS['WDI_PARAM_ELEMENTS_LINK_HANDLER_2'] = 'Имя функции-обработчика: ';
$MESS['WDI_PARAM_ELEMENTS_LINK_HINT'] = 'Выберите тип привязки элементов - поле или свойство элемента инфоблока.<br/><br/><i>Привязка это механизм сопоставлений элементов из файлов и элементов на сайте: если при сопоставлении элемент найден, загрузка идет в него, иначе создается новый (при необходимости).</i><br/><br/><b>Внимание!</b> Данные, по которым осуществляется привязка, должны быть указаны в таблице соответствий! Например, если для товаров выполняется привязка по внешнему коду, то внешний код должен загружаться из какого-либо поля, т.е. он должен быть указан в таблице соответствий, иначе будут проблемы с загрузкой.<br/><br/><a href="https://www.webdebug.ru/marketplace/webdebug.import/faq/#12555" target="_blank">Подробнее о привязке</a>';
	$MESS['WDI_PARAM_ELEMENTS_LINK_OTHER_2_HINT'] = 'Укажите здесь код поля или полный код свойства элемента инфоблока, например, CODE [будет обозначать символьный код] или PROPERTY_CUSTOM_IDENTIFIER [будет обозначать привязку по свойству CUSTOM_IDENTIFIER].';
	$MESS['WDI_PARAM_ELEMENTS_LINK_HANDLER_2_HINT'] = 'Укажите здесь функцию или метод обработчика (напр., MyFunction, или MyClass:MyMethod) для поиска товара. Функция (метод) принимает следующие аргументы: $obHandler, $arObject, $strObjectType, $arParams, $intIBlockID, $intOffersIBlockID. Результатом работы функции (метода) должен быть непустой массив для фильтрации. Например:<br/>#FUNCTION#';
?>