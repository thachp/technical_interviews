<?php

/**
 * Class BST
 * @author thachp
 */
class BST {

    public $parent = null;
    public $root = null;
    public $min = 0;
    public $max = 0;

    /**
     * Implement a function to check if a binary tree is a binary search tree.
     * $left <= $current <= $right
     */
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

    /*
     * Write an algorithm to find the ‘next’ node (in-order successor) of a given node in a binary search tree.
     * You may assume that each node has a link to its parent.
     * @param $node
     * @return null
     */
    
    public function in_order_successor($node)
    {
        if($node === null) return null;

        // found right chilcren ---> return leftmost node of right subtree
        if($node->parent === null || $node->right !== null)
        {
            return $this->_leftMost($node->right);
        } else {
            $q =  $node;
            $x = $q->parent;

            // go up until we are on left instead of right
            while($x !== null && $x->left != $q){
                $q = $x;
                $x = $x->parent;
            }
            return $x;
        }
    }


    private function _leftMost($node)
    {
        if($node === null)
        {
            return null;
        }

        while($node->left !== null)
        {
            $node = $node->left;
        }

        return $node;
    }

}