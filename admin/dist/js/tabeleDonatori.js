$(document).ready(function(){
    loadDonations($(".product").val());
    
    $(".delete_btn").click(function(){
        deleteSection($(this));
    });
    
    
    
});



// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var proizvod = izbrisi.closest("td").find(".proizvod").val();
        var kolicina = izbrisi.closest("td").find(".kolicina").val();
        var status = izbrisi.closest("td").find(".status").val();
        var datum = izbrisi.closest("td").find(".datum").val();
       
    
        swal("Jeste li sigurni da želite da obrišete?", {
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
              $.ajax({
                url: 'ajaxRequests/deleteDonaciju.php?delete=true',
                type: 'POST',
                data: "id="+id+"&proizvod="+proizvod+"&kolicina="+kolicina+"&status="+status+"&datum="+datum,
                success: function (returndata) {
                     returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali sekciju!", "success");
                        izbrisi.closest(".tableRow").remove();
                        
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}

// saving donor
function saveDonor(formData, id){
     
         swal("Jeste li sigurni da želite da dodate donaciju?", {
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
                url: 'ajaxRequests/sacuvajDonatora.php',
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
                        swal("Donacija dodata!", "Uspješno ste dodali donaciju!", "success").then(function(){
                           window.location = "donatori.php?id="+id;
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

function status(status, id, product){
    
     $.ajax({
                url: 'ajaxRequests/donateStatus.php',
                type: 'POST',
                data: "status="+status+"&id="+id,
                 success: function () {
                     loadDonations(product);
                 }
      });
}
function loadDonations(id){
    $.ajax({
                url: 'ajaxRequests/loadDonations.php',
                type: 'POST',
                data: "id="+id,
                success: function (returndata) {
                    $(".donacije").html(returndata);
                }
                
      });
}