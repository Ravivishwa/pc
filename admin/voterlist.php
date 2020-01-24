<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Voter Card List</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform"> 
							    <div class="col-md-12 col-sm-12 col-xs-12">
							
								<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
									<tr style="background:#ff9b00;">
										<td align="left" valign="left">   Sn.No.       </td>
										<td align="left" valign="left">   Voter Id No     </td>
										<td align="left" valign="left">   Voter Name      </td>	
										<td align="left" valign="left">   Father Name      </td>
										<td align="left" valign="left">   Address  </td>
										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print     </td>
										
										   <td align="middle" valign="middle">   Delete      </td>
									
									</tr>
									
									<?php
									if ($_SESSION['userid']==1){
										$sql="";
									    $sql="SELECT `aadharname`, `fatheraadharname`,`voterautoid`, `votername`, `fathername`, `epicno`, `tahshil`, `fulladdress`, `status`, `createdatetime` FROM `voterauto` order by status desc";
								    } else {
										$sql="";
									    $sql="SELECT `aadharname`, `fatheraadharname`,`voterautoid`, `votername`, `fathername`, `epicno`, `tahshil`, `fulladdress`, `status`, `createdatetime` FROM `voterauto` WHERE userid='".$_SESSION['userid']."' order by srno desc";
									}
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['epicno']?> </td>
										
										<td align="left" valign="left"> <?=$b['votername']?> </td>
										<td align="left" valign="left"> <?=$b['fathername']?> </td>
										<td align="left" valign="left"> <?=$b['fulladdress']?> </td>
										<td align="left" valign="left"> <?=date_format($date, 'j M Y g:ia')?> </td>
										
										<td align="center" valign="middle"> <a style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;"  class="btn btn-success" href="voter/voter.php?searchid=<?php echo $b['voterautoid']?>" target="_blank"> Print </a> </td>

										

											
											<td align="center" valign="middle">
												<form action="voterdelete.php" method="post" enctype="multipart/form-data" >
													<input name="id" type="hidden" value="<?=$b['voterautoid']?>" />
													<input style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;" class="btn btn-danger" type="submit" value="Delete" />
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