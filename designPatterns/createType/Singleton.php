<?php
/*
 * 创建设计模式 - 单例模式
 *
 * 目的：让某个类只能生成一个实例
 *
 * */

class People
{
    /**
     * 实例
     * @var
     */
    public static $instance;

    /*
     * 私有构造函数，防止外部new
     * */
    private function __construct() {
    }

    /**
     * 获取实例
     * @author mhl
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 私有克隆函数，防止克隆
     * @author mhl
     */
    private function __clone()
    {
        trigger_error('Clone is not allowed');
    }
}

$people = People::getInstance();
$people->username = 'dahai';

$people1 = People::getInstance();
var_dump($people);
var_dump($people1);















