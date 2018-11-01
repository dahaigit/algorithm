<?php
/*
 *
 * bridge 结构设计模式 - 桥接模式
 * 问题：一开始站内发送消息种类有：发送短信，站内信息，邮箱等，突然有一天消息还有级别的区分：有普通，紧急，加急
 *
 * 一个抽象产生多种具体的实现方式，单纯的通过子类继承会有子类爆炸（过多的子类产生）的现象，系统需要它们之间进行动态耦合。
 *
 * 1、我们需要抽象一个info（消息类）类，里面有一个抽象的发送方法send
 * 2、分别用站内信息和邮箱继承消息类，并实现发送方法
 * 3、定义级别接口，里面有一个没有实现的方法sayLevel
 * 4、分别用普通级别，紧急级别类实现级别接口
 * 5、（作废，改用6、）调用：new一个站内信息对象，把级别对象传进去，然后调用发送方法send
 * 6、使用类似工厂模式优化桥接模式调用
 * https://blog.csdn.net/chenmoimg_/article/details/65633211
 *
 *
 * */

/*
 * 抽象一个发信息的抽象类
 *
 * */
abstract class InfoAbstract
{
    public $level;
    public function __construct(InfoLevel $infoLevel) {
        $this->level = $infoLevel;
    }

    abstract public function send($to, $content);
}

/**
 * 站内信息
 */
class Zn extends InfoAbstract
{
    public function send($to, $content) {
        echo '站内信息：' . $to . $content . $this->level->sayLevel();
    }
}

/*
 * 邮箱
 * */
class Email extends InfoAbstract
{
    public function send($to, $content) {
        echo '邮箱：' . $to . $content . $this->level->sayLevel();
    }
}

/**
 * 定义消息级别
 * Interface InfoLevel
 */
interface InfoLevel
{
    public function sayLevel();
}

/*
 * 普通级别
 * */
class CommonLevel implements InfoLevel
{
    public function sayLevel() {
        return '-普通级别';
    }
}

/*
 * 紧急级别
 * */
class WarnLevel implements InfoLevel
{
    public function sayLevel() {
        return '-紧急级别';
    }
}

/*
 * 我们这里使用，类似工厂模式+静态方法简化我们的调用
 * */
class Info
{
    // 当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用
    public static function getInStance($infoAbstract, $infoLevel) {
        return new $infoAbstract(new $infoLevel());
    }
}

$info = Info::getInStance('email', 'CommonLevel');
$info->send('张三', '你好'); // 邮箱：张三你好-普通级别
