## ylab.likes

Модуль реализует функционал лайков/дизлайков для любых сущностей битрикс.

Разработчик: [Alexandr Zemlyanoy (Galamoon)](https://github.com/Galamoon)

# API
ID типа контента определяется произвольно в рамках проекта 
### php
* ORM класс `Ylab\Likes\YlabLikesTable`
  * Константы
    * `VoteDislike` - Значение дизлайка
    * `VoteLike` - Значение лайка
  * Методы
    * `public static function setLike($iContentId, $iContentType, $iUserId)` - Делает запись голоса типа (лайк)
       * `$iContentId` - ID контента
       * `$iContentType` - ID типа контента 
       * `$iUserId` - ID пользователя от имени которого будет отдан голос
    * `public static function setDislike($iContentId, $iContentType, $iUserId)` - Делает запись голоса типа (дизлайк)
       * `$iContentId` - ID контента
       * `$iContentType` - ID типа контента 
       * `$iUserId` - ID пользователя от имени которого будет отдан голос
    * `public static function getContentStat($mContentId, $iContentType, $iUserLike = null)` - Получает данные о количестве голосов контента
       * `$mContentId` - ID или массив ID контента.
       * `$iContentType` - Ид типа контента
       * `$iUserLike` - (необязательный) ID пользователя для которого будет получено значение его голоса

### js
Подключение библиотеки js `CJSCore::Init(['YlabLikesForm']);`
* Библиотека `YlabLikesForm`
  * Методы
    * `BX.Ylab.Likes.setAjaxPath(AjaxPath)` - Изменить пути к php обработчикам событий
      * `AjaxPath` - По умолчанию
        ```json
        {
            "setLike": "/bitrix/themes/ylab.likes/ajax/setLike.php",
            "setDislike": "/bitrix/themes/ylab.likes/ajax/setDislike.php",
            "getContentStat": "/bitrix/themes/ylab.likes/ajax/getContentStat.php"
        }
        ```
    * `BX.Ylab.Likes.setLike(iContentId, iContentType, oCallback)` - Делает запись голоса типа (лайк) от имени текущего пользователя
       * `iContentId` - ID контента
       * `iContentType` - ID типа контента
       * `oCallback` - Функция коллбек будет вызвана после отправки запроса
    * `BX.Ylab.Likes.setDislike(iContentId, iContentType, oCallback)` - Делает запись голоса типа (дизлайк) от имени текущего пользователя
       * `iContentId` - ID контента
       * `iContentType` - ID типа контента
       * `oCallback` - Функция коллбек будет вызвана после отправки запроса
    * `BX.Ylab.Likes.getContentStat(iContentId, iContentType, oCallback)` - Получает данные о количестве голосов контента и голосе текущего пользователя
       * `iContentId` - ID контента
       * `iContentType` - ID типа контента
       * `oCallback` - Функция коллбек будет вызвана после отправки запроса

### Bitrix component
Компонент уже содержит все необходимое для начала работы. Пример использования компонента. 
```php
<?
$APPLICATION->IncludeComponent("ylab:likes", "", [
    'ELEMENT_ID' => '' /* ID контента */,
    'ENTITY_ID' => ''/* ID типа контента */,
    'HIDDEN_DISLIKE' => 'N' / *Y - скрывает дизлайк */
]);
?>
```

## Установка
* Скачать архив с файлами модуля.
* Распаковать файлы в директорию /local/modules/ylab.likes
* Перейти в админке сайта в Marketplace (Установленные решения) и установить модуль.
* Вывести в шаблоне компонента (к примеру у списка новостей) компонент "ylab:likes".

Пример реализации:

```php
<div class="block">
	<?foreach($arResult["ITEMS"] as $arItem){?>
		<div class="item">
			<div class="img"></div>
			<div class="name"><?=$arItem['NAME']?></div>
			<div class="bottom">
				<?
				$APPLICATION->IncludeComponent("ylab:likes", "", [
					'ELEMENT_ID' => $arItem['ID'],
					'ENTITY_ID' => $arParams['IBLOCK_ID'],
					'HIDDEN_DISLIKE' => 'N'
				]);
				?>
			</div>
		</div>
	<?}?>
</div>
```
