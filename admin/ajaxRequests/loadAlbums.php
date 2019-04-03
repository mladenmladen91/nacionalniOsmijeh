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
                                      <th>NASLOV</th>
                                      <th>DATUM</th>
                                      <th>STATUS</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naslov, datum, fotografija, status FROM albumi ORDER BY datum DESC");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $naslov, $datum, $fotografija, $aktivan);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo substr($naslov,0,20) ?></td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>
                                      <td>
                                          <?php $status = ($aktivan === 'aktivan')? 'neaktivan': 'aktivan'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', 'albumi', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'aktivan')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>    
                                        <td><a class="changeSomething" href="pregledAlbuma.php?id=<?php echo $id ?>" title="Pregledaj"><i class="fas fa-eye"></i></a></td>
                                        <td><a class="changeSomething" href="izmijeniAlbum.php?id=<?php echo $id ?>" title="Izmijeni"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                            <span class="delete_btn deleteBtn" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                            <input type="hidden" class="tableName" value="albumi">
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