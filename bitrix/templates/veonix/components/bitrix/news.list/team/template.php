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

<div class="ptf_team_box">

  <?foreach($arResult["ITEMS"] as $arItem): if ($arItem["PROPERTIES"]["TEAM_ACTIVE"]["VALUE"]) {
   ?>
      <?if ($arItem["CODE"]) { echo '<a href="'.$arItem["DETAIL_PAGE_URL"].'"';} else {echo "<div ";}?> class="ptf_team_item" itemscope="" itemtype="https://schema.org/Person">
          <div class="ptf_team_photo lazy" data-bg="<?=CFile::GetPath($arItem["PROPERTIES"]["PHOTO"]["VALUE"])?>" alt="<? echo  $arItem["NAME"]?>"></div>
          <div class="ptf_team_item_info">
            <p class="ptf_team_item_name" itemprop="name" ><? echo  $arItem["NAME"]?></p>
            <p class="ptf_team_item_text" itemprop="jobTitle"><? echo  $arItem["PROPERTIES"]["DOLJ"]["VALUE"] ?></p>
          </div>
      <?if ($arItem["CODE"]) { echo '</a>';} else {echo "</div>";}?>


   
    <? }; endforeach;?>


    </div>


        
  
















