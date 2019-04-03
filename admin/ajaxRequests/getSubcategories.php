<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
  redirect();

                $id = $_POST['id'];
  

            ?>
     
            <label class="form_label" for="podkategorija">Podkategorija</label>
                                             <select id="podkategorija" name="podkategorija_id" class="contact_inputs form-control form-control-lg pol" required>
                                              <?php     
                                                   $query = "SELECT * FROM podkategorije WHERE kategorija_id ={$id}";
                                                   $result = mysqli_query($connection, $query);
                                                   if(!$result){
                                                        die(mysqli_error($connection));
                                                   }
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>