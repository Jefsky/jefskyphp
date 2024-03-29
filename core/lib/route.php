<?php

namespace core\lib;

use core\lib\conf;

/**
 * 路由类
 */
class route
{

    public $controller;
    public $action;

    /**
     * 1. 隐藏index.php 
     * 2. 获取URL参数部分
     * 3. 返回对应的控制器和方法
     */
    public function __construct()
    {
        // xxx.com/index.php/index/index
        if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
            // 解析 /index/index
            $path = $_SERVER['PATH_INFO'];
            $patharr = explode('/', trim($path, '/'));
            if (isset($patharr[0])) {
                $this->controller = $patharr[0];
            }
            unset($patharr[0]);
            if (isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = conf::get('DEFAULT_ACTION', 'route');
            }
            //url多余部分转换成 GET
            //id/1/str/2
            $count = count($patharr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($patharr[$i + 1])) {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }
        } else {
            $this->controller = conf::get('DEFAULT_CTRL', 'route');
            $this->action = conf::get('DEFAULT_ACTION', 'route');
        }
    }
}
