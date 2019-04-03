$(document).ready(function(){
    // submitting form
     $("form").submit(function(e){
            e.preventDefault();
            console.log('test');
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveCategory(formData, tableName, page);
    });
});

// saving album
function saveCategory(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate kategoriju?", {
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
                        swal("Kategorija dodata!", "Uspješno ste dodali kategoriju!", "success").then(function(){
                                       window.location= 'proizvodi.php';
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