<?php
/*
 * php打印处理
 *
 * */
// 1、echo输出一个或多个字符串
//echo 'hello','world';

// 2、只能打印一个字符串
//$a = 666;
//print $a; // 666

// 3、输出格式化字符串
//$a = 'hello %s, hello %s';
//printf($a, 1,2); // hello 1, hello 2

// 4、返回格式化字符串
//$a = 'hello %s, hello %s';
//echo sprintf($a, 1,2); // hello 1, hello 2


// 5、输出格式字符串，第二个参数是数组
//$string = 'hello %s, hello %s';
//$arr = ['php','java'];
//vprintf($string, $arr); // hello php, hello java


// 6、返回格式化字符串
//echo vsprintf($string, $arr);  // hello php, hello java

// 7、将格式字符串写入流,直接覆盖文本中的内容
//if (!($fp = fopen('date.txt', 'w')))
//    return;
//vfprintf($fp, "%04d-%02d-%02d", array('2018', '11', '02')); // date.txt 2018-11-02

// 8、根据指定格式解析的字符串，相当于函数中的list功能
//$auth = "24\tLewis Carroll";
//$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
//echo "<author id='$id'><firstname>$first</firstname><surname>$last</surname>
//</author>\n"; // Lewis Carroll

// 9、根据指定格式解析字符串，只不过是读取文件中的内容
//$handle = fopen("users.txt", "r");
//while ($userinfo = fscanf($handle, "%s\t%s\t%s\n")) {
//    list ($name, $profession, $countrycode) = $userinfo;
//    echo $name.' '.$profession.' '.$countrycode,'<br>';
//}
//fclose($handle);
//结果
//javier argonaut pe
//hiroshi sculptor jp
//robert slacker us
//luigi florist it









































