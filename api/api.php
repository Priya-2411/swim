<?php
// connect
require_once('../db.php');


//now we need to run a query to fetch the movies then output the data in json format
//AFTER we connect but BEFORE we close the PHP tags, add:
// get movies
$sql = "SELECT * FROM movies";
$cmd = $conn->prepare($sql);
if (!empty($_GET['title'])) {
    $sql .= " WHERE title = :title";
    $cmd = $conn->prepare($sql);
   
    $title = $_GET['title'];
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
   }
   else {
    $cmd = $conn->prepare($sql);
   }
$cmd->execute();

$movies = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert the movies data to a json object and output it
$json_obj = json_encode($movies);

echo $json_obj;

// disconnect
$conn = null;
?>