$(document).ready(function() {
    // loading datepicker
    $("#datum").datepicker({ dateFormat: 'dd-mm-yy' });
    
    // saving donation
     $("#donationForm").submit(function(e){
            e.preventDefault();
            
            var formData = new FormData($(this)[0]);
            
            saveVolunteer(formData);
    });
    
    
    // opening volunteer popup
    $("#pridruzi").click(function(){
        $(".popup").css({
            "visibility": "visible"
        });
        
        $("#donator_forma").css({
            "visibility": "visible"
        });
    });
    
    // closing volunteer popup
    $("#licne_zatvori").click(function(){
        $("#donator_forma").css({
            "visibility": "hidden"
        });   
        
        $(".popup").css({
            "visibility": "hidden"
        });
    
     
    
         $("form").trigger("reset");
    });
    
    
});


// closing popup
function closePopup(zatvori){
    
    
    zatvori.closest(".close_donation").css({
         "visibility": "hidden"
     });
    
    zatvori.closest(".popup").css({
         "visibility": "hidden"
     });
    
     
    
    $("form").trigger("reset");
}


// saving complete donation
function saveVolunteer(formData){
    
          swal("Jeste li sigurni da želite da se prijavite za volontera?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Postani volonter",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
        
              $.ajax({
                url: 'ajaxRequests/saveVolunteer.php',
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
                           $("."+message[0]).focus();
                           $("."+message[0]).next(".form_result").css({"display": "block"});
                           $("."+message[0]).next(".form_result").text(message[1]);
                        
                    }else{
                        
                        $("#donator_forma").css({
                            "visibility": "hidden"
                         });
                        
                        $("#uspjesna_rezervacija").css({
                            "visibility": "visible"
                         });
                        
                        $("#pregledajDonaciju").scrollTop(0);
                        
                       
                    }
                }
            });
            
             break;
                    default:
                        swal("Prijava je otkazana.");
                }
            });            
          
            return false;  
}


