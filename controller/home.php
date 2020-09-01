<?php 
   
require("model/posts.php");
   

$postsModel = new Posts();

$posts = $postsModel->getList(); 

require("view/home.php"); 

