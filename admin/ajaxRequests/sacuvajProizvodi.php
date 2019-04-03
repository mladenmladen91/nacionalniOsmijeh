<?php
    session_start();
    
   include "../../includes/db.php";
    
    include "../../includes/functions.php";


     // redirect if not login
    redirect();

      $naziv = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naziv']))));

    
      // checking if naziv already exists
      $nameTest = mysqli_query($connection, "SELECT * FROM proizvodi WHERE naziv = '$naziv'");
       testQuery($nameTest);
       $postoji = mysqli_num_rows($nameTest);


      $cijena = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['cijena'])));
      $broj = clothesClean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['broj']))));

      $pol = mysqli_real_escape_string($connection, $_POST['pol']);
      $uzrast = mysqli_real_escape_string($connection, $_POST['uzrast']);
      $kolicina = mysqli_real_escape_string($connection, $_POST['kolicina']);
      $kategorija_id = mysqli_real_escape_string($connection, $_POST['kategorija_id']);
      $podkategorija_id = mysqli_real_escape_string($connection, $_POST['podkategorija_id']);
      
      
     if($postoji > 0){
         echo "naziv,Već postoji proizvod sa ovim imenom";
     }elseif($naziv === ''){
         echo "naziv,Morate popuniti polje validnim tekstom"; 
      }elseif($cijena === ''){
         echo "cijena,Morate popuniti polje validnom cijenom"; 
      }elseif(proizvodClean($cijena) === 1){
         echo "cijena,Morate popuniti polje validnom cijenom"; 
      }elseif($broj === ''){
         echo "broj,Morate popuniti polje validnim brojem"; 
      }else{
         
        $query2 = "SELECT * FROM proizvodi WHERE cijena = '{$cijena}' AND uzrast = {$uzrast} AND kategorija_id = {$kategorija_id} AND pol = '{$pol}' AND broj = '{$broj}' AND podkategorija_id = {$podkategorija_id}"; 
        $result2 = mysqli_query($connection, $query2);
        if(!$result2){
            die(mysqli_error($connection));
        }
        $count = mysqli_num_rows($result2);
         
      if($count === 1){
          echo "naziv,Proizvod sa ovim karakteristikama već postoji";
      }else{     
         
         
       $query = "INSERT INTO proizvodi VALUES(null, '$naziv', '$cijena', $uzrast , $kolicina, $kategorija_id, '$pol', '$broj', $podkategorija_id)";   
         
       $result = mysqli_query($connection, $query);
       if(!$result){
        die(mysqli_error($connection));
    }
       
       
      
        echo 'Success';

     }
     }
?>