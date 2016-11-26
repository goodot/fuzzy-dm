<?php
include "models.php";


define("PLAYER", "player");
$membership_function = new Trimf(160, 215, 240);

//var_dump($membership_function);

$feature = new Feature("სიმაღლე", $membership_function, 198);
//var_dump($feature);
$ginobili = new Item("Manu Ginobili", array($feature), new ArithmeticMean());
//var_dump($ginobili);
echo $ginobili->aggregate();
//$player1 = new Item(PLAYER, )