<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    //redirect();

      $id = mysqli_real_escape_string($connection, $_POST['id']);
      $table = $_POST['table'];
  
      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $tekst = str_replace("\\","", $tekst);
      $datum= $_POST['datum'];
      
      $stara_fotografija = mysqli_real_escape_string($connection, $_POST['stara_fotografija']);


       switch($table){
            
        case "vijesti":
        $query = "UPDATE vijesti SET naslov=?, tekst=?, datum=? WHERE id=?";       
        $query2 = "UPDATE vijesti SET naslov=?, tekst=?, datum=?, fotografija=? WHERE id=?";
        break;
        
        case "postovi":
        $query = "UPDATE postovi SET naslov=?, tekst=?, datum=? WHERE id=?";       
        $query2 = "UPDATE postovi SET naslov=?, tekst=?, datum=?, fotografija=? WHERE id=?";
        break;    
      
       }
        
    
      // getting images
      $fotografija = time().$_FILES['fotografija']['name'];
      $fotografija_tmp = $_FILES['fotografija']['tmp_name'];
    
      if($datum > date('Y-m-d')){
         echo "datum,Datum ne može biti u budućnosti"; 
      }elseif($naslov === ''){ 
         echo "naslov,Popunite polje validnim tekstom";
     }elseif(clearSpace(strip_tags($tekst))){
         echo "tekst,Popunite polje validnim tekstom"; 
      }elseif($_FILES['fotografija']['name'] === ''){
           $stmtUpdate = mysqli_prepare($connection, $query);
           $stmtUpdate->bind_param('sssi', $naslov, $tekst, $datum, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           
            echo 'Success';
           
      }else{
          if(!extension($fotografija)){
              echo "fotografija,Unesite jpg png ili svg format fotografije";
          }else{
           $stmtUpdate = mysqli_prepare($connection, $query2);
           $stmtUpdate->bind_param('ssssi', $naslov, $tekst, $datum, $fotografija, $id);
           $stmtUpdate->execute();
           testQuery($stmtUpdate);
           move_uploaded_file($fotografija_tmp,"../images/vijesti/$fotografija");
           unlink("../images/vijesti/$stara_fotografija");
              
            
           echo 'Success';
          
          
          }
      }

     

    

    
?>
            
            