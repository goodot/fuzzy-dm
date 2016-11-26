<?php

define("TRIMF", 'trimf');

function trimf($x, $a, $b,$c){
    $x = (float) $x;
    $a = (float) $a;
    $b = (float) $b;
    $c = (float) $c;


    $is_correct = $a <= $b && $b <= $c;

    if(!$is_correct)
        throw new Exception("Incorrect abc");

    if($x < $a)
        return 0;
    else if($x >= $a && $x <= $b)
        return ($x - $a)/($b - $a);
    else if($x > $b && $x <= $c)
        return ($b-$x)/($c-$b) + 1;
    else return 0;

}
interface MembershipFunction{
    function call($x);
}
class Trimf implements MembershipFunction{
    public $a, $b, $c;
    function __construct($a, $b, $c){
        $is_correct = $a <= $b && $b <= $c;
        if(!$is_correct)
            throw new Exception("Incorrect abc");
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    function call($x){
        $x = (float) $x;
        $a = (float) $this->a;
        $b = (float) $this->b;
        $c = (float) $this->c;






        if($x < $a)
            return 0;
        else if($x >= $a && $x <= $b)
            return ($x - $a)/($b - $a);
        else if($x > $b && $x <= $c)
            return ($b-$x)/($c-$b) + 1;
        else return 0;
}
}

class Feature{
    public $identifier;
    public $mem_function;
    //TODO membership function


    function __construct__($identifier, $mem_function){
        if($mem_function instanceof MembershipFunction){
            $this->identifier = $identifier;
            $this->$mem_function = $mem_function;
        }
        else
            throw new Exception("mem_functon should be MembershipFunction");
    }
    function call_membership_function($value){
        return $this->mem_function.call($value);
    }
}
class Item{
    public $identifier;
    public $features;

    function __construct($identifier, $features){
        if(gettype($features) == "array"){
            $this->identifier = $identifier;
            $this->features = $features;
        }
        else
            throw new Exception("features should be array");
    }



}






