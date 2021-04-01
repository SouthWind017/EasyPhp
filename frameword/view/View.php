<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 06:05
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace view;
interface View{
    public function fetch($action=null,$data = []);
    public function headTemplate($action,$data = []);
}