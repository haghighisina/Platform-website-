<?php session_start();
//include config.php to access the database functionality
require_once __DIR__."/config.php";

//use spl_autoload_register class to include the file
// whenever instantiate the class with the help of an anonymous function
spl_autoload_register(function ($class_name) {
    require_once __DIR__."/../library/".$class_name.".php";
});




