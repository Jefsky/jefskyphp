<?php

namespace core;

use core\lib\log;
use core\lib\route;

/**
 * 框架核心类
 */
class JEFSKYPHP
{

    public static $classMap = array();
    public $assign = array();

    /**
     * 启动框架
     */
    static public function run()
    {
        log::init();
        $route = new route();
        $ctrlClass = $route->controller;
        $action = $route->action;
        $ctrlFile = APP . '/controller/' . $ctrlClass . '.php';
        $ctrlClass = '\\' . MODULE . '\controller\\' . $ctrlClass . '';
        if (is_file($ctrlFile)) {
            include $ctrlFile;
            $controller = new $ctrlClass();
            $controller->beforeAction($action);
            $controller->$action();
            $controller->afterAction($action);
            log::log('controller:' . $ctrlClass . '  action:' . $action);
        } else {
            log: log('找不到控制器' . $ctrlClass);
            throw new \Excetion('找不到控制器' . $ctrlClass);
        }
    }
    /**
     * 自动加载类库
     *  new \core\route();
     *  $class = '\core\route';
     *  JEFSKYPHP.'/core/route.php';
     */
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = JEFSKYPHP . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}
