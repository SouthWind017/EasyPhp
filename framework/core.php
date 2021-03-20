<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/3/21 2:16
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
define('EP_ROOT',dirname(__FILE__).'/');
define('TIMESTAMP', time());

use app\core\Dispatcher;
use app\core\Database;

/* 加载核心模块 */
require_once EP_ROOT.'core/Dispatcher.php';
require_once EP_ROOT.'core/Database.php';

$Dispatcher = new Dispatcher();
$return_status = $Dispatcher->start();

