<?php

session_start();

$controllers = ["home", "post", "access"]; 

$controller = "home"; 


if(isset($_GET["controller"]) && in_array($_GET["controller"], $controllers)){
    $controller = $_GET["controller"]; 
}

require("controller/".$controller.".php"); 

?>