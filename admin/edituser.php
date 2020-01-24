
<script type="text/javascript">

function myFunction() {
//	alert("keshav");
var x = document.getElementById("state").value;
//alert(x);
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
if(xmlhttp.readyState==4&&xmlhttp.status==200){
document.getElementById('city').innerHTML = xmlhttp.responseText;}}
xmlhttp.open('GET', 'city.php?state='+x , true);
xmlhttp.send();
}

</script>



<?php include('userHeader.php'); ?>



      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Update Users Account</h1>
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
									$msg = '';	
									$usertype = strtoupper($_POST['usertype']);
									$userid = strtoupper($_POST['userid']);
                                    $username = strtoupper($_POST['username']) ;
									$address = strtoupper($_POST['address']);
									$state = strtoupper($_POST['state']);
                                    $city = strtoupper($_POST['city']) ;
									$emailid = strtolower($_POST['emailid']);
									$refrenceid = $_POST['refrenceid'];
									$mobileno = $_POST['mobileno'];
                                    $aadhar = $_POST['aadhar'] ;
									$password = $_POST['password'];
									$remark = strtoupper($_POST['remark']);
                                    $aadharpoint = $_POST['aadharpoint'] ;
									$cardrate = $_POST['cardrate'] ;
									$pancardpoint = $_POST['pancardpoint'] ;
									$status = $_POST['status'];
									$userrate = $_POST['userrate'];
                                    $uid= $_POST['uid'];
									//echo 
									
									$q = "";
									$q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
									$r = mysqli_query($connection,$q);
									$rw = mysqli_fetch_assoc($r);
									$rw['aadharpoint'];
									
									//elseif($rw['pancardpoint']>$pancardpoint || $_SESSION['userid']>1 ){
									//	$msgno = 'You Enter Less Pancard Point to Your Point  .... ';
									//} 
									
									
								



										$query = "UPDATE `tbluser` SET `fullname`='".$username."',`usertype`='".$usertype."',`loginname`='".$userid."',
										`emailid`='".$emailid."',`adhaarno`='".$aadhar."', `address`='".$address."',`cityname`='".$city."',`mobileno`='".$mobileno."',
										`pswrd`='".$password."',`remarks`='".$remark."',`loginid`='".$_SESSION['userid']."',`logdate`=now(),`statename`='".$state."',`aadharpoint`='".$aadharpoint."',`cardrate`='".$cardrate."',`pancardpoint`='".$pancardpoint."',
										`refrenceid`='".$refrenceid."',status=".$status.",userrate=".$userrate." WHERE userid='".$uid."'";
										$aquery=mysqli_query($connection,$query);
										
										$msg = 'User Name Update Successfully.........';
										
									
									?>
									<script>
									setTimeout(function () {
										window.location.href= 'userlist.php';
									}, 3000);
									</script>
									<?php
								}
								?>
								<?php if($msg !='') { ?>
								<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
								<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" action="" style="width:100%" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" >
									<div class="row dgnform">
									    <div class="row col-md-12 col-sm-12 col-xs-12">
											<div class="col-md-3 col-sm-3 col-xs-6">
											<?php
												error_reporting(0);
												include("config.php");

												$id = $_REQUEST['userid'];
												$sqla="";
												$sqla="SELECT `userid`, `fullname`, `usertype`, `loginname`, `emailid`,  `adhaarno`, `panno`, `address`,`village`, `cityname`, `mobileno`, `pswrd`, `remarks`, `walletamount`, `userdis`,`statename`, `refrenceid`,`aadharpoint`,`cardrate`,`pancardpoint`,`panimage`,`aadharimage`,`userrate` FROM `tbluser` WHERE userid='".$id."'";
												$updt = mysqli_query($connection,$sqla) ;
												$slcts = mysqli_fetch_array($updt);
												//$slcts = mysqli_fetch_assoc($r);
												//$slcts['aadharpoint'];

												?>
												<label>User Type</label>
												<div class="form-group">
												<select class="form-control"  name="usertype" id="usertype"  required readonly>
												    <option value="<?php echo $slcts['usertype'];?>" ><?php echo $slcts['usertype'];?></option>
													<option value="" > Select User Type </option>
													<?php if ($_SESSION['usertype'] == 'MAINADMIN') { ?>
													<option value="ADMIN" > ADMIN </option>
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>
														<option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
														<option value="CHANNEL PARTNER" > CHANNEL PARTNER </option>
                                                       <?php } elseif ($_SESSION['usertype'] == 'ADMIN') { ?>
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>
														<option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
														<option value="CHANNEL PARTNER" > CHANNEL PARTNER </option>
														
														
												<?php } elseif ($_SESSION['usertype'] == 'CHANNEL PARTNER') { ?>														<option value="RETAILER" > RETAILER </option>														<option value="DISTRIBUTER" > DISTRIBUTER </option>														<option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>		
														
													<?php } elseif ($_SESSION['usertype'] == 'SUPER DISTRIBUTER') { ?>
														<option value="RETAILER" > RETAILER </option>
														<option value="DISTRIBUTER" > DISTRIBUTER </option>

													<?php } elseif ($_SESSION['usertype'] == 'DISTRIBUTER') { ?>
														<option value="RETAILER" > RETAILER </option>
													<?php } ?>
												</select> 
												</div> 
											</div>
											<div class="col-md-3 col-sm-4 col-xs-6">
												<label>USER ID</label>
												<div class="form-group">              
												<input autocomplete="off" type="text"  readonly
												
												class="form-control"  id="userid" value="<?php echo $slcts['loginname'];?>" name="userid" placeholder="User Id" required>
												<span id="erroruserid" class="error"></span>  
												</div> 
											</div>										
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<label>Name</label>
												<div class="form-group">              
												<input autocomplete="off" type="text"  readonly
												
												class="form-control" id="username" value="<?php echo $slcts['fullname'];?>" name="username" placeholder="User Name" required>
												<span id="errorusername" class="error"></span>  
												</div> 
											</div>
										</div>
										<div class="row col-md-12 col-sm-12 col-xs-12">											
											<div class="col-md-6 col-sm-8 col-xs-12">
												<label>Address</label>
												<div class="form-group">              
												<input autocomplete="off" readonly type="text" class="form-control" name="address" value="<?php echo $slcts['address'];?>"  placeholder="Address" required>  
												</div> 
											</div>
											<div class="col-md-3 col-sm-4 col-xs-6">
												<label>State</label>
												<div class="form-group">              
												<select class="form-control" onchange="myFunction();" name="state"
												
												id="state"  required readonly>
												<option value="<?php echo $slcts['statename'];?>" ><?php echo $slcts['statename'];?></option>
													<option value="" > SELECT STATE</option>
													<?php $result = mysqli_query($connection,"SELECT DISTINCT state FROM tblcities ORDER BY id"); ?>
													<?php while($row = mysqli_fetch_array($result)){ echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>' ; } ?>
													</select> 
												</div> 
											</div>
											<div class="col-md-3 col-sm-4 col-xs-6">
												<label>City</label>
												<div class="form-group">              
													<select class="form-control" name="city" 
													
													id="city"  required readonly>
													<option value="<?php echo $slcts['cityname'];?>" ><?php echo $slcts['cityname'];?></option>
													</select>   
												</div> 
											</div>
										</div>
										<div class="row col-md-6 col-sm-6 col-xs-6">											
											<div class="col-md-7 col-sm-7 col-xs-12">
												<label>Email Id</label>
												<div class="form-group">              
												<input type="text" class="form-control"  readonly id="emailid" value="<?php echo $slcts['emailid'];?>" name="emailid" placeholder="Email Id" required="">
												<span id="erroremailid" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-5 col-sm-8 col-xs-14">
												<label>Mobile No</label>
												<div class="form-group">              
												<input type="number" maxlength="10" readonly class="form-control" value="<?php echo $slcts['mobileno'];?>" id="mobileno" name="mobileno" placeholder="Mobile No" required>
												<span id="errormobileno" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-7 col-sm-7 col-xs-12">
												<label>Aadhar No</label>
												<div class="form-group">              
												<input type="number" maxlength="14"

class="form-control" name="aadhar" value="<?php echo $slcts['adhaarno'];?>" readonly placeholder="Aadhar No">
												</div> 
											</div>
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<label>Password</label>
												<div class="form-group">              
												<input autocomplete="off" type="text" class="form-control" id="password" value="<?php echo $slcts['pswrd'];?>"  name="password" placeholder="Password" required>
												<span id="errorpassword" class="error"></span>  
												</div> 
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<label>Confirm Password</label>
												<div class="form-group">              
												<input autocomplete="off" type="text" class="form-control" id="confirmpassword"  value="<?php echo $slcts['pswrd'];?>"  name="confirmpassword" required placeholder="Confirm Password">
												<span id="errorconfirmpassword" class="error"></span>  
												</div> 
											</div>
											<div hidden class="col-md-6 col-sm-6 col-xs-12">
												<label hidden >Aadhar Image</label>
												<div hidden class="form-group">              
												<a hidden href="<?php echo $slcts['aadharimage'];?>" target="_blank"><font color="red" >View image</font></a>
												</div> 
											</div>
											<div hidden class="col-md-6 col-sm-6 col-xs-12">
												<label hidden>Pan Image</label>
												<div hidden class="form-group">              
												<a hidden href="<?php echo $slcts['panimage'];?>" target="_blank"><font color="red" >View Image</font></a>
												</div> 
											</div>
											
											
											<div class="col-md-6 col-sm-6 col-xs-12">
												<label>User Status</label>
												<div class="form-group">              
												<select name="status" class="form-control" >
												<option value="1">Active</option>
												<option value="0">Deactive</option>
												</select>												
												</div> 
											</div>
											
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label>Remark</label>
												<div class="form-group">              
												<input autocomplete="off" type="text" readonly class="form-control" value="<?php echo $slcts['remarks'];?>"  name="remark" placeholder="Remark"> 
												<input autocomplete="off" type="hidden" readonly class="form-control" value="<?php echo $slcts['refrenceid'];?>"  name="refrenceid" placeholder="refrenceid"> 
												<input autocomplete="off" type="hidden" readonly class="form-control" value="<?php echo $slcts['userid'];?>"  name="uid" placeholder="userid"> 
												</div> 
											</div>
										</div>	
										<div class="row col-md-6 col-sm-6 col-xs-4">
										    <table style="width:100%">
												
												
												
												
												<tr>
													<td hidden>USER ADD RATE</td>
													<td hidden><input hidden type="text" readonly class="form-control" id="userrate" required  name="userrate" value="<?php echo $slcts['userrate'];?>" placeholder="select type generate rate"></td>
												</tr>
												
												
												
												<tr>
													<td>CARD PRINT RATE / CARD</td>
													<td><input type="text"  class="form-control" id="cardrate"

													required  name="cardrate"  readonly value="<?php echo $slcts['cardrate'];?>"></td>
													
												</tr>
												
												<div hidden class="row col-md-6 col-sm-6 col-xs-6">
										    <table  hiddenstyle="width:100%">
												<tr hidden>
													<td hidden>Point / Card<td>
													<td hidden><input  readonly type="text" class="form-control" id="aadharpoint" 
													
													required  name="aadharpoint" value="1" placeholder="Aadhar Auto Point/Doc"></td>
												</tr></tr>
												
												<tr hidden>
													<td hidden>Wallet Amount<td>
													<td hidden><input type="text" class="form-control" id="walletamount" 
													
													required  name="walletamount" value="0" placeholder="Aadhar Auto Point/Doc"></td>
												</tr>
												
											</table hidden>											
										</div>	
												
												
												
												
												
											
												
												
												
												
											</table>											
										</div>										
										<div class="col-md-2 col-sm-3 col-xs-6">
											<label>&nbsp;</label>
											<div class="form-group">              
											   <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Update</button> 
											   <a href="userright.php?uid=<?php echo $slcts['userid'];?>" class="btn btn-success btn-block">Set User Rights</a>
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
		$(document).ready(function()
				{
					$("#usertype").on('change',function()
					{
						var vals = $(this).val();
						if(vals == 'RETAILER')
						{
							
						$('#cardrate').val(10);
						
						}
						else if(vals == 'DISTRIBUTER')
						{
							
						$('#cardrate').val(5);
												
						}
						else 
						{
								
						$('#cardrate').val(1);
												
						}
					});
				});
            	
            	function validation() {
            		//alert('ok');
            		var userid = document.getElementById('userid').value;
            		if ( userid.trim()  == "" ) {
                         document.getElementById('erroruserid').innerHTML = " **Please Enter Login Name/ID";
                         document.getElementById('userid').style.border = "1px solid red";
                         document.getElementById('userid').focus();
                         return false;
            		}
					var username = document.getElementById('username').value;
            		if ( username.trim()  == "" ) {
                         document.getElementById('errorusername').innerHTML = " **Please Enter User Name";
                         document.getElementById('username').style.border = "1px solid red";
                         document.getElementById('username').focus();
                         return false;
            		}
                    var emailid = document.getElementById('emailid').value;
            		if ( emailid.trim()  == "" ) {
                         document.getElementById('erroremailid').innerHTML = " **Please Enter Email Id";
                         document.getElementById('emailid').style.border = "1px solid red";
                         document.getElementById('emailid').focus();
                         return false;
            		}

					var mobileno = document.getElementById('mobileno').value;
            		if ( mobileno.trim()  == "" ) {
                         document.getElementById('errormobileno').innerHTML = " **Please Enter Mobile No";
                         document.getElementById('mobileno').style.border = "1px solid red";
                         document.getElementById('mobileno').focus();
                         return false;
            		}
					var password = document.getElementById('password').value;
            		if ( password.trim()  == "" ) {
                         document.getElementById('errorpassword').innerHTML = " **Please Enter Password";
                         document.getElementById('password').style.border = "1px solid red";
                         document.getElementById('password').focus();
                         return false;
            		}

					var confirmpassword = document.getElementById('confirmpassword').value;
            		if ( confirmpassword.trim() != password.trim() ) {
                         document.getElementById('errorconfirmpassword').innerHTML = " **Please Enter Correct Confirm Password";
                         document.getElementById('confirmpassword').style.border = "1px solid red";
                         document.getElementById('confirmpassword').focus();
                         return false;
            		}
					var aadharpoint = document.getElementById('aadharpoint').value;
            		if ( aadharpoint.trim()  == "" ) {
                       //  document.getElementById('errorcity').innerHTML = " **Please Enter City";
                         document.getElementById('aadharpoint').style.border = "1px solid red";
                         document.getElementById('aadharpoint').focus();
                         return false;
            		}
			
            	}
            </script>
			
<?php include('userFooter.php'); ?>