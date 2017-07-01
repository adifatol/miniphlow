<?php

namespace Nodes;

/* 
 * 
 */

class MSE extends Node{

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