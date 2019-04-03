<nav class="navbar navbar-expand-xl mb-3 fixed-top nav_container">
      <a class="navbar-brand navbar_white" href="index.php" style="padding: 11px 79px; display:none"><img src="images/logo-white.png"
     class="img-responsive" width="110px"></a>
      <a class="navbar-brand navbar_color" href="index.php" style="padding: 11px 20px;"><img class="img-responsive" src="images/logo.png" width="110px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="ham2"></span>
      </button>
      <div class="collapse navbar-collapse text-center nav_collapse_container p-0" id="navbarsExample01">
          
        <ul class="navbar-nav nav_container_links ml-auto">
             <li class="nav-item p-2">
            <a class="nav-link index" href="index.php">Početna</a>
          </li>
          <li class="nav-item p-2">
            <a class="nav-link doniraj" href="doniraj.php">Doniraj</a>
          </li>
            
        <li class="nav-item p-2">
            <a class="nav-link vijesti" href="vijesti.php">Vijesti</a>
          </li>     
            
         <li class="nav-item p-2">
            <a class="nav-link blog" href="blog.php">Blog</a>
          </li>     
            
          <li class="nav-item p-2">
            <a class="nav-link galerija" href="galerija.php">Galerija</a>
          </li>
         
         
         <li class="nav-item p-2">
            <a class="nav-link prijatelji" href="prijatelji.php">Prijatelji</a>
          </li>
          <li class="nav-item p-2">
            <a class="nav-link onama" href="onama.php">O nama</a>
          </li>    
         
        </ul>
         
        </div>     
    </nav>
</div>
<?php $basename = str_replace('.php', '', basename($_SERVER["PHP_SELF"])) ?>
<script>
    $(document).ready(function(){
        var pageName = "<?php echo $basename; ?>";
        
        $(".nav-link_active").removeClass("nav-link_active");
        $("."+pageName).addClass("nav-link_active");
        
        if(pageName == 'clanak'){
            $(".blog").addClass("nav-link_active");
        }
        
        if(pageName == 'vijest'){
            $(".vijesti").addClass("nav-link_active");
        }
        
        if(pageName == 'album'){
            $(".galerija").addClass("nav-link_active");
        }
        
        
        $('.navbar-toggler').click(function(e){
             e.preventDefault();
  	         $(this).toggleClass("transX");
 
         });
    });

</script>