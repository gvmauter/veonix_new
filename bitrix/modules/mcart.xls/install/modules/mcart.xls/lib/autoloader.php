<?php
namespace Mcart\Xls;

class Autoloader{

    public static function register() {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }
        return spl_autoload_register(array('\\'.__NAMESPACE__.'\Autoloader', 'load'));
    }

    public static function load($className){
        static $root = null;
        if (!is_string($className) || class_exists($className,false)) {
            return false;
        }
        $className = ltrim($className, "\\");
		if (preg_match('#[^\\\\/A-z0-9_]#', $className)){
            return false;
        }
        $arClassName = explode('\\', $className);
        if($arClassName[0].'\\'.$arClassName[1] !== __NAMESPACE__){
            return false;
        }
        if($root === null){
            $root = dirname(__FILE__);
        }
        $classFilePath = $root;
        foreach ($arClassName as $i => $part) {
            if($i<=1){
                continue;
            }
            $classFilePath .= DIRECTORY_SEPARATOR.$part;
        }
        $classFilePath = strtolower($classFilePath);
        if (substr($classFilePath, -5) == 'table'){
            $classFilePath = substr($classFilePath, 0, -5);
        }
        $classFilePath .= '.php';
        if ((file_exists($classFilePath) === false) || (is_readable($classFilePath) === false)) {
            return false;
        }
        require_once($classFilePath);
    }

}