<?php

 // check authentication
 require_once('auth.php');
 
$page_title = "Gallery";
require_once('header.php');

//connect database

require('db.php');

// select photos
$sql = "SELECT swim_id , photo FROM swim WHERE photo is not null";
 //run the query
 $cmd = $conn->prepare($sql);
 $cmd->execute();
 $swim = $cmd->fetchAll();

 foreach($swim as $one){
     echo '<div class = "col-sm-3 col-md-4" > 
     <a href ="swim_addnew.php?swim_id=' .$one['swim_id'] . ' " title="Swim Team details "> 
     <img height="297px" width="200px" class = "thumbnail" src ="uploads/' . $one['photo'] . '" title = "'.$swim['title']. '" />
     </a> </div>';
 }

$conn = null;



require_once('footer.php');
?>