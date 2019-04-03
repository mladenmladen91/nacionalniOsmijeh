<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    

      
      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));

      
      $email = mysqli_real_escape_string($connection, $_POST['email']);
     
      $telefon = numberClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['telefon']))));

      $subjekt = $_POST['subjekt'];

     
      
      $datum = date('Y-m-d');

   
      
     if($naziv == ''){ 
         echo "naziv";
     }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "email";
     }elseif($telefon == ''){
          echo "telefon";
     }else{


     // checking if donor already exists
     $kolicinaResult = mysqli_query($connection, "SELECT * FROM donatori WHERE naziv='{$naziv}'");
     if(!$kolicinaResult){
              die(mysqli_error($connection));
      }
     $row = mysqli_fetch_assoc($kolicinaResult);
     $postoji = mysqli_num_rows($kolicinaResult);
     $donor = $row['id'];


    // data for mail sending
    $proizvodi = '';
    $adminMail = 'njihov.osmijeh@gmail.com';
    $adminSubject = 'Nova rezervacija';
    $adminMessage = "Korisnik ".$naziv." je izvršio novu rezervaciju. Rezervisani proizvodi su: <br>";
    $adminHeader = "From: ".$email."\r\n"."Content-Type: text/html; charset=UTF-8";
  
    $donorMail = $email;
    $donorSubject = 'Nacionalni osmijeh';
    $donorMessage = "DONACIJA USPJEŠNO REZERVISANA! <br><br>";
    $donorMessage .= "Poštovani, <br><br>";
    $donorMessage .= "Uspješno ste rezervisali proizvode! Rok za dostavu je 3 dana, na adresu: <b>Jovana Tomaševića br. 37 - Ekonomski fakultet, Podgorica.</b> U periodu između 10 - 12h i 17 - 19h. <br><br>";
    $donorMessage .= "Molimo Vas da poštujete cjenovni raspon naveden u specifikaciji. <br><br>";
    $donorMessage .= "Uz dostavljene artikle <b>OBAVEZNO</b> je dostaviti račune kao dokaz o njihovoj kupovini, i kopiju mail-a koji će Vam uskoro biti poslat. <br><br>";
    $donorMessage .= "Mi Vam od srca zahvaljujemo, a djeca Vam šalju veliki zagrljaj! <br><br>";
    $donorMessage .= "Vi ste dokaz da, <br><br>";
    $donorMessage .= "<b>Njihov osmijeh vrijedi više!</b> <br><br>";        
    $donorMessage .= "Rezervisani proizvodi su: <br>";
    $donorHeader = "From: njihov.osmijeh@gmail.com\r\n"."Content-Type: text/html; charset=UTF-8";
    
     
        

     if($postoji === 0){ 
      

           $resultDonor= mysqli_query($connection, "INSERT INTO donatori VALUES(null, '$naziv', '$email', '$telefon', '$subjekt')");
           if(!$resultDonor){
              die(mysqli_error($connection));
           }
         
           $donator_id = mysqli_insert_id($connection);
        
         foreach($_SESSION['cart'] as $item){
             
               
        
           $resultProduct= mysqli_query($connection, "INSERT INTO proizvod_donator VALUES(null, {$item[3]}, {$donator_id}, {$item[8]}, 'rezervisano', '$datum')");
           if(!$resultProduct){
              die(mysqli_error($connection));
           }
             
           $donacijaid = mysqli_insert_id($connection);     
     
           $proizvodi .= "- ".$item[2].", id donacije: ".$donacijaid.", količina: ".$item[8]."<br>";  
             
         $resultProduct= mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina - {$item[8]} WHERE id = {$item[3]}");
       if(!$resultProduct){
              die(mysqli_error($connection));
           } 
             
         }
         
         $adminMessage .= $proizvodi;
        
         $donorMessage .= $proizvodi;
         
        if(mail($adminMail, $adminSubject, $adminMessage, $adminHeader)){
             if(mail($donorMail, $donorSubject, $donorMessage, $donorHeader)){
                 echo 'Success'; 
             }else{
                echo "Mail nije poslat!";
            }
        }else{
            echo "Mail nije poslat!";
        } 
      
        

     }else{
         
         foreach($_SESSION['cart'] as $item){
        
           $resultProduct= mysqli_query($connection, "INSERT INTO proizvod_donator VALUES(null, {$item[3]}, {$donor}, {$item[8]}, 'rezervisano', '$datum')");
           if(!$resultProduct){
              die(mysqli_error($connection));
           }
             
          $donacijaid = mysqli_insert_id($connection);     
     
          $proizvodi .= "- ".$item[2].", id donacije: ".$donacijaid.", količina: ".$item[8]."<br>";      
     
         
         $resultProduct= mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina - {$item[8]} WHERE id = {$item[3]}");
       if(!$resultProduct){
              die(mysqli_error($connection));
           } 
             
         }
         
         $adminMessage .= $proizvodi;
        
         $donorMessage .= $proizvodi;
         
         
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
     }
?>