<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      
  
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));

      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      
       
     
    
      if($naziv === ''){ 
         echo "naziv,Popunite polje validnim tekstom";
     }else{
          
           $stmtUpdate = mysqli_prepare($connection, "UPDATE podkategorije SET naziv=?, kategorija_id=? WHERE id=?");
           $stmtUpdate->bind_param('sii', $naziv, $kategorija_id, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
        
              
            
           echo 'Success';
          
          
          
      }

     

    

    
?>
            
            