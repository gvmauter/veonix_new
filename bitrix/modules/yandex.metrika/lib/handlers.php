<?php

namespace Yandex\Metrika;

use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Page\Asset;

class Handlers
{
    public static $MODULE_ID = 'yandex.metrika';

    public static $baskets = [];


    public static function onProlog()
    {
        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        if ($request->isAdminSection()) {
            return;
        }

        global $APPLICATION;
        include $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . self::$MODULE_ID . '/install/version.php';

        $cmsVersion = Helpers::getBitrixVersion();
        $moduleVersion = htmlspecialchars($arModuleVersion['VERSION']);
        $counters = \COption::GetOptionString(self::$MODULE_ID, 'counters', '', SITE_ID);
        $masks = \COption::GetOptionString(self::$MODULE_ID, 'counters_masks', '', SITE_ID);

        if (empty($counters) || !is_string($counters)) {
            $counters = '';
        }

        try {
            $counters = json_decode($counters, true);
        } catch (\Exception $e) {
            $counters = [];
        }

        if (!is_array($counters)) {
            $counters = [];
        }

        if (empty($masks) || !is_string($masks)) {
            $masks = '';
        }

        try {
            $masks = json_decode($masks, true);
        } catch (\Exception $e) {
            $masks = [];
        }

        if (!is_array($masks)) {
            $masks = [];
        }

        \Yandex\Metrika\Helpers::resetYMCookies();
        $rip = \Yandex\Metrika\Helpers::getRIP();

        $domain = (new \CBXPunycode)->decode($_SERVER['SERVER_NAME']);

        if (!mb_detect_encoding($domain, 'UTF-8', true)) {
            $domain = iconv('CP1251', 'UTF-8', $domain);
        }

        ob_start();
        foreach ($counters as $counter) {
            if (!$counter['number']) {
                continue;
            }

            $counterMasks = array_filter($masks, function($mask) use ($counter){
                return trim($mask['number']) === trim($counter['number']) && !empty($mask['mask']);
            });

            $show = true;

            if (!empty($counterMasks)) {
                $show = false;
                foreach ($counterMasks as $mask) {
                    if (!mb_detect_encoding($mask['mask'], 'UTF-8', true)) {
                        $mask['mask'] = iconv('CP1251', 'UTF-8', $mask['mask']);
                    }

                    $urlMask = '/^' . preg_replace('/' . preg_quote('\*') . '/', '.*', preg_quote($mask['mask'], '/')) . '$/';
                    if (preg_match($urlMask, $domain)) {
                        $show = true;
                        break;
                    }
                }
            }

            if (!$show) {
                continue;
            }

            ?>
            <!-- Yandex.Metrika counter -->
            <script type="text/javascript">
                (function (m, e, t, r, i, k, a) {
                    m[i] = m[i] || function () {
                        (m[i].a = m[i].a || []).push(arguments)
                    };
                    m[i].l = 1 * new Date();
                    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
                })
                (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

                ym("<?php echo $counter['number']; ?>", "init", {
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: <?php echo !empty($counter['webvisor']) ? 'true' : 'false'; ?>,
                    ecommerce: "dataLayer",
                    params: {
                        __ym: {
                            "ymCmsPlugin": {
                                "cms": "1c-bitrix",
                                "cmsVersion": "<?php echo $cmsVersion; ?>",
                                "pluginVersion": "<?php echo $moduleVersion; ?>",
                                'ymCmsRip': <?php echo $rip; ?>
                            }
                        }
                    }
                });
            </script>
            <!-- /Yandex.Metrika counter -->
            <?php
        }

        $counter_code = ob_get_clean();
        $APPLICATION->AddHeadString($counter_code, true);
    }

    public static function onBeforeEndBufferContent()
    {
        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        if ($request->isAdminSection()) {
            return;
        }

        Asset::getInstance()->addString(
            "<script>window.dataLayer = window.dataLayer || [];</script>",
            true
        );

        Asset::getInstance()->addJs("/bitrix/js/" . self::$MODULE_ID . "/script.js");
    }

    public static function onSaleBasketBeforeSaved($event)
    {
        $basket = $event->getParameter("ENTITY");
        self::saveBasket($basket);
    }

    public static function onSaleBasketSaved($event)
    {
        $basket = $event->getParameter("ENTITY");
        $previousBasket = self::getSavedBasket($basket);

        $previousBasketItems = $previousBasket->getBasketItems();
        $basketItems = $basket->getBasketItems();

        foreach ($previousBasketItems as $previousBasketItem) {
            $basketItem = $basket->getItemById($previousBasketItem->getId());

            if (!$basketItem) {
                Ecommerce::registerAction(
                    'remove',
                    Ecommerce::prepareBasketItemsChanges(
                        [
                            [
                                'basketItem' => $previousBasketItem,
                                'quantity' => $previousBasketItem->getQuantity(),
                            ]
                        ]
                    )
                );
                continue;
            }

            $diff = $basketItem->getQuantity() - $previousBasketItem->getQuantity();

            if ($diff != 0) {
                $actionType = $diff > 0 ? 'add' : 'remove';
                Ecommerce::registerAction(
                    $actionType,
                    Ecommerce::prepareBasketItemsChanges(
                        [
                            [
                                'basketItem' => $basketItem,
                                'quantity' => abs($diff),
                            ]
                        ]
                    )
                );
            }
        }

        foreach ($basketItems as $basketItem) {
            $previousBasketItem = $previousBasket->getItemById($basketItem->getId());

            if (!$previousBasketItem) {
                Ecommerce::registerAction(
                    'add',
                    Ecommerce::prepareBasketItemsChanges(
                        [
                            [
                                'basketItem' => $basketItem,
                                'quantity' => $basketItem->getQuantity(),
                            ]
                        ]
                    )
                );
            }
        }
    }

    public static function onSaleBasketItemRefreshData($event)
    {
    }

    public static function onSaleBasketItemBeforeSaved($event)
    {
        $basketItem = $event->getParameter("ENTITY");

        $basket = $basketItem->getCollection();
        if ($basket instanceof \Bitrix\Sale\BundleCollection) { //BasketItemCollection
            $basket = $basket->getBasket();
        }

        self::saveBasket($basket);
    }

    public static function onSaleOrderSaved($event)
    {
        $request = \Bitrix\Main\Context::getCurrent()->getRequest();
        if ($request->isAdminSection()) {
            return;
        }

        $order = $event->getParameter("ENTITY");

        $basket = $order->getBasket();
        $discountData = $order->getDiscount()->getApplyResult();
        $coupon = array_keys($discountData['COUPON_LIST']);
        $coupon = implode(',', $coupon);

        $basketItems = $basket->getBasketItems();
        $ecItems = [];
        foreach ($basketItems as $basketItem) {
            $ecItem = [
                'basketItem' => $basketItem,
                'quantity' => $basketItem->getQuantity()
            ];

            if ($coupon) {
                $ecItem['coupon'] = $coupon;
            }

            $ecItems[] = $ecItem;
        }

        $actionField = [
            'id' => $order->getId(),
            'revenue' => $order->getPrice()
        ];

        if ($coupon) {
            $actionField['coupon'] = $coupon;
        }

        Ecommerce::registerAction('purchase', Ecommerce::prepareBasketItemsChanges($ecItems), $actionField);
    }

    public static function saveBasket($basket)
    {
        if ($basket->getOrderId()) {
            return;
        }

        $basketKey = self::getBasketKey($basket);

        if (!empty(self::$baskets[$basketKey])) {
            return;
        }

        $actualBasket = \Bitrix\Sale\Basket::loadItemsForFUser(
            $basket->getFUserId(true),
            $basket->getSiteId()
        );
        foreach ($actualBasket->getBasketItems() as $basketItem) {
            $basketItem->getPropertyCollection();
        }
        $actualBasket->rewind();

        self::$baskets[$basketKey] = $actualBasket;
    }

    public static function getSavedBasket($basket)
    {
        $basketKey = self::getBasketKey($basket);

        if (empty(self::$baskets[$basketKey])) {
            return null;
        }

        return self::$baskets[$basketKey];
    }

    public static function getBasketKey($basket)
    {
        return $basket->getFUserId(true) . '_' . $basket->getSiteId();
    }
}