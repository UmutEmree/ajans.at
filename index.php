<?php

ini_set('display_errors','On');
 
function __autoload($className){
    include_once 'inc/libs/' . $className . '.php';
}
 
include_once 'app/config/config.php';

 
$boot = new Bootstrap();

