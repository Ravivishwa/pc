<?php include('downloader/codepitch/autoload.php');?>
<?php include('userHeader.php'); ?>
<?php include('simple_html_dom.php');?>
<?php
date_default_timezone_set('Asia/Kolkata');

                     if(isset($_POST['savedata'])) {

                      $name = strtoupper(trim($_POST['name']));
                      $aadharname = trim($_POST['aadharname']);
                      $namelocal = trim($_POST['namelocal']);
                      $gender = trim($_POST['gender']);
                      $genderlocal = trim($_POST['genderlocal']);
                      $dobadhar = trim($_POST['dobadhar']);
                      $spousename = trim($_POST['spousename']);
                      $spousenamelocal = trim($_POST['spousenamelocal']);
                      $fathername = strtoupper(trim($_POST['fathername']));
                      $aadharfathername = trim($_POST['aadharfathername']);
                      $fathernamelocal = trim($_POST['fathernamelocal']);
                      $epicno = trim($_POST['epic_number']);
                      $policestation = trim($_POST['policestation']);
                      $tahshil = trim($_POST['tahshil']);
                      $assemblyconnameno = trim($_POST['assemblyconnameno']);
                      $assemblyconnamenolocal = trim($_POST['assemblyconnamenolocal']);
                      $partno = trim($_POST['partno']);
                      $partname = trim($_POST['partname']);
                      $partnamelocal = trim($_POST['partnamelocal']);

                      $address = trim($_POST['address']);
                      $localaddress = trim($_POST['addresslocal']);
                      $language = trim($_POST['language']);
                      $birthtithilocal = trim($_POST['birthtithilocal']);
                      $patalocal = trim($_POST['patalocal']);
                      $kanamelocal = trim($_POST['kanamelocal']);
                      $sexlocal = trim($_POST['sexlocal']);
                      $signlocal = trim($_POST['signlocal']);
                      $assconnamenolocal = trim($_POST['assconnamenolocal']);
                      $partnoandnamelocal = trim($_POST['partnoandnamelocal']);
                      if ($name=="") {
                          $msgno = 'Please Enter Voter Name .... ';
                      }
                      else {

                              $a = mysqli_query($connection,"SELECT epicno FROM voterauto Where epicno='".$epicno."'");
                          $b = mysqli_fetch_array($a);
                          //if($b['epicno']==$epicno){
                            if(0){
                              $msgno = 'This Voter Card EPIC No Already Exist .... ';

                          } else {

                           //var_dump($_POST);
                           unset($_POST['savedata']);
                           $data = $_POST;
                           $data['image'] = $_SESSION["IMGPATH"];
                           $data['ec_sign'] = asset_url('voter/voterbg/votersign2.jpg');
                           $data['status'] = 'generated';
                           $data['created_at'] = date('Y-m-d H:i:s');
                           $data['updated_at'] = date('Y-m-d H:i:s');
                           $data['add_by'] = $_SESSION['userid'];
                          if( codepitch_insert_data('voterids',$data))
                           /// insert value
                          {

                              $msg = "Record Saved Successfulyy Voter card is genderated...";

                              $_SESSION["epicno"]=$epicno;



                           /// end insert
                           /// start qr code

                           mysqli_set_charset($connection,"utf8");
                           $a = mysqli_query($connection,"SELECT * FROM voterauto Where epicno='".$_SESSION["epicno"]."'");
                           $b = mysqli_fetch_array($a);

                           $remark="";
                           $remark= 'Voter Card No : '.$b['epicno'].' Voter Name : '.$b['votername'] ;
                           // strat less point
                           //  Dr amount start
                           $qu = "";
                           $qu = "INSERT INTO `tbltrans`(`userid`, `username`, `transdate`, `transqty`, `transtype`, `touserid`, `tousername`, `remark`, `loginid`, `logdate`)
                           VALUES ('".$_SESSION['userid']."','".$_SESSION['username']."',now(),'".$_SESSION['aadharpoint']."','Dr','0','Voter Create','".$remark."','".$_SESSION['userid']."',now())";
                           $a1q=mysqli_query($connection,$qu);
                           //  Dr amount end
                          // end point


                          //echo $b['wamt'];
                     // start led wallet
                     $ledwallet=0;

                     $sql="";
                     $sql = "SELECT sum(transqty) as dramt FROM tbltrans where transtype='Dr' and userid='".$_SESSION['userid']."'";
                     $ab = mysqli_query($connection, $sql);
                     $bb = mysqli_fetch_array($ab);

                     //end led wallet

                     // start toled wallet
                     $toledwallet=0;
                     $sql="";
                     $sql = "SELECT sum(transqty) as cramt FROM tbltrans where transtype='Cr' and userid='".$_SESSION['userid']."'";
                     $aba = mysqli_query($connection, $sql);
                     $bba = mysqli_fetch_array($aba);
                     $ledwallet =$bba['cramt'] - $bb['dramt'];

                           $sql="";
                     $sql = "update tbluser SET walletamount='".$ledwallet."' where userid='".$_SESSION['userid']."'";
                     $abs = mysqli_query($connection, $sql);



                          ?>
                  <script>
                     setTimeout(function () {
                        window.location.href= 'voterlist-eci.php';
                     }, 2000);
                  </script>
                  <?php
                     }

                     }
                    }
                    }
                     ?>
<script type="text/javascript">
   function setaddress(){
       var galimn = "";

       var houseno = document.getElementById('houseno').value;
       if ( houseno.trim() !="" ) {
           galimn = houseno ;
       }
       var gali = document.getElementById('gali').value;
       if ( gali.trim() !="" ) {
           galimn = galimn + gali ;
       }

       var locality = document.getElementById('locality').value;
       var vtcandpost = document.getElementById('vtcandpost').value;
       var dist = document.getElementById('dist').value;
       var state = document.getElementById('statename').value;
       var pincode = document.getElementById('pincode').value;
       var policestation = document.getElementById('policestation').value;
       var tahshil = document.getElementById('tahshil').value;

    document.getElementById('txtSource').innerHTML = galimn + locality + " Police Station-" + policestation + ", Tahshil-" + tahshil + ", District-" + dist + ", Pin Code-" + pincode;
   }
</script>
<div class="content-wrap">
   <div class="main">
      <div class="col-md-12">
         <div class="container-fluid">
            <div class="row">
               <div class="page-header">
                  <div class="page-title">
                     <h1>Voter Card Aoto Entry Details</h1>
                  </div>
               </div>
            </div>
            <!-- /# row -->
            <section id="main-content">
               <div class="row">
                  <?php
                     if(isset($_POST['submit'])) {
                          $q = "";
                          $q = "SELECT * FROM tbluser where  userid='".$_SESSION['userid']."'";
                          $r = mysqli_query($connection,$q);
                          $rw = mysqli_fetch_assoc($r);

                          if (floatval($rw['aadharpoint'])>floatval($rw['walletamount']) && $_SESSION['userid']>1){
                              $msgno= "Sorry, Your Balance is Low .... Please Recharge Soon";
                              ?>
                  <script>
                     setTimeout(function () {
                     window.location.href= 'votercardauto-eci.php';
                     }, 2000);
                  </script>
                  <?php
                     } elseif ( $_FILES['ecifile']['name']==""){
                         $msgno = 'Please Select ECI File  .... ';
                        ?>
                  <script>
                     setTimeout(function () {
                     window.location.href= 'votercardauto-eci.php';
                     }, 2000);
                  </script>
                  <?php
                     }

                     else {
                         //$ch=curl_init();
                         //curl_setopt($ch,CURLOPT_URL,'htmlfile/MPTAAS1234.html');
                         //curl_setopt($ch,CURLOPT_POST,false);
                         //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                         //$html=curl_exec($ch);
                         //curl_close($ch);

                         //  aadhaar detail end
                         // voter card entry start
                         $target_dir = "htmlfile/";
                         $file = $_FILES['ecifile']['name'];
                         $path = pathinfo($file);
                         $filename = $path['filename'];
                         $ext = $path['extension'];
                         if (strtoupper($ext)=='HTML'){
                             $temp_name = $_FILES['ecifile']['tmp_name'];
                             $path_filename_ext = $target_dir.$filename.".".$ext;

                             // Check if file already exists
                             if (file_exists($path_filename_ext)) {
                                 //$msgno= "Sorry, file already exists.";
                                 unlink ($path_filename_ext);
                                 move_uploaded_file($temp_name,$path_filename_ext);
                                 //$msg= "Congratulations! File Uploaded Successfully.";
                             } else {
                                 unlink ($path_filename_ext);
                                 move_uploaded_file($temp_name,$path_filename_ext);
                                 //$msg= "Congratulations! File Uploaded Successfully.";
                             }


                              $html = file_get_contents($path_filename_ext);
                              $html = str_get_html($html);
//                              var_dump($html);die;


                            // $html=file_get_contents($path_filename_ext);

//                             $html = file_get_html($path_filename_ext);


                            // unlink ($path_filename_ext);
                             $eci_detail = array();
                             foreach($html->find('#formDetails tr td:nth-child(2)') as $e)
                                {


                                 if(strpos( strip_tags($e->innertext), 'Gender') != false)
                                  {

                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['gender'] = trim($data[1]);
                                   }

                                   if(strpos( strip_tags($e->innertext), 'Date of Birth') != false)
                                  {

                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['dob'] = trim($data[1]);
                                   }

                                    if(strpos( strip_tags($e->innertext), 'Age') != false)
                                  {

                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['age'] = trim($data[1]);
                                   }

                                   else if(strpos( strip_tags($e->innertext), 'Relative Name') != false)
                                  {

                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['relative_name'] = trim($data[1]);
                                   }
                                 else if(strpos( strip_tags($e->innertext), 'Name') != false)
                                  {

                                  $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['name'] = trim($data[1]);
                                   }

                                   else if(strpos( strip_tags($e->innertext), 'Relation Type') != false)
                                  {

                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['relation_type'] =  trim($data[1]);
                                   }

                                // $eci_detail[] = strip_tags($e->innertext);
                                }

                             foreach($html->find('#VVIPForm input') as $e)
                                {


                                 //  $eci_detail[$e->name] = $e->value;
                                }

                                foreach($html->find('.form-group div') as $e)
                                {

                                // foreach($child->childNodes() as $e) {
                                 if(strpos( strip_tags($e->innertext), 'State') != false)
                                  {

                                   $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['state'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'District') != false)
                                  {
                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['district'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'PC :') != false)
                                  {

                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['pc'] = $data[1];
                                   }
                                   else if(strpos( strip_tags($e->innertext), 'AC :') != false)
                                  {

                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['ac'] = $data[1];
                                   }

                                    else if(strpos( strip_tags($e->innertext), 'Part :') != false)
                                  {

                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['part'] = $data[1];
                                   }
                                   else
                                   {

                                   //$eci_detail[] = strip_tags($e->innertext);
                                    }
                                 //  }
                                }

                                foreach($html->find('#elector_image_v') as $e)
                                {

                                   $eci_detail['image'] = $e->src;
                                }

                                foreach($html->find('.col-md-3') as $e)
                                {
                                 if(strpos( strip_tags($e->innertext), 'House no.') != false)
                                  {

                                  $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['house'] = $data[1];

                                  }
                                }

                                foreach($html->find('.col-md-9') as $e)
                                {
                                 if(strpos( strip_tags($e->innertext), 'Address') != false)
                                  {



                                    $data = explode(":",strip_tags($e->innertext));
                                   $eci_detail['address'] = $data[1];
                                   }
                                }


                                $tmp = array();
                              foreach($eci_detail as $k => $v )
                              {
                                $tmp[$k] = trim(str_replace('&nbsp;','',$v));
                              }
                              $eci_detail = $tmp;
                              if($eci_detail)
                              {
                                  $data = explode("-",$eci_detail['ac']);
                                  $assco_name = trim($data[1]);
                                  $assco_no= trim($data[0]);

                                  $data = explode("/",$eci_detail['name']);
                                  $name = trim($data[0]);
                                  $namelocallang= trim($data[1]);
                                  /*
                                  var_dump($eci_detail['Gender']);
                                  exit;
                                  */
                                  if ($eci_detail['gender']=='Male'){
                                         $gender='Male';
                                     }
                                     else{
                                         $gender='Female';
                                     }

                                     $epic_no= $_POST['epic_number'];//$eci_detail['EpicNo'];

                                     $data = explode("/",$eci_detail['relative_name']);
                                  $fname = trim($data[0]);
                                  $fnamelocal = trim($data[1]);

                                  $data = explode("-",$eci_detail['part']);
                                  $part_name  = trim($data[1]);
                                  $part_no= trim($data[0]);

                                  $polling_name = "";
                                  $aadharname = "";
                                  $aadharfname= "";
                                  $txtgali = $txtbuld = $txtlocality =  $txtdistrict = $txtpincode = "";
                                  $txtdob = $eci_detail['dob'];

                                  $data = explode("/",$eci_detail['address']);
                                  $address = trim($data[0]);
                                  $address_r = trim($data[1]);


                                  $txtadd = trim($eci_detail['house']).' '.trim($address);
                                  $imgfpath=$eci_detail['image'];
                                  $_SESSION["IMGPATH"]=$eci_detail['image'];
                              }





                             if (trim($epic_no)==""){
                             $msgno = 'Please Select Proper ECI File  .... ';
                             ?>
                  <script>
                     setTimeout(function () {
                     window.location.href= 'votercardauto-eci.php';
                     }, 4000);
                  </script>
                  <?php
                     }
                     //voter card end
                     }
                     }
                     }
                     ?>

                  <?php
                     if($msg !='') { ?>
                  <div style="width=100%"  class="row cvmsgok"><?php echo $msg; ?></div>
                  <?php } elseif($msgno !='') { ?>
                  <div style="width=100%"  class="row cvmsgno"><?php echo $msgno; ?></div>
                  <?php  } ?>
                  <form method="post" autocomplete="off"  onSubmit="return validation();"   enctype="multipart/form-data" action="voterdetails-eci.php" style="width:100%">
                     <div class="row dgnform">
                        <div class="col-sm-10">
                           <div class="row">
                              <div class="col-sm-4 col-xs-6">
                                 <label>Name</label>
                                 <div class="form-group">
                                    <input class="form-control" name="name" readonly type="text" value="<?php echo $name; ?>">
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-6">
                                 <label>Name in Local Language</label>
                                 <div class="form-group">
                                    <input class="form-control" name="name_regional" readonly type="text" value="<?php echo $namelocallang; ?>">
                                 </div>
                              </div>
                              <div class="col-sm-2 col-xs-6">
                                 <label>Gender</label>
                                 <div class="form-group">
                                    <input class="form-control " id="gender" name="gender" readonly="readonly" type="text" value="<?php echo $gender; ?>" required>
                                 </div>
                              </div>
                              <div class="col-sm-2 col-xs-6">
                                 <label>Date of Birth</label>
                                 <div class="form-group">
                                    <input class="form-control " name="dob" readonly="readonly" type="text" value="<?php echo $txtdob; ?>" required>
                                 </div>
                              </div>
                              <div class="col-sm-2 col-xs-6">
                                 <label>Age</label>
                                 <div class="form-group">
                                    <input class="form-control " name="age" readonly="readonly" type="text" value="<?php echo $eci_detail['age'] ?>" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-3 col-xs-12">
                                 <label>Father/Husband </label>
                                 <div class="form-group">
                                    <select class="form-control" name="relation_name" id="spousename" required>
                                       <option value="">SELECT</option>
                                       <option value="father" <?php echo (($eci_detail['relation_type'] == 'Father')?'selected':''); ?>>father</option>
                                       <option value="husband" <?php echo (($eci_detail['relation_type'] == 'Husband')?'selected':''); ?> >Husband</option>
                                    </select>
                                    <span id="errorspousename" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                 <label>Father/Husband Name</label>
                                 <div class="form-group">
                                    <input class="form-control" name="father_name" readonly type="text" value="<?php echo $fname; ?>" required placeholder="Father/Husband Name">
                                 </div>
                              </div>
                              <div class="col-sm-5 col-xs-12">
                                 <label>Father/Husband Name(Local Language)</label>
                                 <div class="form-group">
                                    <input class="form-control" name="father_name_regional" readonly type="text" value="<?php echo $fnamelocal; ?>"  required placeholder="Father/Husband Name(Local Language)" >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-4 col-xs-12">
                                 <label>Epic No.</label>
                                 <div class="form-group">
                                    <input class="form-control" name="epic_number" readonly type="text" value="<?php echo $epic_no; ?>" require>
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                 <label>State</label>
                                 <div class="form-group">
                                    <input class="form-control" name="state" readonly type="text" value="<?php echo $_POST['state']; ?>" require>
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                 <label>Panel</label>
                                 <div class="form-group">
                                    <select name="panel" required class="form-control">
                                      <option value="half">Half</option>
                                      <option value="full">Full</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-sm-6 col-xs-12">
                                 <label>District</label>
                                 <div class="form-group">
                                    <input class="form-control" readonly value="<?php echo $_POST['district']; ?>" required name="district" id="district" type="text"  placeholder="District">
                                    <span id="district" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>District(local language)</label>
                                 <div class="form-group">
                                    <input required class="form-control" required name="district_regional" id="district_regional" type="text"  placeholder="District In local language">
                                    <span id="district_regional" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Police Station </label>
                                 <div class="form-group">
                                    <input class="form-control"  name="police" id="policestation" type="text"  placeholder="Police Station">
                                    <span id="errorpolicestation" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Police Station(local language) </label>
                                 <div class="form-group">
                                    <input class="form-control"  name="police_r" id="police_r" type="text"  placeholder="Police Station">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Tahshil </label>
                                 <div class="form-group">
                                    <input class="form-control"  name="tehsil" id="tahshil" type="text"  placeholder="Tahshil">
                                    <span id="errortahshil" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Tahshil (local language) </label>
                                 <div class="form-group">
                                    <input class="form-control"  name="tehsil_r" id="tahshil_r" type="text"  placeholder="Tahshil">
                                    <span id="errortahshil" class="error"></span>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-xs-12">
                                 <label>Pincode</label>
                                 <div class="form-group">
                                    <input required class="form-control" readonly value="<?php echo $_POST['pincode']; ?>" name="pincode" id="pincode" type="text"  placeholder="Pincode">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>House Number</label>
                                 <div class="form-group">
                                    <input required class="form-control" readonly value="<?php echo $eci_detail['house']; ?>" name="house" id="house" type="text"  placeholder="House Number">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>House Number(local language)</label>
                                 <div class="form-group">
                                    <input required class="form-control"  name="house_r" id="house_r" type="text"  placeholder="House Number">
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Address</label>
                                 <div class="form-group">
                                    <textarea name="original_address" readonly class="form-control"><?php echo $address; ?></textarea>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Address (local language)</label>
                                 <div class="form-group">
                                    <textarea name="original_address_r" readonly class="form-control"><?php echo $address_r; ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-2">
                           <label>Image  </label>
                           <div class="form-group">
                              <img src="<?php echo $imgfpath; ?>" width="130" height="150" >
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-sm-6 col-xs-12">
                                 <label>Assembly Constituency  Number and Name</label>
                                 <div class="form-group">
                                    <input class="form-control" id="assemblyconnameno" name="assembly_consituency" readonly type="text" value="<?php echo $assco_no.' - '.$assco_name ; ?>"  required placeholder="Assembly Constituency  Number and Name" required>
                                 </div>
                              </div>
                              <div class="col-sm-6 col-xs-12">
                                 <label>Assembly Constituency  Number and Name(Local Language)</label>
                                 <div class="form-group">
                                    <input class="form-control" id="assemblyconnamenolocal" name="assembly_consituency_r"  type="text" required placeholder="Assembly Constituency  Number and Name Local Language" required>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-4 col-xs-12">
                                 <label>Part Number</label>
                                 <div class="form-group">
                                    <input class="form-control" required name="bhag_sankhya" readonly type="text" value="<?php echo $part_no; ?>"  required placeholder="Part Number">
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                 <label>Part Name</label>
                                 <div class="form-group">
                                    <input class="form-control" required id="partname" name="bhag_name" readonly type="text" value="<?php echo $part_name; ?>"  required placeholder="Part Name">
                                 </div>
                              </div>
                              <div class="col-sm-4 col-xs-12">
                                 <label>Part Name(Local Language)</label>
                                 <div class="form-group">
                                    <input class="form-control" id="partnamelocal" name="bhag_name_r" type="text" required="" placeholder="Part Name(Local Language)" autocomplete="off">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 col-xs-12">
                                 <label>Select Language</label>
                                 <div class="form-group">
                                    <select class="form-control"  onchange="changelang()" name="language" id="language" required>
                                       <option value="">SELECT</option>
                                       <option value="HI">Hindi</option>
                                       <option value="PA">Punjabi</option>
                                       <option value="GU">Gujrati</option>
                                       <option value="MR">Marathi</option>
                                       <option value="TA">Tamil</option>
                                       <option value="KN">Kannada</option>
                                    </select>
                                    <span id="errorlanguage" class="error"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <label>&nbsp;</label>
                              <div class="form-group">
                                 <button type="submit" name="savedata" class="btn btn-success btn-block">Submit</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- /# row -->
            </section>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function validation() {

    /*
                var aadharno = document.getElementById('aadharno').value;
    if ( aadharno.length < 12 ) {
       document.getElementById('erroraadharno').innerHTML = " **Please Enter 12 Digit Aadhaar Card Number !!!";
       document.getElementById('aadharno').style.border = "1px solid red";
       document.getElementById('aadharno').focus();
       return false;
    }

                var txtSource = document.getElementById('txtSource').value;
    if ( txtSource.trim() =="" ) {
       document.getElementById('errortxtSource').innerHTML = " **Please Enter Address !!!";
       document.getElementById('txtSource').style.border = "1px solid red";
       document.getElementById('txtSource').focus();
       return false;
                }

                var policestation = document.getElementById('policestation').value;
    if ( policestation.trim() =="" ) {
       document.getElementById('errorpolicestation').innerHTML = " **Please Enter Police Station !!!";
       document.getElementById('policestation').style.border = "1px solid red";
       document.getElementById('policestation').focus();
       return false;
                }

                var txtSource = document.getElementById('tahshil').value;
    if ( tahshil.trim() =="" ) {
       document.getElementById('errortahshil').innerHTML = " **Please Enter Tahshil !!!";
       document.getElementById('tahshil').style.border = "1px solid red";
       document.getElementById('tahshil').focus();
       return false;
                }
               */
                var language = document.getElementById('language').value;
    if ( language.trim() =="" ) {
       document.getElementById('errorlanguage').innerHTML = " **Please Select Language !!!";
       document.getElementById('language').style.border = "1px solid red";
       document.getElementById('language').focus();
       return false;
                }







   }

</script>
<script type="text/javascript">
   //English to hindi translate code
       function changelang() {



              /*
               var policestation = document.getElementById("policestation").value;
               if ( policestation.trim() =="" ) {
                   document.getElementById('errorpolicestation').innerHTML = " **Please Enter Police Station !!!";
                   return false;
               }
               */

              /*
               var tahshil = document.getElementById("tahshil").value;
               if ( tahshil.trim() =="" ) {
                   document.getElementById('errortahshil').innerHTML = " **Please Enter Tahshil !!!";
                   return false;
               }
               */
               var lang = document.getElementById("language").value;

               //alert(lang);
               var url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#house").val());
          //alert(url);
         $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                     //alert(result);
            $("#house_r").val(result);

            }
               });

               // district
                            //alert(lang);
               var url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#district").val());
          //alert(url);
         $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                     //alert(result);
            $("#district_regional").val(result);

            }
               });

               //district

                        // police
                            //alert(lang);
               var url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#policestation").val());
          //alert(url);
         $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                     //alert(result);
            $("#police_r").val(result);

            }
               });

               //police

                                 // police
                            //alert(lang);
               var url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#tahshil").val());
          //alert(url);
         $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                     //alert(result);
            $("#tahshil_r").val(result);

            }
               });

               //police

               url = "";
               url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#assemblyconnameno").val());
          //alert(url);
         $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                    // alert(result);
            $("#assemblyconnamenolocal").val(result);

            }
               });

               url = "";
               url = "https://translate.googleapis.com/translate_a/single?client=gtx";
               url += "&sl=" + 'EN';
               url += "&tl=" + lang;
               url += "&dt=t&q=" + escape($("#partname").val());
          //alert(url);
               $.get(url, function (data, status) {
         var result= '';
          for(var i=0; i<=500; i++)
            {
              result += data[0][i][0];
                    // alert(result);
            $("#partnamelocal").val(result);

            }
               });






      };
   //Words and Characters Count
</script>
<?php include('userFooter.php'); ?>
