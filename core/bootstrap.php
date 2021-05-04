<?php


// load configuration and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

//auto load classes
function autoloader($class_name)
{
    if (file_exists(ROOT . DS . 'core' . DS . $class_name . '.php')) {
        require_once(ROOT . DS . 'core' . DS . $class_name . '.php');
    } elseif (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $class_name . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $class_name . '.php');
    } elseif (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $class_name . '.php')) {
        require_once(ROOT . DS . 'app' . DS . 'models' . DS . $class_name . '.php');
    }else{
        dd('class not found ');
    }
}
spl_autoload_register('autoloader');

// Route the request
Router::route($url);