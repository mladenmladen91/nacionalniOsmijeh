<?php include "includes/header.php" ?>
<?php 
  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }
  
?>

<title>Vijesti</title>

</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    




<div class="section">
    <div class="container news_container_holder">
        <div class="col-lg-12" style="margin-top: 170px; margin-bottom: 50px">
        <?php    
              $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, tekst, datum, fotografija, status FROM vijesti WHERE status='aktivan' ORDER BY datum DESC");
            
              $stmtSezone->execute();
              if(!$stmtSezone){
                  die(mysqli_error($connection));
               }
              $stmtSezone->store_result();
              $broj = $stmtSezone->num_rows();
              $stmtSezone->bind_result($id, $naslov, $tekst, $datum, $fotografija, $aktivan);
            
            if($broj > 0){
                                     
              while($stmtSezone->fetch()){ 
        ?>  
             
           <div class="col-lg-12 news_container">
             
               <div class="row">
                  
                   <div class="col-xl-6 p-0 mb-4">
                     <a href="vijest.php?id=<?php echo $id ?>" title="<?php echo $naslov ?>">   
                       <img src="admin/images/vijesti/<?php echo $fotografija ?>" class="img-responsive news_container_image">
                       </a>     
                   </div>
                   <div class="col-xl-6 right_side" style="padding-left: 40px !important">
                     <a href="vijest.php?id=<?php echo $id ?>" title="<?php echo $naslov ?>">   
                       <div class="col-lg-12 news_container_date"><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></div>
                       <div class="col-lg-10 news_container_title">
                          <?php echo $naslov ?>
                       </div>
                       <div class="col-lg-10 news_container_text">
                          <?php echo $tekst ?>
                       </div>
                       </a>     
                       <div class="col-lg-12 news_container_link">
                           <a href="vijest.php?id=<?php echo $id ?>" title="<?php echo $naslov ?>">Pročitaj</a>
                       </div>
                           
                   </div>
               </div>
                  
           </div>
            
        <?php 
              }
              }else{ 
        ?>
            <div class="col-lg-12 article_title text-center"  style="min-height: 200px">NEMA VIJESTI</div>
        <?php } ?>   
        </div>    
    </div>
</div>




<!--/main content -->

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>

<script>
$(document).ready(function(){
    $(".news_container_text").find("img").remove();
});    
    
</script>

<!-- footer including -->    
<?php include "includes/footer.php" ?>

