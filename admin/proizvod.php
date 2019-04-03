<?php include "includes/header.php" ?>



<?php
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    if(!isset($_GET['podkategorija']) || !is_numeric($_GET['podkategorija'])){
       header('location:javascript://history.go(-1)');
     }

   $podkategorija_id = $_GET['podkategorija'];

   // redirect if not logged in
    redirect();

     $stmtSezone = mysqli_prepare($connection, "SELECT b.id, a.naziv, a.email, a.telefon, b.proizvod_id, b.kolicina, b.status, b.datum, c.naziv, d.naziv FROM donatori a JOIN proizvod_donator b ON a.id = b.donator_id JOIN proizvodi c ON b.proizvod_id = c.id JOIN podkategorije d ON c.podkategorija_id = d.id WHERE c.podkategorija_id = ? AND b.status='rezervisano' ORDER BY b.datum DESC");
     $stmtSezone->bind_param('i', $podkategorija_id);
     $stmtSezone->execute();
     if(!$stmtSezone){
        die(mysqli_error($connection));
     }
     mysqli_stmt_store_result($stmtSezone);
     $count = mysqli_stmt_num_rows($stmtSezone);
     $stmtSezone->bind_result($donatorId, $naziv, $email, $telefon, $proizvodId, $kolicina, $status, $datum, $proizvod, $podkategorijaNaziv);

     if($count <= 0){
         header('location: ../index.php');
     }

     
?>

<!-- datatbles including -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


<title><?php echo $podkategorijaNaziv ?></title>

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
                  <span class="footer_title underline"><?php echo $naziv ?></span>
              </div>
             <div class="col-lg-12 donacije" style="overflow: auto; margin-top: 40px">
                 <table class="table_liga table-hover my-2" id="proizvodi">
                                  <thead>
                                      <th>ID DONACIJE</th>
                                      <th>DONATOR</th>
                                      <th>MAIL</th>
                                      <th>KONTAKT BROJ</th>
                                      <th>KOLIČINA</th>
                                      <th>STATUS</th>
                                      <th>DATUM</th>
                                      <th>PROIZVOD</th>
                                      <th></th>
                                   </thead>
                                  <tbody>
                                   <?php
                                     
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $donatorId; ?></td>    
                                      <td><?php echo $naziv; ?></td>     
                                      <td><?php echo $email; ?></td>
                                      <td><?php echo $telefon; ?></td>
                                      <td><?php echo $kolicina; ?></td>
                                      <td><?php echo $status; ?></td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>
                                      <td><?php echo $proizvod; ?></td>
                                      <td><input type="hidden" class="rowId" value="<?php echo $donatorId ?>">
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
    
<script>
$(document).ready(function(){
       $(".delete_btn").click(function(){
              deleteSection($(this));
        }); 
        
     
 }); 
</script>     

  




