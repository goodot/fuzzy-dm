<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godot
 * Date: 2/1/17
 * Time: 7:33 PM
 * To change this template use File | Settings | File Templates.
 */

namespace models\membership;

class S implements  MembershipFunction{
    public $a;
    public $b;

    function __construct($a, $b)
    {
        if($a>=$b)
            throw new \Exception("a should be greater than b");
        if(!is_numeric($a) || !is_numeric($b))
            throw new \Exception("both a and b must be numeric");

        $this->a = $a;
        $this->b = $b;

    }
    function call($x)
    {
        if($x < $this->a)
            return 0;
        if($x > $this->b)
            return 1;

        return (1./2) + 1./2*cos((($x-$this->b)*M_PI)/($this->b - $this->a));

    }
}