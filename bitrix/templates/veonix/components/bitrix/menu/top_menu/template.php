<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="header_menu">
<nav>
<?if (!empty($arResult)):?>
<ul >

<?
$previousLevel = 0;
$nmbr = -1;
foreach($arResult as $arItem2): 
if ($arItem2["PARAMS"]["FROM_IBLOCK"]==1) {	$nmbr++;}?>
<?endforeach?>
<?$nmbr_html=-1; $center_box = ceil($nmbr/2);foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></nav></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=htmlspecialcharsbx($arItem["TEXT"])?> <i class="arrows_menu"></i></a>
				<div class="menu_child"><nav><ul>
		<?else:?>
			<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="parent"><span><?=htmlspecialcharsbx($arItem["TEXT"])?></span></a>
				<div class="menu_child"><nav><ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=htmlspecialcharsbx($arItem["LINK"])?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><span><?=htmlspecialcharsbx($arItem["TEXT"])?></span>
					<? if ($arItem["PARAMS"]["ICON"]=="new_icon") {?><i class="icon_new lazy" data-bg="/bitrix/templates/veonix/assets/img/new_bg.jpg"></i><?}?>
				</a></li>
			<?else:?>
				<li class='<?if ($arItem["SELECTED"]):?> item-selected<?endif?>'><a class="<?echo $arItem["PARAMS"]["ICON"]?>" href="<?=htmlspecialcharsbx($arItem["LINK"])?>"><span><?=htmlspecialcharsbx($arItem["TEXT"])?></span></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?
	if ($arItem["PARAMS"]["FROM_IBLOCK"]==1) {
		$nmbr_html++;
	}
	if ($arItem["PARAMS"]["FROM_IBLOCK"]==1 and $nmbr_html==$center_box ) {
		echo "</ul><ul>";
	}
	
	
	$previousLevel = $arItem["DEPTH_LEVEL"];?>

	
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></nav></div></li>", ($previousLevel-1) );?>
<?endif?>

</ul>

</nav>
</div>
<?endif?>