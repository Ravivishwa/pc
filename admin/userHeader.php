<?php include('config.php'); error_reporting(0); session_start(); if($_SESSION["user"]==""){ header("location: index.php"); exit();
}?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">






    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131318637-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131318637-1');
</script>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-5017244546888867",
          enable_page_level_ads: true
     });
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=1024, initial-scale=0, maximum-scale=1.0, minimum-scale=0.25, user-scalable=yes" />
		<link rel="icon" href="favicon.ico" type="image/x-icon" />

		<!------------------------------ # connection ------------------------------->
						<?php
												error_reporting(0);
												include("config.php");


												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>

						<!------------------------------ # connection ------------------------------->

        <title><?php echo $slct['webname'];?></title>
        <!-- Styles -->
        <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/lib/themify-icons.css" rel="stylesheet">

        <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/lib/helper.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/main.css" rel="stylesheet">


		<link href="assets/css/linearicons.css" rel="stylesheet">
	<link href="assets/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/css/ionicons.css" rel="stylesheet">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/scoop-vertical.min.css" rel="stylesheet">
    <link href="assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">




	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/scoop.min.js"></script>
	<script src="assets/js/demo-25.js"></script>

	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/jquery.mousewheel.min.js"></script>

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


        <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">


        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script type="text/javascript" src="js/llqrcode.js"></script>
        <script type="text/javascript" src="js/webqr.js"></script>


    </head>

                                                <?php
												error_reporting(0);
												include("config.php");


												$sqla="select * from setting";
												$updt = mysqli_query($connection,$sqla) ;
												$slct = mysqli_fetch_array($updt);
												//$slct = mysqli_fetch_assoc($r);
												//$slct['aadharpoint'];

												?>



    <body style="overflow: auto;">
	<div class="se-pre-con"></div>
		<style>
		.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://wpamelia.com/wp-content/uploads/2018/11/ezgif-2-6d0b072c3d3f.gif) center no-repeat #fff;
}
		</style>
		 <script src="assets/js/lib/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script>
        $(document).ready(function() {
            load();
            setimg();
        });
        $(document).bind("contextmenu",function(e){
            return false;
        });
    </script>
<script>
	$(window).load(function(e) {
		e.preventDefault();
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
		</script>
<?php $fetch = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
if($_SESSION['usertype'] == 'ADMIN ')


?>

<div id="scoop" class="scoop">
    <header class="scoop-header">
					<div class="scoop-wrapper">
						<div class="scoop-left-header">
							<div class="scoop-logo">
								<a href="#"><span class="logo-icon"><i class="ion-stats-bars"></i></span>
								<span class="logo-text">Print Portal <span class="hide-in-smallsize"></span></span></a>
							</div>
						</div>
						<div class="scoop-right-header">
							<div class="sidebar_toggle" ><a href="javascript:void(0)" style="color:#fff !important;"><i class="icon-menu"></i></a></div>



							<div class="scoop-rr-header">

								<ul>
								    <?php
								    if($_SESSION['usertype'] != 'MAINADMIN' and $_SESSION['usertype'] != 'ADMIN' and $_SESSION['usertype'] != 'DEMO' and $_SESSION['usertype'] != 'CHANNEL PARTNER' and ($fetch['refrenceid'] == 1 or $fetch['refrenceid'] == 2))
								    {
								    ?>
								    <li><a href="upgradeacc.php" class="btn btn-success" style="color:#fff;margin-right: 39px;border-radius: 50px;">Upgrade Account</a></li>
								    <?php } ?>
								    <li class="dropdown notifications-menu">
            <a href="#"  data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o" style="color:#fff !important;"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: auto; width: 100%; height: 200px;">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-pink"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-pink"></i> You changed your username
                    </a>
                  </li>
                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li class="dropdown user user-menu" style="padding: 10px;"></li>

								<li class="dropdown user user-menu">
            <a href="#"  data-toggle="dropdown">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="user-image" alt="User Image">

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['usertype'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center" style="width: 50%;">
                    <a href="#">Points</a>
                  </div>
                  <?php $mbno = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));?>
                  <div class="col-xs-4 text-center" style="width: 50%;">
                    <a href="#">Mobile No</a>
                  </div>

                <div class="col-xs-4 text-center" style="width: 50%;">
                    <a href="#">
                     <?php
                        $q = "";
                        $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                        $r = mysqli_query($connection,$q);
                        $rw = mysqli_fetch_assoc($r);
                        ?>
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
											</a>
                  </div>

                  <div class="col-xs-4 text-center" style="width: 50%;">
                    <a href="#"><?php echo $mbno['mobileno'];?></a>
                  </div>

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer" style="display: flow-root;">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">profile</a>
                </div>
              </li>
            </ul>
          </li>


								</ul>
							</div>
						</div>
					</div>
				</header>
        <nav class="scoop-navbar">
							<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
							<div class="scoop-inner-navbar">
							<div class="scoop-search">
									<span class="searchbar-toggle">  </span>
									<div class="scoop-search-box ">
										<input type="text" placeholder="Search">
										<span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
									</div>
								</div>
								 <ul class="scoop-item scoop-brand">
									<li class="active">
										<a href="panel.php">
											<span class="scoop-micon"><i class="icon-speedometer text-info"></i></span>
											<span class="scoop-mtext">DashBoard</span>
											<span class="scoop-mcaret"></span>
										</a>
									</li>
									<?php if($fetch['walletamount'] <=2 and $fetch['fstatus'] == 'FREE') {?>
									<li class="active" >
										<a href="#" style="background:green !important;">
											<span class="scoop-micon"><i class="icon-speedometer"></i></span>
											<span class="scoop-mtext rech_now">Recharge Now </span>
											<span class="scoop-mcaret"></span>
										</a>
									</li>
									<?php } ?>
								</ul>
								<ul class="scoop-item scoop-left-item">
								<?php if($fetch['usertype'] == 'MAINADMIN'  ) {?>
									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="icon-lock-open"style="color:green"></i></span>
											<span class="scoop-mtext">ADMIN</span>

											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="settingn.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">SETTING</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
												<li class=" ">
												<a href="admin-advance.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">AADHAR SETTING</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


											<li class="  ">
												<a href="issuelist.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">SUPPORT REQUEST</span>
													<?php $icount = mysqli_num_rows(mysqli_query($connection,"select * from support"));  ?>
													<span class="scoop-badge badge-success"><?php echo $icount;?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="loglist.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">LOG REPORT</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="report.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">ENTRY REPORT</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="blockcitywise.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">BLOCK CITY</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="blockpinwise.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">BLOCK PINCODE</span>
													<span class="scoop-mcaret"></span>
												</a>
												<li class=" ">
												<a href="#">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">BLOCK MOBILENO</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="blockipwise.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">BLOCK IP</span>
													<!-- <span class="scoop-badge badge-danger">New</span>-->
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="alist_admin_list.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">ADMIN LIST</span>
														<?php $acount = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where usertype='ADMIN'"));  ?>
													<span class="scoop-badge badge-success"><?php echo $acount; ?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="lead_list_admin.php">
													<span class="scoop-micon"><i class="icon-link"></i></span>
													<span class="scoop-mtext">LEAD LIST</span>
													<?php $lcount = mysqli_num_rows(mysqli_query($connection,"select * from lead_data"));  ?>
													<span class="scoop-badge badge-success"><?php echo $lcount; ?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


										</ul>
									</li>
									<?php } ?>

									<?php if($fetch['usertype'] == 'DISTRIBUTER' or $fetch['usertype'] == 'SUPER DISTRIBUTER' or $fetch['usertype'] == 'ADMIN' or $fetch['usertype'] == 'MAINADMIN' or $fetch['usertype'] == 'CHANNEL PARTNER') {?>
									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-database text-info"></i></span>
											<span class="scoop-mtext">MASTER</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="user.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">ADD USER</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="userlist.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">USER LIST</span>

													<?php
													if($_SESSION['userid'] == 1)
													{
													    $ucount = mysqli_num_rows(mysqli_query($connection,"select * from tbluser"));
													}
													else if($_SESSION['usertype'] == 'ADMIN') {
													    $url = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));
													    $ucount = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where refrenceid='".$_SESSION['userid']."' or remarks='".$url['remarks']."'"));
													}
													else
	 												{
	                                                   $ucount = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where refrenceid='".$_SESSION['userid']."'"));

													}
													?>
													<span class="scoop-badge badge-success"><?php echo $ucount;?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="pointtrans.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">POINT TRANSFER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="pointtranslist.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">POINT TRANSFER LIST</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php if ($fetch['usertype'] == 'ADMIN' or $fetch['usertype'] == 'MAINADMIN') {?>
											<li class=" ">
												<a href="poindebit.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">POINT DEBIT</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

											<li class=" ">
												<a href="pointdebitlist.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">POINT DEBIT LIST</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php }?>


									</li>
									<li class="  ">
												<a href="userlist1.php">
													<span class="scoop-micon"><i class="icon-mustache"></i></span>
													<span class="scoop-mtext">APP SETTING</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>
									</ul>
									<?php } ?>
                                    <li cla ss="scoop-hasmenu">
                                        <a href="qr.php">
                                            <span class="scoop-micon"><i class="fa fa-qrcode"></i></span>
                                            <span class="scoop-mtext">Generate QR Code</span>
                                            <span class="scoop-mcaret"></span>
                                        </a>
                                    </li>
									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa fa-id-card text-primary"></i></span>
											<span class="scoop-mtext">AADHAAR</span>
											<span class="scoop-badge badge-danger">New</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="aaadhar3.php">
													<span class="scoop-micon"><i class="icon-cursor "></i></span>
													<span class="scoop-mtext">ADVANCE PRINT</span>
													<span class="scoop-badge badge-warning">New</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="aaadhar.php">
													<span class="scoop-micon"><i class="icon-cursor "></i></span>
													<span class="scoop-mtext">MORPHO AADHAAR </span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

											<li class="  ">
												<a href="aadharlistdbt.php">
													<span class="scoop-micon"><i class="icon-cursor "></i></span>
													<span class="scoop-mtext">AADHAAR PRINT lIST</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">												<a href="aadharauto.php">													<span class="scoop-micon"><i class="icon-cursor "></i></span>													<span class="scoop-mtext">AADHAAR PRINT (SSO)</span>													<span class="scoop-mcaret"></span>												</a> 												</li>
											<li class=" ">
												<a href="aadharlist.php">
													<span class="scoop-micon"><i class="icon-cursor "></i></span>
													<span class="scoop-mtext">PRINT LIST</span>
														<?php $acount = mysqli_num_rows(mysqli_query($connection,"select * from aadharauto where userid=".$_SESSION['userid'].""));  ?>
													<span class="scoop-badge badge-success"><?php echo $acount; ?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

											<li class=" ">

												<a href="javascript:void(0)">
													<span class="scoop-micon"><i class="icon-cursor"></i></span>
													<span class="scoop-mtext">PVC</span>
													<span class="scoop-badge badge-danger">COMMING SOON</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


										</ul>
									</li>
									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa fa-id-badge text-success"></i></span>
											<span class="scoop-mtext">VOTER</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
										<?php if($fetch['walletamount'] <= 0) {?>
											<li class="  ">
												<a href="votercardauto-eci.php">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">ADVANCE PRINT</span>
												<span class="scoop-badge badge-success">NEW</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php } ?>
											<li class="  ">
												<a href="votercardauto-eci.php">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">CSC VOTER</span>
												<span class="scoop-badge badge-success">NEW</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>






									<li class="  ">
												<a href="voterlist-eci.php">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">CSC VOTER LIST</span>
													<?php $acount = mysqli_num_rows(mysqli_query($connection,"select * from voterids where add_by=".$_SESSION['userid'].""));  ?>
													<span class="scoop-badge badge-success"><?php echo $acount; ?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

											<li class=" ">												<a href="votercardmanual.php">													<span class="scoop-micon"><i class="icon-wallet"></i></span>													<span class="scoop-mtext">VOTER PRINT</span>													<span class="scoop-mcaret"></span>												</a> 											</li>

											<li class="  ">
												<a href="voterlist.php">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">PRINT LIST</span>
													<?php $acount = mysqli_num_rows(mysqli_query($connection,"select * from voterauto where userid=".$_SESSION['userid'].""));  ?>
													<span class="scoop-badge badge-success"><?php echo $acount; ?></span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php if($fetch['walletamount'] <= 0) {?>
											<li class="  ">
											<script type="text/javascript">
			                                   function showMessage(){
				                               alert("Your Wallet Balance is Low Please Recharge Now.");
			                                                     }
		                                                       </script>
												<a href="#" onClick='showMessage()'>
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">NEW APPLY</span>
												<span class="scoop-badge badge-success">NEW</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php } ?>
											<li class=" ">
												<a href="javascript:void(0)">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">PVC</span>
													<span class="scoop-badge badge-danger">COMMING SOON</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


										</ul>
									</li>
								</ul>
								<ul class="scoop-item scoop-left-item">
									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-address-card-o text-warning"></i></span>
											<span class="scoop-mtext">PAN</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
										<?php if($fetch['walletamount'] <= 0) {?>
											<li class="  ">
												<a href="pan.php">
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">ADVANCE PRINT</span>
												<span class="scoop-badge badge-success">NEW</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>

											<?php } ?>

											<li class=" ">
												<a href="pan.php">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">Advance PAN</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


											<?php if($fetch['walletamount'] <= 0) {?>
											<li class="  ">
											<script type="text/javascript">
			                                   function showMessage(){
				                               alert("Your Wallet Balance is Low Please Recharge Now.");
			                                   }
				                               </script>

												<a href="#" onClick='showMessage()'>
													<span class="scoop-micon"><i class="icon-wallet"></i></span>
													<span class="scoop-mtext">NEW APPLY</span>
												<span class="scoop-badge badge-success">NEW</span>

													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<?php } ?>
											<li class=" ">
												<a href="javascript:void(0)">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">PAN FIND</span>
													<span class="scoop-badge badge-danger">COMING SOON</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="https://www1.incometaxindiaefiling.gov.in/e-FilingGS/Services/LinkAadhaarHome.html" target="_blank">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">LINK AADHAAR TO PAN</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="https://www.onlineservices.nsdl.com/paam/endUserAddressUpdate.html" target="_blank">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">Paperless Address Update in PAN (NSDL)</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="https://www.onlineservices.nsdl.com/paam/ReprintEPan.html" target="_blank">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">REPRINT PAN (NSDL)</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class=" ">
												<a href="https://www.myutiitsl.com/PAN_ONLINE/homereprint" target="_blank">
													<span class="scoop-micon"><i class="icon-arrow-right"></i></span>
													<span class="scoop-mtext">REPRINT PAN (UTI)</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

										</ul>
									</li>

									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-file-text-o text-danger"></i></span>
											<span class="scoop-mtext">ELECTRICITY</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class="#">
												<a href="">
													<span class="scoop-micon"><i class="icon-energy "></i></span>
													<span class="scoop-mtext">ELECTRICITY BILL</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


										</ul>
									</li>




									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa fa-id-badge text-success"></i></span>
											<span class="scoop-mtext">BIKE INFO</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="bike.php">
													<span class="scoop-micon"><i class="icon-energy "></i></span>
													<span class="scoop-mtext">BIKE INFO</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>


										</ul>
									</li>


									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-file-text-o text-danger"></i></span>
											<span class="scoop-mtext">REPORT</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="pointtransinoutlist.php">
													<span class="scoop-micon"><i class="icon-energy "></i></span>
													<span class="scoop-mtext">WALLET IN/OUT LIST</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="asummery.php">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">ACCOUNT SUMMERY</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

										</ul>
									</li>





									<li class="scoop-hasmenu">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-life-ring text-primary"></i></span>
											<span class="scoop-mtext">DRIVER</span>
											<span class="scoop-mcaret"></span>
										</a>
										<ul class="scoop-submenu">
											<li class=" ">
												<a href="software/Morpho_Driver.zip">
													<span class="scoop-micon"><i class="icon-energy "></i></span>
													<span class="scoop-mtext">MORPHO DRIVER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="software/Mantra_driver.zip">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">MANTRA DRIVER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="software/startek.zip">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">STARTEK DRIVER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="software/cogent.zip">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">COGENT DRIVER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="software/Secugen.zip">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">SECUGEN DRIVER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="https://download.anydesk.com/AnyDesk.exe?_ga=2.118113866.294312165.1572149641-2125056760.1572149641">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">ANY DESK</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="https://download.teamviewer.com/download/TeamViewer_Setup.exe">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">TEAM VIEWER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>
											<li class="  ">
												<a href="MorphoRDServiceTestPage.html" target="_blank">
													<span class="scoop-micon"><i class="icon-energy"></i></span>
													<span class="scoop-mtext">MORPHO TESTER</span>
													<span class="scoop-mcaret"></span>
												</a>
											</li>

										</ul>
									</li>
									<li class=" ">
										<a href="traning.php">
											<span class="scoop-micon"><i class="fa fa-youtube text-success "></i></span>
											<span class="scoop-mtext">TRANING VIDEO</span>
											<span class="scoop-mcaret"></span>
										</a>
									</li>

									<li class=" ">
										<a href="changepassword.php">
											<span class="scoop-micon"><i class="fa fa-lock text-warning"></i></span>
											<span class="scoop-mtext">PASSWORD CHANGE</span>

											<span class="scoop-mcaret"></span>
										</a>

									</li>
									<?php if($fetch['usertype'] == 'MAINADMIN') {?>
									<li class=" ">
										<a href="admin_msg.php">
											<span class="scoop-micon"><i class="fa fa-comment "style="color:orange"></i></span>
											<span class="scoop-mtext">POPUP MESSAGE</span>
											<span class="scoop-mcaret"></span>
										</a>
									</li><?php } ?>

									<!----
									<li class=" ">
										<a href="javascript:void(0)">
											<span class="scoop-micon"><i class="fa fa-newspaper-o "></i></span>
											<span class="scoop-mtext">LATEST NEWS</span>
											<span class="scoop-badge badge-warning">New</span>
											<span class="scoop-mcaret"></span>
										</a>
									</li>----------->
                                       <li class=" ">
										<a href="logout.php">
											<span class="scoop-micon"><i class="fa fa-sign-out text-danger "></i></span>
											<span class="scoop-mtext">LOGOUT</span>
											<span class="scoop-mcaret"></span>
										</a>
									</li>
								</ul>

								<!-- <div class="scoop-navigatio-lavel">labels</div> -->
							</div>
						</nav>
						</div>
        <!-- /# sidebar -->




            <style>
                .content-wrap {
    margin-left: 242px;
	height:750px;
}
.row.dgnform {
    padding: 10px;
}

select
{
height: 37px !important;

 }
 .user-menu .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: 12px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #333;
    background-color: #d4d4d4;
    /* border-color: #8c8c8c; */
}
.btn-default:hover, .btn-default:active, .btn-default.hover {
    background-color: #e7e7e7;
}


.navbar-nav>li>.dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
}

.user-menu>.dropdown-menu>.user-footer .btn-default {
    color: #666666;
}

.btn-default {
    background-color: #f4f4f4;
    color: #444;
    border-color: #ddd;
}

ul.dropdown-menu > li {
    float: none !important;
}

.btn.btn-flat {
    border-radius: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border-width: 1px;
}

.user-menu>.dropdown-menu>.user-footer {
    background-color: #f9f9f9;
    padding: 10px !important;
}

.user-menu>.dropdown-menu>li.user-header {
    height: 175px;
    padding: 10px !important;
    text-align: center;
    list-style:inherit !important;
    float:none !important;
}

.user-menu>.dropdown-menu>.user-body a {
    color: #444 !important;
}

.user-menu>.dropdown-menu>.user-body:before, .user-menu>.dropdown-menu>.user-body:after {
    content: " ";
    display: table;
}

.notifications-menu>.dropdown-menu {
    width: 280px;
    padding: 0 0 0 0;
    margin: 0;
    top: 100%;
}
.user-menu>.dropdown-menu>.user-footer:before, .user-menu>.dropdown-menu>.user-footer:after
{
    content: " ";
    display: table;
}

.user-menu > ul.dropdown-menu.show {
    top: 46px !important;
}

.notifications-menu > ul.dropdown-menu.show {
    left: -70px !important;
}

li.footer {
    text-align: center;
}

.pull-left {
    float: left!important;
}
.pull-right {
    float: right!important;
}
.img-circle {
    border-radius: 50%;
}

.user-menu>.dropdown-menu>.user-body {
    padding: 15px !important;
    border-bottom: 1px solid #f4f4f4;
    border-top: 1px solid #dddddd;
}

.user-menu>.dropdown-menu>li.user-header>p {
    z-index: 5;
    color: #fff;
    color: rgba(255,255,255,0.8);
    font-size: 17px;
    margin-top: 10px;
}

.user-menu>.dropdown-menu>li.user-header>img {
    z-index: 5;
    height: 90px;
    width: 90px;
    border: 3px solid;
    border-color: transparent;
    border-color: rgba(255,255,255,0.2);
}

header.scoop-header.iscollapsed {
    background: #354052 !important;
    /* color: #fff; */
}

li.user-header {
    background-color: #00a65a;
}
.user-menu>.dropdown-menu, .user-menu>.dropdown-menu>.user-body {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.notifications-menu>.dropdown-menu {
    width: 280px;
    padding: 0 0 0 0;
    margin: 0;
    top: 100%;
}

.notifications-menu>.dropdown-menu>li.header {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    background-color: #ffffff;
    padding: 7px 10px;
    border-bottom: 1px solid #f4f4f4;
    color: #444444;
    font-size: 14px;
}

.text-pink {
    color: #dd4b39 !important;
}

.text-green {
    color: #00a65a !important;
}

.notifications-menu>.dropdown-menu>li .menu>li>a {
    color: #444444;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 10px;
}

.notifications-menu>.dropdown-menu>li .menu>li>a {
    display: block;
    white-space: unset;
    border-bottom: 1px solid #f4f4f4;
}

.notifications-menu>.dropdown-menu>li {
    position: relative;
}

li>a>.label {
    position: absolute;
    top: 9px;
    right: 7px;
    text-align: center;
    font-size: 9px;
    padding: 2px 3px;
    line-height: .9;
}

.user-menu>.dropdown-menu {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    padding: 1px 0 0 0;
    border-top-width: 0;
    width: 280px;
}

.notifications-menu>.dropdown-menu>li .menu>li>a>.glyphicon,.notifications-menu>.dropdown-menu>li .menu>li>a>.fa, .notifications-menu>.dropdown-menu>li .menu>li>a>.ion {
    width: 20px;
}

 </style>

 <div id="nemd" class="modal fade" role="dialog" style="background-color: rgba(0, 0, 0, 0.9);" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="
    ">
      <div class="modal-header" style="background:#337ab7;color:white;font-weight:bold;font-size:17px;">
       Your Balance Low Please Recharge
        </div>
      <div class="modal-body">


               <div class="col-md-12">
        <div class="col-lg-3 col-md-6">
               <div class="tw-price-box bg-shrock">
                  <div class="pricing-feaures">
                     <div class="pricing-price">
                        <strong>RETAILER</strong>
                     </div>

                     <ul>
                                        <li>Rs. 500</li>
                                        <li>Lifetime Free Print</li>
                                        <li>Unlimited Poind</li>

                                        <li>Free Updates</li>
                                        <li>Anytime Recharge</li>
                                        <li>No Hidden Charge</li>
                                        <li>Free 24/7 Support</li>
                                        <li>24/7 Billing</li>
                     </ul>
                  </div>
                  <!-- Pricing Features End -->
                  <form method="post">
                  <input type="hidden" name="amount" value="500" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Recharge Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>


            <div class="col-lg-3 col-md-6">
               <div class="tw-price-box bg-orange">
                  <div class="pricing-feaures">
                     <div class="pricing-price">
                        <strong>DISTRIBUTER</strong>
                     </div>

                     <ul>
                                        <li>Rs. 2000</li>
                                        <li>Lifetime Free Print</li>
                                        <li>Unlimited Poind</li>

                                        <li>Create Unlimited RETAILER</li>
                                        <li>Anytime Recharge</li>
                                        <li>No Hidden Charge</li>
                                        <li>Free 24/7 Support</li>
                                        <li>24/7 Billing</li>
                     </ul>
                  </div>
                  <!-- Pricing Features End -->
                  <form method="post">
                  <input type="hidden" name="amount" value="2000" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Recharge Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>

            <div class="col-lg-3 col-md-6">
               <div class="tw-price-box bg-green">
                  <div class="pricing-feaures">
                     <div class="pricing-price">
                        <strong> SUPER DISTRIBUTER</strong>
                     </div>

                     <ul>
                                        <li>Rs. 3000</li>
                                        <li>Lifetime Free Print</li>
                                        <li>Unlimited Poind</li>

                                        <li>Create Unlimited RETAILER, DISTRIBUTER</li>
                                        <li>Anytime Recharge</li>
                                        <li>No Hidden Charge</li>
                                        <li>Free 24/7 Support</li>
                                        <li>24/7 Billing</li>
                     </ul>
                  </div>
                  <!-- Pricing Features End -->
                  <form method="post">
                  <input type="hidden" name="amount" value="3000" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Recharge Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>

             <div class="col-lg-3 col-md-6">
               <div class="tw-price-box bg-blue">
                  <div class="pricing-feaures">
                     <div class="pricing-price">
                        <strong>CHANNEL PARTNER</strong>
                     </div>

                     <ul>
                                        <li>Rs. 4000</li>
                                        <li>Lifetime Free Print</li>
                                        <li>Unlimited Poind</li>

                                        <li>Create Unlimited RETAILER, DISTRIBUTER, SUPER - DISTRIBUTER</li>
                                        <li>Anytime Recharge</li>
                                        <li>No Hidden Charge</li>
                                        <li>Free 24/7 Support</li>
                                        <li>24/7 Billing</li>
                    </ul>
                  </div>
                  <!-- Pricing Features End -->
                  <form method="post">
                  <input type="hidden" name="amount" value="4000" class="form-control" readonly size="20" style="width: 224px;margin-top:10px;">
            <input class="form-control "  id="aadharno" name="pay_uidss" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Recharge Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>

        </div>

      </div>

        <style>
        .tw-price-box {
    padding: 1px 0 19px;
    color: #fff;
    text-align: center;
}
.bg-orange {
    background: #FA6742 !important;
}
.bg-shrock {
    background: #2BC2A7 !important;
}
.bg-green {
    background: #32CC73 !important;
}
.bg-blue {
    background: #478FFF !important;
}
.pricing-feaures {
    text-align: center;
    margin-top: 15px;
}
.pricing-price {
    margin: 30px 0 25px;
    text-align: center;
}

.tw-price-box .pricing-price strong {
    color: #fff;
}
.pricing-price strong {
    font-size: 16px;
    color: #2f2c2c;
    font-weight: 700;
    -webkit-transition: all 0.3s linear;
    transition: all 0.3s linear;
}

.pricing-feaures ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.btn {
    font-size: 14px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    padding: 16px 36px;
    border-radius: 50px;
    -webkit-transition: all 0.3s linear 0s;
    transition: all 0.3s linear 0s;
    position: relative;
    z-index: 99;
}


.pricing-feaures ul li {
    display: block;
    margin-bottom: 5px;
}
            .awesome {

      font-family: futura;
      font-style: italic;

      width:100%;

      margin: 0 auto;
      text-align: center;

      color:#313131;
      font-size:45px;
      font-weight: bold;

      -webkit-animation:colorchange 10s infinite alternate;


    }

    @-webkit-keyframes colorchange {
      0% {

        color: blue;
      }

      10% {

        color: #8e44ad;
      }

      20% {

        color: #1abc9c;
      }

      30% {

        color: green;
      }

      40% {

        color: blue;
      }

      50% {

        color: #34495e;
      }

      60% {

        color: blue;
      }

      70% {

        color: #2980b9;
      }
      80% {

        color: red;
      }

      90% {

        color: #2980b9;
      }

      100% {

        color: green;
      }
    }
        </style>

    </div>
<button type="button" class="btn btn-default" data-dismiss="modal" style="    position: absolute;
    top: -17px;
    right: -17px;
    border-radius: 50%;
    background: red;
	border-color:red;
    color: white;">X</button>
  </div>
</div>
<?php
if(isset($_POST['pay_uidss']))
{
    ?>

<?php $infos = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$_SESSION['userid'].""));?>
<form action="success.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_live_jvp4Uai0Ttq4lL" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $_POST['amount'] * 100;?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise or INR 500.
    data-currency="INR"
    data-name="Print Portal"
    data-description="RECHARGE AMOUNT"
    data-prefill.name="<?php echo $infos['fullname'];?>"
    data-prefill.email="<?php echo $infos['emailid'];;?>"
    data-prefill.contact="<?php echo $infos['mobileno'];?>"
    data-theme.color="#F37254"
></script>
<?php
$name = $_POST['amount'];
                                $mobile = $_POST['pay_uidss'];


                                ?>
<input type="hidden"  name="amount" value="<?php echo $name;?>">
<input type="hidden"  name="pay_uid" value="<?php echo $mobile;?>">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
$(function(){

        $('#nemd').modal('hide');
   $('.razorpay-payment-button').click();
   return false;

});
</script>
<?php } ?>


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
    border-radius: 2px;
    margin-bottom: 15px;
}

.info-box-content {
    padding: 20px 10px;
    margin-left: 90px;
}

.progress-description, .info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0,0,0,0.2);
}

</style>
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
