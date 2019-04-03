$(document).ready(function(){
    loadFriend($(".player_id").val());
    
});


// function for loading news
function loadFriend(id){
      $.ajax({
          url: 'ajaxRequests/loadFriend.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving albums
function saveFriend(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite prijatelja?", {
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
                        
                 if(document.getElementById('fotografija').files[0] !== undefined ){
                   if(document.getElementById('fotografija').files[0].size > 8388608){ 
                   
                   $("#fotografija").focus(); 
                  $("#fotografija").next(".form_result").css({"display": "block"});
                   $("#fotografija").next(".form_result").text("Veličina fotografije ne može biti veća od 8MB");
              
                }else{
                    
                $.ajax({
                url: 'ajaxRequests/changePrijatelja.php',
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
                        swal("Prijatelj Izmijenjen!", "Uspješno ste izmijenili prijatelja!", "success").then(function(){
                           loadFriend(id);
                        });
                      
                    }
                   }
               });
               
              }
                   
             }else{
                        
              $.ajax({
                url: 'ajaxRequests/changePrijatelja.php',
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
                        swal("Prijatelj Izmijenjen!", "Uspješno ste izmijenili prijatelja!", "success").then(function(){
                           loadFriend(id);
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