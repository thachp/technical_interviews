<?php

/**
 * Example how to reverse singly linklist.
 * Class ExampleReverseLinkList
 */
class ExampleReverseLinkList {

    private $_head = null;


    public function insert($item)
    {
        // stub
    }

    /**
     * Reverse Linklist
     * @param $current
     */
    public function reverse($current)
    {
        if($current->next === null)
        {
            $this->_head = $current;
            return;
        }
        $this->reverse($current->next);
        $current->next->next = $current;
        $current->next = null;
    }

}
