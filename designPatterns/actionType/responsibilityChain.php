<?php
/*
 * ResponsibilityChain 行为设计模式 - 责任链模式
 * 1、降低耦合度。它将请求的发送者和接收者解耦。
 * 2、简化了对象。使得对象不需要知道链的结构。
 * 3、增强给对象指派职责的灵活性。通过改变链内的成员或者调动它们的次序，允许动态地新增或者删除责任。
 * 4、增加新的请求处理类很方便
 *
 * */


/*
 * 抽象管理者
 * */
abstract class Admin
{
    protected $name;
    protected $manager;
    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * 设置上级
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function setHeader($admin)
    {
        $this->manager = $admin;
    }

    // 请求
    abstract public function apply(Request $request);
}

/*
 * 申请
 * */
class Request
{
    public $num;
    public $type;
    public $content;

    public function __construct($type, $num, $content = '')
    {
        $this->type = $type;
        $this->num = $num;
        $this->content = $content;
    }
}

/**
 * 老板
 */
class Boos extends Admin
{
    public function __construct($name) {
        parent::__construct($name);
    }
    public function setHeader($admin) {
        parent::setHeader($admin);
    }
    public function apply(Request $request) {
        echo '准了，总共加薪：' . $request->num . '元<br>';
    }
}

/**
 * 经理
 */
class Manager extends Admin
{
    public function __construct($name) {
        parent::__construct($name);
    }
    public function setHeader($admin) {
        parent::setHeader($admin);
    }
    public function apply(Request $request) {
        if ($request->type == '请假') {
            echo '准了，总共假期：' . $request->num . '天<br>';
        } else {
            $this->manager->apply($request);
        }
    }
}
$boos = new Boos('王健林');
$manager = new Manager('小键林');
$manager->setHeader($boos);

$request1 = new Request('请假', '1', '个人原因');
$manager->apply($request1);

$request2 = new Request('加薪', 100);
$manager->apply($request2);




































