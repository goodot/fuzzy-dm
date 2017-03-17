<?php


namespace ketili\aggregation;


class GeometricMean implements AggregationFunction
{
    function call($array)
    {
        return Mean::geo_average($array);
    }
}