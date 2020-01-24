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
												error_reporting(0);
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

							   if(isset($_POST['submit_ssdm']))
							   {

							     $target_dir = "htmlfile/";
                                        $file = $_FILES['ssdmfile']['name'];
                                        $path = pathinfo($file);
                                        $filename = $path['filename'];
                                        $ext = $path['extension'];
                                        if (strtoupper($ext)=='HTML'){
                                            $temp_name = $_FILES['ssdmfile']['tmp_name'];
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
                                            if($image->getAttribute("id") == "imguser"){
                                            //if ($input->getAttribute("class") == "img-aadhar-wrap"){
                                            $img = $image->getAttribute('src');
                                            //echo "<img src='".$img."' />";
                                            }
                                        }
                                        $imgfpath= $img;

										$_SESSION["IMGPATH"]=$imgfpath;
										foreach($DOM->getElementsByTagName('input') as $input) {
										if($input->getAttribute("id") == "txt_aadhar")
													 {
														 $txtaadhar = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_NameE")
													 {
														 $txtnm = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_Father")
													 {
														 $txtfnm = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_DOB")
													 {
														 $txtdob = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_Building")
													 {
														 $hno = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_Street")
													 {
														 $gali = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_Locality")
													 {
														 $locality = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_vtc")
													 {
														 $vtc = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_District")
													 {
														 $dist = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_State")
													 {
														 $state = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "txt_Pincode")
													 {
														 $pinc = $input->getAttribute('value');
													 }




													 if ($input->getAttribute("name") == "txt_Gender"){
                                                    $txtsex= $input->getAttribute('value');
                                                    if ($txtsex=='M'){
                                                        $txtgender='Male';
                                                    }
                                                    else{
                                                        $txtgender='Female';
                                                    }
                                                 }


                                                 $txtadd = 'C/O '.$txtfnm.', '.$hno.', '.$gali.', '.$locality.', '.$vtc.', '.$dist.', '.$state.' , '.$pinc;
                                                 $txtbuld = $hno;
                                                 $txtlocality = $gali;
                                                 $txtpincode = $pinc;
                                                            $txtpost = $vtc;
                                                             $txtdistrict = $dist;
                                                           $txtstate = $state;

										}

							   }
							   }

							   if(isset($_POST['E_aadhar']))
							   {
								   $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                                    $r = mysqli_query($connection,$q);
                                    $rw = mysqli_fetch_assoc($r);
								   $v = $_POST['check'];
                                   $f = str_replace('"','',$v);
                                   $fval = explode('|',$f);
								   $_SESSION["IMGPATH"] = 'data:image;base64,'.$fval[14];
								   if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
							   }
							   }
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
                                    } elseif ($_FILES['imagefile']['name']=="" and $_POST['sfile'] == 'mptass'){
                                        $msgno = 'Please Select MPTASS Files  .... ';
                                    ?>

                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
                                        }, 2000);
                                        </script>
                                    <?php
                                    } elseif ($_FILES['rajsthanfile']['name']=="" and $_POST['sfile'] == 'rajsthan'){
                                        $msgno = 'Please Select SSO RAJASTHAN FIle .... ';
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
                                        if($_FILES['imagefile']['name'] != '')
										{
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
                                        $imgpth='https://www.tribal.mp.gov.in/mptaas/userphoto/';

                                       // $aaaa = str_replace("./MPTAAS_files/","",$img);
                                       // $aaaa = str_replace("./MPTAAS235_files/","",$aaaa);
                                       // $aaaa = str_replace("./AJTASK_files/","",$aaaa);

                                       // $ip = "./MPTAASJITENDRA_files/64574856046220196410271135228703.jpg"; // some IP address
                                        $iparr = explode ("/", $img);
                                        $aaaa =  $iparr[2];

                                        $imgfpath=$imgpth.$aaaa;
                                        $_SESSION["IMGPATH"]=$imgfpath;
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
                                       $txtadd='S/O ';
                                    } else {
                                        $txtadd='S/O ';
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
                                 else if($_FILES['rajsthanfile']['name'] != '')
                                       {
										    $target_dir = "htmlfile/";
                                        $file = $_FILES['rajsthanfile']['name'];
                                        $path = pathinfo($file);
                                        $filename = $path['filename'];
                                        $ext = $path['extension'];
                                        if (strtoupper($ext)=='HTML'){
                                            $temp_name = $_FILES['rajsthanfile']['tmp_name'];
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
                                            if($image->getAttribute("class") == "profileIconSmall"){
                                            //if ($input->getAttribute("class") == "img-aadhar-wrap"){
                                            $img = $image->getAttribute('src');
                                            //echo "<img src='".$img."' />";
                                            }
                                        }


										$selects = $DOM->getElementsByTagName('select');
                                        foreach($selects as $image){
                                            if($image->getAttribute("id") == "cpBody_ddlState"){
                                            //if ($input->getAttribute("class") == "img-aadhar-wrap"){
                                            $optionTags = $image->getElementsByTagName('option');
for ($i = 0; $i < $optionTags->length; $i++ ) {
 if ($optionTags->item($i)->hasAttribute('selected')
           && $optionTags->item($i)->getAttribute('selected') === "selected") {
     $num = $optionTags->item($i)->nodeValue;
 }
}
                                            //echo "<img src='".$img."' />";
                                            }
                                        }



										$imgfpath= $img;
										$_SESSION["IMGPATH"]=$imgfpath;





										foreach($DOM->getElementsByTagName('input') as $input) {
                                         // if($input->getAttribute("name") == "name"){

                                            //if(preg_match('/[^ ]+/',$input->getAttribute('value'),$match)){
                                                if ($input->getAttribute("id") == "cpBody_txt_Data_UserName"){
                                                   $txtnm= $input->getAttribute('value');
												   $txtnm = strtolower($txtnm);
                                                }
												if ($input->getAttribute("id") == "cpBody_txt_UID"){
                                                   $aadharno = $input->getAttribute('placeholder');

                                                }

                                                 if ($input->getAttribute("id") == "cpBody_txt_DOB"){
                                                    $txtdob= $input->getAttribute('value');

                                                 }

												 if($input->getAttribute("id") == "cpBody_txt_nicCity")
													 {
														 $txtcity = $input->getAttribute('value');
													 }

													 if($input->getAttribute("id") == "cpBody_txt_postalcode")
													 {
														 $txtpin = $input->getAttribute('value');
													 }




												 if ($input->getAttribute("id") == "cpBody_txt_postalAddress"){


                                                    $txtadd= $input->getAttribute('value');
                                                    $ex = explode(',',$txtadd);
                                                      $txtbuld = $ex[1];
                                                         $txtlocality = $ex[2];
                                                         $txtpost = $ex[5];
													$ex = explode('C/O ',$ex[0]);
													$txtfnm = $ex[1];
                                                 }

                                                 if ($input->getAttribute("id") == "cpBody_rbtnListGender_0" and $input->getAttribute("checked") == "checked"){
                                                    $txtgender= $input->getAttribute('value');

                                                 }
												 if ($input->getAttribute("id") == "cpBody_rbtnListGender_1" and $input->getAttribute("checked") == "checked"){
                                                    $txtgender= $input->getAttribute('value');

                                                 }
												 if ($input->getAttribute("id") == "cpBody_rbtnListGender_2" and $input->getAttribute("checked") == "checked"){
                                                    $txtgender= $input->getAttribute('value');

                                                 }
												 if ($input->getAttribute("id") == "cpBody_rbtnListGender_3" and $input->getAttribute("checked") == "checked"){
                                                    $txtgender= $input->getAttribute('value');

                                                 }

                                                 }

												 $txtadd = $txtadd.','.ucwords(strtolower($txtcity)).','.ucwords(strtolower($num)).','.$txtpin;

                                                 $txtpincode = $txtpin;

                                                             $txtdistrict = $txtcity;
                                                           $txtstate = $num;
                                       }

                                    }


                            }
										}
                            ?>


                            <?php
                              if(isset($_POST['savedata'])) {




                               $aadharno = trim($_POST['aadharno']);
                               $name = trim($_POST['name']);
                              // echo $name;
							  $q = "";
                                    $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
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


                               if ($aadharno=="") {
                                   $msgno = 'Please Enter Aadhar Card No .... ';
                               }
							 else   if ($rw['aadharpoint']>$rw['walletamount']){
                                        $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                                        ?>
                                        <script>
                                        setTimeout(function () {
                                        window.location.href= 'aadharauto.php';
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
                                   $b = mysqli_fetch_array($aadharno);
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

                                    $query='';
                                    $query = "INSERT INTO `aadharauto`
                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,
                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`, `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`) 
                                    VALUES ('".trim($aadharno)."','".trim($adhrno)."','".$name."','".$fathername."','".$dobadhar."','".$gender."',N'".$genderlocal."',
                                    '".$address."','".$language."',N'".$namelocal."',N'".$localaddress."','".$_SESSION["IMGPATH"]."',N'".$birthtithilocal."',N'".$patalocal."','".$houseno."','".$street."','".$vtcandpost."','".$dist."','".$statename."','".$pincode."','".$srno."','".$_SESSION['userid']."',now())";
                                       $result = mysqli_query($connection, $query);
                                       //$msg = "Please Wait Aadhar Priveiw just a second...";
									   $last_id = mysqli_insert_id($connection);
                                       $_SESSION["IMGPATH"]='';
                                       $_SESSION["AADHAARNO"]=trim($aadharno);

                                   $a = mysqli_query($connection,"SELECT * FROM tbluser Where userid = ".$_SESSION['userid']."");
					$b = mysqli_fetch_array($a);
						date_default_timezone_set('Asia/Kolkata');
$timestamp = date("Y-m-d H:i:s");
$data_m = $_SERVER;
	mysqli_query($connection,"insert into log_manage(`userid`,`name`,`email`,`mobile`,`useragent`,`message`,`ipaddress`,`datetime`)values(".$b['userid'].",'".$b['loginname']."','".$b['emailid']."','".$b['mobileno']."','".$data_m['HTTP_USER_AGENT']."','Aadhar Create!!','".$data_m['REMOTE_ADDR']."','".$timestamp."')");


                                    /// end insert
                                    /// start qr code



									if($_SESSION['usertype'] != 'DEMO' and $slct['amstatus'] = 0)
									{
									$msg = "Aadhaar Card successfully wait for redirecting to payment page";
											?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		setTimeout(function(){
        window.location.href="<?php echo $slct['weburl'];?>admin/paytmauto/index.php?pay_uid=<?php echo $last_id;?>&Pay_Amt=10&status=aadharauto";
		}, 2000);
	});
        </script>
											<?php

									}
									else
									{
										$msg = "Please Wait Aadhaar Priveiw just a second...";

										mysqli_set_charset($connection,"utf8");
                                    $a = mysqli_query($connection,"SELECT * FROM aadharauto Where aadharno='".$_SESSION["AADHAARNO"]."'");
                                    $b = mysqli_fetch_array($a);

                                    $remark="";
                                    $remark= 'Aadhar No : '.$b['aadharno'].' Aadhar Name : '.$b['aadharname'] ;
                                    // strat less point
                                    //  Dr amount start
									$getpoint = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
                                    $qu = "";
                                    $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                                    VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$getpoint['aadharpoint']."','Dr','0','Aadhaar Create','".$remark."','".$_SESSION['userid']."',now())";
                                    $a1q=mysqli_query($connection,$qu);
                                    //  Dr amount end
                                   // end point


                                   //echo $b['wamt'];
									// start led wallet

                                    $sql="";
									$sql = "update tbluser SET walletamount= walletamount - ".$getpoint['aadharpoint']." where userid='".$_SESSION['userid']."'";
									$abs = mysqli_query($connection, $sql);

										?>
										<script>
										window.location.href='aadharlist.php';
										</script>
										<?php
									}
                                   }


                               }


                              }
                            ?>

								<?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								<form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">
									</div></div>
									<div class="col-sm-12">
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <label>Select Local Language</label>
                                                    <div class="form-group">
                                                        <select class="form-control"  name="language" id="language" required>
                                                            <option value="">SELECT</option>
                                                            <option value="HI">Hindi</option>
                                                            <option value="PA">Punjabi</option>
                                                            <option value="GU">Gujrati</option>
                                                            <option value="MR">Marathi</option>
                                                            <option value="TA">Tamil</option>
                                                            <option value="KN">Kannada</option>
                                                            <option value="BN">Bengali</option>
                                                            <option value="TE">Telugu</option>
                                                            <option value="UR">Urdu</option>
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




									<div class="row dgnform">
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Aadhar Card No.</label>
                                                        <div class="form-group">
                                                            <input class="form-control " maxlength="12" id="aadharno" name="aadharno" type="text"  value="<?php  echo $fval[15]; echo $txtaadhar; ?>" onkeypress="return isNumber(event)">
                                                            <span id="erroraadharno" class="error"></span>


                                                    </div>

															</div>
													<?php
													$address = str_replace(','.$fval[10],'',$fval[6]);
													?>
                                                    <div class="col-sm-6">
                                                        <label>Address  </label>
                                                        <div class="form-group">
                                                             <input type="hidden" id="txtSources"/>
                                                            <textarea class="form-control" style="height:55px" id="txtSource" name="address" rows="10" type="text" required ><?php $ads = str_replace(',',', ',$txtadd);
                                                            if($fval[10] != '')
                                                            {
                                                            echo $adver = str_replace(',',', ',$address).', '.$fval[9].', '.$fval[8].', '.$fval[7].' - '.$fval[10];
                                                            }

                                                            function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}
echo str_lreplace(', ',' - ',$ads);
?></textarea>
                                                            <span id="errortxtSource" class="error"></span>


													</div>
                                        </div>


                                                <div class="col-sm-6">
                                                    <label>Address (Local Language)  </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="txtTarget"   style="height:55px" name="addresslocal" rows="10" type="text" ></textarea>
                                                        <span id="errortxtTarget" class="error"></span>



                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Name</label>
                                                        <div class="form-group">
                                                            <input class="form-control "  id="name" name="name"  type="text" readonly onfocus="this.removeAttribute('readonly');"  value="<?php echo ucwords($txtnm); echo ucwords($fval[1]); ?>">



                                                        </div>
                                                    </div>


													<div class="col-sm-6">
                                                    <label>Name (Local Language) </label>
                                                    <div class="form-group">
                                                        <input class="form-control" readonly onfocus="this.removeAttribute('readonly');" id="name_regional"  name="namelocal" type="text" required value="">
                                                        <span id="errorname_regional" class="error"></span>


                                                    </div>
                                                </div>

                                                    <div class="col-sm-4">
                                                        <label hidden>Father Name </label>
                                                        <div class="form-group">
                                                            <input hidden class="form-control  "name="fathername" id="fname" type="text"   value="<?php echo $txtfnm; ?>">

                                                        </div>
                                                    </div>
                                                </div>


												<div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input class="form-control " name="dobadhar" id="dobid"  type="text" readonly onfocus="this.removeAttribute('readonly');" value="<?php echo $txtdob; echo $fval[12];?>">



                                                            <input class="form-control " name="houseno"  type="hidden" value="<?php echo $txtbuld; ?>">
                                                            <input class="form-control " name="street"  type="hidden" value="<?php echo $txtlocality; ?>">
                                                            <input class="form-control " name="pincode"  type="hidden" value="<?php echo $txtpincode; ?>">
                                                            <input class="form-control " name="vtcandpost"  type="hidden" value="<?php echo $txtpost; ?>">
                                                            <input class="form-control " name="dist"  type="hidden" value="<?php echo $txtdistrict; ?>">
                                                            <input class="form-control " name="statename"  type="hidden" value="<?php echo $txtstate; ?>">

                                                        </div>
                                                    </div>
													<div class="col-sm-6">
													<label>Date Of Birth Local</label>
													<input class="form-control " readonly onfocus="this.removeAttribute('readonly');" id="birthtithilocal" name="birthtithilocal"  type="text" value="">

														</div>


													<div class="col-sm-6">
                                                        <label>Gender </label>
                                                        <div class="form-group">
                                                            <input class="form-control " id="gender" name="gender"  type="text" readonly onfocus="this.removeAttribute('readonly');" readonly value="<?php echo   $txtgender; echo $fval[4]; ?> ">



                                                            <input class="form-control " id="birthtithi" name="birthtithi" readonly="readonly" type="hidden" value="Birth Tithi">

                                                            <input class="form-control " id="pata" name="pata" readonly="readonly" type="hidden" value="address">
                                                            <input class="form-control " id="patalocal" name="patalocal" readonly="readonly" type="hidden" value="">
                                                        </div>
                                                    </div>
													<div class="col-sm-6">
													<label>Gender Local</label>
													<input class="form-control " readonly id="genderlocal" readonly onfocus="this.removeAttribute('readonly');" name="genderlocal"   type="text" value="">

													</div>



                                                </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Image  </label>
                                            <div class="form-group">
                                                 <img src="<?php echo $imgfpath; if($fval[14] != ''){echo 'data:image;base64,'.$fval[14]; }?>" width="130" height="150" >

                                                    </div>
                                                    <br>



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
        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
			function validation() {

				var aadharno = document.getElementById('//aadharno').value;
				if ( aadharno.length < 12 ) {
					 document.getElementById('erroraadharno').innerHTML = " **Please Enter 12 Digit Aadhaar Card Number !!!";
					 document.getElementById('aadharno').style.border = "1px solid red";
					 document.getElementById('aadharno').focus();
					 return false;
				}

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

		$('#language').on('change',function()
		{

		    if($(this).val() != '' &&  $(this).val() == 'OR')
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
		function setaddress(){
	var fathername = document.getElementById('fname').value;
   var addres =  document.getElementById('txtSource').value;
  document.getElementById('txtSources').value = "S/O : " + fathername + "," + "<?php echo $adver; ?>" ;
	document.getElementById('txtSource').innerHTML = document.getElementById('txtSources').value;
}
//Words and Characters Count
</script>

<?php include('userFooter.php'); ?>
