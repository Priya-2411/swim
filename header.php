<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo $page_title; ?></title>
    <link rel= "stylesheet" href = "css/bootstrap.min.css"/>
    <link rel = "stylesheet" href = "css/bootstrap-theme.min.css"/>
   
    
</head>
<body>

    <nav class = "navbar">
        <a href="menu.php" title = "SWIM TEAM" class= "navbar-brand">Home </a>
        <ul class= "nav navbar-nav">
         <!-- show private or public links depending on if the user has logged in or not -->
            <?php 
            if (!empty($_SESSION['user_id'])){ ?>
            
            <li> <a href = "swim_addnew.php" title="Add new"> Add new </a> </li>
            <li> <a href = "swim.php" title="Swim"> Swim-Team </a> </li>
            <li> <a href = "logout.php" title="Logout"> Logout </a> </li>
            
            <?php
             }

            else { ?>
            <li> <a href= "register.php" title="Register"> Register </a> </li>
            <li> <a href= "login.php" title="login"> Login </a> </li>
            <?php } ?>
        </ul>

    </nav>
   
