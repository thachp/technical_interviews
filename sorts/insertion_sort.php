<?php

/**
 * Insertion Sort.
 * Time Complexity: O(n^2)
 * Space Compleity: O(n), O(1) extra space
 *
 * @author thachp
 */

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function insertion_sort(&$array)
{
    $n_length = count($array);
    for ($i = 1; $i < $n_length; $i++) {
        $j = $i;
        while ($j > 0 && $array[$j - 1] > $array[$j]) {
            swap($array[$j], $array[$j-1]);
            $j--;
        }
    }
}
$test_array = array(3, 2, 5, 4, 1);
insertion_sort($test_array);

if ($test_array[0] === 1) {
    echo("It looks good. \n");
} else {
    echo("It looks bad. \n");

}

print_r($test_array);

