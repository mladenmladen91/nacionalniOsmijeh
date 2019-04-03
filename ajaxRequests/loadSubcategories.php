<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $id = $_POST['id'];

    $result = mysqli_prepare($connection, "SELECT DISTINCT a.kategorija_id, a.podkategorija_id, b.naziv FROM proizvodi a JOIN podkategorije b ON a.podkategorija_id=b.id WHERE a.kategorija_id=? AND a.kolicina > 0 ");
    $result->bind_param('i', $id);
    $result->execute();
    if(!$result){
        die(mysqli_error($connection));
    }
    $result->bind_result($kategorija, $podkategorija, $podkategorija_naziv);
    while($result->fetch()){
         $broj = 0; 
          if(isset($_SESSION['cart'])){                     
         foreach($_SESSION['cart'] as $item){
             if($podkategorija == $item[1]){
                $broj++;
                                      
             }
         }
        }
?>
                     
<div class="col-lg-12 <?php echo($broj > 0)? 'subcategory_active':'subcategory' ?> mt-4"  
    <?php if($broj == 0){ ?>  
     onclick="addDonation(<?php echo $podkategorija ?>, '<?php echo $podkategorija_naziv ?>', <?php echo $kategorija ?>)"
     title="Odaberi"
    <?php } ?> 
     >
     <input type="hidden" class="kategorija_id" value="<?php echo $kategorija ?>">
     <input type="hidden" class="podkategorija_id" value="<?php echo $podkategorija ?>">
     <span class="subcategory_name"><?php echo $podkategorija_naziv ?></span>
     <?php if($broj > 0){ ?>  
     <span class="subcategory_pick"><i class="fas fa-check"></i></span>
    <?php } ?>
</div>

<?php } ?>