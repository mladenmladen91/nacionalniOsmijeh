<?php
    session_start();
    
   include "../includes/db.php";
    
    include "../includes/functions.php";


     
      $kategorija_id = $_POST['kategorija_id'];
      $podkategorija_id = $_POST['podkategorija_id'];
      $podkategorija_naziv = $_POST['podkategorija_naziv'];


      $result = mysqli_prepare($connection, "SELECT a.kategorija_id, a.podkategorija_id, b.naziv FROM proizvodi a JOIN podkategorije b ON a.podkategorija_id=b.id WHERE a.kategorija_id=? AND a.podkategorija_id=? AND a.kolicina > 0 ");
      $result->bind_param('ii', $kategorija_id, $podkategorija_id);
      $result->execute();
      $result->store_result();
      $brojKlikova = $result->num_rows();
      if(!$result){
        die(mysqli_error($connection));
      } 


       $postoji = 0;
      
      foreach($_SESSION['cart'] as $item){
          if(array_key_exists(0, $item)){
              if($item[0] == $kategorija_id && $item[1] == $podkategorija_id && $item[2] == $podkategorija_naziv){
                $postoji ++;
            
            }
          }
      }

      if($postoji < $brojKlikova){
       
      $donacija = [];
        
      array_push($donacija, $kategorija_id);
      array_push($donacija, $podkategorija_id);
      array_push($donacija, $podkategorija_naziv);
     
     
         
      array_push($_SESSION['cart'], $donacija);     
         
      echo 'Success';

      }else{
          echo $brojKlikova;
      }
     
?>