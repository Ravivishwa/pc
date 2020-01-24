<?php include('downloader/codepitch/autoload.php');?>
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
										<td align="left" valign="left">   Aadhaar Name      </td>
										<td align="left" valign="left">   Father Name      </td>
										<td align="left" valign="left">   Print Type  </td>
										<td align="left" valign="left">   Address  </td>
										<td align="left" valign="left">   Create Date Time  </td>
										<td align="middle" valign="middle">   Print <br> Status     </td>
										<?php if ($_SESSION['userid']==1){ ?>
										   <td align="middle" valign="middle">   Done      </td>
									       <td align="middle" valign="middle">   Cancel      </td>
										   <td align="middle" valign="middle">   Delete      </td>
										<?php } ?>
									</tr>

									<?php
									if ($_SESSION['userid']==1){
										$sql="";
									    $sql="SELECT *  FROM `voterids` order by id desc";
								    } else {
										$sql="";
									    $sql="SELECT * FROM `voterids` WHERE add_by='".$_SESSION['userid']."' order by id desc";
									}
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php


									?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['epic_number']?> </td>
										<td align="left" valign="left"> <?=$b['name']?> </td>
										<td align="left" valign="left"> N/A </td>
										<td align="left" valign="left"> <?=$b['father_name']?> </td>
										<td align="left" valign="left"> <?=strtoupper($b['panel'])?> </td>
										<td align="left" valign="left"> <?=$b['house'].' '.$b['original_address']?> </td>
										<td align="left" valign="left"> <?=$b['created_at']?> </td>
										<?php if (1){ ?>
										   <td align="center" valign="middle">
                                            <?php if($b['panel'] == 'full') { ?>
										   	<a style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;"  class="btn btn-success" href="downloader/voter.php?id=<?php echo $b['id']?>" target="_blank"> Print </a>
										    <?php } else { ?>
										      <a style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;"  class="btn btn-success" href="downloader/voter-half.php?id=<?php echo $b['id']?>" target="_blank"> Print </a>
										      <?php  } ?></td>
										<?php } else { ?>
											<td align="center" valign="middle"><?php echo $b['status'] ?></td>
										<?php } ?>
										<?php if ($_SESSION['userid']==1){ ?>
										    <?php if ($b['status']=="generated"){ ?>
												<td align="left" valign="left">  </td>
												<td align="left" valign="left"> </td>
											<?php } else { ?>
												<td align="center" valign="middle">
													<form action="voterdone.php" method="post" enctype="multipart/form-data" >
														<input name="id" type="hidden" value="<?=$b['voterautoid']?>" />
														<input style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;" class="btn btn-success" type="submit" value="Done" />
													</form>
												</td>
												<td align="center" valign="middle">

												</td>
											<?php } ?>

											<td align="center" valign="middle">
												<form action="voterdelete-eci.php" method="post" enctype="multipart/form-data" >
													<input name="id" type="hidden" value="<?=$b['id']?>" />
													<input style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;" class="btn btn-danger" type="submit" value="Delete" />
												</form>
											</td>
										<?php } ?>
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
