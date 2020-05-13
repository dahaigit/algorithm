<?php

// classa.inc 这个是所有类文件的存储的地方，这里我们就存储了一个 A 类:
// page1.php: 我们在页面 1 序列化$a 对象并存储到 store 文件中
/*include("classa.inc");
$a = new A();
$s = serialize($a);
// 把变量$s 保存起来以便文件 page2.php 能够读到
file_put_contents('store', $s);*/


//// page2.php:我们在页面 2 反序列化$a 对象的序列化后的字符串 // 要正确了解序列化，必须包含下面一个文件
include("classa.inc");
$s = file_get_contents('store');
$a = unserialize($s);
// 现在可以使用对象$a 里面的函数 show_one()
$a->show_one();