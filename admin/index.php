<?php include "includes/header.php";?>
<html>
<head>
    
   <title>Login</title>   
    
</head>    

    
  
    
<?php
    
    // redirecting if admin is already logged
    if(isset($_SESSION['username'])){
        header('location: dashboard.php');
    }

  if(isset($_GET['signout'])){  
   if($_GET['signout'] == "izloguj"){
       unset($_SESSION['username']);
   }
  }


?>
<style>

.container{
    background-color: white;
    border-radius: 3px;
    padding-bottom: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
.login_header{
    padding-top: 10px;
    padding-bottom: 10px;
    color: white;
    text-align: center;
    text-decoration: none !important;
    font-weight: bold;
    }
.login_header span{
    font-size: 20px;
    }
.login_label{
    color: black;
    font-weight: bold;
    margin-bottom: 0px;
    font-size: 15px;
    }
.login_input{
    width: 100%;
    height: 37px;
    border-radius: 3px !important;
    padding: 10px;
    margin: 0 !important;
    border: 1px solid #e9e9e9;
    font-size: 17px;    
    }
.login_btn{
    background-color: #3cb878;
    outline: none;
    border: none;
    width: 70%;
    height: 45px;
    border-radius: 6px;
    color: white;
    font-family: "Roboto", sans-serif;
    font-weight: 800;
    font-size: 17px;
    cursor: pointer;
}
.login_btn:hover{
    transform: scale(1.03);
 }
    





</style>
    
</head>

<body>
    <div class="col-lg-3 col-sm-6 col-10 container p-0">
                        <div class="col-sm-12 col-12 text-center login_header">
                            <img src="images/logo.png">
                        </div>
                       <div class="col-lg-12">
                        <form id="loginForm">
                        <div class="col-sm-12 col-12 form-group pt-2">
                            <div class="col-sm-12 col-12 pl-0 mt-2">
                                <label class="login_label" for="username">Korisničko ime</label>
                            </div>
                            <div class="col-sm-12 col-12">
                                <input type="text" name="username" id="username" class="login_input">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 form-group">
                            <div class="col-sm-12 col-12">
                                <label class="login_label" for="password">Lozinka</label>
                            </div>
                            <div class="col-sm-12 col-12">
                                <input type="password" name="password" id="password" class="login_input">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12 my-4 text-center">
                            <button class="login_btn" type="submit"><i class="fas fa-check"></i>&ensp;PRIJAVA</button>
                        </div>
                        </form>
                       
                       </div>
                  
            </div>
      
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $("#loginForm").submit(function(e){
        e.preventDefault();
        
        var formData = new FormData($(this)[0]);
        
        $form = $(this);
        
         $.ajax({
                type: 'POST',
                url: 'ajaxRequests/login.php',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success:function(message){
                      if(message === 'Success'){
                          window.location = 'dashboard.php';
                      }else{
                        swal(message);
                      }
                }
        })
        
    });
</script>
</body>
</html>
