<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 05:10
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
require_once 'autoload.php';
use db\CoreDb;
//---------数据库操作类------------
echo '<hr>查询全部数据：';
$res = CoreDb::database('user')->fetchall();//查询全部数据 fetchall为空代表查询全部  user是表名
print_r($res,false);
echo '<hr>查询一条数据：';
$res = CoreDb::database('user')->fetch(['id'=>1]);//查询一条数据   //['id'=>1] 是查询条件 可以是数组 可以是sql
print_r($res,false);
echo '<hr>';
echo '<hr>更新数据：';
$res = CoreDb::database('user')->update(['name'=>time()],['id'=>1]);//更新数据 ['name'=>time()]name是字段  time()是更改的值  ['id'=>1]是条件
print_r(var_dump($res),false);
echo '<hr>';
echo '<hr>删除数据：';
$res = CoreDb::database('user')->delete(['id'=>1]);//删除数据  ['id'=>1]是条件
print_r(var_dump($res),false);
echo '<hr>';
echo '<hr>新增数据：';
$res = CoreDb::database('user')->insert(['name'=>'test','pass'=>'123','create_time'=>time()]);//新增数据
print_r(var_dump($res),false);
echo '<hr>';