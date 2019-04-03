<!-- header including -->    
<?php include "includes/header.php" ?>
<?php 
  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }


?>

<title>404 NOT FOUND</title>

</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    




<div class="section" style="margin-top: 300px; height: 700px">
    <div class="container-fluid p-0">
        <div class="col-lg-12 mx-auto" style="font-size: 30px; color:#2e3038; text-align:center">404 NOT FOUND</div>   
    </div>    
</div>





<!--/main content -->

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
    



<!-- footer including -->    
<?php include "includes/footer.php" ?>

