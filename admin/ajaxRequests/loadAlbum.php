<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
    redirect();

                $id = $_POST['id'];
                


                $stmt = mysqli_prepare($connection, "SELECT naslov, fotografija, datum FROM albumi WHERE id=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                if(!$stmt){
                    die(mysqli_error($connection));
                }
                mysqli_stmt_store_result($stmt);
                $rows = mysqli_stmt_num_rows($stmt);
                $stmt->bind_result($naslov, $fotografija, $datum);
                $stmt->fetch();
                $stmt->close();

                 

            ?>
            <form class="contact_form p-0" id="infoForm">
                                 
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                              
                        
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naslov (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naslov" class="contact_inputs form-control form-control-lg naslov" maxlength="70" required value="<?php echo $naslov ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="datum" >
                                                 Datum
                                             </label>
                                             <input id="datum" type="text" name="datum" class="contact_inputs form-control form-control-lg datum" required value="<?php echo $datum ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                  
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="albumi.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
                                 </div>
                              </div>   
                              </div>
                             </form> 
            
 <script>
    $(document).ready(function(){
        // saving changes for news
        $("form").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveAlbum(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        // datepicker loading
        $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
        
      
    }); 

    
  </script>