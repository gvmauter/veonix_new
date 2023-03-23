<?php
spl_autoload_register(function ($oClass) {
    // префикс пространства имён проекта
    $sPrefix = '';
    // базовая директория для этого префикса
    $sBaseDir = __DIR__ . '/lib/';

    // класс использует префикс?
    $iLen = strlen($sPrefix);
    if (strncmp($sPrefix, $oClass, $iLen) !== 0) {
        // нет. Пусть попытается другой автозагрузчик
        return;
    }
    // получаем относительное имя класса
    $sRelativeClass = substr($oClass, $iLen);
    // заменяем префикс базовой директорией, заменяем разделители пространства имён
    // на разделители директорий в относительном имени класса, добавляем .php
    $sFile = $sBaseDir . str_replace('\\', '/', $sRelativeClass) . '.php';
    // если файл существует, подключаем его
    if (file_exists($sFile)) {
        require $sFile;
    }
});

$arJsLibs = [
    'YlabLikesForm' => [
        'js' => '/bitrix/themes/ylab.likes/js/YlabLikesForm.js',
        'lang' => '/bitrix/themes/ylab.likes/lang/' . LANGUAGE_ID . '/YlabLikesForm.php',
        'rel' => ['ajax']
    ],
];

foreach ($arJsLibs as $jsLib => $arJsLib) {
    CJSCore::RegisterExt($jsLib, $arJsLib);
}