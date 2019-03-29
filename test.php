<?php
/*
 * 接口隔离原则 - 设计模式原则 - discipline
 *
 * */


interface OrderForPortal
{
    public function getOrder();
}

interface OrderForOtherSys
{
    public function getOrder();
    public function insertOrder();
}

interface OrderForAdmin
{
    public function getOrder();
    public function insertOrder();
    public function update();
    public function deleteOrder();
}

class Order implements OrderForPortal,OrderForOtherSys,OrderForAdmin
{
    private function __construct() {

    }

    public static function getProtal(){
        return (new Self());
    }

    public static function getOther(){
        return (new Self());
    }

    public static function getAdmin(){
        return (new Self());
    }

    public function getOrder() {
        // TODO: Implement getOrder() method.
    }
    public function insertOrder() {
        // TODO: Implement insertOrder() method.
    }
    public function update() {
        // TODO: Implement update() method.
    }
    public function deleteOrder() {
        // TODO: Implement deleteOrder() method.
    }
}
$orders = Order::getProtal();

var_dump($orders);























