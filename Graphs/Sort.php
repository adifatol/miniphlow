<?php

namespace Graphs;

/*
 * Sort the nodes in topological order using Kahn's Algorithm.
 * `feed_dict`: A dictionary where the key is a `Input` Node and the value is the respective value feed to that Node.
 * Returns a list of sorted nodes. 
 */
class Sort {
    public static function topological(FeedDict $feed_dict) {

        $input_nodes = [];

        foreach($feed_dict as $key => $value) {
            $input_nodes[] = $key;
        }

        $G = [];
        $nodes = $input_nodes;

        while (count($nodes) > 0) {

            $n = array_shift($nodes);
            if (!isset($G[(string)$n])) {
                $G[(string)$n] = ['in'=> [], 'out'=> []];
            }
            foreach($n->outbound_nodes as $m) {
                if (!isset($G[(string)$m])) {
                    $G[(string)$m] = ['in'=> [], 'out'=> []];
                }
                $G[(string)$n]['out'][(string)$m] = $m;
                $G[(string)$m]['in'][(string)$n] = $n;
                $nodes[] = $m;
            }
        }

        $L = [];
        $S = $input_nodes;

        while (count($S) > 0) {
            $n = array_pop($S);

            if ($n instanceof \Nodes\Input) {
                $n->value = $feed_dict->getValue($n);
            }

            $L[] = $n;

            foreach($n->outbound_nodes as $m) {
                unset($G[(string)$n]['out'][(string)$m]);
                unset($G[(string)$m]['in'][(string)$n]);
                if (count($G[(string)$m]['in']) == 0) {
                    $S[] = $m;
                }
            }
        }

        return $L;
    }
}