<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM proizvodi WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            