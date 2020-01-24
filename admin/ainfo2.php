<?php include_once 'downloader/codepitch/autoload.php'; ?>
<?php
 if(isset($_SESSION['aadhar_fetch_data']))
 {
    $fetch_data = $_SESSION['aadhar_fetch_data'];

    // var_dump($fetch_data);
    // exit;
    //var_dump($fetch_data->residentDetails);
                                      // exit;
 }
?>
<?php include ('userHeader.php'); ?>

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

            <section id="main-content">

              <div class="row">

                 <?php

   
     
                                        
                                        
                                       
                                    //   var_dump($aadhar_data);
                                        if (isset($fetch_data) && $fetch_data){

                                        
                                       // var_dump($fetch_data->residentDetails);
                                       // exit;                                        
                                         
                                        $aadharno= str_replace('-','',$fetch_data->aadhar_number);
                                        $txtnm = $fetch_data->residentDetails->resName;
                                        $txtfnm= $fetch_data->residentDetails->guardianName;
                                        $txtdob = $fetch_data->residentDetails->dob;
                                         $txtdob = str_replace("-","/",$txtdob);
                                        if($fetch_data->residentDetails->gender == "M")
                                        {
                                         $txtgender= 'Male';
                                        }
                                        else
                                        {
                                        	$txtgender= 'Female';
                                        }
                                        $txtbuld= $fetch_data->residentDetails->building;//"";
                                        $txtgali= $fetch_data->residentDetails->street.$fetch_data->residentDetails->landmark;
                                        $txtlocality= $fetch_data->residentDetails->locality;
                                        $txtpost="";
                                        $txttaluka= $fetch_data->residentDetails->vtc;
                                        $txtdistrict= $fetch_data->residentDetails->district;
                                        $txtstate=  $fetch_data->residentDetails->state;
                                        $txtpincode= $fetch_data->residentDetails->pincode;
                                        $img= 'data:image/png;base64,'.$fetch_data->residentDetails->residentPhoto;

                                        $rel = "S/O";
    
    if (strtolower($fetch_data->residentDetails->guardianRelationType) == 'husband') {
        $rel = "W/O";
    }
    $txtadd = $rel . ' ' . $txtfnm . ',' . $txtbuld . ' ' . $txtgali . ' ' . $txtlocality . ' ' . $txtpost . ', ' . $txtdistrict . ', ' . $txtstate . ', ' . $txtpincode;
                                    } 
    
    if (isset($txtnm) && trim($txtnm) == "" ) {
        $msgno = 'Unable to fetch information';
?>

                                        <script>

                                        setTimeout(function () {

                                        window.location.href= 'aaadhar-2.php';

                                        }, 3000);

                                        </script>

                                    <?php
    }
    else
    {
        if(isset($_SESSION['aadhar_fetch_data']))
        {
        $st = '';
            $nd = '';
            $rd = '';
            $adhrno = '';
            $st = substr($aadharno, 0, 4);
            $nd = substr($aadharno, 4, 4);
            $rd = substr($aadharno, 8, 4);
            $adhrno = $st . ' ' . $nd . ' ' . $rd;
            //echo $imgfpath;
            $sex = '';
            if ($gender == 'Male') {
                $sex = 'M';
            } else {
                $sex = 'F';
            }

            $genderlocal = '';
            $address = $txtadd;
            $language = 'HI';
            $namelocal = '';
            $localaddress = '';
            $_SESSION["IMGPATH"] = $img;
           $birthtithilocal = '';
          $patalocal = '';
          $houseno = $txtbuld;
          $street = $txtgali;
          $vtcandpost = $txttaluka;
          $dist = $txtdistrict;
          $statename = $txtstate;
          $pincode = $txtpincode;
          $imgcode = $img;
          $taluka = '';
            /// insert value
            $resultm = mysqli_query($connection, "SELECT srno FROM aadharautodbt ORDER BY srno DESC LIMIT 1");
            $num_rows = mysqli_fetch_array($resultm);
            $srno = $num_rows['srno'] + 1;
            $query = '';
            $query = "INSERT INTO `aadharautodbt`

                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,

                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`,

                                      `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`,`subdist`,`imgcode`) 

                                    VALUES ('" . trim($aadharno) . "','" . trim($adhrno) . "','" . $txtnm . "','" . $txtfnm . "','" . $txtdob . "','" . $txtgender . "',N'" . $genderlocal . "',

                                    '" . $address . "','" . $language . "',N'" . $namelocal . "',N'" . $localaddress . "','" . $_SESSION["IMGPATH"] . "',N'" . $birthtithilocal . "',N'" . $patalocal . "','" . $houseno . "','" . $street . "','" . $vtcandpost . "',

                                    '" . $dist . "','" . $statename . "','" . $pincode . "','" . $srno . "','" . $_SESSION['userid'] . "',now(),'" . $taluka . "','" . $imgcode . "')";
            $result = mysqli_query($connection, $query);
            if($result)
            {
                unset($_SESSION['aadhar_fetch_data']);
            }
           
            $_SESSION["IMGPATH"] = '';
            $_SESSION["AADHAARNO"] = trim($aadharno);
            /// end insert
            /// start qr code
            mysqli_set_charset($connection, "utf8");

            if($_SESSION['userid'] > 1) { 
            $a = mysqli_query($connection, "SELECT * FROM aadharautodbt Where aadharno='" . $_SESSION["AADHAARNO"] . "'");
            $b = mysqli_fetch_array($a);
            $remark = "";
            $remark = 'Aadhar No : ' . $b['aadharno'] . ' Aadhar Name : ' . $b['aadharname'];
            // strat less point
            //  Dr amount start
            $qu = "";
            $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)

                                    VALUES ('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "',now(),'" . $_SESSION['aadharpoint'] . "','Dr','0','Aadhaar Create','" . $remark . "','" . $_SESSION['userid'] . "',now())";
            $a1q = mysqli_query($connection, $qu);
            //  Dr amount end
            // end point
            //echo $b['wamt'];
            // start led wallet
            $ledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as dramt FROM tbltrans where transtype='Dr' and userid='" . $_SESSION['userid'] . "'";
            $ab = mysqli_query($connection, $sql);
            $bb = mysqli_fetch_array($ab);
            //end led wallet
            // start toled wallet
            $toledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as cramt FROM tbltrans where transtype='Cr' and userid='" . $_SESSION['userid'] . "'";
            $aba = mysqli_query($connection, $sql);
            $bba = mysqli_fetch_array($aba);
            $ledwallet = $bba['cramt'] - $bb['dramt'];
            $sql = "";
            $sql = "update tbluser SET walletamount='" . $ledwallet . "' where userid='" . $_SESSION['userid'] . "'";
            $abs = mysqli_query($connection, $sql);
        }
        }
    }

if (isset($_POST['savedata'])) {
    $aadharno = trim($_POST['aadharno']);
    $name = trim($_POST['name']);
    // echo $name;
    $fathername = trim($_POST['fathername']);
    $dobadhar = trim($_POST['dobadhar']);
    $birthtithilocal = trim($_POST['birthtithilocal']);
    $gender = trim($_POST['gender']);
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
    $taluka = trim($_POST['taluka']);
    $imgcode = trim($_POST['imgcode']);
    if ($aadharno == "") {
        $msgno = 'Please Enter Aadhar Card No .... ';
    } elseif ($name == "") {
        $msgno = 'Please Enter Name  .... ';
    } elseif ($fathername == "") {
        $msgno = 'Please Enter Father Name  .... ';
    } elseif ($dobadhar == "") {
        $msgno = 'Please Enter Date of Birth  .... ';
    } elseif ($gender == "") {
        $msgno = 'Please Enter Gender  .... ';
    } elseif ($address == "") {
        $msgno = 'Please Enter Address  .... ';
    } elseif ($language == "") {
        $msgno = 'Please Enter Local Language  .... ';
    } elseif ($namelocal == "") {
        $msgno = 'Please Enter Name in Local Language  .... ';
    } elseif ($localaddress == "") {
        $msgno = 'Please Enter Address in Local Language  .... ';
    } else {
        $a = mysqli_query($connection, "SELECT aadharno FROM aadharautodbt Where aadharno='" . $aadharno . "'");
        $b = mysqli_fetch_array($a);
        if ($b['aadharno'] == $aadharno)
         {
           // $msgno = 'This Aadhar Card No Already Exist .... ';
            codepitch_delete_data('aadharautodbt',array('aadharno'=>$aadharno));
        } 
            $st = '';
            $nd = '';
            $rd = '';
            $adhrno = '';
            $st = substr($aadharno, 0, 4);
            $nd = substr($aadharno, 4, 4);
            $rd = substr($aadharno, 8, 4);
            $adhrno = $st . ' ' . $nd . ' ' . $rd;
            //echo $imgfpath;
            $sex = '';
            if ($gender == 'Male') {
                $sex = 'M';
            } else {
                $sex = 'F';
            }
            /// insert value
            $resultm = mysqli_query($connection, "SELECT srno FROM aadharautodbt ORDER BY srno DESC LIMIT 1");
            $num_rows = mysqli_fetch_array($resultm);
            $srno = $num_rows['srno'] + 1;
            $query = '';
            $query = "INSERT INTO `aadharautodbt`

                                    ( `aadharno`, `originalaadharno`, `aadharname`, `fathername`, `dob`, `gender`, `sexinlocal`, `fulladdress`,

                                     `locallanguage`, `localname`, `localaddress`, `imagepathoriginal`, `dobinlocal`, `pata`, `houseno`, `street`, `vtcandpost`,

                                      `dist`, `statename`,`pincode`,`srno`,`userid`,`createdatetime`,`subdist`,`imgcode`) 

                                    VALUES ('" . trim($aadharno) . "','" . trim($adhrno) . "','" . $name . "','" . $fathername . "','" . $dobadhar . "','" . $gender . "',N'" . $genderlocal . "',

                                    '" . $address . "','" . $language . "',N'" . $namelocal . "',N'" . $localaddress . "','" . $_SESSION["IMGPATH"] . "',N'" . $birthtithilocal . "',N'" . $patalocal . "','" . $houseno . "','" . $street . "','" . $vtcandpost . "',

                                    '" . $dist . "','" . $statename . "','" . $pincode . "','" . $srno . "','" . $_SESSION['userid'] . "',now(),'" . $taluka . "','" . $imgcode . "')";
            $result = mysqli_query($connection, $query);
            $msg = "Please Wait Aadhar Priveiw just a second...";
            $_SESSION["IMGPATH"] = '';
            $_SESSION["AADHAARNO"] = trim($aadharno);
            /// end insert
            /// start qr code
            mysqli_set_charset($connection, "utf8");
            /*
            $a = mysqli_query($connection, "SELECT * FROM aadharautodbt Where aadharno='" . $_SESSION["AADHAARNO"] . "'");
            $b = mysqli_fetch_array($a);
            $remark = "";
            $remark = 'Aadhar No : ' . $b['aadharno'] . ' Aadhar Name : ' . $b['aadharname'];
            // strat less point
            //  Dr amount start
            $qu = "";
            $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)

                                    VALUES ('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "',now(),'" . $_SESSION['aadharpoint'] . "','Dr','0','Aadhaar Create','" . $remark . "','" . $_SESSION['userid'] . "',now())";
            $a1q = mysqli_query($connection, $qu);
            //  Dr amount end
            // end point
            //echo $b['wamt'];
            // start led wallet
            $ledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as dramt FROM tbltrans where transtype='Dr' and userid='" . $_SESSION['userid'] . "'";
            $ab = mysqli_query($connection, $sql);
            $bb = mysqli_fetch_array($ab);
            //end led wallet
            // start toled wallet
            $toledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as cramt FROM tbltrans where transtype='Cr' and userid='" . $_SESSION['userid'] . "'";
            $aba = mysqli_query($connection, $sql);
            $bba = mysqli_fetch_array($aba);
            $ledwallet = $bba['cramt'] - $bb['dramt'];
            $sql = "";
            $sql = "update tbluser SET walletamount='" . $ledwallet . "' where userid='" . $_SESSION['userid'] . "'";
            $abs = mysqli_query($connection, $sql);
            */
        
?>

                                   <script>

                                   setTimeout(function () {

                                      window.location.href= 'aadharlistdbt.php';

                                   }, 2000);

                                   </script>

                                   <?php
    }
}
?>

                

                <?php if ($msg != '') { ?>

                  <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>

                <?php
} elseif ($msgno != '') { ?>

                  <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>

                <?php
} ?>

                <form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="" style="width:100%">

                 <div class="row dgnform">
                                    
                                        <div class="col-sm-9">
                                                <div class="row">
                                                    
                                                    <div class="col-sm-10">
                                                        <label>EnrollMent No.</label>
                                                        <div class="form-group">
                                                            <input class="mng_cp form-control inputs" maxlength="17" id="eno" name="eno" type="text" data-fillr-id="96533177" data-fillr="bound" autocomplete="off">
                                                            <span id="erroraadharno" class="error"></span>

                                        </div>
                                                            
                                                            </div>
                                                            
                                                <div class="col-sm-10">
                                                        <label>Aadhar Card No.</label>
                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" maxlength="12" id="aadharno" readonly name="aadharno" type="text" value="<?php echo $aadharno; ?>">

                                                        <span id="erroraadharno" class="error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-sm-5">
                                                        <label>Name</label>
                                                        <div class="form-group">

                                                        <input class="mng_cp form-control" id="name" name="name" readonly type="text" value="<?php echo $txtnm; ?>">

                                                    </div>

                                                </div>
                                                 <div class="col-sm-5">
                                                    <label>Name (Local Language) </label>
                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" id="name_regional"  name="namelocal" type="text" value="">

                                                        <span id="errorname_regional" class="error"></span>

                                                    </div>

                                                </div>



                                                <div class="col-sm-5" style="display:none;">
                                                        <label>Father Name</label>
                                                        <div class="form-group">

                                                        <input class="mng_cp form-control" id="fathername" oninput="setaddress()" name="fathername" type="text" value="<?php echo $txtfnm; ?>">

                                                        <span id="errorfathername" class="error"></span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">
                                                    <div class="col-sm-5">
                                                        <label>Date Of Birth</label>
                                                        <div class="form-group">

                                                        <input class="mng_cp form-control" name="dobadhar" readonly="readonly" type="text" value="<?php echo $txtdob; ?>">                                                        

                                                    </div>

                                                </div>
                                                <div class="col-sm-5">
                                                        <label>Date Of Birth Local</label>
                                                        <div class="form-group">

                                                        <input class=" mng_cp form-control " id="birthtithilocal" name="birthtithilocal" type="text" value="" data-fillr-id="1408880338" data-fillr="bound" autocomplete="off">                                                        

                                                    </div>

                                                </div>

                                                <div class="col-sm-5">
                                                        <label>Gender </label>
                                                        <div class="  form-group">

                                                        <input class="mng_cp form-control" id="gender" name="gender" readonly="readonly" type="text" value="<?php echo $txtgender; ?>">

                                                        <input class="mng_cp form-control" id="genderlocal" name="genderlocal" readonly="readonly" type="hidden" value="">

                                                        <input class="mng_cp form-control" id="birthtithi" name="birthtithi" readonly="readonly" type="hidden" value="Birth Tithi">

                                                        <input class="mng_cp form-control" id="birthtithilocal" name="birthtithilocal" readonly="readonly" type="hidden" value="">

                                                        <input class="mng_cp form-control" id="pata" name="pata" readonly="readonly" type="hidden" value="address">

                                                        <input class="mng_cp form-control" id="patalocal" name="patalocal" readonly="readonly" type="hidden" value="">

                                                        <input class="mng_cp form-control" id="imgcode" name="imgcode" type="hidden" value="<?php echo $img; ?>">

                                                        <input class="mng_cp form-control" id="taluka" name="taluka" type="hidden" value="<?php echo $txttaluka; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-5">
                                                   

                                                   <label>Pincode</label>

                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" oninput="setaddress()" id="pincode" name="pincode" readonly type="text" value="<?php echo $txtpincode; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-2" style="display:none" >

                                                    <label>House No.</label>

                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" oninput="" id="" name="houseno" type="text" value="<?php echo $txtbuld; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-3" style="display:none">

                                                    <label>Gali, Mohalla, Village</label>

                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" oninput="setaddress()" id="streetlocality" name="street"  type="text" value="<?php echo $txtlocality; ?>">

                                                        <span id="errorstreetlocality" class="error"></span>

                                                    </div>

                                                </div>

                                                

                                            </div>

                                            

                                        </div>

                                        <div class="col-sm-2">

                                            <label>Image  </label>

                                            <div class="form-group">

                                                 <img class="mng_cp" src="<?php echo $img; ?>" width="130" height="150" >

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <div class="row">

                                                <div class="col-sm-2" style="display:none">

                                                    <label>Post Office</label>

                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" oninput="" id="" name="vtcandpost"  type="text" value="<?php echo $txtpost; ?>">

                                                        <span id="errorvtcandpost" class="error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-sm-5"style="display:none">
                                                        <label>District </label>
                                                        <div class="  form-group">

                                                        <input class="mng_cp form-control" oninput="setaddress()" id="city" name="dist" readonly="readonly" type="text" value="<?php echo $txtdistrict; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-5"style="display:none">

                                                    <label>State</label>

                                                    <div class="form-group">

                                                        <input class="mng_cp form-control" oninput="setaddress()" id="state" name="statename" readonly="readonly" type="text" value="<?php echo $txtstate; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-4">
                                                        <label>Address  </label>
                                                        <div class="form-group">
                                                    
                                                            <textarea class="form-control mng_cp" style="height:100px" id="txtSource" name="address" rows="10" type="text" required="" data-fillr-id="1242868058" data-fillr="bound" autocomplete="off"><?php echo $txtadd; ?></textarea>

                                                        <span id="errortxtSource" class="error"></span>

                                                    </div>

                                                </div>

                                           

                                            <div class="col-sm-4">
                                                    <label>Address (Local Language)  </label>
                                                    <div class="form-group">
                                                        <textarea class=" mng_cp form-control" id="txtTarget" style="height:100px" name="addresslocal" rows="10" type="text" data-fillr-id="1832510955" data-fillr="bound" autocomplete="off"></textarea>
                                                        <span id="errortxtTarget" class="error"></span>
                                                    </div>
                                                </div>
                                                    
                                                </div>
                                                
                                        </div>

                                            <div class="row">

                                                <div class="col-sm-3">

                                                    <label>Select Local Language</label>

                                                    <div class="form-group">

                                                        <select class="mng_cp form-control"  onchange="changelang()" name="language" id="language" required>

                                                            <option value="">SELECT</option>

                                                            <option value="HI">Hindi</option>

                                                            <option value="PA">Punjabi</option>

                                                            <option value="GU">Gujrati</option>

                                                            <option value="MR">Marathi</option>

                                                            <option value="TA">Tamil</option>

                                                            <option value="BN">Bengali</option>

                                                            <option value="TE">Telugu</option>

                                                             <option value="KN">Kannada</option>

                                                            <option value="OR">Odia</option>

                                                        </select>   

                                                        <span id="errorlanguage" class="error"></span>

                                                    </div>

                                                </div>

                                               

                                               

                                            <div class="col-sm-3">

                                                <label>&nbsp;</label>

                                                <div class="form-group">              

                                                <button type="submit" name="savedata" class="btn btn-success btn-block">Submit</button> 

                                                
                                                </div></div>
                                        </div>
                                        
                                               
                                               
                                            </div>
                                            
                                            
                                                
                                                
                                                

                                                
                                            </div>
                                        </form></div>
                                    </section></div>

                                    <style>
                                        .mng_cp
                                        {
                                            box-shadow: 6px 8px #EED !important;
                                            border-radius: 23px !important;
                                        }
                                        
                                        
                                    </style>
                                
                                                            </div>
                            <!-- /# row -->
                        
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
                  
                  $.post("http://print.thegeniuscart.com/admin/test.php",{lang:lang,name:name,address:address}).done(function (data) {
                      //alert(data);
                      var json = JSON.parse(data);
                      //alert(json.data);
                      $("[name='namelocal']").val(json.name.replace(/"/g,''));
                      $("[name='addresslocal']").val(json.address.replace(/"/g,''));
                  })
                  
                  var dob = $("#birthtithi").val();
                  var gender = $("#gender").val();
                 
                  $.post("http://print.thegeniuscart.com/admin/test.php",{lang:lang,name:dob,address:gender}).done(function (data) {
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

            
            var gen = $("#gender").val();
            url = 
            "https://translate.googleapis.com/translate_a/single?client=gtx";
            url += "&sl=" + 'EN';
            url += "&tl=" + lang;
            url += "&dt=t&q=" + escape(gen.toLowerCase());
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

<!----<div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
                    
                        Questions? Let's Chat
                    </div>  
                    
                        
                    </div>  

                    <div class="wcs_popup">
                        <div class="wcs_popup_close">
                            <span class="fa fa-close"></span>
                        </div>
                        <div class="wcs_popup_header">
                            <strong>Need Help? Chat with us</strong>
                            <br>
                            <div class="wcs_popup_header_description">Click one of our representatives below</div>
                        </div>  
                        <div class="wcs_popup_person_container">
                            <div class="wcs_popup_person" data-number="+91">
                                <div class="wcs_popup_person_img"><img src="download.jpg" alt=""></div>
                                <div class="wcs_popup_person_content">
                                    <div class="wcs_popup_person_name"></div>
                                    <div class="wcs_popup_person_description">Sales Support</div>
                                    <div class="wcs_popup_person_status">I'm Online</div>
                                </div>  
                            </div>

                            
                        </div>
                    </div>
                </div>  


                    

        <!-- jquery vendor -->
        
        
     
<script>
$(".hamburger").on('click', function() {
        $(this).toggleClass("is-active");
    });


    /*  
    -------------------
    List item active
    -------------------*/
    $('.header li, .sidebar li').on('click', function() {
        $(".header li.active, .sidebar li.active").removeClass("active");
        $(this).addClass('active');
    });

    $(".header li").on("click", function(event) {
        event.stopPropagation();
    });

    $(document).on("click", function() {
        $(".header li").removeClass("active");

    });
</script>

        
       
        
        
        <script type="text/javascript">
        /*  jQuery(function($) {
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
        
       
    <script>
        $('#example_1').whatsappChatSupport();
        </script>
        
                <style>
        #myModal,.modal-backdrop
        {
            display:none !important;
        }
        </style>
        <script>
        setTimeout(function(){ jQuery('#myModal').modal('hide'); 
    }, 3000);
   
  </script>
  
                                                                                                
                                            
<style>
    body {
    background: #e9ecf3 !important;
    }
</style> 
 
   <script>
    $(document).ready(function()
    {
       $(".rech_now").on('click',function()
       {
         $('#nemd').modal('show');  
       });
    });
</script>
        
        
    <!-- disable right click and ctrl u-->  
        <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
document.onkeydown = function(e) {
    if(e.keyCode == 123) {
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
     return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
     return false;
    }

    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
     return false;
    }      
 }
        </script>
     
<!-- /disable right click and ctrl u-->
        
        <style>
        body
        {
            padding:inherit !important;
        }
        </style>
        
<style>
        .tw-price-box {
    padding: 1px 0 19px;
    color: #fff;
    text-align: center;
}
.bg-orange {
    background: #FA6742 !important;
}
.bg-shrock {
    background: #2BC2A7 !important;
}
.bg-green {
    background: #32CC73 !important;
}
.bg-blue {
    background: #478FFF !important;
}
.pricing-feaures {
    text-align: center;
    margin-top: 15px;
}
.pricing-price {
    margin: 30px 0 25px;
    text-align: center;
}

.tw-price-box .pricing-price strong {
    color: #fff;
}
.pricing-price strong {
    font-size: 16px;
    color: #2f2c2c;
    font-weight: 700;
    -webkit-transition: all 0.3s linear;
    transition: all 0.3s linear;
}

.pricing-feaures ul {
    list-style: none;
    padding: 0;
    margin: 0;
}



.razorpay-payment-button
{
    display:none;
}

.pricing-feaures ul li {
    display: block;
    margin-bottom: 5px;
}
            .awesome {
      
      font-family: futura;
      font-style: italic;
      
      width:100%;
      
      margin: 0 auto;
      text-align: center;
      
      color:#313131;
      font-size:45px;
      font-weight: bold;
     
      -webkit-animation:colorchange 10s infinite alternate;
      
      
    }

    @-webkit-keyframes colorchange {
      0% {
        
        color: blue;
      }
      
      10% {
        
        color: #8e44ad;
      }
      
      20% {
        
        color: #1abc9c;
      }
      
      30% {
        
        color: green;
      }
      
      40% {
        
        color: blue;
      }
      
      50% {
        
        color: #34495e;
      }
      
      60% {
        
        color: blue;
      }
      
      70% {
        
        color: #2980b9;
      }
      80% {
     
        color: red;
      }
      
      90% {
     
        color: #2980b9;
      }
      
      100% {
        
        color: green;
      }
    }
        </style>
        <style>
.modal-body
{
    flex:inherit !important;
    padding:inherit !important;
}
.modal-footer
{
    border:none !important;
}
.modal-dialog {
    margin: 30px 248px auto !important;
    max-width: auto !important;
    width : 100% !important;
}
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}
.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}
.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    color:#000;
    padding : 0px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
}

.info-box-content {
    padding: 20px 10px;
    margin-left: 90px;
}

.progress-description, .info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

</style>
<script type="text/javascript">
function start_countdown()
{
 var counter= 1800;
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
      mins = Math.floor(counter / 60);
secs = counter % 60;
  document.getElementById("countdown").innerHTML="You Will Be Logged Out In "+mins+":"+secs;
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'logout.php',
     success:function(response) 
     {
      window.location="https://google.com/";
     }
   });
   }
   counter--;
 }, 1000)
}

</script>
<script>start_countdown();</script>
 



  
 <script>
    window.fwSettings={
    'widget_id':60000000508
    };
    !function(){if("function"!=typeof window.FreshworksWidget){var n=function(){n.q.push(arguments)};n.q=[],window.FreshworksWidget=n}}() 
</script>



    


<script src="jquery.maskedinput.js.download" type="text/javascript"></script>
<script>
     $("#eno").mask('9999/99999/999999');
</script>
    </script></body></html>
<?php include ('userFooter.php'); ?>