<?php

/**
 * Convert a binary tree to a doubly LinkList in PHP
 * @author thachp
 */

class BinaryNode {

    public $data = null;
    public $left = null;
    public $right = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class BinaryTree {

    private $root = null;
    public $doubly = null;

    public function __construct()
    {
        $this->doubly =  new SplDoublyLinkedList();
    }

    public function insert($data)
    {
        // create BinaryNode object build tree
        // stub for now

    }

    /**
     * Recursive and DFS -> PreOrder
     * @param $current
     */
    public function convertToDoubly($current)
    {
        $this->convertToDoubly($current->left);
        $this->doubly->push($current->data);
        $this->convertToDoubly($current->right);
    }
}

/**
 * Test testing
 */

$driver =  new BinaryTree();
$driver->insert(1);
$driver->insert(2);
$driver->insert(3);
$driver->convertToDoubly($this->root);

/// data is now a doubly
print_r($driver->doubly);