<?php
/*
 *
 * Factory 设计模式 - 工厂模式, 不如laravel中的IOC控制反转
 *
 * 1. 对象的创建过程/实例化准备工作很复杂，需要初始化很多参数、查询数据库等。
 * 2.类本身有好多子类，这些类的创建过程在业务中容易发生改变，或者对类的调用容易发生改变。
 *
 * */


/**
 * Factory class[工厂模式]
 * @author ITYangs<ityangs@163.com>
 */
interface SystemFactory
{
    public function createSystem($type);
}

class MySystemFactory implements SystemFactory
{
    // 实现工厂方法
    public function createSystem($type)
    {
        switch ($type) {
            case 'Mac':
                return new MacSystem();
            case 'Win':
                return new WinSystem();
            case 'Linux':
                return new LinuxSystem();
        }
    }
}

class System{ /* ... */}
class WinSystem extends System{ /* ... */}
class MacSystem extends System{ /* ... */}
class LinuxSystem extends System{ /* ... */}

//创建我的系统工厂
$System_obj = new MySystemFactory();
//用我的系统工厂分别创建不同系统对象
var_dump($System_obj->createSystem('Mac'));//输出：object(MacSystem)#2 (0) { }
var_dump($System_obj->createSystem('Win'));//输出：object(WinSystem)#2 (0) { }
var_dump($System_obj->createSystem('Linux'));//输出：object(LinuxSystem)#2 (0) { }












