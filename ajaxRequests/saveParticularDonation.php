<?php
    session_start();
    
   include "../includes/db.php";
    
    include "../includes/functions.php";


     
        

      
      
     if(!isset($_POST['pol'])){
         echo "pol, Izaberite pol";
     }elseif($_POST['uzrast'] == 'Uzrast'){
         echo "uzrast, Izaberite uzrast";
     }elseif($_POST['broj'] == 'Broj'){
         echo "broj,Izaberite broj"; 
      }elseif($_POST['cijena'] == 'Cijenovni raspon'){
         echo "cijena,Izaberite cijenu"; 
      }else{
         
      $cijena = mysqli_real_escape_string($connection, $_POST['cijena']);
      $broj = mysqli_real_escape_string($connection, $_POST['broj']);
      $pol = mysqli_real_escape_string($connection, $_POST['pol']);
      $uzrast = mysqli_real_escape_string($connection, $_POST['uzrast']);
      $kolicina = mysqli_real_escape_string($connection, $_POST['kolicina']);
      $redni = mysqli_real_escape_string($connection, $_POST['redni_broj']);     
      $proizvod_id = mysqli_real_escape_string($connection, $_POST['proizvod_id']);
         
     $postoji = 0;
         
    foreach($_SESSION['cart'] as $item){
       if(array_key_exists(3, $item)){    
        if($item[3] == $proizvod_id && $item[4] == $pol && $item[5] == $uzrast && $item[6] == $broj && $item[7] == $cijena){
            $postoji = 1;
            break;
        }
       }else{
           break;
       }
    }     
         
         
    if($postoji == 1 && sizeof($_SESSION['cart'][$redni]) < 9){
        echo "kolicina, Već ste odabrali proizvod sa ovim karakteristikama";
    }else{     
         
    if(sizeof($_SESSION['cart'][$redni]) === 9){
        $_SESSION['cart'][$redni][3] = $proizvod_id;
        $_SESSION['cart'][$redni][4] = $pol;
        $_SESSION['cart'][$redni][5] = $uzrast;
        $_SESSION['cart'][$redni][6] = $broj;
        $_SESSION['cart'][$redni][7] = $cijena;
        $_SESSION['cart'][$redni][8] = $kolicina;
        
      $postoji2 = 0;    
        
      foreach($_SESSION['cart'] as $item){
         if(array_key_exists(3, $item)){       
            if($item[3] == $proizvod_id && $item[4] == $pol && $item[5] == $uzrast && $item[6] == $broj && $item[7] == $cijena){
                $postoji2 ++;
            
            }
         }
      }
        
           
        
       if($postoji2 > 1 ){
           echo "kolicina, Već ste odabrali proizvod sa ovim karakteristikama";
       }else{
           echo 'Success';
       }
    }else{     
     
       array_push($_SESSION['cart'][$redni], $proizvod_id);
       array_push($_SESSION['cart'][$redni], $pol);     
       array_push($_SESSION['cart'][$redni], $uzrast);
       array_push($_SESSION['cart'][$redni], $broj);
       array_push($_SESSION['cart'][$redni], $cijena);
       array_push($_SESSION['cart'][$redni], $kolicina);     
         
      echo 'Success';

     }
    }
     }
     
?>