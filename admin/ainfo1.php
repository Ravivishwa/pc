<?php include('userHeader.php'); ?>



      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Aadhaar Card Details</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						
						<!------------------------------ # connection ------------------------------->
						<?php
												
												include("config.php");

												
												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>
									
								
						<!------------------------------ # connection ------------------------------->
						
						
						
						
						<section id="main-content">
							<div class="row">
							<?php 
							if(isset($_POST['maindata']))
							{
								   $q = "";
                                    $q = "SELECT * FROM user_data where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
									
								  
                                   $f = str_replace('"','',$_POST['maindata']);
                                   $fval = explode('|',$f);
								   $_SESSION["IMGPATH"] = 'data:image;base64,'.$fval[14];
								   
								   if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'ainfo.php';
                                        }, 2000);
                                        </script>
							
								

                            <?php
								   }
							}								   
                              if(isset($_POST['savedata'])) {	
                             
                               $aadharno = trim($_POST['aadharno']);
                               $name = trim($_POST['name']);
                              // echo $name;
							  $q = "";
                                    $q = "SELECT * FROM user_data where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
                               $fathername = trim($_POST['fathername']);
                               $dobadhar = trim($_POST['dobadhar']);
                               $birthtithilocal = trim($_POST['birthtithilocal']);
                               $gender  = strtoupper(trim($_POST['gender']));
                               $genderlocal = trim($_POST['genderlocal']);
                               $address = trim($_POST['address']);
                               $language = trim($_POST['language']);
                               $namelocal = trim($_POST['namelocal']);
                               $localaddress = trim($_POST['addresslocal']);
                               $patalocal = trim($_POST['patalocal']);
                               $houseno = trim($_POST['houseno']);
                               $street = trim($_POST['street']);
                               $pincode = trim($_POST['pincode']);
                               $vtcandpost = trim($_POST['vtcandpost']);
                               $dist = trim($_POST['dist']);
                               $statename = trim($_POST['statename']);
                                                          
                               $idata = $_POST['imgdata'];
                               if ($aadharno=="") {
                                   $msgno = 'Please Enter Aadhar Card No .... ';
                               } 
							 else   if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'ainfo.php';
                                        }, 2000);
                                        </script>
                                    <?php
							 }
                               elseif ($name=="") {
                                $msgno = 'Please Enter Name  .... ';
                               }
                               
                               elseif ($dobadhar=="") {
                                $msgno = 'Please Enter Date of Birth  .... ';
                               }
                               elseif ($gender=="") {
                                $msgno = 'Please Enter Gender  .... ';
                               }
                               elseif ($address=="") {
                                $msgno = 'Please Enter Address  .... ';
                               }
                               elseif ($language=="") {
                                $msgno = 'Please Enter Local Language  .... ';
                               }
                               elseif ($namelocal=="") {
                                $msgno = 'Please Enter Name in Local Language  .... ';
                               } 
                               elseif ($localaddress=="") {
                                $msgno = 'Please Enter Address in Local Language  .... ';
                               } 
                               else { 
                                   $a = mysqli_query($connection,"SELECT aadharno FROM aadharauto Where aadharno='".$aadharno."'");
                                   $b = mysqli_fetch_array($a);
                                   if($b['aadharno']==$aadharno){
                                       $msgno = 'This Aadhar Card No Already Exist .... ';
                                   } else {
                                    $st='';
                                    $nd='';
                                    $rd='';
                                    $adhrno='';
                                     $st=substr($aadharno, 0, 4);
                                     $nd=substr($aadharno, 4, 4);
                                     $rd=substr($aadharno, 8, 4);
                                     $adhrno=$st.' '.$nd.' '.$rd;
                                     //echo $imgfpath;
                                     $sex='';
                                     if ($gender=='Male'){
                                        $sex='M'; 
                                     } 
                                     else {
                                        $sex='F';
                                     }
                                    /// insert value


                                    $resultm = mysqli_query($connection,"SELECT srno FROM aadharauto ORDER BY srno DESC LIMIT 1");
					                $num_rows = mysqli_fetch_array($resultm);
					                $srno = $num_rows['srno']+1;
                                  date_default_timezone_set('Asia/Kolkata');
								  $timestamp = date("Y-m-d H:i:s");
                                    $query='';
                                    $query = "INSERT INTO `aadharauto`
                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,
                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`, `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`) 
                                    VALUES ('".trim($aadharno)."','".trim($adhrno)."','".$name."','".$fathername."','".$dobadhar."','".$gender."',N'".$genderlocal."',
                                    '".$address."','".$language."',N'".$namelocal."',N'".$localaddress."','".$idata."',N'".$birthtithilocal."',N'".$patalocal."','".$houseno."','".$street."','".$vtcandpost."','".$dist."','".$statename."','".$pincodes."','".$srno."','".$_SESSION['userid']."','".$timestamp."')";
                                       $result = mysqli_query($connection, $query);
                                       $msg = "Please Wait Aadhar Priveiw just a second...";
                                       $_SESSION["IMGPATH"]='';
                                       $_SESSION["AADHAARNO"]=trim($aadharno);

                                   

                                    /// end insert
                                    /// start qr code

                                    mysqli_set_charset($connection,"utf8");
                                    $a = mysqli_query($connection,"SELECT * FROM aadharauto Where aadharno='".$_SESSION["AADHAARNO"]."'");
                                    $b = mysqli_fetch_array($a);

                                    $remark="";
                                    $remark= 'Aadhar No : '.$b['aadharno'].' Aadhar Name : '.$b['aadharname'] ;
                                    // strat less point
                                    //  Dr amount start
									$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from user_data where userid=".$_SESSION['userid'].""));
                                    $qu = "";
                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Aadhaar Create','".$remark."','".$_SESSION['userid']."',now())";
                                    $a1q=mysqli_query($connection,$qu);
                                    $a = mysqli_query($connection,"SELECT * FROM user_data Where userid = ".$_SESSION['userid']."");
					$b = mysqli_fetch_array($a);
						date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$data_m = $_SERVER;
	mysqli_query($connection,"insert into log_manage(`userid`,`name`,`email`,`mobile`,`useragent`,`message`,`ipaddress`,`datetime`,`zipcode`)values(".$b['userid'].",'".$b['loginname']."','".$b['emailid']."','".$b['mobileno']."','".$data_m['HTTP_USER_AGENT']."','Aadhar Create!!','".$ip."','".$timestamp."','".$pincodes."')");

                                    //  Dr amount end
                                   // end point


                                   //echo $b['wamt'];
									// start led wallet

                                    $sql="";
									$sql = "update user_data SET walletamount= walletamount - ".$getpoint['aadharpoint']." where userid='".$_SESSION['userid']."'";
									$abs = mysqli_query($connection, $sql);
									
									
									


                                   }
                                   
                                   ?>
                                   <script>
                                   setTimeout(function () {
                                      window.location.href= 'aadharlist.php';
                                   }, 2000);
                                   </script>
                                   <?php
                               }

                              }
                            ?>
								<?php 
								if(isset($_POST['biodata']))
								{
						$_SESSION['aadhar'] = $_POST['aadhar'];	
						
								    $url = 'https://kiosk.pythonanywhere.com/getAdvanceAADHARDetails';
								   
$data = array(
    "advAdhNum"=>$_POST['aadhar'],
    "bioData"=>$_POST['biodata'],
    
);

$ch = curl_init( $url );
# Setup request to send json via POST.
$payload = json_encode($data);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
# Return response instead of printing.
$headers = [
    'Cookie: session=.eJwlj81qAzEMhF9l8TkU2bL8s7fe-wYlBEuWN6GbDayzhxLy7jX0NJLgmxm9zKWtpV-1m_n7ZabnEHPX3sui5mS-HsuidbptUz9Exrkd6_r7Yc7v82mQu_armVtZu471Vs1sVGwKOTmMzjGBsIbI3jNHAm4RQ0RACYRgh_gYlTJDwEKJiZktWz8GwWYtNGLgElPOCFLqQEVJiABTlZrRDyNnC41QH1tzscooLX1vl-fjR7fRJ4EXsE0wF0dOLIbSpHj1QClW5yDEylTa4I6u-_8Tn9sBYN5_LXxTsw.XeNndg.jeBkD9U-prETS7-z2Oo1vE62fXQ',
    'User-Agent: 1',
    'Accept: application/json',
    'Connection: keep-alive',
    'Content-Type: application/json; charset=utf-8',
    'Host: kiosk.pythonanywhere.com',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$resultdata = curl_exec($ch);
curl_close($ch);
$obj = json_decode($resultdata);

$residant = $obj->Data;

$obs = json_decode($residant);
$name  = $obs->residentDetails->resName;
$fname = $obs->residentDetails->guardianName;
$dob = str_replace('-','/',$obs->residentDetails->dob);
$street = $obs->residentDetails->street;
$pincode = $obs->residentDetails->pincode;
$building = $obs->residentDetails->building;
$country = $obs->residentDetails->country;
$district = $obs->residentDetails->district;
$gender = $obs->residentDetails->gender;

if($gender == 'M')
{
    $gender = 'Male';
}
else 
{
    $gender = 'Female';
}
$rtype = $obs->residentDetails->guardianRelationType;
$photo = $obs->residentDetails->residentPhoto;
$state = $obs->residentDetails->state;
$vtc = $obs->residentDetails->vtc;
$txtadds = $rtype.': '.$fname.', '.$building.', '.$street.', '.$vtc.', '.$district.', '.$state.' - '.$pincode;
								}
								?>
								<?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									
									<div class="row">
                                                <div class="col-sm-3">
                                                    <label>Select Local Language</label>
                                                    <div class="form-group">
                                                        <select class="form-control"   name="language" id="language" required>
                                                            <option value="">SELECT</option>
                                                            <option value="HI">Hindi</option>
                                                            <option value="PA">Punjabi</option>
                                                            <option value="GU">Gujrati</option>
                                                            <option value="MR">Marathi</option>
                                                            <option value="TA">Tamil</option>
                                                            <option value="KN">Kannada</option>
                                                            <option value="BN">Bengali</option>
                                                            <option value="TE">Telugu</option>
                                                             <option value="OR">Oriya</option>
                                                            <option value="SD">Sindhi</option>
                                                        </select>   
                                                        <span id="errorlanguage" class="error"></span>
                                                    </div></div>
													
													<div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <button type="submit" name="savedata" class="btn btn-success btn-block">Submit</button> 
                                                </div></div>
												
												<div class="col-sm-3">
                                                <label>&nbsp;</label>
                                                <div class="form-group">              
                                                <a href="https://www.google.com/intl/sa/inputtools/try/" target="_blank" type="button" name="button" class="btn btn-primary float: right  btn-block ">Open Google Input Tools</a> 
                                                </div></div>
													
									<div class="row dgnform">
									
                                        <div class="col-sm-9">
                                                <div class="row">
												
												<div class="col-sm-5">
                                                        <label>Address  </label>
                                                        <div class="form-group">
													
                                                            <textarea class="form-control" style="height:55px" id="txtSource" name="address" rows="10" type="text" required ><?php echo $txtadds; ?></textarea>
                                                            <span id="errortxtSource" class="error"></span>
                                                        </div>
                                                    </div>
												  <div class="col-sm-5">
                                                    <label>Address (Local Language)  </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="txtTarget"   style="height:55px" name="addresslocal" rows="10" type="text" ></textarea>
                                                        <span id="errortxtTarget" class="error"></span>
                                                    </div>
                                                </div>
												
                                                    <div class="col-sm-10">
                                                        <label>Aadhar Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " maxlength="12" readonly id="aadharno" name="aadharno" type="text"  value="<?php echo $_SESSION['aadhar'];?>">
                                                            <span id="erroraadharno" class="error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control " id="name" name="name" readonly  type="text"  value="<?php  echo $name; ?>">
                                                        </div>
                                                    </div>
													
													<div class="col-sm-5">
                                                    <label>Name (Local Language) </label>
                                                    <div class="form-group">
                                                        <input class="form-control" id="name_regional"  name="namelocal" type="text" required value="">
                                                        <span id="errorname_regional" class="error"></span>
                                                    </div>
                                                </div>
                                                    <div class="col-sm-5" style="display:none;">
                                                        <label>Father Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control "name="fathername" readonly type="text"  value="<?php echo $fname; ?>" style="display:none;">
                                                        </div>
                                                    </div></div>
                                                
											
                                                 
												<div class="row">
                                                    <div class="col-sm-5">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
														<?php $fso = explode(',',$fval[6]); ?>
                                                            <input class="form-control " name="dobadhar"  type="text" readonly value="<?php  echo $dob;?>">
                                                            <input class="form-control " name="houseno"  type="hidden" value="<?php echo $building; ?>">
                                                            <input class="form-control " name="street"  type="hidden" value="<?php echo $street ?>">
                                                            <input class="form-control " name="pincode"  type="hidden" value="<?php echo $pincode; ?>">
                                                            <input class="form-control " name="vtcandpost"  type="hidden" value="<?php echo $vtc; ?>">
                                                            <input class="form-control " name="dist"  type="hidden" value="<?php echo $district; ?>">
                                                            <input class="form-control " name="statename"  type="hidden" value="<?php echo $state; ?>">
                                                            
                                                        </div>
                                                    </div>
													<div class="col-sm-5">
													<label>Date Of Birth Local</label>
													<input class="form-control " id="birthtithilocal" name="birthtithilocal"  type="text" value="">
                                                    </div>
													
													
													<div class="col-sm-5">
                                                        <label>Gender </label>
                                                        <div class="form-group">
                                                            <input class="form-control " id="gender" name="gender"  type="text" readonly value="<?php  echo $gender; ?> ">
                                                            
                                                            <input class="form-control " id="birthtithi" name="birthtithi" readonly="readonly" type="hidden" value="Birth Tithi">
                                                            
                                                            <input class="form-control " id="pata" name="pata" readonly="readonly" type="hidden" value="address">
                                                            <input class="form-control " id="patalocal" name="patalocal" readonly="readonly" type="hidden" value="">
                                                        </div>
                                                    </div>
													<div class="col-sm-5">
													<label>Gender Local</label>
													<input class="form-control " id="genderlocal" name="genderlocal"   type="text" value="">
													</div>
                                                    
                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Image  </label>
                                            <div class="form-group">
                                                 <img src="<?php echo 'data:image;base64,'.$photo; ?>" width="130" height="150" >
<input type="hidden" value="<?php  echo 'data:image;base64,'.$photo; ?>" name="imgdata"/>
                                            </div>
                                        </div>
                                        
                                               
                                               
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
				
				
                var txtSource = document.getElementById('txtSource').value;
				if ( txtSource.trim() =="" ) {
					 document.getElementById('errortxtSource').innerHTML = " **Please Enter Address !!!";
					 document.getElementById('txtSource').style.border = "1px solid red";
					 document.getElementById('txtSource').focus();
					 return false;
                }
                
                var name_regional = document.getElementById('name_regional').value;
				if ( name_regional.trim() =="" ) {
					 document.getElementById('errorname_regional').innerHTML = " **Please Enter Name in Local Language !!!";
					 document.getElementById('name_regional').style.border = "1px solid red";
					 document.getElementById('name_regional').focus();
					 return false;
				}

                var txtTarget = document.getElementById('txtTarget').value;
				if ( txtTarget.trim() =="" ) {
					 document.getElementById('errortxtTarget').innerHTML = " **Please Enter Local Language Address !!!";
					 document.getElementById('txtTarget').style.border = "1px solid red";
					 document.getElementById('txtTarget').focus();
					 return false;
				}
				
			}
			
			$('#language').on('change',function()
		{
		    
		    if($(this).val() != '' && $(this).val() == 'OR')
		    {
		var langs = $(this).val();
		var lang = langs.toLowerCase();
                  var name = $("#name").val();
                  var address = $("#txtSource").val();
                  
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:name,address:address}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='namelocal']").val(json.name.replace(/"/g,''));
                      $("[name='addresslocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  var dob = $("#birthtithi").val();
                  var gender = $("#gender").val();
                 
                  $.post("https://xknfdjdjfktit3kktied3rifcdddsrtwq89764dspt4krktgoe48kjdjbds.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='birthtithilocal']").val(json.name.replace(/"/g,''));
                      $("[name='genderlocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  
                  
                  
		    }
		    else 
		    {
		     changelang();   
		    }
                  
		});

        </script>
	         
<script type="text/javascript">
//English to hindi translate code
    function changelang() {
            var lang = document.getElementById("language").value;
            //alert(lang);
            var url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#txtSource").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                  //alert(result);
				  $("#txtTarget").val(result);
					
			    }
            });	

            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#name").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#name_regional").val(result);
					
			    }
            });	

            
            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#gender").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#genderlocal").val(result);
					
			    }
            });

            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#birthtithi").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#birthtithilocal").val(result);
					
			    }
            });


            url = 
			"https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape($("#pata").val());
		    //alert(url);
		   $.get(url, function (data, status) {
			 var result= '';
			  for(var i=0; i<=500; i++)
			    {
			      result += data[0][i][0];
                 // alert(result);
				  $("#patalocal").val(result);
					
			    }
            });

		};	
//Words and Characters Count	
</script>
<style>
    .content-wrap {
    margin-left: 268px !important;
    }
</style>
<?php include('userFooter.php'); ?>