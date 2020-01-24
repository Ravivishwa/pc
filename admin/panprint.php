<?php
session_start();
include ('config.php');
// save data here
if (isset($_POST['savedata'])) {
    $q = "";
    $q = "SELECT * FROM tbluser where  userid='" . $_SESSION['userid'] . "'";
    $r = mysqli_query($connection, $q);
    $rw = mysqli_fetch_assoc($r);
    if (floatval($rw['pancardpoint']) > floatval($rw['walletamount']) && $_SESSION['userid'] > 1) {
        $msgno = "Sorry, Your Balance is Low .... Please Recharge Soon";
?>

                                        <script>

                                        setTimeout(function () {

                                        window.location.href= 'pan.php';

                                        }, 3000);

                                        </script>

  <?php
    }
    else
    {
    $panno = trim($_POST['panno']);
    $name = trim($_POST['name']);
    $fname = trim($_POST['fname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_type = $_FILES['photo']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['photo']['name'])));
    $file_name_a = $_FILES['signature']['name'];
    $file_size_a = $_FILES['signature']['size'];
    $file_tmp_a = $_FILES['signature']['tmp_name'];
    $file_type_a = $_FILES['signature']['type'];
    $file_ext_a = strtolower(end(explode('.', $_FILES['signature']['name'])));
    $time = time(); // current time stamp
    $file_name = $time . '_photo.' . $file_ext;
    $file_name_a = $time . '_sign.' . $file_ext_a;
    $upload_dir = "panimg/";
    move_uploaded_file($file_tmp, $upload_dir . $file_name);
    move_uploaded_file($file_tmp_a, $upload_dir . $file_name_a);
    
          
      /// strat less point
            mysqli_set_charset($connection, "utf8");
           
            $remark = "";
            $remark = 'Pan No : ' . $panno;
            // strat less point
            //  Dr amount start
            $qu = "";
            $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)

                                    VALUES ('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "',now(),'" . $rw['pancardpoint'] . "','Dr','0','Pan Card Create','" . $remark . "','" . $_SESSION['userid'] . "',now())";
            $a1q = mysqli_query($connection, $qu);
            //  Dr amount end
            // end point
            //echo $b['wamt'];
            // start led wallet
            $ledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as dramt FROM tbltrans where transtype='Dr' and userid='" . $_SESSION['userid'] . "'";
            $ab = mysqli_query($connection, $sql);
            $bb = mysqli_fetch_array($ab);
            //end led wallet
            // start toled wallet
            $toledwallet = 0;
            $sql = "";
            $sql = "SELECT sum(transqty) as cramt FROM tbltrans where transtype='Cr' and userid='" . $_SESSION['userid'] . "'";
            $aba = mysqli_query($connection, $sql);
            $bba = mysqli_fetch_array($aba);
            $ledwallet = $bba['cramt'] - $bb['dramt'];
            $sql = "";
            $sql = "update tbluser SET walletamount='" . $ledwallet . "' where userid='" . $_SESSION['userid'] . "'";
            $abs = mysqli_query($connection, $sql);
       /* end pan point */
  }
 }
 else {
    echo "Bad Request";
}
?>
<?php
if (isset($_POST['savedata'])) {
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pan Card Print</title>
        <style>
        @page {
            size: 8.5in 11.50in;
            margin: 15mm 15mm 5mm 15mm;
        }
        </style>
    </head>
    <body style="margin: 0;">

        <div style="width:1000px; border: 3px solid #666; margin:auto;">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody><tr>
                        <td colspan="2"><img src="images/pan/1.jpg" alt=""></td> 
                    </tr>
                    <tr>
                        <td colspan="2"><img src="images/pan/2.jpg" alt="">
                            <h4 style="position: relative; z-index: 999; margin: 0 auto; left: 23%; right: 0; font-family: Arial,sans-serif; color: #030303; width: 60%; font-weight: 600; text-transform: uppercase; margin-top: -4%; margin-bottom: 2.2%;"><?php echo $panno; ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%"><img src="images/pan/3.jpg" alt=""></td>
                        <td class="fill" style="position: relative;"><h4 style="color: #333; position: absolute; top: 40px; z-index: 1; text-transform: uppercase; margin-bottom: 0; margin-left: 30px; margin-top: 0; font-family: arial; font-size: 19px; font-weight: normal;"><?php echo $name; ?></h4><img src="images/pan/detail-strip.jpg" width="700" height="88" alt=""></td>
                    </tr>
                    <tr>
                        <td><img src="images/pan/4.jpg" alt=""></td>
                        <td style="position: relative;"><h4 style="color: #333; position: absolute; top: 40px; z-index: 1; text-transform: uppercase; margin-bottom: 0; margin-left: 30px; margin-top: 0; font-family: arial; font-size: 19px; font-weight: normal;"><?php echo $fname; ?></h4><img src="images/pan/detail-strip.jpg" width="700" height="88" alt=""></td>
                    </tr>
                    <tr>
                        <td><img src="images/pan/5.jpg" alt=""></td>
                        <td style="position: relative;"><h4 style="color: #333; position: absolute; top: 40px; z-index: 1; text-transform: uppercase; margin-bottom: 0; margin-left: 30px; margin-top: 0; font-family: arial; font-size: 19px; font-weight: normal;"><?php echo $dob; ?></h4><img src="images/pan/detail-strip.jpg" width="700" height="88" alt=""></td>
                    </tr>
                    <tr>
                        <td><img src="images/pan/6.jpg" alt=""></td>
                        <td style="position: relative;"><h4 style="color: #333; position: absolute; top: 40px; z-index: 1; text-transform: uppercase; margin-bottom: 0; margin-left: 30px; margin-top: 0; font-family: arial; font-size: 19px; font-weight: normal;"><?php echo $gender; ?></h4><img src="images/pan/detail-strip.jpg" width="700" height="88" alt=""></td>
                    </tr>
                    <tr>
                        <td align="center" valign="middle" style="position: relative;">
                            <img style="position: absolute; left: 25%; top: 36px;" src="<?php echo $upload_dir . $file_name; ?>" width="125" height="125" alt=""><img src="images/pan/photobix.jpg" alt="">
                        </td>
                        <td align="left" valign="top" style="position: relative;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="40%" style="position: relative;"><img style="position: absolute; left: 20px; top: 46px;" src="<?php echo $upload_dir . $file_name_a; ?>" width="238" height="79" alt=""><img src="images/pan/sign-box.jpg" alt=""></td>
                                        <td width="57%" rowspan="2" style="position: relative;"><img style="position: absolute; left: 25px; top: 30px;height: 164px;" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=350x350&amp;chld=H|1&amp;chl=<QPDB photo='<?php echo $upload_dir . $file_name ?>' signature='<?php echo $upload_dir . $file_name_a ?>' pan='<?php echo $panno ?>' name='<?php echo $name ?>' father's name='<?php echo $fname ?>' dob='<?php echo $dob ?>' />" alt=""><img src="images/pan/qr-box.jpg" width="219" height="220" alt=""></td>
                                        <td width="3%" rowspan="2"><img src="images/pan/pan-sign.jpg" width="196" height="220" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td height="53"><img src="images/pan/signature.jpg" alt=""></td>
                                    </tr>
                                </tbody>
                            </table></td>
                    </tr>
                    <tr>
                        <td colspan="2"><img src="images/pan/nirdesh.jpg" width="1000" height="266" alt=""></td>
                    </tr>
                    <tr>
                        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td width="10%">&nbsp;</td>
                                        <td width="40%" style="border: 1px dashed #999; padding: 5px; position: relative;"><img src="<?php echo $upload_dir . $file_name; ?>" width="75" height="74" alt="" style=" position: absolute; top:79px; left: 22px; z-index: 9;">
                                            <span style="position: absolute; z-index: 999; margin: 0 auto; left: 0; right: 25px; text-align: center; top: 40%; font-family: Arial,sans-serif; color: #030303; width: 60%; font-weight: 500;text-transform: uppercase;"><?php echo $panno ?></span>
                                            <img src="http://chart.apis.google.com/chart?cht=qr&amp;chs=350x350&amp;chld=H|1&amp;chl=<QPDB photo='<?php echo $upload_dir . $file_name ?>' signature='<?php echo $upload_dir . $file_name_a ?>' pan='<?php echo $panno ?>' name='<?php echo $name ?>' father's name='<?php echo $fname ?>' dob='<?php echo $dob ?>' />" width="121" height="121" alt="" style=" position: absolute; top:79px; left: 287px; z-index: 9;">
                                            <div style=" position: absolute; left: 32px; top: 165px; font-family: arial; font-size: 14px; color: #000; font-weight: normal;text-transform: uppercase;"><?php echo $name ?></div>
                                            <div style=" position: absolute; left: 32px; top: 200px; font-family: arial; font-size: 14px; color: #000; font-weight: normal;text-transform: uppercase;"><?php echo $fname ?></div>
                                            <div style=" position: absolute; left: 32px; top: 244px; font-family: arial; font-size: 14px; color: #000; font-weight: normal;"><?php echo $dob ?></div>
                                            <img src="<?php echo $upload_dir . $file_name_a ?>" width="120" height="28" alt="" style=" position: absolute; top:217px; left: 144px; z-index: 9;">
                                            <img src="images/pan/pan-front.jpg" width="421" height="266" alt=""></td>
                                        <td width="40%" style="border-top: 1px dashed #999; border-right: 1px dashed #999; border-bottom: 1px dashed #999; padding: 5px"><img src="images/pan/panback.jpg" width="421" height="266" alt=""></td>
                                        <td width="10%">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td style="position: relative;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script>
window.onbeforeunload = function(event) {
    event.returnValue = "Reload Page will cost Pan Card Point";
};
</script>
    </body>
</html>
<?php
} ?>
