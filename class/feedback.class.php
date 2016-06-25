<?php
class Feedback extends Connection{
	//set the properties
	private $feedback_id;
	private $student_name;
	private $feedback;
	private $feedback_status;
	private $image_link;
	private $email;
	///call the constructor of parent class
	public function Feedback(){
		parent::__construct();
	}
	
	////////////////////////////////////
	//////getters  and setters ////////
	//////////////////////////////////

	/**
	 * @return the $feedback_id
	 */
	public function getFeedback_id() {
		return $this->feedback_id;
	}

	/**
	 * @return the $student_name
	 */
	public function getStudent_name() {
		return $this->student_name;
	}

	/**
	 * @return the $feedback
	 */
	public function getFeedback() {
		return $this->feedback;
	}

	/**
	 * @return the $feedback_status
	 */
	public function getFeedback_status() {
		return $this->feedback_status;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param field_type $feedback_id
	 */
	public function setFeedback_id($feedback_id) {
		$this->feedback_id = $feedback_id;
	}

	/**
	 * @param field_type $student_name
	 */
	public function setStudent_name($student_name) {
		$this->student_name = $student_name;
	}

	/**
	 * @param field_type $feedback
	 */
	public function setFeedback($feedback) {
		$this->feedback = $feedback;
	}

	/**
	 * @param field_type $feedback_status
	 */
	public function setFeedback_status($feedback_status) {
		$this->feedback_status = $feedback_status;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////Upload function for image manipulation /////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////
	public function upload_main($elementname){
	
	
	
	
	
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
		$destination="../uploads/students_images/".$newfilename;
	
	
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
		include_once('../functions/image_resize_functions.php');
		$target_file =$destination;
		$resized_file = $destination;
		
		$wmax = 80;
		$hmax = 80;
	
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		$this->setImage_link($resized_file);
			if($target_file == $resized_file){
				return true;
			}else{
				return false;
			}
		
	
	}//end of the upload function
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////// Function to add feedback ////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add_feedback($elementname){
		$flag=$this->upload_main($elementname);
		
		if($flag==TRUE){
			
			//prepare the sql

			
			$this->sql="INSERT INTO students_feedback (student_name,feedback,image_link,email) VALUES ('$this->student_name','$this->feedback','$this->image_link','$this->email')";
		
		//execute the sql
		
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));

	    //decisive paramater
	    $this->affRows=mysqli_affected_rows($this->conxn);
	    //get the result
	    if($this->affRows >0){
	    	return TRUE;
	    }else{
	    	return FALSE;
	    }
	    }else{
	    	return FALSE;
				
		}//end of if statement 
		
		
		
		
		
		}//end of the function 
		
	////////////////////////////////////////////////////////////////////////////////////////
	///////////////Function for viewwing the Feedback records//////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	public function view_feedback($limit=''){
		$this->sql="SELECT * FROM students_feedback ";
		
		
	if(isset($this->feedback_id)){
			$this->sql .= "WHERE feedback_id ='$this->feedback_id' ";
		}
		
		$this->sql .= "ORDER BY feedback_id DESC"; //latest on the top
		
		//limited numbers
		if($limit != ''){
		$this->sql .= " LIMIT $limit" ;	
		}
		//////////////////////////////////
		//execute the sql
		$this->res = mysqli_query($this->conxn, $this->sql)
					or 
						trigger_error($this->error = mysqli_error($this->conxn));
///////////////
//decisive parameter
$this->numRows = mysqli_num_rows($this->res);
if($this->numRows > 0){
//there are records
//loop throu the rcords
while($row = mysqli_fetch_assoc($this->res)){
	array_push($this->data, $row);
}//loop ends
}

//retur the data
return $this->data;
	}//method ends
	
	
	
}//end of the class