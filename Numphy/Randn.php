<?php
namespace Numphy;

class Randn implements Operation{

    /* Dimension 1 */
    var $d1;

    /* Dimension 2 */
    var $d2;

    public function __construct($d1, $d2 = null) {
        $this->d1 = $d1;
        $this->d2 = $d2;

        return $this;
    }

    public function nrand() {
        $mean = 0;
        $sd   = 1;
        $x = mt_rand()/mt_getrandmax();
        $y = mt_rand()/mt_getrandmax();
        return sqrt(-2*log($x))*cos(2*pi()*$y)*$sd + $mean;
    }

    /* 
     * Fill an array with random nr from standard normal deviation
     * Does not generalize, supports up to 2 dimensions
    */
    public function calculate () {
        $this->array_ = [];
        for($i = 0; $i < $this->d1; $i++) {
            if ($this->d2 != null) {
                for ($j = 0; $j < $this->d2; $j++) {
                    $this->array_[$i][$j] = $this->nrand();
                }
            } else {
                $this->array_[$i] = $this->nrand();
            }
        }

        return $this->array_;
    }
}
