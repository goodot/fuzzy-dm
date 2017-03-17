<?php


namespace ketili\aggregation;

interface AggregationFunction extends Aggregation
{
    function call($array);
}