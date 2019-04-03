<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // redirect if not login
    redirect();

    $id = $_POST['id'];
    $fotografija = $_POST['photo'];
    
    $stmtTagovi = mysqli_prepare($connection, "DELETE FROM fotografije WHERE id = ?");
    $stmtTagovi->bind_param('i', $id);
    unlink("../images/fotografije/{$fotografija}");
    $stmtTagovi->execute();
    testQuery($stmtTagovi);


    $query = mysqli_query($connection, "UPDATE albumi SET fotografija = null WHERE fotografija = '{$fotografija}'");
    
    echo "Success";
    

?>
            
            