<?php 
session_start();
//connect to the database

require_once('../../class/connection.class.php');
require_once('../../class/admin.class.php');
require_once('../../class/redirect.class.php');



/*//get the user_id
$id=$_SESSION['user_id'];
*/

//create the user object
$objuser=new Admin();


//load the form value
$username=$_POST['username'];
$password=sha1($_POST['password']);
$email =$_POST['email'];
$phone  =$_POST['phone'];
//set the properties users

$objuser->setUser_name($username);
$objuser->setPassword($password);
$objuser->setEmail($email);
$objuser->setPhone($phone);


$flag=$objuser->add_admins('choose_image');


if($flag == TRUE){

new Redirect('../index.php?menu=admins&action=add_admin&success=The Admin User has been added');
}
else{
	
	new Redirect('../index.php?menu=admins&action=add_admin&error=The Admin User could not be added');
}




?>