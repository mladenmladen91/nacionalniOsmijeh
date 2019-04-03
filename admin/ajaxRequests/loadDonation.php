<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
  redirect();

                $id = $_POST['id'];

               

                $stmtSezone = mysqli_prepare($connection, "SELECT b.proizvod_id, b.kolicina, b.status, b.datum, c.kolicina FROM proizvod_donator b JOIN proizvodi c ON b.proizvod_id = c.id WHERE b.id = ? ");
                $stmtSezone->bind_param('i', $id);
                $stmtSezone->execute();
                if(!$stmtSezone){
                    die(mysqli_error($connection));
                }
                $stmtSezone->bind_result($proizvodId, $kolicina, $status, $datum, $proizvodKolicina);
                $stmtSezone->fetch();
                $stmtSezone->close();

                 

            ?>
             <form >
                    <!-- Modal body -->
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="proizvod_id" value="<?php echo $proizvodId ?>">   
                         <div class="col-lg-8 form-group">
                                            
                       
                                          <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="datum">
                                                 Datum
                                             </label>
                                             <input id="datum" type="text" name="datum" class="contact_inputs form-control form-control-lg datum" required value="<?php echo $datum ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>                  
                        
                                         <div class="col-lg-4 form-group">
                                             <label class="form_label" for="status">Status</label>
                                             <select id="status" name="status" class="contact_inputs form-control form-control-lg pol" required>
                                                 
                                               <?php if($status === 'rezervisano'){  ?>     
                                                 <option value="rezervisano" selected>Rezervisano</option>
                                                 <option value="donirano">Donirano</option>
                                               <?php }else{  ?>
                                                   <option value="rezervisano" >Rezervisano</option>
                                                 <option value="donirano" selected>Donirano</option>
                                                 <?php }  ?> 
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="kolicina">
                                                 Količina
                                             </label>
                                             <input type="hidden" name="stara_kolicina" value="<?php echo $kolicina ?>">
                                             <input id="kolicina" type="number" name="kolicina" class="contact_inputs form-control form-control-lg kolicina" min="1" max="<?php echo $proizvodKolicina + $kolicina ?>" value="<?php echo $kolicina ?>" >
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                      
                             
                                <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="donatori.php?id=<?php echo $proizvodId; ?>" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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