<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godot
 * Date: 2/1/17
 * Time: 8:01 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ketili\membership\sigmoid;


use ketili\membership\MembershipFunction;

abstract class Sigmoid implements MembershipFunction{
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
}