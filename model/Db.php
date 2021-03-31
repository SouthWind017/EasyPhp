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
        'dbname'=>'test' //表名
    ];

    private static $instance = null;

    private $conn = null;

    private function __construct(){

        $this->connect();

    }
    private function __clone(){

    }
    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance=new self();
        }
        return self::$instance;

    }
    private function connect(){ //数据库连接
        try {
            $dsn = "{$this->dataBaseCfg['db']}:host={$this->dataBaseCfg['host']};port={$this->dataBaseCfg['port']};dbname={$this->dataBaseCfg['dbname']};charset={$this->dataBaseCfg['charset']}";
            //创建PDO对象
            $this->conn = new PDO($dsn,$this->dataBaseCfg['user'],$this->dataBaseCfg['pass']);
            //设置字符集
            $this->conn->query("SET NAMES {$this->dataBaseCfg['charset']}");
        }catch (PDOException $e){
            die('数据库连接失败'.$e->getMessage());
        }
    }


}