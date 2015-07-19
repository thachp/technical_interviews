<?php

/**
 * Graph Data Structure in PHP.
 * There are three type of graph implementation;  adjacency matrix and  adjacency list.
 * Graphs have a number of real-world applications, such as network optimization, traffic routing,
 * and social network analysis.
 *
 *
 * There are TWO ways to represent graph; Adjacency matrix and n Adjacency list.
 * Purpose:  To have good understanding of how DFS and BFS traversal in Graph Data Structure.
 * Adjacency lists are more space-efficient, particularly for sparse graphs in which most
 * pairs of vertices are unconnected, while adjacency matrices facilitate quicker lookups.
 *
 ** @author thachp
 */


/**
 * Class Graph
 * Use Adjacency List and use array() instead of primitive because it is just because it is much easier to implement.
 */

class Graph
{

    // track all nodes or vertices
    private $_graph = null;

    // track the relationships between nodes
    public $_visited = array();

    // for debugging
    public $_output = array();


    public function __construct(&$nodes)
    {
        $this->_graph = $nodes;
    }

    /**
     * Breadth First Search
     * We use Queue.
     */
    public function bfs($origin)
    {

        // reset all nodes in graph
        $this->_reset_nodes();

        // create queue
        $q = new SplQueue();
        $q->enqueue($origin);

        // origin has been visited
        $this->_visited[$origin] = true;

        while(!$q->isEmpty())
        {
            $node = $q->dequeue();
            $neighbors = $this->_graph[$node];

            $this->_output[] = $node;

            foreach($neighbors as $neighbor)
            {
                if($this->_visited[$neighbor] === false)
                {
                    $this->_visited[$neighbor] = true;
                    $q->enqueue($neighbor);
                }
            }
        }
    }

    protected function _reset_nodes()
    {
        foreach($this->_graph as $node => $adj)
        {
            $this->_visited[$node] = false;
        }
    }

} // end graph



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



/**
 * Simple Test
 */

$data = array(
    'A' => array('B', 'F'),
    'B' => array('A', 'D', 'E'),
    'C' => array('F'),
    'D' => array('B', 'E'),
    'E' => array('B', 'D', 'F'),
    'F' => array('A', 'E', 'C'),
);


$graph = new Graph($data);

// bread first search traversal, good for finding shortest path
$graph->bfs('A');
// expect A,B,F,D,E,C
debug($graph->_output, "C", $graph->_output[5], "BFS Traversal");

