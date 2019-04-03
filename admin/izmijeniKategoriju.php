<?php include "includes/header.php" ?>

<title>Izmijeni Kategoriju</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    if(!isset($_GET['id'])){
       header('location:javascript://history.go(-1)');
     }

   $id = $_GET['id'];

   // redirect if not logged in
    redirect();

     $query = "SELECT * from kategorije where id={$id}";
     $result = mysqli_query($connection, $query);
     testQuery($result);
     $row = mysqli_fetch_assoc($result);

     $count = mysqli_num_rows($result);

     if($count <= 0){
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
          <div class="row">   
           <div class="col-lg-12 table_holder">
              <div class="col-lg-12">  
                  <span class="footer_title underline">IZMIJENI KATEGORIJU</span>
              </div>
              <input type="hidden" class="player_id" value="<?php echo $id ?>">
              <input type="hidden" class="tableName" value="kategorije">   
              <div class="col-lg-12 p-0" id="change_news" style="margin-top:50px">
                     
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






