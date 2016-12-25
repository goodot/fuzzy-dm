<?php

spl_autoload_register(function($class){
    $parts = explode('\\', $class);
   include_once "models".  DIRECTORY_SEPARATOR . 'aggregation' . DIRECTORY_SEPARATOR . end($parts) . '.php';

});
spl_autoload_register(function($class){
    $parts = explode('\\', $class);
    include_once "models".  DIRECTORY_SEPARATOR . 'membership' . DIRECTORY_SEPARATOR . end($parts) . '.php';

});



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