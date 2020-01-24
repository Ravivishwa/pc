<?Php

session_start();

$_SESSION["user"] ="";
$_SESSION['username'] = "";
$_SESSION['usertype'] = "";
$_SESSION['userid'] ="";
$_SESSION['aadharpoint'] = "";
//------------------------//

header("location: login.php");

exit();

?>