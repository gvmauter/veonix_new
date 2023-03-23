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


<section class="portfolio_block portfolio_block_home portfolio_block_all_list">
<div class="main">
 	 <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array( "START_FROM" => "0", "PATH" => "/", "SITE_ID" => "s1" ) );?>  



      <h1 class="home_h2">
	  	<? if ($APPLICATION->GetCurPage(false) === '/portfolio/'): ?><?$APPLICATION->ShowTitle("",false);?><? endif; ?>
		<? if ($APPLICATION->GetCurPage(false) === '/portfolio/websites/'): ?>Портфолио <br> по web-сайтам<? endif; ?>
		<? if ($APPLICATION->GetCurPage(false) === '/portfolio/presentations/'): ?>Портфолио <br> по презентациям<? endif; ?>
		<? if ($APPLICATION->GetCurPage(false) === '/portfolio/branding/'): ?>Портфолио <br> по брендингу<? endif; ?>
	  </h1>
	  <p class="home_h2_desc">За время работы мы выполнили более 500 проектов. <br>На сайте представлена лишь малая часть.</p>
      <ul class="portfolio_top_list">
        <li <? if ($APPLICATION->GetCurPage(false) === '/portfolio/'): ?> class="active_cat" <? endif; ?>><a href="/portfolio/">Все кейсы</a></li>
        <li <? if ($APPLICATION->GetCurPage(false) === '/portfolio/websites/'): ?> class="active_cat" <? endif; ?>><a href="/portfolio/websites/">Сайты</a></li>
        <li <? if ($APPLICATION->GetCurPage(false) === '/portfolio/presentations/'): ?> class="active_cat" <? endif; ?>><a href="/portfolio/presentations/">Презентации</a></li>
        <li <? if ($APPLICATION->GetCurPage(false) === '/portfolio/branding/'): ?> class="active_cat" <? endif; ?>><a href="/portfolio/branding/">Брендинг</a></li>
      </ul>
    </div>

	
    <div class="portfolio_home">
      <div class="portfolio_home_box">
	  <? CJSCore::Init(array("jquery")); ?>
			<?if($_POST['AJAX']=='Y') $APPLICATION->RestartBuffer();?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"home_portfolio",
				Array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"NEWS_COUNT" => $arParams["NEWS_COUNT"],
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX" => $_REQUEST["AJAX"],
					"SORT_BY1" => $arParams["SORT_BY1"],
					"SORT_ORDER1" => $arParams["SORT_ORDER1"],
					"SORT_BY2" => $arParams["SORT_BY2"],
					"SORT_ORDER2" => $arParams["SORT_ORDER2"],
					"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
					"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
					"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"MESSAGE_404" => $arParams["MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
					"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
					"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
					"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
					"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
					"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
					"CHECK_DATES" => $arParams["CHECK_DATES"],
				),
				$component
			);?>


      </div>
    </div>
  </section>