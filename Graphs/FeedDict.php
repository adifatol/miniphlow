<?php

namespace Graphs;

/*
 * PHP objects can't be used as array keys
 */
class FeedDict implements \Iterator{

    var $keys = [];

    var $values = [];

    private $position = 0;

    public function __construct($keys, $values) {
        $this->keys = $keys;
        $this->values = $values;
        $this->position=0;
    }

    public function getValue($key) {
        foreach($this->keys as $i => $k) {
            if ($k == $key) {
                return $this->values[$i];
            }
        }

        return false;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->values[$this->position];
    }

    public function key() {
        return $this->keys[$this->position];
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->values[$this->position]) && isset($this->keys[$this->position]);
    }

}