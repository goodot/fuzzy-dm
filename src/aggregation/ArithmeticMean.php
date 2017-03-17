<?php

namespace ketili\aggregation;


class ArithmeticMean implements AggregationFunction
{
    function call($array)
    {
        return Mean::average($array);
    }
}

