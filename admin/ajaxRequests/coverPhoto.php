<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $album_id = mysqli_real_escape_string($connection, $_POST['album_id']);
      $fotografija = mysqli_real_escape_string($connection, $_POST['photo']);

        $stmtUpdate = mysqli_prepare($connection, "UPDATE albumi SET fotografija=? WHERE id=?");
        $stmtUpdate->bind_param('si', $fotografija, $album_id);
        $stmtUpdate->execute();
        testQuery($stmtUpdate);
           
   
              
            
           echo 'Success';
          
   
     

    

    
?>
            
            