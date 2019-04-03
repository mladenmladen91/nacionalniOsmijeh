<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM kategorije WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    $albumResult = mysqli_query($connection, "SELECT * FROM kategorije WHERE id={$id}");
    testQuery($albumResult);
    $row = mysqli_fetch_assoc($albumResult);
    $fotografija = $row['fotografija'];
    unlink("../images/kategorije/{$fotografija}");
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            