<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 02:21
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace db;

class DataBase extends Db
{

    private static $instance;
    private static $dataconfig;
    private function __clone()
    {

    }

    public static function getInstance($table,$dataconfig=[])
    {
        self::$dataconfig = $dataconfig;
        parent::$tablename = $table;
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct(self::$dataconfig);
    }
}