<?php

include "models/model-loader.php";


//define("PLAYER", "player");
//$membership_function = new Trimf(160, 215, 240);
//
////var_dump($membership_function);
//
//$feature = new Feature("სიმაღლე", $membership_function, 198);
////var_dump($feature);
//$ginobili = new Item("Manu Ginobili", array($feature, new Feature("ასაკი", new Trimf(10, 28, 45), 39)), new ArithmeticMean());
//var_dump($ginobili);
//echo $ginobili->aggregate();
//$player1 = new Item(PLAYER, )





//$feature1 = new Feature("ასაკი", new Trimf(10, 28, 45));
//$feature2 = new Feature("სიმაღლე", new Trimf(160, 215, 240));
//$feature3 = new Feature("NBA-ში ჩატარებული სეზონების რაოდენობა", new Trimf(0, 10, 20));
//
//$features = array($feature1, $feature2, $feature3);
//
//$item1 = new Item("მანუ ჯინობილი", array(39, 198, 15));
//$item2 = new Item("ტონი პარკერი", array(35, 188, 16));
//$item3 = new Item("კავაი ლეონარდი", array(25, 201, 3));
//$item4 = new Item("ზაზა ფაჩულია", array(32, 211, 13));
//
//$items = array($item1, $item2, $item3, $item4);
//
//$aggregation_function = new ArithmeticMean();
//
//
//$analyzer = new Analyzer($features, $items, $aggregation_function);
//
//$results = $analyzer->analyze();
//
//echo json_encode($results, JSON_UNESCAPED_UNICODE);


//$test_array = array(2,3,55);
//$geo_mean = new GeometricMean();
//var_dump($geo_mean->call($test_array));

class Test{
    private $a1;
    private $a2;

    function __construct($a)
    {
        $this->a1 = $a;
    }
    function set_a2($a)
    {
        $this->a2 = $a;
    }
    function get_a2()
    {
        return $this->a2;
    }
}
