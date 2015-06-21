<?php

/**
 * Quick Sort.  It is very practical.  The PHP sort() is a quick sort.
 * Average Case: O(nlong(n))
 * Worst Case: O(n^2) but can be avoided by randomize the pivot.
 *
 * Space Complexity:
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
 * Partition the inner array
 * @param $array
 * @param $start
 * @param $end
 * @return mixed
 */
function partition(&$array, $start, $end)
{
    // reduce worst case o(n^2) time complexity
    $rpIndex = rand($start, $end);
    swap($array[$rpIndex], $array[$end]);

    $pivot = $array[$end];
    $pIndex = $start;

    for ($i = $start; $i < $end; $i++) {
        if ($array[$i] <= $pivot) {
            swap($array[$i], $array[$pIndex]);
            $pIndex++;
        }
    }

    swap($array[$pIndex], $array[$end]);

    return $pIndex;
}


/**
 * Does the actual quick sort.
 */

function quick_sort(&$array, $start, $end)
{
    if ($start < $end) {

        $pIndex = partition($array, $start, $end);

        // left
        quick_sort($array, $start, $pIndex - 1);

        // right
        quick_sort($array, $pIndex + 1, $end);
    }
}


// test swap
$test_swap = array(1, 2);
swap($test_swap[1], $test_swap[0]);

if ($test_swap[0] === 2) {
    echo("swap() looks good. \n");
} else {
    echo("swap() looks bad. \n");
}

$test_array = array(3, 2, 5, 4, 1);
quick_sort($test_array, 0, count($test_array) - 1);

if ($test_array[0] === 1) {
    echo("quick_sort() looks good. \n");
} else {
    echo("quick_sort() looks bad. \n");

}

// expect 1,2,3,4,5
print_r($test_array);

?>