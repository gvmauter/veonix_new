<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("og_image", "/bitrix/templates/veonix/assets/img/og/veonix.png");

$APPLICATION->SetPageProperty("description", "Актуальные акции и специальные предложения на услуги студии графического дизайна. Сэкономьте на разработке без потери качества.");
$APPLICATION->SetPageProperty("title", "Акции студии графического дизайна Veonix — veonix.ru");

$APPLICATION->AddChainItem("Услуги","/services/").
$APPLICATION->AddChainItem("Акции");
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/new_design.css");   
$asset->addCss(SITE_TEMPLATE_PATH."/assets/css/old/style.css");   

$APPLICATION->SetTitle("Акции");

$APPLICATION->SetPageProperty("title_block", "Студии графического дизайна Veonix");

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
        <a href="https://veonix.ru/presentations/"><img   src="/bitrix/templates/veonix/assets/img/banner-site.png" alt="" width="100%"></a>
 
 
        </div>
    </div>
</div>

 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>