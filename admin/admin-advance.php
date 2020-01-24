<?php include_once 'downloader/codepitch/autoload.php'; ?>
<?php
date_default_timezone_set('Asia/Kolkata');
?>
<?php
$login_user =  codepitch_get_user($_SESSION['userid']); 

if(strtoupper($login_user['usertype']) != 'MAINADMIN' )
{
    session_destroy();
    header("location:panel.php");
    
}
?>
<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Asp Session ID</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							   <?php
								//including the database connection file
								include("config.php");
								
								if(isset($_POST['submit'])) {	
									    $asp_id = trim($_POST['asp_id']);
								        if ($asp_id!=""){

								        	
											
											
											$sql = "update `tbluser` set asp_id = '".$asp_id."' where userid = 1";
											$abs = mysqli_query($connection, $sql);
											
											$msg = 'Asp ID updated successfully........';
											
											?>
											<script>
											setTimeout(function () {
											window.location.href= 'admin-advance.php';
											}, 2000);
											</script>
											<?php
										} else {
											$msgno = 'Please Enter ID';
										}
								}
								?>
								<?php if($msg !='') { ?>
								    <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
								    <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" onSubmit="return validation();" action="" style="width:100%">
									<?php
							
									$sql="";
									$sql = "SELECT asp_id FROM tbluser where userid = 1 ";
									mysqli_set_charset($connection,"utf8");
									$aba = mysqli_query($connection, $sql);
									$bba = mysqli_fetch_array($aba);
								   // echo $bba['msg']
									?>
									<div class="row dgnform">
										<div class="row">
										    <div class="col-md-12 col-sm-12 col-xs-12">
												<label>Session</label>
												<div class="form-group">              
												    <textarea rows="5" cols="80" widht="100%" name="asp_id" required id="asp_id"><?php
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://forefrontpro.xyz/details.php');
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false );


         curl_setopt($ch, CURLOPT_POST, false );
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, false );



         $html =curl_exec($ch);
          curl_close($ch);
        
?>
</textarea>
												</div> 
											</div>	
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Save</button> 
												</div> 
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>
<?php include('userFooter.php'); ?>