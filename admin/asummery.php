<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>Account Summery</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							
									<div class="col-md-12 col-sm-12 col-xs-12">
										<table class="table-striped table-hover" id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
										<thead>
											<tr style="background:#ff9b00;color:#fff">
												<td style="color:#fff"  align="left" valign="left">   Sn. No.       </td>
												<td style="color:#fff"  align="left" valign="left">   Date       </td>
												<td style="color:#fff"  align="left" valign="left">   Point        </td>
												<td style="color:#fff"  align="left" valign="left">   Dr/Cr        </td>
												<td style="color:#fff"  align="left" valign="left">   From User Name      </td>
												<td style="color:#fff"  align="left" valign="left">   To User Name      </td>
												<td style="color:#fff"  align="left" valign="left">   Remark      </td>
												
											</tr> 
											</thead>
											<tbody>
											<?php
										
												if(isset($_POST['Search'])) {
												    $frmdt = date('Y-m-d', strtotime($_POST['fromdate']));
												    $todt = date('Y-m-d', strtotime($_POST['todate']));
													$name = strtoupper($_POST['username']);
										
													if ($name == "") {
														if ($_SESSION['userid'] == 1) {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where    transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transid desc");
															$y = 0 ; 
														} else {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														}
													} elseif ($name <> "") {
														if ($_SESSION['userid'] == 1) {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														} else {
															$a = mysqli_query($connection,"SELECT * FROM tbltrans where userid='".$_SESSION['userid']."' and transdate BETWEEN '".$frmdt."' AND '".$todt."' ORDER BY transdate,transid");
															$y = 0 ; 
														}
													}
												}
												else {
													date_default_timezone_set('Asia/Kolkata');
                                                    //$todt = date('Y-m-d');
													$frmdt = date("Y-m-01");
													$todt = date("Y-m-d");
													if ($_SESSION['userid'] == 1) {
														$a = mysqli_query($connection,"SELECT  * FROM tbltrans      ORDER BY transid desc");
														$y = 0 ; 
													} else {
														$a = mysqli_query($connection,"SELECT  * FROM tbltrans where userid='".$_SESSION['userid']."'   ORDER BY transid desc");
														$y = 0 ; 
													}
												}
												//echo $frmdt;
												?>
											<?php while($b = mysqli_fetch_array($a)){ $x++; $date = date_create($b['transdate']); ?>
											<tr id="">
												<td align="left" valign="left"> <?=$x?> </td>
												<td align="left" valign="middle"> <?=date_format($date, 'j M Y')?> </td>
												<td align="left" valign="left"> <?=$b['transqty']?> </td>
												<td align="left" valign="left"> <?=$b['transtype']?> </td>
												<td align="left" valign="left"> <?=$b['username']?> </td>
												<td align="left" valign="left"> <?=$b['tousername']?> </td>
												<td align="left" valign="left"> <?=$b['remark']?> </td>
											</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="clearfix"></div>
								
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
            <style>
		td
		{
			padding:6px !important;
		}
		thead tr th
		{
			text-align:center !important;
		}
		</style>
<?php include('userFooter.php'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
			
			<link rel="stylesheet" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
			<script>
			$(document).ready(function() {
	$('#ulist').dataTable( {
     dom: 'lBfrtip',
	 pageLength:50,
        buttons: [
           
            'excelHtml5',
            'pdfHtml5'
        ]
	
	});
			});
			</script>
			<?php include('userFooter.php'); ?>