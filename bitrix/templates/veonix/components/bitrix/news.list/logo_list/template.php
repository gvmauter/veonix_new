<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); /** @var array $arParams */ /** @var array $arResult */ /** @global CMain $APPLICATION */ /** @global CUser $USER */ /** @global CDatabase $DB */ /** @var CBitrixComponentTemplate $this */ /** @var string $templateName */ /** @var string $templateFile */ /** @var string $templateFolder */ /** @var string $componentPath */ /** @var CBitrixComponent $component */ $this->setFrameMode(true); // номер текущей страницы $curPage = $arResult["NAV_RESULT"]->NavPageNomer; // всего страниц - номер последней страницы $totalPages = $arResult["NAV_RESULT"]->NavPageCount; // номер постраничной навигации на странице $navNum = $arResult["NAV_RESULT"]->NavNum; $nm = 1; ?> 
<section class="home_clients"> 
    <div class="main">  
        <div class="home_clients_box" style=" cursor: default; ">  
                <div class="home_clients_box_list">   
                    <? $it=0; foreach($arResult["ITEMS"] as $arItem): $id++;?> 
                        <? foreach($arItem["PROPERTIES"]["LOGO"]["VALUE"] as $logo):   ?> 
                            <div class="splide__slide home_clients__logo">
                                <img  width="40" height="40" class="lazy splide__slide home_clients__logo" data-src="<?=CFile::GetPath($logo)?>" alt="logo">
                            </div> 
                        <?  endforeach;?>
                    <?endforeach;?>   
                </div> 
      
        </div> 
    </div> 
 </section>
 