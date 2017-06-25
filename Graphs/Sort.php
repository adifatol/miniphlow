<?php

namespace Graphs;

/*
 * Sort the nodes in topological order using Kahn's Algorithm.
 * `feed_dict`: A dictionary where the key is a `Input` Node and the value is the respective value feed to that Node.
 * Returns a list of sorted nodes. 
 */
class Sort {
    public function topological(FeedDict $feed_dict) {
//
//    foreach($feed_dict as $key => $value) {
//        $input_nodes[] = $key;
//    }
//    input_nodes = [n for n in feed_dict.keys()]
//        
//    }
}
//
//def topological_sort(feed_dict):
//
//    input_nodes = [n for n in feed_dict.keys()]
//
//    G = {}
//    nodes = [n for n in input_nodes]
//    while len(nodes) > 0:
//        n = nodes.pop(0)
//        if n not in G:
//            G[n] = {'in': set(), 'out': set()}
//        for m in n.outbound_nodes:
//            if m not in G:
//                G[m] = {'in': set(), 'out': set()}
//            G[n]['out'].add(m)
//            G[m]['in'].add(n)
//            nodes.append(m)
//
//    L = []
//    S = set(input_nodes)
//    while len(S) > 0:
//        n = S.pop()
//
//        if isinstance(n, Input):
//            n.value = feed_dict[n]
//
//        L.append(n)
//        for m in n.outbound_nodes:
//            G[n]['out'].remove(m)
//            G[m]['in'].remove(n)
//            # if no other incoming edges add to S
//            if len(G[m]['in']) == 0:
//                S.add(m)
//    return L