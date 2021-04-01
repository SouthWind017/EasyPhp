<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 04:49
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
use db\DataBase;
use db\CoreDb;
class Model{
    protected $db = null;
    protected  $tablename = null; //数据库表名
    public function __construct(){
        $this->init();
    }
    private function init(){

        $dataBaseConfig = [
            'user'=>$GLOBALS['config']['db']['user'],
            'pass'=>$GLOBALS['config']['db']['pass'],
            'dbname'=>$GLOBALS['config']['db']['dbname']
        ];

        $this->db = DataBase::getInstance($this->tablename,$dataBaseConfig);
    }
    public function fetch($condition = [], $field = "*", $sort = ''){
        return CoreDb::database($this->tablename)->fetch($condition, $field, $sort);
    }
    public function fetchall($condition = [], $field = "*"){
        return CoreDb::database($this->tablename)->fetchall($condition, $field);
    }
    public function update($data = [], $condition = []){
        return CoreDb::database($this->tablename)->update($data = [], $condition = []);
    }
    public function delete($condition=[]){
        return CoreDb::database($this->tablename)->update($condition);
    }
    public function insert($data=[]){
        return CoreDb::database($this->tablename)->update($data);
    }


}