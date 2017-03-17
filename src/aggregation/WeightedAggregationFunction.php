<?php


namespace models\aggregation;

interface WeightedAggregationFunction extends Aggregation
{
    function call($array, $weights);
}