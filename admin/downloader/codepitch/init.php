<?php
if(isset($_COOKIE['remember_me']) && ! isset($_SESSION['login_user']) )  {
		        
		   $dbuser = codepitch_get_user_by_email($_COOKIE['remember_me']);

       if(!is_null($dbuser))
       {
	   $userdata  = array('id' => $dbuser->id,'user_email'=> $dbuser->user_email, 'user_registration_method' => $dbuser->user_registration_method);
	
	    codepitch_zocofy_cookie_login($userdata);
       }
}


if(isset($_SESSION['current_campaign_id']) && ! isset($_POST['action']) )  {
		        
		   unset($_SESSION['current_campaign_id']);
}


if(isset($_SESSION['reset_paasword_user_id']) && $_SERVER['PHP_SELF'] != 'reset-password.php')
{
	 //unset($_SESSION['reset_paasword_user_id']);
}


if(isset($_GET['action']) && $_GET['action'] == 'forgot-password-reset')
{
	$hash = $_GET['hash'];
	
	if($data = codepitch_get_data('zocofy_users',array('password_reset_hash' => $hash)))
	{
		
		$user = $data[0];
		
	   	   $data = array();
           $data['password_reset_hash'] = null;
           $data['user_last_updated'] = date('Y-m-d h:i:s');
           
           if(codepitch_update_data('zocofy_users',$data,array('id'=>$user['id'])))
           {
			   $_SESSION['reset_paasword_user_id'] = $user['id'];
			   header("Location:".SITE_URL.'reset-password.php');
			   exit;
		   }
	}
	else
	{
		header("Location:".SITE_URL.'forgetpassword.php?error=true&message='.urlencode('Password reset hash is already used or invalid'));
	    exit;
	}
}

if(isset($_GET['action']) && $_GET['action'] == 'manage_post' && is_numeric($_GET['id']))
{
	$posts = codepitch_get_data('zocofy_posts',array('id'=>$_GET['id']));
	
	if($posts)
	{
		$post = $posts[0];
		
		if($post['post_moderator'] == codepitch_current_user_id())
		{
			$update = codepitch_update_data('zocofy_posts',array('post_status'=>trim($_GET['cstatus'])),array('id'=>$_GET['id']));
			
			if($update)
			{
				$url = SITE_URL.'brandcampaign.php?active_tab=post&op=success&status='.$_GET['cstatus'];
				header("Location:".$url);
				exit;
			}
			else
			{
				$url = $_SERVER['REQUEST_URI'].'&op=fail';
				header("Location:".$url);
				exit;
			}
		}
		
	}
}
// create brand start 




// create brand end
?>
