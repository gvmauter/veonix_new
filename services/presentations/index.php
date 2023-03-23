<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Создание презентаций для бизнеса под ключ. Изготовление на заказ в любых форматах: PowerPoint и PDF – по цене 4 000 рублей/слайд. Печать на профессиональном оборудовании. Работаем по Москве и всей России.");
$APPLICATION->SetPageProperty("title", "Презентации на заказ — разработка и создание бизнес-презентации под ключ по низкой цене в студии Veonix");

$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Презентации на заказ").

$APPLICATION->SetTitle("Презентации на заказ — разработка и создание бизнес-презентации под ключ по низкой цене в студии Veonix");

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/prezent.css?1");   
$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/home.js" );

?>

<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => " Разработка презентаций <br>класса  ",
		"TEMPLATE_FOR_TITLE2" => "Ultima",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создать просто презентацию — мало",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "Создать лучшую презентацию — ",
		"TEXT_2_GR" => "бесценно"
	),
	false
);?>

 



  <script type="application/ld+json">






{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Презентация под заказ",
  "image": "/wp-content/themes/veonix/img/old/prezent/b4_img1.png",
 "description": "Создадим профессиональную презентацию с инфографичным дизайном",
 "offers": {
 "@type": "Offer",
 "url": "/zakazat-prezentaciju/",
 "priceCurrency": "RUB",
 "price": "2000",
 "priceValidUntil": "2049-06-24",
 "availability": "https://schema.org/InStock",
 "itemCondition": "https://schema.org/NewCondition"
 },
 "aggregateRating": {
 "@type": "AggregateRating",
 "ratingValue": "100",
 "bestRating": "100",
 "worstRating": "0",
 "ratingCount": "1245"
  }
}
</script>


<section class="portfolio_block portfolio_block_home prezent_page_portf">
    <div class="main">
    <h2 class="home_h2"><b>Билайн, Сибур, Газпром, Госдума</b> <br> 
			и ещё 300+ клиентов  <br>
			заказывают презентации именно у нас</h2>
    <p class="home_service_descript">Хотите знать, почему? Просто посмотрите наши работы</p>
   
      
    </div>
    <div class="portfolio_home">
      <div class="portfolio_home_box">

        
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
    


      </div>

      
      <div class="bt_black_bg">
        <a href="/portfolio/presentations/">
          <span>Посмотреть все кейсы</span>
          <i></i>
        </a>
      </div>
    </div>
  </section>



 

<section class="pr_b1">
	<div class="main">
		
		<p class="pr_zg">Какие презентации мы делаем?</p>
		<div class="pr_b1_box">
			<div class="pr_b1_box_item">
				<div class="pr_b1_box_item_text"><p>Для выступлений</p></div>
				<div class="pr_b1_box_item_img"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b1_img1.jpg" alt="Для выступлений"></div>
			</div>
			<div class="pr_b1_box_item">
				<div class="pr_b1_box_item_text"><p>Для переговоров</p></div>
				<div class="pr_b1_box_item_img"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b1_img2.jpg" alt="Для переговоров"></div>
			</div>
			<div class="pr_b1_box_item">
				<div class="pr_b1_box_item_text"><p>Для отправки клиентам</p></div>
				<div class="pr_b1_box_item_img"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b1_img3.jpg" alt="Для отправки клиентам"></div>
			</div>
			<div class="pr_b1_box_item">
				<div class="pr_b1_box_item_text"><p>Для размещения на сайте <br>или в чат-ботах</p></div>
				<div class="pr_b1_box_item_img"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b1_img4.jpg" alt="Для размещения на сайте или в чат-ботах"></div>
			</div>
		</div>
	</div>
</section>

<div class="banner_action" style=" font-size: 0; background: #ffff; "><img class="alignnone size-full wp-image-4994" src="https://veonix.ru/wp/wp-content/uploads/banner-site.png" alt="" width="100%" /></div>

<section class="pr_b2 white">
	<div class="main">
		<p class="pr_zg">Какие работы мы можем сделать</p>
		<div class="pr_b2_box">
			<div class="pr_b2_box_item"><p>• Написать тексты для слайдов</p></div>
			<div class="pr_b2_box_item"><p>• Подготовить речь для выступления</p></div>
			<div class="pr_b2_box_item"><p>• Разработать креативный дизайн макетов</p></div>
			<div class="pr_b2_box_item"><p>• Анимировать слайды или создать видеоролик из презентации</p></div>
			<div class="pr_b2_box_item"><p>• Провести профессиональную фотосъемку (студийную, выездную, с земли или с воздуха)</p></div>
			<div class="pr_b2_box_item"><p>• Напечатать недорого качественный тираж в нашей круглосуточной типографии</p></div>
			<div class="pr_b2_box_item"><p>• Доставить тираж по Москве до двери в любое время суток </p></div>
		</div>

	</div>
</section>

<section class="pr_b3 white">
	<div class="main">
		<p class="pr_zg">В каких форматах <br>
			мы делаем презентации?</p>
		<div class="pr_b3_box">
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i1.svg" alt="PDF"></div><p>PDF</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i2.svg" alt="Power Point"></div><p>Power Point</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i3.svg" alt="Keynote"></div><p>Keynote</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i4.svg" alt="MP4"></div><p>MP4</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i5.png" alt="Tilda"></div><p>Tilda</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i6.svg" alt="YouTube"></div><p>YouTube</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i7.svg" alt="Illustrator"></div><p>Illustrator</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i8.svg" alt="Photoshop"></div><p>Photoshop</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i9.svg" alt="Indesign"></div><p>Indesign</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i10.svg" alt="Corel Draw"></div><p>Corel Draw</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i11.svg" alt="Prezi"></div><p>Prezi</p></div>
			<div class="pr_b3_box_item"><div class="pr_b3_box_item_logo"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i12.svg" alt="Instagram"></div><p>Instagram</p></div>
		</div>
	</div>
</section>





<section class="pr_b4">
	<div class="main">
		<p class="pr_zg">Из чего состоит профессиональная <br>
			бизнес-презентация?</p>
		<div class="pr_b4_img1">
			<img src="/bitrix/templates/veonix/assets/img/old/prezent/b4_img1.png" class="b4_img1" alt="Из чего состоит профессиональная бизнес-презентация?">
			<div class="pr_b4_item pr_b4_it1"><p>Сильные цепляющие <br>заголовки </p><div class="b4_line"><i></i></div> </div>
			<div class="pr_b4_item pr_b4_it2"><p>Дизайнерские <br>шрифты </p><div class="b4_line"><i></i></div></div>
			<div class="pr_b4_item pr_b4_it3"><p>Убедительные <br>продающие тексты </p><div class="b4_line"><i></i></div></div>
			<div class="pr_b4_item pr_b4_it4"><p>Понятный <br>стильный дизайн  </p><div class="b4_line"><i></i></div></div>
			<div class="pr_b4_item pr_b4_it5"><p>Нешаблонная <br>верстка  </p></div>
			<div class="pr_b4_item pr_b4_it6"><p>Анимация* <br>(дополнительная опция)</p></div>
		</div>
		<div class="pr_b4_img2">
			<img src="/bitrix/templates/veonix/assets/img/old/prezent/b4_img2.png" class="b4_img2" alt="Из чего состоит профессиональная бизнес-презентация?">
			<div class="pr_b4_item pr_b4_it7"><p>Крутая <br>Инфографика </p><div class="b4_line"><i></i></div> </div>
			<div class="pr_b4_item pr_b4_it8"><p>Иллюстрации, <br>выполненные от руки</p><div class="b4_line"><i></i></div> </div>
			<div class="pr_b4_item pr_b4_it9"><p>Лицензионные <br>фотографии </p><div class="b4_line"><i></i></div> </div>
			<div class="pr_b4_item pr_b4_it10"><p>Качественная <br>ретушь </p><div class="b4_line"><i></i></div> </div>
			<div class="pr_b4_item pr_b4_it11"><p>Глубокая <br>маркетинговая проработка </p></div>
			<div class="pr_b4_item pr_b4_it12"><p>Наглядные таблицы <br>и диаграммы</p><div class="b4_line"><i></i></div> </div>
		</div>
	</div>
</section>





<section class="fl_box_form pr_b7">
	<div class="main">
		<div class="main-970">
		<p class="pr_zg">Сколько стоит разработка презентаций?</p>
			<p class="ds-form-box-t1">Хотите узнать точную стоимость своего проекта <br>
				или заказать создание презентации для бизнеса?</p>
			<p class="ds-form-box-t2">Позвоните нам по телефону          <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a>
 <br>
				или подайте заявку на обратный звонок</p>
			<a href="#form" class="button_line" data-fancybox=""  data-text = "Сколько стоит разработка презентаций? - Презентации">
				<span>Оставить заявку</span>
				<i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
			</a>
			 
          
		</div>
	</div>
</section>




<section class="pr_b9">
	<div class="main">
		<p class="pr_zg">Как мы создаём <br>дизайн презентации?</p>
		<div class="pr_b9_box">
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">01</p>
				<p class="pr_b9_box_item_name">Бриф</p>
				<p class="pr_b9_box_item_text">Вы заполняете <br>онлайн-бриф <br>на сайте</p>
			</div>
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">02</p>
				<p class="pr_b9_box_item_name">Концепция</p>
				<p class="pr_b9_box_item_text">Мы делаем концепт <br>дизайна, состоящий <br>из 3-5 слайдов</p>
			</div>
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">03</p>
				<p class="pr_b9_box_item_name">Утверждение</p>
				<p class="pr_b9_box_item_text">Принимаем концепт <br>дизайна или по <br>необходимости <br>дорабатываем его</p>
			</div>
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">04</p>
				<p class="pr_b9_box_item_name">Вёрстка</p>
				<p class="pr_b9_box_item_text">Верстаем весь дизайн <br>по утвержденному <br>концепту</p>
			</div>
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">05</p>
				<p class="pr_b9_box_item_name">Правки</p>
				<p class="pr_b9_box_item_text">Вносим корректировки <br>столько, сколько нужно</p>
			</div>
			<div class="pr_b9_box_item">
				<p class="pr_b9_box_item_number">06</p>
				<p class="pr_b9_box_item_name">Финал</p>
				<p class="pr_b9_box_item_text">Готовим несколько <br>форматов презентации <br>(под печать, рассылку <br>и сами исходники)</p>
			</div>
		</div>
	</div>
</section>

<section class="pr_b10" >
	<div class="main">


		<div class="pr_b10_main">
			<p class="pr_zg">Как мы пишем тексты  <br>
				для презентации?</p>
			<div class="pr_b10_box">
				<div class="pr_b10_box_text">
					<ul>
						<li>Изучаем любые доступные материалы,
						которые могут помочь с написанием текстов
						для слайдов — ваш сайт, старые презентации,
						коммерческие предложения, видеоролики и пр.</li>
						<li>По необходимости проводим с вами онлайн-
						интервью по Skype или Zoom</li>
						<li>Разрабатываем текстовую структуру
						презентации в формате Word</li>
						<li>Вносим правки столько, сколько нужно</li>
						<li>Объём текстов для 1 слайда не ограничен</li>
					</ul>
				</div>
				<div class="pr_b10_box_img">
					<p><span id="element"></span></p>
					<img src="/bitrix/templates/veonix/assets/img/old/prezent/pr_b10_img.jpg" alt="Текст презентации">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pr_b11">
	<div class="main">
		<p class="pr_zg">Заказать бизнес-презентацию <br>
			можно удалённо</p>
		<div class="pr_b11_box">
			<div class="pr_b11_box_ico">
				<svg height="31px" fill="#838383" viewBox="-23 -21 682 682.66669" width="31px" xmlns="http://www.w3.org/2000/svg"><path d="m544.386719 93.007812c-59.875-59.945312-139.503907-92.9726558-224.335938-93.007812-174.804687 0-317.070312 142.261719-317.140625 317.113281-.023437 55.894531 14.578125 110.457031 42.332032 158.550781l-44.992188 164.335938 168.121094-44.101562c46.324218 25.269531 98.476562 38.585937 151.550781 38.601562h.132813c174.785156 0 317.066406-142.273438 317.132812-317.132812.035156-84.742188-32.921875-164.417969-92.800781-224.359376zm-224.335938 487.933594h-.109375c-47.296875-.019531-93.683594-12.730468-134.160156-36.742187l-9.621094-5.714844-99.765625 26.171875 26.628907-97.269531-6.269532-9.972657c-26.386718-41.96875-40.320312-90.476562-40.296875-140.28125.054688-145.332031 118.304688-263.570312 263.699219-263.570312 70.40625.023438 136.589844 27.476562 186.355469 77.300781s77.15625 116.050781 77.132812 186.484375c-.0625 145.34375-118.304687 263.59375-263.59375 263.59375zm144.585938-197.417968c-7.921875-3.96875-46.882813-23.132813-54.148438-25.78125-7.257812-2.644532-12.546875-3.960938-17.824219 3.96875-5.285156 7.929687-20.46875 25.78125-25.09375 31.066406-4.625 5.289062-9.242187 5.953125-17.167968 1.984375-7.925782-3.964844-33.457032-12.335938-63.726563-39.332031-23.554687-21.011719-39.457031-46.960938-44.082031-54.890626-4.617188-7.9375-.039062-11.8125 3.476562-16.171874 8.578126-10.652344 17.167969-21.820313 19.808594-27.105469 2.644532-5.289063 1.320313-9.917969-.664062-13.882813-1.976563-3.964844-17.824219-42.96875-24.425782-58.839844-6.4375-15.445312-12.964843-13.359374-17.832031-13.601562-4.617187-.230469-9.902343-.277344-15.1875-.277344-5.28125 0-13.867187 1.980469-21.132812 9.917969-7.261719 7.933594-27.730469 27.101563-27.730469 66.105469s28.394531 76.683594 32.355469 81.972656c3.960937 5.289062 55.878906 85.328125 135.367187 119.648438 18.90625 8.171874 33.664063 13.042968 45.175782 16.695312 18.984374 6.03125 36.253906 5.179688 49.910156 3.140625 15.226562-2.277344 46.878906-19.171875 53.488281-37.679687 6.601563-18.511719 6.601563-34.375 4.617187-37.683594-1.976562-3.304688-7.261718-5.285156-15.183593-9.253906zm0 0" fill-rule="evenodd"/></svg>
			</div>
			<div class="pr_b11_box_ico">
				<svg fill="#838383" enable-background="new 0 0 24 24" height="27" viewBox="0 0 24 24" width="27" xmlns="http://www.w3.org/2000/svg"><path d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931l3.622-16.972.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693 12.643-7.911c.595-.394 1.136-.176.691.218z"/></svg>			
			</div>
			<p>В процессе работы мы создаём чат в <span style="font-weight: bold;">WhatsApp</span> или <span style="font-weight: bold;">Telegram</span>  <br>
				для оперативного взаимодействия со всей командой.</p>
		</div>
		<div class="pr_b11_box" style=" border: 0; ">
			<div class="pr_b11_box_ico">
				<svg fill="#838383" enable-background="new 0 0 24 24" height="27" viewBox="0 0 24 24" width="27" xmlns="http://www.w3.org/2000/svg"><path d="m23.309 14.547c1.738-7.81-5.104-14.905-13.139-13.543-4.362-2.707-10.17.352-10.17 5.542 0 1.207.333 2.337.912 3.311-1.615 7.828 5.283 14.821 13.311 13.366 5.675 3.001 11.946-2.984 9.086-8.676zm-7.638 4.71c-2.108.867-5.577.872-7.676-.227-2.993-1.596-3.525-5.189-.943-5.189 1.946 0 1.33 2.269 3.295 3.194.902.417 2.841.46 3.968-.3 1.113-.745 1.011-1.917.406-2.477-1.603-1.48-6.19-.892-8.287-3.483-.911-1.124-1.083-3.107.037-4.545 1.952-2.512 7.68-2.665 10.143-.768 2.274 1.76 1.66 4.096-.175 4.096-2.207 0-1.047-2.888-4.61-2.888-2.583 0-3.599 1.837-1.78 2.731 2.466 1.225 8.75.816 8.75 5.603-.005 1.992-1.226 3.477-3.128 4.253z"/></svg>			
			</div>
			<div class="pr_b11_box_ico">
				<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 560.3 560.3"><defs><clipPath id="as"><circle cx="280.1" cy="280.1" r="256.8" fill="none" stroke="#838383" stroke-miterlimit="10"/></clipPath><clipPath id="bs"><path d="M352,249.4l66.8-48.8c5.8-4.8,10.3-3.6,10.3,5.1V354.5c0,9.9-5.5,8.7-10.3,5.1L352,310.9ZM126,206.1v111a45.43,45.43,0,0,0,45.6,45.2H333.4a8.26,8.26,0,0,0,8.3-8.2v-111a45.43,45.43,0,0,0-45.6-45.2H134.3A8.26,8.26,0,0,0,126,206.1Z" fill="#838383" stroke="#838383" stroke-miterlimit="10"/></clipPath></defs><title>del</title><g clip-path="url(#as)"><path d="M10.5,10.5H549.8V549.8H10.5Z" fill="none" stroke="#838383" stroke-miterlimit="10" stroke-width="21"/></g><circle cx="280.1" cy="280.1" r="256.8" fill="none" stroke="#838383" stroke-miterlimit="10"/><circle cx="280.1" cy="280.1" r="256.8" fill="none" stroke="#838383" stroke-miterlimit="10" stroke-width="21"/><path d="M352,249.4l66.8-48.8c5.8-4.8,10.3-3.6,10.3,5.1V354.5c0,9.9-5.5,8.7-10.3,5.1L352,310.9ZM126,206.1v111a45.43,45.43,0,0,0,45.6,45.2H333.4a8.26,8.26,0,0,0,8.3-8.2v-111a45.43,45.43,0,0,0-45.6-45.2H134.3A8.26,8.26,0,0,0,126,206.1Z" fill="#838383"/><g clip-path="url(#bs)"><path d="M113.2,185.1H441.9v190H113.2Z" fill="#838383" stroke="#838383" stroke-miterlimit="10"/></g><path d="M352,249.4l66.8-48.8c5.8-4.8,10.3-3.6,10.3,5.1V354.5c0,9.9-5.5,8.7-10.3,5.1L352,310.9ZM126,206.1v111a45.43,45.43,0,0,0,45.6,45.2H333.4a8.26,8.26,0,0,0,8.3-8.2v-111a45.43,45.43,0,0,0-45.6-45.2H134.3A8.26,8.26,0,0,0,126,206.1Z" fill="none" stroke="#838383" stroke-miterlimit="10"/></svg>
			</div>			
				<p>Сложные рабочие моменты легко и быстро решаются в <span style="font-weight: bold;">Skype</span> <br>
				и <span style="font-weight: bold;">Zoom</span> c помощью демонстрации экрана </p>
		</div>
		<div class="pr_b11_box_1">
			<p>Оригиналы закрывающих документов <br>
				или печатный тираж привозит до двери  <br>
				и бесконтактно передает наш курьер </p>
		</div>
		<div class="pr_b11_box_2">
			<p>Заказать изготовление презентации под ключ можно удалённо, <br>
			но в тоже время вы можете пригласить нашего представителя<br> к вам на встречу, чтобы обсудить проект</p>
			<a href="#form" class="button_line" data-fancybox=""  data-text="Пригласить на встречу - Презентации" >
				<span>пригласить на встречу</span>
				<i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
			</a>
			 
		</div>
	</div>
</section>

<section class="pr_b12">
	<div class="main">
		<p class="pr_zg">Что вы получаете <br>
			по завершении проекта?</p>
		<div class="pr_b12_box">
			<div class="pr_b12_item">
				<p class="pr_b12_item_zg">Презентацию в нескольких <br>
					форматах файлов:</p>
				<div class="pr_b12_item_box">
					<div class="pr_b12_item_box_item">
						<div class="pr_b12_item_box_item_icon"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i1.svg" alt="PDF"></div>
						<p>PDF — для отправки <br>
						клиентам, сжатая без потери <br>
						качества</p>
					</div>
					<div class="pr_b12_item_box_item">
						<div class="pr_b12_item_box_item_icon"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i1.svg" alt="PDF"></div>
						<p>PDF — в максимальном качестве <br>
							без сжатия, подготовленная под печать <br>
							по требованиям типографий</p>
					</div>
					<div class="pr_b12_item_box_item">
						<div class="pr_b12_item_box_item_icon"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b3_i2.svg" alt="Power Point"></div>
						<p>Power Point — для демонстрации <br>
							на экранах с большим разрешением <br>
							и на проекторах </p>
					</div>
				</div>
			</div>
			<div class="pr_b12_item">
				<p class="pr_b12_item_zg">Все рабочие файлы <br>
					и исходники презентации:</p>
				<ul>
					<li>Папка со шрифтами</li>
					<li>Выкупленные индивидуально под <br>
						ваш проект лицензионные фотографии</li>
					<li>Исходные файлы Adobe Illustrator <br>
						и PowerPoint для самостоятельного <br>
						редактирования</li>
					<li>Полные интеллектуальные права <br>
						на проект (по договору)</li>

				</ul>
			</div>
		</div>
	</div>
</section>









<section class="pr_b17">
	<div class="main">
		<div class="ds-bg-zg">
			<p>Какие гарантии</p>
		</div>
		<div class="pr_b17_box">
			<div class="pr_b17_box_item"><p>Делаем до полного утверждения,<br> правки без ограничений</p></div>
			<div class="pr_b17_box_item"><p>Полный возврат предоплаты, <br>если результат не устроит </p></div>
			<div class="pr_b17_box_item"><p>Защита от плагиата — 100% <br>уникальность дизайна и текста</p></div>
			<div class="pr_b17_box_item"><p>Нераспространение <br>конфиденциальной информации</p></div>
			<div class="pr_b17_box_item"><p>Сохранность ваших <br>персональных данных</p></div>
			<div class="pr_b17_box_item"><p>Полная перепечатка тиража, если <br>допущены ошибки по нашей вине <br>или плохое качество печати </p></div>
			<div class="pr_b17_box_item"><p>Если курьер привез тираж на ваше <br>мероприятие не вовремя, делаем <br>полный возврат в двойном размере </p></div>
			<div class="pr_b17_box_item"><p>Бесплатные пожизненные <br>правки ошибок, допущенных <br>по нашей вине</p></div>
			<div class="pr_b17_box_item"><p>Compliance - соблюдение <br>законодательства и внутренних <br>правил вашей компании</p></div>
		</div>
	</div>
</section>

<section class="pr_b18">
	<div class="main">
		<p class="pr_zg">Нам доверяют свои проекты <br>первые лица государства</p>
		<p class="pr_podzg">Оцените и вы преимущества и выгоды <br>сотрудничества с нами</p>
		<ul>
			<li>
				<p class="pr_b18_t1">Экономите нервы и деньги на возможных санкциях <br>
					и претензиях от поисковых систем, конкурентов и авторов.</p>
				<p class="pr_b18_t2">Разработка бизнес презентации осуществляется на лицензионном ПО, все<br> фотографии выкупаются с легальных фотобанков, никакого воровства</p>
			</li>
			<li>
				<p class="pr_b18_t1">Получаете результат с первого раза, без необходимости переделок.</p>
				<p class="pr_b18_t2">Над вашим проектом трудится серьёзная команда штатных талантливых<br> специалистов, собранных по крупицам</p>
			</li>
			<li>
				<p class="pr_b18_t1">Легко достигаете крутых целей, масштабируете бизнес, находите <br>
					новые источники прибыли.</p>
				<p class="pr_b18_t1">Получаете высокотехнологичную презентацию, которая <br>непременно вызывает «ах-эффект» вашей аудитории.</p>
			</li>
			<li>
				<p class="pr_b18_t1">Ваша презентация компании бьёт точечно по потребностям целевой аудитории, которую мы предварительно изучили.</p>
				<p class="pr_b18_t2">Продающие тексты с маркетинговыми проработками и уникальная графика<br> буквально на тактильном уровне убеждают, что соглашаться нужно "здесь<br> и сейчас"</p>
			</li>
			<li>
				<p class="pr_b18_t1">Спокойны за свои деньги, уверены, что работа будет готова <br>
					к оговорённому сроку.</p>
				<p class="pr_b18_t2">Работаем только по договору, который юридически защищает ваши<br> интересы и закрепляет круг наших обязанностей</p>
			</li>
			<li>
				<p class="pr_b18_t1">Ваши ожидания оправданы с избытком.</p>
				<p class="pr_b18_t2">Говорим с вами на одном языке, умеем слушать и слышать, находим<br> взаимопонимание с самыми сложными клиентами и никогда не даём<br> невыполнимых обещаний</p>
			</li>
			<li>
				<p class="pr_b18_t1">Оплачиваете создание бизнес-презентаций любым удобным<br>
					способом, день в день получаете документы для бухгалтерии.</p>
				<p class="pr_b18_t2">Принимаем как наличные, так и оплату на банковскую карту или расчетный<br> счёт.</p>
			</li>
			<li>
				<p class="pr_b18_t1">Достойно выделяетесь на фоне конкурентов, вызываете<br>
					уважение и лояльность аудитории.</p>
				<p class="pr_b18_t2">Предлагаем исключительно авторский дизайн и<br> графику, "живые" и "цепляющие" тексты</p>
			</li>
		</ul>
	</div>
</section>

<section class="pr_b19 white">
	<div class="main">
		<h2 class="pr_zg">Как заказать <br>презентацию компании?</h2>
		<div class="pr_b2_box">
			<div class="pr_b2_box_item"><p>Определиться с целями (кто будет смотреть, что должен <br>
			сделать этот человек по завершении презентации)
			</p></div>
			<div class="pr_b2_box_item"><p>Определиться с формой использования презентации (для печати или рассылки, <br>
			а может быть и то, и то)</p></div>
			<div class="pr_b2_box_item"><p>Определиться с составом работ (нужно ли писать тексты для слайдов, нужна ли печать<br>
			тиража, нужна ли фотосессия и т.д.)</p></div>
			<div class="pr_b2_box_item"><p>Определиться с объемом (сколько слайдов нужно разработать)</p></div>
			<div class="pr_b2_box_item"><p>Подготовить все исходные материалы</p></div>
			<div class="pr_b2_box_item"><p><a href="/brief/">Заполнить бриф</a></p></div>
		</div>

	</div>
</section>

<?
CModule::IncludeModule('iblock');
$team = GetIBlockElement(420, 'uslugi');
$prez = [];
foreach ($team["PROPERTIES"]["PRICE_LIST"]["VALUE"] as &$price) {
    $el = $price["SUB_VALUES"];
	$prez [$el["PRICE_CODE"]["VALUE"]] = $el["PRICE_VALUE"]["VALUE"];
};
 

?>


<section class="pr_b3 white">
	<div class="main">
		<h2 class="pr_zg">Цена разработки презентации </h2>
		<div class="pr_b3_pc_box">
			<div class="pr_b3_pc_box_item">
			<p>Презентация под ключ — </p>
			<p class="pr_b3_pc_box_item_cp"> <span><?=$prez["PREZA_1"];?></span> тыс. руб. / <span>12</span> слайдов </p>
			</div>
 
			<div class="pr_b3_pc_box_item">
			<p>Создание текстов — </p>
			<p class="pr_b3_pc_box_item_cp"> <span><?=$prez["PREZA_3"];?></span> тыс. руб. / слайд </p>
			</div>
			<div class="pr_b3_pc_box_item">
			<p>Верстка — </p>
			<p class="pr_b3_pc_box_item_cp"> <span><?=$prez["PREZA_2"];?></span> тыс. руб. / слайд </p>
			</div>
 
			<div class="pr_b3_pc_box_item">
			<p>Разработка анимации — </p>
			<p class="pr_b3_pc_box_item_cp"> <span><?=$prez["PREZA_6"];?></span> тыс. рублей / слайд </p>
			</div>
			<div class="pr_b3_pc_box_item">
			<p>Подготовка видеопрезентации — </p>
			<p class="pr_b3_pc_box_item_cp"> <span><?=$prez["PREZA_5"];?></span> тыс. рублей / слайд </p>
			</div>

		</div>
	</div>
</section>
<section class="pr_b20 white">
	<div class="main">
		<p class="pr_zg">Нужно ли готовить техническое задание <br>
			на создание презентации?</p>
		<div class="pr_b11_box_1">
			<p>Если вы заказываете изготовление презентации под ключ <br>
				(тексты + дизайн), <span style="font-weight: bold;">то ТЗ готовить не надо.</span></p>
			<p>Просто соберите любые материалы, которые могут <br>
				нам помочь с созданием проекта.</p>
		</div>
		<p class="pr_b20_tx">Остальное мы сделаем сами:</p>
		<div class="pr_b20_box">
			<div class="pr_b20_box_item">
				<div class="pr_b20_box_item_img pr_b20_box_item_img_1"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b20_i1.png" alt="Найдём недостающую информацию"></div>
				<p><span style="font-weight: bold;">Найдём</span> недостающую <br>
					информацию
					</p>
			</div>
			<div class="pr_b20_box_item">
				<div class="pr_b20_box_item_img pr_b20_box_item_img_2"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b20_i2.png" alt="Напишем тексты с ваших слов или с вашего сайта/старой презентации/видео"></div>
				<p><span style="font-weight: bold;">Напишем тексты</span> с ваших слов <br>
					или с вашего сайта/старой <br>
					презентации/видео</p>
			</div>
			<div class="pr_b20_box_item">
				<div class="pr_b20_box_item_img pr_b20_box_item_img_3"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b20_i3.png" alt="Подберем и выкупим  за наш счёт качественные  фотографии"></div>
				<p><span style="font-weight: bold;">Подберем и выкупим</span> <br>
					за наш счёт качественные <br>
					фотографии</p>
			</div>
			<div class="pr_b20_box_item">
				<div class="pr_b20_box_item_img pr_b20_box_item_img_4"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b20_i4.png" alt="Нарисуем дизайн по вашим примерам, брендбуку или брифу"></div>
				<p><span style="font-weight: bold;">Нарисуем дизайн</span><br>
					по вашим примерам,<br>
					брендбуку или брифу</p>
			</div>
			<div class="pr_b20_box_item">
				<div class="pr_b20_box_item_img pr_b20_box_item_img_5"><img src="/bitrix/templates/veonix/assets/img/old/prezent/b20_i5.png" alt="Бесплатно проанализируем  10 ваших конкурентов  и поймём, как нам сделать  лучше ,чем у них"></div>
				<p><span style="font-weight: bold;">Бесплатно проанализируем</span> <br>
					10 ваших конкурентов <br>
					и поймём, как нам сделать <br>
					лучше ,чем у них</p>
			</div>
		</div>
	</div>
</section>

<section class="pr_b21 white">
	<div class="main">
		<p class="pr_zg">Мы принимаем материалы <br>для работы в любом виде:</p>
		<div class="pr_b21_box_1">
			<div class="pr_b21_box_item">
				<div class="pr_b21_box_item_ico"><svg fill="#424246" enable-background="new 0 0 512 512" height="45" viewBox="0 0 512 512" width="49" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m235.04 448.979c-4.172 0-7.988-2.699-9.402-6.615-1.383-3.83-.251-8.214 2.809-10.901 3.271-2.873 8.17-3.279 11.87-.98 3.512 2.182 5.36 6.476 4.51 10.524-.961 4.576-5.098 7.972-9.787 7.972z"/><path d="m486.127 28.381h-291.585c-14.267 0-25.873 11.606-25.873 25.873v111.592h-142.796c-14.267 0-25.873 11.606-25.873 25.873v231.559c0 14.266 11.606 25.872 25.873 25.872h68.306l8.039 27.295c.922 3.13 3.313 5.613 6.406 6.653 1.041.35 2.116.521 3.186.521 2.11 0 4.195-.668 5.938-1.953l44.101-32.534 27.856-.153c5.522-.03 9.975-4.532 9.945-10.055-.03-5.505-4.501-9.945-9.999-9.945h-.056l-31.115.171c-2.118.012-4.178.695-5.882 1.953l-35.229 25.99-6.117-20.769c-1.253-4.254-5.158-7.175-9.593-7.175h-75.786c-3.238 0-5.873-2.634-5.873-5.872v-231.558c0-3.238 2.635-5.873 5.873-5.873h291.586c3.238 0 5.872 2.635 5.872 5.873v231.559c0 3.238-2.634 5.872-5.826 5.872l-37.397-.171h-.047c-5.501 0-9.974 4.447-9.999 9.954-.025 5.523 4.432 10.021 9.954 10.046l37.443.171c14.266 0 25.872-11.606 25.872-25.872v-111.593h6.846l44.076 32.517c1.742 1.285 3.827 1.953 5.938 1.953 1.069 0 2.146-.172 3.187-.521 3.093-1.04 5.483-3.523 6.405-6.653l8.039-27.295h68.306c14.267 0 25.873-11.606 25.873-25.873v-231.559c-.001-14.267-11.607-25.873-25.874-25.873zm5.873 257.431c0 3.238-2.635 5.873-5.873 5.873h-75.785c-4.435 0-8.34 2.921-9.593 7.175l-6.117 20.769-35.229-25.99c-1.719-1.269-3.8-1.953-5.937-1.953h-10.136v-62.899h100.713c5.522 0 10-4.478 10-10s-4.478-10-10-10h-100.712v-17.066c0-2.019-.233-3.986-.672-5.873h101.385c5.522 0 10-4.478 10-10s-4.478-10-10-10h-255.376v-111.594c0-3.238 2.635-5.873 5.873-5.873h291.585c3.238 0 5.873 2.635 5.873 5.873v231.558z"/><path d="m444.044 83.995h-207.42c-5.523 0-10 4.478-10 10s4.477 10 10 10h207.42c5.522 0 10-4.478 10-10s-4.478-10-10-10z"/><path d="m444.044 124.92h-207.42c-5.523 0-10 4.478-10 10s4.477 10 10 10h207.42c5.522 0 10-4.478 10-10s-4.478-10-10-10z"/><path d="m294.313 395.086c1.672-3.446 1.229-7.546-1.144-10.555l-78.507-99.61c-1.896-2.405-4.791-3.81-7.854-3.81s-5.958 1.404-7.854 3.81l-37.904 48.092-25.902-34.054c-1.86-2.446-4.742-3.901-7.815-3.945-3.064-.052-5.996 1.326-7.926 3.719l-69.175 85.709c-2.419 2.997-2.902 7.117-1.241 10.593s5.17 5.688 9.022 5.688h227.301c3.833-.001 7.328-2.19 8.999-5.637zm-167.356-73.862 21.307 28.013-24.815 31.485h-44.512zm21.958 59.498 57.894-73.455 57.894 73.455z"/><path d="m149.308 274.131c-19.241 0-34.894-15.653-34.894-34.894s15.653-34.895 34.894-34.895 34.895 15.653 34.895 34.895c-.001 19.241-15.655 34.894-34.895 34.894zm0-49.788c-8.212 0-14.894 6.682-14.894 14.895 0 8.212 6.682 14.894 14.894 14.894 8.213 0 14.895-6.682 14.895-14.894-.001-8.214-6.682-14.895-14.895-14.895z"/></g></g></svg></div>
				<p>Рукописные<br> сканы<br> и фотографии</p>
			</div>
			<div class="pr_b21_box_item">
				<div class="pr_b21_box_item_ico"><svg fill="#424246" enable-background="new 0 0 512 512" height="39" viewBox="0 0 512 512" width="49" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m318.637 294.378c-5.523 0-10 4.478-10 10v131.49c-33.101-1.582-65.522-10.995-94.356-27.464l-81.294-51.979v-200.85l81.294-51.979c28.832-16.47 61.255-25.883 94.356-27.465v140.11c0 5.522 4.477 10 10 10s10-4.478 10-10v-150.348c0-5.522-4.477-10-10-10-40.108 0-79.703 10.535-114.505 30.468-.141.081-.28.165-.417.253l-83.652 53.486h-110.063c-5.523 0-10 4.478-10 10v211.8c0 5.522 4.477 10 10 10h110.063l83.652 53.486c.137.088.276.172.417.253 34.803 19.933 74.398 30.468 114.505 30.468 5.523 0 10-4.478 10-10v-141.729c0-5.523-4.477-10-10-10zm-298.637-134.278h92.986v191.8h-92.986z"/><path d="m383.939 181.586c-3.904 3.906-3.901 10.238.005 14.142 16.375 16.363 25.392 38.133 25.392 61.298 0 22.206-8.387 43.321-23.615 59.457-3.791 4.016-3.608 10.345.409 14.136 1.932 1.823 4.399 2.728 6.862 2.728 2.656 0 5.307-1.052 7.274-3.137 18.746-19.861 29.07-45.853 29.07-73.184 0-28.51-11.1-55.304-31.255-75.444-3.905-3.904-10.237-3.902-14.142.004z"/><path d="m452.213 113.718c-3.904-3.908-10.236-3.909-14.142-.003-3.906 3.904-3.907 10.236-.002 14.143 34.778 34.79 53.931 81.029 53.931 130.2 0 47.161-17.809 92.013-50.147 126.293-3.79 4.018-3.605 10.347.413 14.137 3.964 3.739 10.398 3.549 14.136-.412 35.852-38.009 55.598-87.734 55.598-140.018 0-54.512-21.232-105.774-59.787-144.34z"/><path d="m327.87 255.52c-2.096-5.028-8.018-7.499-13.06-5.41-5.034 2.086-7.488 8.029-5.41 13.061 2.08 5.036 8.031 7.492 13.06 5.41 5.051-2.092 7.476-8.016 5.41-13.061z"/></g></g></svg></div>
				<p>Аудио<br> и видео<br> сообщения </p>
			</div>
			<div class="pr_b21_box_item">
				<div class="pr_b21_box_item_ico"><svg fill="#424246" version="1.1"  width="45" height="49" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g> <path d="M236,226c-5.52,0-10,4.48-10,10s4.48,10,10,10s10-4.48,10-10S241.52,226,236,226z"/> </g> </g> <g> <g> <path d="M226,266c-5.52,0-10,4.48-10,10c0,5.52,4.48,10,10,10s10-4.48,10-10C236,270.48,231.52,266,226,266z"/> </g> </g> <g> <g> <path d="M216,306c-5.52,0-10,4.48-10,10c0,5.52,4.48,10,10,10s10-4.48,10-10C226,310.48,221.52,306,216,306z"/> </g> </g> <g> <g> <path d="M216,452c-5.52,0-10,4.48-10,10c0,5.52,4.48,10,10,10s10-4.48,10-10C226,456.48,221.52,452,216,452z"/> </g> </g> <g> <g> <path d="M296,452h-40c-5.522,0-10,4.478-10,10c0,5.522,4.478,10,10,10h40c5.522,0,10-4.478,10-10C306,456.478,301.522,452,296,452 z"/> </g> </g> <g> <g> <path d="M356,0H156c-27.57,0-50,22.43-50,50v412c0,27.57,22.43,50,50,50h200c27.57,0,50-22.43,50-50V50C406,22.43,383.57,0,356,0z M386,462c0,16.542-13.458,30-30,30H156c-16.542,0-30-13.458-30-30v-31h260V462z M386,411H126V80h260V411z M386,60H126V50 c0-16.542,13.458-30,30-30h200c16.542,0,30,13.458,30,30V60z"/> </g> </g> <g> <g> <path d="M336,126H236c-5.523,0-10,4.478-10,10v50h-50c-5.523,0-10,4.478-10,10v160c0,5.522,4.477,10,10,10h100 c5.522,0,10-4.478,10-10v-50h50c5.522,0,10-4.478,10-10V136C346,130.478,341.522,126,336,126z M266,346h-80V206h80V346z M326,286 h-40v-90c0-5.522-4.478-10-10-10h-30v-40h80V286z"/> </g> </g> </svg></div>
				<p>Скрины<br> 	экрана<br> смартфона </p>
			</div>
			<div class="pr_b21_box_item">
				<div class="pr_b21_box_item_ico"><svg fill="#424246" viewBox="0 -10 512.00002 512"  width="49" height="47" xmlns="http://www.w3.org/2000/svg"><path d="m434.988281 397.453125c3.304688-5.777344 5.074219-12.339844 5.074219-19.179687 0-10.339844-4.027344-20.066407-11.339844-27.378907-15.097656-15.097656-39.660156-15.097656-54.757812 0-7.3125 7.3125-11.339844 17.035157-11.339844 27.378907s4.027344 20.066406 11.339844 27.378906c7.3125 7.316406 17.039062 11.34375 27.378906 11.34375 6.839844 0 13.402344-1.769532 19.179688-5.078125l23.957031 23.957031c1.996093 1.996094 4.613281 2.996094 7.230469 2.996094 2.617187 0 5.238281-1 7.234374-2.996094 3.992188-3.992188 3.992188-10.46875 0-14.464844zm-46.558593-6.265625c-3.453126-3.449219-5.351563-8.035156-5.351563-12.914062 0-4.878907 1.902344-9.464844 5.351563-12.914063 3.558593-3.5625 8.238281-5.34375 12.914062-5.34375s9.355469 1.78125 12.914062 5.34375c3.453126 3.449219 5.351563 8.035156 5.351563 12.914063 0 4.878906-1.898437 9.464843-5.351563 12.914062-3.449218 3.449219-8.035156 5.351562-12.914062 5.351562s-9.464844-1.898437-12.914062-5.351562zm0 0"/><path d="m195.34375 71.933594h202.503906c5.648438 0 10.226563-4.582032 10.226563-10.226563 0-5.648437-4.578125-10.230469-10.226563-10.230469h-202.503906c-5.648438 0-10.230469 4.582032-10.230469 10.230469 0 5.644531 4.582031 10.226563 10.230469 10.226563zm0 0"/><path d="m52.261719 65.621094c.257812.613281.574219 1.207031.941406 1.757812.367187.5625.796875 1.085938 1.269531 1.554688.46875.46875.992188.898437 1.554688 1.277344.550781.371093 1.144531.6875 1.769531.941406.613281.257812 1.257813.449218 1.910156.582031.65625.132813 1.332031.195313 1.996094.195313s1.339844-.0625 1.992187-.195313c.65625-.128906 1.300782-.324219 1.914063-.582031.625-.253906 1.21875-.570313 1.769531-.941406.5625-.378907 1.085938-.808594 1.554688-1.277344s.898437-.992188 1.269531-1.554688c.367187-.550781.683594-1.144531.941406-1.757812.253907-.625.449219-1.257813.582031-1.914063.132813-.664062.203126-1.339843.203126-2.003906s-.070313-1.339844-.203126-1.996094c-.125-.652343-.328124-1.296875-.582031-1.910156-.257812-.625-.5625-1.21875-.933593-1.769531-.378907-.5625-.808594-1.085938-1.277344-1.554688-.46875-.472656-.992188-.902344-1.554688-1.269531-.550781-.367187-1.144531-.683594-1.757812-.941406-.625-.253907-1.269532-.449219-1.925782-.582031-1.316406-.265626-2.667968-.265626-3.988281 0-.652343.132812-1.296875.328124-1.910156.582031-.625.257812-1.21875.574219-1.769531.941406-.5625.367187-1.085938.796875-1.554688 1.269531-.472656.46875-.902344.992188-1.269531 1.554688-.367187.550781-.683594 1.144531-.941406 1.769531-.253907.613281-.460938 1.257813-.582031 1.910156-.132813.65625-.203126 1.332031-.203126 1.996094s.070313 1.339844.203126 2.003906c.121093.65625.328124 1.289063.582031 1.914063zm0 0"/><path d="m93.171875 65.621094c.257813.613281.574219 1.207031.941406 1.757812.367188.5625.796875 1.085938 1.269531 1.554688.46875.46875.992188.898437 1.554688 1.277344.550781.371093 1.144531.6875 1.757812.941406.625.257812 1.269532.449218 1.921876.582031.65625.132813 1.332031.195313 1.996093.195313.664063 0 1.339844-.0625 1.992188-.195313.65625-.128906 1.300781-.324219 1.925781-.582031.613281-.253906 1.207031-.570313 1.757812-.941406.5625-.378907 1.085938-.808594 1.554688-1.277344s.898438-.992188 1.269531-1.554688c.367188-.550781.683594-1.144531.941407-1.757812.253906-.625.449218-1.257813.582031-1.914063.132812-.664062.203125-1.339843.203125-2.003906s-.070313-1.339844-.203125-1.996094c-.125-.652343-.328125-1.296875-.582031-1.910156-.257813-.625-.566407-1.21875-.933594-1.769531-.378906-.5625-.808594-1.085938-1.277344-1.554688-.46875-.472656-.992188-.902344-1.554688-1.269531-.550781-.367187-1.144531-.683594-1.757812-.941406-.625-.253907-1.269531-.449219-1.925781-.582031-1.316407-.265626-2.667969-.265626-3.988281 0-.652344.132812-1.296876.328124-1.921876.582031-.613281.257812-1.207031.574219-1.757812.941406-.5625.367187-1.085938.796875-1.554688 1.269531-.472656.46875-.902343.992188-1.269531 1.554688-.367187.550781-.683593 1.144531-.941406 1.769531-.253906.613281-.460937 1.257813-.582031 1.910156-.132813.65625-.203125 1.332031-.203125 1.996094s.070312 1.339844.203125 2.003906c.121094.65625.328125 1.289063.582031 1.914063zm0 0"/><path d="m134.082031 65.621094c.257813.613281.574219 1.207031.941407 1.757812.367187.5625.796874 1.085938 1.269531 1.554688.46875.46875.992187.898437 1.554687 1.277344.550782.371093 1.144532.6875 1.769532.941406.613281.257812 1.257812.449218 1.910156.582031.65625.132813 1.332031.195313 1.996094.195313.664062 0 1.339843-.0625 1.992187-.195313.65625-.128906 1.300781-.324219 1.925781-.582031.613282-.253906 1.207032-.570313 1.757813-.941406.5625-.378907 1.085937-.808594 1.554687-1.277344s.898438-.992188 1.269532-1.554688c.367187-.550781.683593-1.144531.9375-1.757812.257812-.625.460937-1.257813.585937-1.914063.132813-.664062.203125-1.339843.203125-2.003906s-.070312-1.339844-.203125-1.996094c-.125-.652343-.328125-1.296875-.585937-1.910156-.253907-.625-.570313-1.21875-.9375-1.769531-.371094-.5625-.800782-1.085938-1.269532-1.554688-.46875-.472656-.992187-.902344-1.554687-1.269531-.550781-.367187-1.144531-.683594-1.757813-.941406-.625-.253907-1.269531-.449219-1.925781-.582031-1.316406-.265626-2.667969-.265626-3.988281 0-.652344.132812-1.296875.328124-1.921875.582031-.613281.257812-1.207031.574219-1.757813.941406-.5625.367187-1.085937.796875-1.554687 1.269531-.472657.46875-.902344.992188-1.269531 1.554688-.367188.550781-.683594 1.144531-.941407 1.769531-.253906.613281-.449219 1.257813-.582031 1.910156-.132812.65625-.203125 1.332031-.203125 1.996094s.070313 1.339844.203125 2.003906c.132812.65625.328125 1.289063.582031 1.914063zm0 0"/><path d="m255.34375 306.824219h-88.464844c-5.648437 0-10.226562 4.582031-10.226562 10.230469 0 5.644531 4.578125 10.226562 10.226562 10.226562h88.464844c5.648438 0 10.226562-4.582031 10.226562-10.226562 0-5.648438-4.578124-10.230469-10.226562-10.230469zm0 0"/><path d="m50.792969 327.28125h34.265625c5.648437 0 10.230468-4.582031 10.230468-10.226562 0-5.648438-4.582031-10.230469-10.230468-10.230469h-34.265625c-5.648438 0-10.226563 4.582031-10.226563 10.230469 0 5.644531 4.578125 10.226562 10.226563 10.226562zm0 0"/><path d="m255.34375 347.734375h-204.550781c-5.648438 0-10.226563 4.582031-10.226563 10.230469 0 5.644531 4.578125 10.226562 10.226563 10.226562h204.550781c5.648438 0 10.226562-4.582031 10.226562-10.226562 0-5.648438-4.578124-10.230469-10.226562-10.230469zm0 0"/><path d="m265.53125 152.609375c-.011719-.136719-.023438-.269531-.035156-.40625-.023438-.191406-.054688-.382813-.089844-.570313-.027344-.152343-.054688-.300781-.085938-.449218-.035156-.164063-.082031-.328125-.128906-.496094-.046875-.164062-.09375-.332031-.148437-.5-.046875-.136719-.097657-.277344-.152344-.414062-.070313-.1875-.140625-.367188-.222656-.546876-.054688-.121093-.113281-.238281-.171875-.359374-.09375-.1875-.195313-.375-.296875-.558594-.03125-.050782-.054688-.105469-.085938-.15625-.039062-.066406-.082031-.121094-.121093-.183594-.109376-.167969-.21875-.335938-.332032-.496094-.09375-.128906-.1875-.25-.28125-.375-.101562-.128906-.207031-.253906-.316406-.378906-.117188-.136719-.238281-.273438-.363281-.402344-.097657-.101562-.199219-.199218-.300781-.296875-.140626-.132812-.285157-.265625-.433594-.390625-.101563-.085937-.203125-.171875-.308594-.25-.152344-.121094-.308594-.238281-.464844-.347656-.121094-.085938-.242187-.160156-.363281-.238281-.148437-.097657-.300781-.191407-.453125-.277344-.144531-.082031-.292969-.15625-.4375-.230469-.140625-.070312-.28125-.140625-.425781-.203125-.164063-.074219-.335938-.140625-.503907-.207031-.136718-.050781-.269531-.101562-.40625-.148438-.175781-.058593-.355468-.113281-.535156-.160156-.144531-.042968-.285156-.078125-.429687-.113281-.167969-.039063-.339844-.070313-.515625-.101563-.164063-.027343-.332032-.054687-.503906-.078124-.148438-.015626-.300782-.03125-.453126-.042969-.199218-.015625-.398437-.027344-.601562-.03125-.074219 0-.144531-.011719-.21875-.011719h-204.550781c-.085938 0-.167969.011719-.253907.011719-.179687.003906-.355468.015625-.53125.027343-.175781.015626-.351562.03125-.523437.054688-.144531.019531-.289063.039062-.429687.066406-.199219.03125-.394532.070313-.585938.113282-.121094.027343-.238281.0625-.355469.09375-.203125.054687-.40625.113281-.605469.183593-.113281.035157-.222656.078125-.332031.121094-.195312.074219-.386719.148437-.574219.234375-.121093.054688-.242187.113281-.359374.171875-.167969.082031-.335938.167969-.5.261719-.132813.078125-.265626.160156-.402344.246094-.136719.085937-.273438.171874-.410156.265624-.144532.105469-.285157.210938-.425782.320313-.117187.089844-.230468.183594-.34375.277344-.140625.121093-.273437.246093-.40625.371093-.109375.105469-.214844.207032-.320312.316407-.121094.125-.238282.253906-.351563.386719-.113281.128906-.222656.257812-.328125.394531-.09375.117187-.183594.242187-.273437.363281-.117188.164062-.226563.332031-.332031.5-.039063.0625-.085938.121094-.125.183594-.03125.050781-.054688.105468-.082032.15625-.105468.183594-.207031.371094-.300781.5625-.058594.117187-.117187.234375-.171875.355468-.078125.179688-.152344.363282-.222656.546876-.054688.136718-.105469.277343-.152344.417968-.054688.164063-.101562.332032-.148438.5-.046874.164063-.089843.328125-.128906.496094-.03125.144531-.058594.296875-.085937.445312-.03125.191407-.0625.382813-.085938.570313-.019531.136719-.027343.273437-.039062.40625-.015625.207031-.027344.414063-.03125.621094 0 .0625-.007813.121093-.007813.183593v122.730469c0 .0625.007813.121094.007813.183594.003906.207031.015625.414063.03125.617187.011719.136719.023437.273438.039062.40625.019531.191407.050781.382813.085938.574219.027343.148438.054687.296875.085937.445313.039063.167968.082032.332031.128906.496094.046876.167968.09375.335937.148438.5.046875.140624.097656.277343.152344.417968.070312.183594.144531.367188.222656.546875.054688.117188.113281.238281.171875.355469.09375.191406.195313.378906.300781.5625.027344.050781.050782.105469.082032.15625.027343.046875.066406.085938.09375.132812.179687.292969.375.574219.585937.84375.050781.066407.097656.136719.152344.203126.246093.300781.507812.585937.785156.859374.09375.09375.195313.175782.289063.265626.199218.179687.402343.351562.617187.515624.113281.085938.226563.175782.34375.257813.25.175781.511719.34375.777344.5.070312.039063.132812.085937.203125.121094.34375.191406.703125.359375 1.070312.507812.078125.03125.15625.054688.234375.085938.292969.109375.59375.210937.902344.292969.109375.03125.214844.058593.324219.085937.285156.066406.578125.121094.871094.164063.109374.019531.222656.039062.335937.054687.355469.039063.710937.0625 1.078125.066406.035156 0 .074219.007813.113281.007813.011719 0 .023438-.003906.03125-.003906h204.46875c.011719 0 .023438.003906.03125.003906.039063 0 .078125-.007813.117188-.007813.363281-.003906.722656-.027343 1.078125-.066406.109375-.015625.222656-.035156.332031-.054687.296875-.042969.585937-.097657.875-.167969.109375-.023438.214844-.050781.320313-.082031.3125-.082032.613281-.183594.910156-.296876.078125-.027343.152344-.054687.226562-.082031.371094-.152343.730469-.320312 1.078125-.511719.066407-.035156.125-.078124.191407-.113281.269531-.15625.53125-.324219.789062-.507812.117188-.082031.226562-.167969.339844-.253907.214844-.164062.417968-.339843.621094-.519531.09375-.085937.195312-.171875.285156-.261719.277344-.273437.542968-.558593.785156-.859374.054688-.066407.101562-.136719.152344-.203126.210937-.273437.40625-.554687.585937-.84375.03125-.050781.066407-.089843.09375-.136718.03125-.050782.054688-.105469.085938-.15625.101562-.183594.203125-.371094.296875-.558594.058594-.121094.117187-.238281.171875-.359375.082031-.179687.152343-.359375.222656-.546875.054687-.136719.109375-.273438.152344-.414062.054687-.167969.101562-.332032.148437-.5.046875-.167969.09375-.332032.128906-.496094.03125-.148438.058594-.296875.085938-.449219.035156-.1875.0625-.378906.089844-.570313.015625-.136718.023437-.269531.035156-.40625.015625-.207031.027344-.414062.03125-.621093 0-.058594.007812-.121094.007812-.183594v-122.730469c0-.0625-.007812-.121094-.007812-.179687-.003906-.207031-.015625-.414063-.03125-.621094zm-204.507812 18.867187 72.167968 43.300782-72.167968 43.300781zm26.695312-7.835937h130.699219l-65.347657 39.210937zm65.351562 63.066406 65.347657 39.207031h-130.699219zm19.878907-11.929687 72.167969-43.300782v86.601563zm0 0"/><path d="m450.347656 294.648438v-263.453126c0-17.199218-13.992187-31.195312-31.191406-31.195312h-387.960938c-17.203124 0-31.195312 13.996094-31.195312 31.195312v346.710938c0 17.199219 13.992188 31.195312 31.195312 31.195312h277.789063c9.5 46.777344 50.945313 82.09375 100.484375 82.09375 56.535156 0 102.53125-45.992187 102.53125-102.527343 0-42.015625-25.402344-78.199219-61.652344-94.019531zm-419.152344-274.195313h387.960938c5.921875 0 10.738281 4.820313 10.738281 10.742187v71.078126h-409.441406v-71.078126c0-5.921874 4.820313-10.742187 10.742187-10.742187zm-10.742187 357.453125v-255.175781h409.441406v165.449219c-6.605469-1.339844-13.433593-2.042969-20.425781-2.042969-.464844 0-.925781.011719-1.390625.015625v-132.738282c0-5.648437-4.578125-10.230468-10.226563-10.230468h-101.253906c-5.648437 0-10.226562 4.582031-10.226562 10.230468v203.863282c0 5.648437 4.578125 10.226562 10.226562 10.226562h12.542969c-1.441406 6.828125-2.199219 13.898438-2.203125 21.140625h-275.742188c-5.921874 0-10.742187-4.816406-10.742187-10.738281zm295.320313-30.855469h-8.949219v-183.410156h80.800781v124.84375c-32.164062 7.007813-58.738281 29.152344-71.851562 58.566406zm93.695312 123.691407c-45.257812 0-82.074219-36.820313-82.074219-82.074219 0-45.257813 36.816407-82.078125 82.074219-82.078125s82.078125 36.820312 82.078125 82.078125c0 45.253906-36.820313 82.074219-82.078125 82.074219zm0 0"/><path d="m121.71875 326.503906c.613281.253906 1.257812.449219 1.910156.582032.667969.132812 1.332032.203124 1.996094.203124.675781 0 1.339844-.070312 2.003906-.203124.65625-.132813 1.300782-.328126 1.914063-.582032.613281-.257812 1.207031-.574218 1.757812-.941406.5625-.367188 1.085938-.796875 1.554688-1.269531 1.914062-1.910157 3.007812-4.539063 3.007812-7.230469 0-.664062-.074219-1.339844-.207031-2.003906-.132812-.644532-.324219-1.289063-.582031-1.914063-.253907-.613281-.570313-1.207031-.941407-1.757812-.378906-.5625-.796874-1.085938-1.277343-1.554688-1.902344-1.914062-4.53125-2.996093-7.230469-2.996093-2.691406 0-5.320312 1.082031-7.230469 2.996093-.472656.46875-.902343.992188-1.269531 1.554688-.367188.550781-.683594 1.144531-.941406 1.757812-.253906.625-.449219 1.269531-.582032 1.914063-.132812.664062-.203124 1.339844-.203124 2.003906 0 2.691406 1.09375 5.328125 2.996093 7.230469.46875.472656 1 .902343 1.554688 1.269531.5625.367188 1.15625.683594 1.769531.941406zm0 0"/></svg></div>
				<p>Ссылки<br> на сторонние<br> сайты</p>
			</div>
			<div class="pr_b21_box_item">
				<div class="pr_b21_box_item_ico"><svg fill="#424246" version="1.1"  width="49" height="49" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <path d="M196,106c-5.52,0-10,4.48-10,10s4.48,10,10,10s10-4.48,10-10S201.52,106,196,106z"/> <path d="M196,186c-5.52,0-10,4.48-10,10s4.48,10,10,10s10-4.48,10-10S201.52,186,196,186z"/> <path d="M482,0H30C13.458,0,0,13.458,0,30c0,13.036,8.361,24.152,20,28.28V362c0,16.542,13.458,30,30,30h196v61.72 c-11.639,4.128-20,15.243-20,28.28c0,16.542,13.458,30,30,30s30-13.458,30-30c0-13.036-8.361-24.152-20-28.28V392h196 c16.542,0,30-13.458,30-30V58.28c11.639-4.128,20-15.243,20-28.28C512,13.458,498.542,0,482,0z M256,492c-5.514,0-10-4.486-10-10 c0-5.514,4.486-10,10-10c5.514,0,10,4.486,10,10C266,487.514,261.514,492,256,492z M472,362c0,5.514-4.486,10-10,10H50 c-5.514,0-10-4.486-10-10V60h432V362z M482,40H30c-5.514,0-10-4.486-10-10s4.486-10,10-10h452c5.514,0,10,4.486,10,10 S487.514,40,482,40z"/> <path d="M156,106H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h66c5.522,0,10-4.477,10-10S161.522,106,156,106z"/> <path d="M196,146H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h106c5.522,0,10-4.477,10-10S201.522,146,196,146z"/> <path d="M156,186H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h66c5.522,0,10-4.477,10-10S161.522,186,156,186z"/> <path d="M196,226H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h106c5.522,0,10-4.477,10-10S201.522,226,196,226z"/> <path d="M196,266H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h106c5.522,0,10-4.477,10-10S201.522,266,196,266z"/> <path d="M416,306H90c-5.522,0-10,4.477-10,10s4.478,10,10,10h326c5.522,0,10-4.477,10-10S421.522,306,416,306z"/> <path d="M336,106c-50.06,0-90,40.654-90,90c0,49.626,40.374,90,90,90c49.626,0,90-40.374,90-90C426,146.374,385.626,106,336,106z M346,126.726c30.608,4.399,54.875,28.665,59.274,59.274H346V126.726z M336,266c-38.598,0-70-31.402-70-70 c0-35.075,25.831-64.368,60-69.278V196c0,5.523,4.478,10,10,10h69.274C400.406,239.877,371.202,266,336,266z"/> </svg></div>
				<p>Примеры<br> презентаций <br> конкурентов </p>
			</div>
		</div>

		<div class="pr_b11_box_1">
			<p>При заказе дизайна презентации без написания текстов <br>
				материалы принимаются только в редактируемом текстовом виде <br>
				с разбивкой по слайдам. Это может быть файл Word или PowerPoint 
				</p>
		</div>


	</div>
</section>

<section class="pr_b22 white">
	<div class="main">
		<p class="pr_zg">Почему вам нужно заказать создание <br>
			презентации для бизнеса у нас? </p>
		<div class="pr_b22_box">
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">01</p>
					<p class="pr_b22_box_item_t2">Вам точно не будет <br>
						стыдно за свою <br>
						презентацию перед<br>
						аудиторией </p>
				</div>
			</div>
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">02</p>
					<p class="pr_b22_box_item_t2">У вас не будет<br>
						чувства, что вы<br>
						переплатили <br>
						за работу </p>
				</div>
			</div>
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">03</p>
					<p class="pr_b22_box_item_t2">Уверенность на<br>
						переговорах будет <br>
						выше с нашей<br>
						презентацией</p>
				</div>
			</div>
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">04</p>
					<p class="pr_b22_box_item_t2">Скидки и кешбэки<br>
						до 50% постоянным <br>
						клиентам</p>
				</div>
			</div>
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">05</p>
					<p class="pr_b22_box_item_t2">Работаем без<br>
						предоплаты <br>
						с постоянными<br>
						клиентами</p>
				</div>
			</div>
			<div class="pr_b22_box_item">
				<div class="pr_b22_box_item_main">
					<p class="pr_b22_box_item_t1">06</p>
					<p class="pr_b22_box_item_t2">Особые условия<br>
						для сотрудников<br>
						отделов закупок,<br>
						маркетинга <br>
						и PR-служб</p>
				</div>
			</div>
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
            "NEWS_COUNT" => "180",
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


<section class="home_clientabout">
    <div class="main">
      <div class="home_clientabout_top">
        <h2 class="home_h2">Клиенты о нас</h2>
        <a href="/otzyvy/"  class="button_line" >
          <span>читать все отзывы</span>
          <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
        </a>
      </div>
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
		"PARENT_SECTION" => "7",
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
  </section>




<section class="poleznaya">
    <div class="main">
		<h2 class="home_h2">Полезная информация по теме</h2>
 
        <p><a href="/blog/njuansy-sozdaniya-biznes-prezentacij/">Нюансы создания бизнес-презентаций</a></p>
        <p><a href="/blog/instrukciya-kak-zakazat-biznes-prezentaciju/">Инструкция как заказать бизнес-презентацию</a></p>
        <p><a href="/blog/10-pravil-sozdaniya-krutyh-prezentacij/">10 правил создания крутых презентаций</a></p>
        <p><a href="/blog/prezentaciya-eto-ne-slajdy-a-reshenie-problem/">Презентация — это не слайды, а решение проблем</a></p>
        <p><a href="/blog/prezentaciya-sovety-i-podskazki/">Презентация: советы и подсказки</a></p>
        <p><a href="/blog/samye-vazhnye-slajdy-prezentacii/">Самые важные слайды презентации</a></p>
        <p><a href="/blog/top-10-knig-pro-prezentacii/">Топ-10 книг про презентации</a></p>
        <p><a href="/blog/kak-pravilno-zakonchit-prezentaciju/">Как правильно закончить презентацию</a></p>
    </div>
</section>
 
<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_1" => "Создадим вашу <br>",
		"TITLE_2" => "идеальную",
		"TITLE_3" => "презентацию",
		"TYPE" => "prezent",
		"TYPE_TEXT" => " "
	),
	false
);?>

<? $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/typeit.min.js" );?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>