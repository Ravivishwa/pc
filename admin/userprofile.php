<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							<div class="intro-img">
								<img src="img/profile.jpg" alt="" class="img-fluid">
							</div>
								<div class="row dgnform">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="page-header">
												<div class="page-title">
													<h1><i class="ti-hand-point-right"></i> User Personal Information</h1>
												</div>
											</div>
										</div>
										<?php 
											$q = "";
											$q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
											$r = mysqli_query($connection,$q);
											$rw = mysqli_fetch_assoc($r);
											$rw['fullname'];
										?>

										<div class="col-md-12 col-sm-12 col-xs-12">
											<table class="table-striped" style="font-size:15px;width:100%;" >
												<tr>
													<td style="font-weight:bold" align="left" valign="left">   User Name  :-     </td>
													<td align="left" colspan="2" valign="left">   <?php echo $rw['fullname'];?>     </td>
												</tr>
												<tr>
													<td style="font-weight:bold" align="left" valign="left">  Address  :-     </td>
													<td align="left" colspan="2"  valign="left">   <?php echo $rw['cityname'].' '.$rw['statename'];?>     </td>
												</tr>
												<tr>
													<td style="font-weight:bold" align="left" valign="left">   User Type  :-     </td>
													<td align="left" colspan="2"  valign="left">   <?php echo $rw['usertype'];?>     </td>
												</tr>
												<tr>
													<td style="font-weight:bold" align="left" valign="left">   Mobile No  :-     </td>
													<td align="left" colspan="2"  valign="left">   <?php echo $rw['mobileno'];?>     </td>
												</tr>
												<tr>
													<td style="font-weight:bold" align="left" valign="left">   Total Wallet Point  :-     </td>
													<td align="left" colspan="2"  valign="left">   <?php echo $rw['walletamount'];?>     </td>
												</tr>
												<tr>
													<td style="font-weight:bold" align="left" valign="left">   Card Print Rate  :-     </td>
													<td align="left" colspan="2"  valign="left">   <?php echo $rw['aadharpoint'];?> Point / Card    </td>
													
												</tr>
												
												
											</table>
										</div>
										
									</div>
								</div>
							</div>
							<!-- /# row -->
						</section>
					</div>
				</div>
            </div>
        </div>
	
	

<?php include('userFooter.php'); ?>