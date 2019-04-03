<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      
  
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);


       
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($naziv === ''){ 
         echo "naziv,Popunite polje validnim tekstom";
     }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE kategorije SET naziv=? WHERE id=?");
           $stmtUpdate->bind_param('si', $naziv, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
            echo 'Success';
           
      }else{
          if(!extension($fotografija)){
              echo "fotografija,Unesite jpg svg ili png format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE kategorije SET naziv=?, fotografija=? WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naziv, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/kategorije/$fotografija");
           unlink("../images/kategorije/$stara_fotografija");
              
            
           echo 'Success';
          
          
          }
      }

     

    

    
?>
            
            