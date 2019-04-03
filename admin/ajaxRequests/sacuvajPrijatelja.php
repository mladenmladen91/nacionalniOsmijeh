<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

      $link = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['link'])));
      
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];       


    if($naziv === ''){
        echo "naziv,Popunite polje validnim tekstom";
    }elseif($link === '' || !linkValidate($link)){
         echo "link,Unesite validan link"; 
    }elseif(!extension($fotografija)){
          echo "fotografija,Unesite jpg png ili svg format fotografije";
    }else{
       $stmtAdd = mysqli_prepare($connection, "INSERT INTO prijatelji VALUES(null, ?, ?, ?, 'neaktivan')");
       $stmtAdd->bind_param('sss', $naziv, $fotografija, $link);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/prijatelji/$fotografija");
       $stmtAdd->close();
       
       echo 'Success';
    }
    
?>
            
            