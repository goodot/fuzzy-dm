<?php


namespace ketili\aggregation;

interface WeightedAggregationFunction extends Aggregation
{
    function call($array, $weights);
}