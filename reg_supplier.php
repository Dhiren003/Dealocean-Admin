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
  <title>Add Category | Dealocean </title>

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
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Helping Hands">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Category</h5>
                <ol class="breadcrumb">
                  <li><a href="dashboard.php">Dashboard</a>
                  </li>
                  <li><a href="view_category.php">Category</a>
                  </li>
          <?php
            if(isset($_REQUEST['update']))
          {
          ?>
                  <li class="active">Update Category</li>
          <?php } else { ?>
          <li class="active">Add Category</li>
          <?php } ?>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

  <?php
    
    $suppname = "";
    $contact = "";
    $emailid = "";
    $pwd = "";
    $gdr = "";
    $address = "";
    $suppimg = "";
    $suppcharges= "";
  
  if(isset($_REQUEST['update']))
  {
    $res  = mysql_query("select * from tbl_suppliers where supp_id='".$_REQUEST['update']."'");
    while($r = mysql_fetch_array($res))
    {
      $suppname = $r['supp_name'];
      $contact  = $r['contact_no'];
      $emailid = $r['email'];
      $pwd = $r['password'];
      $gdr = $r['gender'];
      $address = $r['shop_address'];
      $suppimg = $r['suppliers_img'];
      $suppcharges = $r['Delivery_Charges'];
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
        if(isset($_REQUEST['txtsubmit']))
        {
          $res = mysql_query("select * from tbl_suppliers where supp_name='".$_REQUEST['txtsuppname']."'");
          if(mysql_num_rows($res)>0)
          {
            //echo "This Category Already Exits..";
            ?>
            <div class="card" style="background-color:#FF0000;">
                      <div class="card-content white-text">
            <i class="mdi-av-new-releases"></i>
                        <span class="card-title"> ERROR</span>
                        <p>This Category Already Exits...</p>
                      </div>
                    </div>

            
          <?php }
          else
          {
          move_uploaded_file($_FILES['txtimg']['tmp_name'], "uploads/helperimg/".date('dmy').$_FILES['txtimg']['name']);
          $file = date('dmy').$_FILES['txtimg']['name'];
          
          
          mysql_query("insert into tbl_suppliers values (null, '".$_REQUEST['suppname']."', '".$_REQUEST['con']."','".$_REQUEST['email_id']."','".$_REQUEST['pass']."','".$_REQUEST['gndr']."', '".$_REQUEST['add']."','".$file."','".$_REQUEST['v_charge']."')") or die(mysql_error());
          
          echo "<script>window.location='view_supplier.php';</script>";
          }
        }
      ?>
          
          
           <?php
            if(isset($_REQUEST['update']))
          {
          ?>
                    <h4 class="header2">Update Category</h4>
                    <?php } else {?>
           <h4 class="header2">Add Category</h4>
          <?php } ?>
          <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data" id="form1">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="name2" type="text" name="txtsuppname"  value="<?php echo $suppname; ?>" data-bvalidator="alpha,required" data-bvalidator-msg="Please Enter Category Name">
                            <label for="first_name">Name</label>
                          </div>
                        </div>
                       
                       <div class="col s6 select-wrapper">
                        <select name="catname">
            <option>Select Category</option>
            <?php
            $res1 = mysql_query("select * from  tbl_category");
            while($r1 = mysql_fetch_array($res1))
            {
            ?>
            <option value="<?php echo $r1['cat_id']; ?>"><?php echo $r1['cat_name']; ?></option>
            <?php } ?>
            </select>
                       
                      </div>
                    </div>
                        
            
            <div class="row">
                      <div class="input-field col s6">
                        <input id="email5" type="number" name="con" value="<?php  echo $contact; ?>" data-bvalidator="number,required" data-bvalidator-msg="Please Enter valid Number">
                        <label for="contact">Contact</label>
                      </div>
            
                      <div class="input-field col s6">
                        <input id="email5" type="email" name="email_id" value="<?php  echo $emailid; ?>" data-bvalidator="email,required" data-bvalidator-msg="Please Enter valid Email">
                        <label for="email">Email</label>
                      </div>
                    </div>

                    <div class="row">
          <?php 
          if(isset($_REQUEST['update']))
          {
          ?>
                      <div class="input-field col s6">
                        <input id="password6" type="password" name="pass" disabled="disabled">
                        <label for="password">Password</label>
                      </div>
              <?php } else { ?>
         <div class="input-field col s6">
                        <input id="password6" type="password" name="pass" data-bvalidator="alphanum,required" data-bvalidator-msg="Please Enter Password">
                        <label for="password">Password</label>
                      </div>
              <?php } ?>
              <div class="row">
           <div class="input-field col s6">
                        <select name="gndr" value="<?php echo $gdr; ?>" data-bvalidator="number,required" data-bvalidator-msg="Please Enter valid price">
                         <!-- <option value="" disabled selected>Per Visit Charge</option>-->
                          <option >Male</option>
                          <option >Female</option>
                          <option >Others</option>
                        </select>
                        <label>Gender</label>
                    </div>
                  </div>
                   <div class="row">
          <div class="input-field col s12">
                        <input id="address" type="text" name="add" value="<?php echo $address; ?>" data-bvalidator="required" data-bvalidator-msg="Please Enter Address">
                        <label for="address">Address</label>
                      </div>
            </div>

                      <?php
            if(isset($_REQUEST['update']))
          {
          ?>
                    <div class="file-field input-field">
                      <input class="file-path validate" type="text" />
                      <div class="btn">
                        <span>Image</span>
                        <input type="file" name="newimg" />
            
                      </div>
                    </div>
          <input type="hidden" value="<?php echo $suppimg; ?>" name="oldimg" />
          <img src="uploads/helperimg/<?php echo $suppimg; ?>" style="height:100px; width:100px"/>
          <?php } else { ?>
          
          <div class="file-field input-field col s12">
                      <input class="file-path validate" type="text" />
                      <div class="btn">
                        <span>Image</span>
                        <input type="file" name="txtimg" data-bvalidator="extension[jpg:png:jpeg]" data-bvalidator-msg="Please Select Image" />
            
                      </div>
                    </div>
          <?php } ?>
                         
            
               <div class="row">
           <div class="input-field col s12">
                        <select name="v_charge" value="<?php echo $suppcharges; ?>" data-bvalidator="number,required" data-bvalidator-msg="Please Enter valid price">
                         <!-- <option value="" disabled selected>Per Visit Charge</option>-->
                          <option >100</option>
                          <option >150</option>
                          <option >200</option>
                          <option >250</option>
                          <option >300</option>
                        </select>
                        <label>Per Visit Charge</label>
                    </div>
                  </div>

                  <?php 
          if(isset($_REQUEST['update']))
          {?>
                         
              <div class="input-field col s6">
                        <input type="date" class="datepicker" name="r_date" disabled="disabled">
                        <label for="dob">Reg_Date</label>
                      </div>
            <?php } else{ ?>
             <div class="input-field col s6">
                        <input type="date" class="datepicker" name="r_date" data-bvalidator="date[dd.mm.yyyy],required" type="text" disabled="disabled" value="<?php echo date('y-m-d'); ?>"/>
                        <label for="dob">Reg_Date</label>
                      </div>
            <?php } ?>
            </div>

                          <div class="row">
                            <div class="input-field col s12">
               <?php
            if(isset($_REQUEST['update']))
          {
          ?>
                              <button class="btn cyan waves-effect waves-light right" style="margin-left:1%" type="submit" name="txtupdate">Update </button>
                <?php } else { ?>
                 <button class="btn cyan waves-effect waves-light right" href="#modal1" style="margin-left:1%" type="submit" name="txtsubmit">Submit</button>
              <?php } ?>
                 <button class="btn grey waves-effect waves-light right" type="reset" name="action">Reset
                           
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
        if(isset($_REQUEST['txtupdate']))
        {
          if($_FILES['newimg']['name']=="")
          {
            
            $file1=$_REQUEST['oldimg'];
            
          }
          else
          {
            unlink("uploads/helperimg/".$_REQUEST['oldimg']);
            move_uploaded_file($_FILES['newimg']['tmp_name'], "uploads/helperimg/".date('dmy').$_FILES['newimg']['name']);
             $file1 = date('dmy').$_FILES['newimg']['name'];
          }
          
          mysql_query("update tbl_suppliers set supp_name='".$_REQUEST['suppname']."', contact_no='".$_REQUEST['con']."', email='".$_REQUEST['email_id']."', password='".$_REQUEST['pass']."', gender='".$_REQUEST['gndr']."', shop_address='".$_REQUEST['add']."', suppliers_img='".$file1."', Delivery_Charges ='".$_REQUEST['v_charge']."' where supp_id ='".$_REQUEST['update']."'");
          
          echo "<script>window.location='view_supplier.php';</script>";
        
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
<script type="text/javascript"> var optionsGray2 = { classNamePrefix: 'bvalidator_gray2_', position: {x:'right', y:'center'}, offset: {x:15, y:0}, template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>' }; $(document).ready(function () { $('#form1').bValidator(optionsGray2); }); </script> 
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