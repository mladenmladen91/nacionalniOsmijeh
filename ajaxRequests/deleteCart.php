<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $id = $_POST['id'];

     unset($_SESSION['cart'][$id]);
     $_SESSION['cart'] = array_values($_SESSION['cart']);
    
?>

