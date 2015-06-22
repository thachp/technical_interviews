<?php

/**
 * Using splQueue in PHP
 * @author thachp
 */

$q = new splQueue();
$q->enqueue('a');
$q->enqueue('b');
$q->enqueue('c');

// rewind to begining
$q->rewind();

while($q->valid()){
    echo $q->current() . "\n";
    $q->next();
}

$q->rewind();
$q->dequeue();

while($q->valid()){
    echo $q->current() . "\n";
    $q->next();
}


echo("\n");

//// A simple unit test
if($q->count() === 2)
{
    echo("It looks good! \n");
} else {
    echo("It looks bad! \n");
}

