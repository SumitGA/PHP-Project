<?php 
class Notice extends Connection{
	///////////////////////////////////////////////////////////////////////////////\
	///////////////////////Load the properties //////////////////////////////////
	private $notice_id;
	private $notice_title;
	private $notice_description;
	private $notice_status;
	Private $notice_date;
	private $image_link;
	
	//////////////////////////////////////////////////////////////////////////////
	/////////// call the constructor of the parent class .///////////////////////
	////////////////////////////////////////////////////////////////////////////
	public function Notice(){
		parent::__construct();
	}
	
	//////////////////////////////////////////////////////////////////////////
	///////////// Setters and Getters ///////////////////////////////////////
	////////////////////////////////////////////////////////////////////////

	/**
	 * @return the $notice_id
	 */
	public function getNotice_id() {
		return $this->notice_id;
	}

	/**
	 * @return the $notice_title
	 */
	public function getNotice_title() {
		return $this->notice_title;
	}

	/**
	 * @return the $notice_description
	 */
	public function getNotice_description() {
		return $this->notice_description;
	}

	/**
	 * @return the $notice_status
	 */
	public function getNotice_status() {
		return $this->notice_status;
	}

	/**
	 * @return the $notice_date
	 */
	public function getNotice_date() {
		return $this->notice_date;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}

	/**
	 * @param field_type $notice_id
	 */
	public function setNotice_id($notice_id) {
		$this->notice_id = $notice_id;
	}

	/**
	 * @param field_type $notice_title
	 */
	public function setNotice_title($notice_title) {
		$this->notice_title = $notice_title;
	}

	/**
	 * @param field_type $notice_description
	 */
	public function setNotice_description($notice_description) {
		$this->notice_description = $notice_description;
	}

	/**
	 * @param field_type $notice_status
	 */
	public function setNotice_status($notice_status) {
		$this->notice_status = $notice_status;
	}

	/**
	 * @param field_type $notice_date
	 */
	public function setNotice_date($notice_date) {
		$this->notice_date = $notice_date;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}
	
	
	
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////// UPLOAD FUNCTION /////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
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
$destination="../../uploads/notice_images/".$newfilename;


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
include_once("../../functions/image_resize_functions.php");
$target_file =$destination;
$resized_file = $destination;


$wmax = 80;
$hmax = 80;

ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
$this->setImage_link($resized_file);
if($target_file =$resized_file){
	return true;
	
	}else{
		return false;
	}

// ----------- End Universal Image Resizing Function -----------
	}//upload method ends
	
	
	////////////////////////////////////////////////////////////////////////////////////////
	/////////////Method to add the notices ////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////
	public function add_notices($elementname){
		
		$flag=$this->upload($elementname);
		
		if($flag==TRUE){
			
			//prepare the sql 
			$this->sql="INSERT INTO notices (notice_title,notice_description,image_link)
			VALUES('$this->notice_title','$this->notice_description','$this->image_link')";
			
			
			
			//execute the sql 
			$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
			
			//decisive parameter
			$this->affRows=mysqli_affected_rows($this->conxn);
			
			
			//decide true or false
			if($flag==TRUE){
				return true;
			}else{
				return false;
			}}//end of upload condition 
			
			else{
				return false;
			}
		
		
	}//end of the function 
	
	
	///////////////////////////////////////////////////////////////////////////////////////
	//////////////////Method to view the notices /////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////
public function view_notices($limit=''){
		$this->sql="SELECT * FROM notices ";
		
		
	if(isset($this->notice_id)){
			$this->sql .= "WHERE notice_id ='$this->notice_id' ";
		}
		
		$this->sql .= "ORDER BY notice_id DESC"; //latest on the top
		
		//limited numbers
		if($limit != ''){
		$this->sql .= " LIMIT $limit" ;	
		}
	//execute the sql 
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
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
}//end of the function 



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////// Modify the Notice  ///////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////
public function edit_notices($elementName ='',$older_file =''){
	
	
	if($elementName !=''){
		
		//remove the old filename
		if(file_exists("../../uploads/notice_images/".$older_file)){
			//remove it
			unlink("../../uploads/notice_images/".$older_file);
			
			
		}
		
		
	$this->upload($elementName);
	}
	

	
	//prepare sql
	$this->sql="UPDATE notices 
	SET
	notice_title='$this->notice_title',
	notice_description='$this->notice_description' ";
	
	
	if($this->image_link !=''){
		$this->sql .=",image_link='$this->image_link'";
	}
	
	$this->sql .="WHERE notice_id='$this->notice_id' ";

	
	//execute the sql
	
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	//decisive paramater
	$this->affRows=mysqli_affected_rows($this->conxn);

	//return true and false
	if($this->affRows>0){
		 
		return TRUE;
	}else{
		return FALSE;
	
	}
}//end function 

		//////////////////////////////////////////////////////////////////////////////
		/////////////////// Method to delete notice /////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		public function delete_notices($id){
			
			$this->setNotice_id($id);
		
			//verify the file and remove it from the system
	$this->sql ="SELECT image_link FROM notices WHERE notice_id = '$this->notice_id'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error = mysqli_error($this->conxn));
	
	$this->numRows = mysqli_num_rows($this->res);
	$this->data = mysqli_fetch_assoc($this->res);
	if(file_exists("../uploads/notice_images/".$this->data['image_link'])){
		unlink("../uploads/notice_images/".$this->data['image_link']);
	}

//prepare the sql 
$this->sql="DELETE FROM notices WHERE notice_id='$this->notice_id'";
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
	
}//end of the class




?>