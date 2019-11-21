# Jefskyphp
A php framework

## 框架运行流程
入口文件 -> 定义常量  -> 引入函数库  -> 自动加载类  -> 启动框架 <- 路由解析  <- 加载控制器 <- 返回结果     

## 入口文件
/index.php

## 类自动加载
```
spl_autoload_register('\core\jefskyphp::load');
```
没有引入的类调用load方法  

## 路由类

默认的路由地址：  xxx.com/index.php/index/index    

1. 隐藏index.php    
    在根目录添加.htaccess文件
2. 获取URL参数部分   
    /index/index/id/1/str/2
3. 返回对应的控制器和方法   
   
## 模型类
class Model extends \Medoo\medoo{

## 视图类
twig

## 配置类
core\lib\conf.php

## 控制器
添加core\lib\Controller基类   
添加beforeAction方法   
添加afterAction方法   

## 日志类
core\lib\log.php

## composer加载
1. 新建composer.json文件
```
{
    "name": "jefsky/jefskyphp",
    "descrption": "a php framework",
    "type": "framework",
    "keywords": [
        "PHP", "PHP FrameWork"
    ],
    "require": {
        "php": ">= 5.3.0",
        "filp/whoops": "*",
        "symfony/var-dumper": "*",
        "catfan/medoo": "*",
        "twig/twig": "*"
    },
    "repositories": {
        "packagist": {
            "type": "composer",
            "url": "https://packagist.phpcomposer.com"
        }
    }
}
```
2. 使用composer命令安装依赖
```
composer install
composer update
```

## whoops用于调试,方便定位错误点
https://github.com/filp/whoops

## var-dumper优化输出调试
https://packagist.org/packages/symfony/var-dumper

## medoo数据库操作
http://medoo.lvtao.net/doc.php

## twig模版引擎
https://twig.symfony.com/doc/2.x/api.html
