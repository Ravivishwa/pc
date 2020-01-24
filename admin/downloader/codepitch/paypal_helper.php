<?php
define('SANDBOX_FLAG',true); // set this to false for make paypal live

define('PP_SANDBOX_CLINET_ID','ASgGXRlvlD5kOM1-7Aq0JpsSGQa5GtAybFvPCYximBYJJp-FB50G3iik4KLpLvEGqWfcDNrFAsCkqizd');

define('PP_SANDBOX_CLINET_SCR','ELL-drDt76MiIUR4haCGmrYiAKTKIpquxm3kaeHlAGtregKs5EMqSGEG4s40HW514lVr1G1hPgmSphV2');



define('PP_LIVE_CLINET_ID','');  
define('PP_LIVE_CLINET_SCR','');



/*
 * This function will take NVPString and convert it to an Associative Array and it will decode the response.
 * It is usefull to search for a particular key and displaying arrays.
 * @nvpstr is NVPString.
 * @nvpArray is Associative Array.
 */



//return by mahesh sain

function get_access_token(){
	
	
	
$ch = curl_init();
if(SANDBOX_FLAG){
    $clientId = PP_SANDBOX_CLINET_ID;
    $secret = PP_SANDBOX_CLINET_SCR;
    $url = "https://api.sandbox.paypal.com/v1/oauth2/token";
}
else
{
	$clientId = PP_LIVE_CLINET_ID;
    $secret = PP_LIVE_CLINET_SCR;
     $url = "https://api.paypal.com/v1/oauth2/token";
}
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$result = curl_exec($ch);
if(empty($result))die("Error: No response.");
else
{
    $json = json_decode($result);
    //print_r($json->access_token);
}

curl_close($ch);
if(isset($json->error))
{
	die($result);
}
return $json->access_token;
}

function prepare_data($data)
{
	
	
	$itemlist = array();
	     
			$array = array();
			$array['name'] = $data['campaign']['product_name'] .' For Brand '.$data['campaign']['brand_name'];
			$array['description'] = $data['campaign']['product_desc'];
			$array['quantity'] = 1;
			$array['price'] = $data['campaign_submit']['budget'];
			$array['currency'] = 'USD';
			$itemlist[] = $array;
		    
		    $shipping_array = array();
		   /*
		    $shipping_array['recipient_name'] = $data['campaign_submit']['firstName'].' '.$data['campaign_submit']['lastname'];
		    $shipping_array['line1'] = $data['campaign_submit']['address'];
		    $shipping_array['line2'] = '';
		    $shipping_array['city'] = $data['campaign_submit']['city'];
		    $shipping_array['state'] = $data['campaign_submit']['c_state'];
		    $shipping_array['phone'] = $data['campaign_submit']['phoneNumber'];
		    $shipping_array['postal_code'] = $data['campaign_submit']['postcode'];
		    $shipping_array['country_code'] = $data['campaign_submit']['country'];
		   */
		$items = new stdClass();
		$items->items  = $itemlist;
		
		//	$items->shipping_address = $shipping_array;
		
	    $newdata = new stdClass();
	    $newdata->intent = "sale";
	    $newdata->payer = new stdClass();
	    $newdata->payer->payment_method = "paypal";
	    $newdata->redirect_urls = new stdClass();
	  
	    $newdata->redirect_urls->return_url = SITE_URL.'payment-success.php?&campaign='.$data['campaign']['id'];
	    
	    $newdata->redirect_urls->cancel_url = SITE_URL.'payment-cancel.php?&campaign='.$data['campaign']['id'];
	    $newdata->transactions[] = array(
	      'amount' => array(
	       'total' => $data['campaign_submit']['budget'],
	       'currency' => 'USD'
	      ),
	      'item_list' => $items ,
	      'custom' => $data['campaign']['id']
	    );
	    
	 
	   return json_encode($newdata);
	 
}

function prepare_data_edu($data)
{
	$pdata = $data;
	$price = 0;
	foreach($pdata as $v)
	{
		$price += $v;
	}
	$itemlist = array();
	     
	     foreach($pdata as $key => $value){
			$array = array();
			$array['name'] = "Lession ".$key;
			$array['description'] = '';
			$array['quantity'] = 1;
			$array['price'] = floatval($value);
			$array['currency'] = 'EUR';
			$itemlist[] = $array;
		  }
		$items = new stdClass();
		$items->items  = $itemlist;
		if(isset($data['shipping_address']))
		{
			$items->shipping_address = $data['shipping_address'];
		}
	    $newdata = new stdClass();
	    $newdata->intent = "sale";
	    $newdata->payer = new stdClass();
	    $newdata->payer->payment_method = "paypal";
	    $newdata->redirect_urls = new stdClass();
	  
	    $newdata->redirect_urls->return_url = $_POST['return'];
	    
	    $newdata->redirect_urls->cancel_url = $_POST['canel_return'];
	    $newdata->transactions[] = array(
	      'amount' => array(
	       'total' => $price,
	       'currency' => 'EUR'
	      ),
	      'item_list' => $items ,
	     
	    );
	    
	    var_dump($newdata);
	   return json_encode($newdata);
	 
}


function get_payment_url($data)
{
  
	   $data = prepare_data($data);
  
$access_token = get_access_token();	
$ch = curl_init();
if(SANDBOX_FLAG){
    
    $url = "https://api.sandbox.paypal.com/v1/payments/payment";
}
else
{
	
     $url = "https://api.paypal.com/v1/payments/payment";
}

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer ".$access_token, 
  "Content-length: ".strlen($data))
);

$result = curl_exec($ch);


if(empty($result))die("Error: No response.");
else
{
    $json = json_decode($result);
    
}
if(is_null($json))
{
	die("Error: No response.");
}
curl_close($ch);
$url = '';
foreach($json->links as $l)
{
	if($l->method == 'REDIRECT')
	{
		return $url = $l->href;
		break;
	}
}
}



function get_payment_execute($paymentID,$PayerID)
{

$access_token = get_access_token();	

if(SANDBOX_FLAG){
    
    $url = "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentID."/execute";
}
else
{
	
     $url = "https://api.paypal.com/v1/payments/payment/".$paymentID."/execute";
}
$data = new stdClass();
$data->payer_id = $PayerID;
$data = json_encode($data);
//echo $url = $url."?payer_id=".$PayerID;
//echo '<br>';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);  
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer ".$access_token, 
));

$result = curl_exec($ch);


if(empty($result))die("Error: No response.");
else
{
    $json = json_decode($result);
    
}


curl_close($ch);
return $json;
}

function get_payment_detail($paymentID,$PayerID)
{

$access_token = get_access_token();	

if(SANDBOX_FLAG){
    
    $url = "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentID;
}
else
{
	
     $url = "https://api.paypal.com/v1/payments/payment/".$paymentID;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer ".$access_token, 
));

$result = curl_exec($ch);

if(empty($result))die("Error: No response.");
else
{
    $json = json_decode($result);
    
}

return  $json;
curl_close($ch);

}

function is_payment_executed($paymentID,$PayerID)
{
	$results = get_payment_detail($paymentID,$PayerID);
	$res = true;
	foreach($results->links as $l)
	{
		if($l->rel == 'execute')
		{
			$res = false;
		}
	}
	return $res;
}

function codepitch_create_orders($data)
{
	
	    $sql = "insert into orders values ('',";
	     $sql .= "'".$data['order_time']."',";
	     $sql .= "'".$data['buyer_id']."',";
	     $sql .= "'".$data['buyer_data']."',";
	     $sql .= "'".$data['total_cost']."',";
	     $sql .= "'".$data['number_of_days']."',";
	     $sql .= "'".$data['payment_status']."',";
	     $sql .= "'".$data['payment_mode']."',";
	     $sql .= "'".$data['transaction_id']."',";
	     $sql .= "'".$data['paymentId']."',";
	     $sql .= "'".$data['PayerID']."',";
	     $sql .= "'".$data['order_expire_time']."'";
	     $sql .= ")";
	     
	    
	     
	     if(mysql_query($sql))
	     {
			 return mysql_insert_id();
		 }
		 else
		 {
			 die("DB Error:-". mysql_error());
		 }
	
}


function codepitch_create_educationorders($data)
{
	
	    $sql = "insert into eduction_orders values ('',";
	     $sql .= "'".$data['order_time']."',";
	     $sql .= "'".$data['buyer_id']."',";
	     $sql .= "'".$data['order_data']."',";
	     $sql .= "'".$data['total_cost']."',";
	    
	     $sql .= "'".$data['payment_status']."',";
	     $sql .= "'".$data['payment_mode']."',";
	     $sql .= "'".$data['transaction_id']."',";
	     $sql .= "'".$data['paymentId']."',";
	     $sql .= "'".$data['PayerID']."'";
	    
	     $sql .= ")";
	     
	  
	     
	     if(mysql_query($sql))
	     {
			 return mysql_insert_id();
		 }
		 else
		 {
			 die("DB Error Insert:-". mysql_error());
		 }
	
}
