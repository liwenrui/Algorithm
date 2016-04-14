<?php
/**
 * 计数排序
 * 计数排序是一个非基于比较的排序算法，该算法于1954年由 Harold H. Seward 提出。
 * 它的优势在于在对一定范围内的整数排序时，它的复杂度为Ο(n+k)（其中k是整数的范围），快于任何比较排序算法。
 */

//产生100个随机数
define('NUM',100);

//待排序的数字范围是0-200
define('MAXNUM',200);

//生成待排序数组
$array = array();
for($i = 0; $i < NUM; $i++)
{
    $array[$i] = mt_rand(0,MAXNUM);//php里mt_rand() 比rand() 快四倍
}

print_r($array);
echo '<hr>';
print_r(countingSort($array,MAXNUM));


function countingSort($array, $maxNum)
{
    if(empty($array))
    {
        return FALSE;
    }
    
    if($maxNum <= 0)
    {
        return FALSE;
    }

    //生成容器(下标从0到200的数组)
    $_temp = array();
    $_tempMaxNum = $maxNum + 1;
    for($i = 0; $i < $_tempMaxNum; $i++)
    {
        $_temp[$i] = 0;
    }


    $count = count($array);
    //给相应数字标记(计数)
    for($i = 0; $i < $count; $i++)
    {
        $_temp[$array[$i]] += 1;
    }

    //把值不是0的(即在$array数组中出现过的数字)提取出来,形成结果数组
    $_newTemp = array();
    for($i = 0; $i <=$maxNum; $i++)
    {
        while($_temp[$i]-- > 0)
        {
            $_newTemp[] = $i;

        }
    }

    return $_newTemp;

}
