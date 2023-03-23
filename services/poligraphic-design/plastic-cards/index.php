<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать профессиональный дизайн пластиковых карт. Создадим креативный дизайн бонусной карты, дисконтной, клубной, подарочной карты, бейджа или пропуска.");
$APPLICATION->SetPageProperty("title", "Дизайн пластиковой карты в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн пластиковых карт");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");    

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/plastik.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Заказать пластиковую карту со своим",
		"TEMPLATE_FOR_TITLE2" => "   дизайном",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Разработаем продуманный дизайн пластиковой карты, чтобы клиенты чаще покупали ваши товары и пользовались вашими услугами",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

 
 
    
    
   
<div class="old_page">
<section class="pl_b1">
	<div class="main-970">
		<p class="ds-zg">Какой дизайн пластиковых <br>
			карт мы делаем</p>
		<p class="ds-b2-t1">Упоминание о пластиковых карточках в первую очередь наводит на мысль<br>
			о банковском продукте. Но маркетинг давно ушёл вперёд и сегодня<br> вы можете популяризировать свой бизнес, используя намного более<br> разнообразный ассортимент карт:
			 </p>
		<div class="ds-b2-box-1">
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Дисконтная карта</p>
					<p class="ds-b2-box-1-item-t2">Даёт потребителю возможность получить скидку, при соблюдении выгодных для вашего бизнеса правил использования</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img1.jpg" alt="Дисконтная карта"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Бонусная карта</p>
					<p class="ds-b2-box-1-item-t2">Участвует в программе поощрения покупателей, форсирует их активность, побуждает совершать больше покупок </p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img2.jpg" alt="Бонусная карта"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Клубная карта</p>
					<p class="ds-b2-box-1-item-t2">Даёт возможность обладателю чувствовать себя важным гостем, причастным к особой касте клубберов</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img3.jpg" alt="Клубная карта"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Подарочная карта</p>
					<p class="ds-b2-box-1-item-t2">Приходит на помощь тем, кому затруднительно выбрать презент. Преподносится в красивой упаковке с инструкцией по пользованию </p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img4.jpg" alt="Подарочная карта"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Электронный пропуск</p>
					<p class="ds-b2-box-1-item-t2">Упрощает контрольно-пропускной процесс на предприятии, долго служит, выглядит аккуратно и современно</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img5.jpg" alt="Электронный пропуск"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Бейдж</p>
					<p class="ds-b2-box-1-item-t2">Используется для идентификации участников мероприятий высокого уровня. Особенно стильно выглядят в сочетании с брендированными шнурками</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_img6.jpg" alt="Бейдж"></div>
			</div>
		</div>
	</div>
</section>


<section class="pl_b2">
	<div class="main-970">
		<p class="ds-zg">Сколько стоит разработка <br>
			дизайна пластиковых карт</p>
		<div class="pl_b2_box">
			<div class="pl_b2_box_left">
				<p>К дизайну пластика предъявляются не менее высокие требования, чем к любой другой имиджевой полиграфии. Чтобы карта оправдала расходы на её изготовление и давала долгосрочный финансовый результат, разработкой должны заниматься только опытные специалисты.</p>
			</div>
			<div class="pl_b2_box_right ds-b3-box-right">
				<p>от 3 000 <i></i></p>
				<p>одна сторона</p>
			</div>
		</div>
		<div class="pl_b2_box">
			<div class="pl_b2_box_left">
				<p>Предлагаем вам заказать дизайн пластиковых карт премиум класса по выгодной стоимости, с гарантией результата.</p>
			</div>
			<div class="pl_b2_box_right ds-b3-box-right">
				<p>от 10 000 <i></i></p>
				<p>две стороны</p>
			</div>
		</div>
		<p class="pl_b2_line">
			Учитывая небольшую стоимость и быструю окупаемость затрат, с уверенность можно<br> заявить, что это грамотная инвестиция в продвижение вашего бизнеса.
		</p>
	</div>
</section>

<section class="pl_box_form">
	<div class="main">
		<div class="main-970">
			<p class="ds-form-box-t1">Хотите рассчитаем точную<br>
				стоимость вашего заказа? </p>
			<p class="ds-form-box-t2">Подайте заявку и мы перезвоним<br>
				вам в течение 15 минут
			</p>
			<a class="sbm   " href="#form" data-fancybox data-text = "Рассчитаем точную стоимость - Пластиковые карты" >ЗАКАЗАТЬ ЗВОНОК</a>
              
		</div>
	</div>
</section>
<section class="pl_b3">
	<div class="main">
		<div class="box1_pl_b3">
			<div class="ds-bg-zg pl_bg_1">
				<p>Как выбрать бонусную пластиковую карту</p>
			</div>
		</div>
		<div class="box2_pl_b3">
			<p>Бонусная пластиковая карта - популярный маркетинговый инструмент, который удерживает старых клиентов<br>и привлекает новых. Получив её, человек подсознательно чувствует себя "своим", частичкой некоего сообщества.<br>И в тех ситуациях, когда приходится выбирать между двух брендов, он не задумываясь идёт туда, где ему всё знакомо.</p>
			<p><span>Пластиковые карты выгодно работают на ваш бизнес: </span></p>
		</div>
		<div class="pl_b3_box3">
			<div class="pl_b3_box3_item">
				<div class="pl_b3_icon">
					<i class="pl_b3_ic1"></i>
				</div>
				<p>Повышают <br>
					узнаваемость бренда</p>
			</div>
			<div class="pl_b3_box3_item">
				<div class="pl_b3_icon">
					<i class="pl_b3_ic2"></i>
				</div>
				<p>Увеличивают <br>
					клиентскую базу</p>
			</div>
			<div class="pl_b3_box3_item">
				<div class="pl_b3_icon">
					<i class="pl_b3_ic3"></i>
				</div>
				<p>Поднимают  <br>
					уровень лояльности</p>
			</div>
			<div class="pl_b3_box3_item">
				<div class="pl_b3_icon">
					<i class="pl_b3_ic4"></i>
				</div>
				<p>Взвинчивают<br>
					динамику продаж</p>
			</div>
		</div>
		<p class="pl_b2_line">
			Бесспорным преимуществом "пластика" перед любыми другими имиджевыми носителями  является его долговечность<br>
и износостойкость. Благодаря этому клиенты пользуются им длительное время, оставаясь верными вашей марке.

		</p>
	</div>
</section>
 
<section class="pl_b5">
	<div class="main">
		<div class="ds-bg-zg pl_bg_2">
			<p>Выгоды сотрудничества с Veonix</p>
		</div>
	</div>
	<div class="main-970">
		<p class="pl_b5_tx">Разработкой пластиковых карт с индивидуальным дизайном в студии Veonix занимаются только опытные мастера. Это означает, что ваш макет будет отрисован вручную, без помощи шаблонов и малейшего намёка на плагиат. Любая полиграфия, появившаяся на свет в стенах нашей компании, выглядит максимально инфографично и эффектно. </p>
		<div class="pl_b5_box">
			<div class="pl_b5_box-item">
				<p><span class="b">Сроки разработки от 4 часов</span></p>
				<p>Если дизайн требуется в самое ближайшее время, мобилизуем силы и<br> ресурсы на выполнение экспресс задач. Если нужно - работаем в выходные
				</p>
			</div>
			<div class="pl_b5_box-item">
				<p><span class="b">Экономия времени, сил и денег</span></p>
				<p>Вы никогда не услышите претензий третьих лиц по поводу уникальности<br> Работаем только с официальными стоками и создаём картинки вручную</p>
			</div>
			<div class="pl_b5_box-item">
				<p><span class="b">Высший пилотаж без бесконечных доработок</span></p>
				<p>Над вашим проектом трудится мощная команда профессионалов, где<br> каждый на совесть выполняет свой участок работы </p>
			</div>
			<div class="pl_b5_box-item">
				<p><span class="b">Комфортный сервис без срыва сроков</span></p>
				<p>Глубоко вникаем в ваши потребности, говорим на одном языке, уважаем<br> ваше мнение и всегда стараемся найти точку взаимопонимания</p>
			</div>
		</div>
		<p class="pl_b5_tx">Все нюансы проекта и договорённости фиксируем не просто словесно, а с помощью официального договора. Это защищает ваши интересы и гарантирует, что вы вовремя получите продукт, который полностью соответствует ожиданиям.</p>
	</div>
</section>

<section class="pl_b6">
	<div class="main">
		<div class="ds-bg-zg pl_bg_3">
			<p>Нам есть чем гордиться</p>
		</div>
		<div class="pl_b6_box1">
			<div class="pl_b6_box1_item">
				<img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_ic1.png" alt="20">
				<p>Штатных <br>специалистов</p>
				<p>Все сотрудники работают<br>на постоянной основе.<br>Не практикуем временное<br>партнёрство с фрилансерами<br>и использование дешёвого <br>труда новичков  </p>
			</div>
			<div class="pl_b6_box1_item">
				<img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_ic2.png" alt="30">
				<p>Корпораций</p>
				<p>Примерно столько крупных<br>иностранных и отечественных<br>организаций заказывают<br>у нас дизайн постоянно</p>
			</div>
			<div class="pl_b6_box1_item">
				<img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_ic3.png" alt="500">
				<p>Проектов</p>
				<p>Успешно сдали за время<br>работы со стопроцентной<br>попадаемостью в цели<br>заказчика. Именно поэтому<br>около 70% клиентов делает<br>повторный заказ<br></p>
			</div>
			<div class="pl_b6_box1_item">
				<img src="/bitrix/templates/veonix/assets/img/old/plastik/pl_ic4.png" alt="50">
				<p>Тысяч экземпляров<br>полиграфии</p>
				<p>Отпечатано на новейшем<br>и современном оборудовании<br>нашей типографии. Каждая<br>копия вашего заказа выглядит<br>красочно и ярко</p>
			</div>
		</div>
		<p class="pl_b6_tx">Все эти цифры - лишь промежуточный результат работы дизайн-студии Veonix. С каждый днём они растут пропорционально количеству довольных клиентов и росту благосостояния их компаний. Хотите сделать мощный маркетинговый рывок? Нам точно по пути!</p>
	</div>
</section>

<section class="pl_b7">
	<div class="main">
		<div class="ds-bg-zg pl_bg_4">
			<p>Наши гарантии</p>
		</div>
	</div>
	<div class="main-970">
		<div class="pl-b7-box">
			<div class="pl-b7-box-item">
				<p class="pl-b7-t1">Гарантия 01</p>
				<p class="pl-b7-t2">100% авторский контент</p>
				<p class="pl-b7-t3">Создаём дизайн исключительно на лицензионном ПО. Тексты пишут копирайтеры. Картинки покупаем в легальных фотобанках или рисуем сами</p>
			</div>
			<div class="pl-b7-box-item">
				<p class="pl-b7-t1">Гарантия 02</p>
				<p class="pl-b7-t2">Выполнение заказа в срок</p>
				<p class="pl-b7-t3">Ответственно относимся к дедлайнам. За каждый просроченный день теряем процент от гонорара. Без переносов дат и искусственного затягивания</p>
			</div>
			<div class="pl-b7-box-item">
				<p class="pl-b7-t1">Гарантия 03</p>
				<p class="pl-b7-t2">Сохранность данных</p>
				<p class="pl-b7-t3">Конфиденциальная информация, полученная в рамках проекта, никогда не покидает пределы нашего офиса. В портфолио размещаем работу только с вашего разрешения </p>
			</div>
		</div>
	</div>
</section>

<section class="pl_b8">
	<div class="main-970">
		<p class="ds-zg">Простая схема работы</p>
		<p class="pl_b8-t1">Давно хотите разработать дизайн пластиковых карточек, но нет понимания, как и с чего начать реализацию идеи? Не откладывая набирайте номер телефона Veonix. Пожалуй, это и будет самый сложный шаг!
		</p>
		<div class="ds-b6-box2-main">
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 1</span>
						Принимаем ваш заказ. Назначаем<br>
персонального менеджера проекта. <br>
С помощью брифа или интервью <br>
разбираемся с потребностями <br>
и задачами
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 2</span>
						Проводим глубокое маркетинговое<br>
исследование. Анализируем продукт, <br>
рынок, целевую аудиторию. Находим <br>
идеи для мощного УТП
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 3</span>
						Предлагаем несколько концепций<br>
на выбор. Вдумчиво разрабатываем<br>
варианты будущего дизайна<br>
пластиковой карты и высылаем вам <br>
на утверждение
					</p>
				</div>
			</div>
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 4</span>
						Дорабатываем дизайн выбранного<br>
варианта. Делаем его максимально<br>
приближённым к фирменному стилю<br>
Пишем ёмкий и цепляющий текст
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 5</span>
						Присылаем вам готовый дизайн<br>
на утверждение. После внесения<br>
необходимых правок вы получаете <br>
файл с полностью готовым к печати <br>
макетом. 
					</p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="pl_b9">
	<div class="main">
		<div class="ds-bg-zg pl_bg_5">
			<p>Полезные рекомендации</p>
		</div>
	</div>
	<div class="main-970">
		<div class="pl_b9-box">
			<p>Перед тем, как заказать дизайн пластиковой карты, стоит разобраться, какую задачу ей предстоит выполнять. Например, на дисконтные карты продуктовых магазинов или аптек обязательно нужно нанести логотип, продающий слоган, а также указать размер скидки. </p>
			<p>Если магазин один, а не огромная сеть, то можно разместить адрес, схему проезда и режим работы.</p>
			<p>Пластиковые пропуска или бейджи обычно выглядят более сдержанно. На них наносят ФИО владельца и информацию о компании. Если бейдж нужен для участника выставки или конференции, указывается дата и место проведения мероприятия. </p>
			<p>Дизайн пластиковой карточки кафе, ресторанов, фитнес-центров и других ниш, связанных с оказанием сервиса и услуг, должен быть более эмоциональным, напоминать о времяпровождении в этих заведениях.</p>
			<p>Карты для детского мира, цветочного бутика, магазина подарков, ивент-агентства лучше сделать яркими и праздничными. Попадаясь владельцу на глаза, они должны вызывать ощущение праздничной, беззаботной атмосферы. Не лишним будет кратко напомнить, какой товар или услуги предлагаете.</p>
			<p>Цветовая гамма должна соответствовать общему корпоративному стилю и оставлять впечатление миниатюрной копии всего бренда.</p>
			<p>Пластиковая карта легко выполняет двойную функцию: служит в качестве визитки и стимулирует продажи. Но свои задачи она сможет реализовывать на все сто только в том случае, если разработкой её дизайна займутся профессионалы! </p>
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
        <p><a href="/blog/kak-dizajn-vliyaet-na-vybor-pokupatelya/">Как дизайн влияет на выбор покупателя?</a></p>
		<p><a href="/blog/osnovnye-professionalnye-terminy-v-graficheskom-dizajne/">Основные профессиональные термины в графическом дизайне</a></p>
		<p><a href="/blog/pochemu-nuzhno-sozdavat-unikalnyj-dizajn-a-ne-kopirovat-udachnye-resheniya-2/">Почему нужно создавать уникальный дизайн, а не копировать удачные решения?</a></p>
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
       "TYPE_TEXT" => "Пластиковая карта, Коммерческое предложение, Визитка, Листовка, Годовой отчет, Каталог, Буклет, Брошюра, Прессвол, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>