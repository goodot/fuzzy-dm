<?php

function __autoload($class) {
    $parts = explode('\\', $class);
    $class_name = end($parts). ".php";

        	    $directories = array(
        	        'models/',
        	        'models/aggregation/',
        	        'models/membership/'
        	    );
        	    foreach ($directories as $directory) {
        	        if (file_exists($directory . $class_name)) {
        	            require_once($directory . $class_name);
        	            return;
        	        }
        	    }




}

//$string = htmlspecialchars('models\aggregation\ArithmeticMean');
//$pieces = explode(htmlspecialchars('\'), $string);
//var_dump($pieces);


//<?php
//    function __autoload($class_name)
//    {
//        //class directories
//        $directorys = array(
//            'classes/',
//            'classes/otherclasses/',
//            'classes2/',
//            'module1/classes/'
//        );
//
//        //for each directory
//        foreach($directorys as $directory)
//        {
//            //see if the file exsists
//            if(file_exists($directory.$class_name . '.php'))
//            {
//                require_once($directory.$class_name . '.php');
//                //only require the class once, so quit after to save effort (if you got more, then name them something else
//                return;
//            }
//        }
//    }