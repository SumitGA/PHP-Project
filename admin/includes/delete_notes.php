<?php 
//load the  classes
require_once("../class/connection.class.php");
require_once("../class/notes.class.php");
require_once("../class/redirect.class.php");
///// get the id from url 
$id=isset($_GET['id']) ? $_GET['id'] : '';
//create an object
$objnotes=new Note();
//call the function 
$flag=$objnotes->delete_note($id);
if($flag==TRUE){
	new Redirect("index.php?menu=notes&action=view_notes&success=The note has been deleted form the server");
}else{
	new Redirect("index.php?menu=notes&action=view_notes&error=The note could not be deleted from the server");
}

?>