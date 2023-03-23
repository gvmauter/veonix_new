<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Цены в студии графического дизайна Veonix. Мы оказываем полный спектр услуг в сфере создания креативного дизайна для бизнеса.");
$APPLICATION->SetPageProperty("title", "Стоимость услуг графического дизайна — veonix.ru    ");

$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Стоимость услуг");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$APPLICATION->SetTitle("Стоимость услуг");
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
        <div class="item-news item-news-content">
                                <p class="prices-title">Брендинг</p>
<div class="prices-table">
<div><span>Брендбук</span><p></p>
<div><span>300 тыс. руб.</span></div>
</div>
<div><span>Логотип</span><p></p>
<div><span>100 тыс. руб.</span></div>
</div>
<div><span>Айдентика бренда</span><p></p>
<div><span>150 тыс. руб.</span></div>
</div>
<div><span>Нейминг</span><p></p>
<div><span>100 тыс. руб.</span></div>
</div>
<div><span>Разработка слогана</span><p></p>
<div><span>100 тыс. руб.</span></div>
</div>
<div><span>Фирменный стиль</span><p></p>
<div><span>150 тыс. руб.</span></div>
</div>
<div><span>Гайдбук</span><p></p>
<div><span>150 тыс. руб.</span></div>
</div>
<div><span>Дизайн упаковки</span><p></p>
<div><span>50 тыс. руб.</span></div>
</div>
</div>
<p class="prices-title">Презентации</p>
<div class="prices-table">
<div><span>Презентации</span><p></p>
<div><span>4 тыс. руб. / дизайн слайда</span></div>
</div>
<div><span>Копирайтинг</span><p></p>
<div><span>4 тыс. руб. / текст слайда</span></div>
</div>
<div><span>Презентация под ключ (маркетинг кит):</span><p></p>
<div><span>100 тыс. руб. / 12 слайдов</span></div>
</div>
<div><span>Коммерческое предложение</span><p></p>
<div><span>50 тыс. руб. / проект</span></div>
</div>
<div><span>Видеопрезентация</span><p></p>
<div><span>10 тыс. руб. / слайд</span></div>
</div>
<div><span>Моушндизайн</span><p></p>
<div><span>2 тыс. руб. / секунда</span></div>
</div>
<div><span>Инфографика</span><p></p>
<div><span>30 тыс. руб. / макет</span></div>
</div>
</div>
<p class="prices-title">Сайты</p>
<div class="prices-table">
<div><span>Лендинг</span><p></p>
<div><span>200 тыс. руб. </span></div>
</div>
<div><span>Многостраничный сайт</span><p></p>
<div><span>700 тыс. руб. </span></div>
</div>
<div><span>Настройка amoCRM</span><p></p>
<div><span>50 тыс. руб. / базовая настройка</span><span>100 тыс. руб. / стандартная настройка</span><span>200 тыс. руб. / премиум</span></div>
</div>
</div>
<p class="prices-title">Полиграфия</p>
<div class="prices-table">
<div><span>Полиграфический дизайн</span><p></p>
<div><span>4 тыс. руб. / страница</span></div>
</div>
<div><span>Баннеры</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Визитки</span><p></p>
<div><span>10 тыс. руб. /макет</span></div>
</div>
<div><span>Каталог</span><p></p>
<div><span>4 тыс. руб. / страница</span></div>
</div>
<div><span>Roll Up</span><p></p>
<div><span>10 тыс. руб. /макет</span></div>
</div>
<div><span>Флаер</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Конверт</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Открытка</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Прессвол</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Иконки</span><p></p>
<div><span>5 тыс. руб. / иконка</span></div>
</div>
<div><span>Брошюры</span><p></p>
<div><span>4 тыс. руб. / страница</span></div>
</div>
<div><span>Папки</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Лифлеты</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Бланки</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Блокноты</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Буклеты</span><p></p>
<div><span>4 тыс. руб. / страница</span></div>
</div>
<div><span>Листовки</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Плакаты и постеры</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Пластиковые карты</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
<div><span>Годовой отчет</span><p></p>
<div><span>4 тыс. руб. / страница</span></div>
</div>
<div><span>Иллюстрации</span><p></p>
<div><span>50 тыс. руб. / макет</span></div>
</div>
<div><span>Дизайн фирменных персонажей</span><p></p>
<div><span>50 тыс. руб. / персонаж</span></div>
</div>
<div><span>Оформление социальных сетей</span><p></p>
<div><span>50 тыс. руб. / аккаунт</span></div>
</div>
<div><span>Креативы для социальных сетей</span><p></p>
<div><span>10 тыс. руб. / макет</span></div>
</div>
</div>
            </div>
      
 
 
        </div>
    </div>
</div>

 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>