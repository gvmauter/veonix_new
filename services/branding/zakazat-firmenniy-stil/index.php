<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать создание фирменного стиля под ключ — стоимость 150 тысяч рублей. Визуальный образ компании выделит вас среди конкурентов и будет работать на имидж вашего бизнеса. Студия дизайна Veonix в Москве: 8 (800) 222-77-65.");
$APPLICATION->SetPageProperty("title", "Разработка фирменного стиля в Москве – цена в студии дизайна Veonix 150 тыс. руб.");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Брендинг","/branding/");
$APPLICATION->AddChainItem("Фирменный стиль");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Разработка фирменного",
		"TEMPLATE_FOR_TITLE2" => "стиля",
		"TEMPLATE_FOR_TITLE3" => " компании",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создадим фирменный стиль, который <br> сделает вашу компанию узнаваемой <br> и поставит на голову выше конкурентов",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

 
<div class="old_page">

<section class="st_b1" >
    <div class="main">
      <div class="st_b1_sibur anm" >
        <div class="st_b1_sibur_box">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_sibur_logo.svg" class="b1_sibur_logo lazy " alt="Sibur">
          <div class="st_hidden"><img src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_sibur_img_1.jpg" class="b1_sibur_img_1 lazy"  alt="Sibur"></div>
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_sibur_img_2.png" class="b1_sibur_img_2 lazy "   alt="Sibur">
        </div>
      </div>
      <div class="st_b1_min">
        <div class="st_b1_min_box">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_min_logo.svg" class="b1_min_logo lazy" alt="Мин. сельского хоз-ва РФ">
          <div class="st_hidden anm"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_min_img_1.jpg" class="b1_min_img_1 lazy" d alt="Мин. сельского хоз-ва РФ"></div>
          <img src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_min_img_2.png" class="b1_min_img_2 lazy" alt="Мин. сельского хоз-ва РФ">
        </div>
      </div>
      <div class="st_b1_gaz">
        <div class="st_b1_gaz_gaz anm">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_gaz_logo.svg" class="b1_gaz_logo lazy " alt="ГазПром">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_gaz_img_1.jpg" class="b1_gaz_img_1 lazy " alt="ГазПром">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b1_gaz_img_2.png" class="b1_gaz_img_2 lazy " alt="ГазПром">
        </div>
      </div>
      <div class="st_b1_content ">
        <h2 class="st_b1_h2 wow animate__animated animate__fadeIn">Фирменный <br>
          стиль на заказ  <br>
          у нас это:</h2>
        <div class="st_b1_content_box">

          <div class="st_b1_content_it">
            <div class="st_b1_content_it_main">
              <p class="st_b1_content_it_t1 wow animate__animated animate__flipInX">100<span>%</span></p>
              <p class="st_b1_content_it_t2 wow animate__animated animate__fadeInUp">возврат денег,если <br>
                результат не устраивает</p>
            </div>
          </div>
          <div class="st_b1_content_it">
            <div class="st_b1_content_it_main">
              <p class="st_b1_content_it_t1 wow animate__animated animate__flipInX"> 150 <span>тыс. руб.</span></p>
              <p class="st_b1_content_it_t2 wow animate__animated animate__fadeInUp">создание фирменного <br>стиля “под ключ” </p>
            </div>
          </div>
          <div class="st_b1_content_it">
            <div class="st_b1_content_it_main">
              <p class="st_b1_content_it_t1 wow animate__animated animate__flipInX">24 <span>часа</span></p>
              <p class="st_b1_content_it_t2 wow animate__animated animate__fadeInUp">через 1 день вы получаете <br>
                первые эскизы</p>
            </div>
          </div>
          <div class="st_b1_content_it">
            <div class="st_b1_content_it_main">
              <p class="st_b1_content_it_t1 wow animate__animated animate__flipInX"> 5 <span>макетов</span></p>
              <p class="st_b1_content_it_t2 wow animate__animated animate__fadeInUp">носителей <br>бренда на выбор<br>
                концепций</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <section class="st_b2">
    <div class="main">
      <div class="st_b2_box">
        <div class="st_b2_lf wow animate__animated animate__fadeInLeftBig"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b2_img.jpg" class="lazy" alt="Natural Shop"></div>
        <p class="wow animate__animated animate__fadeInRightBig">Неограниченное <br>
          количество правок <br>
          вносим в макеты
          </p>
      </div>
    </div>
  </section>
  <section class="st_b3">
    <div class="main">
      <div class="st_b3_left">
        <p class="st_b3_h2">
          <span>Стоимость</span> 
          <span>разработки</span> 
          <span>фирменного стиля</span>
        </p>
      </div>
      <div class="st_b3_right">
        <p>Обычно работа по разработке бренда начинается с нейминга <br>
        и логотипа. Но зачастую заказчики приходят уже с готовым названием и торговым знаком. В этом случае им необходимо создание единого фирменного стиля товара или самого бренда. Выбирайте задачу по собственным потребностям. Мы готовы оказать качественные услуги на любом этапе работы.
        </p>

      </div>
	  <div class="st_b3_bg">
		  <img class="st_b13_img-fix_2 " alt="" src="/bitrix/templates/veonix/assets/img/old/firm_style/b13_2.svg" >
	  </div>
    </div>
  </section>

  <section class="st_b4 " id="stage">
    <div class="main">
      
      <div class="st_b4_it s5_b4_it_1">
        <div class="st_b4_it_box ">
          <h3 class="st_b4_h2">Фирменный стиль</h3>
          <div class="st_b4_text">
            <p>Включает разработку всех визуальных элементов (кроме лого и нейминга).</p>
            <p>Вы получаете гайдбук с подробным руководством  <br>
по применению фирменного стиля на 20 листов <br>
и 5 любых носителей бренда на выбор <br>
(визитки, презентация, фирменный бланк и т.д.)</p>
          </div>
          <div class="st_b4_price">
            <p> 150 <span>тыс. руб.</span></p>
            <a href="#order" data-fancybox="" data-text="Заказать - Фирменный стиль - Фирменный стиль" class="sbm">ЗАКАЗАТЬ</a>
          </div>
        </div>
        <div class="st_b4_it_img" >
          <div class="st_b4_it_img_content">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it1_1.jpg" src="/bitrix/templates/veonix/assets/img/old/firm_style/356x445.jpg" class="lazy b4_it1_1 box" alt="Фирменный стиль">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it1_2.jpg" src="/bitrix/templates/veonix/assets/img/old/firm_style/329x358.jpg" class="lazy b4_it1_2 box" alt="Фирменный стиль">
            <div class="st_b4_gif_1">
              <video class="box_video lazy box" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b4_it1_3.mp4" type="video/mp4">
              </video>
            </div>
          </div>
        </div>

      </div>



      <div class="st_b4_it s5_b4_it_2">
        <div class="st_b4_it_box">
          <h3 class="st_b4_h2">Брендбук</h3>
          <div class="st_b4_text">
            <p>Включает создание позиционирования бренда, фирменного стиля, разработку дизайн-макетов <br> 7 любых носителей бренда, которые готовы <br> к печати, и полное руководство по использованию графических элементов.</p>
          </div>
          <div class="st_b4_price">
            <p> 300  <span>тыс. руб.</span></p>
            <a href="/brand-book/"  class="sbm">ЗАКАЗАТЬ Брендбук</a>
          </div>
        </div>
        <div class="st_b4_it_img">
          <div class="st_b4_it_img_content">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it2_1.jpg" class="b4_it2_1 lazy" alt="Брендбук">

          </div>
        </div>
      </div>

      <div class="st_b4_it s5_b4_it_3">
        <div class="st_b4_it_box">
          <h3 class="st_b4_h2">Логотип</h3>
          <div class="st_b4_text">
            <p>Сделаем классный нетипичный логотип, нарисованный от руки. Logo будет сразу ассоциироваться с деятельностью вашей фирмы.</p>
          </div>
          <div class="st_b4_price">
            <p> 100 <span>тыс. руб.</span></p>
            <a href="/logos/" class="sbm">ЗАКАЗАТЬ Логотип</a>
          </div>
        </div>
        <div class="st_b4_it_img">
          <div class="st_b4_it_img_content">
           
            <div class="st_b4_it_women">
              <div class="st_b4_it_women_it">
                <p>Скетч</p>
                <div class="st_b4_it_women_img"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it3_3.png" class="lazy b4_it3_3" alt="Логотип"></div>
              </div>
              <div class="st_b4_it_women_it">
                <p>ЛОГОТИП</p>
                <div class="st_b4_it_women_img"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it3_4.png" class="lazy b4_it3_4" alt="Логотип"></div>
              </div>
            </div>
            <div class="st_b4_it_3_img">
              <div class="st_b4_it_3_3"> <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b4_it3_1.jpg" class="lazy b4_it3_1" alt="Логотип"></div>
              <div class="st_b4_it_video">
                <a href="https://youtu.be/Sv33IMP3j9g?autoplay=1" data-fancybox="video">
                  <i class="play"></i>
                  <span>СМОТРЕТЬ</span>
                </a>
                <div class="st_b4_video_bg_it">
                  <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                    <source data-src="/bitrix/templates/veonix/assets/img/old/video/b4_it3_2.mp4" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="st_b5">
    <div class="main">
      <div class="st_b5_top">
        <div class="st_b5_top_lf">
          <div class="st_b5_top_lf_box">
            <video class="box_video lazy" width="175px" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
              <source data-src="/bitrix/templates/veonix/assets/img/old/video/b5_img_1.mp4" type="video/mp4">
            </video>
           
          </div>
        </div>
        <div class="st_b5_top_lf_rg">
          <div class="st_b5_top_rg_box">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_2.svg" class="lazy b5_img_2" alt="Нейминг">
          </div>
        </div>
      </div>
      <div class="st_b4_it s5_b4_it_4">
        <div class="st_b4_it_box">
          <h3 class="st_b4_h2">Нейминг</h3>
          <div class="st_b4_text">
            <p>Разработаем несколько вариантов звучного и запоминающегося названия, которое отражает суть вашего бренда, проекта, товара или услуги. Дополним название мощным слоганом.</p>
          </div>
          <div class="st_b4_price">
            <p> 100  <span>тыс. руб.</span></p>
            <a href="/zakazat-naming/" class="sbm">ЗАКАЗАТЬ Нейминг</a>
          </div>
        </div>
        <div class="st_b5_img">
          <div class="st_b5_img_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_3.svg" class="lazy" alt="Нейминг"></div>
          <div class="st_b5_img_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_4.svg" class="lazy" alt="Нейминг"></div>
          <div class="st_b5_img_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_5.svg" class="lazy" alt="Нейминг"></div>
          <div class="st_b5_img_4"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_6.svg" class="lazy" alt="Нейминг"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="st_b5_2">
    <div class="main">
      <div class="st_b4_it s5_b4_it_5">
        <div class="st_b4_it_box">
          <h3 class="st_b4_h2">Дизайн носителей бренда</h3>
          <div class="st_b4_text">
            <p>Разработаем любой макет в вашем фирменном стиле: визитки, бланки, шаблон презентации, буклет, бейдж, коммерческое предложение, фирменная одежда, оклейка автотранспорта и т.д.
              </p>
            <p>Цена указана за дизайн одного элемента.</p>
          </div>
          <div class="st_b4_price">
            <p> 9  <span>тыс. руб.</span></p>
            <a href="#order" data-fancybox="" data-text="Заказать - Дизайн носителей бренда - Фирменный стиль" class="sbm">ЗАКАЗАТЬ</a>
          </div>
        </div>
        <div class="st_b4_it_img">
          <div class="st_b4_it_img_content">
            <div class="st_b5_2_gif">
              <video class="box_video lazy"  video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/st_b5_2_img.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="st_b6">
    <div class="st_b6_bx_1">
      <div class="main">
        <div class="st_b6_bx_1_lf">
          <div class="st_b6_bx_1_lf_bx"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b6_img.png" class="lazy" alt="Фирменный стиль"></div>
        </div>
        <div class="st_b6_bx_1_rg">
          <div class="st_b6_bx_1_rg_bx">
            <h2 class="h2"><span style="font-weight:700;">Что входит</span> <br>
              в разработку <br>
              фирменного стиля</h2>
            <p class="b6_pc"><span>за</span> 150 <span>тыс. руб.</span> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="st_b6_bx_2">
      <div class="main">
        <div class="st_b6_bx_2_box">
          <ul>
            <li>Ключевой образ</li>
            <li>Цветовая палитра</li>
            <li>5 носителей фирменного стиля</li>
             <li>Заголовки</li>
            <li>Паттерны</li>
            <li>Шрифты</li>
            <li>Иконки</li>
            <li>Списки</li>
            <li>Графики</li>
            <li>Диаграммы</li>
            <li>Таблицы</li>
            <li>Оформление фотографий и арт-объектов</li>
            <li>Подзаголовки</li>
            <li>Абзацы</li>
            <li>Инфографика</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="st_b6_bx_3">
      <div class="main">
        <div class="st_b6_bx_3_bx">
          <div class="st_b6_bx_2_tx">
            <p class="st_b4_h2">Вы получаете:</p>
            <div class="st_b6_bx_2_tx_p">
              <p>гайдбук объемом 20 страниц в формате PDF и макеты <br>
                в редактируемом векторном формате Adobe Illustrator. Также мы вам передаем исходники дизайнерских шрифтов и выкупленные с фотобанка фотографии, которые были задействованы в разработке фирменного стиля.</p>
            </div>
          </div>
          <div class="st_b6_bx_2_icon">
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="23" height="30" viewBox="0 0 23 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M22.3169 6.43313L16.0669 0.183105C15.9497 0.065918 15.791 0 15.625 0H2.49996C1.12119 0 0 1.12119 0 2.50002V27.5C0 28.8788 1.12119 30 2.50002 30H20C21.3788 30 22.5 28.8788 22.5 27.5V6.87498C22.5 6.70898 22.4341 6.55031 22.3169 6.43313ZM16.25 2.13381L20.3662 6.25002H17.5C16.8109 6.25002 16.25 5.6891 16.25 5.00004V2.13381ZM21.25 27.5C21.25 28.189 20.6891 28.75 20 28.75H2.50002C1.81096 28.75 1.25004 28.189 1.25004 27.5V2.50002C1.25004 1.81096 1.81096 1.25004 2.50002 1.25004H15V5.00004C15 6.37881 16.1212 7.5 17.5 7.5H21.25V27.5Z" fill="#90A2AB"/> <path d="M14.4366 18.3478C13.858 17.8925 13.3081 17.4244 12.9419 17.0581C12.4658 16.5821 12.0416 16.1206 11.673 15.6812C12.248 13.9045 12.5 12.9883 12.5 12.5C12.5 10.4254 11.7505 10 10.625 10C9.76992 10 8.75004 10.4443 8.75004 12.5598C8.75004 13.4925 9.26092 14.6247 10.2735 15.9406C10.0257 16.6968 9.73453 17.569 9.4074 18.5523C9.2499 19.0241 9.07904 19.4611 8.89834 19.8651C8.75127 19.9305 8.60842 19.997 8.47049 20.0659C7.97367 20.3144 7.50188 20.5377 7.06424 20.7453C5.06836 21.6901 3.75 22.3151 3.75 23.5492C3.75 24.4452 4.72354 25 5.625 25C6.78709 25 8.54186 23.4479 9.82359 20.8331C11.1541 20.3082 12.8082 19.9194 14.1138 19.6759C15.1599 20.4803 16.3153 21.25 16.875 21.25C18.4247 21.25 18.75 20.354 18.75 19.6026C18.75 18.125 17.0617 18.125 16.25 18.125C15.9979 18.125 15.3217 18.1995 14.4366 18.3478ZM5.625 23.75C5.26793 23.75 5.02623 23.5816 4.99998 23.5492C4.99998 23.1061 6.32139 22.4799 7.59949 21.8744C7.68064 21.836 7.76309 21.7975 7.8467 21.7578C6.90797 23.119 5.97961 23.75 5.625 23.75ZM10 12.5598C10 11.25 10.4065 11.25 10.625 11.25C11.067 11.25 11.2501 11.25 11.2501 12.5C11.2501 12.7637 11.0743 13.4229 10.7526 14.452C10.2618 13.6963 10 13.0488 10 12.5598ZM10.4791 19.2774C10.5182 19.1687 10.5561 19.0589 10.5927 18.9478C10.8246 18.252 11.0334 17.627 11.2195 17.0642C11.4789 17.3499 11.7585 17.6423 12.0582 17.9419C12.1754 18.0591 12.4659 18.3228 12.8529 18.6529C12.0825 18.8208 11.2628 19.0289 10.4791 19.2774ZM17.5 19.6027C17.5 19.8835 17.5 20 16.9202 20.0037C16.7499 19.9671 16.3562 19.7352 15.8704 19.4044C16.0467 19.3848 16.1767 19.3751 16.25 19.3751C17.1735 19.3751 17.4353 19.4654 17.5 19.6027Z" fill="#90A2AB"/> </svg>
              </div>
              <p>PDF файл <br>
                20 страниц</p>
            </div>
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M5.82999 22.4966H8.29538C8.36118 22.4966 8.41895 22.4527 8.43659 22.3893L9.15559 19.7973H11.9468L12.7269 22.3923C12.7455 22.4543 12.8025 22.4966 12.8672 22.4966H15.4261C15.4266 22.4966 15.4271 22.4966 15.4273 22.4966C15.5082 22.4966 15.5738 22.4311 15.5738 22.3501C15.5738 22.3285 15.5692 22.308 15.5607 22.2896L12.305 11.7901C12.286 11.7288 12.2292 11.687 12.165 11.687H9.04432C8.97987 11.687 8.92303 11.7291 8.90422 11.7907L5.68995 22.3073C5.67647 22.3517 5.68467 22.3999 5.71227 22.4373C5.73993 22.4746 5.78352 22.4966 5.82999 22.4966ZM11.5168 17.7254H9.58069L10.1528 15.6804C10.2567 15.3119 10.3549 14.8759 10.4499 14.4542C10.4716 14.3573 10.493 14.2623 10.5142 14.1693C10.6399 14.6745 10.7781 15.2203 10.9167 15.6819L11.5168 17.7254Z" fill="#90A2AB"/> <path d="M16.6572 14.5737C16.5763 14.5737 16.5107 14.6393 16.5107 14.7202V22.3502C16.5107 22.4312 16.5763 22.4967 16.6572 22.4967H19.0289C19.1098 22.4967 19.1754 22.4312 19.1754 22.3502V14.7202C19.1754 14.6393 19.1098 14.5737 19.0289 14.5737H16.6572Z" fill="#90A2AB"/> <path d="M17.8278 13.9303C18.6541 13.9303 19.2537 13.37 19.2537 12.5947C19.2357 11.8029 18.6558 11.25 17.8434 11.25C17.4287 11.25 17.0604 11.3931 16.8065 11.653C16.5682 11.8968 16.4412 12.2323 16.4486 12.5979C16.441 12.952 16.5683 13.2815 16.8071 13.5261C17.0616 13.7868 17.4241 13.9303 17.8278 13.9303Z" fill="#90A2AB"/> <path d="M21.875 30H3.125C1.4025 30 0 28.5975 0 26.875V3.125C0 1.4025 1.4025 0 3.125 0H21.875C23.5975 0 25 1.4025 25 3.125V26.875C25 28.5975 23.5975 30 21.875 30ZM3.125 1.25C2.09125 1.25 1.25 2.09125 1.25 3.125V26.875C1.25 27.9088 2.09125 28.75 3.125 28.75H21.875C22.9088 28.75 23.75 27.9088 23.75 26.875V3.125C23.75 2.09125 22.9088 1.25 21.875 1.25H3.125Z" fill="#90A2AB"/> </svg>
              </div>
              <p>Файл-исходник <br>
                Adobe Illustrator</p>
            </div>
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21.875 30H3.125C1.4025 30 0 28.5975 0 26.875V3.125C0 1.4025 1.4025 0 3.125 0H21.875C23.5975 0 25 1.4025 25 3.125V26.875C25 28.5975 23.5975 30 21.875 30ZM3.125 1.25C2.09125 1.25 1.25 2.09125 1.25 3.125V26.875C1.25 27.9088 2.09125 28.75 3.125 28.75H21.875C22.9088 28.75 23.75 27.9088 23.75 26.875V3.125C23.75 2.09125 22.9088 1.25 21.875 1.25H3.125Z" fill="#90A2AB"/> <path d="M11.875 12.5C11.53 12.5 11.25 12.22 11.25 11.875V11.25H5V11.875C5 12.22 4.72 12.5 4.375 12.5C4.03 12.5 3.75 12.22 3.75 11.875V10.625C3.75 10.28 4.03 10 4.375 10H11.875C12.22 10 12.5 10.28 12.5 10.625V11.875C12.5 12.22 12.22 12.5 11.875 12.5Z" fill="#90A2AB"/> <path d="M8.125 18.75C7.78 18.75 7.5 18.47 7.5 18.125V10.625C7.5 10.28 7.78 10 8.125 10C8.47 10 8.75 10.28 8.75 10.625V18.125C8.75 18.47 8.47 18.75 8.125 18.75Z" fill="#90A2AB"/> <path d="M9.375 18.75H6.875C6.53 18.75 6.25 18.47 6.25 18.125C6.25 17.78 6.53 17.5 6.875 17.5H9.375C9.72 17.5 10 17.78 10 18.125C10 18.47 9.72 18.75 9.375 18.75Z" fill="#90A2AB"/> <path d="M20.625 11.25H15.625C15.28 11.25 15 10.97 15 10.625C15 10.28 15.28 10 15.625 10H20.625C20.97 10 21.25 10.28 21.25 10.625C21.25 10.97 20.97 11.25 20.625 11.25Z" fill="#90A2AB"/> <path d="M20.625 15H15.625C15.28 15 15 14.72 15 14.375C15 14.03 15.28 13.75 15.625 13.75H20.625C20.97 13.75 21.25 14.03 21.25 14.375C21.25 14.72 20.97 15 20.625 15Z" fill="#90A2AB"/> <path d="M20.625 18.75H15.625C15.28 18.75 15 18.47 15 18.125C15 17.78 15.28 17.5 15.625 17.5H20.625C20.97 17.5 21.25 17.78 21.25 18.125C21.25 18.47 20.97 18.75 20.625 18.75Z" fill="#90A2AB"/> <path d="M20.625 22.5H4.375C4.03 22.5 3.75 22.22 3.75 21.875C3.75 21.53 4.03 21.25 4.375 21.25H20.625C20.97 21.25 21.25 21.53 21.25 21.875C21.25 22.22 20.97 22.5 20.625 22.5Z" fill="#90A2AB"/> <path d="M20.625 26.25H4.375C4.03 26.25 3.75 25.97 3.75 25.625C3.75 25.28 4.03 25 4.375 25H20.625C20.97 25 21.25 25.28 21.25 25.625C21.25 25.97 20.97 26.25 20.625 26.25Z" fill="#90A2AB"/> </svg>
              </div>
              <p>Гарнитуру <br>
                шрифтов</p>
            </div>
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21.8157 27.5002C21.6057 27.5002 21.3907 27.4739 21.1782 27.4177L1.84941 22.2414C0.524409 21.8764 -0.265591 20.5039 0.0819087 19.1789L2.52066 10.0889C2.61066 9.75518 2.95316 9.56143 3.28566 9.64643C3.61941 9.73518 3.81691 10.0789 3.72816 10.4114L1.29066 19.4989C1.11691 20.1614 1.51441 20.8514 2.17816 21.0352L21.4994 26.2089C22.1632 26.3839 22.8482 25.9889 23.0207 25.3289L23.9969 21.7114C24.0869 21.3777 24.4294 21.1789 24.7632 21.2702C25.0969 21.3602 25.2932 21.7039 25.2044 22.0364L24.2294 25.6489C23.9357 26.7614 22.9232 27.5002 21.8157 27.5002Z" fill="#90A2AB"/> <path d="M27.4995 20H7.49951C6.12076 20 4.99951 18.8787 4.99951 17.5V2.5C4.99951 1.12125 6.12076 0 7.49951 0H27.4995C28.8783 0 29.9995 1.12125 29.9995 2.5V17.5C29.9995 18.8787 28.8783 20 27.4995 20ZM7.49951 1.25C6.81076 1.25 6.24951 1.81125 6.24951 2.5V17.5C6.24951 18.1887 6.81076 18.75 7.49951 18.75H27.4995C28.1883 18.75 28.7495 18.1887 28.7495 17.5V2.5C28.7495 1.81125 28.1883 1.25 27.4995 1.25H7.49951Z" fill="#90A2AB"/> <path d="M11.2495 8.75C9.87076 8.75 8.74951 7.62875 8.74951 6.25C8.74951 4.87125 9.87076 3.75 11.2495 3.75C12.6283 3.75 13.7495 4.87125 13.7495 6.25C13.7495 7.62875 12.6283 8.75 11.2495 8.75ZM11.2495 5C10.5608 5 9.99951 5.56125 9.99951 6.25C9.99951 6.93875 10.5608 7.5 11.2495 7.5C11.9383 7.5 12.4995 6.93875 12.4995 6.25C12.4995 5.56125 11.9383 5 11.2495 5Z" fill="#90A2AB"/> <path d="M5.71174 18.6625C5.55174 18.6625 5.39174 18.6013 5.26924 18.48C5.02549 18.2362 5.02549 17.84 5.26924 17.5962L11.173 11.6925C11.8805 10.985 13.1167 10.985 13.8242 11.6925L15.5817 13.45L20.4467 7.6125C20.8005 7.18875 21.3205 6.9425 21.8742 6.9375H21.888C22.4355 6.9375 22.9542 7.175 23.3117 7.59125L29.8492 15.2188C30.0742 15.48 30.0442 15.875 29.7817 16.1C29.5205 16.325 29.1267 16.2963 28.9005 16.0325L22.363 8.405C22.2417 8.265 22.0742 8.1875 21.888 8.1875C21.758 8.17625 21.5292 8.26625 21.408 8.4125L16.1042 14.7762C15.9917 14.9113 15.828 14.9925 15.6517 15C15.4742 15.0125 15.3055 14.9425 15.1817 14.8175L12.9405 12.5762C12.7042 12.3412 12.293 12.3412 12.0567 12.5762L6.15299 18.48C6.03174 18.6013 5.87174 18.6625 5.71174 18.6625Z" fill="#90A2AB"/> </svg>
              </div>
              <p>Лицензионные <br>
                фотографии</p>
            </div>
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21.875 30H3.125C1.4025 30 0 28.5975 0 26.875V3.125C0 1.4025 1.4025 0 3.125 0H21.875C23.5975 0 25 1.4025 25 3.125V26.875C25 28.5975 23.5975 30 21.875 30ZM3.125 1.25C2.09125 1.25 1.25 2.09125 1.25 3.125V26.875C1.25 27.9088 2.09125 28.75 3.125 28.75H21.875C22.9088 28.75 23.75 27.9088 23.75 26.875V3.125C23.75 2.09125 22.9088 1.25 21.875 1.25H3.125Z" fill="#90A2AB"/> <path d="M20.625 15H18.125C17.78 15 17.5 14.72 17.5 14.375C17.5 14.03 17.78 13.75 18.125 13.75H20.625C20.97 13.75 21.25 14.03 21.25 14.375C21.25 14.72 20.97 15 20.625 15Z" fill="#90A2AB"/> <path d="M20.625 11.25H18.125C17.78 11.25 17.5 10.97 17.5 10.625C17.5 10.28 17.78 10 18.125 10H20.625C20.97 10 21.25 10.28 21.25 10.625C21.25 10.97 20.97 11.25 20.625 11.25Z" fill="#90A2AB"/> <path d="M20.625 18.75H18.125C17.78 18.75 17.5 18.47 17.5 18.125C17.5 17.78 17.78 17.5 18.125 17.5H20.625C20.97 17.5 21.25 17.78 21.25 18.125C21.25 18.47 20.97 18.75 20.625 18.75Z" fill="#90A2AB"/> <path d="M20.625 22.5H18.125C17.78 22.5 17.5 22.22 17.5 21.875C17.5 21.53 17.78 21.25 18.125 21.25H20.625C20.97 21.25 21.25 21.53 21.25 21.875C21.25 22.22 20.97 22.5 20.625 22.5Z" fill="#90A2AB"/> <path d="M20.625 26.25H4.375C4.03 26.25 3.75 25.97 3.75 25.625C3.75 25.28 4.03 25 4.375 25H20.625C20.97 25 21.25 25.28 21.25 25.625C21.25 25.97 20.97 26.25 20.625 26.25Z" fill="#90A2AB"/> <path d="M10 22.5C6.55375 22.5 3.75 19.6962 3.75 16.25C3.75 12.8038 6.55375 10 10 10C13.4462 10 16.25 12.8038 16.25 16.25C16.25 19.6962 13.4462 22.5 10 22.5ZM10 11.25C7.2425 11.25 5 13.4925 5 16.25C5 19.0075 7.2425 21.25 10 21.25C12.7575 21.25 15 19.0075 15 16.25C15 13.4925 12.7575 11.25 10 11.25Z" fill="#90A2AB"/> <path d="M6.02228 20.8525C5.86228 20.8525 5.70229 20.7912 5.57979 20.67C5.33604 20.4262 5.33604 20.03 5.57979 19.7863L9.37479 15.9913V10.625C9.37479 10.28 9.65479 10 9.99979 10C10.3448 10 10.6248 10.28 10.6248 10.625V16.25C10.6248 16.4163 10.5585 16.575 10.4423 16.6925L6.46478 20.67C6.34228 20.7912 6.18228 20.8525 6.02228 20.8525Z" fill="#90A2AB"/> </svg>
              </div>
              <p>15+ визуальных <br>
                элементов</p>
            </div>
            <div class="st_b6_bx_2_tx_icon_item">
              <div class="st_b6_bx_2_tx_icon_item_ic">
                <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M5.82999 22.4966H8.29538C8.36118 22.4966 8.41895 22.4527 8.43659 22.3893L9.15559 19.7973H11.9468L12.7269 22.3923C12.7455 22.4543 12.8025 22.4966 12.8672 22.4966H15.4261C15.4266 22.4966 15.4271 22.4966 15.4273 22.4966C15.5082 22.4966 15.5738 22.4311 15.5738 22.3501C15.5738 22.3285 15.5692 22.308 15.5607 22.2896L12.305 11.7901C12.286 11.7288 12.2292 11.687 12.165 11.687H9.04432C8.97987 11.687 8.92303 11.7291 8.90422 11.7907L5.68995 22.3073C5.67647 22.3517 5.68467 22.3999 5.71227 22.4373C5.73993 22.4746 5.78352 22.4966 5.82999 22.4966ZM11.5168 17.7254H9.58069L10.1528 15.6804C10.2567 15.3119 10.3549 14.8759 10.4499 14.4542C10.4716 14.3573 10.493 14.2623 10.5142 14.1693C10.6399 14.6745 10.7781 15.2203 10.9167 15.6819L11.5168 17.7254Z" fill="#90A2AB"/> <path d="M16.6572 14.5737C16.5763 14.5737 16.5107 14.6393 16.5107 14.7202V22.3502C16.5107 22.4312 16.5763 22.4967 16.6572 22.4967H19.0289C19.1098 22.4967 19.1754 22.4312 19.1754 22.3502V14.7202C19.1754 14.6393 19.1098 14.5737 19.0289 14.5737H16.6572Z" fill="#90A2AB"/> <path d="M17.8278 13.9303C18.6541 13.9303 19.2537 13.37 19.2537 12.5947C19.2357 11.8029 18.6558 11.25 17.8434 11.25C17.4287 11.25 17.0604 11.3931 16.8065 11.653C16.5682 11.8968 16.4412 12.2323 16.4486 12.5979C16.441 12.952 16.5683 13.2815 16.8071 13.5261C17.0616 13.7868 17.4241 13.9303 17.8278 13.9303Z" fill="#90A2AB"/> <path d="M21.875 30H3.125C1.4025 30 0 28.5975 0 26.875V3.125C0 1.4025 1.4025 0 3.125 0H21.875C23.5975 0 25 1.4025 25 3.125V26.875C25 28.5975 23.5975 30 21.875 30ZM3.125 1.25C2.09125 1.25 1.25 2.09125 1.25 3.125V26.875C1.25 27.9088 2.09125 28.75 3.125 28.75H21.875C22.9088 28.75 23.75 27.9088 23.75 26.875V3.125C23.75 2.09125 22.9088 1.25 21.875 1.25H3.125Z" fill="#90A2AB"/> </svg>
              </div>
              <p>5 носителей <br>
                бренда</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="st_b7">
    <div class="main">
      <div class="st_zg">
        <div class="st_zg_bg">
          <div class="st_zg_bg_img">
            <div class="st_zg_bg_gif_grug">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b7_img.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
        </div>
        <h2 class="h2">Какие носители <br>
          фирменного стиля можно <br>
          выбрать для отрисовки</h2>
      </div>
      <div class="st_b7_box">
        <div class="st_b7_box_it"><p>Визитки </p><p>Наклейка </p><p>Брелок </p></div>
        <div class="st_b7_box_it"><p>Фирменный бланк </p><p>Ценник </p><p>Брендирование авто</p></div>
        <div class="st_b7_box_it"><p>Папка для документов </p><p>Стикер </p><p>Значок</p></div>
        <div class="st_b7_box_it"><p>Конверт </p><p>Плакат </p><p>Магнит</p></div>
        <div class="st_b7_box_it"><p>Календарь </p><p>Ручка </p><p>Кружка</p></div>
        <div class="st_b7_box_it"><p>Блокнот </p><p>Карандаш </p><p>Этикетка</p></div>
        <div class="st_b7_box_it"><p>Открытка </p><p>Флеш-накопитель </p><p>Пакет бумажный</p></div>
        <div class="st_b7_box_it"><p>Приглашение </p><p>Баннерная вывеска </p><p>Пакет-майка</p></div>
        <div class="st_b7_box_it"><p>Бейдж </p><p>Rollup</p><p>Шаблон презентации</p></div>
        <div class="st_b7_box_it"><p>Пластиковая карта </p><p>PressWall </p><p>Шаблон брошюры</p></div>
        <div class="st_b7_box_it"><p>Компакт-диск </p><p>Ситиформат </p><p>Лифлет</p></div>
        <div class="st_b7_box_it"><p>Шапка соцсетей </p><p>Листовка </p><p>Буклет</p></div>
        <div class="st_b7_box_it"><p>Аватар соцсетей </p><p>Флаер </p><p>Корпоративная одежда</p></div>
        <div class="st_b7_box_it"><p>Баннер на сайт </p><p>Лайтбокс</p><p>Билборд</p></div>        
      </div>
    </div>
  </section>

  <section class="st_b8">
    <div class="st_b8_bx_1">
      <div class="main">
        <h2 class="h2"><span style="font-weight:700;">Что входит</span> <br>в разработку брендбука</h2>
        <p class="b6_pc"><span>за</span> 199  <span>тыс. руб.</span> </p>
      </div>
    </div>
    <div class="st_b8_bx_2">
      <div class="main">
        <div class="st_b8_bx_2_box st_b8_bg_box">
          <ul>
            <li data-id="1" class="st_b8_active">
              <p>Нейминг</p>
              <div class="st_b8_image_1" >
                <div class="st_b8_image_1_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_4.svg" width="186" height="54" class="lazy" alt="Фирменный стиль"></div>
                <div class="st_b8_image_1_2"><p class="mini_text">Название</p><div><img class="lazy" width="230" height="54" data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_img_1.svg" alt="Фирменный стиль"></div></div>
                <div class="st_b8_image_1_3"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_3.svg" width="240" height="143" class="lazy" alt="Фирменный стиль"></div><p class="mini_text">Слоган</p></div>
             </div>
            </li>
            <li data-id="2">
              <p>Логотип</p>
              <div class="st_b8_image_2" style="display: none;">
                <div class="st_b8_image_2_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_2_1.jpg" width="171" height="238" class="lazy" alt="логотип"></div>
                <div class="st_b8_image_2_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_2_2.jpg" width="270" height="326" class="lazy" alt="логотип"></div>
                <div class="st_b8_image_2_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_2_3.jpg" width="323" height="394" class="lazy" alt="логотип"></div>
              </div>
            </li>
            <li data-id="3">
              <p>Позиционирование</p>
              <div class="st_b8_image_3" style="display: none;">
                <div class="st_b8_image_3_1"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_3_1.jpg" width="323" height="394" class="lazy" alt="Позиционирование"></div><p class="mini_text">Ценности</p></div>
                <div class="st_b8_image_3_2"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_3_2.jpg" width="171" height="238" class="lazy" alt="Позиционирование"></div><p class="mini_text">Миссия</p></div>
                <div class="st_b8_image_3_3"><p class="mini_text">Видение</p><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_3_3.jpg" width="270" height="326" class="lazy" alt="Позиционирование"></div></div>
              </div>
            </li>
            <li data-id="4">
              <p>Визуал</p>
              <div class="st_b8_image_4" style="display: none;">
                <div class="st_b8_image_4_1"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_4_1.jpg" width="171" height="238" class="lazy" alt="Визуал"></div><p class="mini_text">Цветовая гамма</p></div>
                <div class="st_b8_image_4_2"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_4_2.jpg" width="323" height="394" class="lazy" alt="Визуал"></div><p class="mini_text">Паттерны</p></div>
                <div class="st_b8_image_4_3"><div><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_4_3.jpg" width="244" height="331" class="lazy" alt="Визуал"></div><p class="mini_text">Щрифты</p></div>
                <div class="st_b8_image_4_4"><p class="mini_text">Ключевой образ</p><div><img width="270" height="326" data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_4_4.jpg" class="lazy" alt="Визуал"></div></div>
              </div>
            </li>
            <li data-id="5">
              <p>Носители</p>
              <div class="st_b8_image_5" style="display: none;">
                <div class="st_b8_image_5_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_5_1.jpg" width="166" height="238" class="lazy" alt="Носители"></div>
                <div class="st_b8_image_5_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_5_2.jpg" width="323" height="394" class="lazy" alt="Носители"></div>
                <div class="st_b8_image_5_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_5_3.jpg" width="270" height="326" class="lazy" alt="Носители"></div>
              </div>
            </li>
            <li data-id="6">
              <p>Руководство</p>
              <div class="st_b8_image_6" style="display: none;">
                <div class="st_b8_image_6_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_6_1.jpg" width="171" height="238" class="lazy" alt="Руководство"></div>
                <div class="st_b8_image_6_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_6_2.jpg" width="273" height="393" class="lazy" alt="Руководство"></div>
                <div class="st_b8_image_6_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b8_6_3.jpg" width="270" height="326" class="lazy" alt="Руководство"></div>
              </div>
            </li>
          </ul>
         
        </div>
      </div>
    </div>

  </section>


  <section class="st_b9">
    <div class="main">
      <div class="st_b9_bx_1">
        <div class="st_b9_bx_1_left">
          <p>Для чего</p>
          <p>нужен фирменный стиль</p>
          <p>компании?</p> 
        </div>
        <div class="st_b9_bx_1_right">
          <p>Человека запоминают по лицу и одежде, а бренд – по визуальному образу, который создали дизайнеры. Если <br>
            вы хотите, чтобы компания выделялась среди конкурентов <br>
            и вызывала авторитет, бизнесу нужна уникальная упаковка. Разработанный со вкусом слоган, запоминающийся логотип, грамотно подобранная цветовая гамма, подходящие шрифты — основные элементы фирменного стиля.</p>
          <p>Визуальный образ компании, который создали профессионалы, стоит затраченных денег. Много лет 
           <br>  он будет работать на имидж, а значит, повышать эффективность вашего бизнеса.</p>
        </div>
      </div>
      <div class="st_b9_bx_2">
        <div class="st_b9_bx_2_column"> 
          <div class="st_b9_bx_2_item">
            <p>Узнаваемость бренда</p>
            <p>С каждой рекламной кампанией ваш логотип и корпоративные цвета будут прочно откладываться в памяти покупателей.</p>
          </div>
          <div class="st_b9_bx_2_item">
            <p>Доверие клиентов </p>
            <p>Из множества предложений покупатель выбирает то, которое сделано уже известным ему брендом.</p>
          </div>
        </div>
        <div class="st_b9_bx_2_column">
          <div class="st_b9_bx_2_item">
            <p>Отстройка от конкурентов</p>
            <p>Фирменный стиль работает на авторитет и позволяет вам заявить <br> о себе уверенней и громче <br>остальных.</p>
          </div>
          <div class="st_b9_bx_2_item">
            <p>Увеличение продаж </p>
            <p>Лояльность потребителей ускоряет появление новых заказчиков и рост повторных продаж.</p>
          </div>
        </div>
        <div class="img_fix">
          <img class="st_b9_bx_2_img-fix_1 lazy" src="/bitrix/templates/veonix/assets/img/old/firm_style/b9_1.svg"  alt="">
          <img class="st_b9_bx_2_img-fix_2 lazy" src="/bitrix/templates/veonix/assets/img/old/firm_style/b9_2.svg" alt="">
        </div>
      </div>
    </div>
  </section>


  <section class="st_b11">
    <div class="main">
      <div class="st_b11_left">
        <p>Как происходит <br><span>разработка <br>фирменного <br>стиля?</span></p>
      </div>
      <div class="st_b11_right">
        <div class="st_b11_right_tx">
          <p>Над созданием визуального образа компании в нашей студии работает целая команда - маркетолог, стратег, иллюстратор, дизайнер, арт-директор и проджект-менеджер. Чтобы представить клиенту по-настоящему эффективный продукт, мы определяем целевую аудиторию и делаем глубокое погружение <br>
            в вашу бизнес-нишу. В результате рождается концепция фирменного стиля, которую затем наши дизайнеры <br> воплощают в графике.</p>
        </div>
        <div class="img_fix">
          <img class="st_b11_img-fix_1 lazy" data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b11_1.svg" alt="">
          <img class="st_b11_img-fix_2 lazy" data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b11_2.svg" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="st_b12">
    <div class="main">
      <div class="st_b12_01">
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b12_1.jpg" class="lazy" alt="Разработка логотипа">
      </div>
      <div class="st_b12_02">
        <div class="st_b12_02_bx">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b12_2-1.jpg" class="lazy" alt="Создание фирменного стиля">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b12_2-2.png" class="lazy" alt="Создание фирменного стиля">
          <div class="st_b12_02_bx_gif">
            <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
              <source data-src="/bitrix/templates/veonix/assets/img/old/video/b4_it1_3.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
      <div class="st_b12_03">
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b12_3.jpg" class="lazy" alt="Дизайн носителей бренда">
      </div>
      <div class="st_b12_04">
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b12_4.jpg" class="lazy" alt="Создание брендбука">
      </div>
      <div class="st_b12_content">
        <div class="st_b12_content_item">
          <div class="st_b12_content_item_numder">
            <p>01</p>
          </div>
          <div class="st_b12_content_item_opis">
            <p>Разработка логотипа</p>
            <p>Создание визуального образа компании начинается  <br>
              с логотипа, который отражает главную миссию бренда, помогает заинтересовать клиентов, задает стилистику. Ознакомиться с деталями разработки логотипа в студии Veonix и посмотреть наши работы вы можете <a href="https://veonix.ru/logos/">здесь</a>. Также мы можем выполнить редизайн вашего старого логотипа <br>
              и он, поверьте, будет работать намного эффективнее. </p>
          </div>
        </div>
        <div class="st_b12_content_item">
          <div class="st_b12_content_item_numder">
            <p>02</p>
          </div>
          <div class="st_b12_content_item_opis">
            <p>Создание фирменного стиля</p>
            <p>Затем дизайнеры берутся за фирменный корпоративный стиль – разработку цветовой палитры, шрифтов, уникальных паттернов, иконок, и других деталей, помогающих отразить суть деятельности бренда, делают его запоминающимся. <br>
              В итоге создается гайдбук объемом в 5–7 страниц, который содержит все элементы фирменного стиля вашей компании. </p>
          </div>
        </div>
        <div class="st_b12_content_item">
          <div class="st_b12_content_item_numder">
            <p>03</p>
          </div>
          <div class="st_b12_content_item_opis">
            <p>Дизайн носителей бренда</p>
            <p>Выполняем дизайн-макеты для брендирования предметов, которые используются в повседневной работе компании <br>
              и для подарков партнерам и клиентам. Это визитки, фирменные бланки писем, конверты, календари, ручки, блокноты и сувенирная продукция.</p>
          </div>
        </div>
        <div class="st_b12_content_item">
          <div class="st_b12_content_item_numder">
            <p>04</p>
          </div>
          <div class="st_b12_content_item_opis">
            <p>Создание брендбука</p>
            <p>Объединяем все результаты работы в полноценный брендбук, который также содержит стандарты <br>
              и рекомендации для маркетологов о том, как использовать фирменный стиль организации – от наружной рекламы  <br>
              до брендирования одежды. Подробнее о том, как мы делаем разработку брендбука, смотрите <a href="https://veonix.ru/brand-book/">здесь.</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="st_b13">
    <div class="main">
      <div class="st_b13_tx">
        <h2>Как мы делаем уникальный <br> фирменный стиль предприятия?</h2>
        <p>Знаете, почему многие крупные компании и концерны России - постоянные заказчики студии Veonix? <br>
          Мы просто любим создавать классный дизайн и стремимся к тому, чтобы каждый из наших клиентов получил именно тот результат, на который он рассчитывал. И даже немного лучше. </p>
      </div>
      <div class="img_fix">
        <img class="st_b13_img-fix_1 lazy" src="/bitrix/templates/veonix/assets/img/old/firm_style/b13_1.svg" alt="">
        <img class="st_b13_img-fix_2 lazy" src="/bitrix/templates/veonix/assets/img/old/firm_style/b13_2.svg" alt="">
      </div>
    </div>
  </section>

  <section class="st_b14">
    <div class="main">
      <div class="st_b14_colum">
        <div class="st_b14_colum_item">
          <p>Эксклюзивный дизайн</p>
          <p>который вызывает зависть <br>
          у конкурентов. Работаем<br>
          без шаблонов и не допускаем повторений. </p>
        </div>
        <div class="st_b14_colum_item">
          <p>Маркетинговая проработка</p>
          <p>Проводим глубокий анализ специфики бизнеса и делаем отстройку от конкурентов. Использование фирменного стиля станет новым драйвером роста для компании. </p>
        </div>
      </div>
      <div class="st_b14_colum">
        <div class="st_b14_colum_item">
          <p>Антиплагиат</p>
          <p>Вы не найдете заимствований в наших работах.  Мы проверяем всю графику, логотипы и тексты на плагиат.</p>
        </div>
        <div class="st_b14_colum_item">
          <p>Бесплатные правки</p>
          <p>Вносим неограниченное количество изменений в макеты до финального утверждения заказчиком.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="st_b15">
    <div class="main">
      
      <div class="h2" style="text-align: center;">Постоянные клиенты</div>
      <div class="st_b15_kl">
        <div class="st_b15_kl_bx">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/g-duma.svg" class="lazy" alt="Государственная дума">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/bl.svg" class="lazy" alt="Билайн">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/sit.svg" class="lazy" alt="Ситилинк">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/let.svg" class="lazy" alt="Летуаль">
          <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/gz.svg" class="lazy" alt="Газпром">
        </div>
        <div class="st_b15_kl_btn">
          <p>Посмотреть всех клиентов</p>
          <a href="/customers/" class="sbm sbm-2">Посмотреть</a>
        </div>
      </div>
      </div>
    </div>
  </section>

  <section class="st_b16">
    <div class="main">
      <div class="st_b16_img-1">
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b16_1.jpg" class="lazy" alt="">
      </div>
      <div class="st_b16_img-2">
        <div class="st_b16_img-2_gif"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b15_svg.svg" style=" width: 131px; height: 131px; "class="lazy" alt=""></div>
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b16_2.jpg" class="lazy" alt="">
      </div>
      <div class="st_b16_img-3">
        <div class="st_b16_img-3_gif">
          <video class="box_video lazy" video="" autoplay="" loop="" muted="" width="304px" playsinline="" webkit-playinginline="">
            <source data-src="/bitrix/templates/veonix/assets/img/old/video/b16_3.mp4" type="video/mp4">
          </video>
        </div>
        <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b16_3.jpg" class="lazy" alt="">
      </div>
      <div class="st_b16_content">
        <div class="h2"><span style="font-weight:700;">Какие гарантии</span><br> мы предоставляем?</div>
        <div class="st_b16_content_bx">
          <ul>
            <li>
              <p>Официальный договор.</p>
              <p>Закрепляем  все финансовые гарантии для заказчика.</p>
            </li>
            <li>
              <p>Компенсации за просрочку.</p>
              <p>Утверждаем дату сдачи проекта и платим неустойку за каждый день просрочки. </p>
            </li>
            <li>
              <p>Защита вашей информации.</p>
              <p>Заключаем договор о неразглашении конфиденциальных данных заказчика.</p>
            </li>
            <li>
              <p>Работа без предоплаты.</p>
              <p>Доверяем постоянным клиентам и начинаем работать над проектом без аванса.</p>
            </li>
            <li>
              <p>Правки в течение 3-х лет.</p>
              <p>Вносим любые исправления в проект, если ошибки были допущен по нашей вине.</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section> 

  <section class="st_b17">
    <div class="main">
      <div class="st_b17_left">
        <img src="/bitrix/templates/veonix/assets/img/old/firm_style/b17_1.jpg" class="lazy" alt="">
      </div>
      <div class="st_b17_right">
        <div class="st_b17_right_tx st_b13_tx">
          <div class="h2">Авторитет дороже денег</div>
          <p><span style="font-weight: 700;">В мире с высокой конкуренцией авторитет компании - дороже денег.</span> Сегодня никто <br>
            не подвергает сомнению значение и функции фирменного стиля для продвижения на рынке. <br>
            Главное – правильно выбрать исполнителя, чтобы не пустить рекламный бюджет на ветер.</p>
          <p><span style="font-weight: 700;">70% заказчиков студии Veonix обращаются повторно</span> и советуют нас партнерам. А значит, <br>
            вы можете быть уверены: мы отнесемся к вашему проекту максимально ответственно <br>
            и сделаем по-настоящему классный дизайн.</p>
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
  <section class="st_b18">
    <div class="main">
      <div class="st_zg">
        <div class="st_zg_bg">
          <div class="st_zg_bg_img b18_gif">
            <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
              <source data-src="/bitrix/templates/veonix/assets/img/old/video/b18_gif.mp4?1" type="video/mp4">
            </video>
          </div>
        </div>
        <p class="st_tx">Обратная связь</p>
        <div class="h2" style="text-align: center;">Вам нужна разработка<br> фирменного стиля?</div>
        <p class="st_opis">Позвоните по телефону <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a><br> 
          или оставьте свой номер, и мы свяжемся с вами в течение 10 минут.</p>
      </div>
      <div class="st_form_bx">
        <div class="st_form">
         <a class="sbm sbm-2 " href="#order" data-fancybox data-text = "Заявку на расчет стоимости - Фирменный стиль" >ЗАКАЗАТЬ ЗВОНОК</a>
        </div>

      </div>
    </div>
  </section>
 <section class="poleznaya  white" style="background: #fff;">
        <div class="main">
             <h2 class="home_h2">Полезная информация по теме</h2>
             <p><a href="/blog/firmennyj-stil-v-voprosah-i-otvetah/">Фирменный стиль в вопросах и ответах</a></p>
              <p><a href="/blog/razrabotka-firmennogo-stilya/">Разработка фирменного стиля</a></p>
              <p><a href="/blog/pochemu-popytka-samostoyatelno-razrabotat-firmennyj-stil-mozhet-navredit-kompanii/">Почему попытка самостоятельно разработать фирменный стиль может навредить компании?</a></p>
              <p><a href="/blog/kakie-nositeli-brenda-sozdajut-firmennyj-stil/">Какие носители бренда создают фирменный стиль?</a></p>
              <p><a href="/blog/5-mifov-o-firmennom-stile/">5 мифов о фирменном стиле</a></p>
      </div>
    </section>
  

    </div>


<script type="application/ld+json">






{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Фирменный стиль",
  "image": "https://veonix.ru/bitrix/templates/veonix/assets/img/old/firm_style/b6_img.png",
 "description": "Создадим фирменный стиль, который сделает вашу компанию знаваемой и поставит на голову выше конкурентов",
 "offers": {
 "@type": "Offer",
 "url": "https://veonix.ru/form-style/",
 "priceCurrency": "RUB",
 "price": "10000",
 "priceValidUntil": "2049-06-24",
 "availability": "https://schema.org/InStock",
 "itemCondition": "https://schema.org/NewCondition"
 },
 "aggregateRating": {
 "@type": "AggregateRating",
 "ratingValue": "100",
 "bestRating": "100",
 "worstRating": "0",
 "ratingCount": "1245"
  }
}
</script>
<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_1" => "",
		"TITLE_2" => "",
		"TITLE_3" => "",
		"TYPE" => "text",
		"TYPE_TEXT" => " Фирменный стиль,  Айдентика, Логотип, Брендбук, Дизайн упаковки, Нейминг, Гайдбук, Разработка слогана, Другое"
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
         
                        "PARENT_SECTION" => "13",
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




<script>
  $(document).ready(function() {
    let listBox = $(".st_b8_bx_2_box ul li")
    listBox.mouseenter(function() {
          if (!$(this).hasClass("st_b8_active")) {
            listBox.removeClass("st_b8_active");
            $(this).addClass("st_b8_active");
          }
    });
    $(window).on("scroll", function() {
      let scrollhow = $(window).scrollTop();
      if (scrollhow < 1550) {
        $(".b1_min_img_2").attr("style", "transform: translate(0, "+(scrollhow/10)+"px);")
      }
    });
  });
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>