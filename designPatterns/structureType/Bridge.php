<?php
/*
 * bridge 结构设计模式 - 桥接模式
 * 目的：将抽象与实现分离，使它们可以独立变化。它是用组合关系代替继承关系来实现，从而降低 抽象和实现这两个可变维度的耦合度。
 * 主要角色：
 * 1）抽象(Abstraction)该类持有一个对“实现”角色的引用，抽象角色中的方法需要 “实现” 角色来实现。抽象角色一般为抽象类
 * 2）修正抽象(Refined Abstraction)抽象的具体实现，对抽象的方法进行完善和扩展
 * 3）实现(Implementer)定义“实现”维度的基本操作，提供给“抽象”使用。该类一般为接口或抽象类
 * 4）具体实现(Concrete Implementer) “实现”接口的具体实现
 *
 * 案例：用桥接模式，实现大杯小杯，有糖无糖的奶茶。
 * */

/**
 * 定义一个奶茶的抽象
 */
abstract class MilkyTeaAbstract
{
    // 添加什么
    protected $addWhatObj;

    /**
     *  把甜度注入到奶茶的抽象类中
     * @param AddWhatImplementer $addWhatImplementer
     */
    public function __construct(AddWhatImplementer $addWhatImplementer)
    {
        $this->addWhatObj = $addWhatImplementer;
    }

    /**
     * 定义一个制作奶茶的方法
     */
    abstract function make();
}

/**
 * 定义一个添加什么的接口（实现者接口）
 */
interface AddWhatImplementer
{
    public function add();
}

class HaveSugar implements AddWhatImplementer
{
    public function add()
    {
        return '加糖';
    }
}

/**
 * 定义一个小杯奶茶类
 */
class LittleMilkyTea extends MilkyTeaAbstract
{
    public function make()
    {
        return '小杯' . $this->addWhatObj->add();
    }
}

// 现在我需要一个小杯加糖奶茶
$haveSugar = new HaveSugar();
$littleMilkyTea = new LittleMilkyTea($haveSugar);
echo $littleMilkyTea->make();