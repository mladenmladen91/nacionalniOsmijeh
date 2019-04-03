$(document).ready(function(){
    
  // deleting donor
    $(".deleteDonor").click(function(e){
        e.preventDefault();
        
        deleteSection($(this));
    });
    
    
    // loading datatables donor 
    $('#donator').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      'Export Excel',
                className: 'excelTest',
                titleAttr: 'Excel'
            }
        ]
    } );

    
});

// saving donation
function saveDonation(formData, id){
     
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
                url: 'ajaxRequests/sacuvajDonaciju.php',
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
                           window.location = "donator.php?id="+id;
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


// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var proizvod = izbrisi.closest("td").find(".proizvod").val();
        var status = izbrisi.closest("td").find(".status").val();
        var kolicina = izbrisi.closest("td").find(".kolicina").val();
       
    
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
                url: 'ajaxRequests/deleteDonatora.php?delete=true',
                type: 'POST',
                data: "id="+id+"&proizvod="+proizvod+"&kolicina="+kolicina+"&status="+status,
                success: function (returndata) {
                     returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali sekciju!", "success").then(function(){
                            window.location = "evidencija.php";
                        });
                        
                        
                    }
                }
            });
            
             break;
                    default:
                        swal("Podaci su nepromijenjeni.");
                }
            }); 
}

// delete Donations
function deleteDonation(izbrisi){
        var id = izbrisi.prev(".rowId").val();
    console.log(id);
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
                        swal("Obrisano!", "Uspješno ste obrisali donaciju!", "success");
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
