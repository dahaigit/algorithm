<?php
/*
 *
 * adapter 结构设计模式 - 适配器模式
 * 问题：电脑usb可以给手机，电脑，不同品牌都可以充电，代码如何实现
 * 1、target 目标，需要规范的接口
 * 2、adapter 适配器，其实是最终使用的类比如UsbAdapter
 * 3、adaptee 受改造者，需要适配的类，比如xiaomi类，huawei类
 * 4、使用UsbAdapter创建对象，然后使用指定方法
 *
 * */

/**
 * 定义usb充电接口
 * Interface Usb
 */
interface UsbTarget
{
    // 充电
    public function charge();
    // 传资料
    public function transmission();
}

//用户期待适配类
class UsbAdapter implements UsbTarget
{
    private $_phone;

    public function __construct($phone, $username = '')
    {
        $this->_phone = new $phone($username);
    }

    public function charge()
    {
        $this->_phone->charge();
    }

    public function transmission()
    {
        $this->_phone->transmission();
    }
}


class Xiaomi implements UsbTarget
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function charge()
    {
        echo $this->name . '小米手机在充电<br>';
    }

    public function transmission() {
        echo '小米手机在传输东西<br>';
    }
}

class Huawei implements UsbTarget
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function charge()
    {
        echo '华为手机在充电<br>';
    }

    public function transmission() {
        echo '华为手机在传输东西<br>';
    }
}

$xiaomi = new UsbAdapter('Xiaomi', '大海');
$xiaomi->charge();
$xiaomi->transmission();

$huawei = new UsbAdapter('Huawei');
$huawei->charge();
$huawei->transmission();






