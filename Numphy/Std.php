<?php
namespace Numphy;

class Std implements Operation{

    var $array_;

    public function __construct(array $array_) {
        $this->array_ = $array_;

        return $this;
    }

    /* 
     * Calculate standard deviation for array
     * Does not generalize
    */
    public function calculate() {

        $fMean = (new \Numphy\Mean($this->array_))->calculate();
        $arr_count = count($this->array_);

        $fVariance_arr = [];
        foreach ($this->array_ as $ri => $row) {
            foreach($row as $ci => $val) {
                if (!isset($fVariance_arr[$ci])) { $fVariance_arr[$ci] = 0; }
                $fVariance_arr[$ci] += pow($val - $fMean[$ci], 2);
            }
        }

        foreach($fVariance_arr as $i => $fVariance) {

            $fVariance /= $arr_count;
            $fVariance = (float) sqrt($fVariance);

            $fVariance_arr[$i] = $fVariance;
        }

        return $fVariance_arr;
    }
}