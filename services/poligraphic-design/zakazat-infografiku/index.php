<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Разработка фирменной инфографики для сайта, видеоролика, анимации или полиграфии. Цена в студии графического дизайна Veonix – 30 000 руб. Бесплатная консультация по созданию инфографики для вашего проекта.");
$APPLICATION->SetPageProperty("title", "Заказать разработку инфографики в студии дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/"); 
$APPLICATION->AddChainItem("Заказать инфографику");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
 

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/infografika.css");   


?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Разработка",
		"TEMPLATE_FOR_TITLE2" => " инфографики",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Доступно отразим информацию в любом проекте, будь это страница вашего сайта или рекламная презентация продукта. Компактно визуализируем сложные алгоритмы и большие объемы данных. Наглядно продемонстрируем ваши преимущества и растущие показатели бизнеса",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 
 <div class="old_page">
     
     <section class="uslugi">
         <div class="main">
             <div class="container">
                 <div class="cifry-head">О нас в цифрах</div>
                 <div class="cifry">
                     <div class="item">
                         <p><span class="cifry-name">5+</span><br> <span class="cifry-desk">лет опыта</span></p>
                         <p>Создаем успешные digital-проекты для бизнеса с 2017 года</p>
                     </div>
                     <div class="item">
                         <p><span class="cifry-name">20+</span><br> <span class="cifry-desk">сотрудников</span></p>
                         <p>В составе студии только опытные профессионалы с внушительным бэкграундом</p>
                     </div>
                     <div class="item">
                         <p><span class="cifry-name">30+</span><br> <span class="cifry-desk">компаний</span></p>
                         <p>На постоянной основе с нами сотрудничают российские и зарубежные компании</p>
                     </div>
                     <div class="item">
                         <p><span class="cifry-name">500+</span><br> <span class="cifry-desk">проектов</span></p>
                         <p>Наша студия успешно реализует различные проекты один за другим</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="box1_zu_b4">
                 <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1822235759.jpg') center no-repeat;">
                     <h2>Сколько стоит разработка инфографики?</h2>
                 </div>
             </div>
             <div class="main-970">
                 <p class="zu_opis">Специалисты студии дизайна Veonix работают с инфографикой всех уровней сложности: от статичных изображений в минимализме до 3D-графики, моушн-дизайна и создания полноценных анимационных роликов:
                 </p>
                 <div class="box2_zu_b4">
                     <div class="box2_zu_b4_item">
                         <ul class="box2_zu_b4_item_tx">
                             <li>Изучаем ваш бизнес и вникаем в содержание процесса, который нужно визуализировать в графике</li>
                             <li>Создаем несколько оригинальных концепций дизайна на выбор</li>
                             <li>Детально прорабатываем каждый графический элемент</li>
                             <li>Работаем над удобством восприятия, расстановкой акцентов и демонстрацией основных преимуществ</li>
                         </ul>
                         <p class="box2_zu_b4_item_tx">Вы получаете материал, который легко поймут и с интересом изучат ваши клиенты.</p>
                     </div>
                     <div class="box2_zu_b4_item">
                         <p class="box2_zu_b4_item_tx">Цена инфографики</p>
                         <div class="ds-b3-box-right">
                             <p>от 30000 <i></i></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="box1_zu_b4">
                 <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1106684915.jpg') center no-repeat;">
                     <h2>Какие виды инфографики мы создаем для вас?</h2>
                 </div>
             </div>
             <div class="main-970">
                 <p class="zu_text">Через инфографику можно доступно визуализировать статистику, результаты анализа рынка и конкурентов, сравнить показатели компании «до» и «после», показать экономические выгоды географического положения, транспортную логистику, порядок сотрудничества, перспективы развития и ожидаемые результаты работы.</p>
                 <ul class="zu_text">
                     <li>Изображение — статичная картинка: схема, пошаговая инструкция, карта, диаграмма.</li>
                     <li>Анимация — изображения с движущимися графическими элементами: растущий график, интерактивная карта, шкала прогресса, навигация.</li>
                     <li>Видеоролик — инфографика в формате анимационного ролика с условным развитием сюжета, персонажами, звуковой дорожкой.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="box1_zu_b4">
                 <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1892071090.jpg') center no-repeat;"><h2>Как инфографика поможет вашему бизнесу?</h2></div>
             </div>
             <div class="main-970">
                 <p class="zu_text">Инфографика за несколько секунд донесет основные выгоды, представит информацию в наглядном виде, простым языком объяснит сложные процессы. Это понравится аудитории, облегчит и ускорит процесс знакомства с компанией. Вам, вашим клиентам или партнерам не придется выискивать информацию о компании из блоков аналитического текста, выстраивать сравнительные ряды или долго вникать в алгоритм работы.</p>
                 <ul class="zu_text">
                 <li>Емкие тезисы<br />
                 Большие объемы сложного текста заменяются иллюстрациями с емкими пояснениями и конкретными показателями. Инфографика позволяет быстро получить максимум полезной информации о компании, продукте и рабочих процессах.</li>
                 <li>Практичное применение<br />
                 Такое оформление будет уместно в любом проекте и любой сфере: в презентации, отчете, коммерческом предложении, рекламном ролике, на сайте компании.</li>
                 <li>Наглядные преимущества <br />
                 Показать динамику роста, сравнить показатели, привести статистику за период, описать структуру компании, достижения в цифрах, процесс работы, выгоды сотрудничества — инфографика сможет показать вас в лучшем виде и наглядно донести нужный смысл.</li>
                 <li>Легкое восприятия<br />
                 Через иллюстрации, понятные схемы, простые графические элементы и яркий дизайн информация воспринимается и запоминается намного проще и быстрее, чем из сплошных текстовых блоков.</li>
                 <li>Интерес к бренду<br />
                 Инфографика, особенно при наличии интерактивных элементов, отлично вовлекает аудиторию. Информацию, легко поданную в графике, хочется внимательнее изучить и найти полезное для себя.</li>
                 <li>Лояльность аудитории<br />
                 Наглядные графические схемы с конкретными цифрами и достоверными фактами понятны и привлекательны для аудитории. У людей становится меньше возражений, растет доверие к компании.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1825121234.jpg') center no-repeat;">
                 <h2>Требования к оформлению</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Инфографика — это не просто красивые изображения. Это прежде всего информация. Вполне себе серьезная и важная информация, интересно выраженная в графике. Так аудитория быстрее, проще и нагляднее познакомится с нужными данными в большом объеме. С помощью инфографики можно освещать новости, сравнивать показатели, давать инструкции, раскрывать суть торгового предложения, демонстрировать преимущества товара или услуги. Чтобы то ни было, для создания эффективной инфографики стоит соблюдать несколько негласных правил: </p>
                 <ul class="zu_text">
                     <li>Только полезные элементы<br />
                         В инфографике ни к чему множество графических элементов для красоты. Это лишь рассеивает внимание. Каждая стрелка, иллюстрация, персонаж и маркер должны оправдано размещаться и нести полезную информацию.</li>
                     <li>Меньше текстовых блоков<br />
                         Какие-то моменты необходимо кратко пояснять, озаглавливать пункты — в общем, текст нужен. Но смысл инфографики именно в том, чтобы проще и понятнее передать сложную информацию, а в больших текстовых блоках снова придется долго выискивать нужные данные.</li>
                     <li>Соблюдение логики<br />
                         Часто инфографика — это наглядная схема, в которой показаны взаимодействия, последовательность, иерархия. В таких случаях нельзя нарушать структуру. Логика должна прослеживаться и визуально.</li>
                     <li>Контраст цветов<br />
                         Главное преимущество или основная логическая цепочка должны ярко выделяться, текст не должен сливаться с фоном. Для всей графики нужно подобрать гармоничную палитру цветов.</li>
                     <li>Понятная графика<br />
                         Цвета и графические элементы должны сразу вызывать правильные ассоциации, без возможного второго смысла. Маркер с “галочкой” человек воспримет положительно. Плохо, если им будет обозначен какой-то недочет.</li>
                     <li>Единый стиль<br />
                         Вся инфографика должна смотреться цельно и единообразно. Оптимально в дизайне использовать фирменные цвета и графические элементы бренда.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b8">
         <div class="main">
             <p class="zu_zag">Этапы создания инфографики</p>
             <div class="box1_zu_b8 ds-b6-box2-main">
                 <div class="ds-b6-box2-main-colum">
                     <div class="ds-b6-box2-main-item">
                         <p>
                             <span>Этап 1</span>
                             <span class="b">Брифинг</span> Вы заполняете бриф на нашем сайте. Отвечаем на ваши вопросы, задаем свои, если необходимо уточнить важную информацию для разработки. Определяем конкретные задачи, объемы и сроки работ. Подписываем договор.
                         </p>
                     </div>
                     <div class="ds-b6-box2-main-item">
                         <p>
                             <span>Этап 2</span>
                             <span class="b">Анализ бизнеса</span> Наши маркетологи изучают компанию, цели и задачи бизнеса, детально изучают конкурентов и целевую аудиторию, выявляют ваши конкурентные преимущества. Опираясь на задачи, которые должна решать инфографика, предлагают оптимальные маркетинговые ходы и решения.
                         </p>
                     </div>
                     <div class="ds-b6-box2-main-item">
                         <p>
                             <span>Этап 3</span>
                             <span class="b">Определение концепции</span> На основе вводных данных и маркетингового анализа мы ищем лучшие идеи для реализации будущего проекта. Создаем несколько концепций, согласовываем с вами.
                         </p>
                     </div>
                 </div>
                 <div class="ds-b6-box2-main-colum">
                     <div class="ds-b6-box2-main-item">
                         <p>
                             <span>Этап 4</span>
                             <span class="b">Создание инфографики</span> Выбранную концепцию наполняем необходимой информацией. Детально прорабатываем каждый графический элемент и общую композицию. Ищем оптимальный вариант демонстрации преимуществ и более наглядной подачи данных. Также предоставляем ряд вариантов на согласование.
                         </p>
                     </div>
                     <div class="ds-b6-box2-main-item">
                         <p>
                             <span>Этап 5</span>
                             <span class="b">Утверждение проекта</span> Дорабатываем инфографику до финальной версии. Обсуждаем и утверждаем готовый проект. Согласовываем детали, сверяем объем выполненных работ и правильность выполнения задач. При необходимости вносим корректировки. Подписываем акт, проводим расчеты.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1833849001.jpg') center no-repeat;">
                 <h2>Почему стоит заказать инфографику в студии дизайна Veonix?</h2>
             </div>
             <div class="main-970">
                 <ul class="zu_text">
                     <li>Маркетинговый анализ <br />
                         Инфографика отражает показатели бизнеса, описывает рабочие процессы. Здесь особенно важно изучить компанию. С этого мы и начинаем работу с проектом. А чтобы сделать его эффективным и уникальным, анализируем аудиторию, конкурентов и саму нишу рынка.</li>
                     <li>Персональный подход<br />
                         У нас нет универсального шаблона для всех. Мы генерируем идеи под ваши потребности, отбираем лучшие решения для конкретной задачи, с нуля разрабатываем оригинальные концепции и создаем инфографику персонально для вас.</li>
                     <li>Команда проекта<br />
                         Маркетолог, стратег, иллюстратор, графический дизайнер, копирайтер, арт-директор, проджект-менеджер<br />
                         — каждый максимально качественно выполняет свою задачу, чтобы вся проделанная работа принесла вам результат сверх ожиданий.</li>
                     <li>Соблюдение сроков<br />
                         Учитываем все ваши потребности, в том числе и по времени реализации. Сразу фиксируем сроки выполнения работ, строго придерживаемся графика, чтобы не нарушать ваши планы.</li>
                     <li>Приемлемая стоимость<br />
                         Заботимся и о вашем бюджете. На дизайн премиального качества устанавливаем приемлемую стоимость, чтобы ваши инвестиции в создание визуального образа наверняка окупились.</li>
                     <li>Гибкий график оплаты<br />
                         Наши постоянные клиенты могут получить полный комплекс услуг в рассрочку, без предоплаты. Отдаем готовый проект, определяем комфортный график расчетов.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b7">
         <div class="main">
             <div class="box1_zu_b7">
                 <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1889105812.jpg') center no-repeat;"><h2>Результат и качество подкрепляем гарантиями</h2></div>
             </div>
             <div class="box2_zu_b7">
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 01</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Договор.</span> Заказ оформляется официально. Согласовываем все условия, подписываем договор, в котором закрепляются все права и обязанности, объемы и сроки работ, финансовые гарантии.</p>
                 </div>
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 02</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Конфиденциальность.</span> Строго и ответственно относимся к вашей персональной информации. Предоставленные конфиденциальные данные держим под защитой, дополнительно подписываем договор NDA.</p>
                 </div>
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 03</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Сроки.</span> В официальных документах закрепляем сроки выполнения работы и штрафы за каждый день просрочки.</p>
                 </div>
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 04</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Антиплагиат.</span> Проект разрабатывается персонально под вас. Мы не берем готовые идеи, чужой контент и избитые шаблоны. Все работы проходят проверку на оригинальность.</p>
                 </div>
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 05</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Возврат денег.</span> В случае, если результат вас не устроит, возвращаем 100% суммы заказа.</p>
                 </div>
                 <div class="box2_zu_b7_item">
                     <p class="box2_zu_b7_item_tx1">Гарантия 06</p>
                     <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Бесплатные правки.</span> В течение 36 месяцев с момента сдачи проекта бесплатно вносим правки и исправляем ошибки, допущенные по нашей вине.</p>
                 </div>
             </div>
             <div class="main-970">
                 <p class="zu_text">Продемонстрируйте свои главные преимущества и станьте ближе к аудитории —закажите инфографику в студии дизайна Veonix!</p>
                 <p class="zu_text">Убедительно и наглядно донесем сложную информацию. Профессионально и стильно.</p>
             </div>
         </div>
     </section>
     </div>
      
     <div class="portfolio-zagalovok">
        <div class="main">
        <div class="port-t1">
            <h3 class="team-t1 wow fadeInUp animated" style="visibility: visible;">Портфолио</h3>
        </div>
        </div>
    </div>
    <div class="portfolio_list" data-id="prezent"  >
      
      <?$APPLICATION->IncludeComponent(
                 "bitrix:news.list", 
                 "home_portfolio", 
                 array(
                     "ACTIVE_DATE_FORMAT" => "d.m.Y",
                     "ADD_SECTIONS_CHAIN" => "N",
                     "AJAX_MODE" => "N",
                     "AJAX_OPTION_ADDITIONAL" => "",
                     "AJAX_OPTION_HISTORY" => "N",
                     "AJAX_OPTION_JUMP" => "N",
                     "AJAX_OPTION_STYLE" => "N",
                     "CACHE_FILTER" => "N",
                     "CACHE_GROUPS" => "Y",
                     "CACHE_TIME" => "36000000",
                     "CACHE_TYPE" => "A",
                     "CHECK_DATES" => "Y",
                     "COMPONENT_TEMPLATE" => "home_portfolio",
                     "DETAIL_URL" => "",
                     "DISPLAY_BOTTOM_PAGER" => "Y",
                     "DISPLAY_DATE" => "Y",
                     "DISPLAY_NAME" => "Y",
                     "DISPLAY_PICTURE" => "Y",
                     "DISPLAY_PREVIEW_TEXT" => "Y",
                     "DISPLAY_TOP_PAGER" => "N",
                     "FIELD_CODE" => array(
                         0 => "ID",
                         1 => "CODE",
                         2 => "XML_ID",
                         3 => "NAME",
                         4 => "TAGS",
                         5 => "SORT",
                         6 => "PREVIEW_TEXT",
                         7 => "PREVIEW_PICTURE",
                         8 => "DETAIL_TEXT",
                         9 => "DETAIL_PICTURE",
                         10 => "DATE_ACTIVE_FROM",
                         11 => "ACTIVE_FROM",
                         12 => "DATE_ACTIVE_TO",
                         13 => "ACTIVE_TO",
                         14 => "SHOW_COUNTER",
                         15 => "SHOW_COUNTER_START",
                         16 => "IBLOCK_TYPE_ID",
                         17 => "IBLOCK_ID",
                         18 => "IBLOCK_CODE",
                         19 => "IBLOCK_NAME",
                         20 => "IBLOCK_EXTERNAL_ID",
                         21 => "DATE_CREATE",
                         22 => "CREATED_BY",
                         23 => "CREATED_USER_NAME",
                         24 => "TIMESTAMP_X",
                         25 => "MODIFIED_BY",
                         26 => "USER_NAME",
                         27 => "",
                     ),
                     "FILTER_NAME" => "",
                     "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                     "IBLOCK_ID" => "15",
                     "IBLOCK_TYPE" => "-",
                     "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                     "INCLUDE_SUBSECTIONS" => "Y",
                     "MESSAGE_404" => "",
                     "NEWS_COUNT" => "18",
                     "PAGER_BASE_LINK_ENABLE" => "N",
                     "PAGER_DESC_NUMBERING" => "N",
                     "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                     "PAGER_SHOW_ALL" => "N",
                     "PAGER_SHOW_ALWAYS" => "N",
                     "PAGER_TEMPLATE" => ".default",
                     "PAGER_TITLE" => "Новости",
                     "PARENT_SECTION" => "3",
                     "PARENT_SECTION_CODE" => "",
                     "PREVIEW_TRUNCATE_LEN" => "",
                     "PROPERTY_CODE" => array(
                         0 => "descr",
                         1 => "title",
                         2 => "CLASS",
                         3 => "H1",
                         4 => "ZADACHA",
                         5 => "",
                         6 => "REALIZATION",
                         7 => "RESULTAT",
                         8 => "RUB",
                         9 => "WEB",
                         10 => "RABOTY",
                         11 => "CEL",
                         12 => "HEADER",
                         13 => "",
                     ),
                     "SET_BROWSER_TITLE" => "N",
                     "SET_LAST_MODIFIED" => "N",
                     "SET_META_DESCRIPTION" => "N",
                     "SET_META_KEYWORDS" => "N",
                     "SET_STATUS_404" => "N",
                     "SET_TITLE" => "N",
                     "SHOW_404" => "N",
                     "SORT_BY1" => "SORT",
                     "SORT_BY2" => "TIMESTAMP_X",
                     "SORT_ORDER1" => "ASC",
                     "SORT_ORDER2" => "DESC",
                     "STRICT_SECTION_CHECK" => "N"
                 ),
                 false
             );?>
 
   
 </div>



     <section class="poleznaya">
         <div class="main">
             <h2 class="home_h2">Полезная информация по теме</h2>
             <p><a href="https://veonix.ru/blog/pochemu-infografika-poleznyj-instrument-na-sajte-ili-v-prezentaciyah-kompanii/">Почему инфографика — полезный инструмент на сайте или в презентациях компании?</a></p>
         </div>
     </section>
     <section class="home_team team_old_page">
         <div class="main">
           <h2 class="home_h2">Ключевые сотрудники</h2>
           <p class="home_service_descript">Нам доверяют госкорпорации, крупнейшие российские <br> и международные компании:</p>
     
                 
                     <?$APPLICATION->IncludeComponent(
                         "bitrix:news.list", 
                         "team", 
                         array(
                             "ACTIVE_DATE_FORMAT" => "d.m.Y",
                             "ADD_SECTIONS_CHAIN" => "N",
                             "AJAX_MODE" => "N",
                             "AJAX_OPTION_ADDITIONAL" => "",
                             "AJAX_OPTION_HISTORY" => "N",
                             "AJAX_OPTION_JUMP" => "N",
                             "AJAX_OPTION_STYLE" => "N",
                             "CACHE_FILTER" => "N",
                             "CACHE_GROUPS" => "Y",
                             "CACHE_TIME" => "36000000",
                             "CACHE_TYPE" => "A",
                             "CHECK_DATES" => "Y",
                             "COMPONENT_TEMPLATE" => "team",
                             "DETAIL_URL" => "",
                             "DISPLAY_BOTTOM_PAGER" => "Y",
                             "DISPLAY_DATE" => "Y",
                             "DISPLAY_NAME" => "Y",
                             "DISPLAY_PICTURE" => "Y",
                             "DISPLAY_PREVIEW_TEXT" => "Y",
                             "DISPLAY_TOP_PAGER" => "N",
                             "FIELD_CODE" => array(
                                 0 => "",
                                 1 => "",
                             ),
                             "FILTER_NAME" => "",
                             "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                             "IBLOCK_ID" => "17",
                             "IBLOCK_TYPE" => "-",
                             "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                             "INCLUDE_SUBSECTIONS" => "Y",
                             "MESSAGE_404" => "",
                             "NEWS_COUNT" => "9",
                             "PAGER_BASE_LINK_ENABLE" => "N",
                             "PAGER_DESC_NUMBERING" => "N",
                             "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                             "PAGER_SHOW_ALL" => "N",
                             "PAGER_SHOW_ALWAYS" => "N",
                             "PAGER_TEMPLATE" => ".default",
                             "PAGER_TITLE" => "Новости",
                             "PARENT_SECTION" => "",
                             "PARENT_SECTION_CODE" => "",
                             "PREVIEW_TRUNCATE_LEN" => "",
                             "PROPERTY_CODE" => array(
                                 0 => "",
                                 1 => "DOLJ",
                                 2 => "INFO",
                                 3 => "URL",
                                 4 => "PRICE",
                                 5 => "EMAIL",
                                 6 => "ADDRES",
                                 7 => "MAPS",
                                 8 => "PHONE",
                                 9 => "",
                             ),
                             "SET_BROWSER_TITLE" => "N",
                             "SET_LAST_MODIFIED" => "N",
                             "SET_META_DESCRIPTION" => "N",
                             "SET_META_KEYWORDS" => "N",
                             "SET_STATUS_404" => "N",
                             "SET_TITLE" => "N",
                             "SHOW_404" => "N",
                             "SORT_BY1" => "SORT",
                             "SORT_BY2" => "SORT",
                             "SORT_ORDER1" => "DESC",
                             "SORT_ORDER2" => "ASC",
                             "STRICT_SECTION_CHECK" => "N"
                         ),
                         false
                     );?>
     
       
           <div class="bt_black_bg bt_white_bg">
             <a href="/nasha-komanda/">
               <span>Показать еще</span>
               <i></i>
             </a>
           </div>
         </div>
     </section>
 
      
     <? $APPLICATION->IncludeComponent(
         "veonix:form", 
         ".default", 
         array(
             "COMPONENT_TEMPLATE" => ".default",
             "TITLE_1" => "",
             "TITLE_2" => "",
             "TITLE_3" => "",
             "TYPE" => "text",
             "TYPE_TEXT" => "Инфографика, Презентация,  Брендбук, Многостраничный сайт, Лендинг,  Дизайн упаковки, Логотип, Маркетинг-кит, Коммерческое предложение, Видеоролик,   Другое"
         ),
         false
     );?>
     
     <section class="home_clientabout">
         <div class="main">
           <div class="home_clientabout_top">
             <h2 class="home_h2">Клиенты о нас</h2>
             <a href="/otzyvy/"  class="button_line" >
               <span>читать все отзывы</span>
               <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
             </a>
           </div>
           <div class="otziv_list">      
               <?$APPLICATION->IncludeComponent(
                 "bitrix:news.list", 
                 "otziv", 
                 array(
                   "ACTIVE_DATE_FORMAT" => "d.m.Y",
                   "ADD_SECTIONS_CHAIN" => "N",
                   "AJAX_MODE" => "N",
                   "AJAX_OPTION_ADDITIONAL" => "",
                   "AJAX_OPTION_HISTORY" => "N",
                   "AJAX_OPTION_JUMP" => "N",
                   "AJAX_OPTION_STYLE" => "N",
                   "CACHE_FILTER" => "N",
                   "CACHE_GROUPS" => "Y",
                   "CACHE_TIME" => "36000000",
                   "CACHE_TYPE" => "A",
                   "CHECK_DATES" => "Y",
                   "COMPONENT_TEMPLATE" => "otziv",
                   "DETAIL_URL" => "",
                   "DISPLAY_BOTTOM_PAGER" => "Y",
                   "DISPLAY_DATE" => "Y",
                   "DISPLAY_NAME" => "Y",
                   "DISPLAY_PICTURE" => "Y",
                   "DISPLAY_PREVIEW_TEXT" => "Y",
                   "DISPLAY_TOP_PAGER" => "N",
                   "FIELD_CODE" => array(
                     0 => "ID",
                     1 => "CODE",
                     2 => "XML_ID",
                     3 => "NAME",
                     4 => "TAGS",
                     5 => "SORT",
                     6 => "PREVIEW_TEXT",
                     7 => "PREVIEW_PICTURE",
                     8 => "DETAIL_TEXT",
                     9 => "DETAIL_PICTURE",
                     10 => "DATE_ACTIVE_FROM",
                     11 => "ACTIVE_FROM",
                     12 => "DATE_ACTIVE_TO",
                     13 => "ACTIVE_TO",
                     14 => "SHOW_COUNTER",
                     15 => "SHOW_COUNTER_START",
                     16 => "IBLOCK_TYPE_ID",
                     17 => "IBLOCK_ID",
                     18 => "IBLOCK_CODE",
                     19 => "IBLOCK_NAME",
                     20 => "IBLOCK_EXTERNAL_ID",
                     21 => "DATE_CREATE",
                     22 => "CREATED_BY",
                     23 => "CREATED_USER_NAME",
                     24 => "TIMESTAMP_X",
                     25 => "MODIFIED_BY",
                     26 => "USER_NAME",
                     27 => "",
                   ),
                   "FILTER_NAME" => "",
                   "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                   "IBLOCK_ID" => "20",
                   "IBLOCK_TYPE" => "customers",
                   "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                   "INCLUDE_SUBSECTIONS" => "Y",
                   "MESSAGE_404" => "",
                   "NEWS_COUNT" => "10",
                   "PAGER_BASE_LINK_ENABLE" => "N",
                   "PAGER_DESC_NUMBERING" => "N",
                   "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                   "PAGER_SHOW_ALL" => "N",
                   "PAGER_SHOW_ALWAYS" => "N",
                   "PAGER_TEMPLATE" => ".default", 
                   "PARENT_SECTION" => "25",
                   "PARENT_SECTION_CODE" => "",
                   "PREVIEW_TRUNCATE_LEN" => "",
                   "PROPERTY_CODE" => array(
                     0 => "REF",
                     1 => "STARS",
                     2 => "URL",
                     3 => "",
                   ),
                   "SET_BROWSER_TITLE" => "N",
                   "SET_LAST_MODIFIED" => "N",
                   "SET_META_DESCRIPTION" => "N",
                   "SET_META_KEYWORDS" => "N",
                   "SET_STATUS_404" => "N",
                   "SET_TITLE" => "N",
                   "SHOW_404" => "N",
                   "SORT_BY1" => "SORT",
                   "SORT_BY2" => "TIMESTAMP_X",
                   "SORT_ORDER1" => "ASC",
                   "SORT_ORDER2" => "DESC",
                   "STRICT_SECTION_CHECK" => "N"
                 ),
                 false
               );?>
            </div>
        </div>
      </section>
     
      
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>