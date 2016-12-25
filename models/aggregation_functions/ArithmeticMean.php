<?php

namespace ketili\models\aggregation;


class ArithmeticMean implements AggregationFunction
{
    function call($array)
    {
        return Mean::average($array);
    }
}

