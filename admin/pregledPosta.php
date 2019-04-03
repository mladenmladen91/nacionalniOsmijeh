<?php include "includes/header.php" ?>

<title>Pregled Posta</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
          header('location:javascript://history.go(-1)');
        }

       $id = $_GET['id'];

       redirect();

        $stmt = mysqli_prepare($connection, "SELECT naslov, tekst, datum, fotografija FROM postovi WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if(!$stmt){
           die(mysqli_error($connection));
        }
        mysqli_stmt_store_result($stmt);
        $rows = mysqli_stmt_num_rows($stmt);
        $stmt->bind_result($naslov, $tekst, $datum, $fotografija);
        $stmt->fetch();

        if($rows === 0){
            header('location: ../index.php');
        }
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
          <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline"><?php echo $naslov; ?></span>
              </div>
              <div class="col-lg-12 p-0" style="margin-top:50px">
                             <div class="col-md-12 mb-2">
                                     <img src="images/vijesti/<?php echo $fotografija; ?>" alt="slika" style="max-width: 200px; margin-bottom: 60px;">
                                </div>
                        
                                <div class="col-lg-12 show_text">
                                    <?php echo $tekst; ?>
                                </div>
                  
                                <div class="col-lg-12 show_text">
                                  <?php echo $datum; ?>
                                </div>
                            <div class="col-lg-12 text-center" style="margin-top: 30px;">
                <a href="izmijeniPost.php?id=<?php echo $id; ?>" class="change_btn" style="color:white;"><i class="fas fa-edit"></i>&ensp;IZMIJENI</a>      
                                 
                              
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

 





