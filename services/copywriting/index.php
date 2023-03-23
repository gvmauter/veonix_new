<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/kit.png");

$APPLICATION->SetPageProperty("description", "Закажите продающий копирайтинг для своего бизнеса. Пишем убедительные тексты для сайта, презентаций, маркетинг-китов, лендингов, коммерческих предложений.");
$APPLICATION->SetPageProperty("title", "Заказать копирайтинг в Москве — продающие тексты для бизнеса");

$APPLICATION->AddChainItem("Услуги","/services/"); 
$APPLICATION->AddChainItem("Копирайтинг");
 
 

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Заказать продающий",
		"TEMPLATE_FOR_TITLE2" => "   копирайтинг",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Напишем убедительные тексты <br> для сайта, презентации,
        маркетинг-кита, коммерческого предложения",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 <section class="portfolio_block portfolio_block_home">
    <div class="main">
      <h2 class="home_h2">Наши проекты</h2>
      <ul class="portfolio_top_list home_portfolio_top_list">
        <li data-id="all" class="active_cat"><p>Все кейсы</p></li>
        <li data-id="web"><p>Сайты</p></li>
        <li data-id="prezent"><p>Презентации</p></li>
        <li data-id="branding"><p>Брендинг</p></li>
      </ul>
    </div>
    <div class="portfolio_home">
      <div class="portfolio_home_box">

        <div class="portfolio_list" data-id="all">
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
                            "PARENT_SECTION" => "5",
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
        <div class="portfolio_list" data-id="web" style="display:none;">
          
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
                            "PARENT_SECTION" => "2",
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
        <div class="portfolio_list" data-id="prezent" style="display:none;">
      
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
        <div class="portfolio_list" data-id="branding" style="display:none;">
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
        <a href="/portfolio/">
          <span>Показать еще</span>
          <i></i>
        </a>
      </div>
    </div>
  </section>
  
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
 
      
     <? $APPLICATION->IncludeComponent(
         "veonix:form", 
         ".default", 
         array(
             "COMPONENT_TEMPLATE" => ".default",
             "TITLE_1" => "",
             "TITLE_2" => "",
             "TITLE_3" => "",
             "TYPE" => "text",
             "TYPE_TEXT" => "Копирайтинг, Презентация,  Брендбук, Многостраничный сайт, Лендинг,  Дизайн упаковки, Логотип, Маркетинг-кит, Коммерческое предложение, Видеоролик,   Другое"
         ),
         false
     );?>
      
      
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>