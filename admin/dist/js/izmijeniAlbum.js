$(document).ready(function(){
    loadAlbum($(".player_id").val());
    $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
});


// function for loading news
function loadAlbum(id){
      $.ajax({
          url: 'ajaxRequests/loadAlbum.php',
          type: 'POST',
          data: 'id='+id,
          success: function (data) {
              $("#change_news").html(data);
          }
      });
}

// function for saving albums
function saveAlbum(formData, id){
     
         swal("Jeste li sigurni da želite da izmijenite album?", {
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
                url: 'ajaxRequests/changeAlbum.php',
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
                        swal("Album Izmijenjen!", "Uspješno ste izmijenili album!", "success").then(function(){
                           loadAlbum(id);
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