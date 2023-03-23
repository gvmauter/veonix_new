<?
use CDNVideo\CDNChain;
use CDNVideo\Tools\Settings;

IncludeModuleLangFile(__FILE__);

class cCDNvideo
{
    static $MODULE_ID = "cdnvideo.ru";

    /**
     * @return bool
     */
    public static function IsActive()
    {
        foreach (GetModuleEvents("main", "OnEndBufferContent", true) as $arEvent) {
            if ($arEvent["TO_MODULE_ID"] === self::$MODULE_ID && $arEvent["TO_CLASS"] === "cCDNvideo") {
                return true;
            }
        }

        return false;
    }

    public static function stop()
    {
        UnRegisterModuleDependences("main", "OnEndBufferContent", self::$MODULE_ID, "cCDNvideo", "OnEndBufferContent");
    }

    /**
     * @return bool
     */
    public static function SetActive()
    {
        if (!self::IsActive()) {
            RegisterModuleDependences("main", "OnEndBufferContent", self::$MODULE_ID, "cCDNvideo", "OnEndBufferContent");
        }

        return self::IsActive();
    }

    /**
     *
     */
    public static function IsSiteActive()
    {
        if (COption::GetOptionInt(self::$MODULE_ID, "MODE") !== Settings::MODE_EXTENDED) {
            return true;
        }

        return !!COption::GetOptionString(self::$MODULE_ID, "DOMAIN_FILES_ENABLE" . self::GetOptionsPostfix(), false);
    }

    /**
     * @param $content
     */
    public function OnEndBufferContent(&$content)
    {
        if (defined("ADMIN_SECTION")) {
            return;
        }

        if (!self::IsActive()) {
            return;
        }

        if (!self::IsSiteActive()) {
            return;
        }

        $postfix = self::GetOptionsPostfix();

        $config = [];
        $config['id'] = 0;
        $config['domain'] = explode(',', COption::GetOptionString(self::$MODULE_ID, "DOMAIN_NAME_FILES" . $postfix));
        $config['domain_av'] = explode(',', COption::GetOptionString(self::$MODULE_ID, "DOMAIN_NAME_AV" . $postfix));
        $config['init_time'] = COption::GetOptionInt(self::$MODULE_ID, "CACHE_TIME" . $postfix);
        $config['ttl'] = COption::GetOptionInt(self::$MODULE_ID, "TTL" . $postfix);
        $config['init_time_av'] = COption::GetOptionInt(self::$MODULE_ID, "CACHE_TIME_AV" . $postfix);
        $config['ttl_av'] = COption::GetOptionInt(self::$MODULE_ID, "TTL_AV" . $postfix);
        $config['active_av'] = COption::GetOptionString(self::$MODULE_ID, "DOMAIN_AV_ENABLE" . $postfix) == 'Y' ? true : false;

        $CDNconfig = [];
        $CDNconfig[] = [
            'id' => $config['id'],
            'domain' => $config['domain'],
            'targets' => [
                'js',
                'jpeg',
                'jpg',
                'png',
                'gif',

            ],
            'init_time' => $config['init_time'], // default: time()
            'ttl' => $config['ttl'], // default: 14 days
            'chainKey' => 'files',
        ];
        if ($config['active_av']) {
            $CDNconfig[] = [
                'id' => $config['id'],
                'domain' => $config['domain_av'],
                'targets' => [
                    'mp3',
                    'mp4',
                    'ogg',
                    'flv',
                ],
                'init_time' => $config['init_time_av'], // default: time()
                'ttl' => $config['ttl_av'], // default: 14 days
                'chainKey' => 'AV',
            ];
        }
        $CDNChain = new CDNChain();
        foreach ($CDNconfig as $conf) {
            $CDNChain->addChainElement($conf);
        }
        $content = $CDNChain->process($content);

        COption::SetOptionInt(self::$MODULE_ID, "CACHE_TIME" . $postfix, $CDNChain->getCacheTime('files'));

        if ($config['active_av']) {
            COption::SetOptionInt(self::$MODULE_ID, "CACHE_TIME_AV" . $postfix, $CDNChain->getCacheTime('AV'));
        }
    }

    /**
     * @return string
     */
    public static function GetOptionsPostfix()
    {
        if (
            COption::GetOptionInt(self::$MODULE_ID, "MODE") === Settings::MODE_EXTENDED
            && defined('SITE_ID')
        ) {
            return '_' . SITE_ID;
        }

        return '';
    }
}