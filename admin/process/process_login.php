<?php
session_start();
//connect to the datbase
require_once('../../functions/db_connect.php');


$username = $_POST['username'];
$password = sha1($_POST['password']);// encrypted the value



//prepare the sql
$sql = "SELECT * FROM admin_users WHERE user_name ='$username' AND password = '$password' AND  user_status='1' ";

//execute the sql
$res = mysqli_query($conxn, $sql) or die(mysqli_error($conxn));
//decisive parmaseter
$numRows = mysqli_num_rows($res);
if($numRows > 0){
//credentials matched
$row = mysqli_fetch_assoc($res); // fetch a single record
mysqli_close($conxn); //close the connection
//session data
$_SESSION['admin_id']  = $row['admin_id'];
$_SESSION['user_name'] = $row['user_name'];
$_SESSION['registration_date']= $row['registration_date'];
$_SESSION['image_link']=$row['image_link'];





header('location: ../index.php');
}else{
//faiure
header('location: ../login.php');
}

?>