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




<div class="team_more_item">
	<div class="arrow_team">
		<?if(is_array($arResult["TOLEFT"]) and $arResult["TOLEFT"]["URL"] !="/nasha-komanda/"):?> 
		<a class="arrow_team_prev" href="<?=$arResult["TOLEFT"]["URL"]?>"><svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle cx="24.1157" cy="24.1504" r="23.3843" transform="rotate(-180 24.1157 24.1504)" stroke="#1D1D1D"/> <path d="M29.0598 34.0391L19.1711 24.1505L29.0598 14.2618" stroke="#1D1D1D"/> </svg></a> 
		<?endif?>
		<?if(is_array($arResult["TORIGHT"]) and $arResult["TORIGHT"]["URL"] !="/nasha-komanda/"):?> 
		<a class="arrow_team_next" href="<?=$arResult["TORIGHT"]["URL"]?>"><svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle cx="23.8843" cy="24.1505" r="23.3843" stroke="#1D1D1D"/> <path d="M18.9402 14.2618L28.8289 24.1504L18.9402 34.0391" stroke="#1D1D1D"/> </svg></a> 
		<?endif?>
	</div>
	<div class="team_more_item_photo"><img class="lazy" data-src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>"></div>
	<div class="team_more_item_info">
		<h1 class="h1"><?=$arResult["NAME"]?></h1>
		<div class="team_more_item_text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
	</div>
</div>

