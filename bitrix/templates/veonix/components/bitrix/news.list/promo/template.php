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

// номер текущей страницы
$curPage = $arResult["NAV_RESULT"]->NavPageNomer;
// всего страниц - номер последней страницы
$totalPages = $arResult["NAV_RESULT"]->NavPageCount;
// номер постраничной навигации на странице
$navNum = $arResult["NAV_RESULT"]->NavNum;

$nm = 1;
?>






  <?foreach($arResult["ITEMS"] as $arItem):?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

<div class="prom_b2_item wow animate__animated" data-wow="fadeInUp">
          <div class="prom_b2_left">
            <div class="prom_b2_top">
              <p class="prom_b2_promo_name">
                <i><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="#FF792E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </svg></i>
                <span><? echo  $arItem["PROPERTIES"]["TYPE"]["VALUE"] ?></span>
              </p>
              <p class="date"><? echo FormatDateFromDB($arItem["DATE_CREATE"], 'SHORT'); ?></p>
            </div>
            <div class="prom_b2_center">
              <a href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>">
                <h2 class="promo_h2"><?=htmlspecialcharsBack($arItem["PROPERTIES"]["TITLE"]["VALUE"]["TEXT"])?></h2>
              </a>
            </div>
            <div class="prom_b2_bottom">
            <? if($arItem["PROPERTIES"]["URL"]["VALUE"]):?> <a href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>">Подробнее</a><?endif;?>
           
              <p><?echo $arItem["PREVIEW_TEXT"]; ?></p>
            </div>
          </div>
          <div class="prom_b2_right">
            <div class="prom_b2_item_photo lazy" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"><div class="b1_box_bg_full lazy" data-bg="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"></div>
          </div>
        </div>







   
    <?endforeach;?>

















