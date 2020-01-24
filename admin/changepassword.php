<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Change Password</h1>
								</div>
							</div>
						</div>
						<?php
							$a = mysqli_query($connection,"SELECT * FROM tbluser where userid='".$_SESSION['userid']."'");
							$b = mysqli_fetch_array($a);
						?>
						<?php
						if (isset($_POST['submit'])) {
							$pass = $b['pswrd'];
							$currentpassword         =  $_POST['currentpassword'] ;
							$password           =  strtolower($_POST['password']);
							$confirmpassword          =  strtolower($_POST['confirmpassword']) ;
							
							if ($pass == $currentpassword ){
								$query = "UPDATE `tbluser` SET `pswrd`='$password' where userid='".$_SESSION['userid']."'";
								$aquery=mysqli_query($connection,$query);
								$msg = 'Dear Member Your User Password Updated Successfully' ;
								?>
								<script>
								setTimeout(function () {
								window.location.href= 'changepassword.php';
								}, 2000);
								</script>
								<?php
							}
							else {
								$msgno = 'Current Password Entered is Wrong ... Try Again....' ;
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
							 	<form method="post" name="form"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
										<div class="row col-md-6 col-sm-6 col-xs-6">
										    <div class="col-md-12 col-sm-12 col-xs-12">
											    <label>Current Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" value="<?php echo $b['pswrd']; ?>" id="currentpassword" name="currentpassword" placeholder="Please Type Current Password" required>
													<span id="errorcurrentpassword" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>New Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" id="password" name="password" placeholder="Type New Password" required>
													<span id="errorpassword" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Confirm Password</label>
												<div class="form-group">              
													<input autocomplete="off" type="text" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Password">
													<span id="errorconfirmpassword" class="error"></span>  
												</div> 
											</div>
                                           
										    <div class="col-md-12 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Submit</button> 
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
		<script type="text/javascript">
            	
            	function validation() {
					
					var currentpasswo = document.getElementById('currentpassword').value;
            		if ( currentpasswo.trim() == "" ) {
                         document.getElementById('errorcurrentpassword').innerHTML = " **Please Enter Current Password !! Please Check !!!";
                         document.getElementById('currentpassword').style.border = "1px solid red";
                         document.getElementById('currentpassword').focus();
                         return false;
            		}  
					
					var password = document.getElementById('password').value;
            		if ( password.trim() == "" ) {
                         document.getElementById('errorpassword').innerHTML = " **Please Enter New Password !! Please Check !!!";
                         document.getElementById('password').style.border = "1px solid red";
                         document.getElementById('password').focus();
                         return false;
            		}  
					
					
					var confirmpassword = document.getElementById('confirmpassword').value;
            		if ( confirmpassword.trim() == "" ) {
                         document.getElementById('errorconfirmpassword').innerHTML = " **Please Enter New Password !! Please Check !!!";
                         document.getElementById('confirmpassword').style.border = "1px solid red";
                         document.getElementById('confirmpassword').focus();
                         return false;
            		}  
					
            		var pass = document.getElementById('password').value;
					var conpass = document.getElementById('confirmpassword').value;
            		if ( pass.trim() != conpass.trim() ) {
                         document.getElementById('errorconfirmpassword').innerHTML = " **Password Not Confirm !! Please Check !!!";
                         document.getElementById('confirmpassword').style.border = "1px solid red";
                         document.getElementById('confirmpassword').focus();
                         return false;
            		}  
                    					
            	}
            </script>
<?php include('userFooter.php'); ?>