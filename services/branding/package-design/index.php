<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Создание дизайна упаковки для товаров на заказ под ключ: анализ сегмента рынка, основных потребителей, конкурентов; разработка концепции. Изготовление дизайна упаковок, этикеток, тары и бутылок – от 1 дня.");
$APPLICATION->SetPageProperty("title", "Дизайн упаковки в Москве — разработка в студии Veonix по цене 50 000 рублей");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Брендинг","/branding/");
$APPLICATION->AddChainItem("Дизайн упаковки");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/packPage.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "",
		"TEMPLATE_FOR_TITLE2" => "Дизайн упаковки",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создадим эксклюзивный дизайн упаковки, который завоюет сердца потребителей и вытеснит с полок конкурентов",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>



<div class="old_page">
<main class="pack_page">
    
    <section class="pack_b1">
      <div class="main">
        <div class="pack_b1_box">
          <div class="pack_b1__left">
            <h2 class="pack_zg">Какой дизайн упаковок <br>и этикеток мы делаем</h2>
            <p>Сегодня магазины вмещают в одном пространстве огромный ассортимент товаров, среди которых именно ваш должен привлечь внимание потребителя.</p>
            <p>В студии VEONIX способны продумать концепцию дизайна упаковки для широкого спектра товаров:</p>
          </div>
          <div class="pack_b1__right">
            <div class="pack_b1_box_img">
              <img data-src="/bitrix/templates/veonix/assets/img/old/pack/b1_img_1.png" class="pk_b1_img_1 lazy" width="385" height="385" alt="Дизайн упаковок">
              <img data-src="/bitrix/templates/veonix/assets/img/old/pack/b1_img_2.png" class="pk_b1_img_2 lazy" width="707" height="521" alt="Дизайн упаковок">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b2">
      <div class="main">
        <div class="pack_b2_box">
          <div class="pack_b2__left">
            <div class="pack_b2__img">
              <div class="pack_b2__img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b2_img_1.png" width="493" height="254" alt="Дизайн упаковки"></div>
              <div class="pack_b2__img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b2_img_2.png" width="486" height="234" alt="Дизайн упаковки"></div>
            </div>
          </div>
          <div class="pack_b2__right">
            <div class="pack_zg">Продукты питания</div>
            <p>Самая обширная позиция товаров с высочайшим уровнем конкуренции. Потребитель об этом даже <br>
              не задумывается. Он просто берет с полки продукт, <br>
              не похожий на другие. А для этого в дизайне нужно продумать все: от формы и цвета до декоративных деталей и их расположения.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b3">
      <div class="main">
        <div class="pack_b3_box">
          <div class="pack_b3__left">
            <div class="pack_content color_white">
              <div class="pack_zg">Молоко и соки</div>
              <p>Упаковка этих товаров должна сохранять свойства продукта, быть удобна в использовании <br>
                и привлекать визуально. Органично совмещаем  <br>
                в дизайне упаковки информацию о продукте  <br>
                и элементы оформления для лучшей коммуникации с потребителем.
              </p>
            </div>
          </div>
          <div class="pack_b3__right">
            <div class="pack_b3__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b3_img.png" width="914" height="446" alt="Дизайн упаковок"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b4">
      <div class="main">
        <div class="pack_b4_box">
          <div class="pack_b4__left"><div class="pack_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b4_img.png" width="469" height="628" alt="Дизайн упаковок"></div></div>
          <div class="pack_b4__right">
            <div class="pack_content">
              <div class="pack_zg">Алкогольная продукция</div>
              <p>Среди многих похожих форм, необходимо захватить внимание покупателя грамотным дизайном этикетки на бутылку.</p>
              <p>Наши специалисты создадут подходящую концепцию оформления этикетки, в которой передадут всю пользу и преимущества продукта.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b3 pack_b5">
      <div class="main">
        <div class="pack_b3_box">
          <div class="pack_b3__left">
            <div class="pack_content color_white">
              <div class="pack_zg">Чай и кофе</div>
              <p>Для подобных товаров интересный, выделяющийся дизайн упаковки <br>
                и необычный силуэт очень важны, чтобы правильно передать идею марки, отличительные свойства <br>
                и, в какой-то степени, даже аромат!</p>
            </div>
          </div>
          <div class="pack_b3__right">
            <div class="pack_b3__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b5_img.png" width="645" height="661" alt="Дизайн упаковок"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b4 pack_b6">
      <div class="main">
        <div class="pack_b4_box">
          <div class="pack_b4__left"><div class="pack_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b6_img.png" width="1002" height="447" alt="Дизайн упаковок"></div></div>
          <div class="pack_b4__right">
            <div class="pack_content">
              <div class="pack_zg">Косметика</div>
              <p>Учитывая основную аудиторию потребителей <br>
                в этом сегменте, вопрос необходимости особенного дизайна отпадает сам собой.</p>
              <p>Лишь профессионалам под силу создать эксклюзивный дизайн упаковки подобных товаров и, что немаловажно, атмосферу; рассказать о статусности.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b3 pack_b7">
      <div class="main">
        <div class="pack_b3_box">
          <div class="pack_b3__left">
            <div class="pack_content color_white">
              <div class="pack_zg">Бытовая химия</div>
              <p>И среди средств для уборки перед домохозяйками уже стоит проблема выбора.</p>
              <p>Наш дизайн поможет им развеять сомнения и взять с полки именно ваш продукт.</p>
            </div>
          </div>
          <div class="pack_b3__right">
            <div class="pack_b3__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b7_img.png" width="716" height="465" alt="Дизайн упаковок"></div>
            <div class="pack_b7_bg"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b4 pack_b8">
      <div class="main">
        <div class="pack_b4_box">
          <div class="pack_b4__left"><div class="pack_b4__img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b8_img.png" width="508" height="416" alt="Дизайн упаковок"></div></div>
          <div class="pack_b4__right">
            <div class="pack_content">
              <div class="pack_zg">Хозяйственные товары</div>
              <p>В этом случае подход к выбору товара более практичный, Поэтому дизайн упаковки должен громко говорить <br>о качестве, надежности и гарантии длительного использования.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b3 pack_b9">
      <div class="main">
        <div class="pack_b3_box">
          <div class="pack_b3__left">
            <div class="pack_content color_white">
              <div class="pack_zg">Лекарства</div>
              <p>И эти товары являются элементом сферы продаж <br>и конкурентной среды, поэтому в дизайне упаковки медикаментов нужно найти тонкую грань между трансляцией пользы компонентов и внешним отличием от аналогов.</p>
            </div>
          </div>
          <div class="pack_b3__right">
            <div class="pack_b3__img">
              <img class="lazy pk_b9_img_1" data-src="/bitrix/templates/veonix/assets/img/old/pack/b9_img_1.png" width="228" height="438" alt="Дизайн упаковок">
              <img class="lazy pk_b9_img_2" data-src="/bitrix/templates/veonix/assets/img/old/pack/b9_img_2.png" width="365" height="365" alt="Дизайн упаковок">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b12">
      <div class="main">
        <div class="pack_b12_box">
          <div class="pack_b12__left">
            <h2 class="pack_zg">Сколько стоит <span>дизайн упаковки</span></h2>
            <p class="pack_b12_tx">Создаем полноценную концепцию внешнего вида товара: продумываем выигрышную форму товара и подходящий для нее дизайн</p>
            <p class="pack_price">от <span>50</span> тыс. руб./макет</p>
          </div>
          <div class="pack_b12__right">
            <div class="pack_b12__right_img_1"><img data-src="/bitrix/templates/veonix/assets/img/old/pack/b12_img_1.jpg" class="lazy" width="465" height="414" alt="Дизайн упаковки"></div>
            <div class="pack_b12__right_img_2"><img data-src="/bitrix/templates/veonix/assets/img/old/pack/b12_img_2.png" class="lazy" width="332" height="326" alt="Дизайн упаковки"></div>
          </div>  
        </div>
      </div>
    </section>
    <section class="pack_b13">
      <div class="main">
        <div class="pack_zg">Дополнительные услуги</div>
        <div class="pack_b13_box">
          <div class="pack_b13_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b13_img.jpg" width="531" height="336" alt="дизайн упаковки"></div>
          <div class="pack_b13_tx">
            <div class="pack_b13__item">
              <a href="/zakazat-naming/">Нейминг</a>
              <p class="pack_price">от <span>100</span> тыс. руб.</p>
            </div>
            <div class="pack_b13__item">
              <a href="/package-design/">Логотип</a>
              <p class="pack_price">от <span>100</span> тыс. руб.</p>
            </div>
            <div class="pack_b13__item">
              <a href="/zakazat-firmenniy-stil/">Фирменный стиль</a>
              <p class="pack_price">от <span>150</span> тыс. руб.</p>
            </div>
            <div class="pack_b13__item">
              <a href="/brand-book/">Брендбук</a>
              <p class="pack_price">от <span>300</span> тыс. руб.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b10 ">
      <div class="main">
        <p class="pack_b10_tx">Можно долго продолжать этот список, но лучше обратиться <br>к нам в студию для персональной проработки вашего проекта.</p>
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b18_gif.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Получите бесплатные <br> рекомендации по созданию <br>или редизайну упаковки товара </div>
          <p class="st_opis"> Присылайте макеты на аудит</p>
        </div>
        <div class="st_form_bx">
          <div class="st_form">
           <a class="sbm sbm-2 " href="#form" data-fancybox data-text = ">Получите бесплатные  рекомендации по созданию или редизайну упаковки товара - Дизайн упаковки" >Отправить макет</a>
          </div>

        </div>

        
        
      </div>
    </section>
    <section class="pack_b11">
      <div class="main">
        <div class="pack_b11_zg">
          <div class="pack_b11_img">
            <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
              <source data-src="/bitrix/templates/veonix/assets/img/old/video/pack_b10.mp4?1" type="video/mp4">
            </video>
          </div>
          <h2 class="pack_b11_tx font_pd"><span>В чем CИЛА</span> профессионального дизайна упаковок <br>и этикеток для вашего бизнеса?</h2>
        </div>
        <div class="pack_b11_box">

          <div class="pack_b11__text">
            <div class="pack_b11__item">
              <p class="pack_b11_t1">Товар выделяется <br>среди других</p>
              <p class="pack_b11_t2">уникальный дизайн упаковки оставляет конкурентов незамеченными</p>
            </div>
            <div class="pack_b11__item">
              <p class="pack_b11_t1">Увеличиваются <br>продажи</p>
              <p class="pack_b11_t2">про товар знают, его легко замечают и покупают без лишних раздумий</p>
            </div>
          </div>

          <div class="pack_b11_imgs">
            <div class="pack_b11_image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b11_img.png" width="307" height="440" alt="Дизайн упаковки"></div>
            <div class="pack_b11_svg"><img data-src="/bitrix/templates/veonix/assets/img/old/pack/b11_svg.svg" class="pack_b11_svg_line svg_anim lazy" width="411" height="870" alt=""></div>
          </div>

          <div class="pack_b11__text">
            <div class="pack_b11__item">
              <p class="pack_b11_t1">Бренд получает <br> популярность</p>
              <p class="pack_b11_t2">по удачному дизайну потребители проводят ассоциации с маркой</p>
            </div>
            <div class="pack_b11__item">
              <p class="pack_b11_t1">Улучшение <br>финансовых <br> показателей</p>
              <p class="pack_b11_t2">как итог, возвращаются инвестиции в создание товара, растет прибыль</p>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="st_b18 pack_b14">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b10_gif.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <div class="h2">Оставьте заявку </div>
          <p class="st_opis"> на расчет стоимости дизайна упаковки вашего товара и мы перезвоним вам в течение 15 минут</p>
        </div>
        <div class="st_form_bx">
          <div class="st_form">
           <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "Обратная связь - Расчет стоимости дизайна упаковки вашего товара - Дизайн упаковки" >ЗАКАЗАТЬ ЗВОНОК</a>
          </div>

        </div>
      </div>
    </section>
    <section class="pack_b15">
      <div class="main">
        <div class="pack_b15_box_1">
          <div class="pack_b15__left">
            <h2 class="pack_zg">
              Как мы подходим 
              <span>
                к разработке дизайна <br>
                упаковок и этикеток?
              </span>
            </h2>
            <p class="pack_b15_t1">
              Мы выбираем философию вовлечения  <br>в процесс, когда берем в работу новый проект, а это значит: глубокая проработка товара, персональная работа с заказчиком и создание уникального предложения премиального качества.
            </p>
          </div>
          <div class="pack_b15__right">
            <div class="pack_b15__img">
              <div class="pack_b15__image"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b15_img.png" width="999" height="580" alt="дизайн упаковки"></div>
            </div>
          </div>
        </div>
        <div class="pack_b15_box_2">
          <p class="pack_b15_t2">Мы не просто рисуем  <br>красивые картинки.</p>
          <div class="pack_b15_col">
            <p>
              <span style="font-weight: bold;">Проводим</span> тщательное исследование рынка <br>
              в определенном сегменте, отслеживаем основные предложения, изучаем конкурентов 
            </p>
            <p>
              <span style="font-weight: bold;">Обращаем</span> особое внимание на тренды <br>
              в индустрии и соответствуем им
            </p>
            <p>
              <span style="font-weight: bold;">Берем в пример</span> лучшие исполнения форм <br>
              и дизайнерских задумок
            </p>
            <p>
              <span style="font-weight: bold;">Определяем</span> основные преимущества <br>
              и особенности товара 
            </p>
          </div>
          <div class="pack_b15_col">
            <p><span style="font-weight: bold;">Формируем</span> оптимальную концепцию упаковки на основе всех маркетинговых исследований: <br>
              по форме, цветовой гамме, шрифту и другим дизайнерским элементам</p>
            <p><span style="font-weight: bold;">Изучаем</span> позиционирование товара и на основе информации создаем портрет целевой аудитории</p>
            <p><span style="font-weight: bold;">Приступаем</span> к отрисовке дизайна упаковки товара только на основе детальной проработки, собранных данных и сформированных идей </p>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b17">
      <div class="main">
        <div class="pack_b17_box">
          <div class="pack_b17_box_lf">
            <div class="pack_zg"><span>Цифры</span> и факты о нас</div>
            <p>За этими цифрами много труда и выработанный собственный подход.</p>
            <p>Мы дорожим каждым нашим клиентом, уважаем их труд и имидж, поэтому никогда не позволяем себе браться за заказ спустя рукава. </p>
            <p>При разработке дизайна мы вовлечены <br>в деятельность и продукт клиента, что позволяет нам лучше понять задачу, <br>а заказчику получить превосходный результат.</p>
          </div>
          <div class="pack_b17_box_rg">
            <div class="pack_b17_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b17_img_1.jpg" width="388" height="484" alt="Дизайн упаковки"></div>
            <div class="pack_b17_img_2">
              <img class="lazy pk_b17_img_1" data-src="/bitrix/templates/veonix/assets/img/old/pack/b17_img_2.png" width="272" height="225" alt="Дизайн упаковки">
              <img class="lazy pk_b17_img_2" data-src="/bitrix/templates/veonix/assets/img/old/pack/b17_img_3.png" width="207" height="171" alt="Дизайн упаковки">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b18">
      <div class="main">
        <div class="pack_b18_box">
          <div class="pack_b18__lf"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b18_img.jpg" width="588" height="588" alt="Дизайн упаковки"></div>
          <div class="pack_b18__rg">
            <div class="pack_b18__item">
              <div class="pack_b18_it_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b18_icon_1.svg" width="24" height="24" alt="icon"></div>
              <p class="pack_b18_it_t1">Более <span>5</span> лет</p>
              <p class="pack_b18_it_t2">разрабатываем <br> digital-проекты <br> премиум-качества</p>
            </div>
            <div class="pack_b18__item">
              <div class="pack_b18_it_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b18_icon_2.svg" width="24" height="24" alt="icon"></div>
              <p class="pack_b18_it_t1">Более <span>20</span> <br>профессионалов</p>
              <p class="pack_b18_it_t2">работают в штате, имеют колоссальный опыт <br>и уникальные навыки</p>
            </div>
            <div class="pack_b18__item">
              <div class="pack_b18_it_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b18_icon_3.svg" width="24" height="24" alt="icon"></div>
              <p class="pack_b18_it_t1">Более <span>500</span> <br>проектов</p>
              <p class="pack_b18_it_t2">с успешным результатом <br>за плечами команды нашей студии </p>
            </div>
            <div class="pack_b18__item">
              <div class="pack_b18_it_icon"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b18_icon_4.svg" width="24" height="24" alt="icon"></div>
              <p class="pack_b18_it_t1">Более <span>30</span> <br>компаний</p>
              <p class="pack_b18_it_t2">c мировым именем сотрудничают с нами <br>на постоянной основе</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b16">
      <div class="main">
        <div class="pack_b16_bg">
          <div class="pack_b16_bg1">
            <div class="pack_b16_bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="152" height="281" alt="svg"></div>
            <div class="pack_b16_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="230" height="426" alt="svg"></div>
          </div>
          <div class="pack_b16_bg2">
            <div class="pack_b16_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="260" height="375" alt="svg"></div>
            <div class="pack_b16_bg_4"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="197" height="284" alt="svg"></div>
          </div>
        </div>
        <div class="pack_b16_top">
          <div class="pack_b16_bx_0">
            <h2 class="pack_zg">
             <span> Почему стоит заказать</span> разработку дизайна упаковки и этикетки в студии дизайна Veonix?
            </h2>
            <p>В штате VEONIX собраны настоящие профессионалы своего дела. Команда из специалистов различных профилей в сферах дизайна, маркетинга, продаж и менеджмента способна решать широчайший спектр задач. Вы можете обратиться с самой смелой и нерядовой задумкой проекта, а сотрудники студии точно найдут пути решения, проконсультируют, составят несколько концепций и реализуют все задуманное.</p>
          </div>
        </div>
        <div class="pack_b16_bx pack_b16_bx_1">
          <div class="pack_b16_main">
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Авторский подход</p>
              <p class="pack_b16_t2">Вам будет разработан эксклюзивный дизайн, который оставит в тени конкурентов. Для нас шаблоны – табу.</p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Маркетинг</p>
              <p class="pack_b16_t2">Дизайн каждого проекта основан на детальной маркетинговой проработке рынка и товара, исследовании конкурентов, аудитории, тенденций.</p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Качество по доступной цене</p>
              <p class="pack_b16_t2">Премиальное качество – наш ориентир при разработке дизайна упаковок. Цена при этом остается на приемлемом уровне. </p>
            </div>
          </div>
        </div>
        <div class="pack_b16_bx pack_b16_bx_1">
          <div class="pack_b16_main">
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Контроль</p>
              <p class="pack_b16_t2">Высокое качество и отличный результат в работе достигается <br>с помощью отработанной системы менеджмента. Процесс разработки каждого проекта отслеживается руководством. </p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Гарантии</p>
              <p class="pack_b16_t2">Доводим каждый проект до конца, <br>
                а не бросаем после первой сдачи. Вносим необходимые изменения <br>
                и правки до окончательного утверждения</p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Срочность</p>
              <p class="pack_b16_t2">С уважением к вашему времени <br>
                и планированию, мы стараемся подготовить дизайн упаковки <br>
                в согласованные сроки или даже <br>
                с опережением установленных дат. </p>
            </div>
          </div>
        </div>
        <div class="pack_b16_bx pack_b16_bx_1">
          <div class="pack_b16_main">
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Команда профессионалов</p>
              <p class="pack_b16_t2">Над дизайном упаковок и этикеток <br>для вашего товара работают сразу несколько специалистов, и каждый прорабатывает его в рамках своих профессиональных компетенций.</p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Качество по доступной цене</p>
              <p class="pack_b16_t2">Премиальное качество – наш ориентир при разработке дизайна упаковок. Цена при этом остается на приемлемом уровне. </p>
            </div>
            <div class="pack_b16__item">
              <p class="pack_b16_t1 font_pd">Рассрочка без предоплаты</p>
              <p class="pack_b16_t2">Наши постоянные клиенты получают возможность заказывать услуги в более лояльном формате, с удобным для них графиком оплаты.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b19">
      <div class="main">
        <div class="pack_zg">Наши <br> гарантии</div>
        <div class="pack_b19_line">
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>Договор</span> <i>01</i></p>
            <p class="pack_b19_tx">Каждая сделка носит официальный характер <br>и закрепляется договором <br>с указанием всех нюансов</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>Конфиденциальность</span> <i>02</i></p>
            <p class="pack_b19_tx">Защищаем ваши конфиденциальные данные посредством заключения договора NDA</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>Конкретные сроки</span> <i>03</i></p>
            <p class="pack_b19_tx">Строго фиксируем сроки, отведенные на реализацию проекта. За каждый день просрочки – штрафы </p>
          </div>
        </div>
        <div class="pack_b19_anim"><img data-src="/bitrix/templates/veonix/assets/img/old/press/b8_line.svg" class="pk_pack_b19 svg_anim lazy"></div>
        <div class="pack_b19_line">
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>Антиплагит</span> <i>04</i></p>
            <p class="pack_b19_tx">Каждый проект мы создаем  <br>с нуля персонально под потребности, без использования заготовок, и все проверяем <br>на оригинальность</p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>100% возврат денег</span> <i>05</i></p>
            <p class="pack_b19_tx">Вы имеете возможность получить полный возврат средств, если окажетесь <br>не удовлетворены результатом </p>
          </div>
          <div class="pack_b19__item">
            <p class="pack_b19_zg"><span>Корректировки</span> <i>06</i></p>
            <p class="pack_b19_tx">Если после получения проекта нашли ошибки, допущенные по нашей вине или необходимы правки, то мы бесплатно внесем необходимые изменения</p>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_b20">
      <div class="main">
        <div class="pack_b20_top">
          <div class="pack_b20__lf">
            <h2 class="pack_b20_zg font_pd"><span>Этапы</span> разработки дизайна <br>упаковки и этикеток</h2>
          </div>
          <div class="pack_b20__rg">
            <p>
              Комплексный подход к разработке дизайна упаковок <br>и этикеток товаров позволяет нам достигать результатов, которые превзойдут ваши ожидания. Каждый заказ – полноценный серьезный проект, в котором задействованы все сотрудники нашей студии. <br>На каждом этапе работают профессионалы своего направления. 
            </p>
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b20_icon_3.svg" width="115" height="213" class="pk_b20_icon_3" alt="icon">
          </div>
        </div>
        <div class="pack_b20_box">
          <div class="pack_b20_bg">
            <div class="pack_b20_bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b20_icon_1.svg" alt="icon" width="110" height="203"></div>
            <div class="pack_b20_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b20_icon_1.svg" alt="icon" width="215" height="398"></div>
            <div class="pack_b20_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b20_icon_3.svg" alt="icon" width="215" height="397"></div>
          </div>
          <div class="pack_b20_top_main">
            <div class="pack_b20_zt">
              <p>Этап</p>
              <p>Процесс и описание</p>
            </div>

            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/01</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Консультация</p>
                <p class="pack_b20_t2">Оставляете заявку, менеджер связывается с вами. Проводим брифинг, консультируем по имеющимся вопросам. Определяем задачу, ставим сроки, подписываем договор.</p>
              </div>
            </div>
            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/02</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Исследование</p>
                <p class="pack_b20_t2">Наши маркетологи проводят тщательный анализ сегмента рынка, основных потребителей, конкурентов. Делают сравнительный анализ <br>для выявления особенностей товара</p>
              </div>
            </div>
            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/03</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Концепция</p>
                <p class="pack_b20_t2">Всей командой создаем несколько вариантов концепций будущего проекта. <br>По согласованию с вами выбираем лучшую.</p>
              </div>
            </div>
            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/04</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Дизайн</p>
                <p class="pack_b20_t2">Прорабатываем выбранную вами концепцию. На основе результатов маркетинговых исследований и выбранной главной идеи создаем общий вид проекта и детально прорабатываем каждый элемент дизайна упаковки товара. Согласуем несколько вариантов с вами. Выбираете лучший.</p>
              </div>
            </div>
            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/05</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Согласование</p>
                <p class="pack_b20_t2">Утверждаем готовый дизайн упаковки товара. Проверяем корректность исполнения договорных обязательств.</p>
              </div>
            </div>
            <div class="pack_b20_item">
              <div class="pack_b20_nmb font_pd"><p>/06</p></div>
              <div class="pack_b20_text">
                <p class="pack_b20_t1 font_pd">Обслуживание</p>
                <p class="pack_b20_t2">В случае необходимости вносим правки, исправляем ошибки.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <section class="pack_b21">
      <div class="main">
        <div class="pack_b21_top">
          <div class="pack_b21__lf">
            <p class="pack_b21_zg font_pd">
              <span>Топ-5 правил</span>
              разработки дизайна<br>упаковок и этикеток<br>в компании Veonix
            </p>

            <div class="pack_b21__item">
              <p class="pack_b21_nmb font_pd">/01</p>
              <div class="pack_b21_main">
                <p class="pack_b21__t1 font_pd">Олицетворение бренда</p>
                <p class="pack_b21__t2">Дизайн упаковки товара должен проводить прямую ассоциацию у покупателя с вашим брендом. Нужно правильно и достоверно передать философию и все уникальные преимущества.</p>
              </div>
            </div>
            <div class="pack_b21__item">
              <p class="pack_b21_nmb font_pd">/02</p>
              <div class="pack_b21_main">
                <p class="pack_b21__t1 font_pd">Оригинальность</p>
                <p class="pack_b21__t2">Люди увидят товар только тогда, когда он не похож на массу отштампованных упаковок. Чтобы захватить внимание покупателя и заставить его перестать думать о других вариантах, дизайн упаковки товара должен быть из ряда вон, в прямом, но хорошем смысле.</p>
              </div>
            </div>

          </div>
          <div class="pack_b21__rg">
            <div class="pack_b21_img_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b21_img_1.jpg" width="388" height="495" alt="дизайн упаковок"></div>
            <div class="pack_b21_img_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b21_img_2.png" width="731" height="341" alt="дизайн упаковок"></div>
          </div>
        </div>
        <div class="pack_b21_bottom">
          <div class="pack_b21_bottom_img">
            <div class="pack_b21_bottom_img_1"><div class="pack_b21_bottom_img_1_main"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b21_img_3.jpg" width="680" height="487" alt="дизайн упаковок"></div></div>
            <div class="pack_b21_bottom_img_2"><div class="pack_b21_bottom_img_2_main"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/b21_img_4.png" width="378" height="426" alt="дизайн упаковок"></div></div>
          </div>
          <div class="pack_b21_bottom_text">
            <div class="pack_b21__item">
              <p class="pack_b21_nmb font_pd">/03</p>
              <div class="pack_b21_main">
                <p class="pack_b21__t1 font_pd">Функциональность</p>
                <p class="pack_b21__t2">Товар может продаваться в упаковках  разных объемов и форм, но всегда одинаково должен доносить до потребителей информацию о себе. Необходимо разработать гибкий, динамичный, функциональный дизайн упаковки и этикетки.</p>
              </div>
            </div>
            <div class="pack_b21__item">
              <p class="pack_b21_nmb font_pd">/04</p>
              <div class="pack_b21_main">
                <p class="pack_b21__t1 font_pd">Трансляция смыслов</p>
                <p class="pack_b21__t2">Дизайн упаковки товара – это не просто набор ярких цветов, необычных шрифтов и ярких картинок. Упаковка должна продавать, коммуницировать с потребителем, доносить до него все основные принципы, особенности, качества и преимущества.</p>
              </div>
            </div>
            <div class="pack_b21__item">
              <p class="pack_b21_nmb font_pd">/05</p>
              <div class="pack_b21_main">
                <p class="pack_b21__t1 font_pd">Экологичность</p>
                <p class="pack_b21__t2">При разработке упаковки будет большим плюсом подумать об экологичном отношении. По возможности создать упаковку <br>из материалов, которые не вредят среде. <br>А также форму и объем, которые будут удобны для транспортировки. </p>
                <p class="pack_b21__t2">К тому же, это одна из современных тенденций, к которой положительно относится общество.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pack_example">
        <div class="main">
            <div class="h2">Примеры наших работ</div>
            <div class="pack-flex">
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu1.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu1.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu2.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu2.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu3.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu3.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu4.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu4.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu5.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu5.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu6.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu6.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu7.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu7.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu8.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu8.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu9.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu9.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu10.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu10.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu11.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu11.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu12.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu12.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu13.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu13.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu14.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu14.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu15.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu15.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu16.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu16.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu17.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu17.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu18.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu18.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu19.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu19.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu20.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu20.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu21.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu21.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu22.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu22.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu23.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu23.jpg"></a>
                <a data-fancybox="pr" href="/bitrix/templates/veonix/assets/img/old/pack/pu24.jpg"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/pack/pu24.jpg"></a>
            </div>
        </div>
    </section>

</main>
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
<div class="old_page pack_page">
    <section class="pack_b22">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/b7_img.mp4?1" type="video/mp4">
              </video>
            </div>
          </div>
          <div class="h2">Вместе сделаем из вашего <br>товара хит продаж!</div>
          <p class="st_opis">Наш телефон: <a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a> <br>или закажите обратный звонок</p>
        </div>
        <div class="st_form_bx">
          <div class="st_form">
            <a class="sbm sbm-2 " href="#form" data-fancybox data-text = "Заявку на расчет стоимости - Дизайн упаковки" >ЗАКАЗАТЬ ЗВОНОК</a>
          </div>

        </div>
      </div>
    </section>
    
 
</div>
  <section class="poleznaya">
        <div class="main">
                 <h2 class="home_h2">Полезная информация по теме</h2>
             <p><a href="/blog/kak-sozdat-effektivnyj-dizajn-upakovki-tovara/">Как создать эффективный дизайн упаковки товара?</a></p>
             <p><a href="https://veonix.ru/blog/sovremennyj-branding/">Современный брендинг</a></p>
             <p><a href="https://veonix.ru/blog/osnovnye-professionalnye-terminy-v-graficheskom-dizajne/">Основные профессиональные термины в графическом дизайне</a></p>

      </div>
    </section>


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
                "PARENT_SECTION" => "15",
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
		"TYPE_TEXT" => "Дизайн упаковки,   Презентация,  Логотип, Брендбук, Гайдбук, Слоган, Коммерческое предложение, Видеоролик, Маркетинг-кит, Другое"
	),
	false
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>