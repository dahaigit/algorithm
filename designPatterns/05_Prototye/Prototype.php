<?php
/*
 *
 * builder 创建设计模式 - 原型模式
 *
 * 有时候，部分对象需要被初始化多次。
 * 而特别是在如果初始化需要耗费大量时间与资源的时候进行预初始化并且存储下这些对象，
 * 就会用到原型模式
 * 其实 用对象克隆也可以实现
 *
 * */
/**
 *
 * 原型接口
 *
 */
interface Prototype { public function copy(); }

/**
 * 具体实现
 *
 */
class ConcretePrototype implements Prototype{
    private  $_name;
    public function __construct($name) { $this->_name = $name; }
    public function copy() { return clone $this;}
}

class Test {}

// client
$object1 = new ConcretePrototype(new Test());
var_dump($object1);//输出：object(ConcretePrototype)#1 (1) { ["_name":"ConcretePrototype":private]=> object(Test)#2 (0) { } }
$object2 = $object1->copy();
var_dump($object2);//输出：object(ConcretePrototype)#3 (1) { ["_name":"ConcretePrototype":private]=> object(Test)#2 (0) { } }











