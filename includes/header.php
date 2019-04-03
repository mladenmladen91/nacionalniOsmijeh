<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width= device-width, initial-scale=1">

<!-- style importing -->    
<link rel="stylesheet" href="css/style.min.css">    
<link rel="stylesheet" href="css/style.css">
    
<!-- font importing -->

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">    
    
  <!-- sweet alert including -->    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>     
   
    
<!-- font awesome including -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    

<!-- tab icon including -->    
<link rel="shortcut icon" type="image/png" href="images/logo.png">
    
 

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php 
    
    //database including
    include "includes/db.php";
    
    //functions including
    include "includes/functions.php";
    
    //scripts including
    include "scripts.php";
    
   
    
?>    


    