<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $pol = $_POST['pol'];
    $podkategorija = $_POST['podkategorija'];
    $broj = $_POST['broj'];
    $kategorija = $_POST['kategorija'];

    $result = mysqli_prepare($connection, "SELECT DISTINCT uzrast FROM proizvodi WHERE pol =? AND podkategorija_id=? AND kolicina > 0");
    $result->bind_param('si', $pol, $podkategorija);
    $result->execute();
    testQuery($result);
    $result->bind_result($uzrast);
    
   

 ?>
      <select id="uzrast<?php echo $broj ?>" style="-webkit-appearance: none !important" class="form_select uzrast<?php echo $broj ?>" name="uzrast" title="uzrast">
          <option selected>Uzrast</option>
           <?php  while($result->fetch()){  
                 if($pol == 'oboje' || $_POST['kategorija']  == 11 || $_POST['kategorija'] == 12){
           ?>
                 <option value="<?php echo $uzrast ?>" selected><?php echo $uzrast ?></option>
           <?php 
                 break;
                 }else{ ?>
            <option value="<?php echo $uzrast ?>"><?php echo $uzrast ?></option>            
           <?php
                
                } 
             }
          ?>
      </select>
      <span class="form_result" style="color:red; font-size:12px; display:none"></span>
<script>
$(document).ready(function(){
    if('<?php echo $pol ?>' == 'oboje' || <?php echo $kategorija ?> == 11 || <?php echo $kategorija ?> == 12){
        
        $("#uzrast<?php echo $broj ?>").css({
            "display": "none"
        });
        
        loadNumber($("#uzrast<?php echo $broj ?>").val(),'<?php echo $pol ?>',<?php echo $podkategorija ?>, <?php echo $broj ?>, <?php echo $kategorija ?>);
        
        
        
    }
    
     $("#uzrast<?php echo $broj ?>").change(function(){
         loadNumber($("#uzrast<?php echo $broj ?>").val(),'<?php echo $pol ?>',<?php echo $podkategorija ?>, <?php echo $broj ?>, <?php echo $kategorija ?>);
     })
    
});

</script>

                             
   

