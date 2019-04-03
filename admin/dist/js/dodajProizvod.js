$(document).ready(function(){
    // submitting form
     $("form").submit(function(e){
            e.preventDefault();
            console.log('test');
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveProduct(formData, tableName, page);
    });
    
    
    // loading subcategories depending category values
    $("#kategorija").change(function(){
          loadSubcategories($(this).val());
    });
});

// saving album
function saveProduct(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate proizvod?", {
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
                url: 'ajaxRequests/'+page+'.php',
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
                        swal("Proizvod dodat!", "Uspješno ste dodali proizvod!", "success").then(function(){
                                       window.location= tableName+'.php';
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