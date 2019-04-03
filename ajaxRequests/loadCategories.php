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
                         
                              
                              
                                     
                              while($stmtSezone->fetch()){
                                $broj = 0; 
                              
                              if(isset($_SESSION['cart'])){
                              
                              foreach($_SESSION['cart'] as $item){
                                  if($id == $item[0]){
                                      $broj++;
                                      
                                  }
                               }
                               
                              } 
                                  
                               
                                   
                                    
?>
                     
   <div class="col-lg-12 category mt-4" onclick="loadSubcategories(<?php echo $id ?>, $(this))" title="<?php echo $naziv ?>">
                               <div class="col-lg-12 category_holder">
                                <div class="col-lg-12 category_image">
                                    <img src="admin/images/kategorije/<?php echo $fotografija ?>" class="img-responsive">
                                </div>
                                <div class="col-lg-12 category_text">
                                    <span><?php echo $naziv ?></span>
                                </div>
                              </div>   
                              <?php if($broj > 0){  ?>
                                <div class="category_number category_number_selected">
                                    <span><?php echo $broj; ?></span>
                                </div>
                              <?php }?>
                               
                            </div>
                            
    <?php 
              
                } 
    ?>