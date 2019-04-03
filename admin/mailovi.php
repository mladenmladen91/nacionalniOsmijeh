<?php include "includes/header.php" ?>

<title>Mailovi</title>

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
                  <span class="footer_title underline">MAILOVI</span>
              </div>
                 
              <div class="col-lg-12" style="overflow: auto; margin-top:50px">
                <table class="table_liga table-hover my-2" id="myTable">
                                  <thead>
                                      <th>ID</th>
                                      <th>IME</th>
                                      <th>MAIL</th>
                                      <th>TEKST</th>
                                      <th>DATUM</th>
                                      <th>ODGOVORENO</th>
                                 </thead>
                                  <tbody>
                                 <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, ime, email, status, tekst, datum FROM mailovi ORDER BY datum DESC");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $ime, $email, $aktivan, $tekst, $datum);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $id ?></td>     
                                      <td><?php echo $ime ?></td>
                                      <td><?php echo $email ?></td>    
                                      <td><?php echo $tekst ?></td>
                                      <td><?php echo $newDate = date("d.m.Y", strtotime($datum)) ?></td>    
                                      <td>
                                          <?php $status = ($aktivan === 'odgovoreno')? 'neodgovoreno': 'odgovoreno'  ?>
                                          <label class="switch" onclick="status('<?php echo $status ?>', <?php echo $id ?>)">
                                            <input class="input" type="checkbox" <?php echo ($aktivan === 'odgovoreno')? 'checked': '' ?> >
                                            <span class="slider round"></span>
                                          </label>
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





