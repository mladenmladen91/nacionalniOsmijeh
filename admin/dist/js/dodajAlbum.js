$(document).ready(function(){
    // enabling datepicker
    $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
    
    // submitting form
     $("form").submit(function(e){
            e.preventDefault();
            console.log('test');
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveAlbum(formData, tableName, page);
    });
});

// saving album
function saveAlbum(formData, tableName, page){
        
        swal("Jeste li sigurni da želite da dodate album?", {
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
                        swal("Album dodat!", "Uspješno ste dodali album!", "success").then(function(){
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