<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from tbluser WHERE userid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("userlist.php#a'.$id.'","_self"); </script>' ;

?>

