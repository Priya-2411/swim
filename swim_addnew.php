<?php

   // authentication check
   require_once('auth.php');
   //insert header
   require_once('header.php');


$firstName = null;
$lastName = null;
$position_number = null;
$age = null;
$swim_id = null;
$photo = null;


if (empty($_GET['swim_id']) == false) 
   $swim_id = $_GET['swim_id'];
   
   // connect
   require('db.php');
   
   // write the sql query
   $sql = "SELECT * FROM swim WHERE swim_id = :swim_id";
   
   // execute the query and store the results
   $cmd = $conn->prepare($sql);
   $cmd->bindParam(':swim_id', $swim_id, PDO::PARAM_INT);
   $cmd->execute();
   $swim = $cmd->fetch();
   
   // populate the fields for the selected swim from the query result
   $firstName = $swim['firstName'];
    $lastName = $swim['lastName'];
    $position_number = $swim['position_number'];
    $age = $swim['age'];
    $photo = $swim['photo'];
   
   
  

?>
<form method = "post" action = "save_swim.php" enctype="multipart/form-data">

         <form method = "post" action = "save-registration.php">
               <fieldset class ="form-group">
                     <lable for="firstName" class="col-sm-2"> Enter  First Name  :* </lable>
                     <input type = "text" name="firstName" id="firstName" required value="<?php echo $firstName; ?>">
                     
               </fieldset>
               <fieldset class ="form-group">
                     <lable for="lastName" class="col-sm-2"> Enter last name :* </lable>
                     <input type ="text" name= "lastName" id="lastName" required value = "<?php echo $lastName; ?>">
               </fieldset>
               <fieldset class ="form-group">
                     <lable for = "position_number" class="col-sm-2">Enter position number :* </lable>
                     <input name="position_number" id="position_number" required value = "<?php echo $position_number; ?>">
               </fieldset>
               <fieldset class ="form-group">
                     <lable for = "age" class="col-sm-2">Enter age of Swimmer :*     </lable>
                     <select id = "age" name = "age" >
                     <option >--Select--</option>
                  
                     <?php
                     try
                     {
                        $sql = "SELECT * FROM age_group ORDER BY age";
                        require('db.php');
                        $cmd = $conn->prepare($sql);
                        $cmd->execute();
                        $age_group = $cmd->fetchAll();
                        
                        // add @ age to the drop down
                        foreach ($age_group as $one){
                           if($one ['age'] == $age){
                              echo "<option selected>  {$one['age'] } </option>";
                           }
                           else
                           echo "<option> {$one['age']}  </option>";
                           
                        }
                        $conn= null;
                     }
                     catch (Exception $e)
                     {
                        header('location:error.php');
                     }
                     ?>
                   </select>
               </fieldset>
               <fieldset class="form-group">
                <label for="photo" class="col-sm-2">pool image:</label>
                <input name="photo" id="photo" type = "file"/>
            </fieldset>
            <?php if(!empty($photo)){ ?>
                <div class="col-sm-offset-2">
                    <img src="uploads/<?php echo $photo; ?>" alt ="swimming pool" height="297px" width="200px">
                </div>
            <?php } ?>
               <button class = "btn btn-success col-sm-offset-2">Register</button>
               <input name="swim_id" type="hidden" value="<?php echo $swim_id; ?>"/>
            </form>
   
    <a href="swim.php">Back to records </a>
<?php require_once('footer.php'); ?>