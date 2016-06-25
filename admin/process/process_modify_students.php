<?php 

//connect to the database

require_once('../../class/connection.class.php');
require_once('../../class/user.class.php');
require_once('../../class/redirect.class.php');



//get the user_id
$id=isset($_GET['id']) ? $_GET['id'] : '';




//create the user object
$objstudent=new Users();
//create the Image object

//load the form value
$username=$_POST['username'];
$password=sha1($_POST['password']);
$email =$_POST['email'];
$phone  =$_POST['phone'];
$id=$_POST['id'];
//set the properties users
$objstudent->setUser_id($id);
$objstudent->setUsername($username);
$objstudent->setPassword($password);
$objstudent->setEmail($email);
$objstudent->setPhone($phone);
$flag=$objstudent->modify_user_students();



if($flag == TRUE){

new Redirect('../index.php?menu=students&action=view_students&success=The Student has been modified');
}else{
	
	new Redirect('../index.php?menu=students&action=view_students&error=The Student could not be modified');
}




?>