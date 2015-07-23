<?php

/**
 * Given a sorted (increasing order) array, write an algorithm to create a binary search tree with minimal height.
 * @author thachp
 */

class TreeNode {
    public $data = null;
    public $left = null;
    public $right = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class MinimalTree {

    // track all nodes or vertices
    private $_graph = null;

    // track the relationships between nodes
    private $_visited = array();

    // for debugging
    public $_output = array();


    private function _create_helper(&$array, $start, $end)
    {
        if($end < $start)
        {
            return null;
        }
        $mid = $start + $end) / 2;
        $node = new TreeNode($array[(int)$mid]);
        $node->left = $this->_create_helper($array, $start, $mid -1);
        $node->right = $this->_create_helper($array, $start, $mid + 1, $end);
        return $node;
    }

    public function create(array $numbers)
    {
        return $this->_create_helper($numbers, 0, count($numbers) - 1);

    }


}