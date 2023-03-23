<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать создание фирменного логотипа — 49 000 рублей. Разработаем логотип вашей фирмы, который привлечет внимание клиентов и повысит узнаваемость бренда. Студия дизайна Veonix в Москве: 8 (800) 222-77-65.");
$APPLICATION->SetPageProperty("title", "Разработка логотипа компании — заказать по цене 100 000 руб. под ключ в студии дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Брендинг","/branding/").
$APPLICATION->AddChainItem("Логотипы").

$APPLICATION->SetTitle("Разработка логотипа компании — заказать по цене 100 000 руб. под ключ в студии дизайна Veonix");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/prezent.css");   

  $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");   
  $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/logoPage.css");   
 $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
  $asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Разработка ",
		"TEMPLATE_FOR_TITLE2" => "логотипа",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создадим для вашей компании современный логотип, который привлечет и удержит внимание клиентов и повысит узнаваемость бренда",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
<div class="old_page">
     
  <main class="logo_page">
    <section class="logo_b1">
      <div class="main">
        <div class="logo_b1_box">
          <div class="logo_b1__left">
            <h2 class="logo_zg font_pd">Честная<span> работа —</span> <br> эффективный <br> логотип</h2>
            <p>Чем выгодно отличаются логотипы, разработанные <br>
              в нашей студии? Прежде всего, уникальностью.</p>
            <p>Мы разрабатываем каждый лого с нуля и не используем чужие макеты из фотобанка, как это делает 95% студий дизайна и фрилансеров, готовых создать логотип <br>за копейки. </p>
            <p><span style="font-weight: 600;">У нас вы получаете оригинальный фирменный знак, который запоминается с первого взгляда и не похож <br> на другие. </span></p>
          </div>
          <div class="logo_b1__right">
            <div class="logo_b1__right_box">
              <div class="logo_b1__line"><img src="/bitrix/templates/veonix/assets/img/old/logo/b1_line.svg" width="404" height="839" class="b1_line svg_anim lazy" alt="ecodor"></div>
              <div class="logo_b1_content">
                <div class="logo_b1__top">
                  <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b1_logo_1.svg" class="b1_logo_1 lazy" width="149" height="149" alt="ecodor">
                  <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b1_logo_1_bg.svg" class="b1_logo_1_bg lazy" width="403" height="338" alt="ecodor">
                </div>
                <div class="logo_b1__center">
                  <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b1_img.png" class="b1_img lazy" width="920" height="354" alt="ecodor">
                </div>
                <div class="logo_b1__bottom"><img src="/bitrix/templates/veonix/assets/img/old/logo/b1_logo_2.svg" width="213" height="59" class="b1_logo_2 svg_anim lazy" alt="ecodor"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="logo_b1_box_1">
          <div class="logo_b1_box__item">
            <p class="logo_b1_box_t1 font_pd"><span>100</span>%</p>
            <p class="logo_b1_box_t2">возврат денег,если <br>результат не устраивает</p>
          </div>
          <div class="logo_b1_box__item">
            <p class="logo_b1_box_t1 font_pd"><span>2</span> дня</p>
            <p class="logo_b1_box_t2">разработка <br>5 концепций</p>
          </div>
          <div class="logo_b1_box__item">
            <p class="logo_b1_box_t1 font_pd"><span>5</span></p>
            <p class="logo_b1_box_t2">концепций логотипа <br> на выбор</p>
          </div>
          <div class="logo_b1_box__item">
            <p class="logo_b1_box_t1 font_pd">до <span>50</span>%</p>
            <p class="logo_b1_box_t2">скидки постоянным <br>клиентам</p>
          </div>
        </div>
      </div>
    </section>
    <section class="logo_b2">
      <div class="main">
        <div class="logo_b2_box">
          <div class="logo_b2__left">
            <div class="logo_b2__bx">
              <div class="logo_b2__top">
                <div class="logo_b2__top_logo"><img src="/bitrix/templates/veonix/assets/img/old/logo/b2_logo_1.svg" width="408" height="319" class="b2_logo_1 svg_anim lazy" alt="Global Secure Invest"></div>
              </div>
              <div class="logo_b2__center"><div class="logo_b2__center_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b2_img.jpg" width="797" height="404" alt="Global Secure Invest"></div></div>
              <div class="logo_b2__bottom"><img src="/bitrix/templates/veonix/assets/img/old/logo/b2_logo_2.svg" width="216" height="61" class="b2_logo_2 svg_anim lazy"  alt="Global Secure Invest"></div>
            </div>
          </div>
          <div class="logo_b2__right">
            <h2 class="logo_zg font_pd"><span>Логотип —</span>  это не картинка, <br> а решение задач <br>бизнеса</h2>
            <div class="logo_b2__content">
             <p>Мы работаем на эффективность вашего бизнеса. Перед каждой разработкой эмблемы наши маркетологи определяют, какие задачи должен решать логотип компании, на какую целевую аудиторию он рассчитан и какое впечатление должен производить на покупателя. И только после этого мы начинаем отрисовку эскизов. </p>
              <p><span style="font-weight: 600;">В этом случае дизайн логотипа будет многие <br>годы работать на продвижение вашего бренда.</span></p>
              <ul>
              <li><p><span style="font-weight: 600;">Изучаем конкурентов</span><br>Ваш логотип не будет даже отдаленно напоминать товарные знаки конкурентов в регионе.</p></li>
              <li><p><span style="font-weight: 600;">Находим изюминку</span> <br>Вы не найдете банальных решений в нашем портфолио. Каждый логотип – креативная находка.</p></li>
              <li><p><span style="font-weight: 600;">Анализируем аудиторию</span><br> Создаем фирменный знак <br>с учетом предпочтений <br>и ожиданий вашей целевой аудитории.</p></li>
              <li><p><span style="font-weight: 600;">Рисуем от руки</span><br> В штате профессиональные художники-дизайнеры <br>с большим опытом.</p></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="logo_b3">
      <div class="main">
        <div class="logo_b3_bg_svg"><div class="logo_b3_bg_svg_img"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_svg.svg" width="371" class="lazy" height="348" alt="bg"></div></div>
        <div class="logo_zg font_pd">Примеры наших <br>логотипов</div>
        <div class="logo_b3_box">

          <div class="logo_b3_item logo_b3_1">
            <div class="logo_b3_item_box">
              <div class="logo_b3_item__main">
                <div class="logo_b3_item_box_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_1_svg.svg" width="211" height="70" class="b3_img_1_svg svg_anim lazy" alt="Florida"></div>
                <div class="logo_b3_image">
                  <div class="logo_b3_image_bg"><div class="logo_b3_image_bg_after"></div></div>
                  <div class="logo_b3_item__main_bxs">
                    <div class="logo_b3_item_box_2">
                      <div class="logo_b3_item_box_2_bx"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_1_svg_2.svg" width="144" height="144" alt="Florida"></div>
                      <div class="logo_b3_item_box_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_1.png"  width="474" height="459" alt="Florida"></div>
                      <p>Здоровье — мудрых гонорар</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="logo_b3_item logo_b3_2">
            <div class="logo_b3_item_box">
              <div class="logo_b3_item__main">
                <div class="logo_b3_item_box_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_2_svg.svg" width="190" height="85" class="b3_img_2_svg svg_anim lazy" alt="Sirius"></div>
                <div class="logo_b3_image">
                  <div class="logo_b3_image_bg"><div class="logo_b3_image_bg_after"></div></div>
                  <div class="logo_b3_item__main_bxs">
                    <div class="logo_b3_item_box_2">
                      <div class="logo_b3_item_box_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_2.png"  width="639" height="314" alt="Sirius"></div>
                      <p>Долгосрочная аренда машин</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="logo_b3_item logo_b3_3">
            <div class="logo_b3_item_box">
              <div class="logo_b3_item__main">
                <div class="logo_b3_image">
                  <div class="logo_b3_image_bg"><div class="logo_b3_image_bg_after lazy" data-bg="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_bg.png"></div></div>
                  <div class="logo_b3_item__main_bxs">
                    <div class="logo_b3_item_box_2">
                      <div class="logo_b3_item_box_2_bx"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_svg_2.svg" width="167" height="167" alt="Aiva"></div>
                      <div class="logo_b3_item_box_3">
                        <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_1.png" class="b3_img_3_1 lazy" width="240" height="261" alt="Aiva">
                        <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_2.png" class="b3_img_3_2 lazy" width="310" height="172" alt="Aiva">
                        <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_3.png" class="b3_img_3_3 lazy" width="235" height="238" alt="Aiva">
                      </div>
                      <p>Красота спасёт мир</p>
                    </div>
                  </div>
                </div>
                <div class="logo_b3_item_box_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_3_svg.svg" width="267" height="89" class="b3_img_3_svg svg_anim lazy" alt="aiva"></div>
              </div>
            </div>
          </div>
          <div class="logo_b3_item logo_b3_4">
            <div class="logo_b3_item_box">
              <div class="logo_b3_item__main">
                <div class="logo_b3_image">
                  <div class="logo_b3_image_bg"><div class="logo_b3_image_bg_after lazy" data-bg="/bitrix/templates/veonix/assets/img/old/logo/b3_img_4_bg.png"></div></div>
                  <div class="logo_b3_item__main_bxs">
                    <div class="logo_b3_item_box_2">
                      <div class="logo_b3_item_box_2_bx"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_4_svg_2.svg" width="141" height="250" alt="Blin Amur"></div>
                      <div class="logo_b3_item_box_3">
                        <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_4.png" width="389" height="405" class="b3_img_4 lazy" alt="Blin Amur">
                      </div>
                      <p>Брутально вкусно</p>
                    </div>
                  </div>
                </div>
                <div class="logo_b3_item_box_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_4_svg.svg" width="267" height="89" class="b3_img_4_svg svg_anim lazy" alt="Blin Amur"></div>
              </div>
            </div>
          </div>
          <div class="logo_b3_item logo_b3_5">
            <div class="logo_b3_item_box">
              <div class="logo_b3_item__main">
                <div class="logo_b3_image">
                  <div class="logo_b3_image_bg"><div class="logo_b3_image_bg_after"></div></div>
                  <div class="logo_b3_item__main_bxs">
                    <div class="logo_b3_item_box_2">
                      <div class="logo_b3_item_box_2_bx">
                        <div class="st_zg_bg_img">
                          <div class="st_zg_bg_gif_grug">
                            <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                              <source data-src="/bitrix/templates/veonix/assets/img/old/video/logo_b3_video.mp4" type="video/mp4" >
                            </video>
                          </div>
                        </div>
                      </div>
                      <div class="logo_b3_item_box_3">
                        <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_5.png" width="824" height="182" class="b3_img_5 lazy" alt="Barrus">
                      </div>
                      <p>Крупногабаритные перевозки</p>
                    </div>
                  </div>
                </div>
                <div class="logo_b3_item_box_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b3_img_5_svg.svg" width="195" height="70" class="b3_img_5_svg svg_anim lazy" alt="Barrus"></div>
              </div>
            </div>
          </div>
     
  

        </div>
      </div>
    </section>
    <section class="logo_b4">
      <div class="main">
        <div class="logo_b4_bg_1"></div>
        <div class="logo_b4_box">
          <div class="logo_b4__text">
            <div class="logo_b4_t1 font_pd"><span>Хотите</span> заказать <br> логотип?</div>
            <p class="logo_b4_t2"><span style="font-weight: 600;">Отправьте заявку,</span> и менеджер <br> перезвонит через пару минут, чтобы <br> обсудить вашу задачу. </p>
            <a href="#form" data-fancybox="" data-text="Заказать Логотип - Страница о логотипах - Логотипы" class="sbm">ЗАКАЗАТЬ</a>
          </div>
          <div class="logo_b4__img">
            <div class="logo_b4__img_content">
              <div class="logo_b4__img__bottom_top font_pd"><p>Экспорт Россия</p></div>
              <div class="logo_b4__img__bottom_center"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b4_img.png" class="lazy" width="395" height="517" alt="AGRO"></div>
              <div class="logo_b4__img__bottom"><img src="/bitrix/templates/veonix/assets/img/old/logo/b4_logo.svg"  class="b4_logo svg_anim lazy" width="278" height="34" alt="AGRO"></div>
            </div>
          </div>
        </div>
        <div class="logo_b4_bg_2"></div>
      </div>
    </section>
    <section class="logo_b5">
      <div class="main">
        <div class="logo_b5_box">
           <div class="logo_zg font_pd">Еще несколько наших работ</div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_1.svg" width="206" height="68" class="lazy" alt="Florida"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_2.svg" width="174" height="77" class="lazy" alt="Sirius"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_3.svg" width="216" height="61" class="lazy" alt="Global Secure Invest"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_4.svg" width="220" height="73" class="lazy" alt="AIVA"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_5.svg" width="206" height="74" class="lazy" alt="Barrus"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_6.svg" width="247" height="30" class="lazy" alt="AGRO EXPORT RUSSIA"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_7.svg" width="195" height="69" class="lazy" alt="UI CROWN"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_8.svg" width="207" height="72" class="lazy" alt="Дальневосточный гектар"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_9.svg" width="182" height="104" class="lazy" alt="Blin Amur"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_10.svg" width="213" height="59" class="lazy" alt="Ecodor"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_11.svg" width="215" height="70" class="lazy" alt="Empire Gasparov"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_12.svg" width="206" height="59" class="lazy" alt="Mr. Vector"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_13.svg" width="177" height="65" class="lazy" alt="Wifi Leaf"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_14.svg" width="174" height="89" class="lazy" alt="Lines for Business"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_15.svg" width="232" height="67" class="lazy" alt="Alfredo"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_16.svg" width="245" height="58" class="lazy" alt="tactise"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_17.svg" width="201" height="79" class="lazy" alt="PharmA Company"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_18.svg" width="175" height="76" class="lazy" alt="impex"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_19.svg" width="166" height="66" class="lazy" alt="Level house"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_20.svg" width="166" height="60" class="lazy" alt="UIX"></div>
          <div class="logo_b5__item"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_21.svg" width="200" height="59" class="lazy" alt="ARTSY"></div>
        </div>
      </div>
    </section>
    <section class="logo_b6">
      <div class="main">
        <div class="logo_b6_bg">
          <div class="logo_b6_bg_1"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b6_svg_1.svg" width="298" class="lazy" height="279" alt="bg"></div>
          <div class="logo_b6_bg_2"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b6_svg.svg" width="219" class="lazy" height="315" alt="bg"></div>
        </div>
        <div class="logo_b6_top">
          <h2 class="logo_zg font_pd">Стоимость <br> разработки <br> логотипа</h2>
          <div class="logo_b6_top_text">
            <p class="logo_b6__t1 font_pd">Логотип с нуля</p>
            <p class="logo_price font_pd"><span>100</span> тыс. руб. </p>
            <div class="logo_b6_top_tx">
              <p>-  5 оригинальных концепций логотипа на выбор;</p>
              <p>- 10 дополнительных макетов на основе выбранной концепции;</p>
              <p>- правки до полного согласования;</p>
              <p>- готовый макет во всех графических форматах.</p>
              <p class="logo_b6__date">Срок изготовления — 7 дней.</p>     
            </div>
            <a href="#form" data-fancybox="" data-text="Заказать Логотип с нуля - Страница о логотипах - Логотипы" class="sbm">ЗАКАЗАТЬ</a>
          </div>
        </div>
        <div class="logo_b6_bottom">
          <p>Мы предлагаем высококлассный дизайн уровня ТОПовых студий, но стремимся к тому, чтобы цена <br>на нашу работу оставалась доступной.</p>
          <p>Если вам нужно только обновить логотип компании, то достаточно тарифа на редизайн, который <br>предполагает сохранение узнаваемого покупателями образа, но делает старый фирменный знак более стильным и современным. </p>
          <p>Если же вам надо разработать первый логотип компании, работу придется начинать с создания нескольких концепций, одна из которых станет основой вашего фирменного знака.  </p>
        </div>
      </div>
    </section>
    <section class="logo_b7">
      <div class="main">
        <div class="logo_b7_box">
          <div class="logo_b7__left">
            <div class="logo_b7__left_top"><div class="logo_b7__left_top_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b7_img_1.jpg" width="871" height="641" alt="UIX"></div></div>
            <div class="logo_b7__left_center"><div class="logo_b7__left_center_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b7_img_2.jpg" width="307" height="398" alt="UIX"></div></div>
            <div class="logo_b7__left_bottom">
              <div class="logo_b7__left_bottom_1">
                <div class="logo_b7__left_bottom_2_svg"><img src="/bitrix/templates/veonix/assets/img/old/logo/b7_logo.svg" width="124" height="45" class="logo_b7_logo svg_anim lazy" alt="UIX"></div>
              </div>
              <div class="logo_b7__left_bottom_2">
                <div class="st_zg_bg_img">
                  <div class="st_zg_bg_gif_grug">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/logo_b3_video.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="logo_b7__right">
            <div class="logo_b7__right_zg"><div class="logo_b4_t1 font_pd">Дополнительные <br>услуги:</div></div>           
            <div class="logo_b7__right_box">
              <div class="logo_b7__right__item logo_b7__item_1">
                <a href="/zakazat-naming/" class="logo_b7__right__item_name">Нейминг</a>
                <p class="logo_price font_pd"><span>100</span> тыс. руб. </p>
              </div>
              <div class="logo_b7__right__item logo_b7__item_2">
                <a href="/package-design/" class="logo_b7__right__item_name">Дизайн упаковки</a>
                <p class="logo_price font_pd"><span>50</span> тыс. руб. </p>
              </div>
              <div class="logo_b7__right__item logo_b7__item_3">
                <a href="/zakazat-firmenniy-stil/" class="logo_b7__right__item_name">Фирменный стиль</a>
                <p class="logo_price font_pd"><span>150</span> тыс. руб. </p>
              </div>
              <div class="logo_b7__right__item logo_b7__item_4">
                <a href="/brand-book/" class="logo_b7__right__item_name">Брендбук</a>
                <p class="logo_price font_pd"><span>300</span> тыс. руб. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="logo_b8">
      <div class="main">
        <div class="logo_b8_box">
          <div class="logo_b8__left">
            <p class="logo_b8_t1 font_pd">Акция</p>
            <p class="logo_b8_t2">При заказе логотипа — <br>креативный дизайн <br>визиток в подарок!</p>
          </div>
          <div class="logo_b8__right">
            <img data-src="/bitrix/templates/veonix/assets/img/old/logo/b8_img.png" class="logo_b8_img lazy" width="724" height="342" alt="FREE DESIGN">
          </div>
        </div>
        <div class="logo_b8_bg"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b8_bg.png" class="lazy" width="569" width="610" alt="bg"></div>
      </div>
    </section>
    <section class="logo_b9">
      <div class="main">
       <div class="logo_b9_box">
         <div class="logo_b9_left">
           <div class="logo_b9_img">
             <div class="logo_b9__img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b9_img_1.jpg" width="138" height="426" alt="img"></div>
             <div class="logo_b9__img_2"><div class="logo_b9__img_2_box"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b9_img_2.jpg" width="218" height="426" alt="img"></div></div>
             <div class="logo_b9__img_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b9_img_3.jpg" width="320" height="426" alt="img"></div>
           </div>
         </div>
         <div class="logo_b9_right">
          <div class="logo_zg font_pd">Заказать <br> логобук</div>
          <div class="logo_b9__text">
            <p>Также вы можете отдельно заказать логобук по стоимости — 20 000 рублей.</p>
            <p>Логобук — это руководство <br>по правильному использованию логотипа при брендировании любой продукции. </p>
          </div>
         </div>
       </div>
      </div>
    </section>
    <section class="logo_b10">
      <div class="main">
        <div class="logo_b10_box">
          <div class="logo_b2__right logo_b10__left">
            <h2 class="logo_zg font_pd"><span>Как мы создаем</span>  фирменный логотип <br> компании?</h2>
            <div class="logo_b2__content">
              <p>В нашей студии над созданием одного логотипа работает целая команда – арт-директор, маркетолог, аналитик, дизайнер-иллюстратор. У каждого из них своя задача, но общая цель едина – итоговый макет должен нравиться аудитории и вызывать доверие. Поэтому каждый логотип на заказ, который мы создали, отвечает важнейшим качествам.</p>
              <ul>
              <li><p><span style="font-weight: 600;">Лаконичный</span><br> Логотип, не перегруженный <br>лишними деталями, <br> запоминается с первого <br> взгляда.</p></li>
              <li><p><span style="font-weight: 600;">Узнаваемый</span><br> Вызывает положительные эмоции и легко <br> ассоциируется с вашей <br> сферой деятельности.</p></li>
              <li><p><span style="font-weight: 600;">Информативный</span><br> Визуально выражает идею бизнеса компании.</p></li>
              <li><p><span style="font-weight: 600;">Универсальный</span><br> Используется на любых носителях - от визиток <br>до билбордов.</p></li>
              </ul>
            </div>
          </div>
          <div class="logo_b10__right">
            <div class="logo_b10__img">
              <div class="logo_b10__top"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b10_img_1.jpg" class="lazy" width="368" height="445" alt="Empire"></div>
              <div class="logo_b10__center">
                <div class="logo_b10__center_lf">
                  <div class="logo_b10_logo"><img src="/bitrix/templates/veonix/assets/img/old/logo/b10_logo.svg" width="214" height="69" class="logo_b10_logo_svg  svg_anim lazy" alt="Empire"></div>
                </div>
                <div class="logo_b10__center_rg"><div class="logo_b10__center_rg_img"><img data-src="/bitrix/templates/veonix/assets/img/old/logo/b10_img_2.jpg" class="logo_b10_img_2 lazy" width="350" height="424"  alt="Empire"></div></div>
              </div>
              <div class="logo_b10__bottom">
                <div class="logo_b10_video">
                  <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                    <source data-src="/bitrix/templates/veonix/assets/img/old/video/b4_it1_3.mp4" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="logo_b11">
      <div class="main">
        <h2 class="logo_zg font_pd">Этапы разработки <br>логотипа</h2>
        <div class="logo_b11_box">

          <div class="logo_b11__line">
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <p>01</p> 
                  <div class="logo_b11_line_2 logo_b11_ln_1"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line_2.svg" width="324" height="11" class="lazy lg_b11_line_2 svg_anim" alt="line"></div>
                </div> 
                <p>Заполнение брифа</p>
              </div>
              <p class="logo_b11_t2">Прежде, чем заказать логотип, ответьте <br>
                на вопросы о своей компании, особенностях продукта и предпочтениях по дизайну <br>
                с помощью нашего <a href="/brief/">брифа</a>.</p>
            </div>
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <p>02</p> 
                  <div class="logo_b11_line_2 logo_b11_ln_2"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line.svg" width="915" height="11" class="lazy lg_b11_line svg_anim" alt="line"></div>
                </div> 
                <p>Анализ рынка конкурента</p>
              </div>
              <p class="logo_b11_t2">В дело вступает маркетолог, который погружается в нишу, изучает ваш бизнес, рынок и готовит рекомендации дизайнерам.</p>
            </div>
          </div>

          <div class="logo_b11__line">
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <div class="logo_b11_line_1 logo_b11_ln_7"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line_3.svg" width="565" height="11"  class="lazy lg_b11_line_7 svg_anim" alt="line"></div>
                  <p>03</p> 
                  <div class="logo_b11_line_2 logo_b11_ln_3"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line_2.svg" width="324" height="11" class="lazy lg_b11_line_3 svg_anim" alt="line"></div>
                </div> 
                <p>Создание логотипа</p>
              </div>
              <p class="logo_b11_t2">Дизайнеры создают 5 независимых концепций вашего будущего логотипа. После того, как заказчик остановился на одном из образов, готовим еще 10 производных макетов на основе выбранного варианта с различными шрифтами, начертанием и цветовой гаммой.</p>
            </div>
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <p>04</p> 
                  <div class="logo_b11_line_2 logo_b11_ln_4"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line.svg" width="915" height="11" class="lazy lg_b11_line_4 svg_anim" alt="line"></div>
                </div> 
                <p>Окончательная доработка</p>
              </div>
              <p class="logo_b11_t2">После выбора одного из 10 производных макетов, делаем финальную прорисовку логотипа и вносим правки до полного утверждения заказчиком.</p>
            </div>
          </div>

          <div class="logo_b11__line">
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <div class="logo_b11_line_1 logo_b11_ln_8"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line_3.svg" width="565" height="11" class="lazy lg_b11_line_8 svg_anim" alt="line"></div>
                  <p>05</p> 
                  <div class="logo_b11_line_2 logo_b11_ln_5"><img src="/bitrix/templates/veonix/assets/img/old/logo/b11_line_2.svg" width="324" height="11" class="lazy lg_b11_line_5 svg_anim" alt="line"></div>
                </div> 
                <p>Разработка логобука</p>
              </div>
              <p class="logo_b11_t2">Если вам нужны четкие рекомендации <br>
                по использованию логотипа на разных носителях, создаем небольшое руководство, с которым ваша визуальная реклама будет максимально эффективной.</p>
            </div>
            <div class="logo_b11__item">
              <div class="logo_b11_t1 font_pd">
                <div class="logo_b11_t1_nmb">
                  <p>06</p> 
                </div> 
                <p>Передача макета</p>
              </div>
              <p class="logo_b11_t2">Вы получаете логотип в нескольких графических форматах – от PNG до Adobe Illustrator в редактируемом векторном формате, готовый к печати или нанесению на любые рекламные носители.</p>
            </div>
          </div>

        </div>
        <div class="logo_b11_bg">
          <div class="logo_b11__bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_1.svg" width="278" height="260" alt="bg"></div>
          <div class="logo_b11__bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="230" height="426" alt="bg"></div>
          <div class="logo_b11__bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="152" height="280" alt="bg"></div>
          <div class="logo_b11__bg_4"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="236" height="339" alt="bg"></div>
          <div class="logo_b11__bg_5"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="311" height="447" alt="bg"></div>
        </div>
      </div>
    </section>
    <section class="st_b15 logo_b12">
      <div class="main">
        <p class="st_b15_zg">Наши заказчики</p>
        <div class="logo_zg font_pd" style="text-align: center;">Крупнейшие компании</div>
        <div class="st_b15_kl">
          <div class="st_b15_kl_bx">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/g-duma.svg" class="lazy" alt="Государственная дума">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/bl.svg" class="lazy" alt="Билайн">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/sit.svg" class="lazy" alt="Ситилинк">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/let.svg" class="lazy" alt="Летуаль">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/gz.svg" class="lazy" alt="Газпром">
          </div>
          <div class="st_b15_kl_btn">
            
            <a href="/customers/" class="sbm sbm-2" style="font-size:12px;">Посмотреть всех клиентов</a>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="logo_b13">
      <div class="main">
        <div class="logo_b13_box">
          <div class="logo_b13_lf">
            <div class="logo_b13__top">
              <div class="logo_b13__top_bg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b13_bg.png" width="299" height="228" alt="bg"></div>
              <div class="logo_b13__top_content"><div class="logo_b13__top_content_img"><img class="lazy lg_logo_b13" width="200" height="58" data-src="/bitrix/templates/veonix/assets/img/old/logo/b13_logo.svg" alt="ARTSY"></div></div>
            </div>
            <div class="logo_b13__center">
              <div class="logo_b13__center_bg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b13_bg.png" width="470" height="358" alt="bg"></div>
              <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b13_img.png" width="573" height="532" alt="ARTSY">
              <p>Color is everything</p>
            </div>
          </div>
          <div class="logo_b13_rg">
            <div class="logo_zg font_pd"><span>Надежно</span> гарантируем <br>качество</div>
            <div class="logo_b13_rg_box">
              <div class="logo_b13_rg__item">
                <p class="logo_b13_rg_t1 font_pd">Работаем <br>по договору</p>
                <p class="logo_b13_rg_t2">Прописываем сроки, стоимость и финансовые гарантии заказчика.</p>
              </div>
              <div class="logo_b13_rg__item">
                <p class="logo_b13_rg_t1 font_pd">Платим  <br>за просрочку</p>
                <p class="logo_b13_rg_t2">Если работа не сдана вовремя, оплачиваем неустойку за каждый день просрочки.</p>
              </div>
              <div class="logo_b13_rg__item">
                <p class="logo_b13_rg_t1 font_pd">Бесплатно <br>вносим правки</p>
                <p class="logo_b13_rg_t2">По желанию заказчика делаем доработку проекта в течение месяца после сдачи заказ. </p>
              </div>
              <div class="logo_b13_rg__item">
                <p class="logo_b13_rg_t1 font_pd">Возвращаем <br>деньги</p>
                <p class="logo_b13_rg_t2">Если результат <br>не удовлетворил клиента.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="logo_b14">
      <div class="main">
        <div class="logo_zg font_pd">Вопросы, которые нам <br> часто задают</div>
        <div class="faq_box" itemscope itemtype="https://schema.org/FAQPage">

          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <p class="faq_box__title" itemprop="name">Для чего нужен логотип компании?</p>
            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
              <div class="faq_box__item_main" itemprop="text">
                <p>Без хорошего логотипа не построить успешный бизнес. Сначала вам необходимо просто выделиться среди конкурентов, чтобы вас и ваши продукты узнавали. Первые шаги в развитии бизнеса потребуют наличия фирменного знака, без которого невозможно запустить рекламу, заказать упаковку или этикетки для товаров. </p>
              </div>
            </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <p class="faq_box__title" itemprop="name">Когда необходим редизайн логотипа?</p>
            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div class="faq_box__item_main" itemprop="text">
                <p>Время не стоит на месте, фирма растет, меняются подходы к ведению бизнеса и работы с клиентами. А значит, должен развиваться ваш визуальный образ. Мы умеем грамотно освежить логотип компании, сделать более современным, отвечающим новым вызовам рынка. Но при этом он останется узнаваемым для ваших клиентов. </p>
              </div>
            </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <p class="faq_box__title" itemprop="name">Сколько стоит разработка логотипа?</p>
            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div class="faq_box__item_main" itemprop="text">
                <p>С нашими тарифами вы можете ознакомиться выше, но в каждом случае стоимость может варьироваться исходя из сложности задачи, особых пожеланий клиента и количества вариантов создания образов логотипа. Чтобы узнать точную стоимость вашего проекта, оставьте заявку на сайте или позвоните, и мы быстро выполним расчет.</p>
              </div>
            </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <p class="faq_box__title" itemprop="name">Как оформить заказ?</p>
            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div class="faq_box__item_main" itemprop="text">
                <p>Заказать логотип в нашей студии — это мудрый выбор с гарантией отличного результата. Мы разработаем для вас классный фирменный знак, который будет годами привлекать интерес к вашим товарам или услугам. </p>
                <p>Чтобы оформить заказ, просто свяжитесь с нами. Менеджер поможет четко сформировать задачу и расскажет о каждом этапе нашей совместной работы.</p>
                <p><a href="#form" data-fancybox="" data-text="Заказать обратрный звонок - FAQ - Страница о логотипах - Логотипы" class="sbm">Заказать обратный звонок</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
</div>
 
<section class="home_team team_old_page">
    <div class="main">
      <h2 class="home_h2">Ключевые сотрудники</h2>
	  <p class="home_service_descript">Нам доверяют госкорпорации, крупнейшие российские <br> и международные компании:</p>

            
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list", 
                    "team", 
                    array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "COMPONENT_TEMPLATE" => "team",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "17",
                        "IBLOCK_TYPE" => "-",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "9",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "DOLJ",
                            2 => "INFO",
                            3 => "URL",
                            4 => "PRICE",
                            5 => "EMAIL",
                            6 => "ADDRES",
                            7 => "MAPS",
                            8 => "PHONE",
                            9 => "",
                        ),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    ),
                    false
                );?>

  
      <div class="bt_black_bg bt_white_bg">
        <a href="/nasha-komanda/">
          <span>Показать еще</span>
          <i></i>
        </a>
      </div>
    </div>
</section>
<div class="old_page"> 
    <section class="st_b18 logo_b15">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/logo_b3_video.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Вам нужен <br> эффективный <br>
            и стильный логотип? </div>
          <p class="st_opis"> Позвоните нам по телефону <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a><br>
            или подайте заявку на обратный звонок</p>
        </div>
        <div class="st_form_bx">
          <div class="st_form">
           <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "Заявку на расчет стоимости - Логотипы" >ЗАКАЗАТЬ ЗВОНОК</a>
          </div>
         
        </div>
      </div>
    </section>
     <section class="poleznaya">
        <div class="main">
           <h2 class="home_h2">Полезная информация по теме</h2>
           <p><a href="/blog/logotype-creating/">Создание логотипа в вопросах и ответах</a></p>
          <p><a href="/blog/kak-sozdat-logotip-esli-vy-ne-dizajner/">Как создать логотип, если вы не дизайнер</a></p>
          <p><a href="/blog/kak-ponyat-chto-vash-logotip-ustarel/">Как понять, что ваш логотип устарел?</a></p>
      </div>
    </section>
  </main>
 
 
</div>



<?$APPLICATION->IncludeComponent(
          "bitrix:news.list", 
          "logo", 
          array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPONENT_TEMPLATE" => "logo",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
              0 => "ID",
              1 => "CODE",
              2 => "XML_ID",
              3 => "NAME",
              4 => "TAGS",
              5 => "SORT",
              6 => "PREVIEW_TEXT",
              7 => "PREVIEW_PICTURE",
              8 => "DETAIL_TEXT",
              9 => "DETAIL_PICTURE",
              10 => "DATE_ACTIVE_FROM",
              11 => "ACTIVE_FROM",
              12 => "DATE_ACTIVE_TO",
              13 => "ACTIVE_TO",
              14 => "SHOW_COUNTER",
              15 => "SHOW_COUNTER_START",
              16 => "IBLOCK_TYPE_ID",
              17 => "IBLOCK_ID",
              18 => "IBLOCK_CODE",
              19 => "IBLOCK_NAME",
              20 => "IBLOCK_EXTERNAL_ID",
              21 => "DATE_CREATE",
              22 => "CREATED_BY",
              23 => "CREATED_USER_NAME",
              24 => "TIMESTAMP_X",
              25 => "MODIFIED_BY",
              26 => "USER_NAME",
              27 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "19",
            "IBLOCK_TYPE" => "customers",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "30",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
              0 => "",
              1 => "LOGO",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "TIMESTAMP_X",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
          ),
          false
);?>
<section class="home_clientabout">
    <div class="main">
      <div class="home_clientabout_top">
        <h2 class="home_h2">Клиенты о нас</h2>
        <a href="/otzyvy/"  class="button_line" >
          <span>читать все отзывы</span>
          <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
        </a>
      </div>
      <div class="otziv_list">      
          <?$APPLICATION->IncludeComponent(
            "bitrix:news.list", 
            "otziv", 
            array(
              "ACTIVE_DATE_FORMAT" => "d.m.Y",
              "ADD_SECTIONS_CHAIN" => "N",
              "AJAX_MODE" => "N",
              "AJAX_OPTION_ADDITIONAL" => "",
              "AJAX_OPTION_HISTORY" => "N",
              "AJAX_OPTION_JUMP" => "N",
              "AJAX_OPTION_STYLE" => "N",
              "CACHE_FILTER" => "N",
              "CACHE_GROUPS" => "Y",
              "CACHE_TIME" => "36000000",
              "CACHE_TYPE" => "A",
              "CHECK_DATES" => "Y",
              "COMPONENT_TEMPLATE" => "otziv",
              "DETAIL_URL" => "",
              "DISPLAY_BOTTOM_PAGER" => "Y",
              "DISPLAY_DATE" => "Y",
              "DISPLAY_NAME" => "Y",
              "DISPLAY_PICTURE" => "Y",
              "DISPLAY_PREVIEW_TEXT" => "Y",
              "DISPLAY_TOP_PAGER" => "N",
              "FIELD_CODE" => array(
                0 => "ID",
                1 => "CODE",
                2 => "XML_ID",
                3 => "NAME",
                4 => "TAGS",
                5 => "SORT",
                6 => "PREVIEW_TEXT",
                7 => "PREVIEW_PICTURE",
                8 => "DETAIL_TEXT",
                9 => "DETAIL_PICTURE",
                10 => "DATE_ACTIVE_FROM",
                11 => "ACTIVE_FROM",
                12 => "DATE_ACTIVE_TO",
                13 => "ACTIVE_TO",
                14 => "SHOW_COUNTER",
                15 => "SHOW_COUNTER_START",
                16 => "IBLOCK_TYPE_ID",
                17 => "IBLOCK_ID",
                18 => "IBLOCK_CODE",
                19 => "IBLOCK_NAME",
                20 => "IBLOCK_EXTERNAL_ID",
                21 => "DATE_CREATE",
                22 => "CREATED_BY",
                23 => "CREATED_USER_NAME",
                24 => "TIMESTAMP_X",
                25 => "MODIFIED_BY",
                26 => "USER_NAME",
                27 => "",
              ),
              "FILTER_NAME" => "",
              "HIDE_LINK_WHEN_NO_DETAIL" => "N",
              "IBLOCK_ID" => "20",
              "IBLOCK_TYPE" => "customers",
              "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
              "INCLUDE_SUBSECTIONS" => "Y",
              "MESSAGE_404" => "",
              "NEWS_COUNT" => "10",
              "PAGER_BASE_LINK_ENABLE" => "N",
              "PAGER_DESC_NUMBERING" => "N",
              "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
              "PAGER_SHOW_ALL" => "N",
              "PAGER_SHOW_ALWAYS" => "N",
              "PAGER_TEMPLATE" => ".default", 
              "PARENT_SECTION" => "10",
              "PARENT_SECTION_CODE" => "",
              "PREVIEW_TRUNCATE_LEN" => "",
              "PROPERTY_CODE" => array(
                0 => "REF",
                1 => "STARS",
                2 => "URL",
                3 => "",
              ),
              "SET_BROWSER_TITLE" => "N",
              "SET_LAST_MODIFIED" => "N",
              "SET_META_DESCRIPTION" => "N",
              "SET_META_KEYWORDS" => "N",
              "SET_STATUS_404" => "N",
              "SET_TITLE" => "N",
              "SHOW_404" => "N",
              "SORT_BY1" => "SORT",
              "SORT_BY2" => "TIMESTAMP_X",
              "SORT_ORDER1" => "ASC",
              "SORT_ORDER2" => "DESC",
              "STRICT_SECTION_CHECK" => "N"
            ),
            false
          );?>
       </div>
   </div>
 </section>

<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_1" => "",
		"TITLE_2" => "",
		"TITLE_3" => "",
		"TYPE" => "text",
		"TYPE_TEXT" => " Логотип, Презентация, Дизайн упаковки, Гайдбук, Брендбук, Коммерческое предложение, Видеоролик, Маркетинг-кит, Другое"
	),
	false
);?>
<script>$(document).ready(function () {
  $('.faq_box__item').on('click', function() {
    if (!$(this).hasClass("active")) {
      $('.faq_box__item').removeClass('active');
      $('.faq_box__item__content').hide(500);
      $(this).addClass('active');
      $(this).children(".faq_box__item__content").slideToggle();
    } else {
      $(this).removeClass('active');
      $(this).children(".faq_box__item__content").slideToggle();
    }
  });
});</script>

<script>
      if ($(".svg_anim").length > 0) { 
          let b3_img_2_svg_opt = '[{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"30","strokeDashoffset":"30","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"47","strokeDashoffset":"47","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"48","strokeDashoffset":"48","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"42","strokeDashoffset":"42","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"20","strokeDashoffset":"20","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"60","strokeDashoffset":"60","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"56","strokeDashoffset":"56","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"45","strokeDashoffset":"45","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"58","strokeDashoffset":"58","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"69","strokeDashoffset":"69","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"46","strokeDashoffset":"46","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"48","strokeDashoffset":"48","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"60","strokeDashoffset":"60","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"34","strokeDashoffset":"34","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"70","strokeDashoffset":"70","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"141","strokeDashoffset":"141","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"70","strokeDashoffset":"70","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"127","strokeDashoffset":"127","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"113","strokeDashoffset":"113","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"105","strokeDashoffset":"105","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"119","strokeDashoffset":"119","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"69","strokeDashoffset":"69","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"115","strokeDashoffset":"115","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"69","strokeDashoffset":"69","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"96","strokeDashoffset":"96","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"47","strokeDashoffset":"47","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"82","strokeDashoffset":"82","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"}]';
    let b3_img_3_svg_opt = '[{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"135","strokeDashoffset":"135","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"35","strokeDashoffset":"35","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"52","strokeDashoffset":"52","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"60","strokeDashoffset":"60","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"66","strokeDashoffset":"66","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"65","strokeDashoffset":"65","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"59","strokeDashoffset":"59","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"241","strokeDashoffset":"241","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"5","strokeDashoffset":"5","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"315","strokeDashoffset":"315","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"285","strokeDashoffset":"285","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"274","strokeDashoffset":"274","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"263","strokeDashoffset":"263","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"251","strokeDashoffset":"251","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"231","strokeDashoffset":"231","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"203","strokeDashoffset":"203","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"163","strokeDashoffset":"163","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"104","strokeDashoffset":"104","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"79","strokeDashoffset":"79","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"18","strokeDashoffset":"18","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"5","strokeDashoffset":"5","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"5","strokeDashoffset":"5","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"4","strokeDashoffset":"4","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"101","strokeDashoffset":"101","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"22","strokeDashoffset":"22","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"136","strokeDashoffset":"136","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"54","strokeDashoffset":"54","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"105","strokeDashoffset":"105","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"136","strokeDashoffset":"136","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"309","strokeDashoffset":"309","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"37","strokeDashoffset":"37","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"25","strokeDashoffset":"25","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"32","strokeDashoffset":"32","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"39","strokeDashoffset":"39","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"39","strokeDashoffset":"39","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"32","strokeDashoffset":"32","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"33","strokeDashoffset":"33","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"28","strokeDashoffset":"28","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"31","strokeDashoffset":"31","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"28","strokeDashoffset":"28","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"22","strokeDashoffset":"22","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"}]';
    let b3_img_4_svg_opt = '[{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"134","strokeDashoffset":"10","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"93","strokeDashoffset":"93","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"2","strokeDashoffset":"2","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"63","strokeDashoffset":"63","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"62","strokeDashoffset":"62","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"65","strokeDashoffset":"65","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 0ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 0ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 0ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"0ms, 500ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"0ms, 500ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.1","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 0ms, 1000ms"},{"strokeWidth":"0","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 0ms, 1000ms"},{"strokeWidth":"0","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 0ms, 1500ms","animationDuration":"1000ms, 0ms, 500ms"},{"strokeWidth":"0","stroke":"","fill":"","strokeDasharray":"0","strokeDashoffset":"0","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"500ms, 0ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"290","strokeDashoffset":"31","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"114","strokeDashoffset":"103","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 800ms, 1000ms"}]';
    let b4_logo_opt = '[{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"24","strokeDashoffset":"24","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"31","strokeDashoffset":"31","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"22","strokeDashoffset":"22","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"20","strokeDashoffset":"20","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"136","strokeDashoffset":"136","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.5","stroke":"","fill":"","strokeDasharray":"175","strokeDashoffset":"175","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.5","stroke":"","fill":"","strokeDasharray":"161","strokeDashoffset":"161","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.5","stroke":"","fill":"","strokeDasharray":"159","strokeDashoffset":"159","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"75","strokeDashoffset":"75","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"65","strokeDashoffset":"65","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"62","strokeDashoffset":"62","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"69","strokeDashoffset":"69","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"74","strokeDashoffset":"74","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"47","strokeDashoffset":"47","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"76","strokeDashoffset":"76","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"66","strokeDashoffset":"66","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"83","strokeDashoffset":"83","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"84","strokeDashoffset":"84","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"28","strokeDashoffset":"28","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.3","stroke":"","fill":"","strokeDasharray":"70","strokeDashoffset":"70","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"19","strokeDashoffset":"19","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"19","strokeDashoffset":"19","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"19","strokeDashoffset":"19","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"21","strokeDashoffset":"21","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"202","strokeDashoffset":"202","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"}]';
    let logo_b7_logo_opt = '[{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"95","strokeDashoffset":"95","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"41","strokeDashoffset":"41","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"164","strokeDashoffset":"164","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"33","strokeDashoffset":"33","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"18","strokeDashoffset":"18","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"46","strokeDashoffset":"46","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"6","strokeDashoffset":"6","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"16","strokeDashoffset":"16","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"54","strokeDashoffset":"54","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"6","strokeDashoffset":"6","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"16","strokeDashoffset":"16","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"27","strokeDashoffset":"27","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"41","strokeDashoffset":"41","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"22","strokeDashoffset":"22","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"41","strokeDashoffset":"41","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"54","strokeDashoffset":"54","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"41","strokeDashoffset":"41","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"35","strokeDashoffset":"35","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"32","strokeDashoffset":"32","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.4","stroke":"","fill":"","strokeDasharray":"35","strokeDashoffset":"35","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"}]';
    let logo_b10_logo_svg_opt = '[{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"73","strokeDashoffset":"73","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"88","strokeDashoffset":"88","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"61","strokeDashoffset":"61","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"32","strokeDashoffset":"32","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"75","strokeDashoffset":"75","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"73","strokeDashoffset":"73","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"101","strokeDashoffset":"101","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"89","strokeDashoffset":"89","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"74","strokeDashoffset":"74","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"81","strokeDashoffset":"81","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"89","strokeDashoffset":"89","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"102","strokeDashoffset":"102","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"99","strokeDashoffset":"99","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"81","strokeDashoffset":"81","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"192","strokeDashoffset":"192","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"54","strokeDashoffset":"54","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"93","strokeDashoffset":"93","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"31","strokeDashoffset":"31","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"33","strokeDashoffset":"33","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"24","strokeDashoffset":"24","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"25","strokeDashoffset":"25","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"134","strokeDashoffset":"114","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"164","strokeDashoffset":"164","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"21","strokeDashoffset":"21","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"20","strokeDashoffset":"20","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"29","strokeDashoffset":"29","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"28","strokeDashoffset":"28","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"42","strokeDashoffset":"42","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"24","strokeDashoffset":"24","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"},{"strokeWidth":"0.2","stroke":"","fill":"","strokeDasharray":"157","strokeDashoffset":"157","animationTimingFunction":"","animationDelay":"0ms, 500ms, 1500ms","animationDuration":"1000ms, 2000ms, 1000ms"}]';
    let lg_b11_line_2_opt = '[{"strokeWidth":"1","stroke":"","fill":"","strokeDasharray":"311","strokeDashoffset":"311","animationTimingFunction":"","animationDelay":"0ms, 700ms, 700ms","animationDuration":"500ms, 500ms, 1000ms"},{"strokeWidth":"0.5","stroke":"","fill":"","strokeDasharray":"29","strokeDashoffset":"29","animationTimingFunction":"","animationDelay":"100ms, 100ms, 100ms","animationDuration":"500ms, 500ms, 500ms"},{"strokeWidth":"0.5","stroke":"","fill":"","strokeDasharray":"29","strokeDashoffset":"29","animationTimingFunction":"","animationDelay":"1600ms, 1200ms, 1300ms","animationDuration":"2200ms, 2300ms, 1600ms"}]';
    let lg_b11_line_opt = '[{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"907","strokeDashoffset":"907","animationTimingFunction":"","animationDelay":"2000ms, 2000ms, 1800ms","animationDuration":"1000ms, 800ms, 700ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"29","strokeDashoffset":"29","animationTimingFunction":"","animationDelay":"1200ms, 700ms, 1300ms","animationDuration":"500ms, 500ms, 500ms"}]';
    let lg_b11_line_7_opt = '[{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"556","strokeDashoffset":"556","animationTimingFunction":"","animationDelay":"0ms, 0ms, 0ms","animationDuration":"500ms, 500ms, 500ms"},{"strokeWidth":"","stroke":"","fill":"","strokeDasharray":"29","strokeDashoffset":"29","animationTimingFunction":"","animationDelay":"0ms, 500ms, 500ms","animationDuration":"500ms, 500ms, 500ms"}]';
    function loadSVGAnim(className, objName, px, option) {
          let loadSVG = function () {
            SVGAnimate.init({
              element: "."+objName,
              animations: option
          })};
          
          if (!px) {px = 5; }
          let client_h=(window.innerHeight/100)*px;
          let h_show = $("."+className).offset().top ;

          if ($(window).scrollTop()+window.innerHeight > h_show && $("."+objName+" + .svg-animate-img").length<1) {
            console.log(objName);
            loadSVG(objName)
          } else {
            $(window).on("scroll", function() {
              if ($(window).scrollTop()+window.innerHeight > h_show - client_h && $("."+objName+" + .svg-animate-img").length<1) { console.log(objName);loadSVG(objName)};
            });
          };
    };

      if ($(".b1_line").length > 0) {loadSVGAnim("logo_b1__right", "b1_line", 40);};
      if ($(".b1_logo_2").length > 0) {loadSVGAnim("logo_b1__right", "b1_logo_2", 80);};
      if ($(".b2_logo_1").length > 0) {loadSVGAnim("logo_b2__bx", "b2_logo_1", 80);};
      if ($(".b2_logo_2").length > 0) {loadSVGAnim("logo_b2__bx", "b2_logo_2", 40);};
      if ($(".b3_img_1_svg").length > 0) {loadSVGAnim("logo_b3_1", "b3_img_1_svg", 80);};
      if ($(".b3_img_2_svg").length > 0) {loadSVGAnim("logo_b3_2", "b3_img_2_svg", 80, b3_img_2_svg_opt);};
      if ($(".b3_img_3_svg").length > 0) {loadSVGAnim("logo_b3_3", "b3_img_3_svg", 40, b3_img_3_svg_opt);};
      if ($(".b3_img_4_svg").length > 0) {loadSVGAnim("logo_b3_4", "b3_img_4_svg", 40, b3_img_4_svg_opt);};
      if ($(".b3_img_5_svg").length > 0) {loadSVGAnim("logo_b3_5", "b3_img_5_svg", 40);};
      if ($(".b4_logo").length > 0) {loadSVGAnim("logo_b4__img__bottom_center", "b4_logo", 80, b4_logo_opt);};
      if ($(".logo_b7_logo").length > 0) {loadSVGAnim("logo_b7__left_bottom_1", "logo_b7_logo", 80, logo_b7_logo_opt);};
      if ($(".logo_b10_logo_svg").length > 0) {loadSVGAnim("logo_b10__center", "logo_b10_logo_svg", 80, logo_b10_logo_svg_opt);};

      if ($(".lg_b11_line_2").length > 0) {loadSVGAnim("logo_b11_ln_1", "lg_b11_line_2", 80, lg_b11_line_2_opt);};
      if ($(".lg_b11_line").length > 0) {loadSVGAnim("logo_b11_ln_2", "lg_b11_line", 80, lg_b11_line_opt);};

      if ($(".lg_b11_line_3").length > 0) {loadSVGAnim("logo_b11_ln_3", "lg_b11_line_3", 80, lg_b11_line_2_opt);};
      if ($(".lg_b11_line_4").length > 0) {loadSVGAnim("logo_b11_ln_4", "lg_b11_line_4", 80, lg_b11_line_opt);};

      if ($(".lg_b11_line_5").length > 0) {loadSVGAnim("logo_b11_ln_5", "lg_b11_line_5", 80, lg_b11_line_2_opt);};

      if ($(".lg_b11_line_7").length > 0) {loadSVGAnim("logo_b11_ln_7", "lg_b11_line_7", 80, lg_b11_line_7_opt);};
      if ($(".lg_b11_line_8").length > 0) {loadSVGAnim("logo_b11_ln_8", "lg_b11_line_8", 80, lg_b11_line_7_opt);};
      }
  </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>