<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/3/31 0031 23:38
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace db;
use PDO;

class Db
{
    private $dataBaseCfg = [
        'db'=>'mysql', //数据库类型
        'host'=>'47.93.58.25', //主机地址
        'port'=>'3306',  //数据库端口
        'user'=>'easyphp',  //用户名
        'pass'=>'LFRpxFEzPF8hpGx5',  //密码
        'charset'=>'utf8', //字符集
        'dbname'=>'easyphp' //表名
    ];


    protected static $tablename = null; //数据库表名
    private $conn = null;

    public function __construct(){

        $this->connect();

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

    //查询一条数据
    public function fetch($condition = [], $field = "*", $sort = '')
    {

        $where = $this->condition($condition);
        if ($sort) {$where .= " ORDER by " . $sort;}
        return $this->conn->query("SELECT " . $field . " FROM " . self::$tablename . " WHERE 1 " . $where . " LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    }
    //查询全部数据
    public function fetchall($condition = [], $field = "*")
    {
        $where = $this->condition($condition);

        return $this->conn->query("SELECT " . $field . " FROM " . self::$tablename . " WHERE 1 " . $where )->fetchALL(PDO::FETCH_ASSOC);
    }
    //更新数据操作
    public function update($data = [], $condition = [])
    {
        $where = $this->condition($condition);
        $field = $this->field($data);
        $num = $this->conn->exec("UPDATE ".self::$tablename." SET {$field} WHERE 1 " .$where);
        if($num>0){
            return true;
        }else{
            return false;
        }


    }
    //删除数据操作
    public function delete($condition=[])
    {
        $where = $this->condition($condition);
        if(!$condition){$where = '';}
        $num = $this->conn->exec("DELETE FROM ".self::$tablename." WHERE 1".$where);
        if($num>0){
            return true;
        }else{
            return false;
        }
    }

    //新增数据操作
    public function insert($data=[])
    {
        $field = $this->field($data);
        $num = $this->conn->exec("INSERT ".self::$tablename." SET {$field}");

        if($num>0){
            if(null !== $this->conn->lastInsertId()){
                return $this->conn->lastInsertId();
            }
        }else{
            return false;
        }
    }




    public function condition($condition)
    {
        $where = null;
        if (is_array($condition)){
            foreach ($condition as $key => $value) {
                $where .= " AND `" . $key . "` = '" . $value . "' ";
            }
        }else{
            $where = $condition;
        }


        return $where;
    }
    public function field($data)
    {

        $field = null;
        if (is_array($data)){
            $count = count($data);
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                if(is_string($value)){
                    $value = '\''.$value.'\'';
                    print_r($value,false);
                }

                $field .= $key ."=". $value;
                if($i<$count){
                    $field .=",";
                }

            }
        }else{
            $field = $data;
        }


        return $field;
    }


}