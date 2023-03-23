<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Отзывы. Мы собрали отзывы о компании Веоникс с более чем 10 площадок. Только реальные отзывы о veonix.ru");
$APPLICATION->SetPageProperty("title", "Отзывы — veonix.ru   ");

$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Отзывы");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/reviewsPage.css");   

$APPLICATION->SetTitle("Отзывы");
?>


<section class="web_b1">
    <div class="main">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array( "START_FROM" => "0", "PATH" => "/", "SITE_ID" => "s1" ) );?> 
        <div class="web_b1_title">
          <h1 class="web_h1"> <?$APPLICATION->ShowTitle(false)?></h1>
        </div>
        <div class="web_b1_text_l otzv_page " style=" margin: 0; ">
          <p>За 4 года продуктивной работы команде студии дизайна Veonix удалось оказать профессиональные услуги заказчикам <br> из совершенно разных сфер: от небольших стартапов и малого бизнеса до производственных гигантов и государственных структур. </p>
          <p>Все проекты мы довели до успешного завершения и, тем самым, помогли компаниям улучшить показатели их деятельности. <br> Многие возвращаются к нам повторно с новыми заказами.</p>
          <p>Но не будем долго себя расхваливать, за нас все скажут реальные отзывы довольных клиентов. Мы собрали их с разных официальных площадок (Яндекс, 2GIS и пр.), чтобы
вы легко нашли их в одном месте и не сомневались в достоверности:</p>
        </div>
    </div>
    <div class="animation_loader"  ></div>
</section>

<section class="web_line lazy" data-bg="<?=SITE_TEMPLATE_PATH?>/assets/img/home/line_bg_min.jpg?1">
    <div class="web_line_text lazy" >
      <p><span>We have been designing the best digital solutions since 2017</span> <i></i> <span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i></p>
      <p><span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i><span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i></p>
      <p><span>We have been designing the best digital solutions since 2017</span> <i></i> <span>Мы проектируем лучшие digital-решения с 2017 года</span> <i></i> <span>We have been designing the best digital solutions since 2017</span><i></i></p>
    </div>
</section>  



<div class="old_page">
     


<main class="reviews_page">
    <section class="rw_b1">
      
      <div class="main">
        <div class="rw_b6_box_bg">
          <div class="rw_b6_box_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="217" height="399" alt="veonix"></div>
          <div class="rw_b6_box_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="267" height="395" alt="veonix"></div>
        </div>
        <div class="rw_b1_zg">
          <p class="rw_b10_zg font_pd">
            <span>Мы собрали</span>
            <span>ваши отзывы *</span>
            <span>более чем с 10 площадок</span>
          </p>
          <p class="rw_b1_zg_t2 font_pd"> <span>* Орфография и пунктуация отзывов сохранены</span></p>
        </div>
        <div class="rw_b1_box">
          <div class="rw_b1_lf"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_img2.png" width="580" height=" " alt="отзывы"></div>
          <div class="rw_b1_rg">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_logo.svg" width="211" height="47" alt="Яндекс">
            <div class="rw_b1_rating">
              <div class="rw_b1_rating_1"><p>4.9</p></div>
              <div class="rw_b1_rating_2">
                <p>Veonix</p>
                <ul>
                  <li><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_icon.svg" width="24" height="23" alt="отзыв"></li>
                  <li><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_icon.svg" width="24" height="23" alt="отзыв"></li>
                  <li><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_icon.svg" width="24" height="23" alt="отзыв"></li>
                  <li><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_icon.svg" width="24" height="23" alt="отзыв"></li>
                  <li><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b1_icon.svg" width="24" height="23" alt="отзыв"></li>
                </ul>
              </div>
            </div>
            <div class="rw_b1__item">
              <p class="rw_b1_name">
                <span>Алёна Г.</span>
                <span>Знаток города 4 уровня</span>
                <span>19 февраля</span>
              </p>
              <p class="rw_b1_text">Сделанная у них презентация понравилась по всем параметрам. Тексты и визуальная часть отлично смотрятся, но самое главное - презентация маркетинговая, стимулирующая людей заключать договора именно с нами. Планировалась именно как продающая, и этот момент в ней точно работает. Вижу по откликам даже по холодной рассылке. По теплой вообще реакция отличная. Под это дело планирую <br>у вас еще брошюры сделать в том же духе, мы балансируем между онлайном и оффлайном, надо поддерживать эту стратегию.</p>
            </div>
            <div class="rw_b1__item">
              <p class="rw_b1_name">
                <span>Yulka Gagarina</span>
                <span>Знаток города 3 уровня</span>
                <span>1 июня 2020</span>
              </p>
              <p class="rw_b1_text">Ребята из студии Веоникс подготовили мне грамотный и внятный маркетинг кит на для запуска нового продукта. Запуск попал на нерабочие недели в апреле, но как не странно первые отклики мы начали получать сразу. Результат есть - это уже очевидно, из плюсов отмечу невысокую стоимость за проект такого уровня. Мы работали раньше со студией из ТОП-10, суть та же только ценник в разы выше. Не вижу смысла платить больше...</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="rw_b2">
      <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b2_img.jpg" width="1144" height="1152" alt="veonix">
    </section>
    <section class="rw_b3">
      <div class="main">
        <div class="rw_b3_box">
          <div class="rw_b3_lf">
            <img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b3_logo.svg" width="173" height="74" alt="veonix">
            <div class="rw_b3_nav">
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Олег Климов</span></p>
                <p>
                  Заключили с Веониксом договор <br>
                  на маркетинг-кит. Мои пиарщики отметили, <br>
                  что студия быстро работает. Лишних денег  <br>
                  не просят. Меня устроило. Понравилось как подали наши старые изъезженные идеи <span style="font-weight: bold;"></span>
                  с новой стороны. А то многие сейчас предлагают одно и то же. Я же вижу, в бизнесе не первый день. Молодцы!</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Ирина Капустина</span></p>
                <p>
                  У нас в бизнесе были очень сложные времена <br>
                  и мы вложили буквально последние деньги  <br>
                  в создании двух лендингов по двум нашим продуктом. Уже на грани закрытия буквально находились. И тут народ буквально попер, извините за выражение! Студия дизайна Veonix вы большие молодцы!
                </p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Евгений Пимонов</span></p>
                <p>
                  Привели в порядок сайт и теперь заказываем лендинге у студии Veonix, чтобы вырастить продажи. Задумка работает, вложенные в проект деньги уже отбиты. Единственное, студия может сроки увеличить на один-два дня, но там творческая работа, я всё понимаю. Главное, что работает...
                </p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">​Igor Shevelev</span></p>
                <p>Четко работают, слышат клиента и где то даже могут угадать, что надо )) когда не хватает слов, как говорится.. Сроки вполне норм, можно обудить срочное. Работаем с 2019 года с ними, даже иногда жаль, что не раньше. У нас от них брендбук, фирменный стиль и лого - все они.</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Marcus Monani</span></p>
                <p>Оформили, наконец, наш брендбук. Дело продвигалось долго, потому что никакой концепции у нас в помине не существовало, все создавалось и продумывалось с нуля! Почти все, что отражает брендбук было предложено со стороны Веоникса, после нескольких "интервью" и изучения нашей деятельности. Создание брендбука прибавило нам статусности и в целом даже как-то систематизировало практическую деятельность. Как-никак, у нас есть теперь реальная миссия, близкая руководству и сотрудникам, свой стиль, подход. Выросли мы с Веониксом буквально!))
                </p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Валера Александров</span></p>
                <p>Заказанная у Веоникса видео-инфографика сработала отлично, все-таки мы правильно выбрали способ презентации. При этом видео не тяжелое в плане веса,чтобы удобно было кидать через мессенджеры том числе, воспринимается легко и ненавязчиво, все самое главное за ровно 1 минуту.</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Таисия Муртузова</span></p>
                <p>Мы приняли решение изменить упаковку наших товаров, и отправились с этим запросом в Veonix. Сразу понравились предложенные варианты, особо и правок даже не было. Как-то гладко очень корректно и быстро сработали. Рекомендуем их для сотрудничества.</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Евгения Торопова</span></p>
                <p>Народ, для моей компании эта студия разрабатывала фирменный стиль. Мне невероятно понравился подход. А именно. Фирменный стиль - это объединение в одно нашего бюджета, наших пожеланий и, актуальности на рынке и привлекательности для покупателей. Не знаю как им это удалось, но искренне - получилось то что нужно, всей моей команде нравится!
                </p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Владимир Д.</span></p>
                <p>Очень красивая презентация для нашего интернет-магазина. Информация чётко разбита по разделам и подразделам, приятно визуально оформлена, хорошо читается и воспринимается потенциальными покупателями. Будем пользоваться, уже получили положительный feedback от наших постоянных клиентов. Кстати, по рекомендации специалистов Veonix и решили отойти от нашего стандартного цвета, которым раньше всегда пользовались в оформлении. Попробовали другой, и получилось ничуть не хуже. Возможно позднее свой фирменный стиль у них разработаем, так как мы уже достаточно подросли для этого.</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Pasha Novikov</span></p>
                <p>Неплохо отработали насчет нашей презентации к переговорам на гос.заказчиков, мне даже с первого раза все понравилось) претензий нету) Ушло правда недели 3 на все про все с момента обращения, но зато результат радует!</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">​Анна Кулиш</span></p>
                <p>Последние три года плотно работаем с Veonix. Причина проста - уровень работы как у именитых агентств, а цена более чем привлекательная, при этом при заказах на постоянке можно без труда выпросить скидку. И сроки радуют. Если не получается сделать "вчера", значит назовут разумный срок и четко в него уложатся. При этом результаты правок (если есть) приходят моментально, а не в "порядке общей очереди". В течение 10-15 минут порой дизайнер правил. Отличный уровень.</p>
              </div>
              <div class="rw_b3__item">
                <p><span style="font-weight: bold;">Малик Смирнов</span></p>
                <p>В течение последних двух лет периодически обращаемся в студию Veonix, как правило за визуальным оформлением. Регулярно проводим мероприятия, нам требуются выставочные стенды и полиграфия. Работают на твердую пятёрку и выясняют всё до мельчайших деталей, чтобы сделать то что нужно.</p>
              </div>

            </div>
          </div>
          <div class="rw_b3_rg">
            <div class="rw_b3_rg_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b3_img.png" width="869" height="1120" alt="veonix"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="rw_b4">
      <div class="main">
        <div class="rw_b4_box"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b4_img.png"  width="1050" height="774" alt="veonix"></div>
      </div>
    </section>
    <section class="rw_b5" >
      <img class="lazy"  data-src="/bitrix/templates/veonix/assets/img/old/reviews/b5_img.jpg" alt="veonix">
    </section>
    <section class="rw_b6">
      <div class="main">
        <div class="rw_b6_box">
          <div class="rw_b6_box_bg">
            <div class="rw_b6_box_bg_1"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_1.svg" width="340" height="320" alt="veonix"></div>
            <div class="rw_b6_box_bg_2"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_2.svg" width="217" height="399" alt="veonix"></div>
            <div class="rw_b6_box_bg_3"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/logo/b11_bg_3.svg" width="267" height="395" alt="veonix"></div>
          </div>
          <div class="rw_b6__left">
            <div class="rw_b6_logo"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b6_logo.svg" width="97" height="93" alt="veonix"></div>
            <div class="rw_b6__item"><a href="/bitrix/templates/veonix/assets/img/old/reviews/b6_img_1.jpg" data-fancybox=""><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b6_img_1.jpg" width="393" height="395" alt="veonix"></a></div>
            <div class="rw_b6__item"><a href="/bitrix/templates/veonix/assets/img/old/reviews/b6_img_2.jpg" data-fancybox=""><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b6_img_2.jpg" width="393" height="395" alt="veonix"></a></div>
          </div>
          <div class="rw_b6__right">
            <div class="rw_b6__right_box"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b6_img_3.png" width="868" height="931" alt="veonix"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="rw_b7">
      <div class="main">
        
        <div class="b7_line b7_line_1">
          <div class="rw_b7__item rw_b7_color_1">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Юлия Халилова</span></p>
              <p>Начальник мне выделил довольно скудный бюджет на маркетинговые материалы, но <br>
                в Веоникс смогли после переговоров в этот бюджет уложиться. Получили дизайны для разного рода полиграфии, в типографии не было никаких проблем, всё в нужных форматах и высокого качества. Самое главное, привлекательно выглядит!</p>
            </div>
          </div>
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Людмила</span></p>
              <p>Очень хочется сказать про адекватный подход <br>
                к дизайну. Не как к просто творческой работе, <br>
                а с учетом ЦА, с заточкой на маркетинг. Не нам красиво, а людям красиво. Которые будут покупать. Очень! Максимально продавили продающий элемент <br>
                в нашей презентации.</p>
            </div>
          </div>
        </div>

        <div class="b7_line b7_line_2">
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Petrosanm56</span></p>
              <p>Выбрали эту студию в основном за нешаблонность. Мы со многими работали, уже видно "стыренные" идеи. Хотелось свежачка <br>
                и честной работы реальных креативщиков. "Натырить" мы и сами можем. В общем, все понравилось. Презентация получилась на ура. Поработаем еще точно.</p>
            </div>
          </div>
          <div class="rw_b7__item rw_b7_color_1">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Riboncko.ludo4ka</span></p>
              <p>В наше время крайне важно отличаться от конкурентов, рынок же перенасыщен сейчас. Да еще и доказать клиенту, почему ты лучший. Чтобы закрыть эти моменты, заказали профессиональный маркетинг-кит у Veonix. Одни восторги от их работы, откровенно говоря! </p>
            </div>
          </div>
        </div>

        <div class="b7_line b7_line_3">
          <div class="rw_b7__item rw_b7_color_1">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Рамиль Саидов</span></p>
              <p>До сих пор пищу, какой стильный сайт мне сделала эта студия, просто наслаждаюсь каждой страничкой! Это чисто визуальная часть, но подача информации и интерфейс отличные, клиент в пару кликов может сделать покупку, его прям аккуратненько ведут к кнопочке заказать!</p>
            </div>
          </div>
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Владимир Викторович</span></p>
              <p>Под мою новую компанию Веоникс разработали все, от логотипа до маркетинговых материалов, разработали нам свой индивидуальный стиль. Работой и правда доволен. По времени было не быстро, но тут качество важнее. Упаковали полностью под мощный выход на рынок.</p>
            </div>
          </div>
        </div>

        <div class="b7_line b7_line_4">
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Елена</span></p>
              <p>Всегда с сомнением относилась к дизайнерам, всемпокажи расскажи, в чём тогда Ваша работа заключается? Но как-то вот переговоры в Веониксе прошли удачно, сразу меня услышали и сделали то что нужно. И правки внесли адекватно, о чём попросила. Дизайнеры у вас молодцы, это факт.</p>
            </div>
          </div>
        </div>

        <div class="rw_b7_box">
          <div class="rw_b7_box_item"><a href="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_1.jpg" data-fancybox="otz"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_1.jpg" width="375" height="380" alt="veonix"></a></div>
          <div class="rw_b7_box_item"><a href="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_2.jpg" data-fancybox="otz"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_2.jpg" width="375" height="380" alt="veonix"></a></div>
          <div class="rw_b7_box_item"><a href="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_3.jpg" data-fancybox="otz"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b7_img_3.jpg" width="375" height="380" alt="veonix"></a></div>
        </div>

      </div>
    </section>
    <section class="rw_b8">
      <div class="rw_b8_1">
        <div class="main">
          <div class="rw_b8_box">
            <div class="rw_b8_box_lf">
              <div class="rw_b8_box_logo"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b8_logo.svg" width="275" height="65" alt="veoinix"></div>
              <div class="rw_b8__item">
                <p class="rw_b8__name">
                  <span style="font-weight: bold;">Виктория Эльцеа</span>
                  <span>10 мар., 00:13</span>
                </p>
                <p class="rw_b8_text">
                  По долгу службы достаточно лично работала <br>с различными дизайн-студиями <br>и соответствующими агентствами. Веоникс мне нравится свежестью мысли и полным погружением в клиента, не упускают деталей <br>и делают аутентично, уникально. Наш маркетинг-кит тому пример.
                </p>
              </div>
              <div class="rw_b8__item">
                <p class="rw_b8__name">
                  <span style="font-weight: bold;">Фёдор Козлов</span>
                  <span>17 фев., 08:25</span>
                </p>
                <p class="rw_b8_text">
                  Траты на новый маркетинг-кит оказались обоснованными, ну и судя по всему мы этот вопрос отдали в профессиональные <br>и грамотные руки. Я и сам раньше  <br>не задумывался, какая у нас богатая история компании) это когда уже инфо начали собирать в ТЗ, я подумал, а чего мы раньше этим <br>не козыряли, в конце концов! Работает же.
                </p>
              </div>
            </div>
            <div class="rw_b8_box_rg">
              <div class="rw_b8_box_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b8_img.png" width="1277" height="1000" alt="veonix"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="rw_b8_2">
        <div class="main">
          <div class="rw_b8__item">
            <p class="rw_b8__name">
              <span style="font-weight: bold;">Диана Невская</span>
              <span>13 янв., 15:50</span>
            </p>
            <p class="rw_b8_text">Раз в два месяца примерно выпускаем новый лендинг и гоним на него рекламу, последние три раза заказывали у Веоникса сам лендинг. Почему - потому что продажи самые высокие получаются. А берут они не больше, чем наша прошлая (довольно известная) студия, <br> а меньше.
            </p>
          </div>
        </div>
      </div>
      
    </section>
    <section class="rw_b9">
      <div class="main">
        <div class="rw_b9_logo"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b9_logo.svg" width="240" height="62" alt="veonix"></div>
        <div class="rw_b9_box">
          <div class="rw_b9_img"><img class="lazy" data-src="/bitrix/templates/veonix/assets/img/old/reviews/b9_img.jpg" width="1344" height="746" alt="veonix"></div>
        </div>
        <div class="b7_line b7_line_1">
          <div class="rw_b7__item rw_b7_color_1">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Диана Павловна</span></p>
              <p>Привет дизайнеру вашей студии, который разрабатывал нам лого! человек покупку делает и говорит: какой у вас логотип красивый))) <br>
                и таких отзывов не один! Ведь совершенно точно он запомнит нас из-за реакции на лого, <br>
                а разве не это стояло главной задачей))</p>
            </div>
          </div>
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Александр Александрович</span></p>
              <p>
                Четко работают, слышат клиента и где то даже могут угадать, что надо)) когда не хватает слов, как говорится.. Сроки вполне норм, можно обудить срочное. Работаем с 2019 года с ними, даже иногда жаль, что не раньше. У нас от них брендбук, фирменный стиль и лого — все они.</p>
            </div>
          </div>
        </div>
        <div class="b7_line b7_line_2">
          <div class="rw_b7__item rw_b7_color_2">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Ирина Мареева</span></p>
              <p>
                 Первый блин не случился комом, сделали для <br>
                нас шикарный прототип сайта и передали нам исходники в PSD. Очень красиво, оригинально, верстальщику нашему тоже понравилось. Макет аккуратный, все по слоям разбито. Первый раз обращались в студию Veonix, но с такими результатами явно не последний.</p>
            </div>
          </div>
          <div class="rw_b7__item rw_b7_color_1">
            <div class="rw_b7__item_main">
              <p><span style="font-weight: bold;">Милана</span></p>
              <p>
                Разработка нашей айдентики и брендбука прошла успешно, очень бы хотелось чтобы <br>
                это помогло нам выйти на новый уровень. <br>
                Все основания полагать, что так и будет,  <br>
                есть. Вместе с мастерами из Veonix работали <br>
                на узнаваемость бренда, при этом простоту<br>
                для запоминания.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
 
  </main>
 
</div>

<section class="home_clientabout">
    <div class="main">
      <div class="home_clientabout_top">
        <h2 class="home_h2">Более 100 <br> положительных отзывов</h2>
 
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
                "NEWS_COUNT" => "210",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
 
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
                "SORT_BY2" => "ID",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "DESC",
                "STRICT_SECTION_CHECK" => "N"
              ),
              false
            );?>
       
      </div>
   
    </div>
  </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>