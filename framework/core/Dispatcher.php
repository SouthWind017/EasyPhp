<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/3/21 0021 02:28
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
namespace app\core;

class Dispatcher{
    private $path;

    public function __construct()
    {

        //实例化分发器时得到用户请求的URI
        $this->path = str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);

    }
    public function start()
    {
        //分析URI，得到相应的控制器和方法
        $this->path = trim($this->path, '/');
        $this->path = str_replace(array('.php','.html','.asp'), '', $this->path);

        $paths = explode('/', $this->path);

        //得到控制器类名和方法名
        $dir = array_shift($paths);
        $control = array_shift($paths);
        $method = array_shift($paths);

        //如果控制器类名和方法名为空，则默认为“index”
        if($dir == '') $dir = 'index';
        if($control == '') $control= 'index';
        if($method == '') $method= $control;

        //根据框架的文件结构，得到控制器类的文件路径
        $control_file_name = APP_FILE.'/app/'.$dir.'/controller/'.$control.'.php';

        if(file_exists($control_file_name)){
            include_once($control_file_name);
            $controller_name = 'app\\'.$dir.'\controller\\'.$dir;
            if(class_exists($controller_name)){
                //实例化控制器
                $con = new $controller_name();
                if(method_exists($controller_name, $method)){
                    //如果用户请求的方法存在，则调用之
                    $retrun = $con->$method();
                    $view_file_name = APP_FILE.'/app/'.$dir.'/view/'.$control.'.html';
                    if(file_exists($view_file_name) && $control == $method){
                        include_once($view_file_name);
                    }
                    return 200;
                }
                else return 404;
            }
            else return 404;
        }
        else return 404;


    }

}