<?php


class DirectedTree {

    // track all nodes or vertices
    private $_graph = null;

    // track the relationships between nodes
    private $_visited = array();

    // for debugging
    public $_output = array();


    public function __construct(&$nodes)
    {
        $this->_graph = $nodes;
    }


    /**
     * Given a directed graph, design an algorithm to find out whether there is a route between two nodes.
     * @param $origin
     * @param $destination
     * @return bool
     */
    public function hasRouted($origin, $destination)
    {
        // reset all nodes in graph
        $this->reset_nodes();
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

                    if($destination === $neighbor)
                    {
                        return true;
                    }

                    $this->_visited[$neighbor] = true;
                    $q->enqueue($neighbor);
                }
            }
        }

        return false;
    }

    /**
     * Reset all nodes
     */
    public function reset_nodes()
    {
        foreach($this->_graph as $node => $adj)
        {
            $this->_visited[$node] = false;
        }
    }


}