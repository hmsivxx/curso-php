<?php
session_start();
require 'config.php';
//$request_uri = filter(INPUT_SERVER, 'REQUEST_URI'); // filter on php instead of filter on .htaccess file
//echo "URL: {$_GET['url']}";

spl_autoload_register(function($class){
    if (file_exists('controllers/'.$class.'.php')) {
        require 'controllers/'.$class.'.php';
    }
    if (file_exists('models/'.$class.'.php')) {
        require 'models/'.$class.'.php';
    }
    if (file_exists('core/'.$class.'.php')) {
        require 'core/'.$class.'.php';
    }
});

$core = new Core();
$core->run();
