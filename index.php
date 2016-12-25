<?php

require_once "autoload.php";
use models\aggregation\ArithmeticMean;
use models\membership\Trimf;

$aggregation_function = new ArithmeticMean();

var_dump($aggregation_function->call(array(12, 15, 16)));

$trimf = new Trimf(1, 2, 25);

var_dump($trimf);