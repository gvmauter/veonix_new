<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/og_image_website.jpg");

$APPLICATION->SetPageProperty("description", "Заказать дизайн ролл апа, печать стендов, монтаж. Купить конструкцию Roll Up с бесплатной доставкой по Москве в студии дизайна Veonix.");
$APPLICATION->SetPageProperty("title", "Заказать Roll Up в Москве — студия дизайна Veonix");

$APPLICATION->AddChainItem("Услуги","/services/");
$APPLICATION->AddChainItem("Полиграфический дизайн","/poligraphic-design/");
$APPLICATION->AddChainItem("Дизайн Roll Up");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
 

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/rollup.css");   


?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Дизайн стендов",
		"TEMPLATE_FOR_TITLE2" => " Roll Up",
		"TEMPLATE_FOR_TITLE3" => " ",
		"CHECKBOX" => "N",
		"TEXT_1" => "Креативный дизайн, печать, монтаж и продажа мобильных стендов роллап с бесплатной доставкой по Москве",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
  
<div class="old_page">
<section class="uslugi">
    <div class="main">
        <div class="container">
            <div class="cifry-head">О нас в цифрах</div>
            <div class="cifry">
                <div class="item">
                    <p><span class="cifry-name">5+</span><br> <span class="cifry-desk">лет опыта</span></p>
                    <p>Создаем успешные digital-проекты для бизнеса с 2017 года</p>
                </div>
                <div class="item">
                    <p><span class="cifry-name">20+</span><br> <span class="cifry-desk">сотрудников</span></p>
                    <p>В составе студии только опытные профессионалы с внушительным бэкграундом</p>
                </div>
                <div class="item">
                    <p><span class="cifry-name">30+</span><br> <span class="cifry-desk">компаний</span></p>
                    <p>На постоянной основе с нами сотрудничают российские и зарубежные компании</p>
                </div>
                <div class="item">
                    <p><span class="cifry-name">500+</span><br> <span class="cifry-desk">проектов</span></p>
                    <p>Наша студия успешно реализует различные проекты один за другим</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rl_b1">
	<div class="main">
		<div class="ds-bg-zg ds-bg-1" style="background: url('/bitrix/templates/veonix/assets/img/old/shutterstock_1010771878-ai.jpg') center no-repeat;">
		<p>Грамотная разработка дизайна<br>  ролл ап — успех вашего мероприятия</p>
		</div>

		
		<p class="rl_b1_opis"><span style="font-weight: 600;">Собрались участвовать в конференции, выставке или презентации нового продукта?<br> 
			Заявите о себе с помощью мобильного выставочного стенда roll up.</span></p>
		<p class="rl_b1_opis">Установленная в людном месте компактная конструкция не останется незамеченной. А профессионально выполненный дизайн ролл апа привлечет внимание и убедительно расскажет о преимуществах вашего товара, услуги или акции. Разработанные в студии Veonix стенды всегда имеют современный, яркий и содержательный дизайн.</p>
		<div class="box1_pl_b2">
			<div class="box1_rl_b1_img">
				<img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b1_1.png" alt="Roll Up">
			</div>
			<div class="box1_rl_b1_text">
				<div class="box1_rl_b1_text_item">
					<p>Быстро привлекают внимание</p>
					<p>Оригинальный и лаконичный дизайн вызывает интерес и желание прочитать ваше рекламное сообщение.</p>
				</div>
				<div class="box1_rl_b1_text_item">
					<p>Легко подают информацию</p>
					<p>Просто и логично доносят ваши главные преимущества с отстройкой от конкурентов.</p>
				</div>
				<div class="box1_rl_b1_text_item">
					<p>Работают на ваш имидж</p>
					<p>Посетители обязательно запомнят ваш логотип. Он отложится в их памяти и всплывёт, когда потребуются ваши услуги или товары.</p>
				</div>
				<div class="box1_rl_b1_text_item">
					<p>Легок в обращении</p>
					<p>Возьмите роллап с собой в самолет, метро или такси. Удобная конструкция разбирается и собирается за 2 минуты. </p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="rl_box_form">
	<div class="main">
		<div class="main-970">
			<p class="ds-form-box-t1">У вашей компании есть брендбук?</p>
			<p class="ds-form-box-t2">Закажите изготовление дизайна roll up прямо<br> 
				сейчас со скидкой в 20%</p>
			<a class="sbm" href="#order" data-fancybox data-text = "Закажите изготовление дизайна roll up " >ЗАКАЗАТЬ ЗВОНОК</a>
              
		</div>
	</div>
</section>
<section class="rl_b3">
	<div class="main">
		<div class="ds-bg-zg ds-bg-1 lazy" data-bg="/bitrix/templates/veonix/assets/img/old/poligraphic-design/ds-bg-1.jpg">
			<p>Сколько стоит разработка<br> 
			дизайна ролл ап?</p>
		</div>
		<div class="box1_pl_b5">
			<p class="pl_opis"><span style="font-weight: 600;">ТОП</span>овый дизайн от наших специалистов — это креативный подход плюс органичное соответствие стилю вашего бренда. </p>
			<p class="pl_opis">Мы пишем тексты, которые цепляют за живое и вызывают отклик на ваше предложение.</p>
			<div class="box1_pl_b5_item">
				<div class="box1_pl_b5_item_text">
					<div class="box1_pl_b5_item_text_box">
						<div class="ds-b3-box-right ">
							<p>от 5 000 <i></i></p>
						</div>
						<p class="box1_pl_b5_item_tx"><span style="font-weight: 600;">Создание дизайна</span><br> 
							(цена за макет)</p>
					</div>
					<div class="box1_pl_b5_item_text_box">
						<div class="ds-b3-box-right">
							<p>от 3 000 <i></i></p>
						</div>
						<p class="box1_pl_b5_item_tx">Текст для ролл апа</p>
					</div>
				</div>
			</div>
			<div class="box1_rl_b3">
				<p>При заказе дизайна двустороннего роллапа или двух и более макетов цена <br>
					дизайна ролл апа уменьшается на 20%</p>
				<p>Мы не используем шаблоны в своей работе, только авторский дизайн<br> 
					и иллюстрации выполненные от руки. </p>
			</div>
		</div>
	</div>
</section>
<section class="rl_b2">
	<div class="main">
		<div class="main-970">
			<p class="rl_b1_zag center">Выбирайте подходящий стенд roll up</p>
			<div class="ds-b2-box-1">
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Standard</p>
						<p class="ds-b2-box-1-item-t2">Классическая модель стенда roll up.</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 3 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_1.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Smart  </p>
						<p class="ds-b2-box-1-item-t2">Новинка с концептуальным дизайном</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 4 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_2.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Premium </p>
						<p class="ds-b2-box-1-item-t2">Утяжеленная модель с усиленными креплениями вертикальной стойки</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 4 500 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_3.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Luxury </p>
						<p class="ds-b2-box-1-item-t2">Стенд с эргономичным каплевидным корпусом </p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 10 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_4.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Luxury Light </p>
						<p class="ds-b2-box-1-item-t2">Версия модели Luxury<br> 
							с уменьшенной массой</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 8 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_5.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Double<br>
							Luxury </p>
						<p class="ds-b2-box-1-item-t2">Каплевидная модель для 2-х<br> 
							информационных полотен</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 12 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_6.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Double Standard </p>
						<p class="ds-b2-box-1-item-t2">Обычная модель, рассчитанная на два полотна</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 8 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_7.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text ">
						<p class="ds-b2-box-1-item-t1">Roll Up Profi </p>
						<p class="ds-b2-box-1-item-t2">Модель, в которой все внешние элементы спрятаны в стильном корпусе</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 9 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_8.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Colour </p>
						<p class="ds-b2-box-1-item-t2">Ролл ап с каплевидным основанием<br> 
							и цветными накладками на торцах</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 8 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_9.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
				<div class="ds-b2-box-1-item">
					<div class="ds-b2-box-1-item-text">
						<p class="ds-b2-box-1-item-t1">Roll Up Moving </p>
						<p class="ds-b2-box-1-item-t2">Модель с автоматически движущимся рекламным полотном</p>
						<div class="ds-b3-box-right cen_ser">
							<p>от 12 000 <i></i></p>
						</div>
					</div>
					<div class="ds-b2-box-1-item-img_box">
						<div class="ds-b2-box-1-item-images"><img src="/bitrix/templates/veonix/assets/img/old/rollup/rl_b2_10.png" alt="Стенд Roll Up"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="rl_box_form2">
	<div class="main">
		<div class="main-970">
			<p class="ds-form-box-t1">Все цены указаны на модели шириной 85 см.</p>
			<p class="ds-form-box-t2">Наличие других размеров уточняйте по телефону<br> 
			<a class="zphone" href="tel:<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></a>
			</p>
			<a class="sbm" href="#order" data-fancybox data-text = "Все цены указаны на модели шириной 85 см- RollUp" >ЗАКАЗАТЬ ЗВОНОК</a>

             
		</div>
	</div>
</section>
<section class="rl_b4">
	<div class="main">
		<div class="box1_rl_b4">
			<div class="ds-bg-zg ds-bg-1">
				<p>Печать роллапа</p>
			</div>
		</div>
		<div class="box2_rl_b4">
			<div class="box2_rl_b4_opis">
				<p class="box2_rl_b4_opis_tx1">В студии Veonix вы можете заказать не только дизайн<br> 
					мобильного стенда roll up. </p>
				<p>Также мы осуществляем высококачественную типографскую печать ролл апа в высоком разрешении. Наши сотрудники заправят готовое распечатанное полотно во встроенный механизм и стенд ап будет полностью готов к мероприятию.</p>
			</div>
			<div class="box2_rl_b4_cen">
				<p class="box2_rl_b4_opis_tx1">Мы делаем печать ролл апа на следующих материалах:</p>
				<div class="box2_rl_b4_cen_box">
					<div class="box2_rl_b4_cen_box_item">
						<div class="ds-b3-box-right cen_ser">
							<p>от 2 000 <i></i></p>
						</div>
						<p>Баннерная<br> 
							ткань</p>
					</div>
					<div class="box2_rl_b4_cen_box_item">
						<div class="ds-b3-box-right cen_ser">
							<p>от 3 000 <i></i></p>
						</div>
						<p>Полипропилен</p>
					</div>
					<div class="box2_rl_b4_cen_box_item">
						<div class="ds-b3-box-right cen_ser">
							<p>от 5 000 <i></i></p>
						</div>
						<p>Фотобумага<br>  
							с ламинацией</p>
					</div>
				</div>
				<div class="box2_rl_b4_cen_ps">
					<p>Цены указаны за печать роллапа с полотном 85х200 см и монтажом</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="rl_b5">
	<div class="main">
		<div class="box1_rl_b5">
			<div class="ds-bg-zg ds-bg-1">
				<p>Доставка роллапа</p>
			</div>
		</div>
		<p class="rl_b5_tx">При заказе роллапа под ключ (дизайн, печать и<br> 
			конструкция) осуществляем бесплатную курьерскую<br> 
			доставку по Москве до двери. </p>
		<p class="rl_b1_zag center">Наши гарантии</p>
		<div class="box2_rl_b5">
			<div class="box2_rl_b5_item">
				<div class="box2_rl_b5_item_icon"></div>
				<p class="box2_rl_b5_item_tx1">100% money back</p>
				<p class="box2_rl_b5_item_tx2">если результат<br> 
					не устраивает</p>
			</div>
			<div class="box2_rl_b5_item">
				<div class="box2_rl_b5_item_icon"></div>
				<p class="box2_rl_b5_item_tx1">Конфиденциальность</p>
				<p class="box2_rl_b5_item_tx2">Заключаем соглашение<br> 
					о неразглашении</p>
			</div>
			<div class="box2_rl_b5_item">
				<div class="box2_rl_b5_item_icon"></div>
				<p class="box2_rl_b5_item_tx1">Точно в срок</p>
				<p class="box2_rl_b5_item_tx2">Отвечаем рублем каждый<br> 
					день просрочки</p>
			</div>
			<div class="box2_rl_b5_item">
				<div class="box2_rl_b5_item_icon"></div>
				<p class="box2_rl_b5_item_tx1">Антиплагиат</p>
				<p class="box2_rl_b5_item_tx2">Проверяем дизайн<br> 
					и тексты на плагиат</p>
			</div>
		</div>
		<p class="rl_b1_zag center">Нас выбирают<br> 
			крупнейшие компании</p>
		<div class="box3_lt_b4-image">
			<img src="/bitrix/templates/veonix/assets/img/old/lg/37.svg" alt="газпром">
			<img src="/bitrix/templates/veonix/assets/img/old/lg/8.svg" alt="дума">
			<img src="/bitrix/templates/veonix/assets/img/old/lg/14.svg" alt="ситилинк">
			<img src="/bitrix/templates/veonix/assets/img/old/lg/1.svg" alt="beeline">
			<img src="/bitrix/templates/veonix/assets/img/old/lg/3.svg" alt="лэтуаль">
		</div>
		<div class="box3_rl_b5">
			<p>Посмотреть других<br> 
				наших клиентов</p>
			<a class="sbm" href="/customers/">подробнее</a>
		</div>
	</div>
</section>
<section class="rl_b6">
	<div class="main">
		<div class="box1_rl_b6">
			<div class="ds-bg-zg ds-bg-1">
				<p>Ценность Roll Up</p>
			</div>
		</div>
		<p class="rl_b1_zag center">Почему ролл ап незаменим<br> 
			для презентаций и выставок</p>
		<div class="box2_rl_b6">
			<div class="box2_rl_b6_opis">
				<p>Ролл ап – это легкий и удобный раздвижной мобильный стенд с большим информационным полотном, который за пару минут устанавливается в любом помещении. После окончания мероприятия полотно при помощи встроенного механизма быстро сматывается в рулон. А ножки и другие части конструкции складываются и собираются в чехол для переноски. </p>
				<p>Где бы ни была намечалась встреча с клиентами – в офисе или выставочном зале, вы всегда будете готовы представить свою компанию или проект с наилучшей стороны. Главное – профессионально разработанный дизайн мобильного выставочного стенда roll up. Ведь именно он – гарантия того, что ваше сообщение достигнет поставленной цели. </p>
				<p>Чтобы ролл ап работал на результат, мы разрабатываем креативное оформление и пишем емкий текст с ярким заголовком, сильным оффером и убедительным описанием ваших преимуществ.</p>
			</div>
			<div class="box2_rl_b6_box">
				<div class="box2_rl_b6_box_item">
					<p class="box2_rl_b6_box_item_tx1">Современный вид</p>
					<p class="box2_rl_b6_box_item_tx2">Реклама на стенде ролл ап смотрится стильно и показывает высокий уровень компании</p>
				</div>
				<div class="box2_rl_b6_box_item">
					<p class="box2_rl_b6_box_item_tx1">Легкая сборка и разборка</p>
					<p class="box2_rl_b6_box_item_tx2">Чтобы установить или собрать стенд, требуется всего несколько движений</p>
				</div>
				<div class="box2_rl_b6_box_item">
					<p class="box2_rl_b6_box_item_tx1">Большая рекламная площадь</p>
					<p class="box2_rl_b6_box_item_tx2">Размер информационного полотна позволяет легко разместить всю важную информацию</p>
				</div>
				<div class="box2_rl_b6_box_item">
					<p class="box2_rl_b6_box_item_tx1">Универсальность</p>
					<p class="box2_rl_b6_box_item_tx2">Вы можете использовать стенд roll up для разных акций, просто заменяйте информационное полотно</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="rl_b7">
	<div class="main">
		<div class="box1_rl_b7">
			<div class="ds-bg-zg ds-bg-1">
				<p>Как мы работаем с заказчиком</p>
			</div>
		</div>
		<div class="box2_rl_b7">
			<div class="box2_kt_b6_shags">
				<div class="box2_kt_b6_shags_item">
					<p>1. Шаг. Заявка на сайте</p>
					<p>Мы связываемся с вами,<br> 
						чтобы узнать детали<br> 
						заказа.
						</p>
				</div>
				<div class="box2_kt_b6_shags_item">
					<p>2. Шаг. Договор</p>
					<p>Работаем открыто и несем<br> 
						ответственность за качество.</p>
				</div>
				<div class="box2_kt_b6_shags_item">
					<p>3. Шаг. Постановка задачи</p>
					<p>Маркетолог согласует с вами<br> 
						основные цели, на которые<br> 
						направлен дизайн ролл апа.</p>
				</div>
				<div class="box2_kt_b6_shags_item">
					<p>4. Шаг. Бриф на дизайн</p>
					<p>Ответьте на вопросы о том,<br>  
						как должен выглядеть ваш<br> 
						идеальный стенд</p>
				</div>
				<div class="box2_kt_b6_shags_item">
					<p>5.Шаг.  Разработка дизайна</p>
					<p>Мозговой штурм, создание<br> 
						эскиза и готового макета<br> 
						для ролл апа</p>
				</div>
				<div class="box2_kt_b6_shags_item">
					<p>6. Шаг. Стенд под ключ и доставка</p>
					<p>Вы получаете готовый ролл<br> 
						ап с доставкой до двери.</p>
				</div>
				
			</div>
			<div class="box2_rl_b6_opis">
				<p>Сегодня ролл ап – незаменимый маркетинговый инструмент для любой компании, которая стремится расширять горизонты и действовать эффективнее конкурентов. Но лишь изготовление дизайна roll up у профессионалов делает использование стендов по-настоящему результативным.</p>
				<p>Наша команда разработала сотни успешных ролл апов, которые принесли заказчикам новые возможности для увеличения прибыли. 70% наших клиентов возвращаются снова и советуют нас партнёрам по бизнесу. Почему? Потому, что, делая свою работу, мы получаем удовольствие от успешного результата. </p>
			</div>
		</div>
	</div>
</section>
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

<section class="poleznaya">
    <div class="main">
        <h2 class="home_h2">Полезная информация по теме</h2>
        <p><a href="https://veonix.ru/blog/kakim-principam-nuzhno-sledovat-pri-razrabotke-dizajna/">Каким принципам нужно следовать при разработке дизайна?</a></p>
        <p><a href="https://veonix.ru/blog/sovremennyj-branding/">Современный брендинг</a></p>
        <p><a href="https://veonix.ru/blog/osnovnye-professionalnye-terminy-v-graficheskom-dizajne/">Основные профессиональные термины в графическом дизайне</a></p>
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
		"TYPE_TEXT" => "Roll Up, Каталог, Флаер, Коммерческое предложение, Визитка, Листовка, Годовой отчет,  Буклет, Брошюра, Прессвол,   Другое"
	),
	false
);?>

 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>