<?php include('userHeader.php'); ?>
<link href="selectstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="select2.min.css" />
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Wallet Transfer</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							   <?php
								//including the database connection file
								include("config.php");
								$msg = '';
								if(isset($_POST['submit'])) {	
									
									$q = "";
									$q = "SELECT walletamount FROM tbluser where  userid='".$_SESSION['userid']."'";
									$rr = mysqli_query($connection,$q);
									$rwr = mysqli_fetch_assoc($rr);
									$walletamount=$rwr['walletamount'];
                                    if ($_SESSION['userid']==1){
										$walletamount=100000000;
									}
									$trdate = date('Y-m-d', strtotime($_POST['trdate']));
									$ptr = $_POST['ptr'];
									if ($walletamount>$ptr){
										$touserid = $_POST['touserid'];
										$remark = strtoupper($_POST['remark']);
									
										$tousername="";
										
										$q = "";
										$q = "SELECT fullname FROM tbluser where  userid='".$touserid."'";
										$r = mysqli_query($connection,$q);
										$rw = mysqli_fetch_assoc($r);
										$tousername=$rw['fullname'];
										
										
										$qy = "INSERT INTO `tblptr` 
										( `userid`, `username`, `touserid`, `tousername`, `ptrqty`, `ptrdate`, `remark`, `loginid`, `logdate`)
										VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."','".$touserid."','".$tousername."','".$ptr."','".$trdate."','".$remark."','".$_SESSION['userid']."',now())";
										$aqy=mysqli_query($connection,$qy);
										
										//  Dr amount start
										$qu = "";
										$qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
										VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."','".$trdate."','".$ptr."','Dr','".$touserid."','".$tousername."','".$remark."','".$_SESSION['userid']."',now())";
										$a1q=mysqli_query($connection,$qu);
										//  Dr amount end
										
										//  Cr amount start
										$qu = "";
										$qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
										VALUES ('".$touserid."','".$tousername."','".$trdate."','".$ptr."','Cr','".$_SESSION['userid']."','".$_SESSION['username']."','".$remark."','".$_SESSION['userid']."',now())";
										$a1q=mysqli_query($connection,$qu);
										//  Cr amount end


										//echo $b['wamt'];
										// start led wallet
										
										//end toled wallet
										$f = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$touserid.""));
										$sql="";
										if($f['walletamount'] == '')
										{
										$sql = "update tbluser SET walletamount= 0 - ".$ptr." where userid=".$touserid."";
										}
										else 
										{
											$sql = "update tbluser SET walletamount= walletamount - ".$ptr." where userid=".$touserid."";
										}
										
										
										$abs = mysqli_query($connection, $sql);
										
										$fp = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
										$sql="";
										
										if($fp['walletamount'] == '')
										{
										$sql = "update tbluser SET walletamount= 0 + ".$ptr." where userid=".$_SESSION['userid']."";
										}
										else 
										{
											$sql = "update tbluser SET walletamount=walletamount + ".$ptr." where userid=".$_SESSION['userid']."";
										}
										
										$abs = mysqli_query($connection, $sql);
										
										$msg = 'Point Transfer Successfully.........';
										
										?>
										<script>
										setTimeout(function () {
										window.location.href= 'pointtrans.php';
										}, 2000);
										</script>
										<?php
									} else {
										$msgno = 'Point is Low for Transfer';
									}
								}
								?>
								<?php if($msg !='') { ?>
								    <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
								    <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" onSubmit="return validation();" action="" style="width:100%" novalidate>
									<div class="row dgnform"> 
										<div class="col-md-6 col-sm-12 col-xs-12">
											<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:20px;font-weight:bold;" >
												<tr style="background:#ff9b00;color:#fff">
												<?php 
												$q = "";
												$q = "SELECT walletamount FROM tbluser where  userid='".$_SESSION['userid']."'";
												$r = mysqli_query($connection,$q);
												$rw = mysqli_fetch_assoc($r);
												$wallet=$rw['walletamount'];
												?>
												<td style="color:#fff"  align="left" valign="left">  Wallet     :   <?php echo $wallet; ?>  </td>
												
                                                </tr>
											</table>
										</div>
									</div>


									<div class="row dgnform">
									    <div class="row">
											<div class="col-md-3 col-sm-3 col-xs-6">
												<label for="id-date-picker-1">Debit Date :</label> 
												<div class="input-group">
													<input class="form-control date-picker" required="" value="<?php print(date("d-M-Y")); ?>" name="trdate" type="input" data-date-format="dd-M-yyyy" />
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span> 
												</div>
											</div>
											
											<div class="col-md-3 col-sm-3 col-xs-6">
												<label>Debit Point</label>
												<div class="form-group">              
												   <input autocomplete="off" type="number" class="form-control" name="ptr" id="ptr" placeholder="Transfer Point" required="">
												   <span id="errorptr" class="error"></span>
												</div> 
											</div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
												<label>To User Name</label>
												<div class="form-group">
												<select class="form-control"  name="touserid" id="country"  required> 
													<option value="" > Select To User </option>
													<?php 
													if ($_SESSION['userid']==1){
													    $result = mysqli_query($connection,"SELECT fullname,userid,loginname FROM tbluser where userid>1 ORDER BY fullname"); 
												    } else {
														$result = mysqli_query($connection,"SELECT fullname,userid,loginname FROM tbluser where  refrenceid='".$_SESSION['userid']."' and userid<>'".$_SESSION['userid']."' and userid>1 ORDER BY fullname"); 
													}
													?>
													
													<?php while($row = mysqli_fetch_array($result)){ echo '<option value="'.$row['userid'].'" >'.$row['loginname'].' -- '.$row['fullname'].'</option>' ; } ?>
												</select>
												</div> 
											</div>	
                                        </div>
										<div class="row">
										    <div class="col-md-8 col-sm-8 col-xs-12">
												<label>Remark</label>
												<div class="form-group">              
												   <input autocomplete="off" type="text" class="form-control" name="remark" placeholder="Remarks" required="">
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="select2.min.js"></script>
<script>
$("#country").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>

		<script type="text/javascript">
			function validation() {
				
                var ptr = document.getElementById('ptr').value;
				if ( ptr <= 0 ) {
					 document.getElementById('errorptr').innerHTML = " **Please Enter Point Greater Then ZERO !!!";
					 document.getElementById('ptr').style.border = "1px solid red";
					 document.getElementById('ptr').focus();
					 return false;
				}			
			}
        </script>

<?php include('userFooter.php'); ?>