<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
 redirect();

              
                $table = $_POST['table'];

                switch($table){
            
                    case "vijesti":
                      $query = "SELECT id, naslov, tekst, datum, fotografija, status FROM vijesti ORDER BY datum DESC";
                     break;
        
                    case "postovi":
                        $query = "SELECT id, naslov, tekst, datum, fotografija, status FROM postovi ORDER BY datum DESC";
                    break;    
                 }
                

              
                

            ?>
           <table class="table_liga table-hover my-2" id="mailovi">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>TEKST</th>
                                      <th>DATUM</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th>STATUS</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, $query);
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                        die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $naslov, $tekst, $datum, $fotografija, $aktivan);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                      
                                    <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo substr($naslov,0,20) ?></td>
                                      <td id="text_holder"><?php echo substr(str_replace("<img","                ",$tekst),0,20) ?></td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>
                                      <td><img src="images/vijesti/<?php echo $fotografija ?>" width="40" height="40" style="max-width: 40px !important;max-height: 40px !important;"></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', '<?php echo  $table ?>', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>    
                                        <td><a class="changeSomething"  <?php  if($table === 'vijesti'){    ?>       
                                               href="pregledVijesti.php?id=<?php echo $id ?>" 
                                          <?php   }else{  ?>
                                            href="pregledPosta.php?id=<?php echo $id ?>"
                                        <?php   } ?>
                                               
                                               
                                               
                                               title="Pregledaj"><i class="fas fa-eye"></i></a></td>
                                        <td><a class="changeSomething" 
                                        <?php  if($table === 'vijesti'){    ?>       
                                               href="izmijeniVijest.php?id=<?php echo $id ?>" 
                                          <?php   }else{  ?>
                                            href="izmijeniPost.php?id=<?php echo $id ?>"
                                        <?php   } ?>       
                                               
                                               
                                               title="Izmijeni"><i class="fas fa-edit"></i></a></td>
                                      
                                        <td>
                                            <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                            <span class="delete_btn deleteBtn" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                            <input type="hidden" class="tableName" value="<?php echo  $table ?>">
                                        </td>    
                                     </tr>
                                    <?php } ?>   
                                  </tbody>     
                                 </table> 
            
 <script>
    $(document).ready(function(){
         $(".delete_btn").click(function(){
             deleteSection($(this));
         });
        
        $("#text_holder").css({
            "max-height" : "20px",
            "overflow": "hidden"
        }); 
        
        var text = '<?php echo substr(str_replace("<img","",$tekst),0,20) ?>';
        console.log(text);
        
        $("#text_holder").find("img").before("<span></span><br><br>").next("img").remove();
    }); 

    
  </script>