<?php

/**
 * Merge Sort.  Divide and Conquer. Recursive.
 * Average Case & Worst Case: O(nlog(n))
 *
 * Space Complexity: O(n); Depend;
 * @author thachp
 */

/**
 * Swatch $a, $b.
 * Pass by reference
 * @param $a
 * @param $b
 */
function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}


function merge_sort($array, $left_array, $right_array)
{
    $nl = count($left_array);
    $nr = count($right_array);

}

function merge()
{

}