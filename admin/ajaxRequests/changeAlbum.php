<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      
  
      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $datum= $_POST['datum'];
      
      
    
      if($datum > date('Y-m-d')){
         echo "datum,Datum ne može biti u budućnosti"; 
      }elseif($naslov === ''){ 
         echo "naslov,Popunite polje validnim tekstom";
     }else{
           $stmtUpdate = mysqli_prepare($connection, "UPDATE albumi SET naslov=?, datum=? WHERE id=?");
           $stmtUpdate->bind_param('ssi', $naslov, $datum, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
            echo 'Success';
           
      }

     

    

    
?>
            
            