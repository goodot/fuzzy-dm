<?php


namespace models\aggregation;

interface AggregationFunction extends Aggregation
{
    function call($array);
}