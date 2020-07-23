<?php

    // authentication check
    require_once('auth.php');
    //insert header
    require_once('header.php');
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $position_number = $_POST['position_number'];
    $age = $_POST['age'];
    $swim_id = $_POST['swim_id'];
    $ok = true;
    $photo = null;

    if(!empty($_FILES['photo']))
    {
        $photo = $_FILES['photo']['name'];

        if ($_FILES['photo']['type'] != 'image/jpeg'){
            echo "invalid photo <br/>";
            $ok = false;

        }
        else{
            //valid photo
            session_start();

            $final_name = session_id() . '_' . $photo;
            $tmp_name = $_FILES['photo']['tmp_name'];
            //move_uploaded_file($temp_name,"images/$final_name");
            move_uploaded_file($tmp_name,"uploads/$final_name");
            $ok = true;
            echo "photo saved";
        }

    }

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

    require('db.php');
    try
    {

        if(empty($swim_id)){
            $sql = "INSERT INTO swim (firstName,lastName,position_number,age,photo)  VALUES (:firstName,:lastName,:position_number,:age,:photo)";
        }
        else
        {
            $sql = "UPDATE swim SET firstName = :firstName, lastName = :lastName, position_number = :position_number, age = :age,photo=:photo WHERE swim_id = :swim_id";
        }
            
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':lastName',$lastName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':position_number',$position_number,PDO::PARAM_INT );
            $cmd->bindParam(':age', $age, PDO::PARAM_INT) ;
            $cmd->bindParam(':photo', $final_name, PDO::PARAM_STR, 100);

            // fill the swim_id if we have one
            if (!empty($swim_id)) {
                $cmd->bindParam(':swim_id', $swim_id, PDO::PARAM_INT);
            }
            $cmd->execute();
            $conn = null;
            echo "NEW TEAM MEMBER ADDED";

            header('location:swim.php');
        

    }
    catch(Exception $e){
        header('location:error.php');
    }
   }
    
    ?>
    </br>
  
    </br>
    <a href ="swim.php">Click to view players list</a>
<?php require_once('footer.php');
?>