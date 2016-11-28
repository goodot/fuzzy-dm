<?php

class Feature
{
    public $identifier;
    public $mem_function;


    function __construct($identifier, $mem_function)
    {
        if ($mem_function instanceof MembershipFunction) {
            $this->identifier = $identifier;
            $this->mem_function = $mem_function;
        } else {
            throw new Exception("mem_functon should be MembershipFunction");
        }
    }

    function call_membership_function($value)
    {
        return $this->mem_function->call($value);
    }
}

class Item
{
    public $identifier;
    public $feature_values;

    function __construct($identifier, $feature_values)
    {
        if (!gettype($feature_values) == "array")
            throw new Exception("feature_values should be array");
        $this->identifier = $identifier;
        $this->feature_values = $feature_values;

//    function aggregate()
//    {
//        $feature_scores = array();
//        foreach ($this->features as $feature) {
//            array_push($feature_scores, $feature->call_membership_function());
//
//        }
//        var_dump($this->features);
//        return $this->aggregation_function->call($feature_scores);
//    }


    }
}






