<?php include('../config.php'); error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Aadhaar Card Priview</title>
<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
<link href="aadhar.css" type="text/css" rel="stylesheet">
<?php
if(isset($_GET['searchid'])){
//$searchid =$_GET['searchid'];
$searchid = mysqli_real_escape_string($connection,$_GET['searchid']);

mysqli_set_charset($connection,"utf8");
$a = mysqli_query($connection,"SELECT * FROM aadharauto Where aadharautoid='".$searchid."'");
$b = mysqli_fetch_array($a);

}
?>

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




<?php 
  $sid = $_GET['searchid'];
  $get = mysqli_fetch_assoc(mysqli_query($connection,"select * from aadharauto where aadharautoid=".$sid.""));
  
  ?>
  
  <?php
if($get['userid'] == 2) 
{
	?>
<style type="text/css">
.bg {
    background: url('<?php echo 'demo/'.$b['locallanguage'].'demo.jpg' ?>') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php } else 
{ ?>
<style type="text/css">
.bg {
    background: url('<?php echo $b['locallanguage'].'.jpg' ?>') no-repeat;
    width: 800px;
    height: 986px;
    overflow: visible;
    display: block;
    background-size: 100% auto;
}

</style>
<?php  } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body onload="window.print();">
    <main class="bg">
     <div class="enroll">1429/70044/0020<?php echo $b['srno']?></div>
     <table class="upperpart">
         <tbody>
            <tr><td>To</td></tr>    
            <tr><td><?php echo $b['localname']?></td></tr>    
            <tr><td><?php echo $b['aadharname']?></td></tr> 
            <?php $add = explode(',',$b['fulladdress']);?>
            <tr><td class="address"><?php echo $add[0];?> <br> <?php echo $b['houseno'];?><br><?php echo $b['street'];?> <br> <?php echo $b['vtcandpost'];?> <br> <?php echo $b['dist'].' '.$b['statename'].' - '.$b['pincode'];?></td></tr>    
         </tbody>   
     </table>
     
<?php 
if ($b['gender']=='MALE'){
  $sex='M';
} 
else {
  $sex='F';
}
   /// qr code xml string start
   libxml_use_internal_errors(true);
   $simplexml= new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><books/>');
   $bod = explode('/',$b['dob']);
   $book1= $simplexml->addChild('book',"<PrintLetterBarcodeData uid=&quot;".$b['aadharno']."&quot; name=&quot;".$b['aadharname']."&quot; gender=&quot;".$sex."&quot; dob=&quot;".$b['dob']."&quot; co=&quot;S/O: ".$b['fathername']."&quot; house=&quote;".$b['houseno']."&quot; street=&quote;".$b['street']."&quot; lm=&quote; &quot; vtc=&quote;".$b['vtcandpost']."&quot;  po=&quot;".$b['vtcandpost']."&quot; dist=&quot;".$b['dist']."&quot; subdist=&quot;".$b['subdist']."&quot; state=&quot;".$b['statename']."&quot; pc=&quot;".$b['pincode']."&quot;/>");
   $str='<?xml version="1.0" encoding="UTF-8"?>'.$book1;
   $codeContents = $str; 
  // echo $codeContents;
  // echo $book1;
?>

     <p class="upperaddhar" style="top: 525px;
    position: absolute;
    text-decoration: underline;
    text-decoration-style: dotted;
    left: 110px;
    letter-spacing: 2px;
    font-size: 20px;
    font-weight: 100;"><?php echo $b['originalaadharno']?></p> 
	 <p style="top: 558px;
    font-size: 9px;
    position: absolute;
    left: 116px;
    letter-spacing: 2px;
    font-weight: bold;"><?php echo 'VID : '.chunk_split(mt_rand(1111111111111111, 9999999999999999), 4, ' ');?></p>
     <p class="download-date">Download Date: <?php echo date("d/m/y");
?>
</p>
     <img class="mrmin mrninbig" src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' > 
    
   <table class="bpart">
		<thead>
				<tr> 
				<?php 
				
					if (strpos($b['imagepathoriginal'], 'https://www.tribal.mp.gov.in/') !== false) {
						
							?>
						<td width=""><img src="<?php echo $b['imagepathoriginal']?>" width="90" height="90"></td>
							<?php
						}else if(strpos($b['imagepathoriginal'],'data:image') !== false) {							
				?>
				<td width=""><img src="<?php echo $b['imagepathoriginal']?>" width="90" height="90"></td>
				<?php 
						}
						else {
							?>
				<td width=""><img src="<?php echo $slct['weburl'].'admin/'.$b['imagepathoriginal']?>" width="90" height="90"></td>
						<?php } ?>
						
		
				<td width="269" class="bpartone">
        <?php echo $b['localname']?><br /><?php echo $b['aadharname']?> <br />
					<span class="dob"><?php echo $b['dobinlocal'].' / '.'DOB : '?><?php echo $b['dob']?></span><br />
					<?php echo $b['sexinlocal'].' / '?><?php echo $b['gender']?> <br />
				</td>
				<td width="245" class="btopsec">
				    <strong><?php echo $b['pata']?>:</strong><br />
					<span class="maxheight" style="margin-bottom: 7px;"><?php echo $b['localaddress']?></span>
					<br /><strong>Address:</strong><br />
				  <span class="maxheight"><?php echo $b['fulladdress'];?><br /></span>
				</td>
				<!--<td class="btopthird"><img src="qrcodeimage/<?php //echo $b['aadharno'].'.png'?>" width="110" height="110"></td>-->
        <td class="btopthird"><img src='https://chart.googleapis.com/chart?chs=140x140&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00' ></td>
				</tr>
		</thead>
		</table>
		<table class="bpart-bottom">
			<tr>
					<td class="cpartfirst"><span class="addharnopan addharnopan1"><?php echo $b['originalaadharno']?></span></td>
          <td class="paddingbtm insiderelative"><img class="mrmin mrnin2" src='https://chart.googleapis.com/chart?chs=75x75&cht=qr&chl=<?php echo $codeContents; ?>&chld=L|0&chf=bg,s,FFFFFF00'><td>
          <td class="cpartthird"><span class="addharnopan addharnopan2"><?php echo $b['originalaadharno']?></span></td>
			</tr>
		</table>
  </main>
  </body>
</html>