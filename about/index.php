<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Студия графического дизайна Veonix оказывает полный спектр услуг в сфере создания креативного дизайна для бизнеса. Наша команда насчитывает более 20 чел.");
$APPLICATION->SetPageProperty("title", "О нас — студия графического дизайна Veonix — veonix.ru");

 
$APPLICATION->AddChainItem("О нас");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$APPLICATION->SetTitle("О нас");

$APPLICATION->SetPageProperty("title_block", "Студия графического дизайна Veonix");

?>


<? $APPLICATION->IncludeComponent(
    "bitrix:main.include","",
      Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/bitrix/templates/veonix/php/title_demo.php"
      )
);

 ?>
<div class="old_page">
    <div class="main">
        <section class="old_page_template page-news page-in"> 
       
                                <p><span >Мы создаем креативный дизайн для бизнеса любых масштабов и направлений.</span></p>
                                <p><span >Более 30 федеральных и международных компаний из промышленного и финансового секторов — наши постоянные заказчики. Также мы ведем плодотворное сотрудничество с государственными учреждениями.</span></p>
                                <p><span >Штат сотрудников студии Veonix — слаженная команда, в составе которой более 20 опытных профессионалов своих профилей: дизайнеры, иллюстраторы, маркетологи, разработчики, менеджеры.&nbsp;</span></p>
                                <p><span >Весь коллектив и каждый из нас упорно трудится, чтобы ваши проекты эффективно решали задачи бренда и вызывали восторг у аудитории.</span></p>
                                <div class="content_about">
                                <div class="item">С 2017<br>
                                года на рынке</div>
                                <div class="item">Более 500<br>
                                проектов реализовано</div>
                                <div class="item">Более 200 клиентов</div>
                                <div class="item">Более 20 крупнейших мировых компаний из списка Форбс</div>
                                <div class="item">Более 20 сотрудников в штате</div>
                                </div>
                                <p><span >Какие услуги мы предоставляем?</span></p>
                                <ul>
                                  <li  aria-level="1"><span >Брендинг, логотипы, фирменные стили</span></li>
                                  <li  aria-level="1"><span >Web-сайты, чат-боты, мобильные приложения</span></li>
                                  <li  aria-level="1"><span >Маркетинг-киты, презентации, полиграфия</span></li>
                                  <li  aria-level="1"><span >Видеопродакшен и Моушн-дизайн</span></li>
                                  <li  aria-level="1"><span >Настройка и обучение работе в amoCRM</span></li>
                                  <li  aria-level="1"><span >PR и реклама</span></li>
                                </ul>
                                <p><iframe loading="lazy" style="max-width: 100%; height: 70vh;" title="YouTube video player" class="lazy" data-src="https://www.youtube.com/embed/C2SRYSihwiE" width="100%" height="50vh" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>
                                       
     
        </section>
    </div>
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
<div class="old_page rekv team_old_page">
    <div class="main">
   
 		<h2 class="home_h2" style=" text-align: left; margin: 0 0 4vw; ">Наш офис</h2>
		<div style="display: flex;justify-content: space-between;"><img src="https://veonix.ru/wp/wp-content/themes/veonix/img/IMG_1291.jpg" style="width: 30%;"><img src="https://veonix.ru/wp/wp-content/themes/veonix/img/IMG_1277.jpg" style="width: 30%;"><img src="https://veonix.ru/wp/wp-content/themes/veonix/img/IMG_1268.jpg" style="width: 30%;"></div>
		<br><br><br><br>
      <h2>Реквизиты</h2>
		<div style="width: 100%;
    overflow: auto;
    display: block;">
			<table>
				<tbody>
					<tr>
						<td>ИНН:</td>
						<td>710407135800</td>
					</tr>
					<tr>
						<td>ОГРНИП:</td>
						<td>317715400000700</td>
					</tr>
					<tr>
						<td>Банк:</td>
						<td>АО «РАЙФФАЗЕЙНБАНК» г. Москва</td>
					</tr>
					<tr>
						<td>Расчетный счет:</td>
						<td>4080 2810 1000 0001 9719</td>
					</tr>
					<tr>
						<td>Корреспондентский счет:</td>
						<td>3010 1810 2000 0000 0700</td>
					</tr>
					<tr>
						<td>БИК:</td>
						<td>БИК</td>
					</tr>
				</tbody>
			</table>
		</div>
	 
         
    </div>
</div>
<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>