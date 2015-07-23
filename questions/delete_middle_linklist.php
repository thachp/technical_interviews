<?php
/**
 * Implement an algorithm to delete a node in the middle of a singly linked list, given only access to that node
 *
 * @author thachp
 */

function deleteNode(&$node)
{
    if($node === null || $node->next === null)
    {
        return false;
    }
    $next = $node->next;
    $node->data = $next->data;
    $node->next = $next->$next;
    return true;
}