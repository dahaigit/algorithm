<?php
/*
 * state 行为设计模式 - 状态模式
 * 对象如何在每一种状态下表现出不同的行为？
 * 在状态模式中，我们创建表示各种状态的对象和一个行为随着状态对象改变而改变的 context 对象
 * 状态模式主要解决的是当控制一个对象状态的条件表达式过于复杂时的情况。
 * 把状态的判断逻辑转移到表示不同状态的一系列类中，可以把复杂的判断逻辑简化。
 * https://www.cnblogs.com/nnn123/p/6723729.html
 *
 * */

/**
 * 抽象一个余额状态
 */
abstract class Status
{
    public $content;

    public function setContent(Content $content)
    {
        $this->content = $content;
    }

    /**
     * 足够金额
     */
    abstract public function enough();

    /**
     * 金额不够
     */
    abstract public function notEnough();

    /**
     * 消费
     */
    abstract public function shoping();
}

class EnoughStatus extends Status
{
    public function enough() {

    }

    /**
     * 设置状态为没钱
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function notEnough() {
        $this->content->setStatus(Content::$notEnough);
    }

    public function shoping() {
        echo '购买成功' . '<br>';
    }
}

class NotEnoughStatus extends Status
{
    /**
     * 设置状态为有钱
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function enough() {
        $this->content->setStatus(Content::$enough);
    }

    public function notEnough()
    {

    }

    public function shoping() {
        echo '购买失败，金额不足' . '<br>';
    }
}



class Content
{
    static $enough = '';
    static $notEnough = '';

    private $status = '';

    public function __construct()
    {
        self::$enough = new EnoughStatus();
        self::$notEnough = new NotEnoughStatus();
    }

    public function setStatus(Status $status)
    {
        $this->status = $status;
        $this->status->setContent($this);
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function enough()
    {
        $this->status->enough();
    }

    public function notEnough()
    {
        $this->status->notEnough();
    }

    public function shoping()
    {
        $this->status->shoping();
    }
}

$content = new Content();
// 一开始没有钱
$content->setStatus(new NotEnoughStatus());
$content->shoping(); // 购买失败，金额不足
$content->enough();
$content->shoping(); // 购买成功
$content->notEnough();
$content->shoping(); // 购买失败，金额不足

/*
 * 总结
 * 和策略模式的区别
 * 策略模式：客户端可以选择不同策略解决同一个问题
 *  例如：压缩算法有几个，用户可以选择一个用
 * 状态模式：在不同状态下，同一个对象对同一件事情的处理方式不一样，
 *  例如：人状态好的时候工作效率高，状态差的时候效率低，而人又不能自己选择状态，状态在运行(重点)的时候可能会变化
 *
 * */



























