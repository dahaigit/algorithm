<?php
/*
 * observer 行为设计模式 - 观察者模式
 * 当对象间存在一对多关系时，则使用观察者模式（Observer Pattern）。
 * 比如，当一个对象被修改时，则会自动通知它的依赖对象。观察者模式属于行为型模式。
 *
 * */
/*
 * 微信关注推送消息例子
 * https://www.cnblogs.com/luohanguo/p/7825656.html
 */

/**
 * 被观察者接口
 */
interface Observerable
{
    /*
     * 关注,实际不应写follow，应该写registUser，这里我们为了好理解
     */
    public function follow($user);
    /*
     * 取消关注（remove）
     */
    public function unfollow($user);
    /*
     * 消息通知
     */
    public function notify();
}

class WechatServer implements Observerable
{
    public $users;

    public $msg;

    public function follow($user) {
        $this->users[$user->id] = $user;
    }

    public function unfollow($user) {
        if (isset($this->users[$user->id])) {
            unset($this->users[$user->id]);
        }
    }
    public function notify() {
        foreach ($this->users as $user) {
            $user->readMsg($this->msg);
        }
    }

    public function send($msg)
    {
        $this->msg = $msg;
        echo '微信公众号发消息啦：' . '<br>';
        $this->notify();
    }
}

interface Observer
{
    public function readMsg($msg);
}

class User implements Observer
{
    public $id;
    public $name;
    public function __construct($id, $name) {
        $this->name = $name;
        $this->id = $id;
    }
    public function readMsg($msg) {
        echo $this->name . "收到消息:" . $msg . '<br>';
    }
}

$wechatServer = new WechatServer();
$user1 = new User(1, '张三');
$user2 = new User(2, '大海');
$wechatServer->follow($user1);
$wechatServer->follow($user2);
$wechatServer->send('10月20号放假');
/*
 *微信公众号发消息啦：
 * 张三收到消息:10月20号放假
 * 大海收到消息:10月20号放假
 *
 * */

$wechatServer->unfollow($user1);
$wechatServer->send('看看我还有多少个粉丝');
/*
 * 微信公众号发消息啦：
 * 大海收到消息:看看我还有多少个粉丝
 */











































