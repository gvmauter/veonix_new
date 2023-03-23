<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Студия Veonix разработает дизайн Press Wall под ключ. Стоимость – 10 000 руб. Создание креативного дизайна пресс воллов, монтаж и установка мобильных стендов.");
$APPLICATION->SetPageProperty("title", "Заказать дизайн пресс волла в Москве в студии Veonix — стоимость 10 000 рублей");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн прессвола");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");    

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/pressWall.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "",
		"TEMPLATE_FOR_TITLE2" => "Прессвол дизайн",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Сделаем дизайн, напечатаем и подберем идеальную модель пресс волла для любых мероприятий",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

 
  
<main class="press_page old_page">
    <section class="press_b1">
      <div class="main">
        <div class="press_b1_box_1">
          <h2 class="press_b1_zg"><span>Дизайн</span> пресс волла <br>работает на имидж</h2>
          <div class="press_b1_box_1_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b1_img_1.jpg" width="452" height="361" alt="Дизайн пресс волла"></div>
        </div>
        <div class="press_b1_box_2">
          <div class="press_b1_box_2_text1">
            <p>Пресс вол не имеет себе равных среди инструментов для презентаций <br>
              и выставок. Благодаря большой площади рекламного полотна аудитория просто не сможет пройти мимо вашего рекламного послания. Это настоящая информационная стена, которая масштабно демонстрирует преимущества бренда, товара или услуги. </p>
            <p>В активе студии Veonix разработка дизайна пресс волла для многих компаний. Наши проекты всегда эффективно работают на продвижение бизнеса. Потому, что они успешно сочетают яркий и креативный дизайн, точный маркетинговый расчет и умение донести до покупателя ваше уникальное предложение. </p>
            <div class="press_b1_box_2__img">
              <div class="press_b1_box_2__im1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b1_img_2.jpg" width="362" height="256" alt="Дизайн пресс волла"></div>
              <div class="press_b1_box_2__im2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b1_img_3.jpg" width="251" height="251" alt="Дизайн пресс волла"></div>
            </div>
          </div>
          <div class="press_b1_box_2_text2">
            <p><span class="b">Привлекают интерес</span> <br>
              Яркий и впечатляющий дизайн стенда пресс волла повышает интерес  
              к вашему бренду или товару.</p>
            <p><span class="b">Эффектно презентуют</span> <br> 
              Профессионально написанный продающий текст  доносит до покупателя основные выгоды и отстраивает конкурентов.
              </p>
            <p><span class="b">Быстро складываются</span> <br>
              Благодаря простой и  практичной системе стенд собирается  
              </p>
            <p><span class="b">Легко транспортируются</span> <br>
              Элементы конструкции легко упаковать <br>
              в небольшую сумку или чемодан <br>
              для переноски или перевозки.
              </p>
          </div>
        </div>
      </div>
    </section>
    <section class="press_b2">
      <div class="main">
        <h2 class="press_zg">Выберите модель <br>стенда пресс волл</h2>

        <div class="press_b2_main">
          <div class="press_b2_item press_b2__1">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg"><span>Press Wall</span><span class="b">Модель №1</span></h3>
                <p>Классическая конструкция <br>
                  из хромированной трубы <br>
                  и надежных соединителей. 
                </p>
                <div class="press_b2_price">
                  <p>от <span>9 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_1.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__2">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg"><span>Press Wall</span><span class="b">Модель №2</span></h3>
                <p>
                  Модель с хорошей жесткостью <br>
                  и устойчивостью позволяет изготавливать <br>
                  стенды больших размеров. <br>
                  Минимальный размер - 2х2м
                </p>
                <div class="press_b2_price">
                  <p>от <span>22 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_2.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__3">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg"><span>Press Wall</span><span class="b">Модель №3</span></h3>
                <p>
                  Баннер полностью закрывает конструкцию <br>
                  с лицевой стороны.  Стенд может применяться <br>
                  в помещении и на улице. <br>
                  Минимальный размер - 2х2м
                </p>
                <div class="press_b2_price">
                  <p>от <span>23 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_3.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__4">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg"><span>Press Wall</span><span class="b">Модель №4</span></h3>
                <p>
                  Модель повышенной прочности <br>
                  и устойчивости позволяет создавать конструкцию большой длины. <br>
                  Минимальный размер - 2х2м
                </p>
                <div class="press_b2_price">
                  <p>от <span>44 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_4.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__5">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Press Wall <br>из строганного <br>бруса, стандартный</span></h3>
                <p>
                  Стенд со скрытым каркасом <br>и галерейной натяжкой <br>полотна
                </p>
                <div class="press_b2_price">
                  <p>от <span>9 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_5.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__6">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Press Wall <br>из строганного <br>бруса, трехмерный</span></h3>
                <p>
                  Модель со скрытым <br> объемным деревянным <br>каркасом
                </p>
                <div class="press_b2_price">
                  <p>от <span>17 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_6.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__7">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Press Wall <br>из строганного бруса, <br>двусторонний</span></h3>
                <p>
                  Стенд с объемным скрытым деревянным <br>каркасом для двустороннего обзора
                </p>
                <div class="press_b2_price">
                  <p>от <span>22 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_7.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__8">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Стенд <br>Press Wall, <br>телескопический</span></h3>
                <p>
                  Возможность быстрого и эстетичного способа <br> монтажа через продольные карманы в верхней <br>и нижней части полотна. <br>
                  Размер - 3х2м
                </p>
                <div class="press_b2_price">
                  <p>от <span>7 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_8.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__9">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Тантамареска <br>на основании <br>системы Joker</span></h3>
                <p>
                  Конструкция для фотосъемки <br>
                  с отверстиями для лиц (рук или ног) <br>в баннерном полотне
                </p>
                <div class="press_b2_price">
                  <p>от <span>10 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_9.jpg" alt="Press Wall"></div>
            </div>
          </div>
          <div class="press_b2_item press_b2__10">
            <div class="press_b2_item_box">
              <div class="press_b2_item__text">
                <h3 class="press_b2_zg press_b2_zg_2"><span class="b">Тантамареска <br>из деревянного <br>бруса</span></h3>
                <p>
                  Конструкция для фотосъемки <br>
                  с отверстиями для лиц <br>
                  с полностью закрытым каркасом
                </p>
                <div class="press_b2_price">
                  <p>от <span>22 000</span> руб. </p>
                </div>
              </div>
              <div class="press_b2_item__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b2_img_10.jpg" alt="Press Wall"></div>
            </div>
          </div>
        </div>

        <div class="press_b2_info">
          <p>Все цены, кроме отдельных моделей, указаны для стендов размером 2х2 м. <br>Наличие других размеров уточняйте по телефону:</p>
          <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a>
        </div>


      </div>
    </section>
    <section class="press_b3">
      <div class="main">
        <div class="press_b3_box">
          <div class="press_b3__logo">
            <div class="press_b3__logo_main">
              <div class="press_b3__top"><img data-src="/bitrix/templates/veonix/assets/img/old/press/logo_text.svg" class="lazy" alt="text"></div>
              <div class="press_b3__center"><div class="press_b3__logos"></div></div>
              <div class="press_b3__bottom"><img src="/bitrix/templates/veonix/assets/img/old/press/logo_line.svg" class="svg_anim_1 svg_anim" style="display: none;" alt="line"></div>
            </div>
          </div>
          <div class="press_b3__text">
            <p class="press_b3_zg font_pd">
              <span class="b">Сколько стоит</span>
              разработка дизайна <br>пресс волла?
            </p>
            <div class="press_b3__text_bx">
              <p>Мы разработаем креативный <br>запоминающийся дизайн, который <br>полностью соответствует задачам стенда.</p>
              <div class="press_b2_price">
                <p>от <span>10 000</span> руб./макет</p>
              </div>
              <p>Вам необходимо заказать дизайн двух <br>и более макетов? В этом случае скидка <br>составит 20%.</p>
              <p>Мы работаем без шаблонов и создаем <br>только оригинальный дизайн. Все наши <br>макеты проходят проверку на антиплагиат</p>
              <div class="press_b2_price">
                <p><span>2x - 20%</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="press_b4">
      <div class="main">
        <div class="press_b4_zg">
          <h2 class="press_b4_h2 font_pd">Печать <br>пресс волла</h2>
          <div class="press_b4_zg_tx">
            <p>Мы выполняем не только профессиональный дизайн пресс волла, <br>
              но и качественную широкоформатную и интерьерную печать пресс волла на полотне из баннерной ткани. При необходимости <br>
              вы сможете много раз использовать одну и ту же конструкцию, просто заменяя полотно с изображением.
            </p>
            <p><span class="b">Мы делаем печать пресс волла на следующих материалах:</span></p>
          </div>
        </div>
        <div class="press_b4_main">
          <div class="press_b4__item press_b4__item_1">
            <p class="press_b4__t1 font_pd">Баннерная ткань</p>
            <div class="press_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b4_img_1.jpg" alt="Баннерная ткань"></div>
            <div class="press_b4_price font_pd"><p>от <span>4 000</span> руб.</p></div>
          </div>
          <div class="press_b4__item press_b4__item_2">
            <div class="press_b4__item_anim"><img src="/bitrix/templates/veonix/assets/img/old/press/svg_element.svg" class="svg_anim_2 svg_anim"  alt="svg element"></div>
            <p class="press_b4__t1 font_pd">Полипропилен</p>
            <div class="press_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b4_img_2.jpg" alt="Баннерная ткань"></div>
            <div class="press_b4_price font_pd"><p>от <span>6 000</span> руб.</p></div>
          </div>
          <div class="press_b4__item press_b4__item_3">
            <p class="press_b4__t1 font_pd">Фотобумага <br>с ламинацией</p>
            <div class="press_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b4_img_3.jpg" alt="Баннерная ткань"></div>
            <div class="press_b4_price font_pd"><p>от <span>10 000</span> руб.</p></div>
          </div>
        </div>
        <div class="press_b4_footer">
          <p class="press_b4_footer_t1 font_pd">Цена указана за печать пресс <br> волла с полотном 2х2 м.</p>
          <p class="press_b4_footer_t2 font_pd">Доставка пресс волла</p>
          <p class="press_b4_footer_t3">При заказе пресс волла под ключ (дизайн, печать и конструкция с монтажом) доставка курьерской службой по Москве производится бесплатно.</p>
        </div>
      </div>
    </section>
    <section class="press_b5">
      <div class="main">
        <div class="press_b5_zg">
          <h2 class="press_zg">Предоставляем <br>гарантии</h2>
          <div class="press_b5_line">
            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M26.8124 17.7182C22.8818 15.4096 18.336 14.0577 13.5057 13.9933C13.5701 18.8231 14.9218 23.3686 17.23 27.2989C15.0252 31.1694 13.7939 35.6811 13.8583 40.5116C18.689 40.576 23.2007 39.3447 27.0713 37.1398C31.0014 39.4476 35.5464 40.799 40.3758 40.8634C40.3114 36.0336 38.9597 31.4881 36.6516 27.5578C38.8551 23.6881 40.0856 19.1777 40.0213 14.3487C35.1923 14.2843 30.6821 15.5147 26.8124 17.7182Z" fill="#B6985E"/>
              </svg>                                 
          </div>
        </div>
        <div class="press_b5_box">
          <div class="press_b5__lf">
            <div class="press_b5__lf_top"><img src="/bitrix/templates/veonix/assets/img/old/press/b5_svg.svg" class="svg_anim_3 svg_anim" alt=""></div>
            <div class="press_b5__lf_center"></div>
            <div class="press_b5__lf_bottom"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b5_img.png" width="557" height="285"  alt="Гарантия"></div>
          </div>
          <div class="press_b5__rg">
            <p><span class="b">100% возврат денег,</span> <br>если результат не устраивает</p>
            <p><span class="b">Заключение договора</span> <br>Надежно закрепляем свои обязательства <br> перед заказчиком. </p>
            <p><span class="b">Оплата просрочки</span> <br>Выплачиваем неустойку за каждый <br>день задержки в работе </p>
            <p><span class="b">Работа без предоплаты</span> <br>Мы ценим своих постоянных клиентов и готовы начать работу над проектом без авансового платежа.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="st_b15 press_b6">
      <div class="main">
        <p class="st_b15_zg">Наши заказчики</p>
        <h2>Крупнейшие компании</h2>
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
    <section class="press_b7">
      <div class="main">
        <h2 class="press_b7_zg font_pd"><span>Разрабатываем пресс волл <br>по правилам маркетинга</span></h2>
        <div class="press_b7_bx">
          <div class="press_b7_lf">
            <p>Сегодня пресс волл используется для участия в самых разнообразных мероприятиях: выставках, конференциях, презентациях. Нередко на фоне баннера проходит запись интервью или фотосессия медиа-персон. Поэтому качественный дизайн стенда press wall имеет первостепенное значение для его эффективности.</p>
            <p>Начиная работу, наша команда четко очерчивает задачу, определяет целевую аудиторию и создает концепцию, выразителем которой станет рекламный стенд. Каждый пресс волл, который создается в студии Veonix – это яркая визитка вашего бренда, продукта или услуги.</p>
          </div>
          <div class="press_b7_rg">
            <div class="press_b7__it"> <p><span class="b">Стильный вид.</span>  <br>
                Стенд пресс волл  
                с ярким, современным 
                и запоминающимся дизайном работает 
                на имидж вашей компании.
              </p>
            </div>
            <div class="press_b7__it">
              <p><span class="b">Высокая   информативность.</span> <br>
                Большая площадь <br> рекламного баннера <br> помогает легко разместить <br> необходимую информацию.
              </p>
            </div>
            <div class="press_b7__it">
              <p><span class="b">Мобильность.</span>
                Компактная конструкция <br> пресс волла делает<br>
                вас готовым к любой <br> презентации, где бы она <br>
                ни проводилась.
              </p>
            </div>
            <div class="press_b7__it">
              <p><span class="b">Долговечность.</span> <br>
                Конструкция стенда <br>
                не ограничивает сроки <br>
                его использования. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="press_b8">
      <div class="main">
        <h2 class="press_zg">6 шагов к получению <br>классного пресс вола</h2>
        <div class="press_b8_box press_b8_box_1">
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Заявка</span> <i>01</i></p>
            <p class="press_b8_t2">Оставьте заявку или позвоните. Наш менеджер уточнит  все детали заказа.</p>
          </div>
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Договор</span> <i>02</i></p>
            <p class="press_b8_t2">заключаем договор. <br> Согласуем стоимость, <br> сроки и ваши гарантии.</p>
          </div>
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Маркетинг</span> <i>03</i></p>
            <p class="press_b8_t2">Маркетинговый разбор. Стратегия <br>и продвижения идеи, которую реализует дизайн пресс волла.</p>
          </div>
          <div class="press_b8_box_anim"><img src="/bitrix/templates/veonix/assets/img/old/press/b8_line.svg" class="svg_anim_4 svg_anim"></div>
        </div>
        <div class="press_b8_box press_b8_box_2">
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Бриф</span> <i>04</i></p>
            <p class="press_b8_t2">Заполнение брифа. По вашим ответам мы сформируем предварительный образ. </p>
          </div>
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Дизайн</span> <i>05</i></p>
            <p class="press_b8_t2">Создание дизайна.  Представляем вам готовый эскиз и тексты для пресс волла. </p>
          </div>
          <div class="press_b8__item">
            <p class="press_b8_t1 font_pd"><span>Печать и доставка</span> <i>06</i></p>
            <p class="press_b8_t2">Отпечатываем баннерное <br>полотно и отправляем <br>готовый стенд заказчику. </p>
          </div>
          <div class="press_b8_box_anim"><img src="/bitrix/templates/veonix/assets/img/old/press/b8_line.svg" class="svg_anim_5 svg_anim"></div>
        </div>
        <div class="press_b8_svg">
          <div class="press_b8_svg_1"><img src="/bitrix/templates/veonix/assets/img/old/press/b8_svg.svg" class="press_b8_svg_1_s svg_anim" alt="svg"></div>
          <div class="press_b8_svg_2"><img src="/bitrix/templates/veonix/assets/img/old/press/b8_svg.svg" class="press_b8_svg_2_s svg_anim" alt="svg"></div>
        </div>
      </div>
    </section>
    <section class="press_b9">
      <div class="main">
        <h2 class="press_zg">Доверьте дизайн стенда <br>пресс волла специалистам</h2>
        <div class="press_b9_box">
          <div class="press_b9__lf">
            <div class="press_b9__lf_1">
              <video class="box_video lazy box" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b4_it1_3.mp4" type="video/mp4">
              </video>
            </div>
            <div class="press_b9__lf_2"><div class="press_b9__lf_2_box"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b9_img_1.jpg" alt="Press Wall Design"></div><p>Press Wall Design</p></div>
            <div class="press_b9__lf_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/press/b9_img_2.jpg" alt="Press Wall Design"></div>
          </div>
          <div class="press_b9__rg">
            <p> Создание эффективного пресс волла – ответственная задача. Только продуманная концепция, креативная графика и легкий структурированный текст работают <br>
            на достижение результата. А значит, вы получите мощный инструмент для привлечения новых клиентов и партнеров. </p>
            <p>Наши приоритет — высокое качество работы и полная отдача в каждом проекте. Больше половины заказчиков становятся постоянными клиентами и доверяют нам 
              самые сложные задачи.</p> 
          </div>
        </div>
      </div>
    </section>
    </main>
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
  <section class="st_b18 press_b10">
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
          <h2 class="h2">Закажите дизайн <br>стенда press wall </h2>
          <p class="st_opis"> мы выполним работу так, что вам <br> захочется вернуться!</p>
        </div>
        <div class="st_form_bx">
          <div class="st_form">
            <a class="sbm sbm-2 " href="#order" data-fancybox data-text = "Конец страницы - Вам нужна разработка фирменного стиля?  - PressWall" >ЗАКАЗАТЬ ЗВОНОК</a>
          </div>
        </div>
      </div>
    </section>
  </div>
  




<script type="application/ld+json">






{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Дизайн press wall",
  "image": "https://veonix.ru/bitrix/templates/veonix/assets/img/old/firm_style/b6_img.png",
 "description": "Сделаем дизайн, напечатаем и подберем идеальную модель пресс волла для любых мероприятий",
 "offers": {
 "@type": "Offer",
 "url": "https://veonix.ru/press-wall/",
 "priceCurrency": "RUB",
 "price": "9000",
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

<section class="poleznaya">
    <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
        <p><a href="https://veonix.ru/blog/osnovnye-professionalnye-terminy-v-graficheskom-dizajne/">Основные профессиональные термины в графическом дизайне</a></p>
        <p><a href="https://veonix.ru/blog/kak-rabotat-s-dizajnerami/">Как работать с дизайнерами</a></p>
        <p><a href="https://veonix.ru/blog/kakim-principam-nuzhno-sledovat-pri-razrabotke-dizajna/">Каким принципам нужно следовать при разработке дизайна?</a></p>
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
       "TYPE_TEXT" => "Прессвол, Годовой отчет, Коммерческое предложение, Визитка, Листовка,  Каталог, Буклет, Брошюра, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>