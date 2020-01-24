

 <?php
                                //including the database connection file
                                include("config.php");

if ($_POST) {
	$razorpay_payment_id = $_POST['razorpay_payment_id'];
	
	
	

       

}



												


if(isset($_POST['razorpay_payment_id']))
{
     $userid = $_POST['pay_uid'];
    $amt = $_POST['amount'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    if($amt == 500)
    {
    $type = 'RETAILER';    
    }
    else if($amt == 2000)
    {
        $type = 'DISTRIBUTER';
    }
    else if($amt == 3000)
    {
        $type = 'SUPER DISTRIBUTER';
    }
    else if($amt == 4000)
    {
      $type = 'CHANNEL PARTNER';  
    }
    else 
    {
       $type = 'RETAILER'; 
    }
    
    date_default_timezone_set('Asia/Kolkata');
        $timestamp = date("Y-m-d H:i:s");
        
    	mysqli_query($connection,"insert into wallet_add(`pid`,`uid`,`amt`,`date`)values('".$razorpay_payment_id."',".$userid.",".$amt.",'".$timestamp."')");
   mysqli_query($connection,"update tbluser set walletamount
= walletamount
+ 9999999999,ustatus=1,usertype='".$type."' where userid=".$userid."");

 mysqli_query($connection,"insert into tbltrans(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)values('".$userid."','".$userid."','".$timestamp."','9999999999','Cr','1','".$userid."','online','1','".$timestamp."')");




 $m = mysqli_fetch_assoc(mysqli_query($connection,"select * from tbluser where userid=".$userid.""));
$mobileno = $m['mobileno'];
       
	  
$msgtext = 'date time= '. $timestamp .',  amount= '. $amt .', ';

											?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
											<script>

											

var settings = {

  "async": true,

  "crossDomain": true,

  "url": "https://api.msg91.com/api/sendhttp.php?mobiles=9627409889&authkey=292112AXtRbtLGY5e1039e0P1&route=4&sender=DGGRAM&message=<?php echo $msgtext; ?>&country=91",

  "method": "GET",

  "headers": {}

}



$.ajax(settings).done(function (response) {

  console.log(response);

});

</script>


<script>
	window.location.href="panel.php";
		</script>
<?php } ?>

