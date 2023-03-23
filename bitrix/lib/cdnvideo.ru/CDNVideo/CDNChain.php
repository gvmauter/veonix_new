<?php
namespace CDNVideo;

use CDNVideo\Tools\Utils;

class CDNChain
{
    /**
     *
     * @var array
     */
    protected $cacheChainTime = array();

    /**
     * List of chain elements
     *
     * @var CDNVideo[]
     */
    protected $chain = array();

    /**
     * @param array $options
     * @return $this
     */
    public function addChainElement($options = array())
    {
        $key = Utils::val($options, 'chainKey', null);
        if (empty($key)) {
            $key = md5(serialize($options));
        }

        $chainElement      = new CDNVideo($options);
        $this->chain[$key] = $chainElement;
        $this->setCacheTime($key, $chainElement->getCacheTime());

        return $this;
    }

    /**
     * Process html by chain
     *
     * @param $html
     *
     * @return string
     */
    public function process($html)
    {
        foreach ($this->chain as $key => $CDNVideo) {
            $html = $CDNVideo->process($html);
            $this->setCacheTime($key, $CDNVideo->getCacheTime());
        }

        return $html;
    }

    /**
     * Store cache time for each chain element
     *
     * @param $key
     * @param $time
     *
     * @return $this
     */
    protected function setCacheTime($key, $time)
    {
        $this->cacheChainTime[$key] = $time;

        return $this;
    }

    /**
     * Get cache time by key. If key is empty all list will be return
     *
     * @param null $key
     *
     * @return array|string
     */
    public function getCacheTime($key = null)
    {
        if (empty($key)) {
            return $this->cacheChainTime;
        }

        return Utils::val($this->cacheChainTime, $key, 0);
    }
}