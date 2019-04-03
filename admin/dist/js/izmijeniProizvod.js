$(document).ready(function(){
    // loading product
    loadProduct($(".player_id").val());
    
   
    
});


// function for loading news
function loadProduct(id){
      $.ajax({
          url: 'ajaxRequests/loadProduct.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving categories
function saveProduct(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite proizvod?", {
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
                url: 'ajaxRequests/changeProduct.php',
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
                        swal("Proizvod Izmijenjen!", "Uspješno ste izmijenili proizvod!", "success").then(function(){
                           loadProduct(id);
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

// function for loading news
function loadSubcategories(id){
      $.ajax({
          url: 'ajaxRequests/getSubcategories.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#subcategory_container").html(data);
          }
      });
}