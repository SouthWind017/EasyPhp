<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 06:42
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
class IndexController extends Controller{
    public function index(){
        $user = new IndexModel();
        $data  = $user->fetchall();
        return $this->fetch("index/index",$data);
    }
}