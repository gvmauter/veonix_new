<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Разработка коммерческих предложений на заказ. Напишем продающие тексты для КП, сверстаем инфографичный дизайн компреда, сохраним КП в PDF, Word, PowerPoint.");
$APPLICATION->SetPageProperty("title", "Заказать разработку коммерческого предложения под ключ — цена в студии графического дизайна Veonix 50 000 руб.");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Коммерческое предложение");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/firmstyle.css");   


$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/comPred.css");   


?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => " Разработка",
		"TEMPLATE_FOR_TITLE2" => "  коммерческого   ",
		"TEMPLATE_FOR_TITLE3" => " предложения ",
		"CHECKBOX" => "N",
		"TEXT_1" => "Создадим коммерческое предложение <br> для вашей компании с гарантией роста продаж",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 
  
<div class="old_page">
<main class="compred_page">
    <section class="compred_b1">
      <div class="main">
        <div class="compred_b1_box">
          <div class="compred_b1_for_img1">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b1_img1.png" class="compred_b1_img1 lazy" width="495" height="535"
              alt="Коммерческое проедложение">
          </div>
          <h2 class="compred_b1_title font_pd">
            <span>Делаем убедительные</span> <br>
            <span>коммерческие</span> <br>
            <span>предложения на заказ</span>
          </h2>
          <p class="compred_b1_text_top">
            <span style="font-weight: 600;">Разработка коммерческого предложения
              для любых бизнес-задач:</span> <br>
            вывод нового продукта или товара на рынок, отправка “теплым” или “холодным” клиентам, запуск акции и т.д.
          </p>
          <div class="compred_b1_flex">
            <div class="compred_b1_item">
              <div class="item_wrap">
                <p class="item_title">Для «холодной» аудитории</p>
                <p class="item_text">Под отправку по базе <br> для установки контакта
                </p>
              </div>
            </div>
            <div class="compred_b1_item">
              <div class="item_wrap">
                <p class="item_title">Для «подогретых» клиентов</p>
                <p class="item_text">После звонка или визита менеджера</p>
              </div>
            </div>
            <div class="compred_b1_item">
              <div class="item_wrap">
                <p class="item_title">Резюме по итогам встречи</p>
                <p class="item_text">Помогает быстрее <br> принять решение</p>
              </div>
            </div>
            <div class="compred_b1_item">
              <div class="item_wrap">
                <p class="item_title">Партнёрские предложения</p>
                <p class="item_text">Поиск инвесторов, спонсоров или подрядчиков</p>
              </div>
            </div>
          </div>
          <p class="compred_b1_text_bot">
            У нас есть опыт в разработке коммерческого предложения под ключ во многих нишах. Поэтому мы на практике
            знаем, какие фишки, техники и приёмы лучше работают.
          </p>
          <div class="compred_b1_for_img2">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b1_img2.png" class="compred_b1_img2 lazy" width="841" height="608"
              alt="Коммерческое проедложение">
          </div>
        </div>

      </div>
    </section>

    <section class="compred_b2">
      <div class="main">
        <div class="compred_b2_flex">
          <div class="compred_b2_ring">
            <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
              <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
              <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#E8E3DB"
                stroke-width="3"></circle>
              <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#C6BAA7"
                stroke-width="3" stroke-dasharray="70 30" stroke-dashoffset="25"></circle>
            </svg>
            <div class="compred_b2_ring2">
              <p><span>70</span>%</p>
            </div>
          </div>
          <div class="compred_b2_info">
            <div class="compred_b2_title font_pd">
              Результаты наших
              клиентов впечатляют
            </div>
            <p class="compred_b2_text">
              Именно поэтому более 70% из них решают заказать коммерческое предложение для компании и другую полиграфию
              повторно
            </p>
          </div>
        </div>
        <div class="compred_b2_wrap">
          <div class="compred_b2_for_img">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b2_img1.png" class="compred_b2_img lazy" width="631" height="757"
              alt="Коммерческое проедложение">
          </div>
          <div class="compred_b2_flex2">
            <div class="compred_b2_item">
              <p class="item_number"><span>50</span> млн. $</p>
              <p class="item_text">Привлечено в инвестиционные фонды и на развитие <br> стартап-проектов</p>
            </div>
            <div class="compred_b2_item">
              <p class="item_number"><span>100+</span> договоров</p>
              <p class="item_text">Подписано в минимальные сроки с арендаторами на сдачу торговых площадей в новом ТРЦ
              </p>
            </div>
            <div class="compred_b2_item">
              <p class="item_number"><span>1,2</span> млрд. руб.</p>
              <p class="item_text">Стоимость разовой сделки <br>
                за продажу производственного комплекса</p>
            </div>
            <div class="compred_b2_item">
              <p class="item_number"><span>1000</span> тендеров</p>
              <p class="item_text">Выиграно с помощью наших проектов, том числе <br>
                на государственные заказы</p>
            </div>
          </div>
        </div>
        <div class="compred_b2_decor">
        </div>
      </div>
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b2_svg_bg1.svg" class="compred_b1_bg1 lazy" width="262" height="377">
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b2_svg_bg2.svg" class="compred_b1_bg2 lazy" width="220" height="405">
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b2_svg_bg3.svg" class="compred_b1_bg3 lazy" width="450" height="375">
    </section>
    <section class="compred_b5">
      <div class="main">
        <div class="compred_b5_wrap">
          <h2 class="compred_b5_title font_pd">
            <span>Сколько стоит</span><br>
            дизайн коммерческого <br>
            предложения
          </h2>
          <div class="compred_b5_info">
            <p><span style="font-weight: 600;">Который легко превращает переговоры в сделку</span></p>
            <p>
              Хотите, чтобы ваше КП было не просто исписанным листиком бумаги, а эффективным инструментом с высокой
              конверсией, которое привлекает реальных покупателей? Тогда вам стоит доверить работу профессиональной
              студии.
            </p>
            <p>
              В Veonix вы получаете авторскую разработку дизайна коммерческого предложения с понятной идеей, логичной
              структурой и лёгким текстом, премиум класса по доступной стоимости.
            </p>
          </div>
        </div>
        <div class="compred_b5_flex">
          <div class="compred_b5_items">
      
            <div class="compred_b5_item">
              <div class="item_top">
                <p class="item_title">Только текст</p>
                <p class="item_price">от<span>20 000</span> руб.</p>
              </div>
              <p class="item_bot">
                Решили оформить КП самостоятельно? Наши копирайтеры напишут для вас профессиональный продающий текст
              </p>
            </div>
            <div class="compred_b5_item">
              <div class="item_top">
                <p class="item_title">КП под ключ</p>
                <p class="item_price">от<span>50 000</span> руб.</p>
              </div>
              <p class="item_bot">
                Проект с нуля включает в себя маркетинговый анализ, написание продающего текста, разработку структуры и
                дизайн
              </p>
            </div>
          </div>
          <div class="compred_b5_for_img">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b5_img1.png" class="compred_b5_img lazy" width="487" height="525">
          </div>
        </div>
      </div>
    </section>
    <section class="compred_b3">
      <div class="main">
        <div class="compred_b3_title font_pd">В продающем КП работает каждый элемент</div>
        <div class="compred_b3_graph">
          <div class="compred_b3_graph_flex">
            <div class="compred_b3_graph_item">
              <p>Слова</p>
            </div>
            <div class="compred_b3_graph_item">
              <p>Картинки</p>
            </div>
            <div class="compred_b3_graph_item">
              <p>Фон</p>
            </div>
            <div class="compred_b3_graph_item">
              <p>Шрифты</p>
            </div>
          </div>
          <div class="compred_b3_graph_lines">
            <div class="compred_b3_graph_box_top1 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_top2 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_top3 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_top4 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_bot1 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_bot2 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_bot3 compred_b3_graph_box"></div>
            <div class="compred_b3_graph_box_bot4 compred_b3_graph_box"></div>
          </div>
          <div class="compred_b3_graph_bot">
            <p>составляют цельную продающую конструкцию </p>
          </div>
        </div>
        <div class="compred_b3_wrap">
          <div class="compred_b3_info">
            <p>В отличие от лендинга, сайта и даже презентации, коммерческое предложение предельно ограничено <br>
              по объёму и шансу быть прочитанным до конца. <br>
              Мы взвешенно относимся к каждому слову. <br>
              Ваш компред цепляет читателя с первой секунды <br>
              и удерживает его внимание до финальной точки. </p>
            <p>Такой результат по плечу только профессионалам. Оформление и дизайн коммерческих предложений секретарями,
              менеджерами, копирование наугад избитых фраз и легкодоступных картинок из интернета приводит к тому, что
              полученный штампованный «винегрет» летит в ведро или спам, даже не будучи открытым. Результат — упущенное
              время и сотни прошедших мимо клиентов.</p>
            <p><span style="font-weight: 600;">В Veonix над разработкой коммерческого <br> предложения трудится целая команда <br>
                специалистов. Именно поэтому оно приносит <br>
                вам прибыль и на деле решает задачи:</span></p>
          </div>
          <div class="compred_b3_for_img">
            <img src="/bitrix/templates/veonix/assets/img/old/compred/b3_img1.png" alt="" class="compred_b3_img lazy" width="762" height="383"
              alt="Коммерческое проедложение для компании Лукоил">
            <p class="compred_b3_img_text">
              РЕШЕНИЕ ЗАДАЧ
            </p>
          </div>
        </div>
        <div class="compred_b3_flex1">
          <div class="compred_b3_item">
            <p class="item_title">Быстро «наращивает» обороты </p>
            <p class="item__text">Ваше предложение вызывает живой  <br>  интереси ответные заявки. Оно точно <br> попадает в
              потребности потенциального <br> клиента, и это не случайность: наши <br> маркетологи предварительно отыскали <br> все
              «болевые точки».</p>
          </div>
          <div class="compred_b3_item">
            <p class="item_title">Помогает принять решение в вашу пользу</p>
            <p class="item__text">Правильный текст и дизайн коммерческого предложения снимает все возражения клиента ещё
              до момента их появления, внятно доносит выгоды, убеждает, что ваш продукт нужен незамедлительно, побуждает
              выполнить целевое действие, не откладывая «на потом».</p>
          </div>
        </div>
        <div class="compred_b3_flex2">
          <div class="compred_b3_item">
            <p class="item_title">Работает на ваш статус
              в режиме 24/7</p>
            <p class="item__text">Гармонично расставленные блоки, грамотный текст без воды и опечаток, безупречная
              стилистика изложения, <br> ручной дизайн, созданный на основе вашего корпоративного брендбука <br> (или отрисованный
              с нуля), выгодно  <br>говорят о вас клиентам.</p>
          </div>
          <div class="compred_b3_item">
            <p class="item_title">Ярко выделяет среди конкурентов</p>
            <p class="item__text">Обязательно найдём мощное УТП, которое убеждает покупателей идти именно к вам.
              Профессиональная подача конкурентных преимуществ в виде текста, оформленного в тандеме
              с цепким дизайном работают безотказно.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="compred_b4">
      <div class="main">
        <h2 class="compred_b4_title font_pd">
          <span>Почему стоит заказать</span> <br>
          дизайн коммерческого <br>
          предложения у нас
        </h2>
        <div class="compred_b4_flex">
          <div class="compred_b4_item">
            <p class="item_title">Выдерживаем
              обещанные сроки</p>
            <p class="item_text">Получаете готовый макет день в день, согласно договору</p>
          </div>
          <div class="compred_b4_item">
            <p class="item_title">Предлагаем доступные цены</p>
            <p class="item_text">Не завышаем тарифы, держим их на доступном уровне</p>
          </div>
          <div class="compred_b4_item">
            <p class="item_title">Поручаем работу опытным мастерам</p>
            <p class="item_text">В нашем штате нет новичков и разовых исполнителей</p>
          </div>
          <div class="compred_b4_item">
            <p class="item_title">Контролируем процесс выполнения</p>
            <p class="item_text">Работу каждого специалиста проверяем <br>в несколько этапов</p>
          </div>
        </div>
        <div class="compred_b4_wrap">
          <p class="compred_b4_wrap_text">
            Предлагаем не просто профессионально разработанное КП, а комплексный и
            комфортный сервис, который быстро окупается и высвобождает ваше время на решение более важных,
            стратегических задач бизнеса.
          </p>
          <p class="compred_b4_wrap_text">
            Во время выполнения проекта всегда остаёмся <br>
            на связи, гибко и оперативно реагируем <br>
            на изменения и новые пожелания. Для удобства <br>
            и прозрачности процесса создаём чат в WhatsApp, куда подключается вся рабочая группа.
          </p>
        </div>
        <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b4_svg1.svg" class="compred_b4_bg1 lazy" width="370" height="347">
      </div>
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b4_svg2.svg" class="compred_b4_bg2 lazy" width="240" height="444">
      <p class="compred_b4_bg_text">ПРЕДЛОЖЕНИЕ</p>
    </section>
    <section class="compred_b6">
      <div class="main">
        <div class="compred_b6_title font_pd">
          В итоге нашего сотрудничества
        </div>
        <div class="compred_b6_subtitle font_pd">
          вы получаете комплексное маркетинговое оружие, полностью готовое к «бою»
        </div>
        <div class="compred_b6_flex">
          <div class="compred_b6_item">
            <p class="item_number">01</p>
            <p class="item_title">Убойное коммерческое предложение</p>
            <p class="item_text">которое эффективно продаёт <br> без отпуска и выходных,<br> даже без вашего личного участия </p>
          </div>
          <div class="compred_b6_item">
            <p class="item_number">02</p>
            <p class="item_title">Действительно уникальное торговое предложение</p>
            <p class="item_text">даже, если вы всегда были <br> уверены, что выделиться <br>
              в вашей нише просто <br> невозможно</p>
          </div>
          <div class="compred_b6_item">
            <p class="item_number">03</p>
            <p class="item_title">Лёгкий, грамотный, структурированный текст</p>
            <p class="item_text">без банальностей, клише, стилистических ошибок<br>
              и бестолковых хвалебных од</p>
          </div>
          <div class="compred_b6_for_line">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b6_line.svg" class="compred_b6_img lazy" width="780" height="278">
          </div>
          <div class="compred_b6_item">
            <p class="item_number">04</p>
            <p class="item_title">Внятный оффер, понятное с первых слов деловое предложение</p>
            <p class="item_text">которое привлекает внимание целевой аудитории, заставляя отложить текущие дела <br>в
              сторону и вникнуть в ваше КП</p>
          </div>
          <div class="compred_b6_item">
            <p class="item_number">05</p>
            <p class="item_title">Инфографичный продающий дизайн</p>
            <p class="item_text">ненавязчивый, но при этом <br> выгодно подчёркивающий<br> деловое предложение<br> и изящно
              адаптированный <br>под ваш корпоративный стиль</p>
          </div>
          <div class="compred_b6_item">
            <p class="item_number">06</p>
            <p class="item_title">Несколько<br> форматов КП</p>
            <p class="item_text">под рассылку (сжатый в PDF) <br>и печать (в максимально<br> высоком качестве), а также <br>все
              исходные файлы</p>
          </div>
        </div>
        <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b6_svg2.svg" class="compred_b6_bg2 lazy" width="320" height="461">
        <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b6_svg3.svg" class="compred_b6_bg3 lazy" width="219" height="405">
      </div>
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b6_svg1.svg" class="compred_b6_bg1 lazy" width="256" height="474">
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b6_svg4.svg" class="compred_b6_bg4 lazy" width="375" height="351">
    </section>

    <section class="compred_b7">
      <div class="main">
        <div class="compred_b7_wrap">
          <h2 class="compred_b7_title font_pd">
            <span>Этапы</span><br>
            разработки дизайна<br>
            коммерческих<br>
            предложений в Veonix
          </h2>
          <div class="compred_b7_right">
            <div class="compred_b7_top">
              <p class="compred_b7_steps">Этап</p>
              <p class="compred_b7_process">Процесс и описание</p>
            </div>
            <div class="compred_b7_flex">
              <div class="compred_b7_item">
                <p class="item_number font_pd">/01</p>
                <div class="item_info">
                  <p class="item_title font_pd">Консультация</p>
                  <p class="item_text">
                    Первая консультация. Во время переговоров <br>
                    мы выясняем цели и задачи вашего КП и обсуждаем <br> общие нюансы предстоящей работы
                  </p>
                </div>
              </div>
              <div class="compred_b7_item">
                <p class="item_number font_pd">/02</p>
                <div class="item_info">
                  <p class="item_title font_pd">Анализ</p>
                  <p class="item_text">Сбор информации. С помощью брифа или интервью  <br>с маркетологом получаем от вас
                    первичный материал, включая текст и картинки, если они имеются</p>
                </div>
              </div>
              <div class="compred_b7_item">
                <p class="item_number font_pd">/03</p>
                <div class="item_info">
                  <p class="item_title font_pd">Исследование</p>
                  <p class="item_text">Маркетинговое исследование. Для максимально точного попадания в цель, глубоко
                    анализируем целевую аудиторию, рынок и продукт</p>
                </div>
              </div>
              <div class="compred_b7_item">
                <p class="item_number font_pd">/04</p>
                <div class="item_info">
                  <p class="item_title font_pd">Дизайн</p>
                  <p class="item_text">Работа над текстом и дизайном. После написания копирайтером текста, создаём 3-5
                    дизайн-концепций,<br> из которых вы выбираете самый удачный</p>
                </div>
              </div>
              <div class="compred_b7_item">
                <p class="item_number font_pd">/05</p>
                <div class="item_info">
                  <p class="item_title font_pd">Согласование</p>
                  <p class="item_text">Верстка коммерческого предложения. Дорабатываем выбранный вариант дизайна
                    до финиша и готовим макет<br> под формат печати</p>
                </div>
              </div>
              <div class="compred_b7_item">
                <p class="item_number font_pd">/06</p>
                <div class="item_info">
                  <p class="item_title font_pd">Заключение</p>
                  <p class="item_text">Печать и доставка. В собственной типографии распечатаем КП в любом тираже.
                    Бесплатно привезем в любую точку Москвы к двери вашего офиса</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b7_svg2.svg" class="compred_b7_bg2 lazy" width="215" height="397">
        <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b7_svg3.svg" class="compred_b7_bg3 lazy" width="110" height="203">
      </div>
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b7_svg1.svg" class="compred_b7_bg1 lazy" width="214" height="396">
      <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b7_svg4.svg" class="compred_b7_bg4 lazy" width="171" height="315">
    </section>

    <section class="compred_b8">
      <div class="compred_b8_bg">
        <div class="main">
          <div class="compred_b8_wrap">
            <div class="compred_b8_oval"></div>

       
          <div class="st_zg_bg">
              <div class="st_zg_bg_img b18_gif">
                <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                  <source data-src="/bitrix/templates/veonix/assets/img/old/video/commerc_1.mp4?1" type="video/mp4">
                </video>
              </div>
            </div> 
            <div class="compred_b8_text font_pd">
              Будем знакомы? <br>
              Veonix — профессиональная студия <br>
              графического дизайна
            </div>
          </div>
          <div class="compred_b8_flex">
            <div class="compred_b8_item">
              <p class="item_title font_pd">С <span>2017</span> года</p>
              <p class="item_text">Официально работаем <br> под собственным <br> брендом</p>
            </div>
            <div class="compred_b8_item">
              <p class="item_title font_pd"><span>20</span> <br> специалистов</p>
              <p class="item_text">Лучшие <br> профессионалы <br> на рынке</p>
            </div>
            <div class="compred_b8_item">
              <p class="item_title font_pd"><span>500</span> <br> готовых проектов</p>
              <p class="item_text">Успешно сдали <br>
                за время работы <br> студии</p>
            </div>
            <div class="compred_b8_item">
              <p class="item_title font_pd"><span>50 000</span> страниц</p>
              <p class="item_text">Различной <br> имиджевой <br> полиграфии <br> напечатали</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="compred_b9">
      <div class="main">
        <div class="compred_b9_bg"></div>
        <div class="compred_b9_wrap">
          <div class="compred_b9_info">
            <div class="compred_b9_title font_pd">Фирменные <br>
              гарантии от Veonix</div>
            <div class="compred_b9_alert">
              <div class="compred_b9_alert_for_svg">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M15.4998 8.85742C15.9075 8.85742 16.2379 9.18788 16.2379 9.59552V16.9765C16.2379 17.3841 15.9075 17.7146 15.4998 17.7146C15.0922 17.7146 14.7617 17.3841 14.7617 16.9765V9.59552C14.7617 9.18788 15.0922 8.85742 15.4998 8.85742Z"
                    fill="#BB0852" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M15.4996 22.8811C16.3149 22.8811 16.9758 22.2202 16.9758 21.4049C16.9758 20.5896 16.3149 19.9287 15.4996 19.9287C14.6844 19.9287 14.0234 20.5896 14.0234 21.4049C14.0234 22.2202 14.6844 22.8811 15.4996 22.8811Z"
                    fill="#BB0852" />
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 15.5C0 6.93959 6.93959 0 15.5 0C24.0604 0 31 6.93959 31 15.5C31 24.0604 24.0604 31 15.5 31C6.93959 31 0 24.0604 0 15.5ZM15.5 1.47619C7.75486 1.47619 1.47619 7.75486 1.47619 15.5C1.47619 23.2451 7.75486 29.5238 15.5 29.5238C23.2451 29.5238 29.5238 23.2451 29.5238 15.5C29.5238 7.75486 23.2451 1.47619 15.5 1.47619Z"
                    fill="#BB0852" />
                </svg>
              </div>
              <div class="compred_b9_alert_text">
                Каждая из них <br> зафиксирована в вашем <br> договоре
              </div>
            </div>
            <div class="compred_b9_flex">
              <div class="compred_b9_item">
                <p class="item_title font_pd">100% уникальность</p>
                <p class="item_text">
                  Ваше КП выгодно отличается от тысяч компредов конкурентов. Весь контент создаётся вручную, включая
                  текст и дизайн
                </p>
              </div>
              <div class="compred_b9_item">
                <p class="item_title font_pd">Сдача готового КП в срок</p>
                <p class="item_text">
                  Без проволочек. Без форс-мажора. Без «баллад» про пробки, сбои электричества и мировые эпидемии. <br>
                  Если задержим хоть на полчаса — заплатим штраф
                </p>
              </div>
              <div class="compred_b9_item">
                <p class="item_title font_pd">Сохранность вашей <br> конфиденциальной информации</p>
                <p class="item_text">
                  Не на словах и не просто потому, что так принято. Подписываем официальный договор NDA, который
                  юридически навсегда закрывает возможность утечку
                  ваших данных
                </p>
              </div>
              <div class="compred_b9_item">
                <p class="item_title font_pd">Возврат денег в полном объёме</p>
                <p class="item_text">
                  Если мы не справимся с задачей — вернём 100% предоплаты. Дорожим репутацией и не вступаем <br> в полемику,
                  если вдруг вы останетесь разочарованы результатом
                </p>
              </div>
            </div>
          </div>
          <div class="compred_b9_for_img">
            <img data-src="/bitrix/templates/veonix/assets/img/old/compred/b9_img.png" class="compred_b9_img lazy" width="613" height="1207">
          </div>
        </div>
      </div>
    </section>

    <section class="compred_b10">
      <div class="main">
        <div class="compred_b10_wrap">
          <h2 class="compred_b10_title font_pd"><span>Секреты оформления</span> <br>
            коммерческих предложений, которые взрывают продажи и окупаются в минимальные сроки</h2>
          <div class="compred_b10_doc font_pd">
            <p>
              КП — сильный и эффективный маркетинговый инструмент и самый короткий путь <br> от продукта к сделке.
              Разумеется,
              работает он в полную силу, если над созданием коммерческого предложения на заказ трудились профессионалы.
            </p>
            <p>
              Увы, рассказать, как это сделать за 5 минут практически невозможно, т. к. мы годами набирались опыта, да и
              в каждом отдельном случае возникают свои нюансы. Но, всё же, мы собрали несколько советов, которые
              актуальны
              всегда.
            </p>
            <ol>
              <li>
                Создайте цепляющий, интригующий заголовок. От этих нескольких слов зависит, откроют ли вообще ваше
                письмо.
                Он должен быть ярким, креативным, но главное, 100% релевантным потребностям ваших клиентов. Напишите
                несколько вариантов и протестируйте, какой «зайдёт» лучше. <br> Вот несколько удачных примеров: «Как
                увеличить
                оборот оптового склада на 300% за 2 недели не раздувая отдел продаж», «Сэкономьте 500+ долларов
                ежемесячно
                на бухгалтерии», «Увеличьте прибыль бьюти-салона в 2 раза благодаря новому сервису по организации
                автоматического учёта».
              </li>
              <li>
                Говорите о целевой аудитории, а не о себе. Сплошной рассказ о том, какие вы гениальные — игра в
                собственные ворота. Если клиент не увидит для себя выгод и описания своих потребностей — пиши пропало.
                Проскролит документ, свернёт его шариком, вспомнит студенческие рекорды и забросит 10-очковый в корзину.
                На этот раз в мусорную.
              </li>
              <li>
                Проработайте структуру. Главное — логика. Каждый блок должен находиться на своём месте. Начинайте с
                описания проблем клиента и постепенно двигайтесь в сторону её решения. Не забудьте привести веские
                аргументы в вашу пользу и разместить на видном месте понятный призыв к действию.
              </li>
              <li>
                Сделайте акцент на выгодах предложения. Прежде, чем создать дизайн коммерческого предложения, соберите
                все
                свои преимущества. Для вас какая-то деталь может быть вполне очевидной: ну что здесь такого, что вы
                оказываете услугу за 2 дня или настройку оборудования выполняете бесплатно? А вот конкуренты об этом
                даже
                не слышали. И вполне возможно, что именно эта фишка подтолкнет клиента к выбору в вашу пользу.
              </li>
            </ol>

          </div>
          <div class="compred_b10_grad"></div>
        </div>
      </div>
    </section>
    <div class="logo-clients">
   
      
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
  <section class="compred_b11 st_b18">
      <div class="main">
        <div class="st_zg">
          <div class="st_zg_bg">
            <div class="st_zg_bg_img b18_gif">
              <video class="box_video lazy" video="" autoplay="" loop="" muted="" playsinline="" webkit-playinginline="">
                <source data-src="/bitrix/templates/veonix/assets/img/old/video/commerc_2.mp4" type="video/mp4">
              </video>
            </div>
          </div>
          <p class="st_tx">Обратная связь</p>
          <h2 class="h2">Остались вопросы</h2>
          <p class="st_opis">Оставьте заявку и наши <br>менеджеры свяжутся с Вами <br>в ближайшее время</p>
    
        </div>
        <div class="st_form_bx">
        <div class="st_form">
          <a class="sbm sbm-2 " href="#order" data-fancybox data-text = "Конец страницы - Обратная связь - Комм предложение" >ЗАКАЗАТЬ ЗВОНОК</a>
        </div>
     
        </div>
      </div>
    </section>
  </div>

  <section class="poleznaya">
        <div class="main">
             <h2 class="home_h2">Полезная информация по теме</h2>
             <p><a href="https://veonix.ru/blog/kak-napisat-kommercheskoe-predlozhenie/">Как написать коммерческое предложение</a></p>
             <p><a href="https://veonix.ru/blog/kak-elementy-ajdentiki-vliyajut-na-uznavaemost-brenda/">Как элементы айдентики влияют на узнаваемость бренда?</a></p>
             <p><a href="https://veonix.ru/blog/kakim-principam-nuzhno-sledovat-pri-razrabotke-dizajna/">Каким принципам нужно следовать при разработке дизайна?</a></p>
      </div>
    </section>

  <script type="application/ld+json">






{
  "@context": "https://schema.org/", 
  "@type": "Product", 
  "name": "Заказать продающее коммерческое предложение",
  "image": "https://veonix.ru/bitrix/templates/veonix/assets/img/old/firm_style/b6_img.png",
 "description": "Создадим коммерческое предложение для вашей компании с гарантией роста продаж",
 "offers": {
 "@type": "Offer",
 "url": "https://veonix.ru/commercial-offer/",
 "priceCurrency": "RUB",
 "price": "20000",
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
		"TYPE_TEXT" => "Коммерческое предложение, Каталог, Флаер,   Визитка, Листовка, Годовой отчет,  Буклет, Брошюра, Прессвол, Roll Up, Другое"
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
              "PARENT_SECTION" => "18",
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
 
 


<script type="text/javascript">$(".podr").click(function() { jQuery(this).toggleClass("activse");});</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>