<?php 

class Admin extends Connection{
	//load the properties
	private $admin_id;
	private $user_name;
	private $password;
	private $email;
	private $phone;
	private $image_link;
	private $user_status;
	private $registration_date;
	
	
	
	
	
	////////////////////////////////////////////////////////////////////////////
	////////////// calling the constructor of the parent class ////////////////
	//////////////////////////////////////////////////////////////////////////
	public function Admin(){
		parent::__construct();
	}
	
	///////////////////////////
	//setters and getters /////
	//////////////////////////

	/**
	 * @return the $user_id
	 */
	public function getAdmin_id() {
		return $this->admin_id;
	}

	/**
	 * @return the $user_name
	 */
	public function getUser_name() {
		return $this->user_name;
	
	}
	
	
	/**
	 * @return the $user_name
	 */
	public function getPassword() {
		return $this->password;
	
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}
	
	
	/**
	 * @return the $email
	 */
	public function getRegistration_date() {
		return $this->registration_date;
	}

	/**
	 * @return the $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}
	
	
	/**
	 * @return the $phone
	 */
	public function getUser_status() {
		return $this->user_status;
	}
	

	/**
	 * @param field_type $user_id
	 */
	public function setAdmin_id($admin_id) {
		$this->admin_id=$admin_id;
	}


	/**
	 * @param field_type $user_id
	 */
	public function setRegistartion_date($registration_date) {
		$this->registration_date = $registration_date;
	}

	/**
	 * @param field_type $user_name
	 */
	public function setUser_name($user_name) {
		$this->user_name = $user_name;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	
	/**
	 * @param field_type $email
	 */
	public function setPassword($password) {
		$this->password=$password;
	}
	

	/**
	 * @param field_type $phone
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}
	
	/**
	 * @param field_type $image_link
	 */
	public function setUser_status($user_status) {
		$this->user_status=$user_status;
	}
	
	

	
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////// Upload function for images  /////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////
	////////////// Upload Function For images //////////////////////////////
	///////////////////////////////////////////////////////////////////////
	public function upload($elementname){
	
	
	
	
	
		// and create local PHP variables from the $_FILES array of information
		$fileName =$_FILES[$elementname]['name']; // The file name
		$fileTmpLoc =$_FILES[$elementname]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES[$elementname]['type']; // The type of file it is
		$fileSize = $_FILES[$elementname]['size']; // File size in bytes
		$fileErrorMsg = $_FILES[$elementname]['error']; // 0 for false... and 1 for true
		$kaboom = explode(".", $fileName); // Split file name into an array using the dot
		$fileExt = end($kaboom); // Now target the last array element to get the file extension
	
		// START PHP Image Upload Error Handling --------------------------------------------------
		if (!$fileTmpLoc) { // if file not chosen
			echo "ERROR: Please browse for a file before clicking the upload button.";
			exit();
		}
		elseif($fileSize > 5242880) { // if file size is larger than 5 Megabytes
			echo "ERROR: Your file was larger than 5 Megabytes in size.";
			unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			exit();
		} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
			// This condition is only if you wish to allow uploading of specific file types
			echo "ERROR: Your image was not .gif, .jpg, or .png.";
			unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			exit();
		} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
			echo "ERROR: An error occured while processing the file. Try again.";
			exit();
		}
	
		$newfilename=date('y_m_d_h_i_s_').$fileName;
		$destination="../../uploads/admin_images/".$newfilename;
	
	
		// END PHP Image Upload Error Handling ----------------------------------------------------
		// Place it into your "uploads" folder mow using the move_uploaded_file() function
		$moveResult = move_uploaded_file($fileTmpLoc,$destination);
	
		// Check to make sure the move result is true before continuing
		if ($moveResult != true) {
			echo "ERROR: File not uploaded. Try again.";
			unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
			exit();
		}
	
		// ---------- Include Universal Image Resizing Function --------
		include_once('../../functions/image_resize_functions.php');
		$target_file =$destination;
		$resized_file = $destination;
		
		$wmax = 160;
		$hmax = 160;
	
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		if($target_file =$resized_file){
			$this->setImage_link($resized_file);
			if($target_file =$resized_file){
				return true;
			}else{
				return false;
			}
		}
	}//end of the upload function
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////// ADD ADMINS /////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	public  function add_admins($elementname){
		
		
	$flag = $this->upload($elementname);
	
	if($flag == TRUE){
		
		$this->sql="INSERT INTO admin_users 
		(user_name,password,email,phone,image_link) VALUES  ('$this->user_name','$this->password','$this->email','$this->phone','$this->image_link') ;";
		
		
		
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
		
		
		
		
	}else{
		return false;
	}//end of if condition 
		
	}//end of the function 
	
	
	//////////////////////////////////////////////////////////////////////////////////////
	///////////////// View Admin user  //////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////
	public function view_admin_detials(){
		
	$this->sql="SELECT * FROM admin_users ORDER BY admin_id";	
	
	//execute the sql
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	
	//blank array 
$users = array();

//decisive paramters

$this->numRows = mysqli_num_rows($this->res);

//loop through the records 
if($this->numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($this->res)){
		array_push($users,$row);
	} //loop ends
}//if ends
	
	return $users;

	
}//function ends






/////////////////////////////////////////////////////////////////////////
///////	`				Delete Admin Users						////////////
////////////////////////////////////////////////////////////////////////
public function delete_admin($id){
	$this->setAdmin_id($id);
	
	
	//verify the file and remove it from the system
	$this->sql ="SELECT image_link FROM admin_users WHERE admin_id = '$this->admin_id'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error = mysqli_error($this->conxn));
	
	$this->numRows = mysqli_num_rows($this->res);
	$this->data = mysqli_fetch_assoc($this->res);
	if(file_exists("../uploads/admin_images/".$this->data['image_link'])){
		unlink("../uploads/admin_images/".$this->data['image_link']);
	}
	
	
	$this->sql ="DELETE FROM admin_users WHERE admin_id='$this->admin_id' ";
	
	
	
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
		
	
	


}//end of the function 


		////////////////////////////////////////////////////////////////////////////
		//////////////// Modify Admins ////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////


public  function modify_admin($elementname='',$old_file=''){
	
	if($elementname !=''){
		
		//remove the old filename
		if(file_exists("../../uploads/admin_images/".$older_file)){
			//remove it
			unlink("../../uploads/admin_images/".$older_file);
			
			
		}
		
		
	$this->upload($elementName);
	}
	
		
		$this->sql="UPDATE admin_users
	SET
	user_name='$this->user_name',
	password='$this->password',
	email='$this->email',
	phone='$this->phone' ";
	
	
	if($this->image_link !=''){
		$this->sql .=",image_link='$this->image_link'";
	}
	
	$this->sql .="
	
	WHERE admin_id='$this->admin_id' ";

	
	
		
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
	
		
	}//end of the function 


}//end of the class

?>