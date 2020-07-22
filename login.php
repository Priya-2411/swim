    <?php

        //header
        require_once('header.php');

        // access the current session

        session_start();
        if(isset($_GET['invalid']))
        {
            echo '<div class="alert alert-danger">Invalid Login Credentials </div>';
        }

    ?>
    <head>
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
        <body>

        <div class = "form-box"> 
        <h1> Login  </h1>

        <form method="post" action= "validate.php">
        <div class="input-box">
            <i class="fa fa-envelope-o" ></i>
            <!-- <label for="Email" class="col-sm-2">Email : </label></br> -->
            <!-- giving autofocus to the input, making it clear where to start for the user -->
            <!-- using placeholder giving the user an idea what to feed in in the textbox-->
            <!-- using email attribute allows mobile users have an appropriate keybord and also perform email validations  -->
            <input name= "username" id="username" type = "email" required autofocus="Email" placeholder="Email" autocomplete="on">
            
        </div>
        <div class="input-box">
             <i class="fa fa-key" ></i>
            <!-- <lable for="password" class="col-sm-2">Password :</lable></br> -->
            <!-- displaying the show password feature -->
            <!-- using type password ...browser offers user to save the password for future use-->
            <!-- using current password suggests user to autofill the passowrd section from that has already been stored -->
            <input type="password" name="password" id="password" required placeholder="Password" autocomplete="current-password">
            <span class = "eye" onclick="myFunction()">
            <i id="hide1" class="fa fa-eye" ></i>
            <i id="hide2" class="fa fa-eye-slash" ></i>
            </span>
        </div>
        <button class="login-btn">Login</button>

           <script>
                function myFunction(){
                    var x = document.getElementById("password");
                    var y = document.getElementById("hide1");
                    var z = document.getElementById("hide2");

                    if(x.type == 'password'){
                        x.type= "text";
                        y.style.display="block";
                        z.style.display="none";
                    }
                    else
                    {
                        x.type= "password";
                        y.style.display="none";
                        z.style.display="block";
                    }
                }

           </script>
                

        </form>
        </div>
        </body>
   <?php require_once('footer.php');


    

