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
$objteachers=new Users();
//Call the method

$objteachers->setUsername($username);
$objteachers->setPassword($password);
$objteachers->setEmail($email);
$objteachers->setPhone($phone);

$flag=$objteachers->add_user_teachers();


if($flag == TRUE){

new Redirect('../index.php?menu=teachers&action=add_teachers&success=The teacher  has been added');
}else{
	
	new Redirect('../index.php?menu=teachers&action=add_teachers&error=The teachers could not be added');
}

?>












