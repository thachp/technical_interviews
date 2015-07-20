<?php


/**
 * Suppose that you have an array of both positive and negative integers.
 * Write a function that will find the continuous sequence within the array
 * that has the largest sum of numbers. Return the sum.
 *
 * @attribution http://www.programmerinterview.com/index.php/general-miscellaneous/find-continuous-sequence-with-largest-sum/
 * @author thachp
 */


/**
 *
 * @param array $numbers
 * @return int
 */
function sum_of_sub(array $numbers)
{

    $currentSum = 0;
    $maxSum = 0;

    foreach($numbers as $number)
    {

        $currentSum += $number;
        if($maxSum < $currentSum)
        {
            $maxSum = $currentSum;
        }

        elseif ($currentSum < 0)
        {
            // reset
            $currentSum = 0;
        }
    }

    return $maxSum;

}

// expecting five
echo sum_of_sub(array(4, -1, 2, -2, -1, -3));
echo "\n";


