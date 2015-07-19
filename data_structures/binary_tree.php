<?php

/**
 * Binary tree in PHP objects.
 * A binary tree is a tree data structure in which each node has at most two children,
 * which are referred to as the left child and the right child
 *
 * Purpose:  To understand how Insertion, DFS (PreOrder, InOrder, PostOrder), BFS works
 * in Binary Tree data structure.
 ** @author thachp
 */
class BinaryNode
{

    // these are height.. need to be updated once a while
    // @see https://www.youtube.com/watch?v=IWzYoXKaRIc
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
    public $output = array();

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
     * DFS - Pre Order Traversal
     * Data Left Right
     */
    public function preOrder($node)
    {
        $this->output[] = $node->data;

        if ($node->left) {
            $this->preOrder($node->left);
        }

        if ($node->right) {
            $this->preOrder($node->right);
        }

    }


    /**
     * DFS - In Order Traversal
     * Left Data Right
     */
    public function inOrder($node)
    {
        if ($node->left) {
            $this->inOrder($node->left);
        }

        $this->output[] = $node->data;

        if ($node->right) {
            $this->inOrder($node->right);
        }

    }

    /**
     * DFS - Post Order Traversal
     * Left Right Data
     */
    public function postOrder($node)
    {

        if ($node->left) {
            $this->postOrder($node->left);
        }

        if ($node->right) {
            $this->postOrder($node->right);
        }

        $this->output[] = $node->data;

    }

    /**
     * Visit the node, add it child nodes in the queue. Return linear array.
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     *
     * @return array|bool
     */

    public function BFS()
    {
        if ($this->isEmpty() === true) {
            return false; // no root nodes
        }
        $q = new SplQueue();
        // add root node to the queue FIFO
        $this->root->level = 1;
        $q->enqueue($this->root);
        $current_level = $this->root->level;
        $out = array();

        while (!$q->isEmpty()) {
            $current_node = $q->shift();
            if ($current_node->level > $current_level) {
                $current_level++;
            }

            array_push($out, $current_node->data);

            if ($current_node->left) {
                $current_node->left->level = $current_level++;
                $q->enqueue($current_node->left);
            }

            if ($current_node->right) {
                $current_node->right->level = $current_level++;
                $q->enqueue($current_node->right);
            }
        }

        return $out;
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


function debug($array, $assert, $value, $subject = '')
{
    echo($subject . " \n");
    echo implode(', ', $array) . "\n";

    if ($assert === $value) {
        echo("It looks good. \n\n");
    } else {
        echo("It looks bad. \n\n");
    }
}

// test tree
$arr = array(50, 64, 10, 6, 40, 72, 80, 100, 21, 53, 75);
$btree = new BinarySearchTree();
for ($i = 0, $n = count($arr); $i < $n; $i++) {
    $btree->insert($arr[$i]);
}

//print_r($btree);

// expect 50 10 64 6 40 53 72 21 80 75 100
$level_orders = $btree->BFS();
debug($level_orders, $level_orders[0], 50, "print traversal!!");

// expect 50, 10, 6, 40, 21, 64, 53, 72, 80, 75, 100
$btree->preOrder($btree->root);
$preorder = $btree->output;
debug($preorder, (int)$preorder[0], 50, "print pre-order!!");

// expect 6, 10, 21, 40, 50, 53, 64, 72, 75, 80, 100
$btree->output = array();
$btree->inOrder($btree->root);
$inOrder = $btree->output;
debug($inOrder, $inOrder[0], 6, "print inOrder!!");


$btree->output = array();
$btree->postOrder($btree->root);
$postOrder = $btree->output;
debug($postOrder, $postOrder[0], 6, "print postOrder!!");




