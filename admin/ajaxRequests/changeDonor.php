<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
   redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));

      
      $email = mysqli_real_escape_string($connection, $_POST['email']);
     
      $telefon = numberClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['telefon']))));

      

      $donator_id = $_POST['donator_id'];

        

     if($naziv === ''){ 
         echo "naziv,Popunite polje validnim tekstom";
     }elseif($telefon === ''){ 
         echo "telefon,Unesite validan broj telefona";
     }else{

       $stmtAdd = mysqli_prepare($connection, "UPDATE donatori SET naziv = ?, email = ?, telefon = ? WHERE id = ?");
       $stmtAdd->bind_param('sssi', $naziv, $email, $telefon, $donator_id);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();

       
            
      
        echo 'Success'; 

     
     }
?>