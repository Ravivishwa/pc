<?php include_once 'downloader/codepitch/autoload.php'; ?>

<?php include('userHeader.php'); ?>
<?php
include("config.php");
$chk = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid']." and aservice =0"));

if(false)
{
    ?>
    <script>
    window.location.href="buy.php";
    </script>
    <?php
}
?>
<script type="text/javascript">
var wadh = "E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=";
//English to hindi translate code

    function changelang() {

            var fltype = document.getElementById("filetype").value;

            if ( fltype.trim() == "" ) {

                document.getElementById("mptassfile").disabled = true;

                document.getElementById("ssofile").disabled = true;

            }

            if ( fltype.trim() == "MPTAAS" ) {

                document.getElementById("mptassfile").disabled = false;

                document.getElementById("ssofile").disabled = true;

            }

            if ( fltype.trim() == "SSO" ) {

                document.getElementById("mptassfile").disabled = true;

                document.getElementById("ssofile").disabled = false;

            }

        };

//Words and Characters Count

</script>

      <div class="content-wrap">

            <div class="main">

                <div class="col-md-12">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="page-header">

                                <div class="page-title">

                                    <h1>Advance AAdhar Search</h1>

                                </div>

                            </div>

                        </div>

                        <!-- /# row -->

                        <section id="main-content">

                            <div class="row col-md-12 col-sm-12 col-xs-12">
                               <?php
                                if($_GET['msg'])
                                {
                                    $msg = $_GET['msg'];
                                }
                               ?>
                                <?php if($msg !='') { ?>

                                    <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>

                                <?php } elseif($msgno !='') { ?>

                                    <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>

                                <?php  } ?>

                                <?php
                                 if(!get_view_state())
                                 {
                                    ?>
                                    <div style="width=100%"  class="row cvmsgno"><?php echo 'Server is not ready'; ?></div> <?php

                                 }
                                 else
                                 {

                                    ?>
                                    <div style="width=100%"  class="row cvmsgok"><?php echo 'Server is ready to use' ?></div> <?php

                                 }
                                ?>

                            </div>

                            <!-- /# row -->

                            <div class="row">

                            <div class="col-md-12 col-sm-6 col-xs-6">

                                                <label>Select Device</label>

                                                <div class="form-group">

                                                    <select class="form-control" data-val="true" data-val-number="The field DevicePortID must be a number." id="DevicePortID" name="DevicePortID"><option value="">--Select--</option>
                                                        <!--

                                                        <option text="Mantra Authentication Vendor Device Manager" value="11100">Mantra</option><option text="NITGEN" value="11100">Nitgen</option> -->

<option text="DEVICE" value="11101">DEVICE</option></select>

                                                </div>

                                            </div>

                            <div class="col-md-12">

                              <form method="post" action="fetch-bio.php" name="form" autocomplete="off" enctype="multipart/form-data" style="width:100%" id="my-form" class="forms">
                                            <input type="hidden" name="piddata" id="piddata" />
                                           <div class="row dgnform" style="">

                                        <div class="row">

                                           <div class="col-md-12 col-sm-6 col-xs-6" style="display: contents;">

                                           <div class="col-md-12">

                                           <div class="form-group">

                                            <input class="form-control valid" id="EnterAadhaarNumber" maxlength="12" placeholder="Enter Your 12 Digit Aadhaar Number" name="EnterAadhaarNumber" type="text" autocomplete="off">



                                           </div>

                                           </div>



                                                </select>



                                           </div>

                                           </div>

                                           <div class="col-md-6" style="visibility:hidden ">



                                           </div>

                                           </div>

                                            <div class="col-md-2 col-sm-3 col-xs-6">

                                                <label>&nbsp;</label>

                                                <div class="form-group">

                                                   <button class="btn btn-success btn-block" onclick="return Select_Capture();">Capture</button>



                                                </div>

                                        </div></div><br><br><br>

                                            <!-------------

                                            <div class="col-md-6 col-sm-6 col-xs-6" >

                                                <label>MPTASS </label>

                                                </br>

                                                <a style="font-size:18px;font-weight:bold;color:red" href="https://www.tribal.mp.gov.in/mptaas/Registration/Index" target="_blank">MPTASS WEBSITE LINK (CLICK HERE)</a>



                                          --------->
     <div class="row dgnform">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12" style="display: contents;">
<div class="col-md-12">
<div class="form-group">
<label><font color="red" size="4">सुचना :</label><br>
<label><font color="red" size="4">1. अगर डाटा एक बार में नहीं आता है तो दुबारा कैप्चर करे डाटा आ जायेगा</label></br>
<label><font color="green" size="4">2. इस फंक्शन में सारे डिवाइस ऑटोमेटिक काम करते है और सारे डिवाइस सपोर्ट करते है</label><br><br>
<label><font color="red" size="4">Notice :</label><br>
<label><font color="red" size="4">1.
If the data does not come at once, then the data will be captured again</label>
<label><font color="green" size="4">2.
In this function all the devices work automatically and all the devices are supported</label><br>
</div>
</div></div>
</div>




                                            </div>

                                            </form>

                            </div>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

        </div>

<form  action="ainfo.php" method="post" name='f1' id="form_id" style="display:none;">

    <input type="text" id="Resp_errCode" name="Resp_errCode"/>

    <input type="text" id="Resp_errInfo" name="Resp_errInfo"/>

    <input type="text" id="Resp_fCount" name="Resp_fCount"/>

    <input type="text" id="Resp_nmPoints" name="Resp_nmPoints"/>

    <input type="text" id="Resp_qScore" name="Resp_qScore"/>

    <input type="text" id="DeviceInfo_dpId" name="DeviceInfo_dpId"/>

    <input type="text" id="DeviceInfo_rdsId" name="DeviceInfo_rdsId"/>

    <input type="text" id="DeviceInfo_rdsVer" name="DeviceInfo_rdsVer"/>

    <input type="text" id="DeviceInfo_dc" name="DeviceInfo_dc"/>

    <input type="text" id="DeviceInfo_mi" name="DeviceInfo_mi"/>

    <input type="text" id="DeviceInfo_mc" name="DeviceInfo_mc"/>

    <input type="text" id="Skey" name="Skey"/>

    <input type="text" id="Skey_ci" name="Skey_ci"/>

    <input type="text" id="Hmac_str" name="Hmac_str"/>

    <input type="text" id="Data_Type" name="Data_Type"/>

    <input type="text" id="Data_str" name="Data_str"/>

    <input type="text" id="UID" name="UID"/>

    <input type="text" id="sr" name="rel_name"/>

   <input type="text" id="rl" name="relation"/>





</form>



        <script type="text/javascript">

            function validation() {



                var txtSource = document.getElementById('txtSource').value;

                if ( txtSource.trim() =="" ) {

                     document.getElementById('errortxtSource').innerHTML = " **Please Enter Address !!!";

                     document.getElementById('txtSource').style.border = "1px solid red";

                     document.getElementById('txtSource').focus();

                     return false;

                }



            }

        </script>





<script>

$('.dgnform').hide();

$(document).ready(function()

{

    $('#DevicePortID').on('change',function()

    {

    var select = $(this).val();

     if(select != '')

     {

        $('.dgnform').show();

     }

     else

     {

         $('.dgnform').hide();

     }

    });



});

    function Select_Capture() {



        var DevicePortID_text = $('#DevicePortID option:selected').text();



        var AadhaarNo = $('#EnterAadhaarNumber');



var relation = $('#relation');



        if (AadhaarNo.val() == '') {

            alert("Enter Aadhaar Number");

            AadhaarNo.focus();

            return false;

        }







        else if (AadhaarNo.val().length < 12) {

            alert("Enter Valid 12 Digit Aadhaar Number");

            AadhaarNo.focus();

            return false;

        }

        else if (AadhaarNo.val().charAt(0) == "0" || AadhaarNo.val().charAt(0) == "1") {

            alert("Enter Valid 12 Digit Aadhaar Number");

            AadhaarNo.focus();

            return false;

        }

        else {





            if ($("#DevicePortID")) {

                if (DevicePortID_text.toUpperCase() == "NITGEN") {

                   // CaptureNetgin();
                    alert("Only DEVICE Device working");
                }

                else if (DevicePortID_text.toUpperCase() == "DEVICE") {

                    CaptureAvdms();

                }

                else {

                    alert("Only DEVICE Device working");

                    //CaptureAvdm();

                }

            }

        }

return false;

    }





    function CaptureAvdms() {

        var DevicePortID = "#DevicePortID";

        var Port = "";

        var Fullname = $("#Fullname").val();

        var finalUrl = "http://127.0.0.1:11100/rd/capture";

        if (Port != "") {finalUrl = "http://127.0.0.1:" + Port + "/rd/capture";}

        var XML = "<PidOptions ver='1.0'><Opts fCount='1' fType='0' iCount='' iType='' pCount='' pType='' format='0' pidVer='2.0' timeout='10000' otp='' wadh='"+wadh+"' posh=''/></PidOptions>";

        $.support.cors = true;

         $.ajax({
               //type: "CAPTURE", async: false, crossDomain: true, url: finalUrl, data: XML, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
               type: "CAPTURE", async: false, crossDomain: true, url: finalUrl, data: XML, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
               success: function (data) {
                   var httpStaus = true;
                   var msg = $('#data').val($(data).find('Resp').attr('errInfo'));
                   var ecode = $(data).find('Resp').attr('errCode');
                   if (ecode == "0") {
                      // $('#data').val(data);
                        $('#piddata').val(data);
                           alert("Success Capture");

                       $("#my-form").submit();
                   }
                   else {
                       alert("Device not connected");
                   };
               },
               error: function (jqXHR, ajaxOptions, thrownError) {
                   alert(thrownError);
               }
           });

    };



    function CaptureAvdm() {



        var DevicePortID = "#DevicePortID";

        var Port = $(DevicePortID).val();

        var Fullname = $("#Fullname").val();

        var finalUrl = "http://127.0.0.1:11100/rd/capture";



        if (Port == "") {

            finalUrl = "http://127.0.0.1:11100/rd/capture";

        }

        else {

            finalUrl = "http://127.0.0.1:" + Port + "/rd/capture";

        }

        var Fname = Fullname;

        var XML = '<PidOptions ver=\"1.0\"> <Opts fCount=\"1\" format=\"0\" pidVer=\"2.0\" timeout=\"20000\" env=\"P\" posh=\"RIGHT_INDEX\" wadh=\"+0njvZli4IkkbxG9yNKSWNMG7RNY6OhyWBUf/n5Dag4=\" /></PidOptions>';





        var verb = "CAPTURE";

        var err = "";

        var res;

        var Port = $("#Port").val();

        var xmlstr;

        $.support.cors = true;

        var httpStaus = false;

        var jsonstr = "";



        $.ajax({



            type: "CAPTURE",

            async: false,

            crossDomain: true,

            url: finalUrl,

            data: XML,

            contentType: "text/xml; charset=utf-8",

            processData: false,

            dataType: "text",

            success: function (data) {

                httpStaus = true;

                res = { httpStaus: httpStaus, data: data };

                xmlstr = data;

                var $doc = $.parseXML(data);



                var Message = $($doc).find('Resp').attr('errInfo');

                if (Message.toUpperCase() == "SUCCESS") {

                    callPostXML(data);



                }

                else {

                    alert(Message);

                };

            },

            error: function (jqXHR, ajaxOptions, thrownError) {

                alert(thrownError);

                res = { httpStaus: httpStaus, err: getHttpError(jqXHR) };

            }

        });

    };



    function callPostXML(data) {





        var PIDStr = $(data);

        var Resp_errCode = $(PIDStr).find('Resp').attr('errCode');

        $('#Resp_errCode').val(Resp_errCode);

        var Resp_errInfo = $(PIDStr).find('Resp').attr('errInfo');

        $('#Resp_errInfo').val(Resp_errInfo);

        var Resp_fCount = $(PIDStr).find('Resp').attr('fCount');

        $('#Resp_fCount').val(Resp_fCount);

        var Resp_nmPoints = $(PIDStr).find('Resp').attr('nmPoints');

        $('#Resp_nmPoints').val(Resp_nmPoints);

        var Resp_qScore = $(PIDStr).find('Resp').attr('qScore');

        $('#Resp_qScore').val(Resp_qScore);

        var DeviceInfo_dpId = $(PIDStr).find('DeviceInfo').attr('dpId');

        $('#DeviceInfo_dpId').val(DeviceInfo_dpId);

        var DeviceInfo_rdsId = $(PIDStr).find('DeviceInfo').attr('rdsId');

        $('#DeviceInfo_rdsId').val(DeviceInfo_rdsId);

        var DeviceInfo_rdsVer = $(PIDStr).find('DeviceInfo').attr('rdsVer');

        $('#DeviceInfo_rdsVer').val(DeviceInfo_rdsVer);

        var DeviceInfo_dc = $(PIDStr).find('DeviceInfo').attr('dc');

        $('#DeviceInfo_dc').val(DeviceInfo_dc);

        var DeviceInfo_mi = $(PIDStr).find('DeviceInfo').attr('mi');

        $('#DeviceInfo_mi').val(DeviceInfo_mi);

        var DeviceInfo_mc = $(PIDStr).find('DeviceInfo').attr('mc');

        $('#DeviceInfo_mc').val(DeviceInfo_mc);

        var Skey = $(PIDStr).find('Skey').text();

        $('#Skey').val(Skey);

        var Skey_ci = $(PIDStr).find('Skey').attr('ci');

        $('#Skey_ci').val(Skey_ci);

        var Hmac_str = $(PIDStr).find('Hmac').text();

        $('#Hmac_str').val(Hmac_str);

        var Data_Type = $(PIDStr).find('Data').attr('type');

        $('#Data_Type').val(Data_Type);

        var Data_str = $(PIDStr).find('Data').text();

        $('#Data_str').val(Data_str);

        var UID = $("#EnterAadhaarNumber").val();

          $('#UID').val(UID);

          var relation = $("#relation").val();

          $('#rl').val(relation);



         // var rel_name = $("#rel_name").val();

         // $('#sr').val(rel_name);



       document.f1.submit();

    }





</script>

<?php include('userFooter.php'); ?>
