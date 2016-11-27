<?php
interface AggregationFunction
{
    function call($array);
}
class ArithmeticMean implements AggregationFunction
{
    function call($array)
    {
        $size = count($array);
        $sum = 0.0;
        foreach ($array as $x) {
            $sum += $x;
        }

        return $sum / $size;
    }
}

class GeometricMean implements AggregationFunction
{
    function call($array)
    {
        $size = (float)count($array);
        $result = 1;
        foreach ($array as $x) {
            $result *= $x;
        }
        return pow(-$size, $result);
    }
}

