<?php
//require_once "vendor/autoload.php"; -- Composer
   // ЗАПИСЫВАЕ ВСЕ ДАННЫЕ В ФАЙЛА
   $f = fopen("post-email-log.php", "a+"); 
   $date=date("d.m.y"); 
   $time=date("H:i"); 
   $massiv =  serialize($_POST);
   $massiv .=  $_SERVER['REMOTE_ADDR'];
   fwrite($f," \n $date $time Заявка с сайта Veonix"); 
   fwrite($f,"\n $massiv "); 
   fwrite($f,"\n ---------------"); 
   fclose($f); 
    $tokenLog = "1055593990:AAEQirN5lEA0s9p6YTwA-mvRT90INJzNk0c"; // 612619175:AAEqQBMkZUQttr666hEbQF4_n2mVvgLCo2c
    $chat_idLog = "228692793"; // -234173585
    $txtLog = "Была заявка";
  fopen("https://api.telegram.org/bot{$tokenLog}/sendMessage?chat_id={$chat_idLog}&parse_mode=html&text={$txtLog}","r");
require_once "lib/Cleantalk.php";
require_once "lib/CleantalkRequest.php";
require_once "lib/CleantalkResponse.php";
require_once "lib/CleantalkHelper.php";
require_once "lib/CleantalkAPI.php";

use lib\CleantalkRequest;
use lib\Cleantalk;
use lib\CleantalkAPI;

// Take params from config
$config_url = 'http://moderate.cleantalk.ru';
$auth_key = "a6usenute7ej"; // Set Cleantalk auth key


// The facility in which to store the query parameters
$ct_request = new CleantalkRequest();
$email	= $_POST['email'];
$name	= $_POST['name'];
$comtext	= $_POST['comment'];
$ct_request->auth_key = $auth_key;
$ct_request->message = $comtext;
$ct_request->sender_email = $email;
$ct_request->sender_nickname = $name;
$ct_request->agent = 'php-api';
$ct_request->sender_ip = $_SERVER['REMOTE_ADDR'];


$ct = new Cleantalk();
$ct->server_url = $config_url;

// Check
$ct_result = $ct->isAllowMessage($ct_request);

if ($ct_result->allow == 1) {
    echo 'Comment allowed. Reason ' . $ct_result->comment;
} else {
    echo 'Comment blocked. Reason ' . $ct_result->comment;
}

?>
