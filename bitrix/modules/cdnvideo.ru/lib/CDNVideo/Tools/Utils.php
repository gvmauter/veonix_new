<?php

namespace CDNVideo\Tools;

use InvalidArgumentException;

class Utils
{
    /**
     * UTF-8 aware parse_url() replacement.
     *
     * @return array
     */
    public static function mb_parse_url($url)
    {
        $enc_url = preg_replace_callback('%[^:/@?&=#]+%usD', function ($matches) {
            return urlencode($matches[0]);
        }, $url);

        $parts = parse_url($enc_url);

        if ($parts === false) {
            throw new InvalidArgumentException('Malformed URL: ' . $url);
        }

        foreach ($parts as $name => $value) {
            $parts[$name] = urldecode($value);
        }

        return $parts;
    }

    /**
     * Return back correct url
     *
     * @param $parsed_url
     *
     * @return string
     */
    public static function unparse_url($parsed_url)
    {
        $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
        $host = Utils::val($parsed_url, 'host', '');
        $port = Utils::val($parsed_url, 'port', '');
        $user = Utils::val($parsed_url, 'user', '');
        $pass = Utils::val($parsed_url, 'pass', '');
        $pass = ($user || $pass) ? "$pass@" : '';
        $path = Utils::val($parsed_url, 'path', '');
        $query = Utils::val($parsed_url, 'query', '');
        $fragment = Utils::val($parsed_url, 'fragment', '');
        $query = empty($query) ? '' : ('?' . $query);

        return "$scheme$user$pass$host$port$path$query$fragment";
    }

    /**
     * @param $path
     * @param Settings $settings
     * @return string
     */
    public static function format_path($path, Settings $settings)
    {
        $details = Utils::mb_parse_url($path);
        $details['scheme'] = empty($details['scheme']) ? $settings->getLocalScheme() : $details['scheme'];
        if (empty($details['host'])) {
            $details['host'] = $settings->getCDNHost();
        }

        if (!$settings->getParseAll()) {
            // set CDN only for app
            $localHost = $settings->getLocalHost();

            if ($settings->getCDNHost() == $localHost || !empty($details['host']) && !preg_match("/$localHost/", $details['host'])) {
                return Utils::unparse_url($details);
            }
        }

        $details['host'] = $settings->getCDNHost();

        if (isset($details['path'])) {
            $details['path'] = $details['path'][0] === '/' ? $details['path'] : ('/' . $details['path']);
        }
        $query = Utils::val($details, 'query', '');

        if (!preg_match('/_cvc=/', $query)) {
            $query .= empty($query) ? '' : '&';
            $query .= '_cvc=' . $settings->getCacheInitTime();

            $details['query'] = $query;
        }

        return Utils::unparse_url($details);
    }

    /**
     * Return array key/object property from target or default value
     *
     * @param array|object $target
     * @param string $key
     * @param string $default
     *
     * @return string
     */
    public static function val($target, $key, $default = '')
    {
        if (is_array($target)) {
            $value = array_key_exists($key, $target) ? $target[$key] : $default;
        } else if (is_object($target)) {
            $value = property_exists($target, $key) ? $target->{$key} : $default;
        } else {
            $value = $default;
        }

        return $value;
    }


    /**
     * Validate cache time
     *
     * @param $link
     * @param $initTime
     * @param $ttl
     *
     * @return bool
     */
    public static function update_cache_required($initTime, $ttl)
    {
        return time() > ($initTime + $ttl);
    }

    /**
     * Add cache param for URL as part of query string
     *
     * @param      $link
     * @param null $time
     *
     * @return string
     */
    public static function update_link_cache($link, $time = null)
    {
        $time = empty($time) ? time() : $time;
        $details = Utils::mb_parse_url($link);
        $query = Utils::val($details, 'query', '');

        $query .= empty($query) ? '' : '&';
        $query .= '_cvc=' . $time;

        $details['query'] = $query;
        $link = Utils::unparse_url($details);

        return $link;
    }
}