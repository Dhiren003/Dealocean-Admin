<script>
	$(document).ready(function(){
	
function getcount()
{
		$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#no').html(data.length);
					$.each(data, function(i,item){ 
					
						$('#no').html(item.np);
						
							if(item.np>0)
						{  
						   
							//$('#chatAudio')[0].play();
							$('#newmem').show();
							$('#notm').hide();
							$('#newm').show();
							$('#notification').show();
							
						}
						else 
						 { $('#newmem').hide();
						   $('#notm').show();
						   $('#newm').hide();
						   $('#notification').hide();
						  }
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			
	}
	getcount();
	
	function receiptcount()
{
		$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification/receipt_count',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#rcno').html(data.length);
					$.each(data, function(i,item){ 
					
						$('#rcno').html(item.pr);
						
						if(item.pr>0)
						{  
						   
							//$('#chatAudio1')[0].play();
							$('#newrec').show();
							$('#not').hide();
							$('#new').show();
							$('#newreciept').show();
							
						}
						else 
						 { $('#newrec').hide();
						   $('#not').show();
						   $('#new').hide();
						   $('#newreciept').hide();
						  }
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			
	}
	receiptcount();
	
	
		function get_notification()
		{
				$('#notification').html('');
				$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification/getnotification',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				async : false,
				success: function(data, status){
                  
					$.each(data, function(i,item){ 
					 
    					var menudate = new Date(item.rdate_time);
  						var menudate1 = menudate.toString("d MMM yyyy hh:mm:ss");
						 var res = menudate1.substr(0, 16);
						$('#notification').append('<a href="#" class="not_member" id='+ item.noti_id+'><div class="user-img"> <img src="<?php echo $base ?>plugin_admin/plugins/images/users/arijit.jpg" alt="user" class="img-circle"></div><div class="mail-contnet"><h5>'+item.member+'</h5><span class="mail-desc">Registered on '+ res +'</span> </div></a>');
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			   $('#notification').append('<li><a class="text-center" href="<?php echo $base; ?>index.php/club100wealth/con_memberlist/notapprove_member"><strong>See All New Members </strong><i class="fa fa-angle-right"></i></a></li>');
		}
	get_notification();
	
	function get_receipt()
		{
				$('#newreciept').html('');
				$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification/get_receipt',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				async : false,
				success: function(data, status){
                  
					$.each(data, function(i,item){ 
					    var menudate = new Date(item.rdate_time);
  						var menudate1 = menudate.toString("d MMM yyyy hh:mm:ss");
					   var res = menudate1.substr(0, 16);
						
						$('#newreciept').append('<a href="#" class="not_reciept" id='+ item.noti_id+'><div class="user-img"> <img src="<?php echo $base ?>plugin_admin/plugins/images/users/arijit.jpg" alt="user" class="img-circle"></div><div class="mail-contnet"><h5>'+item.member+'</h5><span class="mail-desc">New Receipt Amt.<strong>'+item.amount+'</strong> </span> <span class="time"> Added on '+ res +'</span>  </div></a>');
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			   $('#newreciept').append('<li><a class="text-center" href="<?php echo $base; ?>index.php/club100wealth/Con_membertickets/notapp_ticket"><strong>See All New Receipts </strong><i class="fa fa-angle-right"></i></a></li>');
		}
	get_receipt();
	
	setInterval(get_notification,10000);
	setInterval(getcount,10000);
	setInterval(get_receipt,10000);
	setInterval(receiptcount,10000);
	
		$(document).on('click','.not_member',function(){
      alert($(this).attr("id"));
		$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification/delete/'+$(this).attr("id"),
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#no').html(data.length);
					$.each(data, function(i,item){ 
					
						get_notification();
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
		
		
	});
	
	$(document).on('click','.not_reciept',function(){

		$.ajax({
				url: '<?php echo $base; ?>index.php/club100wealth/Con_notification/delete/'+$(this).attr("id"),
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#no').html(data.length);
					$.each(data, function(i,item){ 
					
						get_notification();
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
		
		
	});
	
	

	
});
</script>
<!--	
<audio id="chatAudio"><source src="soft-bells.ogg" type="audio/ogg"><source src="notify.mp3" type="audio/mpeg"><source src="soft-bells.ogg" type="audio/ogg"></audio>

<audio id="chatAudio1"><source src="Bells.ogg" type="audio/ogg"><source src="notify.mp3" type="audio/mpeg"><source src="Bells.ogg" type="audio/ogg"></audio>

--> <nav class="navbar navbar-default navbar-static-top m-b-0">

    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part"><a class="logo" href="<?php echo $base; ?>index.php/club100wealth/con_dashboard"><b><img src="<?php echo $base; ?>/plugin_admin/plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="<?php echo $base; ?>plugin_admin/plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
	
       	 <li style="text-align:center;margin-top:10px;" id="ajax-content"><h4 style="color:#FFFFFF"><strong>Last Receipt :</strong> 	<?php 
		 $query=$this->db->query("SELECT ticket FROM `tbl_ticket` where `approve`='Y' order by substr(`ticket`,10)+1 desc limit 1");
		  foreach($query->result() as $r)
		   { echo $r->ticket; } 
		 ?></h4></li>
		 <li style="text-align:center;margin-top:10px; margin-left:10px;"><h4 style="color:#FFFFFF"><strong>Last Coupon :</strong> <?php 
		 $query1=$this->db->query("SELECT coupon FROM tbl_coupon order by coupon_id desc limit 1");
		  $num="";
		  foreach($query1->result() as $r1)
		   { 
		    
  				$la=strlen($r1->coupon);
				   
					  for($j=0;$j<=5-$la;$j++)
					  {
					   $num.="0";
					   
					  }
					  $las=$num.$r1->coupon;
		   echo $las; } ?></h4></li>
      </ul>
	   
	
		
      <ul class="nav navbar-top-links navbar-right pull-right">
	    <li class="dropdown birthday"><a class="waves-effect waves-light" href="<?php echo $base ?>index.php/club100wealth/Con_birthday"><strong><i class="fa fa-birthday-cake"></i> &nbsp; Today Birthday</strong><span class="label label-rouded label-danger pull-right" style="margin-top:5px;    padding: 6px 10px 4px;">
		<?php
		  $res=$this->db->query("SELECT * FROM `tbl_member` where SUBSTRING(`BirthDate`,1,2)=SUBSTRING(CURDATE(),9,2) and SUBSTRING(`BirthDate`,4,2)=SUBSTRING(CURDATE(),6,2) ORDER BY `BirthDate` ASC");
		  echo $res->num_rows(); 
		?></span>
		</a>
        </li>
	   
	   <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-users"></i>
          <div class="notify" id="newmem"><span class="heartbit"></span><span class="point"></span></div>
          </a>
          <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title" id="newm">You Have <span id="no"></span> New Members</div>
			  <div class="drop-title" id="notm">New Member Not Avilable</div>
            </li>
          
          <li>
		  <div class="message-center" id="notification"> 
		
		  </div>
            </li>
          </ul>
    
        </li>
		 <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="fa fa-ticket"></i>
          <div class="notify" id="newrec"><span class="heartbit"></span><span class="point"></span></div>
          </a>
          <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
              <div class="drop-title" id="new">Added <span id="rcno"></span> New Receipt</div>
			  <div class="drop-title" id="not">New Receipt Not Avilable</div>
            </li>
          
          <li>
		  <div class="message-center" id="newreciept"> 
		
		  </div>
            </li>
          </ul>
    
        </li>
		
    
     
	   
	   
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo $base ?>plugin_admin/plugins/images/users/admin.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $session ?></b> &nbsp;&nbsp;&nbsp; </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
          <!--  <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
            <li role="separator" class="divider"></li>-->
            <li><a href="<?php echo $base; ?>index.php/club100wealth/Con_index/logout"><i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- 
        <li class="mega-dropdown">
          <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs"> Menu </span> <i class="icon-options-vertical"></i></a>
          <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
           <!-- <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Forms Elements</li>
                <li><a href="form-basic.html">Basic Forms</a></li>
                <li><a href="form-layout.html">Form Layout</a></li>
                <li><a href="form-advanced.html">Form Addons</a></li>
                <li><a href="form-material-elements.html">Form Material</a></li>
                <li><a href="form-upload.html">File Upload</a></li>
                <li><a href="form-mask.html">Form Mask</a></li>
                <li><a href="form-validation.html">Form Validation</a></li>
                
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Advance Forms</li>
                <li><a href="form-dropzone.html">File Dropzone</a></li>
                <li><a href="form-pickers.html">Form-pickers</a></li>
                <li><a href="form-wizard.html">Form-wizards</a></li>
                <li><a href="form-xeditable.html">X-editable</a></li>
                <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>

              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Table Example</li>
                <li><a href="basic-table.html">Basic Tables</a></li>
                <li><a href="data-table.html">Data Table</a></li>
                <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                <li><a href="responsive-tables.html">Responsive Tables</a></li>
                <li><a href="editable-tables.html">Editable Tables</a></li>
                <li><a href="foo-tables.html">FooTables</a></li>
                <li><a href="jsgrid.html">JsGrid Tables</a></li>
              </ul>
            </li>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">Charts</li>
                <li> <a href="flot.html">Flot Charts</a> </li>
                <li><a href="morris-chart.html">Morris Chart</a></li>
                <li><a href="chart-js.html">Chart-js</a></li>
                <li><a href="peity-chart.html">Peity Charts</a></li>
                <li><a href="sparkline-chart.html">Sparkline charts</a></li>
                <li><a href="extra-charts.html">Extra Charts</a></li>
              </ul>
            </li>
            <li class="col-sm-12 m-t-40 demo-box">
               <div class="row">
                  <div class="col-sm-2"><div class="white-box text-center bg-purple"><a href="<?php echo $base; ?>index.php/admin/Con_dashboard" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br/>Dashboard</a></div></div>
                  <div class="col-sm-2"><div class="white-box text-center bg-success"><a href="<?php echo $base; ?>index.php/admin/Con_memberlist" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="|"></i><br/>Members</a></div></div>
                  <div class="col-sm-2"><div class="white-box text-center bg-info"><a href="<?php echo $base; ?>index.php/admin/Con_events" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="K"></i><br/>Events</a></div></div>
                  <div class="col-sm-2"><div class="white-box text-center bg-inverse"><a href="<?php echo $base; ?>index.php/admin/Con_gallery"  class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="^"></i><br/>Gallery</a></div></div>
                  <div class="col-sm-2"><div class="white-box text-center bg-warning"><a href="" class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br/>Demo </a></div></div>
                  <div class="col-sm-2"><div class="white-box text-center bg-danger"><a href="" class="text-white"><i class="linea-icon linea-ecommerce fa-fw" data-icon="d"></i><br/>Buy Now</a></div></div>
               </div>     
            </li>
          </ul>
        </li> -->
        <!-- /.Megamenu -->
    
        <!-- /.dropdown -->
      </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>
