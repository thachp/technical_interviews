<?php

/**
 * Implementation of doubly linklist in PHP using the SPLDoublylinklist library
 * @author thachp
 */


class ExampleDoubly extends SplDoublyLinkedList
{


    public function addExample(array $numbers)
    {
        foreach($numbers as $number)
        {
            $this->push($number);
        }

        return $this;
    }

    public function traverseForward()
    {
        for($this->rewind(); $this->valid(); $this->next())
        {
            echo $this->current() . " \n";
        }

        echo("\n\n\n");

        return $this;
    }


    public function traverseBackward()
    {
        $this->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
        for($this->rewind(); $this->valid(); $this->next())
        {
            echo $this->current() . " \n";
        }

        return $this;
    }

}


$data = array(23,4,5,5,18,6,7,8,10);

$test = new ExampleDoubly();
$test->addExample($data)->traverseForward()->traverseBackward();

