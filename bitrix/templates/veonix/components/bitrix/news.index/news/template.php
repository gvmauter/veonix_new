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
<?$LINE_ELEMENT_COUNT=2;?>

 



<section class="news_b2">
  <div class="main">
  <? if(count($arResult["IBLOCKS"][1]["ITEMS"]) or count($arResult["IBLOCKS"][1]["ITEMS"]) or count($arResult["IBLOCKS"][1]["ITEMS"])):?>

    <h2 class="h2 wow animate__animated" data-wow="fadeInUpBig">Вам может быть интересно</h2>
	<? endif; ?>
    <div class="press_b2_box ">
      <div class="press_b2_block" >
     
 







<?
$cell = 0;
foreach($arResult["IBLOCKS"] as $arIBlock):?>

				<?foreach($arIBlock["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNI_ELEMENT_DELETE_CONFIRM')));
				?>
				   <div class="press_b2_item wow animate__animated" data-wow="fadeInUp">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="press_b2_photo lazy" data-bg="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"></a>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="press_b2_title"><?=$arItem["NAME"]?></a>
						<p><?echo $arItem["PREVIEW_TEXT"]; ?></p>
					</div>

				<?endforeach;?>

	<?
	if((++$cell)>=$LINE_ELEMENT_COUNT):
		$cell = 0;
	?><?
	endif; // if($n%$LINE_ELEMENT_COUNT == 0):
endforeach;
		while ($cell<$LINE_ELEMENT_COUNT):
			$cell++;
		?><?
		endwhile;
		?>

</div>
    </div>
  </div>
</section>

