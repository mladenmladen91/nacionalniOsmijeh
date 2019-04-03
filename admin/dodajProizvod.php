<?php include "includes/header.php" ?>

<title>Dodaj Proizvod</title>

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
                  <span class="footer_title underline">DODAJ PROIZVOD</span>
              </div>
               <input type="hidden" class="tableName" value="proizvodi">
               <input type="hidden" class="pageName" value="sacuvajProizvodi">  
              <div class="col-lg-12 p-0" style="margin-top:50px">
                    <form class="contact_form p-0" id="infoForm">
                                       <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-4 form-group">
                                             <label class="form_label" for="pol">Pol (* U slučaju higijene, igrački i školskog pribora odaberite Oboje)</label>
                                             <select id="pol" name="pol" class="contact_inputs form-control form-control-lg pol" required>
                                                 <option value="muški">Muški</option>
                                                 <option value="ženski">Ženski</option>
                                                 <option value="oboje">Oboje</option>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-4 form-group">
                                             <label class="form_label" for="kategorija">Kategorija</label>
                                             <select id="kategorija" name="kategorija_id" class="contact_inputs form-control form-control-lg pol" required>
                                              <?php 
                                                  $kategorija = [];
                                                 
                                                   $query = "SELECT * FROM kategorije";
                                                   $result = mysqli_query($connection, $query);
                                                   testQuery($result);
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                                  array_push($kategorija, $row['id']);      
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                        <div class="col-lg-4 form-group" id="subcategory_container">
                                             <label class="form_label" for="podkategorija">Podkategorija</label>
                                             <select id="podkategorija" name="podkategorija_id" class="contact_inputs form-control form-control-lg pol" required>
                                              <?php     
                                                   $query = "SELECT * FROM podkategorije WHERE kategorija_id ={$kategorija[0]}";
                                                   $result = mysqli_query($connection, $query);
                                                   testQuery($result);
    
                                                  while($row = mysqli_fetch_assoc($result)){
                                              ?>    
                                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['naziv'] ?></option>
                                              <?php } ?>
                                             </select>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="cijena">
                                                 Cijena €
                                             </label>
                                             <input id="cijena" type="text" name="cijena" class="contact_inputs form-control form-control-lg cijena" maxlength="15" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="broj">
                                                 Broj
                                             </label>
                                             <input id="broj" type="text" name="broj" class="contact_inputs form-control form-control-lg broj" maxlength="6" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="uzrast">
                                                 Uzrast (* U slučaju higijene, igrački i školskog pribora odaberite 0)
                                             </label>
                                             <input id="uzrast" type="number" name="uzrast" class="contact_inputs form-control form-control-lg uzrast" min="0" max="17" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="kolicina">
                                                 Količina
                                             </label>
                                             <input id="kolicina" type="number" name="kolicina" class="contact_inputs form-control form-control-lg kolicina" min="1" max="1000" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                 
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="proizvodi.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
                                 </div>
                              </div>   
                              </div>
                             </form> 
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

   





