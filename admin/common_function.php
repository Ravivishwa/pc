<?php
include_once ( 'PdfToText/PdfToText.phpclass' );

function process_image($file,$form_id){
	$file		=  explode('.',$file)[0];
	$file = __DIR__.'/uploads/'.$file;
	$pdf		=  new PdfToText ( "$file.pdf", PdfToText::PDFOPT_DECODE_IMAGE_DATA ) ;
	$image_count 	=  count ( $pdf -> Images ) ;
	if (!file_exists('uploads/profile/'.$form_id)) {
	   mkdir('uploads/profile/'.$form_id, 0777, true);
	}
	if  ( $image_count )
	   {
		for  ( $i = 0 ; $i  <  1 ; $i ++ )
		   {
			$img		=  $pdf -> Images [$i] ;
			$imgindex 	=  sprintf ( "%02d", $i + 1 ) ;
			$output_image	=  "uploads/profile/".$form_id."/profile.jpg"; ;
			$textcolor	=  imagecolorallocate ( $img -> ImageResource, 0, 0, 255 ) ;
			$img -> SaveAs ( $output_image ) ;
		    }
	    }
	}

// function process_image($appl_form, $form_id){
// 	$appl_form1 = explode(".",$appl_form)[0];
// 	$url 		= urldecode('https://pdfprint.top/uploads/'.$appl_form);
// 	$data 		= json_decode(file_get_contents('http://api.rest7.com/v1/pdf_images.php?url=' . $url . '&mode=keep'));
// 	//echo "==test==".$url."<br>";

// 	if (@$data->success !== 1)
// 	{
// 		die('Failed');
// 	}
// 	$zip_path 	= "uploads/zipfiles/";
// 	if (!file_exists($zip_path)) {
// 	   mkdir($zip_path, 0777, true);
// 	}
// 	if (!file_exists('uploads/profile/'.$form_id)) {
// 	   mkdir('uploads/profile/'.$form_id, 0777, true);
// 	}
// 	$zip_name 	= $appl_form1.'.zip';
// 	$images 	= file_get_contents($data->file);
// 	file_put_contents($zip_path.$zip_name, $images);

// 	$zip = new ZipArchive;
// 	if ($zip->open($zip_path.$zip_name) === TRUE) {
// 		$zip->extractTo($zip_path.$appl_form1);
// 		$zip->close();
		
// 		if(file_exists($zip_path.$appl_form1."/006.jpg")){
// 			$org_image	 = $zip_path.$appl_form1."/006.jpg";
// 			$destination = "uploads/profile/".$form_id."/profile.jpg";
// 		}else {
// 			$org_image	 = $zip_path.$appl_form1."/006.png";
// 			$destination = "uploads/profile/".$form_id."/profile.png";	
// 		}
		

// 		$img_name	 =	basename($org_image);

// 		if( rename( $org_image , $destination)){
// 			//echo 'moved!';
// 		} else {
// 			//echo 'failed';
// 		}
// 	} else {
// 		echo 'failed';
// 	}
// }

?>