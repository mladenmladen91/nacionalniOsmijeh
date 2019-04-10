$(document).ready(function() {
    // saving donation
     $("#donationForm").submit(function(e){
            e.preventDefault();
            
            var formData = new FormData($(this)[0]);
            
            addDonation(formData);
    });
    
    // loading cart
    loadCart();
    
    // loading categories
    loadIndexCategories();
    
    //loading subcategories
    loadIndexSubcategories();
    
    
});

// loading subcategories
function loadSubcategories(id, item){
         
        $(".category_active").removeClass("category_active");
    
        $(".category_number").addClass("category_number_selected");
    
        item.find(".category_number_selected").removeClass("category_number_selected");
         
        item.addClass("category_active");
    
        $.ajax({
          url: 'ajaxRequests/loadSubcategories.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#subcategories").html(data);
          }
      });
}

// loading index subcategories
function loadIndexSubcategories(){
         
    
        $.ajax({
          url: 'ajaxRequests/loadIndexSubcategories.php',
          type: 'POST',
          success: function (data) {
              $("#subcategories").html(data);
          }
      });
}

// getting the donation form
function getDonationForm(podkategorija, div){
     
     $("#strana").val("donacija_container");
    
     $("#dodajPodkategorija").val(podkategorija);
    
     $("#imeProizvoda").text(div.find(".subcategory_name").text());
    
     $("#dodajDonaciju").css({
         "visibility": "visible"
     });
    
     $("#donacija_container").css({
         "visibility": "visible"
     });
    
     loadGender(podkategorija);
}

// function for loading gender
function loadGender(id, broj, kategorija){
     $.ajax({
          url: 'ajaxRequests/loadGender.php',
          type: 'POST',
          data: "id="+id+"&broj="+broj+"&kategorija="+kategorija,
          success: function (data) {
              $("#polDonacija"+broj).html(data);
          }
      });
}

// function for loading age
function loadAge(pol, podkategorija, broj, kategorija){
    $.ajax({
          url: 'ajaxRequests/loadAge.php',
          type: 'POST',
          data: 'pol='+pol+'&podkategorija='+podkategorija+"&broj="+broj+"&kategorija="+kategorija,
          success: function (data) {
              $("#uzrastDonacija"+broj).html(data);
          }
      }); 
}

//function for loading number
function loadNumber(uzrast, pol, podkategorija, broj, kategorija){
     $.ajax({
          url: 'ajaxRequests/loadNumber.php',
          type: 'POST',
          data: 'pol='+pol+'&podkategorija='+podkategorija+'&uzrast='+uzrast+"&redni="+broj+"&kategorija="+kategorija,
          success: function (data) {
              $("#brojDonacija"+broj).html(data);
          }
      });
}

//function for loading number
function loadPrice(uzrast, pol, podkategorija, broj, redni){
     $.ajax({
          url: 'ajaxRequests/loadPrice.php',
          type: 'POST',
          data: 'pol='+pol+'&podkategorija='+podkategorija+'&uzrast='+uzrast+'&broj='+broj+"&redni="+redni,
          success: function (data) {
              $("#cijenaDonacija"+redni).html(data);
          }
      });
}

//function for loading popup
function loadPopup(){
     $.ajax({
          url: 'ajaxRequests/loadPopup.php',
          type: 'POST',
          success: function (data) {
              $("#pregledajDonaciju").html(data);
          }
      });
}

// function for loading amount
function loadAmount(uzrast, pol, podkategorija, broj, cijena, redni){
       $.ajax({
          url: 'ajaxRequests/loadAmount.php',
          type: 'POST',
          data: 'pol='+pol+'&podkategorija='+podkategorija+'&uzrast='+uzrast+'&broj='+broj+'&cijena='+cijena+'&redni='+redni,
          success: function (data) {
              $("#kolicinaDonacija"+redni).html(data);
          }
      });
}

// adding donation to cart
function addDonation(podkategorija_id, podkategorija_naziv, kategorija_id){
        
              $.ajax({
                url: 'ajaxRequests/addDonation.php',
                type: 'POST',
                data:"podkategorija_id="+podkategorija_id+"&podkategorija_naziv="+podkategorija_naziv+"&kategorija_id="+kategorija_id,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        
                    }else{
                        
                        // loading categories
                        loadCategories();
    
                        $("#subcategories").html("");
                        
                        loadCart();
                        
                        loadPopup();
                        
                        loadButton();
                        
                        
                        
                   }
                }
            });
            
                        
          
            return false;  
}

// loading cart
function loadCart(){
    $.ajax({
          url: 'ajaxRequests/loadCart.php',
          type: 'POST',
          success: function (data) {
              $("#korpa").html(data);
          }
      });
}

// loading cart
function loadButton(){
    $.ajax({
          url: 'ajaxRequests/loadButton.php',
          type: 'POST',
          success: function (data) {
              $("#donate_button").html(data);
          }
      });
}

// deleting items from cart
function deleteCart(id, item){
    $.ajax({
          url: 'ajaxRequests/deleteCart.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
             
              loadCart();
              loadCategories();
              loadPopup();
              
              loadButton();
              
              
              $("#subcategories").html("");
              
              
          }
      });
}

// loading categories
function loadCategories(){
    $.ajax({
          url: 'ajaxRequests/loadCategories.php',
          type: 'POST',
          success: function (data) {
              $("#kategorije").html(data);          
          }
      });
}

// loading categories
function loadIndexCategories(){
    $.ajax({
          url: 'ajaxRequests/loadIndexCategories.php',
          type: 'POST',
          success: function (data) {
              $("#kategorije").html(data);          
          }
      });
}

// closing donation
function closeDonation( zatvori, otvori){
     zatvori.css({
        "visibility": "hidden"
    });
    
   
    otvori.css({
        "visibility": "visible"
    });
}

// closing popup
function closePopup(zatvori){
    
    $(".naziv").next(".form_result").css({
            "display": "none"
    });
    
    $(".naziv").val("");
    
    $(".email").next(".form_result").css({
            "display": "none"
    });
    
    $(".email").val("");
    
    $(".telefon").next(".form_result").css({
            "display": "none"
    });
    
    $(".telefon").val("");
    
    $(".subjekt").prop("checked", false);
    
    $('#subjekt_result').css({
            "display": "none"
    });
    
    zatvori.closest(".close_donation").css({
         "visibility": "hidden"
     });
    
    zatvori.closest(".popup").css({
         "visibility": "hidden"
     });
    
     
    
    $("form").trigger("reset");
}


// function for the next step
function goNext(zatvori, otvori){
   
    // checking form fields
    if(!$('.subjekt').is(':checked')){
        $('#subjekt_result').css({
            "display": "block"
        });
        $('#subjekt_result').text('Odaberite subjekt');
        
    }else if($(".naziv").val().trim() == ''){
          $('.naziv').next('.form_result').css({
            "display": "block"
          });
        
          $('.naziv').focus();
        
          $('.naziv').next('.form_result').text("Upišite Vaše ime");
        
    }else if($(".email").val().trim() == ''){
          $('.email').next('.form_result').css({
            "display": "block"
          }); 
        
          $('.email').focus();
        
          $('.email').next('.form_result').text("Upišite Vaš e-mail");
        
    }else if($(".telefon").val().trim() == ''){
          $('.telefon').next('.form_result').css({
            "display": "block"
          }); 
        
          $('.telefon').focus();
        
          $('.telefon').next('.form_result').text("Upišite Vaš telefon");
        
    }else{
    
    $("#stranaDonator").val("donator_review");
        
    $('.telefon').next('.form_result').text("");
    $('.naziv').next('.form_result').text("");
    $('.email').next('.form_result').text("");    
        
    loadFinalCart();    
    
    zatvori.css({
         "visibility": "hidden"
     });
    
    otvori.css({
         "visibility": "visible"
     });
        
    $("#pregledajDonaciju").scrollTop(0);    
        
    }
}

// function for the next step
function goPrev(zatvori, otvori, stranica){
    $("#stranaDonator").val(stranica);
    
    
    $(".naziv").next(".form_result").css({
            "display": "none"
    });
    
    
    $(".email").next(".form_result").css({
            "display": "none"
    });
    
    
    $(".telefon").next(".form_result").css({
            "display": "none"
    });
    
     $('#subjekt_result').css({
            "display": "none"
    });
    
    zatvori.css({
         "visibility": "hidden"
     });
    
    otvori.css({
         "visibility": "visible"
     });
}

// load final step cart
function loadFinalCart(){
    $.ajax({
          url: 'ajaxRequests/loadFinalCart.php',
          type: 'POST',
          success: function (data) {
              $("#cart_info").html(data);
          }
      });
}

// saving complete donation
function saveDonation(formData){
    
          swal("Jeste li sigurni da želite da rezervišete donaciju?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Rezerviši donaciju",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
        
              $.ajax({
                url: 'ajaxRequests/saveDonation.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                         $('#informacije_forma').css({
                             "visibility": "visible"
                        });
                        
                        $("#donator_review").css({
                              "visibility": "hidden"
                         });
                        
    
                        if(returndata === 'naziv'){
                            
                           
                            $(".naziv").focus();
                            $(".naziv").next(".form_result").text("Unesite validan naziv");
                            $(".naziv").next(".form_result").css({"display": "block"});
                        }else if(returndata === 'email'){
                            $(".email").focus();
                            $(".email").next(".form_result").text("Unesite validnu e-mail adresu");
                            $(".email").next(".form_result").css({"display": "block"});
                        }else if(returndata === 'telefon'){
                            $(".telefon").focus();
                            $(".telefon").next(".form_result").text("Unesite validan broj telefona (samo brojevi)");
                            $(".telefon").next(".form_result").css({"display": "block"});
                        }else{
                            $("#mail_result").text(returndata);
                            $("#mail_result").css({"display": "block"});
                            
                        }
                        
                    }else{
                        
                        $("#donator_review").css({
                            "visibility": "hidden"
                         });
                        
                        $("#pregledajDonaciju").css({
                            "height": "100vh",
                         })
                        
                        $("#uspjesna_rezervacija").css({
                            "visibility": "visible"
                         });
                        
                        $("#pregledajDonaciju").scrollTop(0);
                    }
                }
            });
            
             break;
                    default:
                        swal("Rezervacija je otkazana.");
                }
            });            
          
            return false;  
}

// adding particular donations
function addParticularDonation(redni, formData, otvori, stranica){
    
           $.ajax({
                url: 'ajaxRequests/saveParticularDonation.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        $(".form_result").css({"display": "none"});
                        var message = returndata.split(",");
                           $("."+message[0]+redni).focus();
                           $("."+message[0]+redni).next(".form_result").css({"display": "block"});
                           $("."+message[0]+redni).next(".form_result").text(message[1]);
                         
                    }else{
                        
                        $("#stranaDonator").val(stranica);
                        
                        $("#donacija_container"+redni).css({
                            "visibility": "hidden"
                        });
    
                       otvori.css({
                            "visibility": "visible"
                       });
                        
                       $("#pregledajDonaciju").scrollTop(0);    
                    }
                }
            });
    
    
         
}


