<?php 

session_start();
$_SESSION['message'] = "";

$image_name = $_POST['file_name'];

$location = "../upload/";

$image = $location.$image_name;


if(file_exists($image)){

	unlink($image); // delete

	$_SESSION['message'] = "Success";

}else{
	$_SESSION['message'] = "File Not Found!" ;
	
}


return header("Location: ../index.php");










	


?>