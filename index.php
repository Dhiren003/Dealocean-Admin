<?php
session_start();
 include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 2.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout01/user-login.php by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 07 Aug 2015 05:36:27 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login | Dealocean</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/d.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="post" id="form1">
        <div class="row">
          <div class="input-field col s12 center">
				<img src="images/d.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Dealocean</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="uname" data-bvalidator="alphanum,required" data-bvalidator-msg="Please Enter UserName">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="pass" data-bvalidator="alphanum,required" data-bvalidator-msg="Please Enter Password">
            <label for="password">Password</label>
          </div>
        </div>
               <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12" name="login" type="submit">Login</button>
          </div>
        </div>
       <?php
				if(isset($_REQUEST['login']))
				{
					$res = mysql_query("select * from tbl_admin where name='".$_REQUEST['uname']."' and password='".$_REQUEST['pass']."'");
					if(mysql_num_rows($res)>0)
					{
						while($r = mysql_fetch_array($res))
						{
							$uname = $r['name'];
							$pwd = $r['password'];
						}
						
						if($uname==$_REQUEST['uname'] && $pwd==$_REQUEST['pass'])
						{
							$_SESSION['adminname'] = $_REQUEST['uname'];
							echo $_SESSION['adminname'];
							echo "<script>window.location='dashboard.php';</script>";
						}
						else
						{
							echo "Username & Password Does Not Match";
						}
					}
					else
					{
						echo "Username & Password Invalid";
					}
					}
					?>
					<?php
						
					
					//echo "<script>window.location='index.php';<script>";
					
					?>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="validation/jquery.bvalidator.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
	//alert('d');
	$('.showsource').each(function(){
		var id = $(this).attr('id');
		var source = $('#' + id + 'v').html();
		$('#' + id).text(source); 
	});
}); 
</script>
<link href="validation/bvalidator.theme.gray2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> var optionsGray2 = { classNamePrefix: 'bvalidator_gray2_', position: {x:'right', y:'center'}, offset: {x:15, y:0}, template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>' }; $(document).ready(function () { $('#form1').bValidator(optionsGray2); }); </script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout01/user-login.php by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 07 Aug 2015 05:36:30 GMT -->
</html>