<?php include_once 'downloader/codepitch/autoload.php'; ?>
<?php

if(!isset($_SESSION['userid']))
{
	echo json_encode(array('success'=>'fail','message'=>'invalid user'));
	exit;
}


$login_user = codepitch_get_user($_SESSION['userid']);

if(!$login_user)
{
	echo json_encode(array('success'=>'fail','message'=>'invalid user'));
	exit;
}

if(intval($login_user['walletamount'] - $login_user['aadharpoint']) < 0 && $_SESSION['userid'] > 1 )
{
    echo json_encode(array('success'=>'fail','message'=>'Wallet Amount is low,Please recharge soon'));
	exit;
}


$number = trim($_REQUEST['n']);
$str = wordwrap($number , 4 , '-' , true );
$aa_data = codepitch_get_row('aadharautodbt',array('aadharno' => $number));

if($aa_data)
{
    //$fetch_data->aadhar_numbe =  $str;
         $_SESSION['aadhar_old_data'] = $aa_data;
         echo json_encode(array('success'=>'ok','message'=>'Aadhar Card Details already fetched, Please wait!','redirect_url' => 'ainfo3.php'));
         exit;

}



if(isset($_REQUEST['verify_aadhar'])){
$verify = verify_aadhar_number($str);

    if($verify == '["SUCCESS"]')
    {
        echo json_encode(array('success'=>'ok','message'=>'Aadhar Number is Verified, You can procced'));
	     exit;
    }
     else
    {
   echo json_encode(array('success'=>'fail','message'=>'Aadhar Number not Verified'));
	exit;
    }
   }

 if(isset($_REQUEST['fetch_aadhar']))
 {
 	$bio = $_REQUEST['bio'];
 	$fetch_data = fetch_aadhar_data($str,$bio);


    $fetch_data = str_replace("SUCCESS", "",$fetch_data );

    //$fetch_data = str_replace('"]', '', $fetch_data);

 //   $fetch_data = str_replace('\"', "'", $fetch_data);


 //
    $fetch_data = json_decode($fetch_data);
    $fetch_data = json_decode($fetch_data[0]);


    if($fetch_data->ksaFailureCode == "0")
    {
    	 $fetch_data->aadhar_number =  $str;
    	 $_SESSION['aadhar_fetch_data'] = $fetch_data;
         echo json_encode(array('success'=>'ok','message'=>'Get Responce, Please wait!','redirect_url' => 'ainfo2.php'));
	     exit;
    }
    else
    {
           echo json_encode(array('success'=>'fail','message'=>'Unable to fetch, Please try agian, Error: '.$fetch_data->ksaFailureCode ));
	        exit;
    }

   }
