<?php

/**
 * Merge Sort.  Divide and Conquer. Recursive.
 * Divide array into sub_arrays, then recursively swap & merge sub_arrays to bigger array.
 *
 * Average Case & Worst Case: O(nlog(n))*
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


/**
 * Merge left and right
 * @param $left
 * @param $right
 * @param $array
 */
function _merge(&$l_array, &$r_array, &$array)
{
    $nl = count($l_array);
    $nr = count($r_array);

    $i = 0;  // position for l_array
    $j = 0;  // position for r_array
    $k = 0;  // position for array

    while($i < $nl && $j < $nr)
    {
        if($l_array[$i] <= $r_array[$j])
        {
            $array[$k] = $l_array[$i];
            $i++;
        } else {
            $array[$k] = $r_array[$j];
            $j++;
        }

        $k++;
    }

    while($i < $nl)
    {
        $array[$k] = $l_array[$i];
        $i++;
        $k++;
    }

    while($j < $nr)
    {
        $array[$k] = $r_array[$j];
        $j++;
        $k++;
    }

}

/**
 * Merge sort
 * @param $array
 */
function merge_sort(&$array)
{

    // array count
    $nLength = count($array);

    if ($nLength < 2) {
        return; // there is no need to sort
    }

    $midIndex = (int) $nLength / 2;  // want to floor 4.9 will be floor to 4.

    // not in-place because of this left & right slice.
    $left_array = array_slice($array, 0, $midIndex);
    $right_array = array_slice($array, $midIndex, $nLength - 1);

    merge_sort($left_array);
    merge_sort($right_array);

    _merge($left_array, $right_array, $array);

}


/**
 * Test it out!
 */

$test_array = array(3, 2, 5, 4, 1, 6);
merge_sort($test_array, 0, count($test_array) - 1);

if ($test_array[0] === 1) {
    echo("$test_array() looks good. \n");
} else {
    echo("$test_array() looks bad. \n");

}

// expect 1,2,3,4,5,6
print_r($test_array);
