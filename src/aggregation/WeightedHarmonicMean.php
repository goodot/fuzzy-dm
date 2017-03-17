<?php


namespace ketili\aggregation;
use ketili\Operations;

class WeightedHarmonicMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = Operations::array_multiplication($array, $weights);
        return Mean::harmonic_average($multiplied_array);
    }
}
