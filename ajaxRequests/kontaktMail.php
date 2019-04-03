<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

     

      

      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));
      $email = trim(mysqli_real_escape_string($connection, $_POST['email']));
      $poruka = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['poruka']))));
      $datum = date('Y-m-d');
     

     if($ime === ''){ 
         echo "ime,Unesite validan tekst";
     }elseif($email === ''){ 
         echo "email,Unesite validan tekst";
     }elseif($poruka === ''){ 
         echo "poruka,Unesite validan tekst";
     }else{
         
         $to = "njihov.osmijeh@gmail.com";
         $subject = $ime;
         $header = "From: ".$email;
         
         if(mail($to, $subject, $poruka, $header)){
             $resultProduct= mysqli_query($connection, "INSERT INTO mailovi VALUES(null, '{$ime}', '{$email}', 'neodgovoreno', '{$poruka}', '{$datum}')");
           if(!$resultProduct){
              die(mysqli_error($connection));
           }
     
            echo 'Uspješno ste poslali upit!'; 
         }else{
            echo 'Upit nije poslat!'; 
         }

         

     }
?>