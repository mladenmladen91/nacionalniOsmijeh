<?php include "includes/header.php" ?>

<?php
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
       header('location:javascript://history.go(-1)');
     }

   $id = $_GET['id'];

   // redirect if not logged in
    redirect();

     $query = "SELECT * from donatori WHERE id= $id";
     $result = mysqli_query($connection, $query);
     if(!$result){
        die(mysqli_error($connection));
     }
     $row = mysqli_fetch_assoc($result);

     $count = mysqli_num_rows($result);

     if($count <= 0){
         header('location: ../index.php');
     }


     //getting the donations
     $stmtSezone = mysqli_prepare($connection, "SELECT b.id, b.proizvod_id, b.kolicina, b.status, b.datum, c.naziv FROM donatori a JOIN proizvod_donator b ON a.id = b.donator_id JOIN proizvodi c ON b.proizvod_id = c.id WHERE a.id = ?  ORDER BY b.datum DESC");
     $stmtSezone->bind_param('i', $id); 
     $stmtSezone->execute();
     if(!$stmtSezone){
        die(mysqli_error($connection));
     }
     $stmtSezone->bind_result($donacijaId, $proizvodId, $kolicina, $status, $datum, $proizvod);

     

?>

<!-- datatables including -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<title><?php echo $row['naziv'] ?></title>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- nav including -->    
<?php include "includes/nav.php" ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <div class="section">
       <div class="container">
          <div class="row">   
           <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline"><?php echo strtoupper($row['naziv']) ?></span>
              </div>
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                <div class="row"> 
                <div class="col-lg-4 col-sm-4" style="margin: 30px 0">     
                  <a href="#"  data-toggle="modal" data-target="#donacija"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj Donatora"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a>
                </div>    
                <div class="col-lg-4 col-sm-4" style="margin: 30px 0">  
                    <a href="izmijeniDonatora.php?id=<?php echo $_GET['id'] ?>" title="Izmijeni"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important; background: green !important" title="Izmijeni Donatora"><i class="fas fa-edit"></i>&ensp;IZMIJENI</span></a>
                </div>    
                 <div class="col-lg-4 col-sm-4" style="margin: 30px 0"> 
                    <input type="hidden" class="rowId" value="<?php echo $id ?>"> 
                     
                    <a href="#" title="Obriši" class="deleteDonor"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important; background: red !important; margin: 30px 0" title="Obriši Donatora"><i class="fas fa-trash-alt"></i>&ensp;OBRIŠI</span></a>
                    
                     <input type="hidden" class="status" value="<?php echo $status ?>">
                     <input type="hidden" class="kolicina" value="<?php echo $kolicina ?>">    
                     <input type="hidden" class="proizvod" value="<?php echo $proizvodId ?>"> 
                 </div>    
                </div>    
              </div>   
              <div class="col-lg-12" style="overflow: auto; margin-top: 50px">
                <table class="table_liga table-hover my-2" id="donator">
                                  <thead>
                                      <th>ID DONACIJE</th>
                                      <th>PROIZVOD</th>
                                      <th>KOLIČINA</th>
                                      <th>STATUS</th>
                                      <th>DATUM</th>
                                      <th></th>
                                      <th></th>
                                  </thead>
                                  <tbody>
                                   <?php
                                     
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $donacijaId; ?></td>     
                                      <td><?php echo $proizvod; ?></td>    
                                      <td><?php echo $kolicina; ?></td>
                                      <td><?php echo $status; ?></td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>
                                      <td><a class="changeSomething" href="izmijeniDonaciju.php?id=<?php echo $donacijaId ?>" title="Izmijeni donaciju"><i class="fas fa-edit"></i></a></td>
                                      <td><input type="hidden" class="rowId" value="<?php echo $donacijaId ?>">
                                          <span class="deleteBtn delete_btn" title="Obriši"><i class="fas fa-trash-alt" ></i></span>
                                         <input type="hidden" class="kolicina" value="<?php echo $kolicina ?>">    
                                         <input type="hidden" class="proizvod" value="<?php echo $proizvodId ?>">
                                         <input type="hidden" class="status" value="<?php echo $status ?>">
                                        </td>     
                                      </tr>
                                    <?php } ?>   
                                  </tbody>     
                                 </table> 
               </div>   
           </div>   
              
          </div>      
         
       </div>
     </div>
   </div>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->/
<!-- footer including -->    
<?php include "includes/footer.php" ?>
    
<!-- datatbles scripts including -->    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>    
    
<?php 
    include "scripts.php";
?>

    
     <!-- popup za dodavanje donacije -->
    <div class="modal fade" id="donacija">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">NOVA DONACIJA</h4>
                    
                </div>
                
                    <!-- Modal body -->
                
                    <div class="modal-body">
                        <form id="modalAddDonator">
                        <input type="hidden" name="donator_id" value="<?php echo $_GET['id'] ?>">
                        
                         <div class="col-lg-12">
                                        
                             
                                       <div class="col-lg-6 form-group">
                                             <label class="form_label" for="proizvod">Proizvod</label>
                                             <select id="proizvod_id" name="proizvod_id" class="contact_inputs form-control form-control-lg proizvod" required>
                                              <?php     
                                                   $query = "SELECT * FROM proizvodi WHERE kolicina > 0";
                                                   $result = mysqli_query($connection, $query);
                                                   testQuery($result);
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                         
                                         <div class="col-lg-6 form-group">
                                             <label class="form_label" for="status">Status</label>
                                             <select id="status" name="status" class="contact_inputs form-control form-control-lg status" required>
                                                 <option value="rezervisano">Rezervisano</option>
                                                 <option value="donirano">Donirano</option>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                        
                                         <div class="col-lg-6 form-group">
                                             <label  class="form_label"  for="kolicina">
                                                 Količina
                                             </label>
                                             <input id="kolicina" type="number" name="kolicina" class="contact_inputs form-control form-control-lg kolicina" min="1"  required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="change_btn save_tag" id="saveTag" style="width:80%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- /popup za dodavanje donatcije -->
 <script>
    $(document).ready(function(){
        // saving photo
        $("#modalAddDonator").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveDonation(formData, <?php echo $_GET['id'] ?>);
            
        });
        
        // deleting donation
        $(".delete_btn").click(function(){
              deleteDonation($(this));
        });
        

    
    });

  </script>      
    




