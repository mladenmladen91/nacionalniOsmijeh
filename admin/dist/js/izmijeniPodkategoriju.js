$(document).ready(function(){
    loadCategory($(".player_id").val());
    
});


// function for loading news
function loadCategory(id){
      $.ajax({
          url: 'ajaxRequests/loadSubcategory.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving categories
function saveCategory(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite podkategoriju?", {
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
                url: 'ajaxRequests/changeSubcategory.php',
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
            
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                       
                }
             
            });
                
            return false;
            
}