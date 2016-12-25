<?php

namespace models;
use models\membership\MembershipFunction;

class Feature
{
    public $identifier;
    public $mem_function;
    public $weight;


    function __construct($identifier, $mem_function)
    {
        if ($mem_function instanceof MembershipFunction) {
            $this->identifier = $identifier;
            $this->mem_function = $mem_function;
        } else {
            throw new \Exception("mem_functon should be MembershipFunction");
        }

    }

    function set_weight($weight)
    {
        if($weight >1 || $weight < 0)
            throw new \Exception("weight must be in a range [0,1]");
        $this->weight = $weight;
    }

    function get_weight()
    {
        return $this->weight;
    }

    function call_membership_function($value)
    {
        return $this->mem_function->call($value);
    }
}