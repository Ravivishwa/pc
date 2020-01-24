<?php include ('userHeader.php'); ?>
<script type="text/javascript">



function setaddress(){

  var fathername = document.getElementById('fathername').value;

    var houseno = document.getElementById('houseno').value;

    var streetlocality = document.getElementById('streetlocality').value;

    var vtcandpost = document.getElementById('vtcandpost').value;

    var state = document.getElementById('state').value;

    var city = document.getElementById('city').value;

    var pincode = document.getElementById('pincode').value;



  document.getElementById('txtSource').innerHTML ="S/O :  " + fathername + ", " + houseno + ", " + streetlocality + ", " + vtcandpost + ", " + city + ", " + state + ", " + pincode;

}



</script>
      <div class="content-wrap">

            <div class="main">

          <div class="col-md-12">

          <div class="container-fluid">

            <div class="row">

              <div class="page-header">

                <div class="page-title">

                  <h1>Aadhaar Card Details From Advance Search</h1>

                </div>

              </div>

            </div>

            <!-- /# row -->

            <section id="main-content">

              <div class="row">

                 <?php
$q = "";
$q = "SELECT * FROM tbluser where  userid='" . $_SESSION['userid'] . "'";
$r = mysqli_query($connection, $q);
$rw = mysqli_fetch_assoc($r);
if (floatval($rw['aadharpoint']) > floatval($rw['walletamount']) && $_SESSION['userid'] > 1) {
    $msgno = "Sorry, Your Balance is Low .... Please Recharge Soon";
?>

                                        <script>

                                        setTimeout(function () {

                                        window.location.href= 'aadharautodbt.php';

                                        }, 3000);

                                        </script>

                                    <?php
} else {
   
     $dbt = trim($server_output);
                                        
                                        $postdata =  $_SESSION['postdata'];
                                        $aadhar_data =  $_SESSION['aadhar_data'];
                                       
                                    //   var_dump($aadhar_data);
                                        if ($aadhar_data && $postdata){

                                        
                                        
                                         
                                        $aadharno= $postdata['EnterAadhaarNumber'];
                                        $txtnm= $aadhar_data['txt_NameE'];
                                        $txtfnm= $aadhar_data['txt_Father'];
                                        $txtdob = $aadhar_data[ 'txt_DOB'];
                                        $txtdob = str_replace("-","/",$txtdob);
                                        
                                    
                                        //$iparr[12];
                                        if($aadhar_data['txt_Gender'] == "M")
                                        {
                                         $txtgender= 'Male';
                                        }
                                        else
                                        {
                                        	$txtgender= 'Female';
                                        }
                                        $txtbuld= $aadhar_data['txt_Building'];//"";
                                        $txtgali= $aadhar_data['txt_Street'];//"";
                                        $txtlocality= $aadhar_data['txt_Locality'];
                                        $txtpost="";
                                        $txttaluka= $aadhar_data['txt_vtc'];
                                        $txtdistrict= $aadhar_data['txt_District'];
                                        $txtstate=  $aadhar_data['txt_State'];
                                        $txtpincode= $aadhar_data['txt_Pincode'];
                                        $img=$aadhar_data['image'];
                                    } 
    $rel = "S/O :";
    
    if ($postdata['relation'] == 'husband') {
        $rel = "W/O";
    }
    $txtadd = $rel . ' ' . $txtfnm . ',' . $txtbuld . ' ' . $txtgali . ' ' . $txtlocality . ' ' . $txtdistrict . ', ' . $txtstate . ', ' . $txtpincode;
    if (trim($txtnm) == "") {
        $msgno = 'TRY AGAIN';
?>

                                        <script>

                                        setTimeout(function () {

                                        window.location.href= 'aaadhar.php';

                                        }, 3000);

                                        </script>

                                    <?php
    }
}
?>





                            <?php
if (isset($_POST['savedata'])) {
    $aadharno = trim($_POST['aadharno']);
    $name = trim($_POST['name']);
    // echo $name;
    $fathername = trim($_POST['fathername']);
    $dobadhar =  trim($_POST['dobadhar']);
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
        if ($b['aadharno'] == $aadharno) {
            $msgno = 'This Aadhar Card No Already Exist .... ';
        } else {
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

                                        <div class="col-sm-10">

                                            <div class="row">

                                                <div class="col-sm-4">

                                                    <label>Aadhar Card No.</label>

                                                    <div class="form-group">

                                                        <input class="form-control" maxlength="12" id="aadharno" readonly name="aadharno" type="text" value="<?php echo $aadharno; ?>">

                                                        <span id="erroraadharno" class="error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-sm-4">

                                                    <label>Name</label>

                                                    <div class="form-group">

                                                        <input class="form-control" id="name" name="name" readonly type="text" value="<?php echo $txtnm; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-4">

                                                    <label>Father Name </label>

                                                    <div class="form-group">

                                                        <input class="form-control" id="fathername" oninput="setaddress()" name="fathername" type="text" value="<?php echo $txtfnm; ?>">

                                                        <span id="errorfathername" class="error"></span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-3">

                                                    <label>Date Of Birth</label>

                                                    <div class="form-group">

                                                        <input class="form-control" name="dobadhar"readonly type="text"  value="<?php echo $txtdob; ?>">                                                        

                                                    </div>

                                                </div>

                                                <div class="col-sm-2">

                                                    <label>Gender </label>

                                                    <div class="form-group">

                                                        <input class="form-control" id="gender" name="gender" readonly="readonly" type="text" value="<?php echo $txtgender; ?>">

                                                        <input class="form-control" id="genderlocal" name="genderlocal" readonly="readonly" type="hidden" value="">

                                                        <input class="form-control" id="birthtithi" name="birthtithi" readonly="readonly" type="hidden" value="Birth Tithi">

                                                        <input class="form-control" id="birthtithilocal" name="birthtithilocal" readonly="readonly" type="hidden" value="">

                                                        <input class="form-control" id="pata" name="pata" readonly="readonly" type="hidden" value="address">

                                                        <input class="form-control" id="patalocal" name="patalocal" readonly="readonly" type="hidden" value="">

                                                        <input class="form-control" id="imgcode" name="imgcode" type="hidden" value="<?php echo $img; ?>">

                                                        <input class="form-control" id="taluka" name="taluka" type="hidden" value="<?php echo $txttaluka; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-2">

                                                    <label>Pincode</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="setaddress()" id="pincode" name="pincode" readonly type="text" value="<?php echo $txtpincode; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-2" style="display:none" >

                                                    <label>House No.</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="" id="" name="houseno" type="text" value="<?php echo $txtbuld; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-3" style="display:none">

                                                    <label>Gali, Mohalla, Village</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="setaddress()" id="streetlocality" name="street"  type="text" value="<?php echo $txtlocality; ?>">

                                                        <span id="errorstreetlocality" class="error"></span>

                                                    </div>

                                                </div>

                                                

                                            </div>

                                            

                                        </div>

                                        <div class="col-sm-2">

                                            <label>Image  </label>

                                            <div class="form-group">

                                                 <img src="<?php echo $img; ?>" width="100" height="120" >

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <div class="row">

                                                <div class="col-sm-2" style="display:none">

                                                    <label>Post Office</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="" id="" name="vtcandpost"  type="text" value="<?php echo $txtpost; ?>">

                                                        <span id="errorvtcandpost" class="error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-sm-2">

                                                    <label>District</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="setaddress()" id="city" name="dist" readonly="readonly" type="text" value="<?php echo $txtdistrict; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-2">

                                                    <label>State</label>

                                                    <div class="form-group">

                                                        <input class="form-control" oninput="setaddress()" id="state" name="statename" readonly="readonly" type="text" value="<?php echo $txtstate; ?>">

                                                    </div>

                                                </div>

                                                <div class="col-sm-6">

                                                    <label>Address  </label>

                                                    <div class="form-group">

                                                        <textarea class="form-control" style="height:55px" id="txtSource" name="address" rows="10" type="text" ><?php echo $txtadd; ?></textarea>

                                                        <span id="errortxtSource" class="error"></span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-3">

                                                    <label>Select Local Language</label>

                                                    <div class="form-group">

                                                        <select class="form-control"  onchange="changelang()" name="language" id="language" required>

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

                                                    <label>Name (Local Language) </label>

                                                    <div class="form-group">

                                                        <input class="form-control" id="name_regional"  name="namelocal" type="text" value="">

                                                        <span id="errorname_regional" class="error"></span>

                                                    </div>

                                                </div>

                                                <div class="col-sm-6">

                                                    <label>Address (Local Language)  </label>

                                                    <div class="form-group">

                                                        <textarea class="form-control" id="txtTarget"   style="height:55px" name="addresslocal"  rows="10"   type="text" value="S/0:"></textarea>
                                                        

                                                        <span id="errortxtTarget" class="error"></span>

                                                    </div>

                                                </div>

                                            </div>

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

              <!-- /# row -->

            </section>

          </div>

        </div>

            </div>

        </div>





        <script type="text/javascript">

      function validation() {

        

        var aadharno = document.getElementById('aadharno').value;

        if ( aadharno.length < ) {

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



 

            var fathername = document.getElementById("fathername").value;

            if ( fathername.trim() =="" ) {

                document.getElementById('errorfathername').innerHTML = " **Please Enter Father or Husband Name !!!";

                document.getElementById('fathername').style.border = "1px solid red";

        document.getElementById('fathername').focus();

                return false;  

            }

           

           /*

            var streetlocality = document.getElementById("streetlocality").value;

            if ( streetlocality.trim() =="" ) {

                document.getElementById('errorstreetlocality').innerHTML = " **Please Enter Street Locality Village !!!";

                document.getElementById('streetlocality').style.border = "1px solid red";

        document.getElementById('streetlocality').focus();

                return false;  

            }

            */

   /*

            var vtcandpost = document.getElementById("vtcandpost").value;

            if ( vtcandpost.trim() =="" ) {

                document.getElementById('errorvtcandpost').innerHTML = " **Please Enter Post Office !!!";

                document.getElementById('vtcandpost').style.border = "1px solid red";

        document.getElementById('vtcandpost').focus();

                return false;  

            }

*/



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



<?php include ('userFooter.php'); ?>