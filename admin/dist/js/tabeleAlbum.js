$(document).ready(function(){
    loadAlbums();
    
    $(".delete_btn").click(function(){
        deleteSection($(this));
    });
    
    
    
});



// delete function
function deleteSection(izbrisi){
        var id = izbrisi.prev(".rowId").val();
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
                url: 'ajaxRequests/deleteAlbum.php?delete=true',
                type: 'POST',
                data: "id="+id,
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

function loadAlbums(){
    $.ajax({
                url: 'ajaxRequests/loadAlbums.php',
                type: 'POST',
                success: function (returndata) {
                    $(".albums_container").html(returndata);
                }
                
      });
}

function status(status, table, id){
     $.ajax({
                url: 'ajaxRequests/activateRow.php',
                type: 'POST',
                data: "status="+status+"&table="+table+"&id="+id,
                success: function (returndata) {
                    loadAlbums();
                }
      });
}