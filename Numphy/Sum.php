<?php
namespace Numphy;

class Sum implements Operation{

    /* Sum operand 1 */
    var $array_1;

    /* Sum operand 2 */
    var $array_2;

    public function __construct(array $array_1, array $array_2) {
        $this->array_1 = $array_1;
        $this->array_2 = $array_2;

        return $this;
    }

    /*
     * Sum operation
     * Does not generalize
    */
    public function calculate () {
        throw new \Exception('Sum not implemented');
    }
}
