<?php
/*
 *
 * IOC 创建设计模式 - IOC容器
 * 简单实现
 *
 *
 * */

/**
 * 1、实现一个IOC 容器
 * Class Container
 */
class Container
{
    /**
     * 绑定的对象都放在这个数值里面
     * @var
     */
    private $bindings;

    public static $instance;

    /**
     * 服务注册
     * @param $abstract 被绑定名称
     * @param $concrete
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * 生成对象
     * @param $abstract
     * @param array $parameters
     * @return mixed
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function make($abstract, $parameters=[])
    {
        //  调用回调函数，并把一个数组参数作为回调函数的参数
        $this->bindings[$abstract] or die('未发现：' . $abstract);
        return call_user_func_array($this->bindings[$abstract], $parameters);
    }

    /**
     * 单例模式
     * @return mixed
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct() {
    }
    private function __clone() {}
}

/**
 * 人类
 * Class People
 */
class People
{
    public $username;
    public function __construct($username) {
        return $this->username = $username;
    }

    public function sayHello($hello)
    {
        return $this->username . $hello;
    }
}

/**
 * 书类
 * Class Book
 */
class Book
{
    public function fly($name)
    {
        return $name . '飞起来了';
    }
}

/**
 * 2、服务注册（绑定）
 */
$container = Container::getInstance();
// 把我们的People注册到容器中
$container->bind('people', function($username){
    return new People($username);
});
$container->bind('book', function(){
    return new Book();
});

// 3、写一个像laravel一样的app，其实是公共调用容器方法
function app($abstract, $parameters = [])
{
    $container = Container::getInstance();
    return $container->make($abstract, $parameters);
}

// 4、代码中调用
$people = app('people', ['世界']);
var_dump($people->sayHello('你好')); // 世界你好

echo app('book')->fly('php'); // php飞起来了








