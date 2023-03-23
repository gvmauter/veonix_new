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


<section class="page_portfolio <?echo $arResult["PROPERTIES"]["CLASS"]["VALUE"]; ?>">
    <div class="ptf_b1 hd_block" style="background-image: url(<?echo $BANNER_MIN["src"];?>);" data-mob="<?echo $BANNER_MOB_MIN["src"];?>">
      <div class="ptf_b1_bg lazy" data-bg="<?echo $BANNER["src"];?>" data-mob="<?echo $BANNER_MOB["src"];?>">
        <div class="main">
          <a href="/portfolio/websites/" class="back_bt"><span>Вернуться назад</span></a>

          <ul class="breadcrumbs_top" itemprop="http://schema.org/breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="/" title="Главная" itemprop="item">
                <span itemprop="name">Главная</span>
                <meta itemprop="position" content="0">
              </a>
            </li>
            <li><i></i></li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="/portfolio/" title="Портфолио" itemprop="item">
                <span itemprop="name">Портфолио</span>
                <meta itemprop="position" content="1">
              </a>
            </li>
            <li><i></i></li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
              <a href="<?echo $arResult["SECTION"]["PATH"][0]["SECTION_PAGE_URL"];?>" title="<?echo $arResult["SECTION"]["PATH"][0]["NAME"];?>" itemprop="item">
                <span itemprop="name"><?echo $arResult["SECTION"]["PATH"][0]["NAME"];?></span>
                <meta itemprop="position" content="2">
              </a>
            </li>
            <li><i></i></li>
            <li><p><?echo $arResult["NAME"]; ?></p></li>
          </ul>
        </div>
      </div>
    </div>
 
   

    <div class="ptf_b2">
      <div class="main">
        <div class="ptf_b2_title">
          <h1><?=htmlspecialcharsBack($arResult["PROPERTIES"]["H1"]["VALUE"]["TEXT"])?></h1>
          <div class="ptf_b2_url">
            <a href="https://shemberg.ru" target="_blank" rel="noopener noreferrer"><?php echo $arResult["PROPERTIES"]["WEB"]["VALUE"]?></a>
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
           ?>
          <div class="ptf_b2_image" style="background-image: url(<?echo $PHOTO_LIST_MIN["src"];?>);">
            <img class="lazy" data-src="<?echo $PHOTO_LIST["src"];?>" alt="<?echo $arResult["NAME"]; ?>">
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
              print_r($team);
              $PHOTO_TEAM = CFile::ResizeImageGet(
                $team["PROPERTIES"]["PHOTO"]["VALUE"],
                Array("width" => 200, "height" => 200),
                BX_RESIZE_IMAGE_EXACT, true
              );
               
              ?>

                <div class="ptf_team_item">
                  <div class="ptf_team_photo lazy" data-bg="<?echo $PHOTO_TEAM["src"];?>"></div>
                  <div class="ptf_team_item_info">
                    <p class="ptf_team_item_name"><? echo $team['NAME']; ?></p>
                    <p class="ptf_team_item_text"><?php echo $team["PROPERTIES"]["DOLJ"]["VALUE"]?></p>
                  </div>
                </div>
     
                        
           
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

  <section class="form_block">
    <div class="main">
      <h2 class="form_block_title">Создадим ваш <br><span class="animation_bg">идеальный</span> сайт <i class="icon_star"></i></h2>
      <form class="new_form">
        <input type="hidden" name="region" class="region" value="Russia (Россия)">
        <input type="hidden" name="theme"  value="Конец сайта">

        <div class="form_block_box">
          <div class="form_block_form">            
              <div class="form_block_item"><input type="text" name="name" placeholder="Имя" required></div>
              <div class="form_block_item"><input type="tel" name="phone" class="phone phone_1" placeholder="Телефон" required></div>
              <div class="form_block_item"><input type="email" name="email" placeholder="Почта" required></div>
              <div class="form_block_button">
                <button href="#form" class="button_line">
                  <span>Обсудить задачу</span>
                  <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="<?=SITE_TEMPLATE_PATH?>/assets/img/button_line_1.svg" alt="button icon"></i>
                  <i class="button_line_2"></i>
                </button>
                <p>*Нажимая на кнопку, вы даете согласия <a href="/politika/" target="_blank">на обработку персональных данных</a></p>
              </div>            
          </div>
          <div class="form_block_radio">
            <label><input type="radio" name="service" required value="Лендинг" checked><span>Лендинг</span></label>
            <label><input type="radio" name="service" required value="Многостраничный сайт"><span>Многостраничный сайт</span></label>
            <label><input type="radio" name="service" required value="Корпоративные порталы"><span>Корпоративные порталы</span></label>
            <label><input type="radio" name="service" required value="Интернет магазин"><span>Интернет магазин</span></label>
            <label><input type="radio" name="service" required value="Промо-сайты"><span>Промо-сайты</span></label>
            <label><input type="radio" name="service" required value="Сайт-визитка"><span>Сайт-визитка</span></label>
            <label><input type="radio" name="service" required value="Квиз"><span>Квиз</span></label>
            <label><input type="radio" name="service" required value="Другое"><span>Другое</span></label>
          </div>
        </div>
      </form>
    </div>
  </section>