<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Способы оплаты при сотрудничестве со студией графического дизайна Веоникс. Официальный договор, оплата по безналу или наличными.");
$APPLICATION->SetPageProperty("title", "Оплата — veonix.ru");

$APPLICATION->AddChainItem("О нас","/about/"); 
$APPLICATION->AddChainItem("Оплата");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$APPLICATION->SetTitle("Оплата");
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
 
                    <p><span style="font-weight: 400;">В студии дизайна Veonix создают проекты премиального качества по приемлемым ценам.&nbsp;</span></p>
                    <p><span style="font-weight: 400;">Вы можете быть уверены в эффективности использования своего рекламного бюджета. Сотрудничество с нами — не расходы, а инвестиции ради финансового благополучия компании!</span></p>
                    <p><span style="font-weight: 400;">Сам процесс расчетов за оказанные услуги мы стараемся сделать максимально комфортным и безопасным для вас:</span></p>
                    <ul>
                    <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">заключаем официальный договор как с физическими, так и с юридическими лицами</span></li>
                    <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">принимаем оплату наличными и по безналичному расчету</span></li>
                    <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">в качестве предоплаты берем 50% процентов от стоимости заказа</span></li>
                    <li style="font-weight: 400;" aria-level="1"><span style="font-weight: 400;">окончательные расчеты проводим только после приемки работ и подписания акта</span></li>
                    </ul>
                    <div class="contact-info-item contact-info-item-inner">
                    <div class="contact-info-left">
                    <p>Способы оплаты:</p>
                    </div>
                    <div class="contact-info-right">
                    <div class="contact-social ct-soc">
                    <ul class="pay-block">
                    <li>
                    <div class="visa"><i class="visa_i"></i></div>
                    </li>
                    <li>
                    <div class="mcard"><i class="mcard_i"></i></div>
                    </li>
                    <li>
                    <div class="mir"><i class="mir_i"></i></div>
                    </li>
                    <li>
                    <div class="bitcoin"><i class="bitcoin_i"></i></div>
                    </li>
                    <li>
                    <div class="pay"><i class="pay_i"></i></div>
                    </li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    <p><span style="font-style: bold;">Порядок оплаты</span></p>
                    <ol>
                    <li><span style="font-weight: 400;">Подписываем </span><span style="font-style: bold;">договор</span></li>
                    <li><span style="font-weight: 400;">Вносите предоплату </span><span style="font-style: bold;">50%</span></li>
                    <li><span style="font-weight: 400;">Разрабатываем дизайн до финального утверждения, вносим неограниченное количество правок </span><span style="font-style: bold;">бесплатно</span></li>
                    <li><span style="font-weight: 400;">Оплачиваете оставшиеся </span><span style="font-style: bold;">50%</span></li>
                    </ol>
                    <p style="text-align: center;"><span style="font-style: bold;">При оплате заказа наличными средствами<br>
                        </span><span style="font-size: 18pt;"><span style="font-style: bold;">вы получаете скидку 10 %</span></span></p>
                        
 
 
        </div>
    </div>
</div>

 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>