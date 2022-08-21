<?php  

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "first_website";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("Failed to connect !");
}