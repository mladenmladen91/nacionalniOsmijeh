$(document).ready(function(){
    loadDonor($(".donation_id").val());
    
});


// function for loading news
function loadDonor(id){
      $.ajax({
          url: 'ajaxRequests/loadDonation.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving categories
function saveDonor(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite donaciju?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Sačuvaj izmjene",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
              $.ajax({
                url: 'ajaxRequests/changeDonation.php',
                type: 'POST',
                data: formData,
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
                        swal("Donacija Izmijenjena!", "Uspješno ste izmijenili donaciju!", "success").then(function(){
                           loadDonor(id);
                        });
                      
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                       
                }
             
            });
                
            return false;
            
}