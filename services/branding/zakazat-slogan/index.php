<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/old/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать слоган в профессиональной студии дизайна Veonix по цене 100 000 руб. Проверка на оригинальность, разработка без шаблонов и клише, персонально под ваш бренд. Создадим ёмкий и эффективный слоган, чтобы вашу рекламу запомнили.");
$APPLICATION->SetPageProperty("title", "Разработка слогана — заказать в студии дизайна Veonix по доступной стоимости");

$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Брендинг","/branding/").
$APPLICATION->AddChainItem("Разработка слогана").

$APPLICATION->SetTitle("Разработка слогана — заказать в студии дизайна Veonix по доступной стоимости");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/infografika.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/prezent.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/brendbookPage.css");   


?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Разработка ",
		"TEMPLATE_FOR_TITLE2" => "слогана",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Ваш слоган люди скажут без запинки. Создадим цепляющий слоган для компании, который ярко транслирует уникальное торговое предложение, вызывает нужные эмоции и надолго заседает в памяти",
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
<section class="zu_b4 zn_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1978772546-ai.jpg') center no-repeat;">
                <h2>Стоимость разработки слогана</h2>
            </div>
        </div>
        <div class="main-970">
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Исследуем продукт, бренд и нишу рынка. Под конкретный запрос разрабатываем 20 слоганов. Согласуем подходящие варианты, создаем финальный — самый мощный.</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Цена разработки слогана</p>
                    <div class="ds-b3-box-right">
                        <p>от 100000 <i></i></p>
                    </div>
                </div>
            </div>
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Кроме того, создаем креативный логотип бренда <br> и уникальный нейминг: </p>
                    <ul class="box2_zu_b4_item_tx">
                        <li><a href="/zakazat-naming/"><span style="font-weight: 600;">Нейминг</span></a><br />
                        Разработаем имя, которое легко запомнят и всегда узнают</li>
                        <li><a href="/logos/"><span style="font-weight: 600;">Разработка логотипа</span></a><br />
                        Визуализируем имя в главном символе бренда</li>
                    </ul>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Цена нейминга</p>
                    <div class="ds-b3-box-right">
                        <p>от 100000 <i></i></p>
                    </div>
                    <p class="box2_zu_b4_item_tx">Цена разработки логотипа</p>
                    <div class="ds-b3-box-right">
                        <p>от 100000 <i></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1962660355-ai.jpg') center no-repeat;">
                <h2>Зачем нужен слоган компании?</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">Любая компания, которая нацелена на повышение узнаваемости бренда и его продвижение, способна стать более популярной за счет сильного слогана. Он может емко показать уникальные преимущества, передать образ и привлечь аудиторию:</p>
            <ul class="zu_text">
                <li><span style="font-weight: 600;">Девиз<br />
                    </span>Слоган компании транслирует позицию вашего бренда и основные ценности. Даже миссия может быть выражена в меткой фразе. Одной фразой передается образ бренда, формируется отношение аудитории.</li>
                <li><span style="font-weight: 600;">Товары и услуги</span><br />
                    Через слоган продукта можно подать его уникальные характеристики, мгновенно заинтересовать потребителей, зацепить выгодой и пользой, ведь его основная цель — передать, как действует бренд. Сомнение покупателя развеется, он просто возьмет ваш товар с полки и пойдет дальше, проговаривая слоган.</li>
                <li><span style="font-weight: 600;">Мероприятия</span><br />
                    Слоган усилит и украсит афишу мероприятия любого масштаба. В нем может передаваться тематика и стиль события, его смысл, главная ценность для посетителей или “гвоздь программы”.</li>
                <li><span style="font-weight: 600;">Рекламные акции</span><br />
                    Слоган привлечет внимание сразу или поставит восклицательный знак в финале рекламы: передаст основную суть, покажет главные выгоды предложения, выделит продукт из масс. Заставит людей невольно его повторять и рассказывать об акции другим.</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_2014101758-ai.jpg') center no-repeat;">
                <h2>Почему стоит заказать слоган в студии Veonix?</h2>
            </div>
        </div>
        <div class="main-970">
            <ul class="zu_text">
                <li><span style="font-weight: 600;">Маркетинг</span><br />
                    Перед тем, как придумать слоган, мы тщательно анализируем ваш бизнес, целевую аудиторию, аналогичные предложения конкурентов и сферу деятельности в целом.</li>
                <li><span style="font-weight: 600;">Лингвистика</span><br />
                    Прорабатываем фразу с точки зрения языка, произношения, звучания, мультиязычности. Работаем над смыслом, ассоциациями и положительным восприятием слогана аудиторией.</li>
                <li><span style="font-weight: 600;">Менеджмент</span><br />
                    В работу включается целая команда проекта: вместе генерируем идеи, составляем варианты, отбираем оптимальные. Предоставляем комплекс работ: исследования, создание слогана, интеграция в бренд, регистрация прав, создание рекламной концепции. В разработке каждого проекта соблюдаем поставленные сроки.</li>
                <li><span style="font-weight: 600;">Авторские права</span><br />
                    Создаем уникальные слоганы, каждый проходит проверку на оригинальность. Сравниваем их с вариантами конкурентов, чтобы выявить возможные сходства и аналогии, отстраиваем и усиливаем. Юристы занимаются регистрацией прав и всеми необходимыми документами.</li>
                <li><span style="font-weight: 600;">Стоимость</span><br />
                    Над проектом работает команда профессионалов и дает гарантированный результат, при этом мы предлагаем приемлемые цены за наши услуги.</li>
                <li><span style="font-weight: 600;">Рассрочка</span><br />
                    Даже с учетом демократичных цен мы даем возможность получить услугу в полном объеме, а потом согласовать удобный график оплаты по частям.</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b8">
    <div class="main">
        <p class="zu_zag">Этапы разработки слогана</p>
        <div class="box1_zu_b8 ds-b6-box2-main">
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 1</span>
                        <span class="b">Бриф</span> Составляем бриф на создание слогана, собираем необходимую информацию: выявляем ваши потребности, консультируем вас по всем вопросам, определяем цели и задачи, объемы и сроки работ. Подписываем договор.
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 2</span>
                        <span class="b">Маркетинговые исследования</span> Анализируем бизнес и продукт. Определяем конкурентные преимущества, выявляем ассоциации. Определяем характеристики целевой аудитории. Изучаем конкурентов и их аналогичные предложения на рынке.
                    </p>
                </div>
            </div>
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 3</span>
                        <span class="b">Примеры слоганов</span> Всей командой придумываем варианты слоганов: собираем разные подходы к концепции, находим идеи, составляем емкие фразы, проверяем ассоциации с продуктом. 20 вариантов предоставляем вам на согласование.
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 4</span>
                        <span class="b">Согласование проекта</span> Вместе определяем самый сильный слоган, который понравится вам и будет работать на благо компании. По необходимости вносим корректировки, согласовываем дополнительные работы. Соотносим цели и задачи с результатами, подписываем акт, проводим расчеты.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="zu_b7">
    <div class="main">
        <div class="box1_zu_b7">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1889105812.jpg') center no-repeat;"><h2>Наши гарантии</h2></div>
        </div>
        <div class="box2_zu_b7">
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 01</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Официальная сделка</span> Работаем только по официальному договору, в котором закрепляются все права и обязанности, объемы и сроки работ, финансовые гарантии</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 02</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Конфиденциальность.</span> Организация сотрудничества учитывает защиту предоставленных конфиденциальных данных. Этот пункт фиксируем в договоре NDA</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 03</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Соблюдение сроков</span> Реализуем проекты в рамках строго отведенных дат, штрафы за каждый день просрочки закрепляем документально</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 04</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Антиплагиат</span> Весь материал проверяем на оригинальность, проекты разрабатываем без шаблонов и клише, персонально под ваш бренд</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 05</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Возврат денег</span> В случае, если результат вас не устроит, возвращаем 100% суммы заказа</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 06</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Бесплатные правки</span> В течение 36 месяцев с момента сдачи проекта бесплатно вносим правки и исправляем ошибки, допущенные по нашей вине</p>
            </div>
        </div>
    </div>
</section>
 
</div>

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
<div class="old_page"> 
<section class="poleznaya">
    <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
        <p><a href="/blog/sovremennyj-branding/">Современный брендинг</a></p>
    </div>
</section>





 
</div>

<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_1" => "",
		"TITLE_2" => "",
		"TITLE_3" => "",
		"TYPE" => "text",
		"TYPE_TEXT" => "Слоган,  Презентация, Дизайн упаковки, Логотип, Брендбук, Гайдбук, Дизайн упаковки, Коммерческое предложение, Видеоролик, Маркетинг-кит, Другое"
	),
	false
);?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>