<?php
  // embedding header
 // setting title
 $page_title = "Register";

 require_once('header.php');

 ?>
<h3> User Registration </h3>

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
    <?php
require_once('footer.php');
?>