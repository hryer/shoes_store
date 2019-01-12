<?php 
  include("../config/config.php");
?>

<!DOCTYPE html>



<head>

  

  <title>Administrator Kuy Shoes Store</title>

  <link rel="stylesheet" href="<?php echo $base_url; ?>/css/loginstyle.css">

  <script type="text/javascript" src="<?php echo $base_url; ?>/js/jquery-2.0.3.min.js"></script>
  <script>
  function loginformvalidation(){
        if($("#username").val()==""){
          alert("Please, fill username");
          $("#username").focus();
          return false;
        }

        if($("#password").val()==""){
          alert("Please, fill password");
          $("#password").focus();
          return false;
        }

        return true;
      }
  $(document).ready(function(){
       $("#login_submit").click(function(e){
    // alert("Login Submut was clicked...");
        e.preventDefault();
          if(loginformvalidation()==true){

            $.ajax({
              type:"POST",
              url:"<?php echo $base_url; ?>serviceforajax/ceklogin.php",
              data:"username=" + $("#username").val() + "&password=" + $("#password").val()+"&level=admin",
              beforeSend: function(){
                $("#preloader").fadeIn(1500);
              },
              success: function(resdata){
                $("#preloader").fadeOut(1500);
                if(resdata=="1"){
                window.location.href="admin.php";
              }
              else{
                alert(resdata);
              }
              }


            });
          }

         });
  });
      </script>

  

  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>

  <section class="container">

    <div class="login">

      <h1>Login to CMS Kuy Shoes Store</h1>

      

      <form method="post" action="config/login_process.php">

        <p><input type="text" id="username" name="username" value="" placeholder="Username or Email"></p>

        <p><input type="password"  id="password" name="password" value="" placeholder="Password"></p>

        <p class="remember_me" hidden=true>

          <label>

            <input type="checkbox" name="remember_me" id="remember_me">

            Remember me on this computer

          </label>

        </p>

        <p class="submit"><input type="submit" id="login_submit" name="commit" value="Login"></p>

      </form>

      <p> <div id="success"></div> </p>

    </div>



    <div class="login-help" >

     

      <p hidden=true>Forgot your password? <a href="#">Click here to reset it</a>.</p>

    </div>

  </section>



  

</body>

</html>

