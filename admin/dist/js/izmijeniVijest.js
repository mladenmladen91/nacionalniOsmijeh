$(document).ready(function(){
    loadNews($(".player_id").val(), $(".tableName").val());
    $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
});

// function for loading news
function loadNews(id,table){
      $.ajax({
          url: 'ajaxRequests/loadVijest.php',
          type: 'POST',
          data: 'id='+id+"&table="+table,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving news
function saveNews(formData, id, table){
     
         swal("Jeste li sigurni da želite da izmijenite objavu?", {
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
                url: 'ajaxRequests/changeVijest.php',
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
                        swal("Objava Izmijenjena!", "Uspješno ste izmijenili objavu!", "success").then(function(){
                           loadNews(id, table);
                        });
                      
                    }
                }
            });
               }
                   
                 }else{          
                        
              $.ajax({
                url: 'ajaxRequests/changeVijest.php',
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
                        swal("Objava Izmijenjena!", "Uspješno ste izmijenili objavu!", "success").then(function(){
                           loadNews(id, table);
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