<?php include "includes/header.php" ?>

<title>Dodaj Post</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    // redirect if not login
     redirect();
?>
<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

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
                  <span class="footer_title underline">DODAJ POST</span>
              </div>
                 
              <div class="col-lg-12 p-0" style="margin-top:50px">
                  <input type="hidden" class="tableName" value="postovi">
                  <input type="hidden" class="pageName" value="sacuvajObjave">
                    <form class="contact_form p-0" id="infoForm">
                                <input type="hidden" name="table" value="postovi">
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naslov (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naslov" class="contact_inputs form-control form-control-lg naslov" maxlength="70" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="datum">
                                                 Datum
                                             </label>
                                             <input id="datum" type="text" name="datum" class="contact_inputs form-control form-control-lg datum" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="fotografija">
                                                 Fotografija (Maksimalna veličina je 8MB)
                                             </label>
                                             <input id="fotografija" type="file" name="fotografija" class="contact_inputs form-control form-control-lg fotografija" required>
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                  
                                 <input type= hidden class="contact_inputs form-control form-control-lg tekst" name="tekst">
                                 <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="tekst">Tekst</label>
                                             <div id="editor"></div>
                                             <span class="text_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                 </div>
                        
                                <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="postovi.php" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
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
<script src="ckfinder/ckfinder.js"></script>    
<?php 
    include "scripts.php";
?>

<script>
var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                [{ 'direction': 'rtl' }],                         // text direction

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [ 'link', 'image', 'video', 'formula' ],          // add's image support
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],
                [{ 'align': [] }],

                ['clean']                                         // remove formatting button
            ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions,
                
            },
            theme: 'snow'
        });
</script>




