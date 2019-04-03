<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
  redirect();

                $id = $_POST['id'];
                


                $stmt = mysqli_prepare($connection, "SELECT naziv, cijena, uzrast, kolicina, kategorija_id, pol, broj, podkategorija_id FROM proizvodi WHERE id=?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                if(!$stmt){
                   die(mysqli_error($connection));
                }
                $stmt->bind_result($naslov, $cijena, $uzrast, $kolicina, $kategorija_id, $pol, $broj, $podkategorija_id);
                $stmt->fetch();
                $stmt->close();

                 

            ?>
             <form class="contact_form p-0" id="infoForm">
                                     <input type="hidden" name="id" value="<?php echo $id ?>">
                                       <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required value="<?php echo $naslov; ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="cijena">
                                                 Cijena €
                                             </label>
                                             <input id="cijena" type="text" name="cijena" class="contact_inputs form-control form-control-lg cijena" maxlength="15" required  value="<?php echo $cijena; ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="broj">
                                                 Broj (* U slučaju higijene, igrački i školskog pribora odaberite 0)
                                             </label>
                                             <input id="broj" type="text" name="broj" class="contact_inputs form-control form-control-lg broj" maxlength="6" required  value="<?php echo $broj; ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                 
                 
                                         <div class="col-lg-4 form-group">
                                             <label class="form_label" for="pol">Pol (* U slučaju higijene, igrački i školskog pribora odaberite Oboje)</label>
                                             <select id="pol" name="pol" class="contact_inputs form-control form-control-lg pol" required>
                                                 
                                               <?php if($pol === 'muški'){  ?>     
                                                 <option value="muški" selected>Muški</option>
                                                 <option value="ženski">Ženski</option>
                                                 <option value="oboje">Oboje</option>
                                               <?php }elseif($pol === 'ženski'){  ?>     <option value="muški">Muški</option>
                                                 <option value="ženski" selected>Ženski</option>
                                                 <option value="oboje">Oboje</option>
                                                <?php }else{  ?>
                                                   <option value="muški" >Muški</option>
                                                 <option value="ženski">Ženski</option>
                                                 <option value="oboje" selected>Oboje</option>
                                                 <?php }  ?> 
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-4 form-group">
                                             <label class="form_label" for="kategorija">Kategorija</label>
                                             <select id="kategorija" name="kategorija_id" class="contact_inputs form-control form-control-lg pol" required>
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
                 
                                         <div class="col-lg-4 form-group" id="subcategory_container">
                                             <label class="form_label" for="podkategorija">Podkategorija</label>
                                             <select id="podkategorija" name="podkategorija_id" class="contact_inputs form-control form-control-lg pol" required>
                                              <?php     
                                                   $query = "SELECT * FROM podkategorije WHERE kategorija_id ={$kategorija_id}";
                                                   $result = mysqli_query($connection, $query);
                                                   testQuery($result);
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"
                                                     <?php echo ($podkategorija_id == $row['id'])? 'selected':''   ?>    
                                                 ><?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="uzrast">
                                                 Uzrast (* U slučaju higijene, igrački i školskog pribora odaberite 0)
                                             </label>
                                             <input id="uzrast" type="number" name="uzrast" class="contact_inputs form-control form-control-lg uzrast" min="0" max="17" required  value="<?php echo $uzrast; ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="kolicina">
                                                 Količina
                                             </label>
                                             <input id="kolicina" type="number" name="kolicina" class="contact_inputs form-control form-control-lg kolicina" min="0" max="1000" required  value="<?php echo $kolicina; ?>">
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
            
            saveProduct(formData, <?php echo $_POST['id'] ?>);
            
        });
        
          // loading subcategories depending category values
        $("#kategorija").change(function(){
          loadSubcategories($(this).val());
       });
        
    }); 

    
  </script>