<?php

/**
 * Class SimpleQueue
 * A queue provide FIFO ordering. First item to go in first item to go out.
 * @author thachp
 */

class SimpleQueue
{

    private $_queue = array();
    private $_length = 0;

    /**
     * Add item to queue.
     * @param $item
     */
    public function queue($item)
    {
        $this->_queue[] = $item;
        $this->_length++;
    }

    /**
     * Remove last item from the queue.
     */
    public function dequeue()
    {
        array_pop($this->_queue);
        $this->_length--;
    }


    public function getQueue()
    {
        return $this->_queue;
    }

    public function getLength()
    {
        return $this->_length;
    }
}


$q = new SimpleQueue();
$q->queue('a');
$q->queue('b');
$q->queue('c');

// expect an array of a,b,c
print_r($q->getQueue());

$q->dequeue();

// expect an array of a,b
print_r($q->getQueue());


// A simple unit test
if(! in_array('c', $q->getQueue()))
{
    echo("It looks good! \n");
} else {
    echo("It looks bad! \n");
}

// simple test
if($q->getLength() === 2)
{
    echo("Length looks good! \n");
} else {
    echo("Length looks bad! \n");

}