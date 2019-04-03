<?php include "includes/header.php" ?>

<title>O nama</title>

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
                  <span class="footer_title underline">O NAMA</span>
              </div>
              <div class="col-lg-12" style="overflow: auto; margin-top: 40px">
                <table class="table_liga table-hover my-2">
                                  <thead>
                                      <th>TEKST</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT tekst, fotografija FROM onama");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($tekst, $fotografija );
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>      
                                    <tr class="tableRow">
                                      <td><?php echo substr($tekst,0,100) ?></td>
                                      <td><img src="images/onama/<?php echo $fotografija ?>" width="40" height="40"></td>
                                      <td><a class="changeSomething" href="izmijeniOnama.php" title="Izmijeni"><i class="fas fa-edit"></i></a></td>
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
<?php 
    include "scripts.php";
?>





