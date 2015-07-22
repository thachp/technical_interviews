<?php

/**
 * Convert binary search tree to doubly linklist.
 * 
 * @author thachp
 */

class Node {
    public $node1 = null;
    public $node2 = null;
    public $data = null;
}

class BinaryTree
{

    public $root = null;

    public function insert()
    {
        /// stub
    }

    public function convert()
    {
        $head = $this->circularLinkstList($this->root);

        // break the circular
        $head->node1->node2 = null;
        $head->node1 = null;
        return $head;
    }


    protected function circularLinkList($root)
    {

        // base
        if($root === null)
        {
            return null;
        }

        $part1 = $this->circularLinkList($root->node1);
        $part3 = $this->circularLinkList($root->node2);

        if($part1 === null && $part3 === null)
        {
            return $root;
        }

        $tail3 = ($part3 === null ? null :: $part3->node1);

        // left to root
        if($part1 === null)
        {
            $this->concat($part1->node1, $root);
        }
         else {
             $this->concat($part3->node2, $root);
         }


        // right to root
        if($part3 === null)
        {
            $this->concat($root, $part1);
        }
        else {
            $this->concat($root, $part3);
        }

        /// right to left
        if($part1 !== null && $part3 !== null)
        {
            $this->concat($tail3, $part1);
        }

        return $part1 === null ? $root : $part1;


    }

    protected function concat(&$x, &$y)
    {
        $x->node1 = $y;
        $y->node2 = $x;
    }

}