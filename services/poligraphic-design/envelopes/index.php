<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать дизайн конверта под ключ. Разработка и создание креативного дизайна конверта на заказ по приемлемой стоимости. Цена — 10000 рублей.");
$APPLICATION->SetPageProperty("title", "Дизайн конвертов в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн конвертов");
 
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
		"TEMPLATE_FOR_TITLE1" => "Фирменный ",
		"TEMPLATE_FOR_TITLE2" => " дизайн конвертов",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Разработка дизайна фирменного конверта для любой корреспонденции. Вызывает положительные эмоции, побуждает заглянуть внутрь, сохраняет ваши письма.",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 


<div class="old_page">
     
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_428519170.jpg') center no-repeat;">
            <h2>Разработаем запоминающийся дизайн конверта для любого бизнеса</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">Во времена интернета оригинальный конверт - ключевой инструмент в переписке с клиентами. Его приятно открыть, в него приятно положить письмо, он не затеряется в груде бумаг. Необычно оформленное послание рождает особую связь между отправителем и получателем, указывает на исключительное отношение к адресату.  Оно вызывает интерес и создаёт интригу: что же там внутри? 
            Именно поэтому современный маркетинг активно пользуется этим мощным инструментом воздействия на эмоции и поведение клиентов. 
            Воспользуйтесь всеми преимуществами дизайнерского конверта, который:</p>
            <ul class="zu_text">
                <li>Является важным акцентом фирменного стиля</li>
                <li>Располагает клиента за считанные секунды</li>
                <li>Помогает надолго запомнить вас и вашу компанию</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4 zn_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_462062914.jpg') center no-repeat;">
                <h2>Сколько стоит дизайн фирменного конверта</h2>
            </div>
        </div>
        <div class="main-970">    
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Стильное оформление показывает особое отношение к клиенту. С ним ваша компания смотрится респектабельно и профессионально, выигрышно выделяется на фоне конкурентов, и это помогает строить успешный долгосрочный бизнес. Закажите разработку интересного цепляющего дизайна премиум-класса по разумным ценам.</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Стоимость фирменного <br> конверта в Veonix</p>
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
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_751331752.jpg') center no-repeat;">
            <h2>Дизайн каких конвертов мы предлагаем:</h2>
        </div>
        <div class="main-970">
            <ul class="zu_text">
                <li>Разные размеры (стандартные: С1, С5, С6, Е65, С65 и нестандартные: К7, К8, К65, К5)</li>
                <li>Различные форматы (отечественные и европейские стандарты)</li>
                <li>Огромный выбор фактур бумаги</li>
                <li>Идею, которой нет у других</li>
            </ul>
            <p class="zu_text">Выберите вариант под ваш бизнес и ваши цели.</p>
            <p class="zu_text">Тарифы на печать рассчитываются индивидуально и зависят от количества тиража. Минимальный заказ от 500 штук. Чем больше заказываете, тем выше скидка. Доставка по Москве - БЕСПЛАТНО!</p>
            <p class="zu_text">Практика показывает, что подача информации в необычном конверте увеличивает её ценность для получателя. Дизайн в значительной степени влияет на то, каким будет отношение клиента или партнёра к вашему сообщению и к вашей компании в целом.</p>
            <p class="zu_text">Предлагаем за разумные цены получить премиум-дизайн, с которым открываемость писем увеличивается до 90%, что примерно в 1,5 раза чаще обычных. При этом ваша компания производит самое благоприятное впечатление.</p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1087184843.jpg') center no-repeat;">
            <h2>Цифры и факты о компании Veonix</h2>
        </div>
        <div class="main-970">
            <ul class="zu_text">
            <li>Более 20<br>
                Целый штат специалистов, которые трудятся над вашим проектом с опытом от 3 лет в своей сфере</li>
            <li>Свыше 30<br>
                Крупные российские и зарубежные компании доверяют нам свои заказы. И эта цифра постоянно растёт</li>
            <li>50 000+<br>
                Столько экземпляров печатной рекламной продукции распечатано на оборудовании нашей полиграфии</li>
            <li>Углубленный маркетинг рынка<br>
                Даже конверт говорит на языке клиента и побуждает совершить нужное вам действие</li>
            <li>Все виды полиграфической продукции<br>
                Всё, что нужно для профессионального фирменного стиля</li>
            <li>Современное печатное оборудование<br>
                Точная печать, 100% чистые и яркие цвета, которые притягивают глаз</li>
        </ul>
        <h2>Почему разработка дизайна конвертов в Veonix выгодна для вас</h2>
        <ul class="zu_text">
            <li>Наш дизайн продаёт<br>
                Конверты на заказ - это продающий  дизайн. Мы создаём то, что работает на положительные эмоции ваших клиентов, побуждает их к сотрудничеству.</li>
            <li>Подчёркивает преимущества<br>
                Наши специалисты посоветуют, как избежать ошибок при выборе дизайна. Подберут вариант, который раскрывает лучшие стороны вашего бизнеса.</li>
            <li>Повышает узнаваемость<br>
                Вас будут замечать! О вас будут говорить! Мы разработаем для вас особенный оригинальный дизайн, и ваши клиенты с нетерпением будут ждать от вас новых писем.</li>
        </ul>
        <h2>3 кита, на которых мы стоим</h2>
        <ul class="zu_text">
            <li>Команда<br>
                Креативная команда, с огромным количеством идей. Сфокусирована на клиенте и уверена, что дизайн - это часть маркетинга, который должен отвечать целям и задачам бизнеса.</li>
            <li>Опыт и навыки<br>
                Знаем все подводные течения и как их обойти. Наши дизайны всегда попадают в десятку, потому что они создаются конкретно для вашей целевой аудитории.</li>
            <li>Результат<br>
                Авторский стиль и на 100 % уникальный дизайн. Разработанные для вас конверты увеличивают открываемость писем и укрепляют отношения с клиентами и партнерами.</li>
        </ul>
        </div>
    </div>
</section>
<section class="zu_b7">
    <div class="main">
        <div class="box1_zu_b7">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/buklet/bk_b7_bg.jpg') center no-repeat;"><h2>Вы получаете пять уровней гарантии</h2></div>
        </div>
        <div class="box2_zu_b7">
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 01</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: 600;">Уникальность.</span> 100% авторство дизайнов</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 02</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: 600;">Всё в срок.</span> За один день просрочки — скидка 1000 руб.</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 03</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: 600;">Безопасность.</span> Юридическая ответственность за нарушение конфиденциальности</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 04</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: 600;">Бесплатные правки 1 год.</span> Оперативное исправление ошибок</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 05</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: 600;">100% возврат средств.</span> Если результат не оправдал надежд</p>
            </div>
            <div class="box2_zu_b7_item">
                </div>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1106987216.jpg') center no-repeat;">
            <h2>Заказать дизайн конвертов в Veonix просто</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">Шаг 1. Выявление потребностей. Определяем ключевые моменты вашего бизнеса, заполняем бриф</p>
            <p class="zu_text">Шаг 2. Составление УТП. Анализируем ваш бизнес, находим изюминку, отличающую его от других</p>
            <p class="zu_text">Шаг 3. Разработка дизайна: создаём 3-4 варианта концепции, из которых вы выбираете лучший</p>
            <p class="zu_text">Шаг 4. Печать конвертов по готовому макету и доставка по любому адресу в Москве</p>
            <p class="zu_text">Профессионально разработанный, изготовленный из качественной бумаги конверт останется с вашими клиентами надолго. Ведь избавиться от красоты не поднимается рука. А значит ваш бренд будет попадаться на глаза чаще, чем все остальные.</p>
            <p class="zu_text">Не дайте конкурентам занять ваше место на столе клиентов и партнеров. Будьте на шаг впереди и оставляйте о себе самое лучшее впечатление.</p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1767810080-ai.jpg') center no-repeat;">
            <h2>Каким должен быть конверт</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">Когда мы говорим о конверте, прежде всего всплывает пустой белый прямоугольник. И ассоциация, связанная с ним - что-то официальное и скучное. Такое совсем не хочется открывать.</p>
            <p class="zu_text">Если всё-таки дизайн и встречается, то в лучшем случае вы увидите неброские пастельные цвета, “чтобы сильно не выделяться”. Либо это разные размеры логотипов компании, напечатанные на том же белом фоне.</p>
            <p class="zu_text">А что, если разрушить стандарты? Ведь суть дизайна - привлечь внимание, выделиться на фоне других. Как это сделать, не навредив имиджу компании?</p>
            <ol class="zu_text">
                <li>Определяемся с концепцией. Что мы хотим донести до клиента? Какое сообщение ему оставить? На этом строим весь дизайн. </li>
                <li>Определяемся с цветовой гаммой. Психологи утверждают, что цвет играет важную роль в жизни человека и влияет на его подсознание. Всё зависит от того, с чем такой цвет сочетается и как его оформить. А мы воспользуемся знаниями психологии при подборе цвета. </li>
                <li>Вписываемся в общий стиль. Очень важно, чтобы конверт не жил отдельной жизнью от всего остального - визиток, баннеров, логотипа и прочего. Помним, что он - часть команды и должен соответствовать фирменному стилю компании.</li>
                <li>Выбираем фактуру и плотность бумаги. Общий совет - бумага должна быть качественной. Во-первых, она солиднее смотрится. Во-вторых, прочнее, и содержимое письма гарантированно сохраняется. Даже если во время доставки случится какой-нибудь “форс - мажор”, письмо не пропадёт. Так что помимо эстетического восприятия подключается чисто практический фактор.</li>
                <li>Определяем оптимальный размер. Тут всё зависит от цели письма. Если это сертификат, договор или другой документ формата А4, соответственно, выбираем этот формат. Для открыток, писем, другой и стандартной корреспонденции отдаём предпочтение стандартным размерам. Есть конверты продолговатые и прямоугольные. Всё зависит от цели и фантазии. Главное, что содержимое не помялось и сохранило первоначальный вид.</li>
                <li>Доносим главную информацию. Никогда не забываем, что цель конверта - чтобы клиент вас запомнил с хорошей стороны. Поэтому на верхней стороне должно быть всё необходимое о вас: логотип, род деятельности и даже контакты. По сути, дизайнерский фирменный конверт выполняет функцию качественной визитки. Тогда он точно точно не затеряется. Его сохранят хотя бы ради контактов. </li>
                <li>Выбираем читабельные шрифты. Это очень важный пункт. От него зависит, будут ли вообще читать ваш текст. Шрифты должны дополнять дизайн и вписываться в общую картину. </li>
            </ol>
            <p class="zu_text">Воспользуйтесь идеями и опытом наших специалистов. Работаем только на самом продвинутом программном обеспечении. При разработке дизайна используем лицензионные и профессиональные редакторы: Photoshop и Adobe Illustrator. А это гарантия отличного результата.</p> <br><br><br><br><br>
        </div>
    </div>
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
        <p><a href="https://veonix.ru/blog/kak-rabotat-s-dizajnerami/">Как работать с дизайнерами</a></p>
        <p><a href="https://veonix.ru/blog/kakim-principam-nuzhno-sledovat-pri-razrabotke-dizajna/">Каким принципам нужно следовать при разработке дизайна?</a></p>
        <p><a href="https://veonix.ru/blog/sovremennyj-branding/">Современный брендинг</a></p>
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
		"TYPE_TEXT" => "Конверт, Каталог, Флаер, Визитка,  Коммерческое предложение,  Листовка, Годовой отчет,  Буклет, Брошюра, Прессвол, Roll Up, Другое"
	),
	false
);?>

 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>