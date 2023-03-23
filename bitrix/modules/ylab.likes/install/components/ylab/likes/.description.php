<?php

use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentDescription = [
    "NAME" => Loc::getMessage("YLAB_LIKES_NAME"),
    "DESCRIPTION" => Loc::getMessage("YLAB_LIKES_DESCRIPTION"),
    "PATH" => [
        "ID" => "Ylab",
        "CHILD" => [
            "ID" => "likes",
            "NAME" => Loc::getMessage("LIKES"),
            'CHILD' => [
                'ID' => 'component'
            ]
        ],

    ],
];