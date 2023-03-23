<?php
spl_autoload_register(function ($oClass) {
    // ������� ������������ ��� �������
    $sPrefix = '';
    // ������� ���������� ��� ����� ��������
    $sBaseDir = __DIR__ . '/lib/';

    // ����� ���������� �������?
    $iLen = strlen($sPrefix);
    if (strncmp($sPrefix, $oClass, $iLen) !== 0) {
        // ���. ����� ���������� ������ �������������
        return;
    }
    // �������� ������������� ��� ������
    $sRelativeClass = substr($oClass, $iLen);
    // �������� ������� ������� �����������, �������� ����������� ������������ ���
    // �� ����������� ���������� � ������������� ����� ������, ��������� .php
    $sFile = $sBaseDir . str_replace('\\', '/', $sRelativeClass) . '.php';
    // ���� ���� ����������, ���������� ���
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