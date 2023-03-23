<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать дизайн открыток под ключ. Создание и разработка дизайна открытки с креативной концепцией и поздравительными текстами по цене 10 000 рублей.");
$APPLICATION->SetPageProperty("title", "Дизайн открыток на заказ в Москве — цена в студии Veonix 10 000 руб.");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн открыток");
 
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
		"TEMPLATE_FOR_TITLE1" => "",
		"TEMPLATE_FOR_TITLE2" => "Дизайн  ",
		"TEMPLATE_FOR_TITLE3" => " открыток цена",
		"CHECKBOX" => "N",
		"TEXT_1" => "Профессиональные услуги разработки дизайна поздравительной, корпоративной открытки: оперативность, высокое качество, доступные цены",
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
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_490102348-ai.jpg') center no-repeat;">
                 <h2>Разработка дизайна открыток</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Многие типографии берутся за выполнение дизайна корпоративных открыток, а не только за выпуск тиражей. Как правило, штатный дизайнер, которому поручают задачу, не имеет высокой квалификации. Графика получается скромной, шаблонной, неинтересной, а ведь именно от нее зависит первая реакция адресата! </p>
                 <ul class="zu_text">
                     <li>Все понимают, что открытка - не очередная полиграфия, а особая категория печатной продукции. Первая ее задача – впечатлить получателя ярким изображением, полностью передающим суть события – личного, корпоративного, общегосударственного.</li>
                     <li>Это накладывает на разработчика дизайна открытки определенные обязанности. Профессиональные знания и навыки неизменно сочетаются с личностными возможностями: освоить техники может любой, стать настоящим художником способны единицы.</li>
                 </ul>
                 <p class="zu_text">Исполнителю требуется креативная способность, чувство стиля и гармонии, возможность глубоко погружаться в суть задачи. </p>
                 <blockquote>
                     <p class="zu_text">Если вам нужно именно такое, не стандартное, а уникальное решение, обращайтесь в студию Veonix. Вы получите исполнение «под ключ» - от разработки креативного дизайна до рекомендаций по материалам и технологиям печати, а также саму печать тиража при необходимости.</p>
                 </blockquote>
             </div>
         </div>
     </section>
     <section class="zu_b4 zn_b4">
         <div class="main">
             <div class="box1_zu_b4">
                 <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1938853576.jpg') center no-repeat;">
                     <h2>Цены на услуги дизайна открыток</h2>
                 </div>
             </div>
             <div class="main-970"> 
                 <p class="zu_opis">Всех, независимо от уровня предприятия или организации, интересует цена на дизайн открыток. Сообщим: она у нас невысокая. Мы стараемся держать ее ниже средней по рынку, и это особенно приятно с учетом высокого качества исполнения. Базовая стоимость - от 10 000 р. за стандартный макет, от 10 000 р. за сложный макет (с вырубками и пр.).</p>   
                 <div class="box2_zu_b4">
                     <div class="box2_zu_b4_item">
                         <ul class="box2_zu_b4_item_tx">
                            <li>Возможен заказ вариантов в разных сегментах – от бюджетного до премиум. Ценовая категория не влияет на ответственность исполнителя, эффектность и эффективность результата. Задачи выполним на все 100%, ведь для вас будут работать настоящие мастера своего дела.</li>
                            <li>На вопрос, сколько стоит дизайн открытки, отвечаем персонально. Конечная смета по заказу зависит от множества параметров, включая объем работы, сложность графики, длительность сотрудничества. Предлагаем заранее обсудить затраты с менеджером. Он сделает предварительный расчет по вашим данным.</li>
                            <li>Для постоянных клиентов в компании действует программа лояльности. Скидки продумаем и при разовом крупнооптовом заказе. Для постоянных клиентов дисконт до 50%, а при наличии брендбука – скидка 20%.</li>
                            <li>Принимаем заявки на срочное исполнение, в день обращения. Никогда не подводим, проблем с Veonix не будет.</li>
                        </ul>
                     </div>
                     <div class="box2_zu_b4_item">
                         <p class="box2_zu_b4_item_tx">Стоимость дизайна открытки</p>
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
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_672154567.jpg') center no-repeat;">
                 <h2>Профессиональная разработка дизайна открыток в Москве</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Зачем нужны стильные открытки с креативным изображением для деловых или трогательных поздравлений? Они необходимы не только ради демонстрации лояльности к адресату или повышения вашей репутации. Это искреннее выражение уважения. С помощью простой, недорогой, но красивой и тематической печатной продукции вы решите самые разные вопросы:</p>
                 <ul class="zu_text">
                     <li>ненавязчиво напомните уже сложившейся клиентской базе о своем бренде и новинках года или последнего времени;</li>
                     <li>улучшите отношения с партнерами, спонсорами, интересными вам лицами, включая публичные персоны;</li>
                     <li>продемонстрируете важность существующего между вами контакта или значимость для фирмы ее сотрудника.</li>
                 </ul>
                 <p class="zu_text">Какие только задачи не выполнит маленький кусок картона или прочной бумаги с нанесенным на него изображением, если при его создании была определена цель и ей четко следовали! </p>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1209860515-ai.jpg') center no-repeat;">
                 <h2>Заказать дизайн открыток в Москве</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Студия графического дизайна Veonix («Веоникс») в Москве оказывает полный спектр узкопрофессиональных услуг в сфере создания креативных решений для продвижения бизнеса.</p>
                 <p class="zu_text">Наши специалисты выполняют как сложные комплексные проекты, так и точечные задачи, ориентируясь на потребности клиента. Результат – креативное и всегда уникальное предложение.</p>
                 <p class="zu_text">В штате компании трудится более 20 человек, и это грамотные, опытные, талантливые мастера. Они ориентированы на выполнение следующих видов услуг:</p>
                 <ul class="zu_text">
                     <li>графический дизайн;</li>
                     <li>брендинг, логотипы,</li>
                     <li>фирменные стили;</li>
                     <li>маркетинг-киты, презентации, полиграфия;</li>
                     <li>веб-сайты и мобильные приложения;</li>
                     <li>чат-боты;</li>
                     <li>PR и реклама.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1499266142-ai.jpg') center no-repeat;">
                 <h2>Создание дизайна открыток на заказ</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Креатив и привлекательный дизайн поздравительных открыток (электронных и печатных версий) – одна из наших наиболее востребованных услуг, и мы выполняем задачи в полной мере. Никогда не разочаровываем заказчиков. Посмотрите на цифры, они говорят за нас:</p>
                 <ul class="zu_text">
                     <li>опыт сотрудников - от 2-х лет в профильной нише;</li>
                     <li>разработано 500+ уникальных дизайнов открыток;</li>
                     <li>более 300 поздравлений написано нашими талантливыми редакторами;</li>
                     <li>свыше 50000 экземпляров отпечатано с нашим непосредственным участием;</li>
                     <li>30+ крупнейших российских и международных компаний сотрудничают с Veonix на постоянной основе;</li>
                     <li>70% заказчиков возвращаются к нам повторно, советуют партнерам и другому окружению обращаться именно в Veonix.</li>
                 </ul>
                 <p class="zu_text">Мы ценим своих клиентов, стараемся создавать для них наиболее выгодные и комфортные условия сотрудничества. Они ощущают нашу заботу и дают рекомендации. Считаем это лучшей для себя наградой!</p>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1601602747-ai.jpg') center no-repeat;">
                 <h2>Открытка и ее новое предназначение: почему так ценится дизайн</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Первые открытки в нашем современном понимании этого полиграфического материала, появились свыше полутора веков назад. Их стартовое предназначение - инструмент переписки. </p>
                 <p class="zu_text">В отличие от традиционных писем в конвертах и записок открытки имели эксклюзивные особенности: использовались для поздравлений, поэтому в тексте всегда указывался повод, а в оформлении были элементы ручной работы. Они превращали обычное послание в праздничное.</p>
                 <p class="zu_text">Первая поздравительная открытка выпущена к Рождеству тиражом 1000 экземпляров. Ее расписали вручную, и она была великолепна! Через некоторое время появились массовые тиражи, и это были уже совсем другие решения. </p>
                 <p class="zu_text">Лучшими для корпоративного применения по-прежнему остаются персональные, эксклюзивные, интересные по графике изделия. Такие можно найти в каждом старом доме, потому что хранили их как произведения искусства.</p>
                 <p class="zu_text">Разработка дизайна корпоративных открыток – это неизменное напоминание о временах роскоши, неформальной переписки, классических поздравлений и приглашений, которые вручались лично адресату через посыльных.</p>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1677996814-ai.jpg') center no-repeat;">
                 <h2>Открытка — хороший сувенир</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Помимо того, что поздравительная или пригласительная открытка сохранила свою изначальную сувенирную функцию, она сегодня начала работать на дарителя. С ее помощью повышают уровень доверия и статус компании-заказчика. Она участвует в формировании деловых связей. </p>
                 <p class="zu_text">Для получения такой функциональности придется потрудиться. Только профессионалу под силу создать действительно эксклюзивное решение. Опытный дизайнер: </p>
                 <ul class="zu_text">
                     <li>при разработке основательно изучает целевую аудиторию, потому что в данном случае сюжет может основательно различаться, если адресат мужчина или женщина, представитель разных возрастов, социальных слоев, клуба интересов, так что универсальность не всегда уместна;</li>
                     <li>гармонично вписывает символику компании в общую канву рисунка, не создавая рекламного давления, свойственного другим полиграфическим материалам, и лишь ненавязчиво напоминая о дарителе;</li>
                     <li>думает не только о четкости линий, сочетаниях цветов, сюжете, но и об общей душевной, приятной ауре, которую должна создать графическая композиция;</li>
                     <li>понимает, что для корпоративной открытки графический дизайн – не только передача сюжета или атмосферы праздника, но и ценности партнерских отношений в формате красивого и неформального послания.</li>
                 </ul>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1734596186-ai.jpg') center no-repeat;">
                 <h2>Печать открыток</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Конечно, наши дизайнеры отлично знают все особенности печати тиражей, технологий, применимых при выполнении графических решений. Они учитывают возможность использования престижных элементов (золоченые или серебреные края, тиснение, металлизированные надписи и пр.). </p>
                 <blockquote>
                     <p class="zu_text">Особые тонкости имеют специальное психологическое воздействие на адресат и формируют дополнительную ценность изделия. Многие по-прежнему бережно хранят редкие и уникальные экземпляры, коллекционируют их.</p>
                 </blockquote>
                 <p class="zu_text">В зависимости от значимости или даты события в дизайне используются и другие элементы, которые участвуют в создании узнаваемого фирменного стиля, атмосферы уважения к VIP-клиентам, инвесторам, ключевым партнерам. </p>
                 <ul class="zu_text">
                     <li>Например, функциональность новогоднего или рождественского поздравления дополнит календарь. </li>
                     <li>При знаковых событиях, награждениях, юбилеях впишется специальная символика, напоминающая о них, создаются другие полезные приложения. </li>
                     <li>В качестве дополнения к праздничному сувениру открытка всегда вызовет яркие эмоции и повысит значимость подарка, если она выполнена специалистом, а не клерком, подрабатывающим в типографии.</li>
                 </ul>
                 <p class="zu_text">Нам заказывают любой сложный, креативный дизайн с вырубками, трафаретами и авторскими иллюстрациями, нарисованными от руки. Все пожелания исполнимы. Вам останется только выразить их словами по телефону, письменно и/или с приложением предварительного эскиза.</p>
             </div>
         </div>
     </section>
     <section class="zu_b4">
         <div class="main">
             <div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1746044738-ai.jpg') center no-repeat;">
                 <h2>Условия сотрудничества</h2>
             </div>
             <div class="main-970">
                 <p class="zu_text">Работаем по договору. Оформляем полный пакет закрывающих документов, передаем вместе с исходником. Предоставим письменные гарантии (100% money back, если результат не устраивает). Оплату принимаем по безналу. Выполнение заказа стартует после внесения 100% предоплаты.</p>
                 <blockquote>
                     <p class="zu_text">Вы хотите заказать разработку дизайна открыток, которые запомнятся, расскажут о высоком уровне вашей компании, продемонстрируют уважение к адресату? Обращайтесь в Veonix!</p>
                 </blockquote>
                 <p class="zu_text">Дополнительно напишем уникальные, искренние, статусные тексты (от 5 000 р.). При необходимости возьмем на себя также печать в типографии и гарантируем высочайшее качество: работаем с надежным партнером, который дает нашим клиентам 20% скидку на любой тираж.</p>
                 <blockquote>
                     <p class="zu_text">В «Веоникс» нет шаблонов! Любой проект индивидуален, над каждым решением трудится серьезная, тщательно подобранная команда талантливых специалистов студии, стабильно входящей в ТОП-10 профильного рейтинга!</p>
                 </blockquote>
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
             <p><a href="https://veonix.ru/blog/kak-generirujutsya-unikalnye-idei-dizajna/">Как генерируются уникальные идеи дизайна?</a></p>
             <p><a href="https://veonix.ru/blog/kak-dizajn-vliyaet-na-vybor-pokupatelya/">Как дизайн влияет на выбор покупателя?</a></p>
             <p><a href="https://veonix.ru/blog/pochemu-nuzhno-sozdavat-unikalnyj-dizajn-a-ne-kopirovat-udachnye-resheniya-2/">Почему нужно создавать уникальный дизайн, а не копировать удачные решения?</a></p>
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
       "TYPE_TEXT" => "Открытка, Годовой отчет, Коммерческое предложение, Визитка, Листовка,  Каталог, Буклет, Брошюра, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>