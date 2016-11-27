<?php

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






