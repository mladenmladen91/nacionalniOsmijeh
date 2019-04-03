<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $pol = $_POST['pol'];
    $podkategorija = $_POST['podkategorija'];
    $uzrast = $_POST['uzrast'];
    $redni = $_POST['redni'];
    $kategorija = $_POST['kategorija'];

    $result = mysqli_prepare($connection, "SELECT DISTINCT broj FROM proizvodi WHERE pol =? AND podkategorija_id=? AND uzrast= ? AND kolicina > 0");
    $result->bind_param('sii', $pol, $podkategorija, $uzrast);
    $result->execute();
    testQuery($result);
    $result->bind_result($broj);
    
   

 ?>
      <select style="-webkit-appearance: none !important" id="brojSelekt<?php echo $_POST['redni'] ?>" class="form_select broj<?php echo $redni ?>" name="broj" title="broj">
          <option selected >Broj</option>
           <?php  while($result->fetch()){  
                 if($pol == 'oboje' || $kategorija == 11 || $kategorija == 12){
           ?>
                <option value="<?php echo $broj ?>" selected><?php echo $broj ?></option>
           <?php 
                 break;
                 }else{ ?>
            <option value="<?php echo $broj ?>"><?php echo $broj ?></option>            
            <?php
                
                } 
             }
          ?>
      </select>
      <span class="form_result" style="color:red; font-size:12px; display:none"></span>
<script>
$(document).ready(function(){
    if('<?php echo $pol ?>' == 'oboje' || <?php echo $kategorija ?> == 11 || <?php echo $kategorija ?> == 12){
        loadPrice(<?php echo $uzrast ?>,'<?php echo $pol ?>',<?php echo $podkategorija ?>, $("#brojSelekt<?php echo $_POST['redni'] ?>").val(), <?php echo $redni ?>);
        
        $("#brojSelekt<?php echo $_POST['redni'] ?>").css({
            "display": "none"
        });
        
    }
    
    
     $("#brojSelekt<?php echo $_POST['redni'] ?>").change(function(){
         loadPrice(<?php echo $uzrast ?>,'<?php echo $pol ?>',<?php echo $podkategorija ?>, $("#brojSelekt<?php echo $_POST['redni'] ?>").val(), <?php echo $redni ?>);
     });
    
});

</script>


                             
   

