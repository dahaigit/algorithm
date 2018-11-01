<?php
/*
 *
 * decorator 结构设计模式 - 装饰模式
 *意图：动态地给一个对象添加一些额外的职责。就增加功能来说，装饰器模式相比生成子类更为灵活。
 * 主要解决：一般的，我们为了扩展一个类经常使用继承方式实现，由于继承为类引入静态特征，并且随着扩展功能的增多，子类会很膨胀。
 * 何时使用：在不想增加很多子类的情况下扩展类。
 * 如何解决：将具体功能职责划分，同时继承装饰者模式。
 * 关键代码： 1、Component 类充当抽象角色，不应该具体实现。 2、修饰类引用和继承 Component 类，具体扩展类重写父类方法。
 *
 *
 * */

interface Component {
    public function operation();
}

abstract class Decorator implements Component{ // 装饰角色
    protected  $_component;
    public function __construct(Component $component) {
        $this->_component = $component;
    }
    public function operation() {
        $this->_component->operation();
    }
}

class ConcreteDecoratorA extends Decorator { // 具体装饰类A
    public function __construct(Component $component) {
        parent::__construct($component);
    }
    public function operation() {
        parent::operation();    //  调用装饰类的操作
        $this->addedOperationA();   //  新增加的操作
    }
    public function addedOperationA() {echo 'A加点酱油;';}
}

class ConcreteDecoratorB extends Decorator { // 具体装饰类B
    public function __construct(Component $component) {
        parent::__construct($component);
    }
    public function operation() {
        parent::operation();
        $this->addedOperationB();
    }
    public function addedOperationB() {echo "B加点辣椒;";}
}

class ConcreteComponent implements Component{ //具体组件类
    public function operation() {}
}

// clients
$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

$decoratorA->operation();//输出：A加点酱油;
echo '<br>--------<br>';
$decoratorB->operation();//输出：A加点酱油;B加点辣椒;
var_dump($decoratorB);