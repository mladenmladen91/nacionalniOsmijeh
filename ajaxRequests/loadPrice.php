<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $pol = $_POST['pol'];
    $podkategorija = $_POST['podkategorija'];
    $uzrast = $_POST['uzrast'];
    $broj = $_POST['broj'];
    $redni = $_POST['redni'];
    

    $result = mysqli_prepare($connection, "SELECT DISTINCT cijena FROM proizvodi WHERE pol =? AND podkategorija_id=? AND uzrast= ? AND broj=? AND kolicina > 0");
    $result->bind_param('siis', $pol, $podkategorija, $uzrast, $broj);
    $result->execute();
    testQuery($result);
    $result->bind_result($cijena);
    
   

 ?>
      <select style="-webkit-appearance: none !important" id="cijenaSelekt<?php echo $redni ?>" class="form_select cijena<?php echo $redni ?>" name="cijena" title="cijena">
          <option selected >Cijenovni raspon</option>
           <?php  while($result->fetch()){  ?>
            <option value="<?php echo $cijena ?>"><?php echo $cijena ?></option>            
           <?php } ?>
      </select>
      <span class="form_result cijena" style="color:red; font-size:12px; display:none"></span>
<script>
$(document).ready(function(){
     $("#cijenaSelekt<?php echo $redni ?>").change(function(){
         loadAmount(<?php echo $uzrast ?>,'<?php echo $pol ?>',<?php echo $podkategorija ?>, '<?php echo $broj ?>', $("#cijenaSelekt<?php echo $redni ?>").val(), <?php echo $redni ?>);
     });
    
});

</script>



                             
   

