<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать создание и разработку дизайна годового отчета под ключ. Подготовка текстов и дизайна годового отчета по выгодной стоимости, цена 4000 рублей.");
$APPLICATION->SetPageProperty("title", "Дизайн годового отчета компании в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн годового отчета");
 
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
		"TEMPLATE_FOR_TITLE1" => "Стоимость дизайна ",
		"TEMPLATE_FOR_TITLE2" => "годового отчета",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Разработаем инфографичный дизайн <br> и напишем профессиональные тексты <br> для вашего годового отчета",
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
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1070116094.jpg') center no-repeat;">
                <h2>Сколько стоит дизайн годового отчета?</h2>
            </div>
        </div>
        <div class="main-970">
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Если у вас есть брендбук, то действует скидка 20% на дизайн годового отчета.</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Создать дизайн годового отчета / страница</p>
                    <div class="ds-b3-box-right">
                        <p>от 4000 <i></i></p>
                    </div>
                </div>
            </div>
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">В случае если текст уже есть, но его нужно привести в порядок, цена может быть снижена на 20%</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Написать текст для годового отчета / страница</p>
                    <div class="ds-b3-box-right">
                        <p>от 1500 <i></i></p>
                    </div>
                </div>
            </div>
            <div class="box2_zu_b4">
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Мы состоим в партнёрских отношениях с типографией. Поэтому с нашей помощью вы можете заказать любой тираж со скидкой 20%</p>
                </div>
                <div class="box2_zu_b4_item">
                    <p class="box2_zu_b4_item_tx">Напечатать годовой отчет / экземпляр</p>
                    <div class="ds-b3-box-right">
                        <p>от 100 <i></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_771444898.jpg') center no-repeat;">
                <h2>Для чего нужен годовой отчет?</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">Годовой отчёт — важнейший инструмент, который поможет создать положительный имидж вашей компании:</p>
            <p class="zu_text">Он позволяет:</p>
            <ul class="zu_text">
                <li>существенно увеличить лояльность к бренду;</li>
                <li>усилить позиционирование фирмы;</li>
                <li>привлечь новых клиентов, инвесторов и партнеров;</li>
                <li>привлечь дополнительное финансирование;</li>
                <li>укрепить имиджевые позиции. </li>
            </ul>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1046930062.jpg') center no-repeat;">
                <h2>Для каких компаний мы делаем годовые отчеты?</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">— для страховых компаний<br />— для производственных предприятий <br />— для некоммерческих организаций<br />— для государственных учреждений<br />— для телекоммуникационных компаний<br />— для финансовых организаций<br />— для энергетического сектора</p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1613378590-ai.jpg') center no-repeat;">
                <h2>Почему стоит заказать дизайн годового отчета в Veonix?</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text"><span style="font-style: bold;font-style: italic;">Какие выгоды вы получаете, обращаясь к нам:</span></p>
            <ul class="zu_text">
                <li>Профессиональный инфографичный дизайн за демократичную цену;</li>
                <li>Опытные аналитики в штате позволят структурировать и визуализировать все данные от заказчика;</li>
                <li>Все наши годовые отчеты выглядят достойно и подчеркнут высокий уровень вашей компании;</li>
                <li>Редакторы помогут доработать тексты, убрать лишнюю воду, представить данные в выигрышном свете. Убедительно рассказать обо всех достижениях. </li>
                <li>Никогда не используем шаблонные решения, делая каждый проект строго индивидуально. </li>
                <li>В штате есть иллюстраторы и 3D-дизайнеры, которые сделают сложную инфографику, схемы, визуализацию. </li>
            </ul>
            <p class="zu_text"><span style="font-style: bold;font-style: italic;">Аргументы в пользу сотрудничества со студией Veonix в цифрах:</span></p>
            <ul class="zu_text">
                <li>20+ штатных сотрудников, каждый с опытом не менее 2х лет в нише;</li>
                <li>30 + крупнейших российских и международных компаний сотрудничают с нами на постоянной основе;</li>
                <li>50 + профессионально разработано годовых отчетов;</li>
                <li>5000+ страниц текста написано нашими редакторами и сценаристами;</li>
                <li>10000+ экземпляров отпечатано через нас</li>
                <li>70% заказчиков возвращаются повторно и советуют нас партнёрам.</li>
            </ul>
        </div>
    </div>
</section>
<section class="primer_block">
    <div class="main">
        <p class="primer_block-title">Примеры выполненных работ</p>
        <div class="primer_block-flex">
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo1.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo1.jpg"></a>
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo2.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo2.jpg"></a>
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo3.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo3.jpg"></a>
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo4.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo4.jpg"></a>
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo5.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo5.jpg"></a>
            <a data-fancybox href="/bitrix/templates/veonix/assets/img/old/report/dgo6.jpg"><img class="lazy" src="/bitrix/templates/veonix/assets/img/old/pixel.png" data-src="/bitrix/templates/veonix/assets/img/old/report/dgo6.jpg"></a>
        </div>
        <a class="sbm" href="/portfolio/">Портфолио</a>
    </div>
</section>  
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1658508751.jpg') center no-repeat;">
                <h2>Мы открыты для диалога и обсуждения вариантов сотрудничества!</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text" class="zu_text">Наша студия Veonix профессионально разрабатывает дизайн годовых отчетов. У наших клиентов есть возможность наглядно отразить перспективы и рентабельность своего бизнеса, дополнительно стимулировать деловых партнёров для заключения сделок. Разработка концепции дизайна годового отчета должна отражать и особенности компании. Важно, чтобы составлением информационного пакета занимались именно опытные специалисты. Именно такие сотрудники и работают в нашей студии. Наша команда работает с проектами любого уровня сложности, предлагая всегда оригинальные и индивидуальные решения подачи информации. Мы обязательно учитываем необходимую фирменную стилистику и официальный тон документа. Сроки разработки дизайна годового отчета — от 1 рабочего дня   вы сможете уже получить первые эскизы. Весь проект готовы сделать за 3 -7 дней в зависимости от сложности работы.</p>
            <p class="zu_text">Мы отлично понимаем, что разработка дизайна годового отчета требует учёта специфики бизнеса и вникания в его суть. Это предполагает тесное и взаимовыгодное сотрудничество специалистов с компанией. Тщательно прорабатываются отчёты, которые, как правило, имеют несколько информационных блоков:</p>
            <ul class="zu_text">
                <li>обращение руководства к потенциальным деловым партнёрам;</li>
                <li>данные о результатах работы организации, темпах её развития, планы на будущее;</li>
                <li>список основных направлений бизнеса;</li>
                <li>сведения о доходности и затратах;</li>
                <li>комплексный финансовый анализ;</li>
                <li>прочая дополнительная информация.</li>
            </ul>
            <p class="zu_text">Мы готовы гарантировать полную конфиденциальность данных, которые будут нами получены при подготовке проекта. Для более удобного сотрудничества, наша студия предоставляет личного менеджера, который ответит на все интересующие вопросы и подробно проконсультирует по услугам. </p>
        </div>
    </div>
</section>
<section class="zu_b4">
    <div class="main">
        <div class="box1_zu_b4">
            <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1893788224-ai.jpg') center no-repeat;">
                <h2>Схема сотрудничества с заказчиками</h2>
            </div>
        </div>
        <div class="main-970">
            <p class="zu_text">Как заказать нам корпоративный дизайн годового отчета? Всё предельно просто и понятно.</p>
            <p class="zu_text">Этапы работы (для примера):</p>
            <ul class="zu_text">
                <li>обработка заявки. Аналитическая вычитка текущих отчетов компании. Изучение актуальных требований законодательства в области раскрытия финансовой и нефинансовой информации в зависимости от региона присутствия;</li>
                <li>составление коммерческого предложения. Сроки подготовки годового отчета зависят от даты проведения собрания акционеров; </li>
                <li>согласование расценок и выставление счёта. Для расчета стоимости используется модульный калькулятор с высоким уровнем детализации цены для каждого вида работ. Индивидуально формируется нужный набор услуг. Дизайн проекта всегда включен в базовую цену. Для компаний со сложившейся практикой подготовки годового отчета стоимость может быть снижена за счет  отсутствия необходимости в  консолидации первичной информации;</li>
                <li>разработка дизайна. Штатные специалисты анализируют эффективность предыдущих годовых отчетов и лучших практик раскрытия корпоративной информации, изучают заявления руководителей, отчетные документы, пресс-релизы и на основании полученной информации разрабатывают смысловую концепцию. Создаются уникальная иконографика и иллюстрации (с учетом фирменного стиля компании), проводятся фотосессии менеджмента и объектов для использования в оформлении годового отчета;  </li>
                <li>внесение возможных правок. Наши технологии позволяют заказчикам вносить улучшения, дополнения и корректировки в онлайн-режиме. Это экономит время и снижает вероятность неточностей. После утверждения макета возможны правки технического характера (без изменения дизайна). Готовый вариант предлагается клиенту для окончательного утверждения и согласования способов печати;</li>
                <li>пробная печать и последующий запуск основного тиража. Качество каждого экземпляра годового отчета строго контролируется нашими специалистами.</li>
                <li>оперативная доставка готовой продукции. Сотрудничество с ведущими транспортными компаниями позволяет отправлять печатную продукцию в любую точку России или других стран. </li>
            </ul>
            <p class="zu_text">Вы можете быть на 100% уверенными в том, что заказывая дизайн годового отчета в Veonix, вы в итоге получите высококачественные материалы в любых удобных форматах, а также постоянное взаимодействие со специалистами нашей студии. Такой подход к делу позволяет нам добиваться оптимальных результатов и нарабатывать базу постоянных клиентов. С нами успешно сотрудничают такие крупные компании, как «Газпром», «Билайн», «Летуаль», «Ситилинк» и многие другие. Если нужно оформить годовые корпоративные отчеты, то мы всегда на связи. Над вашим проектом будет работать внушительная команда опытных и талантливых специалистов. Работаем на основании официального договора с финансовыми гарантиями. </p>
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
        <p><a href="https://veonix.ru/blog/5-sovetov-zakazchiku-pri-postanovke-zadachi-dizajneru/">5 советов заказчику при постановке задачи дизайнеру</a></p>
        <p><a href="https://veonix.ru/blog/6-etapov-razrabotki-firmennogo-stilya/">6 этапов разработки фирменного стиля</a></p>
        <p><a href="https://veonix.ru/blog/kak-rabotat-s-dizajnerami/">Как работать с дизайнерами</a></p>
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
       "TYPE_TEXT" => " Годовой отчет, Коммерческое предложение, Визитка, Листовка,  Каталог, Буклет, Брошюра, Прессвол, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>