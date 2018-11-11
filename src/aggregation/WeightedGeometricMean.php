<?php

namespace ketili\aggregation;
use ketili\Operations;

class WeightedGeometricMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = Operations::array_pow($array, $weights);
        return Mean::geo_average($multiplied_array, $weights);
    }
}