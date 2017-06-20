<?php

namespace ketili\aggregation;
use ketili\Operations;

class WeightedArithmeticMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = Operations::array_multiplication($array, $weights);
        $sum = array_sum($weights);
        $sum_multiplied_array = array_sum($multiplied_array);
        return $sum_multiplied_array/$sum;

    }
}