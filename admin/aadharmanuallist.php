<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Aadhaar Card List</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform"> 
							    <div class="col-md-12 col-sm-12 col-xs-12">
								<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
									<tr style="background:#ff9b00;">
										<td align="left" valign="left">   Sn.No.       </td>
										<td align="left" valign="left">   Aadhar Name      </td>
										<td align="left" valign="left">   Aadharcard No    </td>
										<td align="left" valign="left">   Address  </td>
										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print      </td>
										<td align="middle" valign="middle">   Delete      </td>
									</tr>
									
									<?php
									$sql="";
									if ($_SESSION['userid']==1){
									    $sql="SELECT `aadharmanualid`,`aadharno`, `aadharname`, `street`, `panchayat`, `vtcandpost`, `dist`, `statename`, `pincode`, `srno`, `createdatetime` FROM `aadharmanual` order by srno desc";
									} else {
										$sql="SELECT `aadharmanualid`,`aadharno`, `aadharname`, `street`, `panchayat`, `vtcandpost`, `dist`, `statename`, `pincode`, `srno`, `createdatetime` FROM `aadharmanual` WHERE userid='".$_SESSION['userid']."'";
									}
									
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['aadharname']?> </td>
										<td align="left" valign="left"> <?=$b['aadharno']?> </td>
										<td align="left" valign="left"> <?=$b['street'].' '.$b['panchayat'].' '.$b['vtcandpost'].' '.$b['dist'].' '.$b['statename']?> </td>
										<td align="left" valign="left"> <?=date_format($date, 'j M Y')?> </td>
										<td align="center" valign="middle"> <a  style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"  class="btn btn-success" href="aadhar/aadharmanual.php?searchid=<?php echo $b['aadharmanualid']?>" target="_blank"> Print </a> </td>
										<td align="center" valign="middle">
											<form action="activemanual.php" method="post" enctype="multipart/form-data" >
												<input name="id" type="hidden" value="<?=$b['aadharmanualid']?>" />
												<input style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger" type="submit" value="Remove" />
											</form>
										</td>
									</tr>
									<?php } ?>
								</table>
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
			
<?php include('userFooter.php'); ?>