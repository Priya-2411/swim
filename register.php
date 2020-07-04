<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>User Registration</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    
</head>
<body>
<h1> User Registration </h1>

    <form method = "post" action = "save-registration.php">
        <fieldset class ="form-group">
            <lable for = "username"  class="col-sm-2">Email :* </lable>
            <input name= "username" id = "username" required type = "email">
            
        </fieldset>
        <fieldset class ="form-group">
            <lable for="password"  class="col-sm-2">Password :* </lable>
            <input name = "password" type = "password" required>
        </fieldset>
        <fieldset class ="form-group">
            <lable for="confirm" class="col-sm-2"> Confirm Password : * </lable>
            <input type = "password" name = "confirm" required>
        </fieldset>
        <button class = "btn btn-success col-sm-offset-2">Register</button>
    </form>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>