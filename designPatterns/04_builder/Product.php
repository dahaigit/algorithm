<?php
/*
 *
 * builder 设计模式 - 建造者模式
 *
 * 建造者模式主要在于创建一些复杂的对象。
 * 将一个复杂对象的构造与它的表示分离，
 * 使同样的构建过程可以创建不同的表示的设计模式，
 * 当创建对象特别复杂的时候可以考虑
 *
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
// 仔细看，电脑建造者并没有返回对象，只是导演了电脑的步骤而已
$winComputer = $winComputerBuilder->getComputer();
var_dump($winComputer);








