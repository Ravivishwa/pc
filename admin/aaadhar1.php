<?php include('userHeader.php'); ?>





<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />

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



<div class="row">
<div class="col-md-12">
<div class="announcement-banner Announcement_Banner"><div class="title" style="color: rgb(77, 181, 52);"><div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);"><div class="title-content-wrapper">Working 100%</div></div></div><div class="content">Advance Aadhar Print Successfully Working only morpho Devices.</div>
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
									
									
									
										
										<!---- start-off select option
										
										<div class="col-md-12 col-sm-6 col-xs-6" >
												<label>Select File Type</label>
												<div class="form-group">              
												    <select class="form-control" name="sfile" id="sfile">
													<option value="0">Select</option>
													<option value="mptass">MPTASS FIle</option>
													<option value="rajsthan">SSO RAJ. FIle (FOR morpho)</option>
													</select>
                                                </div> 
											</div>
											 
                                                 										
										    <div class="col-md-12 col-sm-6 col-xs-6" >
												<label>Upload MPTASS FIle(.html)</label>
												<div class="form-group">              
												    <input  type="file" class="form-control"  name="imagefile" id="mpt" required="" disabled>
                                                </div> 
											</div>  
											
											                 stop-off select option ----->
															  
															  
											
                                           
										   <form method="post" name="form" autocomplete="off"  enctype="multipart/form-data"  style="width:100%" id="my-form" class="forms">
										   <div class="row dgnform" >
										<div class="row" >
										   <div class="col-md-12 col-sm-6 col-xs-6" style="display: contents;">
										   <div class="col-md-6">
										   <div class="form-group">  
										    <input class="form-control valid" id="advAdhNum" maxlength="12" placeholder="Enter Customer's Aadhaar Number (कस्टमर का आधार नंबर डाले)" name="EnterAadhaarNumber" type="text" autocomplete="off">
											<input id="dp" type="hidden" value="11100">
											 <input id="bioData" type="hidden" value="">
										   </div>
										   </div></div><img class="irc_mi" src="https://product.fingertec.com/images/r3r3c/ICN_precise_recog.gif" data-atf="0" width="170" height="100" style="">

										   
										   
										   
										   </div>
										    <div class="col-md-2 col-sm-3 col-xs-6">
												<label>&nbsp;</label>
												<div class="form-group">              
												   <button  class="btn btn-success btn-block" onclick="capture();return false;">Capture</button> 
												   
												</div> 
											</div></div><br><br><br>
											<!-------------
											<div class="col-md-6 col-sm-6 col-xs-6" >
												<label>MPTASS </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://www.tribal.mp.gov.in/mptaas/Registration/Index" target="_blank">MPTASS WEBSITE LINK (CLICK HERE)</a>
										  
										  --------->
                                            <div class="row dgnform" >
										<div class="row" >
										   <div class="col-md-12 col-sm-12 col-xs-12" style="display: contents;">
										   <div class="col-md-12">
										   <div class="form-group">  
										    <label><font color="red" size="4">सुचना :</label><br>
											<label><font color="#4CFC00 " size="4">1. अगर डाटा एक बार में नहीं आता है तो दुबारा कैप्चर करे डाटा आ जायेगा</label></br>
											<label><font color="#FC0095" size="4">2. इस फंक्शन में सारे डिवाइस ऑटोमेटिक काम करते  है  और सारे डिवाइस सपोर्ट करते है</label><br><br>
	
											
											<label><font color="red" size="4">Notice :</label><br>
											<label><font color="#4CFC00" size="4">1. 
If the data does not come at once, then the data will be captured again</label>
											<label><font color="#FC0095" size="4">2. 
In this function all the devices work automatically and all the devices are supported</label><br>
											
											
											
										   </div>
										   </div></div>											 



											 
												
											</div>
											</div>
											
									</form>		
								
							</div>
							            
                                      <input type="hidden" id="deviceport" />
						
						</section>
					</div>
				</div>
            </div>
        </div>
		

<form  action="ainfo1.php" method="post" name='f1' style="display:none;">
    <input type="text" id="aadhar" name="aadhar"/>
	<textarea name="biodata" id="biodata"></textarea>
</form>
	<?php
$str ='<PidOptions ver=\"1.0\"> <Opts fCount=\"1\" format=\"0\" pidVer=\"2.0\" timeout=\"20000\" env=\"P\" posh=\"RIGHT_INDEX\" wadh=\"+0njvZli4IkkbxG9yNKSWNMG7RNY6OhyWBUf/n5Dag4=\" /></PidOptions>';
$strs ='<?xml version="1.0"?> <PidOptions ver=\"1.0\"> <Opts fCount=\"1\" format=\"0\" pidVer=\"2.0\" timeout=\"20000\" env=\"P\" posh=\"RIGHT_INDEX\" wadh=\"+0njvZli4IkkbxG9yNKSWNMG7RNY6OhyWBUf/n5Dag4=\" /></PidOptions>';

?>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha256-zuyRv+YsWwh1XR5tsrZ7VCfGqUmmPmqBjIvJgQWoSDo=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha256-JirYRqbf+qzfqVtEE4GETyHlAbiCpC005yBTa4rj6xg=" crossorigin="anonymous"></script>
  <script type="text/javascript">
        $(document).ready(function () {
            var rdHost = "http://127.0.0.1:";
            for (var i = 11100; i <= 11105; i++) {
                $.support.cors = true;
                var httpStaus = false;
                $.ajax({
                    type: "RDSERVICE", async: false, crossDomain: true, url: rdHost + i.toString(), contentType: "text/xml; charset=utf-8", processData: false, cache: false,
                    async: false, crossDomain: true, dataType: "text",
                    success: function (data) {
                        var respXML = $.parseXML(data);
                        if ($('RDService', respXML).attr('status') == 'READY') {
                            $('#dp').val(i.toString());
                        }

                        if (!$('#dp').val()) {
                            $('#dp').val(i.toString());
                        }
                    },
                    complete: function (xhr, status) {

                    }
                });
            }
        });
        
        
        function capture() {
            var aadhaar = $('#advAdhNum').val();
            var dp = $('#dp').val();

            var pidoptions = "<PidOptions ver='1.0'> <Opts fCount='1' fType='0' iCount='0' pCount='0' format='0' pidVer='2.0' timeout='20000' otp='' posh='UNKNOWN' env='P' wadh='E0jzJ/P8UopUHAieZn8CKqS4WPMi5ZSYXgfnlfkWjrc=' /></PidOptions>";
            if (!dp) {
                alert('RD Service Unavailable');
                return;
            }

            var rdsURL = "http://127.0.0.1:" + dp + "/rd/capture";
            $.support.cors = true;

            $.ajax({
                type: "CAPTURE", async: false, crossDomain: true, url: rdsURL, data: pidoptions, contentType: "text/xml; charset=utf-8", processData: false, dataType: "text",
                success: function (data) {
                    var errCode = $(data).find('Resp').attr('errCode');

                    if (errCode == "0") {
                        $('#bioData').val(data);
                        
                        alert('Fingerprint Captured Successfully.');
                       $('#aadhar').val(aadhaar);
                       $('#biodata').html(data);
                       document.f1.submit();
                       
                        
                    }
                    else if(errCode != "0"){
                        alert("Device not connected");
                    }
                },
                error: function (xhr, ajaxOptions, error) {
                    alert(error);
                }
            });
        }
    </script>
	
<script>

$(document).ready(function()
{
	$('#sfile').on('change',function()
	{
		var vals = $(this).val();
if(vals == 'mptass')
{
$('#mpt').prop("disabled", false);	
$('#raj').prop("disabled", true);
}
else if(vals == 'rajsthan')
{
	$('#raj').prop("disabled", false);
	$('#mpt').prop("disabled", true);
}
else 
{
	$('#mpt').prop("disabled", true);
	$('#raj').prop("disabled", true);
}
	});
});
</script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="<?php echo $slct['aaofile'];?>" width="<?php echo $slct['iwidth'];?>" height="<?php echo $slct['iheight'];?>"/>
      </div>
      
    </div>
<button type="button" class="btn btn-default" data-dismiss="modal" style="    position: absolute;
    top: -20px;
    right: -422px;
    border-radius: 50%;
    background: red;
	border-color:red;
    color: white;">X</button>
  </div>
</div>
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
</style>

  
   <script>
  setTimeout(function(){ $('#myModal').modal('show'); }, 3000);
  </script>

<?php include('userFooter.php'); ?>