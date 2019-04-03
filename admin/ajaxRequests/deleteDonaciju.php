<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    $proizvod = $_POST['proizvod'];
    $kolicina = $_POST['kolicina'];
    $status = $_POST['status'];
    
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM proizvod_donator WHERE id = ? ");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }
    
    if($status === 'rezervisano'){
      $result = mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina + {$kolicina} WHERE id={$proizvod}");
      if(!$result){
        die(mysqli_error($connection));
      }
    
    }
    
    
        echo "Success";
    
}
?>
            
            