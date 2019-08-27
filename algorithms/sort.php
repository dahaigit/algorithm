<?php

$arr = array(2,1,3,4,6,0,10);

function dd(...$args)
{
    var_dump($args);
    exit;
}

/**
 * Notes: 获取比第一个元素大和比第一个元素小的两个数组然后合并3者（两个数组+第一个元素），递归进行（然后分别用这两个数组做同样的操作）。
 * User: mhl
 * method: GET
 * @param $arr
 * @return array
 */
function quickSort($arr)
{
    $arrCount = count($arr);
    if ($arrCount<=1) {
        return $arr;
    }
    $firstValue = $arr[0];
    $leftArr = [];
    $rightArr = [];
    for ($i=1; $i<$arrCount; $i++) {
        if ($firstValue < $arr[$i]) {
            $rightArr[] = $arr[$i];
        } else {
            $leftArr[] = $arr[$i];
        }
    }
    $leftArr = quickSort($leftArr);
    $rightArr = quickSort($rightArr);
    return array_merge($leftArr, [$firstValue], $rightArr);
}
var_dump(quickSort($arr));

/**
 * Notes: 希尔排序-比较难理解，暂时放一下
 * User: mhl
 * method: GET
 * @param $arr
 * @return mixed
 */
function shellSort($arr)
{
    $arrCount = count($arr);
    for ($gap = floor($arrCount/2); $gap>0; $gap=floor($gap/=2)) {
        for($i=$gap; $i<$arrCount;++$i)
        {
            for($j=$i-$gap; $j>=0 && $arr[$j+$gap]<$arr[$j]; $j-=$gap) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+$gap];
                $arr[$j+ $gap] = $temp;
            }
        }
    }
    return $arr;
}
//var_dump(shellSort($arr));


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
//var_dump(insertionSort($arr));

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






















