<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Menu</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    <?php
        session_start();

        // check if there is a user identity stored in the session object
        if (empty($_SESSION['user_id'])) {
        // if there is no user_id in the session, redirect the user to the login page
        header('location:login.php');
        exit();
        }
    ?>
<main class="container">

   <h1>COMP1006 Application</h1>
   
        <nav >
            <ul>
                <li><a href="swim.php">Home</a></li>
                <li><a href="swim_addnew.php">Add New Player</a></li>
                <li><a href="register.php">Register user</a></li>
                <li><a href="login.php">login</a></li>
            </ul>
        </nav>

   

</main>

<script src="js/bootstrap.min.js"></script>
</body>
</html>