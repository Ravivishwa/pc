<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Wallet In Out Details</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform">
							    <form style="width:100%" method="post" action="">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-3">
											<label for="id-date-picker-1">From Date :</label> 
											<div class="input-group">
												<input class="form-control date-picker" required="" value="<?php print(date("01-M-Y")); ?>" name="fromdate" id="fromdate" type="input" data-date-format="dd-M-yyyy" />
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<span id="errorfromdate" class="error"></span>  
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-3">
											<label for="id-date-picker-1">To Date :</label> 
											<div class="input-group">
												<input class="form-control date-picker" required="" value="<?php print(date("d-M-Y")); ?>" name="todate" id="todate" type="input" data-date-format="dd-M-yyyy" />
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
												<span id="errortodate" class="error"></span>  
											</div>
										</div>
										
										<!--<div class="col-md-3 col-sm-6 col-xs-6">
											<label>To Member Name :</label>  
											<div class="form-group">  
												<div>            
												   <input autocomplete="off"  type="text" class="form-control" name="username" placeholder="Member Name" >
												 </div>  
											</div> 
										</div>-->
										
										
										<div class="col-md-2 col-sm-6 col-xs-6">
											<div class="form-group">       
												<label>&nbsp;</label>	
												<div>											
													<button type="submit" id="Search" name="Search" class="btn btn-warning btn-block bg-warning">Search</button> 
												</div>
											</div> 
										</div>
									</div>	
									<div class="col-md-12 col-sm-12 col-xs-12">
										<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
											<tr style="background:#ff9b00;color:#fff">
												<td style="color:#fff"  align="left" valign="left">   Sn. No.       </td>
												<td style="color:#fff"  align="left" valign="left">   Date       </td>
												<td style="color:#fff"  align="left" valign="left">   Point        </td>
												<td style="color:#fff"  align="left" valign="left">   Dr/Cr        </td>
												<td style="color:#fff"  align="left" valign="left">   From User Name      </td>
												<td style="color:#fff"  align="left" valign="left">   To User Name      </td>
												<td style="color:#fff"  align="left" valign="left">   Remark      </td>
												
											</tr> 
											
											<?php
										
												if(isset($_POST['Search'])) {
												    $frmdt = date('Y-m-d', strtotime($_POST['fromdate']));
												    $todt = date('Y-m-d', strtotime($_POST['todate']));
													$name = strtoupper($_POST['username']);
										
													if ($name == "") {
														if ($_SESSION['userid'] == 1) {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where    transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transid desc");
															$y = 0 ; 
														} else {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														}
													} elseif ($name <> "") {
														if ($_SESSION['userid'] == 1) {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														} else {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														}
													}
												}
												else {
													date_default_timezone_set('Asia/Kolkata');
                                                    //$todt = date('Y-m-d');
													$frmdt = date("Y-m-01");
													$todt = date("Y-m-d");
													if ($_SESSION['userid'] == 1) {
														$a = mysqli_query($connection,"SELECT  * FROM tbltrans      ORDER BY transid desc");
														$y = 0 ; 
													} else {
														$a = mysqli_query($connection,"SELECT  * FROM tbltrans where userid='".$_SESSION['userid']."'   ORDER BY transid desc");
														$y = 0 ; 
													}
												}
												//echo $frmdt;
												?>
												
												
												
											<?php while($b = mysqli_fetch_array($a)){ $x++; $date = date_create($b['transdate']); ?>
											<tr id="">
												<td align="left" valign="left"> <?=$x?> </td>
												<td align="left" valign="middle"> <?=date_format($date, 'j M Y')?> </td>
												<td align="left" valign="left"> <?=$b['transqty']?> </td>
												<td align="left" valign="left"> <?=$b['transtype']?> </td>
												<td align="left" valign="left"> <?=$b['username']?> </td>
												<td align="left" valign="left"> <?=$b['tousername']?> </td>
												<td align="left" valign="left"> <?=$b['remark']?> </td>
											</tr>
											<?php } ?>
										</table>
									</div>
									<div class="clearfix"></div>
								</form>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
            
<?php include('userFooter.php'); ?>