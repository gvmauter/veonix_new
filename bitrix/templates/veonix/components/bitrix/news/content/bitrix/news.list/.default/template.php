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
<div class="content_page_list_row">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
 <? 
$renderImage = CFile::ResizeImageGet(
    $arItem["DETAIL_PICTURE"],
     Array("width" => 800, "height" => 800),
     BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false
); 

?>


                  <div class="home_blog_item">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="home_blog_item_img"><div class="lazy" data-bg="<?=$renderImage["src"]?>"></div></a>
                    <div class="home_blog_item_info">
                      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]; ?></a>
                      <? if ($arItem["IBLOCK_ID"]==22) {?>
                        <div class="home_blog_item_like <? $tx_post = "post_".$arItem["ID"]; if(isset($_COOKIE[$tx_post])){echo "home_blog_item_like_click_active";} ?>">
                          <p>
                            <span> <? echo  $arItem["PROPERTIES"]["LIKE"]["VALUE"] ?></span>
                            <i><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M16.6891 3.0097C16.2738 2.58929 15.7806 2.25578 15.2377 2.02825C14.6949 1.80071 14.1131 1.68359 13.5255 1.68359C12.9379 1.68359 12.3561 1.80071 11.8133 2.02825C11.2704 2.25578 10.7772 2.58929 10.3619 3.0097L9.49978 3.8818L8.63771 3.0097C7.79866 2.16089 6.66066 1.68403 5.47407 1.68403C4.28747 1.68403 3.14947 2.16089 2.31042 3.0097C1.47137 3.85851 1 5.00975 1 6.21015C1 7.41055 1.47137 8.56179 2.31042 9.4106L3.1725 10.2827L9.49978 16.6836L15.8271 10.2827L16.6891 9.4106C17.1047 8.99038 17.4344 8.49145 17.6593 7.9423C17.8842 7.39316 18 6.80457 18 6.21015C18 5.61573 17.8842 5.02714 17.6593 4.478C17.4344 3.92885 17.1047 3.42992 16.6891 3.0097Z" stroke="#545454" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg></i>
                          </p>
                        </div>
                      <? }?>
                    </div>
                  </div>

<?endforeach;?>

</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="block_nav_content">
	<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>
