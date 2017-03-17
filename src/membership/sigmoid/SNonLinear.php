<?php
/**
 * Created by JetBrains PhpStorm.
 * User: godot
 * Date: 2/1/17
 * Time: 7:33 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ketili\membership\sigmoid;

class SNonLinear extends   Sigmoid{
    function call($x)
    {
        if($x < $this->a)
            return 0;
        if($x > $this->b)
            return 1;

        return (1./2) + 1./2*cos((($x-$this->b)*M_PI)/($this->b - $this->a));

    }
}