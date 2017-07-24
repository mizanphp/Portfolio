<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

ob_clean();

$query2="SELECT AdminEmail FROM tbladmin limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;
echo $row2['AdminEmail'];

echo $_SERVER['PHP_SELF'].'<BR/>';

?>
