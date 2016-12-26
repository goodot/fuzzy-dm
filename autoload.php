<?php

function __autoload($class)
{

    if(file_exists($class. '.php')){

        require_once $class . '.php';
    }
//    $directories = array(
//        'models',
//        'models/aggregation',
//        'models/membership'
//    );
//    foreach ($directories as $directory) {
//        if (file_exists($directory . $class) . '.php') {
//            echo $class;
//            require_once($directory . $class . '.php');
//            return;
//        }
//    }
}



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