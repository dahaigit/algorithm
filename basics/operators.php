<?php
/*
* 运算符
* http://us3.php.net/manual/zh/language.operators.php
 *
 * */

// 1、算术运算符
// -（取反），+-*/，**（指数）
//$a = 2;
//$b = 3;
//echo $a**$b; //指数运算 8

//$a = -2;
//echo -$a; // 2 取反


// 2、赋值运算符
//$a = 'a';
//$b = 'b';
//
//$a .= $b .= "foo";
//
//echo $a,"<br>",$b; // abfoo bfoo

// 3、位运算符
//$a = 1;
//$b = 0;
//$c = $a & $b;
//var_dump($c); //and 按位与 0

//$a = 0;
//$b = 1;
//$c = $a | $b;
//var_dump($c); //or 按位或 1

//$a = 1;
//$b = 1;
//$c = $a ^ $b;
//var_dump($c); //xor 按位异或 0 两个值不同才为true

//$a = 0;
//
//$c = ~$a;
//var_dump($c); //not 按位取反  -1

//$a = 8;
//$b = 1;
//$c = $a >> $b;
//var_dump($c); // shift right 右移 a 除以 c 次2 4

// 4、比较运算符
//$a = 20;
//$b = 99;
//$c = $a <=> $b;
//var_dump($c); // 太空船运算符，比较两个变量大小，（返回1,0，-1）1

//$a = null;
//$b = null;
//$c = 2;
//$d = $a ?? $b ?? $c;
//var_dump($d); // null合并操作符，2

// 5、错误控制运算符
//@file ('non_existent_file') or
//die ("Failed opening file: error was '$php_errormsg'");

// 6、执行运算符
//$output = `
//ls -al
//mkdir abc
//`;
//echo "<pre>$output</pre>"; // 可以执行shell命令，在安全模式不能运行

// 7、递增递减
//$a = 3;
//var_dump($a--); // 先输出后减少 3

// 8、逻辑运算符
// and逻辑与, or逻辑或, xor逻辑异或, !逻辑非, &&短路逻辑与, ||短路逻辑或
//$a = 1;
//$b = 0;
//$c = $a and $b;
//var_dump($c); // 逻辑与 1

//$a = 1;
//$b = 0;
//$c = $b or $a;
//var_dump($c); // 逻辑或 0

//$a = 1;
//$c = !$a;
//var_dump($c); // 逻辑非 false

// 9、字符串运算符
//$a = 'aaa' . 'bbb';
//var_dump($a); // aaabbb

// 10、数组运算符
//$a = array("a" => "apple", "b" => "banana");
//$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
//$c = $a + $b;
//print_r($c); // 联合 Array ( [a] => apple [b] => banana [c] => cherry )

//$a = array("a" => "apple", "b" => "banana");
//$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
//$c = array_merge($a,$b);
//print_r($c); // 这个不是数组运算符，只是拿来对比 Array ( [a] => pear [b] => strawberry [c] => cherry )

// 11、类运算符
class ParentClass {}

class MyClass extends ParentClass {}

$myClass = new MyClass();
$parentClass = new ParentClass();

var_dump($myClass instanceof $parentClass); // true

















































