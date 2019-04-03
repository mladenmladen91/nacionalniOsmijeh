<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    
   

 ?>
<div class="row justify-content-center">
              
<div class="col-lg-12 information_donor mx-auto px-0">
                  
                   <div class="col-lg-12 information_donor_header">
                       Informacije o donatoru:    
                   </div>
                   <div class="col-lg-12 information_donor_info">
                       <span class="information_donor_info_label">Ime i prezime donatora</span> 
                       
                       <span class="information_donor_info_data" id="donor_name_info"></span> 
                  </div>
                    
                 <div class="col-lg-12 information_donor_info">
                       <span class="information_donor_info_label">E-mail</span> 
                       
                       <span class="information_donor_info_data" id="donor_email_info"></span> 
                  </div>
                    
                 <div class="col-lg-12 information_donor_info">
                       <span class="information_donor_info_label">Broj telefona</span> 
                       
                       <span class="information_donor_info_data" id="donor_phone_info"></span> 
                  </div>    
            
                </div>
<div class="col-lg-12 information_donor_header"style="margin-top:50px">
                       Informacije o artiklima:    
                   </div>
                 <?php foreach($_SESSION['cart'] as $item){  ?>   
                   <div class="col-lg-12 information_donation_info p-0">
                        <div class="col-lg-12 information_donation_info_label">
                           <span class=""><?php echo $item[2] ?></span>
                           <img src="images/arrow-down.svg"  class="information_donation_info_arrow" title="Detalji">    
                        </div> 
                        
                  </div>
                   
                   <div class="col-lg-10 mx-auto information_donation_info_container px-4 mb-4">
                       <?php if($item[4] != 'oboje'){ ?>
                             <div class="col-lg-12 information_donor_info">
                                 <span class="information_donor_info_label">Pol</span> 
                       
                                  <span class="information_donor_info_data" id="donor_name_info"><?php echo $item[4] ?></span> 
                             </div>
                       <?php } ?>
                       <?php if($item[0] == 11 || $item[0] == 12){
    
                             }else{ ?>
                             <div class="col-lg-12 information_donor_info">
                                 <span class="information_donor_info_label">Uzrast</span> 
                       
                                  <span class="information_donor_info_data" id="donor_name_info"><?php echo $item[5] ?></span> 
                             </div>
                       
                             <div class="col-lg-12 information_donor_info">
                                 <span class="information_donor_info_label">Broj</span> 
                       
                                  <span class="information_donor_info_data" id="donor_name_info"><?php echo $item[6] ?></span> 
                             </div>
                       
                       <?php } ?>
                            <div class="col-lg-12 information_donor_info">
                                 <span class="information_donor_info_label">Količina</span> 
                       
                                  <span class="information_donor_info_data" id="donor_name_info"><?php echo $item[8] ?></span> 
                             </div>
                       
                             <div class="col-lg-12 information_donor_info">
                                 <span class="information_donor_info_label">Cijena</span> 
                       
                                  <span class="information_donor_info_data" id="donor_name_info"><?php echo $item[7] ?></span> 
                             </div>
                    </div>
                  
                  <?php } ?>
    <div class="col-lg-12 donation_info">
                       * Donacija može biti rezervisana 5 dana od datuma rezervisanja, nakon čega prelazi u kategoriju slobodnih proizvoda.
                  </div>
                 
                  
                  <div class="col-lg-12 text-center pb-0">
                      <form id="reserveForm">
                          <input type="hidden" name="naziv" id="final_naziv" value="">
                          <input type="hidden" name="email" id="final_email" value="">
                          <input type="hidden" name="telefon" id="final_telefon" value="">
                          
                          <input type="hidden" name="subjekt" id="final_subjekt" value="">
                          
                          <button class="next_btn sledeci_btn" type="submit">Rezerviši</button>
                      </form>
                     
                 </div>
                 
                  <div class="col-lg-12 donation_steps" style="margin-top: 15px !important"><?php echo sizeof($_SESSION['cart'])+2 ?>&ensp;od&ensp;<?php echo sizeof($_SESSION['cart'])+2 ?></div>  
                  
                </div>


 <script>
    $(document).ready(function(){
        
        
   
    $("#donor_name_info").text($('.naziv').val()); 
        
    $("#donor_email_info").text($('.email').val());
        
    $("#donor_phone_info").text($('.telefon').val());
            
        
    $("#final_naziv").val($('.naziv').val());
    
    $("#final_email").val($('.email').val()); 
        
    $("#final_telefon").val($('.telefon').val());
        
    $("#final_subjekt").val($('.subjekt').val());    
        
        // sliding down reservation info
     $(".information_donation_info_arrow").click(function(){
        $(this).toggleClass("rotate_arrow");
        
        $(this).closest(".information_donation_info").next(".information_donation_info_container").slideToggle(400);
    });
        
    // reserving donation
    $("#reserveForm").submit(function(e){
            e.preventDefault();
            
            var formData = new FormData($(this)[0]);
            
            saveDonation(formData);
    });    
        
   
    });

 </script>                            
   

