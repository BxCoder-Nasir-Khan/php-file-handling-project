<?php 
	
session_start();
$_SESSION['message'] = "";


	if(isset($_POST['upload_btn'])){



		$file = $_FILES['my_file'];
		$name 		= $file['name'];
		$main_file  = $file['tmp_name'];



		


		$finfo 		= finfo_open(FILEINFO_MIME_TYPE);
		$type       = finfo_file($finfo, $main_file);

		$mimet = array( 
		    // 'txt' 	=> 'text/plain',
		    // 'htm' 	=> 'text/html',
		    // 'html' 	=> 'text/html',
		    // 'php' 	=> 'text/html',
		    // 'css' 	=> 'text/css',
		    // 'js' 	=> 'application/javascript',
		    // 'json' 	=> 'application/json',
		    // 'xml' 	=> 'application/xml',
		    // 'swf' 	=> 'application/x-shockwave-flash',
		    // 'flv' 	=> 'video/x-flv',

		    // images
		    'png' 	=> 'image/png',
		    'jpe' 	=> 'image/jpeg',
		    'jpeg' 	=> 'image/jpeg',
		    'jpg' 	=> 'image/jpeg',
		    'gif' 	=> 'image/gif',
		    'bmp' 	=> 'image/bmp',
		    'ico' 	=> 'image/vnd.microsoft.icon',
		    'tiff' 	=> 'image/tiff',
		    'tif' 	=> 'image/tiff',
		    'svg' 	=> 'image/svg+xml',
		    'svgz' 	=> 'image/svg+xml',

		    // archives
		    // 'zip' => 'application/zip',
		    // 'rar' => 'application/x-rar-compressed',
		    // 'exe' => 'application/x-msdownload',
		    // 'msi' => 'application/x-msdownload',
		    // 'cab' => 'application/vnd.ms-cab-compressed',

		    // audio/video
		    // 'mp3' 	=> 'audio/mpeg',
		    // 'qt' 	=> 'video/quicktime',
		    // 'mov' 	=> 'video/quicktime',

		    // adobe
		    // 'pdf' 	=> 'application/pdf',
		    // 'psd' 	=> 'image/vnd.adobe.photoshop',
		    // 'ai' 	=> 'application/postscript',
		    // 'eps' 	=> 'application/postscript',
		    // 'ps' 	=> 'application/postscript',

		    // ms office
		    // 'doc' 	=> 'application/msword',
		    // 'rtf' 	=> 'application/rtf',
		    // 'xls' 	=> 'application/vnd.ms-excel',
		    // 'ppt' 	=> 'application/vnd.ms-powerpoint',
		    // 'docx' 	=> 'application/msword',
		    // 'xlsx' 	=> 'application/vnd.ms-excel',
		    // 'pptx' 	=> 'application/vnd.ms-powerpoint',


		    // open office
		    // 'odt' => 'application/vnd.oasis.opendocument.text',
		    // 'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		);



		if(!in_array($type,$mimet)){

			$_SESSION['message'] = "Not Image";
			return header("Location: ../index.php");
		}

		

		$ext = explode(".", $name);

		$ext = $ext[1];


		$upload_location = "../upload/";
		$new_name = "upload-image-".time().".".$ext;
		$new_upload_file = $upload_location.$new_name;



		move_uploaded_file($main_file,$new_upload_file);


		$_SESSION['message'] = "Success";
		return header("Location: ../index.php");




	}

?>