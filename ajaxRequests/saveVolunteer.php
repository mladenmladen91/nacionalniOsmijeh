<?php
    include "../includes/db.php";
    
    include "../includes/functions.php";

    

      
      $ime = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['ime']))));

      
      $email = mysqli_real_escape_string($connection, $_POST['email']);

      
     
      $telefon = numberClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['telefon']))));

      
      $adresa = clothesClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['adresa']))));

    
      $grad = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['grad'])))); 
      
      $datum_array = explode("-",$_POST['datum_rodjenja']);

      $datum_rodjenja = date($datum_array[2]."-".$datum_array[1]."-".$datum_array[0]);

      $datum_prijava = date('Y-m-d');
      
     if($ime == ''){ 
         echo "naziv,Unesite validno ime i prezime";
     }elseif($telefon == ''){
          echo "telefon, Unesite validan broj telefona (samo brojevi)";
     }elseif($adresa == ''){
          echo "adresa,Unesite validnu adresu";
     }elseif($grad == ''){
          echo "grad,Unesite validno ime grada";
     }elseif($datum_rodjenja > date('Y-m-d')){
          echo "datum, Datum ne može biti u budućnosti";
     }else{
         
         $result = mysqli_query($connection, "INSERT INTO volonteri VALUES(null,'{$ime}', '{$email}', '{$telefon}', '{$adresa}', '{$grad}', '{$datum_rodjenja}', '{$datum_prijava}')");
         
         // data for mail sending
    $adminMail = 'njihov.osmijeh@gmail.com';
    $adminSubject = 'Novi volonter';
    $adminMessage = $ime.", telefon: ".$telefon.", adresa: ".$adresa.", ".$grad." se prijavio/la kao volonter!<br>";
    $adminHeader = "From: ".$email."\r\n"."Content-Type: text/html; charset=UTF-8";
  
    $donorMail = $email;
    $donorSubject = 'Prijava za volontera';
    $donorMessage = "Poštovani, <br>";
    $donorMessage .= "Uspješno ste se prijavili kao volonter!<br>";
    $donorMessage .= "Naš tim će Vas kontaktirati u najkraćem roku.<br>";
  
    $donorHeader = "From: njihov.osmijeh@gmail.com\r\n"."Content-Type: text/html; charset=UTF-8";

    if(mail($adminMail, $adminSubject, $adminMessage, $adminHeader)){
             if(mail($donorMail, $donorSubject, $donorMessage, $donorHeader)){
                 echo 'Success'; 
             }else{
                echo "Mail nije poslat!";
            }
    }else{
        echo "Mail nije poslat!";
    }
         
    
     
     
    }
?>