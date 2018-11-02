<?php
/*
 * observer 行为设计模式 - 观察者模式
 *
 * */
/*
迭代器模式 （Iterator），又叫做游标（Cursor）模式。提供一种方法访问一个容器（Container）对象中各个元素，而又不需暴露该对象的内部细节。

当你需要访问一个聚合对象，而且不管这些对象是什么都需要遍历的时候，就应该考虑使用迭代器模式。另外，当需要对聚集有多种方式遍历时，可以考虑去使用迭代器模式。迭代器模式为遍历不同的聚集结构提供如开始、下一个、是否结束、当前哪一项等统一的接口。

php标准库（SPL）中提供了迭代器接口 Iterator，要实现迭代器模式，实现该接口即可。
注意：这个php文件不能运行，只是表达出迭代的意思，隐藏真实操作，并且有遍历，可以考虑使用迭代
 */


class AllUser implements \Iterator
{
    protected $index = 0;
    protected $data = [];

    public function __construct()
    {
        $link = mysqli_connect('192.168.10.10', 'homestead', 'secret', 'app_my_spa');

        $rec = mysqli_query($link, 'select id from users');
        $this->data = mysqli_fetch_all($rec, MYSQLI_ASSOC);
    }

    //1 重置迭代器
    public function rewind()
    {
        $this->index = 0;
    }

    //2 验证迭代器是否有数据
    public function valid()
    {
        return $this->index < count($this->data);
    }

    //3 获取当前内容
    public function current()
    {
        $id = $this->data[$this->index];
        return User::find($id);
    }

    //4 移动key到下一个
    public function next()
    {
        return $this->index++;
    }


    //5 迭代器位置key
    public function key()
    {
        return $this->index;
    }
}

//实现迭代遍历用户表
$users = new AllUser();
//可实时修改
foreach ($users as $user){
    $user->add_time = time();
    $user->save();
}





































