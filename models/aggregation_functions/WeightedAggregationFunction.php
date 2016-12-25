<?php


namespace ketili\models\aggregation;

interface WeightedAggregationFunction
{
    function call($array, $weights);
}