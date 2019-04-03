<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
   redirect();


      $stara_kolicina = mysqli_real_escape_string($connection, $_POST['stara_kolicina']);

      $kolicina = mysqli_real_escape_string($connection, $_POST['kolicina']);

      $status = mysqli_real_escape_string($connection, $_POST['status']);
      
      $datum = mysqli_real_escape_string($connection, $_POST['datum']);
    
      $proizvod_id = $_POST['proizvod_id'];

      $id = $_POST['id'];

        

     if($datum > date('Y-m-d')){ 
         echo "datum,Datum ne može biti u budućnosti";
     }else{

       

       if($kolicina === ''){
           $result= mysqli_query($connection, "UPDATE proizvod_donator SET status = '$status', datum = '$datum' WHERE id = $id ");
            
           if(!$result){
               die(mysqli_error($connection));
           }
       }else{
           
          if($kolicina > $stara_kolicina){
              $result= mysqli_query($connection, "UPDATE proizvod_donator SET kolicina = $kolicina, status = '$status', datum = '$datum' WHERE id =$id ");
              if(!$result){
                  die(mysqli_error($connection));
              }
              
              // razlika izmedju 2 kolicine i updateovanje kolicine proizvoda 
              $razlika = $kolicina - $stara_kolicina;
              
              $resultProduct= mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina - $razlika WHERE id = {$proizvod_id}");
              testQuery($resultProduct);
          }elseif($kolicina < $stara_kolicina){
              $result= mysqli_query($connection, "UPDATE proizvod_donator SET kolicina = $kolicina, status = '$status', datum = '$datum' WHERE id =$id");
              if(!$result){
                  die(mysqli_error($connection));
              }
              
              // razlika izmedju 2 kolicine i updateovanje kolicine proizvoda 
              $razlika = $stara_kolicina - $kolicina;
              
              $resultProduct= mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina + $razlika WHERE id = {$proizvod_id}");
              testQuery($resultProduct);
          }else{
              $result= mysqli_query($connection, "UPDATE proizvod_donator SET kolicina = $kolicina, status = '$status', datum = '$datum' WHERE id =$id");
              if(!$result){
                  die(mysqli_error($connection));
              }
          }
           
            
      
        echo 'Success'; 

     }
     }
?>