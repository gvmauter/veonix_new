<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Вопросы, которые могли у Вас возникнуть и подробные ответы на них. Студия графического дизайна Veonix оказывает полный спектр услуг в сфере создания креативного дизайна для бизнеса.");
$APPLICATION->SetPageProperty("title", "Ответы на популярные вопросы - студия графического дизайна Veonix  ");

$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Вопрос-ответ");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
 
$APPLICATION->SetTitle("Вопрос-ответ");
?>


<? 
$APPLICATION->IncludeComponent(
    "bitrix:main.include","",
      Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/bitrix/templates/veonix/php/title_demo.php"
      )
);


?>
<div class="old_page">
    <div class="main">
        <div class="old_page_template"> 
        <div class="faq_box faq_page" itemscope itemtype="https://schema.org/FAQPage">
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Сколько людей участвуют в процессе?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Над каждым проектом работают минимум 6 человек: маркетолог, редактор, арт-директор, дизайнер, иллюстратор и менеджер.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Вы делаете нестандартные заказы?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Да. Даже больше. Наша специализация - сложные индивидуальные заказы.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Есть ли доставка продукции? И как оплатить заказ?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Доставка по Москве:</p>
                                    <p>300 руб. (вес продукции до 5 кг).</p>
                                    <p>500 руб. (вес продукции 5-10 кг).</p>
                                    <p>1 200 руб. (вес продукции более 10 кг).</p>
                                    <p>Доставка в другие регионы:</p>
                                    <p>По России, по СНГ или любую точку мира: 300 руб. + услуги транспортной компании ("Pony Express" или "ЦАП").</p>
                                    <p>Оплата:</p>
                                    <p>Кредиткой или наличными (также можно по счёту от юр. лица).</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Какова наценка за срочность?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Мы не делаем наценки за срочность.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Какова предоплата?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>50% от стоимости заказа (исключения могут быть для мелких заказов – предоплата в размере 100%).</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Есть ли у вас скидки?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Да, для постоянных клиентов и при большом объеме скидки до 50%.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Схема работы</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Обсуждение деталей &gt; Предоплата 50% &gt; Утверждение проекта заказчиком &gt; Оплата остатка &gt; Передача исходных файлов</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Оплата услуг</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Производится по безналичному расчёту, либо на банковскую карту.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Сроки выполнения</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Сроки выполнения напрямую зависят от поставленных задач, для уточнения деталей, вам нужно связаться с нами любым предложенным способом на сайте.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Какой порядок работы?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Мы проводим интервью, фиксируем Ваши пожелания. Далее составляем мудборд и разрабатываем концепцию дизайна, каждый из этих этапов также согласовывается. Только после этого верстаем весь проект на согласованном дизайне. Правки вносим без ограничений.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Какая информация нужна?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Для начала работы необходимо заполнить <span style="text-decoration:underline"><a href="https://veonix.ru/brief/">бриф</a></span>, в котором указывается:</p>
                                    <ul>
                                        <li>что требуется разработать;</li>
                                        <li>основная информация о Вашей компании;</li>
                                        <li>пожелания по дизайну и задачам проекта.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Что я получу в результате работы?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>После утверждения и оплаты Вам на электронную почту высылается исходник утвержденного макета в нескольких форматах.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Сколько правок включено в стоимость дизайна?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Мы не ограничиваем количество правок.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Сколько вариантов дизайна я получу?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Мы не разрабатываем сразу несколько вариантов. Нашей компанией готовится один СИЛЬНЫЙ вариант, который потом редактируется при необходимости.</p>
                                    <p>Если мы с первого раза не попадаем в Ваши ожидания, то мы переделываем изначальный вариант.</p>
                                </div>
                            </div>
                        </div>
           
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">А вы можете сделать на свое усмотрение? Вы же дизайном занимаетесь.</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Да, можем сделать на свое усмотрение, но в этом случае не дадим гарантии, что наше видение совпадёт с Вашим представлением. Но в любом случае вы получите качественный макет.</p>
                                </div>
                            </div>
                        </div>
                        <div class="faq_box__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <p class="faq_box__title" itemprop="name">Можно встретиться в Москве?</p>
                            <div class="faq_box__item__content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div class="faq_box__item_main" itemprop="text">
                                    <p>Да, вы можете посетить наш офис в Москве по адресу Москва, Пресненская набережная 12, Башня "Федерация", 41 этаж в рамках рабочего времени нашей студии. Просим заранее предупредить о визите, поскольку действует пропускная система и нам необходимо подготовить пропуск на ваше имя. Обращаем внимание на необходимость предварительно уточнить возможность встречи, потому что часть нашей команды находится на удаленке из-за ковидных ограничений.</p>
                                </div>
                            </div>
                        </div>
                    </div>
        
 
 
        </div>
    </div>
</div>

 <script>

$(document).ready(function () {
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
});
 </script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>