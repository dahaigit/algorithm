<?php
/*
 *
 * singleton 设计模式 - 多个类常见单例的构造方法
 *
 * */

abstract class FactorySingleton
{
    protected static $instances = [];

    final public static function getInstance()
    {
        $realClassName = self::getRealClassName();
        if (!isset(self::$instances[$realClassName])) {
            self::$instances[$realClassName] = new $realClassName();
        }
        return self::$instances[$realClassName];
    }

    /**
     * 后期静态绑定
     * @return string
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public static function getRealClassName()
    {
        return get_called_class();
    }

    private function __construct(){}
    private function __clone() {}
}

class People extends FactorySingleton
{

}

$people = People::getInstance();
$people->username = 12;
var_dump($people);

$people2 = People::getInstance();
$people2->username = 13;
var_dump($people);
var_dump($people2);













