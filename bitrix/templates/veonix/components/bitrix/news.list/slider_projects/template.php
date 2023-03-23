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
 
if ($APPLICATION->GetProperty('errors_page')=="true") {
  $title = "Наши <br>проекты";
} else {
  $title = "другие <br>проекты";
}
?>

    <div class="ptf_projects">
      <div class="main">
        <h2 class="h2_2"><?=$title;?></h2>
        <div class="ptf_projects_slider splide">
          <div class="ptf_projects_slider_arrows">
            <button class="arrows_bt arrows_bt_prev ptf_projects_slider_prev"></button>
            <button class="arrows_bt arrows_next ptf_projects_slider_next"></button>
          </div>
          <div class="splide__track">
          <div class="splide__list">
            <?foreach($arResult["ITEMS"] as $arItem):?>
              <?
              $SLIDE_PHOTO = CFile::ResizeImageGet(
                $arItem["PROPERTIES"]["SLIDER_PHOTO"]["VALUE"],
                Array("width" => 460, "height" => 460),
                BX_RESIZE_IMAGE_EXACT, true
              );
               
              ?>
 
              <div class="splide__slide">
                <div class="ptf_projects_item">
                  <a href="<?echo $arItem["DETAIL_PAGE_URL"];?>">
                    <i class="lazy" data-bg="<?echo $SLIDE_PHOTO["src"];?>"></i>
                    <span><?echo $arItem["NAME"];?></span>
                  </a>
                </div>
              </div>            
            <?endforeach;?>
          </div>
          </div>
        </div>
      </div>
    </div>




      


  



    








