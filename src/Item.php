<?php

namespace ketili;


class Item
{
    public $identifier;
    public $feature_values;

    function __construct($identifier, $feature_values)
    {
        if (!gettype($feature_values) == "array")
            throw new \Exception("feature_values should be array");
        $this->identifier = $identifier;
        $this->feature_values = $feature_values;



    }
}