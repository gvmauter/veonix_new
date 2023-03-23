<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.pn");

$APPLICATION->SetPageProperty("description", "Настройка amocrm в Москве под ключ. Внедрение амосрм стоимостью 100 000 руб. При заказе стандатной интеграции обучающий вебинар в подарок!");
$APPLICATION->SetPageProperty("title", "Настройка amoCRM в Москве по цене 100 000 руб. — veonix.ru");

$APPLICATION->AddChainItem("Услуги","/services/"); 
$APPLICATION->AddChainItem("Настройка amoCRM");
 
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   
 

$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/branding.css");    
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/amocrm.css");   


?>
<? $APPLICATION->IncludeComponent(
	"veonix:title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"TEMPLATE_FOR_TITLE1" => "Настроим ",
		"TEMPLATE_FOR_TITLE2" => " amoCRM",
		"TEMPLATE_FOR_TITLE3" => "<br>и научим в ней работать",
		"CHECKBOX" => "N",
		"TEXT_1" => "100 000 руб. базовая интеграция
        записываем видео-уроки индивидуально
        под каждого клиента",
		"BT_TEXT" => "Обсудить задачу",
		"TEXT_1_GR" => "",
		"TEXT_2" => "",
		"TEXT_2_GR" => ""
	),
	false
);?>
 
  
 <div class="old_page">
	 
<section class="bx2">
	<div class="main">
		<p class="bx-zg">AmoCRM — CRM <br>для сильного бизнеса</p>
		<div class="bx2-box">
			<div class="bx2-text">
				<p>AmoCRM — удобный сервис для организации взаимодействия с клиентами, который мы поможем внедрить и настроить под ваш бизнес. В нем есть все необходимое для учета и консолидации заявок с любого канала трафика: звонки, email, соцсети, мессенджеры, формы на сайте.</p>
				<p>Каждое обращение учитывается, фиксируется и заносится в систему. Вы легко сможете найти информацию по нужному заказчику, тут же связаться с ним или ответить на его обращение. А ваши менеджеры будут работать в несколько раз эффективней, за счет автоматизации рутинных процессов.</p>
				<p>Настройка amocrm повышает эффективность бизнеса с первого дня использования.</p>
				<img src="/bitrix/templates/veonix/assets/img/old/amo/amocrm-logo.svg" class="logo-amocrm" alt="AmoCRM">
			</div>
			<div class="bx2-image">
				<img src="/bitrix/templates/veonix/assets/img/old/amo/image-1.jpg" class="image-1" alt="">
				<img src="/bitrix/templates/veonix/assets/img/old/amo/image-2.jpg" class="image-2" alt="">
				<img src="/bitrix/templates/veonix/assets/img/old/amo/image-3.jpg" class="image-3" alt="">
			</div>

		</div>
	</div>
</section>

<section class="bx3">
	<div class="main">
		<p class="bx-zg">Знаем продукт изнутри — 4 года <br>работы с AmoCRM</p>
		<div class="bx3-box">
			<div class="bx-pc">
				<img src="/bitrix/templates/veonix/assets/img/old/amo/pc.png" alt="">
			</div>
			<div class="bx3-text">
				<p>Наша команда уже более 4 лет сотрудничает с клиентами, помогая внедрять и настраивать AmoCRM. Обладаем техническим и бизнес-пониманием работы сервиса, знаем нюансы и практики при работе с продуктом. Имеем сертификат официального партнера AmoCRM.</p>
				<p>В своей работе на первое место ставим искреннее стремление помочь каждому заказчику внедрить удобный инструмент для повышения эффективности компании.</p>
			</div>
		</div>
	</div>
</section>

<section class="bx4">
	<div class="main">
		<div class="bx-zg">Делимся лайфхаками</div>
		<div class="bx4-video">
				<p class="bx4-t1">Настройки автоматических действий в DIGITAL воронке amoCRM</p>
				<div class="video-item" id="video1">
					<div class="video-prev" data-id="1">
						<button class="play_video">play</button>
					</div>
					<div class="video-iframe">
						<iframe width="560" height="315" class="lazy" data-src="https://www.youtube.com/embed/E9YhayFaZJQ?rel=0&amp;showinfo=0&amp;enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>					
						<button class="pause_video" data-id="1">Остановить видео</button>
					</div>
				</div>
				<p class="bx4-t1">Источники сделок: лидогенерация amoCRM</p>
				<div class="video-item" id="video2">
					<div class="video-prev" data-id="2">
						<button class="play_video" data-id="2">play</button>
					</div>
					<div class="video-iframe">
						<iframe width="560" height="315"  class="lazy" data-src="https://www.youtube.com/embed/JJhh359pSZA?enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>					
						<button class="pause_video" data-id="2">Остановить видео</button>
					</div>
				</div>
				<p class="bx4-t1">Работа с разделом аналитика в amoCRM</p>
				<div class="video-item" id="video3">
					<div class="video-prev" data-id="3">
						<button class="play_video">play</button>
					</div>
					<div class="video-iframe">
						<iframe width="560" height="315"  class="lazy" data-src="https://www.youtube.com/embed/k-DVBq_8aVE?enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>					
						<button class="pause_video" data-id="3">Остановить видео</button>
					</div>
				</div>
			</div>
	</div>
</section>

<section class="bx5">
	<div class="main">
		<p class="bx-zg">Тарифы на внедрение amoCRM</p>
		<div class="bx5-table mb-table">
			<div class="bx5-row tarif-1">			
				<div class="bx5-colum-2">
					<p class="bx5-zg">Старт</p>
				</div>
				<div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div>
				<div class="bx5-colum-2"><p>1 рабочий день</p></div>
				<div class="bx5-colum-2">
					<div class="bx5-price">
						<p class="bx5-pc-t2">10 000 руб.</p>
						<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Старт - AmoCRM" >Заказать</a>
					</div>
				</div>
				<div class="podrob">
					<button>Подробнее</button>
				</div>
				<div class="full-info">
					<div class="mb-row"><div class="bx5-colum-1"><p>Полный контроль проделанной работы с клиентом</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Автоматическая постановка задач и напоминания</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Мобильное приложение amocrm</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Шаблоны для общения с клиентами</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка дополнительных полей в аккаунте</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настраиваемые отчёты о работе сотрудников</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Поиск дублей</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Внутренний чат с сотрудниками, групповые чаты</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Напоминания на почту, telegram, мобильное приложение</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Синхронизация задач с google-календарём</p></div>	<div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Знакомство с потребностями клиента (созвон в скайпе)</p></div><div class="bx5-colum-2"><p>30 минут</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание аккаунта</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Добавление сотрудников и настройка их прав в системе</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка воронок на основе вашей специфики бизнеса</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка списков и фильтров</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение почтовых ящиков</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка парсера писем</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка целей для сотрудников*</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка задач</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка digital воронки</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка раздела "Покупатели"*</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Импорт базы в amocrm</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение чатов в AMOCRM- VK, FB, Telegram</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции IP телефонии**</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции СМС рассылки**</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции с e-mail рассылкой</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе IP телефонии</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе СМС рассылки</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка сервиса e-mail рассылки</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Обучающий вебинар для сотрудников</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Предоставление карточки работы менеджера <span>(заранее создать типовую и с небольшими правками предоставлять клиенту)</span></p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение гугл аналитики к amocrm	</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Интеграция формы с сайтом</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание кнопки обратной связи в AMOCRM и её размещение</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение рекламных кабинетов VK FB Google...</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div><div class="bx5-colum-2"><p>1 рабочий день</p></div></div>
					<div class="mb-row">
						<div class="bx5-colum-2">
							<div class="bx5-price">
								<p class="bx5-pc-t1">Старт</p>
								<p class="bx5-pc-t2">10 000 руб.</p>
								<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Старт - AmoCRM" >Заказать</a>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="bx5-row tarif-2">			
				<div class="bx5-colum-2">
					<p class="bx5-zg">Стандарт</p>
				</div>
				<div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div>
				<div class="bx5-colum-2"><p>3 рабочих дня</p></div>
				<div class="bx5-colum-2">
					<div class="bx5-price">
						<p class="bx5-pc-t2">25 000 руб.</p>
						<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Стандарт - AmoCRM" >Заказать</a>
					</div>
				</div>
				<div class="podrob">
					<button>Подробнее</button>
				</div>
				<div class="full-info">
					<div class="mb-row"><div class="bx5-colum-1"><p>Полный контроль проделанной работы с клиентом</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Автоматическая постановка задач и напоминания</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Мобильное приложение amocrm</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Шаблоны для общения с клиентами</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка дополнительных полей в аккаунте</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настраиваемые отчёты о работе сотрудников</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Поиск дублей</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Внутренний чат с сотрудниками, групповые чаты</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Напоминания на почту, telegram, мобильное приложение</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Синхронизация задач с google-календарём</p></div>	<div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Знакомство с потребностями клиента (созвон в скайпе)</p></div><div class="bx5-colum-2"><p>60 минут</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание аккаунта</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Добавление сотрудников и настройка их прав в системе</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка воронок на основе вашей специфики бизнеса</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка списков и фильтров</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение почтовых ящиков</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка парсера писем</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка целей для сотрудников*</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка задач</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка digital воронки</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка раздела "Покупатели"*</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Импорт базы в amocrm</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение чатов в AMOCRM- VK, FB, Telegram</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции IP телефонии**</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции СМС рассылки**</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции с e-mail рассылкой</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе IP телефонии</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе СМС рассылки</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка сервиса e-mail рассылки</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Обучающий вебинар для сотрудников</p></div><div class="bx5-colum-2"><p>60 минут</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Предоставление карточки работы менеджера <span>(заранее создать типовую и с небольшими правками предоставлять клиенту)</span></p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение гугл аналитики к amocrm	</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Интеграция формы с сайтом</p></div><div class="bx5-colum-2"><p><span>Стандартные <br>решения</span></p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание кнопки обратной связи в AMOCRM и её размещение</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение рекламных кабинетов VK FB Google...</p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div><div class="bx5-colum-2"><p>3 рабочих дня</p></div></div>
					<div class="mb-row">
						<div class="bx5-colum-2">
							<div class="bx5-price">
								<p class="bx5-pc-t1">Стандарт</p>
								<p class="bx5-pc-t2">25 000 руб.</p>
								<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Стандарт - AmoCRM" >Заказать</a>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="bx5-row tarif-3">			
				<div class="bx5-colum-2">
					<p class="bx5-zg">Премиум</p>
				</div>
				<div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div>
				<div class="bx5-colum-2"><p>от 5 рабочих дней</p></div>
				<div class="bx5-colum-2">
					<div class="bx5-price">
						<p class="bx5-pc-t2">45 000 руб.</p>
						<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Премиум - AmoCRM" >Заказать</a>
					</div>
				</div>
				<div class="podrob">
					<button>Подробнее</button>
				</div>
				<div class="full-info">
					<div class="mb-row"><div class="bx5-colum-1"><p>Полный контроль проделанной работы с клиентом</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Автоматическая постановка задач и напоминания</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Мобильное приложение amocrm</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Шаблоны для общения с клиентами</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка дополнительных полей в аккаунте</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настраиваемые отчёты о работе сотрудников</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Поиск дублей</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Внутренний чат с сотрудниками, групповые чаты</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Напоминания на почту, telegram, мобильное приложение</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Синхронизация задач с google-календарём</p></div>	<div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Знакомство с потребностями клиента (созвон в скайпе)</p></div><div class="bx5-colum-2"><p>до 120 минут</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание аккаунта</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Добавление сотрудников и настройка их прав в системе</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка воронок на основе вашей специфики бизнеса</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка списков и фильтров</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение почтовых ящиков</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка парсера писем</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка целей для сотрудников*</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка задач</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка digital воронки</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка раздела "Покупатели"*</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Импорт базы в amocrm</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение чатов в AMOCRM- VK, FB, Telegram</p></div><div class="bx5-colum-2"><p class="true">+</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции IP телефонии**</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции СМС рассылки**</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение интеграции с e-mail рассылкой</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе IP телефонии</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка аккаунта на сервисе СМС рассылки</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Настройка сервиса e-mail рассылки</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Обучающий вебинар для сотрудников</p></div><div class="bx5-colum-2"><p>2x по 60 минут</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Предоставление карточки работы менеджера <span>(заранее создать типовую и с небольшими правками предоставлять клиенту)</span></p></div><div class="bx5-colum-2"><p class="false">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение гугл аналитики к amocrm	</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Интеграция формы с сайтом</p></div><div class="bx5-colum-2"><p><span>Стандартные <br>решения</span></p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Создание кнопки обратной связи в AMOCRM и её размещение</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Подключение рекламных кабинетов VK FB Google...</p></div><div class="bx5-colum-2"><p class="true">-</p></div></div>
					<div class="mb-row"><div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div><div class="bx5-colum-2"><p>от 5 рабочих дней</p></div></div>
					<div class="mb-row">
						<div class="bx5-colum-2">
							<div class="bx5-price">
								<p class="bx5-pc-t1">Премиум</p>
								<p class="bx5-pc-t2">45 000 руб.</p>
								<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Премиум - AmoCRM" >Заказать</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="bx5-table pc-table">
			<div class="bx5-row">
				<div class="bx5-colum-1"></div>
				<div class="bx5-colum-2">
					<p class="bx5-zg">Старт</p>
				</div>
				<div class="bx5-colum-3">
					<p class="bx5-zg">Стандарт</p>
				</div>
				<div class="bx5-colum-4">
					<p class="bx5-zg">Премиум</p>
				</div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Полный контроль проделанной работы с клиентом</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Автоматическая постановка задач и напоминания</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Мобильное приложение amocrm</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Шаблоны для общения с клиентами</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка дополнительных полей в аккаунте</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настраиваемые отчёты о работе сотрудников</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Поиск дублей</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Внутренний чат с сотрудниками, групповые чаты</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Напоминания на почту, telegram, мобильное приложение</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Синхронизация задач с google-календарём</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Знакомство с потребностями клиента (созвон в скайпе)</p></div>
				<div class="bx5-colum-2"><p>30 минут</p></div><div class="bx5-colum-3"><p>60 минут</p></div><div class="bx5-colum-4"><p>до 120 минут</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Создание аккаунта</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Добавление сотрудников и настройка их прав в системе</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка воронок на основе вашей специфики бизнеса</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка списков и фильтров</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение почтовых ящиков</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка парсера писем</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка целей для сотрудников*</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка задач</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка digital воронки</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка раздела "Покупатели"*</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Импорт базы в amocrm</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение чатов в AMOCRM- VK, FB, Telegram</p></div>
				<div class="bx5-colum-2"><p class="true">+</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение интеграции IP телефонии**</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение интеграции СМС рассылки**</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение интеграции с e-mail рассылкой</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="true">+</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка аккаунта на сервисе IP телефонии</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка аккаунта на сервисе СМС рассылки</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Настройка сервиса e-mail рассылки</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Обучающий вебинар для сотрудников</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p>60 минут</p></div><div class="bx5-colum-4"><p>2x по 60 минут</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Предоставление карточки работы менеджера <span>(заранее создать типовую и с небольшими правками предоставлять клиенту)</span></p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение гугл аналитики к amocrm	</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Интеграция формы с сайтом</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p><span>Стандартные <br>решения</span></p></div><div class="bx5-colum-4"><p><span>Стандартные <br>решения</span></p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Создание кнопки обратной связи в AMOCRM и её размещение</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Подключение рекламных кабинетов VK FB Google...</p></div>
				<div class="bx5-colum-2"><p class="false">-</p></div><div class="bx5-colum-3"><p class="false">-</p></div><div class="bx5-colum-4"><p class="true">+</p></div>
			</div>
			<div class="bx5-row">
				<div class="bx5-colum-1"><p>Время выполнения всех услуг для клиента</p></div>
				<div class="bx5-colum-2"><p>1 рабочий день</p></div><div class="bx5-colum-3"><p>3 рабочих дня</p></div><div class="bx5-colum-4"><p>от 5 рабочих дней</p></div>
			</div>
			<div class="bx5-row">
					<div class="bx5-colum-1"><p></p></div>
					<div class="bx5-colum-2">
						<div class="bx5-price">
							<p class="bx5-pc-t1">Старт</p>
							<p class="bx5-pc-t2">от 50 000 руб.</p>
							<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Старт - AmoCRM" >Заказать</a>
						</div>
					</div>
					<div class="bx5-colum-3">
						<div class="bx5-price">
							<p class="bx5-pc-t1">Стандарт</p>
							<p class="bx5-pc-t2">от 100 000 руб.</p>
							<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Стандарт - AmoCRM" >Заказать</a>
						</div>
					</div>
					<div class="bx5-colum-4">
						<div class="bx5-price">
							<p class="bx5-pc-t1">Премиум</p>
							<p class="bx5-pc-t2">от 200 000 руб.</p>
							<a class="sbm" href="#form" data-fancybox data-text = "Заявка AMOCRM: Тариф Премиум - AmoCRM" >Заказать</a>
						</div>
					</div>
				</div>
		</div>
	</div>
</section>


<section class="bx6">
	<div class="main">
		<p class="bx-zg">Не нашли нужный тариф, оставьте заявку <br>и закажите индивидуальный.</p>
		<div class="bx1-box-main amoform">			
			<a class="sbm  " href="#form" data-fancybox data-text = "AMO Не нашли нужный тариф - AmoCRM" >Оставить заявку</a>
		</div>		
	</div>
</section>

<section class="bx7">
	<div class="main">
		<p class="bx-zg">С нами удобно</p>
		<div class="bx7-main">
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Личный менеджер <br>для  каждого клиента.</p>
					<p class="bx7-t2">Получайте полную поддержку в нужный момент от сотрудника, который разбирается в интеграции amocrm.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-01.svg" alt=""></div>
				</div>
			</div>
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Работа по договору.</p>
					<p class="bx7-t2">Составляем официальный документ, в котором прописаны этапы работ, порядок оплаты и ответственность.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-02.svg" alt=""></div>
				</div>
			</div>
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Удаленная работа.</p>
					<p class="bx7-t2">Вам не придется никуда ехать, а оригиналы закрывающих документов доставит курьер.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-03.svg" alt=""></div>
				</div>
			</div>
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Бесплатное консультирование по любому вопросу даже после завершения проекта.</p>
					<p class="bx7-t2">Получайте ответы по внедрению amocrm в любой момент, не тратя при этом ни рубля.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-04.svg" alt=""></div>
				</div>
			</div>
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Беремся за проекты любого уровня и бюджета.</p>
					<p class="bx7-t2">От сложнейших интеграций для компаний с миллиардными оборотами до точечных задач по настройке виджета или интеграции телефонии.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-05.svg" alt=""></div>
				</div>
			</div>
			<div class="bx7-item">
				<div class="bx7-mg">
					<p class="bx7-t1">Не ограничиваемся только CRM.</p>
					<p class="bx7-t2">По завершении работ или параллельно с внедрением системы предоставляем маркетинговые и дизайн услуги: можем сделать сайт, видеоролик, трафик, чат-бота, брендинг.</p>
					<div class="bx7-img"><img src="/bitrix/templates/veonix/assets/img/old/amo/icon-06.svg" alt=""></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bx8">
	<div class="main">
		<p class="bx-zg">Отвечаем на популярные вопросы.</p>
		<div class="bx8-box">
			<div class="bx8-colum">
					<div class="accordion">
						<div class="accordion_item">
							<p class="title_block">Какой тариф по внедрению мне выбрать?</p>
							<div class="info">
								<p class="info_item">Мы рекомендуем провести экпресс-аудит отдела продаж с нашим экспертом, после которого станет понятно какой тариф по настройке amoCRM вам подойдет больше.</p>
							</div>
						</div>
						<div class="accordion_item">
							<p class="title_block">Зачем мне ваши услуги, если я могу разобраться <br>в программе сам?</p>
							<div class="info">
								<p class="info_item">Возможно, но вы потратите массу времени и сил. Особенно на то, чтобы обучить всему свой персонал. Мы сэкономим вам время и деньги, позволив использовать выгоды платформы с первого дня.</p>
							</div>
						</div>
						<div class="accordion_item">
							<p class="title_block">Боюсь, не смогу ни в чем разобраться, <br>и придется все делать по старинке.</p>
							<div class="info">
								<p class="info_item">Мы оказываем полную поддержку на каждом этапе, вы всегда можете задать вопрос, если чего-то не поняли. Никогда не оставляем клиентов с проблемами настройки amocrm один на один.</p>
							</div>
						</div>
					</div>
			</div>
			<div class="bx8-colum">
					<div class="accordion">
						<div class="accordion_item active_block">
							<p class="title_block">У меня нет отдела продаж — всем занимаюсь  <br>сам. Мне подойдет этот сервис?</p>
							<div class="bl info">
								<p class="info_item">Конечно. Он упростит вам взаимодействие с клиентами, позволит не упустить ни одной заявки и сосредоточиться на развитии бизнеса.</p>
							</div>
						</div>
						<div class="accordion_item">
							<p class="title_block">Зачем мне CRM? Работали же как-то до нее.</p>
							<div class="info">
								<p class="info_item">Да, все как-то работали до нее. А теперь после ее внедрения компании работают до 10 раз эффективнее. Если вы хотите повысить продуктивность бизнеса, вам необходимо автоматизировать рутинные процессы и вывести отношения с клиентами на новый уровень. С этим отлично справится настройка amo crm в нашей компании.</p>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section> 

 
</div>

<?   $asset->addJs(SITE_TEMPLATE_PATH."/assets/js/old/main.js" ); ?> 



 
      
     <? $APPLICATION->IncludeComponent(
         "veonix:form", 
         ".default", 
         array(
             "COMPONENT_TEMPLATE" => ".default",
             "TITLE_1" => "",
             "TITLE_2" => "",
             "TITLE_3" => "",
             "TYPE" => "text",
             "TYPE_TEXT" => "Настройка AmoCRM, Презентация,  Брендбук, Многостраничный сайт, Лендинг, Логотип,  Дизайн упаковки,   Маркетинг-кит, Видеоролик, Коммерческое предложение,     Другое"
         ),
         false
     );?>
     
 
     
      
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>