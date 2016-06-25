<?php 
session_start();

//load the class
require_once('../functions/db_connect.php');


 
//load the form values
$username=$_POST['username'];
$password=sha1($_POST['password']);

//prepare the sql
$sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password' AND  user_status='1' ";



//execute the sql
$res = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
//decisive parmaseter
$numRows = mysqli_num_rows($res);
if($numRows > 0){
//credentials matched
$row = mysqli_fetch_assoc($res); // fetch a single record
mysqli_close($conxn); //close the connection
//session data
$_SESSION['user_id']  = $row['user_id'];
$_SESSION['username'] = $row['username'];
$_SESSION['password'] = $row['password'];
$_SESSION['accesslevel']=$row['access_level'];


}

if($_SESSION['accesslevel']=='1'){
	header('location: ../index.php');
}else{

header('location: ../index.php');
}
 


?>