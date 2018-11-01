<?php
/*
 * strategy 结构设计模式 - 策略模式
 * http://www.php.cn/php-weizijiaocheng-396867.html
 * 和工厂模式类似，
 * 1、策略模式是把选择权交给了client端，工厂是封装在工厂里面
 * 2、策略返回的是计算结果，工厂返回的是对象
 * 3、简单理解：普通饭店（工厂：你只用交钱，别人选材和做饭）和自助餐餐厅（策略：自己选材料）
 * 这样就会有更好的拓展性
 *
 * */

/**
 * 减价策略接口
 */
interface SubStrategy
{
    public function SubPrice($price);
}

class HighSub implements SubStrategy
{
    public function SubPrice($price) {
        echo '高级会员：';
        return 0.7 * $price;
    }
}

class Price
{
    private $subStrategy;

    public function __construct(SubStrategy $subStrategy) {
        $this->subStrategy = $subStrategy;
    }

    public function getRealPrice($price)
    {
        echo "原价：" . $price . '<br>';
        return $this->subStrategy->SubPrice($price);
    }
}

$highSub = new HighSub();
$price = new Price($highSub);
echo $price->getRealPrice(100);