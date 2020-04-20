<?php
/*
 *
 * Factory 创建设计模式 - 抽象工厂模式
 *
 *1、问题：
 * QQ一键换皮肤，是怎么实现的。聊天背景，字体颜色等都会改变。
 *2、解决方案
 * 我们把聊天背景，字体颜色，作为产品族。然后面向客户的是各种整套皮肤
 *
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











