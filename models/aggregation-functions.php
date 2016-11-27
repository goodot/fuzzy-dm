<?php
define("arithmetic_mean", "ARITHMETIC_MEAN");
define("geometric_mean", "GEOMETRIC_MEAN");



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

function get_aggregation_function_by_key($key){
    $aggregation_functions = array("ARITHMETIC_MEAN", "GEOMETRIC_MEAN"); //not so pretty TODO prettify
    if(in_array($key, $aggregation_functions)){
        switch($key){
            case arithmetic_mean:{
                return new ArithmeticMean();
            }break;
            case geometric_mean:{
                return new GeometricMean();
            }break;
            default:{
                return new ArithmeticMean();
            }
        }
    }
    else throw new Exception("unknown key for aggregation function");
}

