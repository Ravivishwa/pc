<?php include('userHeader.php'); ?>

<!-------start link for popup video-------->
<link rel="stylesheet" href="popup/videopopup.css" />
<!-------stop link for popup video-------->

      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Advance PAN Print</h1>
								</div>
							</div>
						</div>


						<!-- /# row -->
						<section id="main-content">
							<div class="row">
							    <?php if($msg !='') { ?>
									<div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
								<?php } elseif($msgno !='') { ?>
									<div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
								<?php  } ?>
								</br>
								
								
									
									
									
										
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
										    <input class="form-control valid" id="advAdhNum"  placeholder="Enter Customer's PAN Number (कस्टमर का पैन कार्ड नंबर डाले)" name="EnterAadhaarNumber" type="text" autocomplete="off">
											<input id="dp" type="hidden" value="11100">
											 <input id="bioData" type="hidden" value="">
										   </div>
										   </div></div>
										   
										   
										   
										   </div>
										    <div class="col-md-2 col-sm-3 col-xs-6">
												<label>&nbsp;</label>
												<div class="form-group">  
												<script type="text/javascript">
			                                   function showMessage(){
				                               alert("Your Wallet Balance is Low Please Recharge Now.");
			                                                     }
		                                                       </script>            
												   <button  class="btn btn-success btn-block" onClick='showMessage()'>Print</button> 
												   
												</div> 
											</div></div><br><br><br>
											<!-------------
											<div class="col-md-6 col-sm-6 col-xs-6" >
												<label>MPTASS </label>
												</br>
												<a style="font-size:18px;font-weight:bold;color:red" href="https://www.tribal.mp.gov.in/mptaas/Registration/Index" target="_blank">MPTASS WEBSITE LINK (CLICK HERE)</a>
										  
										  --------->
                                           


											
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
		

<form  action="ainfo.php" method="post" name='f1' style="display:none;">
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



<!------- For popup video------------->

 
<!------- For popup video------------->