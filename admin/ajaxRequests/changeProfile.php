<?php
    session_start();
    
   include "../../includes/db.php";
    
    include "../../includes/functions.php";


     // redirect if not login
   redirect();

      $username = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['username'])));


      $password = strip_tags(trim(mysqli_real_escape_string($connection, $_POST['password'])));
       

      
     if($username === ''){
         echo "username,Morate popuniti polje validnim tekstom"; 
      }elseif($password == ''){
         
         $result = mysqli_query($connection, "UPDATE admin SET username='$username'");
          if(!$result){
             die(mysqli_error($connection));
          }
         echo 'Success';
         
      }else{
         $salt = '$2y$10$iusesomecrazystrings22';
         $password = crypt($password, $salt);
         
         $result = mysqli_query($connection, "UPDATE admin SET username='$username', password = '{$password}'");
          if(!$result){
             die(mysqli_error($connection));
          }
       
       
        echo 'Success';

     }
?>