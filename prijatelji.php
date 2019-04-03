<?php include "includes/header.php" ?>
<?php 
  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }

  $result = mysqli_query($connection, "SELECT * FROM onama");
  testQuery($result);
  $row = mysqli_fetch_assoc($result);


?>

<title>Prijatelji</title>

</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    


<div class="section" style="margin-top: 200px; margin-bottom: 50px">
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 up_and_down" style="position:relative; margin-bottom: 150px">
                    <div class="col-lg-12" style="padding-bottom: 40px">
                        <span class="article_title friends_title" style="font-size: 72px">Prijatelji projekta
"Za njihov osmijeh"</span>
                    </div>
                    
                    <div class="col-lg-12">
                       <div class="row">
                           <div class="col-lg-10 col-sm-10 px-4" >
                                                                 <span class="friends_content">Dragi naši,</span><br><br>
                                 <span class="friends_content">Stvaranje ove, sada ne više tako male tradicije, koja baš ove 2019. slavi svoju 15tu jubilarnu godinu, nije bilo  jednostavno. 
Vrijeme iza nas pamti brojne prepreke, ali nikada nismo bili sami. </span><br>
                                 <span class="friends_content">Našem timu zaduzenom isključivo za crtanje najljepših osmijeha, tokom godina podršku su pružali brojni ljudi, i kompanije, koji su umjeli prepoznati važnost našeg humanog projekta, njih je na našu neizmjernu sreću, svake godine sve više! </span><br>
                               
                           </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="margin-bottom: 150px">
                     <div class="col-lg-12 photo_league_gallery_picture">
                        <img src="images/prijatelji.svg" class="img-responsive" style="width: 100%; object-fit:cover; object-position: top">
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<section>
    <div class="container-fluid friends_holder">
        <div class="container">
             <div class="col-lg-12 friends">
                  <div class="row">
                    <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, fotografija, link ,status FROM prijatelji WHERE status='aktivan'");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                        die(mysqli_error($connection));
                                     }
                                     $stmtSezone->store_result();
                                     $broj = $stmtSezone->num_rows();
                                     $stmtSezone->bind_result($id, $naziv, $fotografija, $link, $aktivan);
                         
                                     if($broj > 0){
                       
                                      while($stmtSezone->fetch()){  
                    ?>   
                      
                     <div class="col-lg-3 col-md-6 p-4">
                        <a href="<?php echo $link ?>" target="_blank" title="<?php echo $naziv ?>"> 
                         <div class="col-lg-12 friends_container">
                             <img class="img-responsive friends_container_image" src="admin/images/prijatelji/<?php echo $fotografija ?>">
                         </div>
                         </a>    
                     </div>
                  <?php 
                                      }
                      
                                     }else{  
                  ?>
                          <div class="col-lg-12 article_title no_friends" style="text-align:center;font-size: 4rem;">NEMA PRIJATELJA</div>
                  <?php } ?>      
                  </div>
             </div>
        </div>
    </div>    
</section>    


<!--/main content

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>


<!-- footer including -->    
<?php include "includes/footer.php" ?>

