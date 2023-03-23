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


<section class="home_service">
    <div class="main">
      <h2 class="home_h2">Что мы делаем</h2>
      <p class="home_service_descript">Помогаем компаниям любых размеров расти, <br><span>зарабатывать больше и завоевывать любовь</span> — <br>при помощи дизайна</p>
      
      
      <div class="home_service_box splide">
        <div class="splide__track">
          <div class="splide__list"> 

 
  <?foreach($arResult["ITEMS"] as $arItem):?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    
      ?>
 
          <div class="home_service_item splide__slide">
            <a href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>" aria-label="<? echo  $arItem["NAME"]?>"></a>
            <div class="home_service_item_info">
              <div class="home_service_item_info_box">
                <p class="home_service_item_name"><? echo  $arItem["NAME"]?></p>
                <div class="home_service_item_value"><? echo  $arItem["PROPERTIES"]["INFO"]["VALUE"] ?></div>
                <div class="home_service_item_info_price">
                  <p><? echo  $arItem["PROPERTIES"]["PRICE"]["VALUE"] ?> ₽</p>
                </div>
              </div>
              <div class="home_service_item_image"><img class="lazy <? echo  $arItem["CODE"]?>" width="100" height="100" data-src="<?=CFile::GetPath($arItem["PROPERTIES"]["PHOTO"]["VALUE"])?>" alt="<? echo  $arItem["NAME"]?>"></div>
              <div class="home_service_item_bg"></div>
            </div>
          </div>

 
   
    <?endforeach;?>
    </div>



    </div>
      </div>



      <div class="bt_black_bg bt_white_bg">
        <a href="/services/" aria-label="Все услуги">
          <span>Все услуги</span>
          <i></i>
        </a>
      </div>
    </div>
  </section>

















