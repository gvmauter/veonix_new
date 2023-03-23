<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$type = $arResult['TYPE'];
if ($type == "all" or !$type) {
  $list = ["Презентация","Многостраничный сайт","Лендинг","Брендбук","Дизайн упаковки","Логотип","Коммерческое предложение","Видеоролик","Маркетинг-кит","Другое"];
} elseif($type == "website") {
  $list = ["Лендинг","Многостраничный сайт","Корпоративные порталы","Интернет магазин","Промо-сайты","Сайт-визитка","Квиз","Другое"];
} elseif($type == "prezent") {
  $list = ["Для выступления","Для отправки клиентам","Для размещения на сайте","Для переговоров"];
} elseif($type == "branding") {
  $list = ["Логотип","Брендбук","Дизайн упаковки","Айдентика","Нейминг","Фирменный стиль","Гайдбук","Разработка слогана","Другое"];
} elseif($type == "text") {
  $list = $arResult['TYPE_TEXT'];
  $list = explode(',', $list);
}
if (strlen($arResult['TITLE_1'])<3) {$arResult['TITLE_1'] = "Создадим ваш <br>";};
if (strlen($arResult['TITLE_2'])<3) {$arResult['TITLE_2'] = "идеальный";};
if (strlen($arResult['TITLE_3'])<3) {$arResult['TITLE_3'] = " дизайн";};
?>
<section class="form_block">
    <div class="main">
        <h2 class="form_block_title">
          <?=htmlspecialcharsBack($arResult['TITLE_1']);?>
          <?if($arResult['TITLE_2']){?> 
             <span class="animation_bg"><?=htmlspecialcharsBack($arResult['TITLE_2']);?> </span> 
          <?};?> 
          <?=htmlspecialcharsBack($arResult['TITLE_3']);?>  
          <i class="icon_star"></i>
        </h2>
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
                  <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
                  <i class="button_line_2"></i>
                </button>
                <p>*Нажимая на кнопку, вы даете согласия <a href="/politika/" target="_blank">на обработку персональных данных</a></p>
              </div>            
          </div>
          <div class="form_block_radio">
            <? $i=0; foreach ($list as &$value): $i++; ?>
              <label><input type="radio" name="service" <?if($i==1){echo "checked";}?> required value="<?=$value;?>"><span><?=$value;?></span></label>
            <?endforeach;?>
          </div>
        </div>
      </form>
    </div>
  </section>
