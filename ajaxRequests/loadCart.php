<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    
?>


<?php
       for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
   

 ?>
      <div class="col-lg-12 px-0 py-2 bucket_product" title="Obriši">
         <span class="bucket_item"><?php echo $_SESSION['cart'][$i][2] ?></span> 
         <span class="bucket_close">&times;</span>
         <input class="donation_number" type="hidden" value="<?php echo $i ?>">  
      </div>
<?php } ?>                                     

<script>
$(document).ready(function(){
    // deleting from cart
     $(".bucket_product").click(function(){
          deleteCart($(this).find(".donation_number").val(), $(this));
         
     }); 
});

</script>

                             
   

