<?php
$firstName = null;
$lastName = null;
$position_number = null;
$age = null;
$swim_id = null;

if (empty($_GET['swim_id']) == false) 
   $swim_id = $_GET['swim_id'];
   
   // connect
   $conn = new PDO('mysql:host=172.31.22.43;dbname=Priya200447419', 'Priya200447419', 'EcuOYoEEiR');
   
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
   
   
   // disconnect
   $conn = null;

?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title> Enter details of the new partipant </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
</head>
<body>
   <h1> Add New Swimmer </h1>
   <?php
   session_start();

   // check if there is a user identity stored in the session object
   if (empty($_SESSION['user_id'])) {
   // if there is no user_id in the session, redirect the user to the login page
   header('location:login.php');
   exit();
   }

   ?>
    <form method = "post" action = "save_swim.php">
      <table>
        <tr>
           <td>
           <label for="firstName" > Enter  First Name  :* </label>
           </td>
           <td>
           <input type = "text" name="firstName" id="firstName" required value="<?php echo $firstName; ?>"><br>
           </td>
        </tr>
        <tr>
           <td>
           <lable for="lastName"> Enter last name :* </lable>
           </td>
           <td>
           <input type ="text" name= "lastName" id="lastName" required value = "<?php echo $lastName; ?>"><br>
           </td>
        </tr>
        <tr>
           <td>
           <lable for = "position_number">Enter position number :*  </lable>
           </td>
           <td>
           <input name="position_number" id="position_number" required value = "<?php echo $position_number; ?>"><br>
           </td>
        </tr>
        <tr>
           <td>
           <lable for = "age">Enter age of Swimmer :*  </lable>
           </td>
           <td>

           
           <select id = "age" name = "age" >
            <option >--Select--</option>
           
           <?php
            $sql = "SELECT * FROM age_group ORDER BY age";
            $conn = new PDO('mysql:host=172.31.22.43;dbname=Priya200447419', 'Priya200447419', 'EcuOYoEEiR');
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

           ?>

              
           </select>
           </td>
         
        </tr>
          <input name="swim_id" type="hidden" value="<?php echo $swim_id; ?>"/>
            
        </table>
        
        <button class= "btn btn-primary">Save</button>
      
       
    </form>
    <a href="swim.php">Back to records </a>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>