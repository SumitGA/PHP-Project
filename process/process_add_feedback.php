<?php 
//load all the classes
require_once("../class/connection.class.php");
require_once("../class/feedback.class.php");
require_once("../class/redirect.class.php");

//load the form values
$name=$_POST['name'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];

//create and object
$objfeedback=new Feedback();
//set the properties
$objfeedback->setStudent_name($name);
$objfeedback->setEmail($email);
$objfeedback->setFeedback($feedback);
//call the method
$flag=$objfeedback->add_feedback('image');

if($flag==TRUE){
	//redirect to the appropriate page
	new Redirect("../index.php?success=The feedback has been submitted and published");
}else{
	//redirect to the appropriate page
	new Redirect("../index.php?error=The feedback could not be submitted, please try again later");
}



?>