<?php include('userHeader.php'); ?>
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                        <h1>Voter Card Print List</h1>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row dgnform"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <table class="table-striped table-hover" width="100%" cellpadding="10" cellspacing="0" style="font-size:12px;" >
                                <tr style="background:#ff9b00;">
                                    <td align="left" valign="left">   Sn.No.       </td>
                                    <?php
                                    if ($_SESSION['userid'] == 1) {
                                    ?>
                                    <td align="left" valign="left"> Retailer</td>
                                    <?php } ?>
                                    <td align="left" valign="left">   Payment Method	     </td>
                                    <td align="left" valign="left">   Voter Number      </td>
                                    <td align="left" valign="left">   Gmail ID
      </td>
                                    <td align="left" valign="left">  State
      </td>
                                    <td align="left" valign="left">   DOB  </td>
                                    <td align="left" valign="left">   Relatio</td>
                                    <td align="left" valign="left">   Address  </td>
                                    <td align="left" valign="left">   Create Date Time  </td>
                                    <td align="left" valign="left">   Payment
Silp  </td>
                                    <?php if ($_SESSION['userid'] == 1) { ?>
                                        <td align="middle" valign="middle" colspan="3">Actions</td>
                                    <?php } ?>
                                </tr>
                                <?php
                                $upload_dir = "voter/imgmanualvoter/";
                                $where = ($_SESSION['userid'] == 1) ? "1" : "(a.userid='" . $_SESSION['userid'] . "')";// check for admin

                                $sql = "SELECT a.`cardnumber`,a.`sid`,a.`assembly`, a.`name`, a.`fathername`, a.`address`, a.`status`, a.`gender`, a.`dob`,"
                                    . " a.`createdatetime`, a.`imagepathoriginal`, a.`addressproof`, a.`idproof`, a.userid, b.fullname FROM `votermanual` a "
                                    . " LEFT JOIN tbluser b on a.userid=b.userid "
                                    . " where $where and (a.type = 'C') order by a.sid desc, a.status desc";
                                $a = mysqli_query($connection, $sql);
                                $x = 0;
                                ?>
<?php while ($b = mysqli_fetch_array($a)) {
    $x++;
    $date = date_create($b['createdatetime']); ?>
                                    <tr id="a">
                                        <td align="left" valign="left"> <?= $x ?><br/>
                                            <a href="votermview.php?sid=<?=$b['sid']?>" target="_blank" title="View Detail"><i class="ti-eye"></i> View</a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <?php
                                        if ($_SESSION['userid'] == 1) {
                                        ?>
                                        <td align="left" valign="left"> <?= $b['fullname'] ?></td>
                                        <?php } ?>
                                        <td align="left" valign="left"> <?= $b['assembly'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['cardnumber'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['name'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['fathername'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['dob'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['gender'] ?> </td>
                                        <td align="left" valign="left"> <?= $b['address'] ?> </td>
                                        <td align="left" valign="left"> <?= date_format($date, 'j M Y g:ia') ?> </td>
                                        <td align="left" valign="left">
                                            <a target="_blank" href="<?php echo $upload_dir . $b['imagepathoriginal']?>" ></a> 
                                            
                                            <a target="_blank" href="<?php echo $upload_dir . $b['addressproof']?>" >Payment Silp</a>
                                        </td>
                                        <?php if ($b['status'] == "DONE") { ?>
                                            <!-- <td align="center" valign="middle"> <a style="padding-top:5px;padding-bottom:5px;padding-left: 0px;padding-right: 0px;"  class="btn btn-success" href="voter/voter.php?searchid=<?php echo $b['votermanualid'] ?>" target="_blank"> Print </a> </td> -->
                                        <?php } else { ?>
                                            <!-- <td align="center" valign="middle"><?php echo $b['status'] ?></td> -->
                                        <?php } ?>
                                        <?php if ($_SESSION['userid'] == 1) { ?>
        <?php if (!empty($b['status'])) { ?>
                        <td align="left" valign="left"><label class="text-primary"><?php echo $b['status'];?></label></td>
        <?php } else { ?>
                        <td align="center" valign="middle">
<a class="btn btn-success btn-sm" onclick="return confirm('Are you sure for this action?');" href="actions.php?page=votermcorrection&status=done&action=update&sid=<?php echo $b['sid'];?>">Done</a>
<a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure for this action?');" href="actions.php?page=votermcorrection&status=cancel&action=update&sid=<?php echo $b['sid'];?>&to=<?php echo $b['userid'];?>">Cancel</a>
                                                </td>
        <?php } ?>
                                            <td align="center" valign="middle">
                            <a href="javascript:void(0);" onclick="addcomment(<?php echo $_SESSION['userid']?>, <?php echo $b['userid']?>);" title="Add Comment"><i class="ti-comment"></i></a>&nbsp;&nbsp;&nbsp;
<a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure for this action?');" href="actions.php?page=votermcorrection&status=&action=delete&sid=<?php echo $b['sid'];?>">Delete</a>
                                            </td>
    <?php } ?>
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

<div class="modal fade" id="blank_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Comment</h4>
            </div>
            <div class="modal-body">
                
                <!--<form method="post" autocomplete="off" onSubmit="return validate_comment();" enctype="multipart/form-data" action="" style="width:100%">-->
                    <div class="row dgnform">   
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Comment</label>
                                <div class="form-group">
                                    <input type="hidden" name="c_to" id="c_to" value="" />
                                    <input type="hidden" name="c_from" id="c_from" value="" />
                                    <textarea class="form-control" style="height:125px" id="c_comment" name="c_comment" rows="10" placeholder="Write Comment"></textarea>
                                    <span id="errorcomment" class="error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>&nbsp;</label>
                            <div class="form-group">              
                                <button type="submit" name="send" onclick="return validate_comment();" class="btn btn-success btn-block">Send</button>
                            </div> 
                        </div>
                    </div>
                
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
function addcomment(from, to) {
    $("#c_to").val(to);
    $("#c_from").val(from);
    $("#c_comment").val("");
    $("#errorcomment").text("");
    $("#blank_modal").modal('show');
}
function validate_comment() {
    var comment = $("#c_comment").val();
    if(comment == '') {
        $("#errorcomment").text("Please write comment and send");
        return false;
    } else {
        $("#errorcomment").text("");
        var to = $("#c_to").val();
        var from = $("#c_from").val();
        $.ajax({
            beforeSend : function() { $(this).prop("disabled", true) },
            type: "POST",
            url: "addcomment.php",
            dataType: "json",
            data: {from:from, to:to, comment:comment}, // serializes the form's elements.
            success: function(result){
              if(result.status) {
                $("#errorcomment").text(result.message).addClass('text-success').removeClass("error");
                setTimeout(function () {
                    $("#blank_modal").modal('hide');
                }, 2000);
              }
              else {
                $("#errorcomment").text(result.message);
              }
            }
        });        
    }    
}
</script>
<?php include('userFooter.php'); ?>