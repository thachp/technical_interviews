<?php

/**
 * Binary tree using in PHP objects.
 * A binary tree is a tree data structure in which each node has at most two children,
 * which are referred to as the left child and the right child
 ** @author thachp
 */
class BinaryNode
{

    public $level = null;
    public $data = null;
    public $left = null;
    public $right = null;

    public function __construct($item)
    {
        $this->data = $item;
        $this->level = 0;
        $this->left = null;
        $this->right = null;
    }
}


/**
 * Class BinarySearchTree
 * Binary search three is type of binary three.
 * It properties are that the left nodes must be less than right nodes. Subtrees must also follow the same propeties.
 * @author thachp
 */
class BinarySearchTree
{
    public $root = null;

    /**
     * Construct Binary three.  If
     * @param $data
     */
    public function __construct()
    {
        $this->root = null;
    }

    /**
     * Insert item into node.
     * @param $item
     * @param $subtree
     */
    public function insert($item)
    {
        $node = new BinaryNode($item);
        if ($this->isEmpty()) {
            $this->root = $node;
        } else {
            $this->_insertNode($node, $this->root);
        }
    }

    /**
     * Insert an item into three node.
     * @param $item
     */
    private function _insertNode($node, &$subtree)
    {
        if ($subtree === null) {
            $subtree = $node;
        } // if value is less than subtree node keep inserting to the left
        else {
            if ($node->data > $subtree->data) {
                $this->_insertNode($node, $subtree->right);
            } else if ($node->data < $subtree->data) {
                $this->_insertNode($node, $subtree->left);

            } else {
                // reject duplicates
            }
        }
    }

    /**
     * Check if the root is empty.
     * @return bool
     */
    public function isEmpty()
    {
        return $this->root === null;
    }

} // end class

// test tree
$arr = array(50, 64, 10, 6, 40, 72, 80, 100, 21);
$btree = new BinarySearchTree();
for ($i = 0, $n = count($arr); $i < $n; $i++) {
    $btree->insert($arr[$i]);
}

print_r($btree);




