<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Заказать брендбук в Москве можно в студии дизайна Veonix. Создание и разработка брендбука на заказ по цене 300 тыс. рублей. Фирменный стиль и логотип в подарок!");
$APPLICATION->SetPageProperty("title", "Разработка брендбука в Москве — студия дизайна Veonix. Заказать брендбук компании");
$APPLICATION->SetTitle(" Заказать брендбук");


$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Брендинг","/branding/").
$APPLICATION->AddChainItem("Заказать брендбук").



$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/prezent.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/brendbookPage.css");   
?>
 

<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Разработка ",
		"TEMPLATE_FOR_TITLE2" => "брендбука",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создание брендбука, который сохраняет целостность корпоративного стиля и повышает узнаваемость вашей торговой марки",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 
 
 
 
<div class="old_page">
<main class="brendbook_page">
    <section class="brb_b1">
      <div class="main">
          <div class="brb_b1_box">
            <div class="brb_b1_lf">
              <h2 class="brb_zg font_pd"><span>Профессиональный <br>брендбук</span> - фундамент <br> успешного развития</h2>
              <div class="brb_b1__item">
                <p class="brb_b1_zg font_pd">Единство корпоративной культуры бизнеса</p>
                <p class="brb_b1_text">Использование сотрудниками единых элементов стиля в маркетинговых материалах повышает лояльность и доверие клиентов <br>и партнёров</p>
              </div>
              <div class="brb_b1__item">
                <p class="brb_b1_zg font_pd">Независимость от уровня вашего дизайнера</p>
                <p class="brb_b1_text">Подробное руководство и детализированные макеты, содержащиеся в брендбуке, позволяют создавать качественные маркетинговые материалы даже специалисту с небольшим опытом в дизайне </p>
              </div>
              <div class="brb_b1__item">
                <p class="brb_b1_zg font_pd">Формирование <br>имиджа компании</p>
                <p class="brb_b1_text">Брендбук содержит чёткое позиционирование фирмы на рынке <br>
                  и руководство по выстраиванию коммуникаций с клиентами </p>
              </div>
            </div>
            <div class="brb_b1_rg">
              <div class="brb_b1_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b1_img.png" width="1202" height="757" alt="Заказать брендбук"></div>
            </div>
          </div>
      </div>
    </section>
    <section class="brb_b2">
      <div class="main">
        <div class="brb_b2_box">
          <div class="brb_b2__left">
            <div class="brb_b2_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b2_img.png" width="895" height="698" alt="Заказать брендбук"></div>
          </div>
          <div class="brb_b2__right">
            <div class="brb_b1__item">
              <p class="brb_b1_zg font_pd">Экономия времени <br>и средств на рекламу</p>
              <p class="brb_b1_text">Наличие брендбука существенно сокращает материальные и временные затраты на подготовку любых рекламных макетов</p>
            </div>
            <div class="brb_b1__item">
              <p class="brb_b1_zg font_pd">Повышение <br>узнаваемости бренда</p>
              <p class="brb_b1_text">Правильное использование в рекламе ключевых визуальных образов бренда поможет повысить узнаваемость компании</p>
            </div>
            <div class="brb_b1__item">
              <p class="brb_b1_zg font_pd">Увеличение стоимости бизнеса</p>
              <p class="brb_b1_text">Бизнесы с качественным брендбуком быстрее и легче продаются, лучше привлекают инвестиции и реализовывают франшизы, чем другие</p>
            </div>
            <div class="brb_b1__item">
              <p class="brb_b1_zg font_pd"> Исключение ошибок <br>в работе подрядчиков</p>
              <p class="brb_b1_text">Подробное руководство по использованию фирменного стиля  гарантирует отсутствие неточностей
                в случае, когда над разработкой <br>рекламных проектов работают специалисты на аутсорсинге (типографии, рекламные агентства, застройщики стендов и т. д.)</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b3">
      <div class="main">
        <div class="brb_b3_box_1">
          <div class="brb_b3_1_lf">
            <h2 class="brb_zg font_pd">
              <span>Брендбуки,</span>
              разработанные  <br>в нашей компании
            </h2>
            <div class="brb_b3_text">
              <p>У нас есть опыт создания брендбука для самых разных ниш, включая крупные межконтинентальные корпорации <br>
                и государственный сектор. </p>
              <p>Посмотрите, как мы это делаем.</p>
            </div>
          </div>
          <div class="brb_b3_1_rg">
            <div class="brb_b3_1_rg_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_img_1.png" width="1077" height="626" alt="Заказать брендбук"></div>
          </div>
        </div>
        <div class="brb_b3_box_2">
          <div class="brb_b3_box_2_lf">
            <div class="brb_b3_box_2_lf_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_img_2.png" width="1105" height="880" alt="закать брендбук"></div>
          </div>
          <div class="brb_b3_box_2_rg">
            <div class="brb_b3_box_video">
              <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/brb_b3_video.mp4" type="video/mp4" >
              </video>
            </div>
            <div class="brb_b3_box_2_lg">
              <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b4_logo.svg" width="273" height="33" alt="заказать брендбук">
              <a href="#form" data-fancybox="" data-text="Заказать - Брендбуки разработанные в нашей компании - Брендбук" class="sbm">Заказать</a>
            </div>
          </div>
        </div>
        <div class="brb_b3_box_3">
          <div class="brb_b3_box_3_bg"><div class="brb_b3_box_3_bg_after"></div></div>
          <div class="brb_b3_box_3_img"><div class="brb_b3_box_3_image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_img_3.png" width="1469" height="720" alt="заказать брендбук"></div></div>
          <div class="brb_b3_box_3_logo"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_logo.svg" width="224" height="52" alt="veonix"></div>
          <a href="#form" data-fancybox="" data-text="Заказать - Брендбуки разработанные в нашей компании - Брендбук" class="sbm">Заказать</a>
        </div>
      </div>
    </section>
    <section class="brb_b4">
      <div class="main">
        <div class="brb_b4_box">
          <div class="brb_b4__lf">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_5.svg" alt="veonix" width="195" height="70">
            <a href="#form" data-fancybox="" data-text="Заказать - Брендбуки разработанные в нашей компании - Брендбук" class="sbm">Заказать</a>
          </div>
          <div class="brb_b4__rg">
            <div class="brb_b4_img">
              <div class="brb_b4_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b4_img_1.png" width="682" height="488" alt="Заказать брендбук"></div>
              <div class="brb_b4_img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b4_img_2.png" width="617" height="549" alt="Заказать брендбук"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b5">
      <div class="main">
        <div class="brb_b5_box">
          <div class="brb_b5__lf">
            <div class="brb_b5__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b5_img.png" width="765" height="550" alt="Заказать брендбук"></div>
          </div>
          <div class="brb_b5__rg">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b5_logo_14.svg" width="174" height="89" alt="veonix">
            <a href="#form" data-fancybox="" data-text="Заказать - Брендбуки разработанные в нашей компании - Брендбук" class="sbm">Заказать</a>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b6">
      <div class="main">
        <div class="st_zg">
          
          <div class="st_zg_bg">
            <div class="brb_b6_bg">
              <img class="lazy brb_b6_bg_svg svg_anim" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b6_bg.svg"  width="310" height="656" alt="bg">
            </div>
            <div class="st_zg_bg_img">
              <div class="st_zg_bg_gif_grug">
                <video class="box_video lazy entered loaded" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" data-ll-status="loaded">
                  <source src="/bitrix/templates/veonix/assets/img/old/video/b7_img.mp4" type="video/mp4" >
                </video>
              </div>
            </div>
          </div>
          <div class="h2">Не нашли пример<br> из своей сферы <br> бизнеса?</div>
          
        </div>
        <p class="st_opis">Запросите закрытое портфолио, мы обязательно <br> подберём интересующие вас кейсы и вышлем на e-mail</p>
        <div class="st_form_bx">
        <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "Получить портфолио - Брендбук" type="submit">Получить портфолио</a>

      </div>
    </section>
    <section class="brb_b7">
      <div class="main">
        <div class="brb_b7_bg">
          <div class="brb_b7_bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_1.svg" width="323" height="303" alt="bg"></div>
          <div class="brb_b7_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="203" height="375" alt="bg"></div>
          <div class="brb_b7_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="194" height="279" alt="bg"></div>
        </div>
        <div class="brb_b7_top">
          <h2 class="brb_zg font_pd">
            <span>Стоимость</span> <span>разработки</span> <span>брендбука?</span>
          </h2>
          <div class="brb_b7_top_text">
            <p>Профессионально разработанный брендбук - это <br>
              не просто набор элементов корпоративного стиля, собранный в красочной книге. Это грамотное графическое руководство, свод правил по внедрению и использованию фирменной айдентики компании <br>
              в маркетинговых целях. </p>
            <p class="brb_pc font_pd">Цена: <span> 300</span> тыс. руб.</p>
            <a  href="#form" data-fancybox="" data-text="Заказать - Стоимость разработки брендбука? - Брендбук" class="sbm">Заказать</a>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b8">
      <div class="main">
        <div class="brb_b8_box">
          <div class="brb_b8__lf">
            <div class="st_b5_img">
              <div class="st_b5_img_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_3.svg" width="302" height="180" class="lazy" alt="Нейминг"></div>
              <div class="st_b5_img_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_4.svg" width="186" height="53" class="lazy" alt="Нейминг"></div>
              <div class="st_b5_img_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_5.svg" width="277" height="55" class="lazy" alt="Нейминг"></div>
              <div class="st_b5_img_4"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_6.svg" width="230" height="60" class="lazy" alt="Нейминг"></div>
            </div>
            
          </div>
          <div class="brb_b8__rg">
            <div class="brb_b8_tx font_pd"><p>Также вы можете заказать отдельные позиции <br>
              из брендбука, а именно:.</p></div>
            <div class="st_b4_it_box">
              <h3 class="st_b4_h2">Нейминг</h3>
              <div class="st_b4_text">
                <p>Разработаем несколько вариантов звучного и запоминающегося названия, которое отражает суть вашего бренда, проекта, товара или услуги. Дополним название мощным слоганом.</p>
              </div>
              <div class="st_b4_price">
                <p><span>Цена: </span> 100 <span>тыс. руб.</span></p>
                <a href="/zakazat-naming/" class="sbm">ЗАКАЗАТЬ Нейминг</a>
              </div>
            </div>
          </div>
      </div>
      <div class="st_b5_top">
        <div class="st_b5_top_lf">
          <div class="st_b5_top_lf_box">
            <video class="box_video lazy" width="175" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
              <source data-src="/bitrix/templates/veonix/assets/img/old/video/b5_img_1.mp4" type="video/mp4">
            </video>
           
          </div>
        </div>
        <div class="st_b5_top_lf_rg">
          <div class="st_b5_top_rg_box">
            <img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_2.svg" width="325" height="107" class="lazy b5_img_2" alt="Нейминг">
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b9">
      <div class="main">
        <div class="brb_b9__lf">
          <div class="st_b4_it_box">
            <h3 class="st_b4_h2">Логотип</h3>
            <div class="st_b4_text">
              <p>Сделаем нетипичный логотип, нарисованный от руки. Logo будет сразу ассоциироваться с деятельностью вашей фирмы.</p>
            </div>
            <div class="st_b4_price">
              <p><span>Цена: </span> 100 <span>тыс. руб.</span></p>
              <a href="/logos/" class="sbm">ЗАКАЗАТЬ Логотип</a>
            </div>
          </div>
        </div>
        <div class="brb_b9__rg">
          <div class="brb_b9__rg_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b9_img.jpg" width="365" height="376" alt="заказать брендбук"></div>
          <div class="st_b4_it_women">
            <div class="st_b4_it_women_it">
              <p>Скетч</p>
              <div class="st_b4_it_women_img"><img data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b4_it3_3.png" width="118" height="117" class="lazy b4_it3_3" alt="Логотип"  ></div>
            </div>
            <div class="st_b4_it_women_it">
              <p>ЛОГОТИП</p>
              <div class="st_b4_it_women_img"><img data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b4_it3_4.svg" width="115" height="115" class="lazy b4_it3_4 " alt="Логотип" ></div>
            </div>
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
    </section>
    <section class="brb_b10">
      <div class="main">
        <div class="brb_b10_box">
          <div class="brb_b10_lf">
            <h3 class="st_b4_h2">Айдентика</h3>
            <p class="brb_b10_t1 font_pd">дизайн визуальных элементов бренда</p>
            <div class="brb_b10_lf_box">
              <p>Guidebook объёмом от 8-10 страниц  <br>и макеты, разработанные в Adobe illustrator с возможностью самостоятельного редактирования:</p>
              <ul>
                <li>цветовая палитра</li>
                <li>фирменные шрифты</li>
                <li>образ компании</li>
                <li>паттерны</li>
                <li>иконки, пиктограммы</li>
                <li>таблицы, графики, диаграммы</li>
                <li>заголовки разных уровней</li>
              </ul>
            </div>
            <div class="st_b4_price">
              <p><span>Цена: </span> 150 <span>тыс. руб.</span></p>
              <a href="/brand-identity/" class="sbm">ЗАКАЗАТЬ Айдентику</a>
            </div>
          </div>
          <div class="brb_b10_rg">
            <div class="brb_b10_rg_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b10_img.jpg" width="884" height="880" alt="заказать брендбук"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b11">
      <div class="main">
        <div class="brb_b11_top">
          <h3 class="brb_b11_t1 font_pd">Разработка дизайна <br>носителей бренда</h3>
          <p>Полностью готовые к печати дизайн-макеты. Вы можете выбрать изготовление 7 любых бренд-носителей на выбор:</p>
        </div>
        <div class="brb_b11_center">
          <div class="brb_b11__lf">
            <div class="brb_b11_video_main">
              <div class="brb_b11_video">
                <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_video.gif" width="409" height="409" alt="video">
                <!-- <video class="box_video lazy" width="409" height="409" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                  <source data-src="/bitrix/templates/veonix/assets/video/brb_video.mp4" type="video/mp4">
                </video> -->
              </div>
            </div>   
          </div>
          <div class="brb_b11__ct">
            <div class="brb_b11__ct_box">
              <ul>
                <li>визитка</li>
                <li>фирменный бланк</li>
                <li>конверт</li>
                <li>открытка</li>
                <li>коммерческое предложение</li>
                <li>папка для документов</li>
                <li>блокнот</li>
                <li>деловой ежедневник</li>
                <li>календарь</li>
                <li>пластиковая карта</li>
                <li>бейдж</li>
                <li>пропуск</li>
                <li>вывеска</li>
                <li>баннер</li>
                <li>плакат</li>
              </ul>
              <ul>
                <li>Roll-Up</li>
                <li>PressWall</li>
                <li>униформа для персонала</li>
                <li>реклама на транспорте</li>
                <li>этикетки</li>
                <li>упаковка</li>
                <li>наклейки</li>
                <li>брошюра</li>
                <li>лифлет</li>
                <li>листовка</li>
                <li>флаер</li>
                <li>буклет</li>
                <li>каталог</li>
                <li>сувенирная продукция</li>
              </ul>
            </div>
            <a href="/branding/" class="sbm">ЗАКАЗАТЬ брендинг</a>
          </div>
          <div class="brb_b11__rg"></div>
        </div>
      </div>
    </section>
    <section class="brb_b12">
      <div class="main">
        <div class="brb_b12_zg">
          <h2 class="brb_zg font_pd">
            <span>Почему брендбук</span>
            <span>выгодно заказать</span>
            <span>именно у Veonix</span>
          </h2>
        </div>
        <div class="brb_b12_box">
          <div class="brb_b12_line">
            <div class="brb_b12__item">
              <div class="brb_b12__item_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b12_i1.svg" width="33" height="35" alt="icon"></div>
              <p class="brb_b12_t1 font_pd">Авторский дизайн</p>
              <p class="brb_b12_t2">Без шаблонов и воровства чужих смыслов и образов. Полностью оригинальная концепция брендинга не пересекается с вашими конкурентами, а потому мгновенно притягивает внимание</p>
            </div>
            <div class="brb_b12__item">
              <div class="brb_b12__item_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b12_i2.svg" width="36" height="30" alt="icon"></div>
              <p class="brb_b12_t1 font_pd">Премиум услуга</p>
              <p class="brb_b12_t2">Предлагаем только высокопрофессиональный продукт, созданный на основе стратегического, креативного маркетинга и богатого опыта наших сотрудников</p>
            </div>
          </div>
          <div class="brb_b12_line brb_b12_line_2">
            <div class="brb_b12__item">
              <div class="brb_b12__item_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b12_i3.svg" width="30" height="32" alt="icon"></div>
              <p class="brb_b12_t1 font_pd">Маркетинг</p>
              <p class="brb_b12_t2">Начинаем работу только после глубокой проработки вашего бизнеса. Проводим анализ конкурентов, общего состояния рынка, тестируем аудиторию, готовим мощную базу для отстройки</p>
            </div>
            <div class="brb_b12__item">
              <div class="brb_b12__item_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b12_i4.svg" width="40" height="27" alt="icon"></div>
              <p class="brb_b12_t1 font_pd">Бесплатные правки</p>
              <p class="brb_b12_t2">Оперативно и без ограничений вносим корректировки, согласно вашим замечаниям, вплоть до финального утверждения проекта</p>
            </div>
          </div>
          <div class="brb_b12_bottom">
            <div class="brb_b12_bx">
              <div class="brb_b12_bt_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b12_i5.svg" width="31" height="31" alt="icon"></div>
              <p><span style="font-weight: bold;">Вы можете обратиться к нам и после принятия работы, если заметили ошибку</span> 
                (такого ещё не было, но все мы люди). В течение года мы вносим корректировки неточностей, допущенных по нашей вине, совершенно бесплатно.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b13">
      <div class="main">
        <div class="brb_b13_box">
          <div class="brb_b13__lf">
            <div class="brb_zg font_pd"><span>Эти гарантии</span> зафиксированы <br>в договоре</div>
            <div class="brb_b13_main">
              <div class="brb_b13__item">
                <p class="brb_b13_t1 font_pd">Защита от плагиата</p>
                <p class="brb_b13_t2">Предлагаем только эксклюзивный дизайн, каждый элемент брендинга проверяем на уникальность, регистрируем торговую марку в ФИПС</p>
              </div>
              <div class="brb_b13__item">
                <p class="brb_b13_t1 font_pd">Соблюдение дедлайна</p>
                <p class="brb_b13_t2">Получаете готовую работу строго в срок, без затягивания <br>и форс-мажоров. За каждый день просрочки платим неустойку </p>
              </div>
              <div class="brb_b13__item">
                <p class="brb_b13_t1 font_pd">Сохранность персональных данных</p>
                <p class="brb_b13_t2">Гарантируем конфиденциальность вашей информации, заключаем дополнительное соглашение NDA</p>
              </div>
              <div class="brb_b13__item">
                <p class="brb_b13_t1 font_pd">100% возврат денег</p>
                <p class="brb_b13_t2">Вы можете быть спокойны за свой бюджет - все риски сведены к нулю</p>
              </div>
            </div>
          </div>
          <div class="brb_b13__rg">
            <div class="brb_b13_bx">
              <div class="brb_b13_video">
                <div class="brb_b13_video_i1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b13_svg_1.svg" width="169" height="159" alt="bg"></div>
                <div class="brb_b13_video_i2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b13_svg_2.svg" width="134" height="247" alt="bg"></div>
                <div class="st_zg_bg_img b18_gif">
                  <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                    <source data-src="/bitrix/templates/veonix/assets/img/old/video/logo_b3_video.mp4?1" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="brb_b13_box_2">
          <div class="brb_b13_box_2_bx">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b13_svg_3.svg" width="39" height="39" alt="bg">
            <p class="font_pd">Как мы <br>работаем</p>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b14">
      <div class="main">
        <div class="brb_b14_box_1">
          <p>Для того, чтобы ваши конкуренты остались далеко позади, а клиентов стало в разы больше, задействуем весь наш потенциал и ресурсы.</p>
          <p>Под каждый проект формируем отдельную рабочую группу, в состав которой входит от 4 до 13 специалистов (маркетологи, дизайнеры, стратеги, иллюстраторы, арт-директор).</p>
          <h2 class="brb_zg font_pd">Этапы разработки брендбука</h2>
        </div>
        <div class="brb_b14_main">
          <div class="brb_b14_top">
            <div class="brb_b14_svg"><img class="lazy " data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b14_svg.svg" width="200" height="200" alt="svg"></div>
            <p class="font_pd">СТАРТ</p>
          </div>
          <div class="brb_b14_center">

            <div class="brb_b14__item brb_b14__item_1">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd">Сбор первичной информации</p>
                <p class="brb_b14_text">
                  Получаем заявку на выполнение проекта. Вникаем в задачу, составляем предварительную смету. Высылаем вам бриф для заполнения или получаем информацию <br>
                  о бизнесе, клиентах и аудитории путём интервьюирования. Определяем объёмы проекта, сроки выполнения, ваши потребности и ожидания. Запрашиваем имеющиеся элементы и наработки бренда.                  
                </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img brb_b14_img_1">
                  <div class="brb_b14_image">
                    <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_1.png" width="619" height="459" alt="заказать брендбук">
                  </div>
                </div>
              </div>
            </div>

            <div class="brb_b14__item brb_b14__item_2">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd">Глубинное исследование</p>
                <p class="brb_b14_text">
                  Проводим всесторонний маркетинговый анализ вашего бизнеса, продукта, сервиса. С помощью самых эффективных инструментов маркетинга исследуем внешнюю среду: выявляем сильные и слабые стороны конкурентов, фиксируем общую ситуацию на нишевом рынке, прицельно изучаем целевую аудиторию. Анализируем существующий корпоративный стиль, а также лучшие отечественные и зарубежные практики
                 <br> в аналогичной сфере. Делаем прогноз <br>
                  и оценку потенциала разрабатываемого бренда и определяем вектор его наиболее эффективного развития.
                </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img brb_b14_img_2">
                  <div class="brb_b14_image">
                    <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_2.png" width="593" height="377" alt="заказать брендбук">
                  </div>
                </div>
              </div>
            </div>

            <div class="brb_b14__item brb_b14__item_3">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd">Разработка бренд-платформы</p>
                <p class="brb_b14_text">
                  Структурируем полученный первичный материал и готовим не менее трёх концептуально отличных вариантов идеологической платформы для бренда. Каждый из них в обязательном порядке содержит охраноспособные вербальные 
                <br>  и визуальные элементы (слоган, название, логотип, ассоциативные образы, цветовая палитра, шрифты). На основе выбранной гипотезы, дорабатываем финальную версию архитектуры бренда.                   
                </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img brb_b14_img_3">
                  <div class="brb_b14_image">
                    <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_3.png" width="499" height="515" alt="заказать брендбук">
                  </div>
                </div>
              </div>
            </div>

            <div class="brb_b14__item brb_b14__item_4">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd">Создание брендбука</p>
                <p class="brb_b14_text">
                  Все наработки и результаты, собранные <br>в ходе проекта, регламентируем<br> и систематизируем. Формируем детальный свод правил и стандартов по использованию стилеобразующих элементов визуальной идентификации вашего бренда. Присылаем вам на согласование готовый брендбук, обсуждаем детали, вносим правки, если <br> это необходимо.
                </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img brb_b14_img_4">
                  <div class="brb_b14_image">
                    <img class="lazy brb_b14_img_4_1" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_4.png" width="342" height="212" alt="заказать брендбук">
                    <img class="lazy brb_b14_img_4_2" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_5.png" width="599" height="421" alt="изготовление брендбука">
                  </div>
                </div>
              </div>
            </div>

            <div class="brb_b14__item brb_b14__item_5">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd">Дополнительные услуги</p>
                <p class="brb_b14_text">
                  Оказываем помощь в брендировании. <br>
                  В собственной типографии отпечатаем любое количество имиджевого, рекламного материала, сувенирной и подарочной продукции с вашим логотипом. При необходимости доставим их по адресу заказчика.
                </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img brb_b14_img_5">
                  <div class="brb_b14_image">
                    <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b14_img_6.png" width="509" height="462" alt="заказать брендбук">
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="brb_b14_bottom font_pd">
            <p>Остаёмся с вами на связи до завершения работы. Для удобства и оперативности решения текущих вопросов создаём рабочую группу в WhatsApp, куда подключаются все специалисты, занятые разработкой вашего проекта. Проводим рабочие встречи в нашем 
              или вашем офисе, а также удалённые скайп или Zoom созвоны.</p>
          </div>
        </div>
      </div>
    </section>
      <section>
          <div class="main">
              <div class="box-kit box-brandbook">
                  <div class="kit-zag">
                      <div class="st1">
                          <p class="st1-t1">ТАРИФЫ</p>
                          <p class="st1-t2"></p>
                      </div>
                      <div class="spik">
                        <div class="str1">
                            <p>Key Visual</p>
                        </div>
                        <div class="str1">
                            <p>Цветовая гамма</p>
                        </div>
                        <div class="str1">
                            <p>Паттерны</p>
                        </div>
                        <div class="str1">
                            <p>Шрифты</p>
                        </div>
                        <div class="str1">
                            <p>Заголовки и подзаголовки</p>
                        </div>
                        <div class="str1">
                            <p>Фотостиль</p>
                        </div>
                        <div class="str1">
                            <p>Элементы инфографики</p>
                        </div>
                        <div class="str1">
                            <p>Смысловая упаковка</p>
                        </div>
                        <div class="str1">
                            <p>Носители бренда</p>
                        </div>
                        <div class="str2">
                            <p>Определение целевого<br> сегмента рынка</p>
                        </div>
                        <div class="str2">
                            <p>Разработка основных сообщений<br> для коммуникации с аудиторией</p>
                        </div>
                        <div class="str2">
                            <p>Разработка УТП и конкурентных<br> преимуществ</p>
                        </div>
                        <div class="str1">
                            <p>Руководство</p>
                        </div>
                      </div>
                  </div>
                  <div class="tarif">
                      <div class="st1">
                          <p class="st1-t1">Лайт</p>
                          <p class="st1-t3">150 000 руб.</p>
                      </div>
                      <button class="podr">Подробнее</button>
                      <div class="pds">
                          <div class="spik">
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="no"></p>
                            </div>
                            <div class="str1">
                                <p class="no"></p>
                            </div>
                            <div class="str2">
                                <p class="no"></p>
                            </div>
                            <div class="str2">
                                <p class="no"></p>
                            </div>
                            <div class="str2">
                                <p class="no"></p>
                            </div>
                            <div class="str1">
                                <p>20 страниц</p>
                            </div>
                          </div>
                          <div class="st3">
                            <a href="#form" data-fancybox data-text="Заявка на брендбук: Лайт') - Брендбук" data-fancybox class="sbm">ЗАКАЗАТЬ</a>
                          </div>
                      </div>
                  </div>
                  <div class="tarif">
                      <div class="st1 optim">
                            <p class="st1-t1">FULL</p>
                            <p class="st1-t3">300 000 руб.</p>
                      </div>
                      <button class="podr">Подробнее</button>
                      <div class="pds">
                          <div class="spik">
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p>5-7 макетов</p>
                            </div>
                            <div class="str2">
                                <p class="yes"></p>
                            </div>
                            <div class="str2">
                                <p class="yes"></p>
                            </div>
                            <div class="str2">
                                <p class="yes"></p>
                            </div>
                            <div class="str1">
                                <p>50 страниц</p>
                            </div>
                          </div>
                          <div class="st3 optim">
                            <a href="#form" data-fancybox data-text="Заявка на брендбук: FULL - Брендбук" data-fancybox class="sbm">ЗАКАЗАТЬ</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
     <section class="brb_b15">
      <div class="main">
        <h2 class="brb_zg font_pd">Кому и для чего <br>нужен брендбук</h2>
        <div class="brb_b15_content">
          <div class="brb_b15_box">
            <div class="brb_b15_main">
              <p>Представьте ситуацию. Вы обслуживаетесь в банке N уже не первый год. Наизусть знаете, элементы корпоративного стиля, которыми пропитано буквально всё, начиная с имиджевой полиграфии, заканчивая стилизованной входной группой здания. Каково же будет ваше удивление, когда однажды, вместо договора, отпечатанного на привычном фирменном бланке, вам выдадут цветную бумагу, украшенную бабочками и цветочками.  </p>
              <p>Наверняка вы увидите в этом недобрый знак и задумаетесь, стоит ли и дальше доверять этому банку свои деньги. Причём не только вы, но и тысячи других клиентов. Как следствие: отток с депозитных счетов, паника, ажиотаж!</p>
              <p>Возможно, пример несколько преувеличен и вряд ли какое-либо финансовое учреждение работает без брендбука. Но так становится понятно, насколько клиентам и партнёрам важна стабильность и привычное оформление.
              </p>
              <p>Это вовсе не означает, что теперь вы пожизненно привязаны к определённому графическому сочетанию и малейшее отступление мгновенно закончится крахом. Вовсе нет. Но имея под рукой брендбук, даже редизайн можно воплотить мягко и без лишнего стресса для аудитории.</p>
              <p>Работа над продвижением бренда без Brandbook действительно превращается в творческий хаос. Отсутствие чёткого понимания, как и куда идти, может повлечь за собой такие неприятности, как потеря времени, бесконечные переделки, напрасно потраченный бюджет.</p>
              <p>Брендбук - практическое пособие, созданное для руководства, маркетологов и PR персонала. В нём собран весь материал, который имеет отношение к айдентике:
              </p>
              <ul>
                  <li>миссия, история, ценности компании;</li>
                  <li>корпоративная культура;</li>
                  <li>рекомендации по использованию фирменного стиля, логотипа при разработке любых рекламных макетов;</li>
                  <li>корпоративные цвета и шрифты;</li>
                  <li>графические элементы.</li>
              </ul>
              <p>Это стилистический паспорт вашего бренда. В нём описывается большинство базовых ситуаций, с которыми компания сталкивается во время той или иной рекламной кампании: фиксируется информация, какой логотип использовать на белом или цветном фоне, варианты его написания на иностранных языках, допустимая цветовая палитра, стилистика рекламных текстов и деловой корреспонденции.
              </p>
              <p>Кроме того, брендбук в разы облегчает и ускоряет работу привлечённых специалистов по продвижению. Но главное, он просто незаменим в ситуациях, когда решается вопрос расширения масштаба деятельности. Если вы планируете открыть филиал (производство, офис, представительство) в соседнем районе, городе, стране или материке - без брендбука вам не справиться. Он существенно упростит работу над корпоративным стилем новых заведений. 
              </p>
              <p>Чтобы лучше понять, почему это так, вообразите себе логотип Макдональдс (привычную жёлтую "m" на красном фоне) в других цветовых сочетаниях. Вряд ли вы (как и миллионы посетителей) сразу поймёте, что здесь подают любимую картошку фри и чизбургеры! 
              </p>
              <p>А ещё, брендбук компании облегчает работу HR отделов. Он помогает новым сотрудникам самостоятельно вникнуть в идею, миссию бренда и его атрибуты.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_example">
        <div class="main">
            <div class="brb_zg font_pd">Примеры наших работ</div>
            <div class="pack-flex">
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/1.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m1.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/2.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m2.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/3.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m3.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/4.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m4.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/5.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m5.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/6.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m6.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/7.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m7.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/8.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m8.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/9.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m9.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/10.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m10.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/11.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m11.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/12.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m12.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/13.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m13.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/14.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m14.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/15.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m15.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/brandbook/16.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/m16.jpg"></a>
            </div>
        </div>
    </section>
    <section class="brb_b16">
      <div class="main">
        <div class="brb_zg font_pd">Но, всё-таки, брендбук <br>нужен не всем...</div>
        <div class="brb_b16_box">
          <p>К примеру, его наличие вовсе необязательно, если ваш бизнес относится к одной из этих категорий:</p>
          <ul>
            <li>- Небольшой стартап. Ваша фирма только вчера родилась <br>
              и вопрос продвижения находится совершенно в сыром виде.
            </li>
            <li>- Мелкая компания без претензий на рост. Вам комфортно работать в своём формате и в ближайшее время вы не планируете масштабироваться.</li>
          </ul>
          <p>В случае же, если у вас большие планы на будущее, вам стоит задуматься над тем, чтобы заказать брендбук и упаковать сильный образ для мощного продвижения. </p>
        </div>
      </div>
    </section>
    <section class="brb_b21">
      <div class="main">
        <div class="faq-head">Вопрос-ответ</div>
        <div class="faq_box" itemscope itemtype="https://schema.org/FAQPage">

          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Какие услуги учитываются при формировании цены брендбука?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Стандартный набор услуг включает все необходимые работы для создания базового «руководства по стилю»:</p>
                      <ul>
                          <li>разработку всех документов (бренд-концепции, фирменного стиля, группы носителей);</li>
                          <li>формирование платформы бренда, дизайна носителей, айдентики;</li>
                          <li>предоставление результата работ в виде PDF-гайдлайна или печатного руководства;</li>
                          <li>передача авторских прав, оформление запрета на публикации в NDA, портфолио.</li>
                      </ul>
                      <p>Если у вас готова айдентика, есть четкое ТЗ, то цена на брендбук будет ниже.</p>
                      <p>Стоимость доработки существующего фирменного стиля, ребрендинга стандарта коммуникаций по бренду рассчитывается индивидуально.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">У нас уже есть фирменный стиль. Во сколько обойдется создание брендбука?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Если «концептуальная часть» уже готова, сообщите об этом менеджеру. Он подскажет, какие услуги нужно заказать, чтобы получить оптимальное «руководство по стилю». Мы выполняем проработку платформы бренда, стандартизацию бизнеса, унификацию будущих шаблонов полиграфии, фиксацию правил создания контента.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Кто занимается разработкой брендбука?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Для каждого проекта формируется команда профессионалов. В нее входит менеджер, арт-директор, дизайнер, копирайтер и др. Все специалисты работают в штате нашей компании. Мы не пользуемся услугами фрилансеров, что позволяет гарантировать соблюдение высоких стандартов.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Наша компания из Екатеринбурга. Как будет организована работа?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Весь объем работ над брендбуком фиксируется в Договоре. Каждая исполненная задача закрываются Актами выполненных работ.
                      С иногородними заказчиками общение ведется по телефону или в мессенджерах. Чтобы ускорить процесс работы, документы сканируются и пересылаются по электронной почте. Оригиналы можно получить заказным письмом или курьерскими службами.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Нам нужен брендбук срочно. Как быстро можно сделать?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Минимальные сроки создания полноценного документа при готовых дизайн-макетах и айдентике – две рабочие недели. Стоимость срочного заказа будет выше.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">У вас есть шаблон техзадания или бриф? </p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Да, мы заполняем Техническое Задание совместно с заказчиком. Этот документ является приложением к Договору на разработку брендбука. В ТЗ прописываются требования маркетинговой стратегии и пожелания по дизайну. Но в рамки типового Брифа не всегда можно заключить все потребности клиента. Мы обязательно проводим личную встречу и в живом диалоге проясняем текущую ситуацию, приоритетные бизнес-задачи. Все это обязательно отражается при разработке брендбука.</p>
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
    <section class="st_b18 press_b10 brb_b17">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/press_b10_video.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Готовы начать? </div>
          <p class="brb_b17_tx">Мы уже подготовили <br>
            для вас индивидуальное предложение</p>
          <p class="st_opis">Узнать, сколько стоит разработка брендбука, вы можете по телефону <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a><br>
            или подать заявку на обратный звонок.
             </p>
        </div>
        <div class="st_form_bx">
          <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "сколько стоит разработка брендбука - Брендбук" type="submit">ЗАКАЗАТЬ ЗВОНОК</a>
        </div>
      </div>
    </section>
    <section class="poleznaya">
    <div class="main">
            <h2 class="home_h2">Полезная информация по теме</h2>
    
            <p><a href="https://veonix.ru/blog/brandbook-design/">Оформление брендбука</a></p>
             <p><a href="https://veonix.ru/blog/brandbook-development/">Разрабатываем брендбук: что нужно знать?</a></p>
             <p><a href="https://veonix.ru/blog/chem-gajdlajn-otlichaetsya-ot-brendbuka-i-v-chem-ego-polza/">Чем гайдлайн отличается от брендбука и в чем его польза?</a></p>
   
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
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "6",
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">

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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>