<?php include('../config.php'); error_reporting(0); ?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Voter Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
   <head>
   
   <!------------------------------ # connection ------------------------------->
						<?php
												error_reporting(0);
												include("config.php");

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
												
						<!------------------------------ # connection ------------------------------->
   
    <style>
    @font-face {
     font-family: mangal;
      src: url(font/MANGAL.TTF);
     }
     
    main.bg {
    font-family: 'arial', mangal;
    font-weight: 600;
    }

     .firstpage {
    background-image: url(voterhindifront1.jpg);
    height: 500px;
    background-size: contain;
    background-repeat: no-repeat;
    margin-right: 30px;
    width: 320px;
    float: none;
    position: relative;
    font-size: 14px;
    margin-bottom: 20px;
        
}
    .secondpage {
    background-image: url(voterhindiback1.jpg);
    height: 500px;
    background-size: contain;
    background-repeat: no-repeat;
    margin-right: 30px;
    width: 320px;
    float: none;
    position: relative;
}

.secondpage {
    font-size: 9px;
    font-weight: 600;
    box-sizing: border-box;
    padding: 14px;
}
.gender span.label,.dob span.label {
    width: 116px;
    display: inline-block;
}

.imagecontainer {
    position: absolute;
    top: 123px;
    left: 91px;
}

img.picture {
    width: 140px;
    height: 186px;
}

img.barcode {
    width: 101px;
    height: 23px;
    position: absolute;
    top: 85px;
    left: 61px;

}

.epicnumber {
    position: absolute;
    top: 82px;
    left: 175px;
}

.settable {
    position: absolute;
    top: 331px;
    left: 25px;
    
}

.tablecss 
    font-family:arial;
    font-size:14px;
    font-weight:bold;
  
}

.r_name {
    position: absolute;
    top: 331px;
    left: 25px;
}

.actual_name {
    position: absolute;
    left: 25px;
    top: 363px;
}

.father_name {
    position: absolute;
    left: 25px;
    top: 395px;
}

.father_name_actual {
    position: absolute;
    left: 25px;
    top: 427px;
}

.gender span.value {
    text-transform: capitalize;
}

.secondpage .gender {
    margin-bottom: 4px;
}

.secondpage .dob {
    position: relative;
    margin-bottom: 4px;
}

.secondpage .dob span.value {
    top: -5px;
    position: relative;
}

.address_regional {
    margin-bottom: 5px;
}

.address {
    margin-bottom: 60px;
}

.nirvachan .date {
    width: 100px;
    float: left;
}

.nirvachan .nirvachanofficer {
    float: right;
    width: 160px;
    text-align: right;
    position: relative;
}

img.officersign {
    position: absolute;
    top: -69px;
    left: 20px;
}

.nirvachan:before, .nirvachan:after {
    display: block;
    content: '';
    clear: both;
}

.nirvachan {
    margin-bottom: 10px;
}
.assemballysankhya .regional {
    margin-bottom: 4px;
}
.assemballysankhya {
    margin-bottom: 10px;
}

.bhagsankhya .regional {
    margin-bottom: 4px;
}

@media  print
{
    * {-webkit-print-color-adjust:exact;}
}
@page  { size: auto;  margin: 0mm; }
@media  print {
    a[href]:after {
        content: none !important;
    }
}
@media  print {
.header, .hide { visibility: hidden }
form.bootom-form{display:none;}
}
    </style>

<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM voterauto Where voterautoid='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

   </head>
  
   <body>
      <main class="bg">
         <div class="row">
             <div class="firstpage">
                <img src="http://bwipjs-api.metafloor.com/?bcid=code128&text=<?php echo $b['epicno'] ?>" class="barcode">
                <div class="epicnumber"><?php echo $b['epicno'] ?></div>
                <div class="imagecontainer">
                    <img src="<?php echo $slct['weburl'].$b['imagepathoriginal']?>" class="picture">
                </div>  
                <?php
                $iparr = explode (" ", $b['kaname']); 
                $aaaa =  $iparr[1];
                  ?>
                  <div class="settable">
                       <table class="tablecss" style="font-weight:bold;font-size:14px">
                           <tr>
                               <td style="padding-bottom: 15px;"><?php echo $aaaa ?></td>
                               <td style="padding-bottom: 15px;"><?php echo ': '.$b['namelocal'] ?></td>
                           </tr>
                           <tr>
                               <td style="padding-bottom: 15px;"><?php echo 'Name' ?></td>
                               <td style="padding-bottom: 15px;"><?php echo ': '.$b['votername'] ?></td>
                           </tr>
                           <tr>
                               <td style="padding-bottom: 15px;"><?php echo $b['spousenamelocal'].' '.$b['kaname'] ?></td>
                               <td style="padding-bottom: 15px;"><?php echo ': '.$b['fathernamelocal'] ?></td>
                           </tr>
                           <tr>
                               <td style="padding-bottom: 15px;"><?php echo $b['spousename'].' Name'?></td>
                               <td style="padding-bottom: 15px;"><?php echo ': '.$b['fathername'] ?></td>
                           </tr>
                       </table>
                  </div>
                  

                                <!-- kannada start -->
                                <!-- kannada end -->
                <!-- tamil start -->
                                <!-- tamil end -->
                <!-- marathi start -->
                                <!-- marathi end -->
                <!-- language punjabi start -->
                                <!-- language punjabi end -->
                <!-- gujrati start -->
                                <!-- gujrati end -->
             </div>

             <div class="secondpage">
                               <div class="gender">
                    <span class="label"><?php echo $b['sexlocal'] ?>/Sex</span>
                    <span class="value">: <?php echo $b['genderlocal'] ?> / <?php echo $b['gender'] ?></span>

                </div>
                
                <div class="dob">
                    <span class="label"><?php echo $b['dobinlocal'] ?> <br>Date Of Birth/Age</span>
                    <span class="value">: <?php echo $b['dob'] ?></span>
                </div>

                <div class="address_regional">
                    <span class="label"><?php echo $b['pata'] ?> : </span>
                    <span class="value"><?php echo $b['localaddress'] ?></span>
                </div>


                <div class="address">
                    <span class="label">Address : </span>
                    <span class="value"><?php echo $b['fulladdress'] ?></span>
                </div>
                
                <div class="nirvachan">
                  <div class="date">
                    <span class="label">Date:</span>
                    <span class="value"><?php echo date("d/m/Y"); ?></span>
                   </div>

                   <div class="nirvachanofficer">
                    <img class="officersign" src="sign/votersign.png">
                    <span class="label"><?php echo $b['signlocal'] ?><br>Electoral Registration Officer</span>
                    <span class="value"></span>
                   </div>

                </div>

                <div class="assemballysankhya">
                  <div class="regional">
                    <span class="label"><?php echo $b['assconnamenolocal'] ?> : </span>
                    <span class="value"><br><?php echo $b['assconnonmlocal'] ?></span>
                   </div>

                   <div class="actual">Assembly Constituency No. & Name : </span>
                    <span class="value"><br><?php echo $b['assconnonm'] ?></span>
                   </div>
                </div> 


                 <div class="bhagsankhya">
                  <div class="regional">
                    <span class="label"><?php echo $b['partnoandnamelocal'] ?> : </span>
                    <span class="value"><?php echo $b['partno'] ?>  <?php echo $b['partnamelocal'] ?></span>
                   </div>

                   <div class="actual">Part No. & Name : </span>
                    <span class="value"><?php echo $b['partno'] ?>  <?php echo $b['partname'] ?></span>
                   </div>
                </div>  
                
               
               <!-- kannda start -->
                              <!-- kannda end -->

               <!-- tamil start -->
                              <!-- tamil end -->

               <!-- marathi start -->
                              <!-- marathi end -->
               <!-- gujrati start -->
                               <!-- gujrati end -->
                <!-- punjabi start -->
                                <!-- punjabi end -->
             </div>   
         </div>   
      </main>  
   </body> 
</html>