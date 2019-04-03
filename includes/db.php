<?php 
  $connection = mysqli_connect('localhost','root','','osmijeh');

  if(!$connection){
  	die('error '.mysqli_error($connection));
  }

?>