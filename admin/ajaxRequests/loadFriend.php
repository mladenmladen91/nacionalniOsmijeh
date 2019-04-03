<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
   redirect();

                $id = $_POST['id'];
                


                $stmtSezone = mysqli_prepare($connection, "SELECT naziv, fotografija, link FROM prijatelji WHERE id = ? ");
                $stmtSezone->bind_param('i', $id);
                $stmtSezone->execute();
                if(!$stmtSezone){
                    die(mysqli_error($connection));
                }
                $stmtSezone->bind_result($naziv, $fotografija, $link);
                $stmtSezone->fetch();
                $stmtSezone->close();

                 

            ?>
             <form class="contact_form p-0" id="infoForm">
                                 <input type="hidden" name="id" value="<?php echo $id ?>">
                                 <div class="col-md-12 mb-2" style="margin-bottom: 40px">
                                     <img src="images/prijatelji/<?php echo $fotografija; ?>" alt="slika" style="max-width: 100px;">
                                </div>
                        
                                 <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="fotografija">
                                                 Logo (Maksimalna veličina je 8MB)
                                             </label>
                                             <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija; ?>">
                                             <input id="fotografija" type="file" name="fotografija" class="contact_inputs form-control form-control-lg fotografija" >
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required value="<?php echo $naziv; ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="link">
                                                 Link (format: https://www.test.com, http://www.test.com, http://test.com)
                                             </label>
                                             <input id="link" type="text" name="link" class="contact_inputs form-control form-control-lg link" required value="<?php echo $link; ?>" >
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                  
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="prijatelji.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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
            
            saveFriend(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        
        
    }); 

    
  </script>