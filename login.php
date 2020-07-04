<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
</head>
<body>
    <h1> Login Form    </h1>
    <?php

        // access the current session

        session_start();
        if(isset($_GET['invalid']))
        {
            echo '<div class="alert alert-danger">Invalid Login Credentials </div>';
        }

    ?>


        <form method="post" action= "validate.php">
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">User Name : </label>
            <input name= "username" id="username" required>
            
        </fieldset>
        <fieldset class="form-group">
            <lable for="password" class="col-sm-2">Password :</lable>
            <input type="password" name="password" id="password" required>
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Login</button>

        </form>
   


    

<script src="js/bootstrap.min.js"></script>
</body>
</html>