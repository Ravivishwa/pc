<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Votercard Entry Advanced</h1>
								</div>
							</div>
						</div>

						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
							 	<form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="voterdetails-eci.php" style="width:100%">
									<div class="row dgnform">
										<div class="row col-md-12 col-sm-12 col-xs-12">
										    <div class="col-md-4">
												<label>Upload ECI File</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"  name="ecifile" required="">
                                                </div> 
											</div>

											<div class="col-md-4">
												<label>EPIC Number</label>
												<div class="form-group">              
												    <input  type="text" class="form-control"  name="epic_number" required="">
                                                </div> 
											</div>

											<div class="col-md-4">
                                         <div class="form-group">
                                           <label>States</label>
                                           
                                           
                                           <select required="" onchange="myFunction();" name="state" id="state" class="form-control">
                                             <option value="">Choose Below</option>
                                              <?php $result = mysqli_query($connection,"SELECT DISTINCT state FROM tblcities ORDER BY state"); ?>
                                                        <?php while($row = mysqli_fetch_array($result)){ echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>' ; } ?>       
                                             
                                                                                           
                                            </select> 
                                         </div>  

                                         

                                     </div>

                                     <div class="col-md-4">
                                         <div class="form-group">
                                           <label>District</label>
                                           
                                           
                                           <select required="" name="district" id="city" class="form-control">
                                             <option value="">Choose Below</option>       
                                             
                                           </select> 
                                         </div>  

                                         

                                     </div>

                                     <div class="col-md-4">
                                         <div class="form-group">
                                           <label>Pin Code</label>
                                           
                                           
                                            <input type="number" required="" name="pincode" class="form-control" placeholder="Pincode" value="" autocomplete="off">
                                         </div>  

                                         

                                     </div>
											<br/>
										
										    <div class="col-md-12 col-sm-12 col-xs-12">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button> 
												</div> 
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- /# row -->

							<div class="row">
								  <div class="col-md-12 col-sm-12 col-xs-12" >
                                <div class="card">
                                    
                                            <div class="col-md-6 col-sm-6 col-xs-6" >
												<label>Election KYC Link </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://www.nvsp.in/Verification" target="_blank">Election ECI LINK (CLICK HERE)</a>
												
												<br/><br/>
												
												
												 
                                            
                                        </div>
                                    </div>
                                </div>	
							</div>	
						</section>
					</div>
				</div>
            </div>
        </div>
<script>        
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
<?php include('userFooter.php'); ?>