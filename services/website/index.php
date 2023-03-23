<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Создание эксклюзивных веб-сайтов с уникальным дизайном под заказ. Разработка структуры, наполнения и функционала портала/лендинга для решения бизнес задач.");
$APPLICATION->SetPageProperty("title", "Заказать сайт в Москве — veonix.ru");
 
 
$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Заказать веб-сайт").


$APPLICATION->SetTitle("Создание профессиональных сайтов для бизнеса");
?>

<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => " Разработка сайтов <br>класса  ",
		"TEMPLATE_FOR_TITLE2" => "Ultima",
		"TEMPLATE_FOR_TITLE3" => "",
		"TEXT_1" => "Создать просто сайт — мало",
		"TEXT_1_GR" => "",
		"TEXT_2" => "Создать лучший сайт —",
		"TEXT_2_GR" => "бесценно",
    "BT_TEXT" => "Обсудить задачу",

	),
	false
);?>

 
  <section class="list_logo">
    <div class="main">
      <div class="list_logo_box">
        <p class="list_logo_box_text">В нашем портфолио — сотни <br>кейсов для известных российских <br>и международных брендов</p>
        <div class="list_logo_box_block">
          <div class="list_logo_box_line">
            <div class="list_logo_box_item"><img class="lazy list_logo_1" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/1.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_2" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/2.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_3" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/3.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_4" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/4.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_5" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/5.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/6.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/07.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_8.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_9.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_10.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_11.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_12.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_13.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_14.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_15.png" alt="Veonix"></div>
           

          </div>
          <div class="list_logo_box_line">
            <div class="list_logo_box_item"><img class="lazy list_logo_7" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/7.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_8" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/8.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_9" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/9.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_10" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/10.png" alt="Veonix"></div>            
            <div class="list_logo_box_item"><img class="lazy list_logo_2" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/08.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_16.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_17.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_18.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_19.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_20.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_21.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_22.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_23.png" alt="Veonix"></div>


          </div>
          <div class="list_logo_box_line">
            <div class="list_logo_box_item"><img class="lazy list_logo_11" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/11.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_12" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/12.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_13" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/13.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_14" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/14.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_15" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/15.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_24.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_25.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_26.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_27.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_28.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_29.png" alt="Veonix"></div>
            <div class="list_logo_box_item"><img class="lazy list_logo_6" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo/_30.png" alt="Veonix"></div>



          </div>
        </div>
      </div>
      <div class="list_logo_team">
        <p class="list_logo_box_text">Но мы сознательно остаемся небольшой <br>профессиональной семьей с одной общей <br>задачей — создавать лучшие сайты</p>
        <div class="list_logo_team_list">
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/1.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/2.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/3.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/4.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/5.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/6.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/7.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/8.png"></div>
          <div class="list_logo_team__item lazy wow animate__animated" data-wow="fadeInRight" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/team/mini/9.png"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="portfolio_block">
    <div class="main">
      <div class="portfolio_list">
      <div class="portfolio_list_item wow animate__animated" data-wow="fadeInUp">
          <div class="portfolio_list_item_image">              
              <a href="/portfolio/websites/simplex/" class="portfolio_list_item_more">
                <i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon_eyes.svg" width="22" height="16" alt="icon"></i>
                <span><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/case_text.svg" width="130" height="130" alt="icon"></span>
              </a>
              <div class="portfolio_list_item_image_bg lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/min/1.jpg">
                <a href="/portfolio/websites/simplex/"   >
                  <picture>
                    <!-- <source type="image/webp" data-srcset="." /> -->
                    <img alt="A lazy image" class="lazy" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/1.jpg" />
                  </picture>
                </a>
                <div class="portfolio_list_item_image_arrow"></div>
              </div>              
          </div>
          <div class="portfolio_list_item_info">
            <div class="portfolio_list_item_info_text">
              <a href="/portfolio/websites/simplex/" class="portfolio_list_item_title">Симплекс <i class="icon_new lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/new_bg.jpg"></i></a>
              <p>Разработка лендинга для логистической компании</p>
            </div>
          </div>
        </div>
    
        <div class="portfolio_list_item wow animate__animated" data-wow="fadeInUp">
          <div class="portfolio_list_item_image">              
              <a  href="#" class="portfolio_list_item_more">
                <i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon_eyes.svg" width="22" height="16" alt="icon"></i>
                <span><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/case_text.svg" width="130" height="130" alt="icon"></span>
              </a>
              <div class="portfolio_list_item_image_bg lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/min/2.jpg">
                <a  href="#" >
                  <picture>
                    <!-- <source type="image/webp" data-srcset="." /> -->
                    <img alt="A lazy image" class="lazy" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/2.jpg" />
                  </picture>
                </a>
                <div class="portfolio_list_item_image_arrow"></div>
              </div>              
          </div>
          <div class="portfolio_list_item_info">
            <div class="portfolio_list_item_info_text">
              <a href="#" class="portfolio_list_item_title">Булатово <i class="icon_new lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/new_bg.jpg"></i></a>
              <p>Разработка многостраничного сайта для поселка бизнес-класса</p>
            </div>
          </div>
        </div>

        <div class="portfolio_list_item wow animate__animated" data-wow="fadeInUp">
          <div class="portfolio_list_item_image">              
              <a href="/portfolio/websites/shemberg/"   class="portfolio_list_item_more">
                <i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon_eyes.svg" width="22" height="16" alt="icon"></i>
                <span><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/case_text.svg" width="130" height="130" alt="icon"></span>
              </a>
              <div class="portfolio_list_item_image_bg lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/min/3.jpg">
                <a  href="/portfolio/websites/shemberg/"  >
                  <picture>
                    <!-- <source type="image/webp" data-srcset="." /> -->
                    <img alt="A lazy image" class="lazy" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/3.jpg" />
                  </picture>
                </a>
                <div class="portfolio_list_item_image_arrow portfolio_list_item_image_arrow_black"></div>
              </div>              
          </div>
          <div class="portfolio_list_item_info">
            <div class="portfolio_list_item_info_text">
              <a hhref="/portfolio/websites/shemberg/"  class="portfolio_list_item_title">Shemberg <i class="icon_new lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/new_bg.jpg"></i></a>
              <p>Разработка многостраничного <br>сайта для строительной компании</p>
            </div>
          </div>
        </div>

        <div class="portfolio_list_item wow animate__animated" data-wow="fadeInUp">
          <div class="portfolio_list_item_image">              
              <a href="/portfolio/websites/sozdaniya-sajta-dlya-stroitelnoj-kompanii-doma-loft/"  class="portfolio_list_item_more">
                <i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon_eyes.svg" width="22" height="16" alt="icon"></i>
                <span><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/case_text.svg" width="130" height="130" alt="icon"></span>
              </a>
              <div class="portfolio_list_item_image_bg lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/min/4.jpg">
                <a href="/portfolio/websites/sozdaniya-sajta-dlya-stroitelnoj-kompanii-doma-loft/" >
                  <picture>
                    <!-- <source type="image/webp" data-srcset="." /> -->
                    <img alt="A lazy image" class="lazy" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/4.jpg" />
                  </picture>
                </a>
                <div class="portfolio_list_item_image_arrow"></div>
              </div>              
          </div>
          <div class="portfolio_list_item_info">
            <div class="portfolio_list_item_info_text">
              <a href="/portfolio/websites/sozdaniya-sajta-dlya-stroitelnoj-kompanii-doma-loft/" class="portfolio_list_item_title">Doma Loft </a>
              <p>Разработка многостраничного <br>сайта для строительной компании</p>
            </div>
          </div>
        </div>
        <div class="portfolio_list_item wow animate__animated" data-wow="fadeInUp">
          <div class="portfolio_list_item_image">              
              <a href="/portfolio/websites/sozdanie-sajta-i-logotipa-dlya-aukciona-retro-avtomobilej-exclusive-impex/" class="portfolio_list_item_more">
                <i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon_eyes.svg" width="22" height="16" alt="icon"></i>
                <span><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/case_text.svg" width="130" height="130" alt="icon"></span>
              </a>
              <div class="portfolio_list_item_image_bg lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/min/5.jpg">
                <a href="/portfolio/websites/sozdanie-sajta-i-logotipa-dlya-aukciona-retro-avtomobilej-exclusive-impex/">
                  <picture>
                    <!-- <source type="image/webp" data-srcset="." /> -->
                    <img alt="A lazy image" class="lazy" data-srcset="<?=SITE_TEMPLATE_PATH?>/assets/img/portfolio/5.jpg" />
                  </picture>
                </a>
                <div class="portfolio_list_item_image_arrow"></div>
              </div>              
          </div>
          <div class="portfolio_list_item_info">
            <div class="portfolio_list_item_info_text">
              <a href="/portfolio/websites/sozdanie-sajta-i-logotipa-dlya-aukciona-retro-avtomobilej-exclusive-impex/" class="portfolio_list_item_title">Exclusive Impex</a>
              <p>Разработка логотипа <br>и многостраничного сайта</p>
            </div>
          </div>
        </div>
      </div>
      <div class="bt_black_bg">
        <a href="/portfolio/websites/">
          <span>Показать еще</span>
          <i></i>
        </a>
      </div>
    </div>
  </section>
  <section class="web_garantia">
    <div class="main">
      <h2 class="web_garantia_title">
        <b class="lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/garant_bg.jpg">Пожизненная <i></i></b>
        гарантия на сайт
      </h2>
      <p class="web_garantia_text">Если что-то сломается, даже через много <br> лет, то мы все исправим за наш счет.</p>
      <div class="web_garantia_box">
        <div class="web_garantia__item"><i></i><p>Сайт будет работать <br>долгие годы</p></div>
        <div class="web_garantia__item"><i></i><p>Заключаем официальный <br>договор с NDA</p></div>
        <div class="web_garantia__item"><i></i><p>Подписываем SLA <br>технической поддержки</p></div>
      </div>
    </div>
  </section>
  <section class="web_goal">
    <div class="main">
      <h2 class="web_goal_title">
        <b class="lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/goal_bg.jpg">Наша цель:</b>
        делать лучшие <br>сайты в рунете
      </h2>
      <div class="web_goal_text">
        <p>У нас работают лучшие дизайнеры из <span><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/web_goal_sber.png" alt="Sber"></span>, <span><img  src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/web_goal_ya.png" alt="Yandex"></span> , <span><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/web_goal_sklbox.png" alt="Skillbox"></span> и топовых агентств. </p>
        <p>Мы вкладываемся в результат, а не в рекламу, поэтому вы гарантированно получаете сайт уровня топовых студий, но по цене в десятки раз ниже.</p>
      </div>
    </div>
  </section>
  <section class="web_line_radion">
    <div class="web_line lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/line_bg_min.jpg?1">
      <div class="web_line_text lazy" >
        <p><span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span> <i></i> <span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span><i></i></p>
        <p><span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span> <i></i> <span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span><i></i></p>
        <p><span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span> <i></i> <span>Вернем деньги и отдадим наработанные материалы, если что-то пойдет не так </span><i></i></p>
      </div>
    </div>
  </section>
  <section class="web_step">
    <div class="main">
      <h2 class="web_step_title">
        <b class="lazy anim_title" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_bg.jpg">5 простых шагов</b> <br>
        к трансформации <br>вашего бизнеса
      </h2>
      <div class="web_step_box">
        <button class="drag_bt"><span>ТЯНИ</span></button>
        <div class="web_step_box_slider anim_slider splide">
          <div class="splide__track">
          <div class="splide__list">
              <div class="splide__slide">
                <div class="web_step_item">
                  <div class="web_step_top"><i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_icon_1.png" width="31" height="31" alt="icon"></i><span>01</span></div>
                  <div class="web_step_text">
                    <p class="web_step_item_title">Аналитика </p>
                    <p class="web_step_item_text">Изучаем рынок, тренды в индустрии, аудиторию и конкурентов</p>
                  </div>
                </div>
              </div>
              <div class="splide__slide">
                <div class="web_step_item">
                  <div class="web_step_top"><i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_icon_2.png" width="31" height="31" alt="icon"></i><span>02</span></div>
                  <div class="web_step_text">
                    <p class="web_step_item_title">Прототипирование </p>
                    <p class="web_step_item_text">Проектируем лучшие решения на основе глубокой аналитики и копирайтинга</p>
                  </div>
                </div>
              </div>
              <div class="splide__slide">
                <div class="web_step_item">
                  <div class="web_step_top"><i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_icon_3.svg" width="31" height="31" alt="icon"></i><span>03</span></div>
                  <div class="web_step_text">
                    <p class="web_step_item_title">Дизайн </p>
                    <p class="web_step_item_text">Создаем осознанный дизайн с впеча<span>-</span><br>тляющей анимацией и интерактивом</p>
                  </div>
                </div>
              </div>
              <div class="splide__slide">
                <div class="web_step_item">
                  <div class="web_step_top"><i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_icon_4.png" width="31" height="31" alt="icon"></i><span>04</span></div>
                  <div class="web_step_text">
                    <p class="web_step_item_title">Разработка  </p>
                    <p class="web_step_item_text">Фронтенд и бэкенд на чистом коде без использования конструкторов</p>
                  </div>
                </div>
              </div>
              <div class="splide__slide">
                <div class="web_step_item">
                  <div class="web_step_top"><i><img class="lazy" data-src="<?=SITE_TEMPLATE_PATH?>/assets/img/home/step_icon_5.svg" width="31" height="31" alt="icon"></i><span>05</span></div>
                  <div class="web_step_text">
                    <p class="web_step_item_title">A/B-тестирование  </p>
                    <p class="web_step_item_text">Комплекс работ для достижения высоких конверсионных показателей</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>       
        
      </div>
    </div>
  </section>
  <section class="web_principles">
    <div class="main">
      <h2 class="web_principles_title">Наши принципы</h2>
      <div class="web_principles_box">
        <div class="web_principles_item">
          <div class="web_principles_line"><i></i></div>
          <div class="web_principles_item_box">
            <div class="web_principles_item_number">01</div>
            <div class="web_principles_item_content">
              <p class="web_principles_item_title">Абсолютное доверие</p>
              <p class="web_principles_item_text">Безоговорочно следуем договоренностям</p>
            </div>
          </div>
          <div class="web_principles_line"><i></i></div>
        </div>
        <div class="web_principles_item">
          <div class="web_principles_line"><i></i></div>
          <div class="web_principles_item_box">
            <div class="web_principles_item_number">02</div>
            <div class="web_principles_item_content">
              <p class="web_principles_item_title">Гарантия результата</p>
              <p class="web_principles_item_text">Не даем напрасных обещаний</p>
            </div>
          </div>
          <div class="web_principles_line"><i></i></div>
        </div>
        <div class="web_principles_item">
          <div class="web_principles_line"><i></i></div>
          <div class="web_principles_item_box">
            <div class="web_principles_item_number">03</div>
            <div class="web_principles_item_content">
              <p class="web_principles_item_title">Ценность времени</p>
              <p class="web_principles_item_text">Оперативно работаем над правками  <br>и строго выдерживаем установленные сроки</p>
            </div>
          </div>
          <div class="web_principles_line"><i></i></div>
        </div>
        <div class="web_principles_item">
          <div class="web_principles_line"><i></i></div>
          <div class="web_principles_item_box">
            <div class="web_principles_item_number">04</div>
            <div class="web_principles_item_content">
              <p class="web_principles_item_title">никаких рисков</p>
              <p class="web_principles_item_text"> Вернем деньги и отдадим наработанные <br>материалы, если что-то пойдет не так</p>
            </div>
          </div>
          <div class="web_principles_line"><i></i></div>
        </div>
      </div>
    </div>
  </section>
  <section class="web_onewave">
    <div class="main">
      <div class="web_onewave_box">
        <h2 class="web_onewave_title">On the <br>one wave</h2>
        <p class="web_onewave_p">
          Мы слышим вас и понимаем, говорим с вами на одном языке — <span>языке бизнеса</span>. Такой подход позволяет создавать сайты быстро и без бесконечных правок.
        </p>
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
		"TITLE_3" => "сайт",
		"TYPE" => "website",
		"TYPE_TEXT" => " "
	),
	false
);?>
 


  <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>