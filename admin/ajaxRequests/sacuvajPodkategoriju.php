<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);

      // checking if naziv already exists
      $nameTest = mysqli_query($connection, "SELECT * FROM podkategorije WHERE naziv = '$naziv'");
       testQuery($nameTest);
       $postoji = mysqli_num_rows($nameTest);
      
      
     
     if($postoji > 0){
         echo "naziv,Već postoji podkategorija sa ovim imenom";
     }elseif($naziv === ''){
         echo "naziv,Morate popuniti sva polja validnim tekstom"; 
      }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO podkategorije VALUES(null, ?, ?)");
       $stmtAdd->bind_param('si', $naziv, $kategorija_id);
       $stmtAdd->execute();
       testQuery($stmtAdd);
      
        echo 'Success';

     }
?>
            
            