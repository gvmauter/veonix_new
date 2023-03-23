<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

 
if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>
<div class="main-ui-pagination">
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<?
if($arResult["bDescPageNumbering"] === true):
?>
	<div class="main-ui-pagination-pages">
	 
		<div class="main-ui-pagination-pages-list">
<?
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
			if($arResult["bSavePage"]):
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">01</a>
<?
			else:
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">01</a>
<?
			endif;
			if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intval($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a>
<?
			endif;
		endif;
	endif;

	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
			<span class="main-ui-pagination-page main-ui-pagination-active"><?=$NavRecordGroupPrint?></span>
<?
		elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
<?
		else:
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
<?
		endif;

		$arResult["nStartPage"]--;
	}
	while($arResult["nStartPage"] >= $arResult["nEndPage"]);

	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nEndPage"] > 1):
			if ($arResult["nEndPage"] > 2):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">...</a>
<?
			endif;
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	endif;
?>
		</div>
	</div>














	
	<div class="main-ui-pagination-arrows">
<?
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if($arResult["bSavePage"]):
?>
			<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Назад</a>
<?
		else:
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=Getnav_prevage("MAIN_UI_PAGINATION__PREV")?></a>
<?
			else:
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Назад</a>
<?
			endif;
		endif;
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-prev">Назад</span>
<?
	endif;

	if ($arResult["bShowAll"]):
		if ($arResult["NavShowAll"]):
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a>
<?
		else:
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a>
<?
		endif;
	endif;

	if ($arResult["NavPageNomer"] > 1):
?>
		<a class="main-ui-pagination-arrow main-ui-pagination-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Вперед</a>
<?
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-next">Вперед</span>
<?
	endif;
?>
	</div>
<?
else:
?>
	<div class="main-ui-pagination-pages">
		<div class="main-ui-pagination-label"><?=GetMessage("MAIN_UI_PAGINATION__PAGES")?></div>
		<div class="main-ui-pagination-pages-list">
<?
	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nStartPage"] > 1):
			if($arResult["bSavePage"]):
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">01</a>
<?
			else:
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">01</a>
<?
			endif;
			if ($arResult["nStartPage"] > 2):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
			<span class="main-ui-pagination-page main-ui-pagination-active"><? if ($arResult["nStartPage"]<10) {echo "0";}?><?=$arResult["nStartPage"]?></span>
<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><? if ($arResult["nStartPage"]<10) {echo "0";}?><?=$arResult["nStartPage"]?></a>
<?
		else:
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><? if ($arResult["nStartPage"]<10) {echo "0";}?><?=$arResult["nStartPage"]?></a>
<?
		endif;
		$arResult["nStartPage"]++;
	}
	while($arResult["nStartPage"] <= $arResult["nEndPage"]);

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a>
<?
			endif;
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><? if ($arResult["NavPageCount"]<10) {echo "0";}?><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	endif;
?>
		</div>
	</div>


<?
	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
			<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
<?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
<?
			else:
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">Назад</a>
<?
			endif;

		endif;
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-prev">Назад</span>
<?
	endif;
?>


<?
	if ($arResult["bShowAll"]):
		if ($arResult["NavShowAll"]):
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a>
<?
		else:
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a>
<?
		endif;
	endif;

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
?>
		<a class="main-ui-pagination-arrow main-ui-pagination-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Вперед</a>
<?
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-next">Вперед</span>
<?
	endif;
?>
	
<?
endif;
?>
</div>