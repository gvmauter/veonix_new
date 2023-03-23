<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Создание креативного дизайна флаеров на заказ в Москве. Эффективная реклама по выгодной цене. Разработка дизайна полиграфической продукции от студии Veonix.");
$APPLICATION->SetPageProperty("title", "Дизайн флаера в студии Veonix – цена разработки 10 000 руб.");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн флаеров");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/flaery.css");   

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Цена",
		"TEMPLATE_FOR_TITLE2" => "дизайна флаера",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Мы создаем яркие и лаконичные флаеры, которые позволяют делать эффективную рекламу даже при ограниченном бюджете",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

 
<div class="old_page">
<section class="fl_b6">
	<div class="main">
		<p class="fl_zag">Почему нам доверяют важные<br>
			и ответственные проекты?</p>
		<div class="box1_fl_b6">
			<div class="box1_fl_b6_item">
				<div class="box1_fl_b6_item_tx ds-b3-box-right">
					<p>500 <i>+</i></p>
				</div>
				<p class="box1_fl_b6_item_tx2">проектов разработала<br>
					наша команда </p>
			</div>
			<div class="box1_fl_b6_item">
				<div class="box1_fl_b6_item_tx ds-b3-box-right">
					<p>5000 <i>+</i></p>
				</div>
				<p class="box1_fl_b6_item_tx2">экземпляров флаеров<br> 
					отпечатано с наших макетов
					</p>
			</div>
			<div class="box1_fl_b6_item">
				<div class="box1_fl_b6_item_tx ds-b3-box-right">
					<p>70 <i>%</i></p>
				</div>	
				<p class="box1_fl_b6_item_tx2">заказчиков обращаются<br> 
					снова и советуют нас друзьям </p>
			</div>
		</div>
	</div>
</section>
<section class="fl_b1">
	<div class="main">
		<p class="fl_zag">Грамотный дизайн флайера –<br> 
			гарантированный успех вашей<br> 
			рекламы</p>
		<div class="box1_fl_b1">
			<div class="box1_fl_b1_img" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b1_1.png" alt="Флайера">
			</div>
			<div class="box1_fl_b1_text">
				<p>Флаеры – недорогой и эффективный инструмент
					продвижения. Особенно если вы выводите на рынок
					новый товар или услугу, стараетесь привлечь
					покупателей акцией или скидками. </p>
				<p>Вам необходимо, чтобы полиграфия действительно
					работала и приносила результаты? Тогда не
					раздумывайте — вам стоит заказать дизайн флаеров
					в Veonix. Ведь мы делаем работу так, чтобы покупателю
					захотелось пойти навстречу вашему рекламному
					предложению.
					</p>
			</div>
		</div>
		<div class="box2_fl_b1">
			<div class="box2_fl_b1_item">
				<p class="box2_fl_b1_item_tx1">01</p>
				<p class="box2_fl_b1_item_tx2"><span style="font-weight: 600;">Попадаем</span><br> 
					точно в цель</p>
				<p class="box2_fl_b1_item_tx3">Делаем дизайн для тех, кто действительно нужен — ваших потенциальных клиентов  </p>
			</div>
			<div class="box2_fl_b1_item">
				<p class="box2_fl_b1_item_tx1">02</p>
				<p class="box2_fl_b1_item_tx2"><span style="font-weight: 600;">Не используем</span><br> 
					шаблоны</p>
				<p class="box2_fl_b1_item_tx3">Делаем яркий и оригинальный дизайн, который выгодно<br> 
					выделяет флаер среди других
					</p>
			</div>
			<div class="box2_fl_b1_item">
				<p class="box2_fl_b1_item_tx1">03</p>
				<p class="box2_fl_b1_item_tx2"><span style="font-weight: 600;">Пишем</span><br>
					продающий текст</p>
				<p class="box2_fl_b1_item_tx3">Убедительно доносим до клиентов главное и не перегружаем лишней информацией</p>
			</div>
		</div>
	</div>
</section>
<section class="fl_b3">
	<div class="main">
		<div class="box1_fl_b3">
			<div class="ds-bg-zg ds-bg-1">
				<p>Сколько стоит дизайн флаеров?</p>
			</div>
		</div>
		<p class="fl_b3_tx">Наша студия предлагает самый высокий уровень оформления. Несмотря на это,<br> 
			цена дизайна флаеров <span style="font-weight: 600;">в Veonix</span> по карману любому заказчику.</p>
		<div class="main-970">
			<div class="box2_fl_b3">
				<div class="box2_fl_b3_item">
					<p class="box2_fl_b3_item_tx1">Разработка дизайна / макет</p>
					<div class="box2_fl_b3_item_tx2 ds-b3-box-right">
						<p>от 10 000 <i></i></p>
					</div>
				</div>
				<div class="box2_fl_b3_item">
					<p class="box2_fl_b3_item_tx1">Продающий текст для флаера</p>
					<div class="box2_fl_b3_item_tx2 ds-b3-box-right">
						<p>от 10 000 <i></i></p>
					</div>
				</div>
			</div>
			<p class="fl_b3_tx2">У вашей компании уже есть брендбук? Тогда мы разработаем для вас дизайн <span style="font-weight: 600;">со скидкой 20%.</span></p>
			<p class="fl_b3_tx2">Вам необходим двусторонний дизайн флаера? В этом случае <span style="font-weight: 600;">напишем текст бесплатно</span></p>
		</div>
	</div>
</section>
<section class="fl_box_form">
	<div class="main">
		<div class="main-970">
			<p class="ds-form-box-t1">Хотите, мы рассчитаем точную стоимость<br> 
				вашего проекта?</p>
			<p class="ds-form-box-t2">Оставьте заявку, и менеджер свяжется<br> 
				с вами в ближайшее время</p>
			<a class="sbm bt " href="#order" data-fancybox data-text = "Флаера - Хотите, мы рассчитаем точную стоимость вашего проекта - Флаеры" >ЗАКАЗАТЬ ЗВОНОК</a>
		</div>
	</div>
</section>
<section class="fl_b2">
	<div class="main">
		<div class="box1_fl_b2">
			<div class="ds-bg-zg ds-bg-1">
				<p>Какой дизайн флаеров мы делаем</p>
			</div>
		</div>
		<div class="box2_fl_b2">
			<div class="box2_fl_b2_column" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_1.jpg" alt="Флаеры">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_2.jpg" alt="Флаеры">
			</div>
			<div class="box2_fl_b2_column" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_3.jpg" alt="Флаеры">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_4.jpg" alt="Флаеры">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_5.jpg" alt="Флаеры">
			</div>
			<div class="box2_fl_b2_column" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_6.jpg" alt="Флаеры">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b2_7.jpg" alt="Флаеры">
			</div>
		</div>
	</div>
</section>
<section class="fl_b4">
	<div class="main">
		<div class="box1_fl_b4">
			<div class="ds-bg-zg ds-bg-1">
				<p>Как мы делаем эффективные флаеры?</p>
			</div>
		</div>
		<div class="box2_fl_b4">
			<div class="box2_fl_b4_text">
				<p><span style="font-weight: 600;">Прежде всего – маркетинговый подход.</span> Мы разрабатываем флаеры для конкретной аудитории, не распыляя усилия и деньги заказчика. В нашей работе все подчинено одной задаче: привлечь максимальное количество покупателей, а не просто сделать красивую листовку.</p>
				<p>Ярким и креативным дизайном мы стараемся быстро заинтересовать клиента и подтолкнуть к покупке.<span style="font-weight: 600;"> Еще важнее – превратить его в потенциального покупателя.</span> Для этого используем целый набор маркетинговых ходов: привлекательный оффер, ограничение по времени и количеству бонусов, накопительные скидки, однозначный посыл к действию. У нас работают опытные специалисты, поэтому мы решаем задачу быстро, укладываясь в самые сжатые сроки <span style="font-weight: 600;">разработки дизайна флаеров.</span></p>
			</div>
			<div class="box2_fl_b4_img" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/flaery/fl_b4_1.png" alt="Флаеры">
			</div>
		</div>
		<p class="fl_b4_tx">В итоге получаем продуманное, эффективное средство продвижения вашего<br>
			товара или услуги. 
		</p>
		<div class="box3_fl_b4 ds-b6-box2-main">
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 1</span>
						<span style="font-weight: 600; margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Подбираем удобный формат.</span> 
						Флаер должен легко помещаться<br> 
						в карман или кошелек, чтобы его<br> 
						хотелось сохранить

					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 2</span>
						<span style="font-weight: 600; margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Привлекаем внимание.</span> 
						Разрабатываем классный дизайн<br> 
						и вызываем интерес броским<br> 
						заголовком
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 3</span>
						<span style="font-weight: 600; margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Делаем эффективное<br> 
						предложение.</span> Выносим на<br> 
						первый план выгоду, от которой<br> 
						клиент не захочет отказаться
					</p>
				</div>
			</div>
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 4</span>
						<span style="font-weight: 600; margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Вызываем желание попробовать.</span> 
						Приводим точные гарантии,<br> 
						подтвержденные фактами и цифрами
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 5</span>
						<span style="font-weight: 600; margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Призываем к действию.</span> 
						И четко объясняем, где, как и когда<br> 
						получить скидку, подарок или бонусы.
					</p>
				</div>
			</div>
		</div>
		<p class="fl_b4_tx1">Мы не только сделаем для вас профессиональный дизайн флайера, но при необходимости<br> 
			поможем напечатать тираж флайеров с максимальным качеством. В нашей партнерской<br> 
			типографии стоимость печати выйдет <span style="font-weight: 600;">на 20% ниже</span> рыночной.</p>
		<p class="fl_b4_tx1"><span style="font-weight: 600;">Если надо, организуем доставку тиража по вашему адресу.</span></p>
	</div>
</section>
<section class="fl_b5">
	<div class="main">
		<div class="box1_fl_b5 box3_lt_b4">
			<p class="box3_lt_b4_tx1">Наши постоянные клиенты:</p>
			<div class="box3_lt_b4-image" itemscope itemtype="https://schema.org/ImageObject">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/lg/37.svg" alt="газпром">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/lg/8.svg" alt="дума">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/lg/14.svg" alt="ситилинк">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/lg/1.svg" alt="beeline">
				<img itemprop="contentUrl" src="/bitrix/templates/veonix/assets/img/old/lg/3.svg" alt="лэтуаль">
			</div>
			<p class="box3_lt_b4_tx2">Смотреть всех клиентов:</p>
			<a class="sbm" href="/customers/">Смотреть</a>
		</div>
		<p class="fl_b5_tx">В нашем активе - успешная разработка дизайна флайеров для крупных компаний<br> 
			с мировым именем, торговых сетей и представителей малого и среднего бизнеса.<br> 
			Причина в том, что каждому новому проекту отдаем все силы и стремимся, чтобы<br> 
			 заказчик получил конкретную отдачу от нашей работы - в виде роста прибыли<br> 
			и потока новых клиентов.</p>
	</div>
</section>
<section class="fl_b7">
	<div class="main">
		<p class="fl_zag">Заказ полиграфии в Veonix –<br> 
			беспроигрышный вариант</p>
		<div class="main-970">
			<div class="box1_fl_b7">
				<div class="box1_fl_b7_item">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 226 384 342" style="enable-background:new 15 226 384 342;" xml:space="preserve"> <g> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M265.118,226H91.162c-0.076,0-0.149,0.008-0.224,0.011 c-0.076,0.003-0.152,0.007-0.227,0.013c-0.282,0.018-0.564,0.049-0.84,0.104c-0.005,0-0.011,0-0.016,0.003 c-0.281,0.055-0.556,0.136-0.827,0.227c-0.07,0.023-0.141,0.049-0.208,0.075c-0.256,0.097-0.509,0.204-0.751,0.329 c-0.016,0.007-0.029,0.013-0.045,0.023c-0.255,0.136-0.498,0.292-0.733,0.459c-0.06,0.045-0.118,0.086-0.178,0.131 c-0.235,0.18-0.462,0.37-0.673,0.582l-69.481,69.479c-0.212,0.212-0.399,0.439-0.58,0.673c-0.044,0.06-0.088,0.12-0.133,0.18 c-0.167,0.237-0.323,0.478-0.459,0.733c-0.011,0.016-0.016,0.031-0.023,0.047c-0.128,0.243-0.235,0.493-0.329,0.749 c-0.026,0.067-0.052,0.138-0.075,0.208c-0.092,0.271-0.172,0.546-0.227,0.827c-0.003,0.005-0.003,0.011-0.003,0.016 c-0.055,0.277-0.086,0.556-0.104,0.84c-0.005,0.075-0.01,0.148-0.013,0.227C15.008,302.01,15,302.086,15,302.162V561.32 c0,3.689,2.991,6.68,6.68,6.68h243.435c3.69,0,6.68-2.991,6.68-6.68V232.68C271.797,228.99,268.807,226,265.118,226L265.118,226z M84.482,248.808v46.674H37.808L84.482,248.808z M258.438,554.641H28.359V308.841h62.802c3.689,0,6.68-2.993,6.68-6.68v-62.802 h160.596V554.641z M258.438,554.641"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M188.518,496.016c0.026,0.267,0.07,0.527,0.128,0.785 c0.011,0.052,0.029,0.107,0.041,0.159c0.05,0.209,0.112,0.415,0.183,0.616c0.021,0.06,0.041,0.118,0.065,0.178 c0.086,0.227,0.185,0.446,0.295,0.66c0.011,0.019,0.015,0.037,0.023,0.055l0.021,0.039c0.008,0.015,0.016,0.029,0.024,0.041 l19.118,36.248c1.156,2.192,3.431,3.564,5.907,3.564c2.479,0,4.755-1.373,5.91-3.564l19.121-36.251 c0.005-0.01,0.011-0.021,0.015-0.031l0.027-0.047c0.01-0.021,0.018-0.041,0.028-0.063c0.108-0.211,0.204-0.427,0.29-0.649 c0.023-0.06,0.044-0.123,0.068-0.183c0.07-0.198,0.13-0.401,0.182-0.611c0.013-0.055,0.029-0.11,0.042-0.164 c0.057-0.256,0.102-0.516,0.128-0.783c0.003-0.018,0.003-0.039,0.003-0.057c0.018-0.2,0.031-0.401,0.031-0.608v-54.528 c0-3.689-2.99-6.68-6.68-6.68c-3.69,0-6.68,2.99-6.68,6.68v47.849h-24.965V339.534h24.965v47.851c0,3.69,2.99,6.68,6.68,6.68 c3.689,0,6.68-2.99,6.68-6.68v-88.827c0-3.687-2.99-6.68-6.68-6.68h-38.325c-3.69,0-6.68,2.992-6.68,6.68V495.35 c0,0.206,0.01,0.407,0.029,0.608C188.516,495.98,188.516,495.998,188.518,496.016L188.518,496.016z M222.415,502.03l-8.089,15.335 l-8.086-15.335H222.415z M201.844,305.24h24.965v20.937h-24.965V305.24z M201.844,305.24"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M81.797,343.983c-3.689,0-6.68,2.99-6.68,6.68c0,3.687,2.99,6.68,6.68,6.68 h53.25c3.689,0,6.68-2.993,6.68-6.68c0-3.69-2.991-6.68-6.68-6.68H81.797z M81.797,343.983"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M48.064,380.053c0,3.689,2.991,6.68,6.68,6.68h107.355 c3.689,0,6.68-2.991,6.68-6.68c0-3.687-2.99-6.68-6.68-6.68H54.744C51.055,373.373,48.064,376.363,48.064,380.053L48.064,380.053z M48.064,380.053"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M162.099,402.767H54.744c-3.689,0-6.68,2.99-6.68,6.68 c0,3.689,2.991,6.68,6.68,6.68h107.355c3.689,0,6.68-2.991,6.68-6.68C168.779,405.756,165.789,402.767,162.099,402.767 L162.099,402.767z M162.099,402.767"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M162.099,432.16H54.744c-3.689,0-6.68,2.99-6.68,6.68 c0,3.687,2.991,6.68,6.68,6.68h107.355c3.689,0,6.68-2.993,6.68-6.68C168.779,435.15,165.789,432.16,162.099,432.16L162.099,432.16 z M162.099,432.16"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M162.099,461.553H54.744c-3.689,0-6.68,2.99-6.68,6.68 c0,3.687,2.991,6.68,6.68,6.68h107.355c3.689,0,6.68-2.993,6.68-6.68C168.779,464.543,165.789,461.553,162.099,461.553 L162.099,461.553z M162.099,461.553"></path> <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M233.489,407.424c-3.679,0-6.68,3.001-6.68,6.68 c0,3.679,3.001,6.68,6.68,6.68c3.679,0,6.68-3.001,6.68-6.68C240.168,410.425,237.168,407.424,233.489,407.424L233.489,407.424z M233.489,407.424"></path> </g> </svg>
					<p class="box1_fl_b7_item_tx1">01</p>
					<p class="box1_fl_b7_item_tx2">Заключаем договор</p>
					<p class="box1_fl_b7_item_tx3">Несем полную ответственность за качество своей работы</p>
				</div>
				<div class="box1_fl_b7_item">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 226 384 342" style="enable-background:new 15 226 384 342;" xml:space="preserve"> <g> <path style="fill:#1A1413;" d="M66.796,526.165c-1.746,0-3.46,0.709-4.695,1.945c-1.235,1.236-1.946,2.948-1.946,4.695 c0,1.747,0.71,3.46,1.946,4.694c1.235,1.235,2.948,1.946,4.695,1.946c1.746,0,3.46-0.711,4.694-1.946 c1.235-1.235,1.946-2.948,1.946-4.694c0-1.747-0.711-3.46-1.946-4.695C70.256,526.874,68.543,526.165,66.796,526.165 L66.796,526.165z"></path> <path style="fill:#1A1413;" d="M322.102,345.54c-1.747,0-3.46,0.71-4.695,1.946c-1.235,1.235-1.945,2.949-1.945,4.695 s0.71,3.46,1.945,4.694c1.235,1.235,2.949,1.946,4.695,1.946c1.753,0,3.46-0.711,4.695-1.946c1.241-1.235,1.952-2.948,1.952-4.694 s-0.711-3.46-1.952-4.695C325.561,346.249,323.855,345.54,322.102,345.54L322.102,345.54z"></path> <path style="fill:#1A1413;" d="M266.679,414.504c-10.2,0-18.499-8.299-18.499-18.5c0-10.2,8.299-18.5,18.499-18.5 c10.201,0,18.5,8.3,18.5,18.5C285.179,406.205,276.88,414.504,266.679,414.504L266.679,414.504z M341.718,552.728H294.33 c1.288-2.838,2.011-5.983,2.011-9.297c0-3.314-0.723-6.46-2.011-9.297h2.085c12.45,0,22.578-10.128,22.578-22.578 c0-3.631-0.867-7.062-2.397-10.105c9.56-2.625,16.606-11.388,16.606-21.77c0-5.036-1.659-9.692-4.457-13.451v-84.166 c0-3.667-2.974-6.641-6.641-6.641s-6.64,2.974-6.64,6.641v75.567c-1.561-0.342-3.179-0.528-4.84-0.528h-0.218 c1.288-2.838,2.011-5.983,2.011-9.297c0-12.449-10.129-22.578-22.578-22.578h-10.675c11.335-4.86,19.296-16.128,19.296-29.223 c0-17.524-14.256-31.781-31.781-31.781c-17.524,0-31.78,14.257-31.78,31.781c0,13.095,7.961,24.362,19.296,29.223h-36.301V298.958 c11.863-2.585,21.224-11.945,23.809-23.809h49.953c2.585,11.864,11.945,21.224,23.809,23.809v20.646 c0,3.667,2.973,6.641,6.64,6.641s6.641-2.974,6.641-6.641v-26.575c0-3.667-2.974-6.64-6.641-6.64 c-9.859,0-17.88-8.021-17.88-17.881c0-3.667-2.974-6.641-6.641-6.641h-61.809c-3.667,0-6.641,2.974-6.641,6.641 c0,9.859-8.021,17.881-17.88,17.881c-3.667,0-6.641,2.974-6.641,6.64v132.198H191.64V239.289l150.079-0.007L341.718,552.728 L341.718,552.728L341.718,552.728z M147.895,552.728c-4.878,0-9.588-1.765-13.265-4.971l-16.037-13.987v-91.847l28.992-28.992 l5.258,20.573c0.752,2.94,3.399,4.996,6.433,4.996l130.561,0.008c5.127,0,9.297,4.17,9.297,9.297c0,5.126-4.17,9.296-9.297,9.296 h-66.899c-3.667,0-6.641,2.974-6.641,6.641c0,3.667,2.974,6.641,6.641,6.641h87.685c5.127,0,9.296,4.17,9.296,9.296 c0,5.127-4.17,9.297-9.296,9.297h-87.685c-3.667,0-6.641,2.974-6.641,6.641c0,3.667,2.974,6.64,6.641,6.64h73.476 c5.127,0,9.297,4.17,9.297,9.297s-4.17,9.297-9.297,9.297h-73.476c-3.667,0-6.641,2.974-6.641,6.64 c0,3.667,2.974,6.641,6.641,6.641h50.824c5.127,0,9.297,4.17,9.297,9.297c0,5.127-4.17,9.297-9.297,9.297L147.895,552.728 L147.895,552.728L147.895,552.728z M98.671,552.728h-63.75c-3.662,0-6.641-2.979-6.641-6.641V437.845 c0-3.662,2.979-6.641,6.641-6.641h25.234v76.499c0,3.667,2.974,6.641,6.641,6.641c3.667,0,6.641-2.974,6.641-6.641v-76.499h25.234 c3.662,0,6.641,2.979,6.641,6.641v108.242C105.312,549.748,102.333,552.728,98.671,552.728L98.671,552.728z M178.359,265.39v24.608 l-4.451,1.193c-1.702,0.456-3.152,1.568-4.032,3.094c-0.881,1.525-1.12,3.338-0.663,5.039c2.552,9.524-3.12,19.347-12.643,21.899 c-1.703,0.457-3.156,1.571-4.036,3.1c-0.88,1.528-1.117,3.344-0.657,5.046l25.885,95.852h-13.328l-6.868-26.871 c-0.218-0.855-0.601-1.644-1.113-2.329l-31.19-116.403L178.359,265.39L178.359,265.39z M178.359,376.487l-12.112-44.849 c5.059-2.612,9.2-6.521,12.112-11.187V376.487L178.359,376.487z M353.055,227.945c-1.246-1.245-2.935-1.945-4.697-1.945 l-163.359,0.009c-3.667,0-6.64,2.974-6.64,6.641v18.991l-62.947,16.867c-3.543,0.95-5.645,4.591-4.696,8.133l32.624,121.754 l-28.223,28.223c-3.592-5.244-9.623-8.693-16.445-8.693h-63.75c-10.985,0-19.922,8.937-19.922,19.922v108.242 c0,10.985,8.937,19.922,19.922,19.922h63.75c9.332,0,17.183-6.452,19.335-15.128l7.896,6.885 c6.096,5.315,13.905,8.242,21.993,8.242h200.464c3.667,0,6.641-2.974,6.641-6.641V232.641 C354.999,230.88,354.3,229.19,353.055,227.945L353.055,227.945z"></path> </g> </svg>
					<p class="box1_fl_b7_item_tx1">02</p>
					<p class="box1_fl_b7_item_tx2">Возвращаем деньги</p>
					<p class="box1_fl_b7_item_tx3">Если вас не устроил результат </p>
				</div>
				<div class="box1_fl_b7_item">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 226 384 342" style="enable-background:new 15 226 384 342;" xml:space="preserve"> <g> <path d="M310.82,265.609h-0.043c-4.14,0-7.48,3.36-7.48,7.5c0,4.145,3.379,7.5,7.523,7.5c4.141,0,7.5-3.355,7.5-7.5 C318.32,268.969,314.961,265.609,310.82,265.609L310.82,265.609z M310.82,265.609"></path> <path d="M346.281,265.609h-0.043c-4.14,0-7.48,3.36-7.48,7.5c0,4.145,3.379,7.5,7.523,7.5c4.141,0,7.5-3.355,7.5-7.5 C353.781,268.969,350.422,265.609,346.281,265.609L346.281,265.609z M346.281,265.609"></path> <path d="M275.34,265.609h-0.043c-4.145,0-7.481,3.36-7.481,7.5c0,4.145,3.379,7.5,7.524,7.5c4.14,0,7.5-3.355,7.5-7.5 C282.84,268.969,279.48,265.609,275.34,265.609L275.34,265.609z M275.34,265.609"></path> <path d="M189.684,265.609H67.695c-4.14,0-7.5,3.36-7.5,7.5c0,4.145,3.36,7.5,7.5,7.5h121.989c4.144,0,7.5-3.355,7.5-7.5 C197.184,268.969,193.828,265.609,189.684,265.609L189.684,265.609z M189.684,265.609"></path> <path d="M363.098,226.219H50.883c-19.785,0-35.883,16.066-35.883,35.82v269.902c0,19.762,16.098,35.84,35.883,35.84h312.215 c19.797,0,35.902-16.078,35.902-35.84v-77.574c0-4.14-3.359-7.5-7.5-7.5c-4.141,0-7.5,3.36-7.5,7.5v77.574 c0,11.493-9.375,20.84-20.902,20.84h-32.426V449c0-0.852-0.145-1.699-0.43-2.504l-35.398-99.906 c-1.059-2.996-3.891-4.996-7.071-4.996c-3.175,0-6.007,2-7.07,4.996l-35.375,99.906c-0.281,0.805-0.43,1.652-0.43,2.504v103.781 h-78.519v-28.23h0.687c7.911,0,14.344-6.059,14.344-13.504v-22.492c5.965-3.547,10.195-9.043,12.352-16.16 c6.5-21.442-6.789-53.301-22.848-75.368c-9.785-13.433-8.625-27.972-7.859-37.589c0.562-7.047,1.093-13.704-4.805-16.946 c-6.16-3.383-12.676,0.906-21.215,7.34c-18.597,14.039-30.844,28.34-40.941,47.824c-14.719,28.442-19.891,67.84,2.203,89.508 v23.883c0,7.445,6.433,13.504,14.344,13.504h0.707v28.23H50.883c-11.516,0-20.883-9.347-20.883-20.84V320.023h354v67.145 c0,4.141,3.359,7.5,7.5,7.5c4.141,0,7.5-3.359,7.5-7.5V262.039C399,242.285,382.895,226.219,363.098,226.219L363.098,226.219z M315.672,552.781h-20.399V456.5h20.399V552.781z M287.777,371.559l8.961,25.293H278.82L287.777,371.559z M273.512,411.852h28.543 l10.504,29.652h-49.547L273.512,411.852z M259.898,456.5h20.375v96.281h-20.375V456.5z M151.379,552.781h-23.031v-28.23h23.031 V552.781z M108.707,476.352c-15.797-15.743-11.84-47.559,0.707-71.797c9.117-17.594,19.738-29.981,36.652-42.746 c0.672-0.508,1.293-0.969,1.864-1.387c-0.84,11.258-1.375,28.64,10.859,45.433c15.883,21.829,24.746,48.567,20.617,62.188 c-1.226,4.043-3.476,6.703-7.008,8.312h-63.691V476.352z M113.293,509.547v-18.195h53.117v18.199L113.293,509.547z M384,305.023H30 v-42.984c0-11.48,9.367-20.82,20.883-20.82h312.215c11.527,0,20.902,9.34,20.902,20.82V305.023z M384,305.023"></path> <path d="M391.5,413.27c-4.141,0-7.5,3.355-7.5,7.5v0.042c0,4.141,3.359,7.477,7.5,7.477c4.141,0,7.5-3.379,7.5-7.519 C399,416.625,395.641,413.27,391.5,413.27L391.5,413.27z M391.5,413.27"></path> </g> </svg>
					<p class="box1_fl_b7_item_tx1">03</p>
					<p class="box1_fl_b7_item_tx2">Бесплатно вносим<br>
						правки</p>
					<p class="box1_fl_b7_item_tx3">На протяжении месяца после<br>
						сдачи заказа </p>
				</div>
				<div class="box1_fl_b7_item">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 226 384 342" style="enable-background:new 15 226 384 342;" xml:space="preserve"> <g> <path d="M366.467,314.937h-42.862v-36.433c0-1.971-0.803-3.757-2.093-5.051l-45.007-45.003c-1.29-1.294-3.076-2.093-5.051-2.093 H72.149c-3.945,0-7.144,3.199-7.144,7.144v81.436H22.144c-3.945,0-7.144,3.199-7.144,7.144v162.877 c0,3.945,3.199,7.144,7.144,7.144h42.862v67.864c0,3.945,3.199,7.144,7.144,7.144h244.313c3.945,0,7.144-3.199,7.144-7.144v-67.864 h42.862c3.945,0,7.144-3.199,7.144-7.144V322.081C373.611,318.135,370.412,314.937,366.467,314.937L366.467,314.937z M278.598,250.745l20.615,20.615h-20.615V250.745z M79.292,240.644h185.018v37.859c0,3.945,3.199,7.144,7.144,7.144h37.864v29.29 H79.292V240.644z M309.318,552.822H79.292V447.094h230.026V552.822z M359.323,477.814h-35.718V439.95 c0-3.945-3.199-7.144-7.144-7.144H72.149c-3.945,0-7.144,3.199-7.144,7.144v37.864H29.287v-148.59h330.036V477.814z M359.323,477.814"></path> <path d="M299.314,422.806h17.148c3.945,0,7.144-3.199,7.144-7.144c0-3.945-3.199-7.144-7.144-7.144h-17.148 c-3.945,0-7.144,3.199-7.144,7.144C292.17,419.608,295.369,422.806,299.314,422.806L299.314,422.806z M299.314,422.806"></path> <path d="M65.005,415.663c0,3.945,3.199,7.144,7.144,7.144h194.308c3.945,0,7.144-3.199,7.144-7.144 c0-3.945-3.199-7.144-7.144-7.144H72.149C68.204,408.519,65.005,411.718,65.005,415.663L65.005,415.663z M65.005,415.663"></path> <path d="M66.436,390.66c13.784,0,25.003-11.218,25.003-25.003c0-13.785-11.218-25.003-25.003-25.003 c-13.789,0-25.003,11.217-25.003,25.003C41.433,379.442,52.647,390.66,66.436,390.66L66.436,390.66z M66.436,354.942 c5.909,0,10.715,4.807,10.715,10.715c0,5.909-4.807,10.715-10.715,10.715c-5.91,0-10.715-4.807-10.715-10.715 C55.72,359.749,60.526,354.942,66.436,354.942L66.436,354.942z M66.436,354.942"></path> <path d="M124.295,386.373c11.424,0,20.72-9.292,20.72-20.716c0-11.423-9.297-20.716-20.72-20.716s-20.716,9.292-20.716,20.716 C103.58,377.081,112.872,386.373,124.295,386.373L124.295,386.373z M124.295,359.229c3.548,0,6.433,2.884,6.433,6.428 c0,3.544-2.885,6.428-6.433,6.428c-3.543,0-6.428-2.884-6.428-6.428C117.867,362.113,120.752,359.229,124.295,359.229 L124.295,359.229z M124.295,359.229"></path> <path d="M115.01,484.242h140.731c3.945,0,7.144-3.199,7.144-7.144s-3.199-7.144-7.144-7.144H115.01 c-3.945,0-7.144,3.199-7.144,7.144S111.065,484.242,115.01,484.242L115.01,484.242z M115.01,484.242"></path> <path d="M115.01,515.673h140.731c3.945,0,7.144-3.199,7.144-7.144c0-3.945-3.199-7.144-7.144-7.144H115.01 c-3.945,0-7.144,3.199-7.144,7.144C107.867,512.475,111.065,515.673,115.01,515.673L115.01,515.673z M115.01,515.673"></path> </g> </svg>
					<p class="box1_fl_b7_item_tx1">04</p>
					<p class="box1_fl_b7_item_tx2">Перепечатаем тираж</p>
					<p class="box1_fl_b7_item_tx3">Если в дизайн-макете допущены ошибки или неточности по нашей вине</p>
				</div>
			</div>
			<div class="box2_fl_b7">
				<p class="box2_fl_b7_tx">Мы много лет делаем дизайн флаеров для бизнеса и поэтому не советуем вам заказывать макет у случайных разработчиков. <span style="font-weight: 600;">Такая задача требует глубокого погружения и усилий целой команды профессионалов</span> – маркетологов, копирайтеров, дизайнеров, верстальщиков. </p>
				<p class="box2_fl_b7_tx">Иначе вы получаете скучные тексты, безвкусное оформление и совершенно невнятное предложение к покупателю. <span style="font-weight: 600;">Такая реклама не работает,</span> а отпечатанный тираж со временем окажется в мусорных корзинах. </p>
				<p class="box2_fl_b7_tx"><span style="font-weight: 600;">Студия Veonix работает на результат.</span> Закончив очередной проект, мы обязательно берем обратную связь, отслеживаем конверсию наших флаеров. И знаем, что они привлекают клиентов максимально эффективно. </p>
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
<section class="fl_b8">
	<div class="main">
		<div class="box1_fl_b8">
			<div class="ds-bg-zg ds-bg-1">
				<p>Схема работы с заказчиком</p>
			</div>
		</div>
		<div class="box2_fl_b8 ds-b6-box2-main">
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 1</span>
						<span style="font-weight: 600;    margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Заявка от клиента.</span>
						Мы перезвоним и согласуем<br> 
						все детали

					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 2</span>
						<span style="font-weight: 600;    margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Официальный договор.</span> 
						Прописываем ваши гарантии и<br> 
						нашу ответственность за<br>
						качество работы.
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 3</span>
						<span style="font-weight: 600;    margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Маркетинговый разбор.</span> 
						Вместе с вами определяем<br> 
						основную цель, аудиторию и<br> 
						главный посыл к покупателям.
					</p>
				</div>
			</div>
			<div class="ds-b6-box2-main-colum">
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 4</span>
						<span style="font-weight: 600;    margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Бриф на дизайн.</span>
						Опишите пожелания к оформлению<br> 
						флаера, опираясь на наши наводящие<br> 
						вопросы. 
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 5</span>
						<span style="font-weight: 600;    margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Разработка макета.</span> 
						Уже через 4 часа мы отправим вам<br> 
						эскиз будущего флаера, и вы при<br> 
						необходимости внесете правки.
					</p>
				</div>
				<div class="ds-b6-box2-main-item">
					<p>
						<span>Шаг 6</span>
						<span style="font-weight: 600;margin-bottom:0;color: #ffffff; font-size: 20px; line-height: 28px;">Доработка проекта.</span> 
						Передаем вам готовый макет флаера<br> 
						или сами отправляем его в типографию<br> 
						по вашему желанию.
					</p>
				</div>
			</div>
		</div>
		<p class="fl_b8_tx"><span style="font-weight: 600;">Главное преимущество студии Veonix</span> не только в высококлассных специалистах. Все эти годы мы придерживаемся главного правила – работать с клиентом на принципах взаимного уважения и доверия. Обращаясь к нам, вы можете быть уверены не только в качестве работы. <span style="font-weight: 600;">Мы сделаем все возможное, чтобы результаты превзошли ваши ожидания.</span> </p>
	</div>
</section>
</div>



 
<section class="poleznaya flaer_polz">
    <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
        <p><a href="https://veonix.ru/blog/prezentaciya-uslug/">Презентация услуг</a></p>
        <p><a href="https://veonix.ru/blog/brend-i-torgovaya-marka-ne-odno-i-tozhe/">Бренд и торговая марка не одно и тоже?</a></p>
        <p><a href="https://veonix.ru/blog/kak-dizajn-vliyaet-na-vybor-pokupatelya/">Как дизайн влияет на выбор покупателя?</a></p>
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
		"TYPE_TEXT" => "Флаер, Коммерческое предложение, Визитка, Листовка, Годовой отчет, Каталог, Буклет, Брошюра, Прессвол, Roll Up, Другое"
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
              "PARENT_SECTION" => "16",
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