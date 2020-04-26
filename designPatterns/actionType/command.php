<?php
/*
 * command 行为设计模式 - 命令模式
 * 优点：
 * 1、实现行为请求者和行为实现者解耦
 * 2、可以对行为进行：记录，撤销/重做，事务等处理
 * 3、将一组行为抽象为对象，实现二者之间的松耦合，这就是命令模式
 *
 * 命令模式的四种角色：
 * 1. 接收者（Receiver）负责执行与请求相关的操作
 * 2. 命令接口（Command）封装execute()、undo()等方法
 * 3. 具体命令（ConcreteCommand）实现命令接口中的方法
 * 4. 请求者（Invoker）包含Command接口变量
 *
 * 区别，最主要是解决的问题不同，还有一些功能不同
 * 1、策略模式 把易于变化的行为分别封装起来，让它们之间可以互相替换， 让这些行为的变化独立于拥有这些行为的客户。
 *  GoF《设计模式》中说道：定义一系列算法，把它们一个个封装起来，并且使它们可以相互替换。该模式使得算法可独立于它们的客户变化。
 * 2、命令模式是一种对象行为型模式，它主要解决的问题是：在软件构建过程中，“行为请求者”与“行为实现者”通常呈现一种“紧耦合”的问题。
 *  GoF《设计模式》中说道：将一个请求封装为一个对象，从而使你可用不同的请求对客户进行参数化；对请求排队或记录请求日志，以及支持可撤销的操作。
 *
 * */

/*
 * 工作的接口
 */
interface Work
{
    /*
     * 工作需要执行完成
     */
    public function execute();
}

/*
 * 程序员-具体命令的执行者
 */
class Programmer implements Work
{
    public $name;
    public $workName;
    public function __construct($name, $workName)
    {
        $this->name = $name;
        $this->workName = $workName;
    }

    /*
     * 程序猿工作内容
     */
    public function execute()
    {
        echo '程序猿'. $this->name .'摘到了'.$this->workName.'斤香蕉';
    }
}

/*
 * 采摘香蕉的工作
 */
class BananaWork implements Work
{
    public $people;
    public function __construct(Programmer $programmer) {
        $this->people = $programmer;
    }

    /*
     * 让具体人去完成
     */
    public function execute()
    {
        $this->people->execute();
    }
}

/*
 * 经理
 */
class Manager
{
    private $work;
    public function __construct(Work $work) {
        $this->work = $work;
    }

    /*
     * 经理有让工作执行的方法
     */
    public function action()
    {
        $this->work->execute();
    }
}

// 1、经理口头告诉大海，现在有一个任务，并传入需要的参数（命令）
$dahai = new Programmer('大海', 100);
// 2、创建一个采摘香蕉的工作
$bananaWork = new BananaWork($dahai);
// 3、经理说现在执行
$manager = new Manager($bananaWork);
$manager->action(); // 程序猿大海摘到了100斤香蕉




































