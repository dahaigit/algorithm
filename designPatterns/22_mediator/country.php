<?php
/*
 * mediator 行为设计模式 - 中介模式
 * 多个类相互耦合，形成了网状结构
 * 将上述网状结构分离为星型结构。
 * 就像各国语言相互交流的话，很麻烦，现在我们有翻译软件，这样就不用我们去懂对方语言了（双方没有直接关联了）
 *
 * */


//抽象国家
abstract class Country
{
    protected $mediator;
    public function __construct(UnitedNations $_mediator)
    {
        $this->mediator = $_mediator;
    }
}

//具体国家类
//美国
class USA extends Country
{
    function __construct(UnitedNations $mediator)
    {
        parent::__construct($mediator);
    }

    //声明
    public function Declared($message)
    {
        $this->mediator->Declared($message,$this);
    }

    //获得消息
    public function GetMessage($message)
    {
        echo "美国获得对方消息：$message<br/>";
    }
}
//中国
class China extends Country
{
    public function __construct(UnitedNations $mediator)
    {
        parent::__construct($mediator);
    }
    //声明
    public function  Declared($message)
    {
        $this->mediator->Declared($message, $this);
    }

    //获得消息
    public function GetMessage($message)
    {
        echo "中方获得对方消息：$message<br/>";
    }
}

//抽象中介者
//抽象联合国机构
abstract class UnitedNations
{
    //声明
    public abstract function Declared($message,Country $colleague);
}

//联合国机构
class UnitedCommit extends UnitedNations
{
    public $countryUsa;
    public $countryChina;

    //声明
    public function Declared($message, Country $colleague)
    {
        if($colleague==$this->countryChina)
        {
            $this->countryUsa->GetMessage($message);
        }
        else
        {
            $this->countryChina->GetMessage($message);
        }
    }
}


$UNSC = new UnitedCommit();
$c1 = new USA($UNSC);
$c2 = new China($UNSC);
$UNSC->countryChina = $c2;
$UNSC->countryUsa =$c1;
$c1->Declared("姚明的篮球打的就是好");
$c2->Declared("谢谢。");





























