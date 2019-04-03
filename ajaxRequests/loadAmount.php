<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $pol = $_POST['pol'];
    $podkategorija = $_POST['podkategorija'];
    $uzrast = $_POST['uzrast'];
    $broj = $_POST['broj'];
    $cijena = $_POST['cijena'];
    $redni = $_POST['redni'];
  

    

    $result = mysqli_prepare($connection, "SELECT a.id, a.kolicina, a.kategorija_id, b.naziv FROM proizvodi a JOIN podkategorije b ON a.podkategorija_id = b.id WHERE a.pol =? AND a.podkategorija_id=? AND a.uzrast= ? AND a.broj=? AND a.cijena = ? AND kolicina > 0");
    $result->bind_param('siiss', $pol, $podkategorija, $uzrast, $broj, $cijena);
    $result->execute();
    testQuery($result);
    
    $result->bind_result($id, $kolicina, $kategorija_id, $podkategorija_naziv);
    $result->fetch();
   
    
 ?>
     <input id="kolicina<?php echo $i ?>" type="number" class="form_input kolicina<?php echo $redni ?>" placeholder="Količina" name="kolicina" min="1" max="<?php echo $kolicina ?>" required value="<?php echo $kolicina ?>" title="kolicina">
     <span class="form_result" style="color:red; font-size:12px; display:none"></span>
     <input type="hidden" name="proizvod_id" value="<?php echo $id ?>">
     <input type="hidden" name="podkategorija_naziv" value="<?php echo $podkategorija_naziv ?>">
     <input type="hidden" name="kategorija_id" value="<?php echo $kategorija_id ?>">


                             
   

