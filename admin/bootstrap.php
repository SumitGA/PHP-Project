 
<?php
session_start();
if(!isset($_SESSION['user_name'])){
	header('location: login.php');
	exit;
}

///////////////////////////////////////////////////////////////////
/////////////load the url paramaters//////////////////////////////
/////////////////////////////////////////////////////////////////
$menu=isset($_GET['menu']) ? $_GET['menu'] : '';
$action=isset($_GET['action']) ? $_GET['action'] : '';

switch($menu){
	case 'admins':
	if($action == 'change_password'){
		$page_to_load = "includes/change_password_admins.php";
	}elseif($action == 'view_admin'){
		$page_to_load = "includes/view_admins.php";
	}elseif($action == 'add_admin'){
		$page_to_load="includes/add_admins.php";
	}elseif($action == 'delete_admin'){
		$page_to_load="includes/delete_admin.php";
	
	}elseif($action == 'edit_admins'){
		$page_to_load="includes/modify_admin.php";
	
	}else{
		
		$page_to_load="includes/welcome.php";
	}
		
	break;
	
	case 'teachers':
	if($action=='add_teachers'){
		$page_to_load="includes/add_teachers.php";
	}else if($action == 'view_teachers'){
		$page_to_load="includes/view_teachers.php";
	}else if($action=='edit_teachers'){
		$page_to_load="includes/edit_teachers.php";
	}else if($action == 'delete_teachers'){
		$page_to_load="includes/delete_teachers.php";
	}else{
		$page_to_load="includes/welcome.php";
	}
	break;
	
	case 'students':
 	if($action =='add_students' ){
		$page_to_load ="includes/add_students.php";
	}else if($action=='view_students'){
		$page_to_load="includes/view_students.php";
	}else if($action=='delete_students'){
		$page_to_load="includes/delete_students.php";
	}else if($action=='edit_students'){
		$page_to_load="includes/edit_students.php";
	}else{
		$page_to_load="includes/welcome.php";
	}
	break;
	case 'sliders':
	if($action=='add_sliders'){
		$page_to_load="includes/add_sliders.php";
	}elseif($action=='view_sliders'){
		$page_to_load="includes/view_sliders.php";	
	
	}elseif($action=='edit_sliders'){
		$page_to_load="includes/edit_sliders.php";
	}elseif($action=='delete_sliders'){
		$page_to_load="includes/delete_sliders.php";
	}else{
		$page_to_load="includes/welcome.php";
	}
	break;
	
	case 'gallery':
	if($action=='add_images'){
		$page_to_load="includes/add_images.php";
	}elseif($action=='view_images'){
	    $page_to_load="includes/view_images.php";
	}elseif($action=='delete_images'){
		$page_to_load="includes/delete_images.php";
	}else{
		$page_to_load="includes/welcome.php";
	}
	
	
	break;
	
	
	
	case 'notices':
	if($action=='add_notices'){
		$page_to_load="includes/add_notices.php";
	}elseif($action=='view_notices'){
		$page_to_load="includes/view_notices.php";
	}elseif($action=='delete_notices'){
		$page_to_load="includes/delete_notices.php";
	}elseif($action=='edit_notices'){
		$page_to_load="includes/edit_notices.php";
	}else{
		$page_to_load="includes/welcome.php";
	}
	break;
	
	case 'notes':
	if($action=='add_notes'){
		$page_to_load="includes/add_notes.php";
	}elseif($action=='view_notes'){
		$page_to_load="includes/view_notes.php";
	}elseif($action=='delete_notes'){
		$page_to_load="includes/delete_notes.php";
	}elseif($action=='edit_notes'){
		$page_to_load="includes/edit_notes.php";
	}
	break;
	
	
	default:
	$page_to_load="includes/welcome.php";
	
	break;
	
	
	
}//switch ends





?>