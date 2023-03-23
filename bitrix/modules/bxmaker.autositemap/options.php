<?

    use \Bitrix\Main\Localization\Loc as Loc;

    global $APPLICATION;

    $BXMAKER_MODULE_ID = 'bxmaker.autositemap';

    \Bitrix\Main\Localization\Loc::loadLanguageFile(__FILE__);
    \Bitrix\Main\Loader::includeModule($BXMAKER_MODULE_ID);

    $PERMISSION = $APPLICATION->GetGroupRight($BXMAKER_MODULE_ID);

    $app = \Bitrix\Main\Application::getInstance();
    $req = $app->getContext()->getRequest();

    if ($PERMISSION != "W") {
        $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
        die();
    }

    $oManager = \BXmaker\AutoSitemap\Manager::getInstance();

    $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', _normalizePath(dirname(__FILE__))) . '/admin';

    $arSite = array();
    $dbr = \CSite::GetList($by = 'sort', $order = 'asc');
    while ($ar = $dbr->Fetch()) {
        $arSite[$ar['ID']] = '[' . $ar['ID'] . '] ' . $ar['NAME'];
    }

    //Карты ---------
    $bSeoModule = false;
    $arSitemapList = array();
    $arSiteSitemapList = array();
    if (\Bitrix\Main\Loader::includeModule('seo')) {
        $bSeoModule = true;
        $oSitemapTable = new \Bitrix\Seo\SitemapTable();
        $dbrSitemap = $oSitemapTable->getList();
        while ($arSitemap = $dbrSitemap->fetch()) {
            $arSiteSitemapList[$arSitemap['SITE_ID']][] = $arSitemap;
            $arSitemapList[$arSitemap['ID']] = $arSitemap;
        }
    }


    // Имеющиеся настройки карт ---------
    $arItems = array();
    $dbrItems = $oManager->getTable()->getList();
    while ($arItem = $dbrItems->fetch()) {
        $arItems[$arItem['ID']] = $arItem;
    }


    $arOptions = array();
    foreach ($arSite as $sid => $sname) {

        $arOptionCurrent = array(
            'SID' => $sid,
            'NAME' => GetMessage('AP_EDIT_TAB.SITE', array('#SITE#' => $sname)),
            'DESCRIPTION' => GetMessage('AP_EDIT_TAB.SITE_DESCRIPTION', array('#SITE#' => $sname)),
            'OPTIONS' => array()
        );

        $arOptionCurrent['OPTIONS'][] = array(
            'CODE' => 'ENABLE',
            'TYPE' => 'CHECKBOX',
            'DEFAULT_VALUE' => 'N',
        );

        $arOptions[] = $arOptionCurrent;
    }


    //////////////////////////////////////////////////////////////////////////////
    if ($PERMISSION == "W") {
        $oOption = new \Bitrix\Main\Config\Option();

        if (($apply || $save) && check_bitrix_sessid() && $req->isPost()) {
            // парамтеры --------
            foreach ($arOptions as $arOption) {
                $sid = $arOption['SID'] . '_';

                foreach ($arOption['OPTIONS'] as $arItem) {

                    switch ($arItem['TYPE']) {
                        case 'STRING':
                            {
                                $oOption->set($BXMAKER_MODULE_ID, $arItem['CODE'], ($req->getPost($sid . $arItem['CODE']) ? trim($req->getPost($sid . $arItem['CODE'])) : ''), $arOption['SID']);
                            }
                            break;
                        case 'CHECKBOX':
                            {
                                $oOption->set($BXMAKER_MODULE_ID, $arItem['CODE'], ($req->getPost($sid . $arItem['CODE']) && $req->getPost($sid . $arItem['CODE']) == 'Y' ? 'Y' : 'N'), $arOption['SID']);
                            }
                            break;
                        case 'LIST':
                            {
                                $oOption->set(
                                    $BXMAKER_MODULE_ID,
                                    $arItem['CODE'],
                                    ($req->getPost($sid . $arItem['CODE']) && in_array($req->getPost($sid . $arItem['CODE']), $arItem['VALUES']['REFERENCE_ID'])
                                        ? $req->getPost($sid . $arItem['CODE'])
                                        : ''),
                                    $arOption['SID']);
                            }
                            break;
                        case 'MULTY_LIST':
                            {

                                $strMultyVal = '';
                                if ($req->getPost($sid . $arItem['CODE']) && is_array($req->getPost($sid . $arItem['CODE']))) {
                                    $ar = array_diff(array_intersect($req->getPost($sid . $arItem['CODE']), $arItem['VALUES']['REFERENCE_ID']), array('', ' '));
                                    if (count($ar)) {
                                        $strMultyVal = implode('|', $ar);
                                    }
                                }

                                $oOption->set(
                                    $BXMAKER_MODULE_ID,
                                    $arItem['CODE'],
                                    $strMultyVal,
                                    $arOption['SID']);
                            }
                            break;
                    }
                }
            }

            //карты----------------------
            // обход ---
            $arEnable = $req->getPost('SITEMAP_ENABLE');
            $arTime = $req->getPost('SITEMAP_TIME');
            $arInterval = $req->getPost('SITEMAP_INTERVAL');
            if (is_array($arEnable) && !empty($arEnable)) {

                $arSkipId = array();

                //добавление обновление---
                foreach ($arSitemapList as $itemId => $arItem) {
                    //записываем чтоыб не удалить
                    $arSkipId[] = $itemId;

                    // если существует
                    if (isset($arItems[$itemId])) {
                        $oManager->getTable()->update($itemId, array(
                            'PARAMS' => array(
                                'ENABLE' => ((isset($arEnable[$itemId]) && $arEnable[$itemId] == 'Y') ? 'Y' : 'N'),
                                'TIME' => (strlen($arTime[$itemId]) && preg_match('/^\d\d:\d\d$/', $arTime[$itemId]) ? trim($arTime[$itemId]) : ''),
                                'INTERVAL' => (intval($arInterval[$itemId]) ? intval($arInterval[$itemId]) : '')
                            )
                        ));

                    } //добавление
                    else {
                        if (isset($arEnable[$itemId]) && $arEnable[$itemId] == 'Y') {
                            $oManager->getTable()->add(array(
                                'ID' => $itemId,
                                'PARAMS' => array(
                                    'ENABLE' => 'Y',
                                    'TIME' => (strlen($arTime[$itemId]) && preg_match('/^\d\d:\d\d$/', $arTime[$itemId]) ? trim($arTime[$itemId]) : ''),
                                    'INTERVAL' => (intval($arInterval[$itemId]) ? intval($arInterval[$itemId]) : '')
                                )
                            ));
                        }
                    }
                }


                //удаление ненужных ----- настройки карт удалены
                foreach ($arItems as $itemId => $arItem) {
                    if (!in_array($itemId, $arSkipId)) {
                        $oManager->getTable()->delete($itemId);
                    }
                }

            } else {
                //обновляем все существующие данные
                foreach ($arItems as $itemId => $arItem) {
                    $arItem['PARAMS']['ENABLE'] = 'N';

                    $oManager->getTable()->update($itemId, array(
                        'PARAMS' => $arItem['PARAMS']
                    ));
                }
            }

            LocalRedirect($APPLICATION->GetCurPageParam());

        }
    }


?>
<?
    \Bxmaker\AutoSitemap\Manager::getInstance()->showDemoMessage();
    \Bxmaker\AutoSitemap\Manager::getInstance()->addAdminPageCssJs();


    // TABS
    $tabs = array();
    foreach ($arOptions as $k => $arOption) {
        $tabs[] = array(
            'DIV' => $arOption['KEY'] . $k,
            'TAB' => $arOption['NAME'],
            'ICON' => '',
            'TITLE' => (isset($arOption['DESCRIPTION']) ? $arOption['DESCRIPTION'] : $arOption['NAME'])
        );
    }
    $tab = new CAdminTabControl('options_tabs', $tabs);

    $tab->Begin();
?>


<form class="bxmaker__autositemap-form" method="post"
      action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&amp;lang=<?= LANGUAGE_ID ?>&amp;mid_menu=<?= $mid_menu ?>"><?= bitrix_sessid_post(); ?>

    <?
        $oOption = new \Bitrix\Main\Config\Option();

        $i = 0;

        foreach ($arOptions as $k => $arOption) {
            $tab->BeginNextTab();

            $sid = $arOption['SID'] . '_';

            //Параметры ----------------
            foreach ($arOption['OPTIONS'] as $arItem) {

                ?>

                <?
                if (isset($arItem['GROUP_NAME'])) {
                    ?>
                    <tr class="heading">
                        <td colspan="3" style="font-size: 0.9em;  background: #fff;"><?= $arItem['GROUP_NAME']; ?></td>
                    </tr>
                    <?
                }
                ?>

                <tr>
                    <td class="first" style="width:30%;"><?= (isset($arItem['CODE_NAME']) ? $arItem['CODE_NAME'] : GetMessage('AP_OPTION.' . $arItem['CODE'])); ?></td>
                    <td><?
                            switch ($arItem['TYPE']) {
                                case 'STRING':
                                    {
                                        echo InputType('text', $sid . $arItem['CODE'], $oOption->get($BXMAKER_MODULE_ID, $arItem['CODE'], $arItem['DEFAULT_VALUE'], $arOption['SID']), '');
                                        break;
                                    }
                                case 'CHECKBOX':
                                    {
                                        echo InputType('checkbox', $sid . $arItem['CODE'], 'Y', array($oOption->get($BXMAKER_MODULE_ID, $arItem['CODE'], $arItem['DEFAULT_VALUE'], $arOption['SID'])));
                                        break;
                                    }
                                case 'LIST':
                                    {
                                        echo SelectBoxFromArray($sid . $arItem['CODE'], $arItem['VALUES'], $oOption->get($BXMAKER_MODULE_ID, $arItem['CODE'], $arItem['DEFAULT_VALUE'], $arOption['SID']));
                                        break;
                                    }
                                case 'MULTY_LIST':
                                    {
                                        $arMSVals = explode('|', $oOption->get($BXMAKER_MODULE_ID, $arItem['CODE'], $arItem['DEFAULT_VALUE'], $arOption['SID']));
                                        echo SelectBoxMFromArray(
                                            $sid . $arItem['CODE'] . '[]',
                                            $arItem['VALUES'],
                                            $arMSVals,
                                            '', '', 5
                                        );
                                        break;
                                    }
                            }

                            ShowJSHint(GetMessage('AP_OPTION.' . $arItem['CODE'] . '.HELP', array('#SITE#' => $arSite[$arOption['SID']])));

                        ?></td>
                    <td></td>
                </tr>
                <?
            }

            // карты -------------------
            ?>
            <tr class="heading">
                <td colspan="3"><?= Loc::getMessage('AP_OPTION.GROUP_NAME.SITEMAP'); ?></td>
            </tr>
            <?
            if (!$bSeoModule): ?>
                <tr>
                    <td colspan="3" style="padding:15px;text-align: center;"><?= Loc::getMessage('AP_OPTION.SEO_MODULE_NOT_INSTALLED'); ?></td>
                </tr>
            <? else: ?>

                <? if (!count($arSiteSitemapList[$arOption['SID']])): ?>
                    <tr>
                        <td colspan="3" style="padding:15px;text-align: center;"><?= Loc::getMessage('AP_OPTION.SITEMAP_NOT_FOUND', array('#SITE#' => $arSite[$arOption['SID']])); ?></td>
                    </tr>
                <? else: ?>
                    <tr>
                        <td colspan="3" style="padding:0;margin:0;">

                            <table class="bxmaker__autositemap-table" cellpadding="0" cellspacing="0">
                                <thead>
                                <tr>
                                    <td><?= Loc::getMessage('AP_OPTION.SITEMAP.ID'); ?></td>
                                    <td><?= Loc::getMessage('AP_OPTION.SITEMAP.ON'); ?></td>
                                    <td><?= Loc::getMessage('AP_OPTION.SITEMAP.INTERVAL'); ?></td>
                                    <td><?= Loc::getMessage('AP_OPTION.SITEMAP.TIME'); ?></td>
                                </tr>
                                </thead>
                                <tbody>
                                <? foreach ($arSiteSitemapList[$arOption['SID']] as $sitemap): ?>
                                    <tr>
                                        <td>[<?= $sitemap['ID']; ?>] <?= $sitemap['NAME']; ?></td>
                                        <td><input type="checkbox" value="Y"
                                                   name="SITEMAP_ENABLE[<?= $sitemap['ID']; ?>]" <?= (isset($arItems[$sitemap['ID']]['PARAMS']['ENABLE']) && $arItems[$sitemap['ID']]['PARAMS']['ENABLE'] == 'Y' ? ' checked ' : ''); ?>/>
                                        </td>
                                        <td><input type="text" value="<?= (isset($arItems[$sitemap['ID']]['PARAMS']['INTERVAL']) ? $arItems[$sitemap['ID']]['PARAMS']['INTERVAL'] : ''); ?>"
                                                   name="SITEMAP_INTERVAL[<?= $sitemap['ID']; ?>]" placeholder="120"/></td>
                                        <td><input type="text" value="<?= (isset($arItems[$sitemap['ID']]['PARAMS']['TIME']) ? $arItems[$sitemap['ID']]['PARAMS']['TIME'] : ''); ?>"
                                                   name="SITEMAP_TIME[<?= $sitemap['ID']; ?>]" placeholder="03:00"/></td>
                                    </tr>
                                <? endforeach; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <? endif; ?>
            <? endif; ?>

            <?


        }
        $tab->Buttons(array("disabled" => false));

        $tab->End();
    ?>
</form>

<?php

    echo BeginNote();
    echo Loc::getMessage("AP_OPTION.SITEMAP_CRON", array(
        '#SITE_ID#' => $oManager->getCurrentSiteId(),
        '#SITE#' => $arSite[$oManager->getCurrentSiteId()],
        '#PATH#' => $_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/bxmaker.autositemap/tools/cron.php',
        '#DOCUMENT_ROOT#' => $_SERVER["DOCUMENT_ROOT"]
    ));
    echo EndNote();
?>
