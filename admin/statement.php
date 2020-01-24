<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>User Statement</h1>
								</div>
							</div>
						</div>
						<?php
							$sql='';
							$sql = "SELECT walletamount  FROM tbluser where userid='".$_SESSION['logid']."'";
							$a = mysqli_query($connection, $sql);
							$b = mysqli_fetch_array($a);
								//echo $b['wamt'];
							
							$walletAmount = $b['walletamount'];
						?>     
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform">
                                <form style="width:100%" method="post" action="">
									<div class="row">
										<div class="col-xs-6 col-sm-3 col-md-3">
											<label for="id-date-picker-1">From Date :</label> 
											<div class="input-group">
												<input class="form-control date-picker" required="" value="<?php print(date("01-M-Y")); ?>" name="fromdate" id="fromdate" type="input" data-date-format="dd-M-yyyy" />
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<span id="errorfromdate" class="error"></span>  
											</div>
										</div>
										<div class="col-xs-6 col-sm-3 col-md-3">
											<label for="id-date-picker-1">To Date :</label> 
											<div class="input-group">
												<input class="form-control date-picker" required="" value="<?php print(date("d-M-Y")); ?>" name="todate" id="todate" type="input" data-date-format="dd-M-yyyy" />
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>
												<span id="errortodate" class="error"></span>  
											</div>
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6">
												<label>Wallet Amount :</label>  
												<div class="form-group">  
													<div>            
													   <input autocomplete="off" readonly type="text" class="form-control" name="username" value="<?php echo $walletAmount;?> Rs" placeholder="Wallet Amount" >
													 </div>  
												</div> 
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6">
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
											<td style="color:#fff"  align="left" valign="left">SNo</td>
											<td style="color:#fff"  align="left" valign="left">   Date            </td>
											<td style="color:#fff"  align="left" valign="left">   Particular                         </td>
											<td style="color:#fff"  align="left" valign="left">V. No.</td>
											<td style="color:#fff"  align="left" valign="left">V. Type</td>
											<td style="color:#fff"  align="right" valign="right">   Credit  </td>
											<td style="color:#fff"  align="right" valign="right">   Debit   </td>
											<td style="color:#fff"  align="right" valign="right">   Balance       </td>
											<td style="color:#fff"  align="left" valign="left">   Remarks       </td>
											</tr> 
											<tr>
												<?php 
												if(isset($_POST['Search'])) {	
												    $frmdt = date('Y-m-d', strtotime($_POST['fromdate']));
													$frdt = $_POST['fromdate'];
												    $todt = date('Y-m-d', strtotime($_POST['todate']));
													$dr='';
													$cr='';
													$sql='';
													$sql = "SELECT sum(cramount) as cramt,sum(dramount) as dramt  FROM tbltransaction where ledcode='".$_SESSION['logid']."' and trdate<'".$frmdt."'";
													$ab = mysqli_query($connection, $sql);
													$bb = mysqli_fetch_array($ab);
													$opbal =$bb['cramt'] - $bb['dramt'];
													if($opbal<0){
														$dr=$opbal;
													}
													else {
														$cr=$opbal;
													}
													
													$a = mysqli_query($connection,"SELECT  * FROM tbltransaction where ledcode='".$_SESSION['logid']."' and trdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY trdate,id");
													$x = 0 ; 
													
													
												} else {
													date_default_timezone_set('Asia/Kolkata');
													$frmdt = date("Y-m-01");
													$frdt = date("01-M-Y");
													$todt = date('Y-m-d');
													 
													$dr='';
													$cr='';
													$sql='';
													$sql = "SELECT sum(cramount) as cramt,sum(dramount) as dramt  FROM tbltransaction where ledcode='".$_SESSION['logid']."' and trdate<'".$frmdt."'";
													$ab = mysqli_query($connection, $sql);
													$bb = mysqli_fetch_array($ab);
													$opbal =$bb['cramt'] - $bb['dramt'];
													if($opbal<0){
														$dr=$opbal;
													}
													else {
														$cr=$opbal;
													}
													$a = mysqli_query($connection,"SELECT  * FROM tbltransaction where ledcode='".$_SESSION['logid']."' and trdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY trdate,id");
													$x = 0 ; 
													
												}
												$bal=$opbal;
												?>
												<td align="left" colspan="5" valign="middle"> Opening Balance as On <?=$frdt?>  </td>
												<td align="right" valign="right"> <?=$cr?> </td>
												<td align="right" valign="right"> <?=$dr?>  </td>
												<td align="left" valign="left">  </td>
												<td align="left" valign="left">  </td>
											</tr>
											
											
											<?php while($b = mysqli_fetch_array($a)){ $x++; $date = date_create($b['trdate']); ?>
											<tr id="">
												<td align="left" valign="left"> <?=$x?> </td>
												<td align="left" valign="middle"> <?=date_format($date, 'j M Y')?> </td>
												<td align="left" valign="left"> <?=$b['tomember']?> </td>
												<td align="left" valign="left"> <?=$b['vno']?> </td>
												<td align="left" valign="left"> <?=$b['trantype']?> </td>
												<td align="right" valign="right"> <?=$b['cramount']?>  </td>
												<td align="right" valign="right"> <?=$b['dramount']?>  </td>
												<?php $bal=$bal+$b['cramount']-$b['dramount']?>
												<td align="right" valign="right"> <?=$bal?>  Rs</td>
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