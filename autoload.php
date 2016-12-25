<?php

spl_autoload_register(function($class){
   require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . $class . '.php';

});
spl_autoload_register(function($class){
   require_once $class.'.php';

});