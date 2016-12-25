<?php


namespace models\aggregation;


class GeometricMean implements AggregationFunction
{
    function call($array)
    {
        return Mean::geo_average($array);
    }
}