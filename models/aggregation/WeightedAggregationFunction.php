<?php


namespace models\aggregation;

interface WeightedAggregationFunction
{
    function call($array, $weights);
}