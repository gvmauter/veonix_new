<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "В студии дизайна Veonix вы можете заказать разработку нейминга под ключ по цене 49 000 руб. Придумаем запоминающееся название для вашей компании. Гарантируем оригинальность нейминга. Юридическая регистрация.");
$APPLICATION->SetPageProperty("title", "Заказать разработку нейминга — услуги студии дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Брендинг","/branding/");
$APPLICATION->AddChainItem("Нейминг");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    


$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/infografika.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "",
		"TEMPLATE_FOR_TITLE2" => "Нейминг",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Имя, которое войдет в историю. Разработаем уникальное название для компании и торговой марки. Проверим свободные варианты доменного имени. Проведем юридическую регистрацию",
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
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1938853576.jpg') center no-repeat;">
                <h2>Сколько стоит нейминг?</h2>
            </div>
        </div>
        <div class="main-970">    
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Креативной командой разработаем имя бренда, которое будет ассоциироваться только с вами. Подготовим 20 вариантов названий с учетом специфики продукта, из которых вы выберете оптимальный</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Разработка нейминга</p>
                    <div class="ds-b3-box-right">
                        <p>от 100000 <i></i></p>
                    </div>
                </div>
            </div>
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Не только создадим уникальное, цепляющее имя, но и окажем сопутствующие услуги для еще более эффективного продвижения вашего бизнеса:</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Разработка слогана</p>
                    <div class="ds-b3-box-right">
                        <p>от 100000 <i></i></p>
                    </div>
                    <p class="box2_zu_b4_item_tx">Разработка логотипа</p>
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
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1938861139.jpg') center no-repeat;">
            <h2>Какие типы нейминга применяются?</h2>
        </div>
        <div class="main-970">
            <ul class="zu_text">
                    <li>Традиционный<br />
                        Основан на ассоциативном подходе и позволяет разработать простое, понятное для широкой аудитории имя.</li>
                    <li>Описательный<br />
                        Максимально передаст всю суть вашей компании или бренда.<br />
                        Такие имена состоят из словосочетаний.</li>
                    <li>Географический<br />
                        Название имеет географическую привязку, которая улучшает запоминаемость и придает названию колорит.</li>
                    <li>Ассоциативный<br />
                        Вызывает у аудитории интерес, привлекает внимание к продукту, создает эффектный образ, остающийся в памяти потребителя.</li>
                    <li>Составной<br />
                        Название генерируется на основании различных комбинаций слов.<br />
                        Такие имена оригинальны, неординарны и креативны.</li>
                </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1877637385.jpg') center no-repeat;">
            <h2>Для каких целей вы можете заказать нейминг?</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">Какое название будет идеальным? Которое достаточно услышать один раз, а потом легко вспомнить через дни и месяцы. </p>
            <p class="zu_text">Свежая идея + Отстройка от конкурентов + Эмоции = Нейминг</p>
            <p class="zu_text">Название — актив компании. Оно должно нравиться клиентам и приносить бизнесу постоянную прибыль. Нейминг — это трудоемкий процесс, который мы готовы облегчить вам во многих направлениях: </p>
            <p class="zu_text">НАЗВАНИЕ КОМПАНИИ</p>
            <p class="zu_text">Бренд начинается с названия. Именно оно определяет отношение потребителей к компании, несет определенный символизм, демонстрирует концепцию и стиль.</p>
            <p class="zu_text">ТОРГОВАЯ МАРКА</p>
            <p class="zu_text">Партнеры, потенциальные клиенты, конкуренты оценивают бренд по названию непроизвольно, но категорично и жестко, как люди судят друг друга по внешности. Вопрос в выборе имени требует внимательного подхода.</p>
            <p class="zu_text">ТОВАРЫ И УСЛУГИ</p>
            <p class="zu_text">Через продукт аудитория коммуницирует с самим брендом. И название играет решающую роль в начале этого взаимодействия. Мы проведем маркетинговый анализ компании, рынка, клиентов и поможем наладить контакт с потребителем.</p>
            <p class="zu_text">МЕРОПРИЯТИЕ</p>
            <p class="zu_text">Броское и цепляющее название мероприятия приведет большую аудиторию и принесет прибыль организаторам. Наши специалисты отразят всю суть, уровень и важность предстоящего события.</p>
            <p class="zu_text">РЕКЛАМНЫЙ СЛОГАН</p>
            <p class="zu_text">Хороший рекламный слоган заседает в голове, как строчка из любимой песни. Девиз помогает выделить продукты среди всего многообразия предложений на рынке. Здесь важно уловить ритм, создать образ через метафоры, чтобы повысить лояльность клиентов.</p>
            <p class="zu_text">ПРОЕКТЫ</p>
            <p class="zu_text">Имя для проекта иногда сложнее придумать, чем саму бизнес-идею. Подходящее и точное название заинтересует целевую аудиторию, потенциальных инвесторов и заказчиков.</p>
            <p class="zu_text">РИТЕЙЛ-БРЕНДИНГ</p>
            <p class="zu_text">Коммерческие центры, гипермаркеты, павильоны постоянно конкурируют за покупателей. Мы знаем главный ключ к успеху — разработка яркой, оригинальной концепции бренда.</p>
            <p class="zu_text">ЖИЛЫЕ КОМПЛЕКСЫ</p>
            <p class="zu_text">Ориентируясь на класс комплекса и целевые потребности аудитории, мы выделим новостройку в глазах потенциальных покупателей среди сотен других подобных объектов.</p>
            <p class="zu_text">ПРИЛОЖЕНИЯ</p>
            <p class="zu_text">Есть всего 20 символов, чтобы заинтересовать пользователя. Мы поможем значительно повысить шансы на успех для вашего приложения или сервиса, ведь всегда учитываем три важных фактора: запоминаемость, аутентичность, гармоничное звучание.</p>
            <p class="zu_text">ПОДБОР ДОМЕННОГО ИМЕНИ</p>
            <p class="zu_text">Чтобы обеспечить узнаваемость и повысить посещаемость сайтов, важно подобрать простое и запоминающееся доменное имя, которое проводит прямую ассоциацию с компанией.</p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1936692277.jpg') center no-repeat;">
            <h2>Наши проекты</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">Мы собираем информацию, проводим исследования о работе компании, технологиях, уникальных предложениях, ключевых выгодах для клиентов и находим оптимальное решение для вашего бизнеса. Нейминг в сочетании со слоганом позволяет раскрыть всю суть и выделить особенности проекта. Ниже представлены примеры наших работ:</p>
            <ul class="zu_text">
                <li>Охранное предприятие «Ангел»<br />
                    Принципиально новый образ охранников: интеллигентных, вежливых, компетентных.</li>
                <li>ЖК «Империал»<br />
                    Прикосновение к роскоши.</li>
                <li>ДоМишка<br />
                    Добрый, уютный, твой.</li>
            </ul>
            <p class="zu_text">Творческий подход совместно с детальным изучением продукта, пожеланиями клиента, потребностями рынка и целевой аудитории позволило нам создать такие проекты, как:</p>
            <ul class="zu_text">
                <li>Типографика</li>
                <li>HR Insider</li>
                <li>Кисти&amp;Валики</li>
                <li>Zарядка</li>
                <li>Подстригайка</li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1943867308.jpg') center no-repeat;">
            <h2>Почему стоит заказать нейминг в студии Veonix?</h2>
        </div>
        <div class="main-970">
            <p class="zu_text">В Veonix мы комплексно подходим к вопросу создания уникального имени без дополнительных расходов на доработки. Учитываются все аспекты: маркетинговый, юридический, лингвистический, креативный, управленческий.</p>
            <p class="zu_text">Маркетинг</p>
            <ul class="zu_text">
                <li>Исследуем целевую аудиторию, изучаем ассоциации с продуктом, анализируем потребности клиентов и полезное действие продукта для них</li>
                <li>Анализируем всех конкурентов на рынке, выделяем Вас на фоне остальных</li>
                <li>Учитываем все факторы, влияющие на восприятие названия потребителем: легкость произношения, передача по цифровым каналам связи, ассоциации, общественное мнение</li>
                <li>Определяем конкретные сроки, отдаем проект вовремя, без задержек</li>
            </ul>
            <p class="zu_text">Лингвистика</p>
            <ul class="zu_text">
                <li>Используем лингвистические приемы: заимствования, топонимы, неологизмы и другие </li>
                <li>Тестируем на благозвучность, подбираем гармоничные сочетания, которые отражают суть продукта</li>
                <li>Делаем семантический анализ, рассматриваем сходные смысловые поля, исключаем варианты с возможным негативным оттенком</li>
                <li>Проверяем степень сходства с уже существующими марками и компаниями, чтобы при регистрации и продвижении не возникло проблем</li>
            </ul>
            <p class="zu_text">Управление</p>
            <ul class="zu_text">
                <li>Планируем проект, создаем открытые и ориентированные на будущее названия</li>
                <li>Берем на себя все этапы разработки бренда: от исследований до формирования рекламной концепции</li>
                <li>Создаем мультиязычное название. Вы сможете использовать название как в транслитерации, так и без нее</li>
                <li>Проводим проверки на звучание, наличие ударений, эстетичность написания, читабельность, удобство размещения</li>
                <li>Регистрируем название и передаем права. Все заботы возьмут на себя юристы нашей компании, грамотно оформят документы и передадут имущественные права</li>
            </ul>
            <p class="zu_text">Мы предлагаем комфортный процесс совместной работы: на всех этапах согласовываем с вами проект, чтобы он полностью отвечал вашим требованиям, находим свежие и креативные идеи, продумываем индивидуальные решения, а вы получаете уникальный нейминг.</p>
        </div>
    </div>
</section>
<section class="zu_b8">
    <div class="main">
        <p class="zu_zag">Схема работы с нами</p>
        <div class="box1_zu_b8 ds-b6-box2-main">
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 1</span>
                        <span class="b">Бриф</span> Составляем бриф, выявляем потребности. Консультируем вас по всем имеющимся вопросам, определяем цели и задачи, объемы и сроки работ. Оформляем договор.
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 2</span>
                        <span class="b">Анализ</span> Анализируем сферу бизнеса, в которой представлен товар или услуга. Определяем преимущества продукта, выявляем ассоциации. Изучаем аналогичные предложения на рынке, чтобы избежать схожести и создать уникальный продукт.
                    </p>
                </div>
            </div>
            <div class="ds-b6-box2-main-colum">
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 3</span>
                        <span class="b">Концепция</span> Анализируем полученную информацию и создаем названия: штурмим всей командой свежие идеи, предоставляем вам на согласование перечень вариантов нейминга.
                    </p>
                </div>
                <div class="ds-b6-box2-main-item">
                    <p>
                        <span>Этап 4</span>
                        <span class="b">Нейминг</span> Вы определяете наиболее подходящее название. По необходимости вносим корректировки, согласовываем дополнительные работы. Соотносим цели и задачи с результатами, подписываем акт, проводим расчеты.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="zu_b7">
    <div class="main">
        <div class="box1_zu_b7">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/buklet/bk_b7_bg.jpg') center no-repeat;"><h2>Наши гарантии</h2></div>
        </div>
        <div class="box2_zu_b7">
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 01</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Официальная сделка.</span> Работаем только по официальному договору, в котором закрепляются все права и обязанности, объемы и сроки работ, финансовые гарантии</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 02</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Конфиденциальность.</span> Организация сотрудничества учитывает защиту предоставленных конфиденциальных данных. Этот пункт фиксируем в договоре NDA</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 03</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Соблюдение сроков.</span> Реализуем проекты в рамках строго отведенных дат, штрафы за каждый день просрочки закрепляем документально</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 04</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Антиплагиат.</span> Весь материал проверяем на оригинальность, проекты разрабатываем без шаблонов и клише, персонально под ваш бренд</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 05</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Возврат денег.</span> В случае, если результат вас не устроит, вернем 100% суммы заказа</p>
            </div>
            <div class="box2_zu_b7_item">
                <p class="box2_zu_b7_item_tx1">Гарантия 06</p>
                <p class="box2_zu_b7_item_tx2"><span style="font-weight: bold;">Бесплатные правки.</span> В течение 36 месяцев с момента сдачи проекта бесплатно вносим правки и исправляем ошибки, допущенные по нашей вине</p>
            </div>
        </div>
    </div>
</section>

</div>
 
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
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "14",
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
        <p><a href="/blog/kakie-tipy-nejminga-sushhestvujut/">Какие типы нейминга существуют?</a></p>
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
		"TYPE_TEXT" => " Нейминг, Айдентика, Логотип, Брендбук, Дизайн упаковки,  Фирменный стиль, Гайдбук, Разработка слогана, Другое"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>