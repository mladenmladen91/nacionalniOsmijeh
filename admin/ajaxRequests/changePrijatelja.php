<?php
session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";
 
   // redirect if not login
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);

      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($naziv === ''){
        echo "naziv,Popunite polje validnim tekstom";
    }elseif($link === '' || !linkValidate($link)){
         echo "link,Unesite validan link"; 
    }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, "UPDATE prijatelji SET naziv=?, link=?  WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naziv, $link, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           echo 'Success';
           
      }else{
          if(!extension($fotografija)){
             echo "fotografija,Unesite jpg png ili png format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE prijatelji SET naziv=?, link=?, fotografija=?  WHERE id=?");
           $stmtUpdate->bind_param('sssi', $naziv, $link, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           unlink("../images/prijatelji/$stara_fotografija");
           move_uploaded_file($fotografija_tmp,"../images/prijatelji/$fotografija");
           echo 'Success';
         }
      }
      
     
?>
            
            