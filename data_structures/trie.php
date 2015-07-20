<?php

/**
 * Purpose of this is to understand how to add , and insert words to trie data structure.
 * @see https://www.topcoder.com/community/data-science/data-science-tutorials/using-tries/
 * @see  http://www.parkerbossier.com/files/chatterblocks_trie.php.txt
 * @author http://www.parkerbossier.com/
 */


class Node {
    public $letter = null;
    public $pointers = array();

    public function __construct($letter)
    {
        $this->letter = $letter;
    }
}

class Trie {

    public $root = null;

    public function __construct(){
        $this->root = new Node('');
    }


    /**
     * Add word to a trie
     * @param $word
     */
    public function add_word($word)
    {
        $word = str_split($word);
        $cur_node = &$this->root;

        foreach ($word as $cur_letter)
        {
            // Advance the current node if possible
            if (isset($cur_node->pointers[$cur_letter]))
            {
                $cur_node = & $cur_node->pointers[$cur_letter];
            }

            // Otherwise, add a new node and update the current node
            else
            {
                $cur_node->pointers[$cur_letter] = new Node($cur_letter);
                $cur_node = & $cur_node->pointers[$cur_letter];
            }
        }
    }


    // Returns true if the given word exists in the trie, false otherwise
    public function check_word($word)
    {
        // Start at the root node
        $cur_node = & $this->root;

        // Loop through the word
        while (strlen($word) >= 0)
        {
            // Return success if the word has no letters left
            if (strlen($word) == 0)
            {
                return true;
            }

            // Extract the first letter
            $cur_letter = $word[0];

            // Advance the current node if possible
            if (isset($cur_node->pointers[$cur_letter]))
            {
                $cur_node = & $cur_node->pointers[$cur_letter];

                // Update the word (remove the first letter)
                $word = substr($word, 1);
            } else
            {
                return false;
            }
        }
        return false;
    }
}

// Create the trie
$eng_trie = new Trie();

// Load the word list
$word_list = array("banana", "band", "ana", "anna");
foreach ($word_list as $cur_word)
{
    $eng_trie->add_word($cur_word);
}


$test = "anna";

$test = $eng_trie->check_word($test);
var_dump($test);

//print_r($eng_trie);