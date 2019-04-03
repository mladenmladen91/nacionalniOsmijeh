<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

   

    $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, fotografija FROM kategorije ");
                              $stmtSezone->execute();
                              if(!$stmtSezone){
                                   die(mysqli_error($connection));
                              }
                              $stmtSezone->bind_result($id, $naziv, $fotografija);
                         
                              
                              $broj = 0; 
                                     
                              while($stmtSezone->fetch()){
                                
                              
                               
                               
                                   
                                    
?>
                     
   <div class="col-lg-12 category <?php echo ($broj == 0)? 'category_active': '' ?> mt-4" onclick="loadSubcategories(<?php echo $id ?>, $(this))" title="<?php echo $naziv ?>">
                               <div class="col-lg-12 category_holder">
                                <div class="col-lg-12 category_image">
                                    <img src="admin/images/kategorije/<?php echo $fotografija ?>" class="img-responsive">
                                </div>
                                <div class="col-lg-12 category_text">
                                    <span><?php echo $naziv ?></span>
                                </div>
                              </div>   
                              
                            </div>
                            
    <?php 
                                  $broj++;
              
                } 
    ?>