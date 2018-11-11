<?php

namespace ketili;
use ketili\membership\MembershipFunction;

class Feature
{
    public $identifier;
    public $mem_function;
    public $weight = 1;


    function __construct($identifier, $mem_function, $weight = 1)
    {
        if ($mem_function instanceof MembershipFunction) {
            $this->identifier = $identifier;
            $this->mem_function = $mem_function;
        } else {
            throw new \Exception("mem_functon should be MembershipFunction");
        }

    }


    public function set_weight($weight)
    {
        if($weight >1 || $weight < 0)
            throw new \Exception("weight must be in a range [0,1]");
        $this->weight = $weight;
    }

    public function get_weight()
    {
        return $this->weight;
    }

    public function call_membership_function($value)
    {
        return $this->mem_function->call($value);
    }
}