<footer class="ft" itemscope itemtype="http://schema.org/WPFooter">
 
    <div class="main">
      <div class="ft_box">
        <div class="ft_colum">
          <div class="logo"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.svg" width="44" height="28" alt="Veonix"></a></div>
          <div class="ft_info_company">
            <a href="/politika/">Политика конфиденциальности</a>
            <p ><span itemprop="copyrightYear">© 2017—2022</span> <span itemprop="copyrightHolder">«Veonix — <br>студия графического дизайна»</span> </p>
            <p>
              <span>ИП Некрасов Виктор Владимирович </span>
              <span>ИНН 710407135800 </span>
              <span>ОГРНИП 317715400000700</span>
            </p>
          </div>
          <div class="ft_info_pay">
            <div class="ft_info_pay_item"><img class="lazy" height="30" width="30" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/pay/visa.svg" alt="visa"></div>
            <div class="ft_info_pay_item"><img class="lazy" height="30" width="30" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/pay/mcard.svg" alt="mcard"></div>
            <div class="ft_info_pay_item"><img class="lazy" height="30" width="30" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/pay/mir.svg" alt="mir"></div>
            <div class="ft_info_pay_item"><img class="lazy" height="30" width="30" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/pay/bitcoin.svg" alt="bitcoin"></div>
          </div>
        </div>
        <div class="ft_colum">
          <nav class="ft_menu">
            <ul>
              <li><a href="/about/">О нас</a></li>
              <li><a href="/portfolio/">Проекты</a></li>
              <li><a href="/services/">Услуги</a></li>
            </ul>
            <ul>
              <li><a href="/customers/">Клиенты</a></li>
              <li><a href="/price/">Цены</a></li>
              <li><a href="/contacts/">Контакты</a></li>
            </ul>
          </nav>
          <a href="#form" data-fancybox="" class="button_line" data-text="Обратный звонок - Подвал сайта - ">
            <span>обратный звонок</span>
            <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="<?=SITE_TEMPLATE_PATH?>/assets/img/button_line_1.svg" alt="button icon"></i>
          </a>
        </div>
        <div class="ft_colum">
          <div class="ft_phone"><a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a></div>
          <div class="ft_email"><a href="mailto:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","email"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","email"));?></a></div>
          <ul class="ft_social">
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","tg")): ?><li><a class="social_tg" aria-label="Открыть телеграм" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","tg"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","wp")): ?><li><a class="social_wa" aria-label="Открыть ватсап" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","wp"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","vk")): ?><li><a class="social_vk" aria-label="Открыть вконтакте" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","vk"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","inst")): ?><li><a class="social_inst" aria-label="Открыть инстграм" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","inst"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","dzen")): ?><li><a class="social_dzen" aria-label="Открыть дзен" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","dzen"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","be")): ?><li><a class="social_be" aria-label="Открыть беханс" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","be"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
            <? if (\Bitrix\Main\Config\Option::get("grain.customsettings","yb")): ?><li><a class="social_yb" aria-label="Открыть ютуб" href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","yb"));?>" target="_blank" rel="noopener noreferrer"></a></li><? endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
</main>







<div class="no_popup" id="no" style="display: none;">
  Специалист добавляет проект прямо сейчас
</div>

<div class="form_popup" id="form" style="display: none;">
  <div class="form_popup_box">
    <p class="form_popup_title">Заполните форму</p>
    <form class="new_form">
      <input type="hidden" name="theme" class="theme_val" value="">
      <input type="hidden" name="region" class="region" value="Russia (Россия)">
      <input type="text" name="name" placeholder="Имя" autocomplete="off" required="" class="ym-record-keys">
      <input type="tel"  name="phone"  placeholder="8 (912) 345-67-89" autocomplete="off" required="" class="phone phone_2 ym-record-keys">
      <input type="email" name="email" placeholder="E-mail" autocomplete="off" required="" class="ym-record-keys">
      <textarea placeholder="Комментарий" class="ym-record-keys" name="comment"></textarea>
      <div class="form_block_button">
        <button  class="button_line" >
          <span>Оставить заявку</span>
          <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="<?=SITE_TEMPLATE_PATH?>/assets/img/button_line_1.svg" alt="button icon"></i>
        </button>
        <p>*Нажимая на кнопку, вы даете согласия <a href="/politika/" target="_blank">на обработку персональных данных</a></p>
      </div>  
    </form>
  </div>
</div>


</body>
 

<? 
  
  
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/jquery-3.6.1.min.js" );
 
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/splide.min.js" );
 // $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/swiper-bundle.min.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/svg-animate.min.js" );
   //$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/smooth-scrollbar.js" );

  //$asset->addJs(SITE_TEMPLATE_PATH."/assets/js/intlTelInput.min.js" );
  // $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/jquery.paroller.min.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/lazyload.min.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/imask.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/page-js.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/main.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/services.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/portfolio.js" );
  $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/home.js" );

  $asset->setJsToBody(true);
   
  ?>

  <?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","body_end"));?>

</html>