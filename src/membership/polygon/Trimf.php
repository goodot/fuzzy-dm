<?php

namespace ketili\membership\polygon;



use ketili\membership\MembershipFunction;


class Trimf implements MembershipFunction
{
    public $a, $b, $c;

    function __construct($a, $b, $c)
    {
        $is_correct = $a <= $b && $b <= $c;
        if (!$is_correct)
            throw new \Exception("Incorrect abc");
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function call($x)
    {
        $x = (float)$x;
        $a = (float)$this->a;
        $b = (float)$this->b;
        $c = (float)$this->c;


        if ($x < $a)
            return 0;
        else if ($x >= $a && $x <= $b)
            return ($x - $a) / ($b - $a);
        else if ($x > $b && $x <= $c)
            return ($b - $x) / ($c - $b) + 1;
        else return 0;
    }
}