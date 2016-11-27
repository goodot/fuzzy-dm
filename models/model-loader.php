<?php
require_once("aggregation-functions.php");
require_once("membership-functions.php");
require_once("models.php");


class Aggregator
{
    public $items;
    public $features;
    public $feature_values;
    public $aggregation_function;


    function __construct($items, $features, $feature_values, $aggregation_function){
        foreach($items as $item){
            if(!$item instanceof Item)
                throw new Exception("item should be Item");

        }
        foreach($features as $feature){
            if(!$feature instanceof Feature)
                throw new Exception("feature should be Feature");
        }
        if(gettype($feature_values) != "array")
            throw new Exception("feature_values should be array");
        if(!$aggregation_function instanceof AggregationFunction)
            throw new Excepton("aggregation_function should be AggregationFunction");
        if(count($features) != count($feature_values))
            throw new Exception("number of features and feature_values doesn't match");

        $this->items = $items;
        $this->features = $features;
        $this->feature_values = $feature_values;
        $this->aggregation_function = $aggregation_function;
    }


    function aggregate(){
        $feature_scores = array();
        $count_features = count($this->features);

        for($i=0; $i<$count_features; $i++){
            array_push($feature_scores, $this->features[$i]->call_membership_function($this->feature_values[$i]));
        }
        return $this->aggregation_function->call($feature_scores);
    }

}


