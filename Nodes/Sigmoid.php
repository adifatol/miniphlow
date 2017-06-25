<?php

namespace Nodes;

/* 
 * 
 */

class Sigmoid extends Node{

    public function __construct() {
//        return parent::__construct(array($X, $W, $b));
    }

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