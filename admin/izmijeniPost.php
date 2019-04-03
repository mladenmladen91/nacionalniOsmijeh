<?php include "includes/header.php" ?>

<title>Izmijeni Post</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

    if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
          header('location:javascript://history.go(-1)');
    }

       $id = $_GET['id'];
 
       // if there isn't id don't load page
       redirect();

       $query = "SELECT * from postovi where id={$id}";
     $result = mysqli_query($connection, $query);
     if(!$result){
         die(mysqli_error($connection));
     }
     $row = mysqli_fetch_assoc($result);

     $count = mysqli_num_rows($result);

     if($count <= 0){
         header('location: ../index.php');
     }

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
                  <span class="footer_title underline">IZMIJENI POST</span>
              </div>
               <input type="hidden" class="player_id" value="<?php echo $id ?>">
              <input type="hidden" class="tableName" value="postovi">  
              <div class="col-lg-12 p-0"  id="change_news" style="margin-top:50px">
                    
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
			ClassicEditor
				.create( document.querySelector( '#tekst' ) )
				.then( editor => {
					console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );
       
 </script>    





