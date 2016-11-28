<?php
require_once("aggregation-functions.php");
require_once("membership-functions.php");
require_once("models.php");
require_once("tools.php");
require_once("response.php");


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


    private $results;

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
//        var_dump($this->aggregation_function);
    }

    function analyze()
    {
        $results = array();
        $item_count = count($this->items);
        $aggregation_function = $this->aggregation_function;
//        var_dump($aggregation_function);
        for ($i = 0; $i < $item_count; $i++) {
            $item = $this->items[$i];
            $result = new Result();

            $result->score = $this->aggregate($item, $this->features, $this->aggregation_function);
//            var_dump($result);

            $result->item_identifier = $item->identifier;
            array_push($results, $result);
        }
        $this->results = $results;
        return $results;
    }
    function suggest_best(){
        $results = $this->results;
        if($results != NULL){
            $best = $results[0];
            foreach($results as $result){
                if($result->score > $best->score)
                    $best = $result;
            }
            return $best;
        }
        else
            return NULL;
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
//        var_dump($this->aggregation_function->call($feature_scores));
        return $this->aggregation_function->call($feature_scores);

    }
}




