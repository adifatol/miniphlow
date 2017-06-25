<?php

namespace Nodes;

/* 
 * A generic input into the network
 * (for data, weights, biases etc)
 * 
*/

class Input extends Node{

    function forward() {
        return;
    }

    function backward(){
        # An Input node has no inputs so the gradient (derivative) is zero.
        # The key, `self`, is reference to this object.
        $this->gradients = array($this => 0);

        # Weights and bias may be inputs, so you need to sum
        # the gradient from output gradients.
        foreach ($this->outbound_nodes as $n)
            $this->gradients[$this] += $n->gradients[$this];
    }
}