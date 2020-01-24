<?php
include("config.php");
$mobile = $_POST['mobile'];

$count = mysqli_num_rows(mysqli_query($connection,"select * from tbluser where mobileno='".$mobile."'"));

if($count != 0)
{
    echo 'Mobile Number Already Exist!!';
}
