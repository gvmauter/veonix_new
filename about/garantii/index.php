<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Наши гарантии — официальный договор, соглашение о конфиденциальности, полный возврат денежных средств, если результат не устраивает, уникальность.");
$APPLICATION->SetPageProperty("title", "Гарантии — veonix.ru");

$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Гарантии");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   

$APPLICATION->SetTitle("Гарантии");
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
            <p>Мы высоко ценим доверие клиентов и подходим к каждому заказу серьезно и с высоким уровнем ответственности, подключаем все силы и профессиональные навыки специалистов.</p>
            <p>Наша цель в том, чтобы вы были спокойны за свою репутацию и уверены в пользе, которую принесет сотрудничество со студией дизайна Veonix.</p>
            <p>Нам не просто так доверяют свыше 30 российских и зарубежных компаний. Свои обещания мы подкрепляем упорной работой и высоким качеством сервиса. Даем всесторонние гарантии, что вложения в дизайн будут эффективны. Вы получите именно тот проект, который вам нужен, и приятно удивитесь результату.</p>
            <p><span style="    font-weight: 600;">Официальный договор</span></p>
            <ul>
            <li><span style="    font-weight: 600;">Заключаем договор<br>
            </span>В начале сотрудничества все обязательства фиксируем официально</li>
            <li><span style="    font-weight: 600;">Конфиденциальность<br>
            </span>Не распространяем конфиденциальную информацию и персональные данные. Подписываем соглашение NDA</li>
            <li><span style="    font-weight: 600;">Compliance<br>
            </span>Соблюдаем законодательство и внутренние правила вашей компании</li>
            </ul>
            <p><span style="    font-weight: 600;">Бессрочное постобслуживание</span></p>
            <ul>
            <li><span style="    font-weight: 600;">Правки без ограничений<br>
            </span>Вносим неограниченное количество правок в проект даже после оплаты заказа. Переделываем столько раз, сколько вам нужно</li>
            <li><span style="    font-weight: 600;">Бесплатно исправляем ошибки<br>
            </span>Все ошибки, допущенные по нашей вине, исправим бесплатно в любое время</li>
            </ul>
            <p><span style="    font-weight: 600;">Уникальный проект</span></p>
            <ul>
            <li><span style="    font-weight: 600;">Без шаблонов<br>
            </span>Разрабатываем каждый проект с нуля, не используем заготовки и универсальные шаблоны</li>
            <li><span style="    font-weight: 600;">Защита от плагиата<br>
            </span>Создаем полностью оригинальные проекты — 100% уникальность дизайна и текста</li>
            </ul>
 
        </div>
    </div>
</div>

 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>