<?php

/**
 * Understand Binary Search
 * Requirement: array must be sorted first
 * @author thachp
 */


function binary_search($search, $array, $min, $max)
{
    if ($min > $max) {
        return -1;
    }
    $mid = floor(($min + $max) / 2);
    if ($search === $array[$mid]) {
        return $mid;
    } else if ($search < $array[$mid]) {
        return binary_search($search, $array, $min, $mid - 1);
    } else {
        return binary_search($search, $array, $mid + 1, $max);
    }
}

$testarray = array(2, 1, 9, 5, 3, 6, 10, 8, 4, 7);
sort($testarray);

$result = (int) binary_search(8, $testarray, 0, count($testarray));
debug($testarray, $result, 7, "Binary Search! 8 is in {$result} place.");

/**
 * For displaying and simple test
 * @param $array
 * @param $assert
 * @param $value
 * @param string $subject
 */
function debug($array, $assert, $value, $subject = '')
{
    echo($subject . " \n");
    echo implode(', ', $array) . "\n";
    if ($assert === $value) {
        echo("It looks good. \n\n");
    } else {
        echo("It looks bad. \n\n");
    }
}


