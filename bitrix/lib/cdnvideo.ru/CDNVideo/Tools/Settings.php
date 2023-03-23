<?php

namespace CDNVideo\Tools;

class Settings
{
    const MODE_DEFAULT = 0;
    const MODE_EXTENDED = 1;

    private $_parseAll = false;

    private $_serverName = '';

    /**
     * Domain name at CDNVideo
     *
     * @var string
     */
    private $_domain = '';

    /**
     * List of file extensions that should be cached on CDNVideo.
     *
     * @var array
     */
    private $_targets = [
        'css',
        'js',
        'jpeg',
        'jpg',
        'png',
        'gif',
        'mp3',
        'mp4',
        'ogg',
        'flv',
    ];

    /**
     * ID that should be given from CDNVideo to API access
     *
     * @var string
     */
    private $_id = '';

    /**
     * Cache time period: 14 * 24 * 60 * 60 = 1209600
     * @var int
     */
    private $_cacheTTL = 1209600;

    /**
     * Time when cache was initialized
     * @var int
     */
    private $_cacheInitTime = 0;

    protected $_cacheNextTime = 0;

    public function __construct(array $settings)
    {
        $this->_domain = Utils::val($settings, 'domain', []);
        $this->_targets = Utils::val($settings, 'targets', $this->_targets);
        $this->_id = Utils::val($settings, 'id', '');
        $this->_cacheTTL = Utils::val($settings, 'ttl', 1209600);
        $this->_cacheInitTime = Utils::val($settings, 'init_time', time());
        $this->_cacheNextTime = time() + rand(10, 50);
        $this->_parseAll = Utils::val($settings, 'parse_all', false);
        $this->_serverName = Utils::val($settings, 'server_name', null);

        if (!is_array($this->_domain)) {
            $this->_domain = [$this->_domain];
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getParseAll()
    {
        return (bool)$this->_parseAll;
    }

    /**
     * Return target extensions that should be processed
     *
     * @return array
     */
    public function getTargets()
    {
        return $this->_targets;
    }

    /**
     * Return (random) CDN host
     *
     * @return string
     */
    public function getCDNHost()
    {
        $domain = $this->_domain;
        shuffle($domain);

        return array_shift($domain);
    }

    /**
     * Return host of current server
     * @return string
     */
    public function getLocalHost()
    {
        return empty($this->_serverName) ? $_SERVER['SERVER_NAME'] : $this->_serverName;
    }

    /**
     * Return cache TTL time
     *
     * @return int
     */
    public function getCacheTTL()
    {
        return (int)$this->_cacheTTL;
    }

    /**
     * Get time when cache was initialized
     *
     * @return int
     */
    public function getCacheInitTime()
    {
        return (int)$this->_cacheInitTime;
    }

    /**
     * Return scheme and host of current server
     *
     * @return string
     */
    public function getLocalScheme()
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
    }

    public function getNextInitTime()
    {
        return $this->_cacheNextTime;
    }
}