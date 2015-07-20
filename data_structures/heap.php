<?php

// Heaps are binary trees.  Used to find Minimum / Maximum of values in data sets.
// @author thachp

$numbers = array(10,2,8,4,20,6,11,18,25);
$minHeap =  new SplMinHeap();
$maxHeap =  new SplMaxHeap();

foreach($numbers as $number)
{
    $minHeap->insert($number);
    $maxHeap->insert($number);
}

print_r($minHeap);
print_r($maxHeap);






