<?php

/**
 * Implement a function to check if a linkedlist is a palindrome.
 * @author thachp
 */

class PalindromeResult {
    public $node = null;
    public $result;

    public function __construct($node, $result)
    {
        $this->node = $node;
        $this->result = $result;
    }
}

class PalindromeLinkedList {

    private  function _isPalindromeRecursive($head, $length)
    {
        if($head === null || $length === 0)
        {
            return new PalindromeResult(null, true);
        }
        else if ($length === 1)
        {
            return new PalindromeResult($head->next, true);
        }
        else if($length === 2)
        {
            return new PalindromeResult($head->next->next, $head->data === $head->next->data);
        }

        $result =  new PalindromeResult($head->next, $length - 2);

        if(!$result->result || $result->node === null)
        {
            return $result;
        }
        else {
            $result->result = $head->data === $result->node->data;
            $result->node = $result->node->next''
             return $result;
         }
    }

    public function isPalindrome($head)
    {
        $node = $this->_isPalindromeRecursive($head, $head->size());
        return $node->result;
    }

}