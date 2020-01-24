<?php include('userHeader.php'); ?>
<?php
include("config.php");
$chk = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid']." and aservice =0"));
if(false)
{
	?>
	<script>
	window.location.href="buy.php";
	</script>
	<?php
}
?>
<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->

      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Aadhaar Entry (Auto)</h1>
								</div>
							</div>
						</div>

<?php
if(isset($_POST['submit'])) {
	$q = "";
	$q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
	$r = mysqli_query($connection,$q);
	$rw = mysqli_fetch_assoc($r);

	if ($rw['aadharpoint']<$rw['walletamount']){
		if (($_FILES['imagefile']['name']!="")){
			// Where the file is going to be stored
			$target_dir = "htmlfile/";
			$file = $_FILES['imagefile']['name'];
			$path = pathinfo($file);
			$filename = $path['filename'];
			$ext = $path['extension'];
			if (strtoupper($ext)=='HTML'){
				$temp_name = $_FILES['imagefile']['tmp_name'];
				$path_filename_ext = $target_dir.$filename.".".$ext;

				// Check if file already exists
				if (file_exists($path_filename_ext)) {
					//$msgno= "Sorry, file already exists.";
					unlink ($path_filename_ext);
					move_uploaded_file($temp_name,$path_filename_ext);
					$msg= "Congratulations! File Uploaded Successfully.";
				}else{
					move_uploaded_file($temp_name,$path_filename_ext);
					$msg= "Congratulations! File Uploaded Successfully.";
				}
			} else {
				$msgno= "Sorry, File Not in html Format";
			}
		}
	} else {
		$msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
	}
}
?>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								</br>
								<label>MPTASS</label>
								<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="aadhardetails.php" style="width:100%" >


									<div class="row dgnform" >
										<div class="row" >

										<!---- start-off select option

										<div class="col-md-12 col-sm-6 col-xs-6" >
												<label>Select File Type</label>
												<div class="form-group">
												    <select class="form-control" name="sfile" id="sfile">
													<option value="0">Select</option>
													<option value="mptass">MPTASS FIle</option>
													<option value="rajsthan">SSO RAJ. FIle (FOR morpho)</option>
													</select>
                                                </div>
											</div>


										    <div class="col-md-12 col-sm-6 col-xs-6" >
												<label>Upload MPTASS FIle(.html)</label>
												<div class="form-group">
												    <input  type="file" class="form-control"  name="imagefile" id="mpt" required="" disabled>
                                                </div>
											</div>

											                 stop-off select option ----->


											<div class="col-md-12 col-sm-6 col-xs-6" >
												<label>Upload SSO RAJ. FIle(.html)</label>
												<div class="form-group">
												    <input  type="file" class="form-control"  name="rajsthanfile" id="raj" required=""> <!----disabled---->
                                                </div>
											</div>

										    <div class="col-md-2 col-sm-3 col-xs-6">
												<label>&nbsp;</label>
												<div class="form-group">
												   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Submit</button>

												</div>
											</div></div>
											<!-------------
											<div class="col-md-6 col-sm-6 col-xs-6" >
												<label>MPTASS </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://www.tribal.mp.gov.in/mptaas/Registration/Index" target="_blank">MPTASS WEBSITE LINK (CLICK HERE)</a>

										  --------->

												<div class="col-md-6 col-sm-6 col-xs-6" >
												</br></br>
												<label>SSO LINK</label></br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://sso.rajasthan.gov.in/" target="_blank">SSO RAJ. WEBSITE LINK (CLICK HERE)</a>


										       </br></br>

											<!---	<a href="#" type="button" id="button"  name="button"  class="btn btn-primary btn-block disabled" > <i class="ti-control-play"></i>TRANING VIDEO FOR MPTAAS</a> ---->
												<a href="#" type="button" id="button" name="button"  class="btn btn-warning btn-block active video2 "> <i class="ti-control-play"></i> TRANING VIDEO FOR SSO RAJSTHAN

</a>


											</div>
											</div>
											</div>

								<!-----	</form>
								<label>MahaDBT</label>
							 	<form method="post" name="form" autocomplete="off"   action="aadhardetails.php" style="width:100%" >


									<div class="row dgnform" >
										<div class="row" >


										    <div class="col-md-6 col-sm-6 col-xs-6" >
												<label>Copy Text</label>


												<div class="form-group">
												   <textarea name="check" class="form-control" rows="6" cols="4" style="height:auto !important;"></textarea>
                                                </div>
											</div>

										    <div class="col-md-2 col-sm-3 col-xs-6">
												<label>&nbsp;</label>
												<div class="form-group">
												   <button type="submit" id="submit" name="E_aadhar" class="btn btn-success btn-block">Submit</button>


												</div>


											</div>
											</br>
											<div class="col-md-6 col-sm-6 col-xs-6" >
												<label>MahaDBT LINK </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://mahadbtmahait.gov.in/NewRegistration/AadhaarBased#" target="_blank">MahaDBT WEBSITE LINK (CLICK HERE)</a>


												</br></br>
												<a href="#" type="button" id="button" name="button" active class="btn btn-primary btn-block active video1"> <i class="ti-control-play"></i> mahaDBT से आधार डेटा कैसे निकाले (TRANING VIDEO)</a>
												 <a href="#"  type="button"  id="button" name="button" active class="btn btn-warning btn-block active"> <i class="ti-money"></i> BUY DEVICE FOR MAHADBT</a>
										</div>
									</div>
								</form>
							</div>

                                ---->

						</section>
					</div>
				</div>
            </div>
        </div>


<script>
$(document).ready(function()
{
	$('#sfile').on('change',function()
	{
		var vals = $(this).val();
if(vals == 'mptass')
{
$('#mpt').prop("disabled", false);
$('#raj').prop("disabled", true);
}
else if(vals == 'rajsthan')
{
	$('#raj').prop("disabled", false);
	$('#mpt').prop("disabled", true);
}
else
{
	$('#mpt').prop("disabled", true);
	$('#raj').prop("disabled", true);
}
	});
});
</script>


<!------- For popup video------------->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="popup/videopopup.js"></script>
	<script type="text/javascript">
		$(function(){
			// Init Plugin
			$(".video1").videopopup({
				'videoid' : 'sTY5oiq3e7U',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
			$(".video2").videopopup({
				'videoid' : 'sTY5oiq3e7U',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
		});
    </script>
<!------- For popup video------------->
 <?php include('userFooter.php');?>
