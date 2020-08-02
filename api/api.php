<?php
// connect
require_once('../db.php');


//now we need to run a query to fetch the movies then output the data in json format
//AFTER we connect but BEFORE we close the PHP tags, add:
// get movies
$sql = "SELECT * FROM swim";
$cmd = $conn->prepare($sql);
if (!empty($_GET['firstName'])) {
    $sql .= " WHERE firstName = :firstName";
    $cmd = $conn->prepare($sql);
   
    $firstName = $_GET['firstName'];
    $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
   }
   else {
    $cmd = $conn->prepare($sql);
   }
$cmd->execute();

$swim = $cmd->fetchAll(PDO::FETCH_ASSOC);

// convert the movies data to a json object and output it
$json_obj = json_encode($swim);

echo $json_obj;

// disconnect
$conn = null;
?>