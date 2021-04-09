<?php 
session_start();
$_SESSION['message'] = "";

$file_name = "../zip/all-image.zip";
touch($file_name);


$zip = new ZipArchive;
$this_zip = $zip->open($file_name);

if($this_zip){


	$location = "../upload";
	$folder = opendir($location);

	if($folder){
	  
	    while (false != ($image = readdir($folder))) {
	     
	      if($image != '.' && $image != '..'){

	       	$zip->addFile($location."/".$image,$image);
	        
	      }
	     
	    }
	    $zip->close();

	    // download

	    if(file_exists($file_name)) {  
	    	// name when download
	    	$demo_name = "my-image.zip";

	         header('Content-type: application/zip');  
	         header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
	         readfile($file_name); // auto download

	         //delete this zip file after download
	         unlink($file_name); 

	         $_SESSION['message'] .= "Download Success!";
	         return header("Location: ../index.php");
	    } 


	    // end download

	}



}else{
	$_SESSION['message'] .= "Zip Not Support";
	return header("Location: ../index.php");
}






?>