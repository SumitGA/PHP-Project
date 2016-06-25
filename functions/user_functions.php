<?php
function change_password($oldpass, $newpass, $userid){
	//connect to the datbase
	$link = connect();
	//validate if there exist a user with userID and the password
	$flag = validate($userid, $oldpass);
	
	
	//replace the new password : UPDATE
	if($flag == TRUE){
	//user is in the system, change the password
	$sql = "UPDATE admin_users SET password = '$newpass' 
				WHERE admin_id = '$userid'  ";
		
	//execute the sql
	$res = mysqli_query($link, $sql) or trigger_error(mysqli_error($link));
	
	//decisive parameter
	$affRows = mysqli_affected_rows($link);
	
	//close the datbase
	close($link);
	if($affRows > 0){
		//the password has been modified with the new one
	return TRUE;	
	}else{
	//the password could not be modified	
	return FALSE;
	}
	}else{
		return FALSE;
	}
	
}//function  ends
///////////////////////////////////////////////
//validate
/////////////////////////////////////////////
function validate($userid, $oldpass){
	//connect to the datbase
	$link = connect();
	//prepare the sql
	
	$sql = "SELECT * FROM admin_users WHERE admin_id = '$userid' AND password = '$oldpass' ";
	//execute
	$res = mysqli_query($link, $sql) or trigger_error(mysqli_error($link));
	//decisive param
	$numRows = mysqli_num_rows($res);
	//close the datbase
	close($link);
	
	if($numRows > 0){
		//there is a matching user
	return TRUE;	
	}else{
	//user not found
	return FALSE;	
	}
}//function ends


//function to add users
function add_users($username,$password,$email,$access_level,$user_status){
	
	//connect to the database
	$link = connect();
	
	//prepare the sql 
	$sql = "INSERT INTO users
			(username,password,email,access_level,user_status) VALUES  ('$username','$password','$email','$access_level','$user_status')" ;
	
	//execute the sql
	$res = mysqli_query($link,$sql) or trigger_error($link);
	
	//decisive paramater
	$affRows = mysqli_affected_rows($link);
	//close the database
	close($link);
	
	//decision 
	
	if($affRows >0 ) {
	//sucess
	return TRUE;
	}else{
		return FALSE;
	}
		

}//function ends


//function to view users details
function view_user_details(){
	
	//connect to the database
	$link = connect();
	
	//prepare the sql 
	$sql = "SELECT * From users where user_status='2'  ORDER BY userid " ;
	
	//execute the sql
	$res = mysqli_query($link,$sql) or trigger_error($link);
	
	//blank array 
$users = array();

//decisive paramters

$numRows = mysqli_num_rows($res);

//loop through the records 
if($numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($res)){
		array_push($users,$row);
	} //loop ends
}//if ends
	
	return $users;
	//close the connections
	close($link);
	
}//function ends



//////////////////////////////////////////////////////////////////////////////
////////////////////// teachers informations /////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
function view_teachers_details(){
	
	//connect to the database
	$link = connect();
	
	//prepare the sql 
	$sql = "SELECT * From users where access_level='2'  ORDER BY userid " ;
	
	//execute the sql
	$res = mysqli_query($link,$sql) or trigger_error($link);
	
	//blank array 
$users = array();

//decisive paramters

$numRows = mysqli_num_rows($res);

//loop through the records 
if($numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($res)){
		array_push($users,$row);
	} //loop ends
}//if ends
	
	return $users;
	//close the connections
	close($link);
	
}//function ends




?>
	

