<?php 

$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'orchid';
	
	//statements
	//connect to the database
	$conxn = mysqli_connect($host,$user,$pwd,$db) or die(mysqli_error($conxn));
	//echo "The databse has been connected " ;/*.$conxn -> thread_id;*/
	//this return a value
	
	return $conxn; //object
	


?>