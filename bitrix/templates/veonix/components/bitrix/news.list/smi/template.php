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

$nm = 0;
?>


<div class="home_smi_box ">
        <? if (count($arResult["ITEMS"])>6) {?><button class="drag_bt"><span>ТЯНИ</span></button><?} ?>
        
        <div class="home_smi_slide splide <? if (count($arResult["ITEMS"])>6) {?>anim_slider<?} ?>">
          <div class="splide__track">
            <div class="splide__list">
            

                <?foreach($arResult["ITEMS"] as $arItem): $nm++;?>
                          <div class="splide__slide">
                            <a aria-label="Читать статью №<?=$nm;?>" href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>" target="_blank" rel="noopener noreferrer">
                              <div class="home_smi_logo"><img width="44" height="28" class="lazy" data-src="<?=CFile::GetPath($arItem["PROPERTIES"]["LOGO"]["VALUE"])?>" alt="logo"></div>
                            </a>
                          </div>
                <?endforeach;?>



            </div>
          </div>
        </div>
        <? if (count($arResult["ITEMS"])>6) {?><div class="box_progress_bar"><span class="progress_bar"></span></div><?} ?>

      </div>








