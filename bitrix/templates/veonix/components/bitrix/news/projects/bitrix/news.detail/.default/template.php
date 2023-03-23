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
 

$BANNER = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["BANNER"]["VALUE"],
  Array("width" => 1920, "height" => 100000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
);

 

$BANNER_MIN = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["BANNER"]["VALUE"],
  Array("width" => 150, "height" => 10000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
); 
$BANNER_MOB = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["BANNER_MOBILE"]["VALUE"],
  Array("width" => 680, "height" => 100000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
);
$BANNER_MOB_MIN = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["BANNER_MOBILE"]["VALUE"],
  Array("width" => 34, "height" => 10000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
); 

$PHOTO_1 = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["PHOTO_1"]["VALUE"],
  Array("width" => 1920, "height" => 100000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
);
$PHOTO_1_MIN = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["PHOTO_1"]["VALUE"],
  Array("width" => 96, "height" => 10000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
); 

$PHOTO_2 = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["PHOTO_2"]["VALUE"],
  Array("width" => 1920, "height" => 100000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
);
$PHOTO_2_MIN = CFile::ResizeImageGet(
  $arResult["PROPERTIES"]["PHOTO_2"]["VALUE"],
  Array("width" => 96, "height" => 10000),
  BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
); 

 
?>

<main class="page_portfolio_more">
<section class="page_portfolio <?echo $arResult["PROPERTIES"]["CLASS"]["VALUE"]; ?>">
    <div class="ptf_b1 hd_block" style="background-image: url(<?echo $BANNER_MIN["src"];?>);" data-mob="<?if ($BANNER_MOB_MIN["src"]) {echo $BANNER_MOB_MIN["src"]; } else {$BANNER_MIN["src"];};?>">
      <div class="ptf_b1_bg lazy" data-bg="<?echo $BANNER["src"];?>" data-mob="<?if ($BANNER_MOB["src"]) {echo $BANNER_MOB["src"]; } else {echo $BANNER["src"];};?>">
        <div class="main">
          <a href="/portfolio/websites/" class="back_bt"><span>Вернуться назад</span></a>
       
            <?$APPLICATION->IncludeComponent( "bitrix:breadcrumb", "", Array( "PATH" => "", "SITE_ID" => "s1", "START_FROM" => "0" ) );?>
          </div>
        </div>
      </div>
    </div>
 
   

    <div class="ptf_b2">
      <div class="main">
        <div class="ptf_b2_title">
          <h1><?=htmlspecialcharsBack($arResult["PROPERTIES"]["H1"]["VALUE"]["TEXT"])?></h1>
          <div class="ptf_b2_url">
            <a href="https://<?php echo $arResult["PROPERTIES"]["WEB"]["VALUE"]?>" target="_blank" rel="noopener noreferrer"><?php echo $arResult["PROPERTIES"]["WEB"]["VALUE"]?></a>
          </div>
        </div>
        <?if($arResult["PROPERTIES"]["RABOTY"]["VALUE"]):?>
          <div class="ptf_b2_top_info">
            <ul>
              <?foreach($arResult["PROPERTIES"]["RABOTY"]["VALUE"] as $pid=>$arProperty):?> 
                <li><?echo $arProperty;?></li>
              <?endforeach;?>
            </ul>
          </div>
        <?endif;?>
        <div class="ptf_b2_info">
          <div class="ptf_b2_info_item">
            <div class="ptf_b2_info_name"><p>Цель</p></div>
            <div class="ptf_b2_info_text"><?=htmlspecialcharsBack($arResult["PROPERTIES"]["CEL"]["VALUE"]["TEXT"])?></div>
          </div>
          <div class="ptf_b2_info_item">
            <div class="ptf_b2_info_name"><p>Задача</p></div>
            <div class="ptf_b2_info_text ptf_b2_info_text_col">              
                <?foreach($arResult["PROPERTIES"]["ZADACHA"]["VALUE"] as $pid=>$arProperty):?>       
                    <?if(count($arResult["PROPERTIES"]["ZADACHA"]["VALUE"])>1):?>       
                      <div class="ptf_b2_info_text_col_box">
                    <?endif;?>
                        <?=htmlspecialcharsBack($arProperty["TEXT"]);?>
                    <?if(count($arResult["PROPERTIES"]["ZADACHA"]["VALUE"])>1):?>    
                      </div>
                    <?endif;?>
                <?endforeach;?>              
            </div>
          </div>
        </div>
      </div>
      <div class="ptf_b2_image" style="background-image: url(<?echo $PHOTO_1_MIN["src"];?>);">
        <img class="lazy" data-src="<?echo $PHOTO_1["src"];?>" alt="<?echo $arResult["NAME"]; ?>">
      </div>
    </div>
    <div class="ptf_b2 ptf_b3">
      <div class="main">
        <div class="ptf_b2_info">
          <div class="ptf_b2_info_item">
            <div class="ptf_b2_info_name"><p>Реализация</p></div>
            <div class="ptf_b2_info_text ptf_b2_info_text_col">
              <?foreach($arResult["PROPERTIES"]["REALIZATION"]["VALUE"] as $pid=>$arProperty):?>              
                    <?if(count($arResult["PROPERTIES"]["REALIZATION"]["VALUE"])>1):?>       
                      <div class="ptf_b2_info_text_col_box">
                    <?endif;?>
                        <?=htmlspecialcharsBack($arProperty["TEXT"]);?>
                    <?if(count($arResult["PROPERTIES"]["REALIZATION"]["VALUE"])>1):?>    
                      </div>
                    <?endif;?>
              <?endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <div class="ptf_b2_image" style="background-image: url(<?echo $PHOTO_2_MIN["src"];?>);">
        <img class="lazy" data-src="<?echo $PHOTO_2["src"];?>" alt="<?echo $arResult["NAME"]; ?>">
      </div>
    </div>
    <div class="ptf_b2 ptf_b3">
      <div class="main">
        <div class="ptf_b2_info">
          <div class="ptf_b2_info_item">
            <div class="ptf_b2_info_name"><p>Результат</p></div>
            <div class="ptf_b2_info_text ptf_b2_info_text_col">
              <?foreach($arResult["PROPERTIES"]["RESULTAT"]["VALUE"] as $pid=>$arProperty):?>              
                    <?if(count($arResult["PROPERTIES"]["RESULTAT"]["VALUE"])>1):?>       
                      <div class="ptf_b2_info_text_col_box">
                    <?endif;?>
                        <?=htmlspecialcharsBack($arProperty["TEXT"]);?>
                    <?if(count($arResult["PROPERTIES"]["RESULTAT"]["VALUE"])>1):?>    
                      </div>
                    <?endif;?>
              <?endforeach;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ptf_list">
      <?if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?>
        <?=htmlspecialcharsBack(str_replace("src=","class='lazy' data-src=",$arResult["PROPERTIES"]["VIDEO"]["VALUE"])); ?>
      <?endif;?>


      <?foreach($arResult["PROPERTIES"]["PHOTO_LIST"]["VALUE"] as $pid=>$arProperty):?>           
        <?
          $PHOTO_LIST = CFile::ResizeImageGet(
            $arProperty,
            Array("width" => 1920, "height" => 100000),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
          );
          $PHOTO_LIST_MIN = CFile::ResizeImageGet(
            $arProperty,
            Array("width" => 150, "height" => 10000),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true
          ); 
          $width_img = ((int)$PHOTO_LIST["width"])/100;;
          $height_img = ((int)$PHOTO_LIST["height"])/$width_img;
           ?>
          <div class="ptf_b2_image" style="background-image: url(<?echo $PHOTO_LIST_MIN["src"];?>);">
            <img class="lazy" style=" width: 100%; height: <?=$height_img;?>vw; " data-src="<?echo $PHOTO_LIST["src"];?>" alt="<?echo $arResult["NAME"]; ?>">
          </div>
      <?endforeach;?>
    </div>
  
    <?if($arResult["PROPERTIES"]["TEAM"]["VALUE"]):?>
    <div class="ptf_team">
      <div class="main">
        <h2 class="h2_2">Над проектом <br>работали</h2>
        <div class="ptf_team_box">
          <?foreach($arResult["PROPERTIES"]["TEAM"]["VALUE"] as $pid=>$teamActive):?>  
            <?
              CModule::IncludeModule('iblock');
              $team = GetIBlockElement($teamActive, 'team');
              
              $PHOTO_TEAM = CFile::ResizeImageGet(
                $team["PROPERTIES"]["PHOTO"]["VALUE"],
                Array("width" => 200, "height" => 200),
                BX_RESIZE_IMAGE_EXACT, true
              );
              if ($team ) {
              
               
              ?>

                <div class="ptf_team_item">
                  <div class="ptf_team_photo lazy" data-bg="<?echo $PHOTO_TEAM["src"];?>"></div>
                  <div class="ptf_team_item_info">
                    <p class="ptf_team_item_name"><? echo $team['NAME']; ?></p>
                    <p class="ptf_team_item_text"><?php echo $team["PROPERTIES"]["DOLJ"]["VALUE"]?></p>
                  </div>
                </div>
     
                   <?}?>     
           
          <?endforeach;?>
         

        </div>
      </div>
    </div>
    <?endif;?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "slider_projects", 
        array(
      
          "IBLOCK_TYPE" => "portfolio",
          "ACTIVE_ELEMENT" => $team['ID'],
          "IBLOCK_ID" => "",
          "NEWS_COUNT" => "40",
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "SORT",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => array(
            0 => "",
            1 => "",
          ),
          "PROPERTY_CODE" => array(
            0 => "SLIDER_PHOTO",
            1 => "",
          ),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "AJAX_MODE" => "N",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "36000000",
          "CACHE_FILTER" => "N",
          "CACHE_GROUPS" => "Y",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "d.m.Y",
          "SET_TITLE" => "Y",
          "SET_BROWSER_TITLE" => "Y",
          "SET_META_KEYWORDS" => "Y",
          "SET_META_DESCRIPTION" => "Y",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
          "ADD_SECTIONS_CHAIN" => "Y",
          "HIDE_LINK_WHEN_NO_DETAIL" => "N",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "Y",
          "STRICT_SECTION_CHECK" => "N",
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "PAGER_TEMPLATE" => ".default",
          "DISPLAY_TOP_PAGER" => "N",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "N",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "N",
          "SHOW_404" => "N",
          "MESSAGE_404" => ""
        ),
        false
      );?>

    
    
  </section>
<?php
if ($arResult["IBLOCK_SECTION_ID"] == 2) {
  $type= "website";
  $title_1 = "Создадим ваш <br>";
  $title_2 = "идеальный";
  $title_3 = " сайт";
} else if($arResult["IBLOCK_SECTION_ID"] == 3){
  $type= "prezent";
  $title_1 = "Создадим вашу <br>";
  $title_2 = "идеальную";
  $title_3 = " презентацию";
}else if($arResult["IBLOCK_SECTION_ID"] == 4){
  $type= "branding";
  $title_1 = "";
  $title_2 = "";
  $title_3 = "";
}
?>

  <? $APPLICATION->IncludeComponent(
    "veonix:form", 
    ".default", 
    array(
      "COMPONENT_TEMPLATE" => ".default",
      "TITLE_1" => $title_1,
      "TITLE_2" => $title_2,
      "TITLE_3" => $title_3,
      "TYPE" =>  $type
    ),
    false
  );?>



</main>
