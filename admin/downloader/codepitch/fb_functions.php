<?php

function codepitch_fb_connect()
{
	$fb = new Facebook\Facebook([
  'app_id' => FB_APP_ID, // Replace {app-id} with your app id
  'app_secret' => FB_APP_SCR,
  'default_graph_version' => FB_APP_VERSION,
  ]);
  
  return $fb;	
}

function codepitch_fb_login_url($type = "")
{
	
	
	$fb = codepitch_fb_connect();
	
	$helper = $fb->getRedirectLoginHelper();

     $permissions = ['email']; // Optional permissions
     
     if($type  == "brand") {
      $loginUrl = $helper->getLoginUrl(SITE_URL.'fb-callback.php?usertype='.$type, $permissions);
     }
     else
     {
		$loginUrl = $helper->getLoginUrl(SITE_URL.'fb-callback.php', $permissions); 
	 }
    return  $loginUrl;
	
}
