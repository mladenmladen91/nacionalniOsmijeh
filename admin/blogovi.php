<?php include "includes/header.php" ?>

<title>Blog- objave</title>

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
                  <span class="footer_title underline">BLOGOVI</span>
              </div>
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                  <a href="dodajPost.php"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a> 
              </div>   
              <div class="col-lg-12" style="overflow: auto;">
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
                                 </thead>
                                  <tbody>
                                    <tr class="tableRow">
                                      <td>1</td>     
                                      <td>gUZVA U AVIONU</td>
                                      <td><?php echo substr('sjdfjksdjklsjkdjksdjklsjdklsjkl',0,100) ?></td>
                                      <td>12.05.2018</td>
                                      <td><img src="images/vijesti/test.png" width="40" height="40"></td>
                                      <td>
                                          <label class="switch" >
                                            <input class="input" type="checkbox" >
                                            <span class="slider round"></span>
                                          </label>
                                      </td>    
                                        <td><a class="changeSomething" href="pregledPosta.php" title="Pregledaj"><i class="fas fa-eye"></i></a></td>
                                        <td><span class="deleteBtn" title="Obriši"><i class="fas fa-trash-alt"></i></span></td>    
                                     </tr>
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





