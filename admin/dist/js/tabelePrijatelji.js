$(document).ready(function(){
    loadFriends();
    

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
                url: 'ajaxRequests/deletePrijatelja.php?delete=true',
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

//loading friends
function loadFriends(){
    $.ajax({
                url: 'ajaxRequests/loadFriends.php',
                type: 'POST',
                success: function (returndata) {
                    $(".friends_container").html(returndata);
                }
                
      });
}

// function for activating friend
function status(status, table, id){
     $.ajax({
                url: 'ajaxRequests/activateRow.php',
                type: 'POST',
                data: "status="+status+"&table="+table+"&id="+id,
                success: function () {
                    loadFriends();
                }
      });
}
