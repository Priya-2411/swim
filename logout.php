<?php 
// accessing the current session
    session_start();

// remove all session varaibales

    session_unset();

// destroy the session

    session_destroy();

// redirect login

    header('location:login.php');


  ?>
