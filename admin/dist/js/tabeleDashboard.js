$(document).ready(function(){
   
    // loading datatbles for outdated
    $('#istekle').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      'Export Excel',
                titleAttr: 'Export Excel',
                className: 'excelTest'
            }
        ]
    } );
    
    
    
    // loading datatbles for new reservations
    $('#rezervacijeNove').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      'Export Excel',
                titleAttr: 'Excel',
                className: 'excelTest'
            }
        ]
    } );
    
    // loading datatbles for new volunteers
    $('#volonteri').DataTable( {
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

// delete Donations
function deleteSection(izbrisi){
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

// delete Volunteer
function deleteVolunteer(izbrisi){
        var id = izbrisi.prev(".rowId").val();
        var table = izbrisi.next(".tableName").val();
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
                url: 'ajaxRequests/deleteVolontera.php?delete=true',
                type: 'POST',
                data: "id="+id+"&table="+table,
                success: function (returndata) {
                     returndata = returndata.trim();
                    if(returndata !== "Success"){
                        swal(returndata);
                    }else{
                        swal("Obrisano!", "Uspješno ste obrisali volontera!", "success");
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

