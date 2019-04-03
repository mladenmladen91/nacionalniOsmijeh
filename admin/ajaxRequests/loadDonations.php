<?php
    session_start();
    include "../../includes/db.php";
    
    include "../../includes/functions.php";

    // if user isn't logged redirecting
   redirect();

   $id = $_POST['id'];
 
?>

<table class="table_liga table-hover my-2" id="donatori">
                                  <thead>
                                      <th>ID DONACIJE</th>
                                      <th>DONATOR</th>
                                      <th>KONTAKT OSOBA</th>
                                      <th>MAIL</th>
                                      <th>KOLIČINA</th>
                                      <th>STATUS</th>
                                      <th>DATUM</th>
                                      <th>PROIZVOD</th>
                                      <th></th>
                                      <th></th>
                                  </thead>
                                  <tbody>
                                   <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT b.id, a.naziv, c.podkategorija_id,a.email, a.telefon, b.id, b.proizvod_id, b.kolicina, b.status, b.datum, c.naziv, d.naziv FROM donatori a JOIN proizvod_donator b ON a.id = b.donator_id JOIN proizvodi c ON b.proizvod_id = c.id JOIN podkategorije d ON d.id=c.podkategorija_id WHERE b.proizvod_id = ?  ORDER BY b.datum DESC");
                                     $stmtSezone->bind_param('i', $id);
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($donatorId, $naziv, $podkategorija, $email, $telefon, $donacijaId, $proizvodId, $kolicina, $status, $datum, $proizvod, $podkategorijaNaziv);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $donacijaId; ?></td>    
                                        <td><?php echo $naziv; ?></td>     
                                      <td><?php echo $email; ?></td>
                                      <td><?php echo $telefon; ?></td>
                                      <td><?php echo $kolicina; ?></td>
                                        <td class="statusPlace">
                                            <?php $stanje = ($status === 'donirano')? 'rezervisano': 'donirano'  ?>
                                          <span class="view_span" onclick="status('<?php echo $stanje ?>',<?php echo $donacijaId ?>, <?php echo $_POST['id'] ?>)" title="Promijeni"><?php echo $status ?>
                                          </span>
                                         
                                        </td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>
                                        <td><a href="proizvod.php?podkategorija=<?php echo $podkategorija ?>"><?php echo $podkategorijaNaziv ?></a></td>    
                                       <td><a class="changeSomething" href="izmijeniDonaciju.php?id=<?php echo $donacijaId ?>" title="Izmijeni donaciju"><i class="fas fa-edit"></i></a></td>
                                        <td><input type="hidden" class="rowId" value="<?php echo $donacijaId ?>">
                                          <span class="deleteBtn delete_btn" title="Obriši" ><i class="fas fa-trash-alt"></i></span>
                                         <input type="hidden" class="kolicina" value="<?php echo $kolicina ?>">    
                                         <input type="hidden" class="proizvod" value="<?php echo $proizvodId ?>">
                                         <input type="hidden" class="status" value="<?php echo $status ?>">
                                             
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
            