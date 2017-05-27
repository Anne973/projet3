<?php
namespace MonBlog;

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require $class.'.php';
        }
    }
}

/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 22/04/2017
 * Time: 08:55
 */