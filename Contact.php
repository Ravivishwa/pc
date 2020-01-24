
<?php 
require 'config.php';
$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="keywords" content="Aadhaar Smart Card Online | PVC Aadhaar Card | Online PVC | Plastic Aadhaar Card | PVC Smart Card | Aadhaar Plastic Card | Aadhaar PVC Card | Smart Aadhaar Card Online | Aadhar Smart Card Online | PVC Aadhar Card | Online PVC | Plastic Aadhar Card | PVC Smart Card | Aadhar Plastic Card | Aadhar PVC Card | Smart Aadhar Card Online | Adhaar Smart Card Online | PVC Adhaar Card | Online PVC | Plastic Adhaar Card | PVC Smart Card | Adhaar Plastic Card | Adhaar PVC Card | Smart Adhaar Card Online | Adhar Smart Card Online | PVC Adhar Card | Online PVC | Plastic Adhar Card | PVC Smart Card | Adhar Plastic Card | Adhar PVC Card | Smart Adhar Card Online " />
    <meta name="description" content="Flatize - Shop HTML5 Responsive Template" />
    <meta name="author" content="pixelgeeklab.com">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aadhaar Smart Card Online | PVC Aadhaar Card | Online PVC | Plastic Aadhaar Card | PVC Smart Card | Aadhaar Plastic Card</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
    <!--<link href="css/flexslider.css" rel="stylesheet" media="screen">-->
    <!--<link href="css/chosen.css" rel="stylesheet" media="screen">-->
    <link href="css/theme-animate.css" rel="stylesheet" />
    <link href="css/theme-elements.css" rel="stylesheet" />
    <!--<link href="css/theme-blog.css" rel="stylesheet">
    <link href="css/theme-map.css" rel="stylesheet">-->
    <link href="css/theme.css" rel="stylesheet" />
    <link href="css/theme-responsive.css" rel="stylesheet" />
    <link href="css/new.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel='stylesheet prefetch' href='css/owl.carousel.min.css' />
    <link rel='stylesheet prefetch' href='css/animate.min.css' />
        <script src="../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
</head>
<body>
    

        <div id="page">
        
        <!-- Header -->
    <?php include 'header.php';?>
    <!-- .Header -->

        

            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="col-sm-6">

                                
                                    

                                    <div class="w-contacts-h">
                               
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
							
							<?php 
				if(isset($_POST['rmanual']))
				{
					$name = $_POST['name'];
					$email = $_POST['email'];
					$mobile = $_POST['txt_number'];
					$message = $_POST['message'];
					mysqli_query($connection,"insert into lead(`name`,`email`,`mobile`,`comment`)values('".$name."','".$email."',".$mobile.",'".$message."')");
					$msg = "Enquiry Submitted Successfully!!!";
					$msgtext = 'Dear User Your Enquiry Submitted successfully. we will contact you soon ';
					?>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
					
					<script>

											

var settings = {

  "async": true,

  "crossDomain": true,

  "url": "https://api.msg91.com/api/sendhttp.php?mobiles=<?php echo $mobile; ?>&authkey=292910AgnyaJFhzNd5d7247fd&route=2&sender=NEXTPM&message=<?php echo $msgtext; ?>&country=91",

  "method": "GET",

  "headers": {}

}



$.ajax(settings).done(function (response) {

  console.log(response);

});

</script>

					<script type="text/javascript">
	$(document).ready(function()
	{
		setTimeout(function(){
        window.location.href="Contact.php";
		}, 2000);
	});
        </script>
					<?php 
				}
				?>
				

                            <section class="faqs_sec1">
                <div class="container">
                    
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="featured-box featured-box-primary align-left mt-xlg" style="background: rgba(255, 255, 255, 0.5) !important;">
                                    <div class="box-content">
                                <h3>Get in Touch with Us</h3>
                                <p>We welcome you to contact us for more information about any services.</p>
								<?php if($msg != '')
									{
										?>
									<p class="alert alert-success"><?php echo $msg;?></p>
									<?php } ?>
                                <form method="post">
                                    <div class="form-group contact">
                                        <input name="name" type="text" id="name" class="form-control" placeholder="Your name"  required />
                                   
                                    </div>
                                    <div class="form-group contact">
                                        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required />
                                       
                                    </div>
                                    <div class="form-group contact">
                                        <input name="txt_number" type="text" id="txt_number" class="form-control" placeholder="Your WhatsApp Number" required />
                                      
                                    </div>
                                    <div class="form-group contact">
                                        <textarea name="message" rows="2" cols="20" id="message" placeholder="Message" style="width:100%;line-height: 49px;" required>
</textarea>
                                  
                                    </div>
                                    <div class="form-group contact">
                                         <button  type="submit" name="rmanual"  id="btn_save" class="btn login_customer">Send Message</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </section>
           


           <!-- Header -->
    
    <!-- .Header -->
    <script>
            //Variables
            var overlay = $("#overlay"),
                    fab = $(".fab"),
                 cancel = $("#cancel"),
                 submit = $("#submit");

            //fab click
            fab.on('click', openFAB);
            overlay.on('click', closeFAB);
            cancel.on('click', closeFAB);

            function openFAB(event) {
               // if (event) event.preventDefault();
                fab.addClass('active');
                overlay.addClass('dark-overlay');

            }

            function closeFAB(event) {
                if (event) {
                  //  event.preventDefault();
                  //  event.stopImmediatePropagation();
                }

                fab.removeClass('active');
                overlay.removeClass('dark-overlay');

            }
        </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/theme.plugins.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/index.js"></script>
    <script src='js/owl.carousel.min.js'></script>
</body>


</html>
