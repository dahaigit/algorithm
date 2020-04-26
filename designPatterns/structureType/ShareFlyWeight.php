<?php
/*
 *
 * flyweight 结构设计模式 - 享元模式
 * 共享元对象，运用共享技术有效地支持大量细粒度对象的复用。
 * 如果在一个系统中存在多个相同的对象，那么只需要共享一份对象的拷贝，
 * 而不必为每一次使用创建新的对象。
 * 享元模式是为数不多的、只为提升系统性能而生的设计模式，主要作用就是复用大对象（重量级对象），以节省内存空间和对象创建时间。
 *
 * */

abstract class Resources{
    public $resource=null;

    abstract public function operate();
}

class unShareFlyWeight extends Resources{
    public function __construct($resource_str) {
        $this->resource = $resource_str;
    }

    public function operate(){
        echo $this->resource."<br>";
    }
}

class shareFlyWeight extends Resources{
    private $resources = array();

    public function get_resource($resource_str){
        if(isset($this->resources[$resource_str])) {
            return $this->resources[$resource_str];
        }else {
            return $this->resources[$resource_str] = $resource_str;
        }
    }

    public function operate(){
        foreach ($this->resources as $key => $resources) {
            echo $key.":".$resources."<br>";
        }
    }
}


// client
$flyweight = new shareFlyWeight();
$flyweight->get_resource('a');
$flyweight->operate();


$flyweight->get_resource('b');
$flyweight->operate();
//
$flyweight->get_resource('c');
$flyweight->operate();

// 不共享的对象，单独调用
$uflyweight = new unShareFlyWeight('A');
$uflyweight->operate();

$uflyweight = new unShareFlyWeight('B');
$uflyweight->operate();