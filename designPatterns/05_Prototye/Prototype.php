<?php
/*
 * builder 创建设计模式 - 原型模式
 * 目的：将一个对象作为原型，通过对其进行复制而克隆出多个和原型类似的新实例。
 * 主要角色：
 * 1）抽象原型类：规定了具体原型对象必须实现的接口。
 * 2）具体实现类：实现抽象原型类的 clone() 方法，它使可被复制的对象。
 * 3）访问类：使用具体原型类中的 clone() 方法来复制新对象。
 *
 * 案例：实习对象的深浅拷贝
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







