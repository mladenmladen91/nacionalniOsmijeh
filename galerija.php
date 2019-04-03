<?php include "includes/header.php" ?>
<?php 
  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }

  
?>

<title>Galerija</title>

<!-- light gallery including --> 
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">

</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    




<div class="section photo_holder">
    <div class="container">
        <div class="col-lg-12" style="margin-top: 170px; margin-bottom: 50px">
            <div class="row">
        <?php    
              $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, datum, fotografija, status FROM albumi WHERE status='aktivan' ORDER BY datum DESC");
            
              $stmtSezone->execute();
              if(!$stmtSezone){
                  die(mysqli_error($connection));
               }
              $stmtSezone->store_result();
              $broj = $stmtSezone->num_rows();
              $stmtSezone->bind_result($id, $naslov, $datum, $fotografija, $aktivan);
            
            if($broj > 0){
                                     
              while($stmtSezone->fetch()){ 
        ?>    
              <div class="col-lg-6 p-0 px-4 album my-4" id="album<?php echo $id ?>" title="Vidi Fotografije">
                <div class="col-lg-12 p-0" style="position:relative; overflow: hidden !important">
                      <img class="album_image" 
                          <?php if($fotografija !== null){  ?>   
                           src="admin/images/fotografije/<?php echo $fotografija ?>"
                          <?php }else{ ?>
                            src="images/nophoto.png"
                          <?php } ?>
                      >
                      <div class="col-lg-12 album_view"><span>POGLEDAJ</span></div>
                  </div>
                  <div class="col-lg-12 album_title">
                     <?php echo $naslov ?>
                  </div>    
                  <div class="col-lg-12 album_date">
                     <?php echo $newDate = date("d.m.Y", strtotime($datum)) ?>
                  </div>  
               </div>
                
             <div id="myModal<?php echo $id ?>" class="conatiner-fluid modal">

   <ul class="col-lg-12 photo_league_gallery p-0 m-0 text-center" id="galerija<?php echo $id ?>">

    <?php
         $result = mysqli_query($connection, "SELECT * FROM fotografije WHERE album_id={$id}");
         testQuery($result);
         $ukupno = mysqli_num_rows($result);
         $i=1;          
            
        while($row = mysqli_fetch_assoc($result)){            
    ?>            
      
      
                         <li class="col-lg-2 text-center p-2 m-0 photo_league_gallery_picture" data-src="admin/images/fotografije/<?php echo $row['fotografija'] ?>" id="slika<?php echo $id ?><?php echo $i ?>">
                            <img src="admin/images/fotografije/<?php echo $row['fotografija'] ?>" class="img-responsive mt-0" style="width:100%;"> 
                          </li>
        
   
       

    <?php 
        $i++;
        } 
    ?>
     </ul>
      <script>
          
          
          $("#album<?php echo $id ?>").click(function(){
                $("#slika<?php echo $id ?>1").trigger("click");
          });
      
      
      </script> 

  </div>
   <?php 
              }
              }else{ 
        ?>
            <div class="col-lg-12 article_title"  style="text-align:center">NEMA ALBUMA</div>
        <?php } ?>                
</div>
    
                
           
        </div>
      </div>        
    </div>





<!--/main content -->

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
    
<script>
    
$(document).ready(function(){
    // activating lightgallery
    $(".photo_league_gallery").lightGallery();
    
});
</script>    
    

<!-- footer including -->    
<?php include "includes/footer.php" ?>

