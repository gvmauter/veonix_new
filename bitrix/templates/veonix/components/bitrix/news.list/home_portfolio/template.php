<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); /** @var array $arParams */ /** @var array $arResult */ /** @global CMain $APPLICATION */ /** @global CUser $USER */ /** @global CDatabase $DB */ /** @var CBitrixComponentTemplate $this */ /** @var string $templateName */ /** @var string $templateFile */ /** @var string $templateFolder */ /** @var string $componentPath */ /** @var CBitrixComponent $component */ $this->setFrameMode(true); // номер текущей страницы $curPage = $arResult["NAV_RESULT"]->NavPageNomer; // всего страниц - номер последней страницы $totalPages = $arResult["NAV_RESULT"]->NavPageCount; // номер постраничной навигации на странице $navNum = $arResult["NAV_RESULT"]->NavNum; $nm = 1; ?> 
<div class="row_portfolio_list"> 
    <?foreach($arResult["ITEMS"] as $arItem):?> 
        <? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")); $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); if ($arItem['IBLOCK_SECTION_ID']==2) {$cat_name = "Сайты";} if ($arItem['IBLOCK_SECTION_ID']==3) {$cat_name = "Презентации";} if ($arItem['IBLOCK_SECTION_ID']==4) {$cat_name = "Брендинг";} ?> 
        
        <? 
        $resImage = CFile::ResizeImageGet( $arItem["PROPERTIES"]["PREV"]["VALUE"], array("width" => 50, "height" => 390), BX_RESIZE_IMAGE_PROPORTIONAL );
        $resImage_FULL = CFile::ResizeImageGet( $arItem["PROPERTIES"]["PREV"]["VALUE"], array("width" => 850, "height" => 3900), BX_RESIZE_IMAGE_PROPORTIONAL );
        
        ?> 
        <div class="row_portfolio_item" style="background-image: url(<?=$resImage["src"];?>);"  > 
            <img class="row_portfolio_item_full" src="<?=$resImage_FULL["src"];?>" alt="<?=$arItem["PROPERTIES"]["CLIENT"]["VALUE"];?>">
            <? if ($arItem["PROPERTIES"]["NEW"]["VALUE"]) {?> 
                <img class="lazy box_new" width="67" height="47" data-src="/bitrix/templates/veonix/assets/img/new_label.svg" alt="svg">
            <? } ?> 
            <div class="row_portfolio_item_text"> 
                <div class="row_portfolio_item_main_top"> 
                    <div class="row_portfolio_item_logo">
                        <img  width="30" height="30" class="lazy" data-src="<?=CFile::GetPath($arItem["PROPERTIES"]["LOGO"]["VALUE"])?>" alt="<?=$arItem["PROPERTIES"]["CLIENT"]["VALUE"];?>"></div> 
                        <div class="row_portfolio_item_info"> 
                            <p><b>Клиент:</b> <span><?=$arItem["PROPERTIES"]["CLIENT"]["VALUE"];?></span></p> 
                            <p><b>Задача:</b> <span><?=$arItem["PROPERTIES"]["ZADACH"]["VALUE"];?></span></p> 
                            <p><b>Категория: </b> <span><?=$cat_name;?></span></p> 
                        </div> 
                    </div> 
                    <a href="<? echo  $arItem["DETAIL_PAGE_URL"]?>" aria-label="Открыть кейс <?=$arItem["PROPERTIES"]["CLIENT"]["VALUE"];?>">ПОКАЗАТЬ ДЕТАЛИ</a> 
                </div> 
            </div> 
            <?endforeach;?> 
        </div>