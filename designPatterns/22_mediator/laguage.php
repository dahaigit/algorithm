<?php
/*
 * mediator 行为设计模式 - 中介模式
 * 多个类相互耦合，形成了网状结构
 * 将上述网状结构分离为星型结构。
 * 就像各国语言相互交流的话，很麻烦，现在我们有翻译软件，这样就不用我们去懂对方语言了（双方没有直接关联了）
 *
 * */


//抽象语言
abstract class Language
{
    public function __construct() {
    }
    public function say($msg, $type = 1)
    {
        return Util::translate($msg, $type);
    }
}

class Util
{
    public static function translate($msg, $obj)
    {
        // 所有的关系都在这个类中
        if ($obj instanceof Chinese) {
            echo "hello world";
        } else {
            echo '你好';
        }
    }
}

class English extends Language
{

}

class Chinese extends Language
{

}

$chinese = new Chinese();
$chinese->say('你好啊', $chinese); // hello world

$english = new English();
$english->say('hello', $english); // 你好



























