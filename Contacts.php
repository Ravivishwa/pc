
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
