<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title> saved </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
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
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $position_number = $_POST['position_number'];
    $age = $_POST['age'];
    $swim_id = $_POST['swim_id'];
    $ok = true;

    if(empty($firstName)){
        echo "First name is required";
        $ok = false;
    }
    if(empty($lastName)){
        echo "Last name is required";
        $ok = false;
   }
   if(empty($position_number)){
       echo "Position is required";
       $ok = false;
   }
   else if(is_numeric($position_number)== false){
       echo "Positon is invalid";
       $ok = false;
   }
  
   if($ok == true){

            $conn = new PDO('mysql:host=172.31.22.43;dbname=Priya200447419', 'Priya200447419', 'EcuOYoEEiR');

        if(empty($swim_id)){
            $sql = "INSERT INTO swim (firstName,lastName,position_number,age)  VALUES (:firstName,:lastName,:position_number,:age)";
        }
        else
        {
            $sql = "UPDATE swim SET firstName = :firstName, lastName = :lastName, position_number = :position_number, age = :age WHERE swim_id = :swim_id";
        }
            
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':lastName',$lastName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':position_number',$position_number,PDO::PARAM_INT );
            $cmd->bindParam(':age', $age, PDO::PARAM_INT) ;
            // fill the swim_id if we have one
            if (!empty($swim_id)) {
                $cmd->bindParam(':swim_id', $swim_id, PDO::PARAM_INT);
            }
            $cmd->execute();
            $conn = null;
            echo "NEW TEAM MEMBER ADDED";

            header('location:swim.php');


   }
    
    ?>
    </br>
  
    </br>
    <a href ="swim.php">Click to view players list</a>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>