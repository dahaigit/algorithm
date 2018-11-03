<?php
/*
 * state 行为设计模式 - 状态模式
 * 对象如何在每一种状态下表现出不同的行为？
 * 类的行为是基于它的状态改变的。这种类型的设计模式属于行为型模式。
 * 在状态模式中，我们创建表示各种状态的对象和一个行为随着状态对象改变而改变的 context 对象
 * 状态模式主要解决的是当控制一个对象状态的条件表达式过于复杂时的情况。
 * 把状态的判断逻辑转移到表示不同状态的一系列类中，可以把复杂的判断逻辑简化。
 * https://www.cnblogs.com/nnn123/p/6723729.html
 *
 * */

/**
 * 普通实现方式-实现电梯
 */
abstract class ILift {
    //电梯的四个状态
    const OPENING_STATE = 1;  //门敞状态
    const CLOSING_STATE = 2;  //门闭状态
    const RUNNING_STATE = 3;  //运行状态
    const STOPPING_STATE = 4; //停止状态；


    //设置电梯的状态
    public abstract function setState($state);

    //首先电梯门开启动作
    public abstract function open();

    //电梯门有开启，那当然也就有关闭了
    public abstract function close();

    //电梯要能上能下，跑起来
    public abstract function run();

    //电梯还要能停下来，停不下来那就扯淡了
    public abstract function stop();
}

/**
 * 电梯的实现类
 */
class Lift extends  ILift {
    private $state;

    public function setState($state) {
        $this->state = $state;
    }
    //电梯门关闭
    public function close() {
        //电梯在什么状态下才能关闭
        switch($this->state){
            case ILift::OPENING_STATE:  //如果是则可以关门，同时修改电梯状态
                $this->setState(ILift::CLOSING_STATE);
                break;
            case ILift::CLOSING_STATE:  //如果电梯就是关门状态，则什么都不做
                //do nothing;
                return ;
                break;
            case ILift::RUNNING_STATE: //如果是正在运行，门本来就是关闭的，也说明都不做
                //do nothing;
                return ;
                break;
            case ILift::STOPPING_STATE:  //如果是停止状态，本也是关闭的，什么也不做
                //do nothing;
                return ;
                break;
        }
        echo 'Lift colse <br>';
    }

    //电梯门开启
    public function open() {
        //电梯在什么状态才能开启
        switch($this->state){
            case ILift::OPENING_STATE: //如果已经在门敞状态，则什么都不做
                //do nothing;
                return ;
                break;
            case ILift::CLOSING_STATE: //如是电梯时关闭状态，则可以开启
                $this->setState(ILift::OPENING_STATE);
                break;
            case ILift::RUNNING_STATE: //正在运行状态，则不能开门，什么都不做
                //do nothing;
                return ;
                break;
            case ILift::STOPPING_STATE: //停止状态，淡然要开门了
                $this->setState(ILift::OPENING_STATE);
                break;
        }
        echo 'Lift open <br>';
    }
    ///电梯开始跑起来
    public function run() {
        switch($this->state){
            case ILift::OPENING_STATE: //如果已经在门敞状态，则不你能运行，什么都不做
                //do nothing;
                return ;
                break;
            case ILift::CLOSING_STATE: //如是电梯时关闭状态，则可以运行
                $this->setState(ILift::RUNNING_STATE);
                break;
            case ILift::RUNNING_STATE: //正在运行状态，则什么都不做
                //do nothing;
                return ;
                break;
            case ILift::STOPPING_STATE: //停止状态，可以运行
                $this->setState(ILift::RUNNING_STATE);
        }
        echo 'Lift run <br>';
    }

    //电梯停止
    public function stop() {
        switch($this->state){
            case ILift::OPENING_STATE: //如果已经在门敞状态，那肯定要先停下来的，什么都不做
                //do nothing;
                return ;
                break;
            case ILift::CLOSING_STATE: //如是电梯时关闭状态，则当然可以停止了
                $this->setState(ILift::CLOSING_STATE);
                break;
            case ILift::RUNNING_STATE: //正在运行状态，有运行当然那也就有停止了
                $this->setState(ILift::CLOSING_STATE);
                break;
            case ILift::STOPPING_STATE: //停止状态，什么都不做
                //do nothing;
                return ;
                break;
        }
        echo 'Lift stop <br>';
    }

}
$lift = new Lift();

//电梯的初始条件应该是停止状态
$lift->setState(ILift::STOPPING_STATE);
//首先是电梯门开启，人进去
$lift->open();

//然后电梯门关闭
$lift->close();

//再然后，电梯跑起来，向上或者向下
$lift->run();
//最后到达目的地，电梯挺下来
$lift->stop();




























