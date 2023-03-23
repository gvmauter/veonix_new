<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать айдентику бренда в профессиональной студии графического дизайна Veonix. Разработаем фирменную айдентику компании, с которой ваш бренд будут запоминать.");
$APPLICATION->SetPageProperty("title", "Айдентика – разработка корпоративного образа бренда в студии дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/"). 
$APPLICATION->AddChainItem("Брендинг","/branding/").
$APPLICATION->AddChainItem("Айдентика бренда").
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/brendbookPage.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/packPage.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/identityPage.css"); 
  
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/identityPage.css");   

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
?>



<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "",
		"TEMPLATE_FOR_TITLE2" => "Айдентика",
		"TEMPLATE_FOR_TITLE3" => " бренда",
		"CHECKBOX" => "N",
		"TEXT_1" => "Разработаем фирменную айдентику, которая выделит вас среди конкурентов, подчеркнет корпоративный стиль и покажет характер компании",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

<div class="old_page">

  <main class="identity_page">
    <section class="id_b1">
      <div class="main">
        <div class="id_b1_box">
          <div class="id_b1_lf">
            <h2 class="id_zg font_pd"><span>Для чего</span><span>айдентика</span><span>нужна вашему бизнесу?</span></h2>
            <div class="id_b1_lf_box font_pd">  
              <div class="id_b1_lf_item">
                <p>/01</p>
                <p>Увеличит узнаваемость бренда</p>
              </div>
              <div class="id_b1_lf_item">
                <p>/02</p>
                <p>Визуально выделит вас среди конкурентов</p>
              </div>
              <div class="id_b1_lf_item">
                <p>/03</p>
                <p>Создаст имидж успешной компании</p>
              </div>
              <div class="id_b1_lf_item">
                <p>/04</p>
                <p>Повысит лояльность клиентов</p>
              </div>
              <div class="id_b1_lf_item">
                <p>/05</p>
                <p>Поднимет продажи на новый уровень</p>
              </div>
              <div class="id_b1_lf_item">
                <p>/06</p>
                <p>Эффективно скажется на продвижении ваших услуг</p>
              </div>
            </div>
          </div>
          <div class="id_b1_rg">
            <div class="id_b1_rg_tx">
              <p><span>Создание корпоративной айдентики</span> – важнейший момент в формировании бренда, который требует больших усилий и профессионального подхода.</p>
              <p><span>Мы проработаем каждую деталь</span> вашего фирменного стиля и поможем сделать компанию отличной от других.</p>
            </div>
            <div class="id_b1_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b1_img.png" width="819" height="560" alt="Айдентика"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b2">
      <div class="main">
        <div class="id_b2_box">
          <div class="id_b2_zg st_b6_bx_1_rg_bx">
            <div class="id_zg font_pd h2">Наши проекты</div>
          </div>
          <div class="id_b2_tx">
            <p>Немалому количеству статусных компаний мы помогли разработать элементы айдентики. Вы можете ознакомиться 
              с нашими работами и оказаться в их числе.</p>
          </div>
        </div>
        <div class="id_b2_box_1">
          <div class="id_b2_box_1_bg">
            <div class="id_b2_box_1_bg_after"></div>
            <div class="id_b2_box_1_bg_before"></div>
          </div>
          <div class="id_b2_box_1_img">
            <div class="id_b2_box_1_image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b2_img.png" width="864" height="786" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b2_img.png"></div>
          </div>
          <div class="id_b2_box_1_logo">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_logo.svg" width="271" height="31" alt="veonix" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_logo.svg">
          </div>
        </div>
        <div class="id_b2_box_2">
          <div class="id_b2_box_2_bg">
            <div class="id_b2_box_2_bg_after"></div>
            <div class="id_b2_box_2_bg_before"></div>
          </div>
          <div class="id_b2_box_2_logo">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_2_logo.svg" width="270" height="60" alt="veonix" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_2_logo.svg">
          </div>
          <div class="id_b2_box_2_img">
            <div class="id_b2_box_2_image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_2.png" width="1400" height="1009" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_2.png"></div>
          </div>
        </div>
        <div class="id_b2_box_3">
          <div class="id_b2_box_3_bg">
            <div class="id_b2_box_3_bg_after"></div>
          </div>
          <div class="id_b2_box_3_logo">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_logo.svg" width="224" height="52" alt="veonix" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/brandbook/b3_logo.svg">
          </div>
          <div class="id_b2_box_3_img">
            <div class="id_b2_box_3_image"><img class="lazy entered loaded" data-src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_3.png" width="1051" height="908" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b2_img_3.png"></div>
          </div>
          <div class="id_b2_box_3_tx">
            <p>Смотреть полное портфолио</p>
            <a href="/portfolio/branding/" class="sbm">СМОТРЕТЬ</a>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b3">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy entered loaded" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/id_b3_vid.mp4" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Получите бесплатные<br> рекомендации по созданию<br> или редизайну айдентики</div>
        
        </div>
        <a class="button_line form_block_button" href="#form" data-fancybox data-text="Получите бесплатные рекомендации по созданию или редизайну айдентики">
                  <span>Оставить заявку</span>
                  <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
                  <i class="button_line_2"></i>
        </a>
      </div>
    </section>
    <section class="brb_b7 id_b4">
      <div class="main">
        <div class="id_b4_bg">
          <div class="id_b4_bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_1.svg" width="156" height="289" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_1.svg"></div>
          <div class="id_b4_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_2.svg" width="193" height="277" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_2.svg"></div>
          <div class="id_b4_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_3.svg" width="242" height="227" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_3.svg"></div>
        </div>
        <div class="id_b4_top">
          <h2 class="brb_zg font_pd">
            <span>Стоимость</span> <span>разработки</span> <span>айдентики?</span>
          </h2>
          <div class="id_b4_top_text">
            <p>Наши специалисты готовы оказать весь спектр услуг по созданию или редизайну фирменной айдентики: от оформления отдельных канцелярских принадлежностей<br> 
              до разработки полноценного брендбука.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b5">
      <div class="main">
        <div class="id_b5_box">
          <div class="id_b5_lf">
            <div class="st_b5_top_lf_box">
              <video class="box_video lazy " width="175" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b5_img_1.mp4" type="video/mp4" >
              </video>
            </div>
            <div class="st_b4_it_box">
              <div class="st_b4_h2">Нейминг</div>
              <div class="st_b4_text">
                <p>Коллективным разумом создадим имя бренда, которое будет ассоциироваться только с вами. Укрепим имя мощным слоганом.</p>
              </div>
              <div class="st_b4_price">
                <p>от 100  <span>тыс. руб.</span></p>
                <a href="/zakazat-naming/" class="sbm">ЗАКАЗАТЬ</a>
              </div>
            </div>
          </div>
          <div class="id_b5_rg">
            <div class="brb_b8__lf">
              <div class="st_b5_img">
                <div class="st_b5_img_1"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_3.svg" width="302" height="180" class="lazy" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_3.svg"></div>
                <div class="st_b5_img_2"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_4.svg" width="186" height="53" class="lazy" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_4.svg"></div>
                <div class="st_b5_img_3"><img data-src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_5.svg" width="277" height="55" class="lazy" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/firm_style/b5_img_5.svg"></div>
                <div class="st_b5_img_4"><img data-src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_4.svg" width="219" height="43" class="lazy" alt="Нейминг" data-ll-status="Айдентика" src="/bitrix/templates/veonix/assets/img/old/identity/b4_img_4.svg"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b6">
      <div class="main">
        <div class="id_b6_box_1">
          <div class="id_b6_lf">
            <div class="id_b6_lf_image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b6_img_1.png" width="465" height="473" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b6_img_1.png"></div>
          </div>
          <div class="id_b6_rg">
            <div class="st_b4_it_box">
              <div class="st_b4_h2">Логотип</div>
              <div class="st_b4_text">
                <p>Разработаем неотъемлемую часть бренда – ваш уникальный символ, отражающий стиль, характер и статус компании</p>
              </div>
              <div class="st_b4_price">
                <p>от 100 <span>тыс. руб.</span></p>
                <a href="/logos/" class="sbm">ЗАКАЗАТЬ</a>
              </div>
            </div>
          </div>
        </div>
        <div class="id_b6_box_2">
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
    <section class="id_b7">
      <div class="main">
        <div class="id_b7_box">
          <div class="id_b7_bg">
            <div class="id_b7_bg_lf">
              <div class="id_b7_bg_lf_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_1.svg" width="156" height="289" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_1.svg"></div>
              <div class="id_b7_bg_lf_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_2.svg" width="198" height="285" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_2.svg"></div>
              <div class="id_b7_bg_lf_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_3.svg" width="249" height="234" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_3.svg"></div>
            </div>
            <div class="id_b7_bg_rg">
              <div class="id_b7_bg_rg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_4.svg" width="159" height="229" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_4.svg"></div>
              <div class="id_b7_bg_rg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_5.svg" width="220" height="206" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_5.svg"></div>
              <div class="id_b7_bg_rg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_6.svg" width="156" height="289" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_svg_6.svg"></div>
            </div>
          </div>
          <div class="id_b7_item">
            <div class="st_b4_it_box">
              <div class="st_b4_it_gif">
                <video class="box_video lazy entered loaded" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" data-ll-status="loaded">
                  <source data-src="/bitrix/templates/veonix/assets/img/old/video/st_b5_2_img.mp4?1" type="video/mp4" >
                </video>
              </div>
              <div class="st_b4_h2">Носители фирменного стиля</div>
              <div class="st_b4_text">
                <p>Со всей внимательностью и серьезностью подойдем к проработке каждого элемента айдентики, ведь именно они формируют единый образ бренда:</p>
                <div class="st_b4_text_ul">
                  <ul>
                    <li>визитная карточка</li>
                    <li>бланк письма / коммерческого</li>
                    <li>предложения</li>
                    <li>папка для бумаг</li>
                    <li>блокнот / ежедневник</li>
                    <li>бейдж</li>
                    <li>открытка / конверт</li>
                    <li>плакат / баннер / вывеска</li>
                    <li>Roll-Up / PressWall</li>
                    <li>оформление корпоративного транспорта</li>
                  </ul>
                  <ul>
                    <li>оформление корпоративной одежды</li>
                    <li>упаковка</li>
                    <li>пластиковая карта</li>
                    <li>брошюра / лифлет</li>
                    <li>флаер / листовка</li>
                    <li>флешка / диск</li>
                    <li>презентация / маркетинг-кит</li>
                    <li>буклет / каталог</li>
                    <li>сувенирная продукция</li>
                  </ul>
                  <div class="st_b4_text_ul_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_img_1.png" width="209" height="325" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_img_1.png"></div>
                  <div class="st_b4_text_ul_img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b7_img_2.png" width="383" height="245" alt="Айдентика" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b7_img_2.png"></div>        
                </div>
              </div>
              <div class="st_b4_price">
                <p>от 10 <span>тыс. руб. за элемент</span></p>
                <a href="/zakazat-firmenniy-stil/" class="sbm">ЗАКАЗАТЬ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b8">
      <div class="main">
        <div class="id_b8_box">
          <div class="st_b4_it_box">
            <div class="id_b8_zg">
              <div class="st_b4_h2">Айдентика бренда<br> <span>Включает в себя все основные<br> элементы дизайна:</span></div>
            </div>
            <div class="id_b8_content">
              <div class="id_b8_content_img">
                <div class="id_b8_content_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b8_img_1.png" width="232" height="464" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b8_img_1.png"></div>
                <div class="id_b8_content_img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b8_img_2.jpg" width="314" height="464" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b8_img_2.jpg"></div>
              </div>
              <div class="st_b4_text">
                <p>Guidebook объёмом от 8-10 страниц и макеты, разработанные в Adobe illustrator<br> с возможностью самостоятельного редактирования:</p>
                <div class="st_b4_text_ul">
                  <ul>
                    <li>ключевой образ,</li>
                    <li>цветовая гамма,</li>
                    <li>паттерны,</li>
                    <li>шрифты,</li>
                    <li>заголовки / подзаголовки,</li>
                    <li>иконки, </li>
                    <li>абзацы,</li>
                    <li>таблицы / инфографика / диаграммы,</li>
                    <li>маркированные / нумерованные списки,</li>
                    <li>оформление фотографий / арт-объектов</li>
                  </ul>
                </div>
                <p>В результате вы получаете готовый гайдбук объемом 5-7 страниц + редактируемые макеты (в формате Adobe illustrator)</p>
              </div>
            </div>
            <div class="id_b8_price">
              <div class="st_b4_price">
                <p>от 150 <span>тыс. руб.</span></p>
                <a href="#form" data-fancybox="" data-text="Заказать Айдентика  - Айдентика" class="sbm">ЗАКАЗАТЬ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b9">
      <div class="main">
        <div class="id_b9_box">
          <div class="st_b4_it_box">
            <div class="st_b4_h2">Брендбук</div>
            <div class="st_b4_text">
              <p>Для вашего бизнеса создается полноценное руководство по созданию и применению концепции бренда, которое включает: имя, логотип, позиционирование бренда, его философию, айдентику, а также носители бренда <br> 
                (7 элементов на ваш выбор)</p>
            </div>
            <div class="st_b4_price">
              <p>от 300  <span>тыс. руб.</span></p>
              <a href="/brand-book/"  class="sbm">ЗАКАЗАТЬ</a>
            </div>
          </div>
          <div class="id_b9_box_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b9_img.jpg" width="495" height="382" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b9_img.jpg"></div>
        </div>
      </div>
    </section>
    <section class="id_b10">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/id_b10_vid.mp4" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Подайте заявку на расчет стоимости<br>
             разработки айдентики под ваши<br> 
              потребности</div>
          <p class="st_opis"> мы перезвоним вам в течение 15 минут</p>
        </div>
        <div class="st_form_bx">
          <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "Заявку на расчет стоимости - Айдентика" type="submit">ЗАКАЗАТЬ ЗВОНОК</a>
        </div>
      </div>
    </section>
    <section class="id_b11">
      <div class="main">
        <div class="id_b11_box">
          <div class="id_b11_lf">
            <div class="id_b11_lf_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b11_img_1.png" width="240" height="240" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b11_img_1.png"></div>
            <div class="id_b11_lf_img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b11_img_2.jpg" width="406" height="500" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b11_img_2.jpg"></div>
          </div>
          <div class="id_b11_rg">
            <div class="id_b11_rg_zg">
              <h2 class="id_zg font_pd">
                <span>Почему разработку</span>
                <span>айдентики бренда стоит</span>
                <span>доверить студии Veonix?</span>
              </h2>
            </div>
            <div class="id_b11_rg_tx">
              <p><span style="font-weight: bold;">Veonix – единый слаженный механизм создания визуальной коммуникации для бизнеса.</span> Каждый специалист – неотделимая часть организованной системы. Над проектами мы работаем всей командой профессионалов, выполняем задачи качественно и в срок, гарантируем результат. Мы помогаем как устоявшимся на рынке компаниям адаптировать имеющийся стиль под современные реалии, так и создаем фирменную айдентику бренда для молодых организаций, только формирующих свой корпоративный образ.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b12">
      <div class="main">
        <div class="id_b12_box">
          <div class="id_b12_main">
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Эксклюзивный дизайн</p>
              <p class="id_b12_opis">В создании айдентики мы не используем шаблоны<br>
                 и готовые идеи. Ваш проект будет полностью<br>
                  оригинальным, обратит на себя внимание <br> 
                и заставит конкурентов равняться на вас</p>
            </div>
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Маркетинговая проработка</p>
              <p class="id_b12_opis">Разработанная нами айдентика позволяет<br>
                 отстроиться от конкурентов и сделать вас<br> 
                на голову выше. Поэтому создание стиля происходит<br> 
                 только после глубокого маркетингового анализа</p>
            </div>
          </div>
          <div class="id_b12_main">
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Профессиональная командная работа </p>
              <p class="id_b12_opis">Ваш бренд всесторонне и до мелочей<br> 
                 прорабатывается командой минимум из 5<br> 
                  профессионалов: маркетолог, стратег, иллюстратор,<br> 
                   дизайнер, арт-директор, проджект-менеджер</p>
            </div>
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Пунктуальность</p>
              <p class="id_b12_opis">Все сроки выполнения работы оговариваются<br> 
                 заранее. Мы стараемся укладываться <br> 
                в необходимые вам временные рамки<br> 
                и сохранять качество продукта</p>
            </div>
          </div>
          <div class="id_b12_main">
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Гарантия качества</p>
              <p class="id_b12_opis">Разрабатываем ваш уникальный стиль<br> 
                до финального утверждения, бесплатно вносим<br> 
                 неограниченное количество правок</p>
            </div>
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Соотношение цены и качества</p>
              <p class="id_b12_opis">Вы получаете фирменный стиль топового уровня<br> 
                по выгодным ценам. С нами вы сможете<br> 
                 максимально грамотно и продуктивно<br> 
                  использовать бюджет на разработку айдентики</p>
            </div>
          </div>
          <div class="id_b12_main">
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Контроль работы и результатов</p>
              <p class="id_b12_opis">Процесс работы специалистов по каждому<br> 
                 направлению создания айдентики бренда пристально<br> 
                  контролируется и корректируется руководством, <br>
                что позволяет эффективно и динамично решать задачи<br> 
                 без потери качества</p>
            </div>
            <div class="id_b12_item">
              <p class="id_b12_zg font_pd">Рассрочка без предоплаты</p>
              <p class="id_b12_opis">Своим постоянным клиентам мы даем<br> 
                 возможность получить весь комплекс<br> 
                  необходимых услуг, а рассчитаться позже <br> 
                по удобному графику</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="id_b13">
      <div class="main">
        <div class="id_b13_box_1">
          <div class="id_b13_box_1_lf">
            <div class="id_b13_box_1_lf_zg st_b6_bx_1_rg_bx">
              <div class="id_zg font_pd h2">
                <span>Цифры</span>
                <span>и факты о нас</span>
              </div>
            </div>
            <div class="id_b13_box_1_lf_opis">
              <p>На кону имидж компании, уважение партнеров и твердые позиции на рынке. Эти и другие факторы говорят, что работу над корпоративным стилем нужно доверить настоящим профессионалам – организации, которая работает официально и все действия оформляет юридически, и ее сотрудникам, которые четко знают свои задачи и несут ответственность за их выполнение. </p>
              <p>Мы полностью включаемся в работу над заказом каждого клиента. Делаем все возможное для получения эффективного результата, <br>
                ваших положительных отзывов и продолжения сотрудничества. </p>
              <p><span style="font-weight: 600;">Цифры не дадут соврать</span></p>
            </div>
          </div>
          <div class="id_b13_box_1_rg">
            <div class="id_b13_box_1_rg_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b13_img_1.png" width="739" height="593" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b13_img_1.png"></div>
          </div>
        </div>
        <div class="id_b13_box_2">
          <div class="id_b13_box_2_top">
            <div class="id_b13_box_2_top_main">
              <div class="id_b13_box_2_top_item">
                <p class="id_b12_zg font_pd">Более 5 лет опыта</p>
                <p class="id_b12_opis">Создаем премиальные<br> digital-проекты для бизнеса<br> с 2017 года</p>
              </div>
              <div class="id_b13_box_2_top_item">
                <p class="id_b12_zg font_pd">Более 20 сотрудников</p>
                <p class="id_b12_opis">В составе студии только<br> опытные профессионалы <br>с внушительным бэкграундом</p>
              </div>
            </div>
            <div class="id_b13_box_2_top_main">
              <div class="id_b13_box_2_top_item">
                <p class="id_b12_zg font_pd">Более 30 компаний</p>
                <p class="id_b12_opis">На постоянной основе с нами<br> сотрудничают компании<br> международного масштаба </p>
              </div>
              <div class="id_b13_box_2_top_item">
                <p class="id_b12_zg font_pd">Более 500 проектов</p>
                <p class="id_b12_opis">Наша студия успешно<br> реализует различные<br> проекты один за другим</p>
              </div>
            </div>
          </div>
          <div class="id_b13_box_2_bt">
            <div class="id_b13_box_2_lf_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/identity/b13_img_2.jpg" width="410" height="287" alt="bg" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/identity/b13_img_2.jpg"></div>
            <div class="id_b13_box_2_rg_text">
              <p>Для вашего удобства мы предоставляем полный пакет услуг, включая создание авторских текстов для любых проектов и целей, а также печать в партнерской типографии со скидкой 20%</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_example">
        <div class="main">
            <div class="h2">Примеры наших работ</div>
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
    <section class="id_b14">
      <div class="main">
        <div class="id_b14_zg">
          <h2 class="id_zg font_pd">
            <span>Этапы разработки</span>
            <span>фирменной айдентики</span>
          </h2>
          <p class="id_b14_zg_opis">Наша студия нацелена на создание качественного продукта, который превзойдет ваши ожидания и окажет WOW-эффект на клиентов. Поэтому весь процесс разработки айдентики бренда – наша пошаговая кропотливая работа с вашим участием.</p>
        </div>
        <div class="brb_b14_main">
          <div class="brb_b14_top">
            <div class="brb_b14_svg"><img class="lazy " data-src="/bitrix/templates/veonix/assets/img/old/brandbook/brb_b14_svg.svg" width="200" height="200" alt="svg"></div>
            <p class="font_pd">СТАРТ</p>
          </div>
          <div class="brb_b14_center">

            <div class="brb_b14__item brb_b14__item_1 id_b14__item_1">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Обсуждение<br> будущего проекта</p>
                <p class="brb_b14_text id_b14_text">Вы обращаетесь в нашу студию. Составляем бриф, в котором собираем все необходимые данные для создания бизнес-проекта: информацию<br>
                  о компании, клиентах, ваши потребности<br> 
                  и ожидания. Консультируем вас по всем имеющимся вопросам, ставим конкретные задачи, определяем объемы и сроки работ. Заполняем и подписываем сопутствующую документацию</p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_1">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_1.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="brb_b14__item brb_b14__item_2 id_b14__item_2">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Анализ бизнеса</p>
                <p class="brb_b14_text id_b14_text">Наши специалисты по маркетингу проводят комплексный глубокий анализ вашего бренда: исследуют нишу рынка, позиционирование<br> 
                  и цели бизнеса, детально изучают конкурентов и целевую аудиторию, выявляют преимущества и потребности в улучшении показателей.
                  </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_2">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_2.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="brb_b14__item brb_b14__item_3 id_b14__item_3">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Определение концепции</p>
                <p class="brb_b14_text id_b14_text">С помощью мозгового штурма наша команда генерирует множество идей. В зависимости<br>
от потребностей и поставленных задач определяем 3-5 наиболее удачных вариантов развития событий. Вы выбираете подходящую концепцию, по ней мы осуществляем дальнейшую проработку. </p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_3">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_3.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="brb_b14__item brb_b14__item_4 id_b14__item_4">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Создание дизайна бренда</p>
                <p class="brb_b14_text id_b14_text">На основании маркетинговых исследований 
                  и выбранной концепции создаем визуальную айдентику бренда. Формируем общее видение проекта, детально прорабатываем каждый основной элемент и представляем вам<br> 
                  в нескольких видах. При необходимости консультируетесь с нами, обсуждаете<br> 
                  с коллегами и выбираете оптимальный.</p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_4">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_4.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="brb_b14__item brb_b14__item_5 id_b14__item_5">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Презентация проекта </p>
                <p class="brb_b14_text id_b14_text">Собираем проект воедино. В результате<br> 
                  вы получаете готовый гайд-бук с описанием концепции бренда, инструкцией<br> 
                  по применению айдентики на носителях,<br> 
                  а также редактируемые макеты.</p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_5">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_5.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
            <div class="brb_b14__item brb_b14__item_6 id_b14__item_6">
              <div class="brb_b14__lf">
                <p class="brb_b14_zg font_pd id_b14_zg">Согласование<br> и дополнительные работы </p>
                <p class="brb_b14_text id_b14_text">Обсуждаем и утверждаем готовый проект. Согласовываем детали, сверяем объем выполненных работ и правильность выполнения задач. Вносим необходимые корректировки, доводим проект до финальной точки.<br> 
                  Помогаем вам напечатать брендированную продукцию в партнерской типографии, если такая потребность имеется.</p>
              </div>
              <div class="brb_b14__rg">
                <div class="brb_b14_img id_b14_vid_6">
                  <div class="brb_b14_image id_b14_video">
                    <video class="box_video lazy " video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="" >
                      <source data-src="/bitrix/templates/veonix/assets/img/old/video/b14_gif_6.mp4" type="video/mp4" >
                    </video>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
    <section class="id_b15 pack_b19">
      <div class="main">
        <div class="pack_zg">Наши <br> гарантии</div>
        <div class="pack_b19_line">
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Официальная сделка</span> <i>01</i></p>
            <p class="pack_b19_tx">Работаем только<br> по официальному договору,<br> в котором закрепляются все<br> права и обязанности, объемы<br> и сроки работ, финансовые<br> гарантии</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Конфиденциальность</span> <i>02</i></p>
            <p class="pack_b19_tx">Организация сотрудничества учитывает защиту предоставленных конфиденциальных данных. Этот пункт фиксируем<br> в договоре NDA</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Соблюдение сроков </span> <i>03</i></p>
            <p class="pack_b19_tx">Реализуем проекты в рамках<br> строго отведенных дат,<br> штрафы за каждый день<br> просрочки закрепляем<br> документально.</p>
          </div>
        </div>
        <div class="pack_b19_anim id_b15_anim"><img data-src="/bitrix/templates/veonix/assets/img/old/press/b8_line.svg" class="pk_pack_b19 svg_anim lazy entered loaded svg-animate" data-ll-status="loaded" src="/bitrix/templates/veonix/assets/img/old/press/b8_line.svg"><div class="svg-animate-img"><svg width="742" height="267" viewBox="0 0 742 267" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M4.02246 4L741.022 266" stroke="#C4C4C4" stroke-width="1" orig-stroke="#C4C4C4" orig-stroke-width="1" class="stroked animated" style="stroke-dasharray: 783; stroke-dashoffset: 783;"></path> <circle cx="3.52246" cy="3.5" r="3.5" fill="#C4C4C4"></circle> <circle cx="291.522" cy="106.5" r="3.5" fill="#C4C4C4"></circle> <circle cx="583.522" cy="209.5" r="3.5" fill="#C4C4C4"></circle> </svg> </div></div>
        <div class="pack_b19_line">
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Антиплагит</span> <i>04</i></p>
            <p class="pack_b19_tx">Каждый элемент айдентики<br> проходит серьезную проверку<br> на оригинальность, создается<br> без применения готовых<br> шаблонов персонально под<br> ваш бренд</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Возврат денег</span> <i>05</i></p>
            <p class="pack_b19_tx">В случае, если результат<br> вас не устроит, возвращаем 100% суммы заказа</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg id_b15_zg"><span>Бесплатные правки</span> <i>06</i></p>
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
                          <a href="#form" data-fancybox data-text="Заявка на брендбук: Лайт') - Айдентика" data-fancybox class="sbm">ЗАКАЗАТЬ</a>
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
                          <a href="#form" data-fancybox data-text="Заявка на брендбук: FULL') - Айдентика" data-fancybox class="sbm">ЗАКАЗАТЬ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">jQuery(".podr").click(function() { jQuery(this).toggleClass("activse");});</script>
    <section class="id_b16 brb_b15">
      <div class="main">
        <h2 class="brb_zg font_pd id_b16_zg">Что важно учитывать при<br> создании айдентики компании?</h2>
        <div class="brb_b15_content">
          <div class="brb_b15_box">
            <div class="brb_b15_main">
              <p>Фирменная айдентика – это уникальный единый образ бренда, который позволяет выделить компанию из общего числа. Складывается этот образ из отличительных элементов, будь то логотип или сувенирная продукция, вывеска или рекламный баннер, корпоративная одежда или маскот.</p>
              <p>Важно, чтобы ваш стиль был не просто набором нескольких носителей и элементов дизайна, а транслировал взаимосвязь всех деталей между собой, являлся инструментом коммуникации с потребителем. Ваша айдентика должна создавать атмосферу. Поэтому к разработке концепции и созданию дизайна каждого элемента нужно относиться с особой внимательностью. Да, весь процесс достаточно трудоемкий, но именно он служит основой для позиционирования и продвижения ваших идей и целей бизнеса в массы.</p>
              <p>Важно при разработке айдентики бренда не забывать про вашу аудиторию, вызывать у нее правильные ассоциации, чувства и эмоции. То, как потребитель относится к бренду на уровне восприятия, существенно влияет на его лояльность в процессе сотрудничества. Качественная проработка стиля и оригинальная подача формирует у людей устойчивое доверительное отношение к бренду. </p>
              <p>Важно не руководствоваться только лишь традиционными принципами и методами формирования стиля, а работать на опережение. Стоит предпринимать нестандартные действия, которые привлекут внимание аудитории, использовать новые приемы, о которых еще даже не слышали конкуренты или просто боялись применить. Однако нужно экспериментировать в меру и не брать только такой инструмент позиционирования за основу. Как мы знаем, сильный ажиотаж быстро проходит и забирает много энергии, а это снижает интерес потребителя.</p>
              <p>Наша команда подходит основательно к разработке каждого проекта, анализируя потенциал, реалии и риски. Мы не боимся смелых решений, но даже их принимаем взвешенно. Ваши идеи и установки – ориентир для нас при создании айдентики, наполненной жизнью и вызывающей стабильный интерес со стороны клиентов.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="brb_b21">
      <br><br><br>
      <div class="main">
        <div class="faq-head">Вопрос-ответ</div>
        <div class="faq_box" itemscope itemtype="https://schema.org/FAQPage">

          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Сколько стоит разработка айдентики?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Цена будет отличаться в зависимости от объема работ.</p>
                      <p>Если требуется обновить существующий логотип, без серьезных концептуального изменения, с сохранением преемственности и узнаваемости текущего знака, то можно сэкономить. Также минимальные расценки действуют, когда у компании есть точное описание или эскиз бренда.</p>
                      <p>Если нет конкретных пожеланий по стилистике и нужно увидеть несколько различных вариантов айдентики, после чего определиться с направлением работы, то нужно выбирать тариф с неограниченными доработками. Цена услуг будет выше.</p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Как организован процесс создания бренда?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Мы тщательно изучаем информацию о корпоративном стиле и поставленную задачу, поэтому чаще всего эскиз бренда соответствует пожеланиям заказчика. </p>
                      <p>Если первоначальные наработки не отвечают ожиданиям, проводится подробный разбор результатов работы, обсуждаются дополнительные примеры и запрашиваются уточнения по ТЗ. </p>
                      <p>Обратите внимание, мы стремимся предоставлять концептуально разные варианты айдентики. Если клиент не уверен в своих предпочтениях и не может сформулировать задачу, а также если решение принимает группа лиц с разными представлениями о концепте, то трех эскизов может оказаться недостаточно. </p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Какие элементы корпоративного стиля стоит заказать?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Мы подбираем оптимальный пакет айдентики в зависимости от специфики вашей компании. Иногда достаточно разработки бланка, визиток и конвертов. В других случаях требуется большее количество компонентов. </p>
                  </div>
              </div>
          </div>
          <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <p class="faq_box__title" itemprop="name">Можно заказать услуги по созданию айдентики, заплатить 50 % до начала работ, а вторую часть внести позднее?</p>
              <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                  <div class="faq_box__item_main" itemprop="text">
                      <p>Мы предлагаем схему с поэтапной предоплатой. Весь рабочий процесс по разработке айдентики разбивается на несколько этапов и каждый из них оплачивается отдельными суммами (согласно графику). Процесс индивидуальный для каждого проекта. Работа над каждым этапом начинается только после внесения 100%-й оплаты за него. </p>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </section>

    <section class="id_b17 st_b18 press_b10 brb_b17">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/id_b17_vid.mp4" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Пора начать выгодное<br> и надежное<br> сотрудничество!</div>
          <p class="st_opis">Получить бесплатную консультацию<br> Наш телефон:   <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a> <br>
            или закажите обратный звонок.</p>
        </div>
        <div class="st_form_bx">
          <a class="sbm sbm-2 " href="#form" data-fancybox data-text= "Получить бесплатную консультацию - Айдентика" type="submit">ЗАКАЗАТЬ ЗВОНОК</a>
        </div>
      </div>
    </section>
     <section class="poleznaya">
        <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
             <p><a href="/blog/chto-takoe-ajdentika-i-pochemu-ona-vazhna-dlya-brenda/">Что такое айдентика и почему она важна для бренда?</a></p>
      </div>
    </section>
  </main>








  <script type="application/ld+json">






{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Заказать айдентику бренда",
  "image": "/bitrix/templates/veonix/assets/img/old/identity/b2_img.png",
 "description": "Разработаем фирменную айдентику, которая выделит вас среди конкурентов, подчеркнет стиль и покажет характер компании",
 "offers": {
 "@type": "Offer",
 "url": "/brand-identity/",
 "priceCurrency": "RUB",
 "price": "49000",
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



</div>










<? $APPLICATION->IncludeComponent(
	"veonix:form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_1" => "",
		"TITLE_2" => "",
		"TITLE_3" => "",
		"TYPE" => "text",
		"TYPE_TEXT" => "  Айдентика, Логотип, Брендбук, Дизайн упаковки, Нейминг, Фирменный стиль, Гайдбук, Разработка слогана, Другое"
	),
	false
);?>

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
                        "PARENT_SECTION" => "12",
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