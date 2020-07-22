    <?php
require_once('header.php');
    //get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;
    
    // connecting to the database
    require('db.php');

    try{
    // checking if the username already exists

            $check_username = "SELECT username FROM users WHERE username = :username";
            $check = mysqli_query($conn,$check_username);
            $result = mysqli_num_rows($check);

            if($result >0){
                echo  "user already taken. Please choose another one";
            
                $ok = false;
            }

            if(empty($username)){
                echo "username is required";
                $ok = false;
            }
            else
            {

            }
            if(empty($password)){
                echo "Password required";
                $ok = false;
            }
            if($password != $confirm){
                echo "passwords do not match";
                $ok = false;
            }
           /* // recaptcha validation
            $apiUrl = "https://www.google.com/recaptcha/api/siteverify"; // from api docs
            $secrete = "6Lf1RLIZAAAAAMA3gHIohHn8UYRgCNh6CG9E7zN3"; // from api console settings
            $response = $_POST['recaptchaResponse']; // from the hidden input fields on the register form

            // make api call and parse the response
            $apiResponse = file_get_contents($apiUrl . "?secrete=$secrete&response=$response");
            
            // decode the api response
            $recaptchaResponse = json_decode($apiResponse);

            // determine if recaptcha shows bot(0.0) or user(1.0)

            if($recaptchaResponse->score < 0.5){
                echo "Are you human ?";
                $ok = false;
            } */




            if($ok){

            //hash the password
            $password = password_hash($password , PASSWORD_DEFAULT);
            
            //setup and execute the insert
        
            $sql = "INSERT INTO users (username, password) VALUES(:username,:password)";
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':username',$username, PDO::PARAM_STR , 50);
            $cmd->bindParam(':password',$password,PDO::PARAM_STR , 255);
            $cmd->execute();


            //disconnect
            $conn = null;
                //redirect to login page when successful
            header('location:login.php');
            }

   }
   catch(Exception $e)
   {
    header('location:error.php');
   }

require_once('footer.php');
    ?>
