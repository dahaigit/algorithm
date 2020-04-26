<?php
/*
 *
 * facade 结构设计模式 - 门面模式
 * 隐藏实现步骤，简化使用方式
 *
 * 代理模式：可以用于远程访问，虚拟代理，以及权限控制，智过能引用代理等。
 * 适配器模式：当系统的数据与行为都正确，但是接口不符合是，可以通适配达到协调
 * 门面模式：开发时通过门面模式可以隐藏复杂的实现步骤，维护旧系统的时候，可以封装遗留代码，提供清晰借口。
 * */

class Cpu
{
    public function work()
    {
        echo 'CPU 开始工作了<br>';
    }
}

/*
 * 主板
 *
 * */
class Zhuban
{
    public function workStart()
    {
        echo '主板开始工作<br>';
    }
}

Class Computer
{
    public $cpu;
    public $zhuban;
    public $username;
    public function __construct($username)
    {
        $this->cpu = new Cpu();
        $this->zhuban = new Zhuban();
        $this->username = $username;
    }

    /**
     * 电脑开机
     * @author mhl
     * @date ${YEAR}-${MONTH}-${DAY} ${TIME}
     */
    public function start()
    {
        $this->zhuban->workStart();
        $this->cpu->work();
        echo $this->username . '的电脑开机完毕！';
    }
}
$computer = new Computer('大海');
$computer->start();
/**
 * 主板开始工作
 * CPU 开始工作了
 * 大海的电脑开机完毕！
 */
