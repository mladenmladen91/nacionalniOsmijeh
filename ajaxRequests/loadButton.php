<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

      
?>


<?php
       if(sizeof($_SESSION['cart']) > 0){
   

 ?>
      <span id="doniraj" class="form_btn doniraj_btn" style="max-width: 100% !important; text-align:center;" >DONIRAJ</span>
<?php } ?>                                     

<script>
$(document).ready(function(){
    $("#doniraj").click(function(){
        
         $("#stranaDonator").val("donacija_container0");
        
         $('#pregledajDonaciju').css({
             "visibility": "visible"
         });
        
         $(".popup_container").css({
             "visibility": "hidden"
         });
    
        $('#pregledajDonaciju').find(".first_donation").css({
             "visibility": "visible"
         });
        
       
        
        
    }); 
});
</script>    

</script>

                             
   

