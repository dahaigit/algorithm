<?php
/*
 * template 行为设计模式 - 模板模式
 * 这里举《PHP设计模式》的一个例子：
 * 一个银行可以有许多不同类型的银行账户，
 * 但是所有账户的处理方式基本相同。
 * 假设我们现在有两类账户，一类是普通账户，一类是信用卡账户。
 * 现在进行支付，信用卡允许透支，普通账户不允许透支，
 * 即账户金额不允许小于零
 *
 * */

/*
 * 银行卡模板
 * */
abstract class CardTemplate
{
    /*
     * 余额
     * */
    protected $balance = 100;

    /*
     * 消费
     */
    abstract protected function adjust($price);

    /*
     * 支付
     */
    public function pay($price)
    {
        $this->adjust($price);
        $this->display();
    }

    /**
     * 显示支付信息
     * @return mixed
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    abstract protected function display();
}

/*
 * 普通银行卡
 */
class Card extends CardTemplate
{
    protected $flag;
    protected function adjust($price) {
        if ($this->balance >= $price) {
            $this->balance -= $price;
            $this->flag = true;
        } else {
            $this->flag = false;
        }
    }
    protected function display() {
        if ($this->flag) {
            echo '支付成功，所剩余额为：' . $this->balance;
        } else {
            echo '支付失败，余额不足，所剩余额为：' . $this->balance;
        }
    }
}

class Credit extends CardTemplate
{
    protected function adjust($price) {
        $this->balance -= $price;
    }

    protected function display() {
        echo '感谢您使用信用支付，所剩余额为'.$this->balance;
    }
}

$card = new Card();
$card->pay(120); // 支付失败，余额不足，所剩余额为：100
$card->pay(100); // 支付成功，所剩余额为：0
$card->pay(1); // 支付失败，余额不足，所剩余额为：0

$credit = new Credit();
$credit->pay(120); // 感谢您使用信用支付，所剩余额为-20











































