<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

     // redirect if not login
  redirect();

      $naslov = clean(strip_tags(trim(mysqli_real_escape_string($connection, $_POST['naslov']))));
      $tekst = mysqli_real_escape_string($connection, $_POST['tekst']);
      $tekst = str_replace("\\","", $tekst);

      $datum = $_POST['datum'];
    
      $table = $_POST['table'];

     // echo $table;
      
       switch($table){
               
        case "postovi":
        $query = "INSERT INTO postovi VALUES(null, ?, ?, ?, ?, 'neaktivan')";
        break;       
            
        case "vijesti":
        $query = "INSERT INTO vijesti VALUES(null, ?, ?, ?, ?, 'neaktivan')";
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
     }elseif(!extension($fotografija)){
          echo "fotografija,Unesite jpg png ili svg format fotografije";
     }else{

       $stmtAdd = mysqli_prepare($connection, $query);
       $stmtAdd->bind_param('ssss', $naslov, $tekst, $datum, $fotografija);
       $stmtAdd->execute();
       testQuery($stmtAdd);
       move_uploaded_file($fotografija_tmp,"../images/vijesti/$fotografija");
       $stmtAdd->close();

       
      
        echo 'Success'; 

     }
?>