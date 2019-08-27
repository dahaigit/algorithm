<?php

/**
 * Notes: 冒泡排序
 * Description: 以正序排列为例。用第一个元素（第一次外层循环则是第一个元素，若第n次循环则是第n个元素）和后面的每一个元素比较，若发现比第一个元素还小的则相互换位置。
 * User: mhl
 * method: GET
 */
function bubbleSort()
{
    $arr = array(2,1,3,4,6,0);
    $arrCount = count($arr);
    for($i=0; $i<$arrCount; $i++)
    {
        for ($j=$i+1; $j<$arrCount; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $tem = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tem;
            }
        }
    }
    return $arr;
}
//var_dump(bubbleSort());
/*array (size=6)
  0 => int 0
  1 => int 1
  2 => int 2
  3 => int 3
  4 => int 4
  5 => int 6*/

