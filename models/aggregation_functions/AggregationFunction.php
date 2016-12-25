<?php


namespace ketili\models\aggregation;

interface AggregationFunction extends Aggregation
{
    function call($array);
}