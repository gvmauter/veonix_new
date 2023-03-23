<?
// Category: main
$MESS['AMOPT_OPTION_GROUP_MAIN_TITLE'] = 'Основные параметры';
$MESS['AMOPT_OPTION_GROUP_MAIN_DESCRIPTION'] = 'Основные настройки обработки страниц. При выключенном статусе активности группы оптимизация проводиться не будет';
$MESS['AMOPT_OPTION_GROUP_MAIN_HELP'] = '';

// Option: main -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_MAIN_OPTION_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_MAIN_OPTION_ACTIVE_DESCRIPTION'] = 'Включает использование прочих возможностей оптимизации сайта';
$MESS['AMOPT_OPTION_GROUP_MAIN_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_OPTION_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_OPTION_ACTIVE_SHORT_N'] = '';

// Group: main -> parse
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_TITLE'] = 'Парсинг HTML';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_DESCRIPTION'] = 'Настройки парсинга HTML страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_HELP'] = '';

// Option group: main -> parse -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_DESCRIPTION'] = 'Библиотека для парсинга HTML страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_HELP'] = '';

// Variant: main -> parse -> LIBRARY -> domparser
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_VARIANT_DOMPARSER_TITLE'] = 'DOM Parser';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_VARIANT_DOMPARSER_DESCRIPTION'] = 'Библиотека, использующая PHP расширение DOM';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_VARIANT_DOMPARSER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_LIBRARY_SHORT'] = 'Библиотека парсинга';

// Option group: main -> parse -> CHECK_ENCODING_UTF8
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_ENCODING_UTF8_TITLE'] = 'Нормализовать кодировку UTF-8';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_ENCODING_UTF8_DESCRIPTION'] = 'Экспериментальная функция. В случае, если сайт работает в UTF-8 кодировки и в коде присутствуют символы в кодировке WINDOWS-1251 (начиная с какого то места на странице начинается текст в сбитой кодировке), то данная функция может автоматически нормализовать отображение страницы. Функция рекомендована к использованию только в случае невозможности исправить кодировки в исходных файлах (обычно файлы шаблона, файлы шаблонов компонентов)';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_ENCODING_UTF8_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_ENCODING_UTF8_SHORT_Y'] = 'Нормализовать кодировку UTF-8';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_ENCODING_UTF8_SHORT_N'] = '';

// Option group: main -> parse -> CHECK_NOTVALID_START_TAG
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_START_TAG_TITLE'] = 'Проверять невалидные символы начала тегов';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_START_TAG_DESCRIPTION'] = 'Экспериментальная функция. Если в коде сайта присутствует символ &lt;, который не прописан в коде как HTML-безопасный код, то при парсинге HTML он может определяться как открытие тега. В результате верстка после него может "ломаться". Данная функция преобразует данный символ в HTML-безопасный вид. Если данная функция помогла исправить ошибку на сайте то рекомендуем проверить код на присутствие данного символа и исправить его на ' . htmlspecialchars('&lt;');
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_START_TAG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_START_TAG_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_START_TAG_SHORT_N'] = '';

// Option group: main -> parse -> CHECK_NOTVALID_UTF8_SYMBOLS
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_UTF8_SYMBOLS_TITLE'] = 'Удалить невалидные UTF-8 символы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_UTF8_SYMBOLS_DESCRIPTION'] = 'Экспериментальная функция. Позволяет заменять невалидные UTF-8 символы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_UTF8_SYMBOLS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_UTF8_SYMBOLS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_PARSE_CHECK_NOTVALID_UTF8_SYMBOLS_SHORT_N'] = '';

// Group: main -> request
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_TITLE'] = 'Запросы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_DESCRIPTION'] = 'Какие типы запросов обрабатываются для оптимизации';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_HELP'] = '';

// Option group: main -> request -> ACTIVE_HTML
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_HTML_TITLE'] = 'HTML';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_HTML_DESCRIPTION'] = 'Обработка обычных запросов к странице. Страница должна содержать &lt;!DOCTYPE или &lt;html';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_HTML_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_HTML_SHORT_Y'] = 'HTML';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_HTML_SHORT_N'] = '';

// Option group: main -> request -> ACTIVE_AJAX
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AJAX_TITLE'] = 'AJAX';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AJAX_DESCRIPTION'] = 'Обработка AJAX запросов';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AJAX_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AJAX_SHORT_Y'] = 'AJAX';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AJAX_SHORT_N'] = '';

// Option group: main -> request -> ACTIVE_JSON
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_JSON_TITLE'] = 'JSON';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_JSON_DESCRIPTION'] = 'Обработка JSON данных';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_JSON_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_JSON_SHORT_Y'] = 'JSON';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_JSON_SHORT_N'] = '';

// Option group: main -> request -> ACTIVE_COMPONENT_AJAX
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPONENT_AJAX_TITLE'] = 'Компонентный Ajax';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPONENT_AJAX_DESCRIPTION'] = 'Обработка AJAX содержимого компонентов';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPONENT_AJAX_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPONENT_AJAX_SHORT_Y'] = 'Компонентный Ajax';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPONENT_AJAX_SHORT_N'] = '';

// Option group: main -> request -> ACTIVE_AUTOCOMPOSITE
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AUTOCOMPOSITE_TITLE'] = 'Автокомпозит';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AUTOCOMPOSITE_DESCRIPTION'] = 'Обработка запросов автокомпозита. (Функция является экспериментальной. При возникновении ошибок обратитесь в нашу службу технической поддержки по адресу support@ammina.ru. Документация по настройке режима находится по <a href="https://www.ammina.ru/documentation/course4/lesson139/?LESSON_PATH=97.98.139" target="_blank">ссылке</a>)';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AUTOCOMPOSITE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AUTOCOMPOSITE_SHORT_Y'] = 'Автокомпозит';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_AUTOCOMPOSITE_SHORT_N'] = '';

// Option group: main -> request -> ACTIVE_COMPOSITE
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPOSITE_TITLE'] = 'Композит';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPOSITE_DESCRIPTION'] = 'Обработка запросов композита. (Функция является экспериментальной. При возникновении ошибок обратитесь в нашу службу технической поддержки по адресу support@ammina.ru)';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPOSITE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPOSITE_SHORT_Y'] = 'Композит';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_REQUEST_ACTIVE_COMPOSITE_SHORT_N'] = '';

// Group: main -> other
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_TITLE'] = 'Прочие настройки';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DESCRIPTION'] = 'Прочие основные настройки';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_HELP'] = '';

// Option group: main -> other -> CHECK_BXRAND_SCRIPT
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_BXRAND_SCRIPT_TITLE'] = 'Разрешить перемещение скрипта автокомпозита вниз страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_BXRAND_SCRIPT_DESCRIPTION'] = 'Экспериментальная функция. При использовании автокомпозитного режима снимается аттрибут запрещения перемещения служебного скрипта вниз страницы. Позволяет разблокировать процесс исполнения страницы и ускорить ее отображение';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_BXRAND_SCRIPT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_BXRAND_SCRIPT_SHORT_Y'] = 'Разблокировать скрипт автокомпозита';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_BXRAND_SCRIPT_SHORT_N'] = '';

// Option group: main -> other -> CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS_TITLE'] = 'Компонентный ajax. Учитывать загруженные скрипты';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS_DESCRIPTION'] = 'При обработке запроса компонентного ajax не будут повторно загружаться уже загруженные JavaScript файлы. Включать данный режим имеет смысл при использовании на сайте ajax компонентов';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS_SHORT_Y'] = 'Не загружать уже загруженные JS в компонентном ajax';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS_SHORT_N'] = '';

// Option group: main -> other -> MOVE_JS_BODY
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BODY_TITLE'] = 'Переместить весь JavaScript в конец страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BODY_DESCRIPTION'] = 'Перемещение всего JavaScript кода в конец страницы. Замена медленной при большом размере страницы стандартной опции 1С-Битрикс';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BODY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BODY_SHORT_Y'] = 'Переместить весь JavaScript в конец страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BODY_SHORT_N'] = '';

// Option group: main -> other -> UNLOCK_SKIP_MOVE_JS_ASPRO
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_ASPRO_TITLE'] = 'Разблокировать запрет перемещения data-skip-moving для скриптов ASPRO';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_ASPRO_DESCRIPTION'] = 'Удаление аттрибута data-skip-moving для тегов script для скриптов ASPRO';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UUNLOCK_SKIP_MOVE_JS_ASPRO_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_ASPRO_SHORT_Y'] = 'Разблокировать data-skip-moving ASPRO';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_ASPRO_SHORT_N'] = '';

// Option group: main -> other -> UNLOCK_SKIP_MOVE_JS_HEAD
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_HEAD_TITLE'] = 'Разблокировать запрет перемещения data-skip-moving для скриптов, находящихся в теге head';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_HEAD_DESCRIPTION'] = 'Удаление аттрибута data-skip-moving для тегов script при их нахождении в теге head';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_HEAD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_HEAD_SHORT_Y'] = 'Разблокировать data-skip-moving в head';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_HEAD_SHORT_N'] = '';

// Option group: main -> other -> UNLOCK_SKIP_MOVE_JS_BODY
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_BODY_TITLE'] = 'Разблокировать запрет перемещения data-skip-moving для скриптов, находящихся в теге body';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_BODY_DESCRIPTION'] = 'Удаление аттрибута data-skip-moving для тегов script при их нахождении в теге body';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_BODY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_BODY_SHORT_Y'] = 'Разблокировать data-skip-moving в body';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_UNLOCK_SKIP_MOVE_JS_BODY_SHORT_N'] = '';

// Option group: main -> other -> REPLACE_BULLET
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_BULLET_TITLE'] = 'Заменить спецсимвол &amp;bullet; на валидный &amp;bull;';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_BULLET_DESCRIPTION'] = 'Замена спецсимвола на валидный. Применяется, например, в решении Битроник 2';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_BULLET_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_BULLET_SHORT_Y'] = 'Заменить спецсимвол &amp;bullet; на валидный';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_BULLET_SHORT_N'] = '';

// Option group: main -> other -> REPLACE_HTML_ENTITY
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_HTML_ENTITY_TITLE'] = 'Заменить спецсимволы на валидные HTML коды (по 1 замене в строке)';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_HTML_ENTITY_DESCRIPTION'] = 'Замена спецсимволов на валидные (возникает необходимость для некоторых спецсимволов. Например для спецсимвола &amp;plus; необходима замена на &amp#43;. Запись для данного случая: &amp;plus;=&amp#43;).';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_REPLACE_HTML_ENTITY_HELP'] = '';

// Option group: main -> other -> DISABLE_MAIN_JOIN_CSS
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_CSS_TITLE'] = 'Не использовать настройку &laquo;Объединять CSS файлы&raquo; в главном модуле';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_CSS_DESCRIPTION'] = 'Рекомендуется выключать данной опцией, либо в главном модуле. В противном случае возможно значительное увеличение кеша модуля';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_CSS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_CSS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_CSS_SHORT_N'] = '';

// Option group: main -> other -> DISABLE_MAIN_JOIN_JS
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_JS_TITLE'] = 'Не использовать настройку &laquo;Объединять JS файлы&raquo; в главном модуле';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_JS_DESCRIPTION'] = 'Рекомендуется выключать данной опцией, либо в главном модуле. В противном случае возможно значительное увеличение кеша модуля';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_JS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_JS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_JOIN_JS_SHORT_N'] = '';

// Option group: main -> other -> DISABLE_MAIN_MOVE_JS
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_MOVE_JS_TITLE'] = 'Не использовать настройку &laquo;Переместить весь Javascript в конец страницы&raquo; в главном модуле';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_MOVE_JS_DESCRIPTION'] = 'Рекомендуется выключать данной опцией, либо в главном модуле. В противном случае возможно значительное увеличение кеша модуля';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_MOVE_JS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_MOVE_JS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_DISABLE_MAIN_MOVE_JS_SHORT_N'] = '';

// Option group: main -> other -> MOVE_JS_BXSTAT_TOP
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BXSTAT_TOP_TITLE'] = 'Переместить скрипт BXStat вверх страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BXSTAT_TOP_DESCRIPTION'] = 'Переместить скрипт BXStat вверх страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BXSTAT_TOP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BXSTAT_TOP_SHORT_Y'] = 'Переместить скрипт BXStat вверх страницы';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MOVE_JS_BXSTAT_TOP_SHORT_N'] = '';

// Option group: main -> other -> MAKE_STATIC_ASPRO_SETTHEME
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MAKE_STATIC_ASPRO_SETTHEME_TITLE'] = 'Формировать скрипт setTheme.php как статичный JavaScript';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MAKE_STATIC_ASPRO_SETTHEME_DESCRIPTION'] = 'Формировать скрипт setTheme.php как статичный JavaScript';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MAKE_STATIC_ASPRO_SETTHEME_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MAKE_STATIC_ASPRO_SETTHEME_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_MAIN_GROUP_OTHER_MAKE_STATIC_ASPRO_SETTHEME_SHORT_N'] = '';

// Category: css
$MESS['AMOPT_OPTION_GROUP_CSS_TITLE'] = 'CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_DESCRIPTION'] = 'Настройки оптимизации CSS сайта';
$MESS['AMOPT_OPTION_GROUP_CSS_HELP'] = '';

// Option: css -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_OPTION_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_OPTION_ACTIVE_DESCRIPTION'] = 'Включить оптимизацию CSS сайта';
$MESS['AMOPT_OPTION_GROUP_CSS_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_OPTION_ACTIVE_SHORT_Y'] = 'Включено';
$MESS['AMOPT_OPTION_GROUP_CSS_OPTION_ACTIVE_SHORT_N'] = 'Нет';

// Group: css -> minify
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_TITLE'] = 'Минификация CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_DESCRIPTION'] = 'Настройки минификации стилей сайта';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_HELP'] = '';

// Option group: css -> minify -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_ACTIVE_TITLE'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_ACTIVE_DESCRIPTION'] = 'Опция включает минификацию CSS при помощи одной из выбранных библиотек';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_ACTIVE_SHORT_Y'] = 'Минифицировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_ACTIVE_SHORT_N'] = 'Не минифицировать';

// Option group: css -> minify -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_TITLE'] = 'Библиотека минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_DESCRIPTION'] = 'При помощи какой библиотеки будет проводиться минификация CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> sabberworm
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_SABBERWORM_TITLE'] = 'Sabberworm';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_SABBERWORM_DESCRIPTION'] = 'PHP библиотека минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_SABBERWORM_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> phpwee
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_PHPWEE_TITLE'] = 'PHP Wee';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_PHPWEE_DESCRIPTION'] = 'PHP библиотека минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_PHPWEE_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> matthiasmullie
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_MATTHIASMULLIE_TITLE'] = 'Matthias Mullie';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_MATTHIASMULLIE_DESCRIPTION'] = 'PHP библиотека минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_MATTHIASMULLIE_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> yuicompressor
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_YUICOMPRESSOR_TITLE'] = 'YUI Compressor';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_YUICOMPRESSOR_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_YUICOMPRESSOR_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> uglifycss
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYCSS_TITLE'] = 'Uglify CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYCSS_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYCSS_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> amminayuicompressor
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAYUICOMPRESSOR_TITLE'] = 'Ammina: YUI Compressor';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAYUICOMPRESSOR_DESCRIPTION'] = 'Node.js модуль минификации. Минификация на серверах веб-студии Ammina';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAYUICOMPRESSOR_HELP'] = '';

// Variant: css -> minify -> LIBRARY -> amminauglifycss
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAUGLIFYCSS_TITLE'] = 'Ammina: Uglify CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAUGLIFYCSS_DESCRIPTION'] = 'Node.js модуль минификации. Минификация на серверах веб-студии Ammina';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_VARIANT_AMMINAUGLIFYCSS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_LIBRARY_SHORT'] = 'библиотека';

// Option group: css -> minify -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_EXCLUDE_TITLE'] = 'Исключить из минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_EXCLUDE_DESCRIPTION'] = 'Файлы, соответствующие данным параметрам будут исключены из минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_EXCLUDE_SHORT'] = '';

// Option group: css -> minify -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_INCLUDE_TITLE'] = 'Включить в минификацию';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_INCLUDE_DESCRIPTION'] = 'Файлы, соответствующие данным параметрам будут добавлены для минификации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_MINIFY_INCLUDE_SHORT'] = '';

// Group: css -> external_css
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_TITLE'] = 'Оптимизация CSS со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_DESCRIPTION'] = 'Позволяет автоматически скачивать и оптимизировать CSS файлы со сторонних сайтов и отдавать браузеру посетителя в ответ на общий запрос';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_HELP'] = '';

// Option group: css -> external_css -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию CSS со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_ACTIVE_SHORT_Y'] = 'Оптимизировать со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_ACTIVE_SHORT_N'] = 'Не оптимизировать со сторонних сайтов';

// Option group: css -> external_css -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_EXCLUDE_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_EXCLUDE_DESCRIPTION'] = 'Исключает указанные файлы со сторонних сайтов из оптимизации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_EXCLUDE_SHORT'] = '';

// Option group: css -> external_css -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_INCLUDE_TITLE'] = 'Включить для оптимизации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_INCLUDE_DESCRIPTION'] = 'Включает указанные файлы со сторонних сайтов из оптимизации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_EXTERNAL_CSS_INCLUDE_SHORT'] = '';

// Group: js -> outline_css
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_TITLE'] = 'Преобразование Inline CSS в файлы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_DESCRIPTION'] = 'Позволяет преобразовать все или некоторые Inline CSS в файлы. Необходимо, например, для решений Intec';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_HELP'] = '';

// Option group: js -> outline_css -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_ACTIVE_DESCRIPTION'] = 'Разрешает размещать Inline CSS в файлах';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: js -> outline_css -> INCLUDE_CONTENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_INCLUDE_CONTENT_TITLE'] = 'Включить контент';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_INCLUDE_CONTENT_DESCRIPTION'] = 'Включает Inline CSS, содержащие указанный контент для преобразования в Outline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_INCLUDE_CONTENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_INCLUDE_CONTENT_SHORT'] = '';

// Option group: js -> outline_css -> EXCLUDE_CONTENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_EXCLUDE_CONTENT_TITLE'] = 'Исключить контент';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_EXCLUDE_CONTENT_DESCRIPTION'] = 'Исключает Inline CSS, содержащие указанный контент для преобразования в Outline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_EXCLUDE_CONTENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OUTLINE_CSS_EXCLUDE_CONTENT_SHORT'] = '';

// Group: css -> images
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_TITLE'] = 'Изображения';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_DESCRIPTION'] = 'Настройки обработки изображений из CSS файлов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_HELP'] = '';

// Option group: css -> images -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_ACTIVE_DESCRIPTION'] = 'Активирует обработку изображений из CSS файлов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_ACTIVE_SHORT_Y'] = 'Обработать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_ACTIVE_SHORT_N'] = 'Не обрабатывать';

// Option group: css -> images -> OPTIMIZE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_OPTIMIZE_TITLE'] = 'Оптимизировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_OPTIMIZE_DESCRIPTION'] = 'Производить или нет оптимизацию (в соответствии с настройкими оптимизации) изображений из CSS файлов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_OPTIMIZE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_OPTIMIZE_SHORT_Y'] = 'Оптимизировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_OPTIMIZE_SHORT_N'] = 'Не оптимизировать';

// Option group: css -> images -> INLINE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_INLINE_TITLE'] = 'Изображения Inline';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_INLINE_DESCRIPTION'] = 'Включает изображения, размеров менее указанного, в качестве Inline в CSS файл';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_INLINE_SHORT_Y'] = 'Разместить Inline';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_INLINE_SHORT_N'] = 'Не размещать Inline';

// Option group: css -> images -> MAX_IMAGE_SIZE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_MAX_IMAGE_SIZE_TITLE'] = 'Максимальный размер изображения';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_MAX_IMAGE_SIZE_DESCRIPTION'] = 'Максимальный размер файла изображения для включения его в Inline-виде в CSS файл';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_MAX_IMAGE_SIZE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_MAX_IMAGE_SIZE_SHORT'] = 'размер файла до';

// Option group: css -> images -> CONVERT_WEBP
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_CONVERT_WEBP_TITLE'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_CONVERT_WEBP_DESCRIPTION'] = 'При поддержке браузером посетителя преобразовывает изображения в WebP формат';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_CONVERT_WEBP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_CONVERT_WEBP_SHORT_Y'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_IMAGES_CONVERT_WEBP_SHORT_N'] = '';

// Group: css -> fonts
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_TITLE'] = 'Шрифты';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_DESCRIPTION'] = 'Настройки оптимизации шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_HELP'] = '';

// Option group: css -> fonts -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_ACTIVE_SHORT_Y'] = 'Оптимизировать шрифты';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_ACTIVE_SHORT_N'] = 'Не оптимизировать';

// Option group: css -> fonts -> LINK
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_TITLE'] = 'Отправлять заголовки предзагрузки';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_DESCRIPTION'] = 'Позволяет отправлять заголовки предзагрузки для файлов шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_SHORT_N'] = '';

// Option group: css -> fonts -> LINK_ALL_FONTS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_ALL_FONTS_TITLE'] = 'Отправлять заголовки предзагрузки для всех объявленных шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_ALL_FONTS_DESCRIPTION'] = 'Позволяет отправлять заголовки предзагрузки для всех файлов объявленных шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_ALL_FONTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_ALL_FONTS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_ALL_FONTS_SHORT_N'] = '';

// Option group: css -> fonts -> LINK_FONTS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_FONTS_TITLE'] = 'Обязательные шрифты';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_FONTS_DESCRIPTION'] = 'Шрифты, которые могут не входить в критичный CSS, но при этом обязательно нужны. Указываются названия через запятую. Для таких шрифтов будут так же сформированы заголовки предзагрузки';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_FONTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_LINK_FONTS_SHORT'] = '';

// Option group: css -> fonts -> UNICODE_RANGE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_UNICODE_RANGE_TITLE'] = 'Дополнительные диапазоны unicode-range для предзагрузки';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_UNICODE_RANGE_DESCRIPTION'] = 'Диапазоны unicode-range, для которых автоматически будут формироваться заголовки предзагрузки. Указывать в формате XXXX-XXXX в 16-ричном формате, разделяя диапазоны через запятую. Всегда формируются диапазоны для латиницы и кириллицы: 0020-00FF, 0410-044f';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_UNICODE_RANGE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_UNICODE_RANGE_SHORT'] = '';

// Option group: css -> fonts -> NORMALIZE_ORDER
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_NORMALIZE_ORDER_TITLE'] = 'Нормализовывать порядок типов шрифтов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_NORMALIZE_ORDER_DESCRIPTION'] = 'Позволяет нормализовать порядок типов шрифтов для правильной предзагрузки. Нормализуется в следующем порядке: woff2, woff, ttf, otf, svg, eot';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_NORMALIZE_ORDER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_NORMALIZE_ORDER_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_NORMALIZE_ORDER_SHORT_N'] = '';

// Option group: css -> fonts -> FONT_FACE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_TITLE'] = 'Добавить свойство font-display для правила определния шрифта';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_DESCRIPTION'] = 'Позволяет управлять режимом отображения веб-шрифта в браузере посетителя';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_HELP'] = '';

// Variant: css -> fonts -> FONT_FACE -> none
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_NONE_TITLE'] = 'Не менять';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_NONE_DESCRIPTION'] = 'никакие изменения в описания шрифтов вносится не будут';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_NONE_HELP'] = '';

// Variant: css -> fonts -> FONT_FACE -> auto
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_AUTO_TITLE'] = 'auto';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_AUTO_DESCRIPTION'] = 'в описания шрифтов @font-face будет добавлено CSS свойство font-display: auto;';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_AUTO_HELP'] = '';

// Variant: css -> fonts -> FONT_FACE -> swap
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_SWAP_TITLE'] = 'swap';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_SWAP_DESCRIPTION'] = 'в описания шрифтов @font-face будет добавлено CSS свойство font-display: swap;';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_SWAP_HELP'] = '';

// Variant: css -> fonts -> FONT_FACE -> fallback
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_FALLBACK_TITLE'] = 'fallback';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_FALLBACK_DESCRIPTION'] = 'в описания шрифтов @font-face будет добавлено CSS свойство font-display: fallback;';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_VARIANT_FALLBACK_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_FONT_FACE_SHORT'] = '';

// Option group: css -> fonts -> GOOGLE_FONTS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TITLE'] = 'Обрабатывать Google Fonts';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_DESCRIPTION'] = 'Позволяет обрабатывать и оптимизировать подключение шрифтов с Google Fonts';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_SHORT_Y'] = 'Обрабатывать Google Fonts';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_SHORT_N'] = '';

// Option group: css -> fonts -> GOOGLE_FONTS_TYPE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_TITLE'] = 'Тип обработки шрифтов Google Fonts';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_DESCRIPTION'] = 'Позволяет указать какой тип обработки использовать для шрифтов Google Fonts';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_HELP'] = '';

// Variant: css -> fonts -> GOOGLE_FONTS_TYPE -> standart
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_STANDART_TITLE'] = 'Стандартный режим';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_STANDART_DESCRIPTION'] = 'Стандартный режим описания шрифта с указанием доступных вариантов типов файлов. Рекомендуется к использованию';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_STANDART_HELP'] = '';

// Variant: css -> fonts -> GOOGLE_FONTS_TYPE -> ua
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_UA_TITLE'] = 'С учетом UserAgent';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_UA_DESCRIPTION'] = 'В данном случае полностью дублируется ответ GoogleFonts в зависимости от UserAgent посетителя. Не рекомендуется к использованию в связи с возможными задержками кэширования при первом заходе посетителя и разрастании кэша';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_VARIANT_UA_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_GOOGLE_FONTS_TYPE_SHORT'] = '';

// Option group: css -> fonts -> INLINE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_INLINE_TITLE'] = 'Разместить файлы стилей шрифтов Inline';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_INLINE_DESCRIPTION'] = 'Позволяет разместить файл стилей шрифтов непосредственно в HTML коде страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_INLINE_SHORT_Y'] = 'CSS шрифтов разместить Inline';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_FONTS_INLINE_SHORT_N'] = '';

// Group: css -> critical
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_TITLE'] = 'Критический CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_DESCRIPTION'] = 'Настройки обработки критического CSS (т.е. который необходим непосредственно при загрузке страницы)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_HELP'] = '';

// Option group: css -> critical -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ACTIVE_DESCRIPTION'] = 'Включает обработку критического CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ACTIVE_SHORT_Y'] = 'Обрабатывать Critical CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ACTIVE_SHORT_N'] = 'Не обрабатывать Critical CSS';

// Option group: css -> critical -> USE_TAG_IDENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_TAG_IDENT_TITLE'] = 'Включить обработку идентификаторов тегов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_TAG_IDENT_DESCRIPTION'] = 'Включает обработку аттрибута id в тегах для идентификации критического CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_TAG_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_TAG_IDENT_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_TAG_IDENT_SHORT_N'] = '';

// Option group: css -> critical -> ADD_CLASS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_CLASS_TITLE'] = 'Добавить классы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_CLASS_DESCRIPTION'] = 'Список классов тегов, которые будут добавлены при создании CriticalCSS (через запятую. Только названия классов)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_CLASS_SHORT'] = '';

// Option group: css -> critical -> ADD_IDENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_IDENT_TITLE'] = 'Добавить идентификаторы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_IDENT_DESCRIPTION'] = 'Список идентификаторов тегов, только которые будут добавлены при создании CriticalCSS (через запятую. Только названия идентификаторов)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ADD_IDENT_SHORT'] = '';

// Option group: css -> critical -> ONLY_CLASS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_CLASS_TITLE'] = 'Только классы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_CLASS_DESCRIPTION'] = 'Список классов тегов, только которые будут использованы при создании CriticalCSS (через запятую. Только названия классов. Необходимо вручную выделить классы CSS, которые считаются критическим CSS)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_CLASS_SHORT'] = '';

// Option group: css -> critical -> ONLY_IDENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_IDENT_TITLE'] = 'Только идентификаторы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_IDENT_DESCRIPTION'] = 'Список идентификаторов тегов, только которые будут использованы при создании CriticalCSS (через запятую. Только названия идентификаторов. Необходимо вручную выделить классы CSS, которые считаются критическим CSS)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_ONLY_IDENT_SHORT'] = '';

// Option group: css -> critical -> IGNORE_CLASS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_CLASS_TITLE'] = 'Игнорируемые классы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_CLASS_DESCRIPTION'] = 'Список классов тегов, которые будут проигнорированы при создании CriticalCSS (через запятую. Только названия классов)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_CLASS_SHORT'] = '';

// Option group: css -> critical -> IGNORE_IDENT
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_IDENT_TITLE'] = 'Игнорируемые идентификаторы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_IDENT_DESCRIPTION'] = 'Список идентификаторов тегов, которые будут проигнорированы при создании CriticalCSS (через запятую. Только названия идентификаторов)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_IGNORE_IDENT_SHORT'] = '';

// Option group: css -> critical -> MAX_CRITICAL_RECORD
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_MAX_CRITICAL_RECORD_TITLE'] = 'Максимальное количество вариантов';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_MAX_CRITICAL_RECORD_DESCRIPTION'] = 'Максимальное количество вариантов критического CSS для одной полной сборки CSS. Все остальные варианты будут браться из последнего сгенерированно варианта CriticalCSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_MAX_CRITICAL_RECORD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_MAX_CRITICAL_RECORD_SHORT'] = '';

// Option group: css -> critical -> USE_UNCRITICAL
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_UNCRITICAL_TITLE'] = 'Обрабатывать NonCritical CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_UNCRITICAL_DESCRIPTION'] = 'При включении данной настройки, после обработки критического CSS будет выделяться CSS код, который будет подключен как файл. В противном случае будет подключаться полный файл CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_UNCRITICAL_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_UNCRITICAL_SHORT_Y'] = 'Обрабатывать NonCritical CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_CRITICAL_USE_UNCRITICAL_SHORT_N'] = '';

// Group: css -> other
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_TITLE'] = 'Прочие настройки CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DESCRIPTION'] = 'Прочие настройки оптимзации CSS сайта';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_HELP'] = '';

// Option group: css -> other -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_EXCLUDE_FILES_DESCRIPTION'] = 'Какие файлы будут исключены из оптимизации CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_EXCLUDE_FILES_SHORT'] = '';

// Option group: css -> other -> INLINE_CSS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_CSS_TITLE'] = 'Inline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_CSS_DESCRIPTION'] = 'Разрешает размещать CSS непосредственно в HTML коде страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_CSS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_CSS_SHORT_Y'] = 'CSS разместить Inline';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_CSS_SHORT_N'] = '';

// Option group: css -> other -> MAX_SIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MAX_SIZE_INLINE_TITLE'] = 'Максимальный размер файла для Inline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MAX_SIZE_INLINE_DESCRIPTION'] = 'Максимальный размер CSS кода для размещения Inline в HTML коде страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MAX_SIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MAX_SIZE_INLINE_SHORT'] = 'Максимальный размер CSS кода inline';

// Option group: css -> other -> INLINE_BEFORE_BODY
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_BEFORE_BODY_TITLE'] = 'Разместить CSS в конце страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_BEFORE_BODY_DESCRIPTION'] = 'Inline CSS будет размещен непосредственно перед закрывающим тегом body';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_BEFORE_BODY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_BEFORE_BODY_SHORT_Y'] = 'Inline в конце страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_INLINE_BEFORE_BODY_SHORT_N'] = '';

// Option group: css -> other -> OUTLINE_CSS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_CSS_TITLE'] = 'Outline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_CSS_DESCRIPTION'] = 'Разрешает разместить весь CSS код, размещенный Inline в файлы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_CSS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_CSS_SHORT_Y'] = 'CSS из Inline в файлы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_CSS_SHORT_N'] = '';

// Option group: css -> other -> MIN_SIZE_OUTLINE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MIN_SIZE_OUTLINE_TITLE'] = 'Минимальный размер для Outline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MIN_SIZE_OUTLINE_DESCRIPTION'] = 'Минимальный размер CSS кода Inline для размещения его в файле';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MIN_SIZE_OUTLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MIN_SIZE_OUTLINE_SHORT'] = '';

// Option group: css -> other -> OUTLINE_TO_SEPARATE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_TO_SEPARATE_TITLE'] = 'Outline в отдельный файл';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_TO_SEPARATE_DESCRIPTION'] = 'Размещает Outline CSS в отдельный файл';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_TO_SEPARATE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_TO_SEPARATE_SHORT_Y'] = 'Outline CSS в отдельный файл';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OUTLINE_TO_SEPARATE_SHORT_N'] = '';

// Option group: css -> other -> OPTIMIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OPTIMIZE_INLINE_TITLE'] = 'Оптимизировать Inline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OPTIMIZE_INLINE_DESCRIPTION'] = 'Весь CSS код, который находится Inline будет оптимизирован в соответствии с настройками';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OPTIMIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OPTIMIZE_INLINE_SHORT_Y'] = 'Оптимизировать Inline CSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_OPTIMIZE_INLINE_SHORT_N'] = '';

// Option group: css -> other -> CHECK_BX_CSS
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_CHECK_BX_CSS_TITLE'] = 'Проверять BX.loadCSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_CHECK_BX_CSS_DESCRIPTION'] = 'Так же проверять JavaScript команду подключения стилей BX.loadCSS';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_CHECK_BX_CSS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_CHECK_BX_CSS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_CHECK_BX_CSS_SHORT_N'] = '';

// Option group: css -> other -> MOVE_STYLE_BOTTOM
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MOVE_STYLE_BOTTOM_TITLE'] = 'Переместить теги style вниз страницы';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MOVE_STYLE_BOTTOM_DESCRIPTION'] = 'Перемещает теги style перед закрывающим тегом body. Необходимо при использовании критического CSS и при наличии перезаписываемого CSS кода (например стилевые настройки некоторых сайтов и готовых решений)';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MOVE_STYLE_BOTTOM_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MOVE_STYLE_BOTTOM_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_MOVE_STYLE_BOTTOM_SHORT_N'] = '';

// Option group: css -> other -> DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251_TITLE'] = 'Конвертировать в UTF-8 перед обработкой для сайта Windows-1251';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251_DESCRIPTION'] = 'Перед обработкой и после обработки CSS, конвертировать его в UTF-8 и обратно. Для сайтов, работающих в Windows-1251 кодировке';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_CSS_GROUP_OTHER_DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251_SHORT_N'] = '';

// Category: js
$MESS['AMOPT_OPTION_GROUP_JS_TITLE'] = 'JavaScript';
$MESS['AMOPT_OPTION_GROUP_JS_DESCRIPTION'] = 'Настройки оптимизации JavaScript сайта';
$MESS['AMOPT_OPTION_GROUP_JS_HELP'] = '';

// Option: js -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_JS_OPTION_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_JS_OPTION_ACTIVE_DESCRIPTION'] = 'Включает оптимизацию JavaScript сайта';
$MESS['AMOPT_OPTION_GROUP_JS_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_OPTION_ACTIVE_SHORT_Y'] = 'Включено';
$MESS['AMOPT_OPTION_GROUP_JS_OPTION_ACTIVE_SHORT_N'] = 'Нет';

// Group: js -> minify
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_TITLE'] = 'Минификация JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_DESCRIPTION'] = 'Настройки минификации JavaScript';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_HELP'] = '';

// Option group: js -> minify -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_ACTIVE_DESCRIPTION'] = 'Включает минификацию JavaScript сайта при помощи выбранной библиотеки';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_ACTIVE_SHORT_Y'] = 'Минифицировать';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_ACTIVE_SHORT_N'] = '';

// Option group: js -> minify -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_TITLE'] = 'Библиотека минификации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_DESCRIPTION'] = 'При помощи какой библиотеки будет проводиться минификация JavaScript';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_HELP'] = '';

// Variant: js -> minify -> LIBRARY -> uglifyjs
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS_TITLE'] = 'Uglify JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS_HELP'] = '';

// Variant: js -> minify -> LIBRARY -> uglifyjs2
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS2_TITLE'] = 'Uglify JS 2';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS2_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_UGLIFYJS2_HELP'] = '';

// Variant: js -> minify -> LIBRARY -> terserjs
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_TERSERJS_TITLE'] = 'Terser JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_TERSERJS_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_TERSERJS_HELP'] = '';

// Variant: js -> minify -> LIBRARY -> babelminify
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_BABELMINIFY_TITLE'] = 'Babel minify';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_BABELMINIFY_DESCRIPTION'] = 'Node.js модуль минификации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_LIBRARY_VARIANT_BABELMINIFY_HELP'] = '';

// Option group: js -> minify -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_EXCLUDE_TITLE'] = 'Исключить';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_EXCLUDE_DESCRIPTION'] = 'Исключает из минификации указанные файлы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_EXCLUDE_SHORT'] = '';

// Option group: js -> minify -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_INCLUDE_TITLE'] = 'Включить';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_INCLUDE_DESCRIPTION'] = 'Включает в минификацию указанные файлы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_MINIFY_INCLUDE_SHORT'] = '';

// Group: js -> external_js
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_TITLE'] = 'Оптимизировать JS со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_DESCRIPTION'] = 'Позволяет скачивать, оптимизировать и отдавать общим файлов JavaScript страницы, который подключен со сторонних сайтов (например библиотеки, плагины и тп)';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_HELP'] = '';

// Option group: js -> external_js -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_ACTIVE_DESCRIPTION'] = 'Включает обработку JS со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_ACTIVE_SHORT_Y'] = 'Обработка JS со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_ACTIVE_SHORT_N'] = 'Не обрабатывать JS со сторонних сайтов';

// Option group: js -> external_js -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_EXCLUDE_TITLE'] = 'Исключить';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_EXCLUDE_DESCRIPTION'] = 'Исключает указанные JS со сторонних сайтов из обработки';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_EXCLUDE_SHORT'] = '';

// Option group: js -> external_js -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_INCLUDE_TITLE'] = 'Включить';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_INCLUDE_DESCRIPTION'] = 'Включает указанные JS со сторонних сайтов для обработки';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXTERNAL_JS_INCLUDE_SHORT'] = '';

// Group: js -> outline_js
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_TITLE'] = 'Преобразование Inline JS в файлы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_DESCRIPTION'] = 'Позволяет преобразовать все или некоторые Inline JavaScript в файлы для корректной работы. Необходимо, например, для работы LazyLoad решения Aspro.Max';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_HELP'] = '';

// Option group: js -> outline_js -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_ACTIVE_DESCRIPTION'] = 'Разрешает размещать Inline JS в файлах';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: js -> outline_js -> INCLUDE_CONTENT
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_INCLUDE_CONTENT_TITLE'] = 'Включить контент';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_INCLUDE_CONTENT_DESCRIPTION'] = 'Включает Inline JS, содержащие указанный контент для преобразования в Outline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_INCLUDE_CONTENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_INCLUDE_CONTENT_SHORT'] = '';

// Option group: js -> outline_js -> EXCLUDE_CONTENT
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_EXCLUDE_CONTENT_TITLE'] = 'Исключить контент';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_EXCLUDE_CONTENT_DESCRIPTION'] = 'Исключает Inline JS, содержащие указанный контент для преобразования в Outline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_EXCLUDE_CONTENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OUTLINE_JS_EXCLUDE_CONTENT_SHORT'] = '';

// Group: js -> other
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_TITLE'] = 'Прочие настройки JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DESCRIPTION'] = 'Прочие настройки оптимзации JS сайта';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_HELP'] = '';

// Option group: js -> other -> INLINE_JS
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_INLINE_JS_TITLE'] = 'Inline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_INLINE_JS_DESCRIPTION'] = 'Разрешает размещать JS непосредственно в HTML коде страницы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_INLINE_JS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_INLINE_JS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_INLINE_JS_SHORT_N'] = '';

// Option group: js -> other -> MAX_SIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MAX_SIZE_INLINE_TITLE'] = 'Максимальный размер файла для Inline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MAX_SIZE_INLINE_DESCRIPTION'] = 'Максимальный размер JS кода для размещения Inline в HTML коде страницы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MAX_SIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MAX_SIZE_INLINE_SHORT'] = '';

// Option group: js -> other -> DOUBLE_CONVERT_WIN1251
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DOUBLE_CONVERT_WIN1251_TITLE'] = 'Двойная перекодировка JS файлов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DOUBLE_CONVERT_WIN1251_DESCRIPTION'] = 'Возможность для скриптов JS на сайтах с кодировкой windows-1251 проводить двойную конвертацию кодировки (до и после минификации). Применяется в случае наличия в JS файлов языковых строк в кодировке, отличной от UTF-8';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DOUBLE_CONVERT_WIN1251_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DOUBLE_CONVERT_WIN1251_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_DOUBLE_CONVERT_WIN1251_SHORT_N'] = '';

// Option group: js -> other -> OUTLINE_JS
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_JS_TITLE'] = 'Outline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_JS_DESCRIPTION'] = 'Разрешает разместить весь JS код, размещенный Inline в файлы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_JS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_JS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_JS_SHORT_N'] = '';

// Option group: js -> other -> MIN_SIZE_OUTLINE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MIN_SIZE_OUTLINE_TITLE'] = 'Минимальный размер для Outline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MIN_SIZE_OUTLINE_DESCRIPTION'] = 'Минимальный размер JS кода Inline для размещения его в файле';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MIN_SIZE_OUTLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_MIN_SIZE_OUTLINE_SHORT'] = '';

// Option group: js -> other -> OUTLINE_TO_SEPARATE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_TO_SEPARATE_TITLE'] = 'Outline в отдельный файл';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_TO_SEPARATE_DESCRIPTION'] = 'Размещает Outline JS в отдельный файл';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_TO_SEPARATE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_TO_SEPARATE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OUTLINE_TO_SEPARATE_SHORT_N'] = '';

// Option group: js -> other -> OPTIMIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OPTIMIZE_INLINE_TITLE'] = 'Оптимизировать Inline JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OPTIMIZE_INLINE_DESCRIPTION'] = 'Весь JS код, который находится Inline будет оптимизирован в соответствии с настройками';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OPTIMIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OPTIMIZE_INLINE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_OPTIMIZE_INLINE_SHORT_N'] = '';

// Option group: js -> other -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_EXCLUDE_FILES_DESCRIPTION'] = 'Какие файлы будут исключены из оптимизации JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_OTHER_EXCLUDE_FILES_SHORT'] = '';

// Group: js -> ext
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_TITLE'] = 'Дополнительные настройки JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_DESCRIPTION'] = 'Дополнительные настройки обработки JS';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_HELP'] = '';

// Option group: js -> ext -> CHECK_CORE_FILES
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_CHECK_CORE_FILES_TITLE'] = 'Дополнительная обработка файлов ядра Битрикс';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_CHECK_CORE_FILES_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_CHECK_CORE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_CHECK_CORE_FILES_SHORT_Y'] = 'Включить дополнительную обработку файлов ядра';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_CHECK_CORE_FILES_SHORT_N'] = '';

// Option group: js -> ext -> JOIN_MODEL
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_TITLE'] = 'Режим создания пакетов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_DESCRIPTION'] = 'Режим создания пакетов (сборок) JavaScript. Оптимальные режимы - "Объединить в несколько пакетов" и "Не объединять"';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_HELP'] = '';

// Variant: js -> ext -> JOIN_MODEL -> keeporder
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_KEEPORDER_TITLE'] = 'Объединить в несколько пакетов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_KEEPORDER_DESCRIPTION'] = 'JS скрипты объединяются в несколько пакетов с соблюдением порядка нахождения в коде и inline скриптов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_KEEPORDER_HELP'] = '';

// Variant: js -> ext -> JOIN_MODEL -> notjoin
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_NOTJOIN_TITLE'] = 'Не объединять';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_NOTJOIN_DESCRIPTION'] = 'В данном режиме операции по объединению JS скриптов осуществляются ядром 1с-битрикс в соответствии с настройками главного модуля. Модуль оптимизации управляет только минификацией, обработкой JS со сторонних сайтов и предзагрузкой скриптов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_NOTJOIN_HELP'] = '';

// Variant: js -> ext -> JOIN_MODEL -> onlypreload
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_ONLYPRELOAD_TITLE'] = 'Только предзагрузка';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_ONLYPRELOAD_DESCRIPTION'] = 'В данном режиме операции по объединению JS скриптов осуществляются ядром 1с-битрикс в соответствии с настройками главного модуля. Модуль оптимизации управляет только предзагрузкой скриптов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_ONLYPRELOAD_HELP'] = '';

// Variant: js -> ext -> JOIN_MODEL -> bundle
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_BUNDLE_TITLE'] = 'Объединить в 1 пакет';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_BUNDLE_DESCRIPTION'] = 'Объединяет все JS скрипты в 1 пакет (старый режим до версии 3.5.0)';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_JOIN_MODEL_VARIANT_BUNDLE_HELP'] = '';

// Option group: js -> ext -> SET_DEFER
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_SET_DEFER_TITLE'] = 'Установить аттрибут Defer';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_SET_DEFER_DESCRIPTION'] = 'Функция устанавливает аттрибут defer JavaScript тегам, что позволяет отложить выполнение JavaScript до момента полного парсинга HTML страницы';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_SET_DEFER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_SET_DEFER_SHORT_Y'] = 'Установить аттрибут Defer';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_SET_DEFER_SHORT_N'] = '';

// Option group: js -> ext -> EXCLUDE_DEFER
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_EXCLUDE_DEFER_TITLE'] = 'Не использовать Defer на страницах';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_EXCLUDE_DEFER_DESCRIPTION'] = 'На указанных страницах аттрибут defer не будет установлен';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_EXCLUDE_DEFER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_EXCLUDE_DEFER_SHORT'] = '';

// Option group: js -> ext -> INCLUDE_DEFER
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_INCLUDE_DEFER_TITLE'] = 'Использовать Defer на страницах';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_INCLUDE_DEFER_DESCRIPTION'] = 'На указанных страницах аттрибут defer будет установлен';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_INCLUDE_DEFER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_INCLUDE_DEFER_SHORT'] = '';

// Option group: js -> ext -> COMPOSITE_MOVE_END
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_END_TITLE'] = 'Переместить inline скрипты в композитных фреймах';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_END_DESCRIPTION'] = 'Функция перемещает inline скрипты, используемые в композитных фреймах в конец страницы и выполнение начинается по событию OnLoad';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_END_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_END_SHORT_Y'] = 'Переместить композитные Inline скрипты';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_END_SHORT_N'] = '';

// Option group: js -> ext -> COMPOSITE_MOVE_TIMEOUT
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_TITLE'] = 'Переместить inline скрипты в композитных фреймах по таймауту';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_DESCRIPTION'] = 'Подключение Inline скриптов будет выполняться по событию OnLoad и таймауту';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_SHORT_Y'] = 'Таймаут композитных Inline скрипты';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_SHORT_N'] = '';

// Option group: js -> ext -> COMPOSITE_MOVE_TIMEOUT_VALUE
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_VALUE_TITLE'] = 'Таймаут, мс';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_VALUE_DESCRIPTION'] = 'Величина таймаута для подключения Inline скриптов';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_VALUE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_JS_GROUP_EXT_COMPOSITE_MOVE_TIMEOUT_VALUE_SHORT'] = '';

// Category: images
$MESS['AMOPT_OPTION_GROUP_IMAGES_TITLE'] = 'Изображения';
$MESS['AMOPT_OPTION_GROUP_IMAGES_DESCRIPTION'] = 'Настройки оптимизации изображений сайта';
$MESS['AMOPT_OPTION_GROUP_IMAGES_HELP'] = '';

// Option: images -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_OPTION_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_OPTION_ACTIVE_DESCRIPTION'] = 'Включает оптимизацию изображений сайта';
$MESS['AMOPT_OPTION_GROUP_IMAGES_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_OPTION_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_OPTION_ACTIVE_SHORT_N'] = '';

// Group: images -> search_model
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_TITLE'] = 'Модель поиска изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_DESCRIPTION'] = 'Настройки мест поиска изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_HELP'] = '';

// Option group: images -> search_model -> CHECK_IMG
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_IMG_TITLE'] = 'Проверять тег IMG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_IMG_DESCRIPTION'] = 'При поиске изображений проверяется тег IMG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_IMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_IMG_SHORT_Y'] = 'Тег IMG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_IMG_SHORT_N'] = '';

// Option group: images -> search_model -> CHECK_SRCSET_IMG
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_SRCSET_IMG_TITLE'] = 'Проверять тег IMG, аттрибут srcset';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_SRCSET_IMG_DESCRIPTION'] = 'При поиске изображений проверяется тег IMG, аттрибут srcset';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_SRCSET_IMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_SRCSET_IMG_SHORT_Y'] = 'Тег IMG (srcset аттрибут)';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_SRCSET_IMG_SHORT_N'] = '';

// Option group: images -> search_model -> CHECK_BACKGROUND
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_BACKGROUND_TITLE'] = 'Проверять свойство background[-image]';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_BACKGROUND_DESCRIPTION'] = 'Проверяет наличие изображений в свойстве background[-image] стилей';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_BACKGROUND_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_BACKGROUND_SHORT_Y'] = 'Свойство background[-image]';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_BACKGROUND_SHORT_N'] = '';

// Option group: images -> search_model -> CHECK_DATA_SRC
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_DATA_SRC_TITLE'] = 'Проверка аттрибута data-src';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_DATA_SRC_DESCRIPTION'] = 'Проверяет наличие изображений в аттрибуте data-src';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_DATA_SRC_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_DATA_SRC_SHORT_Y'] = 'Аттрибут data-src';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_DATA_SRC_SHORT_N'] = '';

// Option group: images -> search_model -> CHECK_ATTRIBUTES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ATTRIBUTES_TITLE'] = 'Проверять изображения во всех аттрибутах';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ATTRIBUTES_DESCRIPTION'] = 'Проверяет наличие изображений во всех аттрибутах HTML тегов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ATTRIBUTES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ATTRIBUTES_SHORT_Y'] = 'Все аттрибуты';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ATTRIBUTES_SHORT_N'] = '';

// Option group: images -> search_model -> CHECK_ALL_OTHER
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ALL_OTHER_TITLE'] = 'Проверять изображения во всем коде';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ALL_OTHER_DESCRIPTION'] = 'Проверяет наличие изображений во всем коде страницы в кавычках';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ALL_OTHER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ALL_OTHER_SHORT_Y'] = 'Во всем коде';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SEARCH_MODEL_CHECK_ALL_OTHER_SHORT_N'] = '';

// Group: images -> jpg_files
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_TITLE'] = 'Оптимизация JPG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_DESCRIPTION'] = 'Настройки оптимизации JPG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_HELP'] = '';

// Option group: images -> jpg_files -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию JPG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_ACTIVE_SHORT_Y'] = 'Обрабатывать JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_ACTIVE_SHORT_N'] = '';

// Option group: images -> jpg_files -> QUALITY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_QUALITY_TITLE'] = 'Качество сжатия JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_QUALITY_DESCRIPTION'] = 'Качество сжатия JPG файлов [1..100]';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_QUALITY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_QUALITY_SHORT'] = '';

// Option group: images -> jpg_files -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_DESCRIPTION'] = 'Библиотека для оптимизации изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_HELP'] = '';

// Variant: images -> jpg_files -> LIBRARY -> phpimagick
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_PHPIMAGICK_TITLE'] = 'PHP Imagick';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_PHPIMAGICK_DESCRIPTION'] = 'Модуль PHP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_PHPIMAGICK_HELP'] = '';

// Variant: images -> jpg_files -> LIBRARY -> jpegoptim
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_JPEGOPTIM_TITLE'] = 'JPEG Optim';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_JPEGOPTIM_DESCRIPTION'] = 'Програмная библиотека оптимизации JPG изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_LIBRARY_VARIANT_JPEGOPTIM_HELP'] = '';

// Option group: images -> jpg_files -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_FILES_DESCRIPTION'] = 'Файлы для исключения из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_FILES_SHORT'] = '';

// Option group: images -> jpg_files -> INCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_FILES_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_FILES_DESCRIPTION'] = 'Включение файлов в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_FILES_SHORT'] = '';

// Option group: images -> jpg_files -> CONVERT_WEBP
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_CONVERT_WEBP_TITLE'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_CONVERT_WEBP_DESCRIPTION'] = 'При поддержке браузером посетителя преобразовывает изображения в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_CONVERT_WEBP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_CONVERT_WEBP_SHORT_Y'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_CONVERT_WEBP_SHORT_N'] = '';

// Option group: images -> jpg_files -> EXCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_WEBP_FILES_TITLE'] = 'Исключить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_WEBP_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_EXCLUDE_WEBP_FILES_SHORT'] = '';

// Option group: images -> jpg_files -> INCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_WEBP_FILES_TITLE'] = 'Включить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_WEBP_FILES_DESCRIPTION'] = 'Включает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_JPG_FILES_INCLUDE_WEBP_FILES_SHORT'] = '';

// Group: images -> png_files
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_TITLE'] = 'Оптимизация PNG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_DESCRIPTION'] = 'Настройки оптимизации PNG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_HELP'] = '';

// Option group: images -> png_files -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию PNG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_ACTIVE_SHORT_N'] = '';

// Option group: images -> png_files -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_DESCRIPTION'] = 'Библиотека для оптимизации изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_HELP'] = '';

// Variant: images -> png_files -> LIBRARY -> phpimagick
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PHPIMAGICK_TITLE'] = 'PHP Imagick';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PHPIMAGICK_DESCRIPTION'] = 'Модуль PHP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PHPIMAGICK_HELP'] = '';

// Variant: images -> png_files -> LIBRARY -> optipng
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_OPTIPNG_TITLE'] = 'Opti PNG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_OPTIPNG_DESCRIPTION'] = 'Програмная библиотека оптимизации PNG изображений без потери качества';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_OPTIPNG_HELP'] = '';

// Variant: images -> png_files -> LIBRARY -> pngquant
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PNGQUANT_TITLE'] = 'PNG Quant';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PNGQUANT_DESCRIPTION'] = 'Програмная библиотека оптимизации PNG изображений с потерей качества';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_LIBRARY_VARIANT_PNGQUANT_HELP'] = '';

// Option group: images -> png_files -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_FILES_DESCRIPTION'] = 'Файлы для исключения из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_FILES_SHORT'] = '';

// Option group: images -> png_files -> INCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_FILES_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_FILES_DESCRIPTION'] = 'Включение файлов в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_FILES_SHORT'] = '';

// Option group: images -> png_files -> CONVERT_WEBP
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_WEBP_TITLE'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_WEBP_DESCRIPTION'] = 'При поддержке браузером посетителя преобразовывает изображения в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_WEBP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_WEBP_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_WEBP_SHORT_N'] = '';

// Option group: images -> png_files -> EXCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_WEBP_FILES_TITLE'] = 'Исключить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_WEBP_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_WEBP_FILES_SHORT'] = '';

// Option group: images -> png_files -> INCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_WEBP_FILES_TITLE'] = 'Включить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_WEBP_FILES_DESCRIPTION'] = 'Включает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_WEBP_FILES_SHORT'] = '';

// Option group: images -> png_files -> CONVERT_JPG
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_JPG_TITLE'] = 'Преобразовать в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_JPG_DESCRIPTION'] = 'Преобразовывать PNG файлы в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_JPG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_JPG_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_CONVERT_JPG_SHORT_N'] = '';

// Option group: images -> png_files -> EXCLUDE_JPG_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_JPG_FILES_TITLE'] = 'Исключить из преобразования в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_JPG_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в JPG формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_JPG_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_EXCLUDE_JPG_FILES_SHORT'] = '';

// Option group: images -> png_files -> INCLUDE_JPG_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_JPG_FILES_TITLE'] = 'Включить из преобразования в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_JPG_FILES_DESCRIPTION'] = 'Включает файлы из преобразования в JPG формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_JPG_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_PNG_FILES_INCLUDE_JPG_FILES_SHORT'] = '';

// Group: images -> gif_files
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_TITLE'] = 'Оптимизация GIF файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_DESCRIPTION'] = 'Настройки оптимизации GIF файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_HELP'] = '';

// Option group: images -> gif_files -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию GIF файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_ACTIVE_SHORT_N'] = '';

// Option group: images -> gif_files -> QUALITY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_QUALITY_TITLE'] = 'Качество';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_QUALITY_DESCRIPTION'] = 'Качество оптимизации GIF';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_QUALITY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_QUALITY_SHORT'] = '';

// Option group: images -> gif_files -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_DESCRIPTION'] = 'Библиотека для оптимизации изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_HELP'] = '';

// Variant: images -> gif_files -> LIBRARY -> phpimagick
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_PHPIMAGICK_TITLE'] = 'PHP Imagick';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_PHPIMAGICK_DESCRIPTION'] = 'Модуль PHP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_PHPIMAGICK_HELP'] = '';

// Variant: images -> gif_files -> LIBRARY -> gifsicle
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_GIFSICLE_TITLE'] = 'GIFSicle';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_GIFSICLE_DESCRIPTION'] = 'Програмная библиотека оптимизации GIF изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_LIBRARY_VARIANT_GIFSICLE_HELP'] = '';

// Option group: images -> gif_files -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_FILES_DESCRIPTION'] = 'Файлы для исключения из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_FILES_SHORT'] = '';

// Option group: images -> gif_files -> INCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_FILES_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_FILES_DESCRIPTION'] = 'Включение файлов в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_FILES_SHORT'] = '';

// Option group: images -> gif_files -> CONVERT_WEBP
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_WEBP_TITLE'] = 'Преобразовать в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_WEBP_DESCRIPTION'] = 'При поддержке браузером посетителя преобразовывает изображения в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_WEBP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_WEBP_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_WEBP_SHORT_N'] = '';

// Option group: images -> gif_files -> EXCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_WEBP_FILES_TITLE'] = 'Исключить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_WEBP_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_WEBP_FILES_SHORT'] = '';

// Option group: images -> gif_files -> INCLUDE_WEBP_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_WEBP_FILES_TITLE'] = 'Включить из преобразования в WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_WEBP_FILES_DESCRIPTION'] = 'Включает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_WEBP_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_WEBP_FILES_SHORT'] = '';

// Option group: images -> gif_files -> CONVERT_JPG
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_JPG_TITLE'] = 'Преобразовать в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_JPG_DESCRIPTION'] = 'Преобразовывать PNG файлы в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_JPG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_JPG_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_CONVERT_JPG_SHORT_N'] = '';

// Option group: images -> gif_files -> EXCLUDE_JPG_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_JPG_FILES_TITLE'] = 'Исключить из преобразования в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_JPG_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в JPG формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_JPG_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_EXCLUDE_JPG_FILES_SHORT'] = '';

// Option group: images -> gif_files -> INCLUDE_JPG_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_JPG_FILES_TITLE'] = 'Включить из преобразования в JPG';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_JPG_FILES_DESCRIPTION'] = 'Включает файлы из преобразования в JPG формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_JPG_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_GIF_FILES_INCLUDE_JPG_FILES_SHORT'] = '';

// Group: images -> svg_files
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_TITLE'] = 'Оптимизация SVG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_DESCRIPTION'] = 'Настройки оптимизации SVG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_HELP'] = '';

// Option group: images -> svg_files -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_ACTIVE_DESCRIPTION'] = 'Активирует оптимизацию SVG файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_ACTIVE_SHORT_N'] = '';

// Option group: images -> svg_files -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_DESCRIPTION'] = 'Библиотека для оптимизации изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_HELP'] = '';

// Variant: images -> svg_files -> LIBRARY -> svgo
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_VARIANT_SVGO_TITLE'] = 'SVGO';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_VARIANT_SVGO_DESCRIPTION'] = 'Програмная библиотека оптимизации SVG изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_LIBRARY_VARIANT_SVGO_HELP'] = '';

// Option group: images -> svg_files -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_EXCLUDE_FILES_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_EXCLUDE_FILES_DESCRIPTION'] = 'Файлы для исключения из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_EXCLUDE_FILES_SHORT'] = '';

// Option group: images -> svg_files -> INCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_INCLUDE_FILES_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_INCLUDE_FILES_DESCRIPTION'] = 'Включение файлов в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_INCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_SVG_FILES_INCLUDE_FILES_SHORT'] = '';

// Group: images -> webp_files
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_TITLE'] = 'Оптимизация WebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_DESCRIPTION'] = 'Параметры преобразования файлов в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_HELP'] = '';

// Option group: images -> webp_files -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_ACTIVE_DESCRIPTION'] = 'Включает преобразование файлов в WebP формат в соответствии с настройками соответствующих типов исходных файлов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_ACTIVE_SHORT_N'] = '';

// Option group: images -> webp_files -> QUALITY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_QUALITY_TITLE'] = 'Качество';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_QUALITY_DESCRIPTION'] = 'Качество преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_QUALITY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_QUALITY_SHORT'] = '';

// Option group: images -> webp_files -> LIBRARY
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_TITLE'] = 'Библиотека';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_DESCRIPTION'] = 'Библиотека для конвертирования файлов в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_HELP'] = '';

// Variant: images -> webp_files -> LIBRARY -> phpimagick
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_PHPIMAGICK_TITLE'] = 'PHP Imagick';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_PHPIMAGICK_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_PHPIMAGICK_HELP'] = '';

// Variant: images -> webp_files -> LIBRARY -> cwebp
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_CWEBP_TITLE'] = 'CWebP';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_CWEBP_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_LIBRARY_VARIANT_CWEBP_HELP'] = '';

// Option group: images -> webp_files -> EXCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_EXCLUDE_FILES_TITLE'] = 'Исключить из преобразования';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_EXCLUDE_FILES_DESCRIPTION'] = 'Исключает файлы из преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_EXCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_EXCLUDE_FILES_SHORT'] = '';

// Option group: images -> webp_files -> INCLUDE_FILES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_INCLUDE_FILES_TITLE'] = 'Включить в преобразование';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_INCLUDE_FILES_DESCRIPTION'] = 'Включает файлы для преобразования в WebP формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_INCLUDE_FILES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_WEBP_FILES_INCLUDE_FILES_SHORT'] = '';

// Group: images -> events
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_TITLE'] = 'Обработка событий';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_DESCRIPTION'] = 'Настройки оптимизации изображений по событиям Битрикс';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_HELP'] = '';

// Option group: images -> events -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_ACTIVE_DESCRIPTION'] = 'Активировать оптимизацию изображений по события Битрикс';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_ACTIVE_SHORT_Y'] = 'Перехватывать события';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_ACTIVE_SHORT_N'] = 'Не перехватывать события';

// Option group: images -> events -> USE_EVENTS_CHANGE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_CHANGE_TITLE'] = 'Оптимизировать при сохранении';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_CHANGE_DESCRIPTION'] = 'Оптимизирует файлы при сохранении в Битрикс (перехват событий)';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_CHANGE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_CHANGE_SHORT_Y'] = 'при сохранении';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_CHANGE_SHORT_N'] = '';

// Option group: images -> events -> USE_EVENTS_RESIZE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_RESIZE_TITLE'] = 'Оптимизировать при изменении размера';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_RESIZE_DESCRIPTION'] = 'Оптимизирует файлы при изменении размера в Битрикс (перехват событий)';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_RESIZE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_RESIZE_SHORT_Y'] = 'при изменении размера';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_USE_EVENTS_RESIZE_SHORT_N'] = '';

// Option group: images -> events -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_EXCLUDE_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_EXCLUDE_DESCRIPTION'] = 'Исключает файлы из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_EXCLUDE_SHORT'] = '';

// Option group: images -> events -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_INCLUDE_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_INCLUDE_DESCRIPTION'] = 'Включить файлы в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EVENTS_INCLUDE_SHORT'] = '';

// Group: images -> external_images
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_TITLE'] = 'Изображения со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_DESCRIPTION'] = 'Настройки оптимизации изображений со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_HELP'] = '';

// Option group: images -> external_images -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_ACTIVE_DESCRIPTION'] = 'Активировать оптимизацию изображений со сторонних сайтов';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_ACTIVE_SHORT_N'] = '';

// Option group: images -> external_images -> EXCLUDE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_EXCLUDE_TITLE'] = 'Исключить из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_EXCLUDE_DESCRIPTION'] = 'Исключает файлы из оптимизации';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_EXCLUDE_SHORT'] = '';

// Option group: images -> external_images -> INCLUDE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_INCLUDE_TITLE'] = 'Включить в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_INCLUDE_DESCRIPTION'] = 'Включить файлы в оптимизацию';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_EXTERNAL_IMAGES_INCLUDE_SHORT'] = '';

// Group: images -> other
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_TITLE'] = 'Прочие настройки';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_DESCRIPTION'] = 'Прочие настройки оптимизации изображенй';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_HELP'] = '';

// Option group: images -> other -> INLINE_IMG
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_IMG_TITLE'] = 'Изображения Inline';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_IMG_DESCRIPTION'] = 'Активирует размещение изображений Inline в коде страницы';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_IMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_IMG_SHORT_Y'] = 'Изображения Inline';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_IMG_SHORT_N'] = '';

// Option group: images -> other -> MAX_SIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_MAX_SIZE_INLINE_TITLE'] = 'Максимальный размер Inline изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_MAX_SIZE_INLINE_DESCRIPTION'] = 'Максимальный размер файлов Inline изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_MAX_SIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_MAX_SIZE_INLINE_SHORT'] = '';

// Option group: images -> other -> INLINE_TYPES
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_TYPES_TITLE'] = 'Типы изображений Inline';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_TYPES_DESCRIPTION'] = 'Типы файлов изображений, которые можно разместить Inline';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_TYPES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INLINE_TYPES_SHORT'] = '';

// Option group: images -> other -> NOT_CHANGE_ORIGINALS
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_NOT_CHANGE_ORIGINALS_TITLE'] = 'Не оптимизировать оригинальные форматы';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_NOT_CHANGE_ORIGINALS_DESCRIPTION'] = 'При включении опции, файлы оригинальных форматов (jpg, png, gif) не будут оптимизироваться. Будет выполняться только преобразование в webp формат';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_NOT_CHANGE_ORIGINALS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_NOT_CHANGE_ORIGINALS_SHORT_Y'] = 'Не оптимизировать оригиналы';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_NOT_CHANGE_ORIGINALS_SHORT_N'] = '';

// Option group: images -> other -> ADD_DECODE_ATTRIBUTE
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_ADD_DECODE_ATTRIBUTE_TITLE'] = 'Асинхронное декодирование изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_ADD_DECODE_ATTRIBUTE_DESCRIPTION'] = 'При включении опции для тегов img будет добавлен аттрибут decoding зо значением async';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_ADD_DECODE_ATTRIBUTE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_ADD_DECODE_ATTRIBUTE_SHORT_Y'] = 'Асинхронное декодирование изображений';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_ADD_DECODE_ATTRIBUTE_SHORT_N'] = '';

// Option group: images -> other -> INCLUDE_DATA_ORIGIN
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INCLUDE_DATA_ORIGIN_TITLE'] = 'Добавить аттрибут data-origin';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INCLUDE_DATA_ORIGIN_DESCRIPTION'] = 'При включении опции в аттрибут data-origin (при его отсутствии) будет добавлен путь к оригинальному изображению.';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INCLUDE_DATA_ORIGIN_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INCLUDE_DATA_ORIGIN_SHORT_Y'] = 'data-origin';
$MESS['AMOPT_OPTION_GROUP_IMAGES_GROUP_OTHER_INCLUDE_DATA_ORIGIN_SHORT_N'] = '';

// Category: lazy
$MESS['AMOPT_OPTION_GROUP_LAZY_TITLE'] = 'Отложенная загрузка (Lazy load/delay) изображений, iframe, js скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_DESCRIPTION'] = 'Настройки отложенной загрузки изображений, iframe, js скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_HELP'] = '';

// Group: lazy -> images
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TITLE'] = 'Изображения';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_DESCRIPTION'] = 'Настройки использования на сайте автоматического LazyLoad изображений';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_HELP'] = '';

// Option group: lazy -> images -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_ACTIVE_DESCRIPTION'] = 'Активирует использование автоматического LazyLoad изображений на сайте';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> images -> LAZY_CLASS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_CLASS_TITLE'] = 'CSS классы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_CLASS_DESCRIPTION'] = 'CSS классы для тегов, которые преобразовать для автоматического LazyLoad (через запятую)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_CLASS_SHORT'] = 'CSS классы: #VALUE#';

// Option group: lazy -> images -> LAZY_TAGS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_TAGS_TITLE'] = 'HTML теги';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_TAGS_DESCRIPTION'] = 'HTML теги, которые преобразовать для автоматического LazyLoad (через запятую)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_TAGS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_LAZY_TAGS_SHORT'] = 'HTML теги: #VALUE#';

// Option group: lazy -> images -> IGNORE_CLASS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_CLASS_TITLE'] = 'Игнорируемые текущий или родительские классы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_CLASS_DESCRIPTION'] = 'Если тег с Lazy, либо его родители, имеет один из данных классов, то данный тег не будет включен в LazyLoad';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_CLASS_SHORT'] = '';

// Option group: lazy -> images -> IGNORE_IDENT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_IDENT_TITLE'] = 'Игнорируемые текущий или родительские идентификаторы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_IDENT_DESCRIPTION'] = 'Если тег с Lazy, либо его родители, имеет один из данных идентификаторов, то данный тег не будет включен в LazyLoad';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_IGNORE_IDENT_SHORT'] = '';

// Option group: lazy -> images -> PERCENT_DISPLAY
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_PERCENT_DISPLAY_TITLE'] = 'Процент показа для загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_PERCENT_DISPLAY_DESCRIPTION'] = 'Какой процент картинки должен быть на экране для загрузки полного изображения';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_PERCENT_DISPLAY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_PERCENT_DISPLAY_SHORT'] = '';

// Option group: lazy -> images -> TYPE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_TITLE'] = 'Тип заглушки LazyLoad';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_DESCRIPTION'] = 'Какой тип заглушки LazyLoad использовать';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_SHORT'] = 'Тип заглушки';

// Variant: lazy -> images -> TYPE -> blur
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLUR_TITLE'] = 'Blur';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLUR_DESCRIPTION'] = 'Создается маленькое изображение картинки, которое размывается и выдается посетителю в качестве заглушки в месте нахождения картинки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLUR_HELP'] = '';

// Variant: lazy -> images -> TYPE -> blurgrey
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLURGREY_TITLE'] = 'Blur grey';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLURGREY_DESCRIPTION'] = 'Создается маленькое черно-белое изображение картинки, которое размывается и выдается посетителю в качестве заглушки в месте нахождения картинки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_BLURGREY_HELP'] = '';

// Variant: lazy -> images -> TYPE -> mainimg
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_MAINIMG_TITLE'] = 'Заглушка';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_MAINIMG_DESCRIPTION'] = 'Используется один файл в качестве заглушки для изображений';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_VARIANT_MAINIMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_TYPE_SHORT'] = '';

// Option group: lazy -> images -> MAINIMG
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAINIMG_TITLE'] = 'Файл изображения-заглушки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAINIMG_DESCRIPTION'] = 'Выберите файл, который будет изображением-заглушкой для картинок';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAINIMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAINIMG_SHORT'] = '';

// Option group: lazy -> images -> BLUR_MAX_WIDTH_OR_HEIGHT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_MAX_WIDTH_OR_HEIGHT_TITLE'] = 'Максимальный размер стороны, пикселей';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_MAX_WIDTH_OR_HEIGHT_DESCRIPTION'] = 'Размер изображения заглушки, до которого будет сжата оригинальная картинка';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_MAX_WIDTH_OR_HEIGHT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_MAX_WIDTH_OR_HEIGHT_SHORT'] = '';

// Option group: lazy -> images -> BLUR_BACK_ORIGINAL_SIZE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_BACK_ORIGINAL_SIZE_TITLE'] = 'Вернуть к исходному размеру';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_BACK_ORIGINAL_SIZE_DESCRIPTION'] = 'Если указан предыдущий параметр, то размытие будет выполнено следующим образом: 1. Уменьшить изображение. 2. Размыть. 3. Вернуть к исходному размеру';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_BACK_ORIGINAL_SIZE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_BACK_ORIGINAL_SIZE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_BACK_ORIGINAL_SIZE_SHORT_N'] = '';

// Option group: lazy -> images -> BLUR_RADIUS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_RADIUS_TITLE'] = 'Радиус размытия, пикселей';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_RADIUS_DESCRIPTION'] = 'Радиус размытия изображения';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_RADIUS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_RADIUS_SHORT'] = '';

// Option group: lazy -> images -> BLUR_SIGMA
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_SIGMA_TITLE'] = 'Стандартное отклонение';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_SIGMA_DESCRIPTION'] = 'Стандартное отклонение при размытии';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_SIGMA_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_SIGMA_SHORT'] = '';

// Option group: lazy -> images -> BLUR_QUANTITY
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_QUANTITY_TITLE'] = 'Качество изображения-заглушки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_QUANTITY_DESCRIPTION'] = 'Качество сжатия для изображения-заглушки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_QUANTITY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_BLUR_QUANTITY_SHORT'] = '';

// Option group: lazy -> images -> CONVERT_WEBP
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_CONVERT_WEBP_TITLE'] = 'Конвертировать в WebP';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_CONVERT_WEBP_DESCRIPTION'] = 'Конвертировать файл-заглушку в WebP формат';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_CONVERT_WEBP_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_CONVERT_WEBP_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_CONVERT_WEBP_SHORT_N'] = '';

// Option group: lazy -> images -> INLINE_IMG
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_INLINE_IMG_TITLE'] = 'Файл изображения-заглушки Inline';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_INLINE_IMG_DESCRIPTION'] = 'Включает изображение-заглушку, размеров менее указанного, в качестве Inline';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_INLINE_IMG_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_INLINE_IMG_SHORT_Y'] = 'Разместить заглушку Inline';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_INLINE_IMG_SHORT_N'] = 'Не размещать заглушку Inline';

// Option group: lazy -> images -> MAX_SIZE_INLINE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAX_SIZE_INLINE_TITLE'] = 'Максимальный размер Inline изображения-заглушки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAX_SIZE_INLINE_DESCRIPTION'] = 'Максимальный размер файла изображения для включения его в Inline-виде в CSS файл';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAX_SIZE_INLINE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IMAGES_MAX_SIZE_INLINE_SHORT'] = 'размер файла до';

// Group: lazy -> iframe
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_TITLE'] = 'IFrame';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_DESCRIPTION'] = 'Настройки использования на сайте LazyLoad iframe';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_HELP'] = '';

// Option group: lazy -> iframe -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_ACTIVE_DESCRIPTION'] = 'Активирует использование LazyLoad iframe';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> iframe -> PERCENT_DISPLAY
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_PERCENT_DISPLAY_TITLE'] = 'Процент показа для загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_PERCENT_DISPLAY_DESCRIPTION'] = 'Какой процент iframe должен быть на экране для загрузки полного изображения';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_PERCENT_DISPLAY_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_PERCENT_DISPLAY_SHORT'] = '';

// Option group: lazy -> iframe -> WAIT_URL
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_WAIT_URL_TITLE'] = 'URL заглушки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_WAIT_URL_DESCRIPTION'] = 'URL к файлу-заглушке (либо HTML файлу заглушки) iframe';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_WAIT_URL_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_WAIT_URL_SHORT'] = '';

// Option group: lazy -> iframe -> IGNORE_CLASS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_CLASS_TITLE'] = 'Игнорируемые текущий или родительские классы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_CLASS_DESCRIPTION'] = 'Если тег с Lazy, либо его родители, имеет один из данных классов, то данный тег не будет включен в LazyLoad';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_CLASS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_CLASS_SHORT'] = '';

// Option group: lazy -> iframe -> IGNORE_IDENT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_IDENT_TITLE'] = 'Игнорируемые текущий или родительские идентификаторы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_IDENT_DESCRIPTION'] = 'Если тег с Lazy, либо его родители, имеет один из данных идентификаторов, то данный тег не будет включен в LazyLoad';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_IDENT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_IGNORE_IDENT_SHORT'] = '';

// Option group: lazy -> iframe -> URL_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_EXCLUDE_TITLE'] = 'Исключить URL из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_EXCLUDE_DESCRIPTION'] = 'Указанные URL будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_EXCLUDE_SHORT'] = '';

// Option group: lazy -> iframe -> URL_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_INCLUDE_TITLE'] = 'Включить URL в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_INCLUDE_DESCRIPTION'] = 'Указанные URL будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_IFRAME_URL_INCLUDE_SHORT'] = '';

// Group: lazy -> antilazy
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_TITLE'] = 'Anti lazy';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_DESCRIPTION'] = 'Настройки для удаления lazyload картинок сайта (если нет возможности отключить штатным способом)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_HELP'] = '';

// Option group: lazy -> antilazy -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_ACTIVE_DESCRIPTION'] = 'Активирует использование Anti LazyLoad картинок';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> antilazy -> LAZY_CLASSES
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_CLASSES_TITLE'] = 'Список классов тегов lazy';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_CLASSES_DESCRIPTION'] = 'Перечень классов тегов (каждый в новой строке), которые будут обработаны для удаления lazyload';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_CLASSES_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_CLASSES_SHORT'] = '';

// Option group: lazy -> antilazy -> LAZY_ATTR
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_ATTR_TITLE'] = 'Список аттрибутов тегов lazy';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_ATTR_DESCRIPTION'] = 'Перечень аттрибутов тегов (каждый в новой строке), которые будут обработаны для удаления lazyload';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_ATTR_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_LAZY_ATTR_SHORT'] = '';

// Option group: lazy -> antilazy -> IMG_SRC_ATTR
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_IMG_SRC_ATTR_TITLE'] = 'Список аттрибутов оригинальной картинки для тегов img src';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_IMG_SRC_ATTR_DESCRIPTION'] = 'Перечень аттрибутов тегов (каждый в новой строке), которые содержат оригинальную картинку для тега img';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_IMG_SRC_ATTR_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_IMG_SRC_ATTR_SHORT'] = '';

// Option group: lazy -> antilazy -> BG_STYLE_ATTR
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_BG_STYLE_ATTR_TITLE'] = 'Список аттрибутов оригинальной картинки для фоновой картинки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_BG_STYLE_ATTR_DESCRIPTION'] = 'Перечень аттрибутов тегов (каждый в новой строке), которые содержат оригинальную картинку, прописанную в стилях в качестве background-image';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_BG_STYLE_ATTR_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_ANTILAZY_BG_STYLE_ATTR_SHORT'] = '';


// Group: lazy -> js
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TITLE'] = 'Отложенная загрузка внешних JS скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DESCRIPTION'] = 'Настройки отложенной загрузки внешних JS скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_HELP'] = '';

// Option group: lazy -> js -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_ACTIVE_TITLE'] = 'Разрешить отложенную загрузку JS скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_ACTIVE_DESCRIPTION'] = 'При включении функции загрузка некоторых скриптов будет выполняться с задержкой';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> js -> TIME
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_TITLE'] = 'Отложить подключение на время, мс';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_DESCRIPTION'] = 'Время откладывания подключения выбранных опций';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_SHORT'] = '';

// Option group: lazy -> js -> TIME_BETWEEN_EXECUTE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_BETWEEN_EXECUTE_TITLE'] = 'Время между запусками отложенных скриптов, мс';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_BETWEEN_EXECUTE_DESCRIPTION'] = 'Время между одним и следующим подключением/запуском отложенного скрипта или стиля';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_BETWEEN_EXECUTE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_TIME_BETWEEN_EXECUTE_SHORT'] = '';

// Option group: lazy -> js -> DELAY_YMETRIKA
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YMETRIKA_TITLE'] = 'Яндекс метрика';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YMETRIKA_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YMETRIKA_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YMETRIKA_SHORT_Y'] = 'Яндекс метрика';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YMETRIKA_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_GTM
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GTM_TITLE'] = 'GoogleTagManager';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GTM_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GTM_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GTM_SHORT_Y'] = 'GoogleTagManager';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GTM_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_GANALYTICS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GANALYTICS_TITLE'] = 'Google аналитика';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GANALYTICS_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GANALYTICS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GANALYTICS_SHORT_Y'] = 'Google аналитика';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GANALYTICS_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_GRECAPTCHA
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GRECAPTCHA_TITLE'] = 'Google рекапча';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GRECAPTCHA_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GRECAPTCHA_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GRECAPTCHA_SHORT_Y'] = 'Google рекапча';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_GRECAPTCHA_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_ROISTAT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_ROISTAT_TITLE'] = 'Roistat.com';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_ROISTAT_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_ROISTAT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_ROISTAT_SHORT_Y'] = 'Roistat.com';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_ROISTAT_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_BITRIXINFO
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXINFO_TITLE'] = 'Bitrix.info';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXINFO_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXINFO_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXINFO_SHORT_Y'] = 'Bitrix.info - скрипт скорости сайта';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXINFO_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_BITRIXSPREAD
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXSPREAD_TITLE'] = 'Bitrix spread';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXSPREAD_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXSPREAD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXSPREAD_SHORT_Y'] = 'Bitrix spread - скрипт распространения cookies по доменам';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIXSPREAD_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_BITRIX24
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIX24_TITLE'] = 'Bitrix24';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIX24_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIX24_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIX24_SHORT_Y'] = 'Bitrix24 - виджеты bitrix24 и корпоративного портала';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_BITRIX24_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_JIVOSITE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_JIVOSITE_TITLE'] = 'JivoSite';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_JIVOSITE_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_JIVOSITE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_JIVOSITE_SHORT_Y'] = 'JivoSite - виджет онлайн-чата';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_JIVOSITE_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_REGMARKETS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REGMARKETS_TITLE'] = 'Regmarkets.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REGMARKETS_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REGMARKETS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REGMARKETS_SHORT_Y'] = 'Regmarkets.ru - скрипты сервиса';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REGMARKETS_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_LIVETEX
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_LIVETEX_TITLE'] = 'LiveTex.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_LIVETEX_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_LIVETEX_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_LIVETEX_SHORT_Y'] = 'LiveTex.ru - онлайн чат';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_LIVETEX_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_TALKME
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_TALKME_TITLE'] = 'Talk-Me.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_TALKME_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_TALKME_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_TALKME_SHORT_Y'] = 'Talk-Me.ru - онлайн чат';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_TALKME_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_YACHAT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YACHAT_TITLE'] = 'Yandex chat';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YACHAT_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YACHAT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YACHAT_SHORT_Y'] = 'Yandex chat - онлайн чат';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YACHAT_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_REDHELPER
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REDHELPER_TITLE'] = 'RedHelper.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REDHELPER_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REDHELPER_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REDHELPER_SHORT_Y'] = 'RedHelper.ru - онлайн чат';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_REDHELPER_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_SENDPULSE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_SENDPULSE_TITLE'] = 'SendPulse.com';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_SENDPULSE_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_SENDPULSE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_SENDPULSE_SHORT_Y'] = 'SendPulse.com - скрипты сервиса';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_SENDPULSE_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_MAILRU
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_MAILRU_TITLE'] = 'Mail.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_MAILRU_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_MAILRU_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_MAILRU_SHORT_Y'] = 'Mail.ru рейтинг';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_MAILRU_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_RAMBLERRU
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_RAMBLERRU_TITLE'] = 'Rambler.ru';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_RAMBLERRU_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_RAMBLERRU_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_RAMBLERRU_SHORT_Y'] = 'Rambler.ru - ТОП 100';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_RAMBLERRU_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_YANDEXMAPS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YANDEXMAPS_TITLE'] = 'Яндекс карты';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YANDEXMAPS_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YANDEXMAPS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YANDEXMAPS_SHORT_Y'] = 'Скрипты Яндекс карт';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_YANDEXMAPS_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_FACEBOOK
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_FACEBOOK_TITLE'] = 'Facebook.com';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_FACEBOOK_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_FACEBOOK_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_FACEBOOK_SHORT_Y'] = 'Facebook.com - скрипты';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_FACEBOOK_SHORT_N'] = '';

// Option group: lazy -> js -> DELAY_VK
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_VK_TITLE'] = 'VK.com';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_VK_DESCRIPTION'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_VK_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_VK_SHORT_Y'] = 'VK.com - OpenAPI';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_DELAY_VK_SHORT_N'] = '';

// Option group: lazy -> js -> OTHER_URL_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_EXCLUDE_TITLE'] = 'Исключить URL из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_EXCLUDE_DESCRIPTION'] = 'Скрипты, которые соответствуют указанным URL, будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_EXCLUDE_SHORT'] = '';

// Option group: lazy -> js -> OTHER_URL_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_INCLUDE_TITLE'] = 'Включить URL в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_INCLUDE_DESCRIPTION'] = 'Скрипты, которые соответствуют указанным URL, будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_URL_INCLUDE_SHORT'] = '';

// Option group: lazy -> js -> OTHER_JSCONTENT_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_EXCLUDE_TITLE'] = 'Исключить контент из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_EXCLUDE_DESCRIPTION'] = 'Скрипты, содержимое которых соответствуют указанным правилам, будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_EXCLUDE_SHORT'] = '';

// Option group: lazy -> js -> OTHER_JSCONTENT_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_INCLUDE_TITLE'] = 'Включить контент в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_INCLUDE_DESCRIPTION'] = 'Скрипты, содержимое которых соответствуют указанным URL, будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_OTHER_JSCONTENT_INCLUDE_SHORT'] = '';

// Group: lazy -> js_main
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TITLE'] = 'Отложенная загрузка локальных скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_DESCRIPTION'] = 'Настройки отложенной загрузки локальных скриптов шаблона и ядра';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_HELP'] = '';

// Option group: lazy -> js_main -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_ACTIVE_TITLE'] = 'Разрешить отложенную загрузку локальных JS скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_ACTIVE_DESCRIPTION'] = 'При включении функции загрузка локальных скриптов шаблона и ядра будет выполняться с задержкой';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> js_main -> MODEL_DELAY
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_TITLE'] = 'Модель отложенного выполнения';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_DESCRIPTION'] = 'Модель загрузки и отложенного выполнения локальных скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_HELP'] = '';

// Variant: lazy -> js_main -> MODEL_DELAY -> variant1
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT1_TITLE'] = 'Вариант 1 (пошаговый)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT1_DESCRIPTION'] = 'загрузка осуществляется штатными средствами. Первый скрипт загружается через указанный интервал времени и далее поочередно все скрипты. Работает не на всех сайтах - применять с осторожностью, т.к. может вызывать ошибки JavaScript';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT1_HELP'] = '';

// Variant: lazy -> js_main -> MODEL_DELAY -> variant2
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT2_TITLE'] = 'Вариант 2 (загрузка и пошаговое подключение)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT2_DESCRIPTION'] = 'загрузка скриптов фоновыми запросами. Пошаговое подключение с задержкой. Работает не на всех сайтах - применять с осторожностью, т.к. может вызывать ошибки JavaScript';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT2_HELP'] = '';

// Variant: lazy -> js_main -> MODEL_DELAY -> variant3
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT3_TITLE'] = 'Вариант 3 (фоновая загрузка и одновременное подключение)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT3_DESCRIPTION'] = 'загрузка осуществляется фоновыми запросами. Подключение скриптов inline единовременно.';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_MODEL_DELAY_VARIANT_VARIANT3_HELP'] = '';

// Option group: lazy -> js_main -> TIME
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_TITLE'] = 'Отложить подключение на время, мс';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_DESCRIPTION'] = 'Время откладывания подключения выбранных опций';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_SHORT'] = '';

// Option group: lazy -> js_main -> TIME_BETWEEN_EXECUTE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_EXECUTE_TITLE'] = 'Время между запусками скриптов, мс';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_EXECUTE_DESCRIPTION'] = 'Время между одним и следующим подключением/запуском скрипта';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_EXECUTE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_EXECUTE_SHORT'] = '';

// Option group: lazy -> js_main -> TIME_BETWEEN_CONTENT_EXECUTE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_CONTENT_EXECUTE_TITLE'] = 'Время между запусками контентных скриптов, мс';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_CONTENT_EXECUTE_DESCRIPTION'] = 'Время между запуском inline скриптов';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_CONTENT_EXECUTE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_TIME_BETWEEN_CONTENT_EXECUTE_SHORT'] = '';

// Option group: lazy -> js_main -> JSURL_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_EXCLUDE_TITLE'] = 'Исключить URL из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_EXCLUDE_DESCRIPTION'] = 'Скрипты, которые соответствуют указанным URL, будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_EXCLUDE_SHORT'] = '';

// Option group: lazy -> js_main -> JSURL_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_INCLUDE_TITLE'] = 'Включить URL в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_INCLUDE_DESCRIPTION'] = 'Скрипты, которые соответствуют указанным URL, будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSURL_INCLUDE_SHORT'] = '';

// Option group: lazy -> js_main -> JSCONTENT_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_EXCLUDE_TITLE'] = 'Исключить контент из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_EXCLUDE_DESCRIPTION'] = 'Скрипты, содержимое которых соответствуют указанным правилам, будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_EXCLUDE_SHORT'] = '';

// Option group: lazy -> js_main -> JSCONTENT_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_INCLUDE_TITLE'] = 'Включить контент в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_INCLUDE_DESCRIPTION'] = 'Скрипты, содержимое которых соответствуют указанным URL, будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_JSCONTENT_INCLUDE_SHORT'] = '';

// Option group: lazy -> js_main -> DISABLE_FOR_GROUPS
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_DISABLE_FOR_GROUPS_TITLE'] = 'Выключить отложенную загрузку локальных скриптов для пользователей из указанных групп';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_DISABLE_FOR_GROUPS_DESCRIPTION'] = 'Список ID групп пользователей, для которых данный функционал не будет использоваться (через запятую)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_DISABLE_FOR_GROUPS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_JS_MAIN_DISABLE_FOR_GROUPS_SHORT'] = '';

// Group: lazy -> css
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_TITLE'] = 'CSS';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_DESCRIPTION'] = 'Настройки отложенной загрузки CSS';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_HELP'] = '';

// Option group: lazy -> css -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_ACTIVE_DESCRIPTION'] = 'Активирует использование отложенной загрузки CSS';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_ACTIVE_SHORT_Y'] = 'Активно';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_ACTIVE_SHORT_N'] = 'Не активно';

// Option group: lazy -> css -> MODE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_TITLE'] = 'Режим работы';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_DESCRIPTION'] = 'Режим отложенной загрузки CSS файла';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_HELP'] = '';

// Variant: lazy -> css -> MODE -> xhr
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHR_TITLE'] = 'Фоновый XHR запрос';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHR_DESCRIPTION'] = 'Подключение при помощи XHR запроса в конце страницы. Подключение происходит с задержкой';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHR_HELP'] = '';

// Variant: lazy -> css -> MODE -> xhrlink
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHRLINK_TITLE'] = 'Фоновый XHR запрос и создание тега link';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHRLINK_DESCRIPTION'] = 'Подключение при помощи XHR запроса в конце страницы. Подключение происходит с задержкой. Сначала выполняется XHR запрос для формирования кеша браузера, после подключение стилей как файла при помощи тега link';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_MODE_VARIANT_XHRLINK_HELP'] = '';

// Option group: lazy -> css -> WAIT
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_WAIT_TITLE'] = 'Задержка перед первым XHR запросом (мс)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_WAIT_DESCRIPTION'] = 'Задержка перед первым запросом к серверу для получения контента CSS файлов, миллисекунд (1000 мс = 1 сек)';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_WAIT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_WAIT_SHORT'] = 'Задержка';

// Option group: lazy -> css -> URL_EXCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_EXCLUDE_TITLE'] = 'Исключить URL из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_EXCLUDE_DESCRIPTION'] = 'Стили, которые соответствуют указанным URL, будут исключены из отложенной загрузки';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_EXCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_EXCLUDE_SHORT'] = '';

// Option group: lazy -> css -> URL_INCLUDE
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_INCLUDE_TITLE'] = 'Включить URL в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_INCLUDE_DESCRIPTION'] = 'Стили, которые соответствуют указанным URL, будут включены в отложенную загрузку';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_INCLUDE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_LAZY_GROUP_CSS_URL_INCLUDE_SHORT'] = '';

// Category: html
$MESS['AMOPT_OPTION_GROUP_HTML_TITLE'] = 'HTML страницы';
$MESS['AMOPT_OPTION_GROUP_HTML_DESCRIPTION'] = 'Настройки оптимизации HTML страницы';
$MESS['AMOPT_OPTION_GROUP_HTML_HELP'] = '';

// Option: html -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_HTML_OPTION_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_HTML_OPTION_ACTIVE_DESCRIPTION'] = 'Включает оптимизацию HTML страницы';
$MESS['AMOPT_OPTION_GROUP_HTML_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_OPTION_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_OPTION_ACTIVE_SHORT_N'] = '';

// Group: html -> tags
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_TITLE'] = 'Теги';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_DESCRIPTION'] = 'Настройки преобразования тегов';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_HELP'] = '';

// Option group: html -> tags -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_ACTIVE_TITLE'] = 'Активировать';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_ACTIVE_DESCRIPTION'] = 'Активировать финальную обработку HTML страницы';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_ACTIVE_SHORT_Y'] = 'Активировать обработку тегов';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_ACTIVE_SHORT_N'] = '';

// Option group: html -> tags -> REMOVE_COMMENTS
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_COMMENTS_TITLE'] = 'Удалить комментарии';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_COMMENTS_DESCRIPTION'] = 'Удаляет из HTML комментарии';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_COMMENTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_COMMENTS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_COMMENTS_SHORT_N'] = '';

// Option group: html -> tags -> REMOVE_PRE
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_PRE_TITLE'] = 'PRE';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_PRE_DESCRIPTION'] = 'Удаление из HTML тегов PRE';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_PRE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_PRE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_PRE_SHORT_N'] = '';

// Option group: html -> tags -> REMOVE_ATTR_SCRIPT
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_SCRIPT_TITLE'] = 'Аттрибуты script';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_SCRIPT_DESCRIPTION'] = 'Удаляет из тега script аттрибут type';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_SCRIPT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_SCRIPT_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_SCRIPT_SHORT_N'] = '';

// Option group: html -> tags -> REMOVE_ATTR_STYLE
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_STYLE_TITLE'] = 'Аттрибуты style';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_STYLE_DESCRIPTION'] = 'Удаляет из тега style аттрибут type';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_STYLE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_STYLE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_ATTR_STYLE_SHORT_N'] = '';

// Option group: html -> tags -> REMOVE_WHITE_SPACE
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_WHITE_SPACE_TITLE'] = 'Удаляет лишние пробелы';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_WHITE_SPACE_DESCRIPTION'] = 'Удаляет лишние проблемы, табуляции, переносы строк и тп';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_WHITE_SPACE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_WHITE_SPACE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_HTML_GROUP_TAGS_REMOVE_WHITE_SPACE_SHORT_N'] = '';

// Category: other
$MESS['AMOPT_OPTION_GROUP_OTHER_TITLE'] = 'Прочие оптимизации';
$MESS['AMOPT_OPTION_GROUP_OTHER_DESCRIPTION'] = 'Прочие возможности оптимизации страницы';
$MESS['AMOPT_OPTION_GROUP_OTHER_HELP'] = '';

// Option: other -> ACTIVE
$MESS['AMOPT_OPTION_GROUP_OTHER_OPTION_ACTIVE_TITLE'] = 'Активирует';
$MESS['AMOPT_OPTION_GROUP_OTHER_OPTION_ACTIVE_DESCRIPTION'] = 'Включает использование прочих возможностей оптимизации сайта';
$MESS['AMOPT_OPTION_GROUP_OTHER_OPTION_ACTIVE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_OPTION_ACTIVE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_OPTION_ACTIVE_SHORT_N'] = '';

// Group: other -> headers
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_TITLE'] = 'Заголовки';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_DESCRIPTION'] = 'Настройки для отправки различных типов заголовков браузеру посетителя';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_HELP'] = '';

// Option group: other -> headers -> ACTIVE_PRELOAD
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRELOAD_TITLE'] = 'Preload';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRELOAD_DESCRIPTION'] = 'Активирует отправку заголовков preload';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRELOAD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRELOAD_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRELOAD_SHORT_N'] = '';

// Option group: other -> headers -> PRELOAD
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRELOAD_TITLE'] = 'Заголовки Preload';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRELOAD_DESCRIPTION'] = 'Перечень preload заголовков';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRELOAD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRELOAD_SHORT'] = '';

// Option group: other -> headers -> ACTIVE_PREFETCH
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PREFETCH_TITLE'] = 'Prefetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PREFETCH_DESCRIPTION'] = 'Активирует отправку заголовков prefetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PREFETCH_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PREFETCH_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PREFETCH_SHORT_N'] = '';

// Option group: other -> headers -> PREFETCH
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PREFETCH_TITLE'] = 'Заголовки Prefetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PREFETCH_DESCRIPTION'] = 'Перечень prefetch заголовков';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PREFETCH_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PREFETCH_SHORT'] = '';

// Option group: other -> headers -> ACTIVE_PRECONNECT
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRECONNECT_TITLE'] = 'Preconnect';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRECONNECT_DESCRIPTION'] = 'Активирует отправку заголовков preconnect';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRECONNECT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRECONNECT_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_PRECONNECT_SHORT_N'] = '';

// Option group: other -> headers -> PRECONNECT
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRECONNECT_TITLE'] = 'Заголовки Preconnect';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRECONNECT_DESCRIPTION'] = 'Перечень preconnect заголовков';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRECONNECT_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_PRECONNECT_SHORT'] = '';

// Option group: other -> headers -> ACTIVE_USERAGENTS
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_USERAGENTS_TITLE'] = 'Учитывать поддержку браузерами';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_USERAGENTS_DESCRIPTION'] = 'Учитывать поддержку браузерами заголовков PreFetch и PreLoad';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_USERAGENTS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_USERAGENTS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_HEADERS_ACTIVE_USERAGENTS_SHORT_N'] = '';

// Group: other -> links
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_TITLE'] = 'Link';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DESCRIPTION'] = 'Настройки дублирования заголовков в HTML тег Link';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_HELP'] = '';

// Option group: other -> links -> DELETE_OLD_LINKS
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DELETE_OLD_LINKS_TITLE'] = 'Удалить имеющиеся теги предзагрузки preload и prefetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DELETE_OLD_LINKS_DESCRIPTION'] = 'Удаляет имеющие теги link с аттрибутом rel= preload или prefetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DELETE_OLD_LINKS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DELETE_OLD_LINKS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_DELETE_OLD_LINKS_SHORT_N'] = '';

// Option group: other -> links -> SET_LINKS
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_SET_LINKS_TITLE'] = 'Дублировать в теги';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_SET_LINKS_DESCRIPTION'] = 'Включает дублирование заголовков PreFetch, PreLoad, PreConnect в тег link';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_SET_LINKS_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_SET_LINKS_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_SET_LINKS_SHORT_N'] = '';

// Option group: other -> links -> ONLY_COMPOSITE
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_ONLY_COMPOSITE_TITLE'] = 'Только для композита';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_ONLY_COMPOSITE_DESCRIPTION'] = 'Включает дублирование заголовков PreFetch, PreLoad, PreConnect в тег link только для композитного режима';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_ONLY_COMPOSITE_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_ONLY_COMPOSITE_SHORT_Y'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_ONLY_COMPOSITE_SHORT_N'] = '';

// Option group: other -> links -> LINKS_TYPE
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_TITLE'] = 'Тип заголовков по умолчанию';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_DESCRIPTION'] = 'Какой тип заголовков устанавливать в теге link по умолчанию (для композитного режима)';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_HELP'] = '';

// Variant: other -> links -> LINKS_TYPE -> prefetch
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PREFETCH_TITLE'] = 'PreFetch';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PREFETCH_DESCRIPTION'] = 'Установить заголовок предкеширования PreFetch (подходит для <a href="https://caniuse.com/#search=prefetch" target="_blank">большинства браузеров</a>)';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PREFETCH_HELP'] = '';

// Variant: other -> links -> LINKS_TYPE -> preload
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PRELOAD_TITLE'] = 'PreLoad';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PRELOAD_DESCRIPTION'] = 'Установить заголовок предзагрузки PreLoad. (<a href="https://caniuse.com/#search=preload" target="_blank">Поддержка браузерами</a>)';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_VARIANT_PRELOAD_HELP'] = '';
$MESS['AMOPT_OPTION_GROUP_OTHER_GROUP_LINKS_LINKS_TYPE_SHORT'] = '';