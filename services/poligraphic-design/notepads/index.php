<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать дизайн открыток под ключ. Создание и разработка дизайна открытки с креативной концепцией и поздравительными текстами по цене 10 000 рублей.");
$APPLICATION->SetPageProperty("title", "Дизайн открыток на заказ в Москве — цена в студии Veonix 10 000 руб.");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн блокнотов");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");    

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/infografika.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Красивый",
		"TEMPLATE_FOR_TITLE2" => "  дизайн   ",
		"TEMPLATE_FOR_TITLE3" => "  блокнота",
		"CHECKBOX" => "N",
		"TEXT_1" => "Мы создаём эксклюзивный дизайн фирменных блокнотов, который ежедневно напоминает о вас.",
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
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/notepads/shutterstock_1711748359-ai.jpg') center no-repeat;">
                <h2>Чем уникальные блокноты полезны бизнесу</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">Красивые фирменные блокноты с логотипом, выполненные в корпоративном стиле вашей компании, оказывают неоценимую пользу вашему бизнесу. Они выполняют двойную роль в течение всего срока использования: служат в качестве рекламного инструмента и незаменимого делового аксессуара.</p>
            <p class="zu_text">Кроме того блокнот - это:</p>
            <ul class="zu_text">
                <li><span style="font-style: 600;">Отличный подарок для партнёров и клиентов</span>
                    Блокнотами пользуются практически все, поэтому это всегда нужный и уместный презент. Он ежедневно напоминает о вас, когда человек планирует дела</li>
                <li><span style="font-style: 600;">Стильный аксессуар для персонала</span>
                    Небанальные корпоративные блокноты, разложенные на рабочем месте ваших сотрудников, привлекают внимание клиентов и посетителей, повышая имидж бренда</li>
                <li><span style="font-style: 600;">Незаменимый атрибут деловых встреч</span>
                    Эффектный раздаточный материал для выставок, конференций и семинаров вызывает интерес, лояльность и ответную благодарность за проявленную заботу</li>
                <li><span style="font-style: 600;">Символ серьёзности и статусности</span>
                    Свидетельствует о вашей ответственности, привычке фиксировать обещания и договорённости, повышает доверие и авторитет, располагает к сотрудничеству</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/notepads/shutterstock_1680270076-ai.jpg') center no-repeat;">
                <h2>Сколько стоит дизайн блокнота</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">Казалось бы, зачем носить с собой бумажные записные книжки в эпоху айфонов и смартфонов? Ведь разработчики потрудились на славу и создали десятки, если не сотни, приложений для деловых записей и эффективной организации тайм-менеджмента.</p>
            <p class="zu_text">Ответ прост. Согласитесь, ни одна коллекция электронных книг никогда не заменит настоящую библиотеку. Точно также, как и самые новомодные смарт часы не в силах занять место элитной наручной классики. Все эти предметы без слов говорят о вкусе и статусе обладателя.</p>
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Предлагаем разработку дизайна блокнота премиум уровня по доступной цене. Используем ваш слоган, логотип и элементы фирменного стиля. Если их нет — придумаем и отрисуем с нуля.</p>
                    <p class="box2_zu_b4_item_tx">Конечная цена зависит от сложности дизайна блокнота А5 (или другого формата), количества страниц и особых пожеланий в оформлении.</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Цена</p>
                    <div class="ds-b3-box-right">
                        <p>от 10000 <i></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/notepads/shutterstock_1680270076-ai.jpg') center no-repeat;"><h2>Какие виды блокнотов мы делаем</h2></div>
        </div>
        <div class="main-970">
            <p class="zu_text">Мы создаем дизайн самых разных блокнотов по сложности, виду скрепления страниц, геометрии и формату. Если стандартные параметры вам не подходят, мы готовы создать дизайн блокнота по вашим размерам и пожеланиям.</p>
            <ul class="zu_text">
                <li>Блокнот А4</li>
                <li>Блокнот А5</li>
                <li>Блокнот А6</li>
                <li>Скрепление на пружине</li>
                <li>Скрепление на скобе</li>
                <li>Скрепление на склейке</li>
                <li>Скрепление на болтах</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/notepads/shutterstock_1724647138-ai.jpg') center no-repeat;"><h2>Выгодные условия и комфортное обслуживание</h2></div>
        </div>
        <div class="main-970">
            <p class="zu_text">Мы оказываем услуги дизайна и печати полиграфии высокого класса, чтобы вы вернулись к нам с новым заказом.</p>
            <ul class="zu_text">
                <li><span style="font-style: 600;">Профессиональные инструменты</span>
                    Лицензионные программы для прототипирования, современное печатное оборудование</li>
                <li><span style="font-style: 600;">Конкурентный ценник</span>
                    Оказываем услуги дизайна премиум уровня, с приличным отрывом от конкурентов</li>
                <li><span style="font-style: 600;">Контроль каждого этапа разработки</span>
                    С момента принятия заявки и до вручения готового макета процесс проходит тройную проверку</li>
                <li><span style="font-style: 600;">Сильная команда профессионалов</span>
                    В нашем штате есть все специалисты, которые требуются для разработки мощного дизайна</li>
            </ul>
            <p class="zu_text">С нами вам не нужно беспокоиться ни о чём. Стараемся воплотить в жизнь любые ваши задачи, даже со звёздочкой. Предлагаем комплексную услугу: от проработки маркетинговой составляющей до дизайна, печати в собственной типографии и доставки.</p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/notepads/shutterstock_1711741585-ai.jpg') center no-repeat;">
                <h2>Veonix — это не просто красивый дизайн</h2>
            </div>
        </div>
        <div class="main-970">
            <ul class="zu_text">
                <li><span style="font-style: 600;">20 профессионалов</span>
                    Собраны в единый штат (дизайнеры, копирайтеры, маркетологи)</li>
                <li><span style="font-style: 600;">500 проектов</span>
                    Различной сложности сдали заказчикам (от визитки до маркетинг-китов)</li>
                <li><span style="font-style: 600;">50 000 экземпляров</span>
                    Всевозможной полиграфии отпечатано на наших станках</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b7">
    <div class="main">
        <div class="box1_zu_b7">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1889105812.jpg') center no-repeat;"><h2>5-кратная защита ваших интересов</h2></div>
        </div>
        <div class="box2_zu_b7">
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 01</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Своевременное выполнение работы</span> За каждый день просрочки несём денежные потери</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 02</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Исключительная уникальность</span> Только авторский контент (тексты и дизайн)</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 03</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Конфиденциальность</span> Заключаем NDA, сохраняя ваши данные</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 04</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Бесплатные правки ошибок</span> В течение года исправляем опечатки и погрешности, допущенные по нашей вине</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 05</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Возврат гонорара в размере 100%</span> В случае, если результат вас не удовлетворил</p>
            </div>
            <div class="box2_zu_b7_item"></div>
        </div>
    </div>
</section>
<section class="zu_b8">
    <div class="main">
        <p class="zu_zag">Простые и понятные этапы работ</p>
        <div class="box1_zu_b8 ds-b6-box2-main">
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 1</span>
                        <span class="b">Принимаем вашу заявку.</span> Назначаем ответственного за проект менеджера. Проводим брифование или интервью, чтобы не ошибиться с вашими ожиданиями
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 2</span>
                        <span class="b">Погружаемся в ваш бизнес.</span> Проводим глубокий маркетинговый анализ сферы, продукта, исследуем конкурентов, изучаем целевую аудиторию
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 3</span>
                        <span class="b">Разрабатываем несколько редакций дизайн концепций.</span> Из предложенного выбираете один, который мы и дорабатываем
                    </p>
                </div>
            </div>
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 4</span>
                        <span class="b">Создаём дизайн, пишем ёмкий текст.</span> Передаём наработки вам на утверждение. Вносим корректировки, если в них есть необходимость
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 5</span>
                        <span class="b">Готовим макет к печати.</span> Отправляем его на тестовую печать, проводим финальную проверку перед запуском массового тиража
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 6</span>
                        <span class="b">Печатаем полиграфию в нужном объёме и привозим к вам в офис.</span> Доставку дарим в подарок при условии, что она осуществляется в пределах Москвы
                    </p>
                </div>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">По завершении проекта вы остаётесь довольны результатом, получаете готовый к печати макет, который можно использовать неограниченное количество раз.</p>
        </div>
    </div>
    <br><br><br><br><br>
</section>
 
 
 
  </div>
   
 

  <?$APPLICATION->IncludeComponent(
          "bitrix:news.list", 
          "logo", 
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
            "COMPONENT_TEMPLATE" => "logo",
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
            "IBLOCK_ID" => "19",
            "IBLOCK_TYPE" => "customers",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "30",
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
              1 => "LOGO",
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
<section class="poleznaya">
    <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
        <p><a href="https://veonix.ru/blog/kak-sozdat-effektivnyj-dizajn-upakovki-produkta/">Как создать эффективный дизайн упаковки продукта?</a></p>
        <p><a href="https://veonix.ru/blog/kakie-nositeli-brenda-sozdajut-firmennyj-stil/">Какие носители бренда создают фирменный стиль?</a></p>
        <p><a href="https://veonix.ru/blog/oshibochnye-mneniya-o-vazhnosti-brendinga/">Ошибочные мнения о важности брендинга</a></p>
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
       "TYPE_TEXT" => "Блокнот, Годовой отчет, Коммерческое предложение, Визитка, Листовка,  Каталог, Буклет, Брошюра, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>