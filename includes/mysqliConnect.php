<?php 
// host name
$HostName="http://".$_SERVER['HTTP_HOST']."/anewsite/";
// get profile link
$GetLink="http://".$_SERVER['HTTP_HOST']."/anewsite/PreviewPortfolio.php?PID=".$_GET['PID']."";
//$ForwardLink="http://".$_SERVER['HTTP_HOST']."/anewsite/PreviewPortfolio.php?PID=".$_GET['PID']."&Guest=1";

// get path for view document
$GetPath="http://".$_SERVER['HTTP_HOST']."/anewsite/UploadedDocument/";
// get path for delete document 
$GetRootPath="".$_SERVER['DOCUMENT_ROOT']."/anewsite/UploadedDocument/";
// get path for delete photo 
$GetRootPathPhoto="".$_SERVER['DOCUMENT_ROOT']."/anewsite/UploadedImages/";
// get path for delete photo 
$GetRootPathVideo="".$_SERVER['DOCUMENT_ROOT']."/anewsite/UploadedVideos/";


/*
// host name
$HostName="http://".$_SERVER['HTTP_HOST']."/mizan/eProfile/";
// get profile link
$GetLink="http://".$_SERVER['HTTP_HOST']."/mizan/eProfile/PreviewPortfolio.php?PID=".$_GET['PID']." ";
// get path for view document
$GetPath="http://".$_SERVER['HTTP_HOST']."/mizan/eProfile/UploadedDocument/";
// get path for delete document 
$GetRootPath="".$_SERVER['DOCUMENT_ROOT']."/mizan/eProfile/UploadedDocument/";
// get path for delete photo 
$GetRootPathPhoto="".$_SERVER['DOCUMENT_ROOT']."/mizan/eProfile/UploadedImages/";
// get path for delete photo 
$GetRootPathVideo="".$_SERVER['DOCUMENT_ROOT']."/mizan/eProfile/UploadedVideos/";
*/


// Start output buffering
ob_start();

// Initialize a session
session_start();

// Set the database access information as constants:

DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'Password');
DEFINE('DB_NAME', 'digitalprofile');
/*
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_USER', 'themexde_eprofi');
DEFINE('DB_PASSWORD', '3P#sphy=Q]e(');
DEFINE('DB_NAME', 'themexde_eprofile');
*/
// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die (' Could not connect to the database '. mysqli_connect_error() );

class Encryption {
    var $skey = "yourSecretKey"; // you can change it

    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }

    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}


?>