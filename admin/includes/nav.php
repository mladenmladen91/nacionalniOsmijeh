<header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo" style="background-color: white !important">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../images/logo.png" height="30" width="40" ></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../images/logo.png" height="40" width="50" ></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: #41bdd5 !important">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/admin.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Administator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color: #41bdd5 !important">
                <img src="dist/img/admin.png" class="img-circle" alt="User Image">

                <p>
                  Administrator-profil
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="izmijeniProfil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?signout=izloguj" class="btn btn-default btn-flat">Odjavi se</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGACIJA</li>
        <li class="active dashboard">
          <a href="dashboard.php">
            <i class="fas fa-tachometer-alt"></i>&ensp;<span>Dashboard</span>
          </a>
        </li>
          
        <li class="vijesti">
          <a href="vijesti.php">
            <i class="far fa-newspaper"></i>&ensp;<span>Vijesti</span>
          </a>
        </li> 
          
        <li class="postovi">
          <a href="postovi.php">
            <i class="fas fa-blog"></i>&ensp;<span>Blog</span>
          </a>
        </li> 
            
        <li class="albumi">
          <a href="albumi.php">
            <i class="fas fa-images"></i>&ensp;<span>Galerija</span>
          </a>
        </li> 
          
        <li class="proizvodi">
          <a href="proizvodi.php">
            <i class="fas fa-shoe-prints"></i>&ensp;<span>Proizvodi</span>
          </a>
        </li> 
          
        <li class="onama">
          <a href="onama.php">
            <i class="fas fa-info"></i>&ensp;<span>O nama</span>
          </a>
        </li>
          
        <li class="prijatelji">
          <a href="prijatelji.php">
            <i class="fas fa-user-friends"></i>&ensp;<span>Prijatelji</span>
          </a>
        </li> 
          
          
        <li class="mailovi">
          <a href="mailovi.php">
            <i class="fas fa-envelope"></i>&ensp;<span>Mailovi</span>
          </a>
        </li>
          
        <li class="evidencija">
          <a href="evidencija.php">
            <i class="fas fa-award"></i>&ensp;<span>Evidencija donatora i proizvoda</span>
          </a>
        </li>  
         
        <li class="volonteri">
          <a href="volonteri.php">
            <i class="fas fa-user-friends"></i>&ensp;<span>Volonteri</span>
          </a>
        </li>  
          
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


<?php $basename = str_replace('.php', '', basename($_SERVER["PHP_SELF"])) ?>
<script>
   
        var pageName = "<?php echo $basename; ?>";
  
        document.getElementsByClassName("active")[0].classList.remove("active");
        document.getElementsByClassName(pageName)[0].classList.add("active");
        


</script>