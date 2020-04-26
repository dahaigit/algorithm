<?php
/*
 * builder 创建设计模式 - 建造者模式
 * 目的：将一个复杂对象分解成多个相对简单的部分，然后根据不同需要分别创建它们，最后构建成该复杂对象。
 * 主要角色：
 * 1）产品角色：它是包含多个组成部件的复杂对象，有具体建造者来创建其各个部件。
 * 2）抽象建造者：它是一个包含创建产品各个子部件的抽象方法的接口，通常还包含一个返回复杂产品的方法 getResult()。
 * 3）具体建造者：实现 Builder 接口，完成复杂产品的各个部件的具体创建方法。
 * 4）指挥者：它调用建造者对象中的部件构造与装配方法完成复杂对象的创建，在指挥者中不涉及具体产品的信息。
 *
 * 案例：分步实现创建电脑类
 * */

/**
 * 定义一个电脑类
 */
class Computer
{
    public $brandName = '';

    public $cpu = '';

    public function showBrand()
    {
        echo "我的品牌是：" . $this->brandName . '我的cpu是' . $this->cpu;
    }
}

/**
 * 定义一个抽象的电脑建造者
 */
abstract class ComputerBuilder
{
    /**
     * 步骤1
     */
    abstract public function step1();

    /**
     * 步骤2
     */
    abstract public function step2();
    abstract public function getComputer();
}

/**
 * 定义一个windows电脑建造者
 */
class WinComputerBuilder extends ComputerBuilder
{
    private $computer = null;

    public function __construct($brandName, $cpuName)
    {
        $this->computer = new Computer();
        $this->computer->brandName = $brandName;
        $this->computer->cpu = $cpuName;
    }

    public function step1()
    {
        $this->computer->brandName .= 'win7';
    }

    public function step2()
    {
        $this->computer->cpu .= 'win7';
    }

    public function getComputer()
    {
        return $this->computer;
    }
}

/**
 * 定义一个电脑导演，导演记录了电脑的生产流程
 */

class ComputerDirector
{
    /**
     * 导演了步骤
     * @param ComputerBuilder $computerBuilder
     */
    public function directorStep(ComputerBuilder $computerBuilder)
    {
        $computerBuilder->step1();
        $computerBuilder->step2();
    }
}

$winComputerBuilder = new WinComputerBuilder('微软电脑', 'Inter 7');
$computerDirector = new ComputerDirector();
$computerDirector->directorStep($winComputerBuilder);
// 仔细看，电脑导演并没有返回对象，只是导演了电脑的建造步骤而已，返回电脑对象的是电脑建构者。
$winComputer = $winComputerBuilder->getComputer();
var_dump($winComputer);








