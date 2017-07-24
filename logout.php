<?php 
include("includes/mysqliConnect.php");


if ( !isset($_SESSION['UserID']) ) {

	// Delete the buffer.
	ob_end_clean(); 
	
	// Redirect user to index
	header("Location:index.php");
	
	exit();
	
} else { 
	
	// Log out the user.

	setcookie( session_name(), '', time() - 3600, '/', '', 0, 0 );
	UNSET( $_SESSION['UserID'] );
	UNSET( $_SESSION['Email'] );
	UNSET( $_SESSION['FirstName'] );
	UNSET( $_SESSION['LastName'] );
	
	// Destroy the variables.
	$_SESSION = array(); 
	
	// Destroy the session itself.
	session_destroy(); 
	header("Location:index.php");
	exit(); 

}

?>
