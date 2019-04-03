<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));

      // checking if naziv already exists
      $nameTest = mysqli_query($connection, "SELECT * FROM kategorije WHERE naziv = '$naziv'");
       testQuery($nameTest);
       $postoji = mysqli_num_rows($nameTest);
      
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       
    
     if($postoji > 0){
         echo "naziv,Već postoji kategorija sa ovim imenom";
     }elseif($naziv === ''){
         echo "naziv,Morate popuniti sva polja validnim tekstom"; 
      }elseif(!extension($fotografija)){
          echo "fotografija,Unesite jpg svg ili png format fotografije";
      }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO kategorije VALUES(null, ?, ?)");
       $stmtAdd->bind_param('ss', $naziv, $fotografija);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/kategorije/$fotografija");
       $stmtAdd->close();
       
      
        echo 'Success';

     }
?>
            
            