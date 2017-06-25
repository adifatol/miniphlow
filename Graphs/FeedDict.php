<?php

namespace Graphs;

/*
 * PHP objects can't be used as array keys
 */
class FeedDict {

    $keys = [];

    $values = [];

    public function __construct($keys, $values) {
        $this->keys = $keys;
        $this->values = $values;
    }
}