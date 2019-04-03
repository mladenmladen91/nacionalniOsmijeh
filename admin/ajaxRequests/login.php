<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

if(empty($_POST['username']) || empty($_POST['password'])){
    echo "* Morate popuniti oba polja";
}else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    
    
    $stmtLogin = mysqli_prepare($connection, "SELECT username, password FROM admin WHERE username=?");
    $stmtLogin->bind_param('s', $username);
    $stmtLogin->execute();
    if(!$stmtLogin){
            die(mysqli_error($connection));
    }
    $stmtLogin->bind_result($db_username, $db_password);
    $stmtLogin->fetch();
    
    $password = crypt($password, $db_password);
   
    if($password !== $db_password || $username !== $db_username){
         echo '* Unesite ispravne validacione podatke';
    }else{
        
        $_SESSION['username'] = $db_username;
         
        echo 'Success';
    }
}


?>