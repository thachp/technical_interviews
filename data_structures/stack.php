<?php

/**
 * Implement a stack using array. LIFO
 * @author thachp
 */
class Stack
{

    // dynamic type
    private $_stack = array();

    // Move the first item in the array out.
    public function pop($item)
    {
        array_shift($this->_stack);
    }


    // Add item to the beginning.
    public function push($item)
    {
        array_unshift($this->_stack, $item);
    }

    // get stack
    public function getStack()
    {
        return $this->_stack;
    }

}


$stack = new Stack();
$stack->push('a');
$stack->push('b');
$stack->push('c');

// expect an array of c,b,a
print_r($stack->getStack());

$stack->pop();
// expect an array of ba
print_r($stack->getStack());

?>