<script>
jQuery(document).ready(function(){
	
function getcount()
{
		$.ajax({
				url: 'http://127.0.0.1/Helping%20Hand/Admin/Notification/getnotification.php',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				success: function(data, status){
				$('#no').html(data.length);
					$.each(data, function(i,item){ 
				console.log(item.np);
						$('#no').html(item.np);
						 if(item.np>0)
						{  
						  $('#chatAudio')[0].play();
						}
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			
	}
	getcount();
	
function get_notification()
		{
				$('#notification').html('');
				$.ajax({
				url: 'http://127.0.0.1/Helping%20Hand/Admin/Notification/getpendingnotification.php',
				dataType: 'jsonp',
				jsonp: 'jsoncallback',
				timeout: 5000,
				async : false,
				success: function(data, status){
                  
					$.each(data, function(i,item){ 
					 
    					var menudate = new Date(item.Date_Time);
  						var menudate1 = menudate.toString("d MMM yyyy hh:mm:ss");
						 var res = menudate1.substr(0, 16);
						$('#notification').append('<div class="recent-activity-list chat-out-list row"><div class="col s3 recent-activity-list-icon"><img src="uploads/helperimg/'+ item.Profile +'" style="border-radius:50px; height:50px; width:50px; margin-right:5px;" /></div><div class="col s9 recent-activity-list-text"><a href="#" class="not_member" id='+ item.notification_id+'>'+item.member+'</a><p>Registered on '+ res +'</p></div></div>');
						
					});
				},
				error: function(){
					console.log('There was an error loading the data.');
				}
			   });
			
		}
	get_notification();	
	
	setInterval(getcount,10000);
	setInterval(get_notification,10000);
	
	
$(document).on('click','.not_member',function(){
		$.ajax({
				url: 'http://127.0.0.1/Helping%20Hand/Admin/Notification/delnotification.php?del='+$(this).attr("id"),
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
<div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div> 
<audio id="chatAudio"><source src="soft-bells.ogg" type="audio/ogg"><source src="soft-bells.ogg" type="audio/ogg"><source src="soft-bells.ogg" type="audio/ogg"></audio>
<header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">                    
                    
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="dashboard.php" class="brand-logo darken-1"><p class="logo-text" style="margin-top:-5px; margin-left:10px; font-size:46px;">Dealocean</p></h1></li>
                    </ul>
					
					    <ul class="right hide-on-med-and-down collapsible collapsible-accordion" data-collapsible="accordion">                        
               
				   <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse blinking"><i class="mdi-social-notifications" style="height:63px;"></i></a>
                        </li>
                </ul>
						<!--<ul>
						<li>fsdfdsf dfds fdsf </li>
						<li>fsdfdsf dfds fdsf </li>
						<li>fsdfdsf dfds fdsf </li>
						</ul>
                        </li>                        
                      
                    </ul>-->
                    <!--<div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Helping Hands"/>
                    </div>-->
                    
                </div>
           
        </div>
		 </nav>
        <!-- end header nav-->
  </header>
  
   <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
            <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
            
            </li>
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header teal white-text active"><i class="mdi-social-notifications"></i><span id="no"></span> Notifications</div>
                    <div class="collapsible-body recent-activity">
					 <span id="notification"></span>
                        
                   
                    </div>
                </li>
               
                </ul>
            </li>
        </ul>
      </aside>
	  
	  <script>
function blinker() {
	$('.blinking').fadeOut(1000);
	$('.blinking').fadeIn(1000);
}
setInterval(blinker, 1000);
</script>
	  
	
	  
	   
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
   