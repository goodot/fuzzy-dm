<?php

namespace ketili\aggregation;
use models\Operations;

class WeightedGeometricMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = Operations::array_multiplication($array, $weights);
        return Mean::geo_average($multiplied_array);
    }
}