<?php

$arr = array(2,1,3,4,6,0,10);

function dd(...$args)
{
    var_dump($args);
    exit;
}

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

/**
 * Notes: 选择排序：
 * description：首先在未排序序列中找到最小元素，存放到排序序列的起始位置。
 * 然后，再从剩余未排序元素中继续寻找最小元素，然后放到已排序序列的末尾。
 * 以此类推，直到所有元素均排序完毕。
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
        if ($i != $minIndex) {
            list($arr[$i], $arr[$minIndex]) = [$arr[$minIndex], $arr[$i]];
        }
    }
    return $arr;
}


/*array (size=6)
  0 => int 0
  1 => int 1
  2 => int 2
  3 => int 3
  4 => int 4
  5 => int 6*/

/**
 * Notes: 插入排序：
 * 它的工作原理是通过构建有序序列，对于未排序数据，在已排序序列中从后向前扫描，找到相应位置并插入。
 * 插入排序在实现上，通常采用in-place排序（即只需用到O(1)的额外空间的排序），
 * 因而在从后向前扫描过程中，需要反复把已排序元素逐步向后挪位，为最新元素提供插入空间。
 * User: mhl
 * method: GET
 * @param $arr
 */
function insertionSort(array $arr)
{
    $arrCount = count($arr);
    if ($arrCount == 0 || $arrCount == 1) {
        return $arr;
    }
    for ($i = 0; $i< $arrCount - 1; $i++)
    {
        $currentValue = $arr[$i + 1];
        $index = $i;
        while ($index >= 0 && $currentValue < $arr[$index])
        {
            $arr[$index + 1] = $arr[$index];
            $index--;
        }
        $arr[$index + 1] = $currentValue;
    }
    return $arr;
}
dd(insertionSort($arr), $arr);

/**
 * Notes: 快速排序：获取比第一个元素大和比第一个元素小的两个数组然后合并3者
 * （两个数组+第一个元素），递归进行（然后分别用这两个数组做同样的操作）。
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


























