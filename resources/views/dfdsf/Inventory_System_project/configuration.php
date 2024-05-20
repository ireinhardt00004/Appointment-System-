<?php
//dbconnect.php
$conn = mysqli_connect("localhost","root","");
if(!$conn){
	die("Cannot connect" . mysqli_error());
}
mysqli_select_db($conn, "inventory_system_project") or die("cannot connect");

?>