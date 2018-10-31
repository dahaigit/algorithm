<?php
/*
 *
 * bridge 结构设计模式 - 桥接模式
 * 问题：一开始站内发送消息种类有：发送短信，站内信息，邮箱等，突然有一天消息还有级别的区分：有普通，紧急，加急
 * 首先我们先用以前的方式实现
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
