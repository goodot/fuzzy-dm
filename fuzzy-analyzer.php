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
        try{
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

        $response = new SuccessResponse();
        $response->status = ResponseConstants::success_message;
        $response->status_code = ResponseConstants::success_code;
        $response->name = $name;
        $response->results = $results;
        $response->suggested_item = $analyzer->suggest_best();

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        catch(Exception $e){
            $error_response = new ErrorResponse();
            $error_response->status_code = ResponseConstants::not_json_error_code;
            $error_response->status_code = ResponseConstants::not_json_error_message;
            $error_response->error_message = $e->getMessage();

            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }





    }
    else{
        $error_response = new ErrorResponse();
        $error_response->status_code = ResponseConstants::not_json_error_code;
        $error_response->status_code = ResponseConstants::not_json_error_message;

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

}
else{
    $error_response = new ErrorResponse();
    $error_response->status_code = ResponseConstants::not_post_error_code;
    $error_response->status_code = ResponseConstants::not_post_error_message;

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}