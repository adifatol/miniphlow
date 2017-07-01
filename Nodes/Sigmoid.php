<?php

namespace Nodes;

/* 
 * 
 */

class Sigmoid extends Node{

    /*
     * 
     */
    public function forward() {
        throw new \Exception('Sigmoid forward not implemented');
    }

    public function backward(){
        throw new \Exception('Sigmoid backward not implemented');
    }
}