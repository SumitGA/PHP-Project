<?php 
//load all the required class
require_once("../class/connection.class.php");
require_once("../class/notes.class.php");
require_once("../class/redirect.class.php");
//create an object
$objnotes=new Note();

//load the form values 
$subject=$_POST['subject'];
$radio=$_POST['radio'];
$semester=$_POST['semester'];
//set the properties
$objnotes->setFaculty($radio);
$objnotes->setSubject($subject);
$objnotes->setSemester($semester);
//call the function 
$flag=$objnotes->add_notes_main('upload');

if($flag==TRUE){
	new Redirect('../upload_notes.php?success=The note has been publised and added to the server');
}else{
	new Redirect('../upload_notes.php?error=The note could not been added');
}

?>