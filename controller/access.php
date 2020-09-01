<?php
require("model/users.php");

$usersModel = new Users(); 

$actions = ["login","register","logout"];

if(isset($_GET["action"]) && in_array($_GET["action"],$actions)){
    $action = $_GET["action"]; 

    if(isset($_SESSION["user_id"]) && ($action === "login" || $action === "register")){

        header("Location: ./"); 
    }

    if(isset($_POST["send"]) || $action === "logout") {
       $success = $usersModel->{$action}($_POST);
       
      
       if($success) {
           if($action === "register") {
               header("Location: ?controller=access&action=login");
            }
            else{
            }
            header("Location: ./"); 
            exit;
        }
    }
    
    require("view/" .$action. ".php"); 

}