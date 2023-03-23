<?

    namespace Bxmaker\AutoSitemap;

    use Bitrix\Main\Application;
    use \Bitrix\Main\Entity;
    use Bitrix\Main\Localization\Loc;
    use Bitrix\Main\Type\DateTime;
    use Bitrix\Main\Loader;

    Loc::loadMessages(__FILE__);


    Class File
    {

        static public $moduleId = 'bxmaker.autositemap';

        protected $bModuleInstalled = false;
        protected $bOpened = false;
        protected $siteId = false;
        protected $sitemapId = false;
        protected $sitemapFilename = 'sitemap_bxmaker_autositemap_test.xml';
        protected $oSitemapFile = null;

        public $LAST_ERROR = '';

        public function __construct($siteId, $sitemapId, $filename = 'sitemap_bxmaker_autositemap_test.xml')
        {
            $this->siteId = $siteId;
            $this->sitemapId = $sitemapId;
            $this->sitemapFilename = $filename;
            $this->bModuleInstalled = \Bitrix\Main\Loader::includeModule('seo');
        }

        public function __destruct()
        {
            if ($this->bOpened) {
                // закончили добавление, закрываем файл, все готово
                $this->oSitemapFile->addFooter();
                $this->oSitemapFile->close();
                $this->bOpened = false;
            }
        }

        /**
         * Открытие файла с дополнительными ссылками, можно не открывать а сразу добавлять используя метод add()
         * @return bool
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\IO\FileOpenException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        public function open()
        {
            if (!$this->bOpened) {
                if ($arSitemap = \Bitrix\Seo\SitemapTable::getById($this->sitemapId)->fetch()) {

                    if ($arSitemap['SITE_ID'] != $this->siteId) {
                        $this->LAST_ERROR = Loc::getMessage('BXMAKER_ASM_FILE_SITEMAP_SITE_NOT_EQUAL_SETTED', array(
                            '#SITEMAP_ID#' => $this->sitemapId,
                            '#SITE_ID_OROGONAL#' => $arSitemap['SITE_ID'],
                            '#SITE_ID#' => $this->siteId,
                        ));
                        return false;
                    }

                    // добавляем
                    $arSitemap['SITE'] = \Bitrix\Main\SiteTable::getByPrimary($this->siteId)->fetch();
                    $arSitemap['SETTINGS'] = unserialize($arSitemap['SETTINGS']);
                    $arSitemapSettings = array(
                        'SITE_ID' => $arSitemap['SITE_ID'],
                        'PROTOCOL' => $arSitemap['SETTINGS']['PROTO'] == 1 ? 'https' : 'http',
                        'DOMAIN' => $arSitemap['SETTINGS']['DOMAIN'],
                    );

                    //  формируем дополнительный файл ---------------------
                    $this->oSitemapFile = new \Bitrix\Seo\SitemapFile($this->sitemapFilename, $arSitemapSettings);
                    $this->oSitemapFile->delete();
                    $this->oSitemapFile->open('ab+');
                    $this->oSitemapFile->addHeader();

                    $this->bOpened = true;

                } else {
                    $this->LAST_ERROR = Loc::getMessage('BXMAKER_ASM_FILE_SITEMAP_NOT_FOUND', array(
                        '#SITEMAP_ID#' => $this->sitemapId
                    ));
                    return false;
                }
            }
            return true;
        }


        /**
         * Добавление ссылки, перед этим не обязательно открывать файл - метод open()
         * @param $url
         * @param null $time
         * @return bool
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\IO\FileOpenException
         * @throws \Bitrix\Main\ObjectPropertyException
         * @throws \Bitrix\Main\SystemException
         */
        public function add($url, $time = null)
        {
            if (is_null($time)) $time = time();

            if (!$this->bModuleInstalled) {
                $this->LAST_ERROR = Loc::getMessage('BXMAKER_ASM_MODULE_SEO_NOT_INSTALLED');
                return false;
            }

            if (!$this->bOpened) {
                if ($this->open()) {
                    $this->oSitemapFile->addIBlockEntry($url, $time);
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->oSitemapFile->addIBlockEntry($url, $time);
                return true;
            }
        }

        /**
         * Окончание вставки ссылок
         * @return bool
         */
        public function complete()
        {
            if (!$this->bModuleInstalled) {
                $this->LAST_ERROR = Loc::getMessage('BXMAKER_ASM_FILE_MODULE_SEO_NOT_INSTALLED');
                return false;
            }
            if ($this->bOpened) {
                // закончили добавление, закрываем файл, все готово
                $this->oSitemapFile->addFooter();
                $this->oSitemapFile->close();
                $this->bOpened = false;
            }
            return true;
        }

    }


?>