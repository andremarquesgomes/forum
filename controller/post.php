<?php
require("model/posts.php");

$postsModel = new Posts(); 


// white list das acções aceites 
$actions = ["create", "reply"]; 


if(isset($_GET["action"]) && in_array($_GET["action"], $actions) ) {

    $action = $_GET["action"]; 

    if(!isset($_SESSION["user_id"])){
        header("Location: ?controller=access&action=login"); 
        exit;
    }

    if(isset($_GET["parent_id"])){
       $post = $postsModel->getThread($_GET["parent_id"])[0]; 
    }

    if(isset($_POST["send"])){
     $post_id = $postsModel->{$action}( $_POST );
     
     if( !empty($post_id)) {
        // redirecionar o utilizador para o post que criou 
        header("Location: index.php?controller=post&post_id=".$post_id); 
      }
    }


    require("view/" .$action. ".php");
}
else {
    if(!isset($_GET["post_id"])){
        header("HTTP/1.1 400 Bad Request");
        die("400 Bad Request"); 

    }
    $posts =  $postsModel->getThread($_GET["post_id"]); 
    
    
    
    require("view/post.php"); 
}


// ver miniframeworks PHP
// slim
// lumen

// ionic

// composer laravel e nodejs