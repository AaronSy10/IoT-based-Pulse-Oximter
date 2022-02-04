<?php
$server="localhost";//server name
$user="root";		//user name
$pass="";			//user password
$db_name="po_data";//database name
$conn= new mysqli($server,$user,$pass,$db_name);
if($conn->connect_error){
	die('Connection Failed'.$conn->connect_error);
}
?>