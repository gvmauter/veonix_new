<?php

namespace BXmaker\AutoSitemap;

use Bitrix\Main\Localization\Loc;
\Bitrix\Main\Localization\Loc::loadMessages(__FILE__);
class Handler
{
    private static $moduleId = 'bxmaker.autositemap';
    public static function main_onBuildGlobalMenu(&$arGlobalMenu, &$arModuleMenu)
    {
        $arGlobalMenu['global_menu_bxmaker'] = array('menu_id' => 'bxmaker', 'text' => \Bitrix\Main\Localization\Loc::getMessage('BXMAKER_ASM_GLOBAL_MENU_TITLE'), 'title' => \Bitrix\Main\Localization\Loc::getMessage('BXMAKER_ASM_GLOBAL_MENU_TITLE'), 'sort' => '250', 'items_id' => 'global_menu_bxmaker', 'help_section' => 'bxmaker', 'items' => array());
    }
    public static function main_OnProlog()
    {
        \BXmaker\AutoSitemap\Manager::getInstance()->eventMainOnProlog();
    }
}
?>