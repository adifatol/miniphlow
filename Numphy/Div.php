<?php
namespace Numphy;

class Div implements Operation{

    /* Division operand 1 */
    var $array_1;

    /* Division operand 2 */
    var $array_2;

    public function __construct(array $array_1, array $array_2) {
        $this->array_1 = $array_1;
        $this->array_2 = $array_2;

        return $this;
    }

    /*
     * Divide second array from each element in first array
     * Does not generalize
    */
    public function calculate () {
        foreach($this->array_1 as $ri => $row) {
            foreach($this->array_1[$ri] as $ci => $val) {
                $this->array_1[$ri][$ci] = $val / $this->array_2[$ci];
            }
        }

        return $this->array_1;
    }
}
