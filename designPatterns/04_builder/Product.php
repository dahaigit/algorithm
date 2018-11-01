<?php
/*
 *
 * builder 设计模式 - 建造者模式
 *
 * 建造者模式主要在于创建一些复杂的对象。
 * 将一个复杂对象的构造与它的表示分离，
 * 使同样的构建过程可以创建不同的表示的设计模式，
 * 当创建对象特别复杂的时候可以考虑
 *
 * */

/**
 *
 * 产品本身
 */
class Product {
    private $_parts;
    public function __construct() { $this->_parts = array(); }
    public function add($part) { return array_push($this->_parts, $part); }
}

/**
 * 建造者抽象类
 *
 */
abstract class Builder {
    public abstract function buildPart1();
    public abstract function buildPart2();
    public abstract function getResult();
}

/**
 *
 * 具体建造者
 * 实现其具体方法
 */
class ConcreteBuilder extends Builder {
    private $_product;
    public function __construct() { $this->_product = new Product(); }
    public function buildPart1() { $this->_product->add("Part1"); }
    public function buildPart2() { $this->_product->add("Part2"); }
    public function getResult() { return $this->_product; }
}
/**
 *
 *导演者
 */
class Director {
    public function __construct(Builder $builder) {
        $builder->buildPart1();//导演指挥具体建造者生产产品
        $builder->buildPart2();
    }
}




// client
$builder = new ConcreteBuilder();
$director = new Director($builder);
$product = $builder->getResult();
echo "<pre>";
var_dump($product);
echo "</pre>";
/*输出： object(Product)#2 (1) {
["_parts":"Product":private]=>
array(2) {
    [0]=>string(5) "Part1"
    [1]=>string(5) "Part2"
}
} */












