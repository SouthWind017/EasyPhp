<?php
/**
 * GitHub:https://github.com/SouthWind017/
 * Name:zhang tian yu
 * CreateTime:2021/4/1 0001 05:59
 * IdeName:PhpStorm
 * FileName:EasyPhp
 * @copyright (c) EasyPhp All Rights Reserved
 */
use controller\AbsController;
class Controller extends AbsController{

    public function fetch($action=null,$data = []) {//作为AbsController的实现
        if(empty($action)){
            $action = $GLOBALS['config']['application']['default_view'];
            $file = 'application/'.Module."/view/index/".$action.".".$GLOBALS['config']['application']['default_view_suffix'];
        }else{
            $file = 'application/'.Module."/view/".$action.".".$GLOBALS['config']['application']['default_view_suffix'];
        }
        if(file_exists($file)){
            return require $file;
        }else{
            exit("控制器：".Controller." 下的模板文件：{$action} 不存在！");
        }

    }
    public function headTemplate($action,$data = [])
    {
        $file = 'application/'.Module."/view/".$action.".".$GLOBALS['config']['application']['default_view_suffix'];
        if(file_exists($file)){
            return require $file;
        }else{
            exit("模板头文件不存在！");
        }
    }


}