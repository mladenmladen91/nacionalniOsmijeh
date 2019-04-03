<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // if user isn't logged redirecting
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $status = mysqli_real_escape_string($connection, $_POST['status']);
      
      
      $stmtUpdate = mysqli_prepare($connection, "UPDATE mailovi SET status=? WHERE id=?");
      $stmtUpdate->bind_param('si', $status, $id);
      $stmtUpdate->execute();
      testQuery($stmtUpdate);
  
      
     

       
?>
            
            