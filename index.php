<?php include "includes/header.php" ?>
<?php 
  

  if(isset($_SESSION['cart'])){    
    unset($_SESSION['cart']); 
  }
  
  

  $result = mysqli_query($connection, "SELECT * FROM onama");
  if(!$result){
      die(mysqli_error($connection));
  }
  $row = mysqli_fetch_assoc($result);


?>

<title>Početna</title>

</head>
<body>

<div class="container_fluid nav_holder" style="background: red !important">
 
<?php include "includes/nav.php"; ?>
   
</div>    

<div class="section">
<div class="container-fluid header">
    <div class="container" style="padding: 67px 0px 84px 0px">
        <div class="row p-0">
            <div class="col-lg-5 col-md-10 col-sm-10 up_and_down">
                <div class="col-lg-12 p-0 my-4 py-4 header_title">
                    <span class="">Njihov osmijeh vrijedi više!</span>
                </div>
                <div class="col-lg-10 header_content p-0 my-4 py-4">
                    Postoji jedan životni fakultet koji studiraju oni koji imaju volju da izmame što više iskrenih osmijeha za djecu bez roditeljskog staranja. On proizvodi najbolje kadrove iz ove oblasti u našoj zemlji već duže od decenije i ne planira da se zaustavi. Upisuje sve kandidate dobre volje, pa nemojte brinuti da li za vas ima mjesta. Ukoliko želite, samo zakoračite unutra. Lako ćete ga pronaći, na njemu je velikim slovima ispisan grafit <span style="font-weight: bold !important">NJIHOV OSMIJEH VRIJEDI VIŠE!</span> Ispitni rok je, za omladinu i sve ljude dobre volje u Crnoj Gori, svake godine u aprilu! 
                </div>
                <div class="col-lg-12 header_desc p-0 py-4">
                   Mi smo spremni, a vi?
                </div>
                <div class="col-lg-12 header_desc p-0 py-4 my-4 p-0">
                   <a href="doniraj.php" class="donate_link" title="doniraj">Doniraj</a>
                </div>
            </div>
            
        </div>
    </div>
    

</div>
</div>

<div class="section">
   <div class="container" style="position:relative">
       <div class="col-lg-12 number_container">
           <div class="row" id="counter">
              <div class="col-lg-6 number_container_first">
                  <div class="row">
                      <div class="col-lg-6 number_container_donation">
                          <span class="count" >296</span>
                      </div>
                      <div class="col-lg-6 number_container_text" style="border-left: 2px solid #ffffff;">
                          Broj doniranih artikala
                      </div>
                  </div> 
              </div>
               
              <div class="col-lg-6">
                 <div class="row">
                      <div class="col-lg-6">
                        <div class="round" style="animation-delay: -35s;"><span class="round_number count">73</span></div>
                          
                      </div>
                      <div class="col-lg-6 number_container_text" style="height: 100px; padding: 0 20px">
                          Broj ostvarenih osmijeha
                      </div>
                  </div>
              </div>   
           
           </div>
       </div>
   </div>
</div>

<div class="section">
    <div class="container">
        <div class="col-xl-12 about_container">
            <div class="row">
                <div class="col-xl-6 article_left" style="position:relative; margin-bottom: 150px">
                    <div class="col-lg-12" style="padding-bottom: 40px">
                        <span class="article_title" style="font-size: 72px !important">Ko smo mi?</span>
                    </div>
                    
                    <div class="col-lg-12">
                       <div class="row">
                           <div class="col-xl-1 col-lg-2 col-sm-2 px-2"><img src="images/sara.svg"
     class="img-responsive" style="width: 52.4px;height: 10px; margin-bottom: 20px;"></div>
                           <div class="col-xl-10 col-lg-10 col-sm-10 px-4" >
                                 <span class="article_content index_content"><?php echo $row['tekst'] ?></span>
                               <div class="col-lg-12 px-0 py-4"><a href="onama.php" class="article_more" title="saznaj više">Saznaj više&ensp;<img src="images/arrow.svg" class="img-responsive"></a></div>
                           </div>
                           
                           <div class="col-lg-10 decoration"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 article_right" style="position:relative; margin-bottom: 150px">
                     <div class="col-lg-12 pl-4 about_fotografija">
                        <img src="admin/images/onama/<?php echo $row['fotografija'] ?>" class="img-responsive" style="width: 100%; object-fit:cover; object-position: top">
                     </div>
                     <div class="baloon"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.04);
">
        <div class="container">
          <div class="col-lg-12" style="padding:50px; position:relative">
                    <span class="article_title" style="float:left; position:absolute; top: -35; font-size: 72px !important">Vijesti</span>
                    <a href="vijesti.php" class="rest_news" title="ostale vijesti" style="float:right">ostale vijesti&ensp;<img src="images/arrow-news.svg" class="img-responsive"></a>
          </div>    
          <div class="col-lg-12" style="padding-bottom: 52px !important;">   
            <div class="swiper-container p-0">
        <div class="swiper-wrapper text-center" style="padding: 0">
          <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, tekst, datum, fotografija, status FROM vijesti WHERE status='aktivan' ORDER BY datum DESC LIMIT 10");
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
               <a href="vijest.php?id=<?php echo $id ?>" title="<?php echo $naslov ?>">
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
                     <div class="col-lg-12 text-center article_title" >Nema vijesti</div>
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
<!--/slider-->

<!-- contact and map including -->    
<?php include "includes/kontakt.php" ?>


<!--/main content

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>
<script>

   

    // getting screen width
    var screen = window.innerWidth;
    var slide = 0;
    
    if(<?php echo $count ?> === 1){
       slide = 1;
    }else if(screen >= 1025){
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

