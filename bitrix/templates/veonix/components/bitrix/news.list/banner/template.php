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





<section class="b1 b1_slider">
<div class="box_logos">
      <a href="https://bulatovo-residence.ru/" target="_blank" rel="noopener noreferrer"><span><img class="lazy bulatovo_lg" data-src="/bitrix/templates/veonix/assets/img/logo/bulatovo.svg" alt=""></span></a>
      <a href="https://sharapovo-usadba.ru/" target="_blank" rel="noopener noreferrer"><span><img class="lazy sharapovo_lg" data-src="/bitrix/templates/veonix/assets/img/logo/sharapovo.png" alt=""></span></a>
      <a href="https://xn----8sbgmvtjdwl0h.xn--p1ai/" target="_blank" rel="noopener noreferrer"><span><img class="lazy visota_lg" data-src="/bitrix/templates/veonix/assets/img/logo/visota.png" alt=""></span></a>
      <a href="https://xn----8sbakg3adg2bfm.xn--p1ai/" target="_blank" rel="noopener noreferrer"><span><img class="lazy hyde" data-src="/bitrix/templates/veonix/assets/img/logo/hyde.png" alt=""></span></a>
    </div>
  <div class="swiper-wrapper">
    
  <?foreach($arResult["ITEMS"] as $arItem):?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>
          <div class="swiper-slide">
              <div class="b1_box">
                <div class="b1_box_bg">
                  <div class="b1_box_bg_min" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"><div class="b1_box_bg_full lazy" data-bg="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>""></div></div>
                </div>
                <div class="main">
                  <div class="b1_box_content  wow animate__animated" data-wow="fadeInUp">
                    <? if( $nm == 1):?><h1 class="h1 dm"><?endif;?><? if( $nm != 1):?><h2 class="h1 dm"><?endif;?>
                      <?echo $arItem["PREVIEW_TEXT"]; ?>
                    <? if( $nm == 1):?></h1><?endif;?><? if( $nm != 1):?></h2><?endif;?>
                    <p><?echo $arItem["DETAIL_TEXT"];?></p>
                    <? if($arItem["PROPERTIES"]["URL"]["VALUE"]):?> <a href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>">Подробнее</a><?endif;?>
                  </div>
                </div>
              </div>
            </div>
 
                      <? $nm++;  ?>

    <?endforeach;?>



  </div>
  <div class="slider_nav  wow animate__animated" data-wow="fadeInRight">
    <button class="button-prev"></button>
    <div class="slider_number"></div>
    <button class="button-next"></button>
  </div>
  
</section>















