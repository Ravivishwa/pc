<?php
include("config.php");
$mobile = $_POST['email'];

$count = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where emailid='".$mobile."'"));

if($count != 0)
{
    echo 'Email Address Already Exist!!';
}
