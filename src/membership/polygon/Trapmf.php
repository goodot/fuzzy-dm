<?php
/**
 * Created by PhpStorm.
 * User: godot
 * Date: 10/19/18
 * Time: 9:01 PM
 */

namespace ketili\membership\polygon;

use ketili\membership\MembershipFunction;


class Trapmf implements MembershipFunction
{
    public $a, $b, $c, $d;

    /**
     * Trapmf constructor.
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @throws \Exception
     */
    public function __construct($a, $b, $c, $d)
    {
        $is_correct = $a <= $b && $b <= $c && $c <= $d;
        if (!$is_correct)
            throw new \Exception("Incorrect abc");
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }

    function call($x)
    {
        $x = (float)$x;
        $a = (float)$this->a;
        $b = (float)$this->b;
        $c = (float)$this->c;
        $d = (float)$this->d;

        if ($x <= $a)
            return 0;
        else if ($a < $x && $x <= $b)
            return ($x - $a) / ($b - $a);
        else if ($b < $x && $x <= $c)
            return 1;
        else if ($c < $x && $x <= $d)
            return ($d - $x) / ($d - $c);
        return 0;

    }
}
