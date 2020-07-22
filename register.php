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
        <input type="hidden" id="recaptchaResponse" name = "recaptchaResponse" />
    </form>

  <!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lf1RLIZAAAAAPIox-bbAds1ZpajlrUNJ-pmhrIs"></script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Lf1RLIZAAAAAPIox-bbAds1ZpajlrUNJ-pmhrIs', {action: 'register'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              // add recaptcha response to the new hidden firld on the form so it gets submitted to the server
              var recaptchaResponse = document.getElementById('recaptchaResponse'); 
              recaptchaResponse.value = token;
              
          });
        });
      }
  </script> -->
    <?php
require_once('footer.php');
?>