<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Saving your registration</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
</head>
<body>
    <?php
    //get the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;
    
    // connecting to the database
    $conn = new PDO('mysql:host=172.31.22.43;dbname=Priya200447419', 'Priya200447419', 'EcuOYoEEiR');

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


    ?>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>