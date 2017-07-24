<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

$path = "UploadedImages/";

$valid_formats = array("jpg", "png", "gif", "bmp");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_FILES['Imagefilename']['name'];
	$size = $_FILES['Imagefilename']['size'];
	
	if(strlen($name)) {
	
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)) {
	   
			$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			$tmp = $_FILES['Imagefilename']['tmp_name'];
			if(move_uploaded_file($tmp, $path.$actual_image_name)) {
				
				$query=" INSERT INTO tblphoto(ProfileID, Photo)
										VALUE ('".$_REQUEST['GetProfileID']."', '$actual_image_name')";
				$result=@mysqli_query($dbc, $query);							   
				$info="<img src=\"UploadedImages/".$actual_image_name."\"  height='180' width='150'/>|";
				$info.="<img src=\"UploadedImages/".$actual_image_name."\"  height='48' width='46' />";
			} else {
				echo "failed";
			}
			
		} else {
			echo "Invalid file format.."; 
		}
		
	} else {
		echo "Please select image..!";
	}

   
	echo $info;  
	exit();

}
	
?>
