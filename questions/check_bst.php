<?php

/**
 * Implement a function to check if a binary tree is a binary search tree.
 * $left <= $current <= $right
 */
class BST {

    public $root = null;
    public $min = 0;
    public $max = 0;

    public function check()
    {
        return $this->_check($this->root, $this->min, $this->max);
    }

    private function _check($node, $min, $max)
    {

        if($node === null)
        {
            return true;
        }

        if($node->data <= $min || $node->data >= $max)
        {
            return false;
        }

        if(!$this->_check($node->left, $min, $max) ||
            !$this->_check($node->right, $node->data, $max)){
            return false;
        }
        return true;
    }
}