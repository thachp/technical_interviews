<?php

/**
 * Selection Sort.
 * At each iteration find the smallest entry (the "key") in the unsorted portion of the array.
 * Swap the "key" with the the ith entry.
 *
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

function selection_sort(&$array)
{
    $max_length = count($array);

    for ($i = 0; $i < $max_length; $i++) {

        $kmin = $i;
        for ($k = $i + 1; $k < $max_length; $k++) {
            if ($array[$k] < $array[$kmin]) {
                $kmin = $k;
            }
        }

        if ($kmin != $k) {
            swap($array[$i], $array[$kmin]);
        }
    }
}

$test_array = array(3, 2, 5, 4, 1);
selection_sort($test_array);

if ($test_array[0] === 1) {
    echo("It looks good. \n");
} else {
    echo("It looks bad. \n");

}

/*
 *
 */
print_r($test_array);

