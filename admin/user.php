<script type="text/javascript">

function myFunction() {
//  alert("keshav");
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


<?php include('userHeader.php');

?>
      <div class="content-wrap">
            <div class="main">
                <div class="col-md-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Users Account</h1>
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
                                    $city = strtoupper($_POST['city']) ;
                                    $emailid = strtolower($_POST['emailid']);
                                    $refrence = $_POST['refrence'];
                                    $mobileno = $_POST['mobileno'];
                                    $password = $_POST['password'];
                                    $remark = strtoupper($_POST['remark']);
                                    $walletamount = strtoupper($_POST['walletamount']);
                                    $state = strtoupper($_POST['state']);
                                    $aadharpoint = $_POST['aadharpoint'] ;
                                    $cardrate = $_POST['cardrate'];


                                    $a = mysqli_query($connection,"SELECT loginname FROM tbluser Where loginname='".$mobileno."'");
                                    $b = mysqli_fetch_array($a);
                                    if($b['loginname']==$mobileno){
                                        $msgno = 'User Id or Login Id Already Exist .... ';
                                    } else {
                                        $a = mysqli_query($connection,"SELECT emailid FROM tbluser Where emailid='".$emailid."'");
                                        $b = mysqli_fetch_array($a);
                                        if($b['emailid']==$emailid){
                                            $msgno = 'Email Id Already Exist .... ';
                                        } else {
                                            if ($_SESSION['usertype'] == 'ADMIN') {
                                            $query = "INSERT INTO `tbluser`
                                            (`fullname`, `usertype`, `loginname`, `emailid`, `address`,`cityname`,
                                                `mobileno`, `pswrd`, `remarks`, `walletamount`, `loginid`, `logdate`, `statename`, `refrenceid`, `aadharpoint`, `cardrate`,`ispaid`,`status`) 
                                            VALUES ('".$username."','".$usertype."','".$mobileno."','".$emailid."','".$address."','".$city."','".$mobileno."','".$password."','".$remark."','".$walletamount."','".$_SESSION['userid']."',now(),'".$_SESSION['userid']."','".$_SESSION['userid']."','".$aadharpoint."','".$cardrate."',1,1)";
                                            }
                                            else
                                            {
                                                $query = "INSERT INTO `tbluser`
                                            (`fullname`, `usertype`, `loginname`, `emailid`, `address`,`cityname`,
                                                `mobileno`, `pswrd`, `remarks`, `walletamount`, `loginid`, `logdate`, `statename`, `refrenceid`, `aadharpoint`, `cardrate`,`ispaid`,`status`) 
                                            VALUES ('".$username."','".$usertype."','".$mobileno."','".$emailid."','".$address."','".$city."','".$mobileno."','".$password."','".$remark."','".$walletamount."','".$_SESSION['userid']."',now(),'".$_SESSION['userid']."','".$_SESSION['userid']."','".$aadharpoint."','".$cardrate."',1,1)";
                                            }

                                            $aquery=mysqli_query($connection,$query);
                                            $last_id = mysqli_insert_id($connection);
                                            $k = mysqli_query($connection,"SELECT * FROM tblmenu where menuid != 2");
                                            while($kj = mysqli_fetch_assoc($k))
                                            {
                                                $c = mysqli_query($connection,"select * from tblsubmenu where menuid=".$kj['menuid']."");
                                                while($ck = mysqli_fetch_assoc($c))
                                                {
                                                    mysqli_query($connection,"insert into tbluserright(`userid`,`menuid`,`submenuid`,`rights`)values(".$last_id.",".$kj['menuid'].",".$ck['submenuid'].",'YES')");
                                                }
                                            }
                                            $msg = 'User Name Created Successfully.........';
                                            $msgtext = 'Dear User,You Register Successfully Your Loginname '.$mobileno.' And  Password '.$password.'  ';
                                            ?>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                            <script>



var settings = {

  "async": true,

  "crossDomain": true,

  "url": "https://api.msg91.com/api/sendhttp.php?mobiles=<?php echo $mobileno; ?>&authkey=292112AXtRbtLGY5e1039e0P1&route=2&sender=DGGRAM&message=<?php echo $msgtext; ?>&country=91",

  "method": "GET",

  "headers": {}

}



$.ajax(settings).done(function (response) {

  console.log(response);

});

</script>
                                            <script>
                                            setTimeout(function () {
                                                window.location.href= 'pointtrans.php';
                                            }, 2000);
                                            </script>
                                            <?php
                                        }
                                    }

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
                                                <label>User Type</label>
                                                <div class="form-group">
                                                <select class="form-control"  name="usertype" id="usertype"  required>
                                                    <option value="" > Select User Type </option>
                                                    <?php if ($_SESSION['usertype'] == 'MAINADMIN') { ?>
                                                    <option value="ADMIN" > ADMIN </option>
                                                        <option value="RETAILER" > RETAILER </option>
                                                        <option value="DISTRIBUTER" > DISTRIBUTER </option>
                                                        <option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
                                                        <option value="CHANNEL PARTNER" > CHANNEL PARTNER </option>


                                                       <?php } elseif ($_SESSION['usertype'] == 'ADMIN') { ?>
                                                        <option value="RETAILER" > RETAILER </option>
                                                         <option value="CHANNEL PARTNER">CHANNEL PARTNER </option>
                                                        <option value="DISTRIBUTER" > DISTRIBUTER </option>
                                                        <option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>
                                                       <?php } elseif ($_SESSION['usertype'] == 'CHANNEL PARTNER') { ?>                                                        <option value="RETAILER" > RETAILER </option>                                                                                                                <option value="DISTRIBUTER" > DISTRIBUTER </option>                                                        <option value="SUPER DISTRIBUTER" > SUPER DISTRIBUTER </option>

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
                                                <input autocomplete="off" type="text" class="form-control" id="userid" name="userid" placeholder="Mobile Number Here" required >
                                                <span id="erroruserid" class="error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>User Full Name</label>
                                                <div class="form-group">
                                                <input autocomplete="off" type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
                                                <span id="errorusername" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-6 col-sm-8 col-xs-12">
                                                <label>Address</label>
                                                <div class="form-group">
                                                <input autocomplete="off" type="text" class="form-control" name="address" placeholder="Address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label>State</label>
                                                <div class="form-group">
                                                <select class="form-control" onchange="myFunction();" name="state" id="state"  required>
                                                    <option value="" > SELECT STATE</option>
                                                    <?php $result = mysqli_query($connection,"SELECT DISTINCT state FROM tblcities ORDER BY id"); ?>
                                                    <?php while($row = mysqli_fetch_array($result)){ echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>' ; } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-6">
                                                <label>City</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="city" id="city"  required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-6 col-sm-6 col-xs-6">
                                            <div class="col-md-7 col-sm-7 col-xs-12">
                                                <label>Email Id</label>
                                                <div class="form-group">
                                                <input type="text" class="form-control" id="emailid" name="emailid" placeholder="Email Id" required="">
                                                <span id="erroremailid" class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <label>Mobile No</label>
                                                <div class="form-group">
                                                <input type="number" maxlength="10" class="form-control" id="mobileno" name="mobileno" placeholder="Mobile No" required>
                                                <span id="errormobileno" class="error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>Password</label>
                                                <div class="form-group">
                                                <input autocomplete="off" type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                                                <span id="errorpassword" class="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label>Confirm Password</label>
                                                <div class="form-group">
                                                <input autocomplete="off" type="text" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Password">
                                                <span id="errorconfirmpassword" class="error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label>Remark</label>
                                                <div class="form-group">
                                                <input autocomplete="off" type="text"  class="form-control" name="remark" Value="New Registation" placeholder="Remark" >
                                                </div>
                                            </div>
                                        </div>



                                                <div class="row col-md-6 col-sm-6 col-xs-6">
                                            <table style="width:100%">

                                                <tr hidden >
                                                    <td hidden>Point / Card<td>
                                                    <td hidden><input  readonly type="text" class="form-control" id="aadharpoint"

                                                    required  name="aadharpoint" value="1" placeholder="Aadhar Auto Point/Doc"></td>
                                                </tr></tr>



                                            </table >
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6">
                                            <label>&nbsp;</label>
                                            <div class="form-group">
                                               <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Save</button>
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
        <script src="jquery-1.11.3.min.js"></script>
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
                    if ( aadharpoint<1 ) {
                       //  document.getElementById('errorcity').innerHTML = " **Please Enter City";
                         document.getElementById('aadharpoint').style.border = "1px solid red";
                         document.getElementById('aadharpoint').focus();
                         return false;
                    }

                    var manualaadharpoint = document.getElementById('manualaadharpoint').value;
                    if ( manualaadharpoint<1 ) {
                       //  document.getElementById('errorcity').innerHTML = " **Please Enter City";
                         document.getElementById('manualaadharpoint').style.border = "1px solid red";
                         document.getElementById('manualaadharpoint').focus();
                         return false;
                    }
                    var cardrate = document.getElementById('cardrate').value;
                    if ( cardrate<1 ) {
                       //  document.getElementById('errorcity').innerHTML = " **Please Enter City";
                         document.getElementById('cardrate').style.border = "1px solid red";
                         document.getElementById('cardrate').focus();
                         return false;
                    }

                }
            </script>

<?php include('userFooter.php'); ?>
