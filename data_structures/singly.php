<?php

/**
 *  Singly LinkList in PHP. For fun!
 *  @author thachp
 **/

class Node {
    public $data = null;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next= null;
    }


    public function clear()
    {
        $this->data = null;
        $this->next = null;
    }
}


class Linklist {

    private $_head = null;
    private $_tail = null;
    private $_length = 0;

    /**
     * Get node to linklist
     */
    public function add($data)
    {

        $node = new Node($data);

        // if no head set this node as head
        // also, set the tail to be the head.
        if($this->_head === null)
        {
            $this->_head = $node;
            $this->_tail = $this->_head;
        }

        if($this->_head !== null)
        {
            //  object  in php is pass by reference id, so this should be okay with the & symbol
            $this->_tail->next = $node;
            $this->_tail = $node;
        }

        // increase length
        $this->_length++;
    }


    /**
     * Search index.
     * Rebuild the linklist by getting the node before it and reconnect to the next.
     */
    public function remove($index) {

        if($index === 0)
        {
            $temp = $this->_head;
            $this->_head = $this->_head->next;
            $temp->clear();
            return;
        }


        if($index > $this->getLength() - 1)
        {
            throw new Exception('Wow! Buddy!!!');
        }

        $previous = false;
        $current = $this->_head;

        for($i=0; $i < $index; $i++)
        {
            $previous = $current;
            $current = $current->next;
        }

        $temp = $previous->next;
        $previous->next = $current->next;
        $temp->clear();
    }


    /**
     * Get head of linklist.
     */
    public function getHead()
    {
        return $this->_head;
    }

    public function getLength()
    {
        return $this->_length;
    }

    /**
     *  Debug purposes.
     * */

    public function debug($msg = 'print')
    {
        echo $msg . " \n";

        $current_node = $this->getHead();
        while($current_node !== null)
        {
            echo "link1" . $current_node->data . "\n";
            $current_node = $current_node->next;
        }

    }


} // end link list



// test it out!
$singly = new Linklist();
$singly->add('test0');
$singly->add('test1');
$singly->add('test2');
$singly->add('test3');
$singly->add('test4');


echo('<pre>');
$singly->debug('before');
$singly->remove(0);
$singly->debug('after');
echo('</pre>');