<?php
define("arithmetic_mean", "ARITHMETIC_MEAN");
define("weighted_arithmetic_mean", "WEIGHTED_ARITHMETIC_MEAN");
define("geometric_mean", "GEOMETRIC_MEAN");
define("weighted_geometric_mean", "WEIGHTED_GEOMETRIC_MEAN");
define("harmonic_mean", "HARMONIC_MEAN");
define("weighted_harmonic_mean", "WEIGHTED_HARMONIC_MEAN");


interface AggregationFunction
{
    function call($array);
}

interface WeightedAggregationFunction
{
    function call($array, $weights);
}

class ArithmeticMean implements AggregationFunction
{
    function call($array)
    {
        return average($array);
    }
}

class GeometricMean implements AggregationFunction
{
    function call($array)
    {
        return geo_average($array);
    }
}

class HarmonicMean implements AggregationFunction
{
    function call($array)
    {
        return harmonic_average($array);
    }
}

class WeightedArithmeticMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = array_multiplication($array, $weights);
        return average($multiplied_array);

    }
}

class WeightedGeometricMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = array_multiplication($array, $weights);
        return geo_average($multiplied_array);
    }
}

class WeightedHarmonicMean implements WeightedAggregationFunction
{
    function call($array, $weights)
    {
        $multiplied_array = array_multiplication($array, $weights);
        return harmonic_average($multiplied_array);
    }
}


function get_aggregation_function_by_key($key)
{
    $aggregation_functions = array("ARITHMETIC_MEAN", "GEOMETRIC_MEAN",
        "HARMONIC_MEAN", "WEIGHTED_ARITHMETIC_MEAN", "WEIGHTED_HARMONIC_MEAN",
        "WEIGHTED_GEOMETRIC_MEAN"); //not so pretty TODO prettify
    if (in_array($key, $aggregation_functions)) {

        switch ($key) {
            case arithmetic_mean: {
                return new ArithmeticMean();
            }
                break;
            case geometric_mean: {
                return new GeometricMean();
            }
                break;
            case harmonic_mean: {
                return new HarmonicMean();
            }
                break;
            case weighted_arithmetic_mean: {
                return new WeightedArithmeticMean();
            }
                break;
            case weighted_geometric_mean: {
                return new WeightedGeometricMean();
            }
                break;
            case weighted_harmonic_mean: {
                return new WeightedHarmonicMean();
            }
                break;
            default: {
                return new ArithmeticMean();
            }
        }
    } else throw new Exception("unknown key for aggregation function");
}


function average($array)
{
    $count = count($array);
    $sum = array_sum($array);

    return $sum / $count;
}

function geo_average($array)
{
    $count = count($array);
    $product = array_product($array);
    return $product / $count;
}

function harmonic_average($array)
{
    $n = count($array);
    $sum = 0;
    foreach ($array as $x) {
        $sum += 1 / ((float)$x);
    }
    $sum = pow($sum, -1);

    return $n * $sum;
}


function array_multiplication($ar1, $ar2)
{
    if (count($ar1) != count($ar2))
        throw new Exception("size of arrays are not equal");
    $count = count($ar1);
    $product = array();
    for ($i = 0; $i < $count; $i++) {
        $multiplication = (float)($ar1[$i] * $ar2[$i]);
        array_push($product, $multiplication);
    }
    return $product;
}

