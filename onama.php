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

<title>O nama</title>

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
                    <div class="col-lg-10" style="padding-bottom: 40px">
                        <span class="article_title friends_title" style="font-size: 72px">Njihov osmijeh
vrijedi više!</span>
                    </div>
                    
                    <div class="col-lg-10">
                       <div class="row">
                           <div class="col-lg-10 col-sm-10 px-4" >
                                 <span class="friends_content"><?php echo $row['tekst'] ?></span>
                               <div class="col-lg-12 px-0 py-4 about_title mb-4" style="margin-top: 48px !important; font-size: 36px">
                                   Postani volonter i doprinesi širenju osmijeha
                               </div>
                           </div>
                           <div class="col-12" style="margin-top: 48px !important">
                                     <span class="next_btn join_btn" id="pridruzi" style="padding: 20px 90px !important;">Pridruži se</span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 onama_fotografija" style="position:relative; margin-bottom: 150px">
                     <div class="col-lg-12 pl-4 photo_league_gallery_picture about_fotografija">
                        <img src="admin/images/onama/<?php echo $row['fotografija'] ?>" class="img-responsive" style="width: 100%; object-fit:cover; object-position: top">
                     </div>
                     <div class="baloon"></div>
                </div>
            </div>
        </div>
    </div>
</div>

   
<!-- popup za dodavanje volontera -->
<div id="pregledajDonaciju" class="popup">
    <input type="hidden" id="stranaDonator" class="page" value=""> 
    <div id="donator_forma" class="col-lg-10 popup_container" >
        <div class="col-lg-12" style="text-align:center; padding: 25px 10px">
            <span class="popup_title">Prijava za volontere</span>
            <span class="popup_close" id="licne_zatvori" title="Zatvori" >&times;</span>
        </div>
        
        <div class="col-lg-5 mx-auto" style="margin: 50px 0">
                       <div class="row">
                           <div class="col-xl-1 col-lg-2 col-sm-2 px-2"><img src="images/sara.svg"
     class="img-responsive" style="width: 52.4px;height: 10px; margin-bottom: 20px;"></div>
                           <div class="col-xl-10 col-lg-10 col-sm-10 px-4" >
                                 <span class="about_content" style="font-size: 18px !important">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</span>
                               
                           </div>
                           
                        </div>
                    </div>
        
        <div class="col-xl-5 col-lg-12 mx-auto" style="margin-top: 80px">
             <form id="donationForm">  
               <div class="row"> 
              
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px">
                     <input id="ime" type="text" class="contact_inputs form-control form-control-lg naziv" placeholder="Ime i prezime" name="ime" required title="Ime i prezime" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px" >
                     <input id="email" type="email" class="contact_inputs form-control form-control-lg email" placeholder="E-mail" name="email" required title="E-mail" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px">
                     <input id="telefon" type="text" class="contact_inputs form-control form-control-lg telefon" placeholder="Telefon" name="telefon" required title="Telefon" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                   
                   
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px">
                     <input id="adresa" type="text" class="contact_inputs form-control form-control-lg adresa" placeholder="Adresa" name="adresa" required title="Adresa" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                   
                   
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px" >
                     <input id="grad" type="text" class="contact_inputs form-control form-control-lg grad" placeholder="Grad" name="grad" required title="Grad" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>   
                
                <div class="col-lg-6 form-group mx-auto"  style="margin-top: 40px" >
                     <input id="datum" type="text" class="contact_inputs form-control form-control-lg datum" placeholder="Datum rođenja" name="datum_rodjenja" required title="Datum rođenja" maxlength="70" autocomplete="off">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-12 form-group text-center py-4" style="margin-top: 117px !important">
                    <button class="next_btn" type="submit" >Pošalji prijavu</button>
               </div>
                     
            </div>
           </form>      
           
        </div>
    </div>
    
    
    
 
    
     <div class="col-lg-10 mx-auto close_donation" id="uspjesna_rezervacija" >
         <div class="col-lg-12" style="text-align:center; padding: 25px 10px">
            <span class="popup_title">Uspješno ste poslali prijavu!</span>
        </div>
        <div class="col-lg-12 mx-auto text-center mt-2">
            <span class="about_content">U najkraćem roku ćemo te kontaktirati putem telefona ili maila.</span>   
        </div>
        
        <div class="col-lg-12 mx-auto text-center mt-2">
            <span class="about_content">Hvala u ime tima "ZA NJIHOV OSMJEH"</span>   
        </div>
         
        <div class="col-lg-2 mx-auto text-center mt-4">
            <img src="images/logo.png" class="mx-auto img-responsive d-block" width="100%">  
        </div> 
         
        <div class="col-lg-12 text-center py-4" style="margin-top: 40px;">
              <span class="next_btn" onclick="closePopup($(this))">U redu</span>
        </div> 
    </div>
      
    </div>
    
    
    
    
 
<!-- / popup za dodavanje volontera -->

<!-- contact and map including -->    
<?php include "includes/kontakt.php" ?>


<!--/main content

<?php $pageName = basename(__FILE__); ?>
<!-- scripts including -->
<?php include "scripts.php"; ?>



<!-- footer including -->    
<?php include "includes/footer.php" ?>

