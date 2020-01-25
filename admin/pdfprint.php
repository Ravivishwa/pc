<?php
ob_start();
include_once('userHeader.php');
include_once("common_function.php"); 
require_once('simple_html_dom.php');

if(isset($_SESSION['user'])){
    $fk_user_id	 = (int)$_SESSION['userid'];
}
global $connection;
$success  = $error = '';
$card_type = $card_number = $name = $father_name = $dob = $address1 =$address2 = $address3 = $village = $taluk = $district = $postal = $members_count =  '';
$e_card_number = $shop = '';
if(isset($_POST) && !empty($_POST)) {
    $target_dir     = "uploads/";
    
    if (!file_exists($target_dir)) {
       mkdir($target_dir, 0777, true);
    }
    
    $file_name      = basename($_FILES["fileToUpload"]["name"]);
    $target_file    = $target_dir .$file_name;
    
    $uploadOk       = 1;
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if (file_exists($target_file)) {
        chmod($target_file,0755); //Change the file permissions if allowed
        unlink($target_file); //remo
        //$error    = "Sorry, file already exists.";
        //$uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error    = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "pdf") {
        $error    = "Sorry, only pdf file is allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error    = $error;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $success    = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $sql        = "INSERT INTO applications (pdf_name) VALUES ('".$file_name."')";
            
            if ($connection->query($sql) === TRUE) {
                $lastID     = $connection->insert_id;
                $encodeId   = base64_encode($lastID);
                $encodeFile = base64_encode($file_name);
                $appl_id    = $lastID;
                //Start: process pdf
                if( $file_name != '' && $appl_id != ''){
                    
                    $pdf_file = 'uploads/'.$file_name;
                    if (!is_readable($pdf_file)) {
                            print("Error: file does not exist or is not readable: $pdf_file\n");
                            return;
                    }

                    $c      = curl_init();
                    $cfile  = curl_file_create($pdf_file, 'application/pdf');
                    $apikey = '1j9qx2a4pjlb';
                    
                    
                    //Get api key from db 
                    $key_res = $connection->query("SELECT api_key FROM settings WHERE id = 1");
                    if ($key_res->num_rows > 0) {
                        while($row = $key_res->fetch_assoc()) {
                            $api_key =  $row['api_key'];
                        }
                    }
                    if($api_key == ''){
                        $success = "";
                        $error = "API Key is not valid.";
                        GOTO SHOWERROR;
                    }
                    $api_key = "633denil5366";
                    
                    
                    
                    curl_setopt($c, CURLOPT_URL, "https://pdftables.com/api?key=$api_key&format=html");
                    curl_setopt($c, CURLOPT_POSTFIELDS, array('file' => $cfile));
                    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($c, CURLOPT_FAILONERROR,true);
                    curl_setopt($c, CURLOPT_ENCODING, "gzip,deflate");

                    $result = curl_exec($c);
                    
                    //Reduce credits
                    $credit_sql     = "UPDATE tbluser set walletamount = walletamount - 1 WHERE id = ".$fk_user_id ;
                    $credit_result  = $connection->query($credit_sql);

                    if(curl_errno($c) > 0) {
                        print('Error calling PDFTables: '.curl_error($c).PHP_EOL);
                    } else {
                        // save the CSV we got from PDFTables to a file
                        file_put_contents ($pdf_file.".txt", $result);
                        
                        $html = file_get_contents($pdf_file.'.txt');    
                        $html = str_get_html($html);
                        foreach($html->find('td') as $element) {
                            $data[] = $element->innertext;
                        }
                    }
                    
                    
                    $card_number = $name = $father_name = $dob_string = '';
                    $dob = $members_count = $address = $address2 = $address3 = $taluk = $district = $postal = $village = '';
                    if(!empty($data)){
                                            
                        //----04/01/2020
                        $ckey           = array_search('குடும்ப அட்டை எண்', $data);
                        if(isset($data[$ckey+1]) && !empty($data[$ckey+1]))
                            $card_number = $data[$ckey+1];
                        else if(isset($data[$ckey+2]) && !empty($data[$ckey+2])) 
                            $card_number = $data[$ckey+2];
                            
                        $key  = array_search('குடும்ப தலைவர் விவரங்கள்', $data);
                        if(isset($data[$key+5]) && $data[$key+5] != "")
                            $name = $data[$key+5];
                        else if(isset($data[$key+6]) && $data[$key+6] != "") 
                            $name = $data[$key+6];
                        if($name != ''){
                            $name = str_replace("பெயர் ","",$name);     
                        }
                        
                        $nkey           = array_search('NFSA அட்டை வகை', $data);
                        if(isset($data[$nkey+1]) && !empty($data[$nkey+1]))
                            $card_type = $data[$nkey+1];
                        else if(isset($data[$nkey+2]) && !empty($data[$nkey+2])) 
                            $card_type = $data[$nkey+2];
                        
                        $eckey              = array_search('மின்னணு அட்டை எண் (UFC)', $data);
                        if(isset($data[$eckey+1]) && !empty($data[$eckey+1]))
                            $e_card_number = $data[$eckey+1];
                        else if(isset($data[$eckey+2]) && !empty($data[$eckey+2])) 
                            $e_card_number = $data[$eckey+2];
                        
                        
                        $skey           = array_search('கடை குறியீடு', $data);
                        if(isset($data[$skey+1]) && !empty($data[$skey+1]))
                            $shop = $data[$skey+1];
                        //----04/01/2020
                        
                        
                        
                        $fkey        = (array_search('தந்தை / கணவர் பெயர்', $data))+1;
                        $father_name = (isset($data[$fkey]) && !empty($data[$fkey]) )? $data[$fkey] : '';
                        
                        //dob
                        for($i = $fkey+1; $i < $fkey+6; $i++){
                            if(strpos($data[$i], "பிறந்த தேதி") !== false){
                                $dob_string = $data[$i];
                            }
                        }
                        if($dob_string != ''){
                            $dob = str_replace("பிறந்த தேதி ","",$dob_string);  
                        }
                        
                        //member count
                        $mkey           = (array_search('குடும்ப உறுப்பினர்கள்', $data))+1;
                        $members_count  = (isset($data[$mkey]) && !empty($data[$mkey]) )? $data[$mkey] : '';
                        
                        //address
                        $akey           = (array_search('முகவரி வரி 1', $data))+1;
                        $address1       = (isset($data[$akey]) && !empty($data[$akey]) )? $data[$akey] : '';
                        
                        $akey           = (array_search('முகவரி வரி 2', $data))+1;
                        $address2       = (isset($data[$akey]) && !empty($data[$akey]) )? $data[$akey] : '';
                        
                        
                        $akey           = (array_search('முகவரி வரி 3', $data))+1;
                        $address3       = (isset($data[$akey]) && !empty($data[$akey]) )? $data[$akey] : '';
                        
                        
                        $tkey           = array_search('தாலுகா', $data);
                        $taluk          = (isset($data[$tkey+1]) && !empty($data[$tkey+1]) )? $data[$tkey+1] : '';
                        
                        
                        $dkey           = array_search('மாவட்டம்', $data);
                        $district       = (isset($data[$dkey+1]) && !empty($data[$dkey+1]) )? $data[$dkey+1] : '';
                        
                        $pkey           = array_search('அஞ்சல் குறியீடு', $data);
                        $postal         = (isset($data[$pkey+1]) && !empty($data[$pkey+1]) )? $data[$pkey+1] : '';
                        
                        $vkey           = array_search('கிராமம்', $data);
                        $village        = (isset($data[$vkey+1]) && !empty($data[$vkey+1]) )? $data[$vkey+1] : '';
                        
                        //members list
                        $familykeymin   = (array_search('உறவுமுறை', $data))+1;
                        $familykeymax   = array_search('முகவரி விவரங்கள்', $data);
                        
                        $loop = 1;
                        for($fm = $familykeymin; $fm < $familykeymax; $fm++ ){
                            $family_members[] = $data[$fm];
                            
                        }
                        for($loop = 1; $loop < $members_count; $loop++){
                            $fmk = (array_search("$loop", $family_members));
                            $mem = str_replace($loop,"",$family_members[$fmk]);
                            if(trim($mem) != ''){
                                $mem = $mem;
                            }else {
                                $mem = $family_members[$fmk+1];
                            }
                            $family_names[$loop] = $mem;
                        }
                        
                        $val = "";
                        foreach($family_names as $k => $v){
                            $val .= '("'.$v.'", "'.($appl_id).'"),' ;   
                        }
                        
                        
                        $fin = implode("'),('", $family_names);
                        $insert_sql  = "INSERT INTO family_members (name,application_id) values ".trim($val,",");
                        if ($connection->query($insert_sql) === TRUE) {
                            
                        } else {
                            
                        }
                    }
    
                    /*start: Image extraction */
                    process_image($file_name, $appl_id);
                    /*End: Image extraction */
                
                    $fk_user_id = (isset($_SESSION["logged_user_id"]) && $_SESSION["logged_user_id"] != "") ? $_SESSION["logged_user_id"] : 1;
                    
                    $sql = "update applications set e_card_number ='".$e_card_number."', shop = '".$shop."', card_type = '".$card_type."', card_number = '".$card_number."', name = '".$name."', father_name = '".$father_name."', dob = '".$dob."', address1 = '".$address1."', address2 = '".$address2."', address3 = '".$address3."', village = '".$village."', taluk = '".$taluk."', district = '".$district."', postal = '".$postal."', members_count = '".$members_count."', fk_user_id = '".$fk_user_id."', image = 'profile.jpg' WHERE id = ".$appl_id;
                    if ($connection->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }
                //End: process pdf
                header("Location:process_pdf.php?id=".$encodeId);
                // $success     .= "<a href='process_pdf.php?id=".$encodeId."'> Click Here </a> to view the uploaded pdf.";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
            
        
        } else {
            $error    = "Sorry, there was an error uploading your file.";
        }
    }
}
SHOWERROR: echo "";
?>
<div class="content-wrap">
    <div class="main">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                        <div class="page-title">
                            <h3 class="page-header"><i class="fa fa-laptop"></i>PDF PRINT</h3>
                        </div>
                    </div>
                </div>
                <section id="main-content">
                    <div class="row dgnform">
                        <div class="col-lg-12">
                                    <form role="form" name="pdf_form" action="pdfprint.php" method="post" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <label for="fileToUpload">File input</label>
                                            <input type="file" id="fileToUpload" name="fileToUpload">
                                            <p class="help-block">Upload PDF file.</p>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                    </form>
                        </div>
                    </div> 
                </section>
            </div>
        </div>
    </div>
</div>

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

<?php include('userFooter.php'); ?>
