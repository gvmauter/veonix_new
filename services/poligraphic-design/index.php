<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать полиграфический дизайн — цена 1500 руб./страница. Разработка дизайна печатной продукции: от листовки до каталога. Студия дизайна полиграфии в Москве Veonix: 8 (800) 222-77-65.");
$APPLICATION->SetPageProperty("title", "Заказать дизайн полиграфической продукции в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/"). 
$APPLICATION->AddChainItem("Полиграфический дизайн").
 
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
		"TEMPLATE_FOR_TITLE1" => "Креативный дизайн ",
		"TEMPLATE_FOR_TITLE2" => "полиграфии",
		"TEMPLATE_FOR_TITLE3" => " в Москве",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создадим полиграфический дизайн премиум-класса, который стопроцентно привлечет новых клиентов и повысит доверие к вашей компании",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

<div class="old_page">
     
<section class="ds-b1">
	<div class="main">
		<div class="main-970">
			<p class="ds-zg">Качественный полиграфический <br>
				дизайн для бизнеса
			</p>
			<p class="ds-b1-tx1">
				На какие только трюки и уловки не соглашаются компании, чтобы выделиться среди конкурентов. Только бы их заметили! А всего-то нужно профессионально подойти к вопросу и заказать полиграфический дизайн, который точно зацепит вашу целевую аудиторию. Только качественный раздаточный материал приносит вашему бизнесу бесценную пользу:
			</p>
		</div>
		<div class="ds-bg-zg ds-bg-1 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-1.jpg">
			<p>Только качество</p>
		</div>
		<div class="main-970">
			<div class="ds-b1-box-1">
				<div class="ds-b1-box-1-item">
					<p class="ds-b1-box-1-item-t1">01</p>
					<p class="ds-b1-box-1-item-t2"><span class="b">Привлекает</span> внимание клиентов</p>
					<p class="ds-b1-box-1-item-t3">Распространение листовок, буклетов, плакатов - один из видов массовой рекламы. Для того, чтобы купить вашу продукцию, люди, как минимум,  должны о ней узнать </p>
				</div>
				<div class="ds-b1-box-1-item">
					<p class="ds-b1-box-1-item-t1">02</p>
					<p class="ds-b1-box-1-item-t2"><span class="b">Повышает</span> известность бренда</p>
					<p class="ds-b1-box-1-item-t3">Полиграфическая продукция с нанесением логотипа вашей компании (конверты, бланки, календари) выгодно выделяет вас на фоне конкурентов
					</p>
				</div>
				<div class="ds-b1-box-1-item">
					<p class="ds-b1-box-1-item-t1">03</p>
					<p class="ds-b1-box-1-item-t2"><span class="b">Работает</span> на ваш имидж</p>
					<p class="ds-b1-box-1-item-t3">Стильные маркетинг-киты, визитки и буклеты лучше любых слов представят вашу компанию потенциальному клиенту и расположит его в вашу пользу</p>
				</div>
			</div>
			
			 <div class="ds-b1-box-2">
				<p class="ds-b1-box-2-t1">Профессиональные услуги дизайна <br>
					полиграфии - грамотная инвестиция <br>
					в развитие вашего бизнеса. </p>

			</div> 
		</div>

	</div>
</section>
<section class="ds-b3">
	<div class="main-970">
		<p class="ds-zg">Сколько стоит <br>дизайн полиграфии</p>
		<div class="ds-b3-box">
			<div class="ds-b3-box-left">
				<p><span class="b">Приятные цены и премиум качество -</span> это наши сильные стороны. Таких тарифов на инфографичный дизайн сегодня найти непросто.</p>
				<p>Мы предлагаем графический дизайн для полиграфии от 4 000 рублей за одну страницу/полосу/макет.</p>
			</div>
			<div class="ds-b3-box-right">
				<p>от 4000 <i></i></p>
			</div>
		</div>
	</div>
</section>
<section class="ds-b2">
	<div class="main-970">
		<p class="ds-zg">Какой полиграфический <br>
			дизайн мы делаем</p>
		<p class="ds-b2-t1">Veonix - компания, где лучшие мастера своего дела <br> разрабатывают для вас запоминающийся дизайн любой <br> полиграфической продукции. </p>
		<div class="ds-b2-box-1">
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/catalog-design/">Каталог</a></p>
					<p class="ds-b2-box-1-item-t2">Быстро и наглядно познакомит партнёров и покупателей с полным перечнем вашей продукции или услуг без помощи менеджера по продажам</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-1.jpg" alt="Каталог"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/marketing-kit/">Маркетинг-кит</a></p>
					<p class="ds-b2-box-1-item-t2">Красиво оформленная история вашей компании поднимет ваш статус в глазах клиента ещё до того, как вы приступите к переговорам</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-2.jpg" alt="Маркетинг-кит"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/brochures/">Брошюра</a></p>
					<p class="ds-b2-box-1-item-t2">Печатное издание от 6 страниц, скрепленных между собой скобами, нитями или проволокой. Отлично справляется с ролью мини каталога вашей продукции</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-3.jpg" alt="Брошюра"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/booklet/">Буклет</a></p>
					<p class="ds-b2-box-1-item-t2">Напечатанное на формате А4 или А3 издание, сложенное в виде ширмочки или тетрадки. Незаменимый вариант для программы мероприятия, проспекта или путеводителя</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-4.jpg" alt="Буклет"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/business-cards/">Визитка</a></p>
					<p class="ds-b2-box-1-item-t2">Лаконичная стильная карточка, которую вы вручаете клиенту или партнёру на встрече. Именно она создает то самое неизгладимое первое впечатление</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-5.jpg" alt="Визитка"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/banners/">Баннер</a></p>
					<p class="ds-b2-box-1-item-t2">Рекламное полотно, размещаемое на витринах, фасадах зданий, на обочинах трасс. Ежедневно информирует о вашем продукте большое количество людей </p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-6.jpg" alt="Баннер"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/liflet/">Лифлет</a></p>
					<p class="ds-b2-box-1-item-t2">Двухсторонний отпечатанный лист, сложенный пополам, гармошкой или дельтообразно, что уже привлекает внимание клиентов к вашему бренду</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-7.jpg" alt="Лифлет"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/plastic-cards/">Пластиковые карты	</a></p>
					<p class="ds-b2-box-1-item-t2">Только представьте, ваши сотрудники расплачиваются в магазинах, на заправках, в ТРЦ банковскими картами, с логотипом родной компании, круто?</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-8.jpg" alt="Пластиковые карты"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Блокноты и папки</p>
					<p class="ds-b2-box-1-item-t2">Незаменимые элементы на выставках, конференциях в качестве памятного раздаточного материала. Да и с ролью сувенирной продукции отлично справляются</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-9.jpg" alt="Блокноты и папки"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1">Открытки</p>
					<p class="ds-b2-box-1-item-t2">На фоне банальных электронных рассылок, ваше поздравление, написанное на красивой открытке с логотипом оценят по достоинству</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-10.jpg" alt="Открытки"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/leaflet/">Листовки</a> и <a href="/flyer/">флаера</a></p>
					<p class="ds-b2-box-1-item-t2">Привлекательный лист, выполненный в ярких, сочных красках. Часто с ролью завлекалочки справляется упоминание о скидке или право на подарок</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-11.jpg" alt="Листовки и флаера"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/posters/">Плакаты и постеры</a></p>
					<p class="ds-b2-box-1-item-t2">Крупные полиграфические изделия, выполняющие рекламные или декоративные задачи. Содержат надписи или изображения</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-12.jpg" alt="Листовки и флаера"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/roll-up/">Roll-Up</a> и <a href="/press-wall/">Press Wall</a></p>
					<p class="ds-b2-box-1-item-t2">Мобильный стенд, состоящий из компактной алюминиевой конструкции и баннерной ткани незаменим для проведения выставок и рекламных презентаций</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-13.jpg" alt=""></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/envelopes/">Конверты</a> и <a href="/blank/">бланки</a></p>
					<p class="ds-b2-box-1-item-t2">Крупные полиграфические изделия, выполняющие рекламные или декоративные задачи. Содержат надписи или изображения</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-14.jpg" alt="Конверты и бланки"></div>
			</div>
			<div class="ds-b2-box-1-item">
				<div class="ds-b2-box-1-item-text">
					<p class="ds-b2-box-1-item-t1"><a href="/presentations/">Презентация</a> </p>
					<p class="ds-b2-box-1-item-t2">Убедительная презентация о вашей компании поможет завоевать доверие клиентов, партнеров и инвесторов</p>
				</div>
				<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-photo-15.jpg" alt="Презентация"></div>
			</div>
		</div>
	</div>
</section>

</div>




<section>
<div class="portfolio-zagalovok">
    <div class="main">
      <div class="port-t1">
        <h3 class="team-t1 wow fadeInUp animated" style="visibility: visible;">Портфолио</h3>
      </div>
    </div>
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
                            "PARENT_SECTION" => "4",
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

<div class="old_page">
<section class="ds-form-box">
	<div class="main-970 ">
		<p class="ds-form-box-t1">Хотите рассчитаем точную стоимость <br>
			вашего заказа?</p>
		<p class="ds-form-box-t2">Подайте заявку и мы перезвоним  <br>
			вам в течение 15 минут</p>
            <a class="button_line " href="#form" data-fancybox data-text="рассчитаем точную стоимость - Полиграфический дизайн">
                  <span>Оставить заявку</span>
                  <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
                  <i class="button_line_2"></i>
            </a>
 
	</div>
</section>

<section class="ds-b4">
	<div class="main-970">
		<p class="ds-zg">Почему дизайн печатной продукции <br>
			выгодно заказывать в Veonix
		</p>
		<p class="ds-b4-tx">
		<span class="b">Выбирая исполнителя, ориентируйтесь на тех, кто несёт ответственность за свои договорённости и обещания.</span> Лучше довериться компании, которая работает официально и готова зафиксировать все нюансы на бумаге, а не только на словах. Иначе будет сложно избежать меняющихся на ходу цен и рокировок с датой завершения проекта.
		</p>
		<p class="ds-b4-tx">
		<span class="b">Особенно важно прописать пункты с объёмом работ, стоимостью и сроками разработки дизайна полиграфии.</span> Ведь вам может понадобится готовая продукция к конкретной дате. В этом случае от профессионализма и пунктуальности студии будет зависеть успех всего вашего рекламного мероприятия. 
		</p>
		<p class="ds-b4-tx">
		<span class="b">В Veonix приходят те, кто привык доверять профессионалам,</span> инвестировать деньги в крутой продукт по выгодным ценам. Мы не обещаем золотых гор, но выполняем свою работу на совесть:  </p>
	</div>
</section>

<section class="ds-b5">
	<div class="main">
		<div class="ds-bg-zg ds-bg-3 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-3.jpg">
			<p>Компания Veonix - это...</p>
		</div>
	</div>
	<div class="main-970">
		<div class="ds-b5-box">
			<div class="ds-b5-box-item">
				<div class="ds-b4-box-item-number">
					<p><span class="b">20<span>+</span></span></p>
				</div>
				<div class="ds-b4-box-item-text">
					<p>постоянных <br>сотрудников в штате</p>
				</div>
			</div>
			<div class="ds-b5-box-item">
				<div class="ds-b4-box-item-number">
					<p><span class="b"><span class="ot-span">от </span>3</span></p>
				</div>
				<div class="ds-b4-box-item-text">
					<p>лет профессионального <br>опыта каждого специалиста</p>
				</div>
			</div>
			<div class="ds-b5-box-item">
				<div class="ds-b4-box-item-number">
					<p><span class="b">50 <span class="abs-plus">+</span></span> <span>тыс.</span></p>
				</div>
				<div class="ds-b4-box-item-text">
					<p>экземпляров полиграфии <br>отпечатано в нашей<br>типографии </p>
				</div>
			</div>
			<div class="ds-b5-box-item">
				<div class="ds-b4-box-item-number">
					<p><span class="b">30 <span>+</span></span></p>
				</div>
				<div class="ds-b4-box-item-text">
					<p>компаний с мировым именем<br>делают у нас заказы на<br>постоянной основе</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ds-b4">
	<div class="main">
		<div class="ds-bg-zg ds-bg-2 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/prezent/b17_bg.jpg" >
			<p>Наши преимущества</p>
		</div>
	</div>
	<div class="main-970">
		<div class="ds-b4-box">
			<div class="ds-b4-box-item">
				<div class="ds-b4-box-item-ico ds-ic-1">
					<svg height="384pt" fill="#515151" viewBox="0 0 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 48h-48v-32c0-8.832031-7.167969-16-16-16s-16 7.167969-16 16v32h-192v-32c0-8.832031-7.167969-16-16-16s-16 7.167969-16 16v32h-48c-8.832031 0-16 7.167969-16 16v304c0 8.832031 7.167969 16 16 16h352c8.832031 0 16-7.167969 16-16v-304c0-8.832031-7.167969-16-16-16zm-336 304v-176h224c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16h-224v-64h32v16c0 8.832031 7.167969 16 16 16s16-7.167969 16-16v-16h192v16c0 8.832031 7.167969 16 16 16s16-7.167969 16-16v-16h32v64h-32c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h32v176zm0 0"/><path d="m96 208h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m168 208h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m232 208h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m304 208h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m96 272h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m168 272h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m232 272h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/><path d="m304 272h-16c-8.832031 0-16 7.167969-16 16s7.167969 16 16 16h16c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16zm0 0"/></svg>
				</div>
				<p class="ds-b4-box-item-tx1">Соблюдение сроков <br>
					и обязательств
					</p>
				<p class="ds-b4-box-item-tx2">Работаем по договору, который защищает ваши интересы на юридическом уровне. Подробно прописываем все обязательства 
				</p>
			</div>
			<div class="ds-b4-box-item">
				<div class="ds-b4-box-item-ico ds-ic-2">
					<svg fill="#515151" enable-background="new 0 0 511.336 511.336" height="512" viewBox="0 0 511.336 511.336" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m457.707 270.007c28.476-41.939-1.617-99.339-52.707-99.339-51.076 0-81.177 57.38-52.72 99.322-9.772 5.589-18.274 12.461-25.6 20.439-17.937-17.821-39.373-32.119-63.17-41.776 21.186-19.451 34.49-47.359 34.49-78.318 0-58.632-47.701-106.333-106.333-106.333s-106.334 47.7-106.334 106.333c0 30.96 13.303 58.868 34.489 78.318-70.19 28.484-119.822 97.391-119.822 177.682 0 11.598 9.402 21 21 21s21-9.402 21-21c0-82.526 67.14-149.667 149.667-149.667s149.667 67.14 149.667 149.667c0 11.598 9.402 21 21 21s21-9.402 21-21c0-37.708-10.952-72.904-29.834-102.585 20.848-27.98 52.821-25.748 51.567-25.749 35.445.038 64.271 28.884 64.271 64.338v63.997c0 11.598 9.402 21 21 21s21-9.402 21-21v-63.997c-.002-39.47-21.617-73.984-53.631-92.332zm-330.374-99.672c0-35.473 28.86-64.333 64.333-64.333s64.334 28.86 64.334 64.333c0 35.474-28.86 64.333-64.333 64.333s-64.334-28.86-64.334-64.333zm256 64c0-11.947 9.72-21.667 21.667-21.667s21.667 9.72 21.667 21.667c0 11.896-9.666 21.664-21.67 21.664-11.885-.001-21.664-9.658-21.664-21.664z"/></svg>
				</div>
				<p class="ds-b4-box-item-tx1">Опытные штатные <br>
					специалисты 
					</p>
				<p class="ds-b4-box-item-tx2">У нас нет фрилансеров и новичков - только талантливые и проверенные профессионалы, прошедшие строгий отбор </p>
			</div>
			<div class="ds-b4-box-item">
				<div class="ds-b4-box-item-ico ds-ic-3">
					<svg version="1.1" fill="#515151" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve"> <g> <g> <path d="M196.96,224H128c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h68.96c8.84,0,16-7.168,16-16 C212.96,231.168,205.792,224,196.96,224z"/> </g> </g> <g> <g> <path d="M232,288h-48c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h48c8.832,0,16-7.168,16-16C248,295.168,240.832,288,232,288 z"/> </g> </g> <g> <g> <path d="M280,352H128c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16 c-26.472,0-48,21.528-48,48s21.528,48,48,48h152c8.832,0,16-7.168,16-16C296,359.168,288.832,352,280,352z"/> </g> </g> <g> <g> <path d="M48,192h32c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16H48c-26.472,0-48,21.528-48,48s21.528,48,48,48h24 c8.832,0,16-7.168,16-16c0-8.832-7.168-16-16-16H48c-8.824,0-16-7.176-16-16C32,199.176,39.176,192,48,192z"/> </g> </g> <g> <g> <path d="M280,168c-26.472,0-48,21.528-48,48s21.528,48,48,48s48-21.528,48-48S306.472,168,280,168z M280,232 c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16c8.824,0,16,7.176,16,16C296,224.824,288.824,232,280,232z"/> </g> </g> <g> <g> <path d="M280,112c-57.344,0-104,46.656-104,104c0,52.96,82.416,151.328,91.816,162.368C270.848,381.944,275.312,384,280,384 s9.152-2.056,12.184-5.632C301.584,367.328,384,268.96,384,216C384,158.656,337.344,112,280,112z M280,342.816 c-31.824-39.888-72-99.368-72-126.816c0-39.696,32.296-72,72-72c39.704,0,72,32.304,72,72 C352,243.424,311.816,302.912,280,342.816z"/> </g> </g> <g> <g> <path d="M80,56c-13.232,0-24,10.768-24,24s10.768,24,24,24s24-10.768,24-24S93.232,56,80,56z"/> </g> </g> <g> <g> <path d="M80,0C35.888,0,0,35.888,0,80c0,40.192,57.472,96.696,68.992,107.616C72.08,190.536,76.04,192,80,192 s7.92-1.464,11.008-4.384C102.528,176.696,160,120.192,160,80C160,35.888,124.112,0,80,0z M79.992,153.4 C57.328,129.72,32,96.824,32,80c0-26.472,21.528-48,48-48s48,21.528,48,48C128,96.784,102.664,129.696,79.992,153.4z"/> </g> </svg>
				</div>
				<p class="ds-b4-box-item-tx1">Контроль рабочих  <br>
					процессов</p>
				<p class="ds-b4-box-item-tx2">Не пускаем работу на самотёк - результат каждого дизайнера проходит несколько этапов проверки, в том числе арт директором</p>
			</div>
			<div class="ds-b4-box-item">
				<div class="ds-b4-box-item-ico ds-ic-4">
					<svg  fill="#515151" enable-background="new 0 0 511.373 511.373" height="512" viewBox="0 0 511.373 511.373" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m446.756 44.623c-117.698 57.368-261.409 63.913-302.897 64.548-142.245 0-84.633 0-98.826 0-24.813 0-45 20.187-45 45 0 258.932-.229 243.917.524 247.277 1.252 5.562 4.713 10.352 9.482 13.282 3.872 2.378 93.994 56.6 252.436 56.6 76.404 0 158.756-12.849 225.197-48.736 14.619-7.896 23.701-23.088 23.701-39.647 0-5.5 0-293.845 0-297.829 0-33.295-34.851-55.004-64.617-40.495zm-404.723 109.548c0-1.654 1.346-3 3-3 47.625 0 71.525.015 83.784.026 106.951 1.694 240.882-22.291 336.341-68.82 1.945-.943 4.215.519 4.215 2.742v214.316c-57.367 32.245-131.947 55.551-216.63 67.612-74.928 10.668-117.754 9.023-210.71 8.815zm425.679 231.469c-89.777 48.492-222.778 52.476-322.952 32.168 36.834-1.275 61.86-1.771 113.904-9.181 81.353-11.588 152.038-32.284 210.708-61.644v35.963c.001 1.109-.636 2.141-1.66 2.694z"/><path d="m255.703 332.507c40.988 0 74.333-33.346 74.333-74.333s-33.346-74.333-74.333-74.333-74.333 33.346-74.333 74.333c-.001 40.988 33.345 74.333 74.333 74.333zm0-106.666c17.829 0 32.333 14.504 32.333 32.333s-14.505 32.333-32.333 32.333-32.333-14.505-32.333-32.333 14.504-32.333 32.333-32.333z"/><path d="m394.366 183.18c4.583 0 3.541-.049 38.644-11.75 11.003-3.667 16.949-15.56 13.282-26.563s-15.56-16.949-26.563-13.282l-32 10.667c-11.003 3.667-16.949 15.56-13.282 26.563 2.933 8.8 11.126 14.365 19.919 14.365z"/><path d="m85.036 353.841h32c11.598 0 21-9.402 21-21s-9.402-21-21-21h-32c-11.598 0-21 9.402-21 21s9.402 21 21 21z"/></svg>
				</div>
				<p class="ds-b4-box-item-tx1">Доступная <br>
					стоимость услуг
					</p>
				<p class="ds-b4-box-item-tx2">Понимаем, насколько важно вашему бизнесу грамотное использование бюджета, поэтому держим цены ниже, чем на рынке на 10-15% </p>
			</div>
		</div>
		<p class="ds-b4-tx1">
			<span class="b">Veonix - это не просто услуги дизайна полиграфии.</span> У нас вы 
			получаете комплексный сервис от маркетинговой проработки,
			написания текстов и создания стильного дизайна до доставки 
			вашего заказа прямо в офис.


		</p>
	</div>
</section>

<section class="ds-b6">
	<div class="main-970">
		<p class="ds-zg">Наши гарантии</p>
		<div class="ds-b6-box1">
			<div class="ds-b6-box1-item">
				<p class="ds-b6-box1-item-t1">Гарантия 01</p>
				<p class="ds-b6-box1-item-t2">100% уникальный дизайн <br>
					и текст, без шаблонов <br>
					и плагиата
					</p>
			</div>
			<div class="ds-b6-box1-item">
				<p class="ds-b6-box1-item-t1">Гарантия 02</p>
				<p class="ds-b6-box1-item-t2">Сдача проекта строго <br>
					в срок, без форс-мажоров 
					</p>
			</div>
			<div class="ds-b6-box1-item">
				<p class="ds-b6-box1-item-t1">Гарантия 03</p>
				<p class="ds-b6-box1-item-t2">Сохранность ваших данных, <br> подписание договора NDA
				</p>
			</div>
			<div class="ds-b6-box1-item">
				<p class="ds-b6-box1-item-t1">Гарантия 04</p>
				<p class="ds-b6-box1-item-t2">Бесплатные правки ошибок <br>
					в течение 36 месяцев
					</p>
			</div>
			<div class="ds-b6-box1-item">
				<p class="ds-b6-box1-item-t1">Гарантия 05</p>
				<p class="ds-b6-box1-item-t2">100% возврат денег, если <br> результат не удовлетворил</p>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="ds-bg-zg ds-bg-4 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-4.jpg">
			<p>Схема работы</p>
		</div>
	</div>
	<div class="main">
		<div class="ds-b6-box2">
			<p class="ds-b6-box2-t1"><span class="b">Решили заказать разработку дизайна полиграфии,</span> но даже не знаете, с какого края подойти к задаче? </p>
			<p class="ds-b6-box2-t1">Сделайте только один шаг - позвоните нам, остальные мы лёгкой походкой пройдём вместе.</p>
			<div class="ds-b6-box2-main">
				<div class="ds-b6-box2-main-colum">
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 1</span>
							<span class="b">Звонок в Veonix</span>  консультация <br>
							с маркетологом, выявление <br>
							ваших потребностей
						</p>
					</div>
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 2</span>
							<span class="b">Погружение в ваш бизнес, </span><br>
							изучение ниши, конкурентов, <br>
							продукта
						</p>
					</div>
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 3</span>
							<span class="b">Разработка дизайн концепции -</span> <br>
								из нескольких вариантов выбираете  <br>
								лучший для вас
						</p>
					</div>
				</div>
				<div class="ds-b6-box2-main-colum">
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 4</span>
							<span class="b">Написание текста, разработка <br>
							дизайна</span> - утверждаете результат <br>
							или возвращаете на доработку
						</p>
					</div>
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 5</span>
							<span class="b">Подготовка макета к печати -</span><br>
							он останется у вас, на случай, если<br>
							потребуется повторная печать
						</p>
					</div>
					<div class="ds-b6-box2-main-item">
						<p>
							<span>Шаг 6</span>
							<span class="b">Печать полиграфии и доставка -</span>
							привезём по любому указанному 
							адресу 
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ds-b7">
	<div class="main">
		<div class="ds-bg-zg ds-bg-5 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-5.jpg">
			<p>Станьте первым</p>
		</div>
	</div>
	<div class="main-970">
		<div class="ds-b7-box1">
			<p><span class="b">Реклама везде.</span> Она лавиной обрушивается на нас с утра и преследует до самого отбоя. Из каждого утюга сыпятся предложения что-то купить, посетить, попробовать, подлечить. </p>
			<p><span class="b">Но человеческий мозг и к этому адаптировался,</span> работает, как антиспам! А вы думали, откуда у людей такой стойкий иммунитет от рекламы? Ведь это он позволяет легко маневрировать между расставленных ловушек и стойко держаться от желания скупать всё подряд.</p>
			<p><span class="b">Что же теперь делать? Сворачивать бизнес?</span> Где найти брешь в этом иммунитете и достучаться до сознания покупателя? На самом деле, есть проверенный способ, который, при грамотном подходе, срабатывает безотказно. Против лома нет приёма, вы согласны?</p>
		</div>
		<p class="ds-zg">Согласитесь, никто не любит читать <br>скучные документы</p>
		<div class="ds-b7-box1">
			<p><span class="b">Люди научились ценить время и не хотят тратить его впустую</span> на рассматривание нелепых картинок и изучение текста, который не имеет ни малейшей ценности. Чтобы зацепить клиента недостаточно вывалить на буклет ведро неоновой краски и разрисовать её вензелями. Для этого нужна глубокая проработка и мастерство маркетолога, виртуозно владеющего триггерами и прочими штучками, завлекающими потребителя.
			</p>
			<p><span class="b">Сегодня за разработку дизайна печатной продукции берутся многие.</span> Только, к сожалению, не все ручаются за качество и результат. Именно поэтому бОльшая часть печатной рекламной продукции летит в мусор, так никогда и не прочитанная теми, кому она была адресована. </p>
			<p><span class="b">Но вы же хотите, чтобы у вас всё было совсем по-другому?</span> Чтобы каждая листовка приводила к вам за руку нового покупателя, а визитка становилась началом взаимовыгодного сотрудничества с достойным партнёром. Хотите заказать дизайн полиграфии премиум класса с гарантией качества? Тогда милости просим в студию Veonix. </p>		
		</div>

	</div>
</section>




<section class="ds-b8">
	<div class="main">
		<div class="ds-bg-zg ds-bg-6 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-6.jpg">
			<p>Популярные вопросы</p>
		</div>
		<div class="ds-b8-box">
			<div class="ds-b8-box-item">
				<div class="line"></div>
				<p class="ds-b8-box-item-tx-1">В нашей компании нет брендбука и фирменного стиля. Как мне заказать графический полиграфический дизайн?</p>
				<p class="ds-b8-box-item-tx-2">Каждый дизайн когда-то разрабатывался с нуля. Наши специалисты найдут решение, которое понравится вам и будет гармонировать со спецификой вашей компании.</p>
			</div>
			<div class="ds-b8-box-item">
				<div class="line"></div>
				<p class="ds-b8-box-item-tx-1">Под рекламную кампанию нужен раздаточный материал. Выбор завёл нас в тупик. Не хотелось бы ошибиться и выбросить деньги на ветер. Вы сможете нам помочь?</p>
				<p class="ds-b8-box-item-tx-2">Разработка полиграфического дизайна в Veonix всегда начинается с консультации маркетолога, который безошибочно выявит ваши потребности и вид полиграфии, который вам нужен.</p>
			</div>
			<div class="ds-b8-box-item">
				<div class="line"></div>
				<p class="ds-b8-box-item-tx-1">Почему такая символическая стоимость работы? За разработку дизайна полиграфической продукции аналогичные студии запрашивают от 2 тысяч рублей и до бесконечности!</p>
				<p class="ds-b8-box-item-tx-2">Мы не охотимся за клиентами, которые ничего не смыслят в ценнике, с целью наживаться на них. Мы занимаемся своим делом и предлагаем адекватные цены за продукт класса люкс.</p>
			</div>
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
        <p><a href="https://veonix.ru/blog/kak-obektivno-ocenit-kachestvo-dizajna/">Как объективно оценить качество дизайна?</a></p>
        <p><a href="https://veonix.ru/blog/kak-rabotat-s-dizajnerami/">Как работать с дизайнерами</a></p>
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
		"TYPE_TEXT" => "Коммерческое предложение, Визитка, Листовка, Годовой отчет, Каталог, Буклет, Флаер, Брошюра, Прессвол, Roll Up, Другое"
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
              "PARENT_SECTION" => "11",
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