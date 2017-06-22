<?php
namespace Numphy;

class Mean implements Operation{


    /* The array for which to calculcate the mean */
    var $array_;

    public function __construct(array $array) {
        $this->array_ = $array;

        return $this;
    }

    /* used in the array_walk */
    function column_sum($val, $key, &$params) {
        $params->sum+=$val[$params->idx];
    }

    public function calculate () {
        $second_dim = 0;
        $array_count = count($this->array_);
        if (is_array($this->array_[0])) {
            $second_dim = count($this->array_[0]);
        }

        if ($second_dim > 0) {


            for($i = 0; $i < $second_dim; $i++) {
                $params = new \stdClass();
                $params->sum = 0;
                $params->idx = $i;
                array_walk($this->array_, 'self::column_sum', $params);
                $avg[$i] = $params->sum / $array_count;
            }

        } else {
            $sum = array_sum($this->array_);
            $avg = $sum / $array_count;
        }

        return $avg;
    }
}
