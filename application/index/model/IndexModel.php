<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 04:50
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
class IndexModel extends Model{

    public function __construct(){
        $this->tablename = 'user'; //数据库表名
        parent::__construct();
    }

}