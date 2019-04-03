<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $tekst = str_replace("\\","", $tekst);
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);


       
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if(clearSpace($tekst)){
         echo "tekst,Popunite polje validnim tekstom"; 
      }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection,  "UPDATE onama SET tekst=? ");
           $stmtUpdate->bind_param('s', $tekst);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
            echo 'Success';
           
      }else{
          if(!extension($fotografija)){
              echo "fotografija,Unesite jpg  png ili svg format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE onama SET tekst=?, fotografija=?");
           $stmtUpdate->bind_param('ss', $tekst, $fotografija);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/onama/$fotografija");
           unlink("../images/onama/$stara_fotografija");
              
            
           echo 'Success';
          
          
          }
      }

     

    

    
?>
            
            