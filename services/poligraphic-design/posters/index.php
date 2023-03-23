<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Креативный дизайн плакатов и постеров на заказ. Качественная печать в высоком разрешении с бесплатной доставкой по Москве. 300+ работ в портфолио. Узнайте стоимость разработки дизайна на сайте.");
$APPLICATION->SetPageProperty("title", "Дизайн плакатов и постеров в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн плакатов и постеров");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");    

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/plakat.css");    

?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Стоимость дизайна",
		"TEMPLATE_FOR_TITLE2" => "плакатов и постеров",
		"TEMPLATE_FOR_TITLE3" => "",
		"CHECKBOX" => "N",
		"TEXT_1" => "Разработаем креативный дизайн плакатов <br> и постеров, мимо которых невозможно будет пройти. Качественная печать в высоком разрешении с бесплатной доставкой по Москве",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>

 
<div class="old_page">
	 
   <section class="pl_b1">
     <div class="main">
       <p class="pl_zag">Какие бывают плакаты и постеры?</p>
       <div class="box1_pl_b1">
         <div class="box1_pl_b1_text">
           <p class="box1_pl_b1_tx1">Плакаты и постеры могут решать разные задачи<br> 
             и приносить значительную пользу для вашего бизнеса.<br> 
             <span class="b">Различают несколько их видов:</span></p>
           <div class="box1_pl_b1_text_box">
             <p class="box1_pl_b1_text_box_tx1">Рекламные:</p>
             <p class="box1_pl_b1_text_box_tx2">Конечно же, основная ассоциация с размещением плакатов<br> 
               и постеров – реклама. Это действительно мощный<br> 
               маркетинговый инструмент. Если люди увидят качественный<br> 
               и креативный дизайн рекламного плаката на окнах вашего<br> 
               офиса, они наверняка замедлят шаг для ознакомления,<br> 
               и совсем не исключено, что зайдут в вашу дверь.</p>
           </div>
           <div class="box1_pl_b1_text_box">
             <p class="box1_pl_b1_text_box_tx1">Информационные:</p>
             <p class="box1_pl_b1_text_box_tx2">Такие плакаты и постеры нацелены на какое-либо сообщение<br> 
               для людей: анонс мероприятия, описание продукта<br> 
               или образовательная информация</p>
           </div>
           <div class="box1_pl_b1_text_box">
             <p class="box1_pl_b1_text_box_tx1">Имиджевые</p>
             <p class="box1_pl_b1_text_box_tx2">Используют как элементы оформления<br> 
               интерьера помещения, выполняют функцию картин. </p>
           </div>
         </div>
         <div class="box1_pl_b1_image">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b1_1.png" alt="Плакаты">
         </div>
       </div>
     </div>
   </section>
   <section class="pl_b5">
     <div class="main">
       <p class="pl_zag">Стоимость дизайна<br> 
         плакатов и постеров</p>
       <div class="box1_pl_b5">
         <p class="pl_opis">В существующих реалиях возникает уже меньше возражений о необходимости эффективного оформления своего бренда. Самодеятельность приносит мало результата, в отличие от профессионального подхода к каждому проекту. Современный дизайн плакатов и постеров – отличный инструмент для вовлечения  аудитории и повышения продаж.</p>
         <p class="pl_opis">Ваши вложения в разработку качественного графического дизайна плаката оправдаются новыми клиентами.</p>
         <div class="box1_pl_b5_item">
           <p class="box1_pl_b5_item_tx">Мы предлагаем услуги премиум качества, WOW-эффект<br> 
             и 100% гарантию результата. Все это по выгодным ценам.</p>
           <p class="box1_pl_b5_item_tx">Стоимость дизайна плакатов и постеров Veonix:</p>
           <div class="box1_pl_b5_item_text">
             <div class="box1_pl_b5_item_text_box">
               <div class="ds-b3-box-right">
                 <p>от 10 000 <i></i></p>
               </div>
               <p class="box1_pl_b5_item_tx">за макет</p>
             </div>
             <div class="box1_pl_b5_item_text_box">
               <div class="ds-b3-box-right">
                 <p>от 3 000 <i></i></p>
               </div>
               <p class="box1_pl_b5_item_tx">разработка рекламных<br>  
                 текстов для плаката </p>
             </div>
           </div>
         </div>
         <p class="pl_opis">Решили заказать дизайн плаката у нас? Дополнительно мы можем написать интересные уникальные тексты для ваших плакатов и напечатать их в партнерской типографии со скидкой 20%.</p>
         <p class="pl_opis">В итоге вы получаете готовый маркетинговый инструмент, который привлечет новых клиентов и повысит уровень продаж.</p>
         <p class="pl_opis">Конечная цена дизайна плаката и постера зависит от комплекса услуг и конкретных задач.</p>
       </div>
     </div>
   </section>
   <section class="pl_b2">
     <div class="main">
       <p class="pl_zag">Разработаем уникальный графический<br> 
         дизайн плакатов и постеров<br> 
         для любых целей</p>
       <div class="pl_opis_box">
         <p class="pl_opis">Плакаты и постеры выполняют разные задачи, но то, насколько эффективно они будут это делать, зависит от их оформления. К созданию нужно подходить креативно, со смелыми идеями. В дизайне плакатов и постеров можно экспериментировать.</p>
         <p class="pl_opis">Оригинальный подход и профессиональная разработка дизайна плакатов помогут вашему бренду запомниться, повысят узнаваемость.</p>
         <p class="pl_opis">Кроме того, наши специалисты учитывают необходимые маркетинговые принципы при создании графического дизайна плакатов и постеров:</p>
       </div>
       <div class="box1_pl_b2">
         <div class="box1_pl_b2_img">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b2_1.png" alt="Плакаты">
         </div>
         <div class="box1_pl_b2_text">
           <div class="box1_pl_b2_text_item">
             <p>Отвечают  правилу 3-х секунд</p>
             <p>суть улавливается на ходу</p>
           </div>
           <div class="box1_pl_b2_text_item">
             <p>Выделяют вас на фоне других</p>
             <p>благодаря персональному подходу к разработке</p>
           </div>
           <div class="box1_pl_b2_text_item">
             <p>Привлекают новых клиентов </p>
             <p>и запоминаются существующим </p>
           </div>
           <div class="box1_pl_b2_text_item">
             <p>Охватывают широкую аудиторию </p>
             <p>тысячи человек узнают о вас</p>
           </div>
           <div class="box1_pl_b2_text_item">
             <p>Легко воспринимаются</p>
             <p>не перегружены лишней информацией</p>
           </div>
         </div>
       </div>
     </div>
   </section>
    
   <section class="pl_b4">
     <div class="main">
       <p class="pl_zag">Какой дизайн<br> 
         плакатов и постеров мы делаем</p>
       <div class="box1_pl_b4">
         <div class="box1_pl_b4_column">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_1.jpg" alt="Плакаты">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_2.jpg" alt="Плакаты">
         </div>
         <div class="box1_pl_b4_column">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_3.jpg" alt="Плакаты">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_4.jpg" alt="Плакаты">
         </div>
         <div class="box1_pl_b4_column">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_5.jpg" alt="Плакаты">
           <img src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b4_6.jpg" alt="Плакаты">
         </div>
       </div>
       <p class="pl_b4_tx">Посмотреть все работы</p>
       <a class="sbm" href="/portfolio/">Галерея</a>
     </div>
   </section>
   <section class="pl_b6">
     <div class="main">
       <div class="box1_pl_b6">
         <div class="ds-bg-zg ds-bg-1">
           <p>Выгоды сотрудничества</p>
         </div>
       </div>
       <div class="box2_pl_b6">
         <p class="pl_opis">Наши специалисты учтут особенности вашего бизнеса, прислушаются к идеям и пожеланиям. На выходе вы получите современный дизайн плаката, выполненный по всем трендам и отличающий вас от других. Мы проводим персональную работу и разрабатываем уникальный дизайн ваших проектов; берем ответственность за результат и гарантируем его. Не зря крупнейшие компании доверяют именно нам.</p>
         <div class="box2_pl_b6_sotr">
           <div class="box2_pl_b6_sotr_item">
             <p>Анализ целевой аудитории</p>
             <p>Все маркетинговые приемы<br> 
               и проект в целом разрабатывается<br> 
               с учетом потребностей ваших<br> 
               клиентов</p>
           </div>
           <div class="box2_pl_b6_sotr_item">
             <p>Опытные специалисты</p>
             <p>Наша команда дизайнеров<br>  
               и маркетологов создают<br> 
               эффективные плакаты, которые<br> 
               действительно запоминаются</p>
           </div>
           <div class="box2_pl_b6_sotr_item">
             <p>Командная работа</p>
             <p>Ваш плакат создается силами<br> 
               сразу нескольких умов и под<br> 
               чутким наблюдением руководства</p>
           </div>
           <div class="box2_pl_b6_sotr_item">
             <p>Результат точно в срок</p>
             <p>Мы с уважением относимся<br> 
               к вашему времени и планам,<br> 
               поэтому готовый проект вы<br> 
               получите в указанную дату</p>
           </div>
           <div class="box2_pl_b6_sotr_item">
             <p>100% гарантии</p>
             <p>Мы гарантируем, что создадим<br> 
               для вас уникальный плакат,<br> 
               который узнают и точно<br>
               ни с чем не спутают</p>
           </div>
         </div>
       </div>
     </div>
   </section>
   <section class="pl_b7">
     <div class="main">
       <div class="box1_pl_b7">
         <div class="ds-bg-zg ds-bg-1">
           <p>Несколько фактов о студии Veonix</p>
         </div>
       </div>
       <div class="box2_pl_b7">
         <div class="box2_pl_b7_item">
           <img class="box2_pl_b7_item_img" src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b7_1.png" alt="Более 20 сотрудников">
           <p class="box2_pl_b7_item_tx"><span class="b">Более 20 сотрудников</span><br> 
             Только опытные штатные<br> 
             специалисты</p>
         </div>
         <div class="box2_pl_b7_item">
           <img class="box2_pl_b7_item_img" src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b7_2.png" alt="С 2017 года">
           <p class="box2_pl_b7_item_tx"><span class="b">С 2017 года</span><br> 
             Работаем на рынке<br> 
             дизайна и полиграфии</p>
         </div>
         <div class="box2_pl_b7_item">
           <img class="box2_pl_b7_item_img" src="/bitrix/templates/veonix/assets/img/old/plakat/pl_b7_3.png" alt="Более 500 проектов">
           <p class="box2_pl_b7_item_tx"><span class="b">Более 500 проектов</span><br> 
             Успешно выполнено и приносят<br> 
             прибыль своим заказчикам</p>
         </div>
       </div>
       <p class="pl_opis">Наша компания – команда опытных профессионалов, в которой каждый досконально знает<br> 
         специфику собственной работы, любит и уважает свой труд, имеет массу идей, которые ждут<br> 
         заветного часа. Благодаря этому вы получаете оригинальный современный дизайн плакатов и<br>
         постеров, а также другие проекты.</p>
       <p class="pl_opis">Мы пишем свою историю вместе с вами! </p>
     </div>
   </section>
   <section class="pl_b8">
     <div class="main">
       <p class="pl_zag">Наши гарантии</p>
       <p class="pl_opis">К сотрудничеству с вами мы подходим со всей серьезностью и<br> 
         ответственностью. Хотим, чтобы вы нам доверяли и были спокойны,<br> 
         поэтому даем целый ряд гарантий эффективного результата </p>
       <div class="box1_pl_b8">
         <div class="box1_pl_b8_item">
           <div class="box1_pl_b8_item_tx1">
             <p>01</p>
           </div>
           <p class="box1_pl_b8_item_tx2">Уникальный проект</p>
           <p class="box1_pl_b8_item_tx3">Создаем авторский<br> 
             современный дизайн плакатов<br> 
             и постеров, без плагиата</p>
         </div>
         <div class="box1_pl_b8_item">
           <div class="box1_pl_b8_item_tx1">
             <p>02</p>
           </div>
           <p class="box1_pl_b8_item_tx2">Пунктуальность</p>
           <p class="box1_pl_b8_item_tx3">Свой проект вы получите<br> 
             точно в срок</p>
         </div>
         <div class="box1_pl_b8_item">
           <div class="box1_pl_b8_item_tx1">
             <p>03</p>
           </div>
           <p class="box1_pl_b8_item_tx2">Конфиденциальность</p>
           <p class="box1_pl_b8_item_tx3">Можете не беспокоиться<br> 
             о предоставленной информации.<br> 
             Ваши данные под защитой</p>
         </div>
         <div class="box1_pl_b8_item">
           <div class="box1_pl_b8_item_tx1">
             <p>04</p>
           </div>
           <p class="box1_pl_b8_item_tx2">Внесение правок</p>
           <p class="box1_pl_b8_item_tx3">В случае, если вы нашли<br> 
             ошибку, мы бесплатно внесем<br> 
             необходимые корректировки</p>
         </div>
       </div>
     </div>
   </section>
   <section class="pl_b9">
     <div class="main">
       <div class="box1_pl_b9">
         <div class="ds-bg-zg ds-bg-1">
           <p>Как заказать дизайн плакатов и постеров</p>
         </div>
       </div>
       <div class="box2_kt_b6_shags">
         <div class="box2_kt_b6_shags_item">
           <p>1. Шаг. Заявка</p>
           <p>Оставляете заявку,<br> 
             консультируем, выясняем<br> 
             ваши потребности и ожидания</p>
         </div>
         <div class="box2_kt_b6_shags_item">
           <p>2. Шаг. Анализ</p>
           <p>Проводим маркетинговый<br> 
             анализ вашего бизнеса,<br> 
             продукта, конкурентов<br> 
             </p>
         </div>
         <div class="box2_kt_b6_shags_item">
           <p>3. Шаг. Разработка</p>
           <p>Генерируем идеи, создаём<br> 
             3-5 вариантов концепций,<br> 
             из которых выбираете<br> 
             лучший</p>
         </div>
         <div class="box2_kt_b6_shags_item">
           <p>4. Шаг. Дизайн</p>
           <p>Дорабатываем выбранную<br> 
             концепцию, придумываем<br> 
             слоганы, пишем текст,<br> 
             создаём дизайн</p>
         </div>
         <div class="box2_kt_b6_shags_item">
           <p>5.Шаг.  Утверждение</p>
           <p>Присылаем макет вам на<br> 
             утверждение, вносим<br> 
             финальные правки, если<br> 
             есть необходимость</p>
         </div>
         <div class="box2_kt_b6_shags_item">
           <p>6. Шаг. Печать</p>
           <p>Отправляем плакат<br> 
             на печать,макет остаётся<br> 
             у вас для повторной печати<br>
             в любое время</p>
         </div>	
       </div>
     </div>
   </section>
   <section class="pl_b10">
     <div class="main">
       <div class="main-780">
         <p class="pl_zag">Как выглядит хороший<br> 
           дизайн плаката?</p>
         <p class="pl_opis">Разработка плакатов и постеров допускает реализацию самых смелых творческих идей. С одной стороны, это плюс, потому что можно размахнуться, но с другой, это может сыграть против ожидаемых результатов и не выполнить задач информационного или рекламного характера.</p>
         <p class="pl_opis">Поэтому и для дизайна плакатов существуют рекомендации, с которыми не лишним будем познакомиться, чтобы размещенные вами плакаты и постеры привлекали внимание, собирали аудиторию и повышали продажи. </p>
         <div class="box2_kt_b7">
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Размер плаката должен соответствовать месту размещения</p>
             <p class="box2_kt_b7_item_tx2">Плакаты печатаются для размещения в различных местах, и размеры нужно подбирать такие, чтобы всю информацию на плакате можно было считать без особых усилий. Особый акцент при разработке дизайна плаката должен быть сделан на основные элементы (заголовок, объект рекламы, логотип), но и дополнительная информация должна легко восприниматься (контакты, графическое оформление).</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Сбалансированное расположение объектов</p>
             <p class="box2_kt_b7_item_tx2">При размещении всех необходимых элементов на плакате, важно соблюдать баланс. Плакат, как правило, включает в себя как текстовые, так и графические составляющие, и важно расположить все так, чтобы у зрителя не рассеялось внимание и он смог уловить главную мысль.</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Оформление в едином стиле</p>
             <p class="box2_kt_b7_item_tx2">Избегайте смешения стилей при разработке дизайна плаката. Не стоит смешивать, например, современный и классический стиль, или имиджевые арт-объекты с большим количеством технического текста. Выдерживайте единую стилистику.</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Яркий образ</p>
             <p class="box2_kt_b7_item_tx2">Основная задача плакатов и постеров – обратить внимание людей. Это будет несложно сделать, если ваш плакат будет содержать яркий, выразительный образ. Пусть на нем разместится броская картинка, фотография, графическая иллюстрация или фото знаменитости (естественно, с соблюдением всех прав). Но с яркими цветами надо быть аккуратным и не переборщить.</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Привлекающий заголовок</p>
             <p class="box2_kt_b7_item_tx2">Если на плакате есть заголовок, то он должен быть ярким и лаконичным, но в то же время сразу давать понять, о чем идет речь. Например, если вы запускаете сезон распродаж, то пусть  заголовок кричит об этом. Он должен быть таких размеров, чтобы любой взгляд вылавливал его даже с внушительного расстояния.</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Только самый необходимый текст</p>
             <p class="box2_kt_b7_item_tx2">На самом деле, текстовую информацию в дизайне плаката лучше минимизировать. Но это не табу. Если необходимо разместить текст, то фразы должны быть емкими и информативными, а шрифт – единым, достаточно крупным и хорошо читаемым.</p>
           </div>
           <div class="box2_kt_b7_item">
             <p class="box2_kt_b7_item_tx1">Использование цвета для привлечения внимания</p>
             <p class="box2_kt_b7_item_tx2">Яркие цвета, безусловно, привлекают внимание, но с ними нужно быть очень аккуратным. Иногда активное использование нескольких таких цветов может помешать восприятию информации, вызывая рябь в глазах. Поэтому все должно быть в меру. Можно делать яркие акценты, которые будут уместно смотреться на сдержанном фоне.</p>
           </div>
         </div>
         <p class="pl_opis">Суммарный учет всех факторов разработки плакатов и постеров сделает проект по-настоящему качественным. Специалисты нашей студии знают, как грамотно распоряжаться всеми возможностями и правилами создания дизайна постеров. К широкой базе знаний они применяют весь свой опыт, креативные идеи и талант исполнения.</p>
         <p class="pl_opis">Помните, что оформление по шаблону есть у многих, а чтобы действительно выделиться и запомниться, нужно подойти к созданию дизайна профессионально, с умом и оригинальными решениями. Берегите свою уникальность!</p>	
       </div>
     </div>
   </section>
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
   <section class="poleznaya">
       <div class="main">
           <h2 class="home_h2">Полезная информация по теме</h2>
           <p><a href="https://veonix.ru/blog/kak-generirujutsya-unikalnye-idei-dizajna/">Как генерируются уникальные идеи дизайна?</a></p>
           <p><a href="https://veonix.ru/blog/kak-obektivno-ocenit-kachestvo-dizajna/">Как объективно оценить качество дизайна?</a></p>
           <p><a href="https://veonix.ru/blog/pochemu-nuzhno-sozdavat-unikalnyj-dizajn-a-ne-kopirovat-udachnye-resheniya-2/">Почему нужно создавать уникальный дизайн, а не копировать удачные решения?</a></p>
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
       "TYPE_TEXT" => "Плакат и постер, Коммерческое предложение, Визитка, Листовка, Годовой отчет, Каталог, Буклет, Брошюра, Прессвол, Roll Up, Другое"
     ),
     false
   );?>
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>