<?php

namespace CDNVideo;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CDNVideoLoader
{
    public static function load($file)
    {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
        $path = realpath(__DIR__);
        $target = $path . DIRECTORY_SEPARATOR . $file . '.php';

        if (is_file($target)) {
            include_once $target;
        } else if (preg_match('/' . __NAMESPACE__ . '/', $target)) {
            if (is_file($target)) {
                include_once $target;
            }
        }
    }

    static protected function glob_recursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);

        foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, self::glob_recursive($dir . '/' . basename($pattern), $flags));
        }

        return $files;
    }

    public static function register()
    {
        \spl_autoload_register('CDNVideo\CDNVideoLoader::load');
    }
}

CDNVideoLoader::register();
