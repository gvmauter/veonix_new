<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404");
$APPLICATION->SetPageProperty("errors_page", "true");
// $APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
// 	"LEVEL"	=>	"3",
// 	"COL_NUM"	=>	"2",
// 	"SHOW_DESCRIPTION"	=>	"Y",
// 	"SET_TITLE"	=>	"Y",
// 	"CACHE_TIME"	=>	"36000000"
// 	)
// );
 
?>

<div class="error_page">
	<div class="main">
		<div class="error_page_logo">
			<svg width="521" height="332" viewBox="0 0 521 332" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0V6.10491C21.1936 6.10491 47.0973 13.1984 88.996 111.282L90.9494 116.146C91.6269 117.813 93.5645 118.565 95.1872 117.776C96.6469 117.066 97.3138 115.341 96.7099 113.832L95.1188 109.878C88.0613 92.4308 71.1002 6.10491 137.994 6.10491V0H0Z" fill="url(#paint0_linear_1767_222)"/>
			<path d="M511.782 234.384C501.889 328.708 371.903 325.884 371.903 325.884H359.573C357.888 325.884 356.522 327.262 356.522 328.94C356.522 330.633 357.888 332 359.573 332H517.905V234.384H511.782Z" fill="url(#paint1_linear_1767_222)"/>
			<path d="M356.544 0H203.001V6.10491C238.771 6.10491 216.654 60.8335 216.654 60.8335L205.022 88.2926L203.657 91.5158L144.11 232.023L144.089 231.955L140.796 239.696L178.021 332H188.876C309.441 54.2238 315.543 44.3119 315.543 44.3119C331.559 6.58342 343.809 6.58342 356.538 6.10491H371.919C371.919 6.10491 500.021 6.58341 505.665 93.3563H511.799V0H356.544Z" fill="url(#paint2_linear_1767_222)"/>
			<path d="M448.677 108.947C443.5 162.203 382.729 161.257 382.729 161.257H375.597C373.24 161.325 371.896 161.257 371.896 161.257H359.592C357.912 161.257 356.499 162.676 356.499 164.354C356.499 166.037 357.912 167.393 359.592 167.393H375.597H382.729C382.729 167.393 443.5 166.909 448.677 219.76H454.795V108.947H448.677Z" fill="url(#paint3_linear_1767_222)"/>
			<defs>
			<linearGradient id="paint0_linear_1767_222" x1="68.997" y1="0" x2="68.997" y2="118.09" gradientUnits="userSpaceOnUse">
			<stop stop-color="#A72FBA"/>
			<stop offset="1" stop-color="#2359C8"/>
			</linearGradient>
			<linearGradient id="paint1_linear_1767_222" x1="437.214" y1="234.384" x2="437.214" y2="332" gradientUnits="userSpaceOnUse">
			<stop stop-color="#A72FBA"/>
			<stop offset="1" stop-color="#2359C8"/>
			</linearGradient>
			<linearGradient id="paint2_linear_1767_222" x1="326.297" y1="0" x2="326.297" y2="332" gradientUnits="userSpaceOnUse">
			<stop stop-color="#A72FBA"/>
			<stop offset="1" stop-color="#2359C8"/>
			</linearGradient>
			<linearGradient id="paint3_linear_1767_222" x1="405.647" y1="108.947" x2="405.647" y2="219.76" gradientUnits="userSpaceOnUse">
			<stop stop-color="#A72FBA"/>
			<stop offset="1" stop-color="#2359C8"/>
			</linearGradient>
			</defs>
			</svg>

		</div>
		<div class="error_page_title">
			<h1>Ошибка 404</h1>
			<p>Такой страницы не существует</p>
		</div>
		<div class="error_page_bt">
			<a href="/"   class="button_line" >
				<span>На главную</span>
				<i class="button_line_1"><img class="svg-animate button_line_1_icon" src="<?=SITE_TEMPLATE_PATH?>/assets/img/button_line_1.svg" alt="button icon"></i>
			</a>
		</div>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider_projects", 
	array(
		"IBLOCK_TYPE" => "portfolio",
		"ACTIVE_ELEMENT" => $team["ID"],
		"IBLOCK_ID" => "",
		"NEWS_COUNT" => "40",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "SLIDER_PHOTO",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"COMPONENT_TEMPLATE" => "slider_projects",
		"FILE_404" => ""
	),
	false
);?>


<section class="home_blog">
    <div class="main">
      <h2 class="home_h2">Блог о дизайне</h2>
      <div class="home_blog_box">
        <div class="home_blog_top">
          <ul class="home_blog_top_list">
            <li data-id="news" data-url="/novosti/" data-text="Все новости"><p>Новости Veonix</p></li>
            <li data-id="blog"  data-url="/blog/" data-text="Все статьи" class="active_cat"><p>Полезные статьи</p></li>
          </ul>
          <a href="/blog/"  class="button_line" >
            <span>Все статьи</span>
            <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
          </a>
        </div>
        <div class="home_blog_block">
          <div class="home_blog_block_item"  data-id="news" style="display:none;">
              <?$APPLICATION->IncludeComponent(
                "bitrix:news.list", 
                "news", 
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
                  "COMPONENT_TEMPLATE" => "news",
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
                  "IBLOCK_ID" => "23",
                  "IBLOCK_TYPE" => "content",
                  "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                  "INCLUDE_SUBSECTIONS" => "Y",
                  "MESSAGE_404" => "",
                  "NEWS_COUNT" => "12",
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
                    0 => "LIKE",
                    1 => "",
                  ),
                  "SET_BROWSER_TITLE" => "N",
                  "SET_LAST_MODIFIED" => "N",
                  "SET_META_DESCRIPTION" => "N",
                  "SET_META_KEYWORDS" => "N",
                  "SET_STATUS_404" => "N",
                  "SET_TITLE" => "N",
                  "SHOW_404" => "N",
                  "SORT_BY1" => "ACTIVE_FROM",
                  "SORT_BY2" => "SORT",
                  "SORT_ORDER1" => "DESC",
                  "SORT_ORDER2" => "ASC",
                  "STRICT_SECTION_CHECK" => "N"
                ),
                false
            );?> 
          </div>
          <div class="home_blog_block_item" data-id="blog">
             <?$APPLICATION->IncludeComponent(
                "bitrix:news.list", 
                "news", 
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
                  "COMPONENT_TEMPLATE" => "news",
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
                  "IBLOCK_ID" => "22",
                  "IBLOCK_TYPE" => "content",
                  "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                  "INCLUDE_SUBSECTIONS" => "Y",
                  "MESSAGE_404" => "",
                  "NEWS_COUNT" => "12",
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
                    0 => "LIKE",
                    1 => "",
                  ),
                  "SET_BROWSER_TITLE" => "N",
                  "SET_LAST_MODIFIED" => "N",
                  "SET_META_DESCRIPTION" => "N",
                  "SET_META_KEYWORDS" => "N",
                  "SET_STATUS_404" => "N",
                  "SET_TITLE" => "N",
                  "SHOW_404" => "N",
                  "SORT_BY1" => "ACTIVE_FROM",
                  "SORT_BY2" => "SORT",
                  "SORT_ORDER1" => "DESC",
                  "SORT_ORDER2" => "ASC",
                  "STRICT_SECTION_CHECK" => "N"
                ),
                false
            );?>
             
          </div>
        </div>

        
          
<br><br><br><br><br>






      </div>
    </div>
  </section>

<?


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>