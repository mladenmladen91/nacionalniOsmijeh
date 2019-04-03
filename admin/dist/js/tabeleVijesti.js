$(document).ready(function(){
    
    loadNews($(".table").val());
    
    
    
    
    
});



// delete function
function deleteSection(izbrisi){
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
                url: 'ajaxRequests/deleteVijesti.php?delete=true',
                type: 'POST',
                data: "id="+id+"&table="+table,
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

function loadNews(table){
    $.ajax({
                url: 'ajaxRequests/loadNews.php',
                type: 'POST',
                data: "table="+table,
                success: function (returndata) {
                    $(".vijesti_container").html(returndata);
                }
                
      });
}



function status(status, table, id){
     $.ajax({
                url: 'ajaxRequests/activateRow.php',
                type: 'POST',
                data: "status="+status+"&table="+table+"&id="+id,
                success: function(){
                    loadNews(table);
                }
      });
}