<?php include('userHeader.php');

?>


<link rel="stylesheet" href="popup/videopopup.css" />
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4 p-l-0 title-margin-left">
                            <div class="page-header">
                                <div class="page-title">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Upgrade Account</li>
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
                           
                            
            
            
            <?php 
            if($_SESSION['usertype'] == 'RETAILER')
            {
            ?>
            <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
           
            
           
            <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
            
            
            
             
             <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
            <?php } else if($_SESSION['usertype'] == 'DISTRIBUTER') { ?>
            
                <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
            
            
            
             
             <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
            <?php } else if($_SESSION['usertype'] == 'SUPER DISTRIBUTER') {?>
            <div class="col-lg-4 col-md-6">
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
            <input class="form-control "  id="aadharno" name="pay_usids" type="hidden" readonly  value="<?php echo $_SESSION['userid'];?>">
                 <input type="submit" name="sub_val" class="btn btn-success" value="Upgrade Now" id="pay_now" style="margin-top:10px;background: #000;
    border: none;padding: 13px;
    border-radius: 50px;
"/>
                  </form>
               </div>
               <!--  pricing box ends -->
            </div>
            <?php } ?>
            <?php 
if(isset($_POST['pay_usids']))
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
                                $mobile = $_POST['pay_usids'];
                                
                               
                                ?>
<input type="hidden"  name="amount" value="<?php echo $name;?>">
<input type="hidden"  name="pay_uid" value="<?php echo $mobile;?>">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
$(function(){
   
       
   $('.razorpay-payment-button').click();
   return false;

});
</script>
<?php } ?>
                           </div>
                           </section>
                
						
						     <style>
        .tw-price-box {
    padding: 1px 0 19px;
    color: #fff;
    text-align: center;
}
.razorpay-payment-button
{
    display:none;
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
						</style>			
                                    <!-- /# card -->
									
									<div class="row" >
									
					<!----	
						<a href="https://forms.gle/uHbTxW5zPaLr8P218" target="_blank" style="color:white;" target="_blank"><h6 style="text-align:left;position:fixed;bottom:-8px; margin-top:40px;background:orange;color:white;padding:10px;left: 230px;"><img src="flashingNew.gif" alt="Example" width="70" height="30">Suggestion Here / आपके सुझाव</h6></a>
						
					</section> ---->
				


				
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
	