<?php	

/**
* SPLStack provide function of a stack implemented using a doubly linked list.
* @author thachp
*
*/

$stack = new SplStack();

// push item to stack
$stack->push('1');
$stack->push('2');
$stack->push('3');	

// rewind to begining 
$stack->rewind();

// echo all items expect 3,2,1
while($stack->valid() )
{

	echo $stack->current() . "\n";
    $stack->next();
}

// pop out an item.
$stack->rewind();
$stack->pop();

// expect 2, 1 because 3 has been pop out
while($stack->valid() )
{

	echo $stack->current() . "\n";
    $stack->next();
}







	
?>