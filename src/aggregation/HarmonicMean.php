<?php

namespace ketili\aggregation;


class HarmonicMean implements AggregationFunction
{
    function call($array)
    {
        return Mean::harmonic_average($array);
    }
}
