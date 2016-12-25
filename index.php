<?php

require_once "autoload.php";
use models\aggregation;
use models\membership;

$aggregation_function = new aggregation\ArithmeticMean();

$aggregation_function->call(array(12, 15, 16));