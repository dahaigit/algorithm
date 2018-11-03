<?php
/*
 *
 * 设计模式 - 单例模式
 * 按照目的分为：
 * 创建设计模式1-5，
        单例模式【Singleton】
        工厂模式【Factory】
        抽象工厂模式【AbstractFactory】
        建造者模式【Builder】
        原型模式【Prototype】
 * 结构设计模式6-12，
        适配器模式【Adapter】
        桥接模式【Bridge】
        合成模式【Composite】
        装饰器模式【Decorator】
        门面模式【Facade】
        代理模式【Proxy】
        享元模式【Flyweight】
 * 以及行为设计模式13-23。
        策略模式【Strategy】
        模板方法模式【TemplateMethod】
        观察者模式【Observer】
        迭代器模式【Iterator】
        责任链模式【ResponsibilityChain】
        命令模式【Command】
        备忘录模式【Memento】
        状态模式【State】
        访问者模式【Visitor】
        中介者模式【Mediator】
        解释器模式【Interpreter】
    https://my.oschina.net/botkenni/blog/1603660
    http://www.runoob.com/design-pattern/memento-pattern.html
 *
 * */

class People
{
    /**
     * 实例
     * @var
     */
    public static $instance;

    /*
     * 私有构造函数，防止外部new
     * */
    private function __construct() {
    }

    /**
     * 获取实例
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 私有克隆函数，防止克隆
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    private function __clone()
    {
        trigger_error('Clone is not allowed');
    }
}

$people = People::getInstance();
$people->username = 'dahai';

$people1 = People::getInstance();
var_dump($people);
var_dump($people1);















