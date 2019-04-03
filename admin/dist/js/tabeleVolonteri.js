$(document).ready(function(){
    // loading datatables
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




