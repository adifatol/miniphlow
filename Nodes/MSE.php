<?php

namespace Nodes;

/* 
 * 
 */

class MSE extends Node{

    public function __construct(Input $y, Linear $l) {
        
//        return parent::__construct(array($X, $W, $b));
    }

    /*
     * 
     */
    public function forward() {
        throw new \Exception('MSE forward not implemented');
    }

    public function backward(){
        throw new \Exception('MSE backward not implemented');
    }
}