<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $resultId = mysqli_query($connection, "SELECT * FROM kategorije ORDER BY id ASC LIMIT 1");
    if(!$resultId){
        die(mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($resultId);

    $id = $row['id'];

    $result = mysqli_prepare($connection, "SELECT DISTINCT a.kategorija_id, a.podkategorija_id, b.naziv FROM proizvodi a JOIN podkategorije b ON a.podkategorija_id=b.id WHERE a.kategorija_id=? AND a.kolicina > 0 ");
    $result->bind_param('i', $id);
    $result->execute();
    if(!$result){
        die(mysqli_error($connection));
    }
    $result->bind_result($kategorija, $podkategorija, $podkategorija_naziv);
    while($result->fetch()){
        
?>
                     
<div class="col-lg-12 subcategory ?> mt-4" onclick="addDonation(<?php echo $podkategorija ?>, '<?php echo $podkategorija_naziv ?>', <?php echo $kategorija ?>)"
     title="Odaberi">
     <input type="hidden" class="kategorija_id" value="<?php echo $kategorija ?>">
     <input type="hidden" class="podkategorija_id" value="<?php echo $podkategorija ?>">
     <span class="subcategory_name"><?php echo $podkategorija_naziv ?></span>
     
</div>

<?php } ?>