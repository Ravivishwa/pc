<?php
error_reporting(0);
include("config.php");

// get all the params
$action = $_REQUEST['action'];
$status = $_REQUEST['status'];
$page = $_REQUEST['page'];
$sid = $_REQUEST['sid'];
$to = $_REQUEST['to'];

// print_r($_REQUEST);
// die;

if($page==="votermapply") {
    if($action=="update") {
        $status = ($status=='done') ? "DONE" : "CANCEL";
        $updt = mysqli_query($connection,"update votermanual set status='$status' WHERE (sid=$sid) and (type = 'N')");
        // if rejected the do entry in notification table
        if($status=='CANCEL') {
            mysqli_query($connection,"INSERT INTO `tblnotification` ( `comment`, `userid`, `touserid`,`logdate`) "
                . "VALUES ('Voter Card New Application, Sr no #$sid is rejected by Admin','1','" . $to . "',now())");
        }
    }
    else if($action=="delete") {
        mysqli_query($connection,"delete from votermanual WHERE (sid=$sid) and (type = 'N')");
    }
    echo '<script>window.open("votercardmanuallist.php","_self"); </script>';
}
else if($page==="votermcorrection") {
    if($action=="update") {
        $status = ($status=='done') ? "DONE" : "CANCEL";
        $updt = mysqli_query($connection,"update votermanual set status='$status' WHERE (sid=$sid) and (type = 'C')");
        // if rejected the do entry in notification table
        if($status=='CANCEL') {
            mysqli_query($connection,"INSERT INTO `tblnotification` ( `comment`, `userid`, `touserid`,`logdate`) "
                . "VALUES ('Voter Card Correction, Sr no #$sid is rejected by Admin','1','" . $to . "',now())");
        }
    }
    else if($action=="delete") {
        mysqli_query($connection,"delete from votermanual WHERE (sid=$sid) and (type = 'C')");
    }
    echo '<script>window.open("votermcorlist.php","_self"); </script>';
}
else if($page==="votermduplicate") {
    if($action=="update") {
        $status = ($status=='done') ? "DONE" : "CANCEL";
        $updt = mysqli_query($connection,"update votermanual set status='$status' WHERE (sid=$sid) and (type = 'D')");
        // if rejected the do entry in notification table
        if($status=='CANCEL') {
            mysqli_query($connection,"INSERT INTO `tblnotification` ( `comment`, `userid`, `touserid`,`logdate`) "
                . "VALUES ('Voter Card Duplicate, Sr no #$sid is rejected by Admin','1','" . $to . "',now())");
        }
    }
    else if($action=="delete") {
        mysqli_query($connection,"delete from votermanual WHERE (sid=$sid) and (type = 'D')");
    }
    echo '<script>window.open("votermduplist.php","_self"); </script>';
}
