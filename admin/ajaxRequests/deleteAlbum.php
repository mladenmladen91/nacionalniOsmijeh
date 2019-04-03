<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
   redirect();

if(isset($_GET['delete'])){
    
    $id = $_POST['id'];
    
   
   // deleting photos from albums first 
   $query = "SELECT * FROM fotografije WHERE album_id={$id} GROUP BY id";
   $result = mysqli_query($connection, $query);
   
   while($row = mysqli_fetch_assoc($result)){
        $photoId = $row['id'];
        $fotografija = $row['fotografija'];
       
         unlink("../images/fotografije/{$fotografija}");
       
         $deleteQuery = "DELETE FROM fotografije WHERE id = {$photoId}";
         $deleteResult = mysqli_query($connection, $deleteQuery);
         testQuery($deleteResult);
        
   }    
    
     
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM albumi WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    
    
    $stmtTagovi->execute();
    
    if(!$stmtTagovi){
        die(mysqli_error($connection));
    }else{
        echo "Success";
    }
}
?>
            
            