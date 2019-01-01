<?php

include 'autoload.php';

use ketili\Analyzer;
use ketili\Feature;
use ketili\Item;







$aggregationFunction = new \ketili\aggregation\WeightedArithmeticMean();
$height = new Feature($identifier="Height", new \ketili\membership\polygon\Trimf(160, 190, 203));
$age = new Feature("Age", new \ketili\membership\sigmoid\SNonLinear(10, 30));
$seasons = new Feature("Seasons", new \ketili\membership\polygon\Trimf(0, 5, 20));


$features = array($height, $age, $seasons);



$items = array(
    new Item("Manu Ginobili", array("Height"=>198, "Age"=>39, "Seasons"=>15)),
    new Item("Tony Parker", array("Height"=>188, "Seasons"=>15, "Age"=>34)),
    new Item("JJ Barea", array("Height"=> 183, "Age"=>32, "Seasons"=>10)),
    new Item("Sergio Rodriguez", array("Height"=>191, "Age"=>30, "Seasons"=>5)) );


$analyzer = new Analyzer($features, $items, $aggregationFunction);


$analyzer->analyze();

var_dump($analyzer->sort());

