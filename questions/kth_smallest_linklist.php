<?php
/**
 *  Implement an algorithm to find the kth to last element of a singly linked list.
 * Time Complexity: O( N ), N is the number of nodes
 * Space Complexity: O( 1 ), excluding the function call stack
 *
 * @author thachp
 */


function nthToLast($head, $k)
{
    if ($k <= 0)
    {
        return null;
    }

    $p1 = $head;
    $p2 = $head;

    for($i = 0 ; $i < $k-1; $i++){
        if($p2 === null) return null;  // error null
        $p2 = $p2->next;
    }

    if($p2 === null) {
        return null;
    }

    while($p2->next !== null)
    {
        $p1 = $p1->next;
        $p2 = $p2->next;

    }

    return $p1;
}


