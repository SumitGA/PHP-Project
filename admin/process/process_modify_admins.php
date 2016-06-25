<?php 
session_start();
//connect to the database

require_once('../../class/connection.class.php');
require_once('../../class/admin.class.php');
require_once('../../class/redirect.class.php');



//get the user_id
$id=isset($_GET['id']) ? $_GET['id'] : '';




//create the user object
$objuser=new Admin();
//create the Image object

//load the form value
$username=$_POST['username'];
$password=sha1($_POST['password']);
$email =$_POST['email'];
$phone  =$_POST['phone'];
$id=$_POST['id'];
//set the properties users
$objuser->setAdmin_id($id);
$objuser->setUser_name($username);
$objuser->setPassword($password);
$objuser->setEmail($email);
$objuser->setPhone($phone);
if($_FILES['image']['name'] !=''){
	
	
	$flag = $objuser->modify_admin('image',$_POST['oldimage']);
}else{

//call the function 
$flag = $objuser->modify_admin();
}

if($flag == TRUE){

new Redirect('../index.php?menu=admins&action=view_admin&success=The Admin User has been modified');
}else{
	
	new Redirect('../index.php?menu=admins&action=edit_admins&error=The Admin User could not be modified');
}




?>