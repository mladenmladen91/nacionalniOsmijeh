<?php include "includes/header.php" ?>

<title>Evidencija</title>

<?php
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    // redirect if not login
     redirect();

  // getting amount of categories
    $queryProizvodi = "SELECT * FROM kategorije";
    $proizvodResult = mysqli_query($connection, $queryProizvodi);
    if(!$proizvodResult){
        die(mysqli_error($connection));
     }
    $kategorije = mysqli_num_rows($proizvodResult); 

    

// getting amount of free products
    $slobodni = 0;
    $queryProizvodi = "SELECT kolicina FROM proizvodi";
    $proizvodResult = mysqli_query($connection, $queryProizvodi);
    if(!$proizvodResult){
        die(mysqli_error($connection));
     }
     while($row = mysqli_fetch_assoc($proizvodResult)){
         $slobodni = $slobodni + $row['kolicina'];
     }

    // getting amount of reserved products
    $rezervisani = 0;
    $queryProizvodi = "SELECT kolicina FROM proizvod_donator WHERE status = 'rezervisano' ";
    $proizvodResult = mysqli_query($connection, $queryProizvodi);
    if(!$proizvodResult){
        die(mysqli_error($connection));
     }
     while($row = mysqli_fetch_assoc($proizvodResult)){
         $rezervisani = $rezervisani + $row['kolicina'];
     }


     // getting amount of donated products
    $donirani = 0;
    $queryProizvodi = "SELECT kolicina FROM proizvod_donator WHERE status = 'donirano' ";
    $proizvodResult = mysqli_query($connection, $queryProizvodi);
    if(!$proizvodResult){
        die(mysqli_error($connection));
     }
     while($row = mysqli_fetch_assoc($proizvodResult)){
         $donirani = $donirani + $row['kolicina'];
     }
   

?>

<!-- datatbles including -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- header including -->    
<?php include "includes/nav.php" ?>    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <div class="section">
       <div class="container">
          <div class="row">
              
     
       
              
           <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline">PROIZVODI</span>
              </div>
              <div class="col-lg-12" style="overflow: auto; margin-top:50px">
                <table class="table_liga table-hover my-2" id="proizvodi">
                                  <thead>
                                      <th>KATEGORIJE</th>
                                      <th>SLOBODNI PROIZVODI</th>
                                      <th>REZERVISANI PROIZVODI</th>
                                      <th>DONIRANI PROIZVODI</th>
                                  </thead>
                                  <tbody>
                                     <tr class="tableRow">
                                      <td><?php echo $kategorije ?></td>
                                      <td><?php echo $slobodni ?></td>
                                      <td><?php echo $rezervisani ?></td>
                                      <td><?php echo $donirani ?></td>     
                                     </tr>
                                  </tbody>     
                                 </table> 
               </div>   
           </div>
              
           <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline">DONATORI</span>
              </div>
              <div class="col-lg-12" style="overflow: auto; margin-top:50px">
                <table class="table_liga table-hover my-2" id="donatori">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>MAIL</th>
                                      <th>SUBJEKT</th>
                                      <th>KONTAKT BROJ</th>
                                      
                                      <th></th>
                                  </thead>
                                  <tbody>
                                   <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, email, telefon, subjekat FROM donatori ORDER BY naziv ASC");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($donatorId, $naziv, $email, $telefon, $subjekt);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>       
                                    <tr class="tableRow">
                                      <td><?php echo $donatorId; ?></td>    
                                      <td><?php echo $naziv; ?></td>     
                                      <td><?php echo $email; ?></td>
                                      <td><?php echo $subjekt; ?></td>     
                                      <td><?php echo $telefon; ?></td>
                                      <td><a class="changeSomething" href="donator.php?id=<?php echo $donatorId ?>" title="Pregledaj Donatora"><i class="fas fa-eye"></i></a></td>    
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





