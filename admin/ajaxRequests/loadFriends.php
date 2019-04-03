<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
 redirect();

?>          
<table class="table_liga table-hover my-2" id="mailovi">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>LINK</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th>STATUS</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                 <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, fotografija, link ,status FROM prijatelji");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                        die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $naziv, $fotografija, $link, $aktivan);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                        <td><a target="_blank" href="<?php echo $link; ?>"><?php echo $link; ?></a></td>
                                      <td><img src="images/prijatelji/<?php echo $fotografija; ?>" width="40" height="40"></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', 'prijatelji', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>
                                      <td><a class="changeSomething" href="izmijeniPrijatelja.php?id=<?php echo $id ?>" title="Izmijeni"><i class="fas fa-edit"></i></a></td>    
                                       <td> 
                                           <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="deleteBtn delete_btn" title="Obriši"><i class="fas fa-trash-alt"></i></span>
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
    }); 

    
  </script>