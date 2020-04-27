<?php
/*
 * strategy 行为设计模式 - 策略模式
 * 目的：定义一系列算法，并将这些算法封装起来。使它们可以相互替换，这样算法的改变不影响客户端
 * 主要角色：
 * 1）策略strategy策略的公共接口
 * 2）具体策略concreteStrategy策略的具体实现，也就是实际算法
 * 3）上下文context策略上下文类
 *
 * 案例：实现一个商场打折返现的故事
 * */

/* * 特别说明：和桥接bridge的关系：
 * 1）桥接模式包含策略模式
 * 2）策略模式不考虑类本身的变化，只有算法的可替代性，是行为设计模式
 * 3）桥接侧重类本身和行为的组合，是结构设计模式
 * */

/**
 * 定义一个减价策略的接口
 */
interface SubPriceStrategyInterface
{
    public function sub($originPrice);
}

/**
 * 定义一个8折优惠算法类
 */
class SubPrice8 implements SubPriceStrategyInterface
{
    public function sub($originPrice)
    {
        return 0.8 * $originPrice;
    }
}

/**
 * 定义一个策略上下文类
 */
class StrategyContext
{
    public $subPriceStrategy = null;

    public function __construct(SubPriceStrategyInterface $subPriceStrategy)
    {
        $this->subPriceStrategy = $subPriceStrategy;
    }

    /**
     * 获取优惠后的结果
     * @param $originPrice
     */
    public function getSubResult($originPrice)
    {
        return $this->subPriceStrategy->sub($originPrice);
    }
}

// 现在我需要一个8折优惠
$originPrice = 500;
$subPrice8 = new SubPrice8();
$strategyContext = new StrategyContext($subPrice8);
echo $strategyContext->getSubResult($originPrice); // 400
