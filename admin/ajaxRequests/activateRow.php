<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // if user isn't logged redirecting
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $status = mysqli_real_escape_string($connection, $_POST['status']);
      $table = mysqli_real_escape_string($connection, $_POST['table']); 
    
      switch($table){
          case "postovi":
             $query = "UPDATE postovi SET status=? WHERE id=?";
             break;
          case "vijesti":
             $query = "UPDATE vijesti SET status=? WHERE id=?";
             break;
              
          case "albumi":
             $query = "UPDATE albumi SET status=? WHERE id=?";
             break;
              
          case "prijatelji":
             $query = "UPDATE prijatelji SET status=? WHERE id=?";
             break;      
                
      }
      
      $stmtUpdate = mysqli_prepare($connection, $query);
      $stmtUpdate->bind_param('si', $status, $id);
      $stmtUpdate->execute();
      testQuery($stmtUpdate);
  
      
     

       
?>
            
            