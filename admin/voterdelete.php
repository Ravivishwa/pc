<?Php include('config.php'); ?>

<?php
error_reporting(0);
include("config.php");

$id = $_REQUEST['id'];

$updt = mysqli_query($connection,"delete from voterauto WHERE voterautoid=".$id."") ;

//header("location:backend.php#a".$id); exit();

echo '<script> window.open("voterlist.php#a'.$id.'","_self"); </script>' ;

?>

Please check if this composer package can be safely updated on the server side: php-markdown
(15:43:19) Its currently throwing a deprecation warning: PHP Deprecated:  Array and string offset access syntax with curly braces is deprecated in /web/kaleidoscope/vendor/michelf/php-markdown/Michelf/Markdown.php on line 955
(15:43:31) Client and server updated on staging


 warning: PHP Deprecated:  Array and string offset access syntax with curly braces is deprecated in /michelf/php-markdown/Michelf/Markdown.php 
