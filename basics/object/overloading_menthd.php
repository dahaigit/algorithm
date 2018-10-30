<?php
/*
 * 面向对象 - 方法重载
 *
 * */

class MethodTest
{
    /**
     * 方法重载
     * @param $name
     * @param $arguments
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function __call($name, $arguments)
    {
        echo "方法重载：'$name' "
            . implode(', ', $arguments). "\r\n";
    }

    /**
     * 静态方法重载
     * @param $name
     * @param $arguments
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public static function __callStatic($name, $arguments)
    {
        echo "静态方法重载：'$name' "
            . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('大海');

MethodTest::runTest('小破孩');  // PHP 5.3.0之后版本






































