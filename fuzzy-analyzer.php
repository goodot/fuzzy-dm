<?php
require "models/model-loader.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $json = file_get_contents('php://input');
    if (isJson($json)) {
        $data = json_decode(file_get_contents('php://input'), true);
        $data = $data['data'];

        $name = $data['name'];
        $aggregation = $data['aggregation'];

        $features_json = $data['features'];
        $items_json = $data['items'];


        $features = array();
        $items = array();

        foreach($features_json as $feature_json){
            $mem_function = NULL;
            if(array_key_exists("trimf", $feature_json)){
                $trimf_json = $feature_json['trimf'];
                $a = $trimf_json['a'];
                $b = $trimf_json['b'];
                $c = $trimf_json['c'];

                $mem_function = new Trimf($a, $b, $c);
            }
            $feature = new Feature($feature_json['identifier'], $mem_function);
            array_push($features, $feature);
        }

        foreach($items_json as $item_json){
            $identifier = $item_json['identifier'];
            $feature_values = $item_json['feature_values'];

            $item = new Item($identifier, $feature_values);

            array_push($items, $item);
        }

        $aggregation_function = get_aggregation_function_by_key($aggregation);

        $analyzer = new Analyzer($features, $items, $aggregation_function);
        $results = $analyzer->analyze();

        echo json_encode($results, JSON_UNESCAPED_UNICODE);





    }
    else{
        //TODO return not_json response
        echo "not json";
    }

}
else{
    //TODO return not_post response
    echo "not post";
}