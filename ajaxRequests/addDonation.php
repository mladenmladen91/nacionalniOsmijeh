<?php
    session_start();
    
   include "../includes/db.php";
    
    include "../includes/functions.php";


     
      $kategorija_id = $_POST['kategorija_id'];
      $podkategorija_id = $_POST['podkategorija_id'];
      $podkategorija_naziv = $_POST['podkategorija_naziv'];
       
      $donacija = [];
        
      array_push($donacija, $kategorija_id);
      array_push($donacija, $podkategorija_id);
      array_push($donacija, $podkategorija_naziv);
     
         
      array_push($_SESSION['cart'], $donacija);     
         
      echo 'Success';

     
     
?>