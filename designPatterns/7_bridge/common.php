<?php
/*
 *
 * bridge 结构设计模式 - 桥接模式
 * 问题：一开始站内发送消息种类有：发送短信，站内信息，邮箱等，突然有一天消息还有级别的区分：有普通，紧急，加急
 *
 * 一个抽象产生多种具体的实现方式，单纯的通过子类继承会有子类爆炸（过多的子类产生）的现象，系统需要它们之间进行动态耦合。
 *
 * 首先我们先用以前的方式实现
 *
 * */

/*
 * 普通实现
 *
 * */
interface Info
{
    public function send($to, $content);
}

class Zn implements Info
{
    public function send($to, $content) {
        echo '发送站内消息' . $to . $content;
    }
}

class Email implements Info
{
    public function send($to, $content) {
        echo '发送邮箱' . $to . $content;
    }
}

class Msg implements Info
{
    public function send($to, $content) {
        echo '发送短信' . $to . $content;
    }
}

$msg = new Msg();
$msg->send('张三', '新年快乐'); // 发送短信张三新年快乐

/*
 * 现在问题来了，我们现在业务逻辑需要把消息分级别，不管什么种类的短信
 * 我们一般两种方法：
 * 1、现有的类分出来子类(但会导致子类过多不好维护)
 * 2、分别在send方法里面添加逻辑（会导致代码重复写，而且后期一旦新添加分类或级别就很难维护了）
 * */


