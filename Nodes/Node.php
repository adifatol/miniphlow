<?php

namespace Nodes;

/* Base class for nodes in the network */

abstract class Node {

    /* A list of nodes with edges into this node */
    var $inbound_nodes;

    /*  The eventual value of this node. Set by running
        the forward() method */
    var $value;

    /*  Set by running the backward() method */
    var $gradients;

    /* A list of nodes that this node outputs to */
    var $outbound_nodes;

    public function __toString() {
        return spl_object_hash($this);
    }

    public function __construct(array $inbound_nodes = array()) {
        $this->inbound_nodes = $inbound_nodes;
        $this->value = null;
        $this->outbound_nodes = [];

        # Sets this node as an outbound node for all of
        # this node's inputs.
        foreach ($inbound_nodes as $node) {
            $node->outbound_nodes[] = $this;
        }
    }

    abstract function forward();

    abstract function backward();
}