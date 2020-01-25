<?php include('userHeader.php'); 
$success = $error = $appl_id = "";

if(isset($_GET['id']) && $_GET['id'] != '')
	$appl_id = base64_decode($_GET['id']);

if($appl_id != ""){
	$sql    = "DELETE from applications where id = ".$appl_id;
	$result = $connection->query($sql);
	$success = "Detail deleted successfully";
}
?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>PDF Print List</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform">
							    <div class="col-md-12 col-sm-12 col-xs-12">
								<table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
									<tr style="background:#ff9b00;">
										<td align="left" valign="left">   Sn.No.       </td>
										<td align="left" valign="left">   Name      </td>
										<td align="left" valign="left">   Card Number    </td>
										<td align="middle" valign="middle">   With Background      </td>
										<td align="middle" valign="middle">   Without Background      </td>
										<td align="middle" valign="middle">   Delete      </td>
									</tr>

									<?php
									$sql="";
									if($_SESSION['userid'] == 1){
										$search_param = "  ";	
									}else {
										$search_param = " AND fk_user_id = ".$_SESSION['logged_user_id'];	
									}
									$sql    = "Select * from applications where year != '' AND qr_image != '' ".$search_param." ORDER BY id desc" ;
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){ $x++;  $date = date_create($b['createdatetime']);
									$appl_id = base64_encode($b['id']);
									?>
									<tr id="a">
										<td align="left" valign="left"> <?=$x?> </td>
										<td align="left" valign="left"> <?=$b['name']?> </td>
										<td align="left" valign="left"> <?=$b['e_card_number']?> </td>
										<td align="center" valign="middle">
											<input type="button" value="Print" class="btn btn-success" onClick='window.open("printpage.php?bg=2&id=<?php echo $appl_id;?>","printwindow")'; style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">
										</td>										
										<td align="center" valign="middle">
												<input type="button" value="Print" class="btn btn-success" onClick='window.open("printpage.php?bg=1&id=<?php echo $appl_id;?>","printwindow");return false;'; style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">
											</td>
										<td align="center" valign="middle">
								<!-- 			<form action="active.php" method="post" enctype="multipart/form-data" >
												<input name="id" type="hidden" value="<?=$b['aadharautoid']?>" />
												<input style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-danger" type="submit" value="Remove" />
											</form> -->
												<div class="btn-group" >
													<a style="padding-left:15px;" class="btn btn-danger" title="Delete" onclick="return confirm('Do you really want to delete?');" href="pdfprintlist.php?delete=1&id=<?php echo $appl_id; ?>"><i class="icon_close_alt2"></i>Remove</a>
												</div>

										</td>
									</tr>
									<?php } ?>
								</table>
								 </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
			<?php include('userFooter.php');?>
