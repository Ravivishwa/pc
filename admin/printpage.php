<?php 
ob_start();
include_once("config.php"); 
global $connection;
$success = $error = $user_id = "";

if(isset($_GET['id']) && $_GET['id'] != '')
	$appl_id = base64_decode($_GET['id']);
$display_img 		= 'uploads/no-image.png';
if($appl_id != ""){
	$sql    = "Select * from applications where id = ".$appl_id;
	$result = $connection->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// print_r($row);
			$name 			= trim($row["name"]);
			$dob 			= date('d/m/Y', strtotime($row["dob"]));
			$card_type 		= trim($row["card_type"]);
			$e_card_number 	= trim($row["e_card_number"]);
			$members_count 	= trim($row["members_count"]);
			$year 			= trim($row["year"]);
			$shop 			= trim($row["shop"]);
			$qr_image		= trim($row["qr_image"]);
			$profile		= trim($row["image"]);
			$father_name 	= trim($row["father_name"]);
			// $address 		= $father_name.', '.trim($row["address1"])."<br>";
			$address 		= trim($row["address1"]);
			if($row["address2"] != "")
				$address 	.= ", ".$row["address2"].", <br> ";
			if($row["address3"] != "")
				$address 	.= $row["address3"].", ";
			if($row["village"] != '')
				$address 	.= $row["village"].", <br>";
			if($row["taluk"] != '')
				$address 	.= $row["taluk"].", ";
			if($row["district"] != '')
				$address 	.= "<br>".$row["district"].( $row["postal"] != "" ? " - ".$row["postal"] : "" );
			/* $address    	.= ($address != '') ? ",".$row["address2"] : $row["address2"];
			$address		.= ($address != '') ? ",<br>" : "";
			$address    	.= ($address != '') ? $row["address3"].", <br>" : "";
			$address    	.= ($address != '') ? $row["taluk"].", <br>" : "";      	
			$address    	.= ($address != '') ? $row["district"].", <br>" : "";      	
			$address    	.= ($address != '') ? $row["village"]." - ". $row["postal"] : "";  */ 

			if($row['qr_image'] != "" && file_exists('uploads/QR/'.$row['id'].'/'.$row['qr_image']))
				$display_qr 		= 'uploads/QR/'.$row['id'].'/'.$row['qr_image'];
			else{
				$display_qr 		= 'uploads/qr-no-image.jpg';
			}
			if(file_exists('uploads/profile/'.$row['id'].'/profile.jpg'))
				$display_img 		= 'uploads/profile/'.$row['id'].'/profile.jpg';
			else if(file_exists('uploads/profile/'.$row['id'].'/profile.png'))
				$display_img 		= 'uploads/profile/'.$row['id'].'/profile.png';
			else{
				$display_img 		= 'uploads/no-image.png';
			}			
		}
	}
	
	function resultToArray($result) {
		$rows = array();
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	$display_members = array();
	$sql 		= "SELECT * FROM family_members where application_id = ".$appl_id;
	$result 	= $connection->query($sql);
	$rows 		= resultToArray($result);
	foreach($rows as $k => $v){
		$display_members[] = $v["name"]."<br>";	
	}
	
	
}

$form_header = "User Management";
$is_profile  = 0;
if( isset($_GET['prof']) && $_GET['prof'] == 1){
	$form_header = "My Profile";
	$is_profile  = 1;
}

if(isset($_GET['bg']) && $_GET['bg'] == 1){
?>
<!--main content start without background -->
<section id="main-content" >
	<section class="wrapper">
		<style>
		@font-face {
			font-family: 'LATHAB_0';
			src: url('css/LATHAB_0.ttf')format('truetype')
		}
		body
		{
		    margin-left: 14mm;
		    margin-top: 11mm;
		}
		.bordered-div {
			border-style: solid;
			border-color:  #2B4C2A;
			border-width: thin;
            text-align: center;
            font-size: 8px;
			font-family:Arial, Helvetica, sans-serif;
			font-weight: bold;
            padding: 4px;
            height: 2px;
            width: 55px;
            vertical-align: middle;
            line-height: 3px;
			position: relative;
			left: 5px;
			
		}
		@media print {
			div.container-div { page-break-after: always; }
			html, body {
				height: 99%;    
			}
			@page { size: 432px 288px; }
		}
		
		
		#part_one {
			
			width: 325px;
			height: 207px; 
		}
		
		#part_two {
			
			width: 325px;
			height: 207px; 
			font-size: 6px;
			font-weight:bolder;
		}
		#part_two td,li {
			font-size: 7px;
			font-weight:bolder;
		}
 
		#new_tbl_2{
			font-size: 7px;	
			font-weight: bolder;
			width: 249px;
			padding-left:3px;
		}
		
		.lable-td{
			width: 49%;	
		}
		<!-- ul {
			list-style: none;
		}
		ul li:before {
			content: "•";
			font-size: 170%;
			padding-right: 2px;
			padding-top: 1px;
		} -->
		#part_one td,#part_two li {
			font-family:'LATHAB_0', Fallback, sans-serif;	
		}
		
		</style>
		<div id="part_one" class="container-div">
			<table id="new_tbl_1" style="float: left;"> 
				<tr><td style="height:75px;"></td></tr>
				<tr>
					<td>
						<img src="<?php echo $display_img; ?>" alt="" style="width:65px;height:76px;margin: 0 auto 1em auto;position:relative; left:5px;"/>
						<div class="bordered-div" style="margin-bottom:3px;margin-top:-10px;"><?php echo $card_type; ?></div>
						<div class="bordered-div" style=""><?php echo $e_card_number; ?></div>
					</td>
				</tr>
			</table>
			<table id="new_tbl_2" style="display: inline-block;"> 
				<tr><td style="height:78px;"></td></tr>
				<tr>
					<td class="lable-td">குடும்பத் தலைவரின் பெயர்</td>
					<td>:</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td class="lable-td">தந்தை / கணவரின் பெயர்</td>
					<td>:</td>
					<td><?php echo $father_name; ?></td>
				</tr>
				<tr>
					<td class="lable-td">பிறந்த தேதி</td>
					<td>:</td>
					<td><b><?php echo $dob; ?></b></td>
				</tr>
				<tr>
					<td valign="top" class="lable-td">முகவரி</td>
					<td valign="top">:</td>
					<td><?php echo $address; ?></td>
				</tr>
			</table>
		</div>
		<br>
		<div id="part_two" class="container-div" style="margin-top:22px;">
			<table> 
				<tr style="height:25px;"><td></td></tr>
				<tr>
					<td valign="top" >
						<ul style="padding-left:1px;">
						<?php if(!empty($display_members)){ 
							foreach($display_members as $k => $mem) {?>
								<li><span style="position:relative;bottom:2px;"><?php echo $mem; ?></span></li>
							<?php } } ?>
							<br><br><br>
							<li style=""><span style="position:relative;bottom:2px;">குடும்ப உறுப்பினர்கள்  - <?php echo $members_count; ?></span></li>
						</ul>
					</td>
					<td style="width:10px;"></td>
					<td valign="top">
						<div style="text-align:center;padding-top:5px;">
							<span style="font-size:8px;font-family:Arial, Helvetica, sans-serif;"><?php echo $shop; ?></span><br>
							<div style="height: 20px;font-size:12px;font-family:Arial, Helvetica, sans-serif;"><?php echo $year; ?></div>
						</div>
						<div style="padding-top:3px;">
							<img src="<?php echo $display_qr; ?>" alt="" style="width:73px;height:74px;padding-right:4px;position: relative;left: -4px;top: -2px;"/>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</section>
</section>
<?php } else { //with background ?>
<section id="main-content" >
	<section class="wrapper">
		<style>
		@font-face {
			font-family: 'LATHAB_0';
			src: url('css/LATHAB_0.ttf')format('truetype')
		}
		body
		{
		  margin-left: 14mm;
		  margin-top: 11mm;
		}
		
		.bordered-div {
			border-style: solid;
			border-color:  #2B4C2A;
			border-width: thin;
            text-align: center;
            font-size: 8px;
			font-family:Arial, Helvetica, sans-serif;
			font-weight: bold;
            padding: 4px;
            height: 2px;
            width: 55px;
            vertical-align: middle;
            line-height: 3px;
			position: relative;
			left: 5px;
		}
		@media print {

			table { 

				-webkit-print-color-adjust: exact;
				overflow: visible !important;
			}
			html, body {
				height: 99%;    
			}
			@page { size: 432px 288px; }
		}
		
		
		#part_one {
			background-image: url(img/bg-page-1.jpeg);
			background-repeat:no-repeat;
			background-size:contain;	
			width: 327px;
			height: 204px; 
		}
		
		#part_two {
			background-image: url(img/bg-page-2.jpeg);
			background-repeat:no-repeat;
			background-size:contain;	
			width: 320px;
			height: 204px; 
			font-size: 6px;
			font-weight:bolder;
		}
		#part_two td,li {
			font-size: 7px;
			font-weight:bolder;
		}
 
		#new_tbl_2{
			font-size: 7px;	
			font-weight: bolder;
			width: 249px;
			padding-left:3px;
		}
		
		.lable-td{
			width: 49%;	
		}
		<!-- ul {
			list-style: none;
		}
		ul li:before {
			content: "•";
			font-size: 170%;
			padding-right: 2px;
			padding-top: 1px;
		} -->
		@media print {
			div{ 
				-webkit-print-color-adjust: exact;
				overflow: visible !important;
				page-break-inside: avoid;
			}
			table { 

				-webkit-print-color-adjust: exact;
				overflow: visible !important;
				page-break-inside: avoid;
				display: inline-block;
			}
			#part_one {overflow: hidden;}
			#new_tbl_1 {float:left;}
			#new_tbl_2 {float:right;width: 249px;}
			
			
		}
		#part_one td,#part_two li {
			font-family:'LATHAB_0', Fallback, sans-serif;	
		}
		
		
		</style>
		
		
		<div id="part_one">
			<table id="new_tbl_1" style="float: left;"> 
				<tr><td style="height:75px;"></td></tr>
				<tr>
					<td>
						<img src="<?php echo $display_img; ?>" alt="" style="width:65px;height:76px;margin: 0 auto 1em auto;position:relative; left:5px;"/>
						<div class="bordered-div" style="margin-bottom:3px;margin-top:-10px;"><?php echo $card_type; ?></div>
						<div class="bordered-div" style=""><?php echo $e_card_number; ?></div>
					</td>
				</tr>
			</table>
			<table id="new_tbl_2" style="display: inline-block;"> 
				<tr><td style="height:78px;"></td></tr>
				<tr>
					<td class="lable-td" style="font-family:'LATHAB_0', Fallback, sans-serif;">குடும்பத் தலைவரின் பெயர்</td>
					<td>:</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td class="lable-td">தந்தை / கணவரின் பெயர்</td>
					<td>:</td>
					<td><?php echo $father_name; ?></td>
				</tr>
				<tr>
					<td class="lable-td">பிறந்த தேதி</td>
					<td>:</td>
					<td><b><?php echo $dob; ?></b></td>
				</tr>
				<tr>
					<td valign="top" class="lable-td">முகவரி</td>
					<td valign="top">:</td>
					<td><?php echo $address; ?></td>
				</tr>
			</table>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div id="part_two" style="margin-top:10px;">
			<table > 
				<tr style="height:25px;"><td></td></tr>
				<tr>
					<td valign="top" >
						<ul style="padding-left:1px;">
						<?php if(!empty($display_members)){ 
							foreach($display_members as $k => $mem) {?>
								<li><span style="position:relative;bottom:2px;"><?php echo $mem; ?></span></li>
							<?php } } ?>
							<br><br><br>
							<li style=""><span style="position:relative;bottom:2px;">குடும்ப உறுப்பினர்கள்  - <?php echo $members_count; ?></span></li>
						</ul>
					</td>
					<td style="width:10px;"></td>
					<td valign="top">
						<div style="text-align:center;padding-top:5px;">
							<span style="font-size:8px;font-family:Arial, Helvetica, sans-serif;"><?php echo $shop; ?></span><br>
							<div style="height: 20px;font-size:12px;font-family:Arial, Helvetica, sans-serif;"><?php echo $year; ?></div>
						</div>
						<div style="padding-top:3px;">
							<img src="<?php echo $display_qr; ?>" alt="" style="width:73px;height:74px;padding-right:4px;position: relative;left: -4px;top: -2px;"/>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</section>
</section>
<?php } ?>
<!-- <?php include_once("userfooter.php"); ?> -->
<input type="hidden" id="print_btn" name="print_btn" onclick="window.print();"/>
<script>
$(document).ready(function(){
	$("#print_btn").click();	
});
</script>