<?php 
class Gallery extends Connection{
	//load the properties 
	private $image_id;
	private $image_link;
	private $image_status;
	private $admin_id;
	
	//load the constructor 
	
	public function Gallery(){
		parent::__construct();
	}
	
	/////////////////////////////////////////////////////////////////
	////////////// getters and Setters /////////////////////////////
	///////////////////////////////////////////////////////////////

	/**
	 * @return the $image_id
	 */
	public function getImage_id() {
		return $this->image_id;
	}

	/**
	 * @param field_type $image_id
	 */
	public function setImage_id($image_id) {
		$this->image_id = $image_id;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}

	/**
	 * @return the $image_status
	 */
	public function getImage_status() {
		return $this->image_status;
	}

	/**
	 * @param field_type $image_status
	 */
	public function setImage_status($image_status) {
		$this->image_status = $image_status;
	}

	/**
	 * @return the $admin_id
	 */
	public function getAdmin_id() {
		return $this->admin_id;
	}

	/**
	 * @param field_type $admin_id
	 */
	public function setAdmin_id($admin_id) {
		$this->admin_id = $admin_id;
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////// Upload function   /////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////
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
		$destination="../../uploads/gallery/".$newfilename;
	
	
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
	
		$wmax = 500;
		$hmax = 300;
	
		ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
		
		
			$this->setImage_link($resized_file);
			
			if($target_file == $resized_file){
				return true;
			}else{
				return false;
			}
		
	
	}//end of the upload function
	
	
	
	
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////// Add Images to the gallery ///////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////
	public function add_images($elementname){
		
		$flag=$this->upload($elementname);
		
		
		if($flag == TRUE){
		
		$this->sql="INSERT INTO gallery 
		(image_link,admin_id) VALUES  ('$this->image_link','$this->admin_id') ;";
		
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
	
	
	//////////////////////////////////////////////////////////////////////////
	/////////// view gallery/////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	public function view_gallery($limit=''){
		$this->sql="SELECT * FROM gallery ORDER BY image_id ";	
	if($limit != '' ){
            $this->sql .= " LIMIT $limit ";
        }
	//execute the sql
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	
	//blank array 
$images = array();

//decisive paramters

$this->numRows = mysqli_num_rows($this->res);

//loop through the records 
if($this->numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($this->res)){
		array_push($images,$row);
	} //loop ends
}//if ends
	
	return $images;

	
		
	}//end of the function gallery
	
	
	////////////////////////////////////////////////////////////////////////////////
	//////////////// ///Delete images out of the gallery //////////////////////////
	//////////////////////////////////////////////////////////////////////////////
	public function delete_images($id){
		
		$this->setImage_id($id);
		
		//verify the file and remove it from the system
	$this->sql ="SELECT image_link FROM gallery WHERE image_id = '$this->image_id'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error = mysqli_error($this->conxn));
	
	$this->numRows = mysqli_num_rows($this->res);
	$this->data = mysqli_fetch_assoc($this->res);
	if(file_exists("../uploads/gallery/resized_images/".$this->data['image_link'])){
		unlink("../uploads/gallery/resized_images/".$this->data['image_link']);
	}
		
		//prepare the sql 
		$this->sql="DELETE FROM gallery WHERE image_id='$this->image_id'";
		
		 
		//execute the sql 
		$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
		
		$this->affRows=mysqli_affected_rows($this->conxn);
		//decisive paramater
		if($this->affRows >0){
			return TRUE;
		}else{
			return FALSE;
		}
	}//end of the function 
	
	
}//end of the class