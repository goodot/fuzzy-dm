<?php

namespace ketili;

use ketili\aggregation\Aggregation;
use ketili\Item;
use ketili\Result;
use ketili\Feature;

class Analyzer
{
    public $features;
    public $items;
    public $aggregation_function;
    private $have_weight = false;


    private $results;

    function __construct($features, $items, $aggregation_function)
    {
        foreach ($features as $feature) {
            if (!$feature instanceof Feature)
                throw new \Exception("feature should be Feature");
        }
        foreach ($items as $item) {
            if (!$item instanceof Item)
                throw new \Exception("item should be Item");
        }
        if (!$aggregation_function instanceof Aggregation)
            throw new \Exception("aggregation_function should be Aggregation");


        $this->features = $features;
//        $this->check_feature_weights();
        $this->items = $items;
        $this->aggregation_function = $aggregation_function;
//        var_dump($this->aggregation_function);
    }

//    private function check_feature_weights()
//    {
//        $this->have_weight = false;
//        foreach ($this->features as $feature) {
//            if($feature->get_weight() != null){
//                $this->have_weight = true;
//                break;
//            }
//
//        }
//        if($this->have_weight){
//            foreach($this->features as $feature){
//                if($feature->get_weight() == null){
//                    throw new \Exception("if even one feature has weight, all of features must have weight");
//                }
//            }
//        }
//    }


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
        $this->results = $results;
        return $results;
    }

    function suggest_best()
    {
        $results = $this->results;
        if ($results != NULL) {
            $best = $results[0];
            foreach ($results as $result) {
                if ($result->score > $best->score)
                    $best = $result;
            }
            return $best;
        } else
            return NULL;
    }

    private function aggregate($item, $features, $aggregation_function)
    {
        if (!$item instanceof Item)
            throw new \Exception("item should be Item");


        foreach ($features as $feature) {
            if (!$feature instanceof Feature)
                throw new \Exception("feature should be Feature");
            if (count($features) != count($item->feature_values))
                throw new \Exception("number of features and feature_values doesn't match");

        }


        if (!$aggregation_function instanceof Aggregation) {
            throw new \Exception("aggregation_function should  be Aggregation");
        }

        $feature_scores = array();
        $count_features = count($this->features);

        // var_dump($item);
        for ($i = 0; $i < $count_features; $i++) {
            array_push($feature_scores, $features[$i]->call_membership_function($item->feature_values[$features[$i]->identifier]));
        }
        $score = 0;

        $feature_weights = array();
        foreach ($features as $feature) {
            array_push($feature_weights, $feature->get_weight());
        }
        $score = $this->aggregation_function->call($feature_scores, $feature_weights);

        return $score;

    }
}