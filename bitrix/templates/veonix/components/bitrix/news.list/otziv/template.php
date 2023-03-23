<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); /** @var array $arParams */ /** @var array $arResult */ /** @global CMain $APPLICATION */ /** @global CUser $USER */ /** @global CDatabase $DB */ /** @var CBitrixComponentTemplate $this */ /** @var string $templateName */ /** @var string $templateFile */ /** @var string $templateFolder */ /** @var string $componentPath */ /** @var CBitrixComponent $component */ $this->setFrameMode(true); // номер текущей страницы $curPage = $arResult["NAV_RESULT"]->NavPageNomer; // всего страниц - номер последней страницы $totalPages = $arResult["NAV_RESULT"]->NavPageCount; // номер постраничной навигации на странице $navNum = $arResult["NAV_RESULT"]->NavNum; $nm = 1; ?> <div class="home_clientabout_box"> <button class="drag_bt drag_bt_noscroll"><span>ТЯНИ</span></button> <div class="home_clientabout_slide anim_slider splide"> <div class="splide__track"> <div class="splide__list"> <?foreach($arResult["ITEMS"] as $arItem):?> <? $dateCreate = CIBlockFormatProperties::DateFormat( 'Y-m-d', MakeTimeStamp( $arItem["DATE_ACTIVE_FROM"], CSite::GetDateFormat() ) ); ?> <div class="splide__slide"> <div class="home_clientabout_item" itemscope itemtype="https://schema.org/Review" > <meta itemprop="datePublished" content="<?echo $dateCreate; ?>"> <link itemprop="url" href="<?echo $APPLICATION->GetCurPage();?>" /> <div style="display:none;" itemprop="itemReviewed" itemscope="" itemtype="https://schema.org/Organization"> <meta itemprop="name" content="Veonix"> <meta itemprop="address" content="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","adress"));?>"> <meta itemprop="telephone" content="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"> </div> <div class="home_clientabout_item_main"> <div class="home_clientabout_item_main_top"> <? if ($arItem["NAME"] != "NO_NAME") {?> <div class="home_clientabout_item_name" itemprop="author"><p><?=htmlspecialcharsBack($arItem["NAME"])?></p></div> <?} ?> <div class="home_clientabout_item_text" itemprop="reviewBody"><?echo str_replace(array("\r", "\n"), '', $arItem["DETAIL_TEXT"]); ?> </div> </div> <div class="home_clientabout_item_bottom"> <div class="home_clientabout_item_stars"> <svg width="110" height="22" viewBox="0 0 110 22" fill="none" xmlns="http://www.w3.org/2000/svg"> <?  $stars = (int)$arItem["PROPERTIES"]["STARS"]["VALUE"];  ?> <path d="M9.81095 2.0479C9.95048 1.61847 10.558 1.61847 10.6975 2.0479L12.4518 7.44703C12.5142 7.63907 12.6932 7.7691 12.8951 7.7691H18.5721C19.0236 7.7691 19.2113 8.34688 18.8461 8.61228L14.2533 11.9491C14.0899 12.0678 14.0216 12.2782 14.084 12.4702L15.8382 17.8694C15.9778 18.2988 15.4863 18.6559 15.121 18.3905L10.5282 15.0537C10.3648 14.935 10.1436 14.935 9.98027 15.0537L5.38749 18.3905C5.0222 18.6559 4.53071 18.2988 4.67024 17.8694L6.42452 12.4702C6.48692 12.2782 6.41856 12.0678 6.2552 11.9491L1.66242 8.61228C1.29713 8.34689 1.48487 7.7691 1.93639 7.7691H7.61337C7.8153 7.7691 7.99426 7.63907 8.05666 7.44703L9.81095 2.0479Z"  <? if ($stars >= 1) { echo "fill=\"#9E65FD\"";} else {echo "fill=\"#D5D5D5\"";}?>/> <path d="M32.184 2.0479C32.3235 1.61847 32.931 1.61847 33.0706 2.0479L34.8249 7.44703C34.8873 7.63907 35.0662 7.7691 35.2681 7.7691H40.9451C41.3967 7.7691 41.5844 8.34688 41.2191 8.61228L36.6263 11.9491C36.463 12.0678 36.3946 12.2782 36.457 12.4702L38.2113 17.8694C38.3508 18.2988 37.8593 18.6559 37.494 18.3905L32.9013 15.0536C32.7379 14.935 32.5167 14.935 32.3533 15.0536L27.7605 18.3905C27.3953 18.6559 26.9038 18.2988 27.0433 17.8694L28.7976 12.4702C28.86 12.2782 28.7916 12.0678 28.6282 11.9491L24.0355 8.61228C23.6702 8.34689 23.8579 7.7691 24.3094 7.7691H29.9864C30.1883 7.7691 30.3673 7.63907 30.4297 7.44703L32.184 2.0479Z"  <? if ($stars >= 2) { echo "fill=\"#9E65FD\"";} else {echo "fill=\"#D5D5D5\"";}?> /> <path d="M54.557 2.0479C54.6966 1.61847 55.3041 1.61847 55.4436 2.0479L57.1979 7.44703C57.2603 7.63907 57.4393 7.7691 57.6412 7.7691H63.3182C63.7697 7.7691 63.9574 8.34688 63.5921 8.61228L58.9994 11.9491C58.836 12.0678 58.7676 12.2782 58.83 12.4702L60.5843 17.8694C60.7239 18.2988 60.2324 18.6559 59.8671 18.3905L55.2743 15.0536C55.1109 14.935 54.8897 14.935 54.7264 15.0536L50.1336 18.3905C49.7683 18.6559 49.2768 18.2988 49.4163 17.8694L51.1706 12.4702C51.233 12.2782 51.1647 12.0678 51.0013 11.9491L46.4085 8.61228C46.0432 8.34689 46.231 7.7691 46.6825 7.7691H52.3595C52.5614 7.7691 52.7404 7.63907 52.8028 7.44703L54.557 2.0479Z"  <? if ($stars >= 3) { echo "fill=\"#9E65FD\"";} else {echo "fill=\"#D5D5D5\"";}?> /> <path d="M76.9301 2.0479C77.0696 1.61847 77.6771 1.61847 77.8167 2.0479L79.571 7.44703C79.6334 7.63907 79.8123 7.7691 80.0142 7.7691H85.6912C86.1427 7.7691 86.3305 8.34688 85.9652 8.61228L81.3724 11.9491C81.2091 12.0678 81.1407 12.2782 81.2031 12.4702L82.9574 17.8694C83.0969 18.2988 82.6054 18.6559 82.2401 18.3905L77.6473 15.0536C77.484 14.935 77.2628 14.935 77.0994 15.0536L72.5066 18.3905C72.1413 18.6559 71.6498 18.2988 71.7894 17.8694L73.5437 12.4702C73.6061 12.2782 73.5377 12.0678 73.3743 11.9491L68.7816 8.61228C68.4163 8.34689 68.604 7.7691 69.0555 7.7691H74.7325C74.9344 7.7691 75.1134 7.63907 75.1758 7.44703L76.9301 2.0479Z"  <? if ($stars >= 4) { echo "fill=\"#9E65FD\"";} else {echo "fill=\"#D5D5D5\"";}?> /> <path d="M99.3031 2.0479C99.4427 1.61847 100.05 1.61847 100.19 2.0479L101.944 7.44703C102.006 7.63907 102.185 7.7691 102.387 7.7691H108.064C108.516 7.7691 108.704 8.34688 108.338 8.61228L103.745 11.9491C103.582 12.0678 103.514 12.2782 103.576 12.4702L105.33 17.8694C105.47 18.2988 104.978 18.6559 104.613 18.3905L100.02 15.0536C99.857 14.935 99.6358 14.935 99.4725 15.0536L94.8797 18.3905C94.5144 18.6559 94.0229 18.2988 94.1624 17.8694L95.9167 12.4702C95.9791 12.2782 95.9107 12.0678 95.7474 11.9491L91.1546 8.61228C90.7893 8.34689 90.9771 7.7691 91.4286 7.7691H97.1056C97.3075 7.7691 97.4865 7.63907 97.5489 7.44703L99.3031 2.0479Z"  <? if ($stars >= 5) { echo "fill=\"#9E65FD\"";} else {echo "fill=\"#D5D5D5\"";}?> />
    
</svg> <p style="display:none" itemprop="reviewRating"><?=$stars;?></p> </div> <?if ($arItem["PROPERTIES"]["REF"]["VALUE"]) {?> <div class="home_clientabout_item_source"> 
   
    <p class="home_clientabout_item_source_title">Источник:</p>
    
     <a href="<? echo  $arItem["PROPERTIES"]["URL"]["VALUE"] ?>" target="_blank" rel="nofollow" class="home_clientabout_item_source_name"><? echo  $arItem["PROPERTIES"]["REF"]["VALUE"] ?></a> 
    </div> <?}?>
</div> </div> </div> </div> <?endforeach;?> </div> </div> </div> <div class="box_progress_bar"><span class="progress_bar"></span></div> </div>