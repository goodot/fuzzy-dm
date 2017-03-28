<?php
/**
 * Created by PhpStorm.
 * User: g.jobadze
 * Date: 28/03/17
 * Time: 5:15 PM
 */

namespace ketili\membership;


class Threshold implements MembershipFunction
{
    private $threshold;
    public function __construct($threshold)
    {
        $this->threshold = $threshold;
    }

    public function call($x)
    {
        if($x > $this->threshold)
            return 1;
        else
            return 0;
    }
}