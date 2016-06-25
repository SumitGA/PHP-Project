<?php 
//child classes
class Slider extends Connection{
	private $slider_id;
	private $slider_title;
	private $slider_description;
	private $image_link;
	private $slider_status;
	/////////////////////////////////////////////////////////////////////////////////////
	///////   Constructors 			////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////
	
	
	///// call the parent class constructor
	
	public function __construct(){
	parent::__construct();	
	}


	////////////////////////////////////////////////////////////
	//////////////////////// Getter and setters //////////////////
	//////////////////////////////////////////////////////////////

	
	
	/**
	 * @return the $slider_id
	 */
	public function getSlider_id() {
		return $this->slider_id;
	}

	/**
	 * @return the $slider_title
	 */
	public function getSlider_title() {
		return $this->slider_title;
	}

	/**
	 * @return the $slider_description
	 */
	public function getSlider_description() {
		return $this->slider_description;
	}

	/**
	 * @return the $image_link
	 */
	public function getImage_link() {
		return $this->image_link;
	}

	/**
	 * @return the $slider_status
	 */
	public function getSlider_status() {
		return $this->slider_status;
	}

	/**
	 * @param field_type $slider_id
	 */
	public function setSlider_id($slider_id) {
		$this->slider_id = $slider_id;
	}

	/**
	 * @param field_type $slider_title
	 */
	public function setSlider_title($slider_title) {
		$this->slider_title = $slider_title;
	}

	/**
	 * @param field_type $slider_description
	 */
	public function setSlider_description($slider_description) {
		$this->slider_description = $slider_description;
	}

	/**
	 * @param field_type $image_link
	 */
	public function setImage_link($image_link) {
		$this->image_link = $image_link;
	}

	/**
	 * @param field_type $slider_status
	 */
	public function setSlider_status($slider_status) {
		$this->slider_status = $slider_status;
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
$destination="../../uploads/sliders_images/".$newfilename;


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


$wmax = 450;
$hmax = 300;

ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
$this->setImage_link($resized_file);
if($target_file =$resized_file){
	return true;
	
	}else{
		return false;
	}







// ----------- End Universal Image Resizing Function -----------
	}//upload method ends
	
	
public function add_sliders($elementName){
	

	$flag=$this->upload($elementName);
	
	
	
	if($flag == TRUE){
	//prepare sql
	$this->sql="INSERT INTO sliders(slider_title,slider_description,image_link)
	VALUES('$this->slider_title','$this->slider_description','$this->image_link')";
	

	
	
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
	}else{
		return FALSE;
	}
}//end of the function add sliders

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////	View sliders						////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function view_sliders($limit=''){
		$this->sql="SELECT * FROM sliders ";
		
		
	if(isset($this->slider_id)){
			$this->sql .= "WHERE slider_id ='$this->slider_id' ";
		}
		
		$this->sql .= "ORDER BY slider_id DESC"; //latest on the top
		
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
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////// Modify the Slider  ///////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////
public function edit_sliders($elementName ='',$older_file =''){
	
	
	if($elementName !=''){
		
		//remove the old filename
		if(file_exists("../../uploads/sliders_images/".$older_file)){
			//remove it
			unlink("../../uploads/sliders_images/".$older_file);
			
			
		}
		
		
	$this->upload($elementName);
	}
	

	
	//prepare sql
	$this->sql="UPDATE sliders 
	SET
	slider_title='$this->slider_title',
	slider_description='$this->slider_description' ";
	
	
	if($this->image_link !=''){
		$this->sql .=",image_link='$this->image_link'";
	}
	
	$this->sql .="
	
	WHERE slider_id='$this->slider_id' ";

	
	
	//execute the sql
	
	$this->res=mysqli_query($this->conxn,$this->sql) or trigger_error($this->error=mysqli_error($this->conxn));
	//decisive paramater
	$this->affRows=mysqli_affected_rows($this->conxn);
	
	//return true and false
	if($this->affRows>0){
		 
		return TRUE;
	}
	
	else{
		return FALSE;
	}
}//end function 


		/////////////////////////////////////////////////////////////////////////////////
		//////////////// Delete Sliders ////////////////////////////////////////////////
		///////////////////////////////////////////////////////////////////////////////
		public function delete_sliders($id){
			
			$this->setSlider_id($id);
		
			//verify the file and remove it from the system
	$this->sql ="SELECT image_link FROM sliders WHERE slider_id = '$this->slider_id'";
	$this->res = mysqli_query($this->conxn,$this->sql) or trigger_error($this->error = mysqli_error($this->conxn));
	
	$this->numRows = mysqli_num_rows($this->res);
	$this->data = mysqli_fetch_assoc($this->res);
	if(file_exists("../uploads/sliders_images/".$this->data['image_link'])){
		unlink("../uploads/sliders_images/".$this->data['image_link']);
	}

	
	
	
		$this->sql="DELETE FROM sliders WHERE slider_id='$this->slider_id'";
		//remove the old filename
		
			
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
		
	
					
		}//function ends

}//end of slider class

?>