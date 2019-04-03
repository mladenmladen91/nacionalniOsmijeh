<?php include "includes/header.php" ?>

<!-- starting session -->
<?php
   $_SESSION['cart'] = [];
    
?>    
<title>Doniraj</title>
</head>
<body>
<div>
<!-- navigation including -->    
<?php include "includes/nav.php"; ?>
</div>    


<div class="section">
    <div class="container">
        <div class="col-lg-12" style="margin-top: 200px">
            <div class="row justify-content-center">
                <div class="col-lg-6 up_and_down" style="position:relative; margin-bottom: 150px">
                    <div class="col-lg-8" style="padding-bottom: 40px">
                        <span class="article_title" style="font-size: 72px !important">Doniraj osmijeh,
jer imaš priliku!</span>
                    </div>
                    
                    <div class="col-lg-10">
                       <div class="row">
                           <div class="col-lg-12 col-sm-10 px-4" >
                                 <span class="article_content" style="font-weight: 900 !important">Pred tobom su potrebni proizvodi za djecu iz dječijeg
doma "Mladost" u Bijeloj . Sve zainteresovane ustanove i građani kao potencijalni donatori mogu da odaberu, rezervišu i dostave nam određene proizvode koje će naši dobrovoljni aktivisti brižljivo sortirati i pakovati, kako bi se u sklopu jednoobraznih paketa predali štićenicima Doma u okviru manifestacije "DAN BEZ TELEFONA I DRUŠTVENIH MREŽA" 
koji je planiran za 14. april 2019.</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 bear_container" style="position:relative;margin-bottom: 100px">
                     <div class="col-lg-12 bear">
                        <img class="photo_league_gallery_picture img-responsive" src="images/bear2.png" width="670">
                     </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section donation_container">
    <div class="container">
        <div class="col-lg-8 mx-auto">
            <div class="row">
                <div class="col-lg-12 sta_zelite_container" style="position:relative; margin-bottom: 50px; margin-top: 180px">
                    <div class="col-lg-12 mx-auto" style="padding-bottom: 40px; text-align:center">
                        <span class="article_title donate_title" style="font-size: 72px">Šta želite da donirate?</span>
                    </div>
                    
                    <div class="col-lg-7 mx-auto">
                       <div class="row">
                           <div class="col-lg-12 px-4" style="padding-bottom: 40px; text-align:center">
                                 <span class="article_content" style="font-weight: 900 !important">Ovdje možeš odabrati kategoriju i pogledati spisak artikala kojima ćemo ove godine obradovati štićenike Doma "Mladost" u Bijeloj. 
                               </span>
                            </div>
                           <div class="col-lg-12 px-4" style="padding-bottom: 40px; text-align:center">
                                 <span class="article_content" style="font-weight: 900 !important">Pogledaj - odaberi - DONIRAJ i izmamite bar jedan iskren i topao dječiji osmijeh. 
                               </span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12" style="margin-bottom: 50px">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 p-2" id="kategorije">
                         
                        </div>
                        <div class="col-lg-6 col-md-9 p-2 px-4" id="subcategories" >
                            
                        </div>
                        <div class="col-lg-3 col-md-4 p-2" id="korpa sistem">
                            <div class="col-lg-12 bucket mt-4">
                                 <div class="bucket_title" style="margin-bottom: 20px;">
                                    Odabrano:
                                 </div>
                                 <div class="col-lg-12 p-0" style="margin-bottom: 30px" id="korpa">
                                     
                                 
                                 </div>
                             </div>
                             <div class="col-12 p-0" style="margin: 40px 0 !important; text-align:center" id="donate_button">
                                     
                             </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/main content


    
<!-- popup za dodavanje donacije u korpu -->
<div id="pregledajDonaciju" class="popup" >
   
 </div>
    
    
    
    
 
<!-- / popup za doniranje -->    

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>


<!-- footer including -->    
<?php include "includes/footer.php" ?>

