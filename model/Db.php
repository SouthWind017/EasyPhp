<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/3/31 0031 23:38
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */

class Db
{
    private $dataBaseCfg = [
        'db'=>'mysql', //数据库类型
        'host'=>'localhost', //主机地址
        'port'=>'3306',  //数据库端口
        'user'=>'root',  //用户名
        'pass'=>'root',  //密码
        'charset'=>'utf8', //字符集
        'dbname'=>'test' //字符集
    ];

    private static $instance = null;

    private $conn = null;

    private function __construct(){

    }


}