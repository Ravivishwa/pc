
 
<?php include_once 'downloader/codepitch/autoload.php'; ?>
<?php include('userHeader.php'); ?>
<style>
button.btn {
    cursor: pointer;
}
</style>
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

                                    <h1>Advance Aadhar Print</h1>
</div>
</div>
</div>






<style>
                       .Announcement_Banners
                       {
                        background: #fff;
    height: 50px;
    position: relative;
    border-radius: 2px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.1);
    display: table;
    width: 1021px;
     margin-bottom: 10px;   
                       }
                       
                       
                       .Announcement_Banners .title {
    position: relative;
    height: 100%;
    font-size: 50px;
    font-weight: bold;
    color: #fff;
    border-radius: 2px 0 0 2px;
    padding-right: 50px;
}
.Announcement_Banners .title .title-content {
    position: relative;
    font-size: 15px;
    line-height: 18px;
    height: 100%;
    z-index: 1;
    padding-left: 15px;
    color: #fff;
    white-space: nowrap;
    display: table;
}
.Announcement_Banners .title:before, .Announcement_Banners .title:after {
    position: absolute;
    display: block;
    content: "";
}
.Announcement_Banners .title .title-content .title-content-wrapper {
    display: table-cell;
    height: 100%;
    vertical-align: middle;
}
.Announcement_Banners .title:after {
    top: 0;
    width: 60px;
    height: 100%;
    right: 16px;
    background-color: currentColor;
    z-index: 0;
    transform: skewX(-35deg);
}
.Announcement_Banners .content {
    padding: 16px 15px 15px 7px;
    width: 100%;
    font-size:12px;
   
}
.Announcement_Banners .title, .Announcement_Banners .content, .Announcement_Banners .close-btn {
    display: table-cell;
    vertical-align: middle;
}

                           .Announcement_Banner {
    background: #fff;
    height: 50px;
    position: relative;
    border-radius: 2px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.1);
    display: table;
    width: 1021px;
     margin-bottom: 10px;
}
.Announcement_Banner .title {
    position: relative;
    height: 100%;
    font-size: 50px;
    font-weight: bold;
    color: #fff;
    border-radius: 2px 0 0 2px;
    padding-right: 50px;
}
.Announcement_Banner .title .title-content {
    position: relative;
    font-size: 15px;
    line-height: 18px;
    height: 100%;
    z-index: 1;
    padding-left: 15px;
    color: #fff;
    white-space: nowrap;
    display: table;
}
.Announcement_Banner .title:before, .Announcement_Banner .title:after {
    position: absolute;
    display: block;
    content: "";
}
.Announcement_Banner .title .title-content .title-content-wrapper {
    display: table-cell;
    height: 100%;
    vertical-align: middle;
}
.Announcement_Banner .title:after {
    top: 0;
    width: 60px;
    height: 100%;
    right: 16px;
    background-color: currentColor;
    z-index: 0;
    transform: skewX(-35deg);
}
.Announcement_Banner .content {
    padding: 16px 15px 15px 7px;
    width: 100%;
    font-size:12px;
   
}
.Announcement_Banner .title, .Announcement_Banner .content, .Announcement_Banner .close-btn {
    display: table-cell;
    vertical-align: middle;
}
                       </style>
                                </div>

                            </div>

                        </div>

                        <!-- /# row -->

                        <section id="main-content">

                            <div class="row col-md-12 col-sm-12 col-xs-12">
                               <div class="message-area" style="width:100%"> 
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
                                 if(!get_view_state_student_portal())
                                 {
                                    ?>
                                    <div class="announcement-banner Announcement_Banners" style="display: table;"><div class="title" style="color: rgb(255, 0,0);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(255,0,0) 0%, rgb(255,0,0) 50%, rgb(255,0,0) 100%);"><div class="title-content-wrapper"> Server is not ready     </div></div></div><div class="content">Server is Under Maintenance  Refresh Again!!.</div>
</div><?php
                                    
                                 }
                                 else
                                 {

                                    ?>
                                    <div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content">Advance Aadhar Print Successfully Working On All Devices. All Device Detect Automatic. </div>
            </div> <?php

                                 }
                                ?> 

                              </div>
                             </div>
                            
                            <!-- /# row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter Aadhar Number</label>
                                        <input type="text" maxlength="12" minlength="12" id="aadhar_number" class="form-control">
                                    </div>
                                </div>    

                        
                            <div class="col-md-12">

                              <form method="post" action="" name="form" autocomplete="off" enctype="multipart/form-data" style="width:100%" id="my-form" class="forms hidden">
                                            <input type="hidden" name="piddata" id="piddata" />
                                           <div class="row dgnform" style="">

                                        <div class="row">

                                           <div class="col-md-6 col-sm-6 col-xs-6" style="display: contents;">

                                           <div class="col-md-6 selectbox">
                                            <label>Select Device</label>

                                                <div class="form-group">              

                                                    <select class="form-control" data-val="true" data-val-number="The field DevicePortID must be a number." id="DevicePortID" name="DevicePortID"><option value="">--Select--</option> <option text="Mantra Authentication Vendor Device Manager" value="11100">Mantra</option>
                                                        <!-- 
                                                        <option text="NITGEN" value="11100">Nitgen</option>
                                                        -->
<option text="MORPHO" value="11101">Morpho</option></select>

                                                </div>

                                           
                                           </div>

                                           

                                           

                                           <div class="col-md-6" style="visibility:hidden ">

                                           

                                           </div>

                                           </div>

                                            <div class="col-md-12">

                                                <label>&nbsp;</label>

                                                <div class="form-group">              

                                                   <button class="btn btn-success btnReadThumb" onclick="return Select_Capture();">Capture</button>


                                                   <button class="btn btn-success btnReadThumb  hidden" onclick="" id="fetch_Capture">Fetch</button>

                                                

                                                   

                                                </div> 

                                            </div></div>

                                            <!-------------

                                            <div class="col-md-6 col-sm-6 col-xs-6" >

                                                <label>MPTASS </label>

                                                </br>

                                                <a style="font-size:18px;font-weight:bold;color:red" href="https://www.tribal.mp.gov.in/mptaas/Registration/Index" target="_blank">MPTASS WEBSITE LINK (CLICK HERE)</a>

                                          

                                          --------->

                                                

                                                

                                            </div>

                                            </form>

                            </div>              

                            </div>

                        </section>

                    </div>

                </div>

            </div>

        </div>


<input type="hidden" id="deviceport" value="" device="">    

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


$(document).ready(function(){

    
    var primaryUrl = "http://127.0.0.1:";
        for (var i = 11100; i <= 11105; i++) {
            $.support.cors = true;
            var httpStaus = false;
            $.ajax({
                type: "RDSERVICE", async: false, crossDomain: true, url: primaryUrl + i.toString(), contentType: "text/xml; charset=utf-8", processData: false, cache: false,
                async: false, crossDomain: true, dataType: "text",
                success: function (data) {
                    var xdata = $.parseXML(data);
                    if ($('RDService', xdata).attr('status') == 'READY') {
                        $('#deviceport').val(i.toString());
                        var dt = '';
                        var info = '';
                        var path = '';
                        var newport = '';
                        if($('RDService', xdata).attr('info'))
                        {
                            info = $('RDService', xdata).attr('info').toLowerCase();    
                        }

                        console.log(info);

                        
                        if($('Interface#CAPTURE', xdata).attr('path'))
                          {
                            path = $('Interface#CAPTURE', xdata).attr('path').toLowerCase();   
                          }
                        
                        
                        if (info.indexOf("morpho") !== -1) {
                            dt = 'morpho';
                          

                          

                            
                            var newpath = path.split(":");
                            if(Array.isArray(newpath) && newpath.length > 1){
                            var port = newpath[1].split("/");
                               if(Array.isArray(port) && port.length > 1){
                               var newport = port[0].trim();
                               } 
                            }    
                        }

                        if (info.indexOf("mantra") !== -1) {
                            dt = 'mantra';
                            

                          


                            var newpath = path.split(":");
                            if(Array.isArray(newpath) && newpath.length > 1){
                            var port = newpath[1].split("/");
                               if(Array.isArray(port) && port.length > 1){
                               var newport = port[0].trim();
                               } 
                            }   
                        }
                        $('#deviceport').attr("device", dt);
                        $('#deviceport').val(newport);
                    }

                    if (!$('#deviceport').val()) {
                        $('#deviceport').val(i.toString());
                    }
                },
                complete: function (xhr, status) {

                }
            });
        }

    
   
});

    function Select_Capture() {



        


        var AadhaarNo = $('#aadhar_number');






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
            

           captureAll()
             


            

        }

return false;

    }

    

  function captureAll()
  {
       var c = $("#c").val();
                var did = $('#deviceport').val()
                var dt = $('#deviceport').attr("device");
               // var did = jQuery("#DevicePortID").val();


                var finalUrl;
                var pidoptions = "<PidOptions ver='1.0'> <Opts fCount='1' fType='0' iCount='0' pCount='0' format='0' pidVer='2.0' timeout='20000' otp='' posh='UNKNOWN' env='P' wadh='E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=' /><Demo></Demo></PidOptions>";
                if (!did) {
                    alert('RD Service Not Available');
                    return;
                }
                
                if (dt == 'morpho') {
                    pidoptions= "<PidOptions ver='1.0'><Opts fCount='1' fType='0' iCount='' iType='' pCount='' pType='' format='0' pidVer='2.0' timeout='10000' otp='' wadh='E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=' posh=''/></PidOptions>";
                } 
        
                finalUrl = "http://127.0.0.1:" + did + "/rd/capture";
                $.support.cors = true;
                
                $.ajax({
                    type: "CAPTURE", async: false, crossDomain: true, url: finalUrl, data: pidoptions, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
                    success: function (data) {
                      //  var msg = $('#data').val($(data).find('Resp').attr('errInfo'));
                        var ecode = $(data).find('Resp').attr('errCode');
                        var msg = $(data).find('Resp').attr('errInfo');
                       
                        if (ecode == "0" ) {
                            $("#c").val(1);
                            //$('#piddata').val(data);
                            //alert('Aadhaar data captured successfully.');
                            //$('#myForm').submit();

                             $('#piddata').val(data);
                           alert("Success Capture");
                       jQuery(".Select_Capture").addClass('hidden');
                       jQuery(".fetch_Capture").removeClass('hidden');

                       fetch_Capture("#fetch_Capture");
                        }
                        else if(ecode != "0"){
                            alert(msg);
                            //alert("Device not connected");
                        }
                        else if(c != "0"){
                            //alert(msg);
                            alert("Aadhaar data already captured");
                        }
                    },
                    error: function (jqXHR, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
  }

    
    function refresh(){
        location.reload();
    }

    function fetch_Capture(elem)
    {
        var number = jQuery("#aadhar_number").val();
        var device = jQuery("#DevicePortID").val();
         jQuery("#DevicePortID").attr('readonly','readonly');
         var field = jQuery(elem);

         field.attr('disabled');
         field.html('Fetching...');
         var piddata = jQuery("#piddata").val();
         if(number.length == 12)
         {

            field.attr('readonly','readonly');
            jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content"> Process is running, Please wait... </div>');
            jQuery.ajax({
             url: 'verify_aadhar_v2.php',
             method:'post',
             data:{n:number,bio:piddata,fetch_aadhar:true},
             success:function(resp){

                resp = JSON.parse(resp);
                
                if(resp.success == 'fail')
                {
                    jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content">'+resp.message+'</div>');
                    field.removeAttr('readonly');
                }
                else if(resp.success == 'ok'){
                     jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content">'+resp.message+'</div>');
                    // field.removeAttr('readonly'); 
                    //jQuery("#my-form").removeClass('hidden');
                    location.href = resp.redirect_url;
                }

             }

            });
         } 

    }

    

   

    jQuery(document).ready(function(){

       jQuery(document).on('keyup','#aadhar_number',function(){

         var number = jQuery(this).val();
         var field = jQuery(this);
         
         if(number.length == 12)
         {

            field.attr('readonly','readonly');
            jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content"> Process is running, Please wait... </div>');
            jQuery.ajax({
             url: 'verify_aadhar_v2.php',
             method:'get',
             data:{n:number,verify_aadhar:true},
             success:function(resp){

                resp = JSON.parse(resp);
                if(resp.success == 'fail')
                {
                    jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content">'+resp.message+'</div>');
                    field.removeAttr('readonly');
                }
                else if(resp.success == 'ok'){
                    jQuery(".message-area").html('<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100% (Fully Automatic)</div></div></div><div class="content">'+resp.message+'</div>');
                    if(typeof resp.redirect_url !== 'undefined')
                    {
                     location.href = resp.redirect_url;
                    }
                    else
                    {
                       jQuery(".selectbox").hide(); 
                       jQuery("#my-form").removeClass('hidden');

                    }



                     
                    // field.removeAttr('readonly'); 
                    
                }

             }

            });
         }    
       });


       jQuery(document).on('submit','#my-form',function(e){
 
         e.preventDefault(); 
       });

    });

</script>

<?php include('userFooter.php'); ?>