<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 02:17
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace db;

use db\Db;
use db\DataBase;

class CoreDb
{
    //数据库读写
    public static function database($table)
    {
            return DataBase::getInstance($table);
    }

}





