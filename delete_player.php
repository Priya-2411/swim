<?php ob_start(); ?>
    
<?php
session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
// if there is no user_id in the session, redirect the user to the login page
header('location:login.php');
exit();
}
// capture the selected swim_id from the url and store it in a variable with the same name
$swim_id = $_GET['swim_id'];

// connect
$conn = new PDO('mysql:host=172.31.22.43;dbname=Priya200447419', 'Priya200447419', 'EcuOYoEEiR');

// set up the SQL command
$sql = "DELETE FROM swim WHERE swim_id = :swim_id";

// create a command object so we can populate the swim_id value, the run the deletion
$cmd = $conn->prepare($sql);
$cmd->bindParam(':swim_id', $swim_id, PDO::PARAM_INT);
$cmd->execute();





header('location:swim.php');
?>

<?php ob_flush(); ?>

