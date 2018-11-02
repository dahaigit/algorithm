<?php
/*
 * strategy 行为设计模式 - 策略模式
 * http://www.php.cn/php-weizijiaocheng-396867.html
 * 和bride桥接模式的关系：
 * 1、桥接包含策略模式
 * 2、策略模式不考虑类本身的编号，只有算法的可替代性，是行为设计模式
 * 3、桥接侧重类本身和类行为的组合，是结构设计模式
 * 具体区别：
 * http://www.blogjava.net/wangle/archive/2007/04/25/113545.html?from=singlemessage&isappinstalled=0
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