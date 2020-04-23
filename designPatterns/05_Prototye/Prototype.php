<?php
/*
 *
 * builder 创建设计模式 - 原型模式
 *
 * 有时候，部分对象需要被初始化多次。
 * 而特别是在如果初始化需要耗费大量时间与资源的时候进行预初始化并且存储下这些对象，
 * 就会用到原型模式
 * 其实 用对象克隆也可以实现
 *
 * */
/**
 *
 * 定义一个原型接口
 *
 */
interface Prototype
{
    /**
     * 浅拷贝
     */
    public function shallowCopy();

    /**
     * 深拷贝
     */
    public function deepCopy();
}

class PeoplePrototype implements Prototype
{
    private $people = null;

    public function __construct($people)
    {
        $this->people = $people;
    }

    public function getPeople()
    {
        return $this->people;
    }

    public function shallowCopy()
    {
        return clone $this->people;
    }

    public function deepCopy()
    {
        return unserialize(serialize($this->people));
    }
}

class People{}

class Attr{}

$people = new People();
$people->age = 1;
$people->attr = new Attr();
$peoplePrototype = new PeoplePrototype($people);
$people1 = $peoplePrototype->shallowCopy();
$people2 = $peoplePrototype->deepCopy();
var_dump($people);
var_dump($people1);
var_dump($people2);

// 结果
/*
 * object(People)#1 (2) {
  ["age"]=>
  int(1)
  ["attr"]=>
  object(Attr)#2 (0) {
  }
}
object(People)#4 (2) {
  ["age"]=>
  int(1)
  ["attr"]=>
  object(Attr)#2 (0) {
  }
}
object(People)#5 (2) {
  ["age"]=>
  int(1)
  ["attr"]=>
  object(Attr)#6 (0) {
  }
}
 * */







