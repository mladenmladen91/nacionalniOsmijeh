

// saving photo
function savePhoto(formData, id){
     
         swal("Jeste li sigurni da želite da dodate fotografiju?", {
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
                        
                 if(document.getElementById('fotka').files[0].size > 8388608){
                  swal("Veličina fotografije ne može biti veća od 8MB");
                 }else{         
                        
              $.ajax({
                url: 'ajaxRequests/sacuvajFotografiju.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                        
                    }else{
                        swal("Fotografija dodata!", "Uspješno ste dodali fotografiju!", "success").then(function(){
                           window.location = "pregledAlbuma.php?id="+id;
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
// photo deleting
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var photo = izbrisi.next(".photoName").val();
        swal("Jeste li sigurni da želite da obrišete?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Ok",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
              $.ajax({
                url: 'ajaxRequests/deletePhoto.php',
                type: 'POST',
                data: "id="+id+"&photo="+photo,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali sekciju!", "success");
                        izbrisi.closest(".photoRow").remove();
                        
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}


// photo deleting
function coverPhoto(id){
       var photo = $('input[name=cover]:checked').val();
      
       
        swal("Jeste li sigurni da želite da promijenite naslovnu fotografiju?", {
                buttons: {
                    cancel: "Ne",
                    catch: {
                        text: "Obriši?",
                        value: "catch",
                    },

                },
            })
                .then((value) => {
                switch (value) {
                    case "catch":
               if(photo == undefined){
                    swal("Morate da odaberete neku fotografiju");
               }else{            
                        
              $.ajax({
                url: 'ajaxRequests/coverPhoto.php',
                type: 'POST',
                data: "photo="+photo+"&album_id="+id,
                success: function (returndata) {
                    returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Promijenjeno!", "Uspješno ste promijenili!", "success");
                    }
                }
            });
            
             }
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}