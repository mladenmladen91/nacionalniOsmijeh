<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
   
    
    $stmt = mysqli_query($connection, "SELECT * FROM proizvod_donator  WHERE 
donator_id = {$id} AND status='rezervisano'");
    if(!$stmt){
        die(mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($stmt)){
        $result = mysqli_query($connection, "UPDATE proizvodi SET kolicina = kolicina + {$row['kolicina']} WHERE id={$row['proizvod_id']}");
         if(!$result){
             die(mysqli_error($connection));
         } 
        
    
    }
    
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM donatori WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }
    $stmtTagovi->close();
    

    
    echo "Success";
    
}
?>
            
            