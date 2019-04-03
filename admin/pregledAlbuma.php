<?php include "includes/header.php" ?>

<title>Pregled Albuma</title>

<?php 
    // including stylesheets for this page
    $pageName = basename(__FILE__);
    include "stylesheets.php";

     if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
       header('location:javascript://history.go(-1)');
     }

   $id = $_GET['id'];

   // redirect if not logged in
    redirect();

     $query = "SELECT * from albumi where id={$id}";
     $result = mysqli_query($connection, $query);
     if(!$result){
        die(mysqli_error($connection));
     }
     $row = mysqli_fetch_assoc($result);

     $naslovna = $row['fotografija'];

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
                  <span class="footer_title underline"><?php echo $row['naslov'] ?></span>
              </div>
              <div class="col-lg-12" style="margin-top: 20px;">  
                  <span class="footer_title underline" style=" font-size: 16px"><i class="fas fa-calendar-alt"></i>&ensp;<?php echo $newDate = date("d.m.Y", strtotime($row['datum'])) ?></span>
              </div>   
              <div class="col-lg-12" style="margin: 80px 0">
                <a href="#" style="color:white" class="change_btn" data-toggle="modal" data-target="#fotografija"><i class="fas fa-plus"></i>&ensp;DODAJ</a>
           </div>
           <div class="col-lg-12">
               <a href="#" id="coverPhoto" style="color: white; background: green; padding: 15px; border-radius: 5px">Odaberi naslovnu fotografiju</a>
               
           </div>       
            
              <div class="col-lg-12 p-0" style="padding:50px !important">
                   
                                 <ul class="col-lg-12 photo_league_gallery p-0 m-0 text-center" id="lightgallery">
                      <?php     
                         $stmtSezone = mysqli_prepare($connection, "SELECT id, fotografija FROM fotografije WHERE album_id = ?");
                         $stmtSezone->bind_param('i', $id);
                         $stmtSezone->execute();
                         testQuery($stmtSezone);
                         $stmtSezone->bind_result($id, $naziv);
                                     
                         while($stmtSezone->fetch()){
                       ?>  
                                     <li class="col-lg-2 col-sm-2 text-center p-2 m-0 photo_league_gallery_picture photoRow" style="margin-bottom:20px" data-src="images/fotografije/<?php echo $naziv ?>">
                                     <input class="radio_cover" type="radio" name="cover" value="<?php echo $naziv ?>"
                                        <?php echo ($naslovna === $naziv)? 'checked':'' ?>     
                                      >       
                                      <img src="images/fotografije/<?php echo $naziv ?>" class="img-responsive my-2" style="width:100%;">
                                         
                                      <input type="hidden" class="rowId" value="<?php echo $id ?>">
                                     <span class="deleteBtn delete_btn" title="Obriši"><i class="fas fa-trash-alt"></i></span>
                                     <input type="hidden" class="photoName" value="<?php echo $naziv ?>"> 
                                     </li>
                         <?php } ?>             
                                 </ul>
                                 
                            
               </div>
                   
                   
            
           </div> 
            <div class="col-lg-12 option_container" style="margin-top: 50px; padding: 0 65px">
                                <div class="row">  
                                 <div class="col-lg-2 col-md-4 text-center" style="padding-top: 20px">
                                     <span class="save_btn text-center" title="Izmijeni" ><i class="fas fa-save"></i>&ensp;SAČUVAJ</span>
                                </div>
                                <div class="col-lg-2 col-md-4 text-center" style="padding-top: 20px">     
                                     <span class="decline_btn text-center" title="Odustani"><i class="fas fa-times"></i>&ensp;ODUSTANI</span>
                                 </div>
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

       <!-- popup za dodavanje slika -->
    <div class="modal fade" id="fotografija">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header popup_header">
                    <button type="button" class="close close_new_tag" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">NOVA FOTOGRAFIJA</h4>
                    
                </div>
                <form id="modalAddPhotography">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <label  class="form_label"  for="fotografija">
                            Fotografija (Maksimalna veličina je 8MB)
                        </label>
                        <input type="hidden" name="album_id" value="<?php echo $_GET['id'] ?>">
                        <input id="fotka" type="file" name="fotografija" required>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button class="change_btn save_tag" id="saveTag" style="width:80%; margin:auto; display:block"><i class="fas fa-plus"></i>&ensp;Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- /popup za dodavanje slike -->
 <script>
    $(document).ready(function(){
        // saving photo
        $("#modalAddPhotography").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            savePhoto(formData, <?php echo $_GET['id'] ?>);
            
        });
       
        // deleting photo
        $(".delete_btn").click(function(){
              deleteSection($(this));
        });
        
        
        // changing cover photo photo
        $(".save_btn").click(function(){
                coverPhoto(<?php echo $_GET['id'] ?>);
        });
        
   
        
       // choosing option for cover photo
        $("#coverPhoto").click(function(e){
           e.preventDefault();
        
           $(".radio_cover, .save_btn, .decline_btn").css({
                "display": "block"
           });
        });
    
        
        // declining options for cover photo        
        $(".decline_btn").click(function(e){
            e.preventDefault();
        
            $(".radio_cover, .save_btn, .decline_btn").css({
                "display": "none"
            });
         });
        
    });
  </script>
   





