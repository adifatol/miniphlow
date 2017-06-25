<?php

namespace Nodes;

/* 
 * Represents a node that performs a linear transform.
*/

class Linear extends Node{

    public function __construct($X, $W, $b) {
        return parent::__construct(array($X, $W, $b));
    }

    /*
     * Performs the math behind a linear transform.
     */
    public function forward() {
        $X = $this->inbound_nodes[0]->value;
        $W = $this->inbound_nodes[1]->value;
        $b = $this->inbound_nodes[2]->value;

        $dot = (new \Numphy\Dot($X, $W))->calculate();
        $this->value = (new \Numphy\Sum($dot, $b))->calculate();

        return $this->value;
    }

    /*
     * Calculates the gradient based on the output values.
     */
    public function backward(){

        throw new \Exception('Linear backward not implemented');
//
//        # Initialize a partial for each of the inbound_nodes.
//        foreach($this->inbound_nodes as $n) {
//            $this->gradients[] = array_fill(count($n)){n: np.zeros_like(n.value) for n in self.inbound_nodes}
//        }

//        # Cycle through the outputs. The gradient will change depending
//        # on each output, so the gradients are summed over all outputs.
//        for n in self.outbound_nodes:
//            # Get the partial of the cost with respect to this node.
//            grad_cost = n.gradients[self]
//            # Set the partial of the loss with respect to this node's inputs.
//            self.gradients[self.inbound_nodes[0]] += np.dot(grad_cost, self.inbound_nodes[1].value.T)
//            # Set the partial of the loss with respect to this node's weights.
//            self.gradients[self.inbound_nodes[1]] += np.dot(self.inbound_nodes[0].value.T, grad_cost)
//            # Set the partial of the loss with respect to this node's bias.
//            self.gradients[self.inbound_nodes[2]] += np.sum(grad_cost, axis=0, keepdims=False)
    }
}

//    def backward(self):
//        """
//        
//        """
//        # Initialize a partial for each of the inbound_nodes.
//        self.gradients = {n: np.zeros_like(n.value) for n in self.inbound_nodes}
//        # Cycle through the outputs. The gradient will change depending
//        # on each output, so the gradients are summed over all outputs.
//        for n in self.outbound_nodes:
//            # Get the partial of the cost with respect to this node.
//            grad_cost = n.gradients[self]
//            # Set the partial of the loss with respect to this node's inputs.
//            self.gradients[self.inbound_nodes[0]] += np.dot(grad_cost, self.inbound_nodes[1].value.T)
//            # Set the partial of the loss with respect to this node's weights.
//            self.gradients[self.inbound_nodes[1]] += np.dot(self.inbound_nodes[0].value.T, grad_cost)
//            # Set the partial of the loss with respect to this node's bias.
//            self.gradients[self.inbound_nodes[2]] += np.sum(grad_cost, axis=0, keepdims=False)
//
