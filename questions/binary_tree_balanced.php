<?php
/**
 * Implement a function to check if a binary tree is balanced.
 * @author thachp
 * Time Complexity: O( N ), N is the number of nodes
 * Space Complexity: O( log N ), excluding the function call stack
 */

class BalanceTree {

    public $root = null;

    private function _checkHeight()
    {
        if($this->root === null)
        {
            return 0;
        }

        // check if the left is balanced
        $leftHeight = $this->_checkHeight($this->root->left);
        if($leftHeight === -1){
            return -1;
        }

        // check if the right is balanced
        $rightHeight = $this->_checkHeight($this->root->right);
        if($rightHeight === -1)
        {
            return -1;
        }

        // check if the current node is balanced
        $heightDiff = $leftHeight - $rightHeight;

        if(abs($heightDiff) > 1)
        {
            return -1;
        } else {
            return max($leftHeight, $rightHeight) + 1;
        }
    }


    public function isBalanced()
    {
        if($this->_checkHeight($this->root) === -1)
        {
            return false;
        } else {
            return true;
        }
    }
}