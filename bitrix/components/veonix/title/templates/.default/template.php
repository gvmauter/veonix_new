<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
?>

<section class="web_b1">
    <div class="main">
      
      <div class="web_b1_title">
          <h1 class="web_h1"><?=htmlspecialcharsBack($arResult['TITLE_1']);?> 
          <?if($arResult['TITLE_2']){?>
            <b class="web_h1_animation lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/b1_title_bg_min.jpg"><span><i></i><b><?=htmlspecialcharsBack($arResult['TITLE_2']);?></b><i></i></span></b>
          <?};?> 
          <?=htmlspecialcharsBack($arResult['TITLE_3']);?>
        </h1>
        <button class="web_b1_play showrell_play"><i class="lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/b1_play.svg"></i><span>Play</span></button>
      </div>
      <div class="web_b1_text">
        <div class="web_b1_text_l ">
          <?if($arResult['TEXT_1']){?>
             <p>
              <?=htmlspecialcharsBack($arResult['TEXT_1']);?> 
              <?if($arResult['TEXT_1_GR']){?>
                <span class="lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/b1_title_bg_min.jpg"><?=htmlspecialcharsBack($arResult['TEXT_1_GR']);?></span>
              <?};?>
            </p>
          <?};?>
          <?if($arResult['TEXT_2']){?>
             <p>
              <?=htmlspecialcharsBack($arResult['TEXT_2']);?>
              <?if($arResult['TEXT_2_GR']){?>
                <span class="lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/b1_title_bg_min.jpg"><?=htmlspecialcharsBack($arResult['TEXT_2_GR']);?></span>
              <?};?>
            </p>
          <?};?>
        </div>
        <div class="web_b1_text_r">
          <a href="#form" class="button_line" data-fancybox="" data-text="Обсудить задачу - Первый экран - ">
            <span>Обсудить задачу</span>
            <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="<?=SITE_TEMPLATE_PATH?>/assets/img/button_line_1.svg" alt="button icon"></i>
          </a>
        </div>
      </div>       
	  <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array( "START_FROM" => "0", "PATH" => "/", "SITE_ID" => "s1" ) );?> 
 
    </div>
    <div class="animation_loader"></div>
</section>
<section class="web_line lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/line_bg_min.jpg?1">
    <div class="web_line_text lazy" >
      <p><span>We have been designing the best digital solutions since 2017</span> <i></i> <span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i></p>
      <p><span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i><span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i></p>
      <p><span>We have been designing the best digital solutions since 2017</span> <i></i> <span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i></p>
    </div>
</section>  
<section class="video_showrell_block" >
    <div class="video_showrell" >
      <a class="video_showrell_hover showrell_play" ></a>
      <video width="100%" height="100%" class="lazy video_showrell_prev" muted autoplay  loop playsinline webkit-playsinline poster="<?=SITE_TEMPLATE_PATH?>/assets/img/SHOWRELL.jpg">
        <source data-src="<?=SITE_TEMPLATE_PATH?>/assets/video/SHOWRELL.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
        <source data-src="<?=SITE_TEMPLATE_PATH?>/assets/video/SHOWRELL.webm" type='video/webm; codecs="vp8, vorbis"'>
       </video>
       <button class="video_showrell_play">PLAY</button>
    </div>
    <div class="video_showrell_full" style="display: none;">
      <video width="100%" height="100%"  class="lazy"  autoplay playsinline webkit-playsinline>
        <source data-src="<?=SITE_TEMPLATE_PATH?>/assets/video/SHOWRELL 2022 — VEONIX.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
        <source data-src="<?=SITE_TEMPLATE_PATH?>/assets/video/SHOWRELL 2022 — VEONIX.webm" type='video/webm; codecs="vp8, vorbis"'>
       </video>
    </div>
</section>