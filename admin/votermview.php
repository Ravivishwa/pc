<?php
include('userHeader.php');

$upload_dir = "voter/imgmanualvoter/";
$sid = $_GET['sid'];

$q = "";
$q = "SELECT * FROM votermanual where sid='" . $sid . "'";
$r = mysqli_query($connection, $q);
$rw = mysqli_fetch_assoc($r);
?>
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Voter Card View Details of #<?php echo $sid;?></h1>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">

                        <div class="row dgnform">
                            <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                    <label>Assembly / Constituency</label>
                                    <div class="form-group">
                                        <input class="form-control" maxlength="50" id="assembly" name="assembly" type="text" value="<?php echo $rw['assembly'];?>" required placeholder="Assembly/Parliamentary Constituency" />
                                    </div>
                                </div>
                                <?php if($rw['cardnumber'] != "") { ?>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <label>Card Number</label>
                                    <div class="form-group">
                                        <input class="form-control " id="cardnumber" name="cardnumber" type="text" value="<?php echo $rw['cardnumber'];?>" required placeholder="Voter Card Number">
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <input class="form-control " id="name" name="name"  type="text" value="<?php echo $rw['name'];?>" required placeholder="Aadharcard Name...">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <label>Father Name </label>
                                    <div class="form-group">
                                        <input class="form-control" id="fathername" value="<?php echo $rw['fathername'];?>" name="fathername" type="text" required placeholder="Father Name...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-6">
                                    <label>Date Of Birth</label>
                                    <div class="form-group">
                                        <input class="form-control date-picker" name="dobadhar" value="<?php echo $rw['dob'];?>" id="dobadhar" type="text" required placeholder="D.O.B.(dd/MM/yyyy)" data-date-format="dd/mm/yyyy">
                                        <span id="errordobadhar" class="error"></span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <label>Select Gender</label>
                                    <div class="form-group">
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="">GENDER</option>
                                            <option value="Male" <?php if($rw['gender'] == "Male") echo "selected='selected'"?>>Male</option>
                                            <option value="Female" <?php if($rw['gender'] == "Female") echo "selected='selected'"?>>Female</option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <label>Full Address</label>
                                    <div class="form-group">
                                        <textarea class="form-control" style="height:55px" id="txtSource" name="address" rows="10" type="text" ><?php echo $rw['address'];?></textarea>
                                        <span id="errortxtSource" class="error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>Address Proof</label>
                                    <div class="form-group">
                                        <img src="<?php echo $upload_dir . $rw['addressproof']?>" width="128" />
                                    </div> 
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>ID Proof</label>
                                    <div class="form-group">              
                                        <img src="<?php echo $upload_dir . $rw['idproof']?>" width="128" />
                                    </div> 
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <label>Photo</label>
                                    <div class="form-group">              
                                        <img src="<?php echo $upload_dir . $rw['imagepathoriginal']?>" width="128" />
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>      
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function validation() {

        var assembly = document.getElementById('assembly').value;
        if (assembly.trim() == "") {
            document.getElementById('errorassembly').innerHTML = " **Please Enter Assembly/Parliamentary Constituency !!!";
            document.getElementById('aadharno').style.border = "1px solid red";
            document.getElementById('aadharno').focus();
            return false;
        }

        var name = document.getElementById('name').value;
        if (name.trim() == "") {
            document.getElementById('errorname').innerHTML = " **Please Enter Aadhaar Card Name !!!";
            document.getElementById('name').style.border = "1px solid red";
            document.getElementById('name').focus();
            return false;
        }

        var fathername = document.getElementById('fathername').value;
        if (fathername.trim() == "") {
            document.getElementById('errorfathername').innerHTML = " **Please Enter Father Husband Name !!!";
            document.getElementById('fathername').style.border = "1px solid red";
            document.getElementById('fathername').focus();
            return false;
        }

        var dobadhar = document.getElementById('dobadhar').value;
        if (dobadhar.trim() == "") {
            document.getElementById('errordobadhar').innerHTML = " **Please Enter Date of Birth of Aadhaar Name !!!";
            document.getElementById('dobadhar').style.border = "1px solid red";
            document.getElementById('dobadhar').focus();
            return false;
        }

        var houseno = document.getElementById('houseno').value;
        if (houseno.trim() == "") {
            document.getElementById('errorhouseno').innerHTML = " **Please Enter House No. of Aadhaar Name !!!";
            document.getElementById('houseno').style.border = "1px solid red";
            document.getElementById('houseno').focus();
            return false;
        }

        var streetlocality = document.getElementById('streetlocality').value;
        if (streetlocality.trim() == "") {
            document.getElementById('errorstreetlocality').innerHTML = " **Please Enter Gali, Locality, Panchayat !!!";
            document.getElementById('streetlocality').style.border = "1px solid red";
            document.getElementById('streetlocality').focus();
            return false;
        }

        var vtcandpost = document.getElementById('vtcandpost').value;
        if (vtcandpost.trim() == "") {
            document.getElementById('errorvtcandpost').innerHTML = " **Please Enter Post Office !!!";
            document.getElementById('vtcandpost').style.border = "1px solid red";
            document.getElementById('vtcandpost').focus();
            return false;
        }

        var pincode = document.getElementById('pincode').value;
        if (pincode.trim() == "") {
            document.getElementById('errorpincode').innerHTML = " **Please Enter Pincode !!!";
            document.getElementById('pincode').style.border = "1px solid red";
            document.getElementById('pincode').focus();
            return false;
        }


        var txtSource = document.getElementById('txtSource').value;
        if (txtSource.trim() == "") {
            document.getElementById('errortxtSource').innerHTML = " **Please Enter Address !!!";
            document.getElementById('txtSource').style.border = "1px solid red";
            document.getElementById('txtSource').focus();
            return false;
        }

        var name_regional = document.getElementById('name_regional').value;
        if (name_regional.trim() == "") {
            document.getElementById('errorname_regional').innerHTML = " **Please Enter Name in Local Language !!!";
            document.getElementById('name_regional').style.border = "1px solid red";
            document.getElementById('name_regional').focus();
            return false;
        }

        var txtTarget = document.getElementById('txtTarget').value;
        if (txtTarget.trim() == "") {
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
            var result = '';
            for (var i = 0; i <= 500; i++)
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
            var result = '';
            for (var i = 0; i <= 500; i++)
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
            var result = '';
            for (var i = 0; i <= 500; i++)
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
            var result = '';
            for (var i = 0; i <= 500; i++)
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
            var result = '';
            for (var i = 0; i <= 500; i++)
            {
                result += data[0][i][0];
                // alert(result);
                $("#patalocal").val(result);

            }
        });

    }
    ;
//Words and Characters Count	
</script>

<?php include('userFooter.php'); ?>