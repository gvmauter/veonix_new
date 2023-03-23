<?php

class Autoloader
{

    protected static $fileExt = '.php';

    protected static $pathTop = __DIR__;

    public static function loader($className)
    {

        $filename = static::$pathTop.'/'.str_replace('\\', '/', $className) . static::$fileExt;
        if (file_exists($filename)) {
            include_once $filename;
        }

    }

    public static function setFileExt($fileExt)
    {
        static::$fileExt = $fileExt;
    }

    public static function setPath($path)
    {
        static::$pathTop = $path;
    }

}

Autoloader::setFileExt('.php');
spl_autoload_register('Autoloader::loader');

// EOF
