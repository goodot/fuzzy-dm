<?php
require_once("aggregation-functions.php");
require_once("membership-functions.php");
require_once("models.php");
require_once("tools.php");
require_once("response.php");

//
//class Aggregator
//{
//    public $item;
//    public $features;
//    public $feature_values;
//    public $aggregation_function;
//
//
//    function __construct($item, $features, $aggregation_function){
//            if(!$this->item instanceof Item)
//                throw new Exception("item should be Item");
//
//
//        foreach($features as $feature){
//            if(!$feature instanceof Feature)
//                throw new Exception("feature should be Feature");
//            if(count($features) != count($item->feature_values))
//                throw new Exception("number of features and feature_values doesn't match");
//
//        }
//
//
//        if(!$aggregation_function instanceof AggregationFunction)
//            throw new Excepton("aggregation_function should be AggregationFunction");
//
//
//        $this->item = $item;
//        $this->features = $features;
//        $this->feature_values = $item->feature_values;
//        $this->aggregation_function = $aggregation_function;
//    }
//
//
//    function aggregate(){
//        $feature_scores = array();
//        $count_features = count($this->features);
//
//        for($i=0; $i<$count_features; $i++){
//            array_push($feature_scores, $this->features[$i]->call_membership_function($this->feature_values[$i]));
//        }
//        return $this->aggregation_function->call($feature_scores);
//    }
//
//}


class Result
{
    public $item_identifier;
    public $score;
}

class Analyzer
{
    public $features;
    public $items;
    public $aggregation_function;

    function __construct($features, $items, $aggregation_function)
    {
        foreach ($features as $feature) {
            if (!$feature instanceof Feature)
                throw new Exception("feature should be Feature");
        }
        foreach ($items as $item) {
            if (!$item instanceof Item)
                throw new Exception("item should be Item");
        }
        if (!$aggregation_function instanceof AggregationFunction)
            throw new Exception("aggregation_function should be AggregationFunction");

        $this->features = $features;
        $this->items = $items;
        $this->aggregation_function = $aggregation_function;
    }

    function analyze()
    {
        $results = array();
        $item_count = count($this->items);

        for ($i = 0; $i < $item_count; $i++) {
            $item = $this->items[$i];
            $result = new Result();
            $result->score = $this->aggregate($item, $this->features, $this->aggregation_function);
            $result->item_identifier = $item->identifier;
            array_push($results, $result);
        }
        return $results;
    }
    private function aggregate($item, $features, $aggregation_function)
    {
        if (!$item instanceof Item)
            throw new Exception("item should be Item");


        foreach ($features as $feature) {
            if (!$feature instanceof Feature)
                throw new Exception("feature should be Feature");
            if (count($features) != count($item->feature_values))
                throw new Exception("number of features and feature_values doesn't match");

        }


        if (!$aggregation_function instanceof AggregationFunction)
            throw new Excepton("aggregation_function should be AggregationFunction");


        $feature_scores = array();
        $count_features = count($this->features);

        for ($i = 0; $i < $count_features; $i++) {
            array_push($feature_scores, $features[$i]->call_membership_function($item->feature_values[$i]));
        }
        return $this->aggregation_function->call($feature_scores);

    }
}


