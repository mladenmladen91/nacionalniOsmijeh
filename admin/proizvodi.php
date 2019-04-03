<?php include "includes/header.php" ?>

<title>Proizvodi</title>

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
                  <span class="footer_title underline">KATEGORIJE</span>
              </div>
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                  <a href="dodajKategoriju.php"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a> 
              </div>   
              <div class="col-lg-12" style="overflow: auto;">
                <table class="table_liga table-hover my-2" id="mailovi">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>FOTOGRAFIJA</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT id, naziv, fotografija FROM kategorije ");
                                     $stmtSezone->execute();
                                     if(!$stmtSezone){
                                         die(mysqli_error($connection));
                                     }
                                     $stmtSezone->bind_result($id, $naziv, $fotografija);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>      
                                    <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td><img src="images/kategorije/<?php echo $fotografija; ?>" width="40" height="40"></td>
                                      <td><a class="changeSomething" href="izmijeniKategoriju.php?id=<?php echo $id ?>" title="Izmijeni"><i class="fas fa-edit"></i></a></td>    
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="deleteBtn delete_cat" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                          <input type="hidden" class="tableName" value="kategorije">
                                      </td>    
                                     </tr>
                                    <?php } ?>   
                                  </tbody>     
                                 </table> 
               </div>   
           </div>
              
              
              <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline">PODKATEGORIJE</span>
              </div>
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                  <a href="dodajPodkategoriju.php"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a> 
              </div>   
              <div class="col-lg-12" style="overflow: auto;">
                <table class="table_liga table-hover my-2" id="mailovi">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>KATEGORIJA</th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT a.id, a.naziv, b.naziv FROM podkategorije a JOIN kategorije b ON a.kategorija_id = b.id");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naziv, $kategorija);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>      
                                    <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td><?php echo $kategorija; ?></td>
                                      <td><a class="changeSomething" href="izmijeniPodkategoriju.php?id=<?php echo $id ?>" title="Izmijeni"><i class="fas fa-edit"></i></a></td>    
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="deleteBtn delete_subcat" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                          <input type="hidden" class="tableName" value="podkategorije">
                                      </td>    
                                     </tr>
                                    <?php } ?>   
                                  </tbody>     
                                 </table> 
               </div>   
           </div>  
              
           <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline">PROIZVODI</span>
              </div>
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                  <a href="dodajProizvod.php"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a> 
              </div>   
              <div class="col-lg-12" style="overflow: auto;">
                <table class="table_liga table-hover my-2" id="mailovi">
                                  <thead>
                                      <th>ID</th>
                                      <th>NAZIV</th>
                                      <th>KATEGORIJA</th>
                                      <th>PODKATEGORIJA</th>
                                      <th>POL</th>
                                      <th>BROJ</th>
                                      <th>CIJENA</th>
                                      <th>UZRAST</th>
                                      <th>KOLIČINA SLOBODNIH</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                 </thead>
                                  <tbody>
                                  <?php
                                     $stmtSezone = mysqli_prepare($connection, "SELECT a.id, a.naziv, a.cijena, a.uzrast, a.kolicina, b.naziv, a.pol, a.broj, c.naziv FROM proizvodi a JOIN kategorije b ON a.kategorija_id = b.id JOIN podkategorije c ON a.podkategorija_id= c.id ");
                                     $stmtSezone->execute();
                                     testQuery($stmtSezone);
                                     $stmtSezone->bind_result($id, $naziv, $cijena, $uzrast, $kolicina, $kategorija, $pol, $broj, $podkategorija);
                                     
                                      while($stmtSezone->fetch()){  
                                   ?>      
                                    <tr class="tableRow">
                                      <td><?php echo $id; ?></td>     
                                      <td><?php echo $naziv; ?></td>
                                      <td><?php echo $kategorija; ?></td> 
                                      <td><?php echo $podkategorija; ?></td>     
                                      <td><?php echo $pol; ?></td>    
                                      <td><?php echo $broj; ?></td>
                                      <td><?php echo $cijena; ?></td>
                                      <td><?php echo $uzrast; ?></td>
                                      <td><?php echo $kolicina; ?></td>
                                      <td><a href="donatori.php?id=<?php echo $id ?>" title="Donatori"><span class="view_span">DONACIJE</span></a></td>    
                                      <td><a class="changeSomething" href="izmijeniProizvod.php?id=<?php echo $id ?>" title="Izmijeni"><i class="fas fa-edit"></i></a></td>    
                                      <td>
                                          <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                          <span class="deleteBtn delete_btn" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                          <input type="hidden" class="tableName" value="proizvodi">
                                      </td></tr>
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





