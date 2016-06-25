<?php
//class for users

class Users extends  Connection 

{
	///////////////////////////////////////////////////////////////////
	//////////////////properties
	/////////////////////////////////////////////////////////////////
	
	public $user_id;
	public $username;
	public $email;
	public $password;
	public $phone;
	public $user_status;
	public $access_level;
	
	
	////////////////////////////////////////////////////////////////////
	////////////////Constructors///////////////////////////////////////
	//////////////////////////////////////////////////////////////////
	
	public function Users(){
		//call the parent constructor
		parent::__construct();
	}
	
	
	/////////////////////////////////////////////////////////////////
	/////////////////////////getters and setters////////////////////
	////////////////////////////////////////////////////////////////

	/**
	 * @return the $user_id
	 */
	public function getUser_id() {
		return $this->user_id;
	}

	/**
	 * @param field_type $user_id
	 */
	public function setUser_id($user_id) {
		$this->user_id = $user_id;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param field_type $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param field_type $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return the $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param field_type $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @return the $user_status
	 */
	public function getUser_status() {
		return $this->user_status;
	}
	

	/**
	 * @param field_type $user_status
	 */
	public function setUser_status($user_status) {
		$this->user_status = $user_status;
	}
	
	
	/**
	*@return the $access_level
	*/
	public function getAccess_level(){
		return $this->access_level;
	}

	/**
	*@param field_type $access_level
	*/
	public function setAccess_level($access_level){
		$this->access_level = $access_level;
	}
	
	
	
 
/////////////////////////////////////////////////////////////////////////////
///////////////This portion are for teachers Users//////////////////////////
///////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////
////////add teachers///////////////////////////
//////////////////////////////////////////////
public function add_user_teachers(){
	
	$this->access_level = '1';
	$this->user_status = '1';
		//prepare the sql
		$this->sql = "INSERT INTO users
		(username,password,email,phone,access_level,user_status) VALUES('$this->username','$this->password','$this->email','$this->phone','$this->access_level','$this->user_status')" ;
		
		
		
	
		//execute the sql
		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error((mysqli_error($this->conxn)));
		
	
	
		//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			//sucess
			return TRUE;
		}else{
			return FALSE;
		}
	
	
	}//function ends
	
	////////////////////////////////////////////////////////////////////////
	////////////////////// view Teachers //////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	public function view_teachers_details(){

	
	//prepare the sql 
	$this->sql = "SELECT * From users where access_level='1' " ;
	
	//only a particular user
	if(isset($user_id)){
			$this->sql .=" AND user_id='$this->user_id'";
	}
	
	
	$this->sql .="ORDER BY user_id";
	
	//execute the sql
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	
	//blank array 
$teachers = array();

//decisive paramters

$this->numRows = mysqli_num_rows($this->res);

//loop through the records 
if($this->numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($this->res)){
		array_push($teachers,$row);
	} //loop ends
}//if ends
	
	return $teachers;

	
}//function ends


///////////////////////////////////////////////////////////////////////////////
////////////////////////// modify teachers ////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
public function modify_user_teachers(){
	
	$this->access_level = '1';
	$this->user_status = '1';
		//prepare the sql
		$this->sql = "UPDATE  users 
		SET
		username='$this->username',
		password='$this->password', 		
		email='$this->email',
		phone ='$this->phone',
		access_level='$this->access_level',
		user_status ='$this->user_status' 
		WHERE user_id='$this->user_id'" ;
		
		//execute the sql
		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error((mysqli_error($this->conxn)));
		
		
	//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			//sucess
			return TRUE;
		}else{
			return FALSE;
		}
	
	
	}//function ends 


//////////////////////////////////////////////////////////////////////////////
//////////////////// delete teachers	///////////////////////////////////
//////////////////////////////////////////////////////////////////////////
public function delete_teacher($id){
	$this->setUser_id($id);
	
	$this->sql ="DELETE FROM users WHERE user_id='$this->user_id' AND access_level='1'  ";
	
	
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error(($this->error=mysqli_error($this->conxn)));
		
	
	
		//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			//sucess
			return TRUE;
			
		}else{
			return FALSE;
			
		}
		
	
}//end of the functions




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////// This sections is for Students ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Add Students //////////////////////////////
/////////////////////////////////////////////////////////////////////////////
public function add_user_students(){
	
	$this->access_level = '0';
	$this->user_status = '1';
		//prepare the sql
		$this->sql = "INSERT INTO users
		(username,password,email,phone,access_level,user_status) VALUES('$this->username','$this->password','$this->email','$this->phone','$this->access_level','$this->user_status')" ;
		
		
		
	
		//execute the sql
		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error((mysqli_error($this->conxn)));
		
	
	
		//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			//sucess
			return TRUE;
		}else{
			return FALSE;
		}
	
	
	}//function ends	
	
	
	//////////////////////////////////////////////////////////////////////
	//////////////////////// view Students Details //////////////////////
	////////////////////////////////////////////////////////////////////
	
	public function view_students_details(){

	
	//prepare the sql 
	$this->sql = "SELECT * From users where access_level='0' " ;
	
	//only a particular user
	if(isset($user_id)){
			$this->sql .=" AND user_id='$this->user_id'";
	}
	
	
	$this->sql .="ORDER BY user_id";
	
	//execute the sql
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	
	//blank array 
$students = array();

//decisive paramters

$this->numRows = mysqli_num_rows($this->res);

//loop through the records 
if($this->numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($this->res)){
		array_push($students,$row);
	} //loop ends
}//if ends
	
	return $students;

	
}//function ends

/////////////////////////////////////////////////////////////////////////////////////////////////// Modify Students /////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
public function modify_user_students(){
	
	$this->access_level = '0';
	$this->user_status = '1';
		//prepare the sql
		$this->sql = "UPDATE  users 
		SET
		username='$this->username',
		password='$this->password', 		
		email='$this->email',
		phone ='$this->phone',
		access_level='$this->access_level',
		user_status ='$this->user_status' 
		WHERE user_id='$this->user_id'" ;
		
		
		
		//execute the sql
		$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error((mysqli_error($this->conxn)));
		
		
	//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			
			
			//sucess
			return TRUE;
		}else{
			return FALSE;
		}
	
	
	}//function ends 
	
	
	///////////////////////////////////////////////////////////////////////////
	//////////////////////////// Delete Students /////////////////////////////
	/////////////////////////////////////////////////////////////////////////
	public function delete_students($id){
	$this->setUser_id($id);
	
	$this->sql ="DELETE FROM users WHERE user_id='$this->user_id' AND access_level='0'  ";
	
	
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error(($this->error=mysqli_error($this->conxn)));
		
	
	
		//decisive paramater
		$this->affRows = mysqli_affected_rows($this->conxn);
		
	
		//decision
	
		if($this->affRows >0 ) {
			//sucess
			return TRUE;
			
		}else{
			return FALSE;
			
		}
		
	
}//end of the functions

	
	

}//end of class users

?>	
