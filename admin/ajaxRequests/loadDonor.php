<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
  redirect();

                $donatorId = $_POST['id'];
                


                $stmtSezone = mysqli_prepare($connection, "SELECT naziv, email, telefon FROM donatori WHERE id = ? ");
                $stmtSezone->bind_param('i', $donatorId);
                $stmtSezone->execute();
                if(!$stmtSezone){
                    die(mysqli_error($connection));
                }
                $stmtSezone->bind_result($naziv, $email, $telefon);
                $stmtSezone->fetch();
                $stmtSezone->close();

                 

            ?>
             <form >
                    <!-- Modal body -->
                    <input type="hidden" name="donator_id" value="<?php echo $donatorId ?>">
                       
                         <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required value="<?php echo $naziv ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="email">
                                                 E-mail
                                             </label>
                                             <input id="email" type="email" name="email" class="contact_inputs form-control form-control-lg email" maxlength="70" required  value="<?php echo $email ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                 
                       
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="telefon">
                                                 Telefon (format: 0038220456789, maksimalna dužina je 70 karaktera)
                                             </label>
                                             <input id="telefon" type="text" name="telefon" class="contact_inputs form-control form-control-lg telefon" maxlength="30" required value="<?php echo $telefon ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                        
                 
                                <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="donator.php?id=<?php echo $donatorId; ?>" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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
            
            saveDonor(formData, <?php echo $_POST['id'] ?>);
            
        });
        
        // datepicker loading
        $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
        
    }); 

    
  </script>