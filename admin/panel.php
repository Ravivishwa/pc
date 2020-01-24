<?php include('userHeader.php');

?>


<link rel="stylesheet" href="popup/videopopup.css" />
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Hello, <span>Welcome to Our Portal</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4 p-l-0 title-margin-left">
                            <div class="page-header">
                                <div class="page-title">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    
                    <?php 
                        $q = "";
                        $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                        $r = mysqli_query($connection,$q);
                        $rw = mysqli_fetch_assoc($r);
                        $rw['fullname'];
                    ?>

                    <section id="main-content">
                        <div class="row">
                            
                           <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon "><i class="fa fa-rupee"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Points</span>
              <span class="info-box-number">
                  
                  

                                            <?php 
                                            if($fetch['ustatus'] == 1)
                                            {
                                                echo 'Unlimited';
                                            }
                                            else 
                                            {
                                                echo $rw['walletamount'];
                                            }
                                            ?>
										
											
											
										
											
											
											
										
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		  
		  
		  
		  
        </div>
									
                            
                            <?php if($_SESSION['usertype']=="MAINADMIN"){ ?>
                            
                           <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-warning">
            <span class="info-box-icon "><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total ADMIN</span>
              <span class="info-box-number">
                  
                 <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='ADMIN'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
							
							 
							 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon "><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total CHANNEL PARTNER</span>
              <span class="info-box-number">
                  
                <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='CHANNEL PARTNER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-warning">
            <span class="info-box-icon "><i class="fa fa-share-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Super Distributer</span>
              <span class="info-box-number">
                  
               <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='SUPER DISTRIBUTER'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Distributer</span>
              <span class="info-box-number">
                  
              <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='DISTRIBUTER'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
						
							
				 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-info">
            <span class="info-box-icon "><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Retailer</span>
              <span class="info-box-number">
                  
               <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>				
							

                               
									
									
									
									
									
									
						

	
									
									
									
									
									
									
									
									

                                    <!-- /# card -->
                                </div>
                            <?php } elseif ($_SESSION['usertype']=="ADMIN") { ?>
							
							 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon "><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total CHANNEL PARTNER</span>
              <span class="info-box-number">
                  
                <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='CHANNEL PARTNER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-warning">
            <span class="info-box-icon "><i class="fa fa-share-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Super Distributer</span>
              <span class="info-box-number">
                  
               <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='SUPER DISTRIBUTER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Distributer</span>
              <span class="info-box-number">
                  
              <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='DISTRIBUTER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
						
							
				 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-info">
            <span class="info-box-icon "><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Retailer</span>
              <span class="info-box-number">
                  
               <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
						
                            <?php } elseif ($_SESSION['usertype']=="CHANNEL PARTNER") { ?>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-warning">
            <span class="info-box-icon "><i class="fa fa-share-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Super Distributer</span>
              <span class="info-box-number">
                  
<?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='SUPER DISTRIBUTER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Distributer</span>
              <span class="info-box-number">
                  
            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='DISTRIBUTER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
						
							
				<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-info">
            <span class="info-box-icon "><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Retailer</span>
              <span class="info-box-number">
                  
               <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
                            
                            
                                
                            <?php } elseif ($_SESSION['usertype']=="SUPER DISTRIBUTER"){ ?>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Distributer</span>
              <span class="info-box-number">
                  
            <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='DISTRIBUTER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>	
						
							
				 <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-info">
            <span class="info-box-icon "><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Retailer</span>
              <span class="info-box-number">
                  
              <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
                                
                            <?php } elseif ($_SESSION['usertype']=="DISTRIBUTER"){ ?>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-info">
            <span class="info-box-icon "><i class="fa fa-user-secret"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Retailer</span>
              <span class="info-box-number">
                  
              <?php 
                                                $q = "";
                                                $q = "SELECT count(*) as cnt FROM tbluser where usertype='RETAILER' and refrenceid='".$_SESSION['userid']."'";
                                                $rr = mysqli_query($connection,$q);
                                                $rorw = mysqli_fetch_assoc($rr);
                                                $rorw['cnt'];
                                            ?>
                                            <?php echo $rorw['cnt']; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
                                
                            <?php } ?>
                            <!-- /# column -->
                            <?php
							
                            $sql="";
                            $sql = "SELECT msg FROM tblmsg ";
                            mysqli_set_charset($connection,"utf8");
                            $aba = mysqli_query($connection, $sql);
                            $bba = mysqli_fetch_array($aba);
                            // echo $bba['msg']
                            ?>
                            <div class="col-lg-12">
                                   <!--- <div class="card">
                                        <div class="stat-widget-two">
                                           <!-- <div class="stat-content">
                                                <div class="stat-text">Message:-</div>
                                                <div class="stat-digit"> <?php echo $bba['msg'];?></div>
												
												
												
												
											
                                             
      
												
                                            </div>
                                           
                                        </div>----->
										
                                    </div>
									
                                    <!-- /# card -->
									
									<div class="row" >
									<div class="col-md-12" style="display: contents;">
									<div class="col-md-4">
									
									<div class="dropdown">
  
</div>	</div>
	<div class="col-md-4">

												
								
					
					<div class="col-md-4">
	
</div>	</div>
					
					
                        </div>
					<!----	
						<a href="https://forms.gle/uHbTxW5zPaLr8P218" target="_blank" style="color:white;" target="_blank"><h6 style="text-align:left;position:fixed;bottom:-8px; margin-top:40px;background:orange;color:white;padding:10px;left: 230px;"><img src="flashingNew.gif" alt="Example" width="70" height="30">Suggestion Here / आपके सुझाव</h6></a>
						
					</section> ---->
					</br>
					<?php if($fetch['usertype'] == 'DISTRIBUTER' or $fetch['usertype'] == 'SUPER DISTRIBUTER' or $fetch['usertype'] == 'RETAILER') {?>
					   
				                            
                    
                    <?php }?>
                </div>
				
				
		        </div>
				


				
				</div>
				<style>
				.btn-primary.active, .btn-primary:focus, .btn-primary:hover
				{
					width: 100%;
					        border-radius: 33px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        padding: 14px;
				}
				button.confirm.btn.btn-lg.btn-primary {
    width: 135px;
    border-radius: inherit !important;
}
				.video1
				{
					margin-bottom:0px !important;
				}
				
				</style>
<!-- footer -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="<?php echo $slct['pfile'];?>" width="<?php echo $slct['iwidth'];?>" height="<?php echo $slct['iheight'];?>"/>
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
.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}
.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}
.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    color:#000;
    padding : 0px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 26px !important;
    margin-bottom: 15px;
}
.info-box:hover {
    box-shadow: 0 0 36px #d8dde5;
    opacity: 1;
}
.info-box-content {
    padding: 20px 10px;
    margin-left: 20px !important;
}
.progress-description, .info-box-text {
    display: block;
    font-size: 14px !important;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    color: #fff;
    font-weight: bold;
    font-size: 22px !important;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: right !important;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
    border-radius: 26px !important;
}

</style>



  <script>
  setTimeout(function(){ jQuery('#myModal').modal('show'); }, 3000); 
  </script>
<?php 
if($fetch['walletamount'] <=2 and $_SESSION['usertype'] != 'MAINADMIN' and $_SESSION['usertype'] != 'DEMO' and $fetch['refrenceid'] != 1)
{
	$getdetails = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid =".$fetch['refrenceid'].""));
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha256-zuyRv+YsWwh1XR5tsrZ7VCfGqUmmPmqBjIvJgQWoSDo=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha256-JirYRqbf+qzfqVtEE4GETyHlAbiCpC005yBTa4rj6xg=" crossorigin="anonymous"></script>
<script> swal("Balance Low!", "Your Balance Below 2 point please recharge first then use Our Services. n Contact Your <?php echo $getdetails['usertype'];?> ", "warning");</script>
	<?php 
}
	?>
<?php include('userFooter.php'); ?>
 <script src="popup/videopopup.js"></script>
	<script type="text/javascript">
	
	
		$(function(){
			// Init Plugin
			$(".video1").videopopup({
				'videoid' : 'p6L9u_MzKdg',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
			$(".video2").videopopup({
				'videoid' : '9ipw_IQp8bg',
				'videoplayer' : 'youtube', //options - youtube or vimeo
				'autoplay' : 'true',// options - true or false
				'width' : '900',
				'height' : '510'
			});
		});
    </script>
	