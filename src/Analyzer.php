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
    private $working_results;

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

    function top($top)
    {
        $this->working_results = $this->results;
        $top_results = array();

        if ($this->working_results) {
            if (count($this->working_results) < $top)
                $top = count($this->working_results);


            for ($i = 0; $i < $top; $i++) {
                array_push($top_results, $this->max_result());
            }

            return $top_results;
        } else {
            return null;
        }
    }

    function sort()
    {
        $this->working_results = $this->results;
        $top_results = array();


        if ($this->working_results) {
            $top = count($this->working_results);


            for ($i = 0; $i < $top; $i++) {
                array_push($top_results, $this->max_result());
            }

            return $top_results;
        } else {
            return null;
        }
    }

    private function max_result()
    {
        $count = count($this->working_results);
        $max_element = $this->working_results[0];
        $max_element_index = 0;
        for ($i = 1; $i < $count; $i++) {
            if ($this->working_results[$i]->score > $max_element->score) {
                $max_element = $this->working_results[$i];
                $max_element_index = $i;

            }
        }
        return array_splice($this->working_results, $max_element_index, 1)[0];

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


        for ($i = 0; $i < $count_features; $i++) {
            if (array_key_exists($features[$i]->identifier, $item->feature_values))
                array_push($feature_scores, $features[$i]->call_membership_function($item->feature_values[$features[$i]->identifier]));
            else throw new \Exception("feature values doesn't have key [".$features[$i]->identifier."]. Item: [".
                $item->identifier."]");
        }

        $feature_weights = array();
        foreach ($features as $feature) {
            array_push($feature_weights, $feature->get_weight());
        }
        $score = $this->aggregation_function->call($feature_scores, $feature_weights);

        return $score;

    }
}