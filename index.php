<?php

require_once "autoload.php";
use models\aggregation\ArithmeticMean;
use models\membership\Trimf;

$aggregation_function = new \models\aggregation\ArithmeticMean();
$weighted_aggregation_function = new \models\aggregation\WeightedArithmeticMean();
var_dump(class_implements($weighted_aggregation_function));
var_dump($weighted_aggregation_function instanceof \models\aggregation\AggregationFunction);
//$trimf = new Trimf(1, 2, 25);

$height = new \models\Feature("Height", new Trimf(160, 190, 203));
$height->set_weight(0.79);

$age = new \models\Feature("Age", new Trimf(16, 25, 30));
$age->set_weight(0.81);

$seasons = new \models\Feature("Seasons", new Trimf(0, 5, 20));
$seasons->set_weight(0.61);


//$features = array(
//    new \models\Feature("Height", new Trimf(160, 190, 203)),
//    new \models\Feature("Age", new Trimf(16, 25, 30)),
//    new \models\Feature("Seasons", new Trimf(0, 5, 20))
//);

$features = array(
    $height,
    $age,
    $seasons
);

$items = array(
    new \models\Item("Manu Ginobili", array(198, 39, 15)),
    new \models\Item("Tony Parker", array(188, 34, 16)),
    new \models\Item("JJ Barea", array(183, 32, 10)),
    new \models\Item("Sergio Rodriguez", array(191, 30, 5))

);

$analyzer = new \models\Analyzer($features, $items, $weighted_aggregation_function);
$result = $analyzer->analyze();

var_dump($result);
var_dump($analyzer->suggest_best());


