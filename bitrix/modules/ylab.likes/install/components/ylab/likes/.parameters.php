<?php
Bitrix\Main\Loader::includeModule('ylab.comments');

use Bitrix\Main\Localization\Loc;

$arComponentParameters = [
    'PARAMETERS' => [
        'ELEMENT_ID' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage("YLAB_LIKES_ELEMENT_ID")
        ],
        'ENTITY_ID' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage("YLAB_LIKES_ENTITY_ID")
        ],
        'CACHE_TIME' => [
            'DEFAULT' => 3600,
        ]
    ],
];
