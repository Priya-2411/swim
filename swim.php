<?php
        //require_once('auth.php');
        //insert header
        session_start();
        require_once('header.php');
         // check if the user entered keywords for searching
    $keywords = null;

    if (!empty($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
    }

 try{    
            // connect
            require('db.php');
            if (!empty($_SESSION['user_id'])){
?>

            <script src="js/sorttable.js"></script>
            <div class="col-sm-6">
            <a href="swim_addnew.php" title="Add Member">Add a New Member</a>
            </div> 
            <div class="col-sm-6">
            <form method="get" action="swim.php">
            <label for="keywords">Search:</label>
            <input name="keywords"  value="<?php echo $keywords; ?>"/>
            <select name="search_type">
            <option value="OR">Any Keyword</option>
            <option value="AND">All Keywords</option>
            </select>
            <button type="submit" class="btn btn-success">Search</button>
            </form>
            </div>
           
            
 <?php
             }
     // create query
    $sql = "SELECT * FROM swim";
    $word_list = null;

    // check if the user entered keywords for searching
    if (!empty($keywords)) {
    // start the WHERE clause MAKING SURE to include spaces around the word WHERE
    $sql .= " WHERE ";
    
    // split the keywords into an array of individual words
    $word_list = explode(" ", $keywords);
    // loop through the word list and add each word to the where individually
    // Here $key acts like a counter

    $search_type = trim($_GET['search_type']);
    foreach($word_list as $key => $word) {

    $word_list[$key] = "%" . $word . "%";

    // for the first word OMIT the word OR
    if ($key == 0) {
    $sql .= " firstName LIKE ?";
    }
    else {
     $sql .= " $search_type firstName LIKE ?";
     } 
    
    }
    }

    // execute the query and store the results, passing the $word_list array as a parameter list to the execute() function
    $cmd = $conn->prepare($sql);
    $cmd->execute($word_list);
    $swim = $cmd->fetchAll();

    // start the grid
    echo ' <table class = "table table-stipped table-hover sortable"><thead><th> First Name</th><th>Last Name</th><th>Position</th><th>Age Group</th>';
    if (!empty($_SESSION['user_id'])){
    echo '
    <th>Edit</th><th>Delete</th>';
    }
    echo '</thead><tbody>';


    //loop through data
    foreach ($swim as $one){
        echo '<tr><td>'. $one['firstName'] .'</td>
        <td>' . $one['lastName'] . '</td>
        <td>' . $one['position_number'] . '</td>
        <td>' . $one['age'] . '</td>';

        
        if (!empty($_SESSION['user_id'])){
            echo '
        <td><a href="swim_addnew.php?swim_id= '.$one['swim_id'] . '">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg></a>
        
        <td><a href = "delete_player.php?swim_id= '.$one['swim_id'] . '" 
        onclick="return confirm(\'Are you sure you want to delete this member?\');" >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path></svg> </a></td></tr>';

        }

    }

    // close the grid
    echo '</tbody></table>';
    //disconnect
    $conn = null;
 }

 catch(Exception $e){
     header('location:error.php');
      
 }
require_once('footer.php');
?>