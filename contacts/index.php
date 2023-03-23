<?
 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Свяжитесь с нами любым удобным для вас способом: телефон, ватсап, телеграм, вайбер, электронная почта, социальные сети. Реквизиты и адрес студии.");
$APPLICATION->SetPageProperty("title", "Контакты студии графического дизайна Veonix — veonix.ru");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");
$APPLICATION->SetTitle("Контакты");
?>

<section class="page_inside contacts_page">
    <div class="main">
        <div class="breadcrumbs_top">
            <a href="/">Главная</a> <i></i> <p>Контакты</p>
        </div>
        <div class="page_inside_title">
            <h1>Контакты</h1>
            <p>студии графического дизайна «Veonix»</p>
        </div>
        <div class="contacts_page_block">
            <div class="contact-page-box-1" itemscope="" itemtype="https://schema.org/Organization" >
                <meta itemprop="name" content="Veonix">
                <div class="contact-page-info">
                    <div class="contact-info-item" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                        <div class="contact-info-left"><p>Адрес:</p></div>
                        <div class="contact-info-right" itemprop="addressLocality">
                            <p>Москва, Пресненская набережная 12, Башня "Федерация", 41 этаж</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-left"><p>Телефоны:</p></div>
                        <div class="contact-info-right"> 
                            <a href="mailto: <?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?>" class="zphone"><span itemprop="telephone"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","phone"));?></span></a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-left"><p>Email:</p></div>
                        <div class="contact-info-right"> 
                            <a href="mailto: <?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","email"));?>">
                                <span itemprop="email"><?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","email"));?></span>
                            </a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-left">
                            <p>Время работы:</p>
                        </div>
                        <div class="contact-info-right"><p>понедельник-пятница с 9:00 до 19:00<br> перерыв с 14:00 до 15:00</p></div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-left"><p>Мессенджеры:</p></div>
                        <div class="contact-info-right">
                            <div class="contact-messeng">
                                <div class="hd-block-social ct-soc">
                                    <ul>
                                        <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","wp"));?>" target="_blank" rel="nofollow noopener noreferrer" class="hd-wh">WH</a></li>
                                        <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","tg"));?>" target="_blank" rel="nofollow noopener noreferrer" class="hd-tg">TG</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-left"><p>Социальные сети:</p></div>
                        <div class="contact-info-right">
                            <div class="contact-social ct-soc">
                                <ul class="soc-box">
                                    <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","vk"));?>" target="_blank" rel="noopener noreferrer"><span><i class="icon-vk-ct"></i></span></a></li>
                                    <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","yb"));?>" target="_blank" rel="noopener noreferrer"><span><i class="icon-youtube-ct"></i></span></a></li>
                                    <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","inst"));?>" target="_blank" rel="noopener noreferrer"><span><i class="icon-instagram-ct"></i></span></a></li>
                                    <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","dzen"));?>" target="_blank" rel="nofollow noopener noreferrer"><span><i class="icon-dzen-ct"></i></span></a></li>
                                    <li><a href="<?echo(\Bitrix\Main\Config\Option::get("grain.customsettings","be"));?>" target="_blank" rel="nofollow noopener noreferrer"><span><i class="icon-behance"></i></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-page-maps"> 
                    <div class="contact-maps"> 
                        <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3A304c1b32b1fd04634796f71e6de852ec76948854744611d33ee081bafbb917dd" frameborder="0" allowfullscreen="true" width="100%" height="510px" style="display: block;"></iframe> 
                    </div>
                </div>
            </div>
            <div class="contact-page-box-2">
                <div class="block-top-text">
                    <h2 class="top-text-t1">Реквизиты</h2>                
                        <h3 class="top-text-t2 " >
                        Индивидуальный предприниматель <br>Некрасов Виктор Владимирович
                        </h3>
                </div>
                <div class="contact-page-box-2-main">
                    <div class="contact-page-box-2-left">
                        <div class="contact-page-info">
                                <div class="contact-info-item">
                                    <div class="contact-info-left"><p>ИНН:</p></div>
                                    <div class="contact-info-right">
                                        <p>710407135800</p>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="contact-info-left"><p>ОГРНИП:</p></div>
                                    <div class="contact-info-right">
                                        <p>317715400000700</p>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="contact-info-left"><p>Банковский счет:</p></div>
                                    <div class="contact-info-right">
                                        <div class="contact-bank-info">
                                            <div class="contact-bank-info-left">

                                                    <div class="contact-bank-info-item">
                                                        <p>Банк</p>
                                                        <p>ФИЛИАЛ "ЦЕНТРАЛЬНЫЙ" БАНКА ВТБ (ПАО) г Москва</p>
                                                    </div>

                                                    <div class="contact-bank-info-item">
                                                        <p>Расчетный счет</p>
                                                        <p>4080 2810 5144 5000 0709</p>
                                                    </div>

                                                    <div class="contact-bank-info-item">
                                                        <p>Корреспондентский счет</p>
                                                        <p>3010 1810 1452 5000 0411</p>
                                                    </div>
                                                    <div class="contact-bank-info-item">
                                                         <p>Валюта счёта</p>
                                                        <p>Российский рубль</p>
                                                    </div>
                                                    <div class="contact-bank-info-item">
                                                         <p>БИК</p>
                                                        <p>044525411</p>
                                                    </div>

                                            </div>
                                  
                                        </div>
                                    </div>

                        </div>
                    </div>
                        </div>
                    <div class="contact-page-box-2-right">
                        <form class="new_form">
                            <input type="hidden" name="region" class="region" value="Russia (Россия)">
                            <input type="hidden" name="theme"  value="Контакты">
                            <div class="form_block_box">
                            <div class="form_block_form">            
                                <div class="form_block_item"><input type="text" name="name" placeholder="Имя" required></div>
                                <div class="form_block_item"><input type="tel" name="phone" class="phone phone_1" placeholder="Телефон" required></div>
                                <div class="form_block_item"><input type="email" name="email" placeholder="Почта" required></div>
                                <div class="form_block_button">
                                    <button href="#form" class="button_line">
                                    <span>Обсудить задачу</span>
                                    <i class="button_line_1"><img class="svg-animate button_line_1_icon" src="/bitrix/templates/veonix/assets/img/button_line_1.svg" alt="button icon"></i>
                                    <i class="button_line_2"></i>
                                    </button>
                                    <p>*Нажимая на кнопку, вы даете согласия <a href="/politika/" target="_blank">на обработку персональных данных</a></p>
                                </div>            
                            </div>
    
                            </div>
                        </form>
                    </div>
                </div>
                
        </div>
                    
        </div>
    </div>
  </section>
 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>