<?php
/*
 *
 * Factory 创建设计模式 - 工厂方法模式
 *
 * 目的：定义一个用户创建产品的接口，由子类决定生产什么产品。
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
















