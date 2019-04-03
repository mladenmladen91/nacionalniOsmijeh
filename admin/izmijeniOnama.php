<?php include "includes/header.php" ?>

<title>Izmijeni o nama</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    // redirect if not login
     redirect();

     $stmtSezone = mysqli_prepare($connection, "SELECT tekst, fotografija FROM onama");
     $stmtSezone->execute();
     if(!$stmtSezone){
        die(mysqli_error($connection));
     }
     $stmtSezone->bind_result($tekst, $fotografija);
     $stmtSezone->fetch();
     $stmtSezone->close();

 


?>
<!-- editor including -->
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

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
                  <span class="footer_title underline">IZMIJENI O NAMA</span>
              </div>
                 
              <div class="col-lg-12 p-0" style="margin-top:50px">
                    <form class="contact_form p-0" id="infoForm">
                                <div class="col-md-12 mb-2">
                                     <img src="images/onama/<?php echo $fotografija ?>" alt="slika" style="max-width: 100px;">
                                </div>
                                <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="fotografija">
                                                 Fotografija
                                             </label>
                                             <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija ?>">
                                             <input id="fotografija" type="file" name="fotografija" class="contact_inputs form-control form-control-lg fotografija" >
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                 </div>
                        
                                 <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="tekst">Tekst</label>
                                             <textarea id="tekst" class="contact_inputs form-control form-control-lg tekst" name="tekst" style="resize:vertical; min-height:130px"><?php echo $tekst ?></textarea>
                                             <span class="text_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                 </div>
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="onama.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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

<script>
    $(document).ready(function(){
        // saving changes for news
        $("form").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            saveAbout(formData);
            
        });
        
        
        
    }); 

    

     ClassicEditor
	.create( document.querySelector( '#tekst' ), {
		ckfinder: {
			uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            
		},
        
		toolbar: ['heading', '|', 'bold', 'italic', '|', 'undo', 'redo','NumberedList', 'BulletedList']
	} )
	.catch( error => {
		console.error( error );
	} );
 </script>    





