<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
  redirect();

                $id = $_POST['id'];
                


                $stmt = mysqli_prepare($connection, "SELECT naziv, kategorija_id FROM podkategorije WHERE id=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                if(!$stmt){
                   die(mysqli_error($connection));
                }
                $stmt->bind_result($naziv, $kategorija_id);
                $stmt->fetch();
                $stmt->close();

                 

            ?>
            <form class="contact_form p-0" id="infoForm">
                                 
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                
                        
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required value="<?php echo $naziv ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                    </div>
                
                                <div class="col-lg-4 form-group">
                                             <label class="form_label" for="pol">Kategorija</label>
                                             <select id="pol" name="kategorija_id" class="contact_inputs form-control form-control-lg pol" required>
                                              <?php     
                                                   $query = "SELECT * FROM kategorije";
                                                   $result = mysqli_query($connection, $query);
                                                   testQuery($result);
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"
                                                   <?php echo ($kategorija_id == $row['id'])? 'selected':''   ?> >
                                                     <?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="proizvodi.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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
            
            saveCategory(formData, <?php echo $_POST['id'] ?>);
            
        });
        
    }); 
</script>