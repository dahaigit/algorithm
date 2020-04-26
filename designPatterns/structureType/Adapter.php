<?php
/*
 * 结构型模式 - 适配器模式
 * 目的：让原来不兼容的两个接口协同工作
 * 主要角色：
 * 1）目标接口，TargetInterface。期望转成的接口
 * 2）被适配者，Adaptee原有的接口，被适配的接口
 * 3）被适配的类，AdapteeClass真正被适配的对象
 * 4）适配器类adapter，将被适配者和目标接口组合到一起的类
 *
 * 案例：实现一个电源适配器，让110v电压适配220v电
 * */

/**
 *  目标接口
 */
interface V220Target
{
    /**
     * Notes: 输出电压
     */
    public function outputV220();
}

/**
 * 被适配的接口
 */
interface V110Adaptee
{
    /**
     * Notes: 输出电压
     */
    public function outputV110();
}

/**
 * 被适配的类
 */
class V110AdapteeClass implements V110Adaptee
{
    public function outputV110()
    {
        return 110;
    }
}

/**
 * 适配器，电源适配器
 */
class Adapter extends V110AdapteeClass implements V220Target
{
    public function outputV220()
    {
        return $this->transformer($this->outputV110(), 2);
    }

    /**
     * Notes: 变压器
     * @param $v 电压
     * @param $multiple 升级倍数
     */
    private function transformer($v, $multiple)
    {
        return $v * $multiple;
    }
}

$adapter = new Adapter();
$needV = $adapter->outputV220();
var_dump('通过适配器获取到的电压是：' . $needV);









