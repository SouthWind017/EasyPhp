<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 06:24
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace controller;
use view\View;
abstract class AbsController implements View{
    abstract public function fetch($action=null,$data = []);//抽象类作为Controller的抽象类
    abstract public function headTemplate($action,$data = []);
}