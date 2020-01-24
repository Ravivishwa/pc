


<script type="text/javascript">
    $("#remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/deleteuser.php.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");
               }
            });
        }
    });


</script>



<?php include('userHeader.php'); ?>
      <div class="content-wrap">
            <div class="main">
			    <div class="col-md-12">
					<div class="container-fluid">
						<div class="row">
							<div class="page-header">
								<div class="page-title">
									<h1>User List</h1>
								</div>
							</div>
						</div>
						<!-- /# row -->
						<section id="main-content">
							<div class="row dgnform">
							    <div class="col-md-12 col-sm-12 col-xs-12" style="    margin-left: 14px;">

								<table id="ulist" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
								<thead>
									<tr style="background:#ff9b00;">
									<th style="color:#fff">   Sn.No.       </th>
									<th style="color:#fff">   Name       </th>
									<th style="color:#fff">   USER ID      </th>
									<th style="color:#fff">   UNDER ID      </th>
									<th style="color:#fff">   User Type      </th>

									<th style="color:#fff">   Address      </th>
									<th style="color:#fff">   Registration Date</th>
									<th style="color:#fff">   Point     </th>

									<th style="color:#fff">   Password      </th>


									<?php if ($_SESSION['usertype'] != "RETAILER") { ?>
										<th style="color:#fff">   Action      </th>

									<?php } ?>
									<?php if ($_SESSION['userid'] == 1) { ?>
									    <th style="color:#fff">   Reject & Delete      </th>
									<?php } ?>
									</tr>
									</thead>
									<tbody>
									<?php
									if ($_SESSION['userid'] == 1) {
										$sql="";
										$sql="SELECT `userid`,`usertype`,`fullname`,  `usertype`, `panimage`,`aadharimage`,`loginname`,`status`,  `pswrd`, `emailid`, `adhaarno`, `mobileno`,  `address`, `logdate`, `cityname`, `statename`, `refrenceid`, `remarks`, `walletamount`,`ispaid` FROM `tbluser`  order by userid desc";
									} else {
										$sql="";
										$sql="SELECT  `userid`,`usertype`,`fullname`, `usertype`, `panimage`,`aadharimage`, `loginname`,`status`,  `pswrd`, `emailid`, `adhaarno`, `mobileno`,  `address`,`logdate`,`cityname`,`statename`, `refrenceid`,`remarks`, `walletamount`,`ispaid`  FROM `tbluser` where refrenceid='".$_SESSION['userid']."' order by userid desc";
									}
									$a = mysqli_query($connection,$sql); $x = 0 ; ?>
									<?php while($b = mysqli_fetch_array($a)){
                                        $counts = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where userid=".$b['refrenceid'].""));
									if($counts != 0)
									{

									$k = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$b['refrenceid'].""));
									 $name = $k['loginname'];
									 $id_parent = $k['userid'];
									}
									else
									{
										$name = '';
									}
									$x++; ?>

									<tr  id="<?php echo $b['userid'] ?>">
										<td > <?=$x?> </td>
										<td > <?=$b['fullname']?> </td>
										<td > <?=$b['loginname']?> </td>
										<td > <?=$name?> </td>
										<td > <?=$b['usertype']?> </td>
										<td > <?=$b['address'].' '.$b['cityname'].' '.$b['statename']?> </td>
										<td > <?=$b['logdate']?> </td>
										<td > <?=$b['walletamount']?> </td>


										<?php if ($_SESSION['usertype'] != "RETAILER") { ?>
										   <td > <?=$b['pswrd']?> </td>


										   <td align="center" valign="middle">
											<form action="edituser.php" method="post" enctype="multipart/form-data" >
												<input name="userid" type="hidden" value="<?=$b['userid']?>" />
												<input style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;" class="btn btn-primary" type="submit" value="Edit" />
											</form>
										   </td>
										<?php } ?>
										<?php if($fetch['usertype'] == 'MAINADMIN') {?>
										   <td align="center" valign="middle"><a class="btn btn-danger" href="<?php echo 'deleteuser.php?id='.$b['userid'] ?>" onClick="javascript:return confirm('are you sure you want to delete this?')">Delete</a></td>
										<?php } ?>
									</tr>
									<?php } ?>
									</tbody>
								</table> </div>
								<div class="clearfix"></div>
							 </div>
						</section>
					</div>
				</div>
            </div>
        </div>
		<style>
		tbody tr td
		{
			padding:6px !important;
		}
		thead tr th
		{
			text-align:center !important;
		}
		</style>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
						 <?php include('userFooter.php');?>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
			<script>
			$(document).ready(function() {
	$('#ulist').dataTable();
			});
			</script>
