
<?php
/*
 * visitor 行为设计模式 - 访问者设计模式
 * 稳定的数据结构和易变的操作耦合问题
 *
 * oa系统计算薪资可以用到
 * https://www.cnblogs.com/edisonchou/p/7247990.html
 * Background：M公司开发部想要为某企业开发一个OA系统，在该OA系统中包含一个员工信息管理子系统，该企业包括正式员工和临时工，每周HR部门和财务部等部门需要对员工数据进行汇总，汇总数据包括员工工作时间、员工工资等等。该企业的基本制度如下：
 * （1）正式员工（Full time Employee）每周工作时间为40小时，不同级别、不同部门的员工每周基本工资不同；如果超过40小时，超出部分按照100元/小时作为加班费；如果少于40小时，所缺时间按照请假处理，请假锁扣工资以80元/小时计算，直到基本工资扣除到0为止。除了记录实际工作时间外，HR部需要记录加班时长或请假时长，作为员工平时表现的一项依据。
 * （2）临时员工（Part time Employee）每周工作时间不固定，基本工资按照小时计算，不同岗位的临时工小时工资不同。HR部只需要记录实际工作时间。
 * HR人力资源部和财务部工作人员可以根据各自的需要对员工数据进行汇总处理，HR人力资源部负责汇总每周员工工作时间，而财务部负责计算每周员工工资。
 *
 * */


//抽象状态
abstract class State
{
    protected $state_name;

    //得到男人反应
    public abstract function GetManAction(VMan $elementM);
    //得到女人反应
    public abstract function GetWomanAction(VWoman $elementW);
}

//抽象人
abstract class Person
{
    public $type_name;

    public abstract function Accept(State $visitor);
}

//成功状态
class Success extends State
{
    public function __construct()
    {
        $this->state_name="成功";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，背后多半有一个伟大的女人。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，背后大多有一个不成功的男人。<br/>";
    }
}

//失败状态
class Failure extends State
{
    public function __construct()
    {
        $this->state_name="失败";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，闷头喝酒，谁也不用劝。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，眼泪汪汪，谁也劝不了。<br/>";
    }
}

//恋爱状态
class Amativeness  extends State
{
    public function __construct()
    {
        $this->state_name="恋爱";
    }

    public  function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，凡事不懂也要装懂。<br/>";
    }

    public  function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，遇事懂也要装作不懂。<br/>";
    }
}

//男人
class VMan extends Person
{
    function __construct()
    {
        $this->type_name="男人";
    }

    public  function Accept(State $visitor)
    {
        $visitor->GetManAction($this);
    }
}

//女人
class VWoman extends Person
{
    public function __construct()
    {
        $this->type_name="女人";
    }

    public  function Accept(State $visitor)
    {
        $visitor->GetWomanAction($this);
    }
}

//对象结构
class ObjectStruct
{
    private $elements=array();
    //增加
    public function Add(Person $element)
    {
        array_push($this->elements,$element);
    }
    //移除
    public function Remove(Person $element)
    {
        foreach($this->elements as $k=>$v)
        {
            if($v==$element)
            {
                unset($this->elements[$k]);
            }
        }
    }

    //查看显示
    public function Display(State $visitor)
    {
        foreach ($this->elements as $v)
        {
            $v->Accept($visitor);
        }
    }
}


$os = new ObjectStruct();
$os->Add(new VMan());
$os->Add(new VWoman());

//成功时反应
$ss = new Success();
$os->Display($ss);
exit(111);

//失败时反应
$fs = new Failure();
$os->Display($fs);

//恋爱时反应
$ats=new Amativeness();




























