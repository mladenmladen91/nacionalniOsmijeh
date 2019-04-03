<?php include "includes/header.php" ?>

<title>Volonteri</title>

<!-- datatables including -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<?php
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";


     // redirect if not login
     redirect();
?>

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
                  <span class="footer_title underline">VOLONTERI</span>
              </div>
                 
              <div class="col-lg-12" style="overflow: auto; margin-top:50px">
                <table class="table_liga table-hover my-2" id="volonteri">
                                  <thead>
                                      <th>ID</th>
                                      <th>IME</th>
                                      <th>MAIL</th>
                                      <th>TELEFON</th>
                                      <th>ADRESA</th>
                                      <th>GRAD</th>
                                      <th>DATUM ROĐENJA</th>
                                      <th>DATUM PRIJAVE</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                 <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, ime, email, telefon, adresa, grad, datum_rodjenja, datum_prijava FROM volonteri ORDER BY datum_prijava DESC");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $ime, $email, $telefon, $adresa, $grad, $datum_rodjenja, $datum_prijava);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $ime ?></td>
                                      <td><?php echo $email ?></td>    
                                      <td><?php echo $telefon ?></td>
                                      <td><?php echo $adresa ?></td>
                                      <td><?php echo $grad ?></td>    
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum_rodjenja)) ?></td> 
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum_prijava)) ?></td>
                                     <td>
                                            <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                            <span class="delete_btn deleteVnt" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                            <input type="hidden" class="tableName" value="volonteri">
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
       $(".deleteVnt").click(function(){
              deleteVolunteer($(this));
        }); 
        
 }); 
</script> 



