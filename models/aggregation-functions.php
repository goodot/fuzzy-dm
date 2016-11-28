<?php
define("arithmetic_mean", "ARITHMETIC_MEAN");
define("geometric_mean", "GEOMETRIC_MEAN");
define("harmonic_mean", "HARMONIC_MEAN");


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
//        var_dump($result);
        $response = pow($result, 1 / $size);
        var_dump($response);
        return $response;
    }
}

class HarmonicMean implements AggregationFunction
{
    function call($array)
    {
        $n = count($array);
        $sum = 0;
        foreach ($array as $x) {
            $sum += 1 / ((float)$x);
        }
        $sum = pow($sum, -1);

        return $n * $sum;
    }
}

function get_aggregation_function_by_key($key)
{
    $aggregation_functions = array("ARITHMETIC_MEAN", "GEOMETRIC_MEAN",
        "HARMONIC_MEAN"); //not so pretty TODO prettify
    if (in_array($key, $aggregation_functions)) {

        switch ($key) {
            case arithmetic_mean:
            {
                return new ArithmeticMean();
            }
                break;
            case geometric_mean:
            {
                return new GeometricMean();
            }
                break;
            case harmonic_mean:
            {
                return new HarmonicMean();
            }
                break;
            default:
                {
                return new ArithmeticMean();
                }
        }
    } else throw new Exception("unknown key for aggregation function");
}

