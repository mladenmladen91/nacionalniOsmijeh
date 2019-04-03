<?php include "includes/header.php" ?>
<?php 
  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }

// getting the url for social sharing
$Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
       header('location:javascript://history.go(-1)');
}

$id = $_GET['id'];

$stmt = mysqli_prepare($connection, "SELECT naslov, tekst, datum, fotografija FROM postovi  WHERE id=? AND status='aktivan'");
$stmt->bind_param('i', $id);
$stmt->execute();
if(!$stmt){
    die(mysqli_error($connection));
}
$stmt->bind_result($naslov, $tekst, $datum, $fotografija);
mysqli_stmt_store_result($stmt);
$rows = mysqli_stmt_num_rows($stmt);
$stmt->fetch();
$stmt->close();

//redirecting if id not found
if($rows <= 0){
    header("location: 404.php");
}
  
?>

<title><?php echo $naslov ?></title>

</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    




<div class="section news_holder" style="margin-top: 105px">
    <div class="container-fluid p-0">
        <img src="admin/images/vijesti/<?php echo $fotografija ?>" style="width: 100%" class="img-responsive article_image">    
    </div>    
</div>
<div class="section">
    <div class="container py-0">
        <div class="col-lg-12 article_social mb-4">
            <div class="col-lg-6 mx-auto">
                <div class="row">
                    <div class="col-lg-6 article_social_date"><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></div>
                    <div class="col-lg-6 article_social_share">
                        <span class="mr-4">SHARE</span>
                        <a title="Facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $Url; ?>" target="_blank"><img src="images/facebooks.svg" class="img-responsive article_social_share_icon"></a>
                        <a title="Twitter" href="https://twitter.com/share?url=<?php echo $Url; ?>" target="_blank"><img src="images/twitter.svg" class="img-responsive article_social_share_icon"></a>
                        <a title="Viber" id="viber_share" href="viber://forward?text=<?php echo $Url; ?>" target="_blank"><img src="images/viber.svg" class="img-responsive article_social_share_icon"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mx-auto px-0">
            <div class="col-lg-12 article_title p-0 mb-4">
                <?php echo $naslov ?>
            </div>
            <div class="col-lg-12 article_text p-0 my-4">
                <?php echo $tekst ?>
            </div>
            <div class="col-lg-12 article_social_share" style="margin-bottom: 30px !important;">
                        <span class="mr-4">SHARE</span>
                        <a title="Facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $Url; ?>" target="_blank"><img src="images/facebooks.svg" class="img-responsive article_social_share_icon"></a>
                        <a title="Twitter" href="https://twitter.com/share?url=<?php echo $Url; ?>" target="_blank"><img src="images/twitter.svg" class="img-responsive article_social_share_icon"></a>
                        <a class="Viber" id="viber_share" href="viber://forward?text=<?php echo $Url; ?>" target="_blank"><img src="images/viber.svg" class="img-responsive article_social_share_icon"></a>
            </div>
        </div>
        
    </div>
    
</div>

    <div class="section other_news">
    <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.04);">
        <div class="container">
          <div class="col-lg-12" style="padding:50px; position:relative">
                    <span class="article_title clanak_jos" style="float:left; position:absolute; top: -35">Čitaj još</span>
                    
          </div>    
          <div class="col-lg-12" style="padding-bottom: 52px !important;">   
            <div class="swiper-container p-0">
        <div class="swiper-wrapper text-center" style="padding: 0">
          <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, tekst, datum, fotografija, status FROM postovi WHERE NOT id={$id} AND status='aktivan' ORDER BY datum DESC LIMIT 10");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     mysqli_stmt_store_result($stmtSezone);
                                     $count = mysqli_stmt_num_rows($stmtSezone);
                                     $stmtSezone->bind_result($id, $naslov, $tekst, $datum, $fotografija, $aktivan);
            
                                    if($count > 0){
                                     
                                      while($stmtSezone->fetch()){  
            ?>     
            
           <div class="swiper-slide">
              <div class="col-lg-8 p-0">   
               <a href="clanak.php?id=<?php echo $id ?>" title="<?php echo $naslov ?>">
                    <div style="position: relative">
                       <img class="card-img-top img-responsive" src="admin/images/vijesti/<?php echo $fotografija ?>" height="350" width="552" style="object-fit:cover; object-position:top" >
                            <div class="col-lg-8 news">
                                <div class="col-lg-12 news_title px-2"><span><?php echo $naslov ?></span></div>
                                <div class="col-lg-12 news_text px-2" style="padding-top: 20px">
                                    <?php echo $tekst ?>
                                
                                </div>
                                    
                            </div>
                        </div> 
                      </a>
                    </div>
               </div>
            <?php 
                }
                    }else{
            ?>
                     <div class="col-lg-12 text-center article_title"  style="height: 780px">Nema ostalih postova</div>
            <?php } ?>
           </div>
      </div>
    <!-- Add Arrows -->
 <?php if($count > 1){ ?>              
    <div class="swiper-button-prev swiper-button-black"></div>              
    <div class="swiper-button-next swiper-button-black"></div>
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
     $(".article_text img").addClass("img-responsive");
 }); 
   

    // getting screen width
    var screen = window.innerWidth;
    var slide = 0;
    
    if(<?php echo $count ?> === 1){
       slide = 1;
    }else if(screen >= 1006){
        slide = 2;
    }else{
        slide=1;
    } 
       
    // initializing swiper   
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: slide,
      spaceBetween: 5,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },    
      
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    })
</script>    
    
   


<!-- footer including -->    
<?php include "includes/footer.php" ?>

