<?php
$Severname="localhost";
$Username="root";
$password="";
$Database="db_rubberhub";

$conn=mysqli_connect($Severname,$Username,$password,$Database);
if(!$conn) 
{
	echo "Not Connected";                                         
}
?>