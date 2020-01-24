
<?php 
$getparentid = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
if($getparentid['refrenceid'] == '')
{
	$id = 1;
	$getmaindetail = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$id.""));
}
else 
{
	$id = $getparentid['refrenceid'];
	$getmaindetail = mysqli_fetch_assoc(mysqli_query($connection,"select * from usetting where userid=".$id.""));
	$getmaindetails = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$id.""));
}

?>
<?php 
if($id == 1)
{
?>
<!----<div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
					
			 			Questions? Let's Chat
			 		</div>	
					
						
					</div>	

					<div class="wcs_popup">
						<div class="wcs_popup_close">
							<span class="fa fa-close"></span>
						</div>
						<div class="wcs_popup_header">
							<strong>Need Help? Chat with us</strong>
							<br>
							<div class="wcs_popup_header_description">Click one of our representatives below</div>
						</div>	
						<div class="wcs_popup_person_container">
							<div class="wcs_popup_person" data-number="+91<?php echo $getmaindetail['supportno']; ?>">
								<div class="wcs_popup_person_img"><img src="download.jpg" alt=""></div>
								<div class="wcs_popup_person_content">
									<div class="wcs_popup_person_name"><?php echo $getmaindetails['loginname'];?></div>
									<div class="wcs_popup_person_description">Sales Support</div>
									<div class="wcs_popup_person_status">I'm Online</div>
								</div>	
							</div>

							
						</div>
					</div>
				</div>	


					
<?php } ?>

        <!-- jquery vendor -->
        
        <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
     
<script>
$(".hamburger").on('click', function() {
        $(this).toggleClass("is-active");
    });


    /*  
    -------------------
    List item active
    -------------------*/
    $('.header li, .sidebar li').on('click', function() {
        $(".header li.active, .sidebar li.active").removeClass("active");
        $(this).addClass('active');
    });

    $(".header li").on("click", function(event) {
        event.stopPropagation();
    });

    $(document).on("click", function() {
        $(".header li").removeClass("active");

    });
</script>

		
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		
		
		<script type="text/javascript">
		/*	jQuery(function($) {
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});*/
		</script>
		 
		
        <!-- scripit init-->
		
		<script src="demo.js"></script>
<link rel="stylesheet" href="whatsapp-chat-support.css">
        <script src="moment.min.js"></script>
	<script src="moment-timezone-with-data.min.js"></script>
	<script src="whatsapp-chat-support.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/scoop.min.js"></script>
	<script src="assets/js/demo-25.js"></script> 	 

	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
	<script src="assets/js/jquery.mousewheel.min.js"></script>
		 
	<script>
		$('#example_1').whatsappChatSupport();
		</script>
		
		<?php 
		$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												if($slct['poservice'] == 0)
												{
		?>
		<style>
		#myModal,.modal-backdrop
		{
			display:none !important;
		}
		</style>
		<script>
		setTimeout(function(){ jQuery('#myModal').modal('hide'); 
    }, 3000);
   
  </script>
  
												<?php }?>
												
												<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
    body {
    background: #e9ecf3 !important;
    }
</style> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <?php 
  if($fetch['walletamount'] <=2 and $_SESSION['usertype'] != 'MAINADMIN' and $_SESSION['usertype'] != 'DEMO' and $_SESSION['usertype'] != 'ADMIN'  and $fetch['refrenceid'] == 1)
{
  ?>
  <script>
  setTimeout(function(){ $('#nemd').modal('show'); }, 3000); 
  </script>
<?php } ?>
<script>
    $(document).ready(function()
    {
       $(".rech_now").on('click',function()
       {
         $('#nemd').modal('show');  
       });
    });
</script>
<?php 
date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");

$datetime1 = strtotime($timestamp);
$datetime2 = strtotime($fetch['joindate']);
$interval  = abs($datetime1 - $datetime2);
$minutes   = round($interval / 60);

if($fetch['fstatus'] == 'FREE')
{
   if($fetch['paystatus'] != 1 and $minutes >= 43200 and $_SESSION['usertype'] != 'MAINADMIN' and $_SESSION['usertype'] != 'DEMO' and $_SESSION['usertype'] != 'ADMIN') {?>
   	<script>
  setTimeout(function(){ $('#nemds').modal('show'); }, 3000); 
  </script>
   
   <?php 
}
}
else 
{
if($fetch['paystatus'] != 1 and $minutes >= 2880 and $_SESSION['usertype'] != 'MAINADMIN' and $_SESSION['usertype'] != 'DEMO' and $_SESSION['usertype'] != 'ADMIN') {?>
	<script>
  setTimeout(function(){ $('#nemds').modal('show'); }, 3000); 
  </script>
  <?php } } ?>
		
		
	<!-- disable right click and ctrl u-->	
		<script>
		document.addEventListener('contextmenu', event => event.preventDefault());
document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
		</script>
	 
<!-- /disable right click and ctrl u-->
		
		<style>
		body
		{
			padding:inherit !important;
		}
		</style>
		<?php
mysqli_close();
?>

<style>
        .tw-price-box {
    padding: 1px 0 19px;
    color: #fff;
    text-align: center;
}
.bg-orange {
    background: #FA6742 !important;
}
.bg-shrock {
    background: #2BC2A7 !important;
}
.bg-green {
    background: #32CC73 !important;
}
.bg-blue {
    background: #478FFF !important;
}
.pricing-feaures {
    text-align: center;
    margin-top: 15px;
}
.pricing-price {
    margin: 30px 0 25px;
    text-align: center;
}

.tw-price-box .pricing-price strong {
    color: #fff;
}
.pricing-price strong {
    font-size: 16px;
    color: #2f2c2c;
    font-weight: 700;
    -webkit-transition: all 0.3s linear;
    transition: all 0.3s linear;
}

.pricing-feaures ul {
    list-style: none;
    padding: 0;
    margin: 0;
}



.razorpay-payment-button
{
    display:none;
}

.pricing-feaures ul li {
    display: block;
    margin-bottom: 5px;
}
            .awesome {
      
      font-family: futura;
      font-style: italic;
      
      width:100%;
      
      margin: 0 auto;
      text-align: center;
      
      color:#313131;
      font-size:45px;
      font-weight: bold;
     
      -webkit-animation:colorchange 10s infinite alternate;
      
      
    }

    @-webkit-keyframes colorchange {
      0% {
        
        color: blue;
      }
      
      10% {
        
        color: #8e44ad;
      }
      
      20% {
        
        color: #1abc9c;
      }
      
      30% {
        
        color: green;
      }
      
      40% {
        
        color: blue;
      }
      
      50% {
        
        color: #34495e;
      }
      
      60% {
        
        color: blue;
      }
      
      70% {
        
        color: #2980b9;
      }
      80% {
     
        color: red;
      }
      
      90% {
     
        color: #2980b9;
      }
      
      100% {
        
        color: green;
      }
    }
        </style>
        <style>
.modal-body
{
	flex:inherit !important;
	padding:inherit !important;
}
.modal-footer
{
	border:none !important;
}
.modal-dialog {
	margin: 30px 248px auto !important;
    max-width: auto !important;
	width : 100% !important;
}
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}
.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}
.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    color:#000;
    padding : 0px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
}

.info-box-content {
    padding: 20px 10px;
    margin-left: 90px;
}

.progress-description, .info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

</style>
<script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "4ba18f39-4ba5-4c73-bff4-8750acc1fcab",
      host: "https://wchat.freshchat.com"
    });
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
    </body>

</html>
