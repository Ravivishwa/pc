<?php include('userHeader.php'); ?>

       <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Pan Card Details</h1>
								</div>
							</div>
						</div>
										<!-- /# row -->
						<section id="main-content">
							<div class="row">
							   <?php
                               if(isset($_POST['submit'])) {	
                                    $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                    
                                    if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } elseif ($_FILES['imagefile']['name']==""){
                                        $msgno = 'Please Select MPTASS Files  .... ';
                                    ?>
                                    
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } 
                                    
                                    else {
                                        //$ch=curl_init();
                                        //curl_setopt($ch,CURLOPT_URL,'htmlfile/MPTAAS1234.html');
                                        //curl_setopt($ch,CURLOPT_POST,false);
                                        //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                                        //$html=curl_exec($ch);
                                        //curl_close($ch);

                                        $target_dir = "htmlfile/";
                                        $file = $_FILES['imagefile']['name'];
                                        $path = pathinfo($file);
                                        $filename = $path['filename'];
                                        $ext = $path['extension'];
                                        if (strtoupper($ext)=='HTML'){
                                            $temp_name = $_FILES['imagefile']['tmp_name'];
                                            $path_filename_ext = $target_dir.$filename.".".$ext;
                                        
                                            // Check if file already exists
                                            if (file_exists($path_filename_ext)) {
                                                //$msgno= "Sorry, file already exists.";
                                                unlink ($path_filename_ext);
                                                move_uploaded_file($temp_name,$path_filename_ext);
                                                //$msg= "Congratulations! File Uploaded Successfully.";
                                            } else {
                                                unlink ($path_filename_ext);
                                                move_uploaded_file($temp_name,$path_filename_ext);
                                                //$msg= "Congratulations! File Uploaded Successfully.";
                                            }
                                            
                                        $html=file_get_contents($path_filename_ext);
                                        unlink ($path_filename_ext);
                                        $DOM = new DOMDocument();
                                        libxml_use_internal_errors(true);
                                        $DOM -> loadHTML($html);
                                        $images = $DOM->getElementsByTagName('img');
                                        foreach($images as $image){
                                            if($image->getAttribute("class") == "img-aadhar-wrap"){
                                            //if ($input->getAttribute("class") == "img-aadhar-wrap"){
                                            $img = $image->getAttribute('src');
                                            //echo "<img src='".$img."' />";
                                            }
                                        }
                                        $imgpth='aadhar/imgmanualaadhaar/';
                                    
                                       // $aaaa = str_replace("./MPTAAS_files/","",$img);
                                       // $aaaa = str_replace("./MPTAAS235_files/","",$aaaa);
                                       // $aaaa = str_replace("./AJTASK_files/","",$aaaa);
                                        
                                       // $ip = "./MPTAASJITENDRA_files/64574856046220196410271135228703.jpg"; // some IP address
                                        $iparr = explode ("/", $img); 
                                        $aaaa =  $iparr[2];
                                       
                                        $imgfpath=$imgpth;
                                        $_SESSION["IMGPATH"]=$imgfpath;
										?>
										<script>
										alert('<?php echo $imgfpath; ?>');
										</script>
										<?php
                                        $aaaa = str_replace(".jpg","",$aaaa);
                                       // $st=substr($aaaa, 0, 4);
                                       // $nd=substr($aaaa, 4, 4);
                                       // $rd=substr($aaaa, 8, 4);
                                       // $aadharno=$st.' '.$nd.' '.$rd;
                                       $aadharno=substr($aaaa, 0, 12);
                                        //echo "<br />";
                                        $count=0;
                                        foreach($DOM->getElementsByTagName('input') as $input) {
                                         // if($input->getAttribute("name") == "name"){
                                            
                                            //if(preg_match('/[^ ]+/',$input->getAttribute('value'),$match)){
                                                if ($input->getAttribute("name") == "name"){
                                                   $txtnm= $input->getAttribute('value');
                                                }
                                                if ($input->getAttribute("name") == "fathername"){
                                                    $txtfnm= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "dobadhar"){
                                                    $txtdob= $input->getAttribute('value');
                                                    $txtdob = str_replace("-","/",$txtdob);
                                                 }
                                                 if ($input->getAttribute("name") == "gender"){
                                                    $txtsex= $input->getAttribute('value');
                                                    if ($txtsex=='M'){
                                                        $txtgender='Male';
                                                    }
                                                    else{
                                                        $txtgender='Female'; 
                                                    }
                                                 }
                                                 if ($input->getAttribute("name") == "building"){
                                                    $txtbuld= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "gali"){
                                                    $txtgali= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "locality"){
                                                    $txtlocality= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "vtc"){
                                                    $txtpost= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "district"){
                                                    $txtdistrict= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "state"){
                                                    $txtstate= $input->getAttribute('value');
                                                 }
                                                 if ($input->getAttribute("name") == "pincode"){
                                                    $txtpincode= $input->getAttribute('value');
                                                 }
                                                
                                           // }

                                        }   

                                    } 
                                    if (trim($txtbuld)==""){
                                        $txtadd='S/O '.$txtfnm.','.$txtgali.' '.$txtlocality.' '.$txtpost.', '.$txtdistrict.', '.$txtstate.', '.$txtpincode;
                                    } else {
                                        $txtadd='S/O '.$txtfnm.','.$txtbuld.' '.$txtgali.' '.$txtlocality.' '.$txtpost.', '.$txtdistrict.', '.$txtstate.', '.$txtpincode;
                                    }
                                   
                                    
                                    if (trim($txtnm)==""){
                                    $msgno = 'Please Select Proper MPTASS File  .... ';
                                    ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } 

                                    } 

                               
                            }
                            ?>


                            <?php 
                              if(isset($_POST['savedata'])) {	
                             
							  $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                                
                              $gender = trim($_POST['gender']);
                             
									
                               $aadharno = trim($_POST['pannumber']);
                               $name = trim($_POST['name']);
                               
                               $fathername = trim($_POST['fathername']);
                               $dobadhar = trim($_POST['dobadhar']);
                               
							   $file = $_FILES['imagefile']['name'];
							   $target_dir = "uploads/";
                               $target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
							   
							   $signfile = $_FILES['signfile']['name'];
							   $sign_dir = "uploads/";
                               $sign_file = $sign_dir . basename($_FILES["signfile"]["name"]);
							   
                               
                                                          
                               
                                if ($aadharno=="") {
                                   $msgno = 'Please Enter Pan Card No .... ';
                               }
else if ($rw['aadharpoint'] > $rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'panmanual.php';
                                        }, 2000);
                                        </script>
                                    <?php	
}									
                               elseif ($name=="") {
                                $msgno = 'Please Enter Name  .... ';
                               }
                               elseif ($fathername=="") {
                                $msgno = 'Please Enter Father Name  .... ';
                               }
                               elseif ($dobadhar=="") {
                                $msgno = 'Please Enter Date of Birth  .... ';
                               }
                                elseif ($gender=="") {
                                $msgno = 'Please Enter Gender  .... ';
                                }
                                
                               else { 
                                   $a = mysqli_query($connection,"SELECT aadharno FROM panauto Where panno ='".$aadharno."'");
                                   $b = mysqli_fetch_array($a);
                                   if($b['panno']==$aadharno){
                                       $msgno = 'This Ayuman Card No Already Exist .... ';
                                   } else {
                                    
                                    /// insert value
                                     //echo $imgfpath;
                                     $sex='';
                                     if ($gender=='Male'){
                                        $sex='M'; 
                                     } 
                                     else {
                                        $sex='F';
                                     }
                                    /// insert value

                                    
                                  date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
                                    $query='';
                                    $query = "insert into panauto(`userid`,`panno`,`gender`,`name`,`fathername`,`dob`,`image`,`signimage`,`create_time`)values(".$_SESSION['userid'].",'".$aadharno."','".$name."','".$fathername."','".$dobadhar."','".$target_file."','".$gender."','".$timestamp."')";
//echo    $query; 
									  $result = mysqli_query($connection, $query);
									   move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
									   move_uploaded_file($_FILES["signfile"]["tmp_name"], $sign_file);
                                       $msg = "Please Wait Ayuman Priveiw just a second...";
                                       $_SESSION["IMGPATH"]='';
                                       $_SESSION["Panno"]=trim($aadharno);

                                   

                                    /// end insert
                                    /// start qr code

                                    mysqli_set_charset($connection,"utf8");
                                    $a = mysqli_query($connection,"SELECT * FROM panauto Where panno='".$_SESSION["Panno"]."'");
                                    $b = mysqli_fetch_array($a);

                                    $remark="";
                                    $remark= 'Pan No : '.$b['panno'].' Pan Name : '.$b['name'] ;
                                    // strat less point
                                    //  Dr amount start
									$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
                                    $qu = "";
                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Pan Create','".$remark."','".$_SESSION['userid']."',now())";
                                    $a1q=mysqli_query($connection,$qu);
                                    //  Dr amount end
                                   // end point


                                   //echo $b['wamt'];
									// start led wallet
									$ledwallet=0;
									
   
                                    $sql="";
									$sql = "update tbluser SET walletamount= walletamount - ".$getpoint['aadharpoint']." where userid='".$_SESSION['userid']."'";
									$abs = mysqli_query($connection, $sql);






















                                   }
                                   
                                   ?>
                                   <script>
                                   setTimeout(function () {
                                      window.location.href= 'ayumanlist.php';
                                   }, 2000);
                                   </script>
                                   <?php
                               }

                              }
                            ?>
								
								<?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        
                                                        <label>Pan Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value=""  id="pannumber" placeholder="Entar PAN Number" autocomplete="off" name="pannumber" type="text" maxlength="12" required >
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control " value="" id="name" placeholder="Example : Raju Kumar" name="name" placeholder="Pancard Name..."   type="text" required >
															
															
															
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Father Name </label>
                                                        <div class="form-group">

                                                            <input class="form-control" name="fathername" id="fathername" placeholder="Entar Father name" Value="" type="text"  >
                                                        </div>
                                                    </div>
													
                                       <div class="col-md-4">
                                    <div class="form-group">
                                        <label>लिंग/Gender: </label>
                                        <select required="" name="gender"  class="form-control" style="width:100%;">
                                            <option value="">Gender</option>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
													
                                                </div>
												
												
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control " name="dobadhar"  type="text" value="" required placeholder="D.O.B.(dd/MM/yyyy)">
                                                            
                                                        </div>
                                                    </div>
                                                    
													<div class="col-sm-4">
                                            <label>Select Sign Image  </label>
                                            <div class="form-group">
											  <input type="file" name="signfile" class="form-control" id="signInp" />
                                              <img src=""   id="blahs" width="100px" height="100px" />
                                            </div>
                                        </div>

                                                     
                                                          
                                                        </div>
                                                    </div>
													
                                                  
                                        <div class="col-sm-3">
                                            <label>Select Image  </label>
                                            <div class="form-group">
											  <input type="file" name="imagefile" class="form-control" id="imgInp" />
                                              <img src=""   id="blah" width="100px" height="100px" />
                                            </div>
                                        </div>
										
										
										
                                        <div class="col-sm-12">
                                            
                                            
                                            <div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" class="btn btn-success btn-block">Submit</button> 
                                                </div> 
                                            </div>
                                        </div>
									</div>

                                    
								</form>
							</div>
						
						</section>
					</div>
				</div>
            </div>
        </div>


        <script type="text/javascript">
			function validation() {
				
				var aadharno = document.getElementById('pannumber').value;
				if ( aadharno.length < 10 ) {
					 document.getElementById('erroraadharno').innerHTML = " **Please Enter 10 Digit Pan Card Number !!!";
					 document.getElementById('pannumber').style.border = "1px solid red";
					 document.getElementById('pannumber').focus();
					 return false;
				}

               
                
                
				
			}
			
		
        </script>
	         
<script type="text/javascript">
//English to hindi translate code
    
//Words and Characters Count
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blah").hide();
$("#imgInp").change(function(){
    readURL(this);
	$("#blah").show();
});	


function readURLs(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahs').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#blahs").hide();
$("#signInp").change(function(){
    readURLs(this);
	$("#blahs").show();
});	
</script>




        <!-- jquery vendor -->
        
        <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->
        <script src="assets/js/lib/bootstrap.min.js"></script>

        <!-- bootstrap -->
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
     		
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		
		
		<script type="text/javascript">
		/*	jQuery(function($) {
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});*/
		</script>
		 
		
        <!-- scripit init-->

        

    </body>

</html>
<?php include('userFooter.php'); ?>





















                                 
							   

                            								
\