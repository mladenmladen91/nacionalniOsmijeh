<?php include "includes/header.php" ?>

<title>Izmijeni Profil</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    // redirect if not login
     redirect();

     $stmtSezone = mysqli_prepare($connection, "SELECT username, password FROM admin");
     $stmtSezone->execute();
     testQuery($stmtSezone);
     $stmtSezone->bind_result($username, $password);
     $stmtSezone->fetch();
     $stmtSezone->close();
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
                  <span class="footer_title underline">IZMIJENI PROFIL</span>
              </div>
                 
              <div class="col-lg-12 p-0" style="margin-top:50px">
                    <form class="contact_form p-0" id="infoForm">
                                       <div class="col-lg-8 form-group">
                                             <label class="form_label" for="username">Username</label>
                                             <input id="username" type="text" name="username" class="contact_inputs form-control form-control-lg username" maxlength="70" required value="<?php echo $username ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                         
                                         
                                         <div class="col-lg-8 form-group">
                                             <label  class="form_label"  for="password">
                                                 Password
                                             </label>
                                             <input id="password" type="password" name="password" class="contact_inputs form-control form-control-lg password"  value="<?php echo $password ?>">
                                             <span class="form_result" style="color:#41bdd5; font-size:20px; display:none"></span>
                                         </div>
                        
                                        
                        
                                 
                                 <div class="col-lg-8 form-group">
                                     <button class="form_btn"  type="submit"><i class="fas fa-edit"></i>&ensp;IZMIJENI</button>
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
            
            saveProfile(formData);
            
        });
        
        
        
    }); 

 </script>     





