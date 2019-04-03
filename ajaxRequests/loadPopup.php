<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    
?>

 <input type="hidden" id="stranaDonator" class="page" value="">
    
   <?php
         $i = 0;
         foreach($_SESSION['cart'] as $item){   
   ?> 
    
    <div id="donacija_container<?php echo $i ?>" class="col-lg-10 popup_container
        <?php echo ($i == 0)? 'first_donation':'' ?>                                                " >
       <div class="col-lg-12" style="text-align:center; padding: 25px 10px">
           <div class="row">
            <div class="col-lg-12 text-center">
         <?php if($i > 0){ ?>        
            <span class="popup_prev" title="Nazad" onclick="goPrev( $('#donacija_container<?php echo $i ?>'),  $('#donacija_container<?php echo $i-1 ?>'), 'donacija_container<?php echo $i-1 ?>')"><i class="fas fa-arrow-left"></i>&ensp;Prethodni korak </span>
         <?php } ?>       
            <span class="popup_close" title="Zatvori" onclick="closeDonation($('#donacija_container<?php echo $i ?>'), $('#donator_close'))">&times;</span>
          </div>   
           
            <div class="col-lg-12 text-center"> 
               
            <span class="popup_title text-center">Donacija:<span style="color:#06aaca" id="imeProizvoda"><?php echo $item[2] ?></span></span>
            </div>   
                  
          </div>       
        </div>
        <div class="col-lg-12 popup_header">
            <span> Popuni formu ispod i rezerviši donaciju.</span>    
        </div>
        <div class="col-xl-8 col-lg-12 mx-auto">
          <form id="donacijaForma<?php echo $i ?>">   
            <input type="hidden" id="dodajPodkategorija" name="podkategorija_id" value="">
            <input type="hidden" name="redni_broj" id="redni_broj<?php echo $i ?>" value="<?php echo $i ?>">  
                <div class="col-lg-4 mx-auto popup_holder" style="border-top: solid 1px #c6c9d6">
                    <div class="col-lg-12 popup_radio">
                        Prvo odaberi pol:
                    </div>
                    <div class="col-lg-12" id="polDonacija<?php echo $i ?>">
                        
                    </div>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="uzrastDonacija<?php echo $i ?>">
                     <select style="-webkit-appearance: none !important" class="form_select uzrast<?php echo $i ?>" name="uzrast" required title="uzrast">
                        <option selected>Uzrast</option>
                    </select>
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="brojDonacija<?php echo $i ?>">
                     <select style="-webkit-appearance: none !important" class="form_select broj<?php echo $i ?>" name="broj" required title="broj">
                        <option selected>Broj</option>
                     </select>
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="cijenaDonacija<?php echo $i ?>">
                     <select style="-webkit-appearance: none !important" class="form_select cijena<?php echo $i ?>" name="cijena" title="cijena">
                        <option selected>Cijenovni raspon</option>
                     </select>
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="kolicinaDonacija<?php echo $i ?>">
                     <input id="kolicina<?php echo $i ?>" type="number" class="form_input kolicina<?php echo $i ?>" placeholder="Količina" name="kolicina" required title="količina">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                <div class="col-lg-10 mx-auto form-group text-center py-4" style="margin-top: 44px !important; margin-bottom: 15px !important">
                   <?php if($i == sizeof($_SESSION['cart'])-1){ ?>
                     <button type="submit" class="next_btn sledeci_btn" >SLEDEĆI KORAK</button>
                   <?php }else{ ?>
                    <button type="submit" class="next_btn sledeci_btn"  >SLEDEĆI KORAK</button>
                  <?php } ?>  
               </div>
            </form>   
            
               <div class="col-lg-12 donation_steps"><?php echo $i+1 ?>&ensp;od&ensp;<?php echo sizeof($_SESSION['cart'])+2 ?></div>
        </div>
    </div>
 
   <script>
     
       // loading gender
       loadGender(<?php echo $item[1] ?>,<?php echo $i ?>, <?php echo $item[0] ?>);
           
           
       
        
       
       var last = <?php echo sizeof($_SESSION['cart'])-1 ?>;
       
    
       // adding particular donation
       $("#donacijaForma<?php echo $i ?>").submit(function(e){
           e.preventDefault();
           var formData = new FormData($(this)[0]);
           
           
           if(<?php echo $i ?> < last){
               addParticularDonation(<?php echo $i ?>, formData, $("#donacija_container<?php echo $i+1 ?>"), "donacija_container<?php echo $i+1 ?>");
           }else{
               addParticularDonation(<?php echo $i ?>, formData, $("#informacije_forma"), "informacije_forma");
           }
       });
   </script>

    
  <?php
        $i++;
         } 
  ?>  
    
    
    <div id="informacije_forma" class="col-lg-10 popup_container" style="visibility: hidden" >
        <div class="col-lg-12" style="text-align:center; padding: 25px 10px">
              
          <div class="row">
            <div class="col-lg-12 text-center">  
            <span class="popup_prev" title="Nazad" onclick="goPrev($('#informacije_forma'),  $('#donacija_container<?php echo sizeof($_SESSION['cart'])-1 ?>'), 'donacija_container<?php echo sizeof($_SESSION['cart'])-1 ?>')"><i class="fas fa-arrow-left"></i>&ensp;Prethodni korak </span>
            <span class="popup_close" id="licne_zatvori" title="Zatvori"onclick="closeDonation($('#informacije_forma'), $('#donator_close'))">&times;</span>
            </div>
            <div class="col-lg-12">    
            <span class="popup_title">Lične informacije</span>
         </div>
        </div>
        <div class="col-lg-5 mx-auto popup_header">
            <span>Informacije su nam potrebne kako bi uspješno rezervisali rezervaciju</span>    
        </div>
        <div class="col-xl-8 col-lg-12 mx-auto">
            
                <div class="col-lg-4 mx-auto" style="border-top: solid 1px #c6c9d6">
                    <div class="col-lg-12 popup_radio">
                        Odaberi:
                    </div>
                    <div class="col-lg-12" id="polDonacija">
                      <div class="row justify-content-center">
                            <div class="col-lg-6 form-group mb-4 text-center">
                                <input id="pravno" value="pravno" type="radio" name="subjekt" class="form_radio subjekt">
                                <label for="pravno" style="pointer:cursor" title="Pravno lice">
                                     <div class="col-lg-12 text-center">
                                         <div class="subject_type mx-auto"><span>Pravno lice</span></div>
                                     </div>
                                     
                                </label>
                               
                                <span id="subjekt_result" class="form_result" style="color:red; font-size:12px; display:none"></span>
                            </div>
                            
                           <div class="col-lg-6 form-group mb-4 text-center">
                               <input id="fizicko" value="fizcko" type="radio" name="subjekt" class="form_radio subjekt">
                                <label for="fizicko" style="pointer:cursor" title="Fizičko lice">
                                     <div class="col-lg-12 text-center">
                                         <div class="subject_type mx-auto"><span>Fizičko lice</span></div>
                                     </div>
                                     
                                </label>
                                <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                            </div>
                          
                     </div>
                    </div>
                </div>
                
                
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="nazivDonator" style="margin-top: 54px !important">
                     <input id="naziv" type="text" class="contact_inputs form-control form-control-lg naziv" placeholder="Ime i prezime" name="naziv" required title="Ime i prezime" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="nazivDonator" style="margin-top: 54px !important">
                     <input id="email" type="text" class="contact_inputs form-control form-control-lg email" placeholder="E-mail" name="email" required title="E-mail" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                <div class="col-lg-6 form-group mx-auto mb-4" id="nazivDonator" style="margin-top: 54px !important">
                     <input id="telefon" type="text" class="contact_inputs form-control form-control-lg telefon" placeholder="Telefon" name="telefon" required title="Telefon" maxlength="70">
                    <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                </div>
                
                
                
                <div class="col-lg-12 mx-auto form-group text-center py-4" style="margin-top: 179px !important; margin-bottom: 15px !important">
                    <span class="next_btn licne_btn" onclick="goNext($('#informacije_forma'), $('#donator_review'))" >SLEDEĆI KORAK</span>
                    <span id="mail_result" style="color:red; font-size:12px; display:none; margin-top: 20px"></span>
               </div>
                
            
               <div class="col-lg-12 donation_steps"><?php echo sizeof($_SESSION['cart'])+1 ?>&ensp;od&ensp;<?php echo sizeof($_SESSION['cart'])+2 ?></div>
           
        </div>
    </div>
</div>  
    
    
        <div id="donator_review" class="col-lg-10 popup_container" style="visibility: hidden">
          
        <div class="col-xl-12 mx-auto" style="text-align:center; padding: 25px 10px; position:relative; margin-bottom: 120px">
          <div class="col-lg-12">    
            <span class="popup_prev" title="Nazad" onclick="goPrev($('#donator_review'), $('#informacije_forma'), 'informacije_forma')"><i class="fas fa-arrow-left"></i>&ensp;Prethodni korak </span>
            <span class="popup_close" title="Zatvori" onclick="closeDonation($('#donator_review'), $('#donator_close'))">&times;</span>   
        </div>
        <div class="col-lg-12">   
            <span class="popup_title final_title" style="position:absolute; left: 50%; transform:translateX(-50%)">Pregled rezervacije</span>
        </div>    
        </div>
        
        <div class="col-xl-4 col-lg-8 mx-auto px-4" id="cart_info" >
              
               
                
                
            </div>      
            </div>
    
    
    <div class="col-lg-10 mx-auto close_donation" id="donator_close" >
         <div class="col-lg-12 stop_text">
               Da li želiš da prekineš proces doniranja?
        </div>
        <div class="col-xl-4 col-sm-12 mx-auto">
           <div class="row">
                <div class="col-lg-6 col-sm-6 text-center my-4 py-4" style="margin-top: 20px !important;">
                    <span class="no"  style="width: 100%; text-align:center" onclick="closeDonation($('#donator_close'), $('#'+ $(this).closest('.popup').find('.page').val()))">NE</span>
                </div>
                <div class="col-lg-6 col-sm-6 text-center my-4 py-4" style="margin-top: 20px !important;">
                    <span class="yes" style="width: 100%; text-align:center" onclick="window.location='doniraj.php'">DA</span>
                </div>
           </div>
         </div>
    </div>
    
     <div class="col-lg-10 mx-auto close_donation" id="uspjesna_rezervacija">
         <div class="col-lg-12" style="text-align:center; padding: 25px 10px">
            <span class="success_title">DONACIJA USPJEŠNO REZERVISANA!</span>
            <span class="popup_close" title="Zatvori" onclick="window.location='doniraj.php'">&times;</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Poštovani,</span>
        </div> 
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Uspješno ste rezervisali proizvode! Rok za dostavu je 3 dana, na adresu: <b>Jovana Tomaševića br. 37 - Ekonomski fakultet, Podgorica.</b> U periodu između 10 - 12h i 17 - 19h.</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Molimo Vas da poštujete cjenovni raspon naveden u specifikaciji.</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Uz dostavljene artikle <b>OBAVEZNO</b> je dostaviti račune kao dokaz o njihovoj kupovini, i kopiju mail-a koji će Vam uskoro biti poslat.</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Mi Vam od srca zahvaljujemo, a djeca Vam šalju veliki zagrljaj!</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span">Vi ste dokaz da,</span>
        </div>
        <div class="col-lg-8 mx-auto success_paragraph text-center">
            <span class="success_span"><b>Njihov osmijeh vrijedi više!</b></span>
        </div> 
    </div>


