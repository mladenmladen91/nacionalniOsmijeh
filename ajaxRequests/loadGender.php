<?php
    session_start();
    include "../includes/db.php";
    
    include "../includes/functions.php";

    $id = $_POST['id'];
    $broj = $_POST['broj'];
    $kategorija = $_POST['kategorija'];

    $result = mysqli_prepare($connection, "SELECT DISTINCT pol FROM proizvodi WHERE podkategorija_id=? AND kolicina > 0");
    $result->bind_param('i', $id);
    $result->execute();
    testQuery($result);
    $result->store_result();
    $ukupno = $result->num_rows();
    $result->bind_result($pol);
    
?>
                     
                         <div class="row justify-content-center">
                    <?php
                             
                          while($result->fetch()){ 
                              
                            if($pol === 'ženski'){  
                    ?>         
                             
                            <div class="col-lg-6 form-group mb-4 text-center">
                               <input id="zensko<?php echo $_POST['broj'] ?>" value="<?php echo $pol ?>" type="radio" name="pol" class="form_radio">
                                <label for="zensko<?php echo $_POST['broj'] ?>" style="pointer:cursor" onClick="loadAge('<?php echo $pol ?>', <?php echo $_POST['id'] ?>, <?php echo $_POST['broj'] ?>, <?php echo $_POST['kategorija'] ?>)" class="pol<?php echo $_POST['broj'] ?>" title="<?php echo $pol ?>">
                                     <div class="col-lg-12 text-center">
                                       <img class="gender_image" src="images/djevojcica-forma.svg" height="110" width="110">
                                     </div>
                                     <div class="col-lg-12 pt-4" style="text-align:center">
                                        <span class="form_radio_name">Žensko</span>
                                     </div>
                                </label>
                                <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                            </div>
                             
                     <?php }elseif($pol === 'muški'){ ?> 
                            <div class="col-lg-6 form-group mb-4 text-center">
                               <input id="musko<?php echo $_POST['broj'] ?>" value="<?php echo $pol ?>" type="radio" name="pol" class="form_radio">
                                <label for="musko<?php echo $_POST['broj'] ?>" style="pointer:cursor" onClick="loadAge('<?php echo $pol ?>', <?php echo $_POST['id'] ?>, <?php echo $_POST['broj'] ?>, <?php echo $_POST['kategorija'] ?>)" class="pol<?php echo $_POST['broj'] ?>" title="<?php echo $pol ?>">
                                     <div class="col-lg-12 text-center">
                                       <img class="gender_image" src="images/djecak-forma.svg" height="110" width="110">
                                     </div>
                                     <div class="col-lg-12 pt-4" style="text-align:center">
                                        <span class="form_radio_name">Muško</span>
                                     </div>
                                </label>
                                <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                            </div>
                     <?php  }else{   ?>         
                            <div class="col-lg-6 form-group mb-4 text-center">
                               <input id="oboje<?php echo $_POST['broj'] ?>" value="<?php echo $pol ?>" type="radio" name="pol" class="form_radio oboje">
                                <label for="oboje<?php echo $_POST['broj'] ?>" style="pointer:cursor" onClick="loadAge('<?php echo $pol ?>', <?php echo $_POST['id'] ?>, <?php echo $_POST['broj'] ?>, <?php echo $_POST['kategorija'] ?>)" class="pol<?php echo $_POST['broj'] ?>" title="<?php echo $pol ?>">
                                     <div class="col-lg-12 text-center">
                                         <div class="subject_type mx-auto"><span>Oboje</span></div>
                                     </div>
                                     
                                </label>
                                <span class="form_result" style="color:red; font-size:12px; display:none"></span>
                            </div> 
                     <?php } } ?>         
                           
                        </div>
<script>
     

           if(<?php echo $ukupno ?> < 2 && $(".form_radio").hasClass("oboje")){
               $(".oboje").next("label").trigger("click");
               
               $(".oboje").next("label").css({
                   "display": "none"
               });
              
               $(".oboje").closest(".form_group").css({
                   "display": "none",
               }); 
               
               $(".oboje").closest(".popup_holder").find(".popup_radio").css({
                   "display": "none"
               });
               
               $(".oboje").closest(".popup_holder").css({
                   "margin-bottom": "40px",
               });
               
               
           }
    
           if(<?php echo $_POST['kategorija'] ?> == 11 || <?php echo $_POST['kategorija'] ?> == 12){
                 $(".uzrast<?php echo $_POST['broj'] ?>").css({
                   "display": "none"
                 });
               
                 $(".broj<?php echo $_POST['broj'] ?>").css({
                   "display": "none"
                 });
           } 


</script>
