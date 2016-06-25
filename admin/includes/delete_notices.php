<?php 
//load the classes
require_once("../class/connection.class.php");
require_once("../class/notice.class.php");
require_once("../class/redirect.class.php");
//load the if form the url 
$id=isset($_GET['id']) ? $_GET['id']  :'';
//create abn object
$objnotice=new Notice();

//call the method
$flag=$objnotice->delete_notices($id);
//redirect to the apppropriate page
if($flag==TRUE){
	new Redirect('index.php?menu=notices&action=view_notices&success=The notice has been deleted');
}else{
	new Redirect('index.php?menu=notices&action=view_notices&error=The notice could not be deleted');
}


?>