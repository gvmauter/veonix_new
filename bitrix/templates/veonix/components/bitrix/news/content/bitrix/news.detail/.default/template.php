<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


 
?>


<section class="page_class content_page_more">
	<div class="main">
    <div class="black_breadcrumbs_top"><?$APPLICATION->IncludeComponent( "bitrix:breadcrumb", "", Array( "PATH" => "", "SITE_ID" => "s1", "START_FROM" => "0" ) );?></div>
 
    <script>
      id_post = <? echo  $arResult["ID"]?>;
    </script>
		<div class="content_page_more_content">
      
			<div class="content_page_more_top">
        <div class="content_page_more_top_info">
          <? if ($arResult["IBLOCK_ID"]==22) {?>
            <p>Автор: <?if (!isset($arResult["PROPERTIES"]["AUTOR"]["VALUE"])) { echo $arResult["PROPERTIES"]["AUTOR"]["~VALUE"];} else {echo $arResult["PROPERTIES"]["AUTOR"]["~DEFAULT_VALUE"];};?></p>
          <? }?>
          <p><?=$arResult["DISPLAY_ACTIVE_FROM"];?></p>
        </div>
        <? if ($arResult["IBLOCK_ID"]==22) {?>
        <div class="content_page_more_top_like">
          <div class="home_blog_item_like home_blog_item_like_click <? $tx_post = "post_".$arResult["ID"]; if(isset($_COOKIE[$tx_post])){echo "home_blog_item_like_click_active";} ?>">
            <p>
              <span> <? echo  $arResult["PROPERTIES"]["LIKE"]["VALUE"] ?></span>
              <i><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M16.6891 3.0097C16.2738 2.58929 15.7806 2.25578 15.2377 2.02825C14.6949 1.80071 14.1131 1.68359 13.5255 1.68359C12.9379 1.68359 12.3561 1.80071 11.8133 2.02825C11.2704 2.25578 10.7772 2.58929 10.3619 3.0097L9.49978 3.8818L8.63771 3.0097C7.79866 2.16089 6.66066 1.68403 5.47407 1.68403C4.28747 1.68403 3.14947 2.16089 2.31042 3.0097C1.47137 3.85851 1 5.00975 1 6.21015C1 7.41055 1.47137 8.56179 2.31042 9.4106L3.1725 10.2827L9.49978 16.6836L15.8271 10.2827L16.6891 9.4106C17.1047 8.99038 17.4344 8.49145 17.6593 7.9423C17.8842 7.39316 18 6.80457 18 6.21015C18 5.61573 17.8842 5.02714 17.6593 4.478C17.4344 3.92885 17.1047 3.42992 16.6891 3.0097Z" stroke="#545454" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg></i>
            </p>
          </div>
        </div>
        <? }?>
			</div>
   
			<h1><?=$arResult["NAME"];?></h1>
			<div class="content_page_more_main">
        <? if ($arResult["IBLOCK_ID"]==23) {?>
          <img class="lazy" width="100%" data-src="<?=$arResult["DETAIL_PICTURE"]["SRC"];?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"];?>">
        <? }?>
				<?
        $new_sentence = str_replace("wp/","", $arResult["DETAIL_TEXT"]);
        $new_sentence = str_replace("https://veonix.ru","", $new_sentence);
        $new_sentence = str_replace("/wp-content/","https://veonix.ru/wp/wp-content/", $new_sentence);
        echo $new_sentence ;
         ?>
			</div>
		</div>

	</div>
</section>
<style>
  .new_el_<?echo $arResult["ID"];?> {
    width: 0 !important;
    height: 0 !important;
    overflow: hidden  !important;
  }
</style>


 


<section class="rec_box rec_box_news">
  <div class="main">
      <h2 class="home_h2">Рекомендуем</h2>
      <div class="home_blog_block_item" data-id="<?if($arResult["IBLOCK_ID"] == 22) {echo "blog";} else{echo "news";};?>"></div>
  
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
		"IBLOCK_ID" => $arResult["IBLOCK_ID"],
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
			0 => "",
			1 => "LIKE",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "TIMESTAMP_X",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
          </script>
  </div>
</section>




