<?php
/**
 * 二分法查找
 * 二分查找也称折半查找（Binary Search），它是一种效率较高的查找方法。
 * 但是，折半查找要求线性表必须采用顺序存储结构，而且表中元素按关键字有序排列
 * 时间复杂度 O（log2n）
 */

$array = array(1,2,3,4,5,6,7,8,9,11,33,44,55,66);

echo binSearch(44,$array);
echo "\r\n";
echo binRecursiveSearch(44,0,count($array),$array);
echo "\r\n";

/**
 * 非递归
 * 要求数组是正序的,否则while里的要反过来处理
 */
function binSearch($target,$array){
    $count = count($array);
    $low   = 0;                                   //定义最低下标为记录首位
    $high  = $count - 1;                          //定义最高下标为记录末位
    while($low <= $high){                         //while的终止条件
        $middle = intval( ($low + $high) / 2);    //折半
        if($array[$middle] > $target){            //若折半的值大于查找的值
            $high = $middle - 1;                  //说明要查找的值出现在左边,那么将最高下标调整到中位的小一位
        }else if($array[$middle] < $target){      //若折半的值小于查找的值
            $low = $middle + 1;                   //说明要查找的值出现在右边,那么将最低下标调整到中位的大一位
        }else{
            return $middle;                       //否则就是相等就是找到了
        }

    }

    return -1;                                    //一直没返回就是没有找到
}

/**
 * 递归
 * 要求数组是正序的
 */
function binRecursiveSearch($target,$low,$high,$array){
    if($low <= $high){
        $middle = intval( ($low + $high) / 2);
        if($array[$middle] > $target){
            return binRecursiveSearch($target,$low,$middle - 1,$array);
        }else if($array[$middle] < $target){
            return binRecursiveSearch($target,$middle + 1,$high,$array);
        }else{
            return $middle;
        }
    }else{
        return -1;
    }
}

