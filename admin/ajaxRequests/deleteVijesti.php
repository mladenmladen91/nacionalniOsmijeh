<?php
    session_start();

    include "../../includes/db.php";
   // $connection = mysqli_connect('mysql','dhubmeef_mladen5','*Bdk%*ts5Xze','dhubmeef_mladentest');

    if(!$connection){
  	    die('error '.mysqli_error($connection));
    }

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
    $table = $_POST['table'];
    
 
    
    
    switch($table){
            
        case "vijesti":
        $query = "DELETE FROM vijesti WHERE id = ?";
        break;
        
        case "postovi":
        $query = "DELETE FROM postovi WHERE id = ?";
        break;    
    }
    
    $stmtTagovi = mysqli_prepare($connection, $query);
    $stmtTagovi->bind_param('i', $id);
    
    //getting image name
    $albumResult = mysqli_query($connection, "SELECT * FROM {$table} WHERE id = {$id}");
    if(!$albumResult){
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['fotografija'];
    unlink("../images/vijesti/$fotografija");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            