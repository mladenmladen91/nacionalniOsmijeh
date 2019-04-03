
<div class="section kontakt_container">
    <div class="container">
        <div class="col-lg-12" style="margin-top: 100px;margin-bottom: 50px">
            <div class="row">
                <div class="col-lg-6" style="position:relative; margin-bottom: 150px">
                    <div class="col-lg-12" style="padding-bottom: 40px">
                        <span class="contact_title">Kontaktiraj nas</span>
                    </div>
                    
                    <div class="col-lg-12">
                       <div class="row">
                           <div class="col-xl-1 col-lg-2 col-sm-2"><img src="images/sara.svg"
     class="img-responsive" width="52" height="10" style="margin-bottom: 20px;"></div>
                           <div class="col-xl-6 col-lg-12 col-sm-10 px-4" >
                                 <span class="article_content">Ukoliko imaš neko pitanje, sugestiju ili primjedbu
za nas, slobodno nam se obrati, a mi ćemo u najkraćem roku odgovoriti.</span>
                           </div>
                           <div class="col-xl-10 col-lg-12">
                               <form class="contact_form px-0" id="infoForm">
                                 <div class="col-lg-12 col-12">
                                     <div class="row">
                                         <div class="col-lg-6 col-md-6 form-group" style="margin-top: 50px !important">
                                             
                                             <input id="ime" type="text" name="ime" class="contact_inputs form-control form-control-lg ime" placeholder="Ime i prezime" required maxlength="70">
                                             <span class="kontakt_result" style="color:red; font-size:12px; display:none"></span>
                                         </div>
                                         
                                         <div class="col-lg-6 col-md-6 form-group" style="margin-top: 50px !important">
                                             
                                             <input id="email" type="email" name="email" placeholder="E-mail" class="contact_inputs form-control form-control-lg email" required maxlength="70">
                                             <span class="kontakt_result" style="color:red; font-size:12px; display:none"></span>
                                         </div>
                                     </div>     
                                 </div>
                                 <div class="col-lg-12 mb-4" style="margin-top: 50px !important">
                                             
                                             <textarea id="poruka" class="contact_inputs form-control form-control-lg poruka" name="poruka" style="resize:vertical;" placeholder="Poruka" required maxlength="300"></textarea>
                                             <span class="kontakt_result" style="color:red; font-size:12px; display:none"></span>
                                 </div>
                                 <div class="col-sm-10 col-12 mt-2 mb-4">
                             <span style="color:red; font-size:12px" id="mailResult"></span>
                         </div>
                                 <div class="col-12 " style="margin-top: 77px">
                                     <button class="form_btn"  type="submit">Pošalji</button>
                                 </div>
                             </form>    
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="position:relative; margin-bottom: 150px position:relative">
                      <div class="col-lg-12" style="padding-bottom: 40px">
                        <span class="contact_title">Adresa</span>
                    </div>
                     <div class="col-lg-12 pl-4">
                        <div class="col-lg-12 map_address p-0">Ekonomski fakultet, Ul. Jovana Tomaševića br. 37, Podgorica</div>  
                        <div class="col-lg-12 p-0 map_holder" id="map" style="border: 1px solid #dddddd;width:100%;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2944.1214633030772!2d19.25471301545911!3d42.44643167918118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134deb35c8214c3b%3A0x59aec6910b56aa43!2s37+Bulevar+Jovana+Toma%C5%A1evi%C4%87a%2C+Podgorica!5e0!3m2!1sen!2s!4v1553688738945" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                       </div>
                     </div>
                    <div class="col-lg-10 address_decoration"></div>
                     
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
$(document).ready(function(){
    // submitting form
     $("#infoForm").submit(function(e){
            e.preventDefault();
           
         var formData = new FormData($(this)[0]);
            
            saveProduct(formData);
    });
});

// saving album
function saveProduct(formData){
        $.ajax({
                url: 'ajaxRequests/kontaktMail.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata === "ime,Unesite validan tekst" || returndata === "email,Unesite validan tekst" || returndata === "poruka,Unesite validan tekst"){
                        $(".kontakt_result").css({"display": "none"});
                        var message = returndata.split(",");
                           $("."+message[0]).focus();
                           $("."+message[0]).next(".kontakt_result").css({"display": "block"});
                           $("."+message[0]).next(".kontakt_result").text(message[1]);
                        
                       
                    }else{
                         $("#mailResult").text(returndata);
                    }
                }
            });
            
              
}   



</script>
