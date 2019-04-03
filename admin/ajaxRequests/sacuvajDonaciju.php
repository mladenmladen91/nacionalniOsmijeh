<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
   redirect();

      

      $kolicina = mysqli_real_escape_string($connection, $_POST['kolicina']);

      $status = mysqli_real_escape_string($connection, $_POST['status']);
      
      $datum = date('Y-m-d');

      $donator_id = $_POST['donator_id'];
    
      $proizvod_id = $_POST['proizvod_id'];


     // checking for available amount of products
     $kolicinaResult = mysqli_query($connection, "SELECT * FROM proizvodi WHERE id={$proizvod_id}");
     if(!$kolicinaResult){
              die(mysqli_error($connection));
      }
     $row = mysqli_fetch_assoc($kolicinaResult);
     $proizvodiKolicina = $row['kolicina'];
        

     if($proizvodiKolicina < $kolicina){ 
         echo "kolicina,Dozvoljena količina je ".$proizvodiKolicina;
     }elseif($proizvodiKolicina == 0){ 
         echo "kolicina,Trenutno nema potrebe za doniranjem ovog proizvoda";
     }else{

      
        
         
        
           $resultProduct= mysqli_query($connection, "INSERT INTO proizvod_donator VALUES(null, {$proizvod_id}, {$donator_id}, {$kolicina}, '{$status}', '$datum')");
           if(!$resultProduct){
              die(mysqli_error($connection));
           }
     
         
         $resultProduct= mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina - $kolicina WHERE id = {$proizvod_id}");
       if(!$resultProduct){
              die(mysqli_error($connection));
           } 
            
      
        echo 'Success'; 

     }
?>