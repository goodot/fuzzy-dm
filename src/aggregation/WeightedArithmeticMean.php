<?php

namespace ketili\aggregation;
use ketili\Operations;

class WeightedArithmeticMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = Operations::array_multiplication($array, $weights);
        return Mean::average($multiplied_array);

    }
}