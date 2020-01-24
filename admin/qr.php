<?php
include_once('userHeader.php');
if(isset($_SESSION['user'])){
//    var_dump($_SESSION);die;
    $fk_user_id	 = (int)$_SESSION['userid'];
//    var_dump($fk_user_id);die;
}

if(isset($_POST['data']))
{
    include('phpqrcode/qrlib.php');
    $name=$_POST['name'];
    $text=$_POST['data'];
    $folder="uploads/";
    $file_name="qrgen_".time().".png";
    $sql = "INSERT INTO qr_code_data (name,`path`,fk_user_id) VALUES ('$name','$file_name',$fk_user_id)";
    if ($connection->query($sql) === TRUE) {
        $lastID 	= $connection->insert_id;
        $encodeId 	= base64_encode($lastID);
        $encodeFile = base64_encode($file_name);
        $appl_id	= $lastID;
    }
    //Reduce credits
    $credit_sql   	= "UPDATE tbluser set walletamount = walletamount - 1 WHERE id = ".$fk_user_id ;
    $credit_result  = $connection->query($credit_sql);
    $file_name=$folder.$file_name;
    QRcode::png($text,$file_name);
    return "success";
}
?>
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h3 class="page-header"><i class="fa fa-qrcode"></i> Generate Qr Code</h3>
                        </div>
                    </div>
                </div>
<section id="main-content">
    <div class="row">
        <?php if($msg !='') { ?>
            <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
        <?php } elseif($msgno !='') { ?>
            <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
        <?php  } ?>
        </br>
        <form method="post" name="form" autocomplete="off"  enctype="multipart/form-data" action="aadhardetails.php" style="width:100%" >


            <div class="row dgnform" >
                <div class="row" >
                    <div class="col-md-12 col-sm-6 col-xs-6" >
                        <label>Upload QR Image</label>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="qr-input">QR Name</label>
                                <input type="text" class="form-control" id="qr-input" placeholder="QR Name" required>
                            </div>
                            <div id="main">
                                <div id="mainbody" style    ="display: inline;">
                                    <div id="outdiv">
                                        <div id="qrfile"><div id="imghelp">Select a file
<!--                                                <input type="file" id="fileToUpload" onchange="handleFiles(this.files)">-->
                                                <input  type="file" class="form-control"  name="rajsthanfile" id="fileToUpload" onchange="handleFiles(this.files)" required> <!----disabled---->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="result" style="display: none">
                                        <canvas id="qr-canvas" width="800" height="600" style="width: 800px; height: 600px;"></canvas>
                                    </div>
                                    <p class="help-block">Upload QR Image file.</p>
<!--                                    <button type="submit" name="submit" class="btn btn-primary qr-submit">Submit</button>-->
                    </div>

                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <label>&nbsp;</label>
                        <div class="form-group">
                            <button type="submit" id="submit" name="submit" class="btn btn-success btn-block qr-submit">Submit</button>
                        </div>
                    </div></div>
            </div>
    </div>

</section>
                <section id="main-content">
                    <div class="row dgnform">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;font-weight:bold;" >
                                <tr style="background:#ff9b00;">
                                    <td align="left" valign="left">   Sn.No.       </td>
                                    <td align="left" valign="left">   Name      </td>
                                    <td align="left" valign="left">   Qr Code    </td>
                                    <td align="left" valign="left">     </td>
                                </tr>

                                <?php
                                $where = '';
                                if($_SESSION['user_type'] != 1){
                                    $where = ' where fk_user_id = '.$fk_user_id;
                                }
                                $list = [];
                                $sql    = "Select * from qr_code_data ".$where." ORDER BY id desc";
                                $a = mysqli_query($connection,$sql); $x = 0 ; ?>
                                <?php while($b = mysqli_fetch_array($a)){
                                    $x++;
                                    ?>
                                    <tr id="a">
                                        <td align="left" valign="left"> <?=$x?> </td>
                                        <td align="left" valign="left"> <?=$b['name']?> </td>
                                        <td>
                                            <img src="<?php echo "uploads/".$b['path']; ?>">
                                        </td>
                                        <td>
                                            <a target="_blank" href="<?php echo "uploads/".$b['path']; ?>" download>
                                                <button class="btn"><i class="fa fa-download"></i> Download</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
</div>
</div>
</div>
</div>

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

<?php include('userFooter.php'); ?>

<script type="text/javascript">
    $('.qr-submit').on('click',function(e){
        e.preventDefault();
        var name = $('#qr-input').val();
        var qrdata = $('#result').text();
        console.log(name,qrdata)
        $.ajax({
            url: 'qr.php',
            dataType: 'text',
            type: 'post',
            data: {name:name,data:qrdata},
            success: function( data, textStatus, jQxhr ){
                location.reload();
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
    })
</script>
