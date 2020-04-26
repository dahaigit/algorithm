<?php
/*
 *
 * Factory 创建设计模式 - 抽象工厂模式
 * 目的：提供一个创建产品族的接口（抽象类），其每个子类可以生产一些列相关的产品。
 * 主要角色：
 * 1） 抽象工厂：提供了创建产品的接口，它包含多个创建产品的方法 newProduct()，可以创建多个不同等级的产品。
 * 2）具体工厂：主要是实现抽象工厂中的多个抽象方法，完成具体产品的创建。
 * 3）抽象产品：定义产品的规范，描述了产品的主要特征和功能，抽象工厂模式有多个抽象产品。
 * 4）具体产品：实现了抽象产品角色所定义的接口，由具体工厂来创建，它同具体工厂之间是多对一的关系。
 *
 * 案例：实现qq皮肤整套一键切换功能。
 * */

/**
 * 定义一个皮肤抽象工厂
 */
abstract class SkinAbstractFactory
{
    /**
     * 定义一个创建字体颜色对象的方法
     */
    abstract public function createFontColor();

    /**
     * 定义一个创建背景的对象方法
     */
    abstract public function createBack();
}

/**
 * 定义一个高级皮肤工厂
 */
class HighSkinFactory extends SkinAbstractFactory
{
    public function createBack()
    {
        return new Back();
    }

    public function createFontColor()
    {
        return new FontColor(__CLASS__);
    }
}

/**
 * 定义一个低级皮肤工厂
 */
class LowSkinFactory extends SkinAbstractFactory
{
    public function createBack()
    {
        return new Back();
    }

    public function createFontColor()
    {
        return new FontColor(__CLASS__);
    }
}

/**
 * 定义一个字体颜色类
 */
class FontColor
{
    public $level = null;

    public function __construct($level)
    {
        $this->level = $level;
    }

    public function showColor()
    {
        echo "我的颜色级别为："  .  $this->level;
    }
}

/**
 * 定义一个背景类
 */
class Back
{
    public function showBack()
    {
        echo "我是通用背景";
    }
}

// 我现在需要一套高级时装
$highSkinFactor = new HighSkinFactory();
$fontColor = $highSkinFactor->createFontColor();
$back = $highSkinFactor->createBack();
$fontColor->showColor();
$back->showBack();











