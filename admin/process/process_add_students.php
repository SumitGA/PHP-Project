<?php 

//load the classes 
require_once('../../class/connection.class.php');
require_once('../../class/user.class.php');
require_once('../../class/redirect.class.php');

//load the form values
$username=$_POST['username'];
$password=sha1($_POST['password']);
$email = $_POST['email'];
$phone = $_POST['phone'];

//create the object
$objstudents=new Users();
//Call the method

$objstudents->setUsername($username);
$objstudents->setPassword($password);
$objstudents->setEmail($email);
$objstudents->setPhone($phone);

$flag=$objstudents->add_user_students();


if($flag == TRUE){

new Redirect('../index.php?menu=students&action=add_students&success=The Student has been added');
}else{
	
	new Redirect('../index.php?menu=students&action=add_students&error=The Student could not be added');
}

?>












