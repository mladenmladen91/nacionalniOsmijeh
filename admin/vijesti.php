<?php include "includes/header.php" ?>

<title>Vijesti</title>

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
                  <span class="footer_title underline">VIJESTI</span>
              </div>
             <input type="hidden" class="table" value="vijesti">   
              <div class="col-lg-12" style="margin: 50px 0 20px 0">
                  <a href="dodajVijest.php"><span class="view_span" style="font-size: 17px; font-weight:bold; padding: 10px !important;" title="Dodaj"><i class="fas fa-plus"></i>&ensp;DODAJ</span></a> 
              </div>   
              <div class="col-lg-12 vijesti_container" style="overflow: auto;">
                
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





