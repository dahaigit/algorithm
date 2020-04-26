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
 * 5、调用：new一个站内信息对象，把级别对象传进去，然后调用发送方法send
 * https://blog.csdn.net/chenmoimg_/article/details/65633211
 *
 * */

/*
 * 桥接模式实现
 * 抽象一个发信息的抽象类
 *
 * */
abstract class Info
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
class Zn extends Info
{
    public function send($to, $content) {
        echo '站内信息：' . $to . $content . $this->level->sayLevel();
    }
}

/*
 * 邮箱
 * */
class Email extends Info
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
class commonLevel implements InfoLevel
{
    public function sayLevel() {
        return '-普通级别';
    }
}

/*
 * 紧急级别
 * */
class warnLevel implements InfoLevel
{
    public function sayLevel() {
        return '-紧急级别';
    }
}

$zn = new Zn(new commonLevel());
$zn->send('张三', '生日快乐'); // 站内信息：张三生日快乐-普通级别

$email = new Email(new warnLevel());
$email->send('张三', '生日快乐'); // 邮箱：张三生日快乐-紧急级别