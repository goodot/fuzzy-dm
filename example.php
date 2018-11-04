<?php
use ketili\aggregation\ArithmeticMean;
use ketili\Analyzer;
use ketili\Feature;
use ketili\Item;
use ketili\membership\MembershipFunction;
use ketili\membership\polygon\Trapmf;
use ketili\membership\polygon\Trimf;

include 'autoload.php';

//membership function for assists per game
class Assists implements MembershipFunction
{
    function call($x)
    {
        $x = (float)$x;

        return ($x - 1) / ($x - 0.2);

    }
}

//membership function for three point percentage
class TPP implements MembershipFunction
{

    function call($x)
    {
        $x = (float)$x;

        return ($x - 20) / ($x - 19);
    }
}



/* without weights (priorities) */

//aggregate function
$aggregateFunction = new ArithmeticMean();

//features
$age = new Feature('age', new Trapmf(18, 24, 26, 35));
$nbaYears = new Feature('nba_years', new Trimf(0, 5, 13));
$cost = new Feature('cost', new Trimf(0, 13, 20));
$height = new Feature('height', new Trimf(160, 188, 205));
$assistsPerGame = new Feature('apg', new Assists());
$threePointPercentage = new Feature('3pp', new TPP());

$features = array(
    $age,
    $nbaYears,
    $cost,
    $height,
    $assistsPerGame,
    $threePointPercentage
);

$arr = array($age->call_membership_function(31),
    $nbaYears->call_membership_function(0),
    $cost->call_membership_function(12.2),
    $height->call_membership_function(196),
    $assistsPerGame->call_membership_function(4.6),
    $threePointPercentage->call_membership_function(37.9));


echo array_sum($arr)/count($arr);

//guards

$guards = array(
    new Item($identifier = 'Milos Teodosic',
        $feature_values = array(
            'age' => 31,
            'height' => 196,
            '3pp' => 37.9,
            'apg' => 4.6,
            'nba_years' => 0,
            'cost' => 12.2
        )),
    new Item($identifier = 'Isaiah Thomas',
        $feature_values = array(
            'age' => 29,
            'height' => 175,
            '3pp' => 36.1,
            'apg' => 5.1,
            'nba_years' => 4,
            'cost' => 19.8
        )),
    new Item($identifier = 'JJ Barea',
        $feature_values = array(
            'age' => 33,
            'height' => 182,
            '3pp' => 35.4,
            'apg' => 3.9,
            'nba_years' => 11,
            'cost' => 9.2
        )),
    new Item($identifier = 'Ricky Rubio',
        $feature_values = array(
            'age' => 27,
            'height' => 193,
            '3pp' => 32.5,
            'apg' => 7.9,
            'nba_years' => 6,
            'cost' => 16
        )),
    new Item($identifier = 'Alexey Shved',
        $feature_values = array(
            'age' => 29,
            'height' => 198,
            '3pp' => 30.6,
            'apg' => 2.5,
            'nba_years' => 3,
            'cost' => 8
        ))
);


//analyze

$analyzer = new Analyzer($features, $guards, $aggregateFunction);

$analyzer->analyze();

echo json_encode($analyzer->sort());








