<?php
class codepitch_insta{
	
  public function get_instagram_url($type = "")
  {
	 if($type == "brand")
	 { 
		 $redirecturl = INSTAGRAM_REDIRECT_URL."?usertype=brand";
	  	$url = "https://api.instagram.com/oauth/authorize/?client_id=".INSTAGRAM_CLIENT_ID."&redirect_uri=".$redirecturl."&response_type=code"; 
     }
     else
     {
		$url = "https://api.instagram.com/oauth/authorize/?client_id=".INSTAGRAM_CLIENT_ID."&redirect_uri=".INSTAGRAM_REDIRECT_URL."&response_type=code"; 
	 }
     return $url;
  }
  
  // Set Access Token
  public function setAccess_token($code,$type=""){

    $redirect_url  = INSTAGRAM_REDIRECT_URL;
    if(isset($_GET['usertype']))
    {
		$redirect_url .= "?usertype=brand";
	}
    
    $this->token_array = array("client_id"=>INSTAGRAM_CLIENT_ID,
        "client_secret"=>INSTAGRAM_CLIENT_SECRET,
        "grant_type"=> 'authorization_code',
        "redirect_uri"=>$redirect_url,
        "code"=>$code);

  }
  
  // Get user details
  public function getUserDetails(){

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://api.instagram.com/oauth/access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $this->token_array );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec ($ch);

    curl_close ($ch);

    return json_decode($result);

  }
}

?>
