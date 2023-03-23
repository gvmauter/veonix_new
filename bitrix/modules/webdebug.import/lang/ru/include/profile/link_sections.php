<?
$MESS['WDI_PARAM_SECTIONS_LINK'] = 'Привязка разделов:';
	$MESS['WDI_PARAM_SECTIONS_LINK_NAME'] = 'по названию';
	$MESS['WDI_PARAM_SECTIONS_LINK_CODE'] = 'по символьному коду';
	$MESS['WDI_PARAM_SECTIONS_LINK_EXTERNAL_ID'] = 'по внешнему коду';
	$MESS['WDI_PARAM_SECTIONS_LINK_OTHER'] = '--- другое (укажите ниже) ---';
		$MESS['WDI_PARAM_SECTIONS_LINK_OTHER_2'] = 'Поле или свойство: ';
	$MESS['WDI_PARAM_SECTIONS_LINK_HANDLER'] = 'с помощью обработчика события';
		$MESS['WDI_PARAM_SECTIONS_LINK_HANDLER_2'] = 'Имя функции-обработчика: ';
$MESS['WDI_PARAM_SECTIONS_LINK_HINT'] = 'Выберите тип привязки разделов - поле или свойство раздела инфоблока.<br/><br/><i>Привязка это механизм сопоставлений разделов из файлов и разделов на сайте: если при сопоставлении раздел найден, загрузка идет в него, иначе создается новый (при необходимости).</i><br/><br/><b>Внимание!</b> Данные, по которым осуществляется привязка, должны быть указаны в таблице соответствий! Например, если для разделов выполняется привязка по внешнему коду, то внешний код должен загружаться из какого-либо поля, т.е. он должен быть указан в таблице соответствий, иначе будут проблемы с загрузкой.<br/><br/><a href="https://www.webdebug.ru/marketplace/webdebug.import/faq/#12555" target="_blank">Подробнее о привязке</a>';
	$MESS['WDI_PARAM_SECTIONS_LINK_OTHER_2_HINT'] = 'Укажите здесь код поля или полный код пользовательского свойства раздела инфоблока, например, CODE [будет обозначать символьный код] или UF_CUSTOM_IDENTIFIER [будет обозначать привязку по этому свойству].';
	$MESS['WDI_PARAM_SECTIONS_LINK_HANDLER_2_HINT'] = 'Укажите здесь функцию или метод обработчика (напр., MyFunction, или MyClass:MyMethod) для поиска раздела. Функция (метод) принимает следующие аргументы: $obHandler, $arObject, $strObjectType, $arParams, $intIBlockID, $intOffersIBlockID. Результатом работы функции (метода) должен быть непустой массив для фильтрации. Например:<br/>#FUNCTION#';
?>