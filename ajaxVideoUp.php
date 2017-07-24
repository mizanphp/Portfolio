<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');
?>
<?php
$path = "UploadedVideos/";
$valid_formats = array("flv","mp4");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_FILES['filename']['name'];
	$size = $_FILES['filename']['size'];	   
	if(strlen($name)) {
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)) {
	   
			$actual_video_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
			$tmp = $_FILES['filename']['tmp_name'];
			if(move_uploaded_file($tmp, $path.$actual_video_name)) {
			
				$query=" INSERT INTO tblvideo (ProfileID, Video) VALUES('".$_REQUEST['GetProfileID']."', '$actual_video_name')";
				$result=@mysqli_query($dbc, $query); 
				$info="<a href=\"UploadedVideos/".$actual_video_name."\" style=\"display:block; width:150px; height:180px; margin:auto; \" id=\"player\">
					</a>";
			} else {
				echo "failed";
			}
				
		} else {
			echo "Invalid file format.."; 
		} 
		
	} else {
		echo "Please select Video..!";
	}
   ?>
   
	<script type="text/javascript" src="jQueryUI/js/flowplayer-3.2.6.min.js"></script>
	
		<?php echo $info;  ?>
		<script>
		  flowplayer("player", "flowplayer/flowplayer-3.2.7.swf", {
			  clip:  {
				  autoPlay: false,
				  autoBuffering: true
			  }
		  });
		</script>
		
		
	<?php
	
	exit();
	
}
	
?>