<?php
/*
 *
 * Factory 创建设计模式 - 工厂方法模式
 *
 *1、问题：
 * 在开发中我们需要调用依赖的对象来处理逻辑，但我们并不需要关心依赖的创建过程。
 *2、解决方案
 * 我们可以把依赖的创建和依赖的表现相分离，具体做法是，封装一个创建类的接口，然后定义一个创建实现类去实现这个接口。
 * 然后再调用的地方，直接通过这个创建实现类获取我们想要的对象。
 *
 * */


/**
 * 汽车生产接口
 */
interface CarInterface
{
    /**
     * 定义了一个现实品牌的接口
     */
    public function createCar();

}

/***
 * 定义一个车的抽象类，车可以显示品牌
 */
abstract class Car
{
    abstract function showBrand();
}

/**
 *  奔驰车
 */
class Benz extends Car
{
    public function showBrand()
    {
        echo "大家好我是" . __CLASS__;
    }
}

/**
 * 奔驰车工厂，专门生产奔驰车
 */
class BenzFactory implements CarInterface
{
    public function createCar()
    {
        return new Benz();
    }
}

/**
 * QQ汽车
 */
class QQ extends Car
{
    public function showBrand()
    {
        echo "大家好我是" . __CLASS__;
    }
}

/**
 * QQ汽车工厂，生产QQ汽车
 */
class QQFactory implements CarInterface
{
    public function createCar()
    {
        return new QQ();
    }
}

// 我需要一辆奔驰车
$benzFactory = new BenzFactory();
$benz = $benzFactory->createCar();
$benz->showBrand();

// 我又需要一辆qq车
$qqFactory = new QQFactory();
$qq = $qqFactory->createCar();
$qq->showBrand();
















