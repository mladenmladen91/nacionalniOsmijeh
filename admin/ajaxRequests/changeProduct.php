<?php
    session_start();
    
   include "../../includes/db.php";
    
    include "../../includes/functions.php";


     // redirect if not login
   redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));
      $cijena = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['cijena'])));
      $broj = clothesClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['broj']))));

      $pol = mysqli_real_escape_string($connection, $_POST['pol']);
      $uzrast = mysqli_real_escape_string($connection, $_POST['uzrast']);
      $kolicina = mysqli_real_escape_string($connection, $_POST['kolicina']);
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      $podkategorija_id = mysqli_real_escape_string($connection, $_POST['podkategorija_id']);

      $id = $_POST['id'];
      
      
     if($naziv === ''){
         echo "naziv,Morate popuniti polje validnim tekstom"; 
      }elseif($cijena === ''){
         echo "cijena,Morate popuniti polje validnom cijenom"; 
      }elseif(proizvodClean($cijena) === 1){
         echo "cijena,Morate popuniti polje validnom cijenom"; 
      }elseif($broj === ''){
         echo "broj,Morate popuniti polje validnim brojem"; 
      }else{
       $query = "UPDATE proizvodi SET naziv='$naziv', cijena='$cijena', uzrast = $uzrast , kolicina = $kolicina, kategorija_id = $kategorija_id, pol = '$pol', broj = '$broj', podkategorija_id={$podkategorija_id} WHERE id= {$id} ";   
         
       $result = mysqli_query($connection, $query);
       if(!$result){
        die(mysqli_error($connection));
    }
       
       
      
        echo 'Success';

     }
?>