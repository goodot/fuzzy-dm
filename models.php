<?php

define("TRIMF", 'trimf');
interface MembershipFunction
{
    function call($x);
}

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

//function trimf($x, $a, $b,$c){
//    $x = (float) $x;
//    $a = (float) $a;
//    $b = (float) $b;
//    $c = (float) $c;
//
//
//    $is_correct = $a <= $b && $b <= $c;
//
//    if(!$is_correct)
//        throw new Exception("Incorrect abc");
//
//    if($x < $a)
//        return 0;
//    else if($x >= $a && $x <= $b)
//        return ($x - $a)/($b - $a);
//    else if($x > $b && $x <= $c)
//        return ($b-$x)/($c-$b) + 1;
//    else return 0;
//
//}

class Trimf implements MembershipFunction
{
    public $a, $b, $c;

    function __construct($a, $b, $c)
    {
        $is_correct = $a <= $b && $b <= $c;
        if (!$is_correct)
            throw new Exception("Incorrect abc");
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function call($x)
    {
        $x = (float)$x;
        $a = (float)$this->a;
        $b = (float)$this->b;
        $c = (float)$this->c;


        if ($x < $a)
            return 0;
        else if ($x >= $a && $x <= $b)
            return ($x - $a) / ($b - $a);
        else if ($x > $b && $x <= $c)
            return ($b - $x) / ($c - $b) + 1;
        else return 0;
    }
}

class Feature
{
    public $identifier;
    public $mem_function;
    public $value;


    function __construct($identifier, $mem_function, $value)
    {
        if ($mem_function instanceof MembershipFunction) {
            $this->identifier = $identifier;
            $this->mem_function = $mem_function;
            $this->value = $value;
        } else{
            throw new Exception("mem_functon should be MembershipFunction");
        }
    }

    function call_membership_function()
    {
        return $this->mem_function->call($this->value);
    }
}

class Item
{
    public $identifier;
    public $features;
    public $aggregation_function;

    function __construct($identifier, $features, $aggregation_function)
    {
        if (gettype($features) == "array") {
            $this->identifier = $identifier;
            $this->features = $features;
            if ($aggregation_function instanceof AggregationFunction) {
                $this->aggregation_function = $aggregation_function;
            } else throw new Exception("aggregation_function should be AggregationFunction");
        } else
            throw new Exception("features should be array");
    }

    function aggregate()
    {
        $feature_scores = array();
        foreach ($this->features as $feature) {
            array_push($feature_scores, $feature->call_membership_function());

        }
        var_dump($this->features);
        return $this->aggregation_function->call($feature_scores);
    }


}






