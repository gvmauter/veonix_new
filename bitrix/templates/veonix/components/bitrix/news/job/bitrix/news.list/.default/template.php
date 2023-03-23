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
$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Вакансии");


?>
<div class="job_box">
  <div class="main"> 
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
 <? 
 

?>


                  <div class="job_box_item" >
                    <div class="job_box_item_top">
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]; ?></a>
                      <p><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?></p>
                    </div>
                    <div class="job_box_item_text">
                      <p><?=$arItem["PREVIEW_TEXT"];?></p>
                    </div>
                    <div class="job_box_item_text_bottom">
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a>
                      <p><?=$arResult["DISPLAY_ACTIVE_FROM"];?></p>
                    </div>
 
                  </div>

<?endforeach;?>

</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="block_nav_content">
	<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>
</div>