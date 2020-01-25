<?php 
include_once('userHeader.php');
$error 	= $success = '';

//Start: Post data 
$year_ok = 0; 
global $connection;
if(isset($_POST) && !empty($_POST)) {
	$form_id			= $_POST['form_id'];
	
	$year_array = range(1940,2020);
	if(isset($_POST["year"]) && $_POST["year"] != ''){
		if(in_array($_POST["year"],$year_array) ){
			$sql 	  =  "update applications set year = '".$_POST["year"]."' WHERE id = ".$_POST['form_id'];
				
			if ($connection->query($sql) === TRUE) {
				$year_ok = 1;
			} else {
				$year_ok = 0;
			}
		}else{
			$error = "Invalid Year range";		
		}		
	}
	if($year_ok == 1){
		if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]['name'])){
			$target_dir 	= "uploads/QR/".$form_id."/";
			if (!file_exists($target_dir)) {
			   mkdir($target_dir, 0777, true);
			}
			
			$file_name		= basename($_FILES["fileToUpload"]["name"]);
			$target_file 	= $target_dir .$file_name;
			
			$uploadOk 		= 1;
			$imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check file size
			// if ($_FILES["fileToUpload"]["size"] > 500000) {
				// $error    = "Sorry, your file is too large.";
				// $uploadOk = 0;
			// }
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
				$error    = "Sorry, only image file is allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$error    = $error;
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], trim($target_file))) {
					$success  =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
					$sql 	  =  "update applications set qr_image = '".$file_name."' WHERE id = ".$_POST['form_id'];
					
					if ($connection->query($sql) === TRUE) {
						$success 	.= "Details updated 2 successfully";
						header("Location:print_list.php");
					} else {
						// echo "Error: " . $sql . "<br>" . $connection->error;
					}
					
				} else {
					$error    = "Sorry, there was an error uploading your file.";
				}
			}
		}else{
			$error = "QR image is required.";	
		}
	}
	
		
}
//End: Post data


$appl_id 	 = $application_name = '';
if(isset($_GET['id']) && $_GET['id'] != ''){
	$appl_id = $_GET['id'];
}	

if(isset($_GET['app']) && $_GET['app'] != '')
	$application_name = $_GET['app'];


if($appl_id == '')
	header("Location:dashboard.php");



$display_id 	= $display_card_type 	= $display_card_number 	= $display_name = $display_father_name	= $display_members_count	= $display_dob			= $display_address	= $display_members = $display_appl_name = ""; $image = 0;	
if($appl_id != ""){
	$sql 	= "SELECT * FROM applications where id = ".base64_decode($appl_id);
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$display_id 			= $row['id'];
			$display_appl_name 		= $row['pdf_name'];
			$display_card_type 		= $row['card_type'];
			// $display_card_number 	= $row['card_number'];
			$display_card_number 	= $row['e_card_number'];
			$display_name 			= $row['name'];
			$display_father_name	= $row['father_name'];
			$display_members_count	= $row['members_count'];
			$display_dob			= $row['dob'];
			$display_year			= $row['year'];
			// $display_address		= $row['address1'].", ".$row['address2'].", ".$row['address2'].",<br>";
			// $display_address		.= $row['village'].",<br>".$row['taluk'].",<br>".$row['district']."<br>".$row['postal'];
			
			$display_address 		= trim($row["address1"])."<br>";
			if($row["address2"] != "")
				$display_address 	.= $row["address2"].", ";
			if($row["address3"] != "")
				$display_address 	.= $row["address3"].", <br>";
			if($row["taluk"] != '')
				$display_address 	.= $row["taluk"].",";
			if($row["district"] != '')
				$display_address 	.= "<br>".$row["district"].",";
			if($row["village"] != '')
				$display_address 	.= "<br>".$row["village"].( $row["postal"] != "" ? " - ".$row["postal"] : "" );
			
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
	} else {
		echo "0 results";
	}

	function resultToArray($result) {
		$rows = array();
		while($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	$display_members = "";
	$sql 		= "SELECT * FROM family_members where application_id = ".base64_decode($appl_id);
	$result 	= $connection->query($sql);
	$rows 		= resultToArray($result);
	foreach($rows as $k => $v){
		$display_members .= $v["name"]."<br>";	
	}
}



?>
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h3 class="page-header"><i class="fa fa-qrcode"></i> Generate Qr Code</h3>
                        </div>
                    </div>
                </div>
				<section id="main-content">
					<form class="form-horizontal" action="pdfprintlist.php" method="post" id="pdf_update" enctype="multipart/form-data" >
			<div class="row dgnform">
				<div class="col-lg-9">
					<section class="panel">
						<header class="panel-heading">
							User details
						</header>
						<div class="panel-body">
								<input type="hidden" name="application_name" id="application_name" value="<?php echo $display_appl_name; ?>" />
								<input type="hidden" name="form_id" id="form_id" value="<?php echo $display_id; ?>" />
								<div class="form-group">
									<label class="col-sm-1 control-label">அட்டை வகை</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_card_type; ?></p>
									</div>
									&nbsp;&nbsp;&nbsp;
									<label class="col-sm-1 control-label">குடும்ப உறுப்பினர்கள் </label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_members_count; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">மின்னணு அட்டை எண் (UFC)</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_card_number; ?></p>
									</div>
									<label class="col-sm-1 control-label">குடும்ப உறுப்பினர் விபரங்கள்</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_members; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">பெயர்</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_name; ?></p>
									</div>
									<label class="col-sm-1 control-label">ஆண்டு</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="placeholder" name="year" id="year" maxlength="4" value="<?php echo ($display_year != "" ? $display_year: "") ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">தந்தை / கணவர் பெயர்</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_father_name; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">பிறந்த தேதி</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_dob; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">முகவரி</label>
									<div class="col-sm-3">
										<p class="form-control-static"><?php echo $display_address; ?></p>
									</div>
								</div>
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
						</div>
						
						
					</section>
					
				</div>
				<div class="col-lg-3">
					<section class="panel">
						<header class="panel-heading">
							User Image
						</header>
						<div class="panel-body">
							<img src="<?php echo $display_img; ?>" alt="" style="width:150px;height:150px;" />
						</div>
					</section> 
					<section class="panel">
						<div class="panel-body">							
							<img src="<?php echo $display_qr; ?>" style="width:150px;height:150px;" />
							<div class="form-group" style="padding-left:15px;">
								<label for="fileToUpload">File input</label>
								<input type="file" id="fileToUpload" name="fileToUpload">
								<p class="help-block">Upload QR code.</p>
							</div>
							
						</div>	
					</section>	
				</div>
			</div>	
		</form>

				</section>
			</div>
		</div>
	</div>
</div>
	  
<?php include('userFooter.php'); ?>
 