<?php



spl_autoload_register("autoload");

function autoload($class) {
    $parts = explode('\\', $class);
    $class_name = end($parts). ".php";

    $directories = array(
        'src/',
        'src/aggregation/',
        'src/membership/',
        'src/membership/sigmoid/',
        'src/membership/polygon/'
    );
    foreach ($directories as $directory) {
        if (file_exists($directory . $class_name)) {
            require_once($directory . $class_name);
            return;
        }
    }




}