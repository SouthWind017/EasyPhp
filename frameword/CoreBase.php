<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 07:00
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
class CoreBase{
    public function __construct(){

    }
    public function run(){
        //加载配置
        $this->loadConfig();
        //请求参数
        $this->getRequestParams();
        //自动加载
        $this->Regautoload();
        //请求分发
        $this->dispatch();

    }
    private function loadConfig(){
        $GLOBALS['config'] = require 'config/config.php';

    }

    private function autoload($class){

        $file = __DIR__ ."/" . $class . '.php';
        if (file_exists($file)) {
            //加载基类
            require_once $file;
        }else{
            //加载应用类
            if($this->checkstr($class,'Model')){
                $file = $_SERVER['DOCUMENT_ROOT'].'/application/'.Module."/model/".$class.".php";
            }elseif ($this->checkstr($class,'Controller')){
                $file = $_SERVER['DOCUMENT_ROOT'].'/application/'.Module."/controller/".$class.".php";
            }
            if (file_exists($file)) {
                require_once $file;
            }

        }
    }
    private function Regautoload(){
        spl_autoload_register(array('CoreBase', 'autoload'));
    }
    private function getRequestParams(){
       //模块参数
       $default_module = $GLOBALS['config']['application']['default_module'];
       $m = isset($_GET['m'])?$_GET['m']:$default_module;
       define('Module',$m);
       //控制器参数
       $default_controller = $GLOBALS['config']['application']['default_controller'];
       $c = isset($_GET['c'])?$_GET['c']:$default_controller;
       define('Controller',$c);
       //方法参数
       $default_action = $GLOBALS['config']['application']['default_action'];
       $a = isset($_GET['a'])?$_GET['a']:$default_action;
       define('Action',$a);


    }
    private function dispatch(){
        //实例化控制器
        $controller = Controller.'Controller';
        $ctrl = new $controller;
        //调用当前方法
        $action = Action;
        $ctrl->$action();

    }
    private function checkstr($str,$_str){
        $needle =$_str;//判断是否包含$_str这个字符
        $tmparray = explode($needle,$str);
        if(count($tmparray)>1){
            return true;
        } else{
            return false;
        }
    }
}