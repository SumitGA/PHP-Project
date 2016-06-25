<?php
class Note extends Connection{
	//load the properties 
	private $contentid;
	private $content_link;
	private $uploaded_date;
	private $faculty;
	private $semester;
	private $subject;
	
	//load the parent class Constructor 
	public function Note(){
		parent::__construct();
	}
	
	/////setter and getters

	/**
	 * @return the $contentid
	 */
	public function getContentid() {
		return $this->contentid;
	}

	/**
	 * @return the $content_link
	 */
	public function getContent_link() {
		return $this->content_link;
	}

	/**
	 * @return the $uploaded_date
	 */
	public function getUploaded_date() {
		return $this->uploaded_date;
	}

	/**
	 * @return the $faculty
	 */
	public function getFaculty() {
		return $this->faculty;
	}

	/**
	 * @return the $semester
	 */
	public function getSemester() {
		return $this->semester;
	}

	/**
	 * @return the $subject
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @param field_type $contentid
	 */
	public function setContentid($contentid) {
		$this->contentid = $contentid;
	}

	/**
	 * @param field_type $content_link
	 */
	public function setContent_link($content_link) {
		$this->content_link = $content_link;
	}

	/**
	 * @param field_type $uploaded_date
	 */
	public function setUploaded_date($uploaded_date) {
		$this->uploaded_date = $uploaded_date;
	}

	/**
	 * @param field_type $faculty
	 */
	public function setFaculty($faculty) {
		$this->faculty = $faculty;
	}

	/**
	 * @param field_type $semester
	 */
	public function setSemester($semester) {
		$this->semester = $semester;
	}

	/**
	 * @param field_type $subject
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////// function to upload tbe file /////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function upload($elementname){
	
	
	
	
	
		// and create local PHP variables from the $_FILES array of information
		$fileName =$_FILES[$elementname]['name']; // The file name
		$fileTmpLoc =$_FILES[$elementname]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES[$elementname]['type']; // The type of file it is
		$fileSize = $_FILES[$elementname]['size']; // File size in bytes
		$fileErrorMsg = $_FILES[$elementname]['error']; // 0 for false... and 1 for true
	
		
		if (!$fileTmpLoc) { // if file not chosen
			echo "ERROR: Please browse for a file before clicking the upload button.";
			exit();
		}else{
			
			$newfilename=date('y_m_d_h_i_s_').$fileName;
			$destination="../../uploads/notes/".$newfilename;
			
			
			
			$moveResult = move_uploaded_file($fileTmpLoc,$destination);
			
			
			// Check to make sure the move result is true before continuing
			if ($moveResult != true) {
				echo "ERROR: File not uploaded. Try again.";
				unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
				exit();
			}
		}
		
		$this->setContent_link($destination);
		
		if($this->content_link !=''){
		
		return TRUE;
		}else{
		return FALSE;
		}
		
		
	}//end of the function

	/////////////////////////////////////////////////////////////////////////////////
	////////////////////// UplOad method for main page//////////////////////////////
	////////////////////////////////////////////////////////////////////////////////
	public function upload_main($elementname){
	
	
	
	
	
		// and create local PHP variables from the $_FILES array of information
		$fileName =$_FILES[$elementname]['name']; // The file name
		$fileTmpLoc =$_FILES[$elementname]["tmp_name"]; // File in the PHP tmp folder
		$fileType = $_FILES[$elementname]['type']; // The type of file it is
		$fileSize = $_FILES[$elementname]['size']; // File size in bytes
		$fileErrorMsg = $_FILES[$elementname]['error']; // 0 for false... and 1 for true
	
		
		if (!$fileTmpLoc) { // if file not chosen
			echo "ERROR: Please browse for a file before clicking the upload button.";
			exit();
		}else{
			
			$newfilename=date('y_m_d_h_i_s_').$fileName;
			$destination="../uploads/notes/".$newfilename;
			
			
			
			$moveResult = move_uploaded_file($fileTmpLoc,$destination);
			
			
			// Check to make sure the move result is true before continuing
			if ($moveResult != true) {
				echo "ERROR: File not uploaded. Try again.";
				unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
				exit();
			}
		}
		
		$this->setContent_link($destination);
		
		if($this->content_link !=''){
		
		return TRUE;
		}else{
		return FALSE;
		}
		
		
	}//end of the function
	
	
	////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////// Function to add notes for Teachers/////////////////
	//////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	//////////Function to add the notes////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////
	public function add_notes_main($elementname){
		
		$flag=$this->upload_main($elementname);
		
		if($flag==TRUE){
			
			$this->sql="INSERT INTO contents(faculty,semester,subject,content_link) VALUES('$this->faculty','$this->semester','$this->subject','$this->content_link')";
			
			
			//execute the sql 
			$this->res=mysqli_query($this->conxn,$this->sql)or trigger_error($this->error=mysqli_error($this->conxn));
			//decisive paramater
			$this->affRows=mysqli_affected_rows($this->conxn);
			//decide ture or fals
			if($this->affRows >0){
				return TRUE;
			}else{
				return FALSE;
			}
			
	} 
	}//end of the functio

	
	////////////////////////////////////////////////////////////////////////////////////
	//////////Function to add the notes////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////
	public function add_notes($elementname){
		
		$flag=$this->upload($elementname);
		
		if($flag==TRUE){
			
			$this->sql="INSERT INTO contents(faculty,semester,subject,content_link) VALUES('$this->faculty','$this->semester','$this->subject','$this->content_link')";
			
			
			//execute the sql 
			$this->res=mysqli_query($this->conxn,$this->sql)or trigger_error($this->error=mysqli_error($this->conxn));
			//decisive paramater
			$this->affRows=mysqli_affected_rows($this->conxn);
			//decide ture or fals
			if($this->affRows >0){
				return TRUE;
			}else{
				return FALSE;
			}
			
	} 
	}//end of the functio
	
	//////////////////////////////////////////////////////////////////////////////////////
	/////////////////////function to view Notes//////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	public function view_notes($id=''){
		
		
		
		$this->sql="SELECT * FROM contents  ";
		
		if($id !=''){
			$this->sql .="WHERE contentid=$id";
		}

		
			
			$this->sql .=" WHERE faculty='$this->faculty' AND semester='$this->semester'";
		
	
		
		//execute the sql 
		
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
		//decisive paramater
		$this->numRows=mysqli_num_rows($this->res);
		//return true or false
		if($this->numRows >0){
			while($row = mysqli_fetch_assoc($this->res)){
	array_push($this->data, $row);
		}
		return $this->data;
		}
	}//end of the function 
	
	
	//////////////////////////////////////////////////////////////////////////////////////
	////////////////////// Delete the notes /////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	public function delete_note($id){
		$this->setContentid($id);
		
			//verify the file and remove it from the system
	$this->sql ="SELECT content_link FROM contents WHERE contentid = '$this->contentid'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error = mysqli_error($this->conxn));
	
	$this->numRows = mysqli_num_rows($this->res);
	$this->data = mysqli_fetch_assoc($this->res);
	if(file_exists("../uploads/notes/".$this->data['content_link'])){
		unlink("../uploads/notes/".$this->data['content_link']);
	}

//prepare the sql 
$this->sql="DELETE FROM contents WHERE contentid='$this->contentid'";
//execute the sql 

$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
//decisive paramater
$this->affRows=mysqli_affected_rows($this->conxn);
//decide ture or false
if($this->affRows >0){
	return TRUE;
}else{
	return FALSE;
}


 
	}//end of the function 
	

}//end of class 