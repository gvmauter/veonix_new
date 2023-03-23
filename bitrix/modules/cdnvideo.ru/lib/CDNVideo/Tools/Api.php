<?php

namespace CDNVideo\Tools;

class Api
{
    private $_url = 'http://api.cdnvideo.ru:8888/';
    private $_settings;
    private $_client;

    const CONTENT_TYPE_HTTP = 'http';
    const METHOD_PURGE_FILE = '0/purge1';
    const METHOD_PURGE_ALL = '0/purge';

    public function __construct(Settings $settings)
    {
        $this->_settings = $settings;
        $this->_client = new Client($this->_settings);
    }

    /**
     * @return bool|mixed
     */
    public function cacheFlushAll()
    {
        $url = $this->buildURL(self::METHOD_PURGE_ALL, [
            'type' => self::CONTENT_TYPE_HTTP,
            'object' => '*',
        ]);

        return $this->_client->call($url);
    }

    /**
     * @param $file
     * @return bool|mixed
     */
    public function cacheFlushFile($file)
    {
        $file = Utils::format_path($file, $this->_settings);

        $url = $this->buildURL(self::METHOD_PURGE_FILE, [
            'type' => self::CONTENT_TYPE_HTTP,
            'object' => $file,
        ]);

        return $this->_client->call($url);
    }

    public function buildURL($method = '', $params = [])
    {
        $query = http_build_query(array_merge([
            'id' => $this->_settings->getId(),
        ], $params));

        return $this->_url . $method . '?' . $query;
    }
}