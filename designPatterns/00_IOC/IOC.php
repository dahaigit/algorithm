<?php
/*
 *
 * IOC 创建设计模式 - 控制反转模式
 * 实现了：1）服务绑定，2）创建对象，3）获取对象
 * 未实现：存储实例等功能，自动注入等功能
 * */
class Container
{
    /**
     * @var array 绑定的服务
     */
    private $bindings = [];

    /**
     * 获取对象
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->resolve($id);
    }

    /**
     * 判断服务是否存在
     *
     * @param $id
     * @return bool
     */
    public function has($id)
    {
        return isset($this->bindings[$id]) ? true : false;
    }

    /**
     * 服务绑定
     *
     * @param $abstract 服务名称
     * @param $concrete 混泥土，也是实现
     * @return mixed
     */
    public function bind($abstract, $concrete)
    {
        return $this->bindings[$abstract] = $concrete;
    }

    /**
     * 创建对象
     *
     * @param $abstract 服务名称
     * @param $parameters 服务参数
     */
    public function make($abstract, $parameters = [])
    {
        return $this->resolve($abstract, $parameters);
    }

    /**
     * 实际创建对象并返回对象（英文意思，解决问题）
     *
     * @param $abstract
     * @param array $parameters
     * @return mixed
     */
    private function resolve($abstract, $parameters = [])
    {
        if ($this->has($abstract)) {
            // 兼容参数为字符串和每次参数的情况
            if (!is_array($parameters) || empty($parameters)) {
                $parameters = [$parameters];
            }
            array_unshift($parameters, $this);
            return call_user_func_array($this->bindings[$abstract], $parameters);
        } else {
            $this->throwNotFoundService($abstract);
        }
    }

    private function throwNotFoundService($abstract)
    {
        throw new Exception('容器中未找到指定对象' . $abstract);
    }
}

/**
 * 定义了一个超人，这个超人可以注入一个超能力
 */
class SupperMan
{
    public $power;

    public function __construct(PowerInterface $power)
    {
        $this->power = $power;
    }

    public function showPowerName()
    {
        $this->power->showName();
    }
}

/**
 * 定义了一个能力接口
 */
interface PowerInterface
{
    public function showName();
}

/**
 * X光线的能力
 */
class XPower implements PowerInterface
{
    public function showName()
    {
        var_dump(__CLASS__);
    }
}

/**
 * 创建一个容器
 */
$container = new Container();

/**
 * 把x光线的能力绑定到容器上
 */
$container->bind('xPower', function($app) {
    return new XPower();
});
/**
 * 把超人类绑定到容器上，并且给他一个超能力，什么能力暂时未知
 */
$container->bind('superMan', function($app, $powerName) {
    return new SupperMan($app->make($powerName));
});

/**
 * 制造一个会x光线的超人
 */
$superMan1 = $container->make('superMan', 'xPower');
$superMan1->showPowerName();

//// 单独获取x光线能力
$container->get('xPower')->showName();






