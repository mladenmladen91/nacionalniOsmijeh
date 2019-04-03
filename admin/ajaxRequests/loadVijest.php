<?php
session_start();

include "../../includes/db.php";
    
include "../../includes/functions.php";

// redirect if not login
 redirect();

                $id = $_POST['id'];
                $table = $_POST['table'];

                switch($table){
            
                    case "vijesti":
                      $query = "SELECT naslov, tekst, datum, fotografija FROM vijesti WHERE id=?";
                     break;
        
                    case "postovi":
                        $query = "SELECT naslov, tekst, datum, fotografija FROM postovi WHERE id=?";
                    break;    
                 }
                

                $stmt = mysqli_prepare($connection, $query);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                if(!$stmt){
                   die(mysqli_error($connection));
                }
                mysqli_stmt_store_result($stmt);
                $rows = mysqli_stmt_num_rows($stmt);
                $stmt->bind_result($naslov, $tekst, $datum, $fotografija);
                $stmt->fetch();
                $stmt->close();

                

            ?>
            <form id="editNewsForm" class="contact_form p-0" id="infoForm">
                               <input type="hidden" value="<?php echo $id ?>" name="id">
                               <input type="hidden" value="<?php echo $table ?>" name="table">
                                <div class="col-md-12 mb-2" style="margin-bottom: 30px;">
                                     <img src="images/vijesti/<?php echo $fotografija ?>" alt="slika" style="max-width: 100px; object-fit:cover; object-position:top">
                                </div>
                                <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="fotografija">
                                                 Fotografija (Maksimalna veličina je 8MB)
                                             </label>
                                             <input type="hidden" name="stara_fotografija" value="<?php echo $fotografija ?>">
                                             <input id="fotografija" type="file" name="fotografija" class="contact_inputs form-control form-control-lg fotografija">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                 </div>
                        
                                 <div class="col-lg-8 form-group">
                                             <label class="form_label" for="naziv">Naslov (* Maksimalna dužina je 70 karaktera)</label>
                                             <input id="naziv" type="text" name="naslov" class="contact_inputs form-control form-control-lg naslov" maxlength="70" required value="<?php echo $naslov ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="datum">
                                                 Datum
                                             </label>
                                             <input id="datum" type="text" name="datum" class="contact_inputs form-control form-control-lg datum" required value="<?php echo $datum ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                   <input type= hidden class="contact_inputs form-control form-control-lg tekst" name="tekst">
                                 <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="tekst">Tekst</label>
                                             <div id="editor"><?php echo $tekst ?></div>
                                             <span class="text_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                 </div>
                            
                
                                 <div class="col-lg-12">
                                <div class="row">  
                                 <div class="col-lg-12" style="padding-top: 40px">
                                     <button class="form_btn text-center"  type="submit"><i class="fas fa-save"></i>&ensp;SAČUVAJ</button>
                                 
                                     <a href="<?php echo ($table === 'vijesti')? 'vijesti.php': 'postovi.php' ?>" class="giveup_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</a>
                                 </div>
                              </div>   
                              </div>
                             </form> 
           
 <script>
    $(document).ready(function(){
        // saving changes for news
        $("#editNewsForm").submit(function(e){
            e.preventDefault();
            
             var about = document.querySelector('input[name=tekst]');
             about.value = quill.root.innerHTML.trim();
           
           
            var formData = new FormData($(this)[0]);
            
            saveNews(formData, <?php echo $_POST['id'] ?>, '<?php echo $_POST['table'] ?>');
            
        });
        
        // datepicker loading
        $("#datum").datepicker({ dateFormat: 'yy-mm-dd' });
        
      
    }); 
    
     
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