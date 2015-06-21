<?php

/**
 * Bubble Sort.  Most inefficient sort algorithm.
 * Time Complexity: O(n^2)
 * Space Compleity: O(1)
 *
 * @author thachp
 */

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}


function bubble_sort(&$array)
{
    $n_length = count($array);

    for($k = 0; $k < $n_length; $k++)
    {
        for($i = 0; $i < $n_length - 1; $i++){
            if($array[$i] > $array[$i+1])
            {
                swap($array[$i],  $array[$i+1]);
            }
        }
    }

}

$test_array = array(3, 2, 5, 4, 1);
bubble_sort($test_array);

if ($test_array[0] === 1) {
    echo("It looks good. \n");
} else {
    echo("It looks bad. \n");

}

/*
 *
 */
print_r($test_array);

