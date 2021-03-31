<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 03:36
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file =__DIR__ . '/model/' . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('classLoader');