<?php
    session_start();

    include "../../includes/db.php";


    if(!$connection){
  	    die('error '.mysqli_error($connection));
    }

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
    $table = $_POST['table'];
    
 
    
   $stmtTagovi = mysqli_prepare($connection, "DELETE FROM volonteri WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            