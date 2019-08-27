<?php

$arr = array(2,1,3,4,6,0);

/**
 * Notes: 每步将一个未排序的元素，按其值大小插入前面已经排序号的数组中的适当位置(拿着当前值和排序好的数组对比，若发现元素比当前值大，则这个元素往后移懂一位)。直到排序完成。
 * User: mhl
 * method: GET
 * @param $arr
 */
function insertionSort($arr)
{
    $arrCount = count($arr);
    for ($i=0; $i< $arrCount-1; $i--) {
        $currentValue = $arr[$i+1];
        $preIndex = $i;
        while ($preIndex>=0 && $currentValue < $arr[$preIndex]) {
            $arr[$preIndex+1] = $arr[$preIndex];
            $preIndex--;
        }
        $arr[$preIndex] = $currentValue;
    }
}
var_dump(insertionSort($arr));

/**
 * Notes: 选择排序：
 * description：以正序为例。每次选择一个最小的元素，放在外层循环的当前位置。
 * User: mhl
 * method: GET
 * @param $arr
 */
function selectionSort($arr)
{
    $arrCount = count($arr);
    for ($i=0; $i<$arrCount; $i++) {
        $minIndex = $i;
        for ($j=$i; $j<$arrCount; $j++) {
            if ($arr[$minIndex] > $arr[$j]) {
                $minIndex = $j;
            }
        }
        list($arr[$i], $arr[$minIndex]) = [$arr[$minIndex], $arr[$i]];
    }
    return $arr;
}
//var_dump(selectionSort($arr));

/**
 * Notes: 冒泡排序
 * Description: 以正序排列为例。如果相邻的两个元素第一个比第二个大则这两个元素相互交换位置。
 * User: mhl
 * method: GET
 */
function bubbleSort($arr)
{
    $arrCount = count($arr);
    for($i=0; $i<$arrCount; $i++)
    {
        // 之所以-$i是因为最后的元素是已经排序好的，不用多次排序了。
        for ($j=0; $j<$arrCount-$i-1; $j++) {
            if ($arr[$j] > $arr[$j+1]) {
                list($arr[$j], $arr[$j+1]) = [$arr[$j+1], $arr[$j]];
            }
        }
    }
    return $arr;
}
//var_dump(bubbleSort($arr));
/*array (size=6)
  0 => int 0
  1 => int 1
  2 => int 2
  3 => int 3
  4 => int 4
  5 => int 6*/






















