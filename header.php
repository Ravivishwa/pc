<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<nav class="navbar navbar-default pgl-navbar-main" role="navigation">
<div class="container">
<div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
</div>
<div class="navbar-collapse collapse width">
<ul class="nav navbar-nav pull-right">
<li><a href="index.php"><i class="fa fa-home" style="font-size: 16px;margin-right: 5px;"></i>HOME</a></li>


<li><a href="Contact.php"><i class="fa fa-user" style="font-size: 16px;margin-right: 5px;"></i>Contact US</a></li>

<li><a href="index.php"><i class="fa fa-sign-in" style="font-size: 16px;margin-right: 5px;"></i>Log In</a></li>

<li><a href="reg.php"><i class="fa fa-user" style="font-size: 16px;margin-right: 5px;"></i>New Registration</a></li>

</ul>
</div>
</div>
</nav>
</header>
<div style="background-image: url(admin/<?php echo $slct['ifile'];?>);">
    <script>  function initFreshChat() {    window.fcWidget.init({      token: "43b0b007-d111-4007-ad87-a289dcfac3f7",      host: "https://wchat.freshchat.com"    });  }  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);</script>