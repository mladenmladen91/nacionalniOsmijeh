<?php include "includes/header.php" ?>

<title>Dodaj Kategoriju</title>

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
                  <span class="footer_title underline">DODAJ KATEGORIJU</span>
              </div>
                 
              <div class="col-lg-12 p-0" style="margin-top:50px">
                  <input type="hidden" class="tableName" value="kategorije">
                  <input type="hidden" class="pageName" value="sacuvajKategoriju">
                    <form class="contact_form p-0" id="infoForm">
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naziv (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naziv" class="contact_inputs form-control form-control-lg naziv" maxlength="70" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                         
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="fotografija">
                                                 Logo (Maksimalna veličina je 8MB)
                                             </label>
                                             <input id="fotografija" type="file" name="fotografija" class="contact_inputs form-control form-control-lg fotografija" required>
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






