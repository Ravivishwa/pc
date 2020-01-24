<?php include('../config.php'); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Pan Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM panauto Where id='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

<style type="text/css">
.bg {
    background: url('pana1.jpg') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <main class="bg">
    
   
     
<?php 

   /// qr code xml string start
   libxml_use_internal_errors(true);
   $simplexml= new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><books/>');
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['panno']."&quot; name=&quot;".$b['name']."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;".$b['fathername']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;
?>

   
<style>
img.mrmins.mrninbigs {
    width:90;
    height:113px;
    top: 71px;
    position: absolute;
    left: 255px;

}

.cimg 
{
	 top: 69px;
    position: absolute;
    left: 27px;
}
.mainno
{
    top: 85px;
    position: absolute;
    left: 122px;
    font-weight: 800;
    font-size: 11px;
}

.name 
{
	    top: 139px;
    position: absolute;
    left: 27px;
    font-weight: 800;
    font-size: 9px;
}

.fathername 
{
	top: 169px;
    position: absolute;
    left: 27px;
    font-weight: 800;
    font-size: 9px;
}
.bod 
{
	    top: 208px;
    position: absolute;
    left: 26px;
    font-weight: 800;
    font-size: 9px;
}

.sign 
{
	 top: 180px;
    position: absolute;
    left: 159px;
}
</style>

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


</p>
      
	 
	 
	 <?php if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     
	 <?php } ?></p>
    
	 
	 
	 <?php if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     <img class="cimg" src="<?php echo  $slct['weburl'].'/'.$b['image'];?>" width="60px" height="60px"/>
	 <?php } ?>
	 <p class="mainno"><?php echo $b['panno'];?></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	 
  </main>
  </body>
</html></p>

	 
	 <?php if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     <img class="cimg" src="<?php echo  $slct['weburl'].'/'.$b['image'];?>" width="60px" height="60px"/>
	 <?php } ?>
	 <p class="mainno"><?php echo $b['panno'];?></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	 
  </main>
  </body>
</html></p>
   
	 
	 <?php if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     <img class="cimg" src="<?php echo  $slct['weburl'].'/'.$b['image'];?>" width="60px" height="60px"/>
	 <?php } ?>
	 <p class="mainno"><?php echo $b['panno'];?></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	 
  </main>
  </body>
</html></p>
  
	 
	 
	 <?php if (strpos($b['image'], 'https://www.tribal.mp.gov.in/') !== false) {
		 ?>
		 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else if(strpos($b['image'],'data:image') !== false) {?>
	 <img class="cimg" src="<?php echo $b['image'];?>" width="60px" height="60px"/>
	 <?php } else { ?>
     <img class="cimg" src="<?php echo  $slct['weburl'].'/'.$b['image'];?>" width="60px" height="60px"/>
	 <?php } ?>
	 <p class="mainno"><?php echo $b['panno'];?></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	 
  </main>
  </body>
</html>
	 <p class="mainno"><?php echo $b['panno'];?></p>
     <p class="name"><?php echo strtoupper($b['name']);?></p>
	 <p class="fathername"><?php echo strtoupper($b['fathername']);?></p>
	 <p class="bod"><?php echo $b['dob'];?></p>
	
  </main>
  </body>
</html>