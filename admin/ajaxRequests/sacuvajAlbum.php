<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
     redirect();

      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $datum = $_POST['datum'];
      
             
    
     if($datum > date('Y-m-d')){
         echo "datum,Datum ne može biti u budućnosti"; 
      }elseif($naslov === ''){
         echo "naslov,Morate popuniti sva polja validnim tekstom"; 
      }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO albumi VALUES(null, ?, null, 'neaktivan', ?)");
       $stmtAdd->bind_param('ss', $naslov, $datum);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       $stmtAdd->close();
       
      
        echo 'Success';

     }
?>
            
            