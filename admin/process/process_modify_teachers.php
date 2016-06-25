<?php 

//connect to the database

require_once('../../class/connection.class.php');
require_once('../../class/user.class.php');
require_once('../../class/redirect.class.php');



//get the user_id
$id=isset($_GET['id']) ? $_GET['id'] : '';




//create the user object
$objuser=new Users();
//create the Image object

//load the form value
$username=$_POST['username'];
$password=sha1($_POST['password']);
$email =$_POST['email'];
$phone  =$_POST['phone'];
$id=$_POST['id'];
//set the properties users
$objuser->setUser_id($id);
$objuser->setUsername($username);
$objuser->setPassword($password);
$objuser->setEmail($email);
$objuser->setPhone($phone);
$flag=$objuser->modify_user_teachers();



if($flag == TRUE){

new Redirect('../index.php?menu=teachers&action=view_teachers&success=The Teacher has been modified');
}else{
	
	new Redirect('../index.php?menu=teachers&action=edit_teachers&error=The Teacher could not be modified');
}




?>