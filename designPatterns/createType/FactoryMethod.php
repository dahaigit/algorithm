<?php
/*
 * Factory 创建设计模式 - 工厂方法模式
 * 目的：定义一个用户创建产品的接口，由子类决定生产什么产品。
 * 主要角色：
 * 1）抽象工厂（Abstract Factory）：提供了创建产品的接口，调用者通过它访问具体工厂的工厂方法 newProduct() 来创建产品；
 * 2）具体工厂（Concrete Factory）：主要是实现抽象工厂中的抽象方法，具体产品的创建；
 * 3）抽象产品（Product）：定义了产品的规范，描述了产品的主要特征和功能；
 * 4）具体产品（Concrete Product）：实现了抽象产品角色所定义的接口，有具体工厂来创建，它同具体工厂之间一一对应。
 *
 * 案例：实现一个汽车工厂方法
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
 * 定义一个车的接口，车可以显示品牌
 */
interface Car
{
    public function showBrand();
}

/**
 *  奔驰车
 */
class Benz implements Car
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
class QQ implements Car
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
















