<?php 
session_start();
if(!isset($_SESSION['adminname']))
{
unset($_SESSION['adminname']);
echo "<script>window.location='index.php';</script>";
}

include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 2.1
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout01/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 07 Aug 2015 05:35:49 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <?php
  if(isset($_REQUEST['update']))
  {
  ?>
  <title>Update Package | Helping Hand </title>
<?php } else { ?>
<title>Add Package | Helping Hand </title>
<?php } ?>
  <!-- Favicons-->
  <link rel="icon" href="images/favicon/h.png" sizes="32x32">
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


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <?php include 'header.php'; ?>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
     <?php include 'sidebar.php'; ?>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Package</h5>
                <ol class="breadcrumb">
                  <li><a href="dashboard.php">Dashboard</a>
                  </li>
                  <li><a href="view_package.php">Package</a>
                  </li>
				   <?php
				  	if(isset($_REQUEST['update']))
					{
				  ?>
                  <li class="active">Update Package</li>
				  <?php } else { ?>
			<li class="active">Add Package</li>
				  <?php } ?>
                  
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
<?php
  	
		$pkgnames = "";
		$pkgpoint = "";
		$pkgamt = "";
  
	if(isset($_REQUEST['update']))
	{
		$res  = mysql_query("select * from tbl_pkg where pkg_id='".$_REQUEST['update']."'");
		while($r = mysql_fetch_array($res))
		{
			$pkgnames = $r['pkg_name'];
			$pkgpoint  = $r['points'];
			$pkgamt = $r['amount'];
		}
	}	
				  ?>

        <!--start container-->
        <div class="container">
          <div class="section">

            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
                
                <!-- Form with placeholder -->
                <div class="col s12 m12 l8" style="margin-left:16%">
                  <div class="card-panel">
				  <?php 
				  if(isset($_REQUEST['update']))
				  {
				  ?>
                    <h4 class="header2">Update Package</h4>
                    <?php } else { ?>
					<h4 class="header2">Add Package</h4>
					<?php } ?>
					<div class="row">
                      <form class="col s12" method="post" id="form1">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name2" type="text" name="pkgname" value="<?php echo $pkgnames; ?>" data-bvalidator="alpha,required" data-bvalidator-msg="Please Enter Name">
                            <label for="first_name">Name</label>
                          </div>
                        </div>
                       
                        <div class="row">
                          <div class="input-field col s6">
                        <input id="email5" type="number" name="points" value="<?php echo $pkgpoint; ?>" data-bvalidator="number,required" data-bvalidator-msg="Please Enter Points">
                        <label for="contact">Points</label>
                      </div>
					  <div class="input-field col s6">
                        <input id="email5" type="number" name="amt" value="<?php echo $pkgamt; ?>" data-bvalidator="number,required" data-bvalidator-msg="Please Enter Amount">
                        <label for="contact">Amount</label>
                      </div>
                          <div class="row">
                            <div class="input-field col s12">
							<?php 
							if(isset($_REQUEST['update']))
							{
							?>
                              <button class="btn cyan waves-effect waves-light right" style="margin-left:1%" type="submit" name="txtupdate">Update
                              <?php } else { ?>  
							  <button class="btn cyan waves-effect waves-light right" style="margin-left:1%" type="submit" name="txtsubmit">Submit
							  <?php } ?>
                              </button>
							
							   <button class="btn grey waves-effect waves-light right" type="reset" name="action">Reset
                               <?php 
							   if(isset($_REQUEST['txtsubmit']))
							   {
							   echo "<script>window.location='view_package.php';</script>";
							   }
							   ?>
                              </button>
							                              </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
				if(isset($_REQUEST['txtsubmit']))
				{
					$res = mysql_query("select *from tbl_pkg where pkg_name='".$_REQUEST['pkgname']."'");
					if(mysql_num_rows($res)>0)
					{
						echo "This Package has Already Exits..";
					}
					else
					{
					mysql_query("insert into tbl_pkg values (null, '".$_REQUEST['pkgname']."','".$_REQUEST['points']."' , '".$_REQUEST['amt']."')") or die(mysql_error());
					
					echo "<script>window.location='add_package.php';</script>";
				}
				}
			 ?>
		<?php if(isset($_REQUEST['txtupdate'])){
			mysql_query("update tbl_pkg set pkg_name='".$_REQUEST['pkgname']."',points='".$_REQUEST['points']."', amount='".$_REQUEST['amt']."' where pkg_id='".$_REQUEST['update']."'");
					
					echo "<script>window.location='view_package.php';</script>";
				
			}
?>
            <!-- Form with icon prefixes -->
            
          </div>

          <!-- Inline Form -->
          
          <!-- Inline form with placeholder -->
          

          <!--Form Advance-->          
          
      </div>
  </section>
  <!-- END CONTENT -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- START RIGHT SIDEBAR NAV-->
  <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
            <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
            <div id="right-search" class="row">
                <form class="col s12">
                    <div class="input-field">
                        <i class="mdi-action-search prefix"></i>
                        <input id="icon_prefix3" type="text" class="validate">
                        <label for="icon_prefix">Search</label>
                    </div>
                </form>
            </div>
            </li>
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                    <div class="collapsible-body recent-activity">
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">just now</a>
                                <p>Jim Doe Purchased new equipments for zonal office.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Yesterday</a>
                                <p>Your Next flight for USA will be on 15th August 2015.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Last Week</a>
                                <p>Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                    <div class="collapsible-body sales-repoart">
                        <div class="sales-repoart-list  chat-out-list row">
                            <div class="col s8">Target Salse</div>
                            <div class="col s4"><span id="sales-line-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Payment Due</div>
                            <div class="col s4"><span id="sales-bar-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Delivery</div>
                            <div class="col s4"><span id="sales-line-2"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Progress</div>
                            <div class="col s4"><span id="sales-bar-2"></span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                    <div class="collapsible-body favorite-associates">
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Eileen Sideways</p>
                                <p class="place">Los Angeles, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Zaham Sindil</p>
                                <p class="place">San Francisco, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Renov Leongal</p>
                                <p class="place">Cebu City, Philippines</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Weno Carasbong</p>
                                <p>Tokyo, Japan</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Nusja Nawancali</p>
                                <p class="place">Bangkok, Thailand</p>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </li>
        </ul>
      </aside>
  <!-- LEFT RIGHT SIDEBAR NAV-->

  </div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
<?php include 'footer.php'; ?>
  <!-- END FOOTER -->



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
<script type="text/javascript"> var optionsGray2 = { classNamePrefix: 'bvalidator_gray2_', position: {x:'left', y:'center'}, offset: {x:80, y:0}, template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>' }; $(document).ready(function () { $('#form1').bValidator(optionsGray2); }); </script> 

	  
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    
</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout01/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 07 Aug 2015 05:35:49 GMT -->
</html>