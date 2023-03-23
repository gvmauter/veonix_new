<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подождите....</title>
</head>
<body>
    
<?php 

require 'config-info.php';
require_once "AntiSpam/lib/Cleantalk.php";
require_once "AntiSpam/lib/CleantalkRequest.php";
require_once "AntiSpam/lib/CleantalkResponse.php";
require_once "AntiSpam/lib/CleantalkHelper.php";
require_once "AntiSpam/lib/CleantalkAPI.php";

use lib\CleantalkRequest;
use lib\Cleantalk;
use lib\CleantalkAPI;


$config_url = 'http://moderate.cleantalk.ru';
$auth_key = "a6usenute7ej"; 

$ct_request = new CleantalkRequest();
$ct_request->auth_key = $auth_key;
$ct_request->message = $_POST['comment'];
$ct_request->sender_email = $_POST['email'];
$ct_request->sender_nickname = $_POST['name'];
$ct_request->agent = 'php-api';
$ct_request->sender_ip = $_SERVER['REMOTE_ADDR'];

$ct = new Cleantalk();
$ct->server_url = $config_url;

$ct_result = $ct->isAllowMessage($ct_request);


   // ЗАПИСЫВАЕ ВСЕ ДАННЫЕ В ФАЙЛА
$f = fopen("post-email-log.php", "a+"); 
$date=date("d.m.y"); 
$time=date("H:i"); 
$massiv =  serialize($_POST);
$massiv .=  $_SERVER['REMOTE_ADDR'];
$massiv .=  $ct_result->comment;
fwrite($f," \n $date $time Заявка с сайта Veonix"); 
fwrite($f,"\n $massiv "); 
fwrite($f,"\n ---------------"); 
fclose($f); 
$tokenLog = "1055593990:AAEQirN5lEA0s9p6YTwA-mvRT90INJzNk0c"; // 612619175:AAEqQBMkZUQttr666hEbQF4_n2mVvgLCo2c
$chat_idLog = "-783881819"; // -234173585
$txtLog = "Была заявка";
$txtLog .= $massiv;
fopen("https://api.telegram.org/bot{$tokenLog}/sendMessage?chat_id={$chat_idLog}&parse_mode=html&text={$txtLog}","r");




        require_once __DIR__."/SendMailSmtpClass.php"; 
        require_once __DIR__ . '/autoloader.php';


        $url = $_SERVER['HTTP_REFERER']; 
        $nameForm = $_POST['nameForm'];
        $adminemail= ST_EMAIL;
        //$adminemail= "avator41@gmail.com";
        $dt	= ST_DT;
        $fileUrl	= $_POST['fileUrl']; // Новые файлы
        $fileUrl = str_replace("  ", "<br>", $fileUrl);
        $form_id	= $_POST['theme']; // с какой формы
        $idForm	= $_POST['idForm']; // уникальный ID
        $token = "612619175:AAEqQBMkZUQttr666hEbQF4_n2mVvgLCo2c"; // 612619175:AAEqQBMkZUQttr666hEbQF4_n2mVvgLCo2c
        $chat_id = "-1001478595553"; // -234173585

        // $token = "1055593990:AAEQirN5lEA0s9p6YTwA-mvRT90INJzNk0c"; // 612619175:AAEqQBMkZUQttr666hEbQF4_n2mVvgLCo2c
        // $chat_id = "228692793"; // -234173585


        $mailSMTP = new SendMailSmtpClass('robot@veonix.host', 'VHF%Lmh5', 'smtp.beget.com', 2525, "windows-1251");


        // UTM
        $utm_status = false;
        if (!empty($_POST['utm_source']) or !empty($_POST['utm_medium']) or !empty($_POST['utm_campaign']) or !empty($_POST['utm_content'])) {
            $utm_status = true;
            $utm_medium = $_POST['utm_medium'] ?? ""; 
            $utm_source = $_POST['utm_source'] ?? "";
            $utm_campaign = $_POST['utm_campaign'] ?? "";
            $utm_term = $_POST['utm_term'] ?? "";
            $utm_content = $_POST['utm_content'] ?? "";
            $utmBox = "<br><br><hr><br>";
            if (!empty($_POST['utm_medium'])) {$utmBox .= "<b>UTM Medium:</b> $utm_medium <br>";};
            if (!empty($_POST['utm_source'])) {$utmBox .= "<b>UTM Source:</b> $utm_source <br>";};
            if (!empty($_POST['utm_campaign'])) {$utmBox .= "<b>UTM Campaign:</b> $utm_campaign <br>";};
            if (!empty($_POST['utm_term'])) {$utmBox .= "<b>UTM Term:</b> $utm_term <br>";};
            if (!empty($_POST['utm_content'])) {$utmBox .= "<b>UTM Content:</b> $utm_content <br>";};
            $utmBox .= "<br><br><hr>";
            
        } 

        $name	= $_POST['name'] ?? "не указан";
        $phone	=  $_POST['phone'];
        $phone_reg	=  $_POST['region'];
        if (empty($_POST['phone'])) {
            $phone	= $_POST['phone_min'];
        }
        $email	= $_POST['email'] ?? "";
        $comtext	= $_POST['comment'] ?? "";
        $nameCompany	= $_POST['name-company'];
        $service	= $_POST['service'];
        $nisha	= $_POST['nisha'];
        $numerChel	= $_POST['numer'];
        $subject = "Заявка с сайта VEONIX[$dt]";
        $from = array(
            "Veonix Robot", 
            "robot@veonix.host" 
        );
        $message = "<b>ЗАЯВКА С САЙТА [veonix.ru][$date $time]</b><br><br><b>Форма:</b> $form_id<br><br>";   


        if (!empty($name)) {$message .= "<b>Имя: </b> $name <br>";}
        if (!empty($phone)) {$message .= "<b>Телефон: </b> $phone <br>";}
        if (!empty($phone)) {$message .= "<b>Страна телефона: </b> $phone_reg <br>";}
        if (!empty($email)) {$message .= "<b>Email: </b> $email <br>";}        
        if (!empty($nameCompany)) {$message .= "<b>Название компании: </b> $nameCompany <br>";}
        if (!empty($nisha)) {$message .= "<b>Сфера деятельности: </b> $nisha <br>";}
        if (!empty($numerChel)) {$message .= "<b>Кол-во чел-век: </b> $numerChel <br>";}
        if (!empty($comtext)) {$message .= "<b>Сообщение: </b> $comtext <br>";}

        if (!empty($service)) {$message .= "<b>Услуга: </b> $service <br>";}




        // БРИФ
        $brief_1 = $_POST['bf-ck-1']; // сайт
        $brief_2 = $_POST['bf-ck-2']; // Коммерческое предложение
        $brief_3 = $_POST['bf-ck-3']; // Видеоролик
        $brief_4 = $_POST['bf-ck-4']; // Презентация
        $brief_5 = $_POST['bf-ck-5']; // Логотип
        $brief_6 = $_POST['bf-ck-6']; // Каталог
        $brief_7 = $_POST['bf-ck-7']; // Маркетинг-кит
        $brief_8 = $_POST['bf-ck-8']; // Бренд-бук
        $brief_9 = $_POST['bf-ck-9']; // Свой вариант

        $brief_tx_1 = $_POST['bf1']; // Чем занимается ваша компания
        $brief_tx_2 = $_POST['bf2']; // Кто ваши клиенты
        $brief_tx_3 = $_POST['bf3']; // Задачи, которые будет решать данный проект
        $brief_tx_4 = $_POST['bf-rd1']; // Есть ли логотип
        $brief_tx_5 = $_POST['bf-rd2']; // Есть ли брендбук?
        $brief_tx_6 = $_POST['bf-rd3']; // Потребуется ли разработка текстов?
        $brief_tx_7 = $_POST['bf-rd4']; // Потребуется ли фотосессия
        $brief_tx_8 = $_POST['bf3-1']; // Описание будущего стиля
        $brief_tx_9 = $_POST['bf4']; // В какой цветовой гамме Вы видите свой проект?
        $brief_tx_10 = $_POST['bf5']; // Впечатление, которое должен произвести дизайн на пользователя
        $brief_tx_11 = $_POST['bf6']; // Приложите ссылки на работы, которые Вам нравятся.
        $brief_tx_12 = $_POST['bf7']; // Есть ли у вас идеи, которые Вы хотите воплотить в дизайне?
        $brief_tx_13 = $_POST['bf8']; // Что Вы категорически не хотите видеть в дизайне?
        $brief_tx_13_1 = $_POST['bf8-1']; // Какой размер макета
        $brief_tx_14 = $_POST['bf9']; // Дополнительные комментарии, вопросы, пожелания
        $brief_tx_15 = $_POST['bf-ck-9-text']; // другое
        
        if ($idForm == "brief") {
            $message .= "<br><b>Нужно разработать: </b><br>";
            if (!empty($brief_1)) {$message .= "-- $brief_1 <br>";}
            if (!empty($brief_2)) {$message .= "-- $brief_2 <br>";}
            if (!empty($brief_3)) {$message .= "-- $brief_3 <br>";}
            if (!empty($brief_4)) {$message .= "-- $brief_4 <br>";}
            if (!empty($brief_5)) {$message .= "-- $brief_5 <br>";}
            if (!empty($brief_6)) {$message .= "-- $brief_6 <br>";}
            if (!empty($brief_7)) {$message .= "-- $brief_7 <br>";}
            if (!empty($brief_8)) {$message .= "-- $brief_8 <br>";}
            if (!empty($brief_9)) {$message .= "-- $brief_tx_15 (свой вариант) <br>";}
            $message .= "<br>";
            if (!empty($brief_tx_1)) {$message .= "<b>Чем занимается ваша компания:</b><br>$brief_tx_1 <br>";}
            if (!empty($brief_tx_2)) {$message .= "<b>Кто ваши клиенты:</b><br>$brief_tx_2 <br>";}
            if (!empty($brief_tx_3)) {$message .= "<b>Задачи, которые будет решать данный проект:</b><br>$brief_tx_3 <br>";}
            if (!empty($brief_tx_4)) {$message .= "<b>Есть ли логотип:</b>$brief_tx_4 <br>";}
            if (!empty($brief_tx_5)) {$message .= "<b>Есть ли брендбук:</b>$brief_tx_5 <br>";}
            if (!empty($brief_tx_6)) {$message .= "<b>Потребуется ли разработка текстов:</b>$brief_tx_6 <br>";}
            if (!empty($brief_tx_7)) {$message .= "<b>Потребуется ли фотосессия:</b>$brief_tx_7 <br>";}
            if (!empty($brief_tx_8)) {$message .= "<b>Описание будущего стиля:</b><br>$brief_tx_8 <br>";}
            if (!empty($brief_tx_9)) {$message .= "<b>В какой цветовой гамме Вы видите свой проект:</b><br>$brief_tx_9 <br>";}
            if (!empty($brief_tx_10)) {$message .= "<b>Впечатление, которое должен произвести дизайн на пользователя:</b><br>$brief_tx_10 <br>";}
            if (!empty($brief_tx_11)) {$message .= "<b>Приложите ссылки на работы, которые Вам нравятся:</b><br>$brief_tx_11 <br>";}
            if (!empty($brief_tx_12)) {$message .= "<b>Есть ли у вас идеи, которые Вы хотите воплотить в дизайне:</b><br>$brief_tx_12 <br>";}
            if (!empty($brief_tx_13)) {$message .= "<b>Что Вы категорически не хотите видеть в дизайне:</b><br>$brief_tx_13 <br>";}
            if (!empty($brief_tx_13_1)) {$message .= "<b>Какой размер макета:</b><br>$brief_tx_13_1 <br>";}
            if (!empty($brief_tx_14)) {$message .= "<b>Дополнительные комментарии, вопросы, пожелания:</b><br>$brief_tx_14 <br>";}
        }
        if ($utm_status) {$message .= $utmBox;}


        $message .= "<br><b>Страница:</b> $url <br><br>";

        if (!empty($fileUrl)) {$message .= "<b>Файлы: </b><br>$fileUrl <br>";}
        if (!empty($file_url)) {$message .= "<b>Ссылка на файл:</b> $file_url <br><br>";}
        $message .= "<b>Статус:</b> $ct_result->comment ";
        
        $tg_message = str_replace("<br>", "%0A", $message);
        $tg_message = str_replace("&", "И", $tg_message);
        $tg_message = str_replace("<hr>", "_______________________%0A", $tg_message);

        $amo_message = str_replace("<br>", "\n", $message);
        $amo_message = str_replace("<hr>", "_______________________\n", $amo_message);
        $amo_message = str_replace("<b>", "", $amo_message);
        $amo_message = str_replace("</b>", "", $amo_message);
        



// $ct_result->allow == 1
if ($ct_result->allow == 1) {
    
    if (ST_TELEGRAM  && !empty($phone)) {
        $sendToTelegram = fopen("https://api.telegram.org/bot{$tokenLog}/sendMessage?chat_id={$chat_idLog}&parse_mode=html&text={$tg_message}","r");
    }

    if (!empty($phone)) {
   
        if (false) {
            $result =  $mailSMTP->send($adminemail, $subject, $message, $from);
        }

        if (false) {
            
                // Подключаем клиент Google таблиц
                require_once __DIR__ . '/excel/vendor/autoload.php';

                // Наш ключ доступа к сервисному аккаунту
                $googleAccountKeyFilePath = __DIR__ . '/excel/service_key.json';
                
                
                
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

            // Создаем новый клиент
            $client = new Google_Client();
            // Устанавливаем полномочия
            $client->useApplicationDefaultCredentials();

            // Добавляем область доступа к чтению, редактированию, созданию и удалению таблиц
            $client->addScope('https://www.googleapis.com/auth/spreadsheets');

            $service = new Google_Service_Sheets($client);

            // ID таблицы
            $spreadsheetId = '1H2ZoV_AoGui4yhlccwjpM2wZ_VQbt8xAL2CTlfKJvps';
            $times=date("H:i"); 





            $range = 'VEONIX!A1:Z';
            $values = [
            [$name, '="'.$phone.'"', $email],
            ];

            $ValueRange = new Google_Service_Sheets_ValueRange();
            $options = ['valueInputOption' => 'USER_ENTERED'];

            $ValueRange->setValues($values);
            $service->spreadsheets_values->append($spreadsheetId, $range, $ValueRange, $options);

            if ($idForm == "brief") {
                $rangeBRIEF = 'BRIEF!A1:Z';
                $valuesBRIEF = [
                    [$date." ".$times, $name, '="'.$phone.'"', $email, $nameCompany, '=SUBSTITUTE(SUBSTITUTE(SUBSTITUTE("'.$message.'";"<br>";CHAR(10));"<b>";"");"<b>";"")'],
                ];
                $ValueRange->setValues($valuesBRIEF);
                $service->spreadsheets_values->append($spreadsheetId, $rangeBRIEF, $ValueRange, $options);
            } else {
                $rangeZAYAVKI = 'ZAYAVKI!A1:Z';
                $files = $file_urlNEW ?? $fileUrl ?? "";
                $valuesZAYAVKI = [
                    [$date." ".$times,$name, '="'.$phone.'"', $email, $comtext,$form_id,$url,$files,$utm_source,$utm_medium,$utm_campaign,$utm_term,$utm_content],
                ];
                $ValueRange->setValues($valuesZAYAVKI);
                $service->spreadsheets_values->append($spreadsheetId, $rangeZAYAVKI, $ValueRange, $options);
            }



        }
    }

    exit; 

} else {
  
    $sendToTelegram = fopen("https://api.telegram.org/bot{$tokenLog}/sendMessage?chat_id={$chat_idLog}&parse_mode=html&text={$tg_message}","r");
    echo 'Comment blocked. Reason ' . $ct_result->comment;
    exit; 
}
?>
</body>
</html>