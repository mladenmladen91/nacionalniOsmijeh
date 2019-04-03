$(document).ready(function(){
    $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
    
    // submiting form for adding news
    $(".contact_form").submit(function(e){
            e.preventDefault();
        
            var about = document.querySelector('input[name=tekst]');
            about.value = quill.root.innerHTML.trim();
            
            var tableName = $(".tableName").val();
            var page = $(".pageName").val();
            var formData = new FormData($(this)[0]);
            
            saveData(formData, tableName, page);
    });
});

// saving news
function saveData(formData, tableName, page){
    
    
     if(tableName === 'vijesti'){    
        swal("Jeste li sigurni da želite da dodate vijest?", {
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
                        $(".text_result").css({"display": "none"});
                        
                        if(returndata === "tekst,Popunite polje validnim tekstom"){
                           var message = returndata.split(",");
                            
                           $(".text_result").css({"display": "block"});     
                           $(".text_result").text(message[1]);    
                           
                        }else{
                          var message = returndata.split(",");
                           $("."+message[0]).focus();
                           $("."+message[0]).next(".form_result").css({"display": "block"});
                           $("."+message[0]).next(".form_result").text(message[1]);
                        }
                       
                    }else{
                        swal("Vijest dodata!", "Uspješno ste dodali vijest!", "success").then(function(){
                                     window.location= tableName+'.php';
                                     
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
     }else{
          swal("Jeste li sigurni da želite da dodate post?", {
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
                        $(".text_result").css({"display": "none"});
                        
                        if(returndata === "tekst,Popunite polje validnim tekstom"){
                           var message = returndata.split(",");
                            
                           $(".text_result").css({"display": "block"});     
                           $(".text_result").text(message[1]);    
                           
                        }else{
                          var message = returndata.split(",");
                           $("."+message[0]).focus();
                           $("."+message[0]).next(".form_result").css({"display": "block"});
                           $("."+message[0]).next(".form_result").text(message[1]);
                        }
                       
                    }else{
                        swal("Post dodat!", "Uspješno ste dodali post!", "success").then(function(){
                                     window.location= tableName+'.php';
                                     
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
}