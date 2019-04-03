$(document).ready(function(){
    loadCategory($(".player_id").val());
    
});


// function for loading news
function loadCategory(id){
      $.ajax({
          url: 'ajaxRequests/loadCategory.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving categories
function saveCategory(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite kategoriju?", {
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
                 if(document.getElementById('fotografija').files[0].size > 8388608){
                  $("#fotografija").focus(); 
                  $("#fotografija").next(".form_result").css({"display": "block"});
                   $("#fotografija").next(".form_result").text("Veličina fotografije ne može biti veća od 8MB");
                 }else{         
                        
              $.ajax({
                url: 'ajaxRequests/changeCategory.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        $(".form_result").css({"display": "none"});
                        $(".text_result").css({"display": "none"});
                        
                        var message = returndata.split(",");
                           $("."+message[0]).focus();
                           $("."+message[0]).next(".form_result").css({"display": "block"});
                           $("."+message[0]).next(".form_result").text(message[1]);
                        
                        
                    }else{
                        swal("Kategorija Izmijenjena!", "Uspješno ste izmijenili kategoriju!", "success").then(function(){
                           loadCategory(id);
                        });
                      
                    }
                }
            });
                 }
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                       
                }
             
            });
                
            return false;
            
}